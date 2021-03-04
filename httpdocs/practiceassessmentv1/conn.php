<?php

$conn = mysqli_connect('localhost', 'pdickie01', 'Hotdogs1234', 'pdickie01');

if(!$conn) {
    die('Connection Error'. mysqli_connect_error());
}

