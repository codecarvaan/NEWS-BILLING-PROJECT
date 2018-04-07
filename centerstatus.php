<?php
session_start();
include "conn.php";
if ($_SESSION["admin"]!=1)
{
	header("location:main.php");
	
}
$id=$_GET["id"];
		$sql2="select * from center where id='$id'";
	$res2=mysql_query($sql2);
	while($row2=mysql_fetch_assoc($res2))
	{
		$status=$row2["status"];
	}
	if($status=="ACTIVE")
	{
	$status2="DEACTIVE";}
	else{
		$status2="ACTIVE";
	}
		$sql="update center set  status='$status2'  where id='$id'  ";
		$res=mysql_query($sql);
		if($res){
			header("location:center.php");
		}
		
$res=mysql_query($sql);  
	
	?>