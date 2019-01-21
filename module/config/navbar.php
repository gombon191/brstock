<div class="navbar-buttons navbar-header pull-right" role="navigation">
  <ul class="nav ace-nav">
    <li class="light-blue dropdown-modal">
      <a data-toggle="dropdown" href="#" class="dropdown-toggle">
        <img class="nav-user-photo" src="../assets/images/avatars/user.jpg" alt="Jason's Photo" />
        <span class="user-info">
          <small>ยินดีต้อนรับ,</small>
          คุณ "<?=$objResult["username"];?>"
        </span>

        <i class="ace-icon fa fa-caret-down"></i>
      </a>

      <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
        <li>
          <a href="setting.html">
            <i class="ace-icon fa fa-cog"></i>
            Settings
          </a>
        </li>

        <li>
          <a href="profile.html">
            <i class="ace-icon fa fa-user"></i>
            Profile
          </a>
        </li>

        <li class="divider"></li>

        <li>
          <a href="logout.php">
            <i class="ace-icon fa fa-power-off"></i>
            Logout
          </a>
        </li>
      </ul>
    </li>
  </ul>
</div>
</div><!-- /.navbar-container -->
</div>

<div class="main-container ace-save-state" id="main-container">
<script type="text/javascript">
try { ace.settings.loadState('main-container') } catch (e) { }
</script>

<div id="sidebar" class="sidebar                  responsive                    ace-save-state">
<script type="text/javascript">
  try { ace.settings.loadState('sidebar') } catch (e) { }
</script>

<ul class="nav nav-list">
  <li class="active">
    <a href="home.php">
      <i class="menu-icon fa fa-tachometer"></i>
      <span class="menu-text"> Dashboard </span>
    </a>

    <b class="arrow"></b>
  </li>

  <li>
    <a href="#" class="dropdown-toggle">
      <i class="menu-icon fa fa-desktop"></i>
      <span class="menu-text">
        จัดการพนักงาน
      </span>

      <b class="arrow fa fa-angle-down"></b>
    </a>

    <b class="arrow"></b>

    <ul class="submenu">
      <li class="">
        <a href="human.php">
          <i class="menu-icon fa fa-caret-right"></i>
          รายชื่อพนักงาน
        </a>

        <b class="arrow"></b>

        <ul class="submenu">
        </ul>
      </li>

      <li class="">
        <a href="addhuman.php">
          <i class="menu-icon fa fa-caret-right"></i>
          เพิ่มพนักงานใหม่
        </a>

        <b class="arrow"></b>
      </li>

      <li class="">
        <a href="exithuman.php">
          <i class="menu-icon fa fa-caret-right"></i>
          รายชื่อพนักงานลาออก
        </a>

        <b class="arrow"></b>
      </li>
    </ul>
  </li>

  <li class="">
    <a href="#" class="dropdown-toggle">
      <i class="menu-icon fa fa-list"></i>
      <span class="menu-text"> สินค้า </span>

      <b class="arrow fa fa-angle-down"></b>
    </a>

    <b class="arrow"></b>

    <ul class="submenu">
      <li class="">
        <a href="listpro.php">
          <i class="menu-icon fa fa-caret-right"></i>
          รายการสินค้า
        </a>

        <b class="arrow"></b>
      </li>

      <li class="">
        <a href="addpro.php">
          <i class="menu-icon fa fa-caret-right"></i>
          เพิ่มสินค้า
        </a>

        <b class="arrow"></b>
      </li>

      <li class="">
        <a href="categorie.php">
          <i class="menu-icon fa fa-caret-right"></i>
          หมวดหมู่สินค้า
        </a>

        <b class="arrow"></b>
      </li>

      <li class="">
        <a href="addcat.php">
          <i class="menu-icon fa fa-caret-right"></i>
          เพิ่มหมวดหมู่สินค้า
        </a>

        <b class="arrow"></b>
      </li>


    </ul>
  </li>

  <li class="">
    <a href="history.php">
      <i class="menu-icon fa fa fa-list-alt"></i>
      <span class="menu-text"> ประวัติการสั่งจ่าย </span>
    </a>

    <b class="arrow"></b>

  </li>

    <b class="arrow"></b>
  </li>

  <li class="">
    <a href="forecast.php">
      <i class="menu-icon fa fa-bar-chart-o"></i>
      <span class="menu-text"> Forecast </span>
    </a>

    <b class="arrow"></b>
  </li>

  <li class="">
    <a href="./products.php">
      <i class="menu-icon fa fa-credit-card"></i>
      <span class="menu-text"> ซื้อ </span>
    </a>

    <b class="arrow"></b>
  </li>
</ul><!-- /.nav-list -->

<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
  <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
</div>
</div>
