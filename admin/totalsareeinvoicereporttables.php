<?php
include("databaseconnect.php");
if(isset($_REQUEST['SearchSaInv']))
    {   
    $reportrange = $_REQUEST['reportrange']; 
	$splitdate = explode("-",$reportrange);
$date = $splitdate[0];
$date1 = $splitdate[1];
$dt = date('Y-m-d', strtotime($date));
$dt1 = date('Y-m-d', strtotime($date1)); 
	$query1="SELECT saree_invoice.Saree_Invoice_Id, saree_invoice.Saree_Invoice_Date, saree_invoice.Saree_D_C_Id, saree_invoice.Saree_D_C_Date, customer_details.Cu_En_Name, broker_details1.B_Name, saree_invoice.Total_Amt, saree_invoice.Discount, saree_invoice.Grandtotal, saree_invoice.Entry_Id FROM saree_invoice, customer_details, broker_details1 WHERE customer_details.Customer_Id = saree_invoice.Customer_Id AND broker_details1.Broker_Id = saree_invoice.Broker_Id AND saree_invoice.Saree_Invoice_Date between '".$dt."' and '".$dt1."' group by saree_invoice.Saree_Invoice_Id asc";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
     $sql1 = "SELECT saree_invoiceorg.Sa_Invoice_Id, saree_invoice.Saree_Invoice_Id, saree_invoice.Saree_Invoice_Date, quality_details.Quality_Name, design_details.Design, saree_invoiceorg.Total_Meter,saree_invoiceorg.Total_Weight, saree_invoiceorg.Total_Pieces, saree_invoiceorg.Rate, saree_invoiceorg.Amt, saree_invoiceorg.R_Id FROM saree_invoiceorg, saree_invoice, quality_details, design_details WHERE saree_invoice.Saree_Invoice_Id = saree_invoiceorg.Saree_Invoice_Id AND quality_details.Quality_Id = design_details.Quality_Id AND design_details.Design_Id = saree_invoiceorg.Design_Id AND saree_invoice.Saree_Invoice_Date between '".$dt."' and '".$dt1."'  order by saree_invoice.Saree_Invoice_Id asc ";
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
    <a href="totalsareeinvoicemainreportprint?print&reportrange=<?php echo $reportrange; ?>" target="_blank"><i class="icon-print"></i></a>
  </div>
                             <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                        <tr> 
                                             <th>Sr No.</th>
                                             <th>Invoice ID</th>
                                             <th>Invoice Date</th>
                                             <th>Challan ID</th>
                                             <th>Challan Date</th>
                                             <th>Customer</th>
                                            <th>Broker</th>
                                            <th>Total Amount</th>
                                            <th>Discount</th>
                                           <th>Grand Total</th>
                                           <th>Entry #ID</th>
                                        </tr>
                                       </thead>
                                    <tbody>
                                    <?php $i=0;
	  $i++;?>
      <?php do { ?>
  <tr class="odd gradeX"> 
    <td width="7%"><?php echo $i++; ?></td>
     <td width="15%"><?php echo $rowMain['Saree_Invoice_Id']; ?></td>
    <td width="15%"><?php echo $rowMain['Saree_Invoice_Date']; ?></td>
    <td width="15%"><?php echo $rowMain['Saree_D_C_Id']; ?></td>
    <td width="15%"><?php echo $rowMain['Saree_D_C_Date']; ?></td>
    <td width="25%"><?php echo $rowMain['Cu_En_Name']; ?></td>
    <td width="25%"><?php echo $rowMain['B_Name']; ?></td>
    <td width="15%"><?php echo $rowMain['Total_Amt']; ?></td>
    <td width="15%"><?php echo $rowMain['Discount']; ?> %</td>
     <td width="15%"><?php echo $rowMain['Grandtotal']; ?></td>
      <td width="15%"><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
  <?php } while ($rowMain = mysql_fetch_assoc($rsMain)); ?>
                                    </tbody>
                                </table>
    <center><strong>****SUB-DETAILS CATEGORIZED BY INVOICE ID****</strong></center>  <div align="right">
    <a href="totalsareeinvoicesubreportprint?print&reportrange=<?php echo $reportrange; ?>" target="_blank"><i class="icon-print"></i></a>
  </div>        
                             <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                        <tr> 
                                             <th>Sr No.</th>
                                             <th>Invoice ID</th>
                                             <th>Quality</th>
                                             <th>Design</th>
                                             <th>Total Meters</th>
                                             <th>Total Weight</th>
                                            <th>Total Piecess</th>
                                            <th>Rate</th>
                                            <th>Amount</th>
                                            <th>#ID</th>
                                            </tr>
                                      </thead>
                                    <tbody>
                                     <?php $i=0;
	                   $i++; do { ?>     
  <tr class="odd gradeX"> 
    <td width="7%"><?php echo $i++; ?></td>
     <td width="15%"><?php echo $rowSub['Saree_Invoice_Id']; ?></td>
    <td width="25%"><?php echo $rowSub['Quality_Name']; ?></td>
    <td width="25%"><?php echo $rowSub['Design']; ?></td>
    <td width="15%"><?php echo $rowSub['Total_Meter']; ?></td>
    <td width="15%"><?php echo $rowSub['Total_Weight']; ?></td>
   <td width="15%"><?php echo $rowSub['Total_Pieces']; ?></td>
   <td width="15%"><?php echo $rowSub['Rate']; ?></td>
   <td width="15%"><?php echo $rowSub['Amt']; ?></td>
   <td width="10%"><?php echo $rowSub['R_Id']; ?></td> 
  </tr>
   <?php } while ($rowSub = mysql_fetch_assoc($rsSub)); ?>
                                    </tbody>
                                </table>
<?php 
}
?>
