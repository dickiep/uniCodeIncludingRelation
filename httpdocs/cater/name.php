<?php
include 'connections/conn.php';

$number = count($_POST["name"]);
if($number > 1)
{
	for($i=0; $i<$number; $i++)
	{
		if(trim($_POST["name"][$i] != ''))
		{
			$sql = "INSERT INTO tbl_name VALUES('".mysqli_real_escape_string($connect, $_POST["name"][$i])."')";
			mysqli_query($conn, $sql);
		}
	}
	echo "Data Inserted";
}
else
{
	echo "Please Enter Name";
}