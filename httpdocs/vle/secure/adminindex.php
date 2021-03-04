<?php
session_start();

if(!isset($_SESSION["admin_40056370"])) {
    header("Location: login.php");
}

include '../connections/conn.php';

?>

<!DOCTYPE html>

<html>

    <head>
        <meta charset="UTF-8">
        <title>Add a user</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <link rel="stylesheet" href ="../styles/mystyles.css">


        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    </head>
    <body>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">thePriv</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pricing</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
            
            
            <div id = "mainheader2">
                Admin Menu              
            </div>
            
            <?php
            $name = $_SESSION["admin_40056370"];
            echo "<p>Logged in as : $name </p>";
            ?>
            
            <a href="listusers.php">
                <div class='adminimg'>
      
                    <img src='../img/placeholder.png' width='150px'/><br>
                    <span>List Users</span>
                </div>
            </a>
            
            <a href="adduser.php">
                <div class='adminimg'>
                    
                    <img src='../img/placeholder.png' width='150px'/><br>
                    <span>Add a User</span>
                </div>
            </a>
            
            <a href="#">
                <div class='adminimg'>
                    
                    <img src='../img/placeholder.png' width='150px'/>
                    <span>Another action</span>
                </div>
            </a>
            
            <a href="#">
                <div class='adminimg'>
                    
                    <img src='../img/placeholder.png' width='150px'/>
                    <span>Another action</span>
                </div>
            </a>
                
            <div class="clearfloat"> </div>  
            
            <!-- End of main content -->
            
        </div>
        
        
        
    <footer class="footer">
      <div class="container">
        <span class="text-muted">Ma Footer</span>
      </div>
    </footer>

        
    </body>
    
    
    
</html>
