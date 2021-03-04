<?php
session_start();

include 'connections/conn.php';

if (!isset($_SESSION["admin"])){
    header('Location: index.php');
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


?>

<!DOCTYPE html>
<html lang ="en">

<head>
    <title>Add a New Module</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src=https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js></script>
    <link rel="stylesheet" href="css/mystyle.css"> 
    <link rel="stylesheet" href="css/newuser.css">
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
                        
                        <h3>Add a New Module</h3>
                        <nav aria-label="breadcrumb">
                        <ol class="breadcrumb" id="mybreadcrumb">
                            <li class="breadcrumb-item">
                                <a href="index.php">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="admin.php">Admin</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                New Module
                            </li>
                        </ol>
                        
                        
                        
                <form method="POST" action="newmodule.php" enctype="multipart/form-data">
                    <br>
                    

                   <div class="form-row">
                        <div class="col-md-4 mb-3">
                          <label for="moduleCode">Module Code</label>
                          <input type="text" class="form-control" name='moduleCode' id="moduleCode" placeholder="Module Code" required>
                        </div>

                           <div class="col-md-4 mb-3">
                          <label for="moduleName">Module name</label>
                          <input type="text" class="form-control" name='moduleName' id="moduleName" placeholder="Module name" required>

                        </div>

                        <div class="col-md-4 mb-3">
                            
                        </div> 
                    </div>
                    
                    <div class="form-row">
                    
                        <div class="form-group">
                            <label for="moduleInfo">Module Info</label>
                            <textarea class="form-control" name='moduleInfo' id='moduleInfo' placeholder="Description of the module" rows="3" required></textarea>
    
                        </div>   
                         
                    </div>


                    <div>
                        <button class="btn btn-primary" type="submit" name="upload">Create Module</button>
                    </div>
                    
                </form>
           </div> 
            </div>  
        </div>
        


        <?php
        if (isset($_POST['upload'])) {
                //upload the firstName, lastName, email and user type
                    $moduleCode = mysqli_real_escape_string($conn, $_POST['moduleCode']);
                    $moduleName = mysqli_real_escape_string($conn, $_POST['moduleName']);
                    $moduleInfo = mysqli_real_escape_string($conn, $_POST['moduleInfo']);
                    
                    if ((!empty($moduleCode)) && (!empty($moduleName)) && (!empty($moduleInfo))) {

                        
                        mysqli_query($conn, "START TRANSACTION");

                        $resultOne = mysqli_query($conn, "INSERT INTO vleModules (moduleCode, moduleName) VALUES ('$moduleCode', '$moduleName');") or die(mysqli_error($conn));
                        
                        $resultTwo = mysqli_query($conn, "INSERT INTO vleModuleInfo (moduleCode, description) VALUES ('$moduleCode', '$moduleInfo');") or die(mysqli_error($conn));
                        
                        mysqli_commit($conn);
                        
                        
                        $curdir = getcwd();
                        
                        mkdir($curdir."/moduleresources/$moduleCode", 0777);


                        echo "Great $moduleName has been added to the system";
                    } else {
                        echo "Apologies, that hasn't worked. Please g ive it another go.";
                                
                    }
                
                }

                mysqli_close($conn);
                
                ?>
                        
                        
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