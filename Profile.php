<?php
include 'headeradmin.php';
include "conn.php";
include "function.php";

if(isset($_GET['custid'])) {
   $custid=$_GET["custid"];
}
else{
	$custid=1;
}

$sql="select * from user where id='$custid'";
$res=mysql_query($sql);
$row=mysql_fetch_assoc($res);

?>

<body>
 <div class="content-wrapper">
        <div class="container">
              <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Profile</h1>
                    </div>
                </div>
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

<title>PRofile</title>



</head>
<style>
#tdstyle { 
	background-color:transparent;
	border:1px #C0C0C0 solid;
	text-align:center;
	vertical-align:middle;
	padding:5px;
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


<form action="update_user.php?custid=<?php echo $custid; ?>" method="POST">
  
	<div>
  <div id='clicker' STYLE="WIDTH:100PX;FLOAT:LEFT;MARGIN-LEFT:79%"><a  class="btn btn-primary btn-danger"><span class="glyphicon glyphicon-edit">EDIT</span> </a></div>
	<BUTTON type="submit"  class="dis" disabled id="update_but"><span class="glyphicon glyphicon-ok">UPDATE</span>
  </BUTTON></div>
<table class="table table-striped table-bordered table-hover "  >
<tr ><th colspan="10" >User Details</th></tr>
<tr>
<td id="tdstyle"><b>Customer ID</b></td>
<td id="tdstyle"><?php echo $row["CODE"] ;?></td>

<td id="tdstyle"><b>NAME</b></td>
<td id="tdstyle"><input type="text" name="NAME" value="<?php echo $row["NAME"] ;?> " class="dis" class="dis" disabled></td>
<td id="tdstyle"><b>Phone 1</b></td>
<td id="tdstyle"><input type="text" name="PHONE1" value="<?php echo $row["PHONE1"] ;?> " class="dis" disabled></td>
<td id="tdstyle"><b>Phone 2</b></td>
<td id="tdstyle"><input type="text" name="PHONE2" value="<?php echo $row["PHONE2"] ;?> " class="dis" disabled></td>
<td id="tdstyle"><b>Email-ID:</b></td>
<td id="tdstyle"><input type="text" name="E_MAIL_NO" value="<?php echo $row["E_MAIL_NO"] ;?> " class="dis" disabled></td>
</tr>
<tr>
<td id="tdstyle"><b>Verification Type</b></td>
<td id="tdstyle"><input type="text" name="VARIFY_TYPE" value="<?php echo $row["VARIFY_TYPE"] ;?> " class="dis" disabled></td>
<td id="tdstyle" colspan="2"><b>Verification Number</b></td>
<td id="tdstyle" ><input type="text" name="VARIFY_NUM" value="<?php echo $row["VARIFY_NUM"] ;?> " class="dis" disabled></td>
<td  colspan="5"></td>
</tr>
</table>

<br>
<table class="table table-striped table-bordered table-hover "  >
<tr ><th colspan="10" >Address</th></tr>
<td id="tdstyle"><b>Address</b></td>
<td colspan="3"><input type="text" name="ADD1" value="<?php echo $row["ADD1"] ;?> " class="dis" disabled></td>
<td id="tdstyle"><b>Area</b></td>
<td id="tdstyle"><input type="text" name="AREA" value="<?php echo return_area($row["AREA_CODE"])["NAME"] ;?> " class="dis" disabled></td>
<td id="tdstyle"><b>Area-Code</b></td>
<td id="tdstyle"><input type="text" name="AREA_CODE" value="<?php echo $row["AREA_CODE"] ;?> " class="dis" disabled></td>
<td id="tdstyle"><b>City</b></td>
<td id="tdstyle"><input type="text" name="CITY" value="<?php echo $row["CITY"] ;?> " class="dis" disabled></td>
</tr>
<tr>
<td id="tdstyle"><b>City-Code</b></td>
<td id="tdstyle"><input type="text" name="CITY_CODE" value="<?php echo $row["CITY_CODE"] ;?> " class="dis" disabled></td>
<td colspan="8" id="tdstyle"></td>
</tr>

