<?php include("logcode.php");
include("databaseconnect.php");
if(isset($_REQUEST['print']))
{
	$reportrange = $_REQUEST['reportrange'];
	$Type = $_REQUEST['Type']; 
	$splitdate = explode("-",$reportrange);
$date = $splitdate[0];
$date1 = $splitdate[1];
$dt= date('Y-m-d', strtotime($date));
$dt1= date('Y-m-d', strtotime($date1)); 
if($Type=='Beam')
 {
	$query1 = "SELECT * FROM `beam_d_c_1migrate` where Beam_D_C_Date between '".$dt."' and '".$dt1."' order by Beam_D_C_Id asc ";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
 }
 elseif($Type=='Bobbin')
 {
	$query1 = "SELECT * FROM `bobbin_d_cmigrate` where Bo_D_C_Date between '".$dt."' and '".$dt1."' order by Bo_D_C_Id asc ";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
 }
 elseif($Type=='Taka')
 {
	 $query1 = "SELECT * FROM `taka_d_c_migrate` where Taka_D_C_Date between '".$dt."' and '".$dt1."' order by Taka_D_C_Id asc ";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
 }
 elseif($Type=='Saree')
 {
	 $query1 = "SELECT * FROM `saree_d_migrate` where Saree_D_C_Date between '".$dt."' and '".$dt1."' order by Saree_D_C_Id asc ";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
	}
 elseif($Type=='Other')
 {
	  $query1 = "SELECT * FROM `other_migrate` where Other_D_C_Date between '".$dt."' and '".$dt1."' order by Other_D_C_Id asc ";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
 }
}
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>MIGRATE [M]&nbsp;<?php echo $date.' - '.$date1;?></title>
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
                    <div class="row-fluid">&nbsp;MIGRATION-[M]&nbsp;<?php if($Type=='Beam'){ ?>BEAM<?php } elseif($Type=='Bobbin'){ ?>BOBBIN<?php } elseif($Type=='Taka'){ ?>TAKA <?php } elseif($Type=='Saree'){?>SAREE<?php }?>&nbsp;<b>Report</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i><?php echo $date.' - '.$date1;?></i></div>
                    <div class="row-fluid" align="center"><strong>!! Shree Ganeshayan Namaha !!</strong><br/>
    <strong>SHINGORI TEXTILE</strong></div>
                    <div class="row-fluid" align="right"><?php echo date('Y/m/d h:i:s A'); ?>&nbsp;&nbsp;</div>
                   </div>
    </td>
  </tr>
  <tr>
   <?php if($Type=='Beam')
  {
	  ?>
    <td colspan="11" valign="top">
        <table width="100%" border="1" cellspacing="2" cellpadding="2" class="table" id="table_data" >
       <thead>
                                        <tr> 
                                        <th width="10%"><center>Sr No.</center></th>
                                             <th width="15%"><center>Migration-Challan ID</center></th>
                                             <th width="12%"><center>Challan Date</center></th>
                                             <th width="25%"><center>To</center></th>
                                             <th width="10%"><center>Total Beam</center></th>
                                             <th width="10%"><center>Status</center></th>
                                            <th width="12%"><center>Entry Date</center></th>
                                             <th width="15%"><center>Entry #ID</center></th>
                                        </tr>
                                       </thead>
                                    <tbody>
    <?php
	          $i=0;
	  $i++;
									do { ?>                                    
  <tr class="odd gradeX"> 
  <td><?php echo $i++; ?></td>
     <td><?php echo $rowMain['Beam_D_C_Id']; ?></td>
     <td><?php echo $rowMain['Beam_D_C_Date']; ?></td>
     <td><?php echo $rowMain['From_Ad']; ?></td>
    <td><?php echo $rowMain['Total_Beam']; ?></td>
    <td><?php echo $rowMain['Status']; ?></td>
    <td><?php echo $rowMain['Entry_Date']; ?></td>
    <td><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
    <?php } while($rowMain=mysql_fetch_assoc($rsMain)); ?>
                                    </tbody>
        </table>
        </td>
        <?php } elseif($Type=='Bobbin')
		{ ?>
        <td colspan="11" valign="top">
        <table width="100%" border="1" cellspacing="2" cellpadding="2" class="table" id="table_data" >
                                             <thead>
                                        <tr> <th width="10%"><center>Sr No.</center></th>
                                             <th width="15%"><center>Migration-Challan ID</center></th>
                                             <th width="12%"><center>Challan Date</center></th>
                                             <th width="25%"><center>To</center></th>
                                             <th width="10%"><center>Total Cartoon</center></th>
                                             <th width="10%"><center>Status</center></th>
                                            <th width="12%"><center>Entry Date</center></th>
                                             <th width="15%"><center>Entry #ID</center></th>
                                        </tr>
                                       </thead>
                                    <tbody>
    <?php
	          $i=0;
	  $i++;
									do { ?>                                    
  <tr class="odd gradeX"> 
  <td><?php echo $i++; ?></td>
     <td><?php echo $rowMain['Bo_D_C_Id']; ?></td>
     <td><?php echo $rowMain['Bo_D_C_Date']; ?></td>
     <td><?php echo $rowMain['From_Ad']; ?></td>
    <td><?php echo $rowMain['Total_Cart']; ?></td>
    <td><?php echo $rowMain['Status']; ?></td>
    <td><?php echo $rowMain['Entry_Date']; ?></td>
    <td><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
    <?php } while($rowMain=mysql_fetch_assoc($rsMain)); ?>
                                    </tbody>
        </table>
        </td>
        <?php
		}
		elseif($Type=='Taka')
  {
	  ?>
    <td colspan="11" valign="top">
        <table width="100%" border="1" cellspacing="2" cellpadding="2" class="table" id="table_data" >
       <thead>
                                        <tr> 
                                        <th width="10%"><center>Sr No.</center></th>
                                             <th width="15%"><center>Migration-Challan ID</center></th>
                                             <th width="12%"><center>Challan Date</center></th>
                                             <th width="25%"><center>To</center></th>
                                             <th width="10%"><center>Total Taka</center></th>
                                             <th width="10%"><center>Status</center></th>
                                            <th width="12%"><center>Entry Date</center></th>
                                             <th width="15%"><center>Entry #ID</center></th>
                                        </tr>
                                       </thead>
                                    <tbody>
    <?php
	          $i=0;
	  $i++;
									do { ?>                                    
  <tr class="odd gradeX"> 
  <td><?php echo $i++; ?></td>
     <td><?php echo $rowMain['Taka_D_C_Id']; ?></td>
     <td><?php echo $rowMain['Taka_D_C_Date']; ?></td>
     <td><?php echo $rowMain['Taka_Mig']; ?></td>
    <td><?php echo $rowMain['Total_Taka']; ?></td>
    <td><?php echo $rowMain['Status']; ?></td>
    <td><?php echo $rowMain['Entry_Date']; ?></td>
    <td><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
    <?php } while($rowMain=mysql_fetch_assoc($rsMain)); ?>
                                    </tbody>
        </table>
        </td>
        <?php } elseif($Type=='Saree')
		{ ?>
        <td colspan="11" valign="top">
        <table width="100%" border="1" cellspacing="2" cellpadding="2" class="table" id="table_data" >
                                             <thead>
                                        <tr> <th width="10%"><center>Sr No.</center></th>
                                             <th width="15%"><center>Migration-Challan ID</center></th>
                                             <th width="12%"><center>Challan Date</center></th>
                                             <th width="25%"><center>To</center></th>
                                             <th width="10%"><center>Total Lot</center></th>
                                             <th width="10%"><center>Status</center></th>
                                            <th width="12%"><center>Entry Date</center></th>
                                             <th width="15%"><center>Entry #ID</center></th>
                                        </tr>
                                       </thead>
                                    <tbody>
    <?php
	          $i=0;
	  $i++;
									do { ?>                                    
  <tr class="odd gradeX"> 
  <td><?php echo $i++; ?></td>
     <td><?php echo $rowMain['Saree_D_C_Id']; ?></td>
     <td><?php echo $rowMain['Saree_D_C_Date']; ?></td>
     <td><?php echo $rowMain['Saree_Mig']; ?></td>
    <td><?php echo $rowMain['Total_Lot']; ?></td>
    <td><?php echo $rowMain['Status']; ?></td>
    <td><?php echo $rowMain['Entry_Date']; ?></td>
    <td><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
    <?php } while($rowMain=mysql_fetch_assoc($rsMain)); ?>
                                    </tbody>
        </table>
        </td>
        <?php
		}
		 elseif($Type=='Other')
		{ ?>
        <td colspan="11" valign="top">
        <table width="100%" border="1" cellspacing="2" cellpadding="2" class="table" id="table_data" >
                                             <thead>
                                        <tr> <th width="10%"><center>Sr No.</center></th>
                                             <th width="15%"><center>Migration-Challan ID</center></th>
                                             <th width="12%"><center>Challan Date</center></th>
                                             <th width="25%"><center>To</center></th>
                                             <th width="10%"><center>Total</center></th>
                                             <th width="10%"><center>Status</center></th>
                                            <th width="12%"><center>Entry Date</center></th>
                                             <th width="15%"><center>Entry #ID</center></th>
                                        </tr>
                                       </thead>
                                    <tbody>
    <?php
	          $i=0;
	  $i++;
									do { ?>                                    
  <tr class="odd gradeX"> 
  <td><?php echo $i++; ?></td>
     <td><?php echo $rowMain['Other_D_C_Id']; ?></td>
     <td><?php echo $rowMain['Other_D_C_Date']; ?></td>
     <td><?php echo $rowMain['From_Ad']; ?></td>
    <td><?php echo $rowMain['Total_Other']; ?></td>
    <td><?php echo $rowMain['Status']; ?></td>
    <td><?php echo $rowMain['Entry_Date']; ?></td>
    <td><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
    <?php } while($rowMain=mysql_fetch_assoc($rsMain)); ?>
                                    </tbody>
        </table>
        </td>
        <?php
		}
		?>
        </tr>
</table>
</body>
</html>
<?php
 ob_flush(); ?>