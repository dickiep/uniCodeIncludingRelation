<!--php to upload the quiz-->
<?php
include 'connections/conn.php';
session_start();

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

if (isset($_POST['uploadQuiz'])) {

    //insert quiz title and module
    $title = mysqli_real_escape_string($conn, $_POST['quiztitle']);
    $module = mysqli_real_escape_string($conn, $_POST['module']);
    if ((!empty($title)) && (!empty($module))) {
        
        ///////validation to ensure the quiz title is unique for this module//////////
        $quizTitleQuery = "SELECT quizTitle FROM `vleQuizzes` WHERE quizTitle = '$title' AND moduleQuizIsFor = '$module'";
        $quizTitleResult = mysqli_query($conn, $quizTitleQuery) or die(mysqli_error($conn));
        
        if(mysqli_num_rows($quizTitleResult)==0) {
        
            $query = "insert into vleQuizzes(quizTitle, moduleQuizIsFor) values ('$title', '$module')";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
            $_SESSION['quizSuccess'] = "Your quiz: $title has been created successfully for $module";
        
        } else {
            $_SESSION['titleError'] = "Your quiz title: $title is not unique for the $module module. Please enter a unique title";
        }
    } else {
        $_SESSION['quizError'] = "There has been a problem with the creation of your quiz: $title for $module. \nPlease ensure you have entered a quiz title and selected the module it is for";
    }

    /////////////////end of quiz title and module insert/////////////////
   
    

    /////////////////insert the quiz question/////////////////////////
    $question = mysqli_real_escape_string($conn, $_POST['question']);

    if ((!empty($question))) {

        $quizIDQuery = "SELECT id FROM `vleQuizzes` WHERE quizTitle = '$title' AND moduleQuizIsFor = '$module'";
        $quizIDResult = mysqli_query($conn, $quizIDQuery) or die(mysqli_error($conn));
        
        if(mysqli_num_rows($quizIDResult)>0) {
            while ($row = mysqli_fetch_assoc($quizIDResult)) {
                $quizID = $row['id'];
            }
        }

        $questionQuery = "INSERT INTO vleQuizQuestions(quizID, question) VALUES ($quizID, '$question')";

        $questionResult = mysqli_query($conn, $questionQuery) or die(mysqli_error($conn));

        $_SESSION['questionSuccess'] = "Your question: $question has been added successfully to $title";
        }  else {
        $_SESSION['questionError'] = "Your question: $question has not been added successfully to $title";
    }

    //////////////insert the quiz question choices///////////////////

    $number = count($_POST["choice"]);

    /////////////select the question id for which the choices are to be entered/////////////
    
    $questionIDQuery = "SELECT id FROM vleQuizQuestions WHERE question = '$question' AND quizID = $quizID";
    $questionIDResult = mysqli_query($conn, $questionIDQuery) or die(mysqli_error($conn));
        
        if(mysqli_num_rows($questionIDResult)>0) {
            while ($row = mysqli_fetch_assoc($questionIDResult)) {
                $questionID = $row['id'];
            }
        }

    if ($number >= 1) {
        for ($i = 0; $i < $number; $i++) {
            
            if (trim($_POST["choice"][$i] != '')) {
                $choice = mysqli_real_escape_string($conn, $_POST["choice"][$i]);
            }

            $choiceQuery = "INSERT INTO vleQuizQuestionChoices(quizID, choice, questionID) VALUES($quizID,'$choice', $questionID)";

            $choiceResult = mysqli_query($conn, $choiceQuery) or die(mysqli_error($conn));
            
            $_SESSION['choiceSuccess'] = "Your choices have been added successfully to $title";
        }
    } else {
        $_SESSION['choiceError'] = "Their is a problem with your choices for $title";
    }


    //insert the correct quiz choices
    //check the correct answer  
    $choiceCount = count($_POST["check"]);
    if (!empty($_POST['check']) && $choiceCount == 1) {

        foreach ($_POST["check"] as $check) {
            $correctChoiceQuery = "INSERT INTO vleQuizChoicesCorrect(choiceID, questionID) VALUES('$check', $questionID)";
            $correctChoiceResult = mysqli_query($conn, $correctChoiceQuery) or die(mysqli_error($conn));
            $correctChoice = $_POST['check'];
        }
        
        
        
        $_SESSION['correctChoiceSuccess'] = "Your $correctChoice choice has been entered as the correct choice";
        header('Location: createquiz.php');
        return;
    } else {
        $_SESSION['correctChoiceError'] = "There has been a problem with your correct choice";
        header('Location: createquiz.php');
        return;
    }
    mysqli_close($conn);
} 



