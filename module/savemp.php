<?php
	ini_set('display_errors', 1);
	error_reporting(~0);

	$serverName = "localhost";
	$userName = "root";
	$userPassword = "";
	$dbName = "brstock";

	$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
	 $conn->set_charset("utf8");

	$sql = "UPDATE employer SET
			em_id = '".$_POST["txtem_id"]."' ,
			name = '".$_POST["txtname"]."' ,
			gender = '".$_POST["txtgender"]."' ,
			org = '".$_POST["txtorg"]."' ,
			position = '".$_POST["txtposition"]."' ,
			size = '".$_POST["txtsize"]."'
			WHERE em_id = '".$_POST["txtem_id"]."' ";

	$query = mysqli_query($conn,$sql);

	if($query) {
	 echo "<script>window.location.href='human.php';</script>";
	}

	mysqli_close($conn);
?>
