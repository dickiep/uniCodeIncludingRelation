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
    if(isset($_GET['id'])) {
    
        $userid = $_GET['id'];
        $emailQuery = "SELECT emailAddress FROM vleUsers WHERE id = $userid";
        $emailResult = mysqli_query($conn, $emailQuery) or die(mysqli_error($conn));

        if(mysqli_num_rows($emailResult)>0) {
            while($row = mysqli_fetch_assoc($emailResult)) {
                $email = $row['emailAddress'];
            }
        }
    } else {
        $email = $_SESSION["admin"];
    }
   
    
    
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
                                    <a href="admin.php"  id="breadcrumbitem">&nbsp;Admin&nbsp;</a>
                                </li>
                                <li>
                                    <i class="fas fa-angle-double-right" id="breadcrumbitem"></i>
                                </li>
                                <li>
                                    <a href="#" id="breadcrumbitem">&nbsp;Edit a User</a>
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
                                            <div class='card-body' id='admincardbodypd1'>
                                             <form method='POST' action=updateauser.php>
                                              <input type='hidden' name='userID' value='$rowid'>
                                              <p id='pd1'><strong>Given Name :</strong><input type='text' class='form-control' name='firstName' value='$first'></p>
                                              <p id='pd1'><strong>Family Name :</strong><input type='text' class='form-control'name='lastName' value='$last'></p>
                                              <p id='pd1'><strong>Email Address :</strong><input type='email' class='form-control' name='emailAddress' value='$mail'></p>
                                              <button type='submit' class='btn btn-primary' style = 'float: right;'>Update your details</button></form>";    
                                            
                                    
                                    if(isset($_SESSION['updateSuccess'])) {
                                        $success = $_SESSION['updateSuccess'];
                                        echo"<p></p><p id='sessionSuccess'>$success</p>";
                                        unset($_SESSION['updateSuccess']);
                                    }
                                    
                                    echo "</div>
                                       </div>";
                                    
                                       
                            
                                    echo "<div class='card' id='myadmincard'>
                                            <h4 class='card-title' id='admincardtitle' >Update Your Password</h4>
                                                <div class='card-body' id='admincardbodypd1'>
                                                 <form method='POST' action=updateapwrd.php>
                                                  <input type='hidden' name='userID' value='$rowid'>
                                                  <p id='pd1'><strong>Enter a new password :</strong><input type='password' class='form-control' name='firstPwrd'></p>
                                                  <p id='pd1'><strong>Please re-enter the password :</strong><input type='password' class='form-control'name='secondPwrd''></p>
                                                  
                                                 <button type='submit' class='btn btn-primary' id='passwordbutton'>Update your password</button></form>";    
                                            
                                    
                                    if(isset($_SESSION['updatePasswordSuccess'])) {
                                        $success = $_SESSION['updatePasswordSuccess'];
                                        echo"<p id='sessionSuccess'>$success</p>";
                                        unset($_SESSION['updatePasswordSuccess']);
                                    }
                                    
                                    
                                    
                                    if(isset($_SESSION['updatePasswordError'])) {
                                        $error = $_SESSION['updatePasswordError'];
                                        echo"<p id='sessionFailure'>$error</p>";
                                        unset($_SESSION['updatePasswordError']);
                                    }
                                    
                                    echo "</div>
                                       </div>";
                                    ?>
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