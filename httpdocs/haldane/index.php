<?php

?>
<!DOCTYPE html>
<html lang ="en">

<head>
    <title>Home</title>
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
                <img src="img/logo.png" alt="logo" class = "owlfavicon">
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
                <h3>&nbsp;&nbsp;Menu</h3>
                <li><a href="#">Processing</a></li>
                <li><a href="#">Enquiries</a></li>
                <li><a href="#">Reports</a></li>
            </ul>
        </div>
        
        
        <!--page content-->
        
        <div id="content-wrapper">
            <div class = "container-fluid">
                <div class ="row">
                    <div class = "col-lg-12">
                        
                        <h1>Welcome to K8 Training</h1>
                        <ol class="breadcrumb" id="mybreadcrumb">
                            <li>
                                <a href="index.php">Home</a>
                            </li>
                        </ol>
                        
                        <h4 style="margin-bottom: 1rem;">What would you like to do?</h4>
                        
                        <div class="row">
                        
                            <div class='card' id = 'myindexcard'>
                                <video width="auto" height="200" controls>
                                    <source src="vid/test.mp4" type="video/mp4">
                                    <source src="movie.ogg" type="video/ogg">
                                    Your browser does not support the video tag.
                                    </video>
                                

                                    <div class='card-body'>
                                        <h5 class='card-title'>Test video as an example</h5>
                                                <a href='#' class='btn btn-primary'>Documentation link</a>
                                    </div>
                            </div>

                            <div class='card' id = 'myindexcard'>

                                <i class="fas fa-comments fa-10x cardicon"></i>

                                    <div class='card-body'>
                                        <h5 class='card-title'>Send your class or instructor a message</h5>
                                        <a href='messenger.php' class='btn btn-primary'>Messenger</a>
                                    </div>
                            </div>
                            
                             <div class='card' id = 'myindexcard'>
                                <i class="fas fa-briefcase fa-10x cardicon"></i>

                                    <div class='card-body'>
                                        <h5 class='card-title'>View and edit administrative details</h5>
                                        <a href='admin.php' class='btn btn-primary'>Admin</a>
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