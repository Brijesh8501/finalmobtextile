<?php include("logcode.php");
include("databaseconnect.php");
error_reporting(0);
if(isset($_REQUEST['print']))
{
	$reportrange = $_REQUEST['reportrange'];
	$Type = $_REQUEST['Type'];
	$Labour = $_REQUEST['Labour']; 
	$splitdate = explode("-",$reportrange);
$date = $splitdate[0];
$date1 = $splitdate[1];
$dt = date('Y-m-d', strtotime($date));
$dt1 = date('Y-m-d', strtotime($date1)); 
  if($reportrange && $Type=='Fixed' && $Labour)
  {
	$query1="select Sal_Fixed_Id,Date_Range,labour_details.Name,No_Of,Rate,Amount,Upad_Amount,Grand_Total,Re_Amount,salary_fixed_master.Status,salary_fixed_master.Entry_Date,salary_fixed_master.Entry_Id from salary_fixed_master,labour_details where labour_details.Labour_Id = salary_fixed_master.Labour_Id AND labour_details.Labour_Id = '$Labour' order by Sal_Fixed_Id asc";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
  }
   elseif($reportrange!="" && $Type=='Fixed')
  {
	$query1= "select Sal_Fixed_Id,Date_Range,labour_details.Name,No_Of,Rate,Amount,Upad_Amount,Grand_Total,Re_Amount,salary_fixed_master.Status,salary_fixed_master.Entry_Date,salary_fixed_master.Entry_Id from salary_fixed_master,labour_details where labour_details.Labour_Id = salary_fixed_master.Labour_Id order by Sal_Fixed_Id asc";
  $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
  }
	}
////////////////////////////////// number format in point ///////////////////////////////////////////////////////
  function moneyFormatIndia($num){
$explrestunits = "" ;
$num=preg_replace('/,+/', '', $num);
$words = explode(".", $num);
$des="00";
if(count($words)<=2){
    $num=$words[0];
    if(count($words)>=2){$des=$words[1];}
    if(strlen($des)<2){$des="$des0";}else{$des=substr($des,0,2);}
}
if(strlen($num)>3){
    $lastthree = substr($num, strlen($num)-3, strlen($num));
    $restunits = substr($num, 0, strlen($num)-3); // extracts the last three digits
    $restunits = (strlen($restunits)%2 == 1)?"0".$restunits:$restunits; // explodes the remaining digits in 2's formats, adds a zero in the beginning to maintain the 2's grouping.
    $expunit = str_split($restunits, 2);
    for($i=0; $i<sizeof($expunit); $i++){
        // creates each of the 2's group and adds a comma to the end
        if($i==0)
        {
            $explrestunits .= (int)$expunit[$i].","; // if is first value , convert into integer
        }else{
            $explrestunits .= $expunit[$i].",";
        }
    }
    $thecash = $explrestunits.$lastthree;
} else {
    $thecash = $num;
}
return "$thecash.$des"; // writes the final format where $currency is the currency symbol.

}		
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>FIXED-LABOUR&nbsp;<?php echo $date.' - '.$date1;?></title>
 <link rel="shortcut icon" href="Icons/st85.png">
