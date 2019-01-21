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
<body>

<!-- Links (sit on top) -->
<div class="w3-top">
  <div class="w3-row w3-large w3-light-grey">
    <div class="w3-col s3">
      <a href="products.php" class="w3-button w3-block">หน้าแรก</a>
    </div>
    <div class="w3-col s3">
      <a href="products.php" class="w3-button w3-block">ซื้อสินค้า</a>
    </div>
    <div class="w3-col s3">
      <a href="home.php" class="w3-button w3-block"><span class="user-info">
          <small>ยินดีต้อนรับ,</small>
          คุณ "<?=$objResult["username"];?>"
        </span></a>
    </div>
    <div class="w3-col s3">
      <a href="logout.php" class="w3-button w3-block">ออกจากระบบ</a>
    </div>
  </div>
</div>

<!-- Content -->
<div class="container">
<div class="w3-content" style="max-width:1100px;margin-top:80px;margin-bottom:80px">

  <div class="w3-panel">
    <h1><b>MARKETING</b></h1>
    <p>ระบบเบิกจ่ายสินค้าพนักงาน</p>
  </div>
<br>


	<!-- PAGE CONTENT BEGINS -->

									<form name="form1" method="get" action="">
									<div class="form-group row">
											<label for="keyword" class="col-sm-4 text-right">
											พิมพ์บางคำ บางตัว หรือไม่พิมพ์ก็ได้
											</label>
											<div class="col-sm-3">
												<input type="text" class="form-control" name="keyword" id="keyword"
												 value="<?=(isset($_GET['keyword']))?$_GET['keyword']:""?>">
											</div>
									</div>
									<div class="form-group row">
										<div class="col-sm-4 offset-sm-4">
												<button type="submit" class="btn btn-primary" name="btn_search" id="btn_search">ค้นหา</button>
												&nbsp;&nbsp;
												<a href="products.php#product" class="btn btn-danger">ล้างค่า</a><center>
											</div>
									</div>
									</form>

									<div class="table-responsive">
									<table class="table table-hover">
										<thead >
											<tr class="table-active">
												<th> ภาพสินค้า</th>
												<th> รหัสสินค้า</th>
												<th> ชื่อสินค้า</th>
												<th> ราคา</th>
												<th> รายละเอียดสินค้า</th>
													<th> สั่งซื้อ</th>
											</tr>
										</thead>
										<tbody>
									<?php
									$num = 0;
									$sql = "
									SELECT products.*,categories.cat_name FROM products left join categories on products.cat_id=categories.cat_id
									WHERE 1";

									//////////////////// MORE QUERY

									// เงื่อนไขสำหรับ input text
									if(isset($_GET['keyword']) && $_GET['keyword']!=""){
											// ต่อคำสั่ง sql
											$sql.=" AND pro_name LIKE '%".trim($_GET['keyword'])."%' ";
									}
									//////////////////// MORE QUERY
									$result=$mysqli->query($sql);
									$total=$result->num_rows;

									$e_page=3; // กำหนด จำนวนรายการที่แสดงในแต่ละหน้า
									$step_num=0;
									if(!isset($_GET['page']) || (isset($_GET['page']) && $_GET['page']==1)){
											$_GET['page']=1;
											$step_num=0;
											$s_page = 0;
									}else{
											$s_page = $_GET['page']-1;
											$step_num=$_GET['page']-1;
											$s_page = $s_page*$e_page;
									}
									$sql.=" ORDER BY pro_id  LIMIT ".$s_page.",$e_page";
									$result=$mysqli->query($sql);
									if($result && $result->num_rows>0){  // คิวรี่ข้อมูลสำเร็จหรือไม่ และมีรายการข้อมูลหรือไม่
											while($row = $result->fetch_assoc()){ // วนลูปแสดงรายการ
													$num++;
									?>
											<tr>
												<td><img src="../images/imgupload/<?=$row["img"];?>" width="150"></td>
												<td class="text-left"><?=$row["pro_id"];?></td>
											 <td class="text-left"><?=$row["pro_name"];?></td>
											 <td class="text-left"><?=$row["price"];?> บาท</td>
											 <td class="text-left"> <?=$row["detail"];?>
												 <br> หมวดหมู่ : <?=$row["cat_name"];?>
												 <br> ขนาด : <?=$row["size"];?>
												 <br> สี : <?=$row["color"];?></td>
											 <td align="center"><a href="order.php?pro_id=<?=$row["pro_id"];?>" class="btn btn-info">ORDER</a></td>
										 </tr>
									<?php
											}
									}
									?>
										</tbody>
									</table>
									<center>

									<?php
									page_navi($total,(isset($_GET['page']))?$_GET['page']:1,$e_page,$_GET);
									?>
									</div>

									<br>

									<br>
									</div>
									</div>
								</div>

<!-- Footer -->

<footer class="w3-container w3-padding-32 w3-light-grey w3-center">
  <a href="#" class="w3-button w3-black w3-margin"><i class="fa fa-arrow-up w3-margin-right"></i>To the top</a>
  <div class="w3-xlarge w3-section">
    <i class="fa fa-facebook-official w3-hover-opacity"></i>
    <i class="fa fa-instagram w3-hover-opacity"></i>
    <i class="fa fa-snapchat w3-hover-opacity"></i>
    <i class="fa fa-pinterest-p w3-hover-opacity"></i>
    <i class="fa fa-twitter w3-hover-opacity"></i>
    <i class="fa fa-linkedin w3-hover-opacity"></i>
  </div>
  <p>Powered by <a href="https://www.cpall.co.th" title="W3.CSS" target="_blank" class="w3-hover-text-green">RDC.Buriram</a></p>
</footer>


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
</script>

</body>
</html>
