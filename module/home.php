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

								<!-- Content -->
								<div class="w3-content" style="max-width:1100px;margin-top:80px;margin-bottom:80px">

								  <div class="w3-panel">
								    <h1><b>ระบบเบิกจำหน่ายและแจกอุปกรณ์และเสื้อผ้าพนักงาน</b></h1>
								    <p>HR.RDC.บุรีรัมย์ (BETA VERSION 0.1.1.1)</p>
								    <hr>
								  </div>

								  <!-- Slideshow -->
								  <div class="w3-container">
								    <div class="w3-display-container mySlides">
											<center><img src="../images/imgupload/polo.jpg" style="width:600px">
								      <div class="w3-display-topleft w3-container w3-padding-32">
								        <span class="w3-black w3-padding-large w3-animate-bottom">เสื้อโปโล</span>
								      </div>
								    </div>
										</div>
								    <div class="w3-display-container mySlides">
								      <center><img src="../images/imgupload/shirt.jpg" style="width:600px">
								      <div class="w3-display-middle w3-container w3-padding-32">
								        <span class="w3-white w3-padding-large w3-animate-bottom">เสื้อริ้วพนักงาน</span>
								      </div>
								    </div>
								    <div class="w3-display-container mySlides">
								      <center><img src="../images/imgupload/strap.png" style="width:600px">
								      <div class="w3-display-topright w3-container w3-padding-32">
								        <span class="w3-white w3-padding-large w3-animate-bottom">สายคล้องบัตร</span>
								      </div>
								    </div>

								    <!-- Slideshow next/previous buttons -->
								    <div class="w3-container w3-dark-grey w3-padding w3-xlarge">
								      <div class="w3-left" onclick="plusDivs(-1)"><i class="fa fa-arrow-circle-left w3-hover-text-teal"></i></div>
								      <div class="w3-right" onclick="plusDivs(1)"><i class="fa fa-arrow-circle-right w3-hover-text-teal"></i></div>

								      <div class="w3-center">
								        <span class="w3-tag demodots w3-border w3-transparent w3-hover-white" onclick="currentDiv(1)"></span>
								        <span class="w3-tag demodots w3-border w3-transparent w3-hover-white" onclick="currentDiv(2)"></span>
								        <span class="w3-tag demodots w3-border w3-transparent w3-hover-white" onclick="currentDiv(3)"></span>
								      </div>
								    </div>
								  </div>

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
