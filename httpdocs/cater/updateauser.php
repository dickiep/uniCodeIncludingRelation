<?php 

session_start();

include'connections/conn.php';

$firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
$lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
$emailAddress = mysqli_real_escape_string($conn, $_POST['emailAddress']);
$userID = $_POST['userID'];

$updateQuery = "UPDATE vleUsers SET firstName = '$firstName', lastName = '$lastName', emailAddress = '$emailAddress' WHERE vleUsers.id = $userID";
$updateResult = mysqli_query($conn, $updateQuery) or die(mysqli_error($conn));


mysqli_close($conn);

$_SESSION['updateSuccess'] = "That is everything updated $firstName.";
header('Location: edituser.php');
return;



?>