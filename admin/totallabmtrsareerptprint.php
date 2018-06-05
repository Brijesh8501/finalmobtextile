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
	$sql1="select Saree_Labour_Id,Sa_Labour_Id,S_Date,Saree_Meter,quality_details.Quality_Name,design_details.Design,labour_details.Name,saree_labsalsuborg1.Description,R_Id,S_Rate,S_Amount from saree_labsalsuborg1,quality_details,design_details,labour_details where design_details.Design_Id = saree_labsalsuborg1.Design_Id AND quality_details.Quality_Id = design_details.Quality_Id AND labour_details.Labour_Id = saree_labsalsuborg1.Labour_Id AND S_Date between '".$dt."' and '".$dt1."' AND labour_details.Labour_Id = '$Labour' order by Saree_Labour_Id asc";
$rsSub = mysql_query($sql1);
	$rowSub = mysql_fetch_array($rsSub);
	$totalRowsRsSub = mysql_num_rows($rsSub);
  }
   elseif($reportrange!="" && $Type=='Meter')
  {
	$sql1="select Saree_Labour_Id,Sa_Labour_Id,S_Date,Saree_Meter,quality_details.Quality_Name,design_details.Design,labour_details.Name,saree_labsalsuborg1.Description,R_Id,S_Rate,S_Amount from saree_labsalsuborg1,quality_details,design_details,labour_details where design_details.Design_Id = saree_labsalsuborg1.Design_Id AND quality_details.Quality_Id = design_details.Quality_Id AND labour_details.Labour_Id = saree_labsalsuborg1.Labour_Id AND S_Date between '".$dt."' and '".$dt1."' order by Saree_Labour_Id asc ";
 $rsSub = mysql_query($sql1);
	$rowSub = mysql_fetch_array($rsSub);
	$totalRowsRsSub = mysql_num_rows($rsSub);
  }
	}
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>S-LABOUR&nbsp;<?php echo $date.' - '.$date1;?></title>
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
                    <div class="row-fluid">&nbsp;SAREE-LABOUR&nbsp;[M-L]&nbsp;<b>Report</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i><?php echo $date.' - '.$date1;?></i></div>
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
                                             <th><center>Saree-Labour ID</center></th>
                                             <th><center>Date</center></th>
                                             <th><center>Quality</center></th>
                                             <th><center>Design</center></th>
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
     <td width="15%"><?php echo $rowSub['Sa_Labour_Id']; ?></td>
     <td width="10%"><?php echo $rowSub['S_Date']; ?></td>
    <td width="20%"><?php echo $rowSub['Quality_Name']; ?></td>
    <td width="12%"><?php echo $rowSub['Design']; ?></td>
    <td width="7%"><?php echo $rowSub['Saree_Meter']; ?></td>
    <td width="7%"><?php echo $rowSub['S_Rate']; ?></td>
    <td width="7%"><?php echo $rowSub['S_Amount']; ?></td>
   <td width="15%"><?php echo $rowSub['Name']; ?></td>
    <td width="30%"><?php echo $rowSub['Description']; ?></td>
    <td width="10%"><?php echo $rowSub['R_Id']; ?></td>
  </tr>
  <?php $SS_M = $SS_M + $rowSub['Saree_Meter'];
  $SS_A = $SS_A + $rowSub['S_Amount'];} while($rowSub=mysql_fetch_assoc($rsSub)); ?>
  <tr>
  <th colspan="11"><span style="float:right">Total Meter&nbsp;:&nbsp;<?php echo $SS_M;?>&nbsp;&nbsp;&nbsp;Total Amount&nbsp;:&nbsp;<?php echo $SS_A;?></span>
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
                    <div class="row-fluid">&nbsp;SAREE-LABOUR [M]&nbsp;<b>Report</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i><?php echo $date.' - '.$date1;?></i></div>
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
                                             <th><center>Saree-Labour ID</center></th>
                                             <th><center>Date</center></th>
                                             <th><center>Quality</center></th>
                                             <th><center>Design</center></th>
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
     <td width="15%"><?php echo $rowSub['Sa_Labour_Id']; ?></td>
     <td width="10%"><?php echo $rowSub['S_Date']; ?></td>
    <td width="20%"><?php echo $rowSub['Quality_Name']; ?></td>
    <td width="12%"><?php echo $rowSub['Design']; ?></td>
    <td width="7%"><?php echo $rowSub['Saree_Meter']; ?></td>
    <td width="7%"><?php echo $rowSub['S_Rate']; ?></td>
    <td width="7%"><?php echo $rowSub['S_Amount']; ?></td>
   <td width="15%"><?php echo $rowSub['Name']; ?></td>
    <td width="30%"><?php echo $rowSub['Description']; ?></td>
    <td width="10%"><?php echo $rowSub['R_Id']; ?></td>
  </tr>
  <?php $SS_M = $SS_M + $rowSub['Saree_Meter'];
  $SS_A = $SS_A + $rowSub['S_Amount'];} while($rowSub=mysql_fetch_assoc($rsSub)); ?>
  <tr>
  <th colspan="11"><span style="float:right">Total Meter&nbsp;:&nbsp;<?php echo $SS_M;?>&nbsp;&nbsp;&nbsp;Total Amount&nbsp;:&nbsp;<?php echo $SS_A;?></span>
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