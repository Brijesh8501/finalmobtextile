<?php include("logcode.php"); error_reporting(0);
include("databaseconnect.php");
if(isset($_REQUEST['print']))
{
	$reportrange = $_REQUEST['reportrange']; 
	$splitdate = explode("-",$reportrange);
$date = $splitdate[0];
$date1 = $splitdate[1];
$dt = date('Y-m-d', strtotime($date));
$dt1 = date('Y-m-d', strtotime($date1)); 
	$query1 = "select sum(boobin_dcorg.Total_Cartoon) as Sum_Cartoon, sum(boobin_dcorg.Total_Weight) as Sum_Weight, quality_details.Quality_Name from boobin_dcorg,bobbin_d_c,quality_details where bobbin_d_c.Bo_D_C_Id = boobin_dcorg.Bo_D_C_Id AND quality_details.Quality_Id = boobin_dcorg.Quality_Id AND boobin_dcorg.Status = 'NotReturn-used' AND bobbin_d_c.Bo_D_C_Date between '".$dt."' and '".$dt1."' group by quality_details.Quality_Name order by quality_details.Quality_Name asc";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
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
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>BOBBIN-USED <?php echo $date.' - '.$date1;?></title>
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
                    <div class="row-fluid">&nbsp;BOBBIN-Used&nbsp;<b>Report</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i><?php echo $date.' - '.$date1;?></i></div>
                    <div class="row-fluid" align="center"><strong>!! Shree Ganeshayah Namaha !!</strong><br/>
    <strong>SHINGORI TEXTILE</strong></div>
                    <div class="row-fluid" align="right"><?php echo date('Y/m/d h:i:s A'); ?>&nbsp;&nbsp;</div>
                   </div>
    </td>
  </tr>
  <tr>  
    <td colspan="10" valign="top">
        <table width="100%" border="1" cellspacing="2" cellpadding="2" class="table" id="table_data" >
        <thead>
          <tr>
      
                                       <th width="7%"><center>Sr No.</center></th>
                                             <th width="10%"><center>Total Cartoon</center></th>
                                             <th width="10%"><center>Total Weight</center></th>
                                            <th width="30%"><center>Quality</center></th>
      </tr> 
       </thead>
       <tbody>
    <?php
			$i = 0;
			$i++;						
									do { ?>                                    
  <tr align="center"> 
   <td><?php echo $i++; ?></td>
    <td><?php echo moneyFormatIndia($rowMain['Sum_Cartoon']); ?></td>
    <td><?php echo moneyFormatIndia($rowMain['Sum_Weight']); ?></td>
    <td><?php echo $rowMain['Quality_Name']; ?></td>
    <?php   $Tot_Cartoon = $Tot_Mtr + $rowMain['Sum_Cartoon'];
	$Tot_Weight = $Tot_Weight + $rowMain['Sum_Weight'];
     } while($rowMain = mysql_fetch_assoc($rsMain)); ?>
     <tr>
     <td colspan="5" align="right"><b>Total Cartoon : <?php echo moneyFormatIndia($Tot_Cartoon); ?>&nbsp;&nbsp;Total Weight : <?php echo moneyFormatIndia($Tot_Weight);?></b></td>
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