<?php error_reporting(0); 
include("databaseconnect.php");
if(isset($_REQUEST['SearchMigration']))
    {   
    $reportrange = $_REQUEST['reportrange']; 
	$Type = $_REQUEST['TypeMigration'];
	$splitdate = explode("-",$reportrange);
$date = $splitdate[0];
$date1 = $splitdate[1];
$dt = date('Y-m-d', strtotime($date));
$dt1 = date('Y-m-d', strtotime($date1)); 
 if($Type=='Beam')
 {
	$query1 = "SELECT * FROM `beam_d_c_1migrate` where Beam_D_C_Date between '".$dt."' and '".$dt1."' order by Beam_D_C_Id asc ";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
      $sql1 = "select Be_D_C_Id,beam_d_c_1migrate.Beam_D_C_Id,beam_d_c_1migrate.Beam_D_C_Date,Chbe_D_C_Id,Beam_No,Taar,Beam_Meter,Weight,quality_details.Quality_Name,R_Id from beam_d_c_1migrate,beam_dcorgmigrate,quality_details where quality_details.Quality_Id = beam_dcorgmigrate.Quality_Id AND beam_d_c_1migrate.Beam_D_C_Id = beam_dcorgmigrate.Beam_D_C_Id AND beam_d_c_1migrate.Beam_D_C_Date between '".$dt."' and '".$dt1."'  order by beam_d_c_1migrate.Beam_D_C_Id asc ";
   $rsSub = mysql_query($sql1);
	$rowSub = mysql_fetch_array($rsSub);
	$totalRowsRsSub = mysql_num_rows($rsSub);
 }
 elseif($Type=='Bobbin')
 {
	$query1 = "SELECT * FROM `bobbin_d_cmigrate` where Bo_D_C_Date between '".$dt."' and '".$dt1."' order by Bo_D_C_Id asc ";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
      $sql1 = "select Bobbin_D_C_Id,bobbin_d_cmigrate.Bo_D_C_Id,bobbin_d_cmigrate.Bo_D_C_Date,Chbo_D_C_Id,quality_details.Quality_Name,Total_Cartoon,R_Id from bobbin_d_cmigrate,boobin_dcorgmigrate,quality_details where quality_details.Quality_Id = boobin_dcorgmigrate.Quality_Id AND bobbin_d_cmigrate.Bo_D_C_Id = boobin_dcorgmigrate.Bo_D_C_Id AND bobbin_d_cmigrate.Bo_D_C_Date between '".$dt."' and '".$dt1."'  order by bobbin_d_cmigrate.Bo_D_C_Id asc ";
   $rsSub = mysql_query($sql1);
	$rowSub = mysql_fetch_array($rsSub);
	$totalRowsRsSub = mysql_num_rows($rsSub);
 }
 elseif($Type=='Taka')
 {
	 $query1 = "SELECT * FROM `taka_d_c_migrate` where Taka_D_C_Date between '".$dt."' and '".$dt1."' order by Taka_D_C_Id asc ";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
      $sql1 = "select Ta_D_C_Id,taka_d_c_migrate.Taka_D_C_Id,Taka_Id,Taka_Meter,Taka_Weight,quality_details.Quality_Name,R_Id from taka_d_c_migrate,taka_dcorgmigrate,quality_details where quality_details.Quality_Id = taka_dcorgmigrate.Quality_Id AND taka_d_c_migrate.Taka_D_C_Id = taka_dcorgmigrate.Taka_D_C_Id AND taka_d_c_migrate.Taka_D_C_Date between '".$dt."' and '".$dt1."'  order by taka_d_c_migrate.Taka_D_C_Id asc ";
   $rsSub = mysql_query($sql1);
	$rowSub = mysql_fetch_array($rsSub);
	$totalRowsRsSub = mysql_num_rows($rsSub);
 }
 elseif($Type=='Saree')
 {
	 $query1 = "SELECT * FROM `saree_d_migrate` where Saree_D_C_Date between '".$dt."' and '".$dt1."' order by Saree_D_C_Id asc ";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
      $sql1 = "select Sa_D_C_Id,saree_d_migrate.Saree_D_C_Id,saree_d_migrate.Saree_D_C_Date,Saree_Lot_Id,Saree_Lot_Meter,Saree_Weight,Saree_Pieces,design_details.Design,quality_details.Quality_Name,R_Id from saree_d_migrate,saree_dcorgmigrate,design_details,quality_details where design_details.Design_Id = saree_dcorgmigrate.Design_Id AND quality_details.Quality_Id = design_details.Quality_Id AND saree_d_migrate.Saree_D_C_Id = saree_dcorgmigrate.Saree_D_C_Id AND saree_d_migrate.Saree_D_C_Date between '".$dt."' and '".$dt1."'  order by saree_d_migrate.Saree_D_C_Id asc ";
   $rsSub = mysql_query($sql1);
	$rowSub = mysql_fetch_array($rsSub);
	$totalRowsRsSub = mysql_num_rows($rsSub);
 }
 elseif($Type=='Other')
 {
	  $query1 = "SELECT * FROM `other_migrate` where Other_D_C_Date between '".$dt."' and '".$dt1."' order by Other_D_C_Id asc ";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
      $sql1 = "select Ot_D_C_Id,other_migrate.Other_D_C_Id,machine_parts.Mach_Pname,Quantity,R_Id from machine_parts,other_migrate,other_sub_orgmigrate where machine_parts.Mach_Part_Id = other_sub_orgmigrate.Mach_Part_Id AND other_migrate.Other_D_C_Id = other_sub_orgmigrate.Other_D_C_Id AND other_migrate.Other_D_C_Date between '".$dt."' and '".$dt1."'  order by other_migrate.Other_D_C_Id asc ";
   $rsSub = mysql_query($sql1);
	$rowSub = mysql_fetch_array($rsSub);
	$totalRowsRsSub = mysql_num_rows($rsSub);
 }
	}
