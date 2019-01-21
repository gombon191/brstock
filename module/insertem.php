<?php
	ini_set('display_errors', 1);
	error_reporting(~0);

	$serverName = "localhost";
	$userName = "root";
	$userPassword = "";
	$dbName = "brstock";

	$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
		$conn->set_charset("utf8");
	$sql = "INSERT INTO employer (em_id, name, gender, position, org, size)
		VALUES ('".$_POST["txtem_id"]."','".$_POST["txtname"]."','".$_POST["txtgender"]."',
			'".$_POST["txtposition"]."','".$_POST["txtorg"]."','".$_POST["txtsize"]."')";
	$query = mysqli_query($conn,$sql);
	if($query) {
		echo "<script>window.location.href='human.php';</script>";}
	mysqli_close($conn);
?>
