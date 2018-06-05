<?php error_reporting(0); 
include("databaseconnect.php");
if(isset($_REQUEST['SearchSalary']))
    {   
    $Date_Range = $_REQUEST['Date_Range']; 
	$Type = $_REQUEST['TypeSalary'];
	$Status = $_REQUEST['Status'];
	}
	if(isset($_REQUEST['Searchfixed']))
    {   
    $Date_Rangefixed = $_REQUEST['Date_Rangefixed']; 
	$Type = $_REQUEST['TypeSalary'];
	$Status = $_REQUEST['Status'];
	}
////////////////////////////////// number format in point ///////////////////////////////////////////////////////
  function moneyFormatIndia($num){
$explrestunits = "" ;
$num=preg_replace('/,+/', '', $num);
$words = explode(".", $num);
$des="00";
if(count($words)<=2){
    $num=$words[0];
    if(count($words)>=2){$des=$words[1];}
    if(strlen($des)<2){$des="$des0";}else{$des=substr($des,0,2);}
}
if(strlen($num)>3){
    $lastthree = substr($num, strlen($num)-3, strlen($num));
    $restunits = substr($num, 0, strlen($num)-3); // extracts the last three digits
    $restunits = (strlen($restunits)%2 == 1)?"0".$restunits:$restunits; // explodes the remaining digits in 2's formats, adds a zero in the beginning to maintain the 2's grouping.
    $expunit = str_split($restunits, 2);
    for($i=0; $i<sizeof($expunit); $i++){
        // creates each of the 2's group and adds a comma to the end
        if($i==0)
        {
            $explrestunits .= (int)$expunit[$i].","; // if is first value , convert into integer
        }else{
            $explrestunits .= $expunit[$i].",";
        }
    }
    $thecash = $explrestunits.$lastthree;
} else {
    $thecash = $num;
}
return "$thecash.$des"; // writes the final format where $currency is the currency symbol.
}	
if(isset($_REQUEST['SearchSalary']))
    { 	
if($Date_Range=="")
	{
		echo '<script>alert("Please select date range first....");</script>';
	}
elseif($Date_Range && $Type=="")
		{
			echo "<center>You cannot search records, only by date range</center>";
		}
elseif($Date_Range && $Type!="Meter")
		{
			echo "<center>Please give appropriate search option with date range</center>";
		}
else
{
	if($Date_Range && $Type=='Meter')
	{
		if($Date_Range && $Type=='Meter' && $Status=='Paid')
	{
		$query1 = "select Sal_Mast_Id,Date_Range,labour_details.Name,Total_Amt,Total_Meter,Upad_Amt,Re_Amt,Grand_Total,Re_Upad_Amt,salary_master.Status,Entry_Date,salary_master.Entry_Id from salary_master,labour_details where labour_details.Labour_Id = salary_Master.Labour_Id AND Date_Range = '".$Date_Range."' AND salary_master.Status = 'Paid'";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
		if($totalRowsRsMain==0)
{
	echo "<center>There is no record</center>";
}
else
{
	?>
<div align="right">
<a href="totalempsalaryreportprint?print&Date_Range=<?php echo $Date_Range; ?>&Type=<?php echo $Type; ?>&Status=<?php echo $Status;?>" target="_blank"><i class="icon-print">&nbsp;Salary Print</i></a>&nbsp;
<a href="totalsalaryreportprint?print&Date_Range=<?php echo $Date_Range; ?>&Type=<?php echo $Type; ?>&Status=<?php echo $Status;?>" target="_blank"><i class="icon-print">&nbsp;Report</i></a>
</div>
 <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                        <tr> 
                                        <th width="10%">Sr No.</th>
                                             <th width="15%">Salary ID</th>
                                             <th width="12%">Date Range</th>
                                             <th width="25%">Labour</th>
                                             <th width="12%">Total Meter</th>
                                             <th width="12%">Total Amount</th>
                                             <th width="15%">Upad Amount</th>
                                             <th width="15%">Remaining Amount</th>
                                             <th width="15%">Grand Total</th>
                                             <th width="20%">Remaining Upad Amount</th>
                                             <th width="15%">Status</th>
                                            <th width="15%">Entry Date</th>
                                             <th width="15%">Entry #ID</th>
                                        </tr>
                                       </thead>
                                    <tbody>
                                  
    <?php
	          $i=0;
	  $i++;
									do { ?>                                    
                                      
  <tr class="odd gradeX"> 
  <td><?php echo $i++; ?></td>
     <td><?php echo $rowMain['Sal_Mast_Id']; ?></td>
     <td><?php echo $rowMain['Date_Range']; ?></td>
     <td><?php echo $rowMain['Name']; ?></td>
    <td><?php echo $rowMain['Total_Meter']; ?></td>
    <td><?php echo $rowMain['Total_Amt']; ?></td>
    <td><?php echo $rowMain['Upad_Amt']; ?></td>
    <td><?php echo $rowMain['Re_Amt']; ?></td>
    <td><?php echo $rowMain['Grand_Total']; ?></td>
    <td><?php echo $rowMain['Re_Upad_Amt']; ?></td>
    <td><?php echo $rowMain['Status']; ?></td>
    <td><?php echo $rowMain['Entry_Date']; ?></td>
    <td><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
   <?php $T_Amt = $T_Amt + $rowMain['Grand_Total']; } while($rowMain=mysql_fetch_assoc($rsMain)); ?>
       <tr>
       <th colspan="13"><span style="float:right">Final amount paid to employees&nbsp;:&nbsp;<?php echo moneyFormatIndia($T_Amt);?></span>
       </th>
       </tr>
                                    </tbody>
                                </table>
<?php
	}
	}
	elseif($Date_Range && $Type=='Meter' && $Status=='Un-Paid')
	{
		 $query1 = "select Sal_Mast_Id,Date_Range,labour_details.Name,Total_Amt,Total_Meter,Upad_Amt,Re_Amt,Grand_Total,Re_Upad_Amt,salary_master.Status,Entry_Date,salary_master.Entry_Id from salary_master,labour_details where labour_details.Labour_Id = salary_Master.Labour_Id AND Date_Range = '".$Date_Range."' AND salary_master.Status = 'Un-Paid'";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
		if($totalRowsRsMain==0)
{
	echo "<center>There is no record</center>";
}
else
{
		?>
        <div align="right">
       <a href="totalsalaryreportprint?print&Date_Range=<?php echo $Date_Range; ?>&Type=<?php echo $Type; ?>&Status=<?php echo $Status;?>" target="_blank"><i class="icon-print">&nbsp;Report</i></a>
</div>
 <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                        <tr> 
                                        <th width="10%">Sr No.</th>
                                             <th width="15%">Salary ID</th>
                                             <th width="12%">Date Range</th>
                                             <th width="25%">Labour</th>
                                             <th width="12%">Total Meter</th>
                                             <th width="12%">Total Amount</th>
                                             <th width="15%">Upad Amount</th>
                                             <th width="15%">Remaining Amount</th>
                                             <th width="15%">Grand Total</th>
                                             <th width="20%">Remaining Upad Amount</th>
                                             <th width="15%">Status</th>
                                            <th width="15%">Entry Date</th>
                                             <th width="15%">Entry #ID</th>
                                        </tr>
                                       </thead>
                                    <tbody>
    <?php
	          $i=0;
	  $i++;
									do { ?>                                    
                                      
  <tr class="odd gradeX"> 
  <td><?php echo $i++; ?></td>
     <td><?php echo $rowMain['Sal_Mast_Id']; ?></td>
     <td><?php echo $rowMain['Date_Range']; ?></td>
     <td><?php echo $rowMain['Name']; ?></td>
    <td><?php echo $rowMain['Total_Meter']; ?></td>
    <td><?php echo $rowMain['Total_Amt']; ?></td>
    <td><?php echo $rowMain['Upad_Amt']; ?></td>
    <td><?php echo $rowMain['Re_Amt']; ?></td>
    <td><?php echo $rowMain['Grand_Total']; ?></td>
    <td><?php echo $rowMain['Re_Upad_Amt']; ?></td>
    <td><?php echo $rowMain['Status']; ?></td>
    <td><?php echo $rowMain['Entry_Date']; ?></td>
    <td><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
    <?php } while($rowMain=mysql_fetch_assoc($rsMain)); 
?>
                                    </tbody>
                                </table>
        <?php
	}
	}
	elseif($Date_Range && $Type=='Meter')
	{
		$query1 = "select Sal_Mast_Id,Date_Range,labour_details.Name,Total_Amt,Total_Meter,Upad_Amt,Re_Amt,Grand_Total,Re_Upad_Amt,salary_master.Status,Entry_Date,salary_master.Entry_Id from salary_master,labour_details where labour_details.Labour_Id = salary_Master.Labour_Id AND Date_Range = '".$Date_Range."'";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
		if($totalRowsRsMain==0)
{
	echo "<center>There is no record</center>";
}
else
{
		?>
        <div align="right">
<a href="totalsalaryreportprint?print&Date_Range=<?php echo $Date_Range; ?>&Type=<?php echo $Type; ?>" target="_blank"><i class="icon-print">&nbsp;Report</i></a>
</div>
 <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                        <tr> 
                                        <th width="10%">Sr No.</th>
                                             <th width="15%">Salary ID</th>
                                             <th width="12%">Date Range</th>
                                             <th width="25%">Labour</th>
                                             <th width="12%">Total Meter</th>
                                             <th width="12%">Total Amount</th>
                                             <th width="15%">Upad Amount</th>
                                             <th width="15%">Remaining Amount</th>
                                             <th width="15%">Grand Total</th>
                                             <th width="20%">Remaining Upad Amount</th>
                                             <th width="15%">Status</th>
                                            <th width="15%">Entry Date</th>
                                             <th width="15%">Entry #ID</th>
                                        </tr>
                                       </thead>
                                    <tbody>
    <?php
	          $i=0;
	  $i++;
									do { ?>                                    
                                      
  <tr class="odd gradeX"> 
  <td><?php echo $i++; ?></td>
     <td><?php echo $rowMain['Sal_Mast_Id']; ?></td>
     <td><?php echo $rowMain['Date_Range']; ?></td>
     <td><?php echo $rowMain['Name']; ?></td>
    <td><?php echo $rowMain['Total_Meter']; ?></td>
    <td><?php echo $rowMain['Total_Amt']; ?></td>
    <td><?php echo $rowMain['Upad_Amt']; ?></td>
    <td><?php echo $rowMain['Re_Amt']; ?></td>
    <td><?php echo $rowMain['Grand_Total']; ?></td>
    <td><?php echo $rowMain['Re_Upad_Amt']; ?></td>
    <td><?php echo $rowMain['Status']; ?></td>
    <td><?php echo $rowMain['Entry_Date']; ?></td>
    <td><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
    <?php } while($rowMain=mysql_fetch_assoc($rsMain)); 
?>
                                    </tbody>
                                </table>
        <?php
	}
	}
	}
}
	}
	if(isset($_REQUEST['Searchfixed']))
    { 
	if($Date_Rangefixed=="")
	{
		echo '<script>alert("Please select any option first....");</script>';
	}
elseif($Date_Rangefixed && $Type=="")
		{
			echo "<center>You cannot search records, only by date range</center>";
		}
elseif($Date_Rangefixed && $Type!="Fixed")
		{
			echo "<center>Please give appropriate search option with date range</center>";
		}
else
{
	if($Date_Rangefixed && $Type=='Fixed')
	{
		if($Date_Rangefixed && $Type=='Fixed' && $Status=='Paid')
	{
		$query1 = "select Sal_Fixed_Id,Date_Range,labour_details.Name,No_Of,Rate,Amount,Upad_Amount,Grand_Total,Re_Amount,salary_fixed_master.Status,salary_fixed_master.Entry_Date,salary_fixed_master.Entry_Id from salary_fixed_master,labour_details where labour_details.Labour_Id = salary_fixed_master.Labour_Id AND Date_Range = '$Date_Rangefixed' AND salary_fixed_master.Status = 'Paid' order by Sal_Fixed_Id asc";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
		if($totalRowsRsMain==0)
{
	echo "<center>There is no record</center>";
}
else
{
	?>
<div align="right">
<a href="totalempsalaryreportprint?print&Date_Rangefixed=<?php echo $Date_Rangefixed; ?>&Type=<?php echo $Type; ?>&Status=<?php echo $Status;?>" target="_blank"><i class="icon-print">&nbsp;Salary Print</i></a>&nbsp;
<a href="totalsalaryreportprint?print&Date_Rangefixed=<?php echo $Date_Rangefixed; ?>&Type=<?php echo $Type; ?>&Status=<?php echo $Status;?>" target="_blank"><i class="icon-print">&nbsp;Report</i></a>
</div>
 <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                        <tr> 
                                        <th>Sr No.</th>
                                             <th>Salary-Fixed ID</th>
                                             <th>Date Range</th>
                                             <th>Labour</th>
                                             <th>Number Of Beam / Attendance / ...</th>
                                             <th>Rate</th>
                                            <th>Amount</th>
                                            <th>Upad Amount / Adjust Upad Amount</th>
                                            <th>Grand Total</th>
                                            <th>Remaining Amount</th>
                                            <th>Status</th>
                                            <th>Entry Date</th>
                                            <th>Entry #ID</th>
                                        </tr>
                                      
                                       </thead>
                                    <tbody>
                                  
    <?php
	          $i=0;
	  $i++;
									do { ?>                                    
                                      
  <tr class="odd gradeX"> 
   <td width="7%"><?php echo $i++; ?></td>
     <td width="15%"><?php echo $rowMain['Sal_Fixed_Id']; ?></td>
    <td width="10%"><?php echo $rowMain['Date_Range']; ?></td>
    <td width="20%"><?php echo $rowMain['Name']; ?></td>
    <td width="7%"><?php echo $rowMain['No_Of']; ?></td>
    <td width="7%"><?php echo $rowMain['Rate']; ?></td>
    <td width="7%"><?php echo $rowMain['Amount']; ?></td>
    <td width="12%"><?php echo $rowMain['Upad_Amount']; ?></td>
    <td width="30%"><?php echo $rowMain['Grand_Total']; ?></td>
    <td width="10%"><?php echo $rowMain['Re_Amount']; ?></td>
    <td width="10%"><?php echo $rowMain['Status']; ?></td>
    <td width="10%"><?php echo $rowMain['Entry_Date']; ?></td>
    <td width="10%"><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
   <?php $T_Amt = $T_Amt + $rowMain['Grand_Total']; } while($rowMain=mysql_fetch_assoc($rsMain)); ?>
       <tr>
       <th colspan="13"><span style="float:right">Final amount paid to employees&nbsp;:&nbsp;<?php echo moneyFormatIndia($T_Amt);?></span>
       </th>
       </tr>
                                    </tbody>
                                </table>
<?php
	}
	}
	elseif($Date_Rangefixed && $Type=='Fixed' && $Status=='Un-Paid')
	{
		 $query1 = "select Sal_Fixed_Id,Date_Range,labour_details.Name,No_Of,Rate,Amount,Upad_Amount,Grand_Total,Re_Amount,salary_fixed_master.Status,salary_fixed_master.Entry_Date,salary_fixed_master.Entry_Id from salary_fixed_master,labour_details where labour_details.Labour_Id = salary_fixed_master.Labour_Id AND Date_Range = '$Date_Rangefixed' AND salary_fixed_master.Status = 'Un-Paid' order by Sal_Fixed_Id asc";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
		if($totalRowsRsMain==0)
{
	echo "<center>There is no record</center>";
}
else
{
		?>
        <div align="right">
       <a href="totalsalaryreportprint?print&Date_Rangefixed=<?php echo $Date_Rangefixed; ?>&Type=<?php echo $Type; ?>&Status=<?php echo $Status;?>" target="_blank"><i class="icon-print">&nbsp;Report</i></a>
</div>
 <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                        <tr> 
                                        <th>Sr No.</th>
                                             <th>Salary-Fixed ID</th>
                                             <th>Date Range</th>
                                             <th>Labour</th>
                                             <th>Number Of Beam / Attendance / ...</th>
                                             <th>Rate</th>
                                            <th>Amount</th>
                                            <th>Upad Amount / Adjust Upad Amount</th>
                                            <th>Grand Total</th>
                                            <th>Remaining Amount</th>
                                            <th>Status</th>
                                            <th>Entry Date</th>
                                            <th>Entry #ID</th>
                                        </tr>
                                       </thead>
                                    <tbody>
    <?php
	          $i=0;
	  $i++;
									do { ?>                                    
  <tr class="odd gradeX"> 
   <td width="7%"><?php echo $i++; ?></td>
     <td width="15%"><?php echo $rowMain['Sal_Fixed_Id']; ?></td>
    <td width="10%"><?php echo $rowMain['Date_Range']; ?></td>
    <td width="20%"><?php echo $rowMain['Name']; ?></td>
    <td width="7%"><?php echo $rowMain['No_Of']; ?></td>
    <td width="7%"><?php echo $rowMain['Rate']; ?></td>
    <td width="7%"><?php echo $rowMain['Amount']; ?></td>
    <td width="12%"><?php echo $rowMain['Upad_Amount']; ?></td>
    <td width="30%"><?php echo $rowMain['Grand_Total']; ?></td>
    <td width="10%"><?php echo $rowMain['Re_Amount']; ?></td>
    <td width="10%"><?php echo $rowMain['Status']; ?></td>
    <td width="10%"><?php echo $rowMain['Entry_Date']; ?></td>
    <td width="10%"><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
    <?php } while($rowMain=mysql_fetch_assoc($rsMain)); 
?>
                                    </tbody>
                                </table>
        <?php
	}
	}
	elseif($Date_Rangefixed && $Type=='Fixed')
	{
		$query1 = "select Sal_Fixed_Id,Date_Range,labour_details.Name,No_Of,Rate,Amount,Upad_Amount,Grand_Total,Re_Amount,salary_fixed_master.Status,salary_fixed_master.Entry_Date,salary_fixed_master.Entry_Id from salary_fixed_master,labour_details where labour_details.Labour_Id = salary_fixed_master.Labour_Id AND Date_Range = '$Date_Rangefixed' order by Sal_Fixed_Id asc";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
		if($totalRowsRsMain==0)
{
	echo "<center>There is no record</center>";
}
else
{
		?>
        <div align="right">
<a href="totalsalaryreportprint?print&Date_Rangefixed=<?php echo $Date_Rangefixed; ?>&Type=<?php echo $Type; ?>" target="_blank"><i class="icon-print">&nbsp;Report</i></a>
</div>
 <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                        <tr> 
                                        <th>Sr No.</th>
                                             <th>Salary-Fixed ID</th>
                                             <th>Date Range</th>
                                             <th>Labour</th>
                                             <th>Number Of Beam / Attendance / ...</th>
                                             <th>Rate</th>
                                            <th>Amount</th>
                                            <th>Upad Amount / Adjust Upad Amount</th>
                                            <th>Grand Total</th>
                                            <th>Remaining Amount</th>
                                            <th>Status</th>
                                            <th>Entry Date</th>
                                            <th>Entry #ID</th>
                                        </tr>
                                       </thead>
                                    <tbody>
    <?php
	          $i=0;
	  $i++;
									do { ?>                                    
  <tr class="odd gradeX"> 
  <td width="7%"><?php echo $i++; ?></td>
     <td width="15%"><?php echo $rowMain['Sal_Fixed_Id']; ?></td>
    <td width="10%"><?php echo $rowMain['Date_Range']; ?></td>
    <td width="20%"><?php echo $rowMain['Name']; ?></td>
    <td width="7%"><?php echo $rowMain['No_Of']; ?></td>
    <td width="7%"><?php echo $rowMain['Rate']; ?></td>
    <td width="7%"><?php echo $rowMain['Amount']; ?></td>
    <td width="12%"><?php echo $rowMain['Upad_Amount']; ?></td>
    <td width="30%"><?php echo $rowMain['Grand_Total']; ?></td>
    <td width="10%"><?php echo $rowMain['Re_Amount']; ?></td>
    <td width="10%"><?php echo $rowMain['Status']; ?></td>
    <td width="10%"><?php echo $rowMain['Entry_Date']; ?></td>
    <td width="10%"><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
    <?php } while($rowMain=mysql_fetch_assoc($rsMain)); 
?>
 
  
                                    </tbody>
                                </table>
        <?php
	}
	}
	}

 } 
	}?>
    
