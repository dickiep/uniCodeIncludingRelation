<?php
session_start();

$teacher = isset($_SESSION["teacher_40056370"]);
$teacherName = $_SESSION["teacher_40056370"];


?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>My Modules</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <link rel="stylesheet" href ="../styles/mystyles.css">


        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    </head>
    <body>
         <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="index.php">thePriv</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">Students</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Teachers</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="adminindex.php" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Admin
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="listusers.php">Users</a>
                            <a class="dropdown-item" href="adduser.php">Add a User</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="logout" href="logout.php"><strong>Logout</strong></a>
                    </li>
                </ul>
            </div>
        </nav>
        
        <div id = "main">
        
        
    <?php
        if ($teacher) {
            include ('../connections/conn.php');

            $query = "select * from vleModules join vleTeacherTeaches on vleModules.moduleCode = vleTeacherTeaches.moduleCode join vleUsers on vleTeacherTeaches.teacherID=vleUsers.id where vleUsers.emailAddress='$teacherName'";

            $moduleresult = mysqli_query($conn, $query) or die(mysqli_error($conn));



            while ($rows = mysqli_fetch_assoc($moduleresult)) {

                $moduleCode = $rows['moduleCode'];
                $moduleName = $rows['moduleName'];
                $rowid = $rows['id'];

                echo "<div class='container-fluid'>
                      <table class='table table-hover'>
                        <thead>
                          <tr>
                            <th scope='col'>Instructor ID</th>
                            <th scope='col'>Module Code</th>
                            <th scope='col'>Module Name</th>
                            <th scope='col'></th>
                          </tr>
                        </thead>

                        <tbody>
                        <tr>
                            <th scope='row'>$rowid</th>
                            <td>$moduleCode</td>
                            <td>$moduleName</td>

                        </tr>
                        </tbody>
                      </table>
                </div>";
            }
            mysqli_close($conn);
        }
    ?>
        </div>
    </body>
</html>
