<?php
session_start();

include 'connections/conn.php';

if (isset($_SESSION["admin"])) {
    $email = $_SESSION["admin"];
    $query = "select firstName from vleUsers where emailAddress = '$email'";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $first = $row['firstName'];
        }
    }
} else if (isset($_SESSION["instructor"])) {
    $teacher = isset($_SESSION["instructor"]);
    $teacherName = $_SESSION["instructor"];
    $query = "select firstName from vleUsers where emailAddress = '$teacherName'";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $first = $row['firstName'];
        }
    }
} else {

    header('Location: index.php');
}

mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang ="en">

    <head>
        <title>Create a Quiz</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css" integrity="sha384-5SOiIsAziJl6AWe0HWRKTXlfcSHKmYV4RBF18PPJ173Kzn7jzMyFuTtk8JA7QQG1" crossorigin="anonymous">
        <link rel="stylesheet" href="css/mystyle.css">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src=https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js></script>


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

                            <h1>Lets create a quiz <?php echo"$first" ?></h1>
                            <ol class="breadcrumb" id="mybreadcrumb">
                                <li>
                                    <a href="index.php" id="breadcrumbitem">Home&nbsp;</a>
                                </li>
                                <li>
                                    <i class="fas fa-angle-double-right" id="breadcrumbitem"></i>
                                </li>
                                <li>
                                    <a href="listmodules.php" id="breadcrumbitem">&nbsp;Resources&nbsp;</a>
                                </li>
                                <li>
                                    <i class="fas fa-angle-double-right" id="breadcrumbitem"></i>
                                </li>
                                <li>
                                    <a href="#" id="breadcrumbitem">&nbsp;Create a quiz</a>
                                </li>
                            </ol>
                            
                            <div id ="quizfeedback">
                                <?php
                                    if(isset($_SESSION['quizSuccess'])) {
                                        $quizFeedback = $_SESSION['quizSuccess'];
                                        echo"<p style='color: green;'>$quizFeedback</p>";
                                        unset($_SESSION['quizSuccess']);
                                    } 
                                    
                                    if(isset($_SESSION['quizError'])) {
                                        $quizFeedback = $_SESSION['quizError'];
                                        echo"<p style='color: red;'>$quizFeedback</p>";
                                        unset($_SESSION['quizError']);
                                    }
                                    
                                    if(isset($_SESSION['titleError'])) {
                                        $quizTitleFeedback = $_SESSION['titleError'];
                                        echo"<p style='color: red;'>$quizTitleFeedback</p>";
                                        unset($_SESSION['titleError']);
                                    }
                                    
                                    if(isset($_SESSION['questionSuccess'])) {
                                        $questionFeedback = $_SESSION['questionSuccess'];
                                        echo"<p style='color: green;'>$questionFeedback</p>";
                                        unset($_SESSION['questionSuccess']);
                                    }
                                    
                                    if(isset($_SESSION['questionError'])) {
                                        $questionFeedback = $_SESSION['questionError'];
                                        echo"<p style='color: red;'>$questionFeedback</p>";
                                        unset($_SESSION['questionError']);
                                    }
                                    
                                    if(isset($_SESSION['choiceSuccess'])) {
                                        $choiceFeedback = $_SESSION['choiceSuccess'];
                                        echo"<p style='color: green;'>$choiceFeedback</p>";
                                        unset($_SESSION['choiceSuccess']);
                                    }
                                    
                                    if(isset($_SESSION['choiceError'])) {
                                        $choiceFeedback = $_SESSION['choiceError'];
                                        echo"<p style='color: red;'>$choiceFeedback</p>";
                                        unset($_SESSION['choiceError']);
                                    }
                                    
                                 
                                    
                                ?>
                            </div>

                            <form method = "POST" action="insertquiz.php">

                                <div class="form-group">
                                    <label for="quiztitle">Quiz Title</label>
                                    <input type='text' class="form-control quiztitle" maxlength='60' placeholder="what's the title of your quiz?" name='quiztitle' required size='55'/>
                                </div>

                                <?php
                                if ($teacher) {
                                    include ('connections/conn.php');

                                    $query = "select * from vleModules join vleTeacherTeaches on vleModules.moduleCode = vleTeacherTeaches.moduleCode join vleUsers on vleTeacherTeaches.teacherID=vleUsers.id where vleUsers.emailAddress='$teacherName'";

                                    $moduleresult = mysqli_query($conn, $query) or die(mysqli_error($conn));

                                    echo "<div class='form-group'>
                                            <label for='module'>Which module is this quiz for?</label>
                                                <select class='form-control' name='module' style='width: 10rem;'>";


                                    while ($rows = mysqli_fetch_assoc($moduleresult)) {

                                        $moduleCode = $rows['moduleCode'];

                                        echo "<option value=$moduleCode>$moduleCode</option>";
                                    }

                                    echo" </select>
                                          </div>";
                                    
                                    mysqli_close($conn);
                                }
                                ?>

                                <div class="form-group">
                                    <label for="q1">Question:</label>
                                    <input type='text' class='form-control quiztitle' maxlength='50' placeholder='What would you like the question to be?'
                                           name='question' required='required' size='55'/>
                                    <br/>
                                    <label>Please enter potential answers and select which one is correct&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>*Select the correct answer</strong></label>

                                    <div class="form-group" name="add_choice" id="add_choice">
                                        <!--<form name="add_choice" id="add_choice">-->
                                        <div class="table-responsive col-10">
                                            <div id="dynamic_field">
                                                <div class="row">

                                                    <div class="col-md-9 col-12"><input type="text" name="choice[]" placeholder="Choice #1" class="form-control choice_list enterchoice" size="55"/>
                                                        <input class="form-check-input correctanswer" type="checkbox" value="1" name="check[]">
     
                                                    </div>
                                                    
                                                    <div id="addchoicebutton">
                                                        <button type="button" name="add" id="add" class="btn btn-success addanother">Add Another Choice</button>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                        <!--</form>-->
                                    </div>

                                </div>

                                <hr/>
                                <button type="submit" class="btn btn-success" name="anotherQuestion">Add another question</button>
                                <button type="submit" class="btn btn-primary" name="uploadQuiz" style="float: right;">Finish your Quiz</button>
                                    <!--<input type="submit" class="btn btn-primary">-->

                            </form>

                        </div>     
                    </div>
                </div>
            </div>
        </div>

        <!--script to add remove and upload choices-->
        <!--Thanks to http://www.webslesson.info/2016/02/dynamically-add-remove-input-fields-in-php-with-jquery-ajax.html-->
        <script>
            $(document).ready(function () {
                var i = 1;
                $('#add').click(function () {
                    i++;
                    $('#dynamic_field').append('<div class="row" id="row' + i + '"><div class="col-md-9 col-12"><input type="text" name="choice[]" placeholder="Choice #' + i + '" class="form-control choice_list enterchoice" size="55"/><input class="form-check-input correctanswer" type="checkbox" value="' + i + '" name="check[]"><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove addanother">X</button></div></div>');
                });

                $(document).on('click', '.btn_remove', function () {
                    var button_id = $(this).attr("id");
                    $('#row' + button_id + '').remove();
                });

                $('#submit').click(function () {
                    $.ajax({
                        url: "choice.php",
                        method: "POST",
                        data: $('#add_choice').serialize(),
                        success: function (data)
                        {
                            alert(data);
                            $('#add_choice')[0].reset();
                        }
                    });
                });

            });
        </script>

        <!--script to add a new question-->
        <script>
            $(function () {
                $("#newThread").click(function () {
                    if ($("#newThreadForm").is(":hidden")) {
                        $("#newThreadForm").slideDown("slow");
                    } else {
                        $("#newThreadForm").hide();
                    }
                });

            });
        </script>

        <!--script to toggle the side menu-->
        <script>
            $("#menu-toggle").click(function (e) {
                e.preventDefault();

                $("#wrapper").toggleClass("menuDisplayed");
            });
        </script>




    </body>
</html>









