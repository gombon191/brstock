<?php
	include "config/session.php";
	include "config/pagination_function.php";
	include "../dbconnection/dbconnection.php";
 ?>
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

  $Total = 0;
  $SumTotal = 0;

  $strSQL = "
	INSERT INTO orderbuy (em_id,name,size,buyer)
	VALUES
	('".$_POST["txtem_id"]."','".$_POST["txtname"]."','".$_POST["txtsize"]."','".$_POST["txtbuyer"]."')
  ";
  $objQuery = mysqli_query($objCon,$strSQL);
  if(!$objQuery)
  {
	echo $objCon->error;
	exit();
  }

  $strOrderID = mysqli_insert_id($objCon);

  for($i=0;$i<=(int)$_SESSION["intLine"];$i++)
  {
	  if($_SESSION["strpro_id"][$i] != "")
	  {
			  $strSQL = "
				INSERT INTO order_detail (o_id,pro_id,qty)
				VALUES
				('".$strOrderID."','".$_SESSION["strpro_id"][$i]."','".$_SESSION["strqty"][$i]."')
			  ";
			  mysqli_query($objCon,$strSQL);
	  }
  }

mysqli_close($objCon);
unset($_SESSION["strpro_id"]);
unset($_SESSION["strqty"]);

header("location:finish_order.php?o_id=".$strOrderID);
?>
