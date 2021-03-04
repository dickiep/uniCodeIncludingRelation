<?php
include 'connections/conn.php';


$number = count($_POST["choice"]);
echo"$number";
if($number >= 1)
{
	for($i=0; $i<$number; $i++)
	{
		if(trim($_POST["choice"][$i] != ''))
		{
			$sql = "INSERT INTO tbl_name(name) VALUES('".mysqli_real_escape_string($conn, $_POST["choice"][$i])."')";
			mysqli_query($conn, $sql);
		}
	}
	echo "Data Inserted";
}
else
{
	echo 'Please enter a choice $_POST["choice"][$i]';
}