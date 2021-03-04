<?php
include 'conn.php';

$displayid = $_GET['getid'];

$query = "SELECT * FROM 7062tech_news WHERE id = $displayid";

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
        <div id='head'>
            <h3>Tech News 4 Uni</h3>
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
                        $subject = $row['subject'];
                        $content = $row['content'];
                        
                        echo "<div class = 'row'><div class='cute-4-tablet'>
                            <div class = 'row'>
                            <strong>$subject</strong>
                            </div>
                            <div class = 'row'>
                            published on: $date
                            </div>
                            </div>
                            
                        
                        <div class='cute-8-tablet'>
                            <div class = 'row'>
                            <h2>$headline</h2>
                            </div>
                            <div class = 'row'>
                            $content
                            </div>
                            <div><a href='index.php' class='btn' style = 'float:right;'>back</a></div>
                            </div>
                            </div>";
                        
                        //echo "<div><div><h3>$headline</h3></div><div>by: $author published on: $date</div><div><a href='news.php?getid=$id' class='btn'>more</a></div></div>";
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
