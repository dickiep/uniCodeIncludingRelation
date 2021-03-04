<?php
session_start();

include 'connections/conn.php';

if (!isset($_SESSION["admin"])) {
    header('Location: index.php');
} else {
    $email = $_SESSION["admin"];
    $query = "select firstName from vleUsers where emailAddress = '$email'";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $first = $row['firstName'];
        }
    }
    
    $studentquery = "select * from vleUsers where userType = '1';";
    $studentresult = mysqli_query($conn, $studentquery) or die(mysqli_error($conn));

    $modulequery = "select * from vleModules";
    $moduleresult = mysqli_query($conn, $modulequery) or die(mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang ="en">

    <head>
        <title>Manage Modules</title>
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

                            <h3>Add a New Module</h3>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb" id="mybreadcrumb">
                                    <li>
                                        <a href="index.php" id='breadcrumbitem'>Home&nbsp;</a>
                                    </li>
                                    <li>
                                        <i class="fas fa-angle-double-right" id='breadcrumbitem'></i>
                                    </li>
                                    <li>
                                        <a href="admin.php" id='breadcrumbitem'>&nbsp;Admin&nbsp;</a>
                                    </li>
                                    <li>
                                        <i class="fas fa-angle-double-right" id='breadcrumbitem'></i>
                                    </li>
                                    <li>
                                        <a href="managemodules.php" id='breadcrumbitem'>&nbsp;Manage Modules&nbsp;</a>
                                    </li>
                                </ol>
                            </nav>
                            
                            <div class="col-md-4 mb-3">
                                
                                <div>
                                    <?php
                                        //new module flash pattern
                                        if (isset($_SESSION['moduleAdditionSuccess'])) {
                                            $additionSuccess = $_SESSION['moduleAdditionSuccess'];
                                            echo "<br><p id = 'sessionSuccess'>$additionSuccess</p>";
                                            unset($_SESSION['moduleAdditionSuccess']);
                                        }

                                        if (isset($_SESSION['moduleAdditionFailure'])) {
                                            $additionFailure = $_SESSION['moduleAdditionFailure'];
                                            echo "<br><p id = 'sessionFailure'>$additionFailure</p>";
                                            unset($_SESSION['moduleAdditionFailure']);
                                        }
                                        ?>
                                </div>
                                
                               
                                <h4>Add a New Module</h4><br>
                               

                                <form method="POST" action="addnewmodule.php" enctype="multipart/form-data">
                                                                
                                    <div class="form-row moduleformelement">
                                        
                                        
                                            <label for="moduleCode">Module Code</label>
                                            <input type="text" class="form-control" name='moduleCode' id="moduleCode" placeholder="Module Code" required>
                                        
                                    </div>
                                    
                                        
                                    <div class="form-row moduleformelement">
         
                                            <label for="moduleName">Module name</label>
                                            <input type="text" class="form-control" name='moduleName' id="moduleName" placeholder="Module name" required>
                                        
                                    </div>
                                    
                                    
                                    <div class="form-row moduleformelement">
                                                                                
                                            <label for="moduleInfo">Module Info</label>
                                            <textarea class="form-control" name='moduleInfo' id='moduleInfo' placeholder="Description of the module" rows="2" required></textarea>                                       
                                    </div> 
                                    

                                    <div>
                                            <button class="btn btn-primary" type="submit" name="upload" style="float: right;">Create the Module</button>
                                    </div>                                        
                                                                     
                                </form>
                            </div>
                                
                                <div class="col-md-4 moduleform">
                                    <div>
                                        <button type="button" class="btn btn-success" id="newFolder">Add an instructor to the Module</button>
                                        <br>
                                    </div>
                                
                                <?php
                                    // Flash pattern for adding students to a module
                                    if (isset($_SESSION['success'])) {
                                        echo '<p style="color:green">' . $_SESSION['success'] . "</p>\n";
                                        unset($_SESSION['success']);
                                    }

                                    if (isset($_SESSION['error'])) {
                                        echo '<p style="color:red">' . $_SESSION['error'] . "</p>\n";
                                        unset($_SESSION['error']);
                                    }
                                ?>

                                    <div class="" id="newModuleFolderForm" style="display: none;">
                                        <form method="POST" action="addstudentstomodule.php" enctype="multipart/form-data">
                                    <br>

                                    <div class="form-group">
                                        <label for="module">Please select the Module you wish to add them to:</label>
                                        <select class="form-control" id="module" name='module'>

                                            <?php
                                            if (mysqli_num_rows($moduleresult) > 0) {

                                                while ($row = mysqli_fetch_assoc($moduleresult)) {
                                                    $code = $row['moduleCode'];

                                                    echo"<option value=$code>$code</option>";
                                                }
                                            }
                                            ?>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="student">Select the students you wish to add to the module:</label>
                                        <select multiple="multiple" class="form-control" id="student" name='student[]'>
                                            <?php
                                            if (mysqli_num_rows($studentresult) > 0) {

                                                while ($row = mysqli_fetch_assoc($studentresult)) {
                                                    $first = $row['firstName'];
                                                    $second = $row['lastName'];
                                                    $id = $row['id'];
                                                    echo"<option value=$id>$first&nbsp$second</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div>
                                        <button class="btn btn-primary" type="submit" name="upload">Add the Students</button>
                                    </div>

                                        </form>              
                                    </div>
                                </div>
                                
                                <!--script to toggle the add students to a module form-->
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
                            
                            <div class="col-md-4 moduleform">
                                    <div>
                                        <button type="button" class="btn btn-success" id="instructorAdd">Add Students to the Module</button>
                                        <br>
                                    </div>
                                
                                <?php
                                    // Flash pattern for adding students to a module
                                    if (isset($_SESSION['success'])) {
                                        echo '<p style="color:green">' . $_SESSION['success'] . "</p>\n";
                                        unset($_SESSION['success']);
                                    }

                                    if (isset($_SESSION['error'])) {
                                        echo '<p style="color:red">' . $_SESSION['error'] . "</p>\n";
                                        unset($_SESSION['error']);
                                    }
                                ?>

                                    <div class="" id="instructorAddForm" style="display: none;">
                                        <form method="POST" action="addstudentstomodule.php" enctype="multipart/form-data">
                                    <br>

                                    <div class="form-group">
                                        <label for="module">Please select the Module you wish to add them to:</label>
                                        <select class="form-control" id="module" name='module'>

                                            <?php
                                            if (mysqli_num_rows($moduleresult) > 0) {

                                                while ($row = mysqli_fetch_assoc($moduleresult)) {
                                                    $code = $row['moduleCode'];

                                                    echo"<option value=$code>$code</option>";
                                                }
                                            }
                                            ?>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="student">Select the students you wish to add to the module:</label>
                                        <select multiple="multiple" class="form-control" id="student" name='student[]'>
                                            <?php
                                            if (mysqli_num_rows($studentresult) > 0) {

                                                while ($row = mysqli_fetch_assoc($studentresult)) {
                                                    $first = $row['firstName'];
                                                    $second = $row['lastName'];
                                                    $id = $row['id'];
                                                    echo"<option value=$id>$first&nbsp$second</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div>
                                        <button class="btn btn-primary" type="submit" name="upload">Add the Students</button>
                                    </div>

                                        </form>              
                                    </div>
                                </div>
                            
                            <!--script to toggle the add students to a module form-->
                                <script>
                                    $(function () {
                                        $("#instructorAdd").click(function () {
                                            if ($("#instructorAddForm").is(":hidden")) {
                                                $("#instructorAddForm").slideDown("slow");
                                            } else {
                                                $("#instructorAddForm").slideUp("slow");
                                            }
                                        });

                                    });
  
                            </script>
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            <div class="col-md-4 mb-3">
                                
                                <div>
                                    <?php
                                        //new module flash pattern
                                        if (isset($_SESSION['moduleDeletionSuccess'])) {
                                            $deletionSuccess = $_SESSION['moduleDeletionSuccess'];
                                            echo "<br><p id = 'sessionSuccess'>$deletionSuccess</p>";
                                            unset($_SESSION['moduleDeletionSuccess']);
                                        }
                                        
                                        if (isset($_SESSION['moduleDeletionError'])) {
                                            $deletionError = $_SESSION['moduleDeletionError'];
                                            echo "<br><p id = 'sessionFailure'>$deletionError</p>";
                                            unset($_SESSION['moduleDeletionError']);
                                        }

                                        if (isset($_SESSION['moduleDeletionFailure'])) {
                                            $deletionFailure = $_SESSION['moduleDeletionFailure'];
                                            echo "<br><p id = 'sessionFailure'>$deletionFailure</p>";
                                            unset($_SESSION['moduleDeletionFailure']);
                                        }
                                        ?>
                                </div>
                                
                               
                                <h4>Delete a Module</h4><br>
                               

                                <form method="POST" action="deletemodule.php" enctype="multipart/form-data">
                                                                
                                    <label for="module">Please select the Module you wish to delete:</label>
                                        <select class="form-control" id="module" name='module'>

                                            <?php
                                            if (mysqli_num_rows($moduleresult) > 0) {

                                                while ($row = mysqli_fetch_assoc($moduleresult)) {
                                                    $code = $row['moduleCode'];

                                                    echo"<option value=$code>$code</option>";
                                                }
                                            }
                                            ?>
                                            
                                        </select>
                                        
                                    </div> 
                                    

                                    <div>
                                            <button class="btn btn-primary" type="submit" name="delete" style="float: right;">Delete the Module</button>
                                    </div>                                        
                                                                     
                                </form>
                            </div>
                                
                                <div class="col-md-4 moduleform">
                                    <div>
                                        <button type="button" class="btn btn-success" id="newFolder">Add an instructor to the Module</button>
                                        <br>
                                    </div>
                                
                                <?php
                                    // Flash pattern for adding students to a module
                                    if (isset($_SESSION['success'])) {
                                        echo '<p style="color:green">' . $_SESSION['success'] . "</p>\n";
                                        unset($_SESSION['success']);
                                    }

                                    if (isset($_SESSION['error'])) {
                                        echo '<p style="color:red">' . $_SESSION['error'] . "</p>\n";
                                        unset($_SESSION['error']);
                                    }
                                ?>

                                    <div class="" id="newModuleFolderForm" style="display: none;">
                                        <form method="POST" action="addstudentstomodule.php" enctype="multipart/form-data">
                                    <br>

                                    <div class="form-group">
                                        <label for="module">Please select the Module you wish to add them to:</label>
                                        <select class="form-control" id="module" name='module'>

                                            <?php
                                            if (mysqli_num_rows($moduleresult) > 0) {

                                                while ($row = mysqli_fetch_assoc($moduleresult)) {
                                                    $code = $row['moduleCode'];

                                                    echo"<option value=$code>$code</option>";
                                                }
                                            }
                                            ?>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="student">Select the students you wish to add to the module:</label>
                                        <select multiple="multiple" class="form-control" id="student" name='student[]'>
                                            <?php
                                            if (mysqli_num_rows($studentresult) > 0) {

                                                while ($row = mysqli_fetch_assoc($studentresult)) {
                                                    $first = $row['firstName'];
                                                    $second = $row['lastName'];
                                                    $id = $row['id'];
                                                    echo"<option value=$id>$first&nbsp$second</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div>
                                        <button class="btn btn-primary" type="submit" name="upload">Add the Students</button>
                                    </div>

                                        </form>              
                                    </div>
                                </div>
                                
                                <!--script to toggle the add students to a module form-->
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
                            
                            <div class="col-md-4 moduleform">
                                    <div>
                                        <button type="button" class="btn btn-success" id="instructorAdd">Add Students to the Module</button>
                                        <br>
                                    </div>
                                
                                <?php
                                    // Flash pattern for adding students to a module
                                    if (isset($_SESSION['success'])) {
                                        echo '<p style="color:green">' . $_SESSION['success'] . "</p>\n";
                                        unset($_SESSION['success']);
                                    }

                                    if (isset($_SESSION['error'])) {
                                        echo '<p style="color:red">' . $_SESSION['error'] . "</p>\n";
                                        unset($_SESSION['error']);
                                    }
                                ?>

                                    <div class="" id="instructorAddForm" style="display: none;">
                                        <form method="POST" action="addstudentstomodule.php" enctype="multipart/form-data">
                                    <br>

                                    <div class="form-group">
                                        <label for="module">Please select the Module you wish to add them to:</label>
                                        <select class="form-control" id="module" name='module'>

                                            <?php
                                            if (mysqli_num_rows($moduleresult) > 0) {

                                                while ($row = mysqli_fetch_assoc($moduleresult)) {
                                                    $code = $row['moduleCode'];

                                                    echo"<option value=$code>$code</option>";
                                                }
                                            }
                                            ?>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="student">Select the students you wish to add to the module:</label>
                                        <select multiple="multiple" class="form-control" id="student" name='student[]'>
                                            <?php
                                            if (mysqli_num_rows($studentresult) > 0) {

                                                while ($row = mysqli_fetch_assoc($studentresult)) {
                                                    $first = $row['firstName'];
                                                    $second = $row['lastName'];
                                                    $id = $row['id'];
                                                    echo"<option value=$id>$first&nbsp$second</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div>
                                        <button class="btn btn-primary" type="submit" name="upload">Add the Students</button>
                                    </div>

                                        </form>              
                                    </div>
                                </div>
                            
                            <!--script to toggle the add students to a module form-->
                                <script>
                                    $(function () {
                                        $("#instructorAdd").click(function () {
                                            if ($("#instructorAddForm").is(":hidden")) {
                                                $("#instructorAddForm").slideDown("slow");
                                            } else {
                                                $("#instructorAddForm").slideUp("slow");
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