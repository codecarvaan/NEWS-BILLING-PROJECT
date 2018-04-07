<?php
include_once 'conn.php';
session_start();
if (empty($_SESSION["employeeid"] ) and $_SESSION["admin"]==(1 or 2))
{
	header("location:admin.php");
	
}
else{
include "PHPExcel.php";
include "conn.php";
$excel = new PHPExcel();
$date=$_GET['id'];

if($_SESSION["admin"]==1)
{
$centerid=$_SESSION["center"];
}
if($_SESSION["admin"]==2)
{
	$centerid=$_GET["centerid"];
}
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="'.$date.'.xls"');
header('Cache-Control: max-age=0');
$objPHPExcel = new PHPExcel();

$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'First name')
            ->setCellValue('B1', 'Middle name')
            ->setCellValue('C1', 'Last name')
            ->setCellValue('D1', 'Customer ID')
			->setCellValue('E1', 'PHONE 1')
            ->setCellValue('F1', 'PHONE 2')
            ->setCellValue('G1', 'EMAIL 1')
            ->setCellValue('H1', 'EMAIL 2')
			->setCellValue('I1', 'ADDRESS')
            ->setCellValue('J1', 'STREET')
            ->setCellValue('K1', 'CITY')
            ->setCellValue('L1', 'STATE')
			->setCellValue('M1', 'COUNTRY')
            ->setCellValue('N1', 'ZIPCODE')
            ->setCellValue('O1', 'REF ID')
            ->setCellValue('P1', 'SALE MADE')
			->setCellValue('Q1', 'SALE AMOUNT')
            ->setCellValue('R1', 'SALE PACKAGE')
            ->setCellValue('S1', 'CARD TYPE')
            ->setCellValue('T1', 'CARD LAST(4DIGIT)')
			->setCellValue('U1', 'CARD EXP')
			->setCellValue('V1', 'NO OF COMPUTER')
            ->setCellValue('W1', 'DEVICES')
            ->setCellValue('X1', 'AUTHORISATION')
            ->setCellValue('Y1', 'SALE EMPLOYEE')
			->setCellValue('Z1', 'LEAD EMPLOYEE')
			 ->setCellValue('AA1', 'DESCRIPTION EMPLOYEE')
            ->setCellValue('AB1', 'CALL STATUS')
            ->setCellValue('AC1', 'CALL BACK DATE')
			->setCellValue('AD1', 'CARD BACK TIME')
			->setCellValue('AE1', 'TIME ZONE')
            ->setCellValue('AF1', 'BOUND')
			->setCellValue('AG1', 'DESCRIPTION')
           ->setCellValue('AH1', 'USA-TIME');
		  $sql="select * from description where currentdate='$date' ";
			 $res=mysql_query($sql);
			 $count=mysql_num_rows($res);
			 $i=2;
		  while($row=mysql_fetch_assoc($res)  )
		  {
			
			  $custid=$row["custid"];
		      $usatime=$row["usatime"];
			 $sql1="select * from lead  where custid='$custid' and centerid='$centerid'  ";
			 $res1=mysql_query($sql1);
			 while($row1=mysql_fetch_assoc($res1))
			 {
				
				
				
				
				
				 $objPHPExcel->setActiveSheetIndex(0)
             ->setCellValue('A'.$i, $row1["name1"])
            ->setCellValue('B'.$i, $row1["name2"])
            ->setCellValue('C'.$i, $row1['name3'])
            ->setCellValue('D'.$i, $row1['custid'])
			->setCellValue('E'.$i, $row1['phone1'])
            ->setCellValue('F'.$i, $row1['phone2'])
            ->setCellValue('G'.$i, $row1['email1'])
            ->setCellValue('H'.$i, $row1['email2'])
			->setCellValue('I'.$i, $row1['address'])
            ->setCellValue('J'.$i, $row1['street'])
            ->setCellValue('K'.$i, $row1['city'])
            ->setCellValue('L'.$i, $row1['state'])
			->setCellValue('M'.$i, $row1['country'])
            ->setCellValue('N'.$i, $row1['zipcode'])
			->setCellValue('Z'.$i, $row1['employeeid']);	 
			 }
			 
			 
			 
			 
			 $sql2="select * from sales  where custid='$custid' and usatime='$usatime'  ";
			 $res2=mysql_query($sql2);
			 while($row2=mysql_fetch_assoc($res2))
			 {
				  
						$empid=$row2["employeeid"];
						$sql5="select * from employee where employeeid='$empid' and centerid='$centerid'";
						$res5=mysql_query($sql5);
						$count5=mysql_num_rows($res5);
						
						$sql6="select * from admin where employeeid='$empid' and centerid='$centerid'";
						$res6=mysql_query($sql6);
						$count6=mysql_num_rows($res6);
						
						if( ($count5+$count6)>0)
						{	
			
						
				 
				 
				 
				 $objPHPExcel->setActiveSheetIndex(0)
				->setCellValue('O'.$i, $row2['refid'])
           ->setCellValue('P'.$i, $row2['salemade'])
			->setCellValue('Q'.$i, $row2['saleamount'])
            ->setCellValue('R'.$i, $row2['salepackage'])
            ->setCellValue('S'.$i, $row2['cardtype'])
            ->setCellValue('T'.$i, $row2['cardlast'])
			->setCellValue('U'.$i, $row2['cardexp'])
			->setCellValue('V'.$i, $row2['computer'])
            ->setCellValue('W'.$i, $row2['devices'])
            ->setCellValue('X'.$i, $row2['authorisation'])
            ->setCellValue('Y'.$i, $row2['employeeid']);
			
			 }
			 }
			 
			  $sql3="select * from description where custid='$custid' and usatime='$usatime'   ";
			 $res3=mysql_query($sql3);
			 while($row3=mysql_fetch_assoc($res3))
			 {
				 
						$empid=$row3["employeeid"];
						$sql5="select * from employee where employeeid='$empid' and centerid='$centerid'";
						$res5=mysql_query($sql5);
						$count5=mysql_num_rows($res5);
						
						$sql6="select * from admin where employeeid='$empid' and centerid='$centerid'";
						$res6=mysql_query($sql6);
						$count6=mysql_num_rows($res6);
						
						if( ($count5+$count6)>0)
						{	
				 
				 
				 
				 $objPHPExcel->setActiveSheetIndex(0)
			  ->setCellValue('AA'.$i, $row3['employeeid'])
            ->setCellValue('AB'.$i, $row3['callstatus'])
            ->setCellValue('AC'.$i, $row3['calldate'])
			->setCellValue('AD'.$i, $row3['calltime'])
			->setCellValue('AE'.$i, $row3['timezone'])
            ->setCellValue('AF'.$i, $row3['bound'])
			->setCellValue('AG'.$i, $row3['description'])
			->setCellValue('AH'.$i, $row3['usatime']);
			 }
			 
			 } 
			 $i++;
		  }			 
   

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->setIncludeCharts(TRUE);
$objWriter->save('php://output');
}
?>