<?php

session_start();

include '../connections/conn.php';

$uname = $_POST['userfield'];

$pword = $_POST['passfield'];

$checkuser = "select * from vleUsers where emailAddress = '$uname' and pword=MD5('$pword')";

$userresult = mysqli_query($conn, $checkuser) or die(mysqli_error($conn));

mysqli_close($conn);

if(mysqli_num_rows($userresult)>0) {
    $_SESSION["admin_40056370"] = $uname;
    header("Location: adminindex.php");
} else {
    header("Location: login.php");
}
?>