if (isset($_POST['anotherQuestion'])) {

    //////insert the quiz title and module if they are set otherwise send them in a session variable///////
    $title = mysqli_real_escape_string($conn, $_POST['quiztitle']);
    $module = mysqli_real_escape_string($conn, $_POST['module']);
    if ((!empty($title)) && (!empty($module))) {
        
        $_SESSION['quizTitle'] = "$title";
        $_SESSION['quizModule'] = "$module";
        
        ///////validation to ensure the quiz title is unique for this module//////////
        $quizTitleQuery = "SELECT quizTitle FROM `vleQuizzes` WHERE quizTitle = '$title' AND moduleQuizIsFor = '$module'";
        $quizTitleResult = mysqli_query($conn, $quizTitleQuery) or die(mysqli_error($conn));
        
        if(mysqli_num_rows($quizTitleResult)==0) {
        
            $query = "INSERT INTO vleQuizzes(quizTitle, moduleQuizIsFor) VALUES ('$title', '$module')";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
            $_SESSION['quizSuccess'] = "Your quiz: $title has been created successfully for $module";
        
        } else {
            $_SESSION['titleError'] = "Your quiz title: $title is not unique for the $module module. Please enter a unique title";
        }
    } 

    /////////////////end of quiz title and module insert/////////////////
   
    

    /////////////////insert the quiz question/////////////////////////
    $question = mysqli_real_escape_string($conn, $_POST['question']);
    
    if(isset( $_SESSION['quizTitle']) && isset($_SESSION['quizModule']) ) {
        if ((!empty($question))) {
            
            $sessionTitle = $_SESSION['quizTitle'];
            $sessionModule = $_SESSION['quizModule'];

            $quizIDQuery = "SELECT id FROM `vleQuizzes` WHERE quizTitle = '$sessionTitle' AND moduleQuizIsFor = '$sessionModule'";
            $quizIDResult = mysqli_query($conn, $quizIDQuery) or die(mysqli_error($conn));

            if(mysqli_num_rows($quizIDResult)>0) {
                while ($row = mysqli_fetch_assoc($quizIDResult)) {
                    $quizID = $row['id'];
                }
            }
            $questionQuery = "INSERT INTO vleQuizQuestions(quizID, question) VALUES ($quizID, '$question')";
            $questionResult = mysqli_query($conn, $questionQuery) or die(mysqli_error($conn));
            $_SESSION['questionSuccess'] = "Your question: $question has been added successfully to $sessionTitle";
            }  else {
                
            $_SESSION['questionError'] = "Your question: $question has not been added successfully to $sessionTitle";
        }
    }

    //////////////insert the quiz question choices///////////////////

    $number = count($_POST["choice"]);

    /////////////select the question id for which the choices are to be entered/////////////
    
    $questionIDQuery = "SELECT id FROM vleQuizQuestions WHERE question = '$question' AND quizID = $quizID";
    $questionIDResult = mysqli_query($conn, $questionIDQuery) or die(mysqli_error($conn));
        
        if(mysqli_num_rows($questionIDResult)>0) {
            while ($row = mysqli_fetch_assoc($questionIDResult)) {
                $questionID = $row['id'];
            }
        }

    if ($number >= 1) {
        
        $count = 1;
        
        for ($i = 0; $i < $number; $i++) {
            
            if (trim($_POST["choice"][$i] != '')) {
                $choice = mysqli_real_escape_string($conn, $_POST["choice"][$i]);
            }

            $choiceQuery = "INSERT INTO vleQuizQuestionChoices(quizID, id, choice, questionID) VALUES($quizID, $count, '$choice', $questionID)";

            $choiceResult = mysqli_query($conn, $choiceQuery) or die(mysqli_error($conn));
            
            $_SESSION['choiceSuccess'] = "Your choices have been added successfully to $sessionTitle";
            
            $count++;
        }
    } else {
        $_SESSION['choiceError'] = "Their is a problem with your choices for $sessionTitle";
    }


    //insert the correct quiz choices
    //check the correct answer  
    $choiceCount = count($_POST["check"]);
    if (!empty($_POST['check']) && $choiceCount == 1) {

        foreach ($_POST["check"] as $check) {
            $correctChoiceQuery = "INSERT INTO vleQuizChoicesCorrect(choiceID, questionID) VALUES('$check', $questionID)";
            $correctChoiceResult = mysqli_query($conn, $correctChoiceQuery) or die(mysqli_error($conn));
            $correctChoice = $_POST['check'];
        }
        
        
        
        $_SESSION['correctChoiceSuccess'] = "Your $correctChoice choice has been entered as the correct choice";
        header('Location: addquestion.php');
        return;
    } else {
        $_SESSION['correctChoiceError'] = "There has been a problem with your correct choice";
        header('Location: addquestion.php');
        return;
    }
    mysqli_close($conn);
} 



