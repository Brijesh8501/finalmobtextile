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
      $sql1 = "select Be_D_C_Id,beam_d_c_1migrate.Beam_D_C_Id,beam_d_c_1migrate.Beam_D_C_Date,Chbe_D_C_Id,Beam_No,Taar,Beam_Meter,Weight,quality_details.Quality_Name,R_Id from beam_d_c_1migrate,beam_dcorgmigrate,quality_details where quality_details.Quality_Id = beam_dcorgmigrate.Quality_Id AND beam_d_c_1migrate.Beam_D_C_Id = beam_dcorgmigrate.Beam_D_C_Id AND beam_d_c_1migrate.Beam_D_C_Date between '".$dt."' and '".$dt1."'  order by beam_d_c_1migrate.Beam_D_C_Id asc ";
   $rsSub = mysql_query($sql1);
	$rowSub = mysql_fetch_array($rsSub);
	$totalRowsRsSub = mysql_num_rows($rsSub);
 }
 elseif($Type=='Bobbin')
 {
      $sql1 = "select Bobbin_D_C_Id,bobbin_d_cmigrate.Bo_D_C_Id,bobbin_d_cmigrate.Bo_D_C_Date,Chbo_D_C_Id,quality_details.Quality_Name,Total_Cartoon,R_Id from bobbin_d_cmigrate,boobin_dcorgmigrate,quality_details where quality_details.Quality_Id = boobin_dcorgmigrate.Quality_Id AND bobbin_d_cmigrate.Bo_D_C_Id = boobin_dcorgmigrate.Bo_D_C_Id AND bobbin_d_cmigrate.Bo_D_C_Date between '".$dt."' and '".$dt1."'  order by bobbin_d_cmigrate.Bo_D_C_Id asc ";
   $rsSub = mysql_query($sql1);
	$rowSub = mysql_fetch_array($rsSub);
	$totalRowsRsSub = mysql_num_rows($rsSub);
 }
 elseif($Type=='Taka')
 {
      $sql1 = "select Ta_D_C_Id,taka_d_c_migrate.Taka_D_C_Id,Taka_Id,Taka_Meter,Taka_Weight,quality_details.Quality_Name,R_Id from taka_d_c_migrate,taka_dcorgmigrate,quality_details where quality_details.Quality_Id = taka_dcorgmigrate.Quality_Id AND taka_d_c_migrate.Taka_D_C_Id = taka_dcorgmigrate.Taka_D_C_Id AND taka_d_c_migrate.Taka_D_C_Date between '".$dt."' and '".$dt1."'  order by taka_d_c_migrate.Taka_D_C_Id asc ";
   $rsSub = mysql_query($sql1);
	$rowSub = mysql_fetch_array($rsSub);
	$totalRowsRsSub = mysql_num_rows($rsSub);
 }
 elseif($Type=='Saree')
 {
      $sql1 = "select Sa_D_C_Id,saree_d_migrate.Saree_D_C_Id,saree_d_migrate.Saree_D_C_Date,Saree_Lot_Id,Saree_Lot_Meter,Saree_Weight,Saree_Pieces,design_details.Design,quality_details.Quality_Name,R_Id from saree_d_migrate,saree_dcorgmigrate,design_details,quality_details where design_details.Design_Id = saree_dcorgmigrate.Design_Id AND quality_details.Quality_Id = design_details.Quality_Id AND saree_d_migrate.Saree_D_C_Id = saree_dcorgmigrate.Saree_D_C_Id AND saree_d_migrate.Saree_D_C_Date between '".$dt."' and '".$dt1."'  order by saree_d_migrate.Saree_D_C_Id asc ";
   $rsSub = mysql_query($sql1);
	$rowSub = mysql_fetch_array($rsSub);
	$totalRowsRsSub = mysql_num_rows($rsSub);
 }
 elseif($Type=='Other')
 {
      $sql1 = "select Ot_D_C_Id,other_migrate.Other_D_C_Id,machine_parts.Mach_Pname,Quantity,R_Id from machine_parts,other_migrate,other_sub_orgmigrate where machine_parts.Mach_Part_Id = other_sub_orgmigrate.Mach_Part_Id AND other_migrate.Other_D_C_Id = other_sub_orgmigrate.Other_D_C_Id AND other_migrate.Other_D_C_Date between '".$dt."' and '".$dt1."'  order by other_migrate.Other_D_C_Id asc ";
   $rsSub = mysql_query($sql1);
	$rowSub = mysql_fetch_array($rsSub);
	$totalRowsRsSub = mysql_num_rows($rsSub);
 }
}
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>MIGRATION [S]&nbsp;<?php echo $date.' - '.$date1;?></title>
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
                    <div class="row-fluid">&nbsp;MIGRATION-[S]&nbsp;<?php if($Type=='Beam'){ ?>BEAM<?php } elseif($Type=='Bobbin'){ ?>BOBBIN<?php } elseif($Type=='Taka'){ ?>TAKA <?php } elseif($Type=='Saree'){?>SAREE<?php } elseif($Type=='Other'){?>OTHER<?php }?>&nbsp;<b>Report</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i><?php echo $date.' - '.$date1;?></i></div>
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
                                              <tr> 
                                        <th width="7%"><center>Sr No.</center></th>
                                             <th width="15%"><center>Migration-Challan ID</center></th>
                                             <th width="15%"><center>Beam No</center></th>
                                             <th width="15%"><center>Meter</center></th>
                                             <th width="10%"><center>Weight</center></th>
                                            <th width="30%"><center>Quality</center></th>
                                            <th width="10%"><center>#ID</center></th>
                                        </tr>
    <?php 
    $i = 0;
	$i++;
									do { ?>                                
<tr align="center"> 
  <td><?php echo $i++; ?></td>
    <td><?php echo $rowSub['Beam_D_C_Id']; ?></td>
     <td><?php echo $rowSub['Beam_No']; ?></td>
     <td><?php echo $rowSub['Beam_Meter']; ?></td>
    <td><?php echo $rowSub['Weight']; ?></td>
    <td><?php echo $rowSub['Quality_Name']; ?></td>
    <td><?php echo $rowSub['R_Id']; ?></td>
   </tr>
  <?php } while($rowSub=mysql_fetch_assoc($rsSub)); ?>
        </table>
        </td>
        <?php } elseif($Type=='Bobbin')
		{ ?>
        <td colspan="11" valign="top">
        <table width="100%" border="1" cellspacing="2" cellpadding="2" class="table" id="table_data" >
                                             <tr> 
                                         <th width="7%"><center>Sr No.</center></th>
                                             <th width="15%"><center>Migration-Challan ID</center></th>
                                             <th width="15%"><center>Cartoon</center></th>
                                            <th width="25%"><center>Quality</center></th>
                                            <th width="10%"><center>#ID</center></th>
                                        </tr>
    <?php 
	$i = 0;
	$i++;
									do { ?>                                
<tr align="center"> 
      <td><?php echo $i++; ?></td>
    <td><?php echo $rowSub['Bo_D_C_Id']; ?></td>
     <td><?php echo $rowSub['Total_Cartoon']; ?></td>
    <td><?php echo $rowSub['Quality_Name']; ?></td>
    <td><?php echo $rowSub['R_Id']; ?></td>
   </tr>
  <?php } while($rowSub=mysql_fetch_assoc($rsSub)); ?>
        </table>
         </td>
        <?php
		}
		if($Type=='Taka')
  {
	  ?>
    <td colspan="11" valign="top">
        <table width="100%" border="1" cellspacing="2" cellpadding="2" class="table" id="table_data" >
                                             <tr> 
                                       <th width="7%"><center>Sr No.</center></th>
                                             <th width="15%"><center>Migration-Challan ID</center></th>
                                             <th width="15%"><center>Taka ID</center></th>
                                             <th width="15%"><center>Taka Meter</center></th>
                                             <th width="15%"><center>Taka Weight</center></th>
                                            <th width="30%"><center>Quality</center></th>
                                            <th width="10%"><center>#ID</center></th>
                                        </tr>
    <?php 
    $i = 0;
	$i++;
									do { ?>                                
<tr align="center"> 
     <td><?php echo $i++; ?></td>
    <td><?php echo $rowSub['Taka_D_C_Id']; ?></td>
     <td><?php echo $rowSub['Taka_Id']; ?></td>
     <td><?php echo $rowSub['Taka_Meter']; ?></td>
    <td><?php echo $rowSub['Taka_Weight']; ?></td>
    <td><?php echo $rowSub['Quality_Name']; ?></td>
    <td><?php echo $rowSub['R_Id']; ?></td>
   </tr>
  <?php } while($rowSub=mysql_fetch_assoc($rsSub)); ?>
        </table>
        </td>
        <?php } elseif($Type=='Saree')
		{ ?>
        <td colspan="11" valign="top">
        <table width="100%" border="1" cellspacing="2" cellpadding="2" class="table" id="table_data" >
                                             <tr> 
                                        <th width="7%"><center>Sr No.</center></th>
                                             <th width="15%"><center>Migration-Challan ID</center></th>
                                             <th width="12%"><center>Lot ID</center></th>
                                             <th width="10%"><center>Lot Meter</center></th>
                                             <th width="10%"><center>Lot Weight</center></th>
                                            <th width="7%"><center>Piecess</center></th>
                                            <th width="25%"><center>Quality</center></th>
                                            <th width="20%"><center>Design</center></th>
                                            <th width="10%"><center>#ID</center></th>
                                        </tr>
    <?php 
	$i = 0;
	$i++;
									do { ?>                                
<tr align="center"> 
    <td><?php echo $i++; ?></td>
    <td><?php echo $rowSub['Saree_D_C_Id']; ?></td>
     <td><?php echo $rowSub['Saree_Lot_Id']; ?></td>
     <td><?php echo $rowSub['Saree_Lot_Meter']; ?></td>
    <td><?php echo $rowSub['Saree_Weight']; ?></td>
    <td><?php echo $rowSub['Saree_Pieces']; ?></td>
    <td><?php echo $rowSub['Quality_Name']; ?></td>
    <td><?php echo $rowSub['Design']; ?></td>
    <td><?php echo $rowSub['R_Id']; ?></td>
   </tr>
  <?php } while($rowSub=mysql_fetch_assoc($rsSub)); ?>
        </table>
        </td>
        <?php
		}
		elseif($Type=='Other')
		{ ?>
        <td colspan="11" valign="top">
        <table width="100%" border="1" cellspacing="2" cellpadding="2" class="table" id="table_data" >
                                             <tr> 
                                       <th width="7%"><center>Sr No.</center></th>
                                             <th width="15%"><center>Migration-Challan ID</center></th>
                                            <th width="25%"><center>Machine-Parts</center></th>
                                            <th width="20%"><center>Quanitity</center></th>
                                            <th width="10%"><center>#ID</center></th>
                                        </tr>
    <?php 
	$i = 0;
	$i++;
									do { ?>                                
<tr align="center"> 
    <td><?php echo $i++; ?></td>
    <td><?php echo $rowSub['Other_D_C_Id']; ?></td>
    <td><?php echo $rowSub['Mach_Pname']; ?></td>
    <td><?php echo $rowSub['Quantity']; ?></td>
    <td><?php echo $rowSub['R_Id']; ?></td>
   </tr>
  <?php } while($rowSub=mysql_fetch_assoc($rsSub)); ?>
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