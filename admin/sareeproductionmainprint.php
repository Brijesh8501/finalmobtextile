<?php include("logcode.php");
include("databaseconnect.php");
if(isset($_REQUEST['print']))
{
	$decodeurl = $_REQUEST['Sa_Pro_Id'];
	 $durl = urldecode($decodeurl); 
	$turl = str_replace("'"," ",$durl);
	$urls = explode(" ",$turl);
	$Sa_Pro_Id = $urls[1];
$query1 = "select saree_production.Sa_Pro_Id,saree_production.Be_M_Id,beam_dcorg.Beam_No,machine_details.Machine_No,saree_production.Started_Date,saree_production.Total_Piecess,saree_production.Total_Meter,saree_production.Beam_Meter,saree_production.Shortage,saree_production.Shortageper from saree_production,beam_machine,machine_details,beam_dcorg where beam_dcorg.Be_D_C_Id = beam_machine.Be_D_C_Id AND machine_details.Machine_Id = beam_machine.Machine_Id AND beam_machine.Be_M_Id = saree_production.Be_M_Id AND saree_production.Sa_Pro_Id = '".$Sa_Pro_Id."' order by saree_production.Sa_Pro_Id asc ";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
	$query="SELECT saree_detailsorg.Saree_Lot_Id, saree_detailsorg.Sa_Pro_Id, saree_detailsorg.`Date`, saree_detailsorg.Saree_Lot_Meter, saree_detailsorg.Saree_Pieces, saree_detailsorg.Saree_Weight, quality_details.Quality_Name, design_details.Design, saree_detailsorg.Status, saree_detailsorg.`Description` FROM saree_detailsorg, quality_details, design_details WHERE quality_details.Quality_Id = design_details.Quality_Id AND design_details.Design_Id = saree_detailsorg.Design_Id AND saree_detailsorg.Sa_Pro_Id = '".$Sa_Pro_Id."' order by saree_detailsorg.Sa_Pro_Id asc";
	 $rsSub = mysql_query($query);
	$rowSub = mysql_fetch_array($rsSub);
	$totalRowsRsSub = mysql_num_rows($rsSub);
	}
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PRODUCTION [S]&nbsp;<?php echo date('Y/m/d h:i:s A'); ?></title>
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
                    <div class="row-fluid">&nbsp;&nbsp;&nbsp;SAREE-PRODUCTION&nbsp;<b>Report</b></div>
                    <div class="row-fluid" align="center"><i>!! Shree Ganeshayah Namaha !!</i><br/>
    <strong>SHINGORI TEXTILE</strong></div>
                    <div class="row-fluid" align="right"><b>Beam No :&nbsp;<?php echo $rowMain['Beam_No']; ?>&nbsp;&nbsp;Machine No :&nbsp;<?php echo $rowMain['Machine_No']; ?></b>&nbsp;&nbsp;&nbsp;<?php echo date('Y/m/d h:i:s A'); ?>&nbsp;&nbsp;</div>
                   </div>
   </td>
  </tr>
  <tr>
    <td colspan="8" valign="top">
        <table width="100%" border="1" cellspacing="2" class="table">
        <thead>
          <tr>
      
                                             <th width="20%"><center>Saree-Production ID</center></th>
                                             <th width="20%"><center>Beam-Machine ID</center></th>
                                             <th width="15%"><center>Fitted Date</center></th>
                                             <th width="12%"><center>Total Pieces</center></th>
                                            <th width="10%"><center>Total Meter</center></th>
                                            <th width="10%"><center>Beam Meter</center></th>
                                            <th width="20%"><center>Shortage</center></th>
   
      </tr> 
      </thead>
     <?php
									do { ?>                                    
                                   <tbody>   
  <tr align="center"> 
     <td><?php echo $rowMain['Sa_Pro_Id']; ?></td>
    <td><?php echo $rowMain['Be_M_Id']; ?></td>
    <td><?php echo $rowMain['Started_Date']; ?></td>
    <td><?php echo $rowMain['Total_Piecess']; ?></td>
    <td><?php echo $rowMain['Total_Meter']; ?></td>
    <td><?php echo $rowMain['Beam_Meter']; ?></td>
    <td><?php echo $rowMain['Shortage']; ?>&nbsp;Mtrs&nbsp;(<?php echo $rowMain['Shortageper']; ?>%)</td>
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
                                             <th><center>Lot ID</center></th>
                                             <th><center>Date</center></th>
                                             <th><center>Lot Meter</center></th>
                                             <th><center>Weight</center></th>
                                            <th><center>Pieces</center></th>
                                            <th><center>Quality</center></th>
                                            <th><center>Design</center></th>
                                            <th><center>Status</center></th>
                                            <th><center>Description</center></th>
                                            </tr> 
      </thead>
     <?php
									do { ?>                                    
                                   <tbody>   
  <tr align="center"> 
    <td width="15%"><?php echo $rowSub['Saree_Lot_Id']; ?></td>
    <td width="12%"><?php echo $rowSub['Date']; ?></td>
    <td width="10%"><?php echo $rowSub['Saree_Lot_Meter']; ?></td>
    <td  width="10%"><?php echo $rowSub['Saree_Weight']; ?></td>
    <td width="10%"><?php echo $rowSub['Saree_Pieces']; ?></td>
    <td width="30%"><?php echo $rowSub['Quality_Name']; ?></td>
    <td width="30%"><?php echo $rowSub['Design']; ?></td>
    <td width="15%"><?php echo $rowSub['Status']; ?></td>
    <td width="15%"><?php echo $rowSub['Description']; ?></td>
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