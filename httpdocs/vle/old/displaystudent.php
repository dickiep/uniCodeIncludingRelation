<?php
include 'conn.php';

$resultid = $_GET['getid'];

$query = "select * from students where id = $resultid";

$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

mysqli_close($conn);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        
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
        
        
         <?php
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $firstName = $row['firstName'];
                            $lastName = $row['lastName'];
                            $id = $row['id'];
                            $email = $row['email'];
                            $start = $row['yearOfStart'];
                            $finish = $row['predictedYearOfFinish'];
                            $record = $row['disciplinaryRecord'];

                            echo "<div class = 'card fluid'>
                            <div class = 'section mycard'>
                            
                            <p>Student Number : $id</p>
                            <p>Student Name : $firstName $lastName</p>
                            <p>Email : $email</p>
                            <p>Cohort : $start-$finish</p>
                            <p>Disciplinary Record : $record</p>
                            </div>
                            </div>";
                        }
                    } else {
                        echo "Empty Table";
                    }
                    ?>
    </body>
</html>
