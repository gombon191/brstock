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
                <?php
                   ini_set('display_errors', 1);
                   error_reporting(~0);

                   $serverName = "localhost";
                   $userName = "root";
                   $userPassword = "";
                   $dbName = "brstock";

                   $strEmployerID = null;

                   if(isset($_GET["em_id"]))
                   {
                	   $strEmployerID = $_GET["em_id"];
                   }

                   $serverName = "localhost";
                   $userName = "root";
                   $userPassword = "";
                   $dbName = "brstock";

                   $conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
                    $conn->set_charset("utf8");
                   $sql = "SELECT * FROM employer WHERE em_id = '".$strEmployerID."' ";

                   $query = mysqli_query($conn,$sql);

                   $result = mysqli_fetch_array($query,MYSQLI_ASSOC);

                ?>
                  <form action="savemp.php" name="frmAdd" method="post">
                  <table class="responsive">
                    <tr>
                      <th>รหัสพนักงาน</th>
                      <td><input type="hidden" name="txtem_id" value="<?php echo $result["em_id"];?>"><?php echo $result["em_id"];?></td>
                      </tr>
                    <tr>
                      <th width="120">ชื่อนามสกุล</th>
                      <td><input type="text" name="txtname" size="20" value="<?php echo $result["name"];?>"></td>
                      </tr>
											<tr>
												<th><label for="gender">
													เพศ :
												</label>
											 	</th>
												<td><select name="txtgender" id="txtgender">
                    <option <?php if($result["gender"] == "ชาย") echo"selected"?> value="ชาย" >ชาย</option>
                    <option <?php if($result["gender"] == "หญิง") echo"selected"?> value="หญิง">หญิง</option>
                </select></td>
											</tr>

                    <tr>
                      <th width="120"><label for="org">วันที่เริ่มงาน</label></th>
                      <td><input class="form-control" type="date" name="txtorg" size="30" value="<?php echo $result["org"];?>"></td>
                      </tr>
                    <tr>
                      <th width="120">ตำแหน่ง</th>
                      <td><input type="text" name="txtposition" size="40" value="<?php echo $result["position"];?>"></td>
                      </tr>
                    <tr>
                      <th width="120">ไซต์เสื้อ</th>
                      <td>
												<input type="text" name="txtsize" size="3" value="<?php echo $result["size"];?>"></td>
                      </tr>
                    </table>
                    <input class="btn btn-info" type="submit" name="submit" value="บันทึก">
                  </form>
                  <?php
                  mysqli_close($conn);
                  ?>

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
