<?php
include('connections/conn.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Login to vlite</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <link rel="stylesheet" href ="css/loginstyle.css">
        
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src=https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js></script>
        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>

    </head>
    <body>
               
       
         <div class = "container">
             <div id="owlcentre">
             <div class="row" id="signinform">
                 <div class = "col-lg-4 col-xs-10 offset-lg-4 offset-xs-1">
                     
                    
            <form class="signin-form" action="sign.php" method="post">
                <div id="loginheading">
                    <img src="img/owl_favicon.png" alt="owl favicon" class = "owlfavicon">
                    <h1 class="h3 mb-2 font-weight-normal">&nbsp;&nbsp;Login to <br><i>HF</i> Training</h1>
                </div>
                <input type="email" name="userfield" id="inputEmail" class="form-control" placeholder="Email address" required>   
                <input type="password" name="passfield" id="inputPassword" class="form-control" placeholder="Password" required>
                <div class="checkbox mb-3">
                        <a href="#" id='forgotPassword'>Forgot your Password?</a> 
                <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
                    </div>
            </form>
                       <?php
                     if(isset($_SESSION['emailFailure'])){
                        $failure = $_SESSION['emailFailure'];
                         echo"<p style='color: red'>$failure</p>";
                         unset($_SESSION['emailFailure']);
                     }
                     
                     if(isset($_SESSION['emailSuccess'])){
                        $success = $_SESSION['emailSuccess'];
                         echo"<p style='color: green'>$success</p>";
                         unset($_SESSION['emailSuccess']);
                     }
                     ?>
                      <div class="col-12" id="forgotPasswordForm" style="display: none;">
                            
                            <form action="forgottenpwrd.php" method="post">
                              <div class="form-group">
                                <label for="emailAddress" style="color: white;">Enter Your Registered Email Address :</label>
                                <input type="email" class="form-control" id="emailAddress" name="emailAddress" placeholder="To recieve a new password..." required>
                              </div>

                                <button type="submit" class="btn btn-danger" name="sendEmail">Send the mail</button>
                                </form>
                            
                        </div>
                     
                </div>
            </div>
         </div>
             
             
                       
             
             
                    <script>
                        $(function () {
                            $("#forgotPassword").click(function () {
                                if ( $( "#forgotPasswordForm" ).is( ":hidden" ) ) {
                                    $( "#forgotPasswordForm" ).slideDown( "slow" );
                                } else {
                                    $( "#forgotPasswordForm" ).hide();
                                }
                            });  
                            
                        });
                    </script>
             
             
             
             
             
             
             
             
             
             
        </div>
    </body>
</html>
