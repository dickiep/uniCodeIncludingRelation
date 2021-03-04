<?php


include 'connections/conn.php';

if (isset($_SESSION["student"])){
    $email = $_SESSION["student"];
    
    $query = "select * from vleModules join vleStudentTakes on vleModules.moduleCode = vleStudentTakes.moduleCode join vleUsers on vleStudentTakes.studentID=vleUsers.id join vleTeacherTeaches on vleStudentTakes.moduleCode = vleTeacherTeaches.moduleCode where vleUsers.emailAddress='$email'";
    
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    
    
    
} else if (isset($_SESSION["admin"])){
    $email = $_SESSION["admin"];
    
    $query = "select * from vleModules join vleStudentTakes on vleModules.moduleCode = vleStudentTakes.moduleCode join vleUsers on vleStudentTakes.studentID=vleUsers.id where vleUsers.emailAddress='$email'";
    
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
   
    
    
} else if (isset($_SESSION["instructor"])){
    
    $email = $_SESSION["instructor"];
    
    $query = "select * from vleModules join vleTeacherTeaches on vleModules.moduleCode = vleTeacherTeaches.moduleCode join vleUsers on vleTeacherTeaches.teacherID=vleUsers.id where vleUsers.emailAddress='$email'";

    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    
    } else {
    
    header('Location: login.php');
}

?>