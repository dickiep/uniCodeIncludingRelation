<?php

include("connect.php");
$iddata = mysqli_real_escape_string($conn, $_GET['sendid']);

// get selected info
$query = "SELECT * FROM 10dailyrecipe WHERE id = $iddata";

$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
mysqli_close($conn);

if(mysqli_num_rows($result) > 0){  
    
     while($row = mysqli_fetch_assoc($result)){
            $recipe = stripslashes($row["recipe"]);
            $introtext = stripslashes($row["intro_text"]);
            $ingredtext = stripslashes($row["ingred_text"]);
            $howtext = stripslashes($row["how"]);

      } 
}

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
	 	Editing Recipe of the Day 	 	
	 	</div>
	 		
	 		<article>
	 		
	 		<form method="post" action="dailyupdate.php" name="daily edit">
	 		
			<p>
    		<label for="recipetitle">Name of Recipe:</label>
   			 <input id="recipe" name="recipe" type="text" maxlength="50" required="required" value="<?php echo $recipe ?>"><span id="help"> provide a recipe name </span><br>
   			 </p>
			<br>
			
			
			<br>
			<p>
    		<label for="introdata">Introduction to recipe:</label>
    		</p>
    		<p>
   			 <textarea rows="10" cols="80"  required="required" name="introdata"><?php echo $introtext; ?></textarea>
    		<br>
			</p>
			<br>
			<p>
    		<label for="problemdata">Recipe Ingredients:</label>
    		</p>
    		<p>
   			 <textarea rows="15" cols="50"  required="required" name="ingreddata"><?php echo $ingredtext;?></textarea>    			
    		<br>
			</p>
			<br>	 		
	 		
			<br>
			<p>
    		<label for="introdata">How to cook text:</label>
    		</p>
    		<p>
   			 <textarea rows="15" cols="80"  required="required" name="howdata"><?php echo $howtext; ?></textarea>
    		<br>
			</p>

	 	<input type="hidden" name="rowid" value="<?php echo $iddata ?>">
	 		
	 		<div id="butpos">
	 			<input id="but2" name="reset" type="reset" value="Reset">
    			<input id="but" name="submit" type="submit" value="Save">
    			
   			 </div>
   			 

			</form>
	 		
	 		
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
