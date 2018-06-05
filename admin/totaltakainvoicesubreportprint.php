<?php include("logcode.php");
include("databaseconnect.php");
if(isset($_REQUEST['print']))
{
	$reportrange = $_REQUEST['reportrange']; 
	$splitdate = explode("-",$reportrange);
$date = $splitdate[0];
$date1 = $splitdate[1];
$dt = date('Y-m-d', strtotime($date));
$dt1 = date('Y-m-d', strtotime($date1)); 
      $sql1= "SELECT taka_invoiceorg.Ta_Invoice_Id, taka_invoice.Taka_Invoice_Id, taka_invoice.Taka_Invoice_Date, quality_details.Quality_Name, taka_invoiceorg.Total_Taka, taka_invoiceorg.Total_Meter, taka_invoiceorg.Rate, taka_invoiceorg.Amt,taka_invoiceorg.R_Id FROM taka_invoiceorg, taka_invoice, quality_details WHERE taka_invoice.Taka_Invoice_Id = taka_invoiceorg.Taka_Invoice_Id AND quality_details.Quality_Id = taka_invoiceorg.Quality_Id AND taka_invoice.Taka_Invoice_Date between '".$dt."' and '".$dt1."'  order by taka_invoice.Taka_Invoice_Id asc ";
   $rsSub = mysql_query($sql1);
	$rowSub = mysql_fetch_array($rsSub);
	$totalRowsRsSub = mysql_num_rows($rsSub);
	}
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>TAKA [[S] INVOICE]&nbsp;<?php echo $date.' - '.$date1;?></title>
 <link rel="shortcut icon" href="Icons/st85.png">
<style type="text/css">
table{
	border-collapse:collapse;
}
</style>
</head>
<body onload="window.print() ">
<table width="990" border="0" align="center" cellpadding="5" cellspacing="5" >
  <tr  style="font-size:24px">
    <?php date_default_timezone_set("Asia/Calcutta"); ?>
    <td>
     <div id="print-header-wrapper">
                    <div class="row-fluid">&nbsp;Sub-TAKA INVOICE <b>Report</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i><?php echo $date.' - '.$date1;?></i></div>
                    <div class="row-fluid" align="center"><strong>!! Shree Ganeshayah Namaha !!</strong><br/>
    <strong>SHINGORI TEXTILE</strong></div>
                    <div class="row-fluid" align="right"><?php echo date('Y/m/d h:i:s A'); ?>&nbsp;&nbsp;</div>
                   </div>
    </td>
  </tr>
  <tr >
    <td colspan="11" valign="top">
        <table width="100%" border="1" cellspacing="2" cellpadding="2" class="table" id="table_data" >
          <tr>
                                            <th><center>Inv. ID</center></th>
                                             <th><center>Quality</center></th>
                                             <th><center>Total Taka</center></th>
                                            <th><center>Total Meters</center></th>
                                            <th><center>Rate</center></th>
                                            <th><center>Amount</center></th>
                                            <th><center>#ID</center></th>
      </tr> 
    <?php 
									do { ?>                                
<tr align="center"> 
    <td width="15%"><?php echo $rowSub['Taka_Invoice_Id']; ?></td>
    <td width="30%"><?php echo $rowSub['Quality_Name']; ?></td>
    <td width="10%"><?php echo $rowSub['Total_Taka']; ?></td>
    <td width="10%"><?php echo $rowSub['Total_Meter']; ?></td>
   <td width="12%"><?php echo $rowSub['Rate']; ?></td>
   <td width="12%"><?php echo $rowSub['Amt']; ?></td>
   <td width="12%"><?php echo $rowSub['R_Id']; ?></td>
   </tr>
  <?php } while($rowSub=mysql_fetch_assoc($rsSub)); ?>
        </table>
       </td>
        </tr>
</table>
</body>
</html>
<?php
 ob_flush(); ?>