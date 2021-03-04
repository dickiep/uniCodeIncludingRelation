<?php
session_start();

include 'connections/conn.php';

if (!isset($_SESSION["instructor"])) {
    header('Location: index.php');
} else {
    if (isset($_GET['id'])) {
        $moduleid = $_GET['id'];
        $query = "SELECT * FROM vleModules WHERE moduleCode='$moduleid'";
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        $_SESSION['moduleID'] = $moduleid;
    } else if (isset($_SESSION['moduleID'])) {
        $moduleid = $_SESSION['moduleID'];
        $query = "SELECT * FROM vleModules WHERE moduleCode='$moduleid'";
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    }
}
?>

<!DOCTYPE html>
<html lang ="en">

    <head>
        <title>Add a New Module Resource</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css" integrity="sha384-5SOiIsAziJl6AWe0HWRKTXlfcSHKmYV4RBF18PPJ173Kzn7jzMyFuTtk8JA7QQG1" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src=https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js></script>
        <link rel="stylesheet" href="css/mystyle.css"> 
        <link rel="stylesheet" href="css/newuser.css">
    </head>

    <body>

        <div class="fixed-top">
            <div class = "col-lg-12 myhead">
            </div>

            <div class = "col-lg-12 mynav">

                <nav class = "navbar navbar-inverse navbar-toggleable-sm mynav fixed-top" id="vlenav">
                    <div class="container-fluid">
                        <a href = "#" class="btn mybtn" id="menu-toggle">&#9776;</a>
                        <a class = "owlfavicon" href = "index.php" >
                            <img src="img/owl_favicon.png" alt="owl favicon" class = "owlfavicon">
                        </a> 
                        <a href="logout.php" id="logout">Logout</a>
                    </div> 
                </nav>
            </div>
        </div>

        <div id ="wrapper">

            <!--sidemenu-->
            <div id = "sidemenu-wrapper">
                <ul class="sidemenu-nav">
                    <h3>&nbsp;&nbsp;Main Menu</h3>
                    <li><a href="listmodules.php">Resources</a></li>
                    <li><a href="messenger.php">Messenger</a></li>
                    <li><a href="admin.php">Admin</a></li>
                </ul>
            </div>


            <!--page content-->
            <div id="content-wrapper">
                <div class = "container-fluid">
                    <div class ="row">
                        <div class = "col-lg-12">

                            <h3>Add Resources</h3>
                            <nav aria-label="breadcrumb">
                            <ol class="breadcrumb" id="mybreadcrumb">
                                <li>
                                    <a href="index.php" id='breadcrumbitem'>Home&nbsp;</a>
                                </li>
                                <li>
                                    <i class="fas fa-angle-double-right" id='breadcrumbitem'></i>
                                </li>
                                <li>
                                    <a href="listmodules.php" id='breadcrumbitem'>&nbsp;Resources&nbsp;</a>
                                </li>
                                <li>
                                    <i class="fas fa-angle-double-right" id='breadcrumbitem'></i>
                                </li>
                                <li>
                                    <a href="addmoduleresources.php" id='breadcrumbitem'>&nbsp;Add Resources&nbsp;</a>
                                </li>
                            </ol>
                            </nav>

                            <?php
                            // Flash pattern for a file upload
                            if (isset($_SESSION['uploaderror'])) {
                                echo '<p style="color:red">' . $_SESSION['uploaderror'] . "</p>\n";
                                unset($_SESSION['uploaderror']);
                            }

                            if (isset($_SESSION['uploadsuccess'])) {
                                echo '<p style="color:green">' . $_SESSION['uploadsuccess'] . "</p>\n";
                                unset($_SESSION['uploadsuccess']);
                            }
                            ?>

                            <div class="row">
                                <div class="col-md-8">     
                                    <form method="POST" action="uploadmoduleresources.php" enctype="multipart/form-data">

                                        <div class="form-group">
                                            <?php echo"<input type='hidden' name = 'module' value='$moduleid'>"; ?>

                                            <label for="folder">Which folder would you like to add the resources to?</label>
                                            <select class="form-control" id="folder" name='folder'>
                                                <?php
                                                include'connections/conn.php';

                                                $folderQuery = "SELECT * FROM vleModuleResourceFolders WHERE moduleCode = '$moduleid'";
                                                $folderResult = mysqli_query($conn, $folderQuery) or die(mysqli_error($conn));
                                                if (mysqli_num_rows($folderResult) > 0) {


                                                    while ($row = mysqli_fetch_assoc($folderResult)) {
                                                        $folder = $row['folderName'];

                                                        echo"<option value='$folder'>$folder</option>";
                                                    }
                                                    
                                                }
                                                mysqli_close($conn);
                                                ?>
                                            </select>
                                        </div>

                                        <input type="hidden" name="size" value="1000000">

                                        <div class="form-row">
                                            <input type="hidden" name="size" value="1000000">
                                            <div class="custom-file col-md-4">
                                                <input type="file" class="custom-file-input" name="file" id='userFile'> 
                                                <label class="custom-file-label" for="userFile">Upload a File</label>
                                            </div>
                                        </div>
                                        <br>
                                        <div>
                                            <button class="btn btn-primary" type="submit" name="upload">Upload Resources</button>
                                        </div>
                                    </form>
                                </div>

                                <div class="col-md-4 offset-md-8" style="position:relative; bottom: 9.7rem;">
                                    <div>
                                        <button type="button" class="btn btn-success" id="newFolder">New Module Folder</button>
                                        <br><br>
                                    </div>

                                    <?php
                                    // Flash pattern for a new folder
                                    if (isset($_SESSION['error'])) {
                                        echo '<p style="color:red">' . $_SESSION['error'] . "</p>\n";
                                        unset($_SESSION['error']);
                                    }

                                    if (isset($_SESSION['success'])) {
                                        echo '<p style="color:green">' . $_SESSION['success'] . "</p>\n";
                                        unset($_SESSION['success']);
                                    }
                                    ?>

                                    <div class="" id="newModuleFolderForm" style="display: none;">
                                        <form action="newmoduleresourcefolder.php" method="post">

                                            <div class="form-group">
                                                <label for="folderTitle">Folder Title</label>
                                                <input type="text" class="form-control" id="folderTitle" name="folderTitle" placeholder="What would you like to call your folder?">
                                                <?php echo"<input type='hidden' id='moduleTitle' name='moduleTitle'' value='$moduleid'>"; ?>
                                            </div>
                                            <button type="submit" class="btn btn-primary mb-2" name="uploadFolder">Create the Folder</button>
                                        </form>              
                                    </div>  
                                </div>
                            </div>

                            <script>
                                $(function () {
                                    $("#newFolder").click(function () {
                                        if ($("#newModuleFolderForm").is(":hidden")) {
                                            $("#newModuleFolderForm").slideDown("slow");
                                        } else {
                                            $("#newModuleFolderForm").slideUp("slow");
                                        }
                                    });

                                });
                            </script>

                        </div>  
                    </div>
                </div>     
            </div>
        </div>

        <!--script to toggle the side menu-->
        <script>
            $("#menu-toggle").click(function (e) {
                e.preventDefault();

                $("#wrapper").toggleClass("menuDisplayed");
            });
        </script>

    </body>
</html>