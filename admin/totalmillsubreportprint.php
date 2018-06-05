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
if($Type=='Taka')
{
 $sql1 = "select Ta_D_C_Id,taka_d_c_mill.Taka_D_C_Id,Taka_Id,Taka_Meter,Taka_Weight,quality_details.Quality_Name,R_Id,taka_d_c_mill.Taka_D_C_Date from taka_dcorgmill,quality_details,taka_d_c_mill where quality_details.Quality_Id = taka_dcorgmill.Quality_Id AND taka_d_c_mill.Taka_D_C_Id = taka_dcorgmill.Taka_D_C_Id AND taka_d_c_mill.Taka_D_C_Date between '".$dt."' and '".$dt1."'  order by taka_d_c_mill.Taka_D_C_Id asc ";
   $rsSub = mysql_query($sql1);
	$rowSub = mysql_fetch_array($rsSub);
	$totalRowsRsSub = mysql_num_rows($rsSub);
}
elseif($Type=='Saree')
{
       $sql1 = "select Sa_D_C_Id,saree_d_mill.Saree_D_C_Id,Saree_Lot_Id,Saree_Lot_Meter,Saree_Weight,Saree_Pieces,design_details.Design,quality_details.Quality_Name,R_Id,saree_d_mill.Saree_D_C_Date from saree_dcorgmill,design_details,quality_details,saree_d_mill where design_details.Design_Id = saree_dcorgmill.Design_Id AND quality_details.Quality_Id = design_details.Quality_Id AND saree_d_mill.Saree_D_C_Id = saree_dcorgmill.Saree_D_C_Id AND saree_d_mill.Saree_D_C_Date between '".$dt."' and '".$dt1."'  order by saree_d_mill.Saree_D_C_Id asc ";
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
<title>MILL [S]&nbsp;<?php echo $date.' - '.$date1;?></title>
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
                    <div class="row-fluid">&nbsp;MIll-[S]&nbsp;<?php if($Type=='Taka'){ ?>TAKA <?php } elseif($Type=='Saree'){?>SAREE<?php }?>&nbsp;<b>Report</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i><?php echo $date.' - '.$date1;?></i></div>
                    <div class="row-fluid" align="center"><strong>!! Shree Ganeshayan Namaha !!</strong><br/>
    <strong>SHINGORI TEXTILE</strong></div>
                    <div class="row-fluid" align="right"><?php echo date('Y/m/d h:i:s A'); ?>&nbsp;&nbsp;</div>
                   </div>
    </td>
  </tr>
  <tr>
  <?php if($Type=='Taka')
  {
	  ?>
    <td colspan="11" valign="top">
        <table width="100%" border="1" cellspacing="2" cellpadding="2" class="table" id="table_data" >
                                             <tr> 
                                        <th width="7%"><center>Sr No.</center></th>
                                             <th width="15%"><center>Mill-Challan ID</center></th>
                                             <th width="15%"><center>Taka ID</center></th>
                                             <th width="15%"><center>Taka Meter</center></th>
                                             <th width="10%"><center>Taka Weight</center></th>
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
                                             <th width="15%"><center>Mill-Challan ID</center></th>
                                             <th width="15%"><center>Lot ID</center></th>
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
		?>
        </tr>
</table>
</body>
</html>
<?php
 ob_flush(); ?>