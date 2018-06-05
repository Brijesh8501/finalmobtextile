<?php error_reporting(0); 
include("databaseconnect.php");
if(isset($_REQUEST['Search']))
    {   
    $reportrange = $_REQUEST['reportrange'];
	$Typebank = $_REQUEST['Typebank']; 
	$splitdate = explode("-",$reportrange);
$date = $splitdate[0];
$date1 = $splitdate[1];
$dt = date('Y-m-d', strtotime($date));
$dt1 = date('Y-m-d', strtotime($date1)); 
if($reportrange!="" && $Typebank=="All")
{
	$query1 = "SELECT * FROM `accounts` where Date between '".$dt."' and '".$dt1."' order by Account_Id asc ";
 $rsMain = mysql_query($query1);
	$totalRowsRsMain = mysql_num_rows($rsMain);
	}
	elseif($reportrange!="" && $Typebank!=="All")
{
	$query1 = "SELECT * FROM `accounts` where Date between '".$dt."' and '".$dt1."' and Bank_Id = '$Typebank' order by Account_Id asc ";
 $rsMain = mysql_query($query1);
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
	if($reportrange!="" && $Typebank=="All")
{
	?>
<div align="right">
<a href="totalaccountreportprint?print&reportrange=<?php echo $reportrange; ?>&Typebank=All" target="_blank"><i class="icon-print"></i></a>
</div>
 <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                        <tr> 
                                            <th width="8%">Date</th>
                                             <th width="25%">Bank</th>
                                             <th width="30%">Particular</th>
                                             <th width="15%">Cheque No</th>
                                             <th width="10%">Debit</th>
                                            <th width="10%">Credit</th>
                                            <th width="15%">For</th>
                                            <th width="10%">Status</th>
                                        </tr>
                                       </thead>
                                    <tbody>
    <?php
	          $i=0;
	  $i++;
	while($rowMain = mysql_fetch_array($rsMain)) { ?>                                    
  <tr class="odd gradeX"> 
     <td><?php echo $rowMain['Date']; ?></td>
     <?php if($rowMain['Bank_Id']=="---")
	 { ?>
	<td></td>
	 <?php }
	 elseif($rowMain['Bank_Id']!="---")
	 {?>
     <td><?php echo $rowMain['Bank_Id']; ?></td>
     <?php } ?>
    <td><?php echo $rowMain['Particular']; ?></td>
     <?php if($rowMain['Cheque_No']=="---")
	 { ?>
	<td></td>
	 <?php }
	  elseif($rowMain['Cheque_No']!="---")
	  {
	 ?>
    <td><?php echo $rowMain['Cheque_No']; ?></td>
    <?php } ?>
     <?php if($rowMain['Debit']=="0.00")
	 { ?>
	<td></td>
	 <?php }
	  elseif($rowMain['Debit']!="0.00")
	  {
	 ?>
    <td><?php echo $rowMain['Debit']; ?></td>
    <?php } ?>
     <?php if($rowMain['Credit']=="0.00")
	 { ?>
	<td></td>
	 <?php }
	  elseif($rowMain['Credit']!="0.00")
	  {
	 ?>
    <td><?php echo $rowMain['Credit']; ?></td>
    <?php } ?>
    <td><?php echo $rowMain['For_S']; ?></td>
     <?php if($rowMain['Status']=="---")
	 { ?>
	<td></td>
	 <?php }
	  elseif($rowMain['Status']!="---")
	  {
	 ?>
    <td><?php echo $rowMain['Status']; ?></td>
    <?php } ?>
     </tr>
    <?php 
	$Dr = $Dr + $rowMain['Debit']; $Cr = $Cr + $rowMain['Credit']; } ?>
    <tr>
    <th colspan="4"><span style="float:right">Total</span></th>
    <th><?php echo $Dr;?>
    </th>
     <th><?php echo $Cr;?>
    </th>
    <th colspan="2"></th>
    </tr>
                                    </tbody>
                                </table>
<?php
 }
 elseif($reportrange!="" && $Typebank!="All")
{
	?>
<div align="right">
<a href="totalpettyreportprint?print&reportrange=<?php echo $reportrange; ?> &TypePetty=Cheque" target="_blank"><i class="icon-print"></i></a>
</div>
 <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                                                     <tr> 
                                            <th width="8%">Date</th>
                                             <th width="25%">Bank</th>
                                             <th width="30%">Particular</th>
                                             <th width="15%">Cheque No</th>
                                             <th width="10%">Debit</th>
                                            <th width="10%">Credit</th>
                                            <th width="15%">For</th>
                                            <th width="10%">Status</th>
                                        </tr>
                                       </thead>
                                    <tbody>
    <?php
	          $i=0;
	  $i++;
	while($rowMain = mysql_fetch_array($rsMain)) { ?>                                    
  <tr class="odd gradeX"> 
     <td><?php echo $rowMain['Date']; ?></td>
     <?php if($rowMain['Bank_Id']=="---")
	 { ?>
	<td></td>
	 <?php }
	 elseif($rowMain['Bank_Id']!="---")
	 {?>
     <td><?php echo $rowMain['Bank_Id']; ?></td>
     <?php } ?>
    <td><?php echo $rowMain['Particular']; ?></td>
     <?php if($rowMain['Cheque_No']=="---")
	 { ?>
	<td></td>
	 <?php }
	  elseif($rowMain['Cheque_No']!="---")
	  {
	 ?>
    <td><?php echo $rowMain['Cheque_No']; ?></td>
    <?php } ?>
     <?php if($rowMain['Debit']=="0.00")
	 { ?>
	<td></td>
	 <?php }
	  elseif($rowMain['Debit']!="0.00")
	  {
	 ?>
    <td><?php echo $rowMain['Debit']; ?></td>
    <?php } ?>
     <?php if($rowMain['Credit']=="0.00")
	 { ?>
	<td></td>
	 <?php }
	  elseif($rowMain['Credit']!="0.00")
	  {
	 ?>
    <td><?php echo $rowMain['Credit']; ?></td>
    <?php } ?>
    <td><?php echo $rowMain['For_S']; ?></td>
     <?php if($rowMain['Status']=="---")
	 { ?>
	<td></td>
	 <?php }
	  elseif($rowMain['Status']!="---")
	  {
	 ?>
    <td><?php echo $rowMain['Status']; ?></td>
    <?php } ?>
     </tr>
    <?php 
	$Dr = $Dr + $rowMain['Debit']; $Cr = $Cr + $rowMain['Credit']; } ?>
    <tr>
    <th colspan="4"><span style="float:right">Total</span></th>
    <th><?php echo $Dr;?>
    </th>
     <th><?php echo $Cr;?>
    </th>
    <th colspan="2"></th>
    </tr>
                                    </tbody>
                                </table>
<?php
 }
}
?>
    
