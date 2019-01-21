<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="home.php"><h1><strong>BRSTOCK</strong></h1></a>
    </div>
    <ul class="nav nav-inline">
      <li><a href="products.php">ซื้อสินค้า</a></li>
      <li><a href="listpro.php">จัดการสินค้า</a></li>
      <li><a href="human.php">จัดการพนักงาน</a></li>
      <li><a href="stock.php">สต็อคสินค้า</a></li>
			<li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">ยินดีต้อนรับ,คุณ "<?=$objResult["username"];?>"</a>
        <ul class="dropdown-menu">
          <li><a href="#">ตั้งค่าโปรไฟล์</a></li>
          <li><a href="logout.php">ออกจากระบบ (Logout)</a></li>
        </ul>
      </li>
    </ul>
  </div>
</nav>
