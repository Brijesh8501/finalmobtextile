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
      $sql1= "SELECT bobbin_invoiceorg.Bo_Invoice_Id, bobbin_invoice.Bobbin_Invoice_Id, bobbin_invoice.Bobbin_Invoice_Date, bobbin_invoice.Invoice_No, bobbin_invoiceorg.Total_Cartoon, bobbin_invoiceorg.Total_Weight, quality_details.Quality_Name, bobbin_invoiceorg.Rate, bobbin_invoiceorg.Amt, bobbin_invoiceorg.R_Id FROM bobbin_invoiceorg, bobbin_invoice, quality_details WHERE bobbin_invoice.Bobbin_Invoice_Id = bobbin_invoiceorg.Bobbin_Invoice_Id AND quality_details.Quality_Id = bobbin_invoiceorg.Quality_Id AND bobbin_invoice.Bobbin_Invoice_Date between '".$dt."' and '".$dt1."'  order by bobbin_invoice.Bobbin_Invoice_Id asc";
   $rsSub = mysql_query($sql1);
	$rowSub = mysql_fetch_array($rsSub);
	$totalRowsRsSub = mysql_num_rows($rsSub);
	}
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>BOBBIN [[S] INVOICE] <?php echo $date.' - '.$date1;?></title>
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
                    <div class="row-fluid">&nbsp;Sub-BOBBIN INVOICE <b>Report</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i><?php echo $date.' - '.$date1;?></i></div>
                    <div class="row-fluid" align="center"><strong>!! Shree Ganeshayan Namaha !!</strong><br/>
    <strong>SHINGORI TEXTILE</strong></div>
                    <div class="row-fluid" align="right"><?php echo date('Y/m/d h:i:s A'); ?>&nbsp;&nbsp;</div>
                   </div>
    </td>
  </tr>
  <tr >
        <td colspan="11" valign="top">
       <table width="100%" border="1" cellspacing="2" cellpadding="2" class="table" id="table_data" >
        <thead>
          <tr>
                                             <th width="15%"><center>Invoice ID</center></th>
                                             <th width="15%"><center>Invoice No.</center></th>
                                             <th width="15%"><center>Cartoon</center></th>
                                             <th width="10%"><center>Weight</center></th>
                                             <th width="35%"><center>Quality</center></th>
                                            <th width="15%"><center>Rate</center></th>
                                            <th width="15%"><center>Amount</center></th>
                                            <th width="10%"><center>#ID</center></th>
      </tr> 
       </thead>
       <tbody>
    <?php
									do { ?>                                
<tr align="center"> 
    <td><?php echo $rowSub['Bobbin_Invoice_Id']; ?></td>
     <td><?php echo $rowSub['Invoice_No']; ?></td>
    <td><?php echo $rowSub['Total_Cartoon']; ?></td>
    <td><?php echo $rowSub['Total_Weight']; ?></td>
    <td><?php echo $rowSub['Quality_Name']; ?></td>
    <td><?php echo $rowSub['Rate']; ?></td>
    <td><?php echo $rowSub['Amt']; ?></td>
    <td><?php echo $rowSub['R_Id']; ?></td>
   </tr>
  <?php } while($rowSub=mysql_fetch_assoc($rsSub)); ?>
             </tbody>
        </table>
        </td>
        </tr>
</table>
</body>
</html>
<?php
 ob_flush(); ?>