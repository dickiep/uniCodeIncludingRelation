<?php
session_start();

include 'connections/conn.php';

if (!isset($_SESSION["admin"])){
    header('Location: logout.php');
} else {
    $email = $_SESSION["admin"];
    $query = "select firstName from vleUsers where emailAddress = '$email'";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    if(mysqli_num_rows($result)>0) {
        while($row=mysqli_fetch_assoc($result)) {
            $first=$row['firstName'];
        }
    }   
}

mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang ="en">

<head>
    <title>Administrator's Homepage</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
                        
                        <h3>What would you like to do <?php echo"$first?"?></h3>
                        <ol class="breadcrumb" id="mybreadcrumb">
                            <li>
                                <a href="index.php">Home&nbsp;</a>
                            </li>
                            <li>
                            <i class="fas fa-angle-double-right" style="color:#0077c2;"></i>
                            </li>
                            <li>
                                <a href="admin.php" style="color:#0077c2;">&nbsp;Admin</a>
                            </li>
                        </ol>
                    <div class="container-fluid">  
                    <div class="row">
                        
                     
                        
                        <div class='card' id='myindexcard'>
                            <i class="fas fa-user-plus fa-10x cardicon"></i>
                                <div class='card-body'>
                                    <h5 class='card-title'>Add a New User to vlite</h5>
                                            <p class='card-text'>Use the link below to add a new student or instructor.</p>
                                            <a href='newuser.php' class='btn btn-primary'>New User</a>
                                </div>
                        </div>
                        
                         <div class='card' id = 'myindexcard'>
                             <i class="fas fa-book fa-10x cardicon"></i>

                                <div class='card-body'>
                                    <h5 class='card-title'>Manage vlite Modules</h5>
                                            <p class='card-text'>Add a new Module to the system and add students or instructors to a module.</p>
                                            <a href='createamodule.php' class='btn btn-primary'>Manage Modules</a>
                                </div>
                        </div>
                        
                         <div class='card' id = 'myindexcard'>                             
                                <i class="far fa-edit fa-10x cardicon"></i>
                            
                                <div class='card-body'>
                                    <h5 class='card-title'>Edit vlite Modules</h5>
                                            <p class='card-text'>Edit and existing Module and remove students or instructors from a module.</p>
                                            <a href='editamodule.php' class='btn btn-primary'>Edit Module(s)</a>
                                </div>
                        </div>
                        
                        <div class='card' id = 'myindexcard'>                        
                                <i class="fas fa-trash-alt fa-10x cardicon"></i>
                            
                                <div class='card-body'>
                                    <h5 class='card-title'>Edit and Delete Users</h5>
                                            <p class='card-text'>Use the link below to edit and delete Users.</p>
                                            <a href='listusers.php' class='btn btn-primary'>Edit &amp; Delete Users</a>
                                </div>
                        </div>
                        
                        <div class='card' id = 'myindexcard'>                        
                                <i class="fas fa-trash fa-10x cardicon"></i>
                            
                                <div class='card-body'>
                                    <h5 class='card-title'>Delete Modules</h5>
                                            <p class='card-text'>Use the link below to delete Modules.</p>
                                            <a href='listallmodules.php' class='btn btn-primary'>Delete Modules</a>
                                </div>
                        </div>
                        
                        <div class='card' id = 'myindexcard'>                        
                                <i class="fas fa-trash fa-10x cardicon"></i>
                            
                                <div class='card-body'>
                                    <h5 class='card-title'>Delete Modules</h5>
                                            <p class='card-text'>Use the link below to delete Modules.</p>
                                            <a href='listallmodules.php' class='btn btn-primary'>Delete Modules</a>
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
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            
            $("#wrapper").toggleClass("menuDisplayed");
        });
    </script>
    
 

</body>
</html>