</table><br>

	
<table class="table table-striped table-bordered table-hover "  >
<tr ><th colspan="10" >Account </th></tr>
<tr>
<td id="tdstyle"><b>Account Opening Date</b></td>
<td id="tdstyle"><?php echo $row["AC_OP_DT"];?></td>
<td id="tdstyle"><b>Status</b></td>
<td id="tdstyle">
  <select name="active" class="dis" disabled id="select_disable">
   <?php echo status($row["ACTIVE"]) ;?>
 </select>
</td>
<td id="tdstyle"><b>Opening Balance</b></td>
<td id="tdstyle"><?php echo $row["OPENING"];?></td>

<td id="tdstyle"><b>Closing Balance</b></td>
<td id="tdstyle"><?php echo $row["CLOSING"];?></td>

<td id="tdstyle"><b>Charges</b></td>
<td id="tdstyle"><input type="text" name="CHARGES" value="<?php echo $row["CHARGES"] ;?> " class="dis" disabled></td>

</tr>
</table>
</form>
<br>


<table class="table table-striped table-bordered table-hover "  id="table_purchase">

<tr ><th colspan="13"  ><b>Base Package </th></tr>



<td id="tdstyle"><b><p>Item Code</p></b></td>
<td id="tdstyle" colspan="2"><b><p>Item Name</p></b></td>
<td id="tdstyle" colspan="3"><b><p>Issued Date From <br>(yy-mm-dd)</p></b></td>
<td id="tdstyle"><b><p>Quantity</p></b></td>
<td id="tdstyle"><b><p>Extras Rate</p></b></td>
<td id="tdstyle" colspan="4">
<table  class="table table-striped table-bordered table-hover "  >
<tr ><td colspan="7" id="tdstyle"><b>Weekly Rate</b></td></tr>
     <tr>
          
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
<td id="tdstyle"><b>Action</b></td>
</tr>

<?php
$sql="select * from item_history where custid='$custid' and status='active' and kind='sub'";
$res=mysql_query($sql);
$count=1;
while($row=mysql_fetch_assoc($res))
{
echo '<tr  id="row_'.$count.'">
<td id="tdstyle">'.return_item($row["item_code"])["ITEM_CODE"].'</td>
<td id="tdstyle" colspan="2">'.return_item($row["item_code"])["ITEM_NAME"].'</td>
<td id="tdstyle" colspan="3"><p>'.$row["date_issue"].'</p></td>
<td id="tdstyle">'.$row["quantity"].'</td>
<td id="tdstyle">'.return_item($row["item_code"])["RATE"].'</td>
<td id="tdstyle" colspan="4">
<table  class="table table-striped table-bordered table-hover "  >

     <tr>
          
          <td id="tdstyle">'.return_item($row["item_code"])["RATE_1"].'</td>
          <td id="tdstyle">'.return_item($row["item_code"])["RATE_2"].'</td>
          <td id="tdstyle">'.return_item($row["item_code"])["RATE_3"].'</td>
          <td id="tdstyle">'.return_item($row["item_code"])["RATE_4"].'</td>
          <td id="tdstyle"> '.return_item($row["item_code"])["RATE_5"].'</td>
          <td id="tdstyle">'.return_item($row["item_code"])["RATE_6"].'</td>
          <td id="tdstyle">'.return_item($row["item_code"])["RATE_7"].'</td>
     
      
     </tr>
     </table>

</td>
          <td>
                <div class="dropdown">
                     <img style="width:80%"src="assets\img\cross.png" >
                    <div class="dropdown-content">
                       <form method="post" action="remove_package.php" method="post">
                          <input type="hidden" value="'.$custid.'" name="custid">
                          <input type="hidden" value="'.$row["id"].'" name="pack_id">
                         <h1> <img style="width:20%"src="assets\img\cross.png" >REMOVE</h1>
                          <p style="width:280px ;float:left">
                          <b>1)</b> Select if you want to <b>Dismiss</b> the subcription(Bill will not be affected)
                          </p>
                          <p style="width:20px ;float:left" > <input type="radio"  name="type" value="1" required>
                          </p>
                          <p style="width:280px ;float:left">
                          <b>2)</b> Select if you want to <b>End</b> the subcription (Item will be reflected in Bill)<p>
                          <p style="width:20px ;float:left" > <input type="radio"  name="type" value="2" required>
                          </p>
                          <br>
                          <br>
                          <p style="width:150px;float:left" ><b> Select the END date</b>
                          </p>
                          <p style="width:150px ;float:left" > 
                         <input type="date" name="end_date" style="width:150px" required> 
                          </p>
                          
                          <input type="submit" class="btn btn-info">
                       </form>
                    </div>
                </div>
          </td>