if($reportrange=="")
	{
		echo '<script>alert("Please select date range first....");</script>';
	}
else if($Type=="")
{
	echo "<center>Please select search by type</center>";
}
else if($totalRowsRsMain==0)
{
	echo "<center>There is no record</center>";
}
else
{
	if($Type=='Beam')
	{
	?>
<div align="right">
<a href="totalmigratemainreportprint?print&reportrange=<?php echo $reportrange; ?>&Type=<?php echo $Type; ?>" target="_blank"><i class="icon-print"></i></a>
</div>
 <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                        <tr> 
                                        <th width="10%">Sr No.</th>
                                             <th width="15%">Migration-Challan ID</th>
                                             <th width="12%">Challan Date</th>
                                             <th width="25%">To</th>
                                             <th width="15%">Total Beam</th>
                                             <th width="15%">Status</th>
                                            <th width="15%">Entry Date</th>
                                             <th width="15%">Entry #ID</th>
                                        </tr>
                                       </thead>
                                    <tbody>
    <?php
	          $i=0;
	  $i++;
									do { ?>                                    
  <tr class="odd gradeX"> 
  <td><?php echo $i++; ?></td>
     <td><?php echo $rowMain['Beam_D_C_Id']; ?></td>
     <td><?php echo $rowMain['Beam_D_C_Date']; ?></td>
     <td><?php echo $rowMain['From_Ad']; ?></td>
    <td><?php echo $rowMain['Total_Beam']; ?></td>
    <td><?php echo $rowMain['Status']; ?></td>
    <td><?php echo $rowMain['Entry_Date']; ?></td>
    <td><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
    <?php } while($rowMain=mysql_fetch_assoc($rsMain)); ?>
                                    </tbody>
                                </table>
                      <center><strong>****SUB-DETAILS CATEGORIZED BY CHALLAN ID****</strong></center><div align="right">
<a href="totalmigratesubreportprint?print&reportrange=<?php echo $reportrange; ?>&Type=<?php echo $Type; ?>" target="_blank"><i class="icon-print"></i></a>
</div>
                             <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                        <tr> 
                                             <th width="7%">Sr No.</th>
                                             <th width="15%">Migration-Challan ID</th>
                                             <th width="15%">Beam No</th>
                                             <th width="15%">Meter</th>
                                             <th width="10%">Weight</th>
                                            <th width="30%">Quality</th>
                                            <th width="10%">#ID</th>
                                            </tr>
                               </thead>
                                    <tbody>
                                     <?php $i=0;
	  $i++;
									do { ?>                                
  <tr class="odd gradeX"> 
    <td><?php echo $i++; ?></td>
    <td><?php echo $rowSub['Beam_D_C_Id']; ?></td>
     <td><?php echo $rowSub['Beam_No']; ?></td>
     <td><?php echo $rowSub['Beam_Meter']; ?></td>
    <td><?php echo $rowSub['Weight']; ?></td>
    <td><?php echo $rowSub['Quality_Name']; ?></td>
    <td><?php echo $rowSub['R_Id']; ?></td>
    </tr>
  <?php } while($rowSub=mysql_fetch_assoc($rsSub)); ?>
                                    </tbody>
                              </table>
<?php
	}
	elseif($Type=='Bobbin')
	{?>
    <div align="right">
<a href="totalmigratemainreportprint?print&reportrange=<?php echo $reportrange; ?>&Type=<?php echo $Type; ?>" target="_blank"><i class="icon-print"></i></a>
</div>
 <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                        <tr> <th width="10%">Sr No.</th>
                                             <th width="15%">Migration-Challan ID</th>
                                             <th width="12%">Challan Date</th>
                                             <th width="25%">To</th>
                                             <th width="12%">Total Cartoon</th>
                                             <th width="10%">Status</th>
                                            <th width="15%">Entry Date</th>
                                             <th width="15%">Entry #ID</th>
                                        </tr>
                                       </thead>
                                    <tbody>
    <?php
	          $i=0;
	  $i++;
									do { ?>                                    
  <tr class="odd gradeX"> 
  <td><?php echo $i++; ?></td>
     <td><?php echo $rowMain['Bo_D_C_Id']; ?></td>
     <td><?php echo $rowMain['Bo_D_C_Date']; ?></td>
     <td><?php echo $rowMain['From_Ad']; ?></td>
    <td><?php echo $rowMain['Total_Cart']; ?></td>
    <td><?php echo $rowMain['Status']; ?></td>
    <td><?php echo $rowMain['Entry_Date']; ?></td>
    <td><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
    <?php } while($rowMain=mysql_fetch_assoc($rsMain)); ?>
                                    </tbody>
                                </table>
                      <center><strong>****SUB-DETAILS CATEGORIZED BY CHALLAN ID****</strong></center><div align="right">
<a href="totalmigratesubreportprint?print&reportrange=<?php echo $reportrange; ?>&Type=<?php echo $Type; ?>" target="_blank"><i class="icon-print"></i></a>
</div>
                             <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                        <tr> 
                                             <th width="7%">Sr No.</th>
                                             <th width="15%">Migration-Challan ID</th>
                                             <th width="15%">Cartoon</th>
                                            <th width="25%">Quality</th>
                                            <th width="10%">#ID</th>
                                            </tr>
                               </thead>
                                    <tbody>
                                     <?php $i=0;
	  $i++;
									do { ?>                                
  <tr class="odd gradeX"> 
    <td><?php echo $i++; ?></td>
    <td><?php echo $rowSub['Bo_D_C_Id']; ?></td>
     <td><?php echo $rowSub['Total_Cartoon']; ?></td>
    <td><?php echo $rowSub['Quality_Name']; ?></td>
    <td><?php echo $rowSub['R_Id']; ?></td>
    </tr>
  <?php } while($rowSub=mysql_fetch_assoc($rsSub)); ?>
                                    </tbody>
                              </table>
    <?php	}
	elseif($Type=='Taka')
	{
	?>
<div align="right">
<a href="totalmigratemainreportprint?print&reportrange=<?php echo $reportrange; ?>&Type=<?php echo $Type; ?>" target="_blank"><i class="icon-print"></i></a>
</div>
 <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                        <tr> 
                                        <th width="10%">Sr No.</th>
                                             <th width="15%">Migration-Challan ID</th>
                                             <th width="12%">Challan Date</th>
                                             <th width="25%">To</th>
                                             <th width="10%">Total Taka</th>
                                             <th width="10%">Status</th>
                                            <th width="15%">Entry Date</th>
                                             <th width="15%">Entry #ID</th>
                                        </tr>
                                       </thead>
                                    <tbody>
    <?php
	          $i=0;
	  $i++;
									do { ?>                                    
  <tr class="odd gradeX"> 
  <td><?php echo $i++; ?></td>
     <td><?php echo $rowMain['Taka_D_C_Id']; ?></td>
     <td><?php echo $rowMain['Taka_D_C_Date']; ?></td>
     <td><?php echo $rowMain['Taka_Mig']; ?></td>
    <td><?php echo $rowMain['Total_Taka']; ?></td>
    <td><?php echo $rowMain['Status']; ?></td>
    <td><?php echo $rowMain['Entry_Date']; ?></td>
    <td><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
    <?php } while($rowMain=mysql_fetch_assoc($rsMain)); ?>
                                    </tbody>
                                </table>
                      <center><strong>****SUB-DETAILS CATEGORIZED BY CHALLAN ID****</strong></center><div align="right">
<a href="totalmigratesubreportprint?print&reportrange=<?php echo $reportrange; ?>&Type=<?php echo $Type; ?>" target="_blank"><i class="icon-print"></i></a>
</div>
                             <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                        <tr> 
                                             <th width="7%">Sr No.</th>
                                             <th width="15%">Migration-Challan ID</th>
                                             <th width="15%">Taka ID</th>
                                             <th width="15%">Taka Meter</th>
                                             <th width="10%">Taka Weight</th>
                                            <th width="30%">Quality</th>
                                            </tr>
                               </thead>
                                    <tbody>
                                     <?php $i=0;
	  $i++;
									do { ?>                                
  <tr class="odd gradeX"> 
    <td><?php echo $i++; ?></td>
    <td><?php echo $rowSub['Taka_D_C_Id']; ?></td>
     <td><?php echo $rowSub['Taka_Id']; ?></td>
     <td><?php echo $rowSub['Taka_Meter']; ?></td>
    <td><?php echo $rowSub['Taka_Weight']; ?></td>
    <td><?php echo $rowSub['Quality_Name']; ?></td>
    </tr>
  <?php } while($rowSub=mysql_fetch_assoc($rsSub)); ?>
                                    </tbody>
                              </table>
<?php
	}
	elseif($Type=='Saree')
	{?>
    <div align="right">
<a href="totalmigratemainreportprint?print&reportrange=<?php echo $reportrange; ?>&Type=<?php echo $Type; ?>" target="_blank"><i class="icon-print"></i></a>
</div>
 <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                        <tr> <th width="10%">Sr No.</th>
                                             <th width="15%">Migration-Challan ID</th>
                                             <th width="12%">Challan Date</th>
                                             <th width="25%">To</th>
                                             <th width="10%">Total Lot</th>
                                             <th width="10%">Status</th>
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
     <td><?php echo $rowMain['Saree_D_C_Id']; ?></td>
     <td><?php echo $rowMain['Saree_D_C_Date']; ?></td>
     <td><?php echo $rowMain['Saree_Mig']; ?></td>
    <td><?php echo $rowMain['Total_Lot']; ?></td>
    <td><?php echo $rowMain['Status']; ?></td>
    <td><?php echo $rowMain['Entry_Date']; ?></td>
    <td><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
    <?php } while($rowMain=mysql_fetch_assoc($rsMain)); ?>
                                    </tbody>
                                </table>
                      <center><strong>****SUB-DETAILS CATEGORIZED BY CHALLAN ID****</strong></center><div align="right">
<a href="totalmigratesubreportprint?print&reportrange=<?php echo $reportrange; ?>&Type=<?php echo $Type; ?>" target="_blank"><i class="icon-print"></i></a>
</div>
                             <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                        <tr> 
                                             <th width="7%">Sr No.</th>
                                             <th width="15%">Migration-Challan ID</th>
                                             <th width="12%">Lot ID</th>
                                             <th width="10%">Lot Meter</th>
                                             <th width="10%">Lot Weight</th>
                                            <th width="7%">Piecess</th>
                                            <th width="25%">Quality</th>
                                            <th width="20%">Design</th>
                                            <th width="10%">#ID</th>
                                            </tr>
                               </thead>
                                    <tbody>
                                     <?php $i=0;
	  $i++;
									do { ?>                                
  <tr class="odd gradeX"> 
    <td><?php echo $i++; ?></td>
    <td><?php echo $rowSub['Saree_D_C_Id']; ?></td>
     <td><?php echo $rowSub['Saree_Lot_Id']; ?></td>
     <td><?php echo $rowSub['Saree_Lot_Meter']; ?></td>
    <td><?php echo $rowSub['Saree_Weight']; ?></td>
    <td><?php echo $rowSub['Saree_Pieces']; ?></td>
    <td><?php echo $rowSub['Quality_Name']; ?></td>
    <td><?php echo $rowSub['Design']; ?></td>
    <td><?php echo $rowSub['R_Id']; ?></td>
    </tr>
  <?php } while($rowSub=mysql_fetch_assoc($rsSub)); ?>
  
                                    </tbody>
                              </table>
    <?php	}
	elseif($Type=='Other')
	{?>
    <div align="right">
<a href="totalmigratemainreportprint?print&reportrange=<?php echo $reportrange; ?>&Type=<?php echo $Type; ?>" target="_blank"><i class="icon-print"></i></a>
</div>
 <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                        <tr> <th width="10%">Sr No.</th>
                                             <th width="15%">Migration-Challan ID</th>
                                             <th width="12%">Challan Date</th>
                                             <th width="25%">To</th>
                                             <th width="10%">Total</th>
                                             <th width="10%">Status</th>
                                            <th width="15%">Entry Date</th>
                                             <th width="15%">Entry #ID</th>
                                        </tr>
                                       </thead>
                                    <tbody>
    <?php
	          $i=0;
	  $i++;
									do { ?>                                    
  <tr class="odd gradeX"> 
  <td><?php echo $i++; ?></td>
     <td><?php echo $rowMain['Other_D_C_Id']; ?></td>
     <td><?php echo $rowMain['Other_D_C_Date']; ?></td>
     <td><?php echo $rowMain['From_Ad']; ?></td>
    <td><?php echo $rowMain['Total_Other']; ?></td>
    <td><?php echo $rowMain['Status']; ?></td>
    <td><?php echo $rowMain['Entry_Date']; ?></td>
    <td><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
    <?php } while($rowMain=mysql_fetch_assoc($rsMain)); ?>
                                    </tbody>
                                </table>
                      <center><strong>****SUB-DETAILS CATEGORIZED BY CHALLAN ID****</strong></center><div align="right">
<a href="totalmigratesubreportprint?print&reportrange=<?php echo $reportrange; ?>&Type=<?php echo $Type; ?>" target="_blank"><i class="icon-print"></i></a>
</div>
                             <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                        <tr> 
                                             <th width="7%">Sr No.</th>
                                             <th width="15%">Migration-Challan ID</th>
                                            <th width="25%">Machine-Parts</th>
                                            <th width="20%">Quanitity</th>
                                            <th width="10%">#ID</th>
                                            </tr>
                               </thead>
                                    <tbody>
                                     <?php $i=0;
	  $i++;
									do { ?>                                
  <tr class="odd gradeX"> 
    <td><?php echo $i++; ?></td>
    <td><?php echo $rowSub['Other_D_C_Id']; ?></td>
    <td><?php echo $rowSub['Mach_Pname']; ?></td>
    <td><?php echo $rowSub['Quantity']; ?></td>
    <td><?php echo $rowSub['R_Id']; ?></td>
    </tr>
  <?php } while($rowSub=mysql_fetch_assoc($rsSub)); ?>
                                    </tbody>
                              </table>
    <?php	}
 } ?>
    
