<?php
	ini_set('display_errors', 1);
	error_reporting(~0);

	$serverName = "localhost";
	$userName = "root";
	$userPassword = "";
	$dbName = "brstock";

	$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
	 $conn->set_charset("utf8");
	$sql = "INSERT INTO products (cat_id, pro_name, size, color, price, quantity)
		VALUES ('".$_POST["txtcat_id"]."','".$_POST["txtpro_name"]."','".$_POST["txtsize"]."'
		,'".$_POST["txtcolor"]."','".$_POST["txtprice"]."','".$_POST["txtquantity"]."')";
	$query = mysqli_query($conn,$sql);
	if($query) {
		echo "<script>window.location.href='listpro.php';</script>";}
	mysqli_close($conn);
?>
