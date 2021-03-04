<?php
include "connections/conn.php";
session_start();

if (isset($_SESSION["admin"])){
    
    if ( isset($_POST['delete']) && isset($_POST['id']) ) {
        $userID = mysqli_real_escape_string($conn, $_POST['id']);
        $deleteQuery = "DELETE FROM vleUsers WHERE id = '$userID'";
        $deleteResult = mysqli_query($conn, $deleteQuery) or die(mysqli_error($conn));
        $_SESSION['success'] = 'Record deleted';
        header( 'Location: listusers.php' ) ;
        return;
    }

    // Making sure that user id is present
    if ( ! isset($_GET['id']) ) {
      $_SESSION['error'] = "Missing user id";
      header('Location: listusers.php');
      return;
    }

    $userID = mysqli_real_escape_string($conn, $_GET['id']);
    $validateUserQuery = "SELECT firstName, id FROM vleUsers where id = $userID";
    $validateUserResult = mysqli_query($conn, $validateUserQuery) or die(mysqli_error($conn));

} else {
    
    header('Location: index.php');
}


mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang ="en">

<head>
    <title>Manage Users</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src=https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js></script>
    <link rel="stylesheet" href="css/mystyle.css">
    
    
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
                <li><a href="messenger.php">Messenger</a></li>
                <li><a href="admin.php">Admin</a></li>
            </ul>
        </div>
        
        
        <!--page content-->
        
        <div id="content-wrapper">
            <div class = "container-fluid">
                <div class ="row">
                    <div class = "col-lg-12">
                        
                        <h1>Delete a User</h1>
                        <ol class="breadcrumb" id="mybreadcrumb">
                            <li>
                                <p></p>
                            </li>
                            
                        </ol>
                        
                        
                        <?php
                            if(mysqli_num_rows($validateUserResult)>0) {
                                while($row = mysqli_fetch_assoc($validateUserResult)) {
                                    if ( $row === false ) {
                                        $_SESSION['error'] = 'Bad value for user id';
                                        header( 'Location: listusers.php' );
                                        return;
                                    } else {
                                        $deleteID=htmlentities($row['id']);

                                        echo "<p>Are you sure you want to delete User #$deleteID?</p>
                                            <form method='post'>
                                            <input type='hidden' name='id' value='$deleteID'>
                                            <button type='submit' name='delete' class='btn btn-danger'>Delete</button>
                                            <a href='listusers.php'>Cancel</a>
                                            </form>";

                                    }


                                }
                            }
                        ?>

                    
                        
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



    
    
