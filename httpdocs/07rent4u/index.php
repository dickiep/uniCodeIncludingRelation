<?php
include("connect.php");

$query="SELECT * FROM 07rentlist";

$result = mysqli_query($conn, $query);

mysqli_close($conn);
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

<?php
	if (mysqli_num_rows($result) > 0){
		
		while ($row = mysqli_fetch_assoc($result)){
			$addr = $row["address"];
			$price =$row["price"];
			$id = $row["id"];
		
			echo "<div class='row'>
					<div class='cute-8-tablet'>
            			<div class='box'>
						<p>$addr  - <strong>£$price</strong></p>  
						</div>	
					</div>
					
					<div class='cute-4-tablet'>
					<div class='box'>
						<a href='rent.php?sendid=$id' class='button'>get house</a>
					</div>
					</div>
				</div>";
		}	
	}
?>
			

</body>
</html>
