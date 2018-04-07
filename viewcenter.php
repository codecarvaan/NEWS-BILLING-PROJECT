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
<?php
	$centerid=$_GET["id"];
	$sql1="SELECT * FROM center where centerid='$centerid'";
	$result_set1=mysql_query($sql1);
	while($row1=mysql_fetch_array($result_set1))
	{
$center=$row1["address"];
     
	}
	?>
<body >
 <div class="content-wrapper">
        <div class="container">
              <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">CENTER:&nbsp &nbsp &nbsp<?php echo $center;?> </h1>
                    </div>
                </div>


	<table class="table table-striped table-bordered table-hover">
    
    <th colspan="5"><label><a href="center.php"> LIST CENTERS</a></label></th>
    
    <tr>
    <td>NAME</td>
    <td>EMAIL</td>
    <td>PHONE NO</td>
    <td>EMPLOYEE ID</td>
	<td>view </td>
    </tr>
    <?php
	$centerid=$_GET["id"];
	$sql="SELECT * FROM employee where centerid='$centerid'";
	$result_set=mysql_query($sql);
	while($row=mysql_fetch_array($result_set))
	{

      

		echo '
        <tr>
        <td>'.$row['name'].'</td>
        <td>' .$row['email'].'</td>
        <td>' .$row['phone'].'</td>
		<td>' .$row['employeeid'].'</td>
        <td><a href="update.php?id2=' .$row['id2'].'" >view </a></td>
		  
        </tr>';
    
	}
	?>
    </table>
    
</div>
</div>
<?php
include "footer.php";}
?> 
