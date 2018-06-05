<?php include("logcode.php"); error_reporting(0);
include("databaseconnect.php");
if(isset($_REQUEST['print']))
{
	$Trans_Typefresh = $_REQUEST['Trans_Typefresh'];  
    if($Trans_Typefresh=='Beam')
	{
	$query1 = "SELECT beam_invoice.Beam_Invoice_Id,transactions_beam1.Status,beam_invoice.Grand_Amt,beam_invoice.Beam_Invoice_Date FROM beam_invoice LEFT JOIN transactions_beam1 ON beam_invoice.Beam_Invoice_Id = transactions_beam1.Trans_Invoice_No WHERE transactions_beam1.Status IS NULL";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
	}
	else if($Trans_Typefresh=='Bobbin')
	{
		$query1 = "SELECT bobbin_invoice.Bobbin_Invoice_Id,transactions_bobbin.Status,bobbin_invoice.Grand_Amt,bobbin_invoice.Bobbin_Invoice_Date FROM bobbin_invoice LEFT JOIN transactions_bobbin ON bobbin_invoice.Bobbin_Invoice_Id = transactions_bobbin.Trans_Invoice_No WHERE transactions_bobbin.Status IS NULL";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
	}
	elseif($Trans_Typefresh=='Taka')
	{
		$query1 = "SELECT taka_invoice.Taka_Invoice_Id,transactions_taka.Status,taka_invoice.Grandtotal,taka_invoice.Taka_Invoice_Date FROM taka_invoice LEFT JOIN transactions_taka ON taka_invoice.Taka_Invoice_Id = transactions_taka.Trans_Invoice_No WHERE transactions_taka.Status IS NULL";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
	}
	elseif($Trans_Typefresh=='Saree')
	{
		$query1 = "SELECT saree_invoice.Saree_Invoice_Id,transactions_saree.Status,saree_invoice.Grandtotal,saree_invoice.Saree_Invoice_Date FROM saree_invoice LEFT JOIN transactions_saree ON saree_invoice.Saree_Invoice_Id = transactions_saree.Trans_Invoice_No WHERE transactions_saree.Status IS NULL";
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
<title>TRANSACTION[[F] [<?php echo $Trans_Type;?>]] <?php echo date('Y/m/d h:i:s A'); ?></title>
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
    <td>
      <div id="print-header-wrapper">
                    <div class="row-fluid">&nbsp;FRESH-INVOICE TRANSACTION&nbsp;[<?php echo $Trans_Typefresh;?>]&nbsp;<b>Report</b></div>
                    <div class="row-fluid" align="center"><strong>!! Shree Ganeshayan Namaha !!</strong><br/>
    <strong>SHINGORI TEXTILE</strong></div>
                    </div>
    </td>
  </tr>
  <tr>  
    <td colspan="10" valign="top">
        <table width="100%" border="1" cellspacing="2" cellpadding="2" class="table" id="table_data" >
        <thead>
          <tr>
                                             <th width="15%"><center>Invoive ID</center></th>
                                             <th width="15%"><center>Grand Total</center></th>
                                             <th width="15%"><center>Invoice Date</center></th>
      </tr> 
       </thead>
       <tbody>
    <?php
	if($Trans_Typefresh=='Beam')
	{
									do { ?>                                    
                                      
  <tr align="center"> 
  <td><?php echo $rowMain['Beam_Invoice_Id']; ?></td>
  <td><?php echo moneyFormatIndia($rowMain['Grand_Amt']); ?></td>
    <td><?php echo $rowMain['Beam_Invoice_Date']; ?></td>
   </tr>
    <?php $Gr_Amt = $Gr_Amt + $rowMain['Grand_Amt'];
	} while($rowMain=mysql_fetch_assoc($rsMain)); 
	}
	elseif($Trans_Typefresh=='Bobbin')
	{
		do { ?>                                    
     <tr align="center"> 
  <td><?php echo $rowMain['Bobbin_Invoice_Id']; ?></td>
  <td><?php echo moneyFormatIndia($rowMain['Grand_Amt']); ?></td>
    <td><?php echo $rowMain['Bobbin_Invoice_Date']; ?></td>
   </tr>
    <?php $Gr_Amt = $Gr_Amt + $rowMain['Grand_Amt'];
	} while($rowMain=mysql_fetch_assoc($rsMain));
	}
	elseif($Trans_Typefresh=='Taka')
	{
		do { ?>                                    
                                      
  <tr align="center"> 
  <td><?php echo $rowMain['Taka_Invoice_Id']; ?></td>
  <td><?php echo moneyFormatIndia($rowMain['Grandtotal']); ?></td>
    <td><?php echo $rowMain['Taka_Invoice_Date']; ?></td>
   </tr>
    <?php $Gr_Amt = $Gr_Amt + $rowMain['Grandtotal'];
	} while($rowMain=mysql_fetch_assoc($rsMain)); 
	}
	elseif($Trans_Typefresh=='Saree')
	{
		do { ?>                                    
                                      
  <tr align="center"> 
  <td><?php echo $rowMain['Saree_Invoice_Id']; ?></td>
  <td><?php echo moneyFormatIndia($rowMain['Grandtotal']); ?></td>
    <td><?php echo $rowMain['Saree_Invoice_Date']; ?></td>
   </tr>
    <?php $Gr_Amt = $Gr_Amt + $rowMain['Grandtotal'];
	} while($rowMain=mysql_fetch_assoc($rsMain)); 
	}?>
     <tr>
    <th colspan="4"><span style="float:right">Total Amount&nbsp;:&nbsp;<?php echo moneyFormatIndia($Gr_Amt);?></span></th>
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