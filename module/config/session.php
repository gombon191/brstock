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
  mysql_connect("localhost","root","");
	mysql_select_db("brstock");
	mysql_set_charset("utf8");
	$strSQL = "SELECT * FROM user WHERE userid = '".$_SESSION['userid']."' ";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
?>
