<?php include("logcode.php"); require_once('../Connections/brijesh8510.php'); error_reporting(0);
include("databaseconnect.php");
if(isset($_REQUEST['print']))
{
	$decodeurl = $_REQUEST['Taka_D_C_Id'];
	$durl = urldecode($decodeurl); 
	$turl = str_replace("'"," ",$durl);
	$urls = explode(" ",$turl);
	$Taka_D_C_Id = $urls[1];
	$sql = "SELECT taka_d_c_1.Taka_D_C_Id, taka_d_c_1.Taka_D_C_Date, customer_details.Cu_En_Name,customer_details.Address, broker_details1.B_Name, taka_d_c_1.T_Order_Id, taka_d_c_1.Total_Taka FROM taka_d_c_1, customer_details, broker_details1 WHERE customer_details.Customer_Id = taka_d_c_1.Customer_Id AND broker_details1.Broker_Id = taka_d_c_1.Broker_Id AND taka_d_c_1.Taka_D_C_Id='".$Taka_D_C_Id."' ";
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
	$Taka_D_C_Id = $row['Taka_D_C_Id'];
	$Taka_D_C_Date = $row['Taka_D_C_Date'];
	$Cu_En_Name = $row['Cu_En_Name'];
	$B_Name = $row['B_Name'];
	$Address = $row['Address'];
	}
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
$query_RsTakaDetails = "SELECT taka_dcorg.Ta_D_C_Id, taka_dcorg.Taka_D_C_Id, taka_dcorg.Taka_Id, taka_dcorg.Taka_Meter, taka_dcorg.Taka_Weight, quality_details.Quality_Name FROM taka_dcorg, quality_details WHERE quality_details.Quality_Id = taka_dcorg.Quality_Id AND taka_dcorg.Taka_D_C_Id='".$Taka_D_C_Id."' AND Status = 'Sale'";
$RsTakaDetails = mysql_query($query_RsTakaDetails, $brijesh8510) or die(mysql_error());
$row_RsTakaDetails = mysql_fetch_assoc($RsTakaDetails);
$totalRows_RsTakaDetails = mysql_num_rows($RsTakaDetails);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>TAKA [DC]</title>
<style type="text/css">
  .nobordersheight {
	height:795px; 
  }
  table{
	  border-collapse:collapse;
  }
</style>
<link rel="shortcut icon" href="Icons/st85.png">
</head>
<body onload="window.print()">
<table width="990" border="0" align="center" cellpadding="5" cellspacing="5" >
  <tr  style="font-size:24px">
    <td width="25">&nbsp;</td>
    <td ><table>
      <tr>
       <td width="20%"><b>DELIVERY CHALLAN</b></td>
      </tr>
    </table></td>
    <td width="31">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="center"   style="color:#06F; font-size:24px"><span style="color:#000; font-size:24px"><i>!! Shree Ganeshayah Namaha !!</i><br/>
    <strong>SHINGORI TEXTILE</strong></span></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="center"  style="color:#06F" ><span style="color:#121212">Factory1 : Plot No: D-5/6 Prince Industrial Society, Jiyav-Budiya Road, Bhestan, Surat.<br/>
          Factory2 : Plot No: D-1 To 4, Plot No: E-1 To 6 Maruti Industrial Society, Behind Daksheshwar Mahadev Mandir, Pandesara, Surat. <br/>
Mobile No- 9327399999</span></td>
    <td>&nbsp;</td>
  </tr>
  <tr >
    <td colspan="4"><table width="100%" border="1" cellspacing="2" cellpadding="2" style="border-color:#000" class="table">
      <tr style="background-color:#FFF ; color:#000">
        <td colspan="3" valign="top"><table width="100%" border="0" cellspacing="2" cellpadding="2" >
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
          <th colspan="3" style="font-size:18px"><center>CHALLAN</center></th>
          </tr>
          <tr>
            <td>Challan No.</td>
             <td>:</td>
            <td>&nbsp;<strong><?php echo $row['Taka_D_C_Id']; ?></strong></td>
          </tr>
          <tr>
            <td>Challan Date</td>
             <td>:</td>
            <td>&nbsp;<strong><?php echo $Taka_D_C_Date; ?></strong></td>
          </tr>
          <tr>
            <td>Broker</td>
             <td>:</td>
            <td width="75%">&nbsp;<?php echo $row['B_Name']; ?></td>
          </tr>
          <tr>
            <td>Order No.</td>
             <td>:</td>
            <td width="75%">&nbsp;<?php echo $row['T_Order_Id']; ?></td>
          </tr>
        </table></td>
      </tr>
      <tr bgcolor="#FFFFFF" style="color:#000" >
        <th width="20%">Taka ID</th>
        <th width="20%">Weight</th>
        <th width="20%">Meter</th>
        <th colspan="2">Quality</th>
      </tr>
      <tr>
      <td colspan="5" class="nobordersheight" valign="top"><table width="100%" border="0">
      <?php do { ?>
  <tr style="background-color:#FFF ; color:#000">
    <td align="left" width="20%"><?php echo $row_RsTakaDetails['Taka_Id']; ?></td>
     <td align="left" width="20%"><?php echo moneyFormatIndia($row_RsTakaDetails['Taka_Weight']); ?></td>
     <td align="left" width="20%"><?php echo moneyFormatIndia($row_RsTakaDetails['Taka_Meter']); ?></td>
    <td align="left" width="40%">&nbsp;&nbsp;<?php echo $row_RsTakaDetails['Quality_Name']; ?></td>
  </tr>
  <?php $tot_mtr = $tot_mtr + $row_RsTakaDetails['Taka_Meter'];
    } while ($row_RsTakaDetails = mysql_fetch_assoc($RsTakaDetails)); ?>
   </table>
        </td>
        </tr>
      <tr bgcolor="#FFFFFF" style="color:#000">
        <th>Total Taka&nbsp;:&nbsp;<?php echo $totalRows_RsTakaDetails ?></th>
        <th></th>
        <th>Total Meter&nbsp;:&nbsp;<?php echo moneyFormatIndia($tot_mtr); ?></th>
        <th colspan="2"></th>
    </tr>
      <tr style="background-color:#FFF ; color:#000">
        <td colspan="3"><table width="100%" border="0" cellspacing="2" cellpadding="2">
          <tr>
            <td colspan="3"></td>
          </tr>
          <tr>
            <td height="50">&nbsp;</td>
            <td>&nbsp;</td>
            <td width="33%">&nbsp;</td>
          </tr>
          <tr>
            <th>Received By</th>
            <th>Prepared By</th>
            <th>Checked By</th>
          </tr>
        </table></td>
        <td colspan="2"><table width="100%" border="0" cellspacing="2" cellpadding="2">
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
mysql_free_result($RsTakaDetails);
 ob_flush(); ?>