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
	$query1="select Courier_Id,courier_company.Cou_Comp,C_No,C_Date,C_Pro,Destination,Top,Amt,courier_details.Entry_Id from courier_company,courier_details where courier_company.Cou_Com_Id = courier_details.Cou_Com_Id AND courier_details.C_Date between '".$dt."' and '".$dt1."' order by courier_details.Courier_Id asc ";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
	}
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>COURIER[E] <?php echo $date.' - '.$date1;?></title>
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
                    <div class="row-fluid">&nbsp;&nbsp;&nbsp;COURIER[E] <b>Report</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i><?php echo $date.' - '.$date1;?></i></div>
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
                                            <th width="7%"><center>Sr No.</center></th>
                                        <th width="10%"><center>Courier ID</center></th>
                                            <th width="20%"><center>Courier-Company</center></th>
                                            <th width="10%"><center>C_No</center></th>
                                            <th width="10%"><center>C_Date</center></th>
                                            <th width="10%"><center>C_Thing</center></th>
                                            <th width="10%"><center>Destination</center></th>
                                            <th width="10%"><center>To</center></th>
                                            <th width="10%"><center>Amount</center></th>
                                            <th width="7%"><center>#ID</center></th>
      </tr> 
      </thead>
     <?php
	  $i = 0;
	              $i++;
									do { ?>                                    
                                   <tbody>   
  <tr align="center"> 
     <td><?php echo $i++; ?></td>
     <td><?php echo $rowMain['Courier_Id']; ?></td>
                                            <td><?php echo $rowMain['Cou_Comp']; ?></td>
                                            <td><?php echo $rowMain['C_No']; ?></td>
                                            <td><?php echo $rowMain['C_Date']; ?></td>
                                            <td><?php echo $rowMain['C_Pro']; ?></td>
                                            <td><?php echo $rowMain['Destination']; ?></td>
                                            <td><?php echo $rowMain['Top']; ?></td>
                                            <td><?php echo $rowMain['Amt']; ?></td>
                                            <td><?php echo $rowMain['Entry_Id']; ?></td>
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