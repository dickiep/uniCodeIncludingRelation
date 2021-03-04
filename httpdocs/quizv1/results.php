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
        $name = $_POST['name'];
        $q1 = $_POST['q1'];
        $q2 = $_POST['q2'];
        $q3 = $_POST['q3'];
        $score = 0;
        
        echo "<strong>Quiz  Results for $name  </strong><br/>";


        echo "<br> 1.)Your answer: $q1 - ";
      
        if ($q1 == "Cat") {
            echo "Well done that is correct. You got 1 point.";
            $score++;
        } else {
            echo "Its not a horse it was a Cat. Hard luck!";
        }
        
        echo "<br> 2.)Your answer: $q2 - ";
        
        if ($q2 == "Grizzly") {
            echo "Well done that is correct. You got 1 point.";
            $score++;
        } else {
            echo "Its not a Polar bear it was a Grizzly. Hard luck!";
        }
        
         echo "<br> 3.)Your answer: $q3 - ";
        
        if ($q3 == "Trees") {
            echo "Well done that is correct. You got 1 point.";
            $score++;
        } else {
            echo "Its not Burrows it was Trees. Hard luck!";
        }
        
        echo "<br>You scored : $score";
        
        ?>		
    </body>
</html>
