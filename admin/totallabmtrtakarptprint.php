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
  if($reportrange && $Type=='Meter' && $Labour)
  {
	$query1="select Taka_Labour_Id,Ta_Labour_Id,T_Date,Taka_Meter,L_Rate,L_Amount,quality_details.Quality_Name,labour_details.Name,taka_labsalsuborg.Description,R_Id from taka_labsalsuborg,labour_details,quality_details where quality_details.Quality_Id = taka_labsalsuborg.Quality_Id AND labour_details.Labour_Id = taka_labsalsuborg.Labour_Id AND T_Date between '".$dt."' and '".$dt1."' AND labour_details.Labour_Id = '$Labour' order by Taka_Labour_Id asc ";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
  }
   elseif($reportrange!="" && $Type=='Meter')
  {
	$query1="select Taka_Labour_Id,Ta_Labour_Id,T_Date,Taka_Meter,L_Rate,L_Amount,quality_details.Quality_Name,labour_details.Name,taka_labsalsuborg.Description,R_Id from taka_labsalsuborg,labour_details,quality_details where quality_details.Quality_Id = taka_labsalsuborg.Quality_Id AND labour_details.Labour_Id = taka_labsalsuborg.Labour_Id AND T_Date between '".$dt."' and '".$dt1."' order by Taka_Labour_Id asc ";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
  }
	}
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>T-LABOUR&nbsp;<?php echo $date.' - '.$date1;?></title>
 <link rel="shortcut icon" href="Icons/st85.png">
<style type="text/css">
table{
	border-collapse:collapse;
}
</style>
</head>
<body onload="window.print() ">
 <?php if($reportrange && $Type=='Meter' && $Labour)
  {
	  ?>
<table width="990" border="0" align="center" cellpadding="5" cellspacing="5" >
  <tr  style="font-size:24px">
    <?php date_default_timezone_set("Asia/Calcutta"); ?>
    <td>
      <div id="print-header-wrapper">
                    <div class="row-fluid">&nbsp;TAKA-LABOUR [M-L]&nbsp;<b>Report</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i><?php echo $date.' - '.$date1;?></i></div>
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
                                             <th><center>Taka-Labour ID</center></th>
                                             <th><center>Date</center></th>
                                             <th><center>Quality</center></th>
                                             <th><center>Meter</center></th>
                                             <th><center>Rate</center></th>
                                            <th><center>Amount</center></th>
                                            <th><center>Labour</center></th>
                                            <th><center>Description</center></th>
                                            <th><center>#ID</center></th>
      </tr> 
       </thead>
       <tbody>
    <?php
	$i=0;
	$i++;
									do { ?>                                    
  <tr align="center"> 
   <td width="7%"><?php echo $i++; ?></td>
     <td width="15%"><?php echo $rowMain['Ta_Labour_Id']; ?></td>
    <td width="10%"><?php echo $rowMain['T_Date']; ?></td>
    <td width="20%"><?php echo $rowMain['Quality_Name']; ?></td>
    <td width="7%"><?php echo $rowMain['Taka_Meter']; ?></td>
    <td width="7%"><?php echo $rowMain['L_Rate']; ?></td>
    <td width="7%"><?php echo $rowMain['L_Amount']; ?></td>
    <td width="12%"><?php echo $rowMain['Name']; ?></td>
    <td width="30%"><?php echo $rowMain['Description']; ?></td>
    <td width="10%"><?php echo $rowMain['R_Id']; ?></td>
   </tr>
     <?php $TT_M = $TT_M + $rowMain['Taka_Meter'];
  $TT_A = $TT_A + $rowMain['L_Amount'];} while($rowMain=mysql_fetch_assoc($rsMain)); ?>
  <tr>
  <th colspan="10"><span style="float:right">Total Meter&nbsp;:&nbsp;<?php echo $TT_M;?>&nbsp;&nbsp;&nbsp;Total Amount&nbsp;:&nbsp;<?php echo $TT_A;?></span>
  </th>
  </tr>
</tbody>
        </table>
         </td>
        </tr>
</table>
<?php  }
   elseif($reportrange!="" && $Type=='Meter')
  {
	  ?>
      <table width="990" border="0" align="center" cellpadding="5" cellspacing="5" >
  <tr  style="font-size:24px">
    <?php date_default_timezone_set("Asia/Calcutta"); ?>
    <td>
      <div id="print-header-wrapper">
                    <div class="row-fluid">&nbsp;TAKA-LABOUR&nbsp;[M]&nbsp;<b>Report</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i><?php echo $date.' - '.$date1;?></i></div>
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
                                             <th><center>Taka-Labour ID</center></th>
                                             <th><center>Date</center></th>
                                             <th><center>Quality</center></th>
                                             <th><center>Meter</center></th>
                                             <th><center>Rate</center></th>
                                            <th><center>Amount</center></th>
                                            <th><center>Labour</center></th>
                                            <th><center>Description</center></th>
                                            <th><center>#ID</center></th>
       </tr> 
       </thead>
       <tbody>
    <?php
	$i=0;
	$i++;
									do { ?>                                    
  <tr align="center"> 
   <td width="7%"><?php echo $i++; ?></td>
     <td width="15%"><?php echo $rowMain['Ta_Labour_Id']; ?></td>
    <td width="10%"><?php echo $rowMain['T_Date']; ?></td>
    <td width="20%"><?php echo $rowMain['Quality_Name']; ?></td>
    <td width="7%"><?php echo $rowMain['Taka_Meter']; ?></td>
    <td width="7%"><?php echo $rowMain['L_Rate']; ?></td>
    <td width="7%"><?php echo $rowMain['L_Amount']; ?></td>
    <td width="12%"><?php echo $rowMain['Name']; ?></td>
    <td width="30%"><?php echo $rowMain['Description']; ?></td>
    <td width="10%"><?php echo $rowMain['R_Id']; ?></td>
   </tr>
     <?php $TT_M = $TT_M + $rowMain['Taka_Meter'];
  $TT_A = $TT_A + $rowMain['L_Amount'];} while($rowMain=mysql_fetch_assoc($rsMain)); ?>
  <tr>
  <th colspan="10"><span style="float:right">Total Meter&nbsp;:&nbsp;<?php echo $TT_M;?>&nbsp;&nbsp;&nbsp;Total Amount&nbsp;:&nbsp;<?php echo $TT_A;?></span>
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