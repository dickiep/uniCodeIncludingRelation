<?php
session_start();

include 'connections/conn.php';

if (isset($_SESSION["student"])) {
    $email = $_SESSION["student"];
    $query = "SELECT * FROM vleUsers JOIN vleUserTypes ON vleUsers.userType = vleUserTypes.idUserType WHERE emailAddress = '$email'";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $first = $row['firstName'];
            $last = $row['lastName'];
            $mail = $row['emailAddress'];
            $userType = $row['userTypeDescription'];
            $rowid = $row['id'];
        }
    }
    
    $imgQuery = "SELECT imgname FROM vleuserimages WHERE userID = $rowid";
    $imgResult = mysqli_query($conn, $imgQuery) or die(mysqli_error($conn));
    if (mysqli_num_rows($imgResult) > 0) {
        while ($row = mysqli_fetch_assoc($imgResult)) {
            $profilepic = $row['imgname'];
        }
    }
    
    
} else if (isset($_SESSION["admin"])) {
    header('Location: administrator.php');
    
} else if (isset($_SESSION["instructor"])) {
    $email = $_SESSION["instructor"];
    $query = "SELECT * FROM vleUsers JOIN vleUserTypes ON vleUsers.userType = vleUserTypes.idUserType WHERE emailAddress = '$email'";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $first = $row['firstName'];
            $last = $row['lastName'];
            $mail = $row['emailAddress'];
            $userType = $row['userTypeDescription'];
            $rowid = $row['id'];
        }
    }
    
    $imgQuery = "SELECT imgname FROM vleuserimages WHERE userID = $rowid";
    $imgResult = mysqli_query($conn, $imgQuery) or die(mysqli_error($conn));
    if (mysqli_num_rows($imgResult) > 0) {
        while ($row = mysqli_fetch_assoc($imgResult)) {
            $profilepic = $row['imgname'];
        }
    }
    
} else {

    header('Location: logout.php');
}
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang ="en">

    <head>
        <title>Admin</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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

                            <h1>Your Details</h1>
                            <ol class="breadcrumb" id="mybreadcrumb">
                                <li>
                                    <a href="index.php" id="breadcrumbitem">Home&nbsp;</a>
                                </li>
                                <li>
                                    <i class="fas fa-angle-double-right" id="breadcrumbitem"></i>
                                </li>
                                <li>
                                    <a href="admin.php" class="active" id="breadcrumbitem">&nbsp;Admin</a>
                                </li>
                            </ol>
                                <div class="row">
                                    <?php
                                     echo "<div class='card' id='myadmincard'>
                                         <h4 class='card-title' id='admincardtitle'>Your Profile Picture</h4>
                                            <div class='card-body' id='admincardbody'>
                                            <img class='card-img-top' src='gallery/$profilepic' alt='Profile Picture' style='width: 100%; height: 100%; object-fit: contain;'>
                                            </div>
                                       </div>";
                                     
                                    echo "<div class='card' id='myadmincard'>
                                        <h4 class='card-title' id='admincardtitle' >Your Personal Details</h4>
                                            <div class='card-body' id='admincardbodypd'>
                                             
                                              <p id='pd'><strong>User Number :</strong> $rowid</p>
                                              <p id='pd'><strong>Given Name :</strong> $first</p>
                                              <p id='pd'><strong>Family Name :</strong> $last</p>
                                              <p id='pd'><strong>Email Address :</strong> $mail</p>
                                              <p id='pd'><strong>User Type :</strong> $userType</p>                                         
                                            </div>
                                       </div>";
                                    ?>    
                            
                                <div class='card' id = 'myadmincard'>
                                    <i class="fas fa-user-secret fa-10x cardicon"></i>
                                       <div class='card-body'>
                                           <h5 class='card-title'>Click here to update your user details and password</h5>
                                            <a href='edituser.php' class='btn btn-primary'>Update your details</a>
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