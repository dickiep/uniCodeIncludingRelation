<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h3><?php echo 'Quiz'; ?></h3>

        <form action="results.php" method="POST">
            <p>
            Username: <input type="text" name="name">
            </p>

            <p>1.) What is thought to be the earliest domesticated animal?<br>
            <input type="radio" name="q1" value="Horse"> Horse<br>
            <input type="radio" name="q1" value="Cat"> Cat
            </p>

            <p>
            2.) Which is largest of the bears?<br>
            <input type="radio" name="q2" value="Polar"> Polar<br>
            <input type="radio" name="q2" value="Grizzly"> Grizzly
            </p>

            <p>
            3.) In nature, what does a dendrologist study?<br>
            <input type="radio" name="q3" value="Trees"> Trees<br>
            <input type="radio" name="q3" value="Burrows"> Burrows
            </p>

            <p>
            <input type="submit" name="submit" value="Submit Quiz">
            </p>

            <p>
            <input type="reset" value="Reset Quiz">
            </p>

        </form>
    </body>
</html>
