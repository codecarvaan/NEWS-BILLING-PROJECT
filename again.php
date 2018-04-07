<?php
session_start();
if (empty($_SESSION["employeeid"]))
{
	header("location:main.php");
	
}
else{
	
if (function_exists('date_default_timezone_set'))
{
  date_default_timezone_set('America/New_York');
}

$usatime =date('h-i-sa');



	if (function_exists('date_default_timezone_set'))
{
  date_default_timezone_set('Asia/Kolkata');
}

$currenttime =date('h-i-sa');
if (function_exists('date_default_timezone_set'))
{
  date_default_timezone_set('Asia/Kolkata');
}

$currendate =date('d/m/y');

echo "<br><br>";

	include "conn.php";
	$employeeid=$_SESSION["employeeid"];
	$date=date("dmy");
	$currentdate=date("d/m/y");
   $custid=$_GET["custid"];
   $bound=$_POST["bound"];
    $callstatus=$_POST["callstatus"];
	$calldate=$_POST["time2"];
	$calltime=$_POST["time1"];
	$timezone=$_POST["timezone"];
	$description=$_POST["description"];
    $salemade=$_POST["salemade"];
	$saleamount=$_POST["saleamount"];
	$salepackage=$_POST["salepackage"];
    $devices=$_POST["devices"];
    $cardtype=$_POST["cardtype"];
    $cardlast=$_POST["cardlast"];
	$computer=$_POST["computer"];
	$cardexp=$_POST["exp1"]. "/" .$_POST["exp2"];
   		   $authorisation=$_POST["authorisation"];	
		  if ($salemade=="yes")
			   
{
	$yes="yes";
	$sql4="select * from sales where salemade='$yes' and currentdate='$currentdate'";
	$res4=mysql_query($sql4);
	$count3=mysql_num_rows($res4);
	$count4=$count3+1;
if ($count4>9)
{
	$b= '0'.$count4;
}
else
{
	$b= '00'.$count4; 
}
$refid='ZI'.$employeeid.$date.$b;
}
$sql2="INSERT INTO description ".
	      "(custid,refid,employeeid,callstatus,calldate,calltime,timezone,description,currenttime,usatime,currentdate,bound)".
		  "VALUES".
		  "('$custid','$refid','$employeeid','$callstatus','$calldate','$calltime','$timezone','$description','$currenttime','$usatime','$currentdate','$bound')";
		  $res2=mysql_query($sql2);


		  
$sql3="INSERT INTO sales".
	      "(custid,refid,employeeid,salemade,saleamount,salepackage,cardtype,cardlast,cardexp,currenttime,currentdate,usatime,authorisation,computer,devices )".
		  "VALUES".
		  "('$custid','$refid','$employeeid','$salemade','$saleamount','$salepackage','$cardtype','$cardlast','$cardexp','$currenttime','$currentdate','$usatime','$authorisation','$computer','$devices')";
$res3=mysql_query($sql3);
if($res2 and $res3)
{
	header("location:profile.php?custid=$custid");
}

}
?>