<?php
session_start();
include ('connections/conn.php');

if (isset($_SESSION["instructor"])) {
    
    $teacherName = $_SESSION["instructor"];
    $query = "select * from vleModules join vleTeacherTeaches on vleModules.moduleCode = vleTeacherTeaches.moduleCode join vleUsers on vleTeacherTeaches.teacherID=vleUsers.id where vleUsers.emailAddress='$teacherName'";
    $moduleresult = mysqli_query($conn, $query) or die(mysqli_error($conn));
} else if (isset($_SESSION["student"])) {
    header('Location: liststudentmodules.php');
} else if (isset($_SESSION["admin"])) {
    $query = "select * from vleModules";
    $moduleresult = mysqli_query($conn, $query) or die(mysqli_error($conn));
} else {
    header('Location: logout.php');
}
?>
<!DOCTYPE html>
<html lang ="en">

    <head>
        <title>Modules</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css" integrity="sha384-5SOiIsAziJl6AWe0HWRKTXlfcSHKmYV4RBF18PPJ173Kzn7jzMyFuTtk8JA7QQG1" crossorigin="anonymous">
        <link rel="stylesheet" href="css/mystyle.css">

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

                            <h1>Your Modules</h1>
                            <ol class="breadcrumb" id="mybreadcrumb">
                                <li>
                                    <a href="index.php" id='breadcrumbitem'>Home&nbsp;</a>
                                </li>
                                <li>
                                    <i class="fas fa-angle-double-right" id='breadcrumbitem'></i>
                                </li>
                                <li>
                                    <a href="listmodules.php" id='breadcrumbitem'>&nbsp;Resources</a>
                                </li>
                            </ol>

                            <div class="row">
                                <div class="col-md-6" style="margin-top: 1rem;">
                                    <?php
                                    echo "<table class='table table-hover'>
                                              <thead>
                                                <tr>
                                                  <th scope='col'>Module Code</th>
                                                  <th scope='col'>Module Name</th>
                                                  <th scope='col'>Module Resources</th>
                                                </tr>
                                              </thead>";


                            while ($rows = mysqli_fetch_assoc($moduleresult)) {

                                $moduleCode = $rows['moduleCode'];
                                $moduleName = $rows['moduleName'];
                                //$rowid = $rows['id'];

                                echo "<tbody>
                                        <tr>
                                            <td>$moduleCode</td>
                                            <td>$moduleName</td>
                                            <td align='left'>
                                                <a href='viewModuleResources.php?id=$moduleCode'>View /</a>
                                                <a href='addmoduleresources.php?id=$moduleCode'> Add</a>
                                            </td>
                                        </tr>";
                            }

                                        echo" </tbody>
                                          </table>";
                                        
                                    mysqli_close($conn);
                                    
                                    ?>
                                </div>

                                <div class="col-md-5">
                                    <div class="row">
                                        <div class='card' id = 'mycard'>
                                            <i class="fas fa-book fa-10x cardicon"></i>

                                            <div class='card-body'>
                                                <h5 class='card-title'>Add a Module &amp; add users to a module</h5>
                                                <a href='createamodule.php' class='btn btn-primary'>New Module</a>
                                            </div>
                                        </div>

                                        <div class='card' id = 'mycard'>

                                            <i class="fas fa-university fa-10x cardicon"></i>

                                            <div class='card-body'>
                                                <h5 class='card-title'>Edit a Module &amp; remove users from a module</h5>
                                                <a href='editamodule.php' class='btn btn-primary'>Edit a Module</a>
                                            </div>
                                        </div>
                                        
                                        <div class='card' id = 'mycard'>
  
                                            <i class="fas fa-question fa-10x cardicon"></i>

                                            <div class='card-body'>
                                                <h5 class='card-title'>Create a quiz for one of your Modules</h5>
                                                <a href='createquiz.php' class='btn btn-primary'>Create a quiz</a>
                                            </div>
                                        </div>
                                        
                                        
                                        <div class='card' id = 'mycard'>
                                            <i class="fas fa-envelope fa-10x cardicon"></i>

                                            <div class='card-body'>
                                                <h5 class='card-title'>Mail your Admin to add users &amp; delete Modules</h5>
                                                <a <?php echo"href='mailto: pdickie01@qub.ac.uk'";?> class='btn btn-primary'>Email your Admin</a>
                                            </div>
                                        </div>
                                        
                                    </div> 
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