<?php include("logcode.php");
include("databaseconnect.php");
error_reporting(0);
if(isset($_REQUEST['print']))
{
	$Date_Range = $_REQUEST['Date_Range']; 
	$Date_Rangefixed = $_REQUEST['Date_Rangefixed']; 
	$Type = $_REQUEST['Type'];
	$Status = $_REQUEST['Status'];
if($Date_Range && $Type=='Meter' && $Status=='Paid')
	{
			 $query1 = "select Sal_Mast_Id,Date_Range,labour_details.Name,Total_Amt,Total_Meter,Upad_Amt,Re_Amt,Grand_Total,Re_Upad_Amt,salary_master.Status,Entry_Date,salary_master.Entry_Id from salary_master,labour_details where labour_details.Labour_Id = salary_Master.Labour_Id AND Date_Range = '".$Date_Range."' AND salary_master.Status = 'Paid'";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
}
elseif($Date_Rangefixed && $Type=='Fixed' && $Status=='Paid')
{
     $query1 = "select Sal_Fixed_Id,Date_Range,labour_details.Name,No_Of,Rate,Amount,Upad_Amount,Grand_Total,Re_Amount,salary_fixed_master.Status,salary_fixed_master.Entry_Date,salary_fixed_master.Entry_Id from salary_fixed_master,labour_details where labour_details.Labour_Id = salary_fixed_master.Labour_Id AND Date_Range = '$Date_Rangefixed' AND salary_fixed_master.Status = 'Paid' order by Sal_Fixed_Id asc";
	 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
	}
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
<?php
}
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
                    <div class="row-fluid"><?php if($Date_Range) {
						?>
                        <b>SALARY-METER</b>&nbsp;&nbsp;<i><?php echo $Date_Range;?></i>
                        <?php }
						elseif($Date_Rangefixed)
						{?>
                        <b>SALARY-FIXED</b>&nbsp;&nbsp;<i><?php echo $Date_Rangefixed;?></i>
                        <?php
						}?>
							</div>
                    <div class="row-fluid" align="center"><strong>!! Shree Ganeshayan Namaha !!</strong><br/>
    <strong>SHINGORI TEXTILE</strong></div>
                    <div class="row-fluid" align="right"><?php echo date('Y/m/d h:i:s A'); ?>&nbsp;&nbsp;</div>
                   </div>
    </td>
  </tr>
  <tr>
 <?php 
	if($Date_Range && $Type=='Meter' && $Status=='Paid')
	{ ?>
     <td colspan="11" valign="top">
        <table width="100%" border="1" cellspacing="2" cellpadding="2" class="table" id="table_data" >
                                             <thead>
                                        <tr>  <th width="7%"><center>Sr No.</center></th>
                                             <th width="25%"><center>Labour & Signature</center></th>
                                             <th width="12%"><center>Total Meter</center></th>
                                             <th width="12%"><center>Total Amount</center></th>
                                             <th width="15%"><center>Upad Amount</center></th>
                                             <th width="15%"><center>Remaining Amount</center></th>
                                             <th width="15%"><center>Grand Total</center></th>
                                             <th width="20%"><center>Remaining Upad Amount</center></th>
                                            </tr>
                                       </thead>
                                    <tbody>
    <?php
	          $i=0;
	  $i++;
									do { ?>                                    
  <tr class="odd gradeX"> 
  <td><?php echo $i++; ?></td>
     <td style="height:100px"><?php echo $rowMain['Name']; ?></td>
    <td><?php echo $rowMain['Total_Meter']; ?></td>
    <td><?php echo $rowMain['Total_Amt']; ?></td>
    <td><?php echo $rowMain['Upad_Amt']; ?></td>
    <td><?php echo $rowMain['Re_Amt']; ?></td>
    <td><?php echo $rowMain['Grand_Total']; ?></td>
    <td><?php echo $rowMain['Re_Upad_Amt']; ?></td>
    </tr>
   <?php $T_Amt = $T_Amt + $rowMain['Grand_Total']; } while($rowMain=mysql_fetch_assoc($rsMain)); ?>
       <tr>
       <th colspan="8"><span style="float:right">Final amount paid to employees&nbsp;:&nbsp;<?php echo moneyFormatIndia($T_Amt);?></span>
       </th>
       </tr>
                                    </tbody>
        </table>
        </td>
		<?php }
		elseif($Date_Rangefixed && $Type=='Fixed' && $Status=='Paid')
	{?>
    <td colspan="11" valign="top">
        <table width="100%" border="1" cellspacing="2" cellpadding="2" class="table" id="table_data" >
                                             <thead>
                                        <tr>  
                                        <th width="7%"><center>Sr No.</center></th>
                                             <th width="25%"><center>Labour & Signature</center></th>
                                             <th width="12%"><center>Number Of Beam / Attendance / ...</center></th>
                                             <th width="12%"><center>Total Amount</center></th>
                                             <th width="15%"><center>Upad Amount</center></th>
                                            <th width="15%"><center>Grand Total</center></th>
                                             <th width="15%"><center>Remaining Amount</center></th>
                                           </tr>
                                       </thead>
                                    <tbody>
    <?php
	          $i=0;
	  $i++;
									do { ?>                                    
  <tr class="odd gradeX"> 
  <td><?php echo $i++; ?></td>
     <td style="height:100px"><?php echo $rowMain['Name']; ?></td>
    <td><?php echo $rowMain['No_Of']; ?></td>
    <td><?php echo $rowMain['Amount']; ?></td>
    <td><?php echo $rowMain['Upad_Amount']; ?></td>
    <td><?php echo $rowMain['Grand_Total']; ?></td>
      <td><?php echo $rowMain['Re_Amount']; ?></td>
    </tr>
   <?php $T_Amt = $T_Amt + $rowMain['Grand_Total']; } while($rowMain=mysql_fetch_assoc($rsMain)); ?>
       <tr>
       <th colspan="8"><span style="float:right">Final amount paid to employees&nbsp;:&nbsp;<?php echo moneyFormatIndia($T_Amt);?></span>
       </th>
       </tr>
                                    </tbody>
        </table>
        </td>
    <?php	}
		?>
        </tr>
</table>
</body>
</html>
<?php
 ob_flush(); ?>