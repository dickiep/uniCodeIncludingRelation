<?php

$mylist = array();
$mylist[] = "get milk on 1st of November";
$mylist[] = "dentist on 5th of November";
$mylist[] = "Peter's birthday on 25th of November";
$mylist[] = "Concert tickets need picked up on 29th of November";
$mylist[] = "Sophie's birthday on the 2nd of December";
$mylist[] = "Work do on the 15th of December";
$mylist[] = "Chrimbo on the 25th of December";


?>

<!DOCTYPE html>
<html>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>My list</title>
<link rel="stylesheet" href="styles/mylist.css" >

</head>

<body>
<div id="container">
	<div id="top">
	<div id="title">My List</div>
	</div>
	
		<div id="main">
	 		<article>
				<?php
			
				print_r($mylist);
			
				?>
			</article> 
		</div>
	 

 </div>
</body>

</html>
