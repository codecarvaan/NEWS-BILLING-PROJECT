<?php
session_start();
if (empty($_SESSION["employeeid"]) and  $_SESSION["center"])
{
	header("location:main.php");
	
}
else
{
	
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



$custid=time();
$employeeid=$_SESSION["employeeid"];
$name1=$_POST["name1"];
$name2=$_POST["name2"];
$name3=$_POST["name3"];
$email1=$_POST["email1"];
$email2=$_POST["email2"];
$phone1=$_POST["phone1"];
$phone2=$_POST["phone2"];
$address=$_POST["address"];
$street=$_POST["street"];
$city=$_POST["city"];
$state=$_POST["state"];
$country=$_POST["country"];
$zipcode=$_POST["zipcode"];
$callstatus=$_POST["callstatus"];
$datetime=$_POST["timezone"];
include "conn.php";
$currentdate=date("d/m/y");
$timezone=$_POST["timezone"];
$description=$_POST["description"];
$calltime=$_POST["time1"];
$calldate=$_POST["time2"];
$salemade=$_POST["salemade"];
$saleamount=$_POST["saleamount"];
$authorisation=$_POST["authorisation"];
$salepackage=$_POST["salepackage"];
$computer=$_POST["computer"];
$devices=$_POST["devices"];
$cardtype=$_POST["cardtype"];
$cardlast=$_POST["cardlast"];
$cardexp=$_POST["exp1"]. "/" .$_POST["exp2"];
$employeeid=$_SESSION["employeeid"];
$date=date("dmy");
$yes="yes";
$bound=$_POST["bound"];
$centerid=$_SESSION["center"];
if(empty($name1))
{
	
	
}
if ($salemade=="yes")
{
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
$refid=ZI.$employeeid.$date.$b;
}

$sql="INSERT INTO lead ".
       "(centerid,name1,name2,name3,phone1,phone2,email1,email2,address,street,city,state,country,zipcode,custid,employeeid,currenttime,usatime,currentdate) ".
       "VALUES ".
       "('$centerid','$name1','$name2','$name3','$phone1','$phone2','$email1','$email2','$address','$street','$city','$state','$country','$zipcode','$custid','$employeeid','$currenttime','$usatime','$currentdate')";
$res=mysql_query($sql);
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
		  
	if($res and $res2 and $res3)
	{
		$_SESSION["custid"]=$custid;
		$_SESSION["refid"]=$refid;
		
		header("location:description2.php");
		
	}		  
}

?>

