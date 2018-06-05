<?php
include("databaseconnect.php");
if(isset($_REQUEST['SearchBoDC']))
    {   
    $reportrange = $_REQUEST['reportrange']; 
	$splitdate = explode("-",$reportrange);
$date = $splitdate[0];
$date1 = $splitdate[1];
$dt = date('Y-m-d', strtotime($date));
$dt1 = date('Y-m-d', strtotime($date1)); 
	$query1="SELECT bobbin_d_c.Bo_D_C_Id, bobbin_d_c.Bo_D_C_Date, bobbin_d_c.Bo_D_C_No, company_deetaails.C_Name, broker_details1.B_Name,bobbin_d_c.Total_Cart,bobbin_d_c.Entry_Date,bobbin_d_c.Entry_Id FROM bobbin_d_c, company_deetaails, broker_details1 WHERE bobbin_d_c.Company_Id = company_deetaails.Company_Id AND bobbin_d_c.Broker_Id = broker_details1.Broker_Id AND bobbin_d_c.Bo_D_C_Date between '".$dt."' and '".$dt1."' order by bobbin_d_c.Bo_D_C_Id asc";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
     $sql1= "SELECT bobbin_d_c.Bo_D_C_No, bobbin_d_c.Bo_D_C_Id,boobin_dcorg.Bobbin_D_C_Id,quality_details.Quality_Name, boobin_dcorg.Total_Cartoon, boobin_dcorg.Total_Weight, boobin_dcorg.Status, boobin_dcorg.R_Id FROM bobbin_d_c, boobin_dcorg, quality_details WHERE bobbin_d_c.Bo_D_C_Id = boobin_dcorg.Bo_D_C_Id AND boobin_dcorg.Quality_Id = quality_details.Quality_Id AND bobbin_d_c.Bo_D_C_Date between '".$dt."' and '".$dt1."'  order by bobbin_d_c.Bo_D_C_Id asc ";
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
    <a href="totalbobbinmainreportprint?print&reportrange=<?php echo $reportrange; ?>" target="_blank"><i class="icon-print"></i></a>
  </div>
                             <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                        <tr> 
                                             <th>Sr No.</th>
                                             <th>Challan ID</th>
                                             <th>Challan No.</th>
                                             <th>Challan Date</th>
                                             <th>Company</th>
                                            <th>Broker</th>
                                            <th>Total Cartoon</th>
                                           <th>Entry Date</th>
                                           <th>Entry #ID</th>
                                        </tr>
                                       </thead>
                                    <tbody>
                                    <?php $i=0;
	  $i++;
       do { ?>
  <tr class="odd gradeX"> 
    <td width="7%"><?php echo $i++; ?></td>
     <td width="15%"><?php echo $rowMain['Bo_D_C_Id']; ?></td>
    <td width="20%"><?php echo $rowMain['Bo_D_C_No']; ?></td>
    <td width="10%"><?php echo $rowMain['Bo_D_C_Date']; ?></td>
    <td width="30%"><?php echo $rowMain['C_Name']; ?></td>
    <td width="40%"><?php echo $rowMain['B_Name']; ?></td>
    <td width="20%"><?php echo $rowMain['Total_Cart']; ?></td>
    <td width="20%"><?php echo $rowMain['Entry_Date']; ?></td>
    <td width="10%"><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
  <?php } while ($rowMain = mysql_fetch_assoc($rsMain)); ?>
                                    </tbody>
                                </table>
   <center><strong>****SUB-DETAILS CATEGORIZED BY CHALLAN ID****</strong></center> <div align="right">
    <a href="totalbobbinsubreportprint?print&reportrange=<?php echo $reportrange; ?>" target="_blank"><i class="icon-print"></i></a>
  </div>               
                             <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                        <tr> 
                                             <th>Sr No.</th>
                                             <th>Chal. ID & Sub-ID</th>
                                             <th>Challan No.</th>
                                             <th>Cartoon</th>
                                             <th>Weight</th>
                                            <th>Quality</th>
                                            <th>Status</th>
                                            <th>#ID</th>
                                        </tr>
                                       </thead>
                                    <tbody>
                                     <?php $i=0;
	  $i++;
                  do { ?>     
  <tr class="odd gradeX"> 
    <td width="7%"><?php echo $i++; ?></td>
    <td width="15%"><?php echo $rowSub['Bo_D_C_Id']; ?><br />(<?php echo $rowSub['Bobbin_D_C_Id']; ?>)</td>
     <td width="20%"><?php echo $rowSub['Bo_D_C_No']; ?></td>
    <td width="7%"><?php echo $rowSub['Total_Cartoon']; ?></td>
    <td width="10%"><?php echo $rowSub['Total_Weight']; ?></td>
    <td width="40%"><?php echo $rowSub['Quality_Name']; ?></td>
    <td width="15%"><?php echo $rowSub['Status']; ?></td>
    <td width="10%"><?php echo $rowSub['R_Id']; ?></td>
</tr>
   <?php } while ($rowSub = mysql_fetch_assoc($rsSub)); ?>
                                    </tbody>
                                </table>
<?php 
}
?>
