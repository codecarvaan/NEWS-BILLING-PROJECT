<?php 
session_start();
include "conn.php";
if(empty($_SESSION["employeeid"]))
{
	header("location:main.php");
}
else{
	$id=$_GET["id"];
$sql="delete   from center where id='$id' ";
$res=mysql_query($sql);
	
	if($res)
	{
	header("location:center.php");
	}
	
}

?>