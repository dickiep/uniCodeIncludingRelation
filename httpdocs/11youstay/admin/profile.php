<?php

include('../connections/conn.php');


?>


<!DOCTYPE html>

<head>
    

    <title>local news</title>
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
   
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" />

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>



    <link rel="stylesheet" href="../styles/mylist.css" />


</head>
<body>
    

      <nav class="navbar navbar-inverse navbar-fixed-top">
		
      <div class="container">
	  
        <div class="navbar-header">
		
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
		  
            <span class="sr-only">Toggle navigation</span>
			
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
         <a class="navbar-brand" href="index.php"><img src="../images/lnn-logo3.png" class="img-responsive title" /></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <div class="navbar-form navbar-right">
            
			<form method="POST">
			<span class="form-group"> 
			<a class="btn btn-default btn-md" href="<?php echo "upload.php" ?>">
				<span class="glyphicon glyphicon-open" aria-hidden="true"></span> upload
			</a>
            </span>
			 <span class="form-group"> 
			<a class="btn btn-default btn-md" href="yourarticles.php">
				<span class="glyphicon glyphicon-file" aria-hidden="true"></span> your properties
			</a>
            </span>
			
            <span class="form-group"> 
			<a class="btn btn-default btn-md" href="#">
				<span class="glyphicon glyphicon-user" aria-hidden="true"></span> profile
			</a>
            </span>
            <div class="form-group">
            </div>
            <button type="submit" class="btn btn-success" name="destroy">log out</button>
			</form>
			
          </div>
        </div><!--/.navbar-collapse -->
      </div>
    </nav> 

	<div class="container pad">
	  <h1> Your Profile </h1>
	  <form>
	<?php
	
	if( mysqli_num_rows($result) > 0){   
    
        while($row = mysqli_fetch_assoc($result)){
			

		
	   
		}
	}

	?>
	
	
	</div>
                   
 
    <div class="container">
        <div class="pull-right">   
   
			<input type='submit' class="btn btn-info" role="button" value='edit profile' ></input>
         </div>
    </div>
    </form>   
    
	<footer class="navbar-fixed-bottom foot">
        <div class="container pad pad2">&copy; 2017 Local News for local people, Inc.</div>
      </footer>
          
 
</body>
</html>