</tr>';

}

?> 

<form method="post" action="update_package.php" onsubmit="return validateForm()" id="update_pack"> </form>
<tr><td colspan="13">
   <input type="hidden" value="<?php echo $custid; ?>" name="custid" form="update_pack">
  <button type="button" class="btn btn-warning" style="width:49%;float:left ;margin-right:2%" onclick="add_field()" >ADD NEW ITEM</button>
  <button type="submit" class="btn btn-primary" style="width:49%" form="update_pack" >UPDATE</button></td>
</td></tr></table>

<br>

<?php
  if( isset($_GET["date_addon_start"]) && isset($_GET["date_addon_start"]) )
  {

 $date_addon_start=$_GET["date_addon_start"];
 $date_addon_end=$_GET["date_addon_end"];


  }
  else{
    $date=date(' Y-m-01');
     $date_addon_start=date(' Y-m-01');
      $date_addon_end=nextmonth( $date_addon_start);
  }
  

  
  $sql="select * from item_history where custid='$custid' and kind='addon' and date_issue >= '
 $date_addon_start' and date_issue <= '$date_addon_end' order by id asc";
  $res=mysql_query($sql);
  $count=0;
  ?>
<table class="table table-striped table-bordered table-hover "  >
<tr ><th colspan="10" >
      <div style="width:100%;float:left;position: relative;">Add On / Daily Edit </div>
        <div style="position:relative;right:1%;font-size: 20px"> <?php echo $date_addon_start." <- To -> ".$date_addon_end; ?></div>
    </th>
     </tr> 
<tr><td colspan="10"> 
        <div style="width:100%;text-align: center; ;position: relative;"> 
        
        <form action="profile.php" method="get">
        <input type="hidden" value="<?php echo $custid; ?>" name="custid" >
        <span style="padding: 5px;font-size: 20px;width:10%">  Select  Date</span>
        <input type="date" name="date_addon_start" style="padding: 0px;width:15%;margin:5px" required 
        format="yy-MM/dd">
        <span style="padding: 5px;font-size: 20px;width:10%"> To</span>
        <input type="date" name="date_addon_end" style="padding: 0px;width:15%;margin:5px" required>
        <input type="submit" class="btn btn-primary" style="padding:8px;width:15%" >

       </form>
      </div> 
    </td>
      
</tr>
<tr>
<td id="tdstyle"><b>Sr.No</b></td>
<td id="tdstyle" colspan="2"><b>Date</b></td>
<td id="tdstyle"><b>Quantity (Q)</b></td>
<td id="tdstyle"><b>Add On Number/ Name</b></td>
<td id="tdstyle"><b>Remarks</b></td>
<td id="tdstyle"><b>Add-on charge (X)</b></td>
<td id="tdstyle"><b>Extra charge (One Time If Any) (Y)</b></td>
<td id="tdstyle"><b>Net Charge ([Q*X]S+Y)</b></td>
<td id="tdstyle"><b>Action</b></td>

</tr>
<form id="add_on_new" action="addon.php" method="post"></form>
<tr>
<td id="tdstyle">  <input type="hidden" value="<?php echo $custid; ?>" name="custid" form="add_on_new">New</td>
<td id="tdstyle" colspan="2"><input type="date" name="date" required  form="add_on_new"></td>
<td id="tdstyle">
  <input id="qty" name="qty" type="number" min=1 max=20 placeholder="QTY 1-20" 
  onchange="total_charge()" form="add_on_new"></td>
<td id="tdstyle">
<select name="add_on" id="add_on" required onchange="total_charge()" form="add_on_new">
  <option value="-1">Select Add-On</option>
  <option value="REBATE">REBATE</option>
  <option value="OTHER">OTHER</option>
  <?php select_list_item($sel);?>
</select>


</td>
<td id="tdstyle"><input name="remarks" placeholder="Remarks" form="add_on_new"></input></td>
<td id="tdstyle">
  <input type="number" name="add_charge" id="add_charge" value="0" placeholder="Add on Charge" onchange="total_charge()" form="add_on_new">
