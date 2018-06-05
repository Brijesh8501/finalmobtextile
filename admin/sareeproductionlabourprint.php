<?php include("logcode.php");
include("databaseconnect.php");
if(isset($_REQUEST['print']))
{
	$decodeurl = $_REQUEST['Sa_Labour_Id'];
		$durl = urldecode($decodeurl); 
	$turl = str_replace("'"," ",$durl);
	$urls = explode(" ",$turl);
	$Sa_Labour_Id = $urls[1];
		$sql = "select saree_labsal.Sa_Labour_Id,saree_labsal.Total_S_Amount,saree_production.Total_Meter,saree_labsal.Sa_Pro_Id,machine_details.Machine_No,beam_dcorg.Beam_No,saree_labsal.Total_MeterLab,saree_labsal.Entry_Date,saree_labsal.Entry_Id from saree_production,beam_dcorg,saree_labsal,beam_machine,machine_details where saree_production.Sa_Pro_Id = saree_labsal.Sa_Pro_Id AND beam_machine.Be_M_Id = saree_production.Be_M_Id AND machine_details.Machine_Id = beam_machine.Machine_Id AND beam_machine.Be_D_C_Id = beam_dcorg.Be_D_C_Id AND Sa_Labour_Id = '".$Sa_Labour_Id."' ";
	 $rsMain = mysql_query($sql);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
	$query="select Saree_Labour_Id,Sa_Labour_Id,S_Date,Saree_Meter,S_Rate,S_Amount,labour_details.Name,saree_labsalsuborg1.Description,R_Id,quality_details.Quality_Name,design_details.Design from saree_labsalsuborg1,labour_details,quality_details,design_details where labour_details.Labour_Id = saree_labsalsuborg1.Labour_Id and design_details.Design_Id = saree_labsalsuborg1.Design_Id AND quality_details.Quality_Id = design_details.Quality_Id AND saree_labsalsuborg1.Sa_Labour_Id = '".$Sa_Labour_Id."' order by saree_labsalsuborg1.saree_Labour_Id asc";
	 $rsSub = mysql_query($query);
	$rowSub = mysql_fetch_array($rsSub);
	$totalRowsRsSub = mysql_num_rows($rsSub);
	}
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>S-LABOUR&nbsp;<?php echo date('Y/m/d h:i:s A'); ?></title>
<style type="text/css">
table {
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
                    <div class="row-fluid">&nbsp;&nbsp;&nbsp;SAREE-LABOUR&nbsp;<b>Report</b></div>
                    <div class="row-fluid" align="center"><i>!! Shree Ganeshayah Namaha !!</i><br/>
    <strong>SHINGORI TEXTILE</strong></div>
                    <div class="row-fluid" align="right"><span style="float:left">&nbsp;&nbsp;<b>Beam No&nbsp;:&nbsp;<?php echo $rowMain['Beam_No']; ?></b></span><b>Machine No :&nbsp;<?php echo $rowMain['Machine_No']; ?></b>&nbsp;&nbsp;&nbsp;<?php echo date('Y/m/d h:i:s A'); ?>&nbsp;&nbsp;</div>
                   </div>
   </td>
  </tr>
  <tr>
    <td colspan="8" valign="top">
        <table width="100%" border="1" cellspacing="2" class="table">
        <thead>
          <tr>
                                             <th width="20%"><center>Saree-Labour ID</center></th>
                                             <th width="20%"><center>Saree-Production ID</center></th>
                                             <th width="12%"><center>Total Meter</center></th>
                                             <th width="15%"><center>Prod.Total Meter</center></th>
                                             <th width="15%"><center>Total Amount</center></th>
                                             <th width="10%"><center>Entry Date</center></th>
                                            <th width="10%"><center>Entry #ID</center></th>
                                            
      </tr> 
      </thead>
     <?php
									do { ?>                                    
                                   <tbody>   
  <tr align="center"> 
     <td><?php echo $rowMain['Sa_Labour_Id']; ?></td>
    <td><?php echo $rowMain['Sa_Pro_Id']; ?></td>
    <td><?php echo $rowMain['Total_MeterLab']; ?></td>
    <td><?php echo $rowMain['Total_Meter']; ?></td>
    <td><?php echo $rowMain['Total_S_Amount']; ?></td>
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
                                             <th><center>Date</center></th>
                                             <th><center>Quality</center></th>
                                             <th><center>Design</center></th>
                                             <th><center>Meter</center></th>
                                            <th><center>Rate</center></th>
                                            <th><center>Amount</center></th>
                                            <th><center>Labour</center></th>
                                            <th><center>Description</center></th>
                                            <th><center>#ID</center></th>
                                            </tr> 
      </thead>
     <?php
									do { ?>                                    
                                   <tbody>   
  <tr align="center"> 
    <td width="10%"><?php echo $rowSub['S_Date']; ?></td>
    <td width="25%"><?php echo $rowSub['Quality_Name']; ?></td>
    <td width="15%"><?php echo $rowSub['Design']; ?></td>
    <td  width="7%"><?php echo $rowSub['Saree_Meter']; ?></td>
    <td width="7%"><?php echo $rowSub['S_Rate']; ?></td>
    <td width="7%"><?php echo $rowSub['S_Amount']; ?></td>
    <td width="15%"><?php echo $rowSub['Name']; ?></td>
    <td width="25%"><?php echo $rowSub['Description']; ?></td>
    <td width="15%"><?php echo $rowSub['R_Id']; ?></td>
   </tr>
   </tbody>
    <?php } while($rowSub = mysql_fetch_assoc($rsSub)); ?>
   </table>
                 </td>
             </tr>
             <tr>
                <td colspan="8" valign="top">
                 <table width="100%" border="1" cellspacing="2" class="table" id="table_data" >
                                    <thead>
                                        <tr>
                                            <th><center>Sr No.</center></th>
                                            <th><center>Labour</center></th>
                                            <th><center>Quality</center></th>
                                            <th><center>Design</center></th>
                                             <th><center>Total Meter</center></th>
                                             <th><center>Total Amount</center></th>
                                        </tr>
                                    </thead>
                                    <?php 
									$i = 0;
									$i++;
									?>
                                    <tbody>
                                      <?php $sqllab = "select sum(Saree_Meter) as Sum_Meter ,sum(S_Amount) as Sum_Amount , quality_details.Quality_Name,design_details.Design,labour_details.Name from saree_labsalsuborg1,quality_details,labour_details,design_details where design_details.Design_Id = saree_labsalsuborg1.Design_Id AND quality_details.Quality_Id = design_details.Quality_Id AND labour_details.Labour_Id = saree_labsalsuborg1.Labour_Id AND Sa_Labour_Id = '".$Sa_Labour_Id."' group by quality_details.Quality_Name,labour_details.Name,design_details.Design";
	$resultlab = mysql_query($sqllab);
	while($rowlab = mysql_fetch_array($resultlab)) {?>
                                      <tr>
                                          <td width="7%"><?php echo $i++; ?></td>
                                          <td width="15%"><?php echo $rowlab['Name']; ?></td>
                                          <td width="20%"><?php echo $rowlab['Quality_Name']; ?></td>
                                          <td width="12%"><?php echo $rowlab['Design']; ?></td>
                                          <td width="7%"><?php echo $rowlab['Sum_Meter']; ?></td>
                                          <td width="10%"><?php echo $rowlab['Sum_Amount']; ?></td>
                                        </tr>
                                        <?php }  ?>
                                        </tbody>
                                </table>
                                 </td>
             </tr>
</table>
</body>
</html>
<?php
 ob_flush(); ?>