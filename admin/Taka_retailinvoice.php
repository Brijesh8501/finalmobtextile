<?php include("logcode.php"); require_once('../Connections/brijesh8510.php');  error_reporting(0);
include("databaseconnect.php");
if(isset($_REQUEST['printinvoice']))
{
	$decodeurl = $_REQUEST['Taka_Invoice_Id'];
	$durl = urldecode($decodeurl); 
	$turl = str_replace("'"," ",$durl);
	$urls = explode(" ",$turl);
	$Taka_Invoice_Id = $urls[1];
		$sql = "SELECT taka_invoice.Taka_Invoice_Id, taka_invoice.Taka_Invoice_Date, taka_invoice.Taka_D_C_Id, taka_invoice.Taka_D_C_Date, customer_details.Cu_En_Name, customer_details.Address, broker_details1.B_Name, taka_invoice.Total_Amt, taka_invoice.Discount,taka_invoice.Interest, taka_invoice.Grandtotal FROM taka_invoice, customer_details, broker_details1 WHERE customer_details.Customer_Id = taka_invoice.Customer_Id AND broker_details1.Broker_Id = taka_invoice.Broker_Id AND  Taka_Invoice_Id = '".$Taka_Invoice_Id."' ";
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
	$Taka_Invoice_Id = $row['Taka_Invoice_Id'];	
	$Taka_Invoice_Date = $row['Taka_Invoice_Date'];		
	$Taka_D_C_Id = $row['Taka_D_C_Id'];
	$Taka_D_C_Date = $row['Taka_D_C_Date'];
	$Cu_En_Name = $row['Cu_En_Name'];
	$Address = $row['Address'];
	$B_Name = $row['B_Name'];
	$Total_Amt = $row['Total_Amt'];
	$Discount = $row['Discount'];
	$Interest = $row['Interest'];
	$Grandtotal =  $row['Grandtotal'];
}
$number = $row['Grandtotal'];
   $no = round($number);
   $point = round($number - $no, 2) * 100;
   $hundred = null;
   $digits_1 = strlen($no);
   $i = 0;
   $str = array();
   $words = array('0' => 'Zero', '1' => 'one', '2' => 'two',
    '3' => 'three', '4' => 'four', '5' => 'five', '6' => 'six',
    '7' => 'seven', '8' => 'eight', '9' => 'nine',
    '10' => 'ten', '11' => 'eleven', '12' => 'twelve',
    '13' => 'thirteen', '14' => 'fourteen',
    '15' => 'fifteen', '16' => 'sixteen', '17' => 'seventeen',
    '18' => 'eighteen', '19' =>'nineteen', '20' => 'twenty',
    '30' => 'thirty', '40' => 'forty', '50' => 'fifty',
    '60' => 'sixty', '70' => 'seventy',
    '80' => 'eighty', '90' => 'ninety', '99' => 'ninetynine');
   $digits = array('', 'hundred', 'thousand', 'lakh', 'crore');
   while ($i < $digits_1) {
     $divider = ($i == 2) ? 10 : 100;
     $number = floor($no % $divider);
     $no = floor($no / $divider);
     $i += ($divider == 10) ? 1 : 2;
     if ($number) {
        $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
        $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
        $str [] = ($number < 21) ? $words[$number] .
            " " . $digits[$counter] . $plural . " " . $hundred
            :
            $words[floor($number / 10) * 10]
            . " " . $words[$number % 10] . " "
            . $digits[$counter] . $plural . " " . $hundred;
     } else $str[] = null;
  }
  $str = array_reverse($str);
  $result = implode('', $str);
  $points = ($point) ?
    "." . $words[$point / 10] . " " . 
          $words[$point = $point % 10] : '';
////////////////////////////////// number format in point 
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
////////////////////////////////// number format without point 
function moneyFormatIndia1($num){
    $explrestunits = "" ;
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
    return $thecash; // writes the final format where $currency is the currency symbol.
}
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }
  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);
  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}
