<?php

session_start();

if(isset($_POST['sendEmail'])) {

    include'connections/conn.php';

    $email = mysqli_real_escape_string($conn, $_POST["emailAddress"]);  

    $passwordchars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%&*_";
    $password = substr( str_shuffle( $passwordchars ), 0, 8 );

    $passwordquery = "UPDATE vleUsers SET pword= md5('$password') WHERE vleUsers.emailAddress='$email'";
    $passwordresult = mysqli_query($conn, $passwordquery) or die(mysqli_error($conn));  
    
    
if($passwordresult) {
    $to = $email;
    $subject = 'Your New Password...';
    // Let's Prepare The Message For E-mail.
    $message = 'Hello User
    Your new password : '.$password.'
    E-mail: '.$email.'
    Now you can login with this email and password.';
    // Send The Message Using mail() Function.
    if(mail($to, $subject, $message )) {
        $_SESSION['emailSuccess'] = "A new Password has just been been emailed to you.";
        header('Location: login.php');
        return;
    } else {
        $_SESSION['emailFailure'] = "Email has not worked";
        header('Location: login.php');
        return;
    }
} else {
    $_SESSION['emailFailure'] = "Email is not valid";
    header('Location: login.php');
    return;
    
}
}


?>
