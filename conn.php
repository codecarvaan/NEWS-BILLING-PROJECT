<?php
mysql_connect('localhost','root','') or die("cannot connect" );
mysql_select_db('mamu') or die("cannot connect");

/*include "function.php";

$sql="select * from city ";
$res=mysql_query($sql)or die("not working");
while($row=mysql_fetch_assoc($res))
{
		$code=$row["DSP_CODE"];
		$yo=citycode($code)+0;
		echo $code."......".citycode($code)."<br>";

$sql1="update city  set  AREA_ID='$yo'  where DSP_CODE='$code'";

$res1=mysql_query($sql1) or die("not working");

}
*/

?>
