<?php
session_start();
if (empty($_SESSION["employeeid"]))
{
	header("location:main.php");
	
}
else{
    $refid=$_SESSION["refid"];
	
if(empty($_SESSION["custid"]))
{
	header("location:lead.php");

}
else{
	$custid=$_SESSION["custid"];
	include "conn.php";
	$sql="select * from lead where custid='$custid'";
	$res=mysql_query($sql);
	$count=mysql_num_rows($res);
	while($row=mysql_fetch_assoc($res))
	{
		$name1=$row["name1"];
$name2=$row["name2"];
$name3=$row["name3"];
$email1=$row["email1"];
$email2=$row["email2"];
$phone1=$row["phone1"];
$phone2=$row["phone2"];
if(!empty($refid))
{
$address=$row["address"];
$street=$row["street"];
$city=$row["city"];
$state=$row["state"];
$country=$row["country"];
$zipcode=$row["zipcode"];
}		
		
	
	else{
		$address="";
$street="";
$city="";
$state="";
$country="";
$zipcode="";
	
		
	}}
		$sql2="select * from description where custid='$custid'";
	$res2=mysql_query($sql2);
	while($row2=mysql_fetch_assoc($res2))
	{
		
		
$callstatus=$row2["callstatus"];
$timezone=$row2["timezone"];
$currenttime= $row2["currenttime"];
$usatime=$row2["usatime"];
$currentdate=$row2["currentdate"];
$timezone=$row2["timezone"];
$description=$row2["description"];
$calltime=$row2["calltime"];
$calldate=$row2["calldate"];
$employeeid=$row2["employeeid"];
$bound=$row2["bound"];

	}
	$sql3="select * from sales where custid='$custid'and refid='$refid'";
	$res3=mysql_query($sql3);
	while($row3=mysql_fetch_assoc($res3))
	{
		
$salemade=$row3["salemade"];
$saleamount=$row3["saleamount"];
$salepackage=$row3["salepackage"];
$cardtype=$row3["cardtype"];
$cardlast=$row3["cardlast"];
$cardexp=$row3["cardexp"];
$authorisation=$row3["authorisation"];
$computer=$row3["computer"];
$devices=$row3["devices"];
	
			
			
		}
	  	
		

}
}

?>
<!doctype html>
<html>
<head>  <meta charset="utf-8">
 
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<title>form</title>


</head>
<body style=" background:white;
    background-size: 100% 200%;
    background-repeat: no-repeat;">
<div style="position:absolute;left:200px">

<div id= "wb_Text1" style="position:absolute;left:450px;top:9px;width:299px;height:52px;z-index:1;text-align:left;">
<h1>New Lead</h1></div>

<a href="logout.php"class="btn btn-danger" style="position:absolute;left:800px ;width:150px;top:80px">Log out</a><a href="search.php"class="btn btn-success" style="width:150px;position:absolute;top:80px;left:100px">Search</a>
<br>
</div>
<table class="table table-striped table-bordered table-hover table-condensed" style="position:absolute;left:20px;top:118px;width:1300px;height:400px;z-index:3;" id="Table1">
<tr>
<td style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;height:36px;"><div><b>Customer ID:</b><div></td>
<td> <?php echo $custid;?>

<td style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;height:36px;"><div><b>Employee ID:</b></div></td>
<td> <?php echo $employeeid;?></td>
<td style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;height:36px;"><div><b>India/USA Time(EST):</b></div></td>
<td> <?php echo $currenttime."<b>&nbsp/&nbsp</b>".$usatime;?></td>

</tr>
<tr>
<td colspan="6" style="background-color:transparnt;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;height:38px;"><div><h2><b>Lead</b></h2></div>
</td>
</tr>
<tr>
<td style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;width:200px;height:36px;"><div>
<span style="color:#000000;font-family:Arial;font-size:13px;"><b>First Name:</b></span></div>
</td>
<td style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;width:146px;height:36px;"><div>

 <?php echo $name1; ?>
</div>
</td>
<td style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;width:200px;height:36px;"><div>
<span style="color:#000000;font-family:Arial;font-size:13px"><b>Middle Name:</b></span></div>
</td>
<td style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;width:148px;height:36px;"><div>
 <?php echo $name2;?></div>
</td>
<td style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;width:200px;height:36px;"><div>
<span style="color:#000000;font-family:Arial;font-size:13px;"><b>Last Name:</b></span></div>
</td>
<td style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;height:36px;"><div>
 <?php echo $name3;?></div>
</td>
</tr>
<tr>
<td style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;width:146px;height:36px;"><div>
<span style="color:#000000;font-family:Arial;font-size:13px;"><b>E-Mail:</b></span></div>
</td>
<td colspan="2" style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;height:36px;"><div>
<span style="color:#000000;font-family:Arial;font-size:16px;"> <?php echo $email1;?></div>
</td>
<td style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;width:148px;height:36px;"><div>
<span style="color:#000000;font-family:Arial;font-size:13px;"> <b>Alternate E-mail:</b></span></div>
</td>
<td colspan="2" style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;height:36px;"><div>
 <?php echo $email2;?>
