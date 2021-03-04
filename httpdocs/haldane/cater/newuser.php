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
    <title>Add a New User</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src=https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js></script>
    <link rel="stylesheet" href="css/mystyle.css"> 
    <link rel="stylesheet" href="css/newuser.css">
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
                        
                        <h3>Add a New User</h3>
                        <nav aria-label="breadcrumb">
                        <ol class="breadcrumb" id="mybreadcrumb">
                            <li class="breadcrumb-item">
                                <a href="index.php">Home&nbsp;</a>
                            </li>
                            <li>
                                <i class="fas fa-angle-double-right" id='breadcrumbitem'></i>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="admin.php">&nbsp;Admin&nbsp;</a>
                            </li>
                            <li>
                                <i class="fas fa-angle-double-right" id='breadcrumbitem'></i>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                <a href="#">&nbsp;New User</a>
                            </li>
                        </ol>
                        
                        
                        
                <form method="POST" action="newuser.php" enctype="multipart/form-data">
                    <br>
                    

                   <div class="form-row">
                        <div class="col-md-4 mb-3">
                          <label for="firstName">First name</label>
                          <input type="text" class="form-control" name='firstName' id="firstName" placeholder="First name" required>
                        </div>

                           <div class="col-md-4 mb-3">
                          <label for="lastName">Family name</label>
                          <input type="text" class="form-control" name='lastName' id="lastName" placeholder="Family name" required>

                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="emailAddress">Email Address</label>
                            <input type="email" class="form-control" name='emailAddress' id='emailAddress' placeholder="Email Address" required>
                        </div> 
                    </div>
                    
                    <div class="form-row">
                    
                        <div class="col-md-4 mb-3">
                            <label for="pword">Password</label>
                            <input type="password" class="form-control" name='pword' id='pword' placeholder="Password" required>
                        </div>
                        <br>
                        <div class="col-md-4 mb-3">
                            
                        <p>Account Type</p>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="userType" id="Student" value="1">
                              <label class="form-check-label" for="Student">Student</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="userType" id="Teacher" value="2">
                              <label class="form-check-label" for="Teacher">Instructor</label>
                            </div>
                            

                        </div>
                    
                       
                         
                    </div>
                     
                    
                    <div class="form-row">
                        <input type="hidden" name="size" value="1000000">
                        <div class="">
                            <label for="userImage">Upload a User Image : </label>
                            <input type="file" class="" name="image" id='userImage'>  
                        </div>
                    
                    </div>
                    <br>

                    <div>
                        <button class="btn btn-primary" type="submit" name="upload">Create User</button>
                    </div>
                    
                </form>
           
            </div>  
        </div>
        <br><br>


        <?php
        if (isset($_POST['upload'])) {
                //upload the firstName, lastName, email and user type
                    $pword = mysqli_real_escape_string($conn, $_POST['pword']);
                    $email = mysqli_real_escape_string($conn, $_POST['emailAddress']);
                    $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
                    $lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
                    $userType = mysqli_real_escape_string($conn, $_POST['userType']);
                    
                    if ((!empty($firstName)) && (!empty($lastName)) && (!empty($email)) && (!empty($userType) && (!empty($pword)))) {

                        $query = "insert into vleUsers(firstName, lastName, emailAddress, userType, pword) values ('$firstName','$lastName','$email','$userType', MD5('$pword'))";

                        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

                        

                        echo "Great $firstName has been added ";
                    } else {
                        echo "please make sure you've filled out all of the form details ";
                                
                    }
                


                // upload the user image
                // Initialize message variable
                $msg = "";

                // If upload button is clicked ...
                
                    // Get image name
                    $image = $_FILES['image']['name'];
                    // Get text
                    //$image_text = mysqli_real_escape_string($conn, $_POST['image_text']);

                    // image file directory
                    $target = "gallery/" . basename($image);
                    
                    $id = $conn->insert_id;

                    $sql = "INSERT INTO vleuserimages (imgname, userID) VALUES ('$image', '$id')";
                    // execute query
                    mysqli_query($conn, $sql);

                    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                        echo "and Image uploaded successfully";
                    } else {
                        echo "Failed to upload image";
                    }
                }

                mysqli_close($conn);
                
                ?>
                        
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










