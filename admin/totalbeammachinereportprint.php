<?php ("logcode.php");
include("databaseconnect.php");
if(isset($_REQUEST['print']))
{
	$reportrange = $_REQUEST['reportrange']; 
	$splitdate = explode("-",$reportrange);
$date = $splitdate[0];
$date1 = $splitdate[1];
$dt = date('Y-m-d', strtotime($date));
$dt1 = date('Y-m-d', strtotime($date1)); 
	$query1 = "SELECT beam_machine.Be_M_Id, beam_dcorg.Beam_No, beam_dcorg.Beam_Meter, quality_details.Quality_Name, machine_details.Machine_No, beam_machine.Started_Date, beam_machine.Status, beam_machine.Entry_Id FROM `beam_machine`, `beam_dcorg`, `machine_details`,`quality_details` WHERE beam_dcorg.Be_D_C_Id = beam_machine.Be_D_C_Id AND machine_details.Machine_Id = beam_machine.Machine_Id AND quality_details.Quality_Id = beam_dcorg.Quality_Id AND beam_machine.Started_Date between '".$dt."' and '".$dt1."' order by beam_machine.Be_M_Id asc ";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
	}
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>BEAM-MACHINE <?php echo $date.' - '.$date1;?></title>
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
                    <div class="row-fluid">&nbsp;BEAM-MACHINE <b>Report</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i><?php echo $date.' - '.$date1;?></i></div>
                    <div class="row-fluid" align="center"><strong>!! Shree Ganeshayan Namaha !!</strong><br/>
    <strong>SHINGORI TEXTILE</strong></div>
                    <div class="row-fluid" align="right"><?php echo date('Y/m/d h:i:s A'); ?>&nbsp;&nbsp;</div>
                   </div>
    </td>
  </tr>
  <tr>  
    <td colspan="10" valign="top">
         <table width="100%" border="1" cellspacing="2" cellpadding="2" class="table" id="table_data" >
        <thead>
          <tr>
                                           <th width="15%"><center>Beam-Machine ID</center></th>
                                             <th width="15%"><center>Beam No.</center></th>
                                             <th width="10%"><center>Beam Meter</center></th>
                                             <th width="27%"><center>Quality</center></th>
                                             <th width="10%"><center>Mach. No.</center></th>
                                            <th width="12%"><center>Fitted Date</center></th>
                                            <th width="15%"><center>Status</center></th>
                                            <th width="10%"><center>Entry #ID</center></th>
                                            
      </tr> 
       </thead>
       <tbody>
                        <?php
									do { ?>                                    
  <tr align="center"> 
     <td><?php echo $rowMain['Be_M_Id']; ?></td>
     <td><?php echo $rowMain['Beam_No']; ?></td>
    <td><?php echo $rowMain['Beam_Meter']; ?></td>
    <td><?php echo $rowMain['Quality_Name']; ?></td>
    <td><?php echo $rowMain['Machine_No']; ?></td>
    <td><?php echo $rowMain['Started_Date']; ?></td>
    <td><?php echo $rowMain['Status']; ?></td>
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