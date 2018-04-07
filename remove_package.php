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

if(isset($_POST["type"]) && isset($_POST["end_date"]) && isset($_POST["pack_id"]) )
{
;
	$type= $_POST["type"];
	$end_date= $_POST["end_date"];
	$pack_id=$_POST["pack_id"];
	
}
else
{
	header("location:profile.php?custid=".$custid);
}



$res="";
if($type==1)
{
$sql="DELETE FROM item_history  where id='$pack_id'";
}
if($type==2)
{
$sql="UPDATE item_history set  status='deactive',date_remove='$end_date' where id='$pack_id'";
}
$res=mysql_query($sql);  
if($res){
header("location:profile.php?custid=".$custid);
}

?>