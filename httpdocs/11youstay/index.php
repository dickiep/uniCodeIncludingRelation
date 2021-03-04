<?php
session_start();
include('connections/conn.php');



$queryread = "SELECT * FROM youstay11";
$result = mysqli_query($conn, $queryread) or die(mysqli_error($conn));

if(isset($_POST["sign"])){
	
	
	
}

?>


<!DOCTYPE html>

<html>
<head>
<title>you stay</title>
	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" />

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="styles/mylist.css" />

<script>
  $(document).ready(function(){
	  
	 

  });
  </script>


</head>

<body>

   <nav class="navbar navbar-inverse navbar-fixed-top foot ">
		
      <div class="container foot">
	  
        <div class="navbar-header foot">
		
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
		  
            <span class="sr-only">Toggle navigation</span>
			
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>  
	    <a href="#" class="navbar-brand navbar-left "><img src="images/lnn-logo3.png"  class="img-responsive title"></a>
        </div> 
		
        <div id="navbar" class="navbar-collapse collapse">
          <div class="navbar-form navbar-right ">
			<form method='POST'>
            <span class="form-group">
              <input type="text" placeholder="Email" class="form-control" name="owneremail"/>
            </span>
            <div class="form-group">
              <input type="password" placeholder="Password" class="form-control"/>
            </div>
            <button type="submit" class="btn btn-success" name='sign'>Sign in</button>
			</form>
          </div>
        </div><!--/.navbar-collapse -->
		
      </div>
    </nav> 
	
    <div class="container">
		<div class=" pad pull-right"><h1>You Stay</h1></div>
	</div>
	
    <div class="container pad">	
	
	<!--<a href=''><div class='col-md-8 pad2 lead'>
				   <p>
					<span> 
						
					</span>				
					<span>
						<img src='' class='thumb'/>			
				   </span>
					</p>
				</div>
				</a>-->
				
				
    <?php  
		  
	if( mysqli_num_rows($result) > 0){   
    
        while($row = mysqli_fetch_assoc($result)){
			
            $titledata= $row["name"];    
            $picdata =  $row["pic"]; 
			$houseid = $row["id"];
			
        echo " 
			
				<div class='row'>
				  <div class='col-md-4'>
					<div class='thumbnail'>
					  <a href='house.php?thehouse=$houseid'>
						<img src='pics/$picdata' alt='Lights' style='width:100%'>
						<div class='caption'>
						  <p>$titledata</p>
						</div>
					  </a>
					</div>
				  </div>
				
			";		
		}
	}
	
		
	?>

      </div>

   
	  <footer class="navbar-fixed-bottom foot">
        <div class="container pad pad2">&copy; you stay</div>
      </footer>
        
</body>
</html>
