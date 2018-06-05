<?php error_reporting(0); 
include("databaseconnect.php");
if(isset($_REQUEST['SearchLabMF']))
    {   
    $reportrange = $_REQUEST['reportrange'];
	$Type = $_REQUEST['TypeLabMF'];
	$Labour = $_REQUEST['Labour']; 
	$splitdate = explode("-",$reportrange);
$date = $splitdate[0];
$date1 = $splitdate[1];
$dt = date('Y-m-d', strtotime($date));
$dt1 = date('Y-m-d', strtotime($date1)); 
  if($reportrange && $Type=='Meter' && $Labour)
  {
	$query1="select Taka_Labour_Id,Ta_Labour_Id,T_Date,Taka_Meter,L_Rate,L_Amount,quality_details.Quality_Name,labour_details.Name,taka_labsalsuborg.Description,R_Id from taka_labsalsuborg,labour_details,quality_details where quality_details.Quality_Id = taka_labsalsuborg.Quality_Id AND labour_details.Labour_Id = taka_labsalsuborg.Labour_Id AND T_Date between '".$dt."' and '".$dt1."' AND labour_details.Labour_Id = '$Labour' order by Taka_Labour_Id asc ";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
	  $sql1= "select Saree_Labour_Id,Sa_Labour_Id,S_Date,Saree_Meter,quality_details.Quality_Name,design_details.Design,labour_details.Name,saree_labsalsuborg1.Description,R_Id,S_Rate,S_Amount from saree_labsalsuborg1,quality_details,design_details,labour_details where design_details.Design_Id = saree_labsalsuborg1.Design_Id AND quality_details.Quality_Id = design_details.Quality_Id AND labour_details.Labour_Id = saree_labsalsuborg1.Labour_Id AND S_Date between '".$dt."' and '".$dt1."' AND labour_details.Labour_Id = '$Labour' order by Saree_Labour_Id asc";
   $rsSub = mysql_query($sql1);
	$rowSub = mysql_fetch_array($rsSub);
	$totalRowsRsSub = mysql_num_rows($rsSub);
  }
   elseif($reportrange!="" && $Type=='Meter')
  {
	$query1="select Taka_Labour_Id,Ta_Labour_Id,T_Date,Taka_Meter,L_Rate,L_Amount,quality_details.Quality_Name,labour_details.Name,taka_labsalsuborg.Description,R_Id from taka_labsalsuborg,labour_details,quality_details where quality_details.Quality_Id = taka_labsalsuborg.Quality_Id AND labour_details.Labour_Id = taka_labsalsuborg.Labour_Id AND T_Date between '".$dt."' and '".$dt1."' order by Taka_Labour_Id asc ";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
	  $sql1= "select Saree_Labour_Id,Sa_Labour_Id,S_Date,Saree_Meter,quality_details.Quality_Name,design_details.Design,labour_details.Name,saree_labsalsuborg1.Description,R_Id,S_Rate,S_Amount from saree_labsalsuborg1,quality_details,design_details,labour_details where design_details.Design_Id = saree_labsalsuborg1.Design_Id AND quality_details.Quality_Id = design_details.Quality_Id AND labour_details.Labour_Id = saree_labsalsuborg1.Labour_Id AND S_Date between '".$dt."' and '".$dt1."' order by Saree_Labour_Id asc";
   $rsSub = mysql_query($sql1);
	$rowSub = mysql_fetch_array($rsSub);
	$totalRowsRsSub = mysql_num_rows($rsSub);
  }
  elseif($reportrange && $Type=='Fixed' && $Labour)
  {
	  $query1="select Sal_Fixed_Id,Date_Range,labour_details.Name,No_Of,Rate,Amount,Upad_Amount,Grand_Total,Re_Amount,salary_fixed_master.Status,salary_fixed_master.Entry_Date,salary_fixed_master.Entry_Id from salary_fixed_master,labour_details where labour_details.Labour_Id = salary_fixed_master.Labour_Id AND labour_details.Labour_Id = '$Labour' AND Date_Range = '$reportrange' order by Sal_Fixed_Id asc";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
  }
 elseif($reportrange!="" && $Type=='Fixed')
  {
	 $query1= "select Sal_Fixed_Id,Date_Range,labour_details.Name,No_Of,Rate,Amount,Upad_Amount,Grand_Total,Re_Amount,salary_fixed_master.Status,salary_fixed_master.Entry_Date,salary_fixed_master.Entry_Id from salary_fixed_master,labour_details where labour_details.Labour_Id = salary_fixed_master.Labour_Id AND Date_Range = '$reportrange' order by Sal_Fixed_Id asc";
  $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
  }
	}

