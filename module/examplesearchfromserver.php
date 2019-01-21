<?php
	include "config/pagination_function.php";
	include "../dbconnection/dbconnection.php";
 ?>
 <!doctype html>
 <html>
 <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <title>Document</title>
     <link rel="stylesheet" href="https://unpkg.com/bootstrap@4.1.0/dist/css/bootstrap.min.css" >
     <style type="text/css">
         html{
             font-family:tahoma, Arial,"Times New Roman";
             font-size:14px;
         }
         body{
             font-family:tahoma, Arial,"Times New Roman";
             font-size:14px;
         }
         .margin_top_5{
             margin-top: 5px;
         }
     </style>
 </head>
 <body>

 <br>
 <br>
 <div class="container">

 <form name="form1" method="get" action="">
 <div class="form-group row">
     <label for="keyword" class="col-sm-4 col-form-label text-right">
     พิมพ์บางคำ บางตัว หรือไม่พิมพ์ก็ได้
     </label>
     <div class="col-sm-3">
       <input type="text" class="form-control" name="keyword" id="keyword"
        value="<?=(isset($_GET['keyword']))?$_GET['keyword']:""?>">
     </div>
 </div>
 <div class="form-group row">
     <label for="myselect" class="col-sm-4 col-form-label text-right">
     เลือกอย่างหนึ่งอย่างใด หรือไม่เลือกก็ได้
     </label>
     <div class="col-sm-3">
         <select class="custom-select" name="myselect" id="myselect">
             <option value="">เลื่อกเงื่่อนไข</option>
             <option value="ก" <?=(isset($_GET['myselect']) && $_GET['myselect']=="ก")?" selected":""?> >ขึ้นต้นด้วย ก</option>
             <option value="อุ" <?=(isset($_GET['myselect']) && $_GET['myselect']=="อุ")?" selected":""?> >ขึ้นต้นด้วย อุ</option>
         </select>
     </div>
 </div>
 <div class="form-group row">
     <label for="" class="col-sm-4 col-form-label text-right">
     เลือกอย่างหนึ่งอย่างใด หรือไม่เลือกก็ได้
     </label>
     <div class="col-sm-3">
         <div class="custom-control custom-radio custom-control-inline margin_top_5">
           <input type="radio" id="myradio1" name="myradio" value="จ"
           <?=(isset($_GET['myradio']) && $_GET['myradio']=="จ")?" checked":""?> class="custom-control-input">
           <label class="custom-control-label" for="myradio1">มี "จ"</label>
         </div>
         <div class="custom-control custom-radio custom-control-inline margin_top_5">
           <input type="radio" id="myradio2" name="myradio" value="ม"
           <?=(isset($_GET['myradio']) && $_GET['myradio']=="ม")?" checked":""?> class="custom-control-input">
           <label class="custom-control-label" for="myradio2">มี "ม"</label>
         </div>
         <div class="custom-control custom-radio custom-control-inline margin_top_5">
           <input type="radio" id="myradio3" name="myradio" value="ส"
           <?=(isset($_GET['myradio']) && $_GET['myradio']=="ส")?" checked":""?> class="custom-control-input">
           <label class="custom-control-label" for="myradio3">มี "ส"</label>
         </div>
     </div>
 </div>
 <div class="form-group row">
     <label for="" class="col-sm-4 col-form-label text-right">
     เลือกอย่างหนึ่งอย่างใด หรือเลือกทั้งสอง หรือไม่เลือกก็ได้
     </label>
     <div class="col-sm-3">
         <div class="custom-control custom-checkbox custom-control-inline margin_top_5">
           <input type="checkbox" id="mycheckbox1" name="mycheckbox1" value="นี"
           <?=(isset($_GET['mycheckbox1']) && $_GET['mycheckbox1']=="นี")?" checked":""?>  class="custom-control-input">
           <label class="custom-control-label" for="mycheckbox1">ลงท้ายด้วย "นี"</label>
         </div>
         <div class="custom-control custom-checkbox custom-control-inline margin_top_5">
           <input type="checkbox" id="mycheckbox2" name="mycheckbox2" value="คร"
           <?=(isset($_GET['mycheckbox2']) && $_GET['mycheckbox2']=="คร")?" checked":""?> class="custom-control-input">
           <label class="custom-control-label" for="mycheckbox2">ลงท้ายด้วย "คร"</label>
         </div>
     </div>
 </div>
 <div class="form-group row">
     <div class="col-sm-4 offset-sm-4">
       <button type="submit" class="btn btn-primary" name="btn_search" id="btn_search">ค้นหา</button>
       &nbsp;&nbsp;
       <a href="examplesearchfromserver.php" class="btn btn-danger">ล้างค่า</a>
     </div>
 </div>
 </form>

 <div class="table-responsive-sm">
 <table class="table table-bordered table-striped table-hover table-sm">
   <thead >
     <tr class="table-primary">
       <th class="text-center" scope="col" width="30">#</th>
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
 // เงื่อนไขสำหรับ radio
 if(isset($_GET['myradio']) && $_GET['myradio']!=""){
     // ต่อคำสั่ง sql
     $sql.=" AND name LIKE '%".trim($_GET['myradio'])."%' ";
 }

 // เงื่อนไขสำหรับ input text
 if(isset($_GET['keyword']) && $_GET['keyword']!=""){
     // ต่อคำสั่ง sql
     $sql.=" AND name LIKE '%".trim($_GET['keyword'])."%' ";
 }

 // เงื่อนไขสำหรับ select
 if(isset($_GET['myselect']) && $_GET['myselect']!=""){
     // ต่อคำสั่ง sql
     $sql.=" AND name LIKE '".trim($_GET['myselect'])."%' ";
 }

 // เงื่อนไขสำหรับ checkbox
 if((isset($_GET['mycheckbox1']) && $_GET['mycheckbox1']!="")
 || (isset($_GET['mycheckbox2']) && $_GET['mycheckbox2']!="")){
     // ต่อคำสั่ง sql
     if($_GET['mycheckbox1']!="" && $_GET['mycheckbox2']!=""){
          $sql.="
          AND (name LIKE '%".trim($_GET['mycheckbox1'])."'
          OR name LIKE '%".trim($_GET['mycheckbox2'])."' )
          ";
     }elseif($_GET['mycheckbox1']!=""){
          $sql.=" AND name LIKE '%".trim($_GET['mycheckbox1'])."' ";
     }elseif($_GET['mycheckbox2']!=""){
          $sql.=" AND name LIKE '%".trim($_GET['mycheckbox2'])."' ";
     }else{

     }
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
			 <td align="center">
		<a href="JavaScript:if(confirm('Confirm Delete?') == true){window.location='delemp.php?em_id=<?=$row["em_id"];?>">ลบ</a>
     </tr>
 <?php
     }
 }
 ?>
   </tbody>
 </table>

 <?php
 page_navi($total,(isset($_GET['page']))?$_GET['page']:1,$e_page,$_GET);
 ?>
 </div>

 <br>

 <br>
 </div>

 <script src="https://unpkg.com/jquery@3.3.1/dist/jquery.min.js"></script>
 <script src="https://unpkg.com/bootstrap@4.1.0/dist/js/bootstrap.min.js"></script>
 <script type="text/javascript">
 $(function(){

 });
 </script>
 </body>
 </html>