if (isset($_POST['finishQuiz'])) {

    //////insert the quiz title and module if they are set otherwise send them in a session variable///////
    $title = mysqli_real_escape_string($conn, $_POST['quiztitle']);
    $module = mysqli_real_escape_string($conn, $_POST['module']);
    if ((!empty($title)) && (!empty($module))) {
        
        $_SESSION['quizTitle'] = "$title";
        $_SESSION['quizModule'] = "$module";
        
        ///////validation to ensure the quiz title is unique for this module//////////
        $quizTitleQuery = "SELECT quizTitle FROM `vleQuizzes` WHERE quizTitle = '$title' AND moduleQuizIsFor = '$module'";
        $quizTitleResult = mysqli_query($conn, $quizTitleQuery) or die(mysqli_error($conn));
        
        if(mysqli_num_rows($quizTitleResult)==0) {
        
            $query = "INSERT INTO vleQuizzes(quizTitle, moduleQuizIsFor) VALUES ('$title', '$module')";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
            $_SESSION['quizSuccess'] = "Your quiz: $title has been created successfully for $module";
        
        } else {
            $_SESSION['titleError'] = "Your quiz title: $title is not unique for the $module module. Please enter a unique title";
        }
    } 

    /////////////////end of quiz title and module insert/////////////////
   
    

    /////////////////insert the quiz question/////////////////////////
    $question = mysqli_real_escape_string($conn, $_POST['question']);
    
    if(isset( $_SESSION['quizTitle']) && isset($_SESSION['quizModule']) ) {
        if ((!empty($question))) {
            
            $sessionTitle = $_SESSION['quizTitle'];
            $sessionModule = $_SESSION['quizModule'];

            $quizIDQuery = "SELECT id FROM `vleQuizzes` WHERE quizTitle = '$sessionTitle' AND moduleQuizIsFor = '$sessionModule'";
            $quizIDResult = mysqli_query($conn, $quizIDQuery) or die(mysqli_error($conn));

            if(mysqli_num_rows($quizIDResult)>0) {
                while ($row = mysqli_fetch_assoc($quizIDResult)) {
                    $quizID = $row['id'];
                }
            }
            $questionQuery = "INSERT INTO vleQuizQuestions(quizID, question) VALUES ($quizID, '$question')";
            $questionResult = mysqli_query($conn, $questionQuery) or die(mysqli_error($conn));
            $_SESSION['questionSuccess'] = "Your question: $question has been added successfully to $sessionTitle";
            }  else {
                
            header('Location: createquiz.php');
            return;
        }
    }

    //////////////insert the quiz question choices///////////////////

    $number = count($_POST["choice"]);

    /////////////select the question id for which the choices are to be entered/////////////
    
    $questionIDQuery = "SELECT id FROM vleQuizQuestions WHERE question = '$question' AND quizID = $quizID";
    $questionIDResult = mysqli_query($conn, $questionIDQuery) or die(mysqli_error($conn));
        
        if(mysqli_num_rows($questionIDResult)>0) {
            while ($row = mysqli_fetch_assoc($questionIDResult)) {
                $questionID = $row['id'];
            }
        }

    if ($number >= 1) {
        $count = 1;
        
        for ($i = 0; $i < $number; $i++) {
            
            if (trim($_POST["choice"][$i] != '')) {
                $choice = mysqli_real_escape_string($conn, $_POST["choice"][$i]);
            }

            $choiceQuery = "INSERT INTO vleQuizQuestionChoices(quizID, id, choice, questionID) VALUES($quizID, $count, '$choice', $questionID)";

            $choiceResult = mysqli_query($conn, $choiceQuery) or die(mysqli_error($conn));
            
            $_SESSION['choiceSuccess'] = "Your choices have been added successfully to $sessionTitle";
            
            $count++;
        }
    } else {
        $_SESSION['choiceError'] = "Their is a problem with your choices for $sessionTitle";
    }


    //insert the correct quiz choices
    //check the correct answer  
    $choiceCount = count($_POST["check"]);
    if (!empty($_POST['check']) && $choiceCount == 1) {

        foreach ($_POST["check"] as $check) {
            $correctChoiceQuery = "INSERT INTO vleQuizChoicesCorrect(choiceID, questionID) VALUES('$check', $questionID)";
            $correctChoiceResult = mysqli_query($conn, $correctChoiceQuery) or die(mysqli_error($conn));
            $correctChoice = $_POST['check'];
        }
        
        
        
        $_SESSION['correctChoiceSuccess'] = "Your $correctChoice choice has been entered as the correct choice";
        header('Location: createquiz.php');
        return;
    } else {
        $_SESSION['correctChoiceError'] = "There has been a problem with your correct choice";
        header('Location: createquiz.php');
        return;
    }
    mysqli_close($conn);
} 
?>



