<?php
	ini_set('display_errors', 1);
	error_reporting(~0);

	$serverName = "localhost";
	$userName = "root";
	$userPassword = "";
	$dbName = "brstock";

	$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);

	$strproductID = $_GET["pro_id"];
	$sql = "DELETE FROM products
			WHERE pro_id = '".$strproductID."' ";

	$query = mysqli_query($conn,$sql);

	if(mysqli_affected_rows($conn)) {
		 echo "<script>window.location.href='listpro.php';</script>";
	}

	mysqli_close($conn);
?>
