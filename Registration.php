<?php
include 'header.php';
include "function.php";

?>


<meta charset="utf-8">

 <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
 <script type="text/javascript" src="ajax/ajax_func.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>

<title>New Registration</title>



</head>
<style>
#tdstyle { 
	background-color:transparent;
	border:1px #C0C0C0 solid;
	text-align:center;
	vertical-align:middle;
	padding:3px;
  width:10%;
	font-size: 100%;
  height:30px;
 

}




input {
   border: 1px solid #c4c4c4;
  border-radius: 3px;
  background-color: white;
  padding:5px;
  box-shadow: inset 0 3px 6px rgba(0,0,0,0.1);
  width:100%;

}
select{
   border: 1px solid #c4c4c4;
  border-radius: 3px;
  background-color: white;
  padding:5px;
  box-shadow: inset 0 3px 6px rgba(0,0,0,0.1);
  width:100%;
}
th{
	background-color:transparent;
  border:1px #C0C0C0 solid;
  text-align:center;
  vertical-align:middle;
  padding:5px;
  font-size: 150%;
}
.table{
	
	margin-bottom:0px;
	background-color:#f9f9f9;
	 table-layout:fixed;
  width: 100%;
}


</style>
<style>





</style>



  <div class="content-wrapper">
        <div class="container">
              <div class="row">
                    <div class="col-md-14">
                        <h1 class="page-head-line">New Registartion</h1>
                    </div>
                </div>
    <div class="row">
      <div class="col-xs-12">
          <div class="panel panel-success">
          
	
<div class="panel-body">
<form action="new_registartion.php" method="POST">
  
  
<table class="table table-striped table-bordered table-hover "  >
<tr ><th colspan="10" >User Details</th></tr>
<tr>
<td id="tdstyle"><b>Customer ID</b></td>
<td id="tdstyle">Not issued</td>

<td id="tdstyle"><b>NAME</b></td>
<td id="tdstyle"><input type="text" name="NAME" required></td>
<td id="tdstyle"><b>Phone 1</b></td>
<td id="tdstyle"><input type="text" name="PHONE1" required></td>
<td id="tdstyle"><b>Phone 2</b></td>
<td id="tdstyle"><input type="text" name="PHONE2" ></td>
<td id="tdstyle"><b>Email-ID:</b></td>
<td id="tdstyle"><input type="text" name="E_MAIL_NO" ></td>
</tr>
<tr>
<td id="tdstyle"><b>Verification Type</b></td>
<td id="tdstyle"><input type="text" name="VARIFY_TYPE" ></td>
<td id="tdstyle" colspan="2"><b>Verification Number</b></td>
<td id="tdstyle" ><input type="text" name="VARIFY_NUM" ></td>
<td  colspan="5"></td>
</tr>
</table>

<br>
<table class="table table-striped table-bordered table-hover "  >
<tr ><th colspan="10" >Address</th></tr>
<td id="tdstyle"><b>Address</b></td>
<td colspan="3"><input type="text" name="ADD1" required></td>
<td id="tdstyle"><b>Area/Area-Code</b></td>
<td id="tdstyle" colspan="2"><select name="Area_Code" required>
                  <?php select_Area();?>
                  </td>

<td id="tdstyle"><b>City/City-Code</b></td>
<td id="tdstyle" colspan="2"><select name="City_Code" required>
                  <?php select_City();?>
                  </td>
</tr>

</table><br>

  
<table class="table table-striped table-bordered table-hover "  >
<tr ><th colspan="10" >Account </th></tr>
<tr>
<td id="tdstyle" ><b>Account Opening Date</b></td>
<td id="tdstyle" colspan="2"><input type="date" name="Opening_date" ></td>

<td id="tdstyle"><b>Opening Balance</b></td>
<td id="tdstyle"><input type="number" name="opening_bal" value="0" ></td>

<td id="tdstyle"><b>Closing Balance</b></td>
<td id="tdstyle"><input type="number" name="closing_bal" value="0" ></td>

<td id="tdstyle"><b>Charges</b></td>
<td id="tdstyle"><input type="number" name="charges" value="0" ></td>

</tr>
</table>
<br>
 <div><button class="btn btn-info" style="width:100%">Submit</button> </div>  
 </form>
</div>
                       
                     
                