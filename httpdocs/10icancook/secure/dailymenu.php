<?php
include("connect.php");
//echo "all good here";

//grab the data from the table 'dailyrecipe'
$query = "SELECT * FROM 10dailyrecipe ORDER BY id";

//send SQL statement to MySQL server

$display = mysqli_query($conn, $query) or die(mysqli_error($conn));


mysqli_close($conn);


?>

<!DOCTYPE html>
<html>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>i Can Cook!</title>


<link href="styles/jquery-ui.css" rel="stylesheet">
<link rel="stylesheet" href="../styles/cook.css" >

<script src="js/jquery.js"></script>
<script src="js/jquery-ui.js"></script>

<script>
jQuery(document).ready(function(){		
			
});	

</script>

</head>

<body>
<div id="container">
	<div id="top2">
		<div id="title">
		editing pages
		</div>
		<div id="navcontent">
		<ul id="navedit">
			<li><a href="#">home-edit</a></li>
			<li id="here">daily recipe-edit</li>
			<li><a href="#">starters-edit</a></li>
			<li><a href="#">mains-edit</a></li>
			<li><a href="#">desserts-edit</a></li>
		</ul>
		</div>
	</div>
	
		<div id="main">
	 		
	 	<div id="mainheader2">
	 		 	Current Recipes 	
	 	</div>
	 	
	 	<div id="addbutton"><a href="dailyadd.php">Add a Recipe</a></div>
	 	
	 	<ul>
	 	
	 	
	 	
	    <?php
			
		if (mysqli_num_rows($display) > 0) {
            while ($row = mysqli_fetch_assoc($display)) {
				
				$recipe=$row["recipe"];
				$rowid=$row["id"];						
		    	
		    	echo "<li class='list'>$recipe ";
		    	
		    	echo "<div class='listright'><a href='dailyedit.php?sendid=$rowid'>edit</a> <a href='dailydelete.php?deleteid=$rowid'>delete</a></div></li>";

				}
		}

		?>
	 	</ul>		
	 						
		
		<div class="clearfloat"> </div>

	<!-- end of main content -->
	</div>


 </div>	
 <div id="footer">
	footer material....
</div>

</body>

</html>
