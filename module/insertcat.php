<?php
	ini_set('display_errors', 1);
	error_reporting(~0);

	$serverName = "localhost";
	$userName = "root";
	$userPassword = "";
	$dbName = "brstock";

	$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
	 $conn->set_charset("utf8");
	$sql = "INSERT INTO categories (cat_id, cat_name)
		VALUES ('".$_POST["txtcat_id"]."','".$_POST["txtcat_name"]."')";
	$query = mysqli_query($conn,$sql);
	if($query) {
		echo "<script>window.location.href='categorie.php';</script>";}
	mysqli_close($conn);
?>
