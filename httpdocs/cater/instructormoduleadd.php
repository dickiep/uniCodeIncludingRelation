<?php
session_start();

include 'connections/conn.php';

if (!isset($_SESSION["admin"])){
    header('Location: index.php');
} else {
    

    
    $instructorquery = "select * from vleUsers where userType = '2';";
    $instructorresult = mysqli_query($conn, $instructorquery) or die(mysqli_error($conn));
    
    $modulequery = "select * from vleModules;";
    $moduleresult = mysqli_query($conn, $modulequery) or die(mysqli_error($conn));
    
  
}

?>

  

<!DOCTYPE html>
<html lang ="en">

<head>
    <title>Add a New User</title>
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
                        
                        <h3>Add a New User</h3>
                        <nav aria-label="breadcrumb">
                        <ol class="breadcrumb" id="mybreadcrumb">
                            <li class="breadcrumb-item">
                                <a href="index.php">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="admin.php">Admin</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Add an Instructor to a Module
                            </li>
                        </ol>
                        
                        
                        
                <form method="POST" action="instructormoduleadd.php" enctype="multipart/form-data">
                    <br>
                    
                    <div class="form-group">
                        <label for="Instructor">Please select the instructor</label>
                        <select class="form-control" id="Instructor" name='instructor'>
                            
                            <?php if(mysqli_num_rows($instructorresult)>0) {
                                
                                
                                while($row=mysqli_fetch_assoc($instructorresult)) {
                                    $first=$row['firstName'];
                                    $second =$row['lastName'];
                                    $id = $row['id'];
                                    echo"<option value=$id>$first&nbsp$second</option>";
                                    
                                    }
                            }?>
                          
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlSelect2">Which modules would you like to add them to?</label>
                        <select multiple="multiple" class="form-control" id="module" name='module[]'>
                          <?php if(mysqli_num_rows($moduleresult)>0) {
                                
                                
                                while($row=mysqli_fetch_assoc($moduleresult)) {
                                    $code=$row['moduleCode'];
                                    
                                    echo"<option value=$code>$code</option>";
                                    
                                    }
                            }?>
                        </select>
                      </div>

                   

                    <div>
                        <button class="btn btn-primary" type="submit" name="upload">Add Instructor to Module(s)</button>
                    </div>
                    
                </form>
                            </div>
                        </div>
           </div>
            </div>  
        </div>
        </div>
    
    
    <?php         if (isset($_POST['upload'])) {
                
                    $instructor = mysqli_real_escape_string($conn, $_POST['instructor']);
                    $module =  $_POST['module'];
                    
                    
                    if ((!empty($instructor)) && (!empty($module))) {
                        
                        foreach ($module as $m) {
                            
                            $query = "insert into vleTeacherTeaches(moduleCode, teacherID) values ('".mysqli_real_escape_string($conn,$m)."', '$instructor')";

                        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                            
                        }

                        

                        echo "Great $first is now an instructor for $name";
                    } else {
                        echo "Sorry that one hasn't worked, please try it again.";
                        
                              
                    }

                mysqli_close($conn);
    } ?>
    
      <!--script to toggle the side menu-->
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            
            $("#wrapper").toggleClass("menuDisplayed");
        });
    </script>
                

</body>
</html>