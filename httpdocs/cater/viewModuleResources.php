<?php
session_start();

include 'connections/conn.php';

if (!isset($_SESSION["student"]) && !isset($_SESSION["instructor"])) {
    header('Location: index.php');
} else {
    if (isset($_GET['id'])) {
        $moduleid = $_GET['id'];
        $query = "SELECT * FROM vleModuleResourceFolders WHERE moduleCode='$moduleid'";
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

        $_SESSION['moduleID'] = $moduleid;
    } else if (isset($_SESSION['moduleID'])) {
        $moduleid = $_SESSION['moduleID'];
        $query = "SELECT * FROM vleModuleResourceFolders WHERE moduleCode='$moduleid'";
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    }
}
?>

<!DOCTYPE html>
<html lang ="en">

    <head>
        <title>View Module Resources</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src=https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js></script>
        <link rel="stylesheet" href="css/mystyle.css"> 
        <link rel="stylesheet" href="css/newuser.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css" integrity="sha384-5SOiIsAziJl6AWe0HWRKTXlfcSHKmYV4RBF18PPJ173Kzn7jzMyFuTtk8JA7QQG1" crossorigin="anonymous">

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
                    <li><a href="#">Resources</a></li>
                    <li><a href="#">Messenger</a></li>
                    <li><a href="admin.php">Admin</a></li>
                </ul>
            </div>


            <!--page content-->

            <div id="content-wrapper">
                <div class = "container-fluid">
                    <div class ="row">
                        <div class = "col-lg-12">

                            <h3>Resources for <?php echo"$moduleid"; ?></h3>
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
                                    <a href="addmoduleresources.php" id='breadcrumbitem'>&nbsp;View Resources&nbsp;</a>
                                </li>
                            </ol>
                            </nav>
                            
                              <div class="col-md-5" style="float: right">
                                <div class="row">
                                    <div class='card' id = 'mycard'>
                                        <i class="fas fa-question fa-10x cardicon"></i>

                                        <div class='card-body'>
                                            <h5 class='card-title'>Complete a Quiz</h5>
                                            <a href='choosequiz.php?id=<?php echo"$moduleid"; ?>' class='btn btn-primary'>Module Quizzes</a>
                                        </div>
                                    </div>
                                </div> 
                            </div>

                            <!--select all of the folders that relate to this module and display them as links-->

                            <div class="col-md-6">
                                <?php
                                echo "<div class='container-fluid'>
                                <table class='table table-hover'>
                                    <thead>
                                      <tr>
                                        <th scope='col'>Folder Name</th>
                                        <th scope='col'></th>
                                      </tr>
                                    </thead>";




                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $fileName = $row['folderName'];
                                        $folderID = $row['id'];

                                        echo "<tbody>
                                        <tr>
                                            <td>$fileName</td>
                                            <td align='center'>
                                               <a href='viewmoduleresourcesfromfile.php?id=$folderID'>Open Folder</a>
                                            </td>
                                        </tr>";
                                    }


                                    echo" </tbody>
                                                                    </table>
                                                                    </div>";
                                    mysqli_close($conn);
                                }
                                ?>
                            </div>
                          
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