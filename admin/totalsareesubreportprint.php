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
       $sql1= "SELECT saree_dcorg.Sa_D_C_Id, saree_d_c.Saree_D_C_Id, saree_d_c.Saree_D_C_Date, saree_dcorg.Saree_Lot_Id, saree_dcorg.Saree_Lot_Meter, saree_dcorg.Saree_Weight, saree_dcorg.Saree_Pieces, quality_details.Quality_Name, design_details.Design, saree_dcorg.Status, saree_dcorg.R_Id FROM saree_dcorg, saree_d_c, quality_details, design_details WHERE saree_d_c.Saree_D_C_Id = saree_dcorg.Saree_D_C_Id AND quality_details.Quality_Id = design_details.Quality_Id AND design_details.Design_Id = saree_dcorg.Design_Id AND saree_d_c.Saree_D_C_Date between '".$dt."' and '".$dt1."'  order by saree_d_c.Saree_D_C_Id asc ";
   $rsSub = mysql_query($sql1);
	$rowSub = mysql_fetch_array($rsSub);
	$totalRowsRsSub = mysql_num_rows($rsSub);
	}
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SAREE-DC[S]&nbsp;<?php echo $date.' - '.$date1;?></title>
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
                    <div class="row-fluid">&nbsp;&nbsp;&nbsp;Sub-SAREE CHALLAN <b>Report</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i><?php echo $date.' - '.$date1;?></i></div>
                    <div class="row-fluid" align="center"><strong>!! Shree Ganeshayah Namaha !!</strong><br/>
    <strong>SHINGORI TEXTILE</strong></div>
                    <div class="row-fluid" align="right"><?php echo date('Y/m/d h:i:s A'); ?>&nbsp;&nbsp;</div>
                   </div>
   </td>
  </tr>
  <tr >
    <td colspan="8" valign="top">
        <table width="100%" border="1" cellspacing="2" class="table" id="table_data" >
        <thead>
          <tr>
                                             <th><center>Chal. ID & Sub-ID</center></th>
                                             <th><center>Lot ID</center></th>
                                             <th><center>Meter</center></th>
                                             <th><center>Weight</center></th>
                                             <th><center>Piecess</center></th>
                                             <th><center>Quality</center></th>
                                             <th><center>Design</center></th>
                                             <th><center>Status</center></th>
                                             <th><center>#ID</center></th>
      </tr> 
      </thead>
     <?php
									do { ?>                                    
                                   <tbody>   
  <tr align="center"> 
     <td width="15%"><?php echo $rowSub['Saree_D_C_Id']; ?><br />(<?php echo $rowSub['Sa_D_C_Id']; ?>)</td>
    <td width="15%"><?php echo $rowSub['Saree_Lot_Id']; ?></td>
    <td width="10%"><?php echo $rowSub['Saree_Lot_Meter']; ?></td>
    <td width="10%"><?php echo $rowSub['Saree_Weight']; ?></td>
    <td width="10%"><?php echo $rowSub['Saree_Pieces']; ?></td>
   <td width="25%"><?php echo $rowSub['Quality_Name']; ?></td>
   <td width="25%"><?php echo $rowSub['Design']; ?></td>
   <td width="10%"><?php echo $rowSub['Status']; ?></td>
   <td width="10%"><?php echo $rowSub['R_Id']; ?></td>
   </tr>
   </tbody>
    <?php } while($rowSub=mysql_fetch_assoc($rsSub)); ?>
        </table>
                </td>
             </tr>
</table>
</body>
</html>
<?php
 ob_flush(); ?>