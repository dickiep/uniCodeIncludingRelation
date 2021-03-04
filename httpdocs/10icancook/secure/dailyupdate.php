<?php
include("connect.php");

//get the form data from the previous page
$newrecipe = mysqli_real_escape_string($conn, $_POST['recipe']);
$newintro = mysqli_real_escape_string($conn,$_POST['introdata']);
$newingreddata = mysqli_real_escape_string($conn,$_POST['ingreddata']);
$newhow = mysqli_real_escape_string($conn,$_POST['howdata']);
$id = mysqli_real_escape_string($conn, $_POST['rowid']);

//setup a SQL query
$query="UPDATE 10dailyrecipe SET recipe='$newrecipe', intro_text='$newintro', ingred_text='$newingreddata',  how='$newhow' WHERE id='$id'";

$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

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
			Edited Recipe of the Day 	 	
	 	</div>
	 		
	 	<article>
	 		
			<p>Thanks</p>
	 		
	 		
	 	</article>
	 										
		<div class="clearfloat"> </div>


	<!-- end of main content -->
	</div>

 </div>	
 <div id="footer">
	footer material....
</div>

</body>

</html>
