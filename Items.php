<?php
include 'header.php';
include "function.php";

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



  <div class="content-wrapper">
        <div class="container">
              <div class="row">
                    <div class="col-md-14">
                        <h1 class="page-head-line">ITEM</h1>
                    </div>
                </div>
    <div class="row">
      <div class="col-xs-12">
          <div class="panel panel-success">
          <div class="panel-heading" style="height:60px;" >
            <center>
             <form action="update_item.php" method="post">        
             <label style="float:left;width:150px;margin:5px">Number of New Items</label>
             <input type="number" name="num_add" class="form-control" style="float:left;width:150px;margin:5px" min=1 max= 10 placeholder="NO of New ITEM">
             <BUTTON type="submit" class="btn btn-danger" style="float:left;margin:5px" class="form-control"><span class="glyphicon glyphicon-ok">ADD </span></BUTTON>
            </form>
           </center>                  
          </div>
	
<div class="panel-body">
<form action="update_item.php" method="post">
<table class="table table-striped table-bordered table-hover"   >
<tr><th colspan="17" > <BUTTON type="submit" style="margin-right:-100px"  disabled id="update_but"><span class="glyphicon glyphicon-ok">UPDATE ITEM LIST</span></BUTTON></th></tr>
<tr>
 <td id="tdstyle"><b>CHECK</b></td> 
<td id="tdstyle"><b>ITEM CODE</b></td>
<td id="tdstyle" colspan="2"><b>ITEM NAME</b></td>
<td id="tdstyle"><b>ITEM TYPE</b></td>
<td id="tdstyle"><b>EDITION TYPE</b></td>
<td id="tdstyle"><b>EDITION NAME</b></td>
<td id="tdstyle" colspan="5">
  <table class="table table-striped table-bordered table-hover " >
    <td colspan="8"><b> RATE</b></td>
    <tr>
      <td id="tdstyle">Extra Rate</td>
      <td id="tdstyle">Mon</td>
      <td id="tdstyle">Tue</td>
      <td id="tdstyle">Wed</td>
      <td id="tdstyle">Thu</td>
      <td id="tdstyle">Fri</td>
      <td id="tdstyle">Sat</td>
      <td id="tdstyle">Sun</td>

    </tr>
  </table>
</td>
<td id="tdstyle" ><b>PAGES</b></td>
<td id="tdstyle" ><b>REMARKS</b></td>
<td id="tdstyle" ><b>PHONE</b></td>
<td id="tdstyle" ><b>E-MAIL</b></td>
<td id="tdstyle" ><b>ACTION</b></td>

</tr>
<?php
      $sql="select * from item order by id asc";
      $res=mysql_query($sql);
      while($row=mysql_fetch_assoc($res))
      {
        $id=$row["id"];
        echo '<tr id="'.$id.'">
              <td><input type="checkbox" onchange="change_dis(this.id,this)" id="'.$id.'" ><input type="hidden" id="hid_'.$id.'" name="id[]" value="'.$id.'" disabled> </td> 
                <td id="tdstyle"><input type="text" name="CODE[]" value="'.$row["ITEM_CODE"].' " class="dis"  disabled id="CODE_'.$id.'"></td>
                <td id="tdstyle" colspan="2"><input type="text" name="NAME[]" value="'.$row["ITEM_NAME"].' " class="dis" disabled id="NAME_'.$id.'"></td>
                <td id="tdstyle"><input type="text" name="ITEM_TYPE[]" value="'.$row["ITEM_TYPE"].' " class="dis" disabled id="ITEMTYPE_'.$id.'"></td>
               <td id="tdstyle"><input type="text" name="EDIT_TYPE[]" value="'.$row["EDIT_TYPE"].' " class="dis" disabled id="EDITTYPE_'.$id.'"></td>
                <td id="tdstyle"><input type="text" name="EDIT_NAME[]" value="'.$row["EDIT_NAME"].' " class="dis" disabled id="EDITNAME_'.$id.'"></td>
                <td id="tdstyle" colspan="5">
                  <table class="table table-striped table-bordered table-hover " >
                    
                    <tr>
                      <td id="tdstyle"><input type="text" name="RATE[]" value="'.$row["RATE"].' " class="dis" disabled id="RATE_'.$id.'"></td>
                      <td id="tdstyle"><input type="text" name="RATE_1[]" value="'.$row["RATE_1"].' " class="dis" disabled id="RATE1_'.$id.'"></td>
                     <td id="tdstyle"><input type="text" name="RATE_2[]" value="'.$row["RATE_2"].' " class="dis" disabled id="RATE2_'.$id.'"></td>
                     <td id="tdstyle"><input type="text" name="RATE_3[]" value="'.$row["RATE_3"].' " class="dis" disabled id="RATE3_'.$id.'"> </td>
                     <td id="tdstyle"><input type="text" name="RATE_4[]" value="'.$row["RATE_4"].' " class="dis" disabled id="RATE4_'.$id.'"></td>
                     <td id="tdstyle"><input type="text" name="RATE_5[]" value="'.$row["RATE_5"].' " class="dis" disabled id="RATE5_'.$id.'"></td>
                     <td id="tdstyle"><input type="text" name="RATE_6[]" value="'.$row["RATE_6"].' " class="dis" disabled id="RATE6_'.$id.'"></td>
                     <td id="tdstyle"><input type="text" name="RATE_7[]" value="'.$row["RATE_7"].' " class="dis" disabled id="RATE7_'.$id.'"></td>
                    </tr>
                  </table>
                </td>
                <td id="tdstyle"><input type="text" name="PAGES[]" value="'.$row["PAGES"].' " class="dis" disabled id="PAGES_'.$id.'"></td>
               <td id="tdstyle"><input type="text" name="REMARK[]" value="'.$row["REMARK"].' " class="dis" disabled id="REMARK_'.$id.'"></td>
               <td id="tdstyle"><input type="text" name="MOBILE[]" 
               value="'.$row["MOBILE"].'" class="dis" disabled id="MOBILE_'.$id.'"></td>
                <td id="tdstyle"><input type="text" name="E_MAIL[]" value="'.$row["E_MAIL"].' " class="dis" disabled id="EMAIL_'.$id.'"></td>
                <td id="tdstyle"><input type="checkbox" disabled name="remove[]" value="remove" 
                id="remove_'.$id.'" class="dis">Remove</td>

                </tr>';

      }
?>


    </table>
    </form>
</div>
                       
                     
                