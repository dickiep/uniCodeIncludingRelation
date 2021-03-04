<?php
session_start();

include 'connections/conn.php';

if (isset($_SESSION["student"])){
    if(isset($_GET['id'])) {
    
    $quizid = $_GET['id'];
    $query = "select quizTitle from vleQuizzes where id = $quizid";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    if(mysqli_num_rows($result)>0) {
        while($row=mysqli_fetch_assoc($result)) {
            $title=$row['quizTitle'];
        }
    }
    
    
    
    $questionQuery = "SELECT * FROM vleQuizQuestions WHERE quizID = $quizid";
    $questionResult = mysqli_query($conn, $questionQuery);
        
    $_SESSION['quizid'] = $quizid;
    
    } else if(isset($_SESSION['quizid'])) {
        
        $quizid = $_SESSION['quizid'];
        
        $query = "select quizTitle from vleQuizzes where id = $quizid";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    if(mysqli_num_rows($result)>0) {
        while($row=mysqli_fetch_assoc($result)) {
            $title=$row['quizTitle'];
        }
    }
    
    
    
    $questionQuery = "SELECT * FROM vleQuizQuestions WHERE quizID = $quizid";
    $questionResult = mysqli_query($conn, $questionQuery);
        
    }
    
    
    
} else if (isset($_SESSION["admin"])){
    $email = $_SESSION["admin"];
   $query = "select firstName from vleUsers where emailAddress = '$email'";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    if(mysqli_num_rows($result)>0) {
        while($row=mysqli_fetch_assoc($result)) {
            $first=$row['firstName'];
        }
    }
    
    $quizid = $_GET['id'];
    
    $questionQuery = "SELECT * FROM vleQuizQuestions WHERE quizID = $quizid";
    $questionResult = mysqli_query($conn, $questionQuery);
    

    
    
} else if (isset($_SESSION["instructor"])){
        if(isset($_GET['id'])) {
    
    $quizid = $_GET['id'];
    $query = "select quizTitle from vleQuizzes where id = $quizid";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    if(mysqli_num_rows($result)>0) {
        while($row=mysqli_fetch_assoc($result)) {
            $title=$row['quizTitle'];
        }
    }
    
    
    
    $questionQuery = "SELECT * FROM vleQuizQuestions WHERE quizID = $quizid";
    $questionResult = mysqli_query($conn, $questionQuery);
        
    $_SESSION['quizid'] = $quizid;
    
    } else if(isset($_SESSION['quizid'])) {
        
        $quizid = $_SESSION['quizid'];
        
        $query = "select quizTitle from vleQuizzes where id = $quizid";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    if(mysqli_num_rows($result)>0) {
        while($row=mysqli_fetch_assoc($result)) {
            $title=$row['quizTitle'];
        }
    }
    
    
    
    $questionQuery = "SELECT * FROM vleQuizQuestions WHERE quizID = $quizid";
    $questionResult = mysqli_query($conn, $questionQuery);
        
    }
    } else {
    
    header('Location: logout.php');
}

mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang ="en">

<head>
    <title>Quiz</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css" integrity="sha384-5SOiIsAziJl6AWe0HWRKTXlfcSHKmYV4RBF18PPJ173Kzn7jzMyFuTtk8JA7QQG1" crossorigin="anonymous">
       
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
                        
                        <h1><?php echo"$title"?></h1>
                        <ol class="breadcrumb" id="mybreadcrumb">
                                                        <li>
                                 <a href="index.php" id='breadcrumbitem'>Home&nbsp;</a>
                            </li>
                            <li>
                                 <i class="fas fa-angle-double-right" id='breadcrumbitem'></i>
                            </li>
                            <li>
                                <a href="listmodules.php" id='breadcrumbitem'>&nbsp;Resources&nbsp;</a>
                            </li>
                            <li>
                                <i class="fas fa-angle-double-right" id='breadcrumbitem'></i>
                            </li>
                            <li>
                                <a href="choosequiz.php" id='breadcrumbitem'>&nbsp;Choose a Quiz&nbsp;</a>
                            </li>
                            <li>
                                <i class="fas fa-angle-double-right" id='breadcrumbitem'></i>
                            </li>
                            <li>
                                <a href="#" id='breadcrumbitem'>&nbsp;Take a Quiz&nbsp;</a>
                            </li>
                        </ol>
                        
                        
                        <div class="col-md-6" style="margin: 1rem;">
                        <form method="post" action="markquiz.php">
                    <?php
                       include'connections/conn.php';
                            
                            if(isset($_SESSION['yourScore'])) {
                                $yourScore = $_SESSION['yourScore'];
                                echo"<p style='color: green'>$yourScore</p>";
                                unset($_SESSION['yourScore']);
                            }

                            if(mysqli_num_rows($questionResult)>0) {
                                while($row=mysqli_fetch_assoc($questionResult)) {
                                    $question = $row['question'];
                                    $questionid = $row['id'];
                                    
                                    echo "<div class='col-12'>
                                  <table class='table table-sm'>
                                    <thead>
                                      <tr>                                       
                                        <th scope='col' style='width:8rem'>Question :</th>
                                        <th scope='col'>$question</th>
                                      </tr>
                                     
                                      
                                    </thead>
                                    <tbody>";
                                   
                            $choiceQuery = "SELECT * FROM vleQuizQuestionChoices WHERE questionID = $questionid";
                            $choiceResult = mysqli_query($conn, $choiceQuery);
                                    
                                    if(mysqli_num_rows($choiceResult)>0) {
                                while($row=mysqli_fetch_assoc($choiceResult)) {
                                    $questionChoiceID = $row['id'];
                                    $choice = $row['choice'];
                                    
                                    echo "<tr>
                                        
                                        <td><input class='form-check-input correctanswer' type='checkbox' value='checked=$questionChoiceID&questionid=$questionid' name='check[]'>
                                        <td>$choice</td>
                                        <input type = 'hidden' name = 'questionid[]' value = '$questionid'>
                                        <input type = 'hidden' name = 'quizid' value = '$quizid'></td>
                                        
                                      </tr>";
                                    
                                    
                                    
                                    
                                }
                            }
                                    echo "</tbody>
                                  </table>
                                </div>";    
                                   
                                }
                            }
                            
                            
                            mysqli_close($conn);
        
                    ?>
                            
                            
                            <button type="submit" class="btn btn-success" name="markQuiz">Finished</button>
                            </form>
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