mysql_select_db($database_brijesh8510, $brijesh8510);
$query_RsTakaInvoice = "SELECT taka_invoiceorg.Ta_Invoice_Id, taka_invoiceorg.Taka_Invoice_Id, quality_details.Quality_Name, taka_invoiceorg.Total_Taka, taka_invoiceorg.Total_Meter, taka_invoiceorg.Rate, taka_invoiceorg.Amt FROM taka_invoiceorg, quality_details WHERE quality_details.Quality_Id = taka_invoiceorg.Quality_Id AND taka_invoiceorg.Taka_Invoice_Id = '".$Taka_Invoice_Id."' ";
$RsTakaInvoice = mysql_query($query_RsTakaInvoice, $brijesh8510) or die(mysql_error());
$row_RsTakaInvoice = mysql_fetch_assoc($RsTakaInvoice);
$totalRows_RsTakaInvoice = mysql_num_rows($RsTakaInvoice);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Taka [INVOICE]</title>
<style type="text/css">
    .nobordersheight {
	height:500px; 
  }
  table
  {
	  border-collapse:collapse;
  }
</style>
<link rel="shortcut icon" href="Icons/st85.png">
</head>
<body onload="window.print() ">
<table width="990" border="0" align="center" cellpadding="5" cellspacing="5">
  <tr style="font-size:24px">
    <td width="2"></td>
      <td><table>
      <tr>
        <td width="20%"><b>INVOICE</b></td>
      </tr>
    </table></td>
    <td width="20">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="center"  style="color:#000; font-size:24px"><i>!! Shree Ganeshayah Namaha !!</i><br/><strong>SHINGORI TEXTILE</strong></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="center"  style="color:#121212">Factory1 : Plot No: D-5/6 Prince Industrial Society, Jiyav-Budiya Road, Bhestan, Surat.<br/>
    Factory2 : Plot No: D-1 To 4, Plot No: D-15 To 20 Maruti Industrial Society, Behind Daksheshwar Mahadev Mandir, Pandesara, Surat. <br/>Mobile No- 9327399999</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3"><table width="100%" border="1" cellspacing="2" cellpadding="2" style="border-color:#000" class="table">
      <tr style="background-color:#FFF ; color:#000">
        <td colspan="2"><table width="100%" border="0" cellspacing="2" cellpadding="2">
          <tr>
            <td width="10%">To :</td>
            <td width="90%">M/s.&nbsp;<strong><?php echo $Cu_En_Name; ?></strong></td>
          </tr>
          <tr>
            <td></td>
            <td><?php echo strtoupper($Address); ?></td>
          </tr>
        </table></td>
        <td colspan="3"><table width="100%" border="0" cellspacing="2" cellpadding="2">
          <tr>
          <th colspan="3" style="font-size:18px"><center>INVOICE</center></th>
          </tr>
          <tr>
            <td>Invoice No.</td>
            <td>:</td>
            <td>&nbsp;<strong><?php echo $Taka_Invoice_Id; ?></strong></td>
          </tr>
          <tr>
            <td>Invoice Date</td>
            <td>:</td>
            <td>&nbsp;<strong><?php echo $Taka_Invoice_Date; ?></strong></td>
          </tr>
          <tr>
            <td>Challan No</td>
            <td>:</td>
            <td>&nbsp;<?php echo $Taka_D_C_Id; ?></td>
          </tr>
          <tr>
            <td>Challan Date</td>
            <td>:</td>
            <td>&nbsp;<?php echo $Taka_D_C_Date; ?></td>
          </tr>
          <tr>
            <td>Broker</td>
            <td>:</td>
            <td width="75%">&nbsp;<?php echo $B_Name; ?></td>
          </tr>
        </table></td>
      </tr>
      <tr bgcolor="#FFFFFF" style="color:#000">
        <th width="35%">Description of Goods</th>
        <th width="15%">Total Taka</th>
        <th width="15%">Meters</th>
        <th width="15%">Rate</th>
        <th width="15%">Amount</th>
      </tr>
      <tr>
      <td colspan="5" class="nobordersheight" valign="top"><table width="100%" border="0">
      <?php do { ?>
        <tr style="background-color:#FFF ; color:#000">
          <td align="left" width="35%"><?php echo $row_RsTakaInvoice['Quality_Name']; ?></td>
          <td align="left" width="15%"><?php echo moneyFormatIndia1($row_RsTakaInvoice['Total_Taka']); ?></td>
          <td align="left" width="15%"><?php echo moneyFormatIndia($row_RsTakaInvoice['Total_Meter']); ?></td>
          <td align="left" width="15%"><?php echo $row_RsTakaInvoice['Rate']; ?></td>
          <td align="left" width="15%"><?php echo moneyFormatIndia($row_RsTakaInvoice['Amt']); ?></td>
        </tr>
        <?php } while ($row_RsTakaInvoice = mysql_fetch_assoc($RsTakaInvoice)); ?>
        </table>
        </td>
        </tr>
      <tr style="color:#000; background-color:#FFF">
        <td colspan="3" <?php if($Interest>=1) { ?>rowspan="5"<?php } else {?>rowspan="4"<?php } ?>><table width="100%" border="0" cellspacing="2" cellpadding="2">
          <tr>
            <th width="17%">Rs.(In Word) :</th>
            <td><b><?php echo strtoupper($result . "Only"); ?></b></td>
            </tr>
            <tr>
            <td>&nbsp;</td>
            </tr>
            <tr>
            <th colspan="2">GST/TIN NO. 24722102846&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dt. 08-02-2008</th>
            </tr>
             <tr>
            <th colspan="2">CST/TIN NO. 24222102846&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dt. 08-02-2008</th>
            </tr>
          </table></td>
      <tr>
        <th width="14%">Total Amount :</th>
        <th><?php echo moneyFormatIndia($Total_Amt); ?></th>
      </tr>
        <tr>
        <th width="12%">Discount (%) :</th>
        <th><?php echo $Discount; ?>&nbsp;%</th>
        </tr>
        <?php if($Interest>=1) { ?>
         <tr>
        <th width="12%">Interest (%) :</th>
        <th><?php echo $Interest; ?>&nbsp;%</th>
        </tr><?php } ?>
        <tr>
        <th width="12%">Grand Total :</th>
        <th><?php echo moneyFormatIndia($Grandtotal); ?></th>
      </tr>
      <tr style="background-color:#FFF ; color:#000" >
        <td colspan="4"><table width="100%" border="0" cellspacing="2" cellpadding="2">
          <tr>
            <td colspan="2"><strong>TERMS AND CONDITIONS OF SALES :</strong></td>
            <th width="33%">&nbsp;</th>
          </tr>
          <tr>
            <td colspan="3"><ol start="1">
<li> We reserve the right of recovery before due date at any time.</li>
<li> The sale is understood to have been made after due consideration of the quality of goods and prevailing rates.</li>
<li> Report shall have to be presented within 24 hours of delivery, where after no complaints or any change in quality or shortage in quantity shall be considered.</li>
<li> The goods are dispatched at buyers risk.</li>
<li> The payment of this bill shall be made by the due failing which interest @ the rate of 2% p.m. shall be charged from  the due date.</li>
<li> Subject to SURAT jurisdiction.</li></ol></td>
            </tr>
          <tr>
            <td height="50">&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <th>Received By</th>
            <th>Prepared By</th>
            <th>Checked By</th>
          </tr>
        </table></td>
        <td width="20%"><table width="100%" border="0" cellspacing="2" cellpadding="2">
         <tr>
            <th height="70">&nbsp;</th>
          </tr>
          <tr>
            <td align="center" style="font-size:14px"><strong>For SHINGORI TEXTILE</strong></td>
          </tr>
          <tr>
            <th height="50">&nbsp;</th>
          </tr>
          <tr>
            <td align="center" style="font-size:14px"><strong>Authorized Signatory</strong></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($RsTakaInvoice);
 ob_flush(); ?>