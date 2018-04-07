<?php  
include "conn.php";
include "function.php";


if(isset($_POST["num_add"]))
{
	$num1=$_POST["num_add"];
	 
	$sql="SELECT * FROM item ORDER BY id DESC LIMIT 1";
	$res=mysql_query($sql) or die("not working1");
	$row=mysql_fetch_assoc($res);
	$next=$row["ITEM_CODE"];
	while($num1)
	{

	$next=create_next_code($next);

	$sql="insert into item (ITEM_CODE) VALUES ('$next')";
	$res=mysql_query($sql) or die("not working2");
	$num1=$num1-1;
	
	}
	
	
}

if(isset($_POST["id"]) && isset($_POST["NAME"]) && isset($_POST["ITEM_TYPE"]) )
{
	
	$len=sizeof($_POST["id"]);
	$id=$_POST["id"];
	$ITEM_TYPE=$_POST["ITEM_TYPE"];
	$ITEM_NAME=$_POST["NAME"];
	$EDIT_TYPE=$_POST["EDIT_TYPE"];
	$EDIT_NAME=$_POST["EDIT_NAME"];
	$RATE=$_POST["RATE"];
	$RATE_1=$_POST["RATE_1"];
	$RATE_2=$_POST["RATE_2"];
	$RATE_3=$_POST["RATE_3"];
	$RATE_4=$_POST["RATE_4"];
	$RATE_5=$_POST["RATE_5"];
	$RATE_6=$_POST["RATE_6"];
	$RATE_7=$_POST["RATE_7"];
	$REMARK=$_POST["REMARK"];
	$PAGES=$_POST["PAGES"];
	$MOBILE=$_POST["MOBILE"];
	$E_MAIL=$_POST["E_MAIL"];
	$remove=$_POST["remove"];

	$res="";

	for($i=0;$i<$len;$i++)
	{	
	$id_temp=$id[$i];
	$ITEM_TYPE_temp=$ITEM_TYPE[$i];
	 $ITEM_NAME_temp=$ITEM_NAME[$i];
	 $EDIT_TYPE_temp=$EDIT_TYPE[$i];
	 $EDIT_NAME_temp=$EDIT_NAME[$i];
	 $RATE_temp=$RATE[$i];
	 $RATE_1_temp=$RATE_1[$i];
	 $RATE_2_temp=$RATE_2[$i];
	 $RATE_3_temp=$RATE_3[$i];
	 $RATE_4_temp=$RATE_4[$i];
	 $RATE_5_temp=$RATE_5[$i];
	 $RATE_6_temp=$RATE_6[$i];
	 $RATE_7_temp=$RATE_7[$i];
	 $REMARK_temp=$REMARK[$i];
	 $MOBILE_temp=$MOBILE[$i];
	 $E_MAIL_temp=$E_MAIL[$i];
	 $PAGES_temp=$PAGES[$i];
	 $remove_temp=$remove[$i];

	 if($remove_temp=="remove"){
	 	$sql="DELETE FROM item  where id='$id_temp'";
	
	 }
	 else{
		$sql="UPDATE item SET ITEM_NAME='$ITEM_NAME_temp',EDIT_TYPE='$EDIT_TYPE_temp',EDIT_NAME='$EDIT_NAME_temp',RATE='$RATE_temp',RATE_1='$RATE_1_temp',RATE_2='$RATE_2_temp',RATE_3='$RATE_3_temp',RATE_4='$RATE_4_temp',RATE_5='$RATE_5_temp',RATE_6='$RATE_6_temp',RATE_7='$RATE_7_temp',REMARK='$REMARK_temp',MOBILE='$MOBILE_temp',E_MAIL='$E_MAIL_temp',PAGES='$PAGES_temp'  WHERE id ='$id_temp'";
		
	}
	$res=mysql_query($sql) or die("not working");
	}
}

header("location:items.php");

?>
