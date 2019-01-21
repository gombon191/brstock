<?php
	include "config/session.php";
	include "config/pagination_function.php";
	include "../dbconnection/dbconnection.php";
	include "config/header.php";
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
<body>

								<!-- PAGE CONTENT BEGINS -->
								<div class="container">
									<?php
										 ini_set('display_errors', 1);
										 error_reporting(~0);

										 $serverName = "localhost";
										 $userName = "root";
										 $userPassword = "";
										 $dbName = "brstock";

										 $strproductsID = null;

										 if(isset($_GET["pro_id"]))
										 {
											 $strproductsID = $_GET["pro_id"];
										 }

										 $serverName = "localhost";
										 $userName = "root";
										 $userPassword = "";
										 $dbName = "brstock";

										 $conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
											$conn->set_charset("utf8");
										 $sql = "SELECT * FROM products WHERE pro_id = '".$strproductsID."' ";

										 $query = mysqli_query($conn,$sql);

										 $result = mysqli_fetch_array($query,MYSQLI_ASSOC);

									?>
										<form action="savepro.php" name="frmAdd" method="post">
											<div class="form-group">
												<div class="table-responsive">
										<table class="table table-bordered table-striped table-hover">
											<tr>
												<th>รหัสสินค้า </th>
												<td><input type="hidden" name="txtpro_id" value="<?php echo $result["pro_id"];?>"><?php echo $result["pro_id"];?></td>
												</tr>
											<tr>
												<th width="120">ชื่อสินค้า</th>
												<td><input type="text" name="txtpro_name" size="20" value="<?php echo $result["pro_name"];?>"></td>
												</tr>
											<tr>
												<th width="120">ประเภทสินค้า</th>
												<td>
													<?php $type = (isset($fetch['catagories'])) ? $fetch['catagories'] : ''; ?>
													<select class="form-control" name="txtcat_id" id="txtcat_id">
															<option value="001" <?php if($type == "001") echo "selected"; ?> >เสื้อ Shirt</option>
															<option value="002" <?php if($type == "002") echo "selected"; ?> >เสื้อ POLO</option>
															<option value="003" <?php if($type == "002") echo "selected"; ?> >สายคล้องบัตร</option>
													</select>
												</td>
												</tr>
											<tr>
												<th width="120">ขนาด</th>
												<td><input type="text" name="txtsize" size="5" value="<?php echo $result["size"];?>"></td>
												</tr>
											<tr>
												<th width="120">สี</th>
												<td>
													<input type="text" name="txtcolor" size="3" value="<?php echo $result["color"];?>"></td>
												</tr>
												<tr>
													<th width="120">คงเหลือ</th>
													<td>
														<input type="text" name="txtquantity" size="3" value="<?php echo $result["quantity"];?>"></td>
													</tr>
													<tr>
														<th width="120">รายละเอียดสินค้า</th>
														<td>
															<textarea name="txtdetail" value="<?php echo $result["detail"];?>" rows="8" cols="80"><?php echo $result["detail"];?></textarea></td>
														</tr>
													<tr>
														<th width="120">อัพโหลดภาพ</th>
														<td>
															<input type="text" name="txtimg" size="auto" value="<?php echo $result["img"];?>"></td>
														</tr>
											</table>
											<input class="btn btn-info" type="submit" name="submit" value="บันทึก">
											</div>
										</form>
										<?php
										mysqli_close($conn);
										?>
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
