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
        <title>Add another question</title>
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

                            <h1>Another question for your quiz <?php echo"$first" ?>?</h1>
                            <ol class="breadcrumb" id="mybreadcrumb">
                                <li>
                                    <a href="index.php">home</a>
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
                                    
                                    if(isset($_SESSION['correctChoiceSuccess'])) {
                                        $correctChoiceFeedback = $_SESSION['correctChoiceSuccess'];
                                        echo"<p style='color: green;'>$correctChoiceFeedback</p>";
                                        unset($_SESSION['correctChoiceSuccess']);
                                    }
                                    
                                    if(isset($_SESSION['correctChoiceError'])) {
                                        $correctChoiceFeedback = $_SESSION['correctChoiceError'];
                                        echo"<p style='color: red;'>$correctChoiceFeedback</p>";
                                        unset($_SESSION['correctChoiceError']);
                                    }
                                    
                                ?>
                            </div>

                            <form method = "POST" action="insertquiz.php">

                                <div class="form-group">
                                    <label for="q1">Question:</label>
                                    <input type='text' class='form-control quiztitle' maxlength='50' placeholder='What would you like the question to be?'
                                           name='question' size='55'/>
                                    <br/>
                                    <label>Please enter potential answers and select which one is correct&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>*Select the correct answer</strong></label>

                                    <div class="form-group" name="add_choice" id="add_choice">

                                        <div class="table-responsive col-10">
                                            <div id="dynamic_field">
                                                <div class="row">

                                                    <div class="col-md-9 col-12"><input type="text" name="choice[]" placeholder="Choice #1" class="form-control choice_list enterchoice" size="55"/>
                                                        <input class="form-check-input correctanswer" type="checkbox" value="1" name="check[]">
                                                        
                                                    </div>
                                                    <div>
                                                        <button type="button" name="add" id="add" class="btn btn-success addanother">Add Another Choice</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr/>
                                <button type="submit" class="btn btn-primary" name="finishQuiz" style="float: right;">Finish your Quiz</button>
                                <button type="submit" class="btn btn-primary" name="anotherQuestion" style="float: left;">Add another Question</button>
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