</td>
<td id="tdstyle"><input type="number" id="extra_charge" value="0" name="extra_charge" placeholder="Extra Charges"  onchange="total_charge()" form="add_on_new"></td>
<td id="tdstyle"><input type="number" id="net_charge" disabled  placeholder="Net Charge"></td>
<td id="tdstyle"><button type="submit" class="btn btn-success" style="width:100%" form="add_on_new" >Submit</button></td>

</tr>

  <?php
  while($row=mysql_fetch_assoc($res))
  {
    $net_charge=($row["quantity"]*$row["addon_charge"])+$row["addon_extra_charge"];
    if($row["item_code"]=="REBATE")
      {
        $net_charge=$net_charge * -1;
      }
    echo '<tr>
              <td id="tdstyle">'.++$count.'</td>
              <td id="tdstyle" colspan="2">'.$row["date_issue"].'</td>
              <td id="tdstyle">'.$row["quantity"].'</td>
              <td id="tdstyle">'.$row["item_code"].'</td>
              <td id="tdstyle"><textarea style=" resize: none; width:100%;">'.$row["remarks"].'</textarea></td>
              <td id="tdstyle">'.$row["addon_charge"].'</td>
              <td id="tdstyle">'.$row["addon_extra_charge"].'</td>
              <td id="tdstyle">'.$net_charge.'</td>
              <td id="tdstyle">
                <form action="remove_addon.php" method="post">
                  <input type="hidden" value="'.$custid.'" name="custid">
                  <input type="hidden" value="'.$row["id"].'" name="addon_id">
                  <button type="submit" style="border:0px;background-color:transparent;">
                  <img style="width:50%"src="assets\img\cross.png" >
                  </button>
                </form>
              </td>
          </tr>';
  }
?>

</table>
<div id="shivam"></div>
<br>

<?php
 
  if( isset($_GET["date_bill_start"]) && isset($_GET["date_bill_end"]) )
  {

 $date_bill_start=$_GET["date_bill_start"];
 $date_bill_end=$_GET["date_bill_end"];


  }
  else{
    $date=date(' Y-m-01');
     $date_bill_start=date(' Y-m-01');
      $date_bill_end=nextmonth( $date_bill_start);
  }
  

  
  $sql="select * from item_history where custid='$custid' and kind='sub' and date_issue >= '
        $date_bill_start' and date_remove <= '$date_bill_end' order by id asc";
  $res1=mysql_query($sql);

  $sql="select * from item_history where custid='$custid' and kind='addon' and date_issue >= '
        $date_bill_start' and date_issue <= '$date_bill_end' order by id asc";

  $res2=mysql_query($sql);
  

?>


<table class="table table-striped table-bordered table-hover "  >
<tr>
  <th colspan="10" >
      <div style="width:100%;float:left;position: relative;">BILLING </div>
        <div style="position:relative;right:1%;font-size: 20px">
         <?php echo $date_bill_start." <- To -> ".$date_bill_end; ?></div>
    </th>
     </tr> 
<tr>
  <td colspan="10"> 
        <div style="width:100%;text-align: center; ;position: relative;"> 
        
        <form action="profile.php" method="get">
        <input type="hidden" value="<?php echo $custid; ?>" name="custid" >
        <span style="padding: 5px;font-size: 20px;width:10%">  Select Bill Date</span>
        <input type="date" name="date_bill_start" style="padding: 0px;width:15%;margin:5px" required>
        <span style="padding: 5px;font-size: 20px;width:10%"> To</span>
        <input type="date" name="date_bill_end" style="padding: 0px;width:15%;margin:5px" required>
        <input type="submit" class="btn btn-primary" style="padding:8px;width:15%;" >
        <?php
        echo' &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
         <a class="btn btn-info"  href="single_bill_print.php?custid='.$custid.'&date_bill_start='.$date_bill_start.'&date_bill_end='.$date_bill_end.'">PRINT</a>';
         ?>
       </form>
      </div> 
    </td>
      
