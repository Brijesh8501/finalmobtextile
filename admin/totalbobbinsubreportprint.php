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
     $sql1= "SELECT bobbin_d_c.Bo_D_C_No,boobin_dcorg.Bobbin_D_C_Id,bobbin_d_c.Bo_D_C_Id,quality_details.Quality_Name, boobin_dcorg.Total_Cartoon, boobin_dcorg.Total_Weight,boobin_dcorg.Status,boobin_dcorg.R_Id FROM bobbin_d_c, boobin_dcorg, quality_details WHERE bobbin_d_c.Bo_D_C_Id = boobin_dcorg.Bo_D_C_Id AND boobin_dcorg.Quality_Id = quality_details.Quality_Id AND bobbin_d_c.Bo_D_C_Date between '".$dt."' and '".$dt1."'  order by bobbin_d_c.Bo_D_C_Id asc ";
   $rsSub = mysql_query($sql1);
	$rowSub = mysql_fetch_array($rsSub);
	$totalRowsRsSub = mysql_num_rows($rsSub);
	}
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>BOBBIN-DC[S]&nbsp;<?php echo $date.' - '.$date1;?></title>
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
                    <div class="row-fluid">&nbsp;Sub-BOBBIN CHALLAN <b>Report</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i><?php echo $date.' - '.$date1;?></i></div>
                    <div class="row-fluid" align="center"><strong>!! Shree Ganeshayan Namaha !!</strong><br/>
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
                                             <th width="15%"><center>Chal. ID & Sub-ID</center></th>
                                             <th width="15%"><center>Chal. No.</center></th>
                                             <th width="15%"><center>Cart. /Bags / Cases</center></th>
                                             <th width="10%"><center>Weight</center></th>
                                            <th width="30%"><center>Quality</center></th>
                                            <th width="10%"><center>Status</center></th>
                                            <th width="10%"><center>#ID</center></th>
      </tr> 
      </thead>
     <?php
									do { ?>                                    
                                   <tbody>   
  <tr align="center"> 
     <td><?php echo $rowSub['Bo_D_C_Id']; ?><br />(<?php echo $rowSub['Bobbin_D_C_Id']; ?>)</td>
    <td><?php echo $rowSub['Bo_D_C_No']; ?></td>
    <td><?php echo $rowSub['Total_Cartoon']; ?></td>
    <td><?php echo $rowSub['Total_Weight']; ?></td>
    <td><?php echo $rowSub['Quality_Name']; ?></td>
    <td><?php echo $rowSub['Status']; ?></td>
    <td><?php echo $rowSub['R_Id']; ?></td>
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