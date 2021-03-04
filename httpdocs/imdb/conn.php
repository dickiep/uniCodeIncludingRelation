<?php

$user = 'pdickie01';
$server = 'localhost';
$pw = 'Hotdogs1234';
$db = 'pdickie01';

$conn = mysqli_connect($server, $user, $pw, $db);

if (!$conn) {
    die("Connention error : ".mysqli_connect_error());
}


