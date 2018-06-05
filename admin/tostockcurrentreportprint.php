<?php include("logcode.php"); error_reporting(0);
include("databaseconnect.php");
if(isset($_REQUEST['print']))
{
	$Stock = $_REQUEST['Stock']; 
	if($Stock=='Beam')
	{
$sql = "SELECT beam_dcorg.Beam_No, beam_dcorg.Taar,beam_dcorg.Beam_Meter,beam_dcorg.Weight,quality_details.Quality_Name,beam_d_c_1.Beam_D_C_Date,beam_dcorg.R_Id FROM beam_dcorg LEFT JOIN beam_machine ON beam_dcorg.Be_D_C_Id = beam_machine.Be_D_C_Id JOIN quality_details ON quality_details.Quality_Id = beam_dcorg.Quality_Id JOIN beam_d_c_1 on beam_d_c_1.Beam_D_C_Id = beam_dcorg.Beam_D_C_Id WHERE beam_machine.Status IS NULL AND beam_dcorg.Status ='NotReturn' order by quality_details.Quality_Name";
$result = mysql_query($sql);
$row_result = mysql_fetch_array($result); 
	}
	else if($Stock=='Bobbin')
	{
		$Status = $_REQUEST['Status'];
	$sql = "SELECT sum(boobin_dcorg.Total_Cartoon) as total_cart, sum(boobin_dcorg.Total_Weight) as total_wght,quality_details.Quality_Name,boobin_dcorg.R_Id FROM boobin_dcorg JOIN quality_details ON quality_details.Quality_Id = boobin_dcorg.Quality_Id JOIN bobbin_d_c on bobbin_d_c.Bo_D_C_Id = boobin_dcorg.Bo_D_C_Id WHERE boobin_dcorg.Status ='$Status' group by quality_details.Quality_Name,boobin_dcorg.R_Id order by quality_details.Quality_Name";
$result = mysql_query($sql);
$row_result = mysql_fetch_array($result); 
	}
	else if($Stock=='Saree')
	{
	  $sql = "SELECT saree_detailsorg.Saree_Lot_Id,saree_detailsorg.Date,saree_detailsorg.Saree_Lot_Meter,saree_detailsorg.Saree_Pieces,saree_detailsorg.Saree_Weight,quality_details.Quality_Name,design_details.Design,saree_detailsorg.Status,saree_detailsorg.Description,saree_detailsorg.R_Id from saree_detailsorg LEFT JOIN saree_dcorg ON saree_detailsorg.Saree_Lot_Id = saree_dcorg.Saree_Lot_Id JOIN design_details on  design_details.Design_Id = saree_detailsorg.Design_Id JOIN quality_details on design_details.Quality_Id = quality_details.Quality_Id  WHERE (saree_dcorg.Status is Null) or (saree_dcorg.Status ='Return') order by saree_detailsorg.Saree_Lot_Id asc";
$result = mysql_query($sql);
$row_result = mysql_fetch_array($result); 
	}
	else if($Stock=='Taka')
	{
	 $sql = "SELECT taka_detailsorg.Taka_Id,taka_detailsorg.T_Date,taka_detailsorg.Taka_Meter,taka_detailsorg.Taka_Weight ,quality_details.Quality_Name,taka_detailsorg.Status,taka_detailsorg.Description,taka_detailsorg.R_Id from taka_detailsorg LEFT JOIN taka_dcorg ON taka_detailsorg.Taka_Id = taka_dcorg.Taka_Id JOIN quality_details on taka_detailsorg.Quality_Id = quality_details.Quality_Id WHERE (taka_dcorg.Status is Null) or (taka_dcorg.Status ='Return') order by taka_detailsorg.Taka_Id asc";
	 $result = mysql_query($sql);
$row_result = mysql_fetch_array($result); 
	}
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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>STOCK-<?php echo strtoupper($Stock);?></title>
 <link rel="shortcut icon" href="Icons/st85.png">
<style type="text/css">
table{
 border-collapse:collapse;
}
</style>
</head>
<body onload="window.print() ">
<?php
if($Stock=='Beam')
	{
		?>
<table width="990" border="0" align="center" cellpadding="5" cellspacing="5" >
  <tr  style="font-size:24px"><?php date_default_timezone_set("Asia/Calcutta"); ?>
    <td width="25"></td>
    <td>
      <div id="print-header-wrapper">
                    <div class="row-fluid">&nbsp;&nbsp;&nbsp;Beam Stock <b>Report</b></div>
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
      
                                             <th width="7%"><center>Sr No.</center></th>
                                             <th width="15%"><center>Beam No</center></th>
                                             <th width="7%"><center>Taar</center></th>
                                             <th width="10%"><center>Beam Meter</center></th>
                                             <th width="10%"><center>Weight</center></th>
                                            <th width="30%"><center>Quality</center></th>
                                            <th width="10%"><center>Challan Date</center></th>
                                            <th width="10%"><center>Entry #ID</center></th>
                                            
      </tr> 
      </thead>
        <tbody>
    <?php $i=0;
	  $i++;?>
    <?php
									do { ?> 
  <tr align="center"> 
    <td><?php echo $i++; ?></td>
    <td><?php echo $row_result['Beam_No']; ?></td>
    <td><?php echo moneyFormatIndia1($row_result['Taar']); ?></td>
    <td><?php echo moneyFormatIndia($row_result['Beam_Meter']); ?></td>
    <td><?php echo moneyFormatIndia($row_result['Weight']); ?></td>
    <td><?php echo $row_result['Quality_Name']; ?></td>
    <td><?php echo $row_result['Beam_D_C_Date']; ?></td>
    <td><?php echo $row_result['R_Id']; ?></td>
    </tr>
    <?php $Tot_Meter = $Tot_Meter + $row_result['Beam_Meter'];
   $Tot_Weight = $Tot_Weight + $row_result['Weight']; } while($row_result=mysql_fetch_array($result)); ?>
    <tr align="right">
                                     <td colspan="8">
                                     <b>Total Meter : <?php echo moneyFormatIndia($Tot_Meter);?>&nbsp;&nbsp;Total Weight : <?php echo moneyFormatIndia($Tot_Weight);?></b>
                                     </td>
                                     </tr>
     </tbody>
 </table>
 </td>
        </tr>
</table>
<?php } 
else if($Stock=='Bobbin')
{
	?>
    <table width="990" border="0" align="center" cellpadding="5" cellspacing="5" >
  <tr  style="font-size:24px">
    <td width="25">&nbsp;</td><?php date_default_timezone_set('Asia/Calcutta'); ?>
    <td>
     <div id="print-header-wrapper">
                    <div class="row-fluid">&nbsp;&nbsp;&nbsp;Bobbin Stock <b>Report</b></div>
                    <div class="row-fluid" align="center"><strong>!! Shree Ganeshayan Namaha !!</strong><br/>
    <strong>SHINGORI TEXTILE</strong></div>
                    <div class="row-fluid" align="right"><?php echo date('Y/m/d h:i:s A'); ?>&nbsp;&nbsp;</div>
                   </div>
    </td>
  </tr>
  <tr>
        <td colspan="11" valign="top">
        <table width="100%" border="1" cellspacing="2" cellpadding="2" class="table" id="table_data" >
        <thead>
          <tr>
      
                                             <th width="8%"><center>Sr No.</center></th>
                                             <th width="15%"><center>Cartoon / Bags / Cases</center></th>
                                             <th width="10%"><center>Weight</center></th>
                                             <th width="30%"><center>Quality</center></th>
                                            <th width="10%"><center>Entry #ID</center></th>
                                            
      </tr> 
     </thead>
     <tbody>  
    <?php $i=0;
	  $i++;
									do { ?>                                    
  <tr align="center"> 
    <td><?php echo $i++; ?></td>
    <td><?php echo $row_result['total_cart']; ?></td>
    <td><?php echo moneyFormatIndia($row_result['total_wght']); ?></td>
    <td><?php echo $row_result['Quality_Name']; ?></td>
   <td><?php echo $row_result['R_Id']; ?></td>
    </tr>
    <?php $Tot_Weight = $Tot_Weight + $row_result['total_wght'];  } while($row_result=mysql_fetch_array($result)); ?>
                                     <tr align="right">
                                     <td colspan="5">
                                     <b>Total Weight : <?php echo moneyFormatIndia($Tot_Weight);?></b>
                                     </td>
                                     </tr>
    </tbody>
        </table>
        </td>
        </tr>
</table>
<?php }
else if ($Stock=='Taka')
{
?>
<table width="990" border="0" align="center" cellpadding="5" cellspacing="5" >
  <tr  style="font-size:24px">
    <td width="25">&nbsp;</td><?php date_default_timezone_set('Asia/Calcutta'); ?>
    <td ><div id="print-header-wrapper">
                    <div class="row-fluid">&nbsp;&nbsp;&nbsp;Taka Stock <b>Report</b></div>
                    <div class="row-fluid" align="center"><strong>!! Shree Ganeshayan Namaha !!</strong><br/>
    <strong>SHINGORI TEXTILE</strong></div>
                    <div class="row-fluid" align="right"><?php echo date('Y/m/d h:i:s A'); ?>&nbsp;&nbsp;</div>
                   </div>
                   </td>
  </tr>
  <tr>
        <td colspan="11" valign="top"><table width="100%" border="1" cellspacing="2" cellpadding="2" class="table" id="table_data" >
        <thead>
          <tr bgcolor="#FFFFFF" style="color:#000" >
                                             <th width="8%"><center>Sr No.</center></th>
                                             <th width="7%"><center>Taka ID</center></th>
                                             <th width="10%"><center>Date</center></th>
                                             <th width="10%"><center>Meter</center></th>
                                             <th width="17%"><center>Weight</center></th>
                                            <th width="20%"><center>Quality</center></th>
                                            <th width="10%"><center>Status</center></th>
                                            <th width="20%"><center>Description</center></th>
                                            <th width="10%"><center>Entry #ID</center></th>
      </tr> 
      </thead> 
      <tbody>
    <?php $i=0;
	  $i++;?>
    <?php
									do { ?>                                    
  <tr align="center"> 
    <td><?php echo $i++; ?></td>
    <td><?php echo $row_result['Taka_Id']; ?></td>
    <td><?php echo $row_result['T_Date']; ?></td>
    <td><?php echo moneyFormatIndia($row_result['Taka_Meter']); ?></td>
    <td><?php echo moneyFormatIndia($row_result['Taka_Weight']); ?></td>
    <td><?php echo $row_result['Quality_Name']; ?></td>
    <td><?php echo $row_result['Status']; ?></td>
    <td><?php echo $row_result['Description']; ?></td>
    <td><?php echo $row_result['R_Id']; ?></td>
    </tr>
    <?php $Tot_Meter = $Tot_Meter + $row_result['Taka_Meter'];
   $Tot_Weight = $Tot_Weight + $row_result['Taka_Weight'];
   } while($row_result = mysql_fetch_array($result)) ?>
  <tr align="right">
                                     <td colspan="9">
                                     <b>Total Meter : <?php echo moneyFormatIndia($Tot_Meter);?>&nbsp;&nbsp;Total Weight : <?php echo moneyFormatIndia($Tot_Weight);?></b>
                                     </td>
                                     </tr>
</tbody>
        </table>
        </td>
        </tr>
</table>
<?php }
else if($Stock=='Saree')
{
?>
<table width="990" border="0" align="center" cellpadding="5" cellspacing="5" >
  <tr  style="font-size:24px">
    <td width="25">&nbsp;</td><?php date_default_timezone_set('Asia/Calcutta'); ?>
    <td >
    <div id="print-header-wrapper">
                    <div class="row-fluid">&nbsp;&nbsp;&nbsp;Saree Stock <b>Report</b></div>
                    <div class="row-fluid" align="center"><strong>!! Shree Ganeshayan Namaha !!</strong><br/>
    <strong>SHINGORI TEXTILE</strong></div>
                    <div class="row-fluid" align="right"><?php echo date('Y/m/d h:i:s A'); ?>&nbsp;&nbsp;</div>
                   </div>
    </td>
  </tr>
  <tr>
        <td colspan="11" valign="top"><table width="100%" border="1" cellspacing="2" cellpadding="2" class="table" id="table_data" >
        <thead>
          <tr>
      
                                             <th width="8%"><center>Sr No.</center></th>
                                             <th width="7%"><center>Lot ID</center></th>
                                             <th width="10%"><center>Date</center></th>
                                             <th width="10%"><center>Meter</center></th>
                                             <th width="10%"><center>Weight</center></th>
                                             <th width="17%"><center>Piecess</center></th>
                                            <th width="25%"><center>Quality</center></th>
                                            <th width="10%"><center>Design</center></th>
                                            <th width="10%"><center>Status</center></th>
                                            <th width="20%"><center>Description</center></th>
                                            <th width="10%"><center>Entry #ID</center></th>
      </tr> 
       </thead>
       <tbody>
    <?php $i=0;
	  $i++;?>
    <?php
									do { ?>                                    
  <tr align="center"> 
    <td><?php echo $i++; ?></td>
    <td><?php echo $row_result['Saree_Lot_Id']; ?></td>
    <td><?php echo $row_result['Date']; ?></td>
    <td><?php echo moneyFormatIndia($row_result['Saree_Lot_Meter']); ?></td>
    <td><?php echo moneyFormatIndia($row_result['Saree_Weight']); ?></td>
    <td><?php echo moneyFormatIndia1($row_result['Saree_Pieces']); ?></td>
    <td><?php echo $row_result['Quality_Name']; ?></td>
    <td><?php echo $row_result['Design']; ?></td>
    <td><?php echo $row_result['Status']; ?></td>
    <td><?php echo $row_result['Description']; ?></td>
    <td><?php echo $row_result['R_Id']; ?></td>
    </tr>
    <?php $Tot_Meter = $Tot_Meter + $row_result['Saree_Lot_Meter'];
   $Tot_Weight = $Tot_Weight + $row_result['Saree_Weight'];
   $Tot_Pieces = $Tot_Pieces + $row_result['Saree_Pieces']; } while($row_result = mysql_fetch_array($result)) ?>
                                    
                                     <tr align="right">
                                     <td colspan="11">
                                     <b>Total Meter : <?php echo $Tot_Meter;?>&nbsp;&nbsp;Total Weight : <?php echo $Tot_Weight;?>&nbsp;Total Piecess : <?php echo $Tot_Pieces;?></b>
                                     </td>
                                     </tr>
</tbody>
        </table>
        </td>
        </tr>
</table>
<?php } ?>
</body>
</html>
<?php
 ob_flush(); ?>