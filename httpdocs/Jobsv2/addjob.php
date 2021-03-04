<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Add a Job</title>

        <link rel="stylesheet" href="https://gitcdn.link/repo/Chalarangelo/mini.css/master/dist/mini-default.min.css">
        <link rel="stylesheet" href="styles/custom.css">

    </head>
    <body>
        <form name ="addjobform" method="POST" action="insert.php">
            <fieldset>
                <legend>Add a Job</legend>
                <div class='row'>
                    <div class="input-group four-col">
                        <label for="title" required>Job Title</label>
                        <input type="text" name='title' placeholder="...">
                    </div>

                    <div class="input-group four-col">
                        <label for="title" required>Salary</label>
                        <input type="number" name='salary' placeholder="...">
                    </div>


                    <div class="input-group fluid">
                        <label>Department</label>
                        <select for="department" name='department'>
                            <option>EEECS</option>
                            <option>Maths</option>
                            <option>Economics</option>
                        </select>

                    </div>
                </div>

                <div class='row'>
                    <div class="input-group fluid">
                        <label for="description">Description</label>
                        <textarea type="text area" name='description'></textarea>
                    </div>
                </div>
            </fieldset>
            <input type="submit" class="tertiary" value="Add Job">
        </form>

        <?php
        // put your code here
        ?>
    </body>
</html>
