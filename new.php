<?php
session_start();
if (empty($_SESSION["employeeid"]))
{
	header("location:main.php");
	
}
else
{
	
	unset($_SESSION['refid']);
	unset($_SESSION["custid"]);
header("location:search.php");
}
?>