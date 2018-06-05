<?php error_reporting(0); 
include("databaseconnect.php");
if(isset($_REQUEST['SearchPetty']))
    {   
    $reportrange = $_REQUEST['reportrange'];
	$TypePetty = $_REQUEST['TypePetty']; 
	$splitdate = explode("-",$reportrange);
$date = $splitdate[0];
$date1 = $splitdate[1];
$dt = date('Y-m-d', strtotime($date));
$dt1 = date('Y-m-d', strtotime($date1)); 
if($reportrange!="" && $TypePetty!="All")
{
	$query1 = "SELECT * FROM `other_credit_details` where Date between '".$dt."' and '".$dt1."' AND Payment_Type='$TypePetty' order by Petty_Id asc ";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
	}
	elseif($reportrange!="" && $TypePetty=="All")
{
	$query1 = "SELECT * FROM `other_credit_details` where Date between '".$dt."' and '".$dt1."' order by Petty_Id asc ";
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
<a href="totalothercreditreportprint?print&reportrange=<?php echo $reportrange; ?>&TypePetty=<?php echo $TypePetty?>" target="_blank"><i class="icon-print"></i></a>
</div>
 <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                        <tr> 
                                        <th width="7%">Sr No.</th>
                                             <th width="12%">Other-Credit ID</th>
                                             <th width="20%">Subject</th>
                                             <th width="30%">Description</th>
                                             <th width="12%">Payment Type</th>
                                             <th width="20%">Bank</th>
                                            <th width="30%">Cheque No</th>
                                            <th width="10%">Amount</th>
                                            <th width="10%">Date</th>
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
     <td><?php echo $rowMain['Petty_Id']; ?></td>
     <td><?php echo $rowMain['Subject']; ?></td>
    <td><?php echo $rowMain['Description']; ?></td>
    <td><?php echo $rowMain['Payment_Type']; ?></td>
    <td><?php echo $rowMain['Bank_Id']; ?></td>
    <td><?php echo $rowMain['Cheque_No']; ?></td>
    <td><?php echo $rowMain['Cheque_Amount']; ?></td>
    <td><?php echo $rowMain['Date']; ?></td>
    <td><?php echo $rowMain['Entry_Date']; ?></td>
    <td><?php echo $rowMain['Entry_Id']; ?></td>
    </tr>
    <?php 
	$Chq_Amt = $Chq_Amt + $rowMain['Cheque_Amount']; } while($rowMain=mysql_fetch_assoc($rsMain)); ?>
    <tr>
    <th colspan="11"><span style="float:right">Total Amount&nbsp;:&nbsp;<?php echo $Chq_Amt;?></span>
    </th>
    </tr>
                                    </tbody>
                                </table>
<?php
 }
?>
    
