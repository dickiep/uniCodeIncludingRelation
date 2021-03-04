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
                </ul>
            </div>
        </nav>
        <div class="container">
            <br><br>
            <div class ="col-sm-12 col-md-5 userForm">
                <form method="POST" action="adduser.php" enctype="multipart/form-data">
                    <br>
                    <div>
                        <h6>Add a New User</h6>
                    </div>

                    <br>
                    <div>
                        <label for="emailAddress">Email Address</label>
                        <input type="email" name='emailAddress' id='emailAddress' required="required">
                    </div>
                    <br>
                    <div>
                        <label for="pword">Password &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
                        <input type="password" name='pword' id='pword' required="required">
                    </div>
                    <br>
                    <div>
                        <label for="firstName">First Name &nbsp&nbsp&nbsp&nbsp</label>
                        <input type="text" name='firstName' id='firstName' required="required">
                    </div>
                    <br>
                    <div>
                        <label for="lastName">Last Name &nbsp&nbsp&nbsp&nbsp</label>
                        <input type="text" name='lastName' id='lastName' required="required">
                    </div>

                    <br>
                    

                    <div>
                        <p><strong>Account Type</strong></p>
                        <label for="Student">Student</label>
                        <input type="radio" name="userType" id="Student" value="1"><br>
                        <label for="Teacher">Teacher</label>
                        <input type="radio" name="userType" id="Teacher" value="2"><br>
                        <label for="other">Administrator</label>
                        <input type="radio" name="userType" id="Administrator" value="3"><br><br>
                    </div>

                    <input type="hidden" name="size" value="1000000">
                    <div>
                        <label for="userImage">Upload a user image : </label>
                        <input type="file" name="image" id='userImage'>
                    </div>
                    <br>

                    <div>
                        <button type="submit" name="upload">POST</button>
                    </div>
                    <br>
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

                        

                        echo "Great $firstName has been added";
                    } else {
                        echo "please make sure you've filled out all of the form details";
                                //<form action = 'insertstudent.php' method='POST' name = 'addstudentform'>
                            //<fieldset>
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
                    $target = "../gallery/" . basename($image);
                    
                    $id = $conn->insert_id;
                    
                    echo $id;

                    $sql = "INSERT INTO vleuserimages (imgname, userID) VALUES ('$image', '$id')";
                    // execute query
                    mysqli_query($conn, $sql);

                    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                        $msg = "Image uploaded successfully";
                    } else {
                        $msg = "Failed to upload image";
                    }
                }
               


//$result = mysqli_query($conn, "SELECT * FROM vleuserimages");
                mysqli_close($conn);
                
                ?>
       
    </body>
</html>
