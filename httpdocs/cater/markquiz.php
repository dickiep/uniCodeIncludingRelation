<?php
if(isset($_POST['markQuiz'])){
    
    session_start();
    
    include'connections/conn.php';
    
    $choiceQuery = "SELECT questionID, choiceID FROM vleQuizChoicesCorrect WHERE questionID = 23";

    $check = $_POST['check'];
    $quizid = $_POST['quizid'];
    $questionid = $_POST['questionid'];
    
    $correctAnswers = 0;
    
   
    /*
    foreach($questionid as $q) {
       echo" questionid:$q ";
    }
    
    foreach($check as $c) {
        
        echo"check :$c questionid:$q";
        $correctChoiceQuery = "SELECT questionID, choiceID FROM vleQuizChoicesCorrect WHERE questionID = $q AND choiceID = $c";
        $correctChoiceResult = mysqli_query($conn, $correctChoiceQuery) or die(mysqli_error($conn));
        
        if(mysqli_num_rows($correctChoiceResult)>0) {
            $correctAnswers++;
        }
    }
    
    
    $numberofquestions = count($questionid);
    
    for($x = 0; $x<=$numberofquestions; $x++){
        echo"check :$check[$x] questionid:$questionid[$x]";
    }
    
    */
    
    foreach($check as $c) {
        $str = $c;
        parse_str($str, $output);
        $checkedvalue =  $output['checked'];
        $questionvalue =  $output['questionid'];
        
        $correctChoiceQuery = "SELECT questionID, choiceID FROM vleQuizChoicesCorrect WHERE questionID = $questionvalue AND choiceID = $checkedvalue";
        
        $correctChoiceResult = mysqli_query($conn, $correctChoiceQuery) or die(mysqli_error($conn));
        
        if(mysqli_num_rows($correctChoiceResult)>0) {
            $correctAnswers++;
        }
    }
    
    mysqli_close($conn);
    
    $_SESSION['yourScore'] = "You scored $correctAnswers";
    header('Location: takequiz.php');
    return;
    
}


?>