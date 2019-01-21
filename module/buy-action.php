<?php
	ini_set('display_errors', 1);
	error_reporting(~0);

	$serverName = "localhost";
	$userName = "root";
	$userPassword = "";
	$dbName = "brstock";

	$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
		$conn->set_charset("utf8");
	$sql = "INSERT INTO history (em_id, size, pro_id)
		VALUES ('".$_POST["txtem_id"]."','".$_POST["txtsize"]."','".$_POST["txtpro_id"]."')";
	$query = mysqli_query($conn,$sql);
	if($query) {
		echo "<script>window.location.href='bill.php';</script>";}
	mysqli_close($conn);
?>
