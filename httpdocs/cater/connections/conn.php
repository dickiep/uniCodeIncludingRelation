<?php

$host = "localhost";
$user = "pdickie01";
$password = "Hotdogs1234";
$database = "pdickie01";

$conn = mysqli_connect($host, $user, $password, $database);

if(!$conn) {
    die("connection error ".mysqli_connect_error());
}