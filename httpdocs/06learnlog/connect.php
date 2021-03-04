<?php

include("pw.php");
$user = "pdickie01";
$webserver="localhost";
$db = "pdickie01";        

$conn = mysqli_connect($webserver, $user, $pw, $db);
if(!$conn){
    die("connection failed:".mysqli_connect_error());
}

?>