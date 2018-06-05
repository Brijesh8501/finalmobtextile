<?php
include("databaseconnect.php");
if(isset($_REQUEST['SearchTaDC']))
    {   
    $reportrange = $_REQUEST['reportrange']; 
	$splitdate = explode("-",$reportrange);
$date = $splitdate[0];
$date1 = $splitdate[1];
$dt = date('Y-m-d', strtotime($date));
$dt1 = date('Y-m-d', strtotime($date1)); 
	$query1="SELECT taka_d_c_1.Taka_D_C_Id, taka_d_c_1.Taka_D_C_Date, customer_details.Cu_En_Name, broker_details1.B_Name, taka_d_c_1.T_Order_Id, taka_d_c_1.Total_Taka, taka_d_c_1.Entry_Id FROM taka_d_c_1, customer_details, broker_details1 WHERE customer_details.Customer_Id = taka_d_c_1.Customer_Id AND broker_details1.Broker_Id = taka_d_c_1.Broker_Id AND taka_d_c_1.Taka_D_C_Date between '".$dt."' and '".$dt1."' order by taka_d_c_1.Taka_D_C_Id asc";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
     $sql1= "SELECT taka_dcorg.Ta_D_C_Id, taka_d_c_1.Taka_D_C_Id,taka_d_c_1.Taka_D_C_Date, taka_dcorg.Taka_Id, taka_dcorg.Taka_Meter, taka_dcorg.Taka_Weight,taka_dcorg.R_Id, quality_details.Quality_Name, taka_dcorg.Status FROM taka_dcorg,taka_d_c_1,quality_details WHERE taka_d_c_1.Taka_D_C_Id = taka_dcorg.Taka_D_C_Id AND quality_details.Quality_Id = taka_dcorg.Quality_Id AND taka_d_c_1.Taka_D_C_Date between '".$dt."' and '".$dt1."'  order by taka_d_c_1.Taka_D_C_Id asc ";
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
    <a href="totaltakamainreportprint?print&reportrange=<?php echo $reportrange; ?>" target="_blank"><i class="icon-print"></i></a>
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
                                            <th>Taka</th>
                                            <th>Entry #ID</th>
                                            </tr>
                                       </thead>
                                    <tbody>
                                    <?php $i=0;
	  $i++;?>
      <?php do { ?>
  <tr class="odd gradeX"> 
    <td width="10%"><?php echo $i++; ?></td>
     <td width="15%"><?php echo $rowMain['Taka_D_C_Id']; ?></td>
    <td width="12%"><?php echo $rowMain['Taka_D_C_Date']; ?></td>
    <td width="25%"><?php echo $rowMain['Cu_En_Name']; ?></td>
    <td width="25%"><?php echo $rowMain['B_Name']; ?></td>
    <td width="15%"><?php echo $rowMain['T_Order_Id']; ?></td>
    <td width="15%"><?php echo $rowMain['Total_Taka']; ?></td>
    <td width="10%"><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
  <?php } while ($rowMain = mysql_fetch_assoc($rsMain)); ?>
                                    </tbody>
                                </table>
   <center><strong>****SUB-DETAILS CATEGORIZED BY CHALLAN ID****</strong></center> <div align="right">
    <a href="totaltakasubreportprint?print&reportrange=<?php echo $reportrange; ?>" target="_blank"><i class="icon-print"></i></a>
  </div>             
                             <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                        <tr> 
                                             <th>Sr No.</th>
                                             <th>Chal. ID & Sub-ID</th>
                                             <th>Taka ID</th>
                                             <th>Meter</th>
                                            <th>Weight</th>
                                            <th>Quality</th>
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
     <td><?php echo $rowSub['Taka_D_C_Id']; ?><br />(<?php echo $rowSub['Ta_D_C_Id']; ?>)</td>
    <td><?php echo $rowSub['Taka_Id']; ?></td>
    <td><?php echo $rowSub['Taka_Meter']; ?></td>
    <td><?php echo $rowSub['Taka_Weight']; ?></td>
   <td width="30%"><?php echo $rowSub['Quality_Name']; ?></td>
   <td><?php echo $rowSub['Status']; ?></td>
  <td><?php echo $rowSub['R_Id']; ?></td>
  </tr>
   <?php } while ($rowSub = mysql_fetch_assoc($rsSub)); ?>
                                    </tbody>
                                </table>
<?php 
}
?>
