<?php
include("connect.php");
//echo "all good here";

//get the form data from the dailyadd.php
$newrecipe = mysqli_real_escape_string($conn, $_POST['recipe']);
$newintro = mysqli_real_escape_string($conn,$_POST['introdata']);

//$newrecipeimage = mysqli_real_escape_string($conn,$_POST['recipeimage']);

$newingreddata = mysqli_real_escape_string($conn,$_POST['ingreddata']);
//$newingredimage = mysqli_real_escape_string($conn,$_POST['ingredimage']);
$newhow =mysqli_real_escape_string($conn,$_POST['howdata']);


$insertquery = "INSERT INTO 10dailyrecipe(recipe,intro_text,intro_image,ingred_text,ingred_image,how)"."VALUES('$newrecipe','$newintro','chickennoodle2.jpg','$newingreddata','ingredients2.jpg','$newhow')";

$result = mysqli_query($conn, $insertquery) or die(mysqli_error($conn));


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
	 		 	Added Recipe Sucessful. 	 	
	 	</div>
	 		
	 		<article>
	 		
	 		<h4>New daily recipe added.</h4>
	 		
	 		<?php
	 			 	
			echo "<p>updated daily recipe</p>"; 
			echo "<p>new recipe title: $newrecipe<br></p>"; 
			echo "<p>new intro: $newintro<br></p>";
		
			echo "<p>new ingredients:$newingreddata<br></p>";

			echo "<p>new new how text:$newhow</p>";
					
			?>	
	 		
	 	
	 		
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
