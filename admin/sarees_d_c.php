<?php include("logcode.php"); require_once('../Connections/brijesh8510.php'); error_reporting(0); 
include("databaseconnect.php");
if(isset($_REQUEST['print']))
{
		$decodeurl = $_REQUEST['Saree_D_C_Id'];
	$durl = urldecode($decodeurl); 
	$turl = str_replace("'"," ",$durl);
	$urls = explode(" ",$turl);
	$Saree_D_C_Id = $urls[1];
	$sql = "SELECT saree_d_c.Saree_D_C_Id, saree_d_c.Saree_D_C_Date, customer_details.Cu_En_Name, customer_details.Address, broker_details1.B_Name, saree_d_c.Order_Id, saree_d_c.Total_Lot FROM saree_d_c, customer_details, broker_details1 WHERE customer_details.Customer_Id = saree_d_c.Customer_Id AND broker_details1.Broker_Id = saree_d_c.Broker_Id AND saree_d_c.Saree_D_C_Id = '".$Saree_D_C_Id."' ";
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
	$total_row = mysql_num_rows($result);
	$Saree_D_C_Id = $row['Saree_D_C_Id'];
	$Saree_D_C_Date = $row['Saree_D_C_Date'];
	$Cu_En_Name = $row['Cu_En_Name'];
	$Address = $row['Address'];
	$B_Name = $row['B_Name'];
	$Order_Id = $row['Order_Id'];
	$Total_Lot = $row['Total_Lot'];
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
$query_rsLotid = "SELECT saree_dcorg.Sa_D_C_Id, saree_dcorg.Saree_D_C_Id, saree_dcorg.Saree_Lot_Id, saree_dcorg.Saree_Lot_Meter, saree_dcorg.Saree_Pieces, saree_dcorg.Saree_Weight, quality_details.Quality_Name, design_details.Design, saree_dcorg.Status FROM saree_dcorg, quality_details, design_details WHERE quality_details.Quality_Id = design_details.Quality_Id AND design_details.Design_Id = saree_dcorg.Design_Id AND saree_dcorg.Saree_D_C_Id='".$Saree_D_C_Id."' AND Status = 'Sale'";
$rsLotid = mysql_query($query_rsLotid, $brijesh8510) or die(mysql_error());
$row_rsLotid = mysql_fetch_assoc($rsLotid);
$totalRows_rsLotid = mysql_num_rows($rsLotid);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SAREE [DC]</title>
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
<body onload="window.print() ">
<table width="990" border="0" align="center" cellpadding="5" cellspacing="5">
  <tr style="font-size:24px">
    <td width="2">&nbsp;</td>
    <td><b>DELIVERY CHALLAN</b></td>
    <td width="20">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp; </td>
    <td align="center" style="font-size:24px"><span style="font-size:24px"><i>!! Shree Ganeshayah Namaha !!</i><br/>
    <strong>SHINGORI TEXTILE</strong></span></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="center">Factory1 : Plot No: D-5/6 Prince Industrial Society, Jiyav-Budiya Road, Bhestan, Surat.<br/>Factory2 : Plot No: D-1 To 4 Maruti Industrial Society, Behind Daksheshwar Mahadev Mandir, Pandesara, Surat. <br/>Mobile No-9327399999</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3"><table width="100%" border="1" cellspacing="2" cellpadding="2">
      <tr>
        <td colspan="3"><table width="100%" border="0" cellspacing="2" cellpadding="2">
          <tr>
            <td width="10%">To :</td>
            <td width="90%">M/s.&nbsp;<strong><?php echo $Cu_En_Name; ?></strong></td>
          </tr>
          <tr>
            <td></td>
            <td><?php echo $Address; ?></td>
          </tr>
        </table></td>
        <td colspan="4"><table width="100%" border="0" cellspacing="2" cellpadding="2">
         <tr>
          <th colspan="3" style="font-size:18px"><center>CHALLAN</center></th>
          </tr>
          <tr>
            <td>Challan No.</td>
            <td>:</td>
            <td>&nbsp;<strong><?php echo $Saree_D_C_Id; ?></strong></td>
          </tr>
          <tr>
            <td>Challan Date</td>
            <td>:</td>
            <td>&nbsp;<strong><?php echo $Saree_D_C_Date; ?></strong></td>
          </tr>
          <tr>
            <td>Broker</</td>
            <td>:</td>
            <td width="75%">&nbsp;<?php echo $B_Name; ?></td>
          </tr>
           <tr>
            <td>Order No.</</td>
            <td>:</td>
            <td width="75%">&nbsp;<?php echo $Order_Id; ?></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <th width="15%">Lot  ID</th>
        <th width="30%">Quality</th>
        <th width="25%" colspan="2">Design</th>
        <th width="15%">Lot Meter</th>
        <th width="12%">Lot Weight</th>
        <th width="20%">Piecess</th>
      </tr>
        <tr>
      <td colspan="7" class="nobordersheight" valign="top"><table width="100%" border="0">
      <?php 
	     do { ?>
        <tr>
          <td align="left" width="17%"><?php echo $row_rsLotid['Saree_Lot_Id']; ?></td>
          <td align="left" width="30%"><?php echo $row_rsLotid['Quality_Name']; ?></td>
          <td align="left" width="25%"><?php echo $row_rsLotid['Design']; ?></td>
          <td align="left" width="15%"><?php echo moneyFormatIndia($row_rsLotid['Saree_Lot_Meter']); ?></td>
          <td align="left" width="12%"><?php echo moneyFormatIndia($row_rsLotid['Saree_Weight']); ?></td>
          <td align="left" width="20%"><?php echo moneyFormatIndia1($row_rsLotid['Saree_Pieces']); ?></td>
        </tr>
          <?php 
		  $tot_meter = $tot_meter+$row_rsLotid['Saree_Lot_Meter'];
		  $tot_weight = $tot_weight+$row_rsLotid['Saree_Weight'];
		  $tot_pieces = $tot_pieces+$row_rsLotid['Saree_Pieces']; ?>
        <?php } while ($row_rsLotid = mysql_fetch_assoc($rsLotid)); ?>
         </table>
        </td>
        </tr>
      <tr>
        <th width="15%">Total</th>
        <th>Lot&nbsp;:&nbsp;<?php echo $row['Total_Lot']; ?></th>
        <td colspan="2"></td>
        <th><?php echo moneyFormatIndia($tot_meter); ?></th>
        <th width="12%"><?php echo moneyFormatIndia($tot_weight); ?></th>
        <th><?php echo moneyFormatIndia1($tot_pieces); ?></th>      
    </tr>
      <tr>
        <td colspan="4"><table width="100%" border="0" cellspacing="2" cellpadding="2">
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
        <td colspan="3"><table width="100%" border="0" cellspacing="2" cellpadding="2">
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
mysql_free_result($rsLotid);
 ob_flush(); ?>