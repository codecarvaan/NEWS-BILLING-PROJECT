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


	include "conn.php";
$id2=$_GET["id2"];
$sql="select * from employee where id2='$id2'";
$res=mysql_query($sql);
$_SESSION["id2"]=$id2;
while($row=mysql_fetch_assoc($res))
{
	$userid=$row["userid"];
	$password=$row["password"];
	$role=$row["role"];
	$name=$row["name"];
	$email=$row["email"];
	$phone=$row["phone"];
	$employeeid=$row["employeeid"];
	$centerid=$row["centerid"];
	
	
}	

}
?>
<body >
 <div class="content-wrapper">
        <div class="container">
              <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Employee Update</h1>
                    </div>
                </div>





<div class="table-responsive">
 <div class="col-md-6">
<form action="update1.php?id2=<?php echo $id2;?>" method="post">
<table  class="table table-striped table-bordered table-hover">
<tr>
<td><b>Name:</b></td><td> <input type="text" name="name1" value="<?php echo $name;?>" style="padding:5px;width:100%" ></td>

</tr> <tr><td><b>Phone:</td></b><td><input style="padding:5px;width:100%" type="text" name="phone1" value="<?php echo $phone;?>"></td>
</tr><tr>
<td><b>E-mail:</b></td><td><input style="padding:5px;width:100%" type="email" name ="email1" value="<?php echo $email;?>"></td>
</tr><tr><td><b>User-ID:</b></td><td><input  style="padding:5px ;width:100%"type="text" name="userid1" value="<?php echo $userid;?>"></td>
</tr><tr><td><b>	Password</b></td><td><input style="padding:5px ;width:100%"  type="text" name="password" value="<?php echo $password;?>"></td>
</tr><tr><td><b>Role:</b></td><td><select name="role1" style="padding:5px ;width:100%">
<option value="Resolver">Resolver</option>
<option value="Tech Sales Associate">Tech Sales Associate</option>  
<option value="Sr.Tech Sales Associate">Sr.Tech Sales Associate</option>
</select></td></tr>
<tr><td><b>Employee ID:</td></b><td><input style="padding:5px ;width:100%" type="text" name="employeeid1" value="<?php echo $employeeid;?>"></td></tr>
<tr><td><b>Center ID:</td></b>
<td>
<select style="padding:5px ;width:100%"  name="centerid1" >
<?php  if($_SESSION["admin"]==2)
{ ?>
<option value="<?php echo $centerid;?>"><?php echo $centerid;?> </option>
<?php
$sql3="select * from center ";
$res3=mysql_query($sql3);
while($row3=mysql_fetch_assoc($res3))
{
$ceid=$row3["centerid"];
if($ceid!=$centerid)
{
	echo '<option value="'.$ceid.'">'.$ceid.'</option>'; 
}
}

}
else 
{
	 echo '<option value="'.$centerid.'">'.$centerid.'</option>'; 
}

?>

</select>


</td></tr>
<tr><td colspan=2 style="text-align:center">
<button style="padding:5px;width:100%"  type="submit" class="btn btn-success" >Update</button></td></tr></table></div>

</div>
</form>

</div>
</div>
<?php
include "footer.php";
?>

