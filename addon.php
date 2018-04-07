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

$len=0;
if(isset($_POST["date"]) )
{
 echo   $date=$_POST["date"];
 echo	$qty=$_POST["qty"];
 echo   $add_on=$_POST["add_on"];
 echo   $remarks=$_POST["remarks"];
 echo   $add_charge=$_POST["add_charge"];
 echo   $extra_charge=$_POST["extra_charge"];


	
}
else
{
	header("location:profile.php?custid=".$custid);
}



$res="";
	//$date_issue_temp=dateformat($date_issue[$i]);
	//$date_remove_temp=dateformat($date_remove[$i]);
	//$item_code_temp=$item_code[$i];
	
	$sql="INSERT INTO item_history (custid,status,date_issue,quantity,item_code,kind,remarks,addon_charge,addon_extra_charge) VALUES ('$custid','active','$date','$qty','$add_on','addon' ,'$remarks','$add_charge','$extra_charge')";
	$res=mysql_query($sql) or die("not working");

if($res){
header("location:profile.php?custid=".$custid);
}

?>