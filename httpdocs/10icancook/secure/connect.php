<?php
//connect to the local MySQL database using PHP

include("password.php");
$webserver="localhost";
$user="pdickie01";
$database="pdickie01";

//mysqli api library in PHP to connect to the DB
$conn = mysqli_connect($webserver, $user, $password, $database);

if(!$conn){
    die("Connection failed: " . mysqli_connect_error() );
}



