<?php error_reporting(0); 
include("databaseconnect.php");
if(isset($_REQUEST['Searchbeabob']))
    {   
    $reportrange = $_REQUEST['reportrange']; 
	$splitdate = explode("-",$reportrange);
$date = $splitdate[0];
$date1 = $splitdate[1];
$dt = date('Y-m-d', strtotime($date));
$dt1 = date('Y-m-d', strtotime($date1)); 
$Type = $_REQUEST['Typebeabob'];
if($Type=='Beam')
{
	$query1 = "select sum(beam_dcorg.Beam_Meter) as Sum_Meter, sum(beam_dcorg.Weight) as Sum_Weight, quality_details.Quality_Name from beam_d_c_1,beam_dcorg,quality_details where beam_d_c_1.Beam_D_C_Id = beam_dcorg.Beam_D_C_Id AND quality_details.Quality_Id = beam_dcorg.Quality_Id AND beam_dcorg.Status = 'NotReturn' AND beam_d_c_1.Beam_D_C_Date between '".$dt."' and '".$dt1."' group by quality_details.Quality_Name order by quality_details.Quality_Name asc";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
}
elseif($Type=='Bobbin')
{
	$query1 = "select sum(boobin_dcorg.Total_Cartoon) as Sum_Cartoon, sum(boobin_dcorg.Total_Weight) as Sum_Weight, quality_details.Quality_Name from boobin_dcorg,bobbin_d_c,quality_details where bobbin_d_c.Bo_D_C_Id = boobin_dcorg.Bo_D_C_Id AND quality_details.Quality_Id = boobin_dcorg.Quality_Id AND boobin_dcorg.Status = 'NotReturn-used' AND bobbin_d_c.Bo_D_C_Date between '".$dt."' and '".$dt1."' group by quality_details.Quality_Name order by quality_details.Quality_Name asc";
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
		echo "<center>You cannot search records, only by date range</center>";
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
<a href="totbeabobreportprint?print&reportrange=<?php echo $reportrange; ?>" target="_blank"><i class="icon-print"></i></a>
</div>
 <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                        <tr> 
                                        <th width="7%">Sr No.</th>
                                             <th width="10%">Total Meter</th>
                                             <th width="10%">Total Weight</th>
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
    <td><?php echo $rowMain['Sum_Weight']; ?></td>
    <td><?php echo $rowMain['Quality_Name']; ?></td>
  </tr>
    <?php $Tot_Mtr = $Tot_Mtr + $rowMain['Sum_Meter'];
	$Tot_Weight = $Tot_Weight + $rowMain['Sum_Weight']; } while($rowMain = mysql_fetch_assoc($rsMain)); ?>
  <tr>
     <td colspan="4" align="right"><b>Total Meter : <?php echo $Tot_Mtr;?>&nbsp;&nbsp;Total Weight : <?php echo $Tot_Weight;?></b></td>
     </tr>
                                    </tbody>
                                </table>
<?php
	}
	elseif($Type=='Bobbin')
	{
		?>
        <div align="right">
<a href="totbobbeareportprint?print&reportrange=<?php echo $reportrange; ?>" target="_blank"><i class="icon-print"></i></a>
</div>
 <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                        <tr> 
                                        <th width="7%">Sr No.</th>
                                             <th width="10%">Total Cartoon</th>
                                             <th width="10%">Total Weight</th>
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
    <td><?php echo $rowMain['Sum_Cartoon']; ?></td>
    <td><?php echo $rowMain['Sum_Weight']; ?></td>
    <td><?php echo $rowMain['Quality_Name']; ?></td>
  </tr>
    <?php $Tot_Cartoon = $Tot_Mtr + $rowMain['Sum_Cartoon'];
	      $Tot_Weight = $Tot_Piecess + $rowMain['Sum_Weight']; } while($rowMain = mysql_fetch_assoc($rsMain)); ?>
  <tr>
     <td colspan="5" align="right"><b>Total Cartoon : <?php echo $Tot_Cartoon;?>&nbsp;&nbsp;Total Weight : <?php echo $Tot_Weight;?></b></td>
     </tr>
                                    </tbody>
                                </table>
        <?php
	}
 } ?>
    
