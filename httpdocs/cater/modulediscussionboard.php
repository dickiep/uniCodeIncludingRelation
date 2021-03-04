<?php
session_start();

include 'connections/conn.php';

if (isset($_SESSION["student"]) || isset($_SESSION["admin"]) || isset($_SESSION["instructor"])){
    
    if (isset($_SESSION["student"])) {
        $user = mysqli_real_escape_string($conn, $_SESSION["student"]);
        
        $modulequery = "select * from vleModules join vleStudentTakes on vleModules.moduleCode = vleStudentTakes.moduleCode join vleUsers on vleStudentTakes.studentID=vleUsers.id join vleTeacherTeaches on vleStudentTakes.moduleCode = vleTeacherTeaches.moduleCode where vleUsers.emailAddress='$user'";
    
    $moduleresult = mysqli_query($conn, $modulequery) or die(mysqli_error($conn));
        
    } else if (isset($_SESSION["admin"])) {
        $user = mysqli_real_escape_string($conn, $_SESSION["admin"]);
    } else if (isset($_SESSION["instructor"])) {
        $user = mysqli_real_escape_string($conn, $_SESSION["instructor"]);
    }
    
    
    //$moduleCode = htmlentities($_GET["module"]);
    
    if(!isset($_SESSION['moduleCode'])) {
        $moduleCode = htmlentities($_GET["module"]);
        $_SESSION['moduleCode'] = $moduleCode;
        $query = "SELECT message, timeSent, vleUsers.firstName, vleUsers.lastName, vleDBThreads.threadTitle, vleDBThreads.moduleThreadIsFor FROM vleDBMessages JOIN vleUsers ON vleDBMessages.messageFrom = vleUsers.id JOIN vleDBThreads ON vleDBMessages.threadID = vleDBThreads.id WHERE vleDBThreads.moduleThreadIsFor = '$moduleCode' ORDER BY timeSent";
    }
    
    if(isset($_SESSION['moduleCode'])) {
        $myModule = $_SESSION['moduleCode'];
        $query = "SELECT message, timeSent, vleUsers.firstName, vleUsers.lastName, vleDBThreads.threadTitle, vleDBThreads.moduleThreadIsFor FROM vleDBMessages JOIN vleUsers ON vleDBMessages.messageFrom = vleUsers.id JOIN vleDBThreads ON vleDBMessages.threadID = vleDBThreads.id WHERE vleDBThreads.moduleThreadIsFor = '$myModule' ORDER BY timeSent";
        $query = "SELECT message, timeSent, vleUsers.firstName, vleUsers.lastName, vleDBThreads.threadTitle, vleDBThreads.moduleThreadIsFor FROM vleDBMessages JOIN vleUsers ON vleDBMessages.messageFrom = vleUsers.id JOIN vleDBThreads ON vleDBMessages.threadID = vleDBThreads.id WHERE vleDBThreads.moduleThreadIsFor = '$myModule' ORDER BY timeSent";
                                    }
    
    
    
    
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    
    
    
    
    } else {
    
    header('Location: login.php');
}


?>

<!DOCTYPE html>
<html lang ="en">

