<?php
	include "config/session.php";
 ?>
<!DOCTYPE html>
<html lang="en">
<?php
	include "config/header.php";
 ?>

	<body class="no-skin">
		<div id="navbar" class="navbar navbar-default          ace-save-state">
			<div class="navbar-container ace-save-state" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<div class="navbar-header pull-left">
					<a href="home.php" class="navbar-brand">
						<small>
							<i class="fa fa-leaf"></i>
							ระบบจัดการสินค้าข้อมูลพนักงาน
						</small>
					</a>
				</div>

				<?php include "config/navbar.php" ?>

			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="home.php">Home</a>
							</li>
							<li>รายชื่อพนักงาน</li>
						</ul><!-- /.breadcrumb -->
					</div>

					<div class="page-content">
						<div class="page-header">
							<h1>
								จัดการข้อมูลพนักงาน
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<?php
											ini_set('display_errors', 1);
											error_reporting(~0);

											$serverName = "localhost";
											$userName = "root";
											$userPassword = "";
											$dbName = "brstock";

											$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
											$conn->set_charset("utf8");

											$sql = "SELECT * FROM categories WHERE cat_id";

											$query = mysqli_query($conn,$sql);
										?>
										<caption>
											<a href="addcat.php"><button class="btn btn-primary" style="float:right;" >เพิ่มหมวดหมู่สินค้า</button></a>
											<h3>รายชื่อพนักงาน</h3>
										</caption>
											<div class="table-responsive">
								      <table class="table table-bordered" width="auto">
								        <tr>
													<th> <div align="center">รหัสหมวดหมู่</th>
								          <th> <div align="center">ชื่อหมวดหมู่</th>
								          <th> <div align="center">แก้ไข</th>
													<th> <div align="center">ลบหมวดหมู่</th>
								        </tr>
												<?php
														while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
															{
													?>
								 <tr>
									 <td><div align="center"><?php echo $result["cat_id"];?></div></td>
								   <td><div align="center"><?php echo $result["cat_name"];?></div></td>
								   <td align="center"><a href="editcat.php?cat_id=<?php echo $result["cat_id"];?>" class="btn btn-info"><span class="glyphicon glyphicon-pencil"></span></a></td>
									 <td align="center">
								<a href="JavaScript:if(confirm('Confirm Delete?') == true){window.location='delecat.php?cat_id=<?php echo $result["cat_id"];?>';}" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a>
								 </tr>
								 <?php
								}
								  ?>
								      </table>
								      <?php
								          mysqli_close($conn);
								        ?>
								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

			<div class="footer">
				<div class="footer-inner">
					<div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder">James</span>
							Application &copy; 2018-2019
						</span>

						&nbsp; &nbsp;
					</div>
				</div>
			</div>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="../assets/js/jquery-2.1.4.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="../assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='../assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="../assets/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->

		<!--[if lte IE 8]>
		  <script src="../assets/js/excanvas.min.js"></script>
		<![endif]-->
		<script src="../assets/js/jquery-ui.custom.min.js"></script>
		<script src="../assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="../assets/js/jquery.easypiechart.min.js"></script>
		<script src="../assets/js/jquery.sparkline.index.min.js"></script>
		<script src="../assets/js/jquery.flot.min.js"></script>
		<script src="../assets/js/jquery.flot.pie.min.js"></script>
		<script src="../assets/js/jquery.flot.resize.min.js"></script>

		<!-- ace scripts -->
		<script src="../assets/js/ace-elements.min.js"></script>
		<script src="../assets/js/ace.min.js"></script>
	</body>
</html>
