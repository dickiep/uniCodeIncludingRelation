<?php
include 'conn.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Add a student</title>

        <link rel="stylesheet" href="https://gitcdn.link/repo/Chalarangelo/mini.css/master/dist/mini-default.min.css">
        <link rel="stylesheet" href ="styles/mystyles.css">

    </head>
    <body>



        <header>
            <a href="index.php" class="logo">The Priv</a>
            <a href="index.php" class="button">Home</a>
            <span>|</span>
            <a href="liststudents.php" class="button">Students</a>
            <span>|</span>
            <button>Contact</button>
        </header>
        <div class='container'>
            <div class='row'>
                <div class='col-sm-6'>
                    <?php
                    $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
                    $lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
                    $email = mysqli_real_escape_string($conn, $_POST['email']);
                    $department = mysqli_real_escape_string($conn, $_POST['department']);
                    $startYear = mysqli_real_escape_string($conn, $_POST['startYear']);
                    $finishYear = mysqli_real_escape_string($conn, $_POST['finishYear']);

                    if ((!empty($firstName)) && (!empty($lastName)) && (!empty($email)) && (!empty($department)) && (!empty($startYear)) && (!empty($finishYear))) {

                        $query = "insert into students(firstName, lastName, email, department, yearOfStart, predictedYearOfFinish) values ('$firstName','$lastName','$email','$department','$startYear','$finishYear')";

                        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

                        mysqli_close($conn);

                        echo "Great $firstName has been added";
                    } else {
                        echo "please make sure you've filled out all of the form details
                                <form action = 'insertstudent.php' method='POST' name = 'addstudentform'>
                            <fieldset>
                                <legend>Add a Student</legend>
                                <div class='input-group fluid'>
                                    <label for='firstName'>First Name</label>
                                    <input type='text' value='' id='firstName' name ='firstName'>
                                </div>
                                <div class='input-group fluid'>
                                    <label for='lastName'>Last Name</label>
                                    <input type='text' value='' id='lastName' name ='lastName'>
                                </div>
                                <div class='input-group fluid'>
                                    <label for='email'>Email Address</label>
                                    <input type='email' value='' id='email' name ='email' required='required'>
                                </div>
                                <div class='input-group'>
                                    <label for='department'>Department</label>
                                    <select id = 'department' name='department'>
                                        <option value='Economics'>Economics</option>
                                        <option value='Maths'>Maths</option>
                                    </select>
                                </div>
                                <div class='input-group fluid'>
                                    <label for='startYear'>Start Year</label>
                                    <input type='text area' value='' id='startYear' name ='startYear' required='required' rows='8' cols='20'>
                                </div>
                                <div class='input-group fluid'>
                                    <label for='finishYear'>Finish Year</label>
                                    <input type='text' value='' id='finishYear' name ='finishYear' required='required'>
                                </div>

                            </fieldset>

                            <input type='submit' class='tertiary' value='Tertiary button'>

                        </form>";
                    }
                    ?>
                </div>
            </div>   
        </div>
    </body>
</html>
