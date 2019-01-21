<?php
ob_start();
session_start();

if(!isset($_SESSION["intLine"]))
{
	 $_SESSION["intLine"] = 0;
	 $_SESSION["strpro_id"][0] = $_GET["pro_id"];
	 $_SESSION["strqty"][0] = 1;
	 header("location:show.php");
}
else
{

	$key = array_search($_GET["pro_id"], $_SESSION["strpro_id"]);
	if((string)$key != "")
	{
		 $_SESSION["strqty"][$key] = $_SESSION["strqty"][$key] + 1;
	}
	else
	{

		 $_SESSION["intLine"] = $_SESSION["intLine"] + 1;
		 $intNewLine = $_SESSION["intLine"];
		 $_SESSION["strpro_id"][$intNewLine] = $_GET["pro_id"];
		 $_SESSION["strqty"][$intNewLine] = 1;
	}
	 header("location:show.php");
}
?>
