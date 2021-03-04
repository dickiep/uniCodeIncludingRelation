<?php
include 'conn.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>


        <meta charset="utf-8">
        <title>QUB Job Listings</title>

        <meta name="viewport" content="width=device-width, initial-scale=1">


        <link rel="stylesheet" href="skeleton/normalize.css">
        <link rel="stylesheet" href="skeleton/skeleton.css">
        <link rel="stylesheet" href="css/custom.css">

        <!-- JQUERY CDN library -->

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

        <script>

            $(document).ready(function () {


            }

        </script>

    </head>

    <body>     

        <div id="main">
            <article>
                <?php
                $myjobtitle = $_POST['title'];
                $mydepartment = $_POST['department'];
                $mysalary = $_POST['salary'];
                $mydescription = $_POST['description'];


                $query = "INSERT INTO jobs(title, department, description, salary)VALUES('$myjobtitle', '$mydepartment','$mydescription','$mysalary')";

                $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

                mysqli_close($conn);
                echo "<p>Thanks for adding the job $myjobtitle.</p>";
                echo "<div>
 <a href='index.php'>Home</a>
 </div>";
                ?> 
            </article> 
        </div>

    </body>
</html>

