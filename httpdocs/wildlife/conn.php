<?php

$user = "pdickie01";
$webserver="localhost";
$password="Hotdogs1234";
$db="pdickie01";

$conn = mysqli_connect($webserver, $user, $password, $db);

if(!$conn) {
    die("Connection failed: " .mysqli_connect_error() );
}

?>