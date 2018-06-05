<?php include("logcode.php");
include("databaseconnect.php");
if(isset($_REQUEST['print']))
{
	$decodeurl = $_REQUEST['Sa_Exbeam_Id'];
	$durl = urldecode($decodeurl); 
	$turl = str_replace("'"," ",$durl);
	$urls = explode(" ",$turl);
	$Sa_Exbeam_Id = $urls[1];
	$query1 = "select Sa_Exbeam_Id,machine_details.Machine_No,machine_details.Machine_Id,Mul_Beam_No,Sa_Beam_Total,Entry_Date,saree_exbe_master.Entry_Id from saree_exbe_master,machine_details where machine_details.Machine_Id = saree_exbe_master.Machine_Id AND Sa_Exbeam_Id = '".$Sa_Exbeam_Id."' ";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
	$query="select Sa_Ex_Id,Sa_Exbeam_Id,Sa_Beam_No,Be_Ref_No,Fitted_Date,Be_Meter,Be_Taar,Be_Weight,quality_details.Quality_Name,Org_Be_Mg_Meter,Shortage,Shortageper,Remove_Date,R_Id from saree_exbeam_detailorg,quality_details where quality_details.Quality_Id = saree_exbeam_detailorg.Quality_Id AND Sa_Exbeam_Id = '$Sa_Exbeam_Id'";
	 $rsSub = mysql_query($query);
	$rowSub = mysql_fetch_array($rsSub);
	$totalRowsRsSub = mysql_num_rows($rsSub);
	}
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>S-EXTRA&nbsp;<?php echo date('Y/m/d h:i:s A'); ?></title>
<style type="text/css">
table{
	border-collapse:collapse;
}
</style>
<link rel="shortcut icon" href="Icons/st85.png">
</head>
<body onload="window.print()">
<table width="990" border="0" align="center" cellpadding="5" cellspacing="5" >
  <tr  style="font-size:24px">
    <?php date_default_timezone_set("Asia/Calcutta"); ?>
    <td>
      <div id="print-header-wrapper">
                    <div class="row-fluid">&nbsp;&nbsp;&nbsp;SAREE-EXTRA BEAM&nbsp;<b>Report</b></div>
                    <div class="row-fluid" align="center"><i>!! Shree Ganeshayah Namaha !!</i><br/>
    <strong>SHINGORI TEXTILE</strong></div>
                    <div class="row-fluid" align="right">&nbsp;&nbsp;&nbsp;<?php echo date('Y/m/d h:i:s A'); ?>&nbsp;&nbsp;</div>
                   </div>
   </td>
  </tr>
  <tr>
    <td colspan="8" valign="top">
        <table width="100%" border="1" cellspacing="2" class="table">
        <thead>
          <tr>
                                             <th width="20%"><center>Saree-Extra Beam ID</center></th>
                                             <th width="10%"><center>Machine No</center></th>
                                             <th width="15%"><center>M.-Beam No</center></th>
                                             <th width="12%"><center>Total Beam</center></th>
                                            <th width="12%"><center>Entry Date</center></th>
                                            <th width="10%"><center>Entry #ID</center></th>
      </tr> 
      </thead>
     <?php
									do { ?>                                    
                                   <tbody>   
  <tr align="center"> 
     <td><?php echo $rowMain['Sa_Exbeam_Id']; ?></td>
    <td><?php echo $rowMain['Machine_No']; ?></td>
    <td><?php echo $rowMain['Mul_Beam_No']; ?></td>
    <td><?php echo $rowMain['Sa_Beam_Total']; ?></td>
    <td><?php echo $rowMain['Entry_Date']; ?></td>
    <td><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
   </tbody>
    <?php } while($rowMain = mysql_fetch_assoc($rsMain)); ?>
        </table>
                </td>
             </tr>
             <tr>
             <td colspan="8" valign="top">
        <table width="100%" border="1" cellspacing="2" class="table" id="table_data" >
        <thead>
          <tr>
                                             <th><center>Sub-Beam Extra ID</center></th>
                                             <th><center>M.-Beam No</center></th>
                                             <th><center>Beam Ref. No</center></th>
                                             <th><center>Fitted Date</center></th>
                                            <th><center>Meter</center></th>
                                            <th><center>Taar</center></th>
                                            <th><center>Weight</center></th>
                                            <th><center>Quality</center></th>
                                            <th><center>Produced Meter</center></th>
                                            <th><center>Shortage Mtr (%)</center></th>
                                            <th><center>Remove Date</center></th>
                                            <th><center>#ID</center></th>
                                            </tr> 
      </thead>
     <?php
									do { ?>                                    
                                   <tbody>   
  <tr align="center"> 
    <td width="15%"><?php echo $rowSub['Sa_Ex_Id']; ?></td>
    <td width="10%"><?php echo $rowSub['Sa_Beam_No']; ?></td>
    <td  width="30%"><?php echo $rowSub['Be_Ref_No']; ?></td>
    <td width="10%"><?php echo $rowSub['Fitted_Date']; ?></td>
    <td width="10%"><?php echo $rowSub['Be_Meter']; ?></td>
    <td width="10%"><?php echo $rowSub['Be_Taar']; ?></td>
    <td width="10%"><?php echo $rowSub['Be_Weight']; ?></td>
    <td width="15%"><?php echo $rowSub['Quality_Name']; ?></td>
    <td width="15%"><?php echo $rowSub['Org_Be_Mg_Meter']; ?></td>
    <td width="15%"><?php echo $rowSub['Shortage']; ?>&nbsp;(<?php echo $rowSub['Shortageper']; ?>%)</td>
    <td width="15%"><?php echo $rowSub['Remove_Date']; ?></td>
    <td width="10%"><?php echo $rowSub['R_Id']; ?></td>
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