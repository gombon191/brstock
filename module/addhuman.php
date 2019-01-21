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
								<form action="insertem.php" name="addhuman" method="post">
									<div class="form-group">
										<label for="em_id">
											รหัสพนักงาน :
										</label>
										<input type="text" class="form-control" id="txtem_id" placeholder="ใส่รหัสพนักงาน" name="txtem_id">
									</div>

									<div class="form-group">
										<label for="name">
											ชื่อ-นามสกุล :
										</label>
										<input type="text" class="form-control" id="txtname" placeholder="ใส่ชื่อ-นามสกุล" name="txtname">
									</div>

									<div class="form-group">
										<label for="gender">
											เพศ :
										</label><br>
										<input type="radio" id="txtgender" name="txtgender" value="ชาย"> <label>ชาย</label>  <br>
										<input type="radio" id="txtgender" name="txtgender" value="หญิง"> <label>หญิง</label>
										</div>

									<div class="form-group">
										<label for="position">
											ตำแหน่ง :
										</label>
										<input type="text" class="form-control" id="txtposition" placeholder="ระบุตำแหน่งงาน" name="txtposition">
									</div>

									<div class="form-group">
									  <label for="org">วันที่เริ่มงาน</label>
									    <input class="form-control" type="date" value="<?php echo $result["org"];?>" id="txtorg" name="txtorg">
									</div>

									<div class="form-group">
										<label for="size">
											ขนาดเสื้อ :
										</label>
										<input type="text" class="form-control" id="txtsize" placeholder="Size" name="txtsize">
									</div>
									<button type="submit" class="btn btn-primary">Submit</button>
									<button type="reset" class="btn btn-warning">Reset</button>
								</form>
								</div>

								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->
			<!-- Footer -->

	<?php include "config/footer.php"; ?>

	</body>
</html>
