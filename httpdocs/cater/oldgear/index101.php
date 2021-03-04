<!DOCTYPE html>
<!--
Author: Phillip Dickie
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>vlite home</title>
        
        <link rel="stylesheet" href="css/3sectionpagestyle.css">
    </head>
    <body>
        <div class="container">
            
            <div class ="header">
                
                <?php
                 require 'nav.php';
                ?>
                
            </div>
            
            <div class ="row">
                <div class = "col-sm-3" id = "leftsection">
               
                <!-- start of collapsable left section -->
                <div class = "leftsectionbutton">                   
                    <button
                        type="button">
                        
                        open
                        
                    </button>     
                </div>
                <!-- end of collapsable nav bar -->
                
                <!-- start of uncollapsable nav bar -->
                
                    <p>Left Section</p>
                
                <!-- end of uncollapsable nav bar -->
            </div> 
                
                
                
                
           
            
            <div class ="col-md-8 col-xs-12" id="rightsection">
                
                <div class ="pageheader">
                <h4>Welcome to vl<i>it</i>e</h4>
                </div>
                <?php
                 require 'breadcrumb.php';
                ?>
                
            </div> 
            </div>
            
        </div>
        
        
    </body>
</html>
