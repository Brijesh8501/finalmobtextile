<?php
include("databaseconnect.php");
if(isset($_REQUEST['SearchTaInv']))
    {   
    $reportrange = $_REQUEST['reportrange']; 
	$splitdate = explode("-",$reportrange);
$date = $splitdate[0];
$date1 = $splitdate[1];
$dt = date('Y-m-d', strtotime($date));
$dt1 = date('Y-m-d', strtotime($date1)); 
	$query1="SELECT taka_invoice.Taka_Invoice_Id, taka_invoice.Taka_Invoice_Date, taka_invoice.Taka_D_C_Id, taka_invoice.Taka_D_C_Date, customer_details.Cu_En_Name, broker_details1.B_Name, taka_invoice.Broker_Id, taka_invoice.Total_Amt, taka_invoice.Discount, taka_invoice.Grandtotal, taka_invoice.Entry_Id FROM taka_invoice, customer_details, broker_details1 WHERE customer_details.Customer_Id = taka_invoice.Customer_Id AND broker_details1.Broker_Id = taka_invoice.Broker_Id AND taka_invoice.Taka_Invoice_Date between '".$dt."' and '".$dt1."' order by taka_invoice.Taka_Invoice_Id asc";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
     $sql1= "SELECT taka_invoiceorg.Ta_Invoice_Id, taka_invoice.Taka_Invoice_Id, taka_invoice.Taka_Invoice_Date, quality_details.Quality_Name, taka_invoiceorg.Total_Taka, taka_invoiceorg.Total_Meter, taka_invoiceorg.Rate, taka_invoiceorg.Amt,taka_invoiceorg.R_Id FROM taka_invoiceorg, taka_invoice, quality_details WHERE taka_invoice.Taka_Invoice_Id = taka_invoiceorg.Taka_Invoice_Id AND quality_details.Quality_Id = taka_invoiceorg.Quality_Id AND taka_invoice.Taka_Invoice_Date between '".$dt."' and '".$dt1."'  order by taka_invoice.Taka_Invoice_Id asc ";
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
    <a href="totaltakainvoicemainreportprint?print&reportrange=<?php echo $reportrange; ?>" target="_blank"><i class="icon-print"></i></a>
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
    <td width="10%"><?php echo $rowMain['Taka_Invoice_Id']; ?></td>
    <td width="10%"><?php echo $rowMain['Taka_Invoice_Date']; ?></td>
     <td width="10%"><?php echo $rowMain['Taka_D_C_Id']; ?></td>
    <td width="10%"><?php echo $rowMain['Taka_D_C_Date']; ?></td>
    <td width="20%"><?php echo $rowMain['Cu_En_Name']; ?></td>
    <td width="20%"><?php echo $rowMain['B_Name']; ?></td>
    <td width="10%"><?php echo $rowMain['Total_Amt']; ?></td>
    <td width="10%"><?php echo $rowMain['Discount']; ?> %</td>
     <td width="10%"><?php echo $rowMain['Grandtotal']; ?></td>
     <td width="10%"><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
  <?php } while ($rowMain = mysql_fetch_assoc($rsMain)); ?>
                                    </tbody>
                                </table>
   <center><strong>****SUB-DETAILS CATEGORIZED BY INVOICE ID****</strong></center> <div align="right">
    <a href="totaltakainvoicesubreportprint?print&reportrange=<?php echo $reportrange; ?>" target="_blank"><i class="icon-print"></i></a>
  </div>                
                             <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                        <tr> 
                                             <th>Sr No.</th>
                                             <th>Invoice ID</th>
                                             <th>Quality</th>
                                             <th>Total Taka</th>
                                            <th>Total Meters</th>
                                            <th>Rate</th>
                                            <th>Amount</th>
                                            <th>#ID</th>
                                               </tr>
                                       </thead>
                                    <tbody>
                                     <?php $i=0;
	  $i++;?>
                 <?php do { ?>     
  <tr class="odd gradeX"> 
    <td><?php echo $i++; ?></td>
     <td><?php echo $rowSub['Taka_Invoice_Id']; ?></td>
    <td><?php echo $rowSub['Quality_Name']; ?></td>
    <td><?php echo $rowSub['Total_Taka']; ?></td>
    <td><?php echo $rowSub['Total_Meter']; ?></td>
   <td><?php echo $rowSub['Rate']; ?></td>
   <td><?php echo $rowSub['Amt']; ?></td>
   <td><?php echo $rowSub['R_Id']; ?></td>
 </tr>
   <?php } while ($rowSub = mysql_fetch_assoc($rsSub)); ?>
                                    </tbody>
                                </table>
<?php 
}
?>
