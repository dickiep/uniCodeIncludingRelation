<?php

?>
<!DOCTYPE html>
<html>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>My to do list</title>
<link href="styles/cutegrids.css" rel="stylesheet">
<link rel="stylesheet" href="styles/mylist.css" >
</head>
<body>
<header>
 my list 
</header>
<div class="row">
	<?php 
	include("conn.php");

	$query = "select * from mylist05";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

	mysqli_close($conn);

	if(mysqli_num_rows($result)>0) {
		while ($row = mysqli_fetch_assoc($result)) {

			$get_date = $row["datedue"];
			$due_data = date('d-m-y', strtotime($get_date));
			$info_data = $row["info"];

			echo "<div class='cure-4-laptop cute-6-tablet'>
				<div class='box'>
				<p>$due_data<br/>$info_data</p>
				</div>
				</div>

				";
		}
	}


	?>

</div>
        
</body>
</html>
