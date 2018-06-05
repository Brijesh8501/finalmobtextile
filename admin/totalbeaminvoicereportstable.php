<?php error_reporting(0); 
include("databaseconnect.php");
if(isset($_REQUEST['SearchBeamInvoice']))
    {   
    $reportrange = $_REQUEST['reportrange']; 
	$splitdate = explode("-",$reportrange);
$date = $splitdate[0];
$date1 = $splitdate[1];
$dt = date('Y-m-d', strtotime($date));
$dt1 = date('Y-m-d', strtotime($date1)); 
	$query1 = "SELECT beam_invoice.Beam_Invoice_Id, beam_invoice.Beam_Invoice_Date, beam_invoice.Invoice_No, beam_invoice.Beam_D_C_Id, company_deetaails.C_Name, broker_details1.B_Name, beam_invoice.Total_B, beam_invoice.Total_Amt, beam_invoice.Addtnl_Amt, beam_invoice.Grand_Amt, beam_invoice.Entry_Date, beam_invoice.Entry_Id FROM beam_invoice, company_deetaails, broker_details1 WHERE company_deetaails.Company_Id = beam_invoice.Company_Id AND broker_details1.Broker_Id = beam_invoice.Broker_Id AND beam_invoice.Beam_Invoice_Date between '".$dt."' and '".$dt1."' order by beam_invoice.Beam_Invoice_Id asc ";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
      $sql1 = "SELECT beam_invoiceorg.Be_Invoice_Id, beam_invoice.Beam_Invoice_Id, beam_invoice.Beam_Invoice_Date,beam_invoice.Invoice_No, beam_invoiceorg.Total_Beam, beam_invoiceorg.Ends, beam_invoiceorg.Quantity, quality_details.Quality_Name, beam_invoiceorg.Rate, beam_invoiceorg.Amount, beam_invoiceorg.R_Id FROM beam_invoiceorg,beam_invoice,quality_details WHERE quality_details.Quality_Id = beam_invoiceorg.Quality_Id AND beam_invoice.Beam_Invoice_Id = beam_invoiceorg.Beam_Invoice_Id AND beam_invoice.Beam_Invoice_Date between '".$dt."' and '".$dt1."'  order by beam_invoice.Beam_Invoice_Id asc ";
   $rsSub = mysql_query($sql1);
	$rowSub = mysql_fetch_array($rsSub);
	$totalRowsRsSub = mysql_num_rows($rsSub);
	}
if($reportrange=="")
	{
		echo '<script>alert("Please select date range first....");</script>';
	}
else if($totalRowsRsMain==0)
{
	echo "<center>There is no record</center>";
}
else
{
	?>
<div align="right">
<a href="totalbeaminvoicemainreportprint?print&reportrange=<?php echo $reportrange; ?>" target="_blank"><i class="icon-print"></i></a>
</div>
 <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                        <tr> <th width="10%">Sr No.</th>
                                             <th width="15%">Invoice ID</th>
                                             <th width="15%">Challan ID</th>
                                             <th width="15%">Invoice No.</th>
                                             <th width="15%">Invoice Date</th>
                                             <th width="30%">Company</th>
                                            <th width="30%">Broker</th>
                                            <th width="10%">Total Beam</th>
                                            <th width="10%">Total Amount</th>
                                            <th width="10%">Additional Amount</th>
                                            <th width="10%">Grand Total</th>
                                            <th width="15%">Entry Date</th>
                                            <th width="10%">Entry #ID</th>
                                        </tr>
                                       </thead>
                                    <tbody>
    <?php
	          $i=0;
	  $i++;
									do { ?>                                    
  <tr class="odd gradeX"> 
  <td><?php echo $i++; ?></td>
     <td><?php echo $rowMain['Beam_Invoice_Id']; ?></td>
     <td><?php echo $rowMain['Beam_D_C_Id']; ?></td>
    <td><?php echo $rowMain['Invoice_No']; ?></td>
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
                      <center><strong>****SUB-DETAILS CATEGORIZED BY INVOICE ID****</strong></center><div align="right">
<a href="totalbeaminvoicesubreportprint?print&reportrange=<?php echo $reportrange; ?>" target="_blank"><i class="icon-print"></i></a>
</div>
                             <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                        <tr> 
                                             <th width="7%">Sr No.</th>
                                             <th width="15%">Invoice ID</th>
                                             <th width="15%">Invoice No.</th>
                                             <th width="10%">Total Beam</th>
                                             <th width="10%">Ends</th>
                                             <th width="10%">Quantity</th>
                                            <th width="30%">Quality</th>
                                            <th width="15%">Rate</th>
                                            <th width="15%">Amount</th>
                                            <th width="10%">#ID</th>
                                        </tr>
                               </thead>
                                    <tbody>
                                     <?php $i=0;
	  $i++;
									do { ?>                                
  <tr class="odd gradeX"> 
    <td><?php echo $i++; ?></td>
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
                                    </tbody>
                              </table>
<?php
 } ?>