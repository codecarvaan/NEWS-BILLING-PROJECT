<?php 
 include "function.php";

 if(isset($_POST["NAME"]))
 {
 $name=$_POST["NAME"];
 $phone1=$_POST["PHONE1"];
 $phone2=$_POST["PHONE2"];
 $E_MAIL_NO=$_POST["E_MAIL_NO"];
 $VARIFY_TYPE=$_POST["VARIFY_TYPE"];
 $VARIFY_NUM=$_POST["VARIFY_NUM"];
 $ADD1=$_POST["ADD1"];
 $Area_Code=$_POST["Area_Code"];
 $City_Code=$_POST["City_Code"];
 $city="null";
 $Opening_date=$_POST["Opening_date"];
 $closing_bal=$_POST["closing_bal"];
 $opening_bal=$_POST["opening_bal"];
 $charges=$_POST["charges"];
 $hash_tag=uniqid();
 $code=create_code(999);
}
else{
	header("location:new_profile.php");
}




 $sql="INSERT into user (NAME ,CODE,AC_OP_DT,PHONE1,PHONE2,VARIFY_TYPE,VARIFY_NUM,CITY,CITY_CODE,AREA_CODE,E_MAIL_NO,ACTIVE,hash_tag,ADD1,OPENING,CLOSING) 
 VALUES ('$name','$code','$Opening_date','$phone1','$phone2','$VARIFY_TYPE','$VARIFY_NUM','$city','$City_Code','$Area_Code','$E_MAIL_NO','1','$hash_tag','$ADD1','$opening_bal','$closing_bal')";
 $res=mysql_query($sql) or die("mysql_error($sql)");
 if($res)
 {
 	$sql="select id from user where hash_tag='$hash_tag'";
 	$res=mysql_query($sql);
 	$id=mysql_fetch_array($res)[0];
 	$code=create_code($id);
 	$sql="update user set CODE='$code' where hash_tag='$hash_tag'";
 	$res=mysql_query($sql);
 header("location:profile.php?custid=".$id);
 }








?>