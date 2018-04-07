<?php 
session_start();
if($_SESSION["admin"]==2){
	

include "conn.php";
$centerid=$_POST["centerid"];
$address=$_POST["address"];

$sql="insert into  center   (centerid,address) values ('$centerid','$address') ";
$res=mysql_query($sql);  
if($res){
header("location:center.php");
}}
else{
	header("location:center.php?error=404");
}
?>