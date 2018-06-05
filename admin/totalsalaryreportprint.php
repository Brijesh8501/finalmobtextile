<?php include("logcode.php");
include("databaseconnect.php");
error_reporting(0);
if(isset($_REQUEST['print']))
{
	$Date_Range = $_REQUEST['Date_Range'];
	$Date_Rangefixed = $_REQUEST['Date_Rangefixed']; 
	$Type = $_REQUEST['Type'];
	$Status = $_REQUEST['Status'];
if($Date_Range && $Type=='Meter')
	{
		if($Date_Range && $Type=='Meter' && $Status=='Paid')
	{
		$query1 = "select Sal_Mast_Id,Date_Range,labour_details.Name,Total_Amt,Total_Meter,Upad_Amt,Re_Amt,Grand_Total,Re_Upad_Amt,salary_master.Status,Entry_Date,salary_master.Entry_Id from salary_master,labour_details where labour_details.Labour_Id = salary_Master.Labour_Id AND Date_Range = '".$Date_Range."' AND salary_master.Status = 'Paid'";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
	}
	elseif($Date_Range && $Type=='Meter' && $Status=='Un-Paid')
	{
		 $query1 = "select Sal_Mast_Id,Date_Range,labour_details.Name,Total_Amt,Total_Meter,Upad_Amt,Re_Amt,Grand_Total,Re_Upad_Amt,salary_master.Status,Entry_Date,salary_master.Entry_Id from salary_master,labour_details where labour_details.Labour_Id = salary_Master.Labour_Id AND Date_Range = '".$Date_Range."' AND salary_master.Status = 'Un-Paid'";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
	}
	elseif($Date_Range && $Type=='Meter')
	{
		 $query1 = "select Sal_Mast_Id,Date_Range,labour_details.Name,Total_Amt,Total_Meter,Upad_Amt,Re_Amt,Grand_Total,Re_Upad_Amt,salary_master.Status,Entry_Date,salary_master.Entry_Id from salary_master,labour_details where labour_details.Labour_Id = salary_Master.Labour_Id AND Date_Range = '".$Date_Range."'";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
	}
}
elseif($Date_Rangefixed && $Type=='Fixed')
{
     if($Date_Rangefixed && $Type=='Fixed' && $Status=='Paid')
	{
		$query1 = "select Sal_Fixed_Id,Date_Range,labour_details.Name,No_Of,Rate,Amount,Upad_Amount,Grand_Total,Re_Amount,salary_fixed_master.Status,salary_fixed_master.Entry_Date,salary_fixed_master.Entry_Id from salary_fixed_master,labour_details where labour_details.Labour_Id = salary_fixed_master.Labour_Id AND Date_Range = '$Date_Rangefixed' AND salary_fixed_master.Status = 'Paid' order by Sal_Fixed_Id asc";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
	}
	elseif($Date_Rangefixed && $Type=='Fixed' && $Status=='Un-Paid')
	{
		 $query1 = "select Sal_Fixed_Id,Date_Range,labour_details.Name,No_Of,Rate,Amount,Upad_Amount,Grand_Total,Re_Amount,salary_fixed_master.Status,salary_fixed_master.Entry_Date,salary_fixed_master.Entry_Id from salary_fixed_master,labour_details where labour_details.Labour_Id = salary_fixed_master.Labour_Id AND Date_Range = '$Date_Rangefixed' AND salary_fixed_master.Status = 'Un-Paid' order by Sal_Fixed_Id asc";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
	}
	elseif($Date_Rangefixed && $Type=='Fixed')
	{
		 $query1 = "select Sal_Fixed_Id,Date_Range,labour_details.Name,No_Of,Rate,Amount,Upad_Amount,Grand_Total,Re_Amount,salary_fixed_master.Status,salary_fixed_master.Entry_Date,salary_fixed_master.Entry_Id from salary_fixed_master,labour_details where labour_details.Labour_Id = salary_fixed_master.Labour_Id AND Date_Range = '$Date_Rangefixed' order by Sal_Fixed_Id asc";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
	}
	}
}
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <link rel="shortcut icon" href="Icons/st85.png">
<?php
if($Date_Range)
{
	?>
<title>SALARY-METER&nbsp;<?php echo $Date_Range;?></title>
<?php }
elseif($Date_Rangefixed)
{
	?>
    <title>SALARY-FIXED&nbsp;<?php echo $Date_Rangefixed;?></title>
    <?php
}
?>
<style type="text/css">
table{
	border-collapse:collapse;
}
</style>
</head>
<body onload="window.print() ">
<table width="990" border="0" align="center" cellpadding="5" cellspacing="5" >
  <tr  style="font-size:24px">
    <?php date_default_timezone_set("Asia/Calcutta"); ?>
    <td>
     <div id="print-header-wrapper">
                    <div class="row-fluid"><?php
                    if($Date_Range)
					{
						?>SALARY-METER&nbsp;<b>Report</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i><?php echo $Date_Range;?></i>
                        <?php }
						elseif($Date_Rangefixed)
						{
							?>
                            SALARY-FIXED&nbsp;<b>Report</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i><?php echo $Date_Rangefixed;?></i>
                            <?php
						}
						?></div>
                    <div class="row-fluid" align="center"><strong>!! Shree Ganeshayan Namaha !!</strong><br/>
    <strong>SHINGORI TEXTILE</strong></div>
                    <div class="row-fluid" align="right"><?php echo date('Y/m/d h:i:s A'); ?>&nbsp;&nbsp;</div>
                   </div>
    </td>
  </tr>
  <tr>
 <?php if($Date_Range && $Type=='Meter')
	{
		if($Date_Range && $Type=='Meter' && $Status=='Paid') 
		{?>
    <td colspan="11" valign="top">
        <table width="100%" border="1" cellspacing="2" cellpadding="2" class="table" id="table_data" >
       <thead>
                                        <tr> 
                                        <th width="10%"><center>Sr No.</center></th>
                                             <th width="15%"><center>Salary ID</center></th>
                                             <th width="12%"><center>Date Range</center></th>
                                             <th width="25%"><center>Labour</center></th>
                                             <th width="12%"><center>Total Meter</center></th>
                                             <th width="12%"><center>Total Amount</center></th>
                                             <th width="15%"><center>Upad Amount</center></th>
                                             <th width="15%"><center>Remaining Amount</center></th>
                                             <th width="15%"><center>Grand Total</center></th>
                                             <th width="20%"><center>Remaining Upad Amount</center></th>
                                             <th width="15%"><center>Status</center></th>
                                            <th width="15%"><center>Entry Date</center></th>
                                             <th width="15%"><center>Entry #ID</center></th>
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
    <?php } while($rowMain=mysql_fetch_assoc($rsMain)); ?>
                                    </tbody>
        </table>
        </td>
     <?php  }
	elseif($Date_Range && $Type=='Meter' && $Status=='Un-Paid')
	{ ?>
        <td colspan="11" valign="top">
        <table width="100%" border="1" cellspacing="2" cellpadding="2" class="table" id="table_data" >
                                             <thead>
                                        <tr>  <th width="10%"><center>Sr No.</center></th>
                                             <th width="15%"><center>Salary ID</center></th>
                                             <th width="12%"><center>Date Range</center></th>
                                             <th width="25%"><center>Labour</center></th>
                                             <th width="12%"><center>Total Meter</center></th>
                                             <th width="12%"><center>Total Amount</center></th>
                                             <th width="15%"><center>Upad Amount</center></th>
                                             <th width="15%"><center>Remaining Amount</center></th>
                                             <th width="15%"><center>Grand Total</center></th>
                                             <th width="20%"><center>Remaining Upad Amount</center></th>
                                             <th width="15%"><center>Status</center></th>
                                            <th width="15%"><center>Entry Date</center></th>
                                             <th width="15%"><center>Entry #ID</center></th>
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
    <?php } while($rowMain=mysql_fetch_assoc($rsMain)); ?>
                                    </tbody>
        </table>
        </td>
        <?php
		  }
	elseif($Date_Range && $Type=='Meter')
	{ ?>
     <td colspan="11" valign="top">
        <table width="100%" border="1" cellspacing="2" cellpadding="2" class="table" id="table_data" >
                                             <thead>
                                        <tr>  <th width="10%"><center>Sr No.</center></th>
                                             <th width="15%"><center>Salary ID</center></th>
                                             <th width="12%"><center>Date Range</center></th>
                                             <th width="25%"><center>Labour</center></th>
                                             <th width="12%"><center>Total Meter</center></th>
                                             <th width="12%"><center>Total Amount</center></th>
                                             <th width="15%"><center>Upad Amount</center></th>
                                             <th width="15%"><center>Remaining Amount</center></th>
                                             <th width="15%"><center>Grand Total</center></th>
                                             <th width="20%"><center>Remaining Upad Amount</center></th>
                                             <th width="15%"><center>Status</center></th>
                                            <th width="15%"><center>Entry Date</center></th>
                                             <th width="15%"><center>Entry #ID</center></th>
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
    <?php } while($rowMain=mysql_fetch_assoc($rsMain)); ?>
                                    </tbody>
        </table>
        </td>
		<?php }
	}
		elseif($Date_Rangefixed && $Type=='Fixed')
	{
   	if($Date_Rangefixed && $Type=='Fixed' && $Status=='Paid') 
	{?>
    <td colspan="11" valign="top">
        <table width="100%" border="1" cellspacing="2" cellpadding="2" class="table" id="table_data" >
       <thead>
                                        <tr> 
                                        <th width="10%"><center>Sr No.</center></th>
                                             <th width="15%"><center>Salary-Fixed ID</center></th>
                                             <th width="12%"><center>Date Range</center></th>
                                             <th width="25%"><center>Labour</center></th>
                                              <th width="12%"><center>Number Of Beam / Attendance / ...</center></th>
                                             <th width="12%"><center>Rate</center></th>
                                             <th width="12%"><center>Amount</center></th>
                                             <th width="15%"><center>Upad Amount</center></th>
                                             <th width="15%"><center>Grand Total</center></th>
                                             <th width="15%"><center>Remaining Amount</center></th>
                                            <th width="15%"><center>Status</center></th>
                                            <th width="15%"><center>Entry Date</center></th>
                                             <th width="15%"><center>Entry #ID</center></th>
                                        </tr>
                                       </thead>
                                    <tbody>
    <?php
	          $i=0;
	  $i++;
									do { ?>                                    
  <tr class="odd gradeX"> 
  <td><?php echo $i++; ?></td>
     <td><?php echo $rowMain['Sal_Fixed_Id']; ?></td>
     <td><?php echo $rowMain['Date_Range']; ?></td>
     <td><?php echo $rowMain['Name']; ?></td>
    <td><?php echo $rowMain['No_Of']; ?></td>
    <td><?php echo $rowMain['Rate']; ?></td>
    <td><?php echo $rowMain['Amount']; ?></td>
    <td><?php echo $rowMain['Upad_Amount']; ?></td>
    <td><?php echo $rowMain['Grand_Total']; ?></td>
    <td><?php echo $rowMain['Re_Amount']; ?></td>
    <td><?php echo $rowMain['Status']; ?></td>
    <td><?php echo $rowMain['Entry_Date']; ?></td>
    <td><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
    <?php } while($rowMain=mysql_fetch_assoc($rsMain)); ?>
                                    </tbody>
        </table>
        </td>
     <?php  }
	elseif($Date_Rangefixed && $Type=='Fixed' && $Status=='Un-Paid')
	{ ?>
        <td colspan="11" valign="top">
        <table width="100%" border="1" cellspacing="2" cellpadding="2" class="table" id="table_data" >
                                             <thead>
                                        <tr>  
                                        <th width="10%"><center>Sr No.</center></th>
                                             <th width="15%"><center>Salary-Fixed ID</center></th>
                                             <th width="12%"><center>Date Range</center></th>
                                              <th width="12%"><center>Number Of Beam / Attendance / ...</center></th>
                                             <th width="25%"><center>Labour</center></th>
                                             <th width="12%"><center>Rate</center></th>
                                             <th width="12%"><center>Amount</center></th>
                                             <th width="15%"><center>Upad Amount</center></th>
                                             <th width="15%"><center>Grand Total</center></th>
                                             <th width="15%"><center>Remaining Amount</center></th>
                                            <th width="15%"><center>Status</center></th>
                                            <th width="15%"><center>Entry Date</center></th>
                                             <th width="15%"><center>Entry #ID</center></th>
                                        </tr>
                                       </thead>
                                    <tbody>
    <?php
	          $i=0;
	  $i++;
									do { ?>                                    
  <tr class="odd gradeX"> 
  <td><?php echo $i++; ?></td>
     <td><?php echo $rowMain['Sal_Fixed_Id']; ?></td>
     <td><?php echo $rowMain['Date_Range']; ?></td>
     <td><?php echo $rowMain['Name']; ?></td>
    <td><?php echo $rowMain['No_Of']; ?></td>
    <td><?php echo $rowMain['Rate']; ?></td>
    <td><?php echo $rowMain['Amount']; ?></td>
    <td><?php echo $rowMain['Upad_Amount']; ?></td>
    <td><?php echo $rowMain['Grand_Total']; ?></td>
    <td><?php echo $rowMain['Re_Amount']; ?></td>
    <td><?php echo $rowMain['Status']; ?></td>
    <td><?php echo $rowMain['Entry_Date']; ?></td>
    <td><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
    <?php } while($rowMain=mysql_fetch_assoc($rsMain)); ?>
                                    </tbody>
        </table>
        </td>
        <?php
		  }
	elseif($Date_Rangefixed && $Type=='Fixed')
	{ ?>
     <td colspan="11" valign="top">
        <table width="100%" border="1" cellspacing="2" cellpadding="2" class="table" id="table_data" >
                                             <thead>
                                        <tr>  
                                         <th width="10%"><center>Sr No.</center></th>
                                             <th width="15%"><center>Salary-Fixed ID</center></th>
                                             <th width="12%"><center>Date Range</center></th>
                                             <th width="25%"><center>Labour</center></th>
                                              <th width="12%"><center>Number Of Beam / Attendance / ...</center></th>
                                             <th width="12%"><center>Rate</center></th>
                                             <th width="12%"><center>Amount</center></th>
                                             <th width="15%"><center>Upad Amount</center></th>
                                             <th width="15%"><center>Grand Total</center></th>
                                             <th width="15%"><center>Remaining Amount</center></th>
                                            <th width="15%"><center>Status</center></th>
                                            <th width="15%"><center>Entry Date</center></th>
                                             <th width="15%"><center>Entry #ID</center></th>
                                        </tr>
                                       </thead>
                                    <tbody>
    <?php
	          $i=0;
	  $i++;
									do { ?>                                    
  <tr class="odd gradeX"> 
  <td><?php echo $i++; ?></td>
     <td><?php echo $rowMain['Sal_Fixed_Id']; ?></td>
     <td><?php echo $rowMain['Date_Range']; ?></td>
     <td><?php echo $rowMain['Name']; ?></td>
    <td><?php echo $rowMain['No_Of']; ?></td>
    <td><?php echo $rowMain['Rate']; ?></td>
    <td><?php echo $rowMain['Amount']; ?></td>
    <td><?php echo $rowMain['Upad_Amount']; ?></td>
    <td><?php echo $rowMain['Grand_Total']; ?></td>
    <td><?php echo $rowMain['Re_Amount']; ?></td>
    <td><?php echo $rowMain['Status']; ?></td>
    <td><?php echo $rowMain['Entry_Date']; ?></td>
    <td><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
    <?php } while($rowMain=mysql_fetch_assoc($rsMain)); ?>
                                    </tbody>
        </table>
        </td>
    <?php	}
	}
		?>
        </tr>
</table>
</body>
</html>
<?php
 ob_flush(); ?>