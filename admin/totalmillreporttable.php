<?php error_reporting(0); 
include("databaseconnect.php");
if(isset($_REQUEST['SearchMill']))
    {   
    $reportrange = $_REQUEST['reportrange']; 
	$Type = $_REQUEST['TypeMill'];
	$splitdate = explode("-",$reportrange);
$date = $splitdate[0];
$date1 = $splitdate[1];
$dt = date('Y-m-d', strtotime($date));
$dt1 = date('Y-m-d', strtotime($date1)); 
 if($Type=='Taka')
 {
	$query1 = "SELECT * FROM `taka_d_c_mill` where Taka_D_C_Date between '".$dt."' and '".$dt1."' order by Taka_D_C_Id asc ";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
      $sql1 = "select Ta_D_C_Id,taka_d_c_mill.Taka_D_C_Id,Taka_Id,Taka_Meter,Taka_Weight,quality_details.Quality_Name,R_Id,taka_d_c_mill.Taka_D_C_Date from taka_dcorgmill,quality_details,taka_d_c_mill where quality_details.Quality_Id = taka_dcorgmill.Quality_Id AND taka_d_c_mill.Taka_D_C_Id = taka_dcorgmill.Taka_D_C_Id AND taka_d_c_mill.Taka_D_C_Date between '".$dt."' and '".$dt1."'  order by taka_d_c_mill.Taka_D_C_Id asc ";
   $rsSub = mysql_query($sql1);
	$rowSub = mysql_fetch_array($rsSub);
	$totalRowsRsSub = mysql_num_rows($rsSub);
 }
 elseif($Type=='Saree')
 {
	$query1 = "SELECT * FROM `saree_d_mill` where Saree_D_C_Date between '".$dt."' and '".$dt1."' order by Saree_D_C_Id asc ";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
      $sql1 = "select Sa_D_C_Id,saree_d_mill.Saree_D_C_Id,Saree_Lot_Id,Saree_Lot_Meter,Saree_Weight,Saree_Pieces,design_details.Design,quality_details.Quality_Name,R_Id,saree_d_mill.Saree_D_C_Date from saree_dcorgmill,design_details,quality_details,saree_d_mill where design_details.Design_Id = saree_dcorgmill.Design_Id AND quality_details.Quality_Id = design_details.Quality_Id AND saree_d_mill.Saree_D_C_Id = saree_dcorgmill.Saree_D_C_Id AND saree_d_mill.Saree_D_C_Date between '".$dt."' and '".$dt1."'  order by saree_d_mill.Saree_D_C_Id asc ";
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
	if($Type=='Taka')
	{
	?>
<div align="right">
<a href="totalmillmainreportprint?print&reportrange=<?php echo $reportrange; ?>&Type=<?php echo $Type; ?>" target="_blank"><i class="icon-print"></i></a>
</div>
 <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                        <tr> 
                                        <th width="10%">Sr No.</th>
                                             <th width="15%">Mill-Challan ID</th>
                                             <th width="12%">Challan Date</th>
                                             <th width="25%">Mill</th>
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
     <td><?php echo $rowMain['Taka_Mill']; ?></td>
    <td><?php echo $rowMain['Total_Taka']; ?></td>
    <td><?php echo $rowMain['Status']; ?></td>
    <td><?php echo $rowMain['Entry_Date']; ?></td>
    <td><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
    <?php } while($rowMain=mysql_fetch_assoc($rsMain)); ?>
                                    </tbody>
                                </table>
                      <center><strong>****SUB-DETAILS CATEGORIZED BY CHALLAN ID****</strong></center><div align="right">
<a href="totalmillsubreportprint?print&reportrange=<?php echo $reportrange; ?>&Type=<?php echo $Type; ?>" target="_blank"><i class="icon-print"></i></a>
</div>
                             <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                        <tr> 
                                             <th width="7%">Sr No.</th>
                                             <th width="15%">MILL-Challan ID</th>
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
<a href="totalmillmainreportprint?print&reportrange=<?php echo $reportrange; ?>&Type=<?php echo $Type; ?>" target="_blank"><i class="icon-print"></i></a>
</div>
 <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                        <tr> <th width="10%">Sr No.</th>
                                             <th width="15%">Mill-Challan ID</th>
                                             <th width="12%">Challan Date</th>
                                             <th width="25%">Mill</th>
                                             <th width="10%">Total Lot</th>
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
     <td><?php echo $rowMain['Saree_D_C_Id']; ?></td>
     <td><?php echo $rowMain['Saree_D_C_Date']; ?></td>
     <td><?php echo $rowMain['Saree_Mill']; ?></td>
    <td><?php echo $rowMain['Total_Lot']; ?></td>
    <td><?php echo $rowMain['Status']; ?></td>
    <td><?php echo $rowMain['Entry_Date']; ?></td>
    <td><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
    <?php } while($rowMain=mysql_fetch_assoc($rsMain)); ?>
                                    </tbody>
                                </table>
                      <center><strong>****SUB-DETAILS CATEGORIZED BY CHALLAN ID****</strong></center><div align="right">
<a href="totalmillsubreportprint?print&reportrange=<?php echo $reportrange; ?>&Type=<?php echo $Type; ?>" target="_blank"><i class="icon-print"></i></a>
</div>
                             <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                        <tr> 
                                             <th width="7%">Sr No.</th>
                                             <th width="15%">MILL-Challan ID</th>
                                             <th width="15%">Lot ID</th>
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
 } ?>
    
