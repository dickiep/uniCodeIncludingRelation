   <?php
        include("password.php");
        
        $user="pdickie01";

        $server = "localhost";

        $db ="pdickie01";

        $conn = mysqli_connect($server, $user, $password, $db);

        if(!$conn) {
            die("connection failed ".mysqli_connect_error());
        }

        $query = "select*from items";

        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

        //print_r($result);
    ?>    

<!DOCTYPE HTML>
<html>
    
    <head>
    <meta charset="utf-8">
    <title>My List</title>
    <link rel="stylesheet" href="styles/mylist.css">
     
    </head>
    
    <body>
    <div id="container">
        <div id="top">
        <div id="title">My list from database</div>
        </div>       
            <div id = "main">
                <article>
                
                <?php
                    if(mysqli_num_rows($result)>0) {
                        while ($row=mysqli_fetch_assoc($result)){
                            echo "<p>".$row["listItem"]."</p>";
                        }
                    }
                    
                    
                    ?>
                
                
                
                </article>
            </div>
        </div>
    </body>
</html>