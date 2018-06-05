<?php include("logcode.php");include("databaseconnect.php");
if(isset($_REQUEST['print']))
{
	$decodeurl = $_REQUEST['Ta_Labour_Id'];
		$durl = urldecode($decodeurl); 
	$turl = str_replace("'"," ",$durl);
	$urls = explode(" ",$turl);
	$Ta_Labour_Id = $urls[1];
		$sql = "select taka_labsal.Ta_Labour_Id,taka_production.Total_Meter,taka_labsal.Ta_Pro_Id,taka_labsal.Total_L_Amount,machine_details.Machine_No,beam_dcorg.Beam_No,taka_labsal.Total_MeterLab,taka_labsal.Entry_Date,taka_labsal.Entry_Id from taka_production,beam_dcorg,taka_labsal,beam_machine,machine_details where taka_production.Ta_Pro_Id = taka_labsal.Ta_Pro_Id AND beam_machine.Be_M_Id = taka_production.Be_M_Id AND machine_details.Machine_Id = beam_machine.Machine_Id AND beam_machine.Be_D_C_Id = beam_dcorg.Be_D_C_Id AND  Ta_Labour_Id = '".$Ta_Labour_Id."' ";
	 $rsMain = mysql_query($sql);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
	$query="select Taka_Labour_Id,Ta_Labour_Id,T_Date,Taka_Meter,L_Rate,L_Amount,labour_details.Name,taka_labsalsuborg.Description,R_Id,quality_details.Quality_Name from taka_labsalsuborg,labour_details,quality_details where labour_details.Labour_Id = taka_labsalsuborg.Labour_Id and quality_details.Quality_Id = taka_labsalsuborg.Quality_Id AND taka_labsalsuborg.Ta_Labour_Id = '".$Ta_Labour_Id."' order by taka_labsalsuborg.Taka_Labour_Id asc";
	 $rsSub = mysql_query($query);
	$rowSub = mysql_fetch_array($rsSub);
	$totalRowsRsSub = mysql_num_rows($rsSub);
	}
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>LABOUR [T]&nbsp;<?php echo date('Y/m/d h:i:s A'); ?></title>
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
                    <div class="row-fluid">&nbsp;&nbsp;&nbsp;TAKA-LABOUR&nbsp;<b>Report</b></div>
                    <div class="row-fluid" align="center"><strong>!! Shree Ganeshayah Namaha !!</strong><br/>
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
                                             <th width="20%"><center>Taka-Labour ID</center></th>
                                             <th width="20%"><center>Taka-Production ID</center></th>
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
     <td><?php echo $rowMain['Ta_Labour_Id']; ?></td>
    <td><?php echo $rowMain['Ta_Pro_Id']; ?></td>
    <td><?php echo $rowMain['Total_MeterLab']; ?></td>
    <td><?php echo $rowMain['Total_Meter']; ?></td>
    <td><?php echo $rowMain['Total_L_Amount']; ?></td>
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
    <td width="10%"><?php echo $rowSub['T_Date']; ?></td>
    <td width="25%"><?php echo $rowSub['Quality_Name']; ?></td>
    <td  width="7%"><?php echo $rowSub['Taka_Meter']; ?></td>
    <td width="7%"><?php echo $rowSub['L_Rate']; ?></td>
    <td width="7%"><?php echo $rowSub['L_Amount']; ?></td>
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
                                             <th><center>Total Meter</center></th>
                                             <th><center>Total Amount</center></th>
                                        </tr>
                                    </thead>
                                    <?php 
									$i = 0;
									$i++;
									?>
                                    <tbody>
                                      <?php $sqllab = "select sum(Taka_Meter) as Sum_Meter ,sum(L_Amount) as Sum_Amount , quality_details.Quality_Name,labour_details.Name from taka_labsalsuborg,quality_details,labour_details where quality_details.Quality_Id = taka_labsalsuborg.Quality_Id AND labour_details.Labour_Id = taka_labsalsuborg.Labour_Id AND Ta_Labour_Id = '".$Ta_Labour_Id."' group by quality_details.Quality_Name,labour_details.Name";
	$resultlab = mysql_query($sqllab);
	while($rowlab = mysql_fetch_array($resultlab)) {?>
                                      <tr>
                                          <td width="7%"><?php echo $i++; ?></td>
                                          <td width="15%"><?php echo $rowlab['Name']; ?></td>
                                          <td width="20%"><?php echo $rowlab['Quality_Name']; ?></td>
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