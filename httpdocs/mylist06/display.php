<?php

include 'conn.php';

$query = "select * from mylist06 order by datedue asc";

$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

//print_r($result);

mysqli_close($conn);

?>


<!DOCTYPE html>
<html>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>My to do list</title>
<link rel="stylesheet" href="styles/mylist.css" >

</head>
<body>
<div id="container">
<div id="top">	
	<a href='index.php'><div class='addright'> ADD TO DO</div></a>
    <div id="title">My 2 DO List</div>	

</div>
				
<div id="main">		
	
    <article>
        <?php
        
        echo "<ul id='myListText'>";
           if (mysqli_num_rows($result)>0) {
                while($row = mysqli_fetch_assoc($result)) {
                    
                //get data from column 'info'
                 $listdata = $row['info'];
                    
                $get_date = $row["datedue"];
                $due_date = date('d-m-y', strtotime($get_date));
                    
                $img = $row['imgpath'];
                
                //get data from imageaddress column
                    echo "<li> $listdata
                    <div class='dateright'>date due:
                   <strong>$due_date</strong>
                   <img src='upload/$img' width='30px'>;
                 </div></li>";
            }
           }
           
           echo '</ul>';
	?>	
    </article>
	 
</div>
	 
 </div>
</body>

</html>
