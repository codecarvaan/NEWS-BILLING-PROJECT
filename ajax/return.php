<?php 
include "../function.php";
$sel=$_GET["q"];
$id=$_GET["id"];
$sno=$_GET["sno"];
echo '<td id="tdstyle">'.return_item($sel)["ITEM_CODE"].'</td>
          <td id="tdstyle" colspan="2">';
$id2="'".$id."'";

echo '<select style="width:100%" id="select_aj" form="update_pack" name="item_code[]" onchange="showplan(this.value,'.$id2.")\" required >";
echo "<option value=-1>SELECT ITEM</option>";
select_list_item($sel);

echo '</td>
<td id="tdstyle" colspan="3"><p><input type="date" id="'.$id.'-date1" name="date_issue[]" form="update_pack" required onchange="date_relative(this.id)"></p></td>
<td id="tdstyle" ><p><input type="number" min=1 max=20 id="'.$id.'-qty" name="qty[]" form="update_pack" required></p></td>

<td id="tdstyle">'.return_item($sel)["RATE"].'</td>
<td id="tdstyle" colspan="4">
<table  class="table table-striped table-bordered table-hover "  >

     <tr >
          
          <td id="tdstyle">'.return_item($sel)["RATE_1"].'</td>
		<td id="tdstyle">'.return_item($sel)["RATE_2"].'</td>
          <td id="tdstyle">'.return_item($sel)["RATE_3"].'</td>
		<td id="tdstyle">'.return_item($sel)["RATE_4"].'</td>
          <td id="tdstyle">'.return_item($sel)["RATE_5"].'</td>
		<td id="tdstyle">'.return_item($sel)["RATE_6"].'</td>
          <td id="tdstyle">'.return_item($sel)["RATE_7"].'</td>
		 
		  
     </tr>
     </table>

</td>
<td id="tdstyle" ><img style="width:80%"src="assets\img\cross.png"onclick="remove_field(\''.$id.'\')" ></td></tr>';



?>