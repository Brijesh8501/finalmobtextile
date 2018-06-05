<?php include("logcode.php");
include("databaseconnect.php");
if(isset($_REQUEST['print']))
{
	$Ref_No = $_REQUEST['Ref_No']; 
	$query1="select * from bilty_return where Ref_No = '$Ref_No'";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
	}
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>BILTY[E-RETURN] <?php echo date('Y/m/d h:i:s A'); ?></title>
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
                    <div class="row-fluid">&nbsp;&nbsp;&nbsp;BILTY[E-RETURN] <b>Report</b>&nbsp;&nbsp;&nbsp;</i></div>
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
                                           <th width="10%"><center>Bilty ID</center></th>
                                            <th width="10%"><center>Date</center></th>
                                            <th width="12%"><center>Reference No.</center></th>
                                            <th><center>Image</center></th>
      </tr> 
      </thead>
     <?php
	 								do { ?>                                    
                                   <tbody>   
  <tr align="center"> 
     <td><?php echo $rowMain['Bilty_Id']; ?></td>
     <td><?php echo $rowMain['B_Date']; ?></td>
     <td><?php echo $rowMain['Ref_No']; ?></td>
      <td><img width="100%" height="20%" src="<?php echo $rowMain['B_Image']; ?>"></td>
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