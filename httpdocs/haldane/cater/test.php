<?php
session_start();

include 'connections/conn.php';

if (!isset($_SESSION["instructor"])){
    header('Location: index.php');
} else {
    $moduleid = $_GET['id'];
    
    $query = "SELECT * FROM vleModules WHERE moduleCode='$moduleid'";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    
    if(mysqli_num_rows($result)>0) {
        while($row=mysqli_fetch_assoc($result)) {
            $name=$row['moduleName'];
        }
    }
    
    echo"$name";
   

}
?>


<?php echo "$moduleid"; ?>


