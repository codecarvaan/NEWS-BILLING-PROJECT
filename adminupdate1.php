<?php  
include "conn.php";
$name1=$_POST["name1"];
$phone1=$_POST["phone1"];
$email1=$_POST["email1"];
$userid1=$_POST["userid1"];
$password=$_POST["password"];
$password1=md5($password);
$centerid1=$_POST["centerid1"];
$id2=$_GET["id2"];
$employeeid1=$_POST["employeeid1"];

$sql="update admin  set  name='$name1' ,password='$password', phone='$phone1', email='$email1' , userid='$userid1' , centerid='$centerid1' ,password1='$password1'  , employeeid='$employeeid1' where id2='$id2'  ";
$res=mysql_query($sql);  
if($res){
header("location:admin.php");
}
?>