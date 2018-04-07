<?php  
include "conn.php";
$id=$_GET["custid"];

$name=$_POST["NAME"];
$phone1=$_POST["PHONE1"];
$phone2=$_POST["PHONE2"];
$email=$_POST["E_MAIL_NO"];
$var_type=$_POST["VARIFY_TYPE"];
$var_value=$_POST["VARIFY_NUM"];
$address=$_POST["ADD1"];
$status=$_POST["active"];
$charges=$_POST["CHARGES"];
$sql="update user  set  NAME='$name' , PHONE1='$phone1',PHONE2='$phone2', E_MAIL_NO='$email' , VARIFY_TYPE='$var_type' , VARIFY_NUM='$var_value',ADD1='$address' , ACTIVE='$status', CHARGES='$charges' where id='$id'";
$res=mysql_query($sql);  
if($res){
header("location:profile.php?custid=".$id);
}
?>