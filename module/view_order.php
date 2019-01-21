<?php
	include "config/session.php";
	include "config/pagination_function.php";
	include "../dbconnection/dbconnection.php";
 ?>
<html>
<head>
<title>BRSTOCK</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</head>
<?php
$serverName = "localhost";
$userName = "root";
$userPassword = "";
$dbName = "brstock";

$objCon = mysqli_connect($serverName,$userName,$userPassword,$dbName);
$objCon->set_charset("utf8");
if (!$objCon) {
	echo $objCon->connect_error;
	exit();
}

$strSQL = "SELECT * FROM orderbuy WHERE o_id = '".$_GET["o_id"]."' ";
$objQuery = mysqli_query($objCon,$strSQL);
$objResult = $objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
?>
<div class="container">
 <table class="table">
    <tr>
      <td width="71">รหัสคำสั่งซื้อ</td>
      <td width="217">
	  <?=$objResult["o_id"];?></td>
    </tr>
    <tr>
      <td width="71">ชื่อ</td>
      <td width="217">
	  <?=$objResult["name"];?></td>
    </tr>
    <tr>
      <td>รหัสพนักงาน</td>
      <td><?=$objResult["em_id"];?></td>
    </tr>
		<tr>
			<td>ผู้ขาย</td>
			<td><?=$objResult["buyer"];?></td>
		</tr>
  </table>

  <br>

<table class="table">
  <tr>
    <td width="101">รหัสสินค้า</td>
    <td width="82">ชื่อสินค้า</td>
    <td width="82">ราคา</td>
    <td width="79">จำนวน</td>
    <td width="79">เป็นเงิน</td>
  </tr>
<?php

$Total = 0;
$SumTotal = 0;

$strSQL2 = "SELECT * FROM order_detail WHERE o_id = '".$_GET["o_id"]."' ";
$objQuery2 = mysqli_query($objCon,$strSQL2);

while($objResult2 = mysqli_fetch_array($objQuery2,MYSQLI_ASSOC))
{
		$strSQL3 = "SELECT * FROM products WHERE pro_id = '".$objResult2["pro_id"]."' ";
		$objQuery3 = mysqli_query($objCon,$strSQL3);
		$objResult3 = $objResult = mysqli_fetch_array($objQuery3,MYSQLI_ASSOC);
		$Total = $objResult2["qty"] * $objResult3["price"];
		$SumTotal = $SumTotal + $Total;
	  ?>
	  <tr>
		<td><?=$objResult2["pro_id"];?></td>
		<td><?=$objResult3["pro_name"];?></td>
		<td><?=$objResult3["price"];?></td>
		<td><?=$objResult2["qty"];?></td>
		<td><?=number_format($Total,2);?></td>
	  </tr>
	  <?php
 }
  ?>
</table>
<p class="text-right">รวมเป็นเงิน <?php echo number_format($SumTotal,2);?> ฿
	<br><br> <br>  <a href="home.php" class="btn btn-info">กลับหน้าแรก</a></p>

		<?php
		mysqli_close($objCon);
			?></div>

</body>
</html>
