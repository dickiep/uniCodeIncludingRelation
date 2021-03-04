<?php
$title ="Chicken soup";
include("secure/connect.php");
//echo "all good here";
$query = "SELECT * FROM 10dailyrecipe WHERE front=1";

$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
mysqli_close($conn);

if(mysqli_num_rows($result) > 0){  
    
     while($row = mysqli_fetch_assoc($result)){
            $recipe = $row["recipe"];
            $introtext = $row["intro_text"];
            $introimage = $row["intro_image"];
            $ingredtext = $row["ingred_text"];
            $ingredimage = $row["ingred_image"];
            $howtext = $row["how"];

      } 
}
?>
<!DOCTYPE html>
<html>
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>i Can Cook!</title>


<link href="styles/jquery-ui.css" rel="stylesheet">
<link rel="stylesheet" href="styles/cook.css" >

<script src="js/jquery.js"></script>
<script src="js/jquery-ui.js"></script>

<script>

jQuery(document).ready(function(){
			
			
});	

</script>

</head>

<body>
<div id="container">
	<div id="top">
		<div id="title">
		Recipe of the Day
		</div>
		<div id="navcontent">
		<ul id="nav">
			<li><a href="#">home</a></li>
			<li id="here">daily recipe</li>
			<li><a href="#">starters</a></li>
			<li><a href="#">mains</a></li>
			<li><a href="#">desserts</a></li>
		</ul>
		</div>
	</div>
	
		<div id="main">
	 		
	 	<div id="mainheader">
	 	Recipe of the Day - <?php echo $recipe; ?>
	 	</div>
	 		
	 		<article>
	 		<div class="polaroid">

    			<img src="<?php echo "img/$introimage"; ?>" title="<?php echo $recipe; ?>" alt="<?php echo "$recipe image"; ?>" width="350px">

    			<span><?php echo $recipe; ?></span>

			</div>
	 		<div id="lefttext">
	 		<h4>Introduction</h4>
	 		<?php 
                                echo nl2br($introtext);   
	 		?>
	 		</div>
	 		
	 	<div id="ingredients">
	 		<h4>Ingredients</h4>
	 		
	 		 <?php echo nl2br($ingredtext);   ?>
	 		
	 	</div>
	 	<div class="polaroid2">

    			<img src="<?php echo "img/$ingredimage"; ?>" title="<?php echo $ingredimage; ?>" alt="<?php echo $ingredimage; ?>" width="300px">

    			<span>
    			<?php 
    				$newingred=substr_replace($ingredimage ,"",-5);
    				echo $newingred; 
    			?>
    			</span>

		</div>

	 		
	 	<div id="how">
	 	<h4>How to Cook</h4>
	 	
                    <?php echo nl2br($howtext);   ?>
	 	</div>
	 		
	
	 </article>
	<div class="clearfloat"> </div>
	
	<div id="bottom">
	
		<div id="bottomleft">
		<p>click here to find out about franchises and jobs.</p>
		</div>
		
		<div id="bottomright">
		<p>click here to find out about joining out mailing lists anf facebook page.</p>
		</div>
		
	</div>	



	<!-- end of main content -->
	</div>
		
	 
  


 </div>	
 <div id="footer">
	footer material....
</div>

</body>

</html>
