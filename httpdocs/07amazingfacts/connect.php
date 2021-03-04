<?php

$password="";
$user = "";
$webserver="";
$db = "";   

$conn = mysqli_connect($webserver, $user, $password, $db);  

 if(!$conn){
    die("connection failed: ".mysqli_connect_error());
} 

