<!DOCTYPE HTML>

	
<?php
include 'header.php';
include "conn.php";
include "function.php";



$search_text=" ";
$search_order="id";
$date_from="";
$date_to="";

if(isset($_POST['search_text'])) {
   $search_text=$_POST["search_text"];
}
if(isset($_POST['search_order'])) {
  $search_order=$_POST["search_order"];
}
if(isset($_POST['date_from'])) {
   $date_from=dateformat($_POST["date_from"]);
}
if(isset($_POST["date_to"])) {
   $date_to=dateformat($_POST["date_to"]);
}
echo $date_from;
$sql="select * from user where ((NAME LIKE  '%".$search_text."%') or (CODE like '%".$search_text."%') or (AREA_CODE like '%".$search_text."%'))  ORDER BY ".$search_order." asc ";

$res=mysql_query($sql);
	?>





<form action="" method="post">
  <div class="content-wrapper">
        <div class="container">
              <div class="row">
                    <div class="col-md-14">
                        <h1 class="page-head-line">search</h1>
                    </div>
                </div>
				<div class="row">
					<div class="col-xs-12">
						<div class="panel panel-success">
                    

                    		<div class="panel-heading" style="height:60px;" >
                         
                    			<center>
                        	<label style="float:left;margin:5px;width:80px">Search Text </label>
                        	<input type="text" name="search_text" class="form-control" style="float:left;width:200px;margin:5px" >
                        	<label style="float:left;margin:5px;width:60px">Order By  </label>
                        	<select   name="search_order" class="form-control" style="float:left;width:120px;margin:5px;">
                        	<option value="NAME">Alphabetical</option>
                        	<option value="CODE"> Client ID</option>
                        	<option value="AC_OP_DT">Acount Opening Date</option>
                        	<option value="OPENING">Opening Balance</option>
                        	<option value="CLOSING">Closing Balance</option>
                      	  	<option value="AREA_CODE">Area Code</option>
                        	</select>
                        	<label style="float:left;margin:5px;width:70px">Date From</label>
                        	<input type="date" name="date_from"class="form-control" style="float:left;width:150px;margin:5px">
                        	<label style="float:left;margin:5px;width:60px">Date To</label>
                        	<input type="date" name="date_to"class="form-control" style="float:left;width:150px;margin:5px">
                        	<button type="submit" class="btn btn-info" style="float:left;width:120px;margin:5px">
						      <span class="glyphicon glyphicon-search"></span> Search
						    </button>
						 	</center>
                    		</div>

                    		<div class="panel-body">
                        		<table class="table table-striped table-bordered table-hover "  >
									
									<tr>
									<td id="tdstyle"><b>Sr.No</b></td>
									<td id="tdstyle"><b>Customer ID</b></td>
									<td id="tdstyle"><b>Customer Name</b></td>
									<td id="tdstyle"><b>Acc_Op_Date </b></td>
									<td id="tdstyle"><b>Opening Balance</b></td>
									<td id="tdstyle"><b>Closing Balance</b></td>
									<td id="tdstyle"><b>Area Code</b></td>
									<td id="tdstyle"><b>Area Name </b></td>
									<td id="tdstyle"><b>View </b></td>
									</tr>

									<?php
									while($row=mysql_fetch_assoc($res))
									{
						              echo '<tr><td id="tdstyle">'.$row["id"].'</td>
						 			<td id="tdstyle">'.$row["CODE"].'</td>
									<td id="tdstyle">'.$row["NAME"].'</td>
									<td id="tdstyle">'.$row["AC_OP_DT"].'</td>
									<td id="tdstyle">'.$row["OPENING"].'</td>
									<td id="tdstyle">'.$row["CLOSING"].'</td>
									<td id="tdstyle">'.$row["AREA_CODE"].'</td>
									<td id="tdstyle">'.return_area($row["AREA_CODE"])["NAME"].'</td>
									<td id="tdstyle"><a href="profile.php?custid='.$row["id"].'">View</td>
									</tr>';

										}
									?>

								</table>
                    		</div>
                    		<div class="panel-footer text-muted">
                   	 
                    		</div>
                		</div>
					</div>
					</div>
				</div>
</div>
<?php 

include 'footer.php';
?>