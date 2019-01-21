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

						<div class="container">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<form action="insertpro.php" name="addproduct" method="post">

									<div class="form-group">
										<label for="pro_name">
											ชื่อสินค้า :
										</label>
										<input type="text" class="form-control" id="txtpro_name" placeholder="ใสชื่อสินค้า" name="txtpro_name">
									</div>

									<tr>
										<th width="120">ประเภทสินค้า</th>
										<td>
											<select class="form-control" name="txtcat_id" id="txtcat_id">
													<option value=""><-- โปรดเลือกประเภทสินค้า --></option>
													<?php
					                   ini_set('display_errors', 1);
					                   error_reporting(~0);

					                   $serverName = "localhost";
					                   $userName = "root";
					                   $userPassword = "";
					                   $dbName = "brstock";

					                   $conn1 = mysqli_connect($serverName,$userName,$userPassword,$dbName);
					                    $conn1->set_charset("utf8");

													$sql1 = "SELECT * FROM categories ORDER BY cat_id ASC";
													$query1 = mysqli_query($conn1,$sql1);
													while($result1 = mysqli_fetch_array($query1,MYSQLI_ASSOC))
													{
													?>
													<option value="<?php echo $result1["cat_id"];?>"><?php echo $result1["cat_id"]." - ".$result1["cat_name"];?></option>
													<?php
													}
													?>
													</select>
										</td>
										</tr>

									<div class="form-group">
										<label for="size">
											ขนาด :
										</label>
										<input type="text" class="form-control" id="txtsize" placeholder="ขนาดสินค้า" name="txtsize">
									</div>

									<div class="form-group">
										<label for="color">
											สี :
										</label>
										<input type="text" class="form-control" id="txtcolor" placeholder="สี" name="txtcolor">
									</div>

									<div class="form-group">
										<label for="price">
											ราคา :
										</label>
										<input type="text" class="form-control" id="txtprice" placeholder="ราคาสินค้า" name="txtprice">
									</div>

									<div class="form-group">
										<label for="quantity">
											จำนวน :
										</label>
										<input type="text" class="form-control" id="txtquantity" placeholder="จำนวนสินค้า" name="txtquantity">
									</div>
									<button type="submit" class="btn btn-primary">บันทึกรายการสินค้า</button>
									<button type="reset" class="btn btn-warning">ล้างข้อมูล</button>
								</form>

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
