<?php
session_start();

include 'connections/conn.php';

if (isset($_SESSION["student"])) {
    $email = $_SESSION["student"];
    $query = "select * from vleModules join vleStudentTakes on vleModules.moduleCode = vleStudentTakes.moduleCode join vleUsers on vleStudentTakes.studentID=vleUsers.id join vleTeacherTeaches on vleStudentTakes.moduleCode = vleTeacherTeaches.moduleCode where vleUsers.emailAddress='$email'";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
} else if (isset($_SESSION["admin"])) {
    $email = $_SESSION["admin"];
    $query = "select * from vleModules join vleStudentTakes on vleModules.moduleCode = vleStudentTakes.moduleCode join vleUsers on vleStudentTakes.studentID=vleUsers.id where vleUsers.emailAddress='$email'";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
} else if (isset($_SESSION["instructor"])) {
    $email = $_SESSION["instructor"];
    $query = "select * from vleModules join vleTeacherTeaches on vleModules.moduleCode = vleTeacherTeaches.moduleCode join vleUsers on vleTeacherTeaches.teacherID=vleUsers.id where vleUsers.emailAddress='$email'";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
} else {

    header('Location: login.php');
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang ="en">

    <head>
        <title>Messenger</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="css/mystyle.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css" integrity="sha384-5SOiIsAziJl6AWe0HWRKTXlfcSHKmYV4RBF18PPJ173Kzn7jzMyFuTtk8JA7QQG1" crossorigin="anonymous">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src=https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js></script>
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

                            <h1>Messenger</h1>
                            <ol class="breadcrumb" id="mybreadcrumb">
                                <li>
                                    <a href="index.php" id="breadcrumbitem">Home&nbsp;</a>
                                </li>
                                <li>
                                    <i class="fas fa-angle-double-right" id="breadcrumbitem"></i>
                                </li>
                                <li>
                                    <a href="messenger.php" class="active" id="breadcrumbitem">&nbsp;Messenger</a>
                                </li>
                            </ol>

                            <div class="row">
                                <div class="col-md-5">

                                    <h3>Your Class Chats</h3>

                                    <table class='table table-hover'> 

                                        <thead>
                                            <tr>
                                                <th scope='col'>Module Code</th>
                                                <th scope='col'>Module Name</th>
                                                <th scope='col'></th>
                                            </tr>
                                        </thead>

                                            <?php
                                            include 'connections/conn.php';

                                            if (mysqli_num_rows($result) > 0) {
                                                $moduleCodeNumber = 0;
                                                
                                                while ($row = mysqli_fetch_assoc($result)) {

                                                    $moduleCode = $row['moduleCode'];
                                                    $moduleName = $row['moduleName'];
                                                    $rowid = $row['id'];                                                   

                                                    //module code array for use with the email to class system
                                                    $moduleCodeArray[$moduleCodeNumber] = $row['moduleCode'];
                                                    $moduleCodeNumber++;

                                           echo "<tbody>
                                                    <tr>
                                                        <td>$moduleCode</td>
                                                        <td>$moduleName</td>
                                                        <td align='center'>
                                                           <a href='modulediscussionboard.php?module=$moduleCode'>View Class Chat</a>
                                                        </td>
                                                    </tr>";
                                                }
                                            }
                                            mysqli_close($conn);
                                            ?>
                                    </table> 
                                </div>

                                <div class="col-md-5 offset-md-1">

                                        <?php
                                        include 'connections/conn.php';
                                        
                                        if (isset($_SESSION["student"])) {
                                            $studentemail = $_SESSION["student"];
                                            $studentquery = "select * from vleModules join vleStudentTakes on vleModules.moduleCode = vleStudentTakes.moduleCode join vleUsers on vleStudentTakes.studentID=vleUsers.id join vleTeacherTeaches on vleStudentTakes.moduleCode = vleTeacherTeaches.moduleCode where vleUsers.emailAddress='$studentemail'";
                                            $studentresult = mysqli_query($conn, $studentquery) or die(mysqli_error($conn));

                                            echo '<h3>Email your Instructors</h3>';
                                            if (mysqli_num_rows($studentresult) > 0) {
                                                $instructorCounter = 0; 

                                                while ($row = mysqli_fetch_assoc($studentresult)) {
                                                    $instructorid[$instructorCounter] = $row['teacherID'];                                                   
                                                    $instructorCounter++;
                                                    
                                                }                                               
                                                foreach($instructorid as $aninstructor) {
                                                    $instructorquery = "select * from vleUsers where id = $aninstructor";
                                                    $instructorresult = mysqli_query($conn, $instructorquery) or die(mysqli_error($conn));
                                                    
                                                    if (mysqli_num_rows($instructorresult) > 0) {
                                                
                                                
                                                        while ($row = mysqli_fetch_assoc($instructorresult)) {
                                                            $name = $row['firstName'];
                                                            $email = $row['emailAddress'];
                                                            echo"<div class='col-xs-5'>
                                                                    <div class='card' id = 'mymessengercard'>
                                                                        <i class='fas fa-envelope fa-10x myicon'></i>
                                                                            <div class='card-body'>
                                                                                <h5 class='card-title'>Mail $name</h5>
                                                                                <p class='card-text'>Use the link below to privately email your module instructor.</p>
                                                                                <a href='mailto: $email' class='btn btn-primary'>Email your instructor</a>
                                                                            </div>
                                                                    </div>
                                                                </div>";           
                                                        }
                                                    }                                              
                                                }

                                            if (mysqli_num_rows($instructorresult) > 0) {
                                                $instructorNumber = 0;
                                                
                                                while ($row = mysqli_fetch_assoc($instructorresult)) {
                                                    $name[$instructorNumber] = $row['firstName'];
                                                    $email[$instructorNumber] = $row['emailAddress'];
                                                    $instructorNumber++;
        
                                                }
                                            }                                           
                                        }
                                    } elseif (isset($_SESSION["instructor"])) {
                                        
                                        include 'connections/conn.php';

                                        echo '<h3>Email your Class</h3>';

                                            foreach ($moduleCodeArray as $moduleCodeElement) {

                                                $classquery = "SELECT moduleCode, emailAddress FROM vleUsers JOIN vleStudentTakes ON vleUsers.id = vleStudentTakes.studentID WHERE vleStudentTakes.moduleCode = '$moduleCodeElement'";
                                                $classresult = mysqli_query($conn, $classquery) or die(mysqli_error($conn));

                                                if (mysqli_num_rows($classresult) > 0) {
                                                    $count = 0;
                                                    
                                                    while ($row = mysqli_fetch_assoc($classresult)) {

                                                        $name[$count] = $row['moduleCode'];
                                                        $email = $row['emailAddress'];
                                                        $classEmails[$count] = "$email; ";
                                                        $count++;
                                                        
                                                    }

                                                    echo"<div class='col-xs-5'>
                                                            <div class='card' id = 'mymessengercard'>
                                                                <i class='fas fa-envelope fa-10x myicon'></i>
                                                                <div class='card-body'>
                                                                    <h5 class='card-title'>Mail $moduleCodeElement</h5>
                                                                    <p class='card-text'>Use the link below to privately email your class.</p>
                                                                    <a href='mailto: ";
                                                    
                                                    foreach ($classEmails as $classEmail) {
                                                        $to = $classEmail;
                                                        echo"$to";
                                                    }

                                                    echo"' class='btn btn-primary'>Email your class</a>
                                                           </div>
                                                        </div>
                                                     </div>";
                                                }
                                            }
                                            mysqli_close($conn);
                                        }
                                        ?>
                                </div>
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