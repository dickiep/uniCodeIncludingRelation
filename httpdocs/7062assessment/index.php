<?php
include 'conn.php';

$query = "SELECT * FROM 7062tech_news ORDER BY 'publisheddate' DESC";

$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>tech news 4 uni</title>
        <link rel="stylesheet" href="http://education.eeecs.qub.ac.uk/cute/css/normalize.css">
        <link rel="stylesheet" href="http://education.eeecs.qub.ac.uk/cute/css/cutegrids.css">

        <link rel="stylesheet" href="styles/myui.css">

        <!--  For IE8 support include the following Respond.js for support of media queiries and also download and include the REM pollyfill from https://github.com/chuckcarpenter/REM-unit-polyfill for REM support -->
        <!--[if lt IE 9]>
            <script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.js"></script>
                    <script src="//cdnjs.cloudflare.com/ajax/libs/modernizr/2.7.1/modernizr.min.js"></script>
        <![endif]-->

        <!-- JQUERY CDN library -->

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

        <script>

            $(document).ready(function () {


            });

        </script>

    </head>

    <body>

        <div  id='head'>
            <h3>Tech News 4 Uni</h3>
            <div class ="row">
            <a href='general.php' class='btn' style='float:right; display: inline'>general</a>
            <a href='phones.php' class='btn' style='float:right; display: inline'>phones</a>
            <a href='wearables.php' class='btn' style='float:right; display: inline'>wearables</a>
            </div>
            
        </div>



        <div class='row'>
            <div class='cute-8-tablet'>



                <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $headline = $row['headline'];
                        $author = $row['author'];
                        $date = $row['publisheddate'];
                        $id = $row['id'];
                        echo "<div class = 'row'><div><h3>$headline</h3></div><div>by: $author published on: $date</div><div><a href='news.php?getid=$id' class='btn' style='float:right; display: inline'>more</a></div></div>";
                                
                    }
                } else {
                    echo 'empty table';
                }
                ?>

            </div>

            <div class='cute-4-tablet'>
                    <?php
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {

                            $id = $row['id'];

                            echo "<a href='news.php?getid=$id' class='btn'>more</a>";
                        }
                    } else {
                        echo 'empty table';
                    }
                    ?>
               
            </div>
        </div>





    </body>
</html>
