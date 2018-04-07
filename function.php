<?php

include "conn.php";
function dateformat($date){

if($date=="")
{
	return;
}
    $date=explode("-",$date);
    return $date[1]."/".$date[2]."/".($date[0]);

}


function citycode($code){

if($code=="")
{
	return;
}
    $code=preg_replace('/[^0-9]/', '', $code);
    return $code+0;

}
function check_text($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

function return_area($areacode)
{

$res=mysql_query("select * from area where AREA_CODE='$areacode'");
return mysql_fetch_assoc($res);
}

function status($num)
{
	if ($num==1){
		echo '<option value="1" selected>Active</option><option value="2"  >Deactive</option>';
	}
	else {
		echo '<option value="1">Active</option><option value="2" selected >Deactive</option>';
	}
}

function return_item($item_code)
{
if($item_code=="REBATE" or $item_code=="OTHER")
{
	return array("ITEM_NAME"=>$item_code);
}

$res=mysql_query("select * from ITEM where ITEM_CODE='$item_code'");
return mysql_fetch_assoc($res);
}
//echo "<select >";
//select_list_item();

function select_list_item($code){

$res=mysql_query("SELECT * FROM  item ORDER BY id asc ");

	while($row=mysql_fetch_assoc($res))
	{
		if($code==$row["ITEM_CODE"])
		{
		echo "<option selected value=".$row["ITEM_CODE"].">".$row["ITEM_CODE"]."-->".$row["ITEM_NAME"]."</option>";
		}
		else{
			echo "<option value=".$row["ITEM_CODE"].">".$row["ITEM_CODE"]."-->".$row["ITEM_NAME"]."</option>";
		}
	}	
echo "</select>";
}

function return_id($id){

if($id=="" OR $id==-1)
{
	return;
}
    $id=explode("_",$id);

    return $id[1];

}
function nextmonth($start)
{
	$date = new DateTime($start);
	$date->add(new DateInterval('P1M'));
	return $date->format('Y-m-d') ;
}

function create_next_code($current)
{

	$letter = $current[0];
    $number = (int) substr($current, 1);

    if ($number == 999) {
      $letter++;
      $number = 1;
    }
    else {
      $number++;
    }

    return $letter.str_pad($number, 5, '0', STR_PAD_LEFT);
}

function date_difference($date1,$date2)
{
	$date1 = new DateTime($date1);
	$date2 = new DateTime($date2);

	 $diff = $date2->diff($date1)->format("%a");
	 return ($diff+1);
}




function summary_price($start,$end,$itemcode)
{

		$sql="select * from item where ITEM_CODE='$itemcode'";
		$row=mysql_fetch_assoc(mysql_query($sql));
		
			$days=date_difference($start,$end);
			$arr=[];
			
			for($i=day_date($start);$i<=$days+day_date($start)-1;$i++)
			{
				$in=$i%7;
				if($in==0)
				{
					$in=7;
				}
			
					$key=$row["RATE_".$in];
					if(array_key_exists($key, $arr))
					{
						$arr[$key]++;
					}
					else{
						$arr[$key]=1;
					}

			

			}
			$arr_final=array(array("0",0));
			$count=0;
			foreach($arr as $x=>$x_value)
  					{
		  				//	echo "Key=" . $x . ", Value=" . $x_value;
		  				//	echo "<br>";
		  					$arr_final[$count][0]=$x;
		  					$arr_final[$count][1]=$x_value;
		  					$count++;	
  						}
			return $arr_final;
			


}

//echo summary_price("2018-02-10","2018-02-15","A00004")[0][1];


function day_date($date)
{
		$timestamp = strtotime($date);

		$day = date('D', $timestamp);
		
		if($day=="Mon")
		{
			return 1;
		}
		if($day=="Tue")
		{
			return 2;
		}
		if($day=="Wed")
		{
			return 3;
		}

		if($day=="Thu")
		{
			return 4;
		}
		if($day=="Fri")
		{
			return 5;
		}
		if($day=="Sat")
		{
			return 6;
		}
		if($day=="Sun")
		{
			return 7;
		}
		

		
}
function select_Area(){


$res=mysql_query("SELECT * FROM  area  ");

	while($row=mysql_fetch_assoc($res))
	{
		
		echo "<option  value=".$row["AREA_CODE"].">".$row["AREA_CODE"]."-->".$row["NAME"]."</option>";
	}	
echo "</select>";


}
function select_City(){


$res=mysql_query("SELECT * FROM  city ");

	while($row=mysql_fetch_assoc($res))
	{
		
		echo "<option  value=".$row["City_Code"].">".$row["City_Code"]."-->".$row["NAME"]."</option>";
	}	
echo "</select>";


}

//echo create_code(74);
function create_code($id)
{
$a="A";
	$q=$id/100000;
	$r=$id%100000;
	for($i=1;$i<$q;$i++)
	{
		$a++;
	}	
	$code=str_split($r+100000);
	$code[0]=$a;
	return implode("",$code);
}



?>