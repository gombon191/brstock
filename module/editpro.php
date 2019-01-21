<?php
	include "config/session.php";
	include "config/pagination_function.php";
	include "../dbconnection/dbconnection.php";
	include "config/header.php";
 ?>
<!DOCTYPE html>
<html lang="en">
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
	<body>
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="home.php">ระบบเบิกจ่ายสินค้าพนักงาน</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          จัดการพนักงาน
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="human.php">รายชื่อพนักงาน</a>
          <a class="dropdown-item" href="addhuman.php">เพิ่มข้อมูลพนักงาน</a>
        </div>
      </li>
			<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          จัดการสินค้า
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="listpro.php">รายการสินค้า</a>
          <a class="dropdown-item" href="addpro.php">เพิ่มข้อมูลสินค้า</a>
        </div>
      </li>
			<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          จัดการหมวดหมู่สินค้า
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="categorie.php">หมวดหมู่สินค้า</a>
          <a class="dropdown-item" href="addcat.php">เพิ่มหมวดหมู่สินค้า</a>
        </div>
      </li>
			<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          จัดการตำแหน่งงาน
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="listpro.php">ตำแหน่งาน</a>
          <a class="dropdown-item" href="addpro.php">เพิ่มตำแหน่งงาน</a>
        </div>
      </li>
    </ul>
		<form class="form-inline my-2 my-lg-0" style="float:right;">
			<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
			<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
		</form>
<li class="light-blue dropdown-modal">
	<a data-toggle="dropdown" href="#" class="dropdown-toggle">
		<img class="nav-user-photo" src="../assets/images/avatars/user.jpg" alt="Jason's Photo" />
		<span class="user-info">
			<small>ยินดีต้อนรับ,</small>
			คุณ "<?=$objResult["username"];?>"
		</span>
	</a>

	<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
		<li>
			<a href="setting.php">
				<i class="ace-icon fa fa-cog"></i>
				ตั้งค่าโปรไฟล์
			</a>
		</li>

		<li class="divider"></li>

		<li>
			<a href="logout.php">
				<i class="ace-icon fa fa-power-off"></i>
				Logout
			</a>
		</li>
	</li>
	</ul>
  </div>
