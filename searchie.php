<?php 
session_start();
include "conn.php";
if(empty($_SESSION["employeeid"]))
{
	header("location:main.php");
}
else
	
{
	?>
	
<?php
if($_SESSION["admin"]==(1 or 2))
{

include 'headeradmin.php';
}
else{
	include 'header.php';
}



?>
<body >
 <div class="content-wrapper">
        <div class="container">
              <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">SEARCH RESULT</h1>
                    </div>
                </div>
<?php 

include "conn.php";
if(empty($_SESSION["employeeid"]))
{
	header("location:main.php");
}
else
{	$count="";
	$name= $_POST["name"];	
      $phone=$_POST["phone"];
	  $email=$_POST["email"];
	  $refid=$_POST["refid"];
	  $custid=$_POST["custid"];
	  $centerid=$_SESSION["center"];
	   $admin=$_SESSION["admin"];
	 
	if(!empty($name))
	{
		echo '<ol type="1">';
		if($admin==2){
			$sql="select * FROM lead WHERE  name1 ='$name' OR name2 ='$name' or name3='$name'  order by id desc "; 
		}
		else
		{
			$sql="select * FROM lead WHERE   centerid='$centerid' and (name1 ='$name' OR name2 ='$name' or name3='$name')  order by id desc "; 
		}
		
		$res=mysql_query($sql);
		$count=mysql_num_rows($res);
		while($row=mysql_fetch_assoc($res))
		{
			$custid=$row["custid"];
			$fname=$row["name1"];
			$mname=$row["name2"];
			$lname=$row["name3"];
			$phone1=$row["phone1"];
			echo '<li style="font-size:20px"><a class="btn btn-danger" href="profile.php?custid='.$custid.'">&nbsp  Name:&nbsp '.$fname .'&nbsp'.$mname.'&nbsp'.$lname.' <br> Phone-num:&nbsp '.$phone1.'</a></li><br>'; 
			
	}	
	echo '</ol>';
}	
if(!empty($phone) and empty($custid)and empty($name) and empty($email) and empty($refid))
	{
		echo '<ol type="1">';
		if($admin==2){
		 $sql1="select * FROM lead WHERE  phone1 ='$phone' OR phone2 ='$phone'   order by id desc ";}
		else{
		$sql1="select * FROM lead WHERE  centerid='$centerid' and ( phone1 ='$phone' OR phone2 ='$phone')    order by id desc ";
		}
		$res1=mysql_query($sql1);
		$count=mysql_num_rows($res1);
		while($row1=mysql_fetch_assoc($res1))
		{
			$custid=$row1["custid"];
			$fname=$row1["name1"];
			$mname=$row1["name2"];
			$lname=$row1["name3"];
			$phone1=$row1["phone1"];
			echo '<li style="font-size:20px"><a class="btn btn-danger" href="profile.php?custid='.$custid.'">&nbsp  Name:&nbsp '.$fname .'&nbsp'.$mname.'&nbsp'.$lname.' <br> Phone-num:&nbsp '.$phone1.'</a></li><br>'; 
			
	}	
	echo '</ol>';
}
if(!empty($email) and empty($custid)and empty($name) and empty($phone) and empty($refid))
	{
		echo '<ol type="1">';
		if($admin==2){
		$sql1="select * FROM lead WHERE  email1 ='$email' OR email2 ='$email'   order by id desc "; 
		}else{
			$sql1="select * FROM lead WHERE  centerid='$centerid' and (email1 ='$email' OR email2 ='$email' )  order by id desc "; 
		}
		$res1=mysql_query($sql1);
		$count=mysql_num_rows($res1);
		
		
		while($row1=mysql_fetch_assoc($res1))
		{
			$custid=$row1["custid"];
			$fname=$row1["name1"];
			$mname=$row1["name2"];
			$lname=$row1["name3"];
			$phone1=$row1["phone1"];
			echo '<li style="font-size:20px"><a class="btn btn-danger" href="profile.php?custid='.$custid.'">&nbsp Name:&nbsp '.$fname .'&nbsp'.$mname.'&nbsp'.$lname.' <br> Phone-num:&nbsp '.$phone1.'</a></li><br>'; 
			
		}
	}

if(!empty($refid )and empty($custid)and empty($name) and empty($phone) and empty($email))
	{
		echo '<ol type="1">';
		if($admin==2)
		{
		$sql="select * FROM sales WHERE  refid = '$refid'    "; 
		}
		else
		{$sql="select * FROM sales WHERE centerid='$centerid' and  refid = '$refid'   "; }
	$res=mysql_query($sql);
	    
		while($row=mysql_fetch_assoc($res))
		{    $custid=$row["custid"];
			header("location:profile.php?custid='.$custid.'");
			
		}	
	
	}
if(!empty($custid) and empty($refid)and empty($name) and empty($phone) and empty($email))
	{
		echo '<ol type="1">';
		if($admin==2){
		$sql="select * FROM lead WHERE  custid='$custid' "; }
		else
		{
			$sql="select * FROM lead WHERE  custid='$custid'  and centerid='$centerid'";
		}
		$res=mysql_query($sql);
		$count=mysql_num_rows($res);
		while($row=mysql_fetch_assoc($res))
		{
			$custid=$row["custid"];
			$fname=$row["name1"];
			$mname=$row["name2"];
			$lname=$row["name3"];
			$phone1=$row["phone1"];
			echo '<li style="font-size:20px"><a class="btn btn-danger" href="profile.php?custid='.$custid.'">&nbsp  Name:&nbsp '.$fname .'&nbsp'.$mname.'&nbsp'.$lname.' <br> Phone-num:&nbsp '.$phone1.'</a></li><br>'; 
			
	}	
	echo '</ol>';
}
if($count==0){
			echo '<B style="font-size:25px;;left:600px">NO RESULT FOUND</B>';
}}}
echo'</div></div>';
INCLUDE 'footer.php';
?>	




	