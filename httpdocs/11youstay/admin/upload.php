<?php
session_start();

$theuser = $_SESSION["jbusch_username"];
$userid = $_SESSION['jbusch_id'];

if(!isset($theuser)){
	header("Location:../index.php");

}

if(isset($_POST["destroy"])){
	session_unset();
	header("Location:../index.php");	
}

if(isset($_POST["create"])){
	
	include('../connections/conn.php');
	
	$headlinedata=mysqli_real_escape_string($conn, $_POST["headlinetext"]);
	$iddata=mysqli_real_escape_string($conn, $_POST["userid"]);
	$contentdata = mysqli_real_escape_string($conn, $_POST["contenttext"]);
	$datedata = date("Y-m-d");
	$queryinsert = "INSERT INTO news15_articles (headline, content,publishdate, author_id) VALUES('$headlinedata','$contentdata','$datedata', '$iddata') ";
	$result = mysqli_query($conn, $queryinsert) or die(mysqli_error($conn));
	echo "<p>article uploaded.</p>";
	
}

?>

<!DOCTYPE html>

<head >
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
          
		  		  <a href="#" class="navbar-brand navbar-left "><img src="../images/lnn-logo3.png"  class="img-responsive title"></a>
		   
		  
        </div> 
		
        <div id="navbar" class="navbar-collapse collapse">
          <div class="navbar-form navbar-right ">
			 
					<form method="POST">
			 <span class="form-group"> 
			<a class="btn btn-default btn-md" href="yourarticles.php">
				<span class="glyphicon glyphicon-file" aria-hidden="true"></span> your articles
			</a>
            </span>
			 <span class="form-group"> 
			<a class="btn btn-default btn-md" href="<?php echo "upload.php" ?>">
				<span class="glyphicon glyphicon-open" aria-hidden="true"></span> upload
			</a>
            </span>
            <span class="form-group"> 
			<a class="btn btn-default btn-md" href="<?php echo "profile.php" ?>">
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
    
	<div class="container">
		<div class="pad pull-right"><h1>Upload Article</h1></div>
	</div>
		
    <div class="container pad">
      
                        
        <div class="col-md-8 pad2 lead">
		<form method="POST">
          <div class="form-group row">
			<label for="example-text-input" class="col-2 col-form-label">headline</label>
			<div class="col-10">
			<input class="form-control" type="text" value="" placeholder="headline" name="headlinetext">
			</div>
		  </div>
		  <div class="form-group row">
			<label for="example-text-input" class="col-2 col-form-label">Content</label>
			<div class="col-10">
			<textarea class="form-control" type="text" value="" name="contenttext"></textarea>
			</div>
		  </div>
		  
		  <input class="form-control" type="hidden" value="<?php echo $userid; ?>"  name="userid">
		
			<button type="submit" class="btn btn-success" name="create">Upload Article</button>
			
		  </form>
		  
        </div> 


      </div>

   
	  <footer class="navbar-fixed-bottom foot">
        <div class="container pad pad2">&copy; 2017 Local News for local people, Inc.</div>
      </footer>
        
</body>
</html>
