<?php error_reporting(0);
include("databaseconnect.php");
if(isset($_REQUEST['SearchSaDC']))
    {   
    $reportrange = $_REQUEST['reportrange']; 
	$splitdate = explode("-",$reportrange);
$date = $splitdate[0];
$date1 = $splitdate[1];
$dt= date('Y-m-d', strtotime($date));
$dt1= date('Y-m-d', strtotime($date1)); 
	$query1="SELECT saree_d_c.Saree_D_C_Id, saree_d_c.Saree_D_C_Date, customer_details.Cu_En_Name, broker_details1.B_Name, saree_d_c.Order_Id, saree_d_c.Total_Lot, saree_d_c.Entry_Id FROM saree_d_c, customer_details, broker_details1 WHERE customer_details.Customer_Id = saree_d_c.Customer_Id AND broker_details1.Broker_Id = saree_d_c.Broker_Id AND saree_d_c.Saree_D_C_Date between '".$dt."' and '".$dt1."' order by saree_d_c.Saree_D_C_Id asc";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
     $sql1= "SELECT saree_dcorg.Sa_D_C_Id, saree_d_c.Saree_D_C_Id, saree_d_c.Saree_D_C_Date, saree_dcorg.Saree_Lot_Id, saree_dcorg.Saree_Lot_Meter, saree_dcorg.Saree_Weight, saree_dcorg.Saree_Pieces, quality_details.Quality_Name, design_details.Design, saree_dcorg.Status, saree_dcorg.R_Id FROM saree_dcorg, saree_d_c, quality_details, design_details WHERE saree_d_c.Saree_D_C_Id = saree_dcorg.Saree_D_C_Id AND quality_details.Quality_Id = design_details.Quality_Id AND design_details.Design_Id = saree_dcorg.Design_Id AND saree_d_c.Saree_D_C_Date between '".$dt."' and '".$dt1."'  order by saree_d_c.Saree_D_C_Id asc ";
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
    <a href="totalsareemainreportprint?print&reportrange=<?php echo $reportrange; ?>" target="_blank"><i class="icon-print"></i></a>
  </div>
                             <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                        <tr> 
                                              <th>Sr No.</th>
                                             <th>Challan ID</th>
                                             <th>Challan Date</th>
                                             <th>Customer</th>
                                             <th>Broker</th>
                                            <th>Order ID</th>
                                            <th>Total Lot</th>
                                           <th>Entry #ID</th>
                                        </tr>
                                       </thead>
                                    <tbody>
                                    <?php $i=0;
	  $i++;?>
      <?php do { ?>
  <tr class="odd gradeX"> 
    <td><?php echo $i++; ?></td>
     <td width="15%"><?php echo $rowMain['Saree_D_C_Id']; ?></td>
    <td width="15%"><?php echo $rowMain['Saree_D_C_Date']; ?></td>
    <td width="25%"><?php echo $rowMain['Cu_En_Name']; ?></td>
    <td width="25%"><?php echo $rowMain['B_Name']; ?></td>
    <td width="15%"><?php echo $rowMain['Order_Id']; ?></td>
    <td width="15%"><?php echo $rowMain['Total_Lot']; ?></td>
    <td width="10%"><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
  <?php } while ($rowMain = mysql_fetch_assoc($rsMain)); ?>
                                    </tbody>
                                </table>
   <center><strong>****SUB-DETAILS CATEGORIZED BY CHALLAN ID****</strong></center> <div align="right">
    <a href="totalsareesubreportprint?print&reportrange=<?php echo $reportrange; ?>" target="_blank"><i class="icon-print"></i></a>
  </div>        
                             <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                        <tr> 
                                            <th>Sr No.</th>
                                             <th>Chal. ID & Sub-ID</th>
                                             <th>Lot ID</th>
                                             <th>Meter</th>
                                             <th>Weight</th>
                                             <th>Piecess</th>
                                             <th>Quality</th>
                                             <th>Design</th>
                                             <th>Status</th>
                                             <th>#ID</th>
                                            </tr>
                                      </thead>
                                    <tbody>
                                     <?php $i=0;
	  $i++;?>
                 <?php do { ?>     
  <tr class="odd gradeX"> 
    <td><?php echo $i++; ?></td>
     <td width="15%"><?php echo $rowSub['Saree_D_C_Id']; ?><br />(<?php echo $rowSub['Sa_D_C_Id']; ?>)</td>
    <td width="15%"><?php echo $rowSub['Saree_Lot_Id']; ?></td>
    <td width="15%"><?php echo $rowSub['Saree_Lot_Meter']; ?></td>
    <td width="15%"><?php echo $rowSub['Saree_Weight']; ?></td>
    <td width="10%"><?php echo $rowSub['Saree_Pieces']; ?></td>
   <td width="25%"><?php echo $rowSub['Quality_Name']; ?></td>
   <td width="25%"><?php echo $rowSub['Design']; ?></td>
   <td width="10%"><?php echo $rowSub['Status']; ?></td>
    <td width="10%"><?php echo $rowSub['R_Id']; ?></td>
  </tr>
   <?php } while ($rowSub = mysql_fetch_assoc($rsSub)); ?>
                                    </tbody>
                                </table>
<?php 
}
?>
