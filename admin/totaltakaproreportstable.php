<?php error_reporting(0); 
include("databaseconnect.php");
if(isset($_REQUEST['SearchTaPro']))
    {   
    $reportrange = $_REQUEST['reportrange']; 
	$splitdate = explode("-",$reportrange);
$date = $splitdate[0];
$date1 = $splitdate[1];
$dt = date('Y-m-d', strtotime($date));
$dt1 = date('Y-m-d', strtotime($date1)); 
	$query1 = "select sum(taka_detailsorg.Taka_Meter) as Sum_Meter,sum(taka_detailsorg.Taka_Weight) as Sum_Weight, quality_details.Quality_Name from taka_detailsorg,quality_details where quality_details.Quality_Id = taka_detailsorg.Quality_Id AND taka_detailsorg.T_Date between '".$dt."' and '".$dt1."' group by quality_details.Quality_Name order by quality_details.Quality_Name asc";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
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
<a href="totaltakaproreportprint?print&reportrange=<?php echo $reportrange; ?>" target="_blank"><i class="icon-print"></i></a>
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
	$Tot_Wght = $Tot_Wght + $rowMain['Sum_Weight']; } while($rowMain=mysql_fetch_assoc($rsMain)); ?>
  <tr>
     <td colspan="4" align="right"><b>Total Meter : <?php echo $Tot_Mtr;?>&nbsp;&nbsp;&nbsp;Total Weight : <?php echo $Tot_Wght;?></b></td>
     </tr>
                                    </tbody>
                                </table>
<?php
 } ?>
    