</tr>
<tr>
<td style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;width:146px;height:38px;"><div>
<span style="color:#000000;font-family:Arial;font-size:13px;"><b>Phone-Number:</b></span></div>
</td>
<td colspan="2" style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;height:38px;">
<div> <?php echo $phone1;?></div>
</td>
<td style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;width:148px;height:38px;">
<div><span style="color:#000000;font-family:Arial;font-size:13px;"> <b>Alternate Phone-Num:</b></span></div>
</td>
<td colspan="2" style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;height:38px;">
<div> <?php echo $phone2;?></div>
</td>
</tr>

<tr>
<td colspan="6" style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;height:38px;"><div><h2><b>Description</b></h2></div>
</td>
</tr>

<tr>
<td style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;width:146px;height:36px;"colspan="1"><b>Call type:</b><?php echo $bound;?></td>
<td style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;width:146px;height:36px;">
<div><span style="color:#000000;font-family:Arial;font-size:13px;"><b>Call status:</b></span></div>
</td>
<td style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;width:146px;height:36px;">
 <?php echo $callstatus;?></td>
<td colspan="1 "style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;width:148px;height:36px;"><div><span style="color:#000000;font-family:Arial;font-size:13px;"><b>Call Back:</b></span>

<?php echo $calltime.'/'.$calldate;?>
<td style="background-color:transparent;border:1px #C0C0C0 solid;vertical-align:middle;text-align:center;height:36px;"><div><span style="color:#000000;font-family:Arial;font-size:13px;"><b>Time Zone:</b></span>
<?php echo $timezone;?><td> 

</tr>
<tr>
<td colspan="6" style="background-color:transparent;border:1px #C0C0C0 solid;height:100px;">
<p><b>Comment:</b>&nbsp &nbsp<?php echo $description;?><p></td>
</tr>


<tr>
<td colspan="6" style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;height:38px"><div><h2>Sales</h2></div>
</td>
</tr>
<tr>
<td style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;width:200px;height:36px;"><div>
<span style="color:#000000;font-family:Arial;font-size:13px;">Sales Made:</span></div>
</td>
<td style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;width:146px;height:36px;">
<?php echo $salemade;?></td>
<td style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;width:200px;height:36px;"><div>
<span style="color:#000000;font-family:Arial;font-size:13px;">Sales Amount:</span></div>
</td>
<td style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;width:200px;height:36px;">
<?php echo $saleamount;?></td>
<td style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;width:200px;height:36px;"><div>
<span style="color:#000000;font-family:Arial;font-size:13px;">Sales Package:</span></div>
</td>
<td style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;height:36px;">
<?php echo $salepackage;?></td>
</tr>

<tr>
<td style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;width:146px;height:36px;"><div><span style="color:#000000;font-family:Arial;font-size:13px;">Card Type:</span></div>
</td>
<td style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;width:146px;height:36px;"> <?php echo $cardtype;?></td>
<td style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;width:148px;height:36px;"><div><span style="color:#000000;font-family:Arial;font-size:13px;">Card last(4 digit):</span></div>
</td>
<td style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;width:148px;height:36px;"><?php echo $cardlast;?></td>
<td style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;width:148px;height:36px;"><div><span style="color:#000000;font-family:Arial;font-size:13px;">Card exp:</span></div>
</td>
<td style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;height:36px;">
<?php echo $cardexp;?>
	 </td>
</tr>
<tr>
<td style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;height:36px;">Authorisation:
<td style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;height:36px;"><?php echo $authorisation;?>
<td style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;height:36px;">No of Computers:
<td style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;height:36px;"><?php echo $computer;?>
<td style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;height:36px;">Peripherals Devices:
<td style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;height:36px;"><?php echo $devices;?>
</tr>
	 <tr>
<td style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;height:36px;"><div><b>Ref Id:</b><div></td>
<td> <?php echo $refid;?>
</td>
</tr>

<tr>
<td colspan="6" style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;height:38px;"><div><h2><b>Address</b></h2></div>
</td>
</tr>

<tr>
<td style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;width:146px;height:36px;"><div>
<span style="color:#000000;font-family:Arial;font-size:13px;"><b>Address:</b></span></div>
</td>
<td style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;width:146px;height:36px;" colspan="5">
 <?php echo $address;?></td>

</tr>
<tr>
<td style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;width:146px;height:36px;"><div>
<span style="color:#000000;font-family:Arial;font-size:13px;"><b>Street :</b></span></div>
</td>
<td style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;width:146px;height:36px;" colspan="5">
 <?php echo $street;?></td>

</tr>

<tr>
<td style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;width:146px;height:36px;"><div>
<span style="color:#000000;font-family:Arial;font-size:13px;"><b>City:</b></span></div>
</td>
<td style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;width:146px;height:36px;">
 <?php echo $city;?></td>
<td style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;width:148px;height:36px;"><div>
<span style="color:#000000;font-family:Arial;font-size:13px;"><b>State:</b></span></div>
</td>
<td style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;width:148px;height:36px;">

 <?php echo $state;?>	</td>
<td style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;width:148px;height:36px;"><div>
<span style="color:#000000;font-family:Arial;font-size:13px;"><b>Country:</b></span></div>
</td>
<td style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;height:36px;">
 <?php echo $country;?></td>
</tr>
<tr>
<td style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;height:36px;"><div><b>Zip code:</b></div></td>
<td> <?php echo $zipcode;?>
</td>

</tr>
</table>
<a href="new.php" style="position:absolute ;top:1050px;left:500px;width:300px;padding:10px" class="btn btn-primary ">save</a>

</div>
</body>
</html>