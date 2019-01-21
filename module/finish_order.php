<?php
	include "config/session.php";
	include "config/pagination_function.php";
	include "../dbconnection/dbconnection.php";
 ?>
<html>
<head>
<title>BRSTOCK</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
Finish Your Order. <br><br>

<a href="view_order.php?o_id=<?php echo $_GET["o_id"];?>">View Order</a>

</body>
</html>
