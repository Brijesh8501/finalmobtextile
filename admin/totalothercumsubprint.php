<?php include("logcode.php");
include("databaseconnect.php");
if(isset($_REQUEST['print']))
{
	$reportrange = $_REQUEST['reportrange']; 
	$splitdate = explode("-",$reportrange);
$date = $splitdate[0];
$date1 = $splitdate[1];
$dt = date('Y-m-d', strtotime($date));
$dt1 = date('Y-m-d', strtotime($date1)); 
	 $sql1= "select Ot_D_C_Id,other_d_c.Other_D_C_Id,other_d_c.Other_D_C_Date,other_d_c.Other_D_C_No,machine_parts.Mach_Pname,Quantity,Rate,Amount,R_Id from other_sub_orgdc,other_d_c,machine_parts where other_d_c.Other_D_C_Id = other_sub_orgdc.Other_D_C_Id AND machine_parts.Mach_Part_Id = other_sub_orgdc.Mach_Part_Id AND other_d_c.Other_D_C_Date AND other_d_c.Other_D_C_Date between '".$dt."' and '".$dt1."' order by other_d_c.Other_D_C_Id asc ";
   $rsSub = mysql_query($sql1);
	$rowSub = mysql_fetch_array($rsSub);
	$totalRowsRsSub = mysql_num_rows($rsSub);
	}
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>OTHER CHALLAN CUM INVOICE [S]&nbsp;<?php echo $date.' - '.$date1;?></title>
 <link rel="shortcut icon" href="Icons/st85.png">
<style type="text/css">
table{
	border-collapse:collapse;
}
</style>
</head>
<body onload="window.print()">
<table width="990" border="0" align="center" cellpadding="5" cellspacing="5" >
  <tr  style="font-size:24px">
    <?php date_default_timezone_set("Asia/Calcutta"); ?>
    <td>
      <div id="print-header-wrapper">
                    <div class="row-fluid">&nbsp;&nbsp;&nbsp;OTHER CHALLAN CUM INVOICE [S]&nbsp;<b>Report</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i><?php echo $date.' - '.$date1;?></i></div>
                    <div class="row-fluid" align="center"><strong>!! Shree Ganeshayan Namaha !!</strong><br/>
    <strong>SHINGORI TEXTILE</strong></div>
                    <div class="row-fluid" align="right"><?php echo date('Y/m/d h:i:s A'); ?>&nbsp;&nbsp;</div>
                   </div>
   </td>
  </tr>
  <tr>
    <td colspan="8" valign="top">
        <table width="100%" border="1" cellspacing="2" class="table" id="table_data" >
        <thead>
          <tr>
                                            <th><center>Sr No.</center></th>
                                             <th><center>Other-Challan-Invoice ID</center></th>
                                             <th><center>Challan No.</center></th>
                                             <th><center>Machine-Parts</center></th>
                                             <th><center>Quantity</center></th>
                                             <th><center>Rate</center></th>
                                            <th><center>Amount</center></th>
                                            <th><center>#ID</center></th>
      </tr> 
      </thead>
     <?php
       $i = 0;
	   $i++;									
									do { ?>                                    
                                   <tbody>   
  <tr align="center"> 
      <td width="7%"><?php echo $i++; ?></td>
     <td width="15%"><?php echo $rowSub['Other_D_C_Id']; ?></td>
     <td width="15%"><?php echo $rowSub['Other_D_C_No']; ?></td>
    <td width="25%"><?php echo $rowSub['Mach_Pname']; ?></td>
    <td width="10%"><?php echo $rowSub['Quantity']; ?></td>
    <td width="10%"><?php echo $rowSub['Rate']; ?></td>
    <td width="10%"><?php echo $rowSub['Amount']; ?></td>
    <td width="7%"><?php echo $rowSub['R_Id']; ?></td>
   </tr>
   </tbody>
    <?php } while($rowSub = mysql_fetch_assoc($rsSub)); ?>
        </table>
                </td>
             </tr>
</table>
</body>
</html>
<?php
 ob_flush(); ?>