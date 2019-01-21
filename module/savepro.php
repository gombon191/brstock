<?php
	ini_set('display_errors', 1);
	error_reporting(~0);

	$serverName = "localhost";
	$userName = "root";
	$userPassword = "";
	$dbName = "brstock";

	$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
	 $conn->set_charset("utf8");

	$sql = "UPDATE products SET
			pro_id = '".$_POST["txtpro_id"]."' ,
			pro_name = '".$_POST["txtpro_name"]."' ,
			cat_id = '".$_POST["txtcat_id"]."' ,
			size = '".$_POST["txtsize"]."' ,
			color = '".$_POST["txtcolor"]."',
			quantity = '".$_POST["txtquantity"]."',
			detail = '".$_POST["txtdetail"]."',
			img = '".$_POST["txtimg"]."'
			WHERE pro_id = '".$_POST["txtpro_id"]."' ";

	$query = mysqli_query($conn,$sql);

	if($query) {
	 echo "<script> window.location.href='listpro.php'; </script>";
	}

	mysqli_close($conn);
?>
