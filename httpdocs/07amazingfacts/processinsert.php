<?php
include('connect.php');

$myfactdata =  $_POST["myfact"];

$insertquery = "INSERT INTO myfacts (id, factcontent) VALUES (null, '$myfactdata')";
$result  = mysqli_query($conn,$insertquery) or die(mysqli_error($conn));

?>
