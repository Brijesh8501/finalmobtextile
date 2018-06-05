<?php include("logcode.php");
error_reporting(0);
include("databaseconnect.php");
if(isset($_REQUEST['print']))
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
<title>OTHER-CREDIT&nbsp;[<?php echo $TypePetty;?>]&nbsp;&nbsp;<?php echo $date.' - '.$date1;?></title>
 <link rel="shortcut icon" href="Icons/st85.png">
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
                    <div class="row-fluid">&nbsp;OTHER-CREDIT ENTRY <b>Report</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i><?php echo $date.' - '.$date1;?></i></div>
                    <div class="row-fluid" align="center"><strong>!! Shree Ganeshayan Namaha !!</strong><br/>
    <strong>SHINGORI TEXTILE</strong></div>
                    <div class="row-fluid" align="right">&nbsp;&nbsp;<span style="font-size:14px;float:left">Search By&nbsp;:&nbsp;<?php echo $TypePetty;?></span><?php echo date('Y/m/d h:i:s A'); ?>&nbsp;&nbsp;</div>
                   </div>
    </td>
  </tr>
  <tr>  
    <td colspan="10" valign="top">
        <table width="100%" border="1" cellspacing="2" cellpadding="2" class="table" id="table_data" >
        <thead>
          <tr>
                                             <th width="12%"><center>Other-Credit ID</center></th>
                                             <th width="20%"><center>Subject</center></th>
                                             <th width="30%"><center>Description</center></th>
                                             <th width="12%"><center>Payment Type</center></th>
                                             <th width="20%"><center>Bank</center></th>
                                            <th width="30%"><center>Cheque No</center></th>
                                            <th width="10%"><center>Amount</center></th>
                                            <th width="10%"><center>Date</center></th>
                                            <th width="15%"><center>Entry Date</center></th>
                                            <th width="10%"><center>Entry #ID</center></th>
      </tr> 
       </thead>
       <tbody>
    <?php
									$i = 0;
									$i++;
									do { ?>                                    
  <tr align="center"> 
    <td><?php echo $rowMain['Petty_Id']; ?></td>
     <td><?php echo $rowMain['Subject']; ?></td>
    <td><?php echo $rowMain['Description']; ?></td>
    <td><?php echo $rowMain['Payment_Type']; ?></td>
    <td><?php echo $rowMain['Bank_Id']; ?></td>
    <td><?php echo $rowMain['Cheque_No']; ?></td>
    <td><?php echo moneyFormatIndia($rowMain['Cheque_Amount']); ?></td>
    <td><?php echo $rowMain['Date']; ?></td>
    <td><?php echo $rowMain['Entry_Date']; ?></td>
    <td><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
   <?php $Chq_Amt = $Chq_Amt + $rowMain['Cheque_Amount']; } while($rowMain=mysql_fetch_assoc($rsMain)); ?>
    <tr>
    <th colspan="11"><span style="float:right">Total Amount&nbsp;:&nbsp;<?php echo moneyFormatIndia($Chq_Amt);?></span>
    </th>
    </tr>
</tbody>
        </table>
        </td>
        </tr>
        </table>
</body>
</html>
<?php
 ob_flush(); ?>