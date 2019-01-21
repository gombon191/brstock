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

								<!-- PAGE CONTENT BEGINS -->

<div class="container">
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
											<a href="human.php" class="btn btn-danger">ล้างค่า</a><center>
										</div>
								</div>
								</form>

								<div class="table-responsive">
								<table class="table table-bordered table-striped table-hover">
									<thead >
										<tr class="table-primary">
											<th class="text-center" scope="col" width="30">ลำดับ
											</th>
											<th> <div align="center">รหัสพนักงาน</th>
											<th> <div align="center">ชื่อนามสกุล</th>
											<th> <div align="center">เพศ</th>
											<th> <div align="center">วันที่เริ่มงาน</th>
											<th> <div align="center">ตำแหน่ง</th>
											<th> <div align="center">ไซต์เสื้อ</th>
											<th> <div align="center">แก้ไข</th>
											<th> <div align="center">ลาออก</th>
										</tr>
									</thead>
									<tbody>
								<?php
								$num = 0;
								$sql = "
								SELECT * FROM employer WHERE 1
								";

								//////////////////// MORE QUERY

								// เงื่อนไขสำหรับ input text
								if(isset($_GET['keyword']) && $_GET['keyword']!=""){
										// ต่อคำสั่ง sql
										$sql.=" AND name LIKE '%".trim($_GET['keyword'])."%' ";
								}
								//////////////////// MORE QUERY
								$result=$mysqli->query($sql);
								$total=$result->num_rows;

								$e_page=10; // กำหนด จำนวนรายการที่แสดงในแต่ละหน้า
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
								$sql.=" ORDER BY em_id  LIMIT ".$s_page.",$e_page";
								$result=$mysqli->query($sql);
								if($result && $result->num_rows>0){  // คิวรี่ข้อมูลสำเร็จหรือไม่ และมีรายการข้อมูลหรือไม่
										while($row = $result->fetch_assoc()){ // วนลูปแสดงรายการ
												$num++;
								?>
										<tr>
											<th class="text-center" scope="row"><?=($step_num*$e_page)+$num?></th>
											<td class="text-left" ><?=$row['em_id']?></td>
											<td class="text-left" ><?=$row['name']?></td>
											<td class="text-left" ><?=$row['gender']?></td>
											<td class="text-left" ><?=$row['org']?></td>
											<td class="text-left" ><?=$row['position']?></td>
											<td class="text-left" ><?=$row['size']?></td>
											<td align="center"><a href="editemp.php?em_id=<?=$row["em_id"];?>">แก้ไข</a> </td>
										<td align="center"><a href="JavaScript:if(confirm('Confirm Delete?') == true){window.location='delemp.php?em_id=<?=$row["em_id"];?>';}">ลบ</a>
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
								</div>
								</div>
							</div>
								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

			<!-- Footer -->
	<?php include "config/footer.php"; ?>


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
