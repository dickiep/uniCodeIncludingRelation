<?php
//include password
include("password.php");
//declare MySQL username
$user = "pdickie01";
//declare webserver
$webserver = "localhost";
$db = "pdickie01";

//mysqli api library in PHP to connect to the DB
$conn = mysqli_connect($webserver, $user, $password, $db);

if(!$conn){
    die("Connection failed: " . mysqli_connect_error() );
}
