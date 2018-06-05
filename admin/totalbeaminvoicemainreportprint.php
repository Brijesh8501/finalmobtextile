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
	$query1="SELECT beam_invoice.Beam_Invoice_Id, beam_invoice.Beam_Invoice_Date, beam_invoice.Invoice_No, beam_invoice.Beam_D_C_Id, company_deetaails.C_Name, broker_details1.B_Name, beam_invoice.Total_B, beam_invoice.Total_Amt, beam_invoice.Addtnl_Amt, beam_invoice.Grand_Amt, beam_invoice.Entry_Date, beam_invoice.Entry_Id FROM beam_invoice, company_deetaails, broker_details1 WHERE company_deetaails.Company_Id = beam_invoice.Company_Id AND broker_details1.Broker_Id = beam_invoice.Broker_Id AND beam_invoice.Beam_Invoice_Date between '".$dt."' and '".$dt1."' order by beam_invoice.Beam_Invoice_Id asc ";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
	}
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>BEAM [[M] INVOICE] <?php echo $date.' - '.$date1;?></title>
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
                    <div class="row-fluid">&nbsp;Main-BEAM INVOICE <b>Report</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i><?php echo $date.' - '.$date1;?></i></div>
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
                                             <th width="15%"><center>Inv. ID</center></th>
                                             <th width="15%"><center>Inv. No.</center></th>
                                             <th width="15%"><center>Chl. ID</center></th>
                                             <th width="15%"><center>Inv. Date</center></th>
                                             <th width="30%"><center>Company</center></th>
                                            <th width="30%"><center>Broker</center></th>
                                            <th width="10%"><center>No. Of Beam</center></th>
                                            <th width="20%"><center>Total Amount</center></th>
                                            <th width="10%"><center>Additional Amount</center></th>
                                            <th width="20%"><center>Grand Total</center></th>
                                            <th width="10%"><center>Entry Date</center></th>
                                            <th width="10%"><center>Entry #ID</center></th>
      </tr> 
       </thead>
       <tbody>
    <?php
									do { ?>                                    
  <tr align="center"> 
    <td><?php echo $rowMain['Beam_Invoice_Id']; ?></td>
    <td><?php echo $rowMain['Invoice_No']; ?></td>
    <td><?php echo $rowMain['Beam_D_C_Id']; ?></td>
    <td><?php echo $rowMain['Beam_Invoice_Date']; ?></td>
    <td><?php echo $rowMain['C_Name']; ?></td>
    <td><?php echo $rowMain['B_Name']; ?></td>
    <td><?php echo $rowMain['Total_B']; ?></td>
    <td><?php echo $rowMain['Total_Amt']; ?></td>
    <td><?php echo $rowMain['Addtnl_Amt']; ?></td>
    <td><?php echo $rowMain['Grand_Amt']; ?></td>
    <td><?php echo $rowMain['Entry_Date']; ?></td>
    <td><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
    <?php } while($rowMain=mysql_fetch_assoc($rsMain)); ?>
</tbody>
        </table>
        </td>
        </tr>
</table>
</body>
</html>
<?php
 ob_flush(); ?>