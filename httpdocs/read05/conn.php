<?php 

$user = 'pdickie01';
$webserver='localhost';
$password='Hotdogs1234';
$db = 'pdickie01';

$dbc = mysqli_connect('127.0.0.1:3306', 'root', 'root', 'teepee') or die('Error connecting to MySQL server.');

//$conn = mysqli_connect($webserver, $user, $password, $db);

if(!$dbc) {
    
    die("Connection failed : " .mysqli_connect_error());
    
}else {
    
    echo '<p>connection success</p>';
    
}

?>