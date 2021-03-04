<?php
session_start();

include 'connections/conn.php';


if (isset($_SESSION["admin"])) {
    $modulequery = "select * from vleModules";
    $moduleresult = mysqli_query($conn, $modulequery) or die(mysqli_error($conn));
    
    $instructorquery = "select * from vleUsers where userType = '2';";
    $instructorresult = mysqli_query($conn, $instructorquery) or die(mysqli_error($conn));
    
} else if (isset($_SESSION["instructor"])) {
    $email = $_SESSION["instructor"];

    $modulequery = "select * from vleModules JOIN vleTeacherTeaches on vleModules.moduleCode=vleTeacherTeaches.moduleCode JOIN vleUsers on vleTeacherTeaches.teacherID = vleUsers.id WHERE vleUsers.emailAddress='$email'";
    $moduleresult = mysqli_query($conn, $modulequery) or die(mysqli_error($conn));
    
    $instructorquery = "select * from vleUsers where userType = '2';";
    $instructorresult = mysqli_query($conn, $instructorquery) or die(mysqli_error($conn));
    
    $modulequerytwo = "select * from vleModules;";
    $moduleresulttwo = mysqli_query($conn, $modulequerytwo) or die(mysqli_error($conn));

    
} else {

    header('Location: logout.php');
}
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang ="en">

    <head>
        <title>Edit Modules</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src=https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js></script>
        <link rel="stylesheet" href="css/mystyle.css">
        <link rel="stylesheet" href="css/admin.css"> 
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

                            <h1>Edit and Manage Modules</h1>
                            <ol class="breadcrumb" id="mybreadcrumb">
                                <li>
                                    <a href="index.php" id="breadcrumbitem">Home&nbsp;</a>
                                </li>
                                <li>
                                    <i class="fas fa-angle-double-right" id="breadcrumbitem"></i>
                                </li>
                                <li>
                                    <a href="admin.php" class="active" id="breadcrumbitem">&nbsp;Admin&nbsp;</a>
                                </li>
                                <li>
                                    <i class="fas fa-angle-double-right" id="breadcrumbitem"></i>
                                </li>
                                <li>
                                    <a href="#" id="breadcrumbitem">&nbsp;Edit and Manage Modules</a>
                                </li>
                            </ol>
                            <div class="col-md-6">
                                <?php
                                
                                include 'connections/conn.php';
                                
                                echo"<form method='POST' action='editamodule.php' enctype='multipart/form-data'>
                                        <div class='form-row'>
                                            <p id='pd1'><strong>Select the Module you would like to edit :</strong><select class='form-control' id='module' name='module'>";

                                            if (mysqli_num_rows($moduleresult) > 0) {

                                                while ($row = mysqli_fetch_assoc($moduleresult)) {
                                                    $code = $row['moduleCode'];
                                                    echo"<option value=$code>$code</option>";
                                                }
                                            }
                                            
                                       echo "</select></p>
                                            <button class='btn btn-success' type='submit' name='upload' id='editModuleButton'>Edit this Module</button>
                                            </div>
                                            </form>";
                                       
                                            if (isset($_SESSION['updateSuccess'])) {
                                                $updateSuccess = $_SESSION['updateSuccess'];
                                                echo "<p id = 'sessionSuccess'>$updateSuccess</p>";
                                                unset($_SESSION['updateSuccess']);
                                            }

                                            if (isset($_SESSION['updateFailure'])) {
                                                $updateFailure = $_SESSION['updateFailure'];
                                                echo "<p id = 'sessionFailure'>$updateFailure</p>";
                                                unset($_SESSION['updateFailure']);
                                            }
                                            
                                            if (isset($_SESSION['success'])) {
                                                echo '<p id="sessionSuccess"><br />' . $_SESSION['success'] . "</p>\n";
                                                unset($_SESSION['success']);
                                            }

                                            if (isset($_SESSION['error'])) {
                                                echo '<p id="sessionSuccess"><br />' . $_SESSION['error'] . "</p>\n";
                                                unset($_SESSION['error']);
                                            }
                                    
                                            if (isset($_SESSION['successInstructor'])) {
                                                echo '<p id="sessionSuccess">' . $_SESSION['successInstructor'] . "</p>\n";
                                                unset($_SESSION['successInstructor']);
                                            }

                                            if (isset($_SESSION['errorInstructor'])) {
                                                echo '<p id="sessionSuccess">' . $_SESSION['errorInstructor'] . "</p>\n";
                                                unset($_SESSION['errorInstructor']);
                                            }
                                        
                                        mysqli_close($conn);
 
                                ?>
                            </div>
                            
                                <div class="row">
                                  
                       
                                    <?php
                                    include 'connections/conn.php';
                                 
                                    if(isset($_POST['module'])) {

                                            $moduleid = $_POST['module'];

                                            $moduleToEditQuery = "SELECT vleModules.moduleCode, vleModules.moduleName, vleModuleInfo.description FROM vleModules JOIN vleModuleInfo ON vleModules.moduleCode=vleModuleInfo.moduleCode WHERE vleModules.moduleCode = '$moduleid'";
                                            $moduleToEditResult = mysqli_query($conn, $moduleToEditQuery) or die(mysqli_error($conn));

                                            if(mysqli_num_rows($moduleToEditResult) > 0) {
                                                while ($row = mysqli_fetch_assoc($moduleToEditResult)) {
                                                    $moduleCode = $row['moduleCode'];
                                                    $moduleName = $row['moduleName'];
                                                    $moduleDescription = $row['description'];

                                                }
                                                
                                    echo "<div class='card' id='myadmincard'>
                                            <h4 class='card-title' id='admincardtitle'>Edit the Module</h4>
                                                <div class='card-body' id='admincardbodypd1'>
                                                    <form method='POST' action='makemoduleupdates.php' enctype='multipart/form-data'>
                                                        <input type='hidden' name='moduleid' value='$moduleid'>                                                
                                                        <p id='pd1'><strong>Module Code :</strong><input type='text' class='form-control' name='moduleCode' id='moduleCode' value='$moduleCode' required></p>                                                                                       
                                                        <p id='pd1'><strong>Module Name :</strong><input type='text' class='form-control' name='moduleName' id='moduleName' value='$moduleName' required></p>                                                                                      
                                                        <p id='pd1'><strong>Module Description :</strong><input type='text' class='form-control' name='moduleInfo' id='moduleInfo' value='$moduleDescription' required></p>                                          
                                                        <button class='btn btn-success' type='submit' name='upload' style='float: right;'>Edit the Module</button>
                                                    </form>
                                                </div>
                                        </div>";

                                            }

                                    
                                    echo "<div class='card' id='myadmincard'>
                                            <h4 class='card-title' id='admincardtitle' >Remove Students from a Module</h4>
                                            <div class='card-body' id='admincardbodypd1'>
                                                <form method='POST' action='removestudentsfrommodule.php' enctype='multipart/form-data'>              
                                                    <input type = 'hidden'  id='module' name='module' value='$moduleid'>";


                                    echo "<p id='pd1'><strong>Select the Student(s) :</strong><select multiple='multiple' class='form-control' id='selectInstructors' name='student[]'>";
                                            
                                        $studentquery = "SELECT vleUsers.id, vleUsers.firstName, vleUsers.lastName FROM vleUsers JOIN vleStudentTakes WHERE vleStudentTakes.moduleCode = '$moduleid' AND vleUsers.userType = 1 AND vleUsers.id = vleStudentTakes.studentID;";
                                        $studentresult = mysqli_query($conn, $studentquery) or die(mysqli_error($conn));
                                       
                                       
                                            if (mysqli_num_rows($studentresult) > 0) {

                                                while ($row = mysqli_fetch_assoc($studentresult)) {
                                                    $first = $row['firstName'];
                                                    $second = $row['lastName'];
                                                    $id = $row['id'];
                                                    echo"<option value=$id>$first&nbsp$second</option>";
                                                }
                                            }
                                            
                                    echo "</select></p>
                                            <button class='btn btn-success' type='submit' name='upload' style='float:right; margin-top:0.5rem;'>Remove the Students</button>
                                            </form>
                                            </div>
                                            </div>";    
                            
                                    echo "<div class='card' id='myadmincard'>
                                        <h4 class='card-title' id='admincardtitle' >Remove instructors from a Module</h4>
                                            <div class='card-body' id='admincardbodypd1'>
                                            <form method='POST' action='instructormoduleremove.php' enctype='multipart/form-data'>
                                            <input type='hidden' name='moduleCode' value='$moduleid'>
                                            <p id='pd1'><strong>Select the Instructor(s) :</strong><select multiple='multiple' class='form-control' id='selectInstructors' name='instructor[]'>";
       
                                            
                                                    $instructoremovequery = "SELECT vleUsers.id, vleUsers.firstName, vleUsers.lastName FROM vleUsers JOIN vleTeacherTeaches WHERE vleTeacherTeaches.moduleCode = '$moduleid' AND vleUsers.userType = 2 AND vleUsers.id = vleTeacherTeaches.teacherID";
                                                    $instructoremoveresult = mysqli_query($conn, $instructoremovequery) or die(mysqli_error($conn));
                                       
                                       
                                                        if (mysqli_num_rows($instructoremoveresult) > 0) {

                                                            while ($row = mysqli_fetch_assoc($instructoremoveresult)) {
                                                                $first = $row['firstName'];
                                                                $second = $row['lastName'];
                                                                $id = $row['id'];
                                                                echo"<option value=$id>$first&nbsp$second</option>";
                                                            }
                                                        }

                                    echo "</select></p>
                                    <button class='btn btn-success' type='submit' name='upload' style='float:right; margin-top:0.5rem;'>Remove the Instructors</button>
                                    </form>
                                    </div>
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