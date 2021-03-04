<?php
session_start();

include 'connections/conn.php';

if (!isset($_SESSION["student"]) && !isset($_SESSION["instructor"])){
    header('Location: index.php');
} else {
    if(isset($_GET['id'])) {
        $folderid = $_GET['id'];
        $query = "SELECT * FROM vleModuleResources JOIN vleModuleResourceFolders ON vleModuleResources.folderID = vleModuleResourceFolders.id WHERE folderID='$folderid'";
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        
        $videoquery = "SELECT * FROM vleModuleVideos JOIN vleModuleResourceFolders ON vleModuleVideos.folderID = vleModuleResourceFolders.id WHERE folderID='$folderid'";
        $videoresult = mysqli_query($conn, $videoquery) or die(mysqli_error($conn));
        
        $_SESSION['folderID'] = $folderid;
    } else if (isset($_SESSION['folderID'])) {
    
        $moduleid = $_SESSION['folderID'];
        $query = "SELECT * FROM vleModuleResources JOIN vleModuleResourceFolders ON vleModuleResources.folderID = vleModuleResourceFolders.id WHERE folderID='$moduleid'";
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        
        $videoquery = "SELECT * FROM vleModuleVideos JOIN vleModuleResourceFolders ON vleModuleVideos.folderID = vleModuleResourceFolders.id WHERE folderID='$moduleid'";
        $videoresult = mysqli_query($conn, $videoquery) or die(mysqli_error($conn));
        
        
    }
}
?>

<!DOCTYPE html>
<html lang ="en">

<head>
    <title>View Module Resources</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css" integrity="sha384-5SOiIsAziJl6AWe0HWRKTXlfcSHKmYV4RBF18PPJ173Kzn7jzMyFuTtk8JA7QQG1" crossorigin="anonymous">
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
                        
                        <h3>View Module Resources</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb" id="mybreadcrumb">
                             <li>
                                <a href="index.php" id="breadcrumbitem">Home&nbsp;</a>
                            </li>
                            <li>
                            <i class="fas fa-angle-double-right" id="breadcrumbitem"></i>
                            </li>
                            <li>
                                <a href="listmodules.php" class="active" id="breadcrumbitem">&nbsp;Resources&nbsp;</a>
                            </li>
                            <li>
                            <i class="fas fa-angle-double-right" id="breadcrumbitem"></i>
                            </li>
                            <li>
                                <a href="#" onClick="history.go(-1);return true;" id="breadcrumbitem">&nbsp;Resource Folders&nbsp;</a>  
                                
                            </li>
                            <li>
                            <i class="fas fa-angle-double-right" id="breadcrumbitem"></i>
                            </li>
                            <li>
                                <a href="#" class="active" id="breadcrumbitem">&nbsp;View Resources&nbsp;</a>
                            </li>
                        </ol>                      
                        </nav>
                        
                    <!--select all of the folders that relate to this module and display them as links-->
                    <?php
                    
                        if(isset($_GET['id'])) {
                            $thefolderid = $_GET['id'];
                        } else if (isset($_SESSION['folderID'])) {
                            $thefolderid = $_SESSION['folderID'];
                        }
                        
                    
                        if(isset($_SESSION['success'])) {
                            $success = $_SESSION['success'];
                            echo"<p class='sessionSucess'>$success</p>";
                            unset($_SESSION['success']);
                        }
                        
                        if(isset($_SESSION['error'])) {
                            $error = $_SESSION['error'];
                            echo"<p class='sessionFailure'>$error</p>";
                            unset($_SESSION['error']);
                        }
                        
                
                        
                       
                        
                        if(mysqli_num_rows($videoresult)>0) {
                            while($row = mysqli_fetch_assoc($videoresult)) {
                                $videoPath = mysqli_real_escape_string($conn, $row['videoHREF']);
                                 $folderName = mysqli_real_escape_string($conn, $row['folderName']);
                                
                                echo"<h5>$folderName</h5>";
                                
                                 echo'<div class = "row">';
                                
                        echo'<div class="col-md-6">
                        
                            <div class="card" id = "myvidcard">
                            
                                <video width="auto" height="350" controls>
                                    <source src="';
                                
                            echo "$videoPath";
                            echo'" type="video/mp4">
                                    <source src="movie.ogg" type="video/ogg">
                                    Your browser does not support the video tag.
                                    </video>
                            </div>
                        </div>';
                                
                            }
                        }
                                         
                        
                        if(isset($_SESSION['instructor']) || isset($_SESSION['admin'])) {
                            echo "<div class='col-md-5' style='float: right;'>
                                  <table class='table table-hover'>
                                    <thead>
                                      <tr>
                                        <th scope='col'>File Name</th>
                                        <th scope='col'></th>
                                        <th scope='col'></th>
                                      </tr>
                                    </thead>";
                            
                        } else {
                            echo "<div class='col-md-5' style='float: right;>
                                  <table class='table table-hover'>
                                    <thead>
                                      <tr>
                                        <th scope='col'>File Name</th>
                                        <th scope='col'></th>
                                      </tr>
                                    </thead>";
                            
                        }
        
                        if(mysqli_num_rows($result)>0) {
                            while($row = mysqli_fetch_assoc($result)) {
                                $fileName = mysqli_real_escape_string($conn, $row['fileName']);
                                $moduleCode = mysqli_real_escape_string($conn, $row['moduleCode']);
                                
                                $cwdir = getcwd();
                                
                                echo "<tbody>
                                        <tr>
                                            <td>$fileName</td>
                                            
                                            <td align='right'>
                                               <a href='http://pdickie01.web.eeecs.qub.ac.uk/cater/moduleresources/",urlencode($moduleCode),"/",urlencode($fileName),"'>Open File</a>
                                            </td>";
                                        
                                if(isset($_SESSION['instructor']) || isset($_SESSION['admin'])) {
                                    echo "<td align='right'>
                                               <form action='deleteafile.php' method='POST'>
                                                    <button type='submit' name='delete' class='btn btn-danger'>Delete File</button>
                                                    <input type='hidden' value='$fileName' name='fileName'>
                                                    <input type='hidden' value ='$thefolderid' name='fileCode'>
                                               </form>
                                            </td>";
                                    
                                }
                                echo "</tr>";
                             
                            }
                        
                            
                            echo" </tbody>
                                </table>
                                </div>";
                            echo'</div>';
                            mysqli_close($conn);
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