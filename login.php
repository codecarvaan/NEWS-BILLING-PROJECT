<?php
$id=$_POST["userid"];
$pass= $_POST["password"];

session_start();
include 'function.php';
$userid=check_text($id);
$password=check_text($pass);
$password1=md5($pass);
$type=1;
if($type==1){

$sql="select * from admin where userid='$userid' and password='$password1'";
$res=mysql_query($sql);

$_SESSION["admin"]=0;
}


$count=mysql_num_rows($res);
	if($count==1)
	{
	while($row=mysql_fetch_assoc($res))
		
	{
		
		$_SESSION["userid"]=$userid;	
	
		}
	
	
	if($_SESSION["admin"]==1)
	{
		header("location:search.php");
	}


	}

else{

header("location:main.php");
}
?>
