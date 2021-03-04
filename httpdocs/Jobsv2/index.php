<?php
include 'conn.php';

$query = "select * from jobs";

$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

//print_r($result);

mysqli_close($conn);
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
        <title>Qub Jobs Homepage</title>


        <link rel="stylesheet" href="https://gitcdn.link/repo/Chalarangelo/mini.css/master/dist/mini-default.min.css">
        <link rel="stylesheet" href="styles/custom.css">
    </head>
    <body>

        <header class="sticky" class = "myheader">
            <a href="index.php" class="logo">QUB Jobs</a>
        </header>    




        <div class="container">
            <div class="row">
                <div class="col-sm-12">


                    <article>
                        <?php
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {

                                //get data from columns
                                $title = $row['title'];
                                $department = $row["department"];
                                $description = $row["description"];
                                $salary = $row['salary'];
                                $rowid = $row['id'];

                                echo "<div class='card fluid'>";
                                echo "<div class='section darker'>";
                                echo "<div class='titlesalary'>";
                                echo "<h4 style='display: inline-block;'><strong> $title &pound;$salary</strong></h4><p style='display: inline-block; position: relative; right: 10px;'><strong> per annum </strong></p>";
                                echo "<a style = 'float: right; background: red !important; color: white !important; border-color: white !important;' class='button info' href=displayjob.php?jobid=$rowid>more info</a>";
                                echo "</div>";
                                echo "<p> dept: $department </p>";
                                echo "<p> $description </p>";

                                echo "</div>";
                                echo "</div>";
                            }
                        }
                        ?>	
                    </article>

                </div>
            </div>  
        </div>


        <?php
        // put your code here
        ?>
    </body>
</html>
