<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Movie</title>
        <link rel="stylesheet" href="https://gitcdn.link/repo/Chalarangelo/mini.css/master/dist/mini-default.min.css">


    </head>
    <body>

        <header class="sticky">
            <a href="index.php" class="logo">Phil's IMDB</a>
            <a href="addmovie.php" class="button">Add a movie</a>

        </header>

        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <?php
                    include 'conn.php';

                    $displayid = $_GET['movieid'];

                    $query = "select * from imdb where id =$displayid";

                    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $title = $row['title'];
                            $date = $row['release_date'];
                            $genre = $row['genre'];


                            echo "<div class='card sm-col-6'>
                                    <div class='section lighter'>
                                    <p> Movie ref : $displayid </p>
                                    <p>Title : $title</p>
                                    <p>Release Date : $date</p>
                                    <p>Genre : $genre</p>
                                       </div>  
                                    </div>";
                        }
                    }
                    ?>
                </div>  
            </div>
        </div>

    </body>
</html>
