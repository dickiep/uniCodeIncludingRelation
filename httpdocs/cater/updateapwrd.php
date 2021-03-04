<?php 

session_start();

include'connections/conn.php';

$firstPwrd = mysqli_real_escape_string($conn, $_POST['firstPwrd']);
$secondPwrd = mysqli_real_escape_string($conn, $_POST['secondPwrd']);
$userID = $_POST['userID'];

if(strcmp($firstPwrd,$secondPwrd)===0) {
    
    $updateQuery = "UPDATE vleUsers SET pword = md5('$firstPwrd') WHERE vleUsers.id = $userID";
    $updateResult = mysqli_query($conn, $updateQuery) or die(mysqli_error($conn));

    mysqli_close($conn);

    $_SESSION['updatePasswordSuccess'] = "Your password has been updated!";
    header('Location: edituser.php');
    return;
    
} else {
    
    $_SESSION['updatePasswordError'] = "Your passwords do not match.";
    header('Location: edituser.php');
    return;
    
}

?>