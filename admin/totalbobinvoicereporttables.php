<?php
include("databaseconnect.php");
error_reporting(0);
if(isset($_REQUEST['SearchBoInvoice']))
    {   
    $reportrange = $_REQUEST['reportrange']; 
	$splitdate = explode("-",$reportrange);
$date = $splitdate[0];
$date1 = $splitdate[1];
$dt = date('Y-m-d', strtotime($date));
$dt1 = date('Y-m-d', strtotime($date1)); 
	$query1="SELECT bobbin_invoice.Bobbin_Invoice_Id, bobbin_invoice.Bobbin_Invoice_Date, bobbin_invoice.Invoice_No, bobbin_invoice.Bo_D_C_Id, company_deetaails.C_Name, broker_details1.B_Name, bobbin_invoice.Total_Amt, bobbin_invoice.Addtnl_Amt, bobbin_invoice.Grand_Amt, bobbin_invoice.Total_Cart, bobbin_invoice.Entry_Date, bobbin_invoice.Entry_Id FROM bobbin_invoice, company_deetaails, broker_details1 WHERE company_deetaails.Company_Id = bobbin_invoice.Company_Id AND broker_details1.Broker_Id = bobbin_invoice.Broker_Id AND bobbin_invoice.Bobbin_Invoice_Date between '".$dt."' and '".$dt1."' order by bobbin_invoice.Bobbin_Invoice_Id asc";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
    $sql1= "SELECT bobbin_invoiceorg.Bo_Invoice_Id, bobbin_invoice.Bobbin_Invoice_Id, bobbin_invoice.Bobbin_Invoice_Date, bobbin_invoice.Invoice_No, bobbin_invoiceorg.Total_Cartoon, bobbin_invoiceorg.Total_Weight, quality_details.Quality_Name, bobbin_invoiceorg.Rate, bobbin_invoiceorg.Amt, bobbin_invoiceorg.R_Id FROM bobbin_invoiceorg, bobbin_invoice, quality_details WHERE bobbin_invoice.Bobbin_Invoice_Id = bobbin_invoiceorg.Bobbin_Invoice_Id AND quality_details.Quality_Id = bobbin_invoiceorg.Quality_Id AND bobbin_invoice.Bobbin_Invoice_Date between '".$dt."' and '".$dt1."'  order by bobbin_invoice.Bobbin_Invoice_Id asc ";
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
    <a href="totalbobbininvoicemainreportprint?print&reportrange=<?php echo $reportrange; ?>" target="_blank"><i class="icon-print"></i></a>
  </div>
                             <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                        <tr> 
                                             <th>Sr No.</th>
                                             <th>Invoice ID</th>
                                             <th>Invoice No.</th>
                                             <th>Invoice Date</th>
                                             <th>Company</th>
                                            <th>Broker</th>
                                            <th>Total Cartoon</th>
                                            <th>Total Amount</th>
                                            <th>Additional Amount</th>
                                            <th>Grand Total</th>
                                            <th>Entry Date</th>
                                            <th>Entry #ID</th>
                                             </tr>
                                       </thead>
                                    <tbody>
                                    <?php $i=0;
	  $i++;?>
      <?php do { ?>
  <tr class="odd gradeX"> 
    <td width="10%"><?php echo $i++; ?></td>
     <td width="15%"><?php echo $rowMain['Bobbin_Invoice_Id']; ?></td>
    <td width="15%"><?php echo $rowMain['Invoice_No']; ?></td>
    <td width="15%"><?php echo $rowMain['Bobbin_Invoice_Date']; ?></td>
    <td width="30%"><?php echo $rowMain['C_Name']; ?></td>
    <td width="30%"><?php echo $rowMain['B_Name']; ?></td>
    <td width="15%"><?php echo $rowMain['Total_Cart']; ?></td>
    <td width="15%"><?php echo $rowMain['Total_Amt']; ?></td>
    <td width="15%"><?php echo $rowMain['Addtnl_Amt']; ?></td>
    <td width="15%"><?php echo $rowMain['Grand_Amt']; ?></td>
    <td width="15%"><?php echo $rowMain['Entry_Date']; ?></td>
    <td width="10%"><?php echo $rowMain['Entry_Id']; ?></td>
    </tr>
  <?php } while ($rowMain = mysql_fetch_assoc($rsMain)); ?>
                                    </tbody>
                                </table>
    <center><strong>****SUB-DETAILS CATEGORIZED BY INVOICE ID****</strong></center><div align="right">
    <a href="totalbobbininvoicesubreportprint?print&reportrange=<?php echo $reportrange; ?>" target="_blank"><i class="icon-print"></i></a>
  </div>              
                             <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                        <tr> 
                                             <th>Sr No.</th>
                                             <th>Invoice ID</th>
                                             <th>Invoice No.</th>
                                             <th>Total Cartoon</th>
                                             <th>Total Weight</th>
                                            <th>Quality</th>
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
    <td width="10%"><?php echo $i++; ?></td>
     <td width="15%"><?php echo $rowSub['Bobbin_Invoice_Id']; ?></td>
     <td width="15%"><?php echo $rowSub['Invoice_No']; ?></td>
    <td width="10%"><?php echo $rowSub['Total_Cartoon']; ?></td>
    <td width="10%"><?php echo $rowSub['Total_Weight']; ?></td>
    <td width="30%"><?php echo $rowSub['Quality_Name']; ?></td>
    <td width="10%"><?php echo $rowSub['Rate']; ?></td>
    <td width="15%"><?php echo $rowSub['Amt']; ?></td>
    <td width="10%"><?php echo $rowSub['R_Id']; ?></td>
    </tr>
   <?php } while ($rowSub = mysql_fetch_assoc($rsSub)); ?>
                                    </tbody>
                                </table>
<?php 
}
?>
