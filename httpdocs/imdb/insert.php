<?php

include 'conn.php';

$title = mysqli_real_escape_string($conn, $_POST['title']);
$date = mysqli_real_escape_string($conn, $_POST['date']);
$genre = mysqli_real_escape_string($conn, $_POST['genre']);

$query = "insert into imdb (title, release_date, genre) values ('$title', '$date', '$genre')";

$result = mysqli_query($conn, $query) or die(mysqli_error($conn));


echo "<div class='card sm-col-6'>
      <div class='section lighter'>
      <p> Great $title has been added</p>
      </div>  
      </div>";
?>

