<?php include("logcode.php"); require_once('../Connections/brijesh8510.php'); error_reporting(0); 
include("databaseconnect.php");
if(isset($_REQUEST['print']))
{
		$decodeurl = $_REQUEST['Bo_D_C_Id'];
	$durl = urldecode($decodeurl); 
	$turl = str_replace("'"," ",$durl);
	$urls = explode(" ",$turl);
	$Bo_D_C_Id = $urls[1];
	$sql = "select * from bobbin_d_cmigrate where bobbin_d_cmigrate.Bo_D_C_Id = '".$Bo_D_C_Id."'  ";
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
	$Bo_D_C_Id = $row['Bo_D_C_Id'];
	$Bo_D_C_Date = $row['Bo_D_C_Date'];
	$Total_Cart = $row['Total_Cart'];
	$From_Ad = $row['From_Ad'];
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
$query_rsLotid = "select Bobbin_D_C_Id,Bo_D_C_Id,Chbo_D_C_Id,Total_Cartoon,quality_details.Quality_Name,R_Id from boobin_dcorgmigrate,quality_details where quality_details.Quality_Id = boobin_dcorgmigrate.Quality_Id AND Bo_D_C_Id = '$Bo_D_C_Id' ";
$rsLotid = mysql_query($query_rsLotid, $brijesh8510) or die(mysql_error());
$row_rsLotid = mysql_fetch_assoc($rsLotid);
$totalRows_rsLotid = mysql_num_rows($rsLotid);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>BOBBIN [M]</title>
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
    <td width="2"></td>
    <td><table>
      <tr>
        <td width="20%">MIGRATION DELIVERY CHALLAN</td>
      </tr>
    </table></td>
    <td width="20">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp; </td>
    <td align="center" style="font-size:24px"><span style="font-size:24px"><i>!! Shree Ganeshayah Namaha !!</i><br/>
    <b>SHINGORI TEXTILE</b></span></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="center"><span>Factory1 : Plot No: D-5/6 Prince Industrial Society, Jiyav-Budiya Road, Bhestan, Surat.<br/>
     Factory2 : Plot No: D-1 To 4 Maruti Industrial Society, Behind Daksheshwar Mahadev Mandir, Pandesara, Surat.<br/>
    Mobile No- 9327399999</span></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4"><table width="100%" border="1" cellspacing="2" cellpadding="2" class="table">
      <tr>
        <td colspan="2"><table width="100%" border="0" cellspacing="2" cellpadding="2">
          <tr>
            <td width="10%">To :</td>
            <td width="90%">M/s.&nbsp;<b><?php echo $From_Ad; ?></b></td>
          </tr>
        </table></td>
        <td colspan="5"><table width="100%" border="0" cellspacing="2" cellpadding="2">
         <tr>
          <th colspan="3" style="font-size:18px"><center>CHALLAN</center></th>
          </tr>
          <tr>
            <td>Challan No.</td>
            <td>:</td>
            <td>&nbsp;<b><?php echo $Bo_D_C_Id; ?></b></td>
          </tr>
          <tr>
            <td>Challan Date</td>
            <td>:</td>
            <td>&nbsp;<b><?php echo $Bo_D_C_Date; ?></b></td>
          </tr>
         </table></td>
      </tr>
      <tr>
        <th width="15%"><center>Sub-Bobbin ID</center></th>
        <th width="30%"><center>Cartoon</center></th>
        <th width="50%"><center>Quality</center></th>
       </tr>
        <tr>
      <td colspan="7" class="nobordersheight" valign="top"><table width="100%" border="0">
      <?php 
	     do { ?>
        <tr>
           <td align="left" width="15%"><?php echo $row_rsLotid['Chbo_D_C_Id']; ?></td>
           <td align="left" width="30%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo moneyFormatIndia1($row_rsLotid['Total_Cartoon']); ?></td>
         <td align="left" width="50%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row_rsLotid['Quality_Name']; ?></td>
        </tr>
        <?php } while ($row_rsLotid = mysql_fetch_assoc($rsLotid)); ?>
         </table>
        </td>
        </tr>
      <tr>
        <th width="15%">Total :</th>
        <th>&nbsp;<?php echo $row['Total_Cart']; ?></th>
        <th></th>
    </tr>
      <tr>
        <td colspan="2"><table width="100%" border="0" cellspacing="2" cellpadding="2">
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
        <td colspan="5"><table width="100%" border="0" cellspacing="2" cellpadding="2">
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