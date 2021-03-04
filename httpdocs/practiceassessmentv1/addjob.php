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

        <div class="row">
            <div class="one-full column title"> 
                <div>

                    <h3 style="margin: 15px;">QUB Jobs</h3> 

                </div>
            </div>
        </div>



        <div class='container addjob'>
            <h3>Add a job</h3>
            <form name="newjob" method="POST" action="insert.php">
                <div class='row'>
                    <div class='four columns'>
                        <label>Title</label>
                        <input class='u-full-width' type='text' name = 'title' placeholder='Job Title...'>
                    </div>
                    <div class='four columns'>
                        <label>Department</label>
                        <select class='u-full-width' name = 'department'>
                            <option value='1'>EEECS</option>
                            <option value='2'>Economics</option>
                            <option value='3'>Geography</option>
                        </select>
                    </div>
                    <div class='four columns'>
                        <label>Salary</label>
                        <input class='u-full-width' type='text' name = 'salary' placeholder='&pound...'>
                    </div>
                </div>
                <div class='row'>
                    <label for='exampleMessage'>Job Description</label>
                    <textarea class='u-full-width' name = 'description' placeholder='...'></textarea>
                    <input class='addjobbutton button-primary' type='submit' value='Submit'> 
                    <a class='button' href='addjob.php'>Cancel</a>
                </div>
            </form>
        </div>


    </body>
</html>