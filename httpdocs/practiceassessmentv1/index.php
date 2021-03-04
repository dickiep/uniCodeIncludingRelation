<?php
include 'conn.php';

$query = "select * from jobs";

$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

//print_r($result);

mysqli_close($conn);
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



        <!-- Primary Page Layout
        –––––––––––––––––––––––––––––––––––––––––––––––––– -->
        <div class="row">
            <div class="one-full column title"> 
                <div>

                    <h3 style="margin: 15px;">QUB Jobs</h3> 

                </div>
            </div>
        </div>

        <div class = "row">
            <div class="one-full column" style="height: 5px;">
                <h5 style="margin: 10px;">Current Vacancies</h5>
            </div>
        </div>




        <!-- grid engine example -->
        <!-- .container is main centered wrapper -->



        <!-- columns should be the immediate child of a .row -->
        <div id = 'main'>
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

                        echo "<div id = 'space'>";
                        echo "</div>";
                        echo "<div id = 'content'>";

                        echo "<h5 style = 'display: inline-block'><strong> $title &pound;$salary&nbsp</strong></h5><p style = 'display: inline-block'><strong> per annum </strong></p>";
                        echo "<a class='button info' href=displayjob.php?jobid=$rowid>more info</a>";
                        echo "<p> dept: $department </p>";
                        echo "<p> $description </p>";
                        echo "</div>";
                    }
                }
                ?>	


          

            </article>
        </div>





    </body>
</html>