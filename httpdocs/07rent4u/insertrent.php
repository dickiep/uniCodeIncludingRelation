<?php


$addresspost = mysqli_real_escape_string($conn, $_POST["addresssent"]); 
$typepost = mysqli_real_escape_string($conn, $_POST["typesent"]); 
$townpost = mysqli_real_escape_string($conn, $_POST["townsent"]); 
$bedpost = mysqli_real_escape_string($conn, $_POST["bedsent"]); 
$pricepost = mysqli_real_escape_string($conn, $_POST["pricessent"]); 
echo "$addresspost , $typepost , $townpost , $bedpost , $pricepost";

$insertquery = "INSERT INTO 07rentlist (address,type,town,beds,price) VALUES ('$addresspost' , '$typepost' , '$townpost' , '$bedpost' , '$pricepost')";

$result = mysqli_query($conn, $insertquery);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cutegrids</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/cutegrids.css">
    <link rel="stylesheet" href="css/mystyle.css">
    
    <!--  For IE8 support include the following Respond.js for support of media queiries and also download and include the REM pollyfill from https://github.com/chuckcarpenter/REM-unit-polyfill for REM support -->
    <!--[if lt IE 9]>
    	<script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/modernizr/2.7.1/modernizr.min.js"></script>
    <![endif]-->

   <!-- JQUERY CDN library -->
   
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	
	<script>
	
	$(document).ready(function(){
		
	});
	
	</script>
   
</head>

<body>

<div id='head'>
	Rent 4 U
</div>

    <p>Thanks for adding a house to rent</p>
    
			

</body>
</html>