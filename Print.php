<?php
include 'header.php';
include "function.php";
session_start();
?>


<meta charset="utf-8">

 <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
 <script type="text/javascript" src="ajax/ajax_func.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script >
  $().ready(function() {


    $('#clicker').click(function() {
        $('.dis').each(function() {
            if ($(this).attr('disabled')) {
                $(this).removeAttr('disabled');
            }
            else {
                $(this).attr({
                    'disabled': 'disabled'
                });
            }
        });
    });
});
  </script>

<title>form</title>



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
 

}

input{
padding:3px;
width:100%;
margin:0px;
border: 1px solid;
background-color:#E0E0E0;
text-align: center;
}
#select_aj{
padding:3px;
width:100%;

margin:0px;
text-align: center;
background-color:white;
}
select:not([disabled]){
  padding:3px;
  width:100%;
  margin:0px;
  text-align: center;
  background-color:#E0E0E0;
  background-color:#E0E0E0;
}

input[type="text"][disabled] {
   background-color:#f9f9f9;
   border: 0px solid;
}
select[disabled]
{
   background-color:#f9f9f9;
   border: 0px solid;
}

input[type="date"] {
   border: 1px solid #c4c4c4;
  border-radius: 5px;
  background-color: #fff;
  padding:0px;
  box-shadow: inset 0 3px 6px rgba(0,0,0,0.1);
  width:100%;
}
select{
   border: 1px solid #c4c4c4;
  border-radius: 5px;
  background-color: #fff;
  padding: 3px 5px;
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
#update_but:not([disabled]){

    background-color: #4CAF50;
    border: none;
    color: #FFFFFF;
    text-align: center;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    text-decoration: none;
    overflow: hidden;
    cursor: pointer;

}

</style>
<style>
.dropdown {
    position: relative;
    display: inline;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 300px;
    box-shadow: p 8px 16px 0px rgba(0.2,0.2,0.2,0.2);
    border:1px solid black;
    padding: 12px 16px;
    z-index: 1;
    left: -300px;
   float: left
}

.dropdown:hover .dropdown-content {
    display: block;
}
</style>
 

<?php


class print { 
    public $usercode = ''; 
    public $date_from = ''; 
    public $date_to = ''; 
    }
//$_SESSION["print"][0] = "green";
if(isset($_POST[]))
?>

  <div class="content-wrapper">
        <div class="container">
              <div class="row">
                    <div class="col-md-14">
                        <h1 class="page-head-line">PRINT</h1>
                    </div>
                </div>
    <div class="row">
      <div class="col-xs-12">
          <div class="panel panel-success">
          <div class="panel-heading" style="height:60px;" >
            <center>
             <form action="Print.php?#tab" method="post">        
             
             <label style="float:left;margin: 5px">Select</label>
             <input type="text" name="user_code" class="form-control" style="float:left;width:300px;margin:5px" placeholder="Select bill">

             <label style="float:left;margin:5px">From</label>
             <input type="date" name="date_from" class="form-control" style="float:left;width:200px;margin:5px">

             <label style="float:left;margin:5px">To</label>
             <input type="date" name="date_to" class="form-control" style="float:left;width:200px;margin:5px">

             
             <BUTTON type="submit" class="btn btn-danger" style="float:left;margin:5px;width:200px" class="form-control"><span class="glyphicon glyphicon-ok">ADD </span></BUTTON>
            </form>
           </center>                  
          </div>
	
<div class="panel-body">
<form action="update_item.php" method="post">
<table class="table table-striped table-bordered table-hover"  id="tab" >
<tr>
 <td id="tdstyle" style="width:1%"><b>S.No.</b></td> 
<td id="tdstyle"><b>USer Code</b></td>
<td id="tdstyle"><b>User Name</b></td>
<td id="tdstyle"><b>Date (From)</b></td>
<td id="tdstyle"><b>Date (To)</b></td>
<td id="tdstyle"><b>Print</b></td>
<td id="tdstyle"><b>Remove</b></td>
</tr>
</table>
    </form>
</div>
                       
                     
                