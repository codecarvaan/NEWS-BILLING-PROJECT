<?php  
include "conn.php";
include "function.php";
if(isset($_POST["custid"]))
{
	$custid=$_POST["custid"];
}
else
{
	header("location:search.php");
}

if( isset($_POST["addon_id"]) )
{

	$pack_id=$_POST["addon_id"];
	
}
else
{
	header("location:profile.php?custid=".$custid);
}


$sql="DELETE FROM item_history  where id='$pack_id'";

$res=mysql_query($sql);  
if($res){
header("location:profile.php?custid=".$custid);
}

?>