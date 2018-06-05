<?php include("logcode.php");
include("databaseconnect.php");
if(isset($_REQUEST['print']))
{
	$reportrange = $_REQUEST['reportrange']; 
	$splitdate = explode("-",$reportrange);
$date = $splitdate[0];
$date1 = $splitdate[1];
$dt= date('Y-m-d', strtotime($date));
$dt1= date('Y-m-d', strtotime($date1)); 
      $sql1= "SELECT beam_invoiceorg.Be_Invoice_Id, beam_invoice.Beam_Invoice_Id, beam_invoice.Beam_Invoice_Date,beam_invoice.Invoice_No, beam_invoiceorg.Total_Beam, beam_invoiceorg.Ends, beam_invoiceorg.Quantity, quality_details.Quality_Name, beam_invoiceorg.Rate, beam_invoiceorg.Amount, beam_invoiceorg.R_Id FROM beam_invoiceorg,beam_invoice,quality_details WHERE quality_details.Quality_Id = beam_invoiceorg.Quality_Id AND beam_invoice.Beam_Invoice_Id = beam_invoiceorg.Beam_Invoice_Id AND beam_invoice.Beam_Invoice_Date between '".$dt."' and '".$dt1."'  order by beam_invoice.Beam_Invoice_Id asc ";
   $rsSub = mysql_query($sql1);
	$rowSub = mysql_fetch_array($rsSub);
	$totalRowsRsSub = mysql_num_rows($rsSub);
	}
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>BEAM [[S] INVOICE] <?php echo $date.' - '.$date1;?></title>
 <link rel="shortcut icon" href="Icons/st85.png">
<style type="text/css">
table{
	border-collapse:collapse;
}
</style>
</head>
<body onload="window.print()">
<table width="990" border="0" align="center" cellpadding="5" cellspacing="5" >
  <tr  style="font-size:24px">
    <?php date_default_timezone_set("Asia/Calcutta"); ?>
    <td>
     <div id="print-header-wrapper">
                    <div class="row-fluid">&nbsp;Sub-BEAM INVOICE <b>Report</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i><?php echo $date.' - '.$date1;?></i></div>
                    <div class="row-fluid" align="center"><strong>!! Shree Ganeshayan Namaha !!</strong><br/>
    <strong>SHINGORI TEXTILE</strong></div>
                    <div class="row-fluid" align="right"><?php echo date('Y/m/d h:i:s A'); ?>&nbsp;&nbsp;</div>
                   </div>
    </td>
  </tr>
  <tr >
    <td colspan="11" valign="top">
        <table width="100%" border="1" cellspacing="2" cellpadding="2" class="table" id="table_data" >
          <tr>
                                             <th width="15%"><center>Inv. ID</center></th>
                                             <th width="15%"><center>Inv. No.</center></th>
                                             <th width="15%"><center>Total Beam</center></th>
                                             <th width="7%"><center>Ends</center></th>
                                             <th width="15%"><center>Quantity</center></th>
                                            <th width="30%"><center>Quality</center></th>
                                            <th width="15%"><center>Rate</center></th>
                                            <th width="15%"><center>Amount</center></th>
                                            <th width="10%"><center>#ID</center></th>
      </tr> 
    <?php 
									do { ?>                                
<tr align="center"> 
     <td><?php echo $rowSub['Beam_Invoice_Id']; ?></td>
     <td><?php echo $rowSub['Invoice_No']; ?></td>
    <td><?php echo $rowSub['Total_Beam']; ?></td>
    <td><?php echo $rowSub['Ends']; ?></td>
    <td><?php echo $rowSub['Quantity']; ?></td>
    <td><?php echo $rowSub['Quality_Name']; ?></td>
    <td><?php echo $rowSub['Rate']; ?></td>
    <td><?php echo $rowSub['Amount']; ?></td>
    <td><?php echo $rowSub['R_Id']; ?></td>
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