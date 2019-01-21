<?php
	ini_set('display_errors', 1);
	error_reporting(~0);

	$serverName = "localhost";
	$userName = "root";
	$userPassword = "";
	$dbName = "brstock";

	$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);

	$strEmployerID = $_GET["em_id"];
	$sql = "DELETE FROM employer
			WHERE em_id = '".$strEmployerID."' ";

	$query = mysqli_query($conn,$sql);

	if(mysqli_affected_rows($conn)) {
		 echo "<script>window.location.href='human.php';</script>";
	}

	mysqli_close($conn);
?>
