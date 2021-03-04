<?php

$user = 'pdickie01';
$password = 'Hotdogs1234';
$server = 'localhost';
$db = 'pdickie01';

$conn = mysqli_connect($server, $user, $password, $db);

if (!$conn) {
    die(mysqli_connect_error("Conection Error". mysqli_error($conn)));
}
