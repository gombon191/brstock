<?php
		session_start();
		if($_SESSION['userid'] == "")
		{
	    $alert = "กรุณาเข้าสู่ระบบ!";
	    echo "<script language=\"JavaScript\">";
	    echo "alert('$alert');";
	    echo "</script>";
			exit();
		}

		if($_SESSION['level'] != "ADMIN")
		{
			echo "หน้านี้สำหรับผู้ใช้ระดับ ผู้ดูแลเท่านั้น กรุณาเข้าสู่ระบบ";
			exit();
		}
    $serverName = "localhost";
    $userName = "root";
    $userPassword = "";
    $dbName = "brstock";

    $conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
     $conn->set_charset("utf8");


		$sql = "SELECT * FROM user WHERE userid = '".$_SESSION['userid']."' ";
		$query = mysqli_query($conn,$sql);
		$result = mysqli_fetch_array($query,MYSQLI_ASSOC);
    mysqli_close($conn);
	?>
