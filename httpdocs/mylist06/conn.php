<?php

$db = "pdickie01";
$user = "pdickie01";
$server = "localhost";
$pw = "Hotdogs1234";

$conn = mysqli_connect($server, $user, $pw, $db);

if(!$conn) {
    die("Connection Failed: ". mysqli_connect_error());
}



