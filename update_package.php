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
print_r($_POST["date_issue"]);
print_r($_POST["date_remove"]);
print_r($_POST["item_code"]);
$len=0;
if(isset($_POST["date_issue"]) && isset($_POST["item_code"]) && isset($_POST["qty"]) )
{
	$date_issue=$_POST["date_issue"];
	$item_code=$_POST["item_code"];
    $qty=$_POST["qty"];
	$len=sizeof($item_code);
	
}
else
{
	header("location:profile.php?custid=".$custid);
}



$res="";

for($i=0;$i<$len;$i++)
{	$date_issue_temp=$date_issue[$i];
	$qty_temp=$qty[$i];
	$item_code_temp=$item_code[$i];
	if($item_code_temp=="" or $date_issue_temp=="")
	{
		continue;
	}
	$sql="INSERT INTO item_history (custid,status,date_issue,quantity,item_code,kind) VALUES ('$custid','active','$date_issue_temp','$qty_temp','$item_code_temp','sub')";
	$res=mysql_query($sql) or die("not working");
}
if($res){
header("location:profile.php?custid=".$custid);
}




 	
 	

 	?>