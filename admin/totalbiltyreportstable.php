<?php error_reporting(0); 
include("databaseconnect.php");
if(isset($_REQUEST['Search']))
    {   
    $reportrange = $_REQUEST['reportrange']; 
	$splitdate = explode("-",$reportrange);
$date = $splitdate[0];
$date1 = $splitdate[1];
$dt = date('Y-m-d', strtotime($date));
$dt1 = date('Y-m-d', strtotime($date1)); 
	$query1 = "select * from bilty_details where bilty_details.B_Date between '".$dt."' and '".$dt1."' order by bilty_details.Bilty_Id asc ";
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
 <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                        <tr> 
                                        <th width="5%">Sr No.</th>
                                        <th width="10%">Bilty ID</th>
                                            <th width="10%">Date</th>
                                            <th width="12%">Reference No.</th>
                                            <th>Image</th>
                                            <th width="7%">#ID</th>
                                        </tr>
                                       </thead>
                                    <tbody>
    <?php
	          $i = 0;
	              $i++;
									do { ?>                                    
  <tr class="odd gradeX"> 
  <td><?php echo $i++; ?></td>
     <td><?php echo $rowMain['Bilty_Id']; ?></td>
     <td><?php echo $rowMain['B_Date']; ?></td>
     <td><?php echo $rowMain['Ref_No']; ?></td>
      <td><img width="100%" height="20%" src="<?php echo $rowMain['B_Image']; ?>"></td>
     <td><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
    <?php } while($rowMain=mysql_fetch_assoc($rsMain)); ?>
                                    </tbody>
                                </table>
<?php
 } ?>