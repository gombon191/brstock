<?php
	session_start();

	$pro_id = $_REQUEST['pro_id'];
	$act = $_REQUEST['act'];

	if($act=='add' && !empty($pro_id))
	{
		if(isset($_SESSION['cart'][$pro_id]))
		{
			$_SESSION['cart'][$pro_id]++;
		}
		else
		{
			$_SESSION['cart'][$pro_id]=1;
		}
	}

	if($act=='remove' && !empty($pro_id))  //ยกเลิกการสั่งซื้อ
	{
		unset($_SESSION['cart'][$pro_id]);
	}

	if($act=='update')
	{
		$amount_array = $_POST['amount'];
		foreach($amount_array as $pro_id=>$amount)
		{
			$_SESSION['cart'][$pro_id]=$amount;
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Shopping Cart</title>
</head>

<body>
<form id="frmcart" name="frmcart" method="post" action="?act=update">
  <table width="600" border="0" align="center" class="square">
    <tr>
      <td colspan="5" bgcolor="#CCCCCC">
      <b>ตะกร้าสินค้า</span></td>
    </tr>
    <tr>
      <td bgcolor="#EAEAEA">สินค้า</td>
      <td align="center" bgcolor="#EAEAEA">ราคา</td>
      <td align="center" bgcolor="#EAEAEA">จำนวน</td>
      <td align="center" bgcolor="#EAEAEA">รวม(บาท)</td>
      <td align="center" bgcolor="#EAEAEA">ลบ</td>
    </tr>
<?php
$total=0;
if(!empty($_SESSION['cart']))
{
  $server = "localhost";
  $user = "root";
  $pass = "";
  $db = "brstock";

  $link = new mysqli($server,$user,$pass,$db);

  if($link->connect_error){
    die("Connection_Failed : " .$link->connect_error);
  }
  $link->set_charset("utf8");
	foreach($_SESSION['cart'] as $pro_id=>$qty)
	{
		$sql = "select * from products where pro_id=$pro_id";
		$query = mysqli_query($link, $sql);
		$row = mysqli_fetch_array($query);
		$sum = $row['price'] * $qty;
		$total += $sum;
		echo "<tr>";
		echo "<td width='334'>" . $row["pro_name"] . "</td>";
		echo "<td width='46' align='right'>" .number_format($row["price"],2) . "</td>";
		echo "<td width='57' align='right'>";
		echo "<input type='text' name='amount[$pro_id]' value='$qty' size='2'/></td>";
		echo "<td width='93' align='right'>".number_format($sum,2)."</td>";
		//remove product
		echo "<td width='46' align='center'><a href='cart.php?pro_id=$pro_id&act=remove'>ลบ</a></td>";
		echo "</tr>";
	}
	echo "<tr>";
  	echo "<td colspan='3' bgcolor='#CEE7FF' align='center'><b>ราคารวม</b></td>";
  	echo "<td align='right' bgcolor='#CEE7FF'>"."<b>".number_format($total,2)."</b>"."</td>";
  	echo "<td align='left' bgcolor='#CEE7FF'></td>";
	echo "</tr>";
}
?>
<tr>
<td><a href="../index.php#product">กลับหน้ารายการสินค้า</a></td>
<td colspan="4" align="right">
    <input type="submit" name="button" id="button" value="ปรับปรุง" />
    <input type="button" name="Submit2" value="สั่งซื้อ" onclick="window.location='../module/confirm.php';" />
</td>
</tr>
</table>
</form>
</body>
</html>
