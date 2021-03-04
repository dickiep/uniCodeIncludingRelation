<?php

session_start();

include 'connections/conn.php';

$uname = $_POST['userfield'];
$pword = $_POST['passfield'];

$checkstudent = "select * from vleUsers where emailAddress = '$uname' and pword=MD5('$pword') and userType='1'";
$checkinstructor = "select * from vleUsers where emailAddress = '$uname' and pword=MD5('$pword') and userType='2'";
$checkadmin = "select * from vleUsers where emailAddress = '$uname' and pword=MD5('$pword') and userType='3'";

$studentresult = mysqli_query($conn, $checkstudent) or die(mysqli_error($conn));
$instructorresult = mysqli_query($conn, $checkinstructor) or die(mysqli_error($conn));
$adminresult = mysqli_query($conn, $checkadmin) or die(mysqli_error($conn));

if(mysqli_num_rows($studentresult)>0) {
    $_SESSION["student"] = $uname;
    header("Location: index.php");
} else if (mysqli_num_rows($instructorresult)>0){
    $_SESSION["instructor"] = $uname;
    header("Location: index.php");  
} else if (mysqli_num_rows($adminresult)>0){
    $_SESSION["admin"] = $uname;
    header("Location: index.php");
} else {
    header("Location: login.php");  
}

mysqli_close($conn);
