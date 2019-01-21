<?php
	include "config/session.php";
	include "config/pagination_function.php";
	include "../dbconnection/dbconnection.php";
 ?>

 <!DOCTYPE html>
 <html>
 <title>HRBRSTOCK</title>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
 <style>
 html,body,h1,h2,h3,h4 {font-family:"Lato", sans-serif}
 .mySlides {display:none}
 .w3-tag, .fa {cursor:pointer}
 .w3-tag {height:15px;width:15px;padding:0;margin-top:6px}
 </style>
	<!-- Navbar -->
	<?php include "config/nv.php"; ?>

<!-- END Navbar -->

	<body>
<?php

if(!isset($_SESSION["intLine"]))
{
	echo "Cart Empty";
	exit();
}

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
?>
<div class="table-responsive">
  <div class="container">
<table class="table table-hover">
  <tr>
    <td width="101">ภาพสินค้า</td>
    <td width="101">รหัสสินค้า</td>
    <td width="82">สินค้า</td>
    <td width="82">ราคา</td>
    <td width="79">ขนาด</td>
    <td width="79">จำนวน</td>
    <td width="79">Total</td>
    <td width="10">Del</td>
  </tr>
  <?php
  $Total = 0;
  $SumTotal = 0;

  for($i=0;$i<=(int)$_SESSION["intLine"];$i++)
  {
	  if(@$_SESSION["strpro_id"][$i] != "")
	  {
		$strSQL = "SELECT * FROM products WHERE pro_id = '".$_SESSION["strpro_id"][$i]."' ";
		$objQuery = mysqli_query($objCon,$strSQL);
		$objResult = $objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
		$Total = $_SESSION["strqty"][$i] * $objResult["price"];
		$SumTotal = $SumTotal + $Total;
	  ?>
	  <tr>
      <td><img src="../images/imgupload/<?=$objResult["img"];?>" width="150"></td>
		<td><?=$_SESSION["strpro_id"][$i];?></td>
		<td><?=$objResult["pro_name"];?></td>
		<td><?=$objResult["price"];?></td>
    <td><?=$objResult["size"];?></td>
		<td><?=$_SESSION["strqty"][$i];?></td>
		<td><?=number_format($Total,2);?></td>
		<td><a href="delete.php?Line=<?=$i;?>">x</a></td>
	  </tr>
	  <?php
	  }
  }
  ?>
</table>
รวมเป็นเงินทั้งหมด <?php echo number_format($SumTotal,2);?>
<br><br><a href="products.php" class="btn btn-info">เลือกซื้อสินค้าต่อ</a>
<?php
	if($SumTotal > 0)
	{
?>
	| <a href="checkout.php" class="btn btn-danger">ชำระเงิน</a>
<?php
	}
?>
<?php
mysqli_close($objCon);
?>
</div>
  </div>

	<!-- Footer -->
<div class="fixed-bottom">
<?php include "config/footer.php"; ?>
</div>

	<script>
	// Slideshow
	var slideIndex = 1;
	showDivs(slideIndex);

	function plusDivs(n) {
		showDivs(slideIndex += n);
	}

	function currentDiv(n) {
		showDivs(slideIndex = n);
	}

	function showDivs(n) {
		var i;
		var x = document.getElementsByClassName("mySlides");
		var dots = document.getElementsByClassName("demodots");
		if (n > x.length) {slideIndex = 1}
		if (n < 1) {slideIndex = x.length} ;
		for (i = 0; i < x.length; i++) {
			x[i].style.display = "none";
		}
		for (i = 0; i < dots.length; i++) {
			dots[i].className = dots[i].className.replace(" w3-white", "");
		}
		x[slideIndex-1].style.display = "block";
		dots[slideIndex-1].className += " w3-white";
	}
	function onClick(element) {
		document.getElementById("img01").src = element.src;
		document.getElementById("modal01").style.display = "block";
	}
	</script>
</body>
</html>
