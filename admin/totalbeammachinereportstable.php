<?php error_reporting(0); 
include("databaseconnect.php");
if(isset($_REQUEST['SearchBeaMach']))
    {   
    $reportrange = $_REQUEST['reportrange']; 
	$splitdate = explode("-",$reportrange);
$date = $splitdate[0];
$date1 = $splitdate[1];
$dt = date('Y-m-d', strtotime($date));
$dt1 = date('Y-m-d', strtotime($date1)); 
	$query1 = "SELECT beam_machine.Be_M_Id, beam_dcorg.Beam_No, beam_dcorg.Beam_Meter, quality_details.Quality_Name, machine_details.Machine_No, beam_machine.Started_Date, beam_machine.Status, beam_machine.Entry_Id FROM `beam_machine`, `beam_dcorg`, `machine_details`,`quality_details` WHERE beam_dcorg.Be_D_C_Id = beam_machine.Be_D_C_Id AND machine_details.Machine_Id = beam_machine.Machine_Id AND quality_details.Quality_Id = beam_dcorg.Quality_Id AND beam_machine.Started_Date between '".$dt."' and '".$dt1."' order by beam_machine.Be_M_Id asc ";
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
<a href="totalbeammachinereportprint?print&reportrange=<?php echo $reportrange; ?>" target="_blank"><i class="icon-print"></i></a>
</div>
 <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                        <tr> 
                                        <th width="7%">Sr No.</th>
                                             <th width="15%">Beam-Machine ID</th>
                                             <th width="15%">Beam No.</th>
                                             <th width="10%">Beam Meter</th>
                                             <th width="30%">Quality</th>
                                             <th width="10%">Machine No</th>
                                            <th width="10%">Fitted Date</th>
                                            <th width="10%">Status</th>
                                            <th width="10%">Entry #ID</th>
                                        </tr>
                                       </thead>
                                    <tbody>
    <?php
	          $i = 0;
	              $i++;
									do { ?>                                    
  <tr class="odd gradeX"> 
  <td><?php echo $i++; ?></td>
     <td><?php echo $rowMain['Be_M_Id']; ?></td>
     <td><?php echo $rowMain['Beam_No']; ?></td>
    <td><?php echo $rowMain['Beam_Meter']; ?></td>
    <td><?php echo $rowMain['Quality_Name']; ?></td>
    <td><?php echo $rowMain['Machine_No']; ?></td>
    <td><?php echo $rowMain['Started_Date']; ?></td>
    <td><?php echo $rowMain['Status']; ?></td>
    <td><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
    <?php } while($rowMain=mysql_fetch_assoc($rsMain)); ?>
                                    </tbody>
                                </table>
<?php
 } ?>    
