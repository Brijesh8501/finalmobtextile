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
	$query1 = "select Courier_Id,courier_company.Cou_Comp,C_No,C_Date,C_Pro,Destination,Top,Amt,courier_details.Entry_Id from courier_company,courier_details where courier_company.Cou_Com_Id = courier_details.Cou_Com_Id AND courier_details.C_Date between '".$dt."' and '".$dt1."' order by courier_details.Courier_Id asc ";
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
<a href="totalcourierprint?print&reportrange=<?php echo $reportrange; ?>" target="_blank"><i class="icon-print"></i></a>
</div>
 <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                        <tr> 
                                        <th width="5%">Sr No.</th>
                                        <th width="10%">Courier ID</th>
                                            <th width="20%">Courier-Company</th>
                                            <th width="10%">C_No</th>
                                            <th width="10%">C_Date</th>
                                            <th width="10%">C_Thing</th>
                                            <th width="10%">Destination</th>
                                            <th width="10%">To</th>
                                            <th width="10%">Amount</th>
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
     <td><?php echo $rowMain['Courier_Id']; ?></td>
                                            <td><?php echo $rowMain['Cou_Comp']; ?></td>
                                            <td><?php echo $rowMain['C_No']; ?></td>
                                            <td><?php echo $rowMain['C_Date']; ?></td>
                                            <td><?php echo $rowMain['C_Pro']; ?></td>
                                            <td><?php echo $rowMain['Destination']; ?></td>
                                            <td><?php echo $rowMain['Top']; ?></td>
                                            <td><?php echo $rowMain['Amt']; ?></td>
                                            <td><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
    <?php } while($rowMain=mysql_fetch_assoc($rsMain)); ?>
                                    </tbody>
                                </table>
<?php
 } ?>
    
