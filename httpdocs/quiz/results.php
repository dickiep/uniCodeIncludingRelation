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
        <?php
        $name = $_POST["name"];
        $q1 = $_POST["q1"];

        echo "<strong>Quiz  Results for $name  </strong><br/>";


        echo ' 1.)Your answer: $q1 - ';


        if ($q1 == "Cat") {
            echo 'Well done that is correct. You got 1 point.';	
                }else{
                echo "Its not a horse it was a Cat. Hard luck!";
                }
        ?>
    </body>
</html>