<style type="text/css">
table {
	border-collapse:collapse;
}
</style>
</head>
<body onload="window.print() ">
 <?php if($reportrange && $Type=='Fixed' && $Labour)
  {
	  ?>
<table width="990" border="0" align="center" cellpadding="5" cellspacing="5" >
  <tr  style="font-size:24px">
    <?php date_default_timezone_set("Asia/Calcutta"); ?>
    <td>
      <div id="print-header-wrapper">
                    <div class="row-fluid">&nbsp;FIXED-LABOUR&nbsp;[F-L]&nbsp;<b>Report</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i><?php echo $date.' - '.$date1;?></i></div>
                    <div class="row-fluid" align="center"><strong>!! Shree Ganeshayan Namaha !!</strong><br/>
    <strong>SHINGORI TEXTILE</strong></div>
                    <div class="row-fluid" align="right"><?php echo date('Y/m/d h:i:s A'); ?>&nbsp;&nbsp;</div>
                   </div>
    </td>
  </tr>
  <tr>  
    <td colspan="10" valign="top">
        <table width="100%" border="1" cellspacing="2" cellpadding="2" class="table" id="table_data" >
        <thead>
          <tr>
                                         <th><center>Sr No.</center></th>
                                             <th><center>Salary-Fixed ID</center></th>
                                             <th><center>Date Range</center></th>
                                             <th><center>Labour</center></th>
                                             <th><center>Number Of Beam / Attendance / ...</center></th>
                                             <th><center>Rate</center></th>
                                            <th><center>Amount</center></th>
                                            <th><center>Upad Amount / Adjust Upad Amount</center></th>
                                            <th><center>Grand Total</center></th>
                                            <th><center>Remaining Amount</center></th>
                                            <th><center>Status</center></th>
                                            <th><center>Entry Date</center></th>
                                            <th><center>Entry #ID</center></th>
      </tr> 
       </thead>
       <tbody>
    <?php
	$i=0;
	$i++;
									do { ?>                                    
  <tr align="center"> 
   <td width="7%"><?php echo $i++; ?></td>
     <td width="15%"><?php echo $rowMain['Sal_Fixed_Id']; ?></td>
    <td width="10%"><?php echo $rowMain['Date_Range']; ?></td>
    <td width="20%"><?php echo $rowMain['Name']; ?></td>
    <td width="7%"><?php echo $rowMain['No_Of']; ?></td>
    <td width="7%"><?php echo $rowMain['Rate']; ?></td>
    <td width="7%"><?php echo $rowMain['Amount']; ?></td>
    <td width="12%"><?php echo $rowMain['Upad_Amount']; ?></td>
    <td width="30%"><?php echo $rowMain['Grand_Total']; ?></td>
    <td width="10%"><?php echo $rowMain['Re_Amount']; ?></td>
    <td width="10%"><?php echo $rowMain['Status']; ?></td>
    <td width="10%"><?php echo $rowMain['Entry_Date']; ?></td>
    <td width="10%"><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
     <?php $TT_M = $TT_M + $rowMain['Grand_Total'];
									} while($rowMain=mysql_fetch_assoc($rsMain)); ?>
  <tr>
  <th colspan="13"><span style="float:right">&nbsp;&nbsp;&nbsp;Final Amount&nbsp;:&nbsp;<?php echo moneyFormatIndia($TT_M);?></span>
  </th>
  </tr>
</tbody>
        </table>
        </td>
        </tr>
</table>
<?php  }
   elseif($reportrange!="" && $Type=='Fixed')
  {
	  ?>
      <table width="990" border="0" align="center" cellpadding="5" cellspacing="5" >
  <tr  style="font-size:24px">
    <?php date_default_timezone_set("Asia/Calcutta"); ?>
    <td>
      <div id="print-header-wrapper">
                    <div class="row-fluid">&nbsp;FIXED-LABOUR [F]&nbsp;<b>Report</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i><?php echo $date.' - '.$date1;?></i></div>
                    <div class="row-fluid" align="center"><strong>!! Shree Ganeshayan Namaha !!</strong><br/>
    <strong>SHINGORI TEXTILE</strong></div>
                    <div class="row-fluid" align="right"><?php echo date('Y/m/d h:i:s A'); ?>&nbsp;&nbsp;</div>
                   </div>
    </td>
  </tr>
  <tr>  
    <td colspan="10" valign="top">
        <table width="100%" border="1" cellspacing="2" cellpadding="2" class="table" id="table_data" >
        <thead>
          <tr>
                                           <th><center>Sr No.</center></th>
                                             <th><center>Salary-Fixed ID</center></th>
                                             <th><center>Date Range</center></th>
                                             <th><center>Labour</center></th>
                                             <th><center>Number Of Beam / Attendance / ...</center></th>
                                             <th><center>Rate</center></th>
                                            <th><center>Amount</center></th>
                                            <th><center>Upad Amount / Adjust Upad Amount</center></th>
                                            <th><center>Grand Total</center></th>
                                            <th><center>Remaining Amount</center></th>
                                            <th><center>Status</center></th>
                                            <th><center>Entry Date</center></th>
                                            <th><center>Entry #ID</center></th>
      </tr> 
       </thead>
       <tbody>
    <?php
	$i=0;
	$i++;
									do { ?>                                    
  <tr align="center"> 
   <td width="7%"><?php echo $i++; ?></td>
     <td width="15%"><?php echo $rowMain['Sal_Fixed_Id']; ?></td>
    <td width="10%"><?php echo $rowMain['Date_Range']; ?></td>
    <td width="20%"><?php echo $rowMain['Name']; ?></td>
    <td width="7%"><?php echo $rowMain['No_Of']; ?></td>
    <td width="7%"><?php echo $rowMain['Rate']; ?></td>
    <td width="7%"><?php echo $rowMain['Amount']; ?></td>
    <td width="12%"><?php echo $rowMain['Upad_Amount']; ?></td>
    <td width="30%"><?php echo $rowMain['Grand_Total']; ?></td>
    <td width="10%"><?php echo $rowMain['Re_Amount']; ?></td>
    <td width="10%"><?php echo $rowMain['Status']; ?></td>
    <td width="10%"><?php echo $rowMain['Entry_Date']; ?></td>
    <td width="10%"><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
     <?php $TT_M = $TT_M + $rowMain['Grand_Total'];
									} while($rowMain=mysql_fetch_assoc($rsMain)); ?>
  <tr>
  <th colspan="13"><span style="float:right">&nbsp;&nbsp;&nbsp;Final Amount&nbsp;:&nbsp;<?php echo moneyFormatIndia($TT_M);?></span>
  </th>
  </tr>
</tbody>
        </table>
        </td>
        </tr>
</table>
      <?php }
	  ?>
</body>
</html>
<?php
 ob_flush(); ?>