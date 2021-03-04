<?php 
$uname = $_POST['name'];
$university = $_POST['university'];
$startyear = $_POST['startyear'];
$finishyear = $_POST['finishyear'];

$enrol = $finishyear-$startyear;


?>

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
         <div id="container">
            
            
        
        
        <div id="top">Users</div>
        
        <div id="main">
            
            <div id ='users'></div>
            <?php
            echo $university, $uname, $startyear, $finishyear, $enrol;
            ?>
                    
                </div>
                
                
         </div>
        
        <div id="footer">footer</div>
            
        </div>
    </body>
</html>
