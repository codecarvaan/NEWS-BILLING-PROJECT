<?php 

session_start();
if($_SESSION["admin"]==(1 or 2) and $_SESSION["employeeid"])
	
{
	if($_SESSION["admin"]==(1 or 2) )
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
                        <h1 class="page-head-line">Center </h1>
                    </div>
                </div>
				

       <div class="container">
    <div class="row">
	<form action="centernew.php" method="post">
        <div class="col-xs-6">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                           Create Center
                        </div>
                        <div class="panel-body">
                      
  <div class="form-group">
    <label for="exampleInputEmail1">Center ID</label>
    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Center-ID" name="centerid"/>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Address</label>
    <input type="text" class="form-control" placeholder="Address" name="address"/>
  </div>
  <div class="form-group">
   
    <input type="submit" class="btn btn-alert"  />
  </div>
</div></div>
</form>
	</div>
    
	<div class="col-xs-6">
<table class="table table-striped table-bordered table-hover table-condensed">
    <tr>
    <th colspan="6"><label><a href="center.php">Center list</a></label></th>
    </tr>
    <tr>

    <td>Center-ID:</td>
    <td>status:</td>
	<td>Address:</td>
    <td>View</td>
	<td>Remove</td>
    </tr>
	<?php 
	if (isset($_GET['error']))
{

	if ($_GET["error"]==404)
	{
echo '<div class="alert alert-danger"><strong>Danger!</strong> You are not authorized to create center <br>contact  Super admin !!</div>';}}
	?>
    <?php
	include "conn.php";
	$centerid=$_SESSION["center"];
	if($_SESSION["admin"]==1)
	{
		
	$sql="SELECT * FROM center where centerid='$centerid'";
	$result_set=mysql_query($sql);
	}
	if($_SESSION["admin"]==2)
	{
		$sql="SELECT * FROM center";
	$result_set=mysql_query($sql);
	}
	
	while($row=mysql_fetch_array($result_set))
	{
		$text = $row['address'];
$newtext = wordwrap($text,80, "\n", true);
$status=$row["status"];
$id=$row["id"];

		?>
        <tr>

		<td><?php echo $row['centerid'] ;echo '</td>
		 <td><a href="centerstatus.php?id='.$id.'">';?><?php echo $status?></a></td>
        <td><div style="width:200px"><?php echo $newtext; ?></div></td>
        <td><a href="viewcenter.php?id=<?php echo $row['centerid'] ?>" >view</a></td>
			
       
		        <td><a href="removecenter.php?id=<?php echo $row['id'] ?>" >Remove</a></td>
        </tr>
        <?php
	}
	?>
    </table>
        </div>
    </div>
</div>
</div>
</div>


	<?php
}
else{
	header("location:search.php");
}

?>
<?php 

include 'footer.php';
?>