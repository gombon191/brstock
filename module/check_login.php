<?php
	session_start();
	$serverName = "localhost";
	$userName = "root";
	$userPassword = "";
	$dbName = "brstock";

	$objCon = mysqli_connect($serverName,$userName,$userPassword,$dbName);
	$strSQL = "SELECT * FROM user WHERE username = '".mysqli_real_escape_string($objCon,$_POST['txtusername'])."'
	and Password = '".mysqli_real_escape_string($objCon,$_POST['txtpassword'])."'";
	$objQuery = mysqli_query($objCon,$strSQL);
	$objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
	if(!$objResult)
	{
		echo "<script>alert('Username หรือ Password ผิด!'); window.location='index.php'</script>";
			exit();
	}
	else
	{
			$_SESSION["userid"] = $objResult["userid"];
			$_SESSION["level"] = $objResult["level"];

			session_write_close();

			if($objResult["level"] == "ADMIN")
			{
				header("location:home.php");
			}
			else
			{
				header("location:index.php");
			}
	}
	mysqli_close($objCon);
?>
