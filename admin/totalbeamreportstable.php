<?php error_reporting(0); 
include("databaseconnect.php");
if(isset($_REQUEST['SearchBeamDC']))
    {   
    $reportrange = $_REQUEST['reportrange']; 
	$splitdate = explode("-",$reportrange);
$date = $splitdate[0];
$date1 = $splitdate[1];
$dt = date('Y-m-d', strtotime($date));
$dt1 = date('Y-m-d', strtotime($date1)); 
	$query1="SELECT beam_d_c_1.Beam_D_C_Id, beam_d_c_1.Beam_D_C_No,company_deetaails.C_Name, broker_details1.B_Name,beam_d_c_1.Total_Beam,beam_d_c_1.Beam_D_C_Date,beam_d_c_1.Entry_Date,beam_d_c_1.Entry_Id FROM beam_d_c_1, company_deetaails, broker_details1 WHERE beam_d_c_1.Company_Id = company_deetaails.Company_Id AND beam_d_c_1.Broker_Id = broker_details1.Broker_Id AND beam_d_c_1.Beam_D_C_Date between '".$dt."' and '".$dt1."' order by beam_d_c_1.Beam_D_C_Id asc ";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
      $sql1= "SELECT beam_d_c_1.Beam_D_C_No,beam_d_c_1.Beam_D_C_Id,beam_dcorg.Be_D_C_Id,beam_dcorg.Beam_No, beam_dcorg.Taar, beam_dcorg.Beam_Meter, beam_dcorg.Weight, beam_dcorg.Status,beam_dcorg.R_Id, quality_details.Quality_Name FROM beam_d_c_1,beam_dcorg, quality_details WHERE beam_dcorg.Quality_Id = quality_details.Quality_Id AND beam_d_c_1.Beam_D_C_Id = beam_dcorg.Beam_D_C_Id AND beam_d_c_1.Beam_D_C_Date between '".$dt."' and '".$dt1."' order by beam_d_c_1.Beam_D_C_Id asc ";
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
<a href="totalbeammainreportprint?print&reportrange=<?php echo $reportrange; ?>" target="_blank"><i class="icon-print"></i></a>
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
                                            <th>Beam</th>
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
     <td width="15%"><?php echo $rowMain['Beam_D_C_Id']; ?></td>
    <td width="20%"><?php echo $rowMain['Beam_D_C_No']; ?></td>
    <td width="10%"><?php echo $rowMain['Beam_D_C_Date']; ?></td>
    <td width="30%"><?php echo $rowMain['C_Name']; ?></td>
    <td width="40%"><?php echo $rowMain['B_Name']; ?></td>
    <td width="20%"><?php echo $rowMain['Total_Beam']; ?></td>
    <td width="10%"><?php echo $rowMain['Entry_Date']; ?></td>
    <td width="10%"><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
    <?php } while($rowMain=mysql_fetch_assoc($rsMain)); ?>
                                    </tbody>
                                </table>
     <center><strong>****SUB-DETAILS CATEGORIZED BY CHALLAN ID****</strong></center>
                            <div align="right">
 <a href="totalbeamsubreportprint?print&reportrange=<?php echo $reportrange; ?>" target="_blank"><i class="icon-print"></i></a>
</div>
                             <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                        <tr> 
                                             <th>Sr No.</th>
                                             <th>Chal. ID & Sub-ID</th>
                                             <th>Challan No.</th>
                                             <th>Beam No.</th>
                                             <th>Taar</th>
                                             <th>Meter</th>
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
     <td width="15%"><?php echo $rowSub['Beam_D_C_Id']; ?><br />(<?php echo $rowSub['Be_D_C_Id']; ?>)</td>
     <td width="15%"><?php echo $rowSub['Beam_D_C_No']; ?></td>
    <td width="15%"><?php echo $rowSub['Beam_No']; ?></td>
    <td width="10%"><?php echo $rowSub['Taar']; ?></td>
    <td width="10%"><?php echo $rowSub['Beam_Meter']; ?></td>
    <td width="10%"><?php echo $rowSub['Weight']; ?></td>
    <td width="40%"><?php echo $rowSub['Quality_Name']; ?></td>
    <td width="10%"><?php echo $rowSub['Status']; ?></td>
   <td width="10%"><?php echo $rowSub['R_Id']; ?></td>
   </tr>
  <?php } while($rowSub=mysql_fetch_assoc($rsSub)); ?>
                                    </tbody>
                              </table>
<?php
 } ?>
    
