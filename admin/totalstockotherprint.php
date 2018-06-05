<?php include("logcode.php"); 
error_reporting(0);
include("databaseconnect.php");
if(isset($_REQUEST['print']))
{
	$Mach_Part_Id = $_REQUEST['Mach_Part_Id']; 
 $sql = "select Other_Used_Date,machine_parts.Mach_Part_Id,machine_parts.Mach_Pname,Quantity_Used,Quantity_Re,labour_details.Name,other_used1.Entry_Date,other_used1.Entry_Id from other_used1,machine_parts,labour_details where machine_parts.Mach_Part_Id = other_used1.Mach_Part_Id AND machine_parts.Mach_Part_Id = '$Mach_Part_Id' AND labour_details.Labour_Id = other_used1.Labour_Id order by Other_Used_Id desc";
$result = mysql_query($sql);
$row_result = mysql_fetch_array($result); 
$total_result = mysql_num_rows($result);
}
////////////////////////////////// number format in point ///////////////////////////////////////////////////////
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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>STOCK-OTHER <?php echo date('Y/m/d h:i:s A'); ?></title>
 <link rel="shortcut icon" href="Icons/st85.png">
<style type="text/css">
table{
	border-collapse:collapse;
}
</style>
</head>
<body onload="window.print() ">
<table width="990" border="0" align="center" cellpadding="5" cellspacing="5" >
  <tr  style="font-size:24px"><?php date_default_timezone_set("Asia/Calcutta"); ?>
    <td width="25"></td>
    <td>
      <div id="print-header-wrapper">
                    <div class="row-fluid">&nbsp;&nbsp;&nbsp;STOCK-OTHER&nbsp;<b>Report</b></div>
                    <div class="row-fluid" align="center"><strong>!! Shree Ganeshayan Namaha !!</strong><br/>
    <strong>SHINGORI TEXTILE</strong></div>
                    <div class="row-fluid" align="right"><?php echo date('Y/m/d h:i:s A'); ?>&nbsp;&nbsp;</div>
                </div>
    </td>
    <td></td>
  </tr>
  <tr>
        <td colspan="11" valign="top">
  <table width="100%" border="1" cellspacing="2" cellpadding="2" class="table" id="table_data" >
        <thead>
          <tr>
      
                                             <th width="5%"><center>Sr No.</center></th>
                                             <th width="7%"><center>Date</center></th>
                                             <th width="25%"><center>Machine-Parts</center></th>
                                              <th width="7%"><center>Quantity-Used</center></th>
                                            <th width="7%"><center>Quantity-Remaining</center></th>
                                            <th width="10%"><center>Master</center></th>
                                            <th width="10%"><center>Entry Date</center></th>
                                            <th width="7%"><center>Entry #ID</center></th>
      </tr> 
      </thead>
        <tbody>
    <?php $i=0;
	  $i++;?>
    <?php
									do { ?> 
  <tr align="center"> 
     <td><?php echo $i++; ?></td>
    <td><?php echo $row_result['Other_Used_Date']; ?></td>
    <td><?php echo $row_result['Mach_Pname']; ?></td>
    <td><?php echo moneyFormatIndia1($row_result['Quantity_Used']); ?></td>
    <td><?php echo moneyFormatIndia1($row_result['Quantity_Re']); ?></td>
    <td><?php echo $row_result['Name']; ?></td>
    <td><?php echo $row_result['Entry_Date']; ?></td>
    <td><?php echo $row_result['Entry_Id']; ?></td>
    </tr>
   <?php } while($row_result=mysql_fetch_array($result)); ?>
     </tbody>
 </table>
 </td>
        </tr>
</table>
</body>
</html>
<?php
 ob_flush(); ?>