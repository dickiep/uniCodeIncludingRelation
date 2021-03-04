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

                    <form method="POST" action="insert.php">
                        <fieldset>
                            <legend>Movie Details</legend>
                            <div class="input-group fluid">
                                <label for="title">Title</label>
                                <input type="text" value="" name="title" required="required">
                            </div>
                            <div class="input-group fluid">
                                <label for="date">Password</label>
                                <input type="date" value="" name="date" required="required">
                            </div>
                            <div class="input-group vertical">
                                <label for="genre">Genre</label>
                                <select name="genre">
                                    <option>Comedy</option>
                                    <option>Action</option>
                                    <option>Mystery</option>
                                </select>
                            </div>
                        </fieldset>
                        <button type=submit class="button">add movie</button>
                    </form>

                </div>  
            </div>
        </div>

    </body>
</html>