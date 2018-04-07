<?php
// include 'headeradmin.php';
include "conn.php";
include "function.php";
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>A simple, clean, and responsive HTML invoice template</title>
	<link rel="stylesheet" href="assets/css/print.css">
    <script type="text/javascript" src="ajax/ajax_func.js"></script>
</head>



<?php

  if( isset($_GET["date_bill_start"]) && isset($_GET["date_bill_end"]) && isset($_GET["custid"]))
  {

 $date_bill_start=$_GET["date_bill_start"];
 $date_bill_end=$_GET["date_bill_end"];
 $custid=$_GET["custid"];


  }
  else{
    $date=date(' Y-m-01');
     $date_bill_start=date(' Y-m-01');
      $date_bill_end=nextmonth( $date_bill_start);
      $custid=1;
  }
  

  
  $sql="select * from item_history where custid='$custid' and kind='sub' and date_issue >= '
        $date_bill_start' and date_remove <= '$date_bill_end' order by id asc";
  $res1=mysql_query($sql);

  $sql="select * from item_history where custid='$custid' and kind='addon' and date_issue >= '
        $date_bill_start' and date_issue <= '$date_bill_end' order by id asc";

  $res2=mysql_query($sql);
  

?>




</style>

<div style="width: 1620px;">
 
<?php
$ink=4; 
    while($ink--)
    {
  ?>
  <div style="float: left; width: 550px;margin: 6px">
    <div class="invoice-box" id="dvContents">
        <table cellpadding="0" cellspacing="0" id="parent-table">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td >BILL/CASH MEMO</td>
                            <td >PHONE:789456123</td>
                        </tr>
                        <tr>
                            <td class="title">
                               <h2 style="margin:10px"> S.C.TIWARI & SONS</h2>
                               <h5 style="margin:10px">
                                (NEWS PAPER AGENT,
                                CHANDIGARH ROAD,<br>
                                SAMRALA,)
                                </h5> 
                            </td>
                            
                            <td>
                                Invoice #: 123<br>
                                Created: January 1, 2015<br>
                         
                                For The Month of February 2018
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr>
                <td>NAME:KHULLAR SAHAB ,MOHALLA WALE</td>
                <td>A/C CODE: A00010</td>
            </tr>
            
            <tr class="heading">
                <td colspan="2">Bill Details</td>
            </tr>
                <td colspan="2">
                    <table   >

  
<tr>
<td id="tdstyle" ><b>Sr.No</b></td>

<td id="tdstyle"><b>Quantity (Q)</b></td>
<td id="tdstyle"><b>Add On Number/ Name</b></td>
<td id="tdstyle"><b>Remarks</b></td>

<td id="tdstyle"><b>PCS(P)</b></td>
<td id="tdstyle"><b>Item Amount (X)</b></td>
<td id="tdstyle"><b>Extra Amount  (Y)</b></td>
<td id="tdstyle"><b>Net Amount [Q*([P*X]S+Y)]</b></td>


</tr>
<?php
$count=0;
$total_amount=0;
$total_pcs=0;
$count_line=0;
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
            
            <td id="tdstyle" rowspan="'.sizeof($summary).'">'.$row["quantity"].'</td>
            <td id="tdstyle" rowspan="'.sizeof($summary).'">'.return_item($row["item_code"])["ITEM_NAME"].'</td>
            <td id="tdstyle" rowspan="'.sizeof($summary).'">'.$row["remarks"].'</td>
            
            <td id="tdstyle">'.$summary[$i-1][1].'</td>
            <td id="tdstyle">'.$summary[$i-1][0].'</td>
            <td id="tdstyle">'.$row["addon_charge"].'</td>
            <td id="tdstyle">'.$total.'</td>

          
            </tr>';
            $flag=false;
          }
        else{
                echo '<tr><td id="tdstyle">'.$summary[$i-1][1].'</td>
            <td id="tdstyle">'.$summary[$i-1][0].'</td>
            <td id="tdstyle">'.$row["addon_charge"].'</td>
            <td id="tdstyle">'.$total.'</td>

          
            </tr>';

        }
        $count_line++;  

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
           
            <td id="tdstyle" >'.$row["quantity"].'</td>
            <td id="tdstyle"><div style="height:30px;overflow:hidden">'.return_item($row["item_code"])["ITEM_NAME"].'</div></td>
            <td id="tdstyle">'.$row["remarks"].'</td>
            
            <td id="tdstyle">1</td>
            <td id="tdstyle">'.$row["addon_charge"].'</td>
            <td id="tdstyle">'.$row["addon_extra_charge"].'</td>
            <td id="tdstyle">'.$total.'</td>

          
            </tr>';
          $count_line++;
  }

          $n= $count_line;
          for($i=0;$i<13-$n;$i++)
           {
            echo  '<tr>
            <td id="tdstyle" colspan=></td>
            <td id="tdstyle" colspan=></td>
            <td id="tdstyle" colspan=></td>
            <td id="tdstyle" colspan=></td>

        <td id="tdstyle"></td>
        <td id="tdstyle"></td>
        <td id="tdstyle"></td>
        <td id="tdstyle"></td></tr>';
            }
       
echo '<tr>

        <td id="tdstyle" colspan="4"><b>Total</b></td>
        <td id="tdstyle"><b>'. $total_pcs.'</b></td>
        <td id="tdstyle"></td>
        <td id="tdstyle"></td>
        <td id="tdstyle"><b>'. $total_amount.'</b></td></tr>';



?>
    
        </table>
        
        
        <div>NOTE:= Make the payment before 20th of the month otherwise 10% will be charged extra with next bill..

        </div>
        <div style="text-align:right">For S.C.TIWARI & SONS</div>
    </div>
<br>
</td></table></div></div>
<?php 


}?>	
</div>
</body>
</html>