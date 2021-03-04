<?php
include 'conn.php';


?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
        $title = $_POST['title']; 
        $department = $_POST['department'];
        $salary = $_POST['salary'];
        $description = $_POST['description'];
        
                
        $jobinsertquery = "insert into jobs (title, department, salary, description) values ('$title', '$department', '$salary', '$description')";

        $result = mysqli_query($conn, $jobinsertquery) or die(mysqli_error($conn));

        mysqli_close($conn);
        
        echo "Great the job $title has been added to the site";

        
        ?>
    </body>
</html>
