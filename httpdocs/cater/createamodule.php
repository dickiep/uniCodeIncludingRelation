<?php
session_start();

include 'connections/conn.php';


if (isset($_SESSION["admin"])) {
    
    $studentquery = "select * from vleUsers where userType = '1';";
    $studentresult = mysqli_query($conn, $studentquery) or die(mysqli_error($conn));
    
    $modulequery = "select * from vleModules";
    $moduleresult = mysqli_query($conn, $modulequery) or die(mysqli_error($conn));
    
    $instructorquery = "select * from vleUsers where userType = '2';";
    $instructorresult = mysqli_query($conn, $instructorquery) or die(mysqli_error($conn));
    
    $modulequerytwo = "select * from vleModules;";
    $moduleresulttwo = mysqli_query($conn, $modulequerytwo) or die(mysqli_error($conn));
    
} else if (isset($_SESSION["instructor"])) {
    $email = $_SESSION["instructor"];
    $query = "SELECT * FROM vleUsers JOIN vleUserTypes ON vleUsers.userType = vleUserTypes.idUserType WHERE emailAddress = '$email'";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $first = $row['firstName'];
            $last = $row['lastName'];
            $mail = $row['emailAddress'];
            $userType = $row['userTypeDescription'];
            $rowid = $row['id'];
        }
    }
  
    $studentquery = "select * from vleUsers where userType = '1';";
    $studentresult = mysqli_query($conn, $studentquery) or die(mysqli_error($conn));
    
    $modulequery = "select * from vleModules";
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
        <title>Add and Manage Modules</title>
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

                            <h1>Add and Manage Modules</h1>
                            <ol class="breadcrumb" id="mybreadcrumb">
                                <li>
                                    <a href="index.php" id="breadcrumbitem">Home&nbsp;</a>
                                </li>
                                <li>
                                    <i class="fas fa-angle-double-right" id="breadcrumbitem"></i>
                                </li>
                                <li>
                                    <a href="admin.php" id="breadcrumbitem">&nbsp;Admin&nbsp;</a>
                                </li>
                                <li>
                                    <i class="fas fa-angle-double-right" id="breadcrumbitem"></i>
                                </li>
                                <li>
                                    <a href="#" id="breadcrumbitem">&nbsp;Add and Manage Modules</a>
                                </li>
                            </ol>
                            
                                <div class="row">
                                    <?php

                                     echo "<div class='card' id='myadmincard'>
                                         <h4 class='card-title' id='admincardtitle'>Add a New Module</h4>
                                            <div class='card-body' id='admincardbodypd1'>                                           
                                                <form method='POST' action='addanewmodule.php' enctype='multipart/form-data'>                                          
                                                    <p id='pd1'><strong>Module Code :</strong><input type='text' class='form-control' name='moduleCode' id='moduleCode' placeholder='Module Code' required></p>                                                                                      
                                                    <p id='pd1'><strong>Module Name :</strong><input type='text' class='form-control' name='moduleName' id='moduleName' placeholder='Module name' required></p>                                                                                       
                                                    <p id='pd1'><strong>Module Description :</strong><input type='text' class='form-control' name='moduleInfo' id='moduleInfo' placeholder='Description of the module' required></p>                                             
                                                    <button class='btn btn-success' type='submit' name='upload' style='float: right;'>Create the Module</button>
                                                </form>";
                                     
                                        if (isset($_SESSION['moduleAdditionSuccess'])) {
                                            $additionSuccess = $_SESSION['moduleAdditionSuccess'];
                                            echo "<p id = 'sessionSuccess'><br /><br />$additionSuccess</p>";
                                            unset($_SESSION['moduleAdditionSuccess']);
                                        }

                                        if (isset($_SESSION['moduleAdditionFailure'])) {
                                            $additionFailure = $_SESSION['moduleAdditionFailure'];
                                            echo "<p id = 'sessionFailure'><br /><br />$additionFailure</p>";
                                            unset($_SESSION['moduleAdditionFailure']);
                                        }
   
                                    echo "</div>
                                       </div>";
                                    
        
                                    
                                    echo "<div class='card' id='myadmincard'>
                                        <h4 class='card-title' id='admincardtitle' >Add Students to a Module</h4>
                                            <div class='card-body' id='admincardbodypd1'>
                                                <form method='POST' action='addstudentstoamodule.php' enctype='multipart/form-data'>
                                                    <p id='pd1'><strong>Select the Module :</strong><select class='form-control' id='module' name='module'>";

                                                    if (mysqli_num_rows($moduleresult) > 0) {
                                                        while ($row = mysqli_fetch_assoc($moduleresult)) {
                                                            $code = $row['moduleCode'];
                                                            echo"<option value=$code>$code</option>";
                                                        }
                                                    }                                            

                                       echo "</select></p>
                                             <p id='pd1'><strong>Select the Student(s - using ctrl) :</strong><select multiple='multiple' class='form-control' id='student' name='student[]'>";                                           
                                            if (mysqli_num_rows($studentresult) > 0) {

                                                while ($row = mysqli_fetch_assoc($studentresult)) {
                                                    $first = $row['firstName'];
                                                    $second = $row['lastName'];
                                                    $id = $row['id'];
                                                    echo"<option value=$id>$first&nbsp$second</option>";
                                                }
                                            }
                                            
                                        echo "</select></p>
                                        <button class='btn btn-success' type='submit' name='upload' style='float:right; margin-top:0.5rem;'>Add the Students</button>
                                        </form>";    
                                            
                                    
                                    if (isset($_SESSION['success'])) {
                                        echo '<p id="sessionSuccess"><br />' . $_SESSION['success'] . "</p>\n";
                                        unset($_SESSION['success']);
                                    }

                                    if (isset($_SESSION['error'])) {
                                        echo '<p id="sessionSuccess"><br />' . $_SESSION['error'] . "</p>\n";
                                        unset($_SESSION['error']);
                                    }
                                    
                                    echo "</div>
                                       </div>";
                            
                                    echo "<div class='card' id='myadmincard'>
                                        <h4 class='card-title' id='admincardtitle' >Add instructors to a Module</h4>
                                            <div class='card-body' id='admincardbodypd1'>
                                            <form method='POST' action='instructormoduleadder.php' enctype='multipart/form-data'>
                                            <p id='pd1'><strong>Select the Instructor :</strong><select class='form-control' id='instructor' name='instructor'>";

                                            if(mysqli_num_rows($instructorresult)>0) {

                                                while($row=mysqli_fetch_assoc($instructorresult)) {
                                                    $first=$row['firstName'];
                                                    $second =$row['lastName'];
                                                    $id = $row['id'];
                                                    echo"<option value=$id>$first&nbsp;$second</option>";
                                                    }
                                                }

                                       echo "</select></p>
                                             <p id='pd1'><strong>Select the Module(s) :</strong><select multiple='multiple' class='form-control' id='module' name='module[]'>";
                                            
                                            if(mysqli_num_rows($moduleresulttwo)>0) {                                                             
                                                while($row=mysqli_fetch_assoc($moduleresulttwo)) {
                                                    $code=$row['moduleCode'];
                                                    echo"<option value=$code>$code</option>";
                                                    }
                                            }
                                            
                                        echo "</select></p>
                                        <button class='btn btn-success' type='submit' name='upload' style='float:right; margin-top:0.5rem;'>Add the Instructors</button>
                                        </form>";                                                
                                    
                                    if (isset($_SESSION['successInstructor'])) {
                                        echo '<p id="sessionSuccess">' . $_SESSION['successInstructor'] . "</p>\n";
                                        unset($_SESSION['successInstructor']);
                                    }

                                    if (isset($_SESSION['errorInstructor'])) {
                                        echo '<p id="sessionSuccess">' . $_SESSION['errorInstructor'] . "</p>\n";
                                        unset($_SESSION['errorInstructor']);
                                    }
                                    
                                    echo "</div>
                                       </div>";
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