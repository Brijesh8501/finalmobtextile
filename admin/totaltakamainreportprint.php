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
	$query1="SELECT taka_d_c_1.Taka_D_C_Id, taka_d_c_1.Taka_D_C_Date, customer_details.Cu_En_Name, broker_details1.B_Name, taka_d_c_1.T_Order_Id, taka_d_c_1.Total_Taka, taka_d_c_1.Entry_Id FROM taka_d_c_1, customer_details, broker_details1 WHERE customer_details.Customer_Id = taka_d_c_1.Customer_Id AND broker_details1.Broker_Id = taka_d_c_1.Broker_Id AND taka_d_c_1.Taka_D_C_Date between '".$dt."' and '".$dt1."' order by taka_d_c_1.Taka_D_C_Id asc";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
	}
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>TAKA-DC[M]&nbsp;<?php echo $date.' - '.$date1;?></title>
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
                    <div class="row-fluid">&nbsp;&nbsp;&nbsp;Main-TAKA CHALLAN <b>Report</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i><?php echo $date.' - '.$date1;?></i></div>
                    <div class="row-fluid" align="center"><strong>!! Shree Ganeshayah Namaha !!</strong><br/>
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
      
                                             <th><center>Challan ID</center></th>
                                             <th><center>Challan Date</center></th>
                                             <th><center>Customer</center></th>
                                            <th><center>Broker</center></th>
                                            <th><center>Order ID</center></th>
                                            <th><center>Taka</center></th>
                                            <th><center>Entry #ID</center></th>
      </tr> 
      </thead>
     <?php
									do { ?>                                    
                                   <tbody>   
  <tr align="center"> 
     <td width="15%"><?php echo $rowMain['Taka_D_C_Id']; ?></td>
    <td width="12%"><?php echo $rowMain['Taka_D_C_Date']; ?></td>
    <td width="25%"><?php echo $rowMain['Cu_En_Name']; ?></td>
    <td width="25%"><?php echo $rowMain['B_Name']; ?></td>
    <td width="15%"><?php echo $rowMain['T_Order_Id']; ?></td>
    <td width="15%"><?php echo $rowMain['Total_Taka']; ?></td>
    <td width="10%"><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
   </tbody>
    <?php } while($rowMain = mysql_fetch_assoc($rsMain)); ?>
        </table>
               </td>
             </tr>
</table>
</body>
</html>
<?php
 ob_flush(); ?>