if($reportrange=="")
	{
		echo '<script>alert("Please select date range first....");</script>';
	}
else
{
	if($reportrange && $Type=='Meter' && $Labour)
	{
		if($totalRowsRsMain==0)
{
	echo "<center>There is no record in taka-labour</center>";
}
else
{
	?>
    <center><strong>****RECORDS SHOWN FROM TAKA-LABOUR****</strong></center>
<div align="right">
<a href="totallabmtrtakarptprint?print&reportrange=<?php echo $reportrange; ?>&Type=<?php echo $Type;?>&Labour=<?php echo $Labour; ?>" target="_blank"><i class="icon-print"></i></a>
</div>
 <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                        <tr> 
                                             <th>Sr No.</th>
                                             <th>Taka-Labour ID</th>
                                             <th>Date</th>
                                             <th>Quality</th>
                                             <th>Meter</th>
                                             <th>Rate</th>
                                            <th>Amount</th>
                                            <th>Labour</th>
                                            <th>Description</th>
                                            <th>#ID</th>
                                        </tr>
                                       </thead>
                                    <tbody>
                                    <?php $i=0;
	  $i++;
									do { ?>                                    
  <tr class="odd gradeX"> 
    <td width="7%"><?php echo $i++; ?></td>
     <td width="15%"><?php echo $rowMain['Ta_Labour_Id']; ?></td>
    <td width="10%"><?php echo $rowMain['T_Date']; ?></td>
    <td width="20%"><?php echo $rowMain['Quality_Name']; ?></td>
    <td width="7%"><?php echo $rowMain['Taka_Meter']; ?></td>
    <td width="7%"><?php echo $rowMain['L_Rate']; ?></td>
    <td width="7%"><?php echo $rowMain['L_Amount']; ?></td>
    <td width="12%"><?php echo $rowMain['Name']; ?></td>
    <td width="30%"><?php echo $rowMain['Description']; ?></td>
    <td width="10%"><?php echo $rowMain['R_Id']; ?></td>
   </tr>
     <?php $TT_M = $TT_M + $rowMain['Taka_Meter'];
  $TT_A = $TT_A + $rowMain['L_Amount'];} while($rowMain=mysql_fetch_assoc($rsMain)); ?>
  <tr>
  <th colspan="10"><span style="float:right">Total Meter&nbsp;:&nbsp;<?php echo $TT_M;?>&nbsp;&nbsp;&nbsp;Total Amount&nbsp;:&nbsp;<?php echo $TT_A;?></span>
  </th>
  </tr>
                                    </tbody>
                                </table>
                                <?php } 
								if($totalRowsRsSub==0)
{
	echo "<center>There is no record in saree-labour</center>";
}
else
{?>
     <center><strong>****RECORDS SHOWN FROM SAREE-LABOUR****</strong></center>
                            <div align="right">
<a href="totallabmtrsareerptprint?print&reportrange=<?php echo $reportrange; ?>&Type=<?php echo $Type;?>&Labour=<?php echo $Labour;?>" target="_blank"><i class="icon-print"></i></a>
</div>
                             <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                        <tr> 
                                             <th>Sr No.</th>
                                             <th>Saree-Labour ID</th>
                                             <th>Date</th>
                                             <th>Quality</th>
                                             <th>Design</th>
                                             <th>Meter</th>
                                             <th>Rate</th>
                                            <th>Amount</th>
                                            <th>Labour</th>
                                            <th>Description</th>
                                            <th>#ID</th>
                                        </tr>
                               </thead>
                                    <tbody>
                                     <?php $i=0;
	  $i++;
									do { ?>                                
  <tr class="odd gradeX"> 
    <td width="7%"><?php echo $i++; ?></td>
     <td width="15%"><?php echo $rowSub['Sa_Labour_Id']; ?></td>
     <td width="10%"><?php echo $rowSub['S_Date']; ?></td>
    <td width="20%"><?php echo $rowSub['Quality_Name']; ?></td>
    <td width="12%"><?php echo $rowSub['Design']; ?></td>
    <td width="7%"><?php echo $rowSub['Saree_Meter']; ?></td>
    <td width="7%"><?php echo $rowSub['S_Rate']; ?></td>
    <td width="7%"><?php echo $rowSub['S_Amount']; ?></td>
   <td width="15%"><?php echo $rowSub['Name']; ?></td>
    <td width="30%"><?php echo $rowSub['Description']; ?></td>
    <td width="10%"><?php echo $rowSub['R_Id']; ?></td>
  </tr>
  <?php $SS_M = $SS_M + $rowSub['Saree_Meter'];
  $SS_A = $SS_A + $rowSub['S_Amount'];} while($rowSub=mysql_fetch_assoc($rsSub)); ?>
  <tr>
  <th colspan="11"><span style="float:right">Total Meter&nbsp;:&nbsp;<?php echo $SS_M;?>&nbsp;&nbsp;&nbsp;Total Amount&nbsp;:&nbsp;<?php echo $SS_A;?></span>
  </th>
  </tr>
                                    </tbody>
                              </table>
<?php
	}
	}
	elseif($reportrange!="" && $Type=='Meter')
	{
		if($totalRowsRsMain==0)
{
	echo "<center>There is no record in taka-labour</center>";
}
else
{
	?>
    <center><strong>****RECORDS SHOWN FROM TAKA-LABOUR****</strong></center>
<div align="right">
<a href="totallabmtrtakarptprint?print&reportrange=<?php echo $reportrange; ?>&Type=<?php echo $Type;?>" target="_blank"><i class="icon-print"></i></a>
</div>
 <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                        <tr> 
                                             <th>Sr No.</th>
                                             <th>Taka-Labour ID</th>
                                             <th>Date</th>
                                             <th>Quality</th>
                                             <th>Meter</th>
                                             <th>Rate</th>
                                            <th>Amount</th>
                                            <th>Labour</th>
                                            <th>Description</th>
                                            <th>#ID</th>
                                        </tr>
                                       </thead>
                                    <tbody>
                                    <?php $i=0;
	  $i++;
									do { ?>                                    
  <tr class="odd gradeX"> 
    <td width="7%"><?php echo $i++; ?></td>
     <td width="15%"><?php echo $rowMain['Ta_Labour_Id']; ?></td>
    <td width="10%"><?php echo $rowMain['T_Date']; ?></td>
    <td width="20%"><?php echo $rowMain['Quality_Name']; ?></td>
    <td width="7%"><?php echo $rowMain['Taka_Meter']; ?></td>
    <td width="7%"><?php echo $rowMain['L_Rate']; ?></td>
    <td width="7%"><?php echo $rowMain['L_Amount']; ?></td>
    <td width="12%"><?php echo $rowMain['Name']; ?></td>
    <td width="30%"><?php echo $rowMain['Description']; ?></td>
    <td width="10%"><?php echo $rowMain['R_Id']; ?></td>
   </tr>
    <?php $TT_M = $TT_M + $rowMain['Taka_Meter'];
  $TT_A = $TT_A + $rowMain['L_Amount'];} while($rowMain=mysql_fetch_assoc($rsMain)); ?>
  <tr>
  <th colspan="10"><span style="float:right">Total Meter&nbsp;:&nbsp;<?php echo $TT_M;?>&nbsp;&nbsp;&nbsp;Total Amount&nbsp;:&nbsp;<?php echo $TT_A;?></span>
  </th>
  </tr>
                                    </tbody>
                                </table>
                                <?php } 
								if($totalRowsRsSub==0)
{
	echo "<center>There is no record in saree-labour</center>";
}
else
{?>
     <center><strong>****RECORDS SHOWN FROM SAREE-LABOUR****</strong></center>
                            <div align="right">
 <a href="totallabmtrsareerptprint?print&reportrange=<?php echo $reportrange; ?>&Type=<?php echo $Type;?>" target="_blank"><i class="icon-print"></i></a>
</div>
                             <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                        <tr> 
                                             <th>Sr No.</th>
                                             <th>Saree-Labour ID</th>
                                             <th>Date</th>
                                             <th>Quality</th>
                                             <th>Design</th>
                                             <th>Meter</th>
                                             <th>Rate</th>
                                            <th>Amount</th>
                                            <th>Labour</th>
                                            <th>Description</th>
                                            <th>#ID</th>
                                        </tr>
                               </thead>
                                    <tbody>
                                     <?php $i=0;
	  $i++;
									do { ?>                                
  <tr class="odd gradeX"> 
    <td width="7%"><?php echo $i++; ?></td>
     <td width="15%"><?php echo $rowSub['Sa_Labour_Id']; ?></td>
     <td width="10%"><?php echo $rowSub['S_Date']; ?></td>
    <td width="20%"><?php echo $rowSub['Quality_Name']; ?></td>
    <td width="12%"><?php echo $rowSub['Design']; ?></td>
    <td width="7%"><?php echo $rowSub['Saree_Meter']; ?></td>
    <td width="7%"><?php echo $rowSub['S_Rate']; ?></td>
    <td width="7%"><?php echo $rowSub['S_Amount']; ?></td>
   <td width="15%"><?php echo $rowSub['Name']; ?></td>
    <td width="30%"><?php echo $rowSub['Description']; ?></td>
    <td width="10%"><?php echo $rowSub['R_Id']; ?></td>
  </tr>
  <?php $SS_M = $SS_M + $rowSub['Saree_Meter'];
  $SS_A = $SS_A + $rowSub['S_Amount'];} while($rowSub=mysql_fetch_assoc($rsSub)); ?>
  <tr>
  <th colspan="11"><span style="float:right">Total Meter&nbsp;:&nbsp;<?php echo $SS_M;?>&nbsp;&nbsp;&nbsp;Total Amount&nbsp;:&nbsp;<?php echo $SS_A;?></span>
  </th>
  </tr>
                                    </tbody>
                              </table>
<?php
	}
	}
		elseif($reportrange && $Type=='Fixed' && $Labour)
	{
		if($totalRowsRsMain==0)
{
	echo "<center>There is no record</center>";
}
else
{
	?>
<div align="right">
<a href="totallabfixedprint?print&reportrange=<?php echo $reportrange; ?>&Type=<?php echo $Type;?>&Labour=<?php echo $Labour; ?>" target="_blank"><i class="icon-print"></i></a>
</div>
 <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                        <tr> 
                                             <th>Sr No.</th>
                                             <th>Salary-Fixed ID</th>
                                             <th>Date Range</th>
                                             <th>Labour</th>
                                             <th>Number Of Beam / Attendance / ...</th>
                                             <th>Rate</th>
                                            <th>Amount</th>
                                            <th>Upad Amount / Adjust Upad Amount</th>
                                            <th>Grand Total</th>
                                            <th>Remaining Amount</th>
                                            <th>Status</th>
                                            <th>Entry Date</th>
                                            <th>Entry #ID</th>
                                        </tr>
                                       </thead>
                                    <tbody>
                                    <?php $i=0;
	  $i++;
									do { ?>                                    
  <tr class="odd gradeX"> 
    <td width="7%"><?php echo $i++; ?></td>
     <td width="15%"><?php echo $rowMain['Sal_Fixed_Id']; ?></td>
    <td width="10%"><?php echo $rowMain['Date_Range']; ?></td>
    <td width="20%"><?php echo $rowMain['Name']; ?></td>
    <td width="7%"><?php echo $rowMain['No_Of']; ?></td>
    <td width="7%"><?php echo $rowMain['Rate']; ?></td>
    <td width="7%"><?php echo $rowMain['Amount']; ?></td>
    <td width="12%"><?php echo $rowMain['Upad_Amount']; ?></td>
    <td width="30%"><?php echo $rowMain['Grand_Total']; ?></td>
    <td width="10%"><?php echo $rowMain['Re_Amount']; ?></td>
    <td width="10%"><?php echo $rowMain['Status']; ?></td>
    <td width="10%"><?php echo $rowMain['Entry_Date']; ?></td>
    <td width="10%"><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
     <?php $TT_M = $TT_M + $rowMain['Grand_Total'];
									} while($rowMain=mysql_fetch_assoc($rsMain)); ?>
  <tr>
  <th colspan="13"><span style="float:right">&nbsp;&nbsp;&nbsp;Final Amount&nbsp;:&nbsp;<?php echo $TT_M;?></span>
  </th>
  </tr>
                                    </tbody>
                                </table>
<?php
	}
	}
	elseif($reportrange!="" && $Type=='Fixed')
	{
		if($totalRowsRsMain==0)
{
	echo "<center>There is no record</center>";
}
else
{
	?>
   <div align="right">
<a href="totallabfixedprint?print&reportrange=<?php echo $reportrange; ?>&Type=<?php echo $Type;?>" target="_blank"><i class="icon-print"></i></a>
</div>
 <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                        <tr> 
                                             <th>Sr No.</th>
                                             <th>Salary-Fixed ID</th>
                                             <th>Date Range</th>
                                             <th>Labour</th>
                                             <th>Number Of Beam / Attendance / ...</th>
                                             <th>Rate</th>
                                            <th>Amount</th>
                                            <th>Upad Amount / Adjust Upad Amount</th>
                                            <th>Grand Total</th>
                                            <th>Remaining Amount</th>
                                            <th>Status</th>
                                            <th>Entry Date</th>
                                            <th>Entry #ID</th>
                                        </tr>
                                       </thead>
                                    <tbody>
                                    <?php $i=0;
	  $i++;
									do { ?>                                    
  <tr class="odd gradeX"> 
    <td width="7%"><?php echo $i++; ?></td>
     <td width="15%"><?php echo $rowMain['Sal_Fixed_Id']; ?></td>
    <td width="10%"><?php echo $rowMain['Date_Range']; ?></td>
    <td width="20%"><?php echo $rowMain['Name']; ?></td>
    <td width="7%"><?php echo $rowMain['No_Of']; ?></td>
    <td width="7%"><?php echo $rowMain['Rate']; ?></td>
    <td width="7%"><?php echo $rowMain['Amount']; ?></td>
    <td width="12%"><?php echo $rowMain['Upad_Amount']; ?></td>
    <td width="30%"><?php echo $rowMain['Grand_Total']; ?></td>
    <td width="10%"><?php echo $rowMain['Re_Amount']; ?></td>
    <td width="10%"><?php echo $rowMain['Status']; ?></td>
    <td width="10%"><?php echo $rowMain['Entry_Date']; ?></td>
    <td width="10%"><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
     <?php $TT_M = $TT_M + $rowMain['Grand_Total'];
									} while($rowMain=mysql_fetch_assoc($rsMain)); ?>
  <tr>
  <th colspan="13"><span style="float:right">&nbsp;&nbsp;&nbsp;Final Amount&nbsp;:&nbsp;<?php echo $TT_M;?></span>
  </th>
  </tr>
                                    </tbody>
                                </table>
<?php
	}
	}
	elseif($reportrange)
	{
		echo "<center>You cannot search records, only by date range</center>";
	}
 } ?>
    