<head>
    <title>Module Discussion Board</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/mystyle.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css" integrity="sha384-5SOiIsAziJl6AWe0HWRKTXlfcSHKmYV4RBF18PPJ173Kzn7jzMyFuTtk8JA7QQG1" crossorigin="anonymous">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src=https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js></script>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    
    
    
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
                <li><a href="resources.php">Resources</a></li>
                <li><a href="messenger.php">Messenger</a></li>
                <li><a href="admin.php">Admin</a></li>
            </ul>
        </div>
        
        
        <!--page content-->
        
        <div id="content-wrapper">
            <div class = "container-fluid">
                <div class ="row">
                    <div class = "col-lg-12">
                        
                        <h1>Your Class Chat</h1>
                        <ol class="breadcrumb" id="mybreadcrumb">
                             <li>
                                <a href="index.php" id="breadcrumbitem">Home&nbsp;</a>
                            </li>
                            <li>
                            <i class="fas fa-angle-double-right" id="breadcrumbitem"></i>
                            </li>
                            <li>
                                <a href="messenger.php" class="active" id="breadcrumbitem">&nbsp;Messenger&nbsp;</a>
                            </li>
                            <li>
                            <i class="fas fa-angle-double-right" id="breadcrumbitem"></i>
                            </li>
                            <li>
                                <a href="#" class="active" id="breadcrumbitem">&nbsp;Discussion Board</a>
                            </li>
                        </ol>
                        
                        <div class="col-12">
                        <button type="button" class="btn btn-success" id="newThread">New Thread</button>
                        <br>
                        </div>
                        
                        <div class="col-12" id="newThreadForm">
                            
                            <form action="modulediscussionboard.php" method="post">
                              <div class="form-group">
                                <label for="threadTitle">Thread Title</label>
                                <input type="text" class="form-control" id="threadTitle" name="threadTitle" placeholder="What would you like to ask about?">
                              </div>
                                <div class="form-group">
                                    <label for="firstQuestion">Your Question</label>
                                    <textarea class="form-control" id="firstQuestion" name="question" rows="3" placeholder="What would you like to ask?"></textarea>
                                  </div>
                                
                                <button type="submit" class="btn btn-primary mb-2" name="uploadThread">Start the Thread</button>
                                </form>
                            
                        </div>
                        
                        <?php
                            if (isset($_POST['uploadThread'])) {

                                //upload the title, user, their message and the time it was posted
                                    $title = mysqli_real_escape_string($conn, $_POST['threadTitle']);
                                    $message = mysqli_real_escape_string($conn, $_POST['question']);
                                    $startedby = mysqli_real_escape_string($conn, $user);

                                    $receiver = mysqli_real_escape_string($conn, $myModule);
                                    
                                    
                                    if ( (!empty($title)) && (!empty($message)) ) {
                                        
                                         if(!isset($_SESSION['moduleCode'])) {
                                            $moduleCode = htmlentities($_GET["module"]);

                                            $threadQuery = "insert into vleDBThreads(threadTitle, moduleThreadIsFor) values ('$title', '$moduleCode')";

                                            $threadResult = mysqli_query($conn, $threadQuery) or die(mysqli_error($conn));
                                        }
                                        
                                    if(isset($_SESSION['moduleCode'])) {
                                        $myModule = $_SESSION['moduleCode'];
                                        
                                        $threadQuery2 = "insert into vleDBThreads(threadTitle, moduleThreadIsFor) values ('$title', '$myModule')";

                                            $threadResult = mysqli_query($conn, $threadQuery2) or die(mysqli_error($conn));
                                    }
                                        
                                        $last_id = $conn->insert_id;
                                        
                                        $useridquery = "select id from vleUsers where emailAddress = '$user'";
                                        $useridresult = mysqli_query($conn, $useridquery) or die(mysqli_error($conn));
                                       
                                        
                                        
                                        if(mysqli_num_rows($useridresult)>0) {
                                            while($row = mysqli_fetch_assoc($useridresult)) {
                                                $messageFrom = $row['id'];
                                            }
                                        }
                                    
                                        
                                        $dateTime = strtotime("now");
                                        $time = date("Y-m-d h:i:s A T",$dateTime);
                                        
                                        $messageQuery = "insert into vleDBMessages (messageFrom, threadID, message, timeSent) values ($messageFrom, $last_id, '$message', '$time')";
                                        
                                        //insert into vleDBMessages (messageFrom, messageTo, threadID, message, timeSent) values //(1, 'geo1A', 1, 'hello there', '9999-12-31 23:59:59')

                                        $messageResult = mysqli_query($conn, $messageQuery) or die(mysqli_error($conn));

                                        echo "Great that thread has been created";
                                    } else {
                                        echo "please make sure you've filled out all of the form details";
                                    }
                                
                                mysqli_close($conn);
                                
                            }
                
                            ?>
                        
                        <script>
                        $(function () {
                            $("#newThread").click(function () {
                                if ( $( "#newThreadForm" ).is( ":hidden" ) ) {
                                    $( "#newThreadForm" ).slideDown( "slow" );
                                } else {
                                    $( "#newThreadForm" ).hide();
                                }
                            });  
                            
                        });
                        </script>
                        
                        
                        
                        
                        <!--php to select each thread id and title and create a card for each one-->
                        <!--add a where statement for ethe selected module - need to update thread table-->
                        <?php
                        include'connections/conn.php';
                        
                        if(isset($_GET["module"])) {
                        
                            $moduleCode = htmlentities($_GET["module"]);

                            $threadQuery = "SELECT DISTINCT id, threadTitle FROM vleDBThreads WHERE moduleThreadIsFor = '$moduleCode'";

                            $threadresult = mysqli_query($conn, $threadQuery) or die(mysqli_error($conn));

                        }
                        
                        if(isset($_SESSION['moduleCode'])) { 
                        
                            $myModule = $_SESSION['moduleCode'];
                            
                            $threadQuery = "SELECT DISTINCT id, threadTitle FROM vleDBThreads WHERE moduleThreadIsFor = '$myModule'";
                            /*
                            $threadandmessagequery = "SELECT vleDBThreads.id, vleDBThreads.threadTitle, message, timeSent, vleUsers.firstName, vleUsers.lastName, vleDBThreads.moduleThreadIsFor FROM vleDBMessages JOIN vleUsers ON vleDBMessages.messageFrom = vleUsers.id JOIN vleDBThreads ON vleDBMessages.threadID = vleDBThreads.id WHERE vleDBThreads.moduleThreadIsFor = '$myModule' ORDER BY timeSent";*/

                            $threadresult = mysqli_query($conn, $threadQuery) or die(mysqli_error($conn));
                        
                        }
                        /*
                         if(mysqli_num_rows($threadresult)>0) {
                                while($row=mysqli_fetch_assoc($result)) {
                                    $first=$row['firstName'];
                                    $last=$row['lastName'];
                                    $message=$row['message'];
                                    $time=$row['timeSent'];
                                    
                                        }
                                    }
                        */
                        if(mysqli_num_rows($threadresult)>0) {
                                while($row=mysqli_fetch_assoc($threadresult)) {
                                    $threadTitle=$row['threadTitle'];
                                    $threadID=$row['id'];
                                   
                                   
                                    
                                   
                                    
                                    echo "<div class='card'>
                                            <h5 class='card-header'>$threadTitle</h5>
                                        <div class='card-body' id='$threadID'>";
                                        
                                        $messagequery = "SELECT * FROM vleDBMessages join vleUsers on vleDBMessages.messageFrom=vleUsers.id WHERE threadID = '$threadID'";
                                        $messageresult = mysqli_query($conn, $messagequery) or die(mysqli_error($conn));
                                    
                                        if(mysqli_num_rows($messageresult)>0) {
                                                while($row=mysqli_fetch_assoc($messageresult)) {
                                    
                                                $first=$row['firstName'];
                                                $last=$row['lastName'];
                                                $message=$row['message'];
                                                $time=$row['timeSent'];
                                                    
                                                //$messageReplyDisplay = isset($_SESSION['reply']) ? $_SESSION['reply'] : false;
                                                    
                                                echo "<div class='card-title'>$first $last : $message
                                                     <p class='smallText'>$time.</p></div>";
                                                //if ($messageReplyDisplay !== false ) {
                                                    //echo "<p>$messageReplyDisplay</p>";
                                                //}
                                                    
                                                }
                                        }
                                        
                                        echo "<form method='POST' action='messagereply.php'>
                                        <div class='form-group'>
                                                <label for='exampleTextarea'><strong>Write a reply :</strong></label>
                                                <textarea class='form-control' id='exampleTextarea' rows='2' name = 'reply'></textarea>
                                                <input type='hidden' value='$threadID' name='threadID' />
                                            </div>
                                                <button type='submit' class='btn btn-primary' name='sendreply' style='float: right; margin-right: 1em;'>Send your Reply</a>
                                            </form>
                                            </div>
                                            </div>
                                            </br></br>";
    
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