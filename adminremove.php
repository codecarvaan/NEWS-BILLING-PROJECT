<?php 
session_start();
include "conn.php";
if(empty($_SESSION["employeeid"]))
{
	header("location:main.php");
}
else{
	$id2=$_GET["id2"];
$sql="update admin set userid='',password='',password1=''  where id2='$id2' ";
$res=mysql_query($sql);
	
	if($res)
	{
	header("location:admin.php");
	}
	
}

?>