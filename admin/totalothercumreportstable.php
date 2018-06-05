<?php error_reporting(0); 
include("databaseconnect.php");
if(isset($_REQUEST['SearchOtherCum']))
    {   
    $reportrange = $_REQUEST['reportrange']; 
	$splitdate = explode("-",$reportrange);
$date = $splitdate[0];
$date1 = $splitdate[1];
$dt = date('Y-m-d', strtotime($date));
$dt1 = date('Y-m-d', strtotime($date1)); 
	$query1="SELECT * FROM `other_d_c` where Other_D_C_Date between '".$dt."' and '".$dt1."' order by Other_D_C_Id asc ";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
      $sql1= "select Ot_D_C_Id,other_d_c.Other_D_C_Id,other_d_c.Other_D_C_Date,other_d_c.Other_D_C_No,machine_parts.Mach_Pname,Quantity,Rate,Amount,R_Id from other_sub_orgdc,other_d_c,machine_parts where other_d_c.Other_D_C_Id = other_sub_orgdc.Other_D_C_Id AND machine_parts.Mach_Part_Id = other_sub_orgdc.Mach_Part_Id AND other_d_c.Other_D_C_Date AND other_d_c.Other_D_C_Date between '".$dt."' and '".$dt1."' order by other_d_c.Other_D_C_Id asc ";
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
<a href="totalothercummainprint?print&reportrange=<?php echo $reportrange; ?>" target="_blank"><i class="icon-print"></i></a>
</div>
 <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                        <tr> 
                                             <th>Sr No.</th>
                                             <th>Other-Challan-Invoice ID</th>
                                             <th>Challan Date</th>
                                             <th>Challan No.</th>
                                             <th>Party</th>
                                            <th>Total</th>
                                            <th>Total Amount</th>
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
     <td width="12%"><?php echo $rowMain['Other_D_C_Id']; ?></td>
    <td width="10%"><?php echo $rowMain['Other_D_C_Date']; ?></td>
    <td width="15%"><?php echo $rowMain['Other_D_C_No']; ?></td>
    <td width="30%"><?php echo $rowMain['From_Ad']; ?></td>
    <td width="7%"><?php echo $rowMain['Total_Other']; ?></td>
    <td width="10%"><?php echo $rowMain['Total_Amount']; ?></td>
    <td width="15%"><?php echo $rowMain['Entry_Date']; ?></td>
    <td width="10%"><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
    <?php } while($rowMain=mysql_fetch_assoc($rsMain)); ?>
                                    </tbody>
                                </table>
     <center><strong>****SUB-DETAILS CATEGORIZED BY OTHER-CHALLAN-INVOICE ID****</strong></center>
                            <div align="right">
 <a href="totalothercumsubprint?print&reportrange=<?php echo $reportrange; ?>" target="_blank"><i class="icon-print"></i></a>
</div>
                             <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                        <tr> 
                                             <th>Sr No.</th>
                                             <th>Other-Challan-Invoice ID</th>
                                             <th>Challan No.</th>
                                             <th>Machine-Parts</th>
                                             <th>Quantity</th>
                                             <th>Rate</th>
                                            <th>Amount</th>
                                            <th>#ID</th>
                                        </tr>
                               </thead>
                                    <tbody>
                                     <?php $i=0;
	  $i++;
									do { ?>                                
  <tr class="odd gradeX"> 
    <td width="7%"><?php echo $i++; ?></td>
     <td width="15%"><?php echo $rowSub['Other_D_C_Id']; ?></td>
     <td width="15%"><?php echo $rowSub['Other_D_C_No']; ?></td>
    <td width="25%"><?php echo $rowSub['Mach_Pname']; ?></td>
    <td width="10%"><?php echo $rowSub['Quantity']; ?></td>
    <td width="10%"><?php echo $rowSub['Rate']; ?></td>
    <td width="10%"><?php echo $rowSub['Amount']; ?></td>
    <td width="7%"><?php echo $rowSub['R_Id']; ?></td>
  </tr>
  <?php } while($rowSub=mysql_fetch_assoc($rsSub)); ?>
                                    </tbody>
                              </table>
<?php
 } ?>
