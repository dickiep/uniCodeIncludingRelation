<!DOCTYPE html>
<html lang="en">
<head>


  <meta charset="utf-8">
  <title>QUB Job Listings</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">

 
  <link rel="stylesheet" href="skeleton/normalize.css">
  <link rel="stylesheet" href="skeleton/skeleton.css">
  <link rel="stylesheet" href="css/custom.css">

   <!-- JQUERY CDN library -->
   
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	
	<script>
	
	$(document).ready(function(){
		
	
	}
	
	</script>

	<?php
		$server="localhost";
		$user="pdickie01";
		$db = "pdickie01";
		$pw = "Hotdogs1234";

		$conn = mysqli_connect($server, $user, $pw, $db);


        if(!$conn) {
            die("connection failed ".mysqli_connect_error());
        }
        

	?>
   
</head>

<body>

  <!-- Primary Page Layout
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  
    <div class="row">
      <div class="one-full column" style="background-color: red"> 
	  <div id ="title" style="color: white; margin: 1.5%;">

	  <h5>QUB Jobs</h5> 
	  
       </div>
        
      </div>
    </div>
  

  <div class = "row">
  	<div class="one-full column" style="margin: 1%;">
  	<h3>Current Vacancies</h3>
  	</div>
  </div>

  <div class = "row" style="padding: 2%">
  	<div class="one-full column" style=" background-color: #D3D3D3">
  		
  		
  		<article>
  		<?php
  		$query = "select title from jobs where id = 1";

        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

        //print_r($result);


             if(mysqli_num_rows($result)>0) {
                        while ($row=mysqli_fetch_assoc($result)){
                            
                            $title = $row["title"];
                            echo "<h5>", $title ,"</h5>";
                        }
                    }
  		?>
  	</article>

  		<article>
  		<?php
  		$query = "select department from jobs where id = 1";

        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

        //print_r($result);


             if(mysqli_num_rows($result)>0) {
                        while ($row=mysqli_fetch_assoc($result)){
                            
                            $department = $row["department"];
                            echo "<p>",'dept: ', $department ,"</p>";
                        }
                    }
  		?>
  	</article>

  		<article>
  		<?php
  		$query = "select description from jobs where id = 1";

        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

        //print_r($result);


             if(mysqli_num_rows($result)>0) {
                        while ($row=mysqli_fetch_assoc($result)){
                            
                            $description = $row["description"];
                            echo "<p>", $description ,"</p>";
                        }
                    }
  		?>
  	</article>
  	</div>
  </div>

    <div class = "row" style="padding: 2%">
  	<div class="one-full column" style=" background-color: #D3D3D3">
  		
  		
  		<article>
  		<?php
  		$query = "select title from jobs where id = 2";

        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

        //print_r($result);


             if(mysqli_num_rows($result)>0) {
                        while ($row=mysqli_fetch_assoc($result)){
                            
                            $title = $row["title"];
                            echo "<h5>", $title ,"</h5>";
                        }
                    }
  		?>
  	</article>

  		<article>
  		<?php
  		$query = "select department from jobs where id = 2";

        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

        //print_r($result);


             if(mysqli_num_rows($result)>0) {
                        while ($row=mysqli_fetch_assoc($result)){
                            
                            $department = $row["department"];
                            echo "<p>",'dept: ', $department ,"</p>";
                        }
                    }
  		?>
  	</article>

  		<article>
  		<?php
  		$query = "select description from jobs where id = 2";

        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

        //print_r($result);


             if(mysqli_num_rows($result)>0) {
                        while ($row=mysqli_fetch_assoc($result)){
                            
                            $description = $row["description"];
                            echo "<p>", $description ,"</p>";
                        }
                    }
  		?>
  	</article>
  	</div>
  </div>

    <div class = "row" style="padding: 2%">
  	<div class="one-full column" style=" background-color: #D3D3D3">
  		
  		
  		<article>
  		<?php
  		$query = "select title from jobs where id = 3";

        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

        //print_r($result);


             if(mysqli_num_rows($result)>0) {
                        while ($row=mysqli_fetch_assoc($result)){
                            
                            $title = $row["title"];
                            echo "<h5>", $title ,"</h5>";
                        }
                    }
  		?>
  	</article>

  		<article>
  		<?php
  		$query = "select department from jobs where id = 3";

        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

        //print_r($result);


             if(mysqli_num_rows($result)>0) {
                        while ($row=mysqli_fetch_assoc($result)){
                            
                            $department = $row["department"];
                            echo "<p>",'dept: ', $department ,"</p>";
                        }
                    }
  		?>
  	</article>

  		<article>
  		<?php
  		$query = "select description from jobs where id = 3";

        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

        //print_r($result);


             if(mysqli_num_rows($result)>0) {
                        while ($row=mysqli_fetch_assoc($result)){
                            
                            $description = $row["description"];
                            echo "<p>", $description ,"</p>";
                        }
                    }
  		?>
  	</article>
  	</div>
  </div>

    <div class = "row" style="padding: 2%">
  	<div class="one-full column" style=" background-color: #D3D3D3">
  		
  		
  		<article>
  		<?php
  		$query = "select title from jobs where id = 4";

        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

        //print_r($result);


             if(mysqli_num_rows($result)>0) {
                        while ($row=mysqli_fetch_assoc($result)){
                            
                            $title = $row["title"];
                            echo "<h5>", $title ,"</h5>";
                        }
                    }
  		?>
  	</article>

  		<article>
  		<?php
  		$query = "select department from jobs where id = 4";

        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

        //print_r($result);


             if(mysqli_num_rows($result)>0) {
                        while ($row=mysqli_fetch_assoc($result)){
                            
                            $department = $row["department"];
                            echo "<p>",'dept: ', $department ,"</p>";
                        }
                    }
  		?>
  	</article>

  		<article>
  		<?php
  		$query = "select description from jobs where id = 4";

        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

        //print_r($result);


             if(mysqli_num_rows($result)>0) {
                        while ($row=mysqli_fetch_assoc($result)){
                            
                            $description = $row["description"];
                            echo "<p>", $description ,"</p>";
                        }
                    }
  		?>
  	</article>
  	</div>
  </div>



  </body>
  </html>