<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="text/html; UTF-8" http-equiv="Content-Type">;
        <title>Variables</title>
        <link rel="stylesheet" href="styles/mystyle.css"> 
    </head>
    <body>
        
        <div id="container">
            
            
        
        
        <div id="top">Users</div>
        
        <div id="main">
            
            <form action="usercal.php" method="POST">
                
                <div class="wrap">
                    Name:
                    <input type="text" name="name" placeholder="please enter your name...">
                    
                </div>
                
                
                <div class="wrap">
                    University:
                    <select name="university">
                        <option value = 'qub'>QUB</option>
                        <option value = 'uu'>UU</option>
                        <option value = 'other'>Other</option>
                    </select>
                </div>
                
                 <div class="wrap">
                    Start Year:
                    <select name="startyear">
                        <option value = '2008'>2008</option>
                        <option value = '2009'>2008</option>
                        <option value = '2010'>2010</option>
                        <option value = '2011'>2011</option>
                        <option value = '2012'>2012</option>
                        <option value = '2013'>2013</option>
                        
                    </select>
                </div>
                
                 <div class="wrap">
                    Finish Year:
                    <select name="finishyear">
                        <option value = '2011'>2011</option>
                        <option value = '2012'>2012</option>
                        <option value = '2013'>2013</option>
                        <option value = '2014'>2014</option>
                        <option value = '2015'>2015</option>
                        <option value = '2016'>2016</option>
                        
                    </select>
                </div>
                
                <input type="submit" name="submit" value="add user">
            </form>
            
        </div>
        
        <div id="footer">footer</div>
            
        </div>
       
    </body>
</html>
