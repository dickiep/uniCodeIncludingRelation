<?php
include('connect.php');
$readquery = "SELECT * FROM mydbtable";
$result = mysqli_query($conn,$readquery) or die(mysqli_error($conn));
?>
<!DOCTYPE html>

<html>
    <head>
        <title></title>
        <meta charset="windows-1252">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>plume UI</title>

		<!-- Import siimple plume CSS framework-->
		<link rel="stylesheet" href="siimple/plume.css">
		<script type="text/javascript" src="siimple/plume.js"></script>

		<!-- Import siimple CSS framework-->
		<link rel="stylesheet" href="siimple/siimple.min.css">

		<!-- Import custom CSS framework-->
		<link rel="stylesheet" href="styles/myplume.css" >

<!-- Default style -->
<style>

</style>
		
    </head>
    <body>
        <div class="plume plume--js">
		  <div class="plume-sidebar">
			<div class="plume-menu">
			  <div class="plume-menu-group">Months</div>
			  <div class="plume-menu-item">Sept</div>
			  <div class="plume-menu-item">Oct</div>
			  <div class="plume-menu-item">Nov</div>

			  <div class="plume-menu-group">Support</div>
			  <div class="plume-menu-item">help</div>
			  <div class="plume-menu-item">contact</div>
			  <div class="plume-menu-item">location</div>
			  
			  <div class="plume-menu-group">Admin</div>
			  <div class="plume-menu-item">insert</div>
			  <div class="plume-menu-item">delete</div>
			  <div class="plume-menu-item">edit</div>
			</div>
		  </div>
		  <div class="plume-toggle"><span></span></div>
		  <div class="plume-header">
			<div class="plume-header-title">my learning log</div>
		 
		  </div>
		  <div class="plume-content">
			<div class="plume-heading1">ALL months</div>
			
			<?php
			if( mysqli_num_rows($result) > 0){  
				while($row = mysqli_fetch_assoc($result)){
				
				} 
				}else{
					
				echo "nothing posted yet.";	
			}

			?>
			
		  </div>
		  

  
  <div class="plume-footer" align="center">
   my learning log 2017-18
  </div>
  
</div>			
    </body>
</html>
