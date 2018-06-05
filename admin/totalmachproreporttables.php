<?php error_reporting(0); 
include("databaseconnect.php");
if(isset($_REQUEST['SearchMachPro']))
    {   
    $reportrange = $_REQUEST['reportrange']; 
	$splitdate = explode("-",$reportrange);
$date = $splitdate[0];
$date1 = $splitdate[1];
$dt = date('Y-m-d', strtotime($date));
$dt1 = date('Y-m-d', strtotime($date1)); 
$Machine_Id = $_REQUEST['Machine_Id'];
$Type = $_REQUEST['TypeMachPro'];
if($Type=='Taka')
{
	$query1 = "select sum(taka_detailsorg.Taka_Meter) as Sum_Meter, quality_details.Quality_Name,machine_details.Machine_No from taka_detailsorg,taka_production,quality_details,beam_machine,machine_details where taka_production.Ta_Pro_Id = taka_detailsorg.Ta_Pro_Id AND quality_details.Quality_Id = taka_detailsorg.Quality_Id AND beam_machine.Be_M_Id = taka_production.Be_M_Id AND machine_details.Machine_Id = beam_machine.Machine_Id AND beam_machine.Machine_Id = '$Machine_Id' AND taka_detailsorg.T_Date between '".$dt."' and '".$dt1."' group by quality_details.Quality_Name order by quality_details.Quality_Name asc";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
}
elseif($Type=='Saree')
{
	$query1 = "select sum(saree_detailsorg.Saree_Lot_Meter) as Sum_Meter, sum(saree_detailsorg.Saree_Pieces) as Sum_Pieces, quality_details.Quality_Name, design_details.Design, machine_details.Machine_No from saree_detailsorg,saree_production,quality_details,design_details,machine_details,beam_machine where saree_production.Sa_Pro_Id = saree_detailsorg.Sa_Pro_Id AND beam_machine.Be_M_Id = saree_production.Be_M_Id AND machine_details.Machine_Id = beam_machine.Machine_Id AND design_details.Design_Id = saree_detailsorg.Design_Id AND quality_details.Quality_Id = design_details.Quality_Id AND beam_machine.Machine_Id = '$Machine_Id' AND saree_detailsorg.Date between '".$dt."' and '".$dt1."' group by quality_details.Quality_Name order by quality_details.Quality_Name asc";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
}
	}
if($reportrange=="")
	{
		echo '<script>alert("Please select date range first....");</script>';
	}
elseif($Type=="")
{
		echo '<center>Please select search by type</center>';
	}
elseif($Machine_Id=="")
{
		echo '<center>Please select machine no</center>';
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
<div align="right">Machine No : <?php echo $rowMain['Machine_No'];?>&nbsp;&nbsp;&nbsp;
<a href="totalmachtakaproreportprint?print&reportrange=<?php echo $reportrange; ?>&Machine_Id=<?php echo $Machine_Id;?>" target="_blank"><i class="icon-print"></i></a>
</div>
 <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                        <tr> 
                                        <th width="7%">Sr No.</th>
                                             <th width="10%">Total Meter</th>
                                            <th width="30%">Quality</th>
                                         </tr>
                                       </thead>
                                    <tbody>
    <?php
	          $i = 0;
	              $i++;
									do { ?>                                    
  <tr class="odd gradeX"> 
  <td><?php echo $i++; ?></td>
    <td><?php echo $rowMain['Sum_Meter']; ?></td>
    <td><?php echo $rowMain['Quality_Name']; ?></td>
  </tr>
    <?php $Tot_Mtr = $Tot_Mtr + $rowMain['Sum_Meter']; } while($rowMain = mysql_fetch_assoc($rsMain)); ?>
  <tr>
     <td colspan="3" align="right"><b>Total Meter : <?php echo $Tot_Mtr;?></b></td>
     </tr>
                                    </tbody>
                                </table>
<?php
	}
	elseif($Type=='Saree')
	{
		?>
        <div align="right">Machine No : <?php echo $rowMain['Machine_No'];?>&nbsp;&nbsp;&nbsp;
<a href="totalmachsareeproreportprint?print&reportrange=<?php echo $reportrange; ?>&Machine_Id=<?php echo $Machine_Id;?>" target="_blank"><i class="icon-print"></i></a>
</div>
 <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                        <tr> 
                                        <th width="7%">Sr No.</th>
                                             <th width="10%">Total Meter</th>
                                             <th width="10%">Total Piecess</th>
                                            <th width="30%">Quality</th>
                                            <th width="20%">Design</th>
                                         </tr>
                                       </thead>
                                    <tbody>
    <?php
	          $i = 0;
	              $i++;
									do { ?>                                    
  <tr class="odd gradeX"> 
  <td><?php echo $i++; ?></td>
    <td><?php echo $rowMain['Sum_Meter']; ?></td>
    <td><?php echo $rowMain['Sum_Pieces']; ?></td>
    <td><?php echo $rowMain['Quality_Name']; ?></td>
    <td><?php echo $rowMain['Design']; ?></td>
  </tr>
    <?php $Tot_Mtr = $Tot_Mtr + $rowMain['Sum_Meter'];
	      $Tot_Piecess = $Tot_Piecess + $rowMain['Sum_Pieces']; } while($rowMain = mysql_fetch_assoc($rsMain)); ?>
  <tr>
     <td colspan="5" align="right"><b>Total Meter : <?php echo $Tot_Mtr;?>&nbsp;&nbsp;Total Piecess : <?php echo $Tot_Piecess;?></b></td>
     </tr>
                                    </tbody>
                                </table>
        <?php
	}
 } ?>
    
