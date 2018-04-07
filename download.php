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

<div class="content-wrapper">
        <div class="container">
              <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">REPORTS</h1>
                    </div></div>
					<div class="col-md-6"><label style="font-size:18px">&nbsp &nbsp Select center: &nbsp &nbsp </label>
								
                                <form action="" method="post">
								&nbsp &nbsp <select style="padding:5px "  name="centerid" >
<?php  if($_SESSION["admin"]==2)
{ 


$sql3="select * from center ";
$res3=mysql_query($sql3);
while($row3=mysql_fetch_assoc($res3))
{
$ceid=$row3["centerid"];

	echo '<option value="'.$ceid.'">'.$ceid.'</option>'; 
}
}


if($_SESSION["admin"]==1)
{
	 echo '<option value="'.$_SESSION["center"].'">'.$_SESSION["center"].'</option>'; 
}

?>

</select>
<?php 
if($_SESSION["admin"]==2)
{ 
echo '<button type="submit" class ="btn btn-info " >select</button>';}?>          
 </form>
					</div>
					</div>	
    
<div id="body">
	

	<table class="table table-striped table-bordered table-hover table-condensed"style="width:1000px ;margin-left:250px;margin-top:60px">
    
    <tr>
    <td>Date</td>
	<td>No of Sales </td>
    <td>Sale Made</td>
    <td>Net Sale Amount</td>
    <td> Sale not made</td>
	<td>Downlaod excel<td>
    </tr>
	
	<?php
	if($_SESSION["admin"]==1)
{
$centerid=$_SESSION["center"];
}
if($_SESSION["admin"]==2)
{
	if (isset($_POST['value']))    
{    
          $centerid=$_POST["centerid"]; 
}  
	$centerid=$_POST["centerid"];
}
	$sql1="select distinct currentdate from description  order by number desc";
			 $res1=mysql_query($sql1);
			 while($row1=mysql_fetch_assoc($res1))
			 {	$yes="yes";
				 $date=$row1["currentdate"];
				
				$sql2="select * from sales where currentdate='$date'  ";
				$res2=mysql_query($sql2);
				$count2=0;
				while($row2=mysql_fetch_assoc($res2))
				{
					  
						$empid=$row2["employeeid"];
						$sql4="select * from employee where employeeid='$empid' and centerid='$centerid'";
						$res4=mysql_query($sql4);
						$count4=mysql_num_rows($res4);
						
						$sql42="select * from admin where employeeid='$empid' and centerid='$centerid'";
						$res42=mysql_query($sql42);
						$count42=mysql_num_rows($res42);
					if( ($count4+$count42)>0)
						{	
							$count2++;
						}
				}
				 
				$sql3="select * from sales where currentdate='$date' and salemade='$yes'  order by number desc ";
				$res3=mysql_query($sql3);
				$count3="";
				$b="";
				$amount="";
				while($row3=mysql_fetch_assoc($res3))
					
					{    
						$empid2=$row3["employeeid"];
						$sql5="select * from employee where employeeid='$empid2' and centerid='$centerid'";
						$res5=mysql_query($sql5);
					         $count5=mysql_num_rows($res5);
						
						$sql6="select * from admin where employeeid='$empid2' and centerid='$centerid'";
						$res6=mysql_query($sql6);
						$count6=mysql_num_rows($res6);
						
						if( ($count5+$count6)>0)
						{	
					$count3++;
				$amount=$b+$row3["saleamount"];
					$b=$amount;
						}
					}
				echo '<tr>
					<td>'.$date.'</td>
					<td>'.$count2.'</td>
					<td>'.$count3.'</td>
					<td>'.$amount.'</td>
					<td> '.($count2-$count3).'</td>
					<td><a href="excel.php?id='.$date.' &centerid='.$centerid.'">Downlaod excel</a><td>
				</tr>';
				
				
				 
			 }
			 
			 echo '</table>
				
		';
}
?>
<?php 

include 'footer.php';
?>