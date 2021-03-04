<?php
include 'conn.php';

$query = "select * from students order by predictedYearOfFinish desc";

$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

mysqli_close($conn);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Students Enrolled on Chad</title>
        
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

        <div class ="container">
            <div class ="row">
               
                <div class ="col-sm-12 col-md-6">
                    <?php
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $firstName = $row['firstName'];
                            $lastName = $row['lastName'];
                            $id = $row['id'];
                            $email = $row['email'];
                            $start = $row['yearOfStart'];
                            $finish = $row['predictedYearOfFinish'];

                            echo "<div class = 'card fluid'>
                            <div class = 'section mycard'>
                            <a class = 'button studentinfo' href = 'displaystudent.php?getid=$id'>more info</a>
                            <p>Student Number : $id</p>
                            <p>Student Name : $firstName $lastName</p>
                            <p>Email : $email</p>
                            <p>Cohort : $start-$finish</p>
                            </div>
                            </div>";
                        }
                    } else {
                        echo "Empty Table";
                    }
                    ?>
                </div>
                 <div class ="col-sm-12 col-md-6">
                    <a class = 'button studentadd' href = 'addstudent.php'>add a student</a>
                </div>
            </div>
        </div>
    </body>
</html>
