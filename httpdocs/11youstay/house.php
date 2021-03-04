<?php

include('connections/conn.php');

$displayid = htmlentities($_GET["thehouse"]);

$queryread = " SELECT * FROM youstay11 WHERE id='$displayid' ";

$result = mysqli_query($conn, $queryread) or die(mysqli_error($conn));

?>


<!DOCTYPE html>

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
    

      <nav class="navbar navbar-inverse navbar-fixed-top">
		
      <div class="container">
	  
        <div class="navbar-header">
		
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
		  
            <span class="sr-only">Toggle navigation</span>
			
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
         <a class="navbar-brand" href="index.php"><img src="images/lnn-logo3.png" class="img-responsive title" /></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <div class="navbar-form navbar-right">
            <span class="form-group">
              <input type="text" placeholder="Email" class="form-control"/>
            </span>
            <div class="form-group">
              <input type="password" placeholder="Password" class="form-control"/>
            </div>
            <button type="submit" class="btn btn-success">Sign in</button>
          </div>
        </div><!--/.navbar-collapse -->
      </div>
    </nav> 

	<div class="container pad">
	
	<?php
	
	if( mysqli_num_rows($result) > 0){   
    
        while($row = mysqli_fetch_assoc($result)){
			
            $titledata=$row["name"];    
            $ddata =  $row["descript"]; 
			$picdata= $row["pic"];
	     
			
	    echo "<h1>$titledata</h1>"; 
		echo "<img class='pad' src='pics/$picdata' width='70%' >";
		echo "<p class='pad'> $ddata </p>";
		
		echo "<p class='myhouseid'></p>";
	   
		}
	}

	?>
	
	</div>
  
	
    <div class="container pad">
        <div class="pull-right">   
            <button type="button" class="btn-default btn-lg " onclick="history.go(-1);">back</button>
         </div>
    </div>
       
    
	<footer class="navbar-fixed-bottom foot">
        <div class="container pad pad2">&copy; you stay</div>
      </footer>
          
 
</body>
</html>
