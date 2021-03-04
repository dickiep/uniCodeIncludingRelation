<?php
include 'conn.php';


$displayid = $_GET['jobid'];

$jobquery = "select * from jobs where id = $displayid";

$jobresult = mysqli_query($conn, $jobquery);

//print_r($jobresult);

mysqli_close($conn);
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Job</title>
        
        <link rel="stylesheet" href="https://gitcdn.link/repo/Chalarangelo/mini.css/master/dist/mini-default.min.css">
        <link rel="stylesheet" href="styles/custom.css">
        
    </head>
    <body>
        <?php
        $num = mysqli_num_rows($jobresult);

        if ($num > 0) {

            while ($row = mysqli_fetch_assoc($jobresult)) {


                $title = $row['title'];
                $salary = $row['salary'];
                $department = $row['department'];
                $description = $row['description'];


                echo "<div class='card fluid'>
                 <div class='section'>
                 <p>$title $salary</p>
                 <p>$department</p>
                 <p>$description</p>
                 </div>
                 </div>";
            }
        } else {
            echo "stuff not in table";
        }
        ?>
    </body>
</html>
