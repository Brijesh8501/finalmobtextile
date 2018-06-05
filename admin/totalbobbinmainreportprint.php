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
	$query1="SELECT bobbin_d_c.Bo_D_C_Id, bobbin_d_c.Bo_D_C_Date, bobbin_d_c.Bo_D_C_No, company_deetaails.C_Name, broker_details1.B_Name,bobbin_d_c.Total_Cart,bobbin_d_c.Entry_Date,bobbin_d_c.Entry_Id FROM bobbin_d_c, company_deetaails, broker_details1 WHERE bobbin_d_c.Company_Id = company_deetaails.Company_Id AND bobbin_d_c.Broker_Id = broker_details1.Broker_Id AND bobbin_d_c.Bo_D_C_Date between '".$dt."' and '".$dt1."' order by bobbin_d_c.Bo_D_C_Id asc";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
	}
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>BOBBIN-DC[M]&nbsp;<?php echo $date.' - '.$date1;?></title>
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
                    <div class="row-fluid">&nbsp;Main-BOBBIN CHALLAN <b>Report</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i><?php echo $date.' - '.$date1;?></i></div>
                    <div class="row-fluid" align="center"><strong>!! Shree Ganeshayan Namaha !!</strong><br/>
    <strong>SHINGORI TEXTILE</strong></div>
                    <div class="row-fluid" align="right"><?php echo date('Y/m/d h:i:s A'); ?>&nbsp;&nbsp;</div>
                   </div>
   </td>
  </tr>
  <tr >
    <td colspan="6" valign="top">
       <table width="100%" border="1" cellspacing="2" class="table" id="table_data" >
        <thead>
          <tr>
                                             <th width="15%"><center>Chal. ID</center></th>
                                             <th width="15%"><center>Chal. No.</center></th>
                                             <th width="15%"><center>Chal. Date</center></th>
                                             <th width="25%"><center>Company</center></th>
                                            <th width="25%"><center>Broker</center></th>
                                            <th width="10%"><center>Cartoon</center></th>
                                            <th width="15%"><center>Entry Date</center></th>
                                            <th width="10%"><center>Entry #ID</center></th>
      </tr> 
      </thead>
      <tbody>
     <?php
									do { ?>                                    
  <tr align="center"> 
     <td><?php echo $rowMain['Bo_D_C_Id']; ?></td>
    <td><?php echo $rowMain['Bo_D_C_No']; ?></td>
    <td><?php echo $rowMain['Bo_D_C_Date']; ?></td>
    <td><?php echo $rowMain['C_Name']; ?></td>
    <td><?php echo $rowMain['B_Name']; ?></td>
    <td><?php echo $rowMain['Total_Cart']; ?></td>
     <td><?php echo $rowMain['Entry_Date']; ?></td>
     <td><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
    <?php } while($rowMain=mysql_fetch_assoc($rsMain)); ?>
</tbody>
        </table>
                </td>
             </tr>
</table>
</body>
</html>
<?php
 ob_flush(); ?>