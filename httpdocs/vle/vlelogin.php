<?php
include('connections/conn.php');
?>

<!DOCTYPE html>

<html>

    <head>
        <meta charset="UTF-8">
        <title>Login to privLearn</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <link rel="stylesheet" href ="styles/vlelogin.css">


        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    </head>
    <body>
        <div class="container">
            <div class="whitesquare">
                <div class="owl">
                    <div class="owl__body">
                        <div class="owl__eyes">
                            <div class="owl__eyes--left eye"></div>
                            <div class="owl__eyes--right eye"></div>
                        </div>
                        <div class="owl__nose">
                            <div class="owl__nose--inner"></div>
                        </div>
                    </div>
                </div>
            </div>           
        
        
         <div id = "main">

            <form class="signin-form" action="sign.php" method="post">
                
                <h1 class="h3 mb-2 font-weight-normal">&nbspLogin to privLearn</h1>
                <input type="email" name="userfield" id="inputEmail" class="form-control" placeholder="Email address" required>
                <input type="password" name="passfield" id="inputPassword" class="form-control" placeholder="Password" required>
                <div class="checkbox mb-3">
                        <a href="forgotpassword.php">Forgot your Password?</a> 
                </div>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
            </form>
             </div>
            </div>
    </body>
</html>