</tr>
<tr>
<td id="tdstyle" ><b>Sr.No</b></td>
<td id="tdstyle" colspan="2"><b>Date</b></td>
<td id="tdstyle"><b>Quantity (Q)</b></td>
<td id="tdstyle"><b>Add On Number/ Name</b></td>
<td id="tdstyle"><b>Remarks</b></td>

<td id="tdstyle"><b>PCS(P)</b></td>
<td id="tdstyle"><b>Item Amount (X)</b></td>
<td id="tdstyle"><b>Extra Amount (One Time If Any) (Y)</b></td>
<td id="tdstyle"><b>Net Amount [Q*([P*X]S+Y)]</b></td>


</tr>
<?php
$count=0;
$total_amount=0;
$total_pcs=0;
while($row=mysql_fetch_assoc($res1))
{

$start="";
$end="";
  if($date_bill_start<=$row["date_issue"])
  {
    $start=$row["date_issue"];
  }
  else
  {
    $start=$date_bill_start;
  }

  if($row["status"]=="deactive")
  {
    $end=$row["date_remove"];
  }
  else
  {
    $end=$date_bill_end;
  }
 
  $days=date_difference($start, $end);
  $summary=summary_price($start,$end,$row["item_code"]);
 $flag=true;
  for($i=1;$i<=sizeof($summary);$i++)
  {
    $total=$row["quantity"]*($summary[$i-1][1]*$summary[$i-1][0]);
    $total_amount+=$total;
    $total_pcs+=$summary[$i-1][1]*$row["quantity"];
      if($flag)
      {
        echo '<tr>

            <td id="tdstyle" rowspan="'.sizeof($summary).'">'.(++$count).'</td>
            <td id="tdstyle" colspan="2" rowspan="'.sizeof($summary).'" >'.$start.' ---> '.$end.'</td>
            <td id="tdstyle" rowspan="'.sizeof($summary).'">'.$row["quantity"].'</td>
            <td id="tdstyle">'.return_item($row["item_code"])["ITEM_NAME"].'('.$i.')</td>
            <td id="tdstyle">'.$row["remarks"].'</td>
            
            <td id="tdstyle">'.$summary[$i-1][1].'</td>
            <td id="tdstyle">'.$summary[$i-1][0].'</td>
            <td id="tdstyle">'.$row["addon_charge"].'</td>
            <td id="tdstyle">'.$total.'</td>

          
            </tr>';
            $flag=false;
          }
        else{
                echo '<tr>

            
            
            <td id="tdstyle">'.return_item($row["item_code"])["ITEM_NAME"].'('.$i.')</td>
            <td id="tdstyle">'.$row["remarks"].'</td>
            
            <td id="tdstyle">'.$summary[$i-1][1].'</td>
            <td id="tdstyle">'.$summary[$i-1][0].'</td>
            <td id="tdstyle">'.$row["addon_charge"].'</td>
            <td id="tdstyle">'.$total.'</td>

          
            </tr>';

        }  

    }
  }
  while($row=mysql_fetch_assoc($res2))
  {
          
            $start=$row["date_issue"];
         $total=($row["quantity"]*$row["addon_charge"])+$row["addon_extra_charge"];
        if($row["item_code"]=="REBATE")
        {
          $total=-1*$total;
        }


$total_pcs+=1*$row["quantity"];
   $total_amount+=$total;     
   
    echo '<tr>

            <td id="tdstyle" >'.(++$count).'</td>
            <td id="tdstyle" colspan="2" >'.$start.'</td>
            <td id="tdstyle" >'.$row["quantity"].'</td>
            <td id="tdstyle">'.return_item($row["item_code"])["ITEM_NAME"].'</td>
            <td id="tdstyle">'.$row["remarks"].'</td>
            
            <td id="tdstyle">1</td>
            <td id="tdstyle">'.$row["addon_charge"].'</td>
            <td id="tdstyle">'.$row["addon_extra_charge"].'</td>
            <td id="tdstyle">'.$total.'</td>

          
            </tr>';

  }
echo '<tr>

<td id="tdstyle" colspan="6"><b>Total</b></td>
<td id="tdstyle"><b>'. $total_pcs.'</b></td>
<td id="tdstyle"></td>
<td id="tdstyle"></td>
<td id="tdstyle"><b>'. $total_amount.'</b></td>';

?>
</table>

</div></div></body>
