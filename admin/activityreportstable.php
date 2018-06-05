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
$Type = $_REQUEST['Type'];
if($reportrange!="" && $Type!="")
{
	$query1 = "select * from activity where Action = '$Type' and Date between '".$dt."' and '".$dt1."' order by Activity_Id asc ";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
}
elseif($reportrange!="")
{
	$query1 = "select * from activity where Date between '".$dt."' and '".$dt1."' order by Activity_Id asc ";
    $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
}
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
<a href="totalcourierprint?print&reportrange=<?php echo $reportrange; ?>" target="_blank"><i class="icon-print"></i></a>
</div>
 <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                        <tr> 
                                        <th width="5%">Sr No.</th>
                                        <th width="15%">Date</th>
                                            <th width="50%">Particular</th>
                                            <th width="10%">#ID</th>
                                            <th width="15%">Type</th>
                                          </tr>
                                       </thead>
                                    <tbody>
    <?php
	          $i = 0;
	              $i++;
									do { ?>                                    
  <tr class="odd gradeX"> 
  <td><?php echo $i++; ?></td>
     <td><?php echo $rowMain['Datefull']; ?></td>
                                            <td><?php echo $rowMain['Particular']; ?></td>
                                            <td><?php echo $rowMain['Id']; ?></td>
                                            <?php if($rowMain['Action']=="insert") { ?>
                                            <td style="background-color:#060;color:#FFF"><?php echo $rowMain['Type']; ?></td>
                                            <?php } elseif($rowMain['Action']=="update") { ?>
                                             <td style="background-color:#FAB027;color:#FFF"><?php echo $rowMain['Type']; ?></td>
                                            <?php } elseif($rowMain['Action']=="delete") { ?>
                                             <td style="background-color:#F00;color:#FFF"><?php echo $rowMain['Type']; ?></td>
                                             <?php } elseif($rowMain['Action']=="search") { ?>
                                             <td style="background-color:#F60;color:#FFF"><?php echo $rowMain['Type']; ?></td>
                                              <?php } elseif($rowMain['Action']=="view") { ?>
                                             <td style="background-color:#609;color:#FFF"><?php echo $rowMain['Type']; ?></td>
                                            <?php } ?>
   </tr>
    <?php } while($rowMain=mysql_fetch_assoc($rsMain)); ?>
                                    </tbody>
                                </table>
<?php
 } ?>
    