</nav>
		<br><br>
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
		<script src="assets/js/jquery-2.1.4.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="assets/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->

		<!--[if lte IE 8]>
		  <script src="assets/js/excanvas.min.js"></script>
		<![endif]-->
		<script src="assets/js/jquery-ui.custom.min.js"></script>
		<script src="assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="assets/js/jquery.easypiechart.min.js"></script>
		<script src="assets/js/jquery.sparkline.index.min.js"></script>
		<script src="assets/js/jquery.flot.min.js"></script>
		<script src="assets/js/jquery.flot.pie.min.js"></script>
		<script src="assets/js/jquery.flot.resize.min.js"></script>

		<!-- ace scripts -->
		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
				$('.easy-pie-chart.percentage').each(function(){
					var $box = $(this).closest('.infobox');
					var barColor = $(this).data('color') || (!$box.hasClass('infobox-dark') ? $box.css('color') : 'rgba(255,255,255,0.95)');
					var trackColor = barColor == 'rgba(255,255,255,0.95)' ? 'rgba(255,255,255,0.25)' : '#E2E2E2';
					var size = parseInt($(this).data('size')) || 50;
					$(this).easyPieChart({
						barColor: barColor,
						trackColor: trackColor,
						scaleColor: false,
						lineCap: 'butt',
						lineWidth: parseInt(size/10),
						animate: ace.vars['old_ie'] ? false : 1000,
						size: size
					});
				})

				$('.sparkline').each(function(){
					var $box = $(this).closest('.infobox');
					var barColor = !$box.hasClass('infobox-dark') ? $box.css('color') : '#FFF';
					$(this).sparkline('html',
									 {
										tagValuesAttribute:'data-values',
										type: 'bar',
										barColor: barColor ,
										chartRangeMin:$(this).data('min') || 0
									 });
				});


			  //flot chart resize plugin, somehow manipulates default browser resize event to optimize it!
			  //but sometimes it brings up errors with normal resize event handlers
			  $.resize.throttleWindow = false;

			  var placeholder = $('#piechart-placeholder').css({'width':'90%' , 'min-height':'150px'});
			  var data = [
				{ label: "social networks",  data: 38.7, color: "#68BC31"},
				{ label: "search engines",  data: 24.5, color: "#2091CF"},
				{ label: "ad campaigns",  data: 8.2, color: "#AF4E96"},
				{ label: "direct traffic",  data: 18.6, color: "#DA5430"},
				{ label: "other",  data: 10, color: "#FEE074"}
			  ]
			  function drawPieChart(placeholder, data, position) {
			 	  $.plot(placeholder, data, {
					series: {
						pie: {
							show: true,
							tilt:0.8,
							highlight: {
								opacity: 0.25
							},
							stroke: {
								color: '#fff',
								width: 2
							},
							startAngle: 2
						}
					},
					legend: {
						show: true,
						position: position || "ne",
						labelBoxBorderColor: null,
						margin:[-30,15]
					}
					,
					grid: {
						hoverable: true,
						clickable: true
					}
				 })
			 }
			 drawPieChart(placeholder, data);

			 /**
			 we saved the drawing function and the data to redraw with different position later when switching to RTL mode dynamically
			 so that's not needed actually.
			 */
			 placeholder.data('chart', data);
			 placeholder.data('draw', drawPieChart);


			  //pie chart tooltip example
			  var $tooltip = $("<div class='tooltip top in'><div class='tooltip-inner'></div></div>").hide().appendTo('body');
			  var previousPoint = null;

			  placeholder.on('plothover', function (event, pos, item) {
				if(item) {
					if (previousPoint != item.seriesIndex) {
						previousPoint = item.seriesIndex;
						var tip = item.series['label'] + " : " + item.series['percent']+'%';
						$tooltip.show().children(0).text(tip);
					}
					$tooltip.css({top:pos.pageY + 10, left:pos.pageX + 10});
				} else {
					$tooltip.hide();
					previousPoint = null;
				}

			 });

				/////////////////////////////////////
				$(document).one('ajaxloadstart.page', function(e) {
					$tooltip.remove();
				});




				var d1 = [];
				for (var i = 0; i < Math.PI * 2; i += 0.5) {
					d1.push([i, Math.sin(i)]);
				}

				var d2 = [];
				for (var i = 0; i < Math.PI * 2; i += 0.5) {
					d2.push([i, Math.cos(i)]);
				}

				var d3 = [];
				for (var i = 0; i < Math.PI * 2; i += 0.2) {
					d3.push([i, Math.tan(i)]);
				}


				var sales_charts = $('#sales-charts').css({'width':'100%' , 'height':'220px'});
				$.plot("#sales-charts", [
					{ label: "Domains", data: d1 },
					{ label: "Hosting", data: d2 },
					{ label: "Services", data: d3 }
				], {
					hoverable: true,
					shadowSize: 0,
					series: {
						lines: { show: true },
						points: { show: true }
					},
					xaxis: {
						tickLength: 0
					},
					yaxis: {
						ticks: 10,
						min: -2,
						max: 2,
						tickDecimals: 3
					},
					grid: {
						backgroundColor: { colors: [ "#fff", "#fff" ] },
						borderWidth: 1,
						borderColor:'#555'
					}
				});


				$('#recent-box [data-rel="tooltip"]').tooltip({placement: tooltip_placement});
				function tooltip_placement(context, source) {
					var $source = $(source);
					var $parent = $source.closest('.tab-content')
					var off1 = $parent.offset();
					var w1 = $parent.width();

					var off2 = $source.offset();
					//var w2 = $source.width();

					if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
					return 'left';
				}


				$('.dialogs,.comments').ace_scroll({
					size: 300
			    });


				//Android's default browser somehow is confused when tapping on label which will lead to dragging the task
				//so disable dragging when clicking on label
				var agent = navigator.userAgent.toLowerCase();
				if(ace.vars['touch'] && ace.vars['android']) {
				  $('#tasks').on('touchstart', function(e){
					var li = $(e.target).closest('#tasks li');
					if(li.length == 0)return;
					var label = li.find('label.inline').get(0);
					if(label == e.target || $.contains(label, e.target)) e.stopImmediatePropagation() ;
				  });
				}

				$('#tasks').sortable({
					opacity:0.8,
					revert:true,
					forceHelperSize:true,
					placeholder: 'draggable-placeholder',
					forcePlaceholderSize:true,
					tolerance:'pointer',
					stop: function( event, ui ) {
						//just for Chrome!!!! so that dropdowns on items don't appear below other items after being moved
						$(ui.item).css('z-index', 'auto');
					}
					}
				);
				$('#tasks').disableSelection();
				$('#tasks input:checkbox').removeAttr('checked').on('click', function(){
					if(this.checked) $(this).closest('li').addClass('selected');
					else $(this).closest('li').removeClass('selected');
				});


				//show the dropdowns on top or bottom depending on window height and menu position
				$('#task-tab .dropdown-hover').on('mouseenter', function(e) {
					var offset = $(this).offset();

					var $w = $(window)
					if (offset.top > $w.scrollTop() + $w.innerHeight() - 100)
						$(this).addClass('dropup');
					else $(this).removeClass('dropup');
				});

			})
		</script>
	</body>
</html>
