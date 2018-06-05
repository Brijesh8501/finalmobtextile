<?php include("logcode.php");
include("databaseconnect.php");
if(isset($_REQUEST['print']))
{
	$decodeurl = $_REQUEST['Ta_Pro_Id'];
	 $durl = urldecode($decodeurl); 
	$turl = str_replace("'"," ",$durl);
	$urls = explode(" ",$turl);
	$Ta_Pro_Id = $urls[1];
	$query1="SELECT taka_production.Ta_Pro_Id,beam_machine.Be_M_Id,beam_dcorg.Beam_No,machine_details.Machine_No,taka_production.Started_Date,taka_production.Total_Taka,taka_production.Total_Meter,taka_production.Beam_Meter,taka_production.Shortage,taka_production.Shortageper,taka_production.Entry_Id FROM taka_production, beam_dcorg,beam_machine,machine_details WHERE beam_dcorg.Be_D_C_Id = beam_machine.Be_D_C_Id AND beam_machine.Be_M_Id = taka_production.Be_M_Id AND machine_details.Machine_Id = beam_machine.Machine_Id AND taka_production.Ta_Pro_Id = '".$Ta_Pro_Id."' ";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
	$query="SELECT taka_detailsorg.Taka_Id, taka_detailsorg.Ta_Pro_Id, taka_detailsorg.T_Date, taka_detailsorg.Taka_Meter, taka_detailsorg.Taka_Weight, quality_details.Quality_Name, taka_detailsorg.Status, taka_detailsorg.`Description` FROM taka_detailsorg, quality_details WHERE quality_details.Quality_Id = taka_detailsorg.Quality_Id AND Ta_Pro_Id = '".$Ta_Pro_Id."' order by taka_detailsorg.Taka_Id asc";
	 $rsSub = mysql_query($query);
	$rowSub = mysql_fetch_array($rsSub);
	$totalRowsRsSub = mysql_num_rows($rsSub);
	}
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PRODUCTION [T]&nbsp;<?php echo date('Y/m/d h:i:s A'); ?></title>
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
                    <div class="row-fluid">&nbsp;&nbsp;&nbsp;TAKA-PRODUCTION&nbsp;<b>Report</b></div>
                    <div class="row-fluid" align="center"><strong>!! Shree Ganeshayah Namaha !!</strong><br/>
    <strong>SHINGORI TEXTILE</strong></div>
                    <div class="row-fluid" align="right"><b>Beam No :&nbsp;<?php echo $rowMain['Beam_No']; ?>&nbsp;&nbsp;Machine No :&nbsp;<?php echo $rowMain['Machine_No']; ?></b>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo date('Y/m/d h:i:s A'); ?>&nbsp;&nbsp;</div>
                   </div>
   </td>
  </tr>
  <tr>
    <td colspan="8" valign="top">
        <table width="100%" border="1" cellspacing="2" class="table">
        <thead>
          <tr>
                                             <th width="20%"><center>Taka-Production ID</center></th>
                                             <th width="20%"><center>Beam-Machine ID</center></th>
                                             <th width="15%"><center>Fitted Date</center></th>
                                             <th width="12%"><center>Total Taka</center></th>
                                            <th width="12%"><center>Total Meter</center></th>
                                            <th width="12%"><center>Beam Meter</center></th>
                                            <th width="20%"><center>Shortage</center></th>
      </tr> 
      </thead>
     <?php
									do { ?>                                    
                                   <tbody>   
  <tr align="center"> 
     <td><?php echo $rowMain['Ta_Pro_Id']; ?></td>
    <td><?php echo $rowMain['Be_M_Id']; ?></td>
    <td><?php echo $rowMain['Started_Date']; ?></td>
    <td><?php echo $rowMain['Total_Taka']; ?></td>
    <td><?php echo $rowMain['Total_Meter']; ?></td>
    <td><?php echo $rowMain['Beam_Meter']; ?></td>
    <td><?php echo $rowMain['Shortage']; ?>&nbsp;Mtr&nbsp;(<?php echo $rowMain['Shortageper']; ?>%)</td>
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
                                             <th width="15%"><center>Taka ID</center></th>
                                             <th width="15%"><center>Date</center></th>
                                             <th width="15%"><center>Taka Meter</center></th>
                                            <th width="15%"><center>Taka Weight</center></th>
                                            <th width="30%"><center>Quality</center></th>
                                            <th width="20%"><center>Status</center></th>
                                            <th width="20%"><center>Decription</center></th>
                                            </tr> 
      </thead>
     <?php
									do { ?>                                    
                                   <tbody>   
  <tr align="center"> 
    <td><?php echo $rowSub['Taka_Id']; ?></td>
    <td><?php echo $rowSub['T_Date']; ?></td>
    <td><?php echo $rowSub['Taka_Meter']; ?></td>
    <td><?php echo $rowSub['Taka_Weight']; ?></td>
    <td><?php echo $rowSub['Quality_Name']; ?></td>
    <td><?php echo $rowSub['Status']; ?></td>
    <td><?php echo $rowSub['Description']; ?></td>
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