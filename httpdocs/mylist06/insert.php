<?php
include 'conn.php';
?>

<!DOCTYPE html>
<html>

    <head>
        <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
        <title>My to do list</title>
        <link href="styles/jquery-ui.css" rel="stylesheet">
        <link rel="stylesheet" href="styles/mylist.css" >

    </head>

    <body>
        <div id="container">
            <div id="top">
                <div id="title">My 2 DO List</div>
            </div>

            <div id="main">
                <article>
                    <?php
                    $mylisttask = $_POST['myinput'];
                    $myduedate = $_POST['duedate'];
                    $myduedate = date('Y-m-d', strtotime($myduedate));
                    $myitem = $_POST['itemtype'];
                    $detail = $_POST['mydetails'];

                    $pic = $_FILES["imageup"]["name"];
                    $pictemp = $_FILES["imageup"]["tmp_name"];
                    move_uploaded_file($pictemp, "upload/$pic");

                    $query = "INSERT INTO mylist06(info, datedue, type, details,
imgpath)VALUES('$mylisttask', '$myduedate','$myitem','$detail','$pic')";

                    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

                    mysqli_close($conn);
                    echo "<p>Thanks for adding the task $mylisttask.</p>";
                    echo "<div class='addright'>
 <a href='display.php'>View My 2 Do</a>
 </div>";








                   ?> 
                </article> 
            </div>


        </div>
    </body>

</html>
