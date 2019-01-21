<?php
	ob_start();
	session_start();

	if(isset($_GET["Line"]))
	{
		$Line = $_GET["Line"];
		$_SESSION["strpro_id"][$Line] = "";
		$_SESSION["strqty"][$Line] = "";
	}
	header("location:show.php");
?>
