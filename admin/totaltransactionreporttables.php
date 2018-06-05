<?php
include("databaseconnect.php");
error_reporting(0);
if(isset($_REQUEST['SearchTra']))
    {   
    $reportrange = $_REQUEST['reportrange'];
	$Payment_Type = $_REQUEST['Payment_TypeTra'];
	$Trans_Type = $_REQUEST['Trans_TypeTra'];
	$Status = $_REQUEST['Status']; 
	$splitdate = explode("-",$reportrange);
$date = $splitdate[0];
$date1 = $splitdate[1];
$dt = date('Y-m-d', strtotime($date));
$dt1 = date('Y-m-d', strtotime($date1)); 
if($reportrange=="")
	{
		echo '<script>alert("Please select date range first....");</script>';
	}
else if($Payment_Type=='Cash' && $reportrange == $_REQUEST['reportrange'])
{///////////////////////////////////////////////////////////////////////////////////////////////////////////
if($reportrange == $_REQUEST['reportrange'] && $Payment_Type == 'Cash' && $Trans_Type=='Beam' && $Status=='Paid')
{
	$query1="SELECT transactions_beam1.Trans_Id, transactions_beam1.Trans_Invoice_No, transactions_beam1.Trans_Date, transactions_beam1.Trans_Amt, transactions_beam1.Payment_Type, transactions_beam1.Bank_Id, transactions_beam1.Chq_No, transactions_beam1.Chq_Date, transactions_beam1.`Description`, transactions_beam1.Status, transactions_beam1.Entry_Date,transactions_beam1.Entry_Id FROM transactions_beam1 WHERE transactions_beam1.Payment_Type = 'Cash' AND transactions_beam1.Status = 'Paid' AND transactions_beam1.Trans_Date between '".$dt."' and '".$dt1."' order by transactions_beam1.Trans_Id asc";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
	
    if($totalRowsRsMain==0)
	{
		echo "<center>There is no record</center>";
	}
	else
	{
	?>
    <div align="right">
    <a href="totaltransactionreportprint?print&reportrange=<?php echo $reportrange; ?>&Payment_Type=Cash&Trans_Type=Beam&Status=Paid" target="_blank"><i class="icon-print"></i></a>
  </div>
                             <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                       
                                        <tr> 
                                             <th width="6%">Sr No.</th>
                                             <th width="8%">Trans. ID</th>
                                             <th width="8%">Inv. No</th>
                                            <th width="11%">Inv. Date</th>
                                            <th width="7%">Inv. Amount</th>
                                            <th width="7%">Payment Type</th>
                                            <th width="15%">Bank</th>
                                            <th width="7%">Cheque No.</th>
                                            <th width="10%">Cheque Date</th>
                                            <th width="5%">Status</th>
                                            <th width="35%">Entry Date</th>
                                            <th width="10%">Entry #ID</th>
                                        </tr>
                                      
                                       </thead>
                                    <tbody>
                                    
                                    <?php $i=0;
	  $i++;?>
      <?php do { ?>
                                       
                                      
  <tr class="odd gradeX"> 
    
    <td><?php echo $i++; ?></td>
     <td><?php echo $rowMain['Trans_Id']; ?></td>
    <td><?php echo $rowMain['Trans_Invoice_No']; ?></td>
    <td><?php echo $rowMain['Trans_Date']; ?></td>
    <td><?php echo $rowMain['Trans_Amt']; ?></td>
    <td><?php echo $rowMain['Payment_Type']; ?></td>
    <td><?php echo $rowMain['Bank_Id']; ?></td>
    <td><?php echo $rowMain['Chq_No']; ?></td>
    <td><?php echo $rowMain['Chq_Date']; ?></td>
    <td><?php echo $rowMain['Status']; ?></td>
    <td><?php echo $rowMain['Entry_Date']; ?></td>
    <td><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
    
  <?php 
  $Tran_Amt = $Tran_Amt + $rowMain['Trans_Amt'];
  } while ($rowMain = mysql_fetch_assoc($rsMain)); ?>
  <tr>
  <th colspan="12">
  <span style="float:right">Total Amount&nbsp;:&nbsp;<?php echo $Tran_Amt;?></span>
  </th>
  </tr>
  
                                    </tbody>
                                </table>
<?php 
}
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////
else if($reportrange == $_REQUEST['reportrange'] && $Payment_Type == 'Cash' && $Trans_Type=='Bobbin' && $Status=='Paid')
{
	$query1="SELECT transactions_bobbin.Trans_Id, transactions_bobbin.Trans_Invoice_No, transactions_bobbin.Trans_Date,transactions_bobbin.Trans_Amt, transactions_bobbin.Payment_Type, transactions_bobbin.Bank_Id, transactions_bobbin.Chq_No, transactions_bobbin.Chq_Date, transactions_bobbin.`Description`, transactions_bobbin.Status, transactions_bobbin.Entry_Date, transactions_bobbin.Entry_Id FROM transactions_bobbin WHERE transactions_bobbin.Payment_Type = 'Cash' AND transactions_bobbin.Status = 'Paid' AND transactions_bobbin.Trans_Date between '".$dt."' and '".$dt1."' order by transactions_bobbin.Trans_Id asc";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
	
    if($totalRowsRsMain==0)
	{
		echo "<center>There is no record</center>";
	}
	else
	{
	?>
    <div align="right">
    <a href="totaltransactionreportprint?print&reportrange=<?php echo $reportrange; ?>&Payment_Type=Cash&Trans_Type=Bobbin&Status=Paid" target="_blank"><i class="icon-print"></i></a>
  </div>
                             <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                       
                                        <tr> 
                                             <th width="6%">Sr No.</th>
                                             <th width="8%">Trans. ID</th>
                                            <th width="8%">Inv. No</th>
                                            <th width="11%">Inv. Date</th>
                                            <th width="7%">Inv. Amount</th>
                                            <th width="7%">Payment Type</th>
                                            <th width="15%">Bank</th>
                                            <th width="7%">Cheque No.</th>
                                            <th width="10%">Cheque Date</th>
                                            <th width="5%">Status</th>
                                            <th width="35%">Entry Date</th>
                                            <th width="10%">Entry #ID</th>
                                        </tr>
                                      
                                       </thead>
                                    <tbody>
                                    
                                    <?php $i=0;
	  $i++;?>
      <?php do { ?>
                                       
                                      
  <tr class="odd gradeX"> 
    
    <td><?php echo $i++; ?></td>
     <td><?php echo $rowMain['Trans_Id']; ?></td>
    <td><?php echo $rowMain['Trans_Invoice_No']; ?></td>
    <td><?php echo $rowMain['Trans_Date']; ?></td>
    <td><?php echo $rowMain['Trans_Amt']; ?></td>
    <td><?php echo $rowMain['Payment_Type']; ?></td>
    <td><?php echo $rowMain['Bank_Id']; ?></td>
    <td><?php echo $rowMain['Chq_No']; ?></td>
    <td><?php echo $rowMain['Chq_Date']; ?></td>
    <td><?php echo $rowMain['Status']; ?></td>
    <td><?php echo $rowMain['Entry_Date']; ?></td>
    <td><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
    
  <?php 
  $Tran_Amt = $Tran_Amt + $rowMain['Trans_Amt'];
  } while ($rowMain = mysql_fetch_assoc($rsMain)); ?>
  <tr>
  <th colspan="12">
  <span style="float:right">Total Amount&nbsp;:&nbsp;<?php echo $Tran_Amt;?></span>
  </th>
  </tr>
  
                                    </tbody>
                                </table>
<?php 
}
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
else if($Payment_Type=='Cash' && $reportrange == $_REQUEST['reportrange'] && $Trans_Type=='Taka' && $Status=='Received')
{
     $query1="SELECT transactions_taka.Trans_Id, transactions_taka.Trans_Invoice_No, transactions_taka.Trans_Date, transactions_taka.Trans_Amt, transactions_taka.Payment_Type, transactions_taka.Bank_Id, transactions_taka.Chq_No, transactions_taka.Chq_Date, transactions_taka.`Description`, transactions_taka.Status, transactions_taka.Entry_Date, transactions_taka.Entry_Id FROM transactions_taka WHERE transactions_taka.Payment_Type = 'Cash' AND transactions_taka.Status = 'Received' AND transactions_taka.Trans_Date between '".$dt."' and '".$dt1."' order by transactions_taka.Trans_Id asc";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
	
    if($totalRowsRsMain==0)
	{
		echo "<center>There is no record</center>";
	}
	else
	{
	?>
    <div align="right">

    <a href="totaltransactionreportprint?print&reportrange=<?php echo $reportrange; ?>&Payment_Type=Cash&Trans_Type=Taka&Status=Received" target="_blank"><i class="icon-print"></i></a>
  </div>
                             <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                       
                                        <tr> 
                                             <th width="6%">Sr No.</th>
                                             <th width="8%">Trans. ID</th>
                                             <th width="8%">Inv. No</th>
                                            <th width="10%">Inv. Date</th>
                                            <th width="10%">Inv. Amount</th>
                                            <th width="10%">Payment Type</th>
                                            <th width="7%">Bank</th>
                                            <th width="7%">Cheque No.</th>
                                            <th width="7%">Cheque Date</th>
                                            <th width="5%">Status</th>
                                            <th width="10%">Entry Date</th>
                                            <th width="10%">Entry #ID</th>
                                        </tr>
                                      
                                       </thead>
                                    <tbody>
                                    
                                    <?php $i=0;
	  $i++;?>
      <?php do { ?>
                                       
                                      
  <tr class="odd gradeX"> 
    
    <td><?php echo $i++; ?></td>
     <td><?php echo $rowMain['Trans_Id']; ?></td>
   <td><?php echo $rowMain['Trans_Invoice_No']; ?></td>
    <td><?php echo $rowMain['Trans_Date']; ?></td>
    <td><?php echo $rowMain['Trans_Amt']; ?></td>
    <td><?php echo $rowMain['Payment_Type']; ?></td>
    <td><?php echo $rowMain['Bank_Id']; ?></td>
    <td><?php echo $rowMain['Chq_No']; ?></td>
    <td><?php echo $rowMain['Chq_Date']; ?></td>
    <td><?php echo $rowMain['Status']; ?></td>
    <td><?php echo $rowMain['Entry_Date']; ?></td>
    <td><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
    
  <?php 
  $Tran_Amt = $Tran_Amt + $rowMain['Trans_Amt'];
  } while ($rowMain = mysql_fetch_assoc($rsMain)); ?>
  <tr>
  <th colspan="12">
  <span style="float:right">Total Amount&nbsp;:&nbsp;<?php echo $Tran_Amt;?></span>
  </th>
  </tr>
  
                                    </tbody>
                                </table>
<?php 
	}
	}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
else if($Payment_Type=='Cash' && $reportrange == $_REQUEST['reportrange'] && $Trans_Type=='Saree' && $Status=='Received')
{
     $query1="SELECT transactions_saree.Trans_Id, transactions_saree.Trans_Invoice_No, transactions_saree.Trans_Date, transactions_saree.Trans_Amt, transactions_saree.Payment_Type, transactions_saree.Bank_Id, transactions_saree.Chq_No, transactions_saree.Chq_Date, transactions_saree.`Description`, transactions_saree.Status, transactions_saree.Entry_Date,transactions_saree.Entry_Id FROM transactions_saree WHERE transactions_saree.Payment_Type = 'Cash' AND transactions_saree.Status = 'Received' AND transactions_saree.Trans_Date between '".$dt."' and '".$dt1."' order by transactions_saree.Trans_Id asc";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
	
    if($totalRowsRsMain==0)
	{
		echo "<center>There is no record</center>";
	}
	else
	{
	?>
    <div align="right">
    <a href="totaltransactionreportprint?print&reportrange=<?php echo $reportrange; ?>&Payment_Type=Cash&Trans_Type=Saree&Status=Received" target="_blank"><i class="icon-print"></i></a>
  </div>
                             <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                       
                                        <tr> 
                                             <th width="6%">Sr No.</th>
                                             <th width="8%">Trans. ID</th>
                                            <th width="8%">Inv. No</th>
                                            <th width="10%">Inv. Date</th>
                                            <th width="10%">Inv. Amount</th>
                                            <th width="10%">Payment Type</th>
                                            <th width="7%">Bank</th>
                                            <th width="7%">Cheque No.</th>
                                            <th width="7%">Cheque Date</th>
                                            <th width="5%">Status</th>
                                            <th width="10%">Entry Date</th>
                                            <th width="10%">Entry #ID</th>
                                        </tr>
                                      
                                       </thead>
                                    <tbody>
                                    
                                    <?php $i=0;
	  $i++;?>
      <?php do { ?>
                                       
                                      
  <tr class="odd gradeX"> 
    
    <td><?php echo $i++; ?></td>
     <td><?php echo $rowMain['Trans_Id']; ?></td>
    <td><?php echo $rowMain['Trans_Invoice_No']; ?></td>
    <td><?php echo $rowMain['Trans_Date']; ?></td>
    <td><?php echo $rowMain['Trans_Amt']; ?></td>
    <td><?php echo $rowMain['Payment_Type']; ?></td>
    <td><?php echo $rowMain['Bank_Id']; ?></td>
    <td><?php echo $rowMain['Chq_No']; ?></td>
    <td><?php echo $rowMain['Chq_Date']; ?></td>
    <td><?php echo $rowMain['Status']; ?></td>
    <td><?php echo $rowMain['Entry_Date']; ?></td>
    <td><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
    
  <?php 
  $Tran_Amt = $Tran_Amt + $rowMain['Trans_Amt'];
  } while ($rowMain = mysql_fetch_assoc($rsMain)); ?>
  <tr>
  <th colspan="12">
  <span style="float:right">Total Amount&nbsp;:&nbsp;<?php echo $Tran_Amt;?></span>
  </th>
  </tr>
  
                                    </tbody>
                                </table>
<?php 
	}
	}
///////////////////////////////////////////////////////////////////////////////////////////////////////////
elseif($reportrange == $_REQUEST['reportrange'] && $Payment_Type == 'Cash' && $Trans_Type=='Beam' && $Status=='Un-Paid')
{
	$query1="SELECT transactions_beam1.Trans_Id, transactions_beam1.Trans_Invoice_No, transactions_beam1.Trans_Date, transactions_beam1.Trans_Amt, transactions_beam1.Payment_Type, transactions_beam1.Bank_Id, transactions_beam1.Chq_No, transactions_beam1.Chq_Date, transactions_beam1.`Description`, transactions_beam1.Status, transactions_beam1.Entry_Date,transactions_beam1.Entry_Id FROM transactions_beam1 WHERE transactions_beam1.Payment_Type = 'Cash' AND transactions_beam1.Status = 'Un-Paid' AND transactions_beam1.Trans_Date between '".$dt."' and '".$dt1."' order by transactions_beam1.Trans_Id asc";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
	
    if($totalRowsRsMain==0)
	{
		echo "<center>There is no record</center>";
	}
	else
	{
	?>
    <div align="right">
    <a href="totaltransactionreportprint?print&reportrange=<?php echo $reportrange; ?>&Payment_Type=Cash&Trans_Type=Beam&Status=Un-Paid" target="_blank"><i class="icon-print"></i></a>
  </div>
                             <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                       
                                        <tr> 
                                             <th width="6%">Sr No.</th>
                                             <th width="8%">Trans. ID</th>
                                             <th width="8%">Inv. No</th>
                                            <th width="11%">Inv. Date</th>
                                            <th width="7%">Inv. Amount</th>
                                            <th width="7%">Payment Type</th>
                                            <th width="15%">Bank</th>
                                            <th width="7%">Cheque No.</th>
                                            <th width="10%">Cheque Date</th>
                                            <th width="5%">Status</th>
                                            <th width="35%">Entry Date</th>
                                            <th width="10%">Entry #ID</th>
                                        </tr>
                                      
                                       </thead>
                                    <tbody>
                                    
                                    <?php $i=0;
	  $i++;?>
      <?php do { ?>
                                       
                                      
  <tr class="odd gradeX"> 
    
    <td><?php echo $i++; ?></td>
     <td><?php echo $rowMain['Trans_Id']; ?></td>
    <td><?php echo $rowMain['Trans_Invoice_No']; ?></td>
    <td><?php echo $rowMain['Trans_Date']; ?></td>
    <td><?php echo $rowMain['Trans_Amt']; ?></td>
    <td><?php echo $rowMain['Payment_Type']; ?></td>
    <td><?php echo $rowMain['Bank_Id']; ?></td>
    <td><?php echo $rowMain['Chq_No']; ?></td>
    <td><?php echo $rowMain['Chq_Date']; ?></td>
    <td><?php echo $rowMain['Status']; ?></td>
    <td><?php echo $rowMain['Entry_Date']; ?></td>
     <td><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
    
  <?php 
  $Tran_Amt = $Tran_Amt + $rowMain['Trans_Amt'];
  } while ($rowMain = mysql_fetch_assoc($rsMain)); ?>
  <tr>
  <th colspan="12">
  <span style="float:right">Total Amount&nbsp;:&nbsp;<?php echo $Tran_Amt;?></span>
  </th>
  </tr>
  
                                    </tbody>
                                </table>
<?php 
}
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////
else if($reportrange == $_REQUEST['reportrange'] && $Payment_Type == 'Cash' && $Trans_Type=='Bobbin' && $Status=='Un-Paid')
{
	$query1="SELECT transactions_bobbin.Trans_Id, transactions_bobbin.Trans_Invoice_No, transactions_bobbin.Trans_Date,transactions_bobbin.Trans_Amt, transactions_bobbin.Payment_Type, transactions_bobbin.Bank_Id, transactions_bobbin.Chq_No, transactions_bobbin.Chq_Date, transactions_bobbin.`Description`, transactions_bobbin.Status, transactions_bobbin.Entry_Date, transactions_bobbin.Entry_Id FROM transactions_bobbin WHERE transactions_bobbin.Payment_Type = 'Cash' AND transactions_bobbin.Status = 'Un-Paid' AND transactions_bobbin.Trans_Date between '".$dt."' and '".$dt1."' order by transactions_bobbin.Trans_Id asc";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
	
    if($totalRowsRsMain==0)
	{
		echo "<center>There is no record</center>";
	}
	else
	{
	?>
    <div align="right">
    <a href="totaltransactionreportprint?print&reportrange=<?php echo $reportrange; ?>&Payment_Type=Cash&Trans_Type=Bobbin&Status=Un-Paid" target="_blank"><i class="icon-print"></i></a>
  </div>
                             <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                       
                                        <tr> 
                                             <th width="6%">Sr No.</th>
                                             <th width="8%">Trans. ID</th>
                                            <th width="8%">Inv. No</th>
                                            <th width="11%">Inv. Date</th>
                                            <th width="7%">Inv. Amount</th>
                                            <th width="7%">Payment Type</th>
                                            <th width="15%">Bank</th>
                                            <th width="7%">Cheque No.</th>
                                            <th width="10%">Cheque Date</th>
                                            <th width="5%">Status</th>
                                            <th width="35%">Entry Date</th>
                                            <th width="10%">Entry #ID</th>
                                        </tr>
                                      
                                       </thead>
                                    <tbody>
                                    
                                    <?php $i=0;
	  $i++;?>
      <?php do { ?>
                                       
                                      
  <tr class="odd gradeX"> 
    
    <td><?php echo $i++; ?></td>
     <td><?php echo $rowMain['Trans_Id']; ?></td>
    <td><?php echo $rowMain['Trans_Invoice_No']; ?></td>
    <td><?php echo $rowMain['Trans_Date']; ?></td>
    <td><?php echo $rowMain['Trans_Amt']; ?></td>
    <td><?php echo $rowMain['Payment_Type']; ?></td>
    <td><?php echo $rowMain['Bank_Id']; ?></td>
    <td><?php echo $rowMain['Chq_No']; ?></td>
    <td><?php echo $rowMain['Chq_Date']; ?></td>
    <td><?php echo $rowMain['Status']; ?></td>
    <td><?php echo $rowMain['Entry_Date']; ?></td>
     <td><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
    
  <?php 
  $Tran_Amt = $Tran_Amt + $rowMain['Trans_Amt'];
  } while ($rowMain = mysql_fetch_assoc($rsMain)); ?>
  <tr>
  <th colspan="12">
  <span style="float:right">Total Amount&nbsp;:&nbsp;<?php echo $Tran_Amt;?></span>
  </th>
  </tr>
  
                                    </tbody>
                                </table>
<?php 
}
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
else if($Payment_Type=='Cash' && $reportrange == $_REQUEST['reportrange'] && $Trans_Type=='Taka' && $Status=='Not-Received')
{
     $query1="SELECT transactions_taka.Trans_Id, transactions_taka.Trans_Invoice_No, transactions_taka.Trans_Date, transactions_taka.Trans_Amt, transactions_taka.Payment_Type, transactions_taka.Bank_Id, transactions_taka.Chq_No, transactions_taka.Chq_Date, transactions_taka.`Description`, transactions_taka.Status, transactions_taka.Entry_Date FROM transactions_taka WHERE transactions_taka.Payment_Type = 'Cash' AND transactions_taka.Status = 'Not-Received' AND transactions_taka.Trans_Date between '".$dt."' and '".$dt1."' order by transactions_taka.Trans_Id asc";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
	
    if($totalRowsRsMain==0)
	{
		echo "<center>There is no record</center>";
	}
	else
	{
	?>
    <div align="right">

    <a href="totaltransactionreportprint?print&reportrange=<?php echo $reportrange; ?>&Payment_Type=Cash&Trans_Type=Taka&Status=Not-Received" target="_blank"><i class="icon-print"></i></a>
  </div>
                             <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                       
                                        <tr> 
                                             <th width="6%">Sr No.</th>
                                             <th width="8%">Trans. ID</th>
                                             <th width="8%">Inv. No</th>
                                            <th width="10%">Inv. Date</th>
                                            <th width="10%">Inv. Amount</th>
                                            <th width="10%">Payment Type</th>
                                            <th width="7%">Bank</th>
                                            <th width="7%">Cheque No.</th>
                                            <th width="7%">Cheque Date</th>
                                            <th width="5%">Status</th>
                                            <th width="10%">Entry Date</th>
                                            <th width="10%">Entry #ID</th>
                                        </tr>
                                      
                                       </thead>
                                    <tbody>
                                    
                                    <?php $i=0;
	  $i++;?>
      <?php do { ?>
                                       
                                      
  <tr class="odd gradeX"> 
    
    <td><?php echo $i++; ?></td>
     <td><?php echo $rowMain['Trans_Id']; ?></td>
   <td><?php echo $rowMain['Trans_Invoice_No']; ?></td>
    <td><?php echo $rowMain['Trans_Date']; ?></td>
    <td><?php echo $rowMain['Trans_Amt']; ?></td>
    <td><?php echo $rowMain['Payment_Type']; ?></td>
    <td><?php echo $rowMain['Bank_Id']; ?></td>
    <td><?php echo $rowMain['Chq_No']; ?></td>
    <td><?php echo $rowMain['Chq_Date']; ?></td>
    <td><?php echo $rowMain['Status']; ?></td>
    <td><?php echo $rowMain['Entry_Date']; ?></td>
    <td><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
    
  <?php 
  $Tran_Amt = $Tran_Amt + $rowMain['Trans_Amt'];
  } while ($rowMain = mysql_fetch_assoc($rsMain)); ?>
  <tr>
  <th colspan="12">
  <span style="float:right">Total Amount&nbsp;:&nbsp;<?php echo $Tran_Amt;?></span>
  </th>
  </tr>
  
                                    </tbody>
                                </table>
<?php 
	}
	}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
else if($Payment_Type=='Cash' && $reportrange == $_REQUEST['reportrange'] && $Trans_Type=='Saree' && $Status=='Not-Received')
{
     $query1="SELECT transactions_saree.Trans_Id, transactions_saree.Trans_Invoice_No, transactions_saree.Trans_Date, transactions_saree.Trans_Amt, transactions_saree.Payment_Type, transactions_saree.Bank_Id, transactions_saree.Chq_No, transactions_saree.Chq_Date, transactions_saree.`Description`, transactions_saree.Status, transactions_saree.Entry_Date,transactions_saree.Entry_Id FROM transactions_saree WHERE transactions_saree.Payment_Type = 'Cash' AND transactions_saree.Status = 'Not-Received' AND transactions_saree.Trans_Date between '".$dt."' and '".$dt1."' order by transactions_saree.Trans_Id asc";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
	
    if($totalRowsRsMain==0)
	{
		echo "<center>There is no record</center>";
	}
	else
	{
	?>
    <div align="right">
    <a href="totaltransactionreportprint?print&reportrange=<?php echo $reportrange; ?>&Payment_Type=Cash&Trans_Type=Saree&Status=Not-Received" target="_blank"><i class="icon-print"></i></a>
  </div>
                             <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                       
                                        <tr> 
                                             <th width="6%">Sr No.</th>
                                             <th width="8%">Trans. ID</th>
                                            <th width="8%">Inv. No</th>
                                            <th width="10%">Inv. Date</th>
                                            <th width="10%">Inv. Amount</th>
                                            <th width="10%">Payment Type</th>
                                            <th width="7%">Bank</th>
                                            <th width="7%">Cheque No.</th>
                                            <th width="7%">Cheque Date</th>
                                            <th width="5%">Status</th>
                                            <th width="10%">Entry Date</th>
                                            <th width="10%">Entry #ID</th>
                                        </tr>
                                      
                                       </thead>
                                    <tbody>
                                    
                                    <?php $i=0;
	  $i++;?>
      <?php do { ?>
                                       
                                      
  <tr class="odd gradeX"> 
    
    <td><?php echo $i++; ?></td>
     <td><?php echo $rowMain['Trans_Id']; ?></td>
    <td><?php echo $rowMain['Trans_Invoice_No']; ?></td>
    <td><?php echo $rowMain['Trans_Date']; ?></td>
    <td><?php echo $rowMain['Trans_Amt']; ?></td>
    <td><?php echo $rowMain['Payment_Type']; ?></td>
    <td><?php echo $rowMain['Bank_Id']; ?></td>
    <td><?php echo $rowMain['Chq_No']; ?></td>
    <td><?php echo $rowMain['Chq_Date']; ?></td>
    <td><?php echo $rowMain['Status']; ?></td>
    <td><?php echo $rowMain['Entry_Date']; ?></td>
     <td><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
    
  <?php 
  $Tran_Amt = $Tran_Amt + $rowMain['Trans_Amt'];
  } while ($rowMain = mysql_fetch_assoc($rsMain)); ?>
  <tr>
  <th colspan="12">
  <span style="float:right">Total Amount&nbsp;:&nbsp;<?php echo $Tran_Amt;?></span>
  </th>
  </tr>
  
                                    </tbody>
                                </table>
<?php 
	}
	}
///////////////////////////////////////////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////////////////////////////////////////////////////
else if($reportrange == $_REQUEST['reportrange'] && $Payment_Type == 'Cash' && $Trans_Type=='Beam')
{
	$query1="SELECT transactions_beam1.Trans_Id, transactions_beam1.Trans_Invoice_No, transactions_beam1.Trans_Date, transactions_beam1.Trans_Amt, transactions_beam1.Payment_Type, transactions_beam1.Bank_Id, transactions_beam1.Chq_No, transactions_beam1.Chq_Date, transactions_beam1.`Description`, transactions_beam1.Status, transactions_beam1.Entry_Date,transactions_beam1.Entry_Id FROM transactions_beam1 WHERE transactions_beam1.Payment_Type = 'Cash' AND transactions_beam1.Trans_Date between '".$dt."' and '".$dt1."' order by transactions_beam1.Trans_Id asc";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
	
    if($totalRowsRsMain==0)
	{
		echo "<center>There is no record</center>";
	}
	else
	{
	?>
    <div align="right">
    <a href="totaltransactionreportprint?print&reportrange=<?php echo $reportrange; ?>&Payment_Type=Cash&Trans_Type=Beam" target="_blank"><i class="icon-print"></i></a>
  </div>
                             <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                       
                                        <tr> 
                                             <th width="6%">Sr No.</th>
                                             <th width="8%">Trans. ID</th>
                                             <th width="8%">Inv. No</th>
                                            <th width="11%">Inv. Date</th>
                                            <th width="7%">Inv. Amount</th>
                                            <th width="7%">Payment Type</th>
                                            <th width="15%">Bank</th>
                                            <th width="7%">Cheque No.</th>
                                            <th width="10%">Cheque Date</th>
                                            <th width="5%">Status</th>
                                            <th width="35%">Entry Date</th>
                                            <th width="10%">Entry #ID</th>
                                        </tr>
                                      
                                       </thead>
                                    <tbody>
                                    
                                    <?php $i=0;
	  $i++;?>
      <?php do { ?>
                                       
                                      
  <tr class="odd gradeX"> 
    
    <td><?php echo $i++; ?></td>
     <td><?php echo $rowMain['Trans_Id']; ?></td>
    <td><?php echo $rowMain['Trans_Invoice_No']; ?></td>
    <td><?php echo $rowMain['Trans_Date']; ?></td>
    <td><?php echo $rowMain['Trans_Amt']; ?></td>
    <td><?php echo $rowMain['Payment_Type']; ?></td>
    <td><?php echo $rowMain['Bank_Id']; ?></td>
    <td><?php echo $rowMain['Chq_No']; ?></td>
    <td><?php echo $rowMain['Chq_Date']; ?></td>
    <td><?php echo $rowMain['Status']; ?></td>
    <td><?php echo $rowMain['Entry_Date']; ?></td>
    <td><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
    
  <?php 
  $Tran_Amt = $Tran_Amt + $rowMain['Trans_Amt'];
  } while ($rowMain = mysql_fetch_assoc($rsMain)); ?>
  <tr>
  <th colspan="12">
  <span style="float:right">Total Amount&nbsp;:&nbsp;<?php echo $Tran_Amt;?></span>
  </th>
  </tr>
  
                                    </tbody>
                                </table>
<?php 
}
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////
else if($reportrange == $_REQUEST['reportrange'] && $Payment_Type == 'Cash' && $Trans_Type=='Bobbin')
{
	$query1="SELECT transactions_bobbin.Trans_Id, transactions_bobbin.Trans_Invoice_No, transactions_bobbin.Trans_Date,transactions_bobbin.Trans_Amt, transactions_bobbin.Payment_Type, transactions_bobbin.Bank_Id, transactions_bobbin.Chq_No, transactions_bobbin.Chq_Date, transactions_bobbin.`Description`, transactions_bobbin.Status, transactions_bobbin.Entry_Date, transactions_bobbin.Entry_Id FROM transactions_bobbin WHERE transactions_bobbin.Payment_Type = 'Cash' AND transactions_bobbin.Trans_Date between '".$dt."' and '".$dt1."' order by transactions_bobbin.Trans_Id asc";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
	
    if($totalRowsRsMain==0)
	{
		echo "<center>There is no record</center>";
	}
	else
	{
	?>
    <div align="right">
    <a href="totaltransactionreportprint?print&reportrange=<?php echo $reportrange; ?>&Payment_Type=Cash&Trans_Type=Bobbin" target="_blank"><i class="icon-print"></i></a>
  </div>
                             <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                       
                                        <tr> 
                                             <th width="6%">Sr No.</th>
                                             <th width="8%">Trans. ID</th>
                                            <th width="8%">Inv. ID</th>
                                            <th width="11%">Inv. Date</th>
                                            <th width="7%">Inv. Amount</th>
                                            <th width="7%">Payment Type</th>
                                            <th width="15%">Bank</th>
                                            <th width="7%">Cheque No.</th>
                                            <th width="10%">Cheque Date</th>
                                            <th width="5%">Status</th>
                                            <th width="35%">Entry Date</th>
                                            <th width="10%">Entry #ID</th>
                                        </tr>
                                      
                                       </thead>
                                    <tbody>
                                    
                                    <?php $i=0;
	  $i++;?>
      <?php do { ?>
                                       
                                      
  <tr class="odd gradeX"> 
    
    <td><?php echo $i++; ?></td>
     <td><?php echo $rowMain['Trans_Id']; ?></td>
    <td><?php echo $rowMain['Trans_Invoice_No']; ?></td>
    <td><?php echo $rowMain['Trans_Date']; ?></td>
    <td><?php echo $rowMain['Trans_Amt']; ?></td>
    <td><?php echo $rowMain['Payment_Type']; ?></td>
    <td><?php echo $rowMain['Bank_Id']; ?></td>
    <td><?php echo $rowMain['Chq_No']; ?></td>
    <td><?php echo $rowMain['Chq_Date']; ?></td>
    <td><?php echo $rowMain['Status']; ?></td>
    <td><?php echo $rowMain['Entry_Date']; ?></td>
    <td><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
    
  <?php 
  $Tran_Amt = $Tran_Amt + $rowMain['Trans_Amt'];
  } while ($rowMain = mysql_fetch_assoc($rsMain)); ?>
  <tr>
  <th colspan="12">
  <span style="float:right">Total Amount&nbsp;:&nbsp;<?php echo $Tran_Amt;?></span>
  </th>
  </tr>
  
                                    </tbody>
                                </table>
<?php 
}
}
else if($Payment_Type=='Cash' && $reportrange == $_REQUEST['reportrange'] && $Trans_Type=='Taka')
{
     $query1="SELECT transactions_taka.Trans_Id, transactions_taka.Trans_Invoice_No, transactions_taka.Trans_Date, transactions_taka.Trans_Amt, transactions_taka.Payment_Type, transactions_taka.Bank_Id, transactions_taka.Chq_No, transactions_taka.Chq_Date, transactions_taka.`Description`, transactions_taka.Status, transactions_taka.Entry_Date, transactions_taka.Entry_Id FROM transactions_taka WHERE transactions_taka.Payment_Type = 'Cash' AND transactions_taka.Trans_Date between '".$dt."' and '".$dt1."' order by transactions_taka.Trans_Id asc";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
	
    if($totalRowsRsMain==0)
	{
		echo "<center>There is no record</center>";
	}
	else
	{
	?>
    <div align="right">
    <a href="totaltransactionreportprint?print&reportrange=<?php echo $reportrange; ?>&Payment_Type=Cash&Trans_Type=Taka" target="_blank"><i class="icon-print"></i></a>
  </div>
                             <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                       
                                        <tr> 
                                             <th width="6%">Sr No.</th>
                                             <th width="8%">Trans. ID</th>
                                             <th width="8%">Inv. ID</th>
                                            <th width="10%">Inv. Date</th>
                                            <th width="10%">Inv. Amount</th>
                                            <th width="10%">Payment Type</th>
                                            <th width="7%">Bank</th>
                                            <th width="7%">Cheque No.</th>
                                            <th width="7%">Cheque Date</th>
                                            <th width="5%">Status</th>
                                            <th width="10%">Entry Date</th>
                                            <th width="10%">Entry #ID</th>
                                        </tr>
                                      
                                       </thead>
                                    <tbody>
                                    
                                    <?php $i=0;
	  $i++;?>
      <?php do { ?>
                                       
                                      
  <tr class="odd gradeX"> 
    
    <td><?php echo $i++; ?></td>
     <td><?php echo $rowMain['Trans_Id']; ?></td>
   <td><?php echo $rowMain['Trans_Invoice_No']; ?></td>
    <td><?php echo $rowMain['Trans_Date']; ?></td>
    <td><?php echo $rowMain['Trans_Amt']; ?></td>
    <td><?php echo $rowMain['Payment_Type']; ?></td>
    <td><?php echo $rowMain['Bank_Id']; ?></td>
    <td><?php echo $rowMain['Chq_No']; ?></td>
    <td><?php echo $rowMain['Chq_Date']; ?></td>
    <td><?php echo $rowMain['Status']; ?></td>
    <td><?php echo $rowMain['Entry_Date']; ?></td>
    <td><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
    
  <?php 
  $Tran_Amt = $Tran_Amt + $rowMain['Trans_Amt'];
  } while ($rowMain = mysql_fetch_assoc($rsMain)); ?>
  <tr>
  <th colspan="12">
  <span style="float:right">Total Amount&nbsp;:&nbsp;<?php echo $Tran_Amt;?></span>
  </th>
  </tr>
  
                                    </tbody>
                                </table>
<?php 
	}
	}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
else if($Payment_Type=='Cash' && $reportrange == $_REQUEST['reportrange'] && $Trans_Type=='Saree')
{
     $query1="SELECT transactions_saree.Trans_Id, transactions_saree.Trans_Invoice_No, transactions_saree.Trans_Date, transactions_saree.Trans_Amt, transactions_saree.Payment_Type, transactions_saree.Bank_Id, transactions_saree.Chq_No, transactions_saree.Chq_Date, transactions_saree.`Description`, transactions_saree.Status, transactions_saree.Entry_Date,transactions_saree.Entry_Id FROM transactions_saree WHERE transactions_saree.Payment_Type = 'Cash' AND transactions_saree.Trans_Date between '".$dt."' and '".$dt1."' order by transactions_saree.Trans_Id asc";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
	
    if($totalRowsRsMain==0)
	{
		echo "<center>There is no record</center>";
	}
	else
	{
	?>
    <div align="right">
    <a href="totaltransactionreportprint?print&reportrange=<?php echo $reportrange; ?>&Payment_Type=Cash&Trans_Type=Saree" target="_blank"><i class="icon-print"></i></a>
  </div>
                             <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                       
                                        <tr> 
                                             <th width="6%">Sr No.</th>
                                             <th width="8%">Trans. ID</th>
                                            <th width="8%">Inv. ID</th>
                                            <th width="10%">Inv. Date</th>
                                            <th width="10%">Inv. Amount</th>
                                            <th width="10%">Payment Type</th>
                                            <th width="7%">Bank</th>
                                            <th width="7%">Cheque No.</th>
                                            <th width="7%">Cheque Date</th>
                                            <th width="5%">Status</th>
                                            <th width="10%">Entry Date</th>
                                            <th width="10%">Entry #ID</th>
                                        </tr>
                                      
                                       </thead>
                                    <tbody>
                                    
                                    <?php $i=0;
	  $i++;?>
      <?php do { ?>
                                       
                                      
  <tr class="odd gradeX"> 
    
    <td><?php echo $i++; ?></td>
     <td><?php echo $rowMain['Trans_Id']; ?></td>
    <td><?php echo $rowMain['Trans_Invoice_No']; ?></td>
    <td><?php echo $rowMain['Trans_Date']; ?></td>
    <td><?php echo $rowMain['Trans_Amt']; ?></td>
    <td><?php echo $rowMain['Payment_Type']; ?></td>
    <td><?php echo $rowMain['Bank_Id']; ?></td>
    <td><?php echo $rowMain['Chq_No']; ?></td>
    <td><?php echo $rowMain['Chq_Date']; ?></td>
    <td><?php echo $rowMain['Status']; ?></td>
    <td><?php echo $rowMain['Entry_Date']; ?></td>
     <td><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
    
 <?php 
  $Tran_Amt = $Tran_Amt + $rowMain['Trans_Amt'];
  } while ($rowMain = mysql_fetch_assoc($rsMain)); ?>
  <tr>
  <th colspan="12">
  <span style="float:right">Total Amount&nbsp;:&nbsp;<?php echo $Tran_Amt;?></span>
  </th>
  </tr>
  
                                    </tbody>
                                </table>
<?php 
	}
	}
else
{
	echo "<center>Please select beam / bobbin / taka /saree with date range and cheque / cash</center>";
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////

}

///////////////////////////////////////////////////////////////////////////////////////////////////////////
else if($Payment_Type=='Cheque' && $reportrange == $_REQUEST['reportrange'])
{
	if($reportrange == $_REQUEST['reportrange'] && $Payment_Type == 'Cheque' && $Trans_Type=='Beam' && $Status=='Paid')
{
	$query1="SELECT transactions_beam1.Trans_Id, transactions_beam1.Trans_Invoice_No, transactions_beam1.Trans_Date, transactions_beam1.Trans_Amt, transactions_beam1.Payment_Type, transactions_beam1.Bank_Id, transactions_beam1.Chq_No, transactions_beam1.Chq_Date, transactions_beam1.`Description`, transactions_beam1.Status, transactions_beam1.Entry_Date,transactions_beam1.Entry_Id FROM transactions_beam1 WHERE transactions_beam1.Payment_Type = 'Cheque' AND transactions_beam1.Status = 'Paid' AND transactions_beam1.Trans_Date between '".$dt."' and '".$dt1."' order by transactions_beam1.Trans_Id asc";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
	
    if($totalRowsRsMain==0)
	{
		echo "<center>There is no record</center>";
	}
	else
	{
	?>
    <div align="right">
    <a href="totaltransactionreportprint?print&reportrange=<?php echo $reportrange; ?>&Payment_Type=Cheque&Trans_Type=Beam&Status=Paid" target="_blank"><i class="icon-print"></i></a>
  </div>
                             <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                       
                                        <tr> 
                                             <th width="6%">Sr No.</th>
                                             <th width="8%">Trans. ID</th>
                                             <th width="8%">Inv. ID</th>
                                            <th width="11%">Inv. Date</th>
                                            <th width="7%">Inv. Amount</th>
                                            <th width="7%">Payment Type</th>
                                            <th width="15%">Bank</th>
                                            <th width="7%">Cheque No.</th>
                                            <th width="10%">Cheque Date</th>
                                            <th width="5%">Status</th>
                                            <th width="35%">Entry Date</th>
                                            <th width="10%">Entry #ID</th>
                                        </tr>
                                      
                                       </thead>
                                    <tbody>
                                    
                                    <?php $i=0;
	  $i++;?>
      <?php do { ?>
                                       
                                      
  <tr class="odd gradeX"> 
    
    <td><?php echo $i++; ?></td>
     <td><?php echo $rowMain['Trans_Id']; ?></td>
    <td><?php echo $rowMain['Trans_Invoice_No']; ?></td>
    <td><?php echo $rowMain['Trans_Date']; ?></td>
    <td><?php echo $rowMain['Trans_Amt']; ?></td>
    <td><?php echo $rowMain['Payment_Type']; ?></td>
    <td><?php echo $rowMain['Bank_Id']; ?></td>
    <td><?php echo $rowMain['Chq_No']; ?></td>
    <td><?php echo $rowMain['Chq_Date']; ?></td>
    <td><?php echo $rowMain['Status']; ?></td>
    <td><?php echo $rowMain['Entry_Date']; ?></td>
    <td><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
    
  <?php 
  $Tran_Amt = $Tran_Amt + $rowMain['Trans_Amt'];
  } while ($rowMain = mysql_fetch_assoc($rsMain)); ?>
  <tr>
  <th colspan="12">
  <span style="float:right">Total Amount&nbsp;:&nbsp;<?php echo $Tran_Amt;?></span>
  </th>
  </tr>
  
                                    </tbody>
                                </table>
<?php 
}
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////
else if($reportrange == $_REQUEST['reportrange'] && $Payment_Type == 'Cheque' && $Trans_Type=='Bobbin' && $Status=='Paid')
{
	$query1="SELECT transactions_bobbin.Trans_Id, transactions_bobbin.Trans_Invoice_No, transactions_bobbin.Trans_Date,transactions_bobbin.Trans_Amt, transactions_bobbin.Payment_Type, transactions_bobbin.Bank_Id, transactions_bobbin.Chq_No, transactions_bobbin.Chq_Date, transactions_bobbin.`Description`, transactions_bobbin.Status, transactions_bobbin.Entry_Date,transactions_bobbin.Entry_Id FROM transactions_bobbin WHERE transactions_bobbin.Payment_Type = 'Cheque' AND transactions_bobbin.Status = 'Paid' AND transactions_bobbin.Trans_Date between '".$dt."' and '".$dt1."' order by transactions_bobbin.Trans_Id asc";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
	
    if($totalRowsRsMain==0)
	{
		echo "<center>There is no record</center>";
	}
	else
	{
	?>
    <div align="right">
    <a href="totaltransactionreportprint?print&reportrange=<?php echo $reportrange; ?>&Payment_Type=Cheque&Trans_Type=Bobbin&Status=Paid" target="_blank"><i class="icon-print"></i></a>
  </div>
                             <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                       
                                        <tr> 
                                             <th width="6%">Sr No.</th>
                                             <th width="8%">Trans. ID</th>
                                            <th width="8%">Inv. ID</th>
                                            <th width="11%">Inv. Date</th>
                                            <th width="7%">Inv. Amount</th>
                                            <th width="7%">Payment Type</th>
                                            <th width="15%">Bank</th>
                                            <th width="7%">Cheque No.</th>
                                            <th width="10%">Cheque Date</th>
                                            <th width="5%">Status</th>
                                            <th width="35%">Entry Date</th>
                                            <th width="10%">Entry #ID</th>
                                        </tr>
                                      
                                       </thead>
                                    <tbody>
                                    
                                    <?php $i=0;
	  $i++;?>
      <?php do { ?>
                                       
                                      
  <tr class="odd gradeX"> 
    
    <td><?php echo $i++; ?></td>
     <td><?php echo $rowMain['Trans_Id']; ?></td>
    <td><?php echo $rowMain['Trans_Invoice_No']; ?></td>
    <td><?php echo $rowMain['Trans_Date']; ?></td>
    <td><?php echo $rowMain['Trans_Amt']; ?></td>
    <td><?php echo $rowMain['Payment_Type']; ?></td>
    <td><?php echo $rowMain['Bank_Id']; ?></td>
    <td><?php echo $rowMain['Chq_No']; ?></td>
    <td><?php echo $rowMain['Chq_Date']; ?></td>
    <td><?php echo $rowMain['Status']; ?></td>
    <td><?php echo $rowMain['Entry_Date']; ?></td>
    <td><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
    
  <?php 
  $Tran_Amt = $Tran_Amt + $rowMain['Trans_Amt'];
  } while ($rowMain = mysql_fetch_assoc($rsMain)); ?>
  <tr>
  <th colspan="12">
  <span style="float:right">Total Amount&nbsp;:&nbsp;<?php echo $Tran_Amt;?></span>
  </th>
  </tr>
  
                                    </tbody>
                                </table>
<?php 
}
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
else if($Payment_Type=='Cheque' && $reportrange == $_REQUEST['reportrange'] && $Trans_Type=='Taka' && $Status=='Received')
{
     $query1="SELECT transactions_taka.Trans_Id, transactions_taka.Trans_Invoice_No, transactions_taka.Trans_Date, transactions_taka.Trans_Amt, transactions_taka.Payment_Type, transactions_taka.Bank_Id, transactions_taka.Chq_No, transactions_taka.Chq_Date, transactions_taka.`Description`, transactions_taka.Status, transactions_taka.Entry_Date,transactions_taka.Entry_Id FROM transactions_taka WHERE transactions_taka.Payment_Type = 'Cheque' AND transactions_taka.Status = 'Received' AND transactions_taka.Trans_Date between '".$dt."' and '".$dt1."' order by transactions_taka.Trans_Id asc";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
	
    if($totalRowsRsMain==0)
	{
		echo "<center>There is no record</center>";
	}
	else
	{
	?>
    <div align="right">

    <a href="totaltransactionreportprint?print&reportrange=<?php echo $reportrange; ?>&Payment_Type=Cheque&Trans_Type=Taka&Status=Received" target="_blank"><i class="icon-print"></i></a>
  </div>
                             <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                       
                                        <tr> 
                                             <th width="6%">Sr No.</th>
                                             <th width="8%">Trans. ID</th>
                                             <th width="8%">Inv. ID</th>
                                            <th width="10%">Inv. Date</th>
                                            <th width="10%">Inv. Amount</th>
                                            <th width="10%">Payment Type</th>
                                            <th width="7%">Bank</th>
                                            <th width="7%">Cheque No.</th>
                                            <th width="7%">Cheque Date</th>
                                            <th width="5%">Status</th>
                                            <th width="10%">Entry Date</th>
                                            <th width="10%">Entry #ID</th>
                                        </tr>
                                      
                                       </thead>
                                    <tbody>
                                    
                                    <?php $i=0;
	  $i++;?>
      <?php do { ?>
                                       
                                      
  <tr class="odd gradeX"> 
    
    <td><?php echo $i++; ?></td>
     <td><?php echo $rowMain['Trans_Id']; ?></td>
   <td><?php echo $rowMain['Trans_Invoice_No']; ?></td>
    <td><?php echo $rowMain['Trans_Date']; ?></td>
    <td><?php echo $rowMain['Trans_Amt']; ?></td>
    <td><?php echo $rowMain['Payment_Type']; ?></td>
    <td><?php echo $rowMain['Bank_Id']; ?></td>
    <td><?php echo $rowMain['Chq_No']; ?></td>
    <td><?php echo $rowMain['Chq_Date']; ?></td>
    <td><?php echo $rowMain['Status']; ?></td>
    <td><?php echo $rowMain['Entry_Date']; ?></td>
    <td><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
    
  <?php 
  $Tran_Amt = $Tran_Amt + $rowMain['Trans_Amt'];
  } while ($rowMain = mysql_fetch_assoc($rsMain)); ?>
  <tr>
  <th colspan="12">
  <span style="float:right">Total Amount&nbsp;:&nbsp;<?php echo $Tran_Amt;?></span>
  </th>
  </tr>
  
                                    </tbody>
                                </table>
<?php 
	}
	}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
else if($Payment_Type=='Cheque' && $reportrange == $_REQUEST['reportrange'] && $Trans_Type=='Saree' && $Status=='Received')
{
     $query1="SELECT transactions_saree.Trans_Id, transactions_saree.Trans_Invoice_No, transactions_saree.Trans_Date, transactions_saree.Trans_Amt, transactions_saree.Payment_Type, transactions_saree.Bank_Id, transactions_saree.Chq_No, transactions_saree.Chq_Date, transactions_saree.`Description`, transactions_saree.Status, transactions_saree.Entry_Date,transactions_saree.Entry_Id FROM transactions_saree WHERE transactions_saree.Payment_Type = 'Cheque' AND transactions_saree.Status = 'Received' AND transactions_saree.Trans_Date between '".$dt."' and '".$dt1."' order by transactions_saree.Trans_Id asc";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
	
    if($totalRowsRsMain==0)
	{
		echo "<center>There is no record</center>";
	}
	else
	{
	?>
    <div align="right">
    <a href="totaltransactionreportprint?print&reportrange=<?php echo $reportrange; ?>&Payment_Type=Cheque&Trans_Type=Saree&Status=Received" target="_blank"><i class="icon-print"></i></a>
  </div>
                             <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                       
                                        <tr> 
                                             <th width="6%">Sr No.</th>
                                             <th width="8%">Trans. ID</th>
                                            <th width="8%">Inv. ID</th>
                                            <th width="10%">Inv. Date</th>
                                            <th width="10%">Inv. Amount</th>
                                            <th width="10%">Payment Type</th>
                                            <th width="7%">Bank</th>
                                            <th width="7%">Cheque No.</th>
                                            <th width="7%">Cheque Date</th>
                                            <th width="5%">Status</th>
                                            <th width="10%">Entry Date</th>
                                            <th width="10%">Entry #ID</th>
                                        </tr>
                                      
                                       </thead>
                                    <tbody>
                                    
                                    <?php $i=0;
	  $i++;?>
      <?php do { ?>
                                       
                                      
  <tr class="odd gradeX"> 
    
    <td><?php echo $i++; ?></td>
     <td><?php echo $rowMain['Trans_Id']; ?></td>
    <td><?php echo $rowMain['Trans_Invoice_No']; ?></td>
    <td><?php echo $rowMain['Trans_Date']; ?></td>
    <td><?php echo $rowMain['Trans_Amt']; ?></td>
    <td><?php echo $rowMain['Payment_Type']; ?></td>
    <td><?php echo $rowMain['Bank_Id']; ?></td>
    <td><?php echo $rowMain['Chq_No']; ?></td>
    <td><?php echo $rowMain['Chq_Date']; ?></td>
    <td><?php echo $rowMain['Status']; ?></td>
    <td><?php echo $rowMain['Entry_Date']; ?></td>
    <td><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
    
  <?php 
  $Tran_Amt = $Tran_Amt + $rowMain['Trans_Amt'];
  } while ($rowMain = mysql_fetch_assoc($rsMain)); ?>
  <tr>
  <th colspan="12">
  <span style="float:right">Total Amount&nbsp;:&nbsp;<?php echo $Tran_Amt;?></span>
  </th>
  </tr>
  
                                    </tbody>
                                </table>
<?php 
	}
	}
///////////////////////////////////////////////////////////////////////////////////////////////////////////
elseif($reportrange == $_REQUEST['reportrange'] && $Payment_Type == 'Cheque' && $Trans_Type=='Beam' && $Status=='Un-Paid')
{
	$query1="SELECT transactions_beam1.Trans_Id, transactions_beam1.Trans_Invoice_No, transactions_beam1.Trans_Date, transactions_beam1.Trans_Amt, transactions_beam1.Payment_Type, transactions_beam1.Bank_Id, transactions_beam1.Chq_No, transactions_beam1.Chq_Date, transactions_beam1.`Description`, transactions_beam1.Status, transactions_beam1.Entry_Date,transactions_beam1.Entry_Id FROM transactions_beam1 WHERE transactions_beam1.Payment_Type = 'Cheque' AND transactions_beam1.Status = 'Un-Paid' AND transactions_beam1.Trans_Date between '".$dt."' and '".$dt1."' order by transactions_beam1.Trans_Id asc";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
	
    if($totalRowsRsMain==0)
	{
		echo "<center>There is no record</center>";
	}
	else
	{
	?>
    <div align="right">
    <a href="totaltransactionreportprint?print&reportrange=<?php echo $reportrange; ?>&Payment_Type=Cheque&Trans_Type=Beam&Status=Un-Paid" target="_blank"><i class="icon-print"></i></a>
  </div>
                             <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                       
                                        <tr> 
                                             <th width="6%">Sr No.</th>
                                             <th width="8%">Trans. ID</th>
                                             <th width="8%">Inv. ID</th>
                                            <th width="11%">Inv. Date</th>
                                            <th width="7%">Inv. Amount</th>
                                            <th width="7%">Payment Type</th>
                                            <th width="15%">Bank</th>
                                            <th width="7%">Cheque No.</th>
                                            <th width="10%">Cheque Date</th>
                                            <th width="5%">Status</th>
                                            <th width="35%">Entry Date</th>
                                            <th width="10%">Entry #ID</th>
                                        </tr>
                                      
                                       </thead>
                                    <tbody>
                                    
                                    <?php $i=0;
	  $i++;?>
      <?php do { ?>
                                       
                                      
  <tr class="odd gradeX"> 
    
    <td><?php echo $i++; ?></td>
     <td><?php echo $rowMain['Trans_Id']; ?></td>
    <td><?php echo $rowMain['Trans_Invoice_No']; ?></td>
    <td><?php echo $rowMain['Trans_Date']; ?></td>
    <td><?php echo $rowMain['Trans_Amt']; ?></td>
    <td><?php echo $rowMain['Payment_Type']; ?></td>
    <td><?php echo $rowMain['Bank_Id']; ?></td>
    <td><?php echo $rowMain['Chq_No']; ?></td>
    <td><?php echo $rowMain['Chq_Date']; ?></td>
    <td><?php echo $rowMain['Status']; ?></td>
    <td><?php echo $rowMain['Entry_Date']; ?></td>
    <td><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
    
  <?php 
  $Tran_Amt = $Tran_Amt + $rowMain['Trans_Amt'];
  } while ($rowMain = mysql_fetch_assoc($rsMain)); ?>
  <tr>
  <th colspan="12">
  <span style="float:right">Total Amount&nbsp;:&nbsp;<?php echo $Tran_Amt;?></span>
  </th>
  </tr>
  
                                    </tbody>
                                </table>
<?php 
}
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////
else if($reportrange == $_REQUEST['reportrange'] && $Payment_Type == 'Cheque' && $Trans_Type=='Bobbin' && $Status=='Un-Paid')
{
	$query1="SELECT transactions_bobbin.Trans_Id, transactions_bobbin.Trans_Invoice_No, transactions_bobbin.Trans_Date,transactions_bobbin.Trans_Amt, transactions_bobbin.Payment_Type, transactions_bobbin.Bank_Id, transactions_bobbin.Chq_No, transactions_bobbin.Chq_Date, transactions_bobbin.`Description`, transactions_bobbin.Status, transactions_bobbin.Entry_Date,transactions_bobbin.Entry_Id FROM transactions_bobbin WHERE transactions_bobbin.Payment_Type = 'Cheque' AND transactions_bobbin.Status = 'Un-Paid' AND transactions_bobbin.Trans_Date between '".$dt."' and '".$dt1."' order by transactions_bobbin.Trans_Id asc";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
	
    if($totalRowsRsMain==0)
	{
		echo "<center>There is no record</center>";
	}
	else
	{
	?>
    <div align="right">
    <a href="totaltransactionreportprint?print&reportrange=<?php echo $reportrange; ?>&Payment_Type=Cheque&Trans_Type=Bobbin&Status=Un-Paid" target="_blank"><i class="icon-print"></i></a>
  </div>
                             <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                       
                                        <tr> 
                                             <th width="6%">Sr No.</th>
                                             <th width="8%">Trans. ID</th>
                                            <th width="8%">Inv. ID</th>
                                            <th width="11%">Inv. Date</th>
                                            <th width="7%">Inv. Amount</th>
                                            <th width="7%">Payment Type</th>
                                            <th width="15%">Bank</th>
                                            <th width="7%">Cheque No.</th>
                                            <th width="10%">Cheque Date</th>
                                            <th width="5%">Status</th>
                                            <th width="35%">Entry Date</th>
                                            <th width="10%">Entry #ID</th>
                                        </tr>
                                      
                                       </thead>
                                    <tbody>
                                    
                                    <?php $i=0;
	  $i++;?>
      <?php do { ?>
                                       
                                      
  <tr class="odd gradeX"> 
    
    <td><?php echo $i++; ?></td>
     <td><?php echo $rowMain['Trans_Id']; ?></td>
    <td><?php echo $rowMain['Trans_Invoice_No']; ?></td>
    <td><?php echo $rowMain['Trans_Date']; ?></td>
    <td><?php echo $rowMain['Trans_Amt']; ?></td>
    <td><?php echo $rowMain['Payment_Type']; ?></td>
    <td><?php echo $rowMain['Bank_Id']; ?></td>
    <td><?php echo $rowMain['Chq_No']; ?></td>
    <td><?php echo $rowMain['Chq_Date']; ?></td>
    <td><?php echo $rowMain['Status']; ?></td>
    <td><?php echo $rowMain['Entry_Date']; ?></td>
    <td><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
    
  <?php 
  $Tran_Amt = $Tran_Amt + $rowMain['Trans_Amt'];
  } while ($rowMain = mysql_fetch_assoc($rsMain)); ?>
  <tr>
  <th colspan="12">
  <span style="float:right">Total Amount&nbsp;:&nbsp;<?php echo $Tran_Amt;?></span>
  </th>
  </tr>
  
                                    </tbody>
                                </table>
<?php 
}
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
else if($Payment_Type=='Cheque' && $reportrange == $_REQUEST['reportrange'] && $Trans_Type=='Taka' && $Status=='Not-Received')
{
     $query1="SELECT transactions_taka.Trans_Id, transactions_taka.Trans_Invoice_No, transactions_taka.Trans_Date, transactions_taka.Trans_Amt, transactions_taka.Payment_Type, transactions_taka.Bank_Id, transactions_taka.Chq_No, transactions_taka.Chq_Date, transactions_taka.`Description`, transactions_taka.Status, transactions_taka.Entry_Date,transactions_taka.Entry_Id FROM transactions_taka WHERE transactions_taka.Payment_Type = 'Cheque' AND transactions_taka.Status = 'Not-Received' AND transactions_taka.Trans_Date between '".$dt."' and '".$dt1."' order by transactions_taka.Trans_Id asc";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
	
    if($totalRowsRsMain==0)
	{
		echo "<center>There is no record</center>";
	}
	else
	{
	?>
    <div align="right">

    <a href="totaltransactionreportprint?print&reportrange=<?php echo $reportrange; ?>&Payment_Type=Cheque&Trans_Type=Taka&Status=Not-Received" target="_blank"><i class="icon-print"></i></a>
  </div>
                             <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                       
                                        <tr> 
                                             <th width="6%">Sr No.</th>
                                             <th width="8%">Trans. ID</th>
                                             <th width="8%">Inv. ID</th>
                                            <th width="10%">Inv. Date</th>
                                            <th width="10%">Inv. Amount</th>
                                            <th width="10%">Payment Type</th>
                                            <th width="7%">Bank</th>
                                            <th width="7%">Cheque No.</th>
                                            <th width="7%">Cheque Date</th>
                                            <th width="5%">Status</th>
                                            <th width="10%">Entry Date</th>
                                            <th width="10%">Entry #ID</th>
                                        </tr>
                                      
                                       </thead>
                                    <tbody>
                                    
                                    <?php $i=0;
	  $i++;?>
      <?php do { ?>
                                       
                                      
  <tr class="odd gradeX"> 
    
    <td><?php echo $i++; ?></td>
     <td><?php echo $rowMain['Trans_Id']; ?></td>
   <td><?php echo $rowMain['Trans_Invoice_No']; ?></td>
    <td><?php echo $rowMain['Trans_Date']; ?></td>
    <td><?php echo $rowMain['Trans_Amt']; ?></td>
    <td><?php echo $rowMain['Payment_Type']; ?></td>
    <td><?php echo $rowMain['Bank_Id']; ?></td>
    <td><?php echo $rowMain['Chq_No']; ?></td>
    <td><?php echo $rowMain['Chq_Date']; ?></td>
    <td><?php echo $rowMain['Status']; ?></td>
    <td><?php echo $rowMain['Entry_Date']; ?></td>
    <td><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
    
  <?php 
  $Tran_Amt = $Tran_Amt + $rowMain['Trans_Amt'];
  } while ($rowMain = mysql_fetch_assoc($rsMain)); ?>
  <tr>
  <th colspan="12">
  <span style="float:right">Total Amount&nbsp;:&nbsp;<?php echo $Tran_Amt;?></span>
  </th>
  </tr>
  
                                    </tbody>
                                </table>
<?php 
	}
	}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
else if($Payment_Type=='Cheque' && $reportrange == $_REQUEST['reportrange'] && $Trans_Type=='Saree' && $Status=='Not-Received')
{
     $query1="SELECT transactions_saree.Trans_Id, transactions_saree.Trans_Invoice_No, transactions_saree.Trans_Date, transactions_saree.Trans_Amt, transactions_saree.Payment_Type, transactions_saree.Bank_Id, transactions_saree.Chq_No, transactions_saree.Chq_Date, transactions_saree.`Description`, transactions_saree.Status, transactions_saree.Entry_Date,transactions_saree.Entry_Id FROM transactions_saree WHERE transactions_saree.Payment_Type = 'Cheque' AND transactions_saree.Status = 'Not-Received' AND transactions_saree.Trans_Date between '".$dt."' and '".$dt1."' order by transactions_saree.Trans_Id asc";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
	
    if($totalRowsRsMain==0)
	{
		echo "<center>There is no record</center>";
	}
	else
	{
	?>
    <div align="right">
    <a href="totaltransactionreportprint?print&reportrange=<?php echo $reportrange; ?>&Payment_Type=Cheque&Trans_Type=Saree&Status=Not-Received" target="_blank"><i class="icon-print"></i></a>
  </div>
                             <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                       
                                        <tr> 
                                             <th width="6%">Sr No.</th>
                                             <th width="8%">Trans. ID</th>
                                            <th width="8%">Inv. ID</th>
                                            <th width="10%">Inv. Date</th>
                                            <th width="10%">Inv. Amount</th>
                                            <th width="10%">Payment Type</th>
                                            <th width="7%">Bank</th>
                                            <th width="7%">Cheque No.</th>
                                            <th width="7%">Cheque Date</th>
                                            <th width="5%">Status</th>
                                            <th width="10%">Entry Date</th>
                                            <th width="10%">Entry #ID</th>
                                        </tr>
                                      
                                       </thead>
                                    <tbody>
                                    
                                    <?php $i=0;
	  $i++;?>
      <?php do { ?>
                                       
                                      
  <tr class="odd gradeX"> 
    
    <td><?php echo $i++; ?></td>
     <td><?php echo $rowMain['Trans_Id']; ?></td>
    <td><?php echo $rowMain['Trans_Invoice_No']; ?></td>
    <td><?php echo $rowMain['Trans_Date']; ?></td>
    <td><?php echo $rowMain['Trans_Amt']; ?></td>
    <td><?php echo $rowMain['Payment_Type']; ?></td>
    <td><?php echo $rowMain['Bank_Id']; ?></td>
    <td><?php echo $rowMain['Chq_No']; ?></td>
    <td><?php echo $rowMain['Chq_Date']; ?></td>
    <td><?php echo $rowMain['Status']; ?></td>
    <td><?php echo $rowMain['Entry_Date']; ?></td>
    <td><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
    
  <?php 
  $Tran_Amt = $Tran_Amt + $rowMain['Trans_Amt'];
  } while ($rowMain = mysql_fetch_assoc($rsMain)); ?>
  <tr>
  <th colspan="12">
  <span style="float:right">Total Amount&nbsp;:&nbsp;<?php echo $Tran_Amt;?></span>
  </th>
  </tr>
  
                                    </tbody>
                                </table>
<?php 
	}
	}
///////////////////////////////////////////////////////////////////////////////////////////////////////////


	elseif($reportrange == $_REQUEST['reportrange'] && $Payment_Type == 'Cheque' && $Trans_Type=='Beam')
{
	$query1="SELECT transactions_beam1.Trans_Id, transactions_beam1.Trans_Invoice_No, transactions_beam1.Trans_Date, transactions_beam1.Trans_Amt, transactions_beam1.Payment_Type, transactions_beam1.Bank_Id, transactions_beam1.Chq_No, transactions_beam1.Chq_Date, transactions_beam1.`Description`, transactions_beam1.Status, transactions_beam1.Entry_Date,transactions_beam1.Entry_Id FROM transactions_beam1 WHERE transactions_beam1.Payment_Type = 'Cheque' AND transactions_beam1.Trans_Date between '".$dt."' and '".$dt1."' order by transactions_beam1.Trans_Id asc";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
	
    if($totalRowsRsMain==0)
	{
		echo "<center>There is no record</center>";
	}
	else
	{
	?>
    <div align="right">
    <a href="totaltransactionreportprint?print&reportrange=<?php echo $reportrange; ?>&Payment_Type=Cheque&Trans_Type=Beam" target="_blank"><i class="icon-print"></i></a>
  </div>
                             <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                       
                                        <tr> 
                                             <th width="6%">Sr No.</th>
                                             <th width="8%">Trans. ID</th>
                                             <th width="8%">Inv. ID</th>
                                            <th width="11%">Inv. Date</th>
                                            <th width="7%">Inv. Amount</th>
                                            <th width="7%">Payment Type</th>
                                            <th width="15%">Bank</th>
                                            <th width="7%">Cheque No.</th>
                                            <th width="10%">Cheque Date</th>
                                            <th width="5%">Status</th>
                                            <th width="35%">Entry Date</th>
                                            <th width="10%">Entry #ID</th>
                                        </tr>
                                      
                                       </thead>
                                    <tbody>
                                    
                                    <?php $i=0;
	  $i++;?>
      <?php do { ?>
                                       
                                      
  <tr class="odd gradeX"> 
    
    <td><?php echo $i++; ?></td>
     <td><?php echo $rowMain['Trans_Id']; ?></td>
    <td><?php echo $rowMain['Trans_Invoice_No']; ?></td>
    <td><?php echo $rowMain['Trans_Date']; ?></td>
    <td><?php echo $rowMain['Trans_Amt']; ?></td>
    <td><?php echo $rowMain['Payment_Type']; ?></td>
    <td><?php echo $rowMain['Bank_Id']; ?></td>
    <td><?php echo $rowMain['Chq_No']; ?></td>
    <td><?php echo $rowMain['Chq_Date']; ?></td>
    <td><?php echo $rowMain['Status']; ?></td>
    <td><?php echo $rowMain['Entry_Date']; ?></td>
    <td><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
    
  <?php 
  $Tran_Amt = $Tran_Amt + $rowMain['Trans_Amt'];
  } while ($rowMain = mysql_fetch_assoc($rsMain)); ?>
  <tr>
  <th colspan="12">
  <span style="float:right">Total Amount&nbsp;:&nbsp;<?php echo $Tran_Amt;?></span>
  </th>
  </tr>
  
                                    </tbody>
                                </table>
<?php 
}
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////
else if($reportrange == $_REQUEST['reportrange'] && $Payment_Type == 'Cheque' && $Trans_Type=='Bobbin')
{
	$query1="SELECT transactions_bobbin.Trans_Id, transactions_bobbin.Trans_Invoice_No, transactions_bobbin.Trans_Date, transactions_bobbin.Trans_Amt, transactions_bobbin.Payment_Type, transactions_bobbin.Bank_Id, transactions_bobbin.Chq_No, transactions_bobbin.Chq_Date, transactions_bobbin.`Description`, transactions_bobbin.Status, transactions_bobbin.Entry_Date,transactions_bobbin.Entry_Id FROM transactions_bobbin WHERE transactions_bobbin.Payment_Type = 'Cheque' AND transactions_bobbin.Trans_Date between '".$dt."' and '".$dt1."' order by transactions_bobbin.Trans_Id asc";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
	
    if($totalRowsRsMain==0)
	{
		echo "<center>There is no record</center>";
	}
	else
	{
	?>
    <div align="right">
    <a href="totaltransactionreportprint?print&reportrange=<?php echo $reportrange; ?>&Payment_Type=Cheque&Trans_Type=Bobbin" target="_blank"><i class="icon-print"></i></a>
  </div>
                             <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                       
                                        <tr> 
                                             <th width="6%">Sr No.</th>
                                             <th width="8%">Trans. ID</th>
                                             <th width="8%">Inv. ID</th>
                                            <th width="11%">Inv. Date</th>
                                            <th width="7%">Inv. Amount</th>
                                            <th width="7%">Payment Type</th>
                                            <th width="15%">Bank</th>
                                            <th width="7%">Cheque No.</th>
                                            <th width="10%">Cheque Date</th>
                                            <th width="5%">Status</th>
                                            <th width="35%">Entry Date</th>
                                            <th width="10%">Entry #ID</th>
                                        </tr>
                                      
                                       </thead>
                                    <tbody>
                                    
                                    <?php $i=0;
	  $i++;?>
      <?php do { ?>
                                       
                                      
  <tr class="odd gradeX"> 
    
    <td><?php echo $i++; ?></td>
     <td><?php echo $rowMain['Trans_Id']; ?></td>
   <td><?php echo $rowMain['Trans_Invoice_No']; ?></td>
    <td><?php echo $rowMain['Trans_Date']; ?></td>
    <td><?php echo $rowMain['Trans_Amt']; ?></td>
    <td><?php echo $rowMain['Payment_Type']; ?></td>
    <td><?php echo $rowMain['Bank_Id']; ?></td>
    <td><?php echo $rowMain['Chq_No']; ?></td>
    <td><?php echo $rowMain['Chq_Date']; ?></td>
    <td><?php echo $rowMain['Status']; ?></td>
    <td><?php echo $rowMain['Entry_Date']; ?></td>
    <td><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
    
  <?php 
  $Tran_Amt = $Tran_Amt + $rowMain['Trans_Amt'];
  } while ($rowMain = mysql_fetch_assoc($rsMain)); ?>
  <tr>
  <th colspan="12">
  <span style="float:right">Total Amount&nbsp;:&nbsp;<?php echo $Tran_Amt;?></span>
  </th>
  </tr>
  
                                    </tbody>
                                </table>
<?php 
}
}
else if($Payment_Type=='Cheque' && $reportrange == $_REQUEST['reportrange'] && $Trans_Type=='Taka')
{
     $query1="SELECT transactions_taka.Trans_Id, transactions_taka.Trans_Invoice_No, transactions_taka.Trans_Date, transactions_taka.Trans_Amt, transactions_taka.Payment_Type, transactions_taka.Bank_Id, transactions_taka.Chq_No, transactions_taka.Chq_Date, transactions_taka.`Description`, transactions_taka.Status, transactions_taka.Entry_Date,transactions_taka.Entry_Id FROM transactions_taka WHERE transactions_taka.Payment_Type = 'Cheque' AND transactions_taka.Trans_Date between '".$dt."' and '".$dt1."' order by transactions_taka.Trans_Id asc";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
	
    if($totalRowsRsMain==0)
	{
		echo "<center>There is no record</center>";
	}
	else
	{
	?>
    <div align="right">
    <a href="totaltransactionreportprint?print&reportrange=<?php echo $reportrange; ?>&Payment_Type=Cheque&Trans_Type=Taka" target="_blank"><i class="icon-print"></i></a>
  </div>
                             <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                       
                                        <tr> 
                                             <th width="6%">Sr No.</th>
                                             <th width="8%">Trans. ID</th>
                                             <th width="8%">Inv. ID</th>
                                            <th width="10%">Inv. Date</th>
                                            <th width="10%">Inv. Amount</th>
                                            <th width="10%">Payment Type</th>
                                            <th width="7%">Bank</th>
                                            <th width="7%">Cheque No.</th>
                                            <th width="7%">Cheque Date</th>
                                            <th width="5%">Status</th>
                                            <th width="10%">Entry Date</th>
                                            <th width="10%">Entry #ID</th>
                                        </tr>
                                      
                                       </thead>
                                    <tbody>
                                    
                                    <?php $i=0;
	  $i++;?>
      <?php do { ?>
                                       
                                      
  <tr class="odd gradeX"> 
    
    <td><?php echo $i++; ?></td>
     <td><?php echo $rowMain['Trans_Id']; ?></td>
   <td><?php echo $rowMain['Trans_Invoice_No']; ?></td>
    <td><?php echo $rowMain['Trans_Date']; ?></td>
    <td><?php echo $rowMain['Trans_Amt']; ?></td>
    <td><?php echo $rowMain['Payment_Type']; ?></td>
    <td><?php echo $rowMain['Bank_Id']; ?></td>
    <td><?php echo $rowMain['Chq_No']; ?></td>
    <td><?php echo $rowMain['Chq_Date']; ?></td>
    <td><?php echo $rowMain['Status']; ?></td>
    <td><?php echo $rowMain['Entry_Date']; ?></td>
    <td><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
    
  <?php 
  $Tran_Amt = $Tran_Amt + $rowMain['Trans_Amt'];
  } while ($rowMain = mysql_fetch_assoc($rsMain)); ?>
  <tr>
  <th colspan="12">
  <span style="float:right">Total Amount&nbsp;:&nbsp;<?php echo $Tran_Amt;?></span>
  </th>
  </tr>
  
                                    </tbody>
                                </table>
<?php 
	}
	}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
else if($Payment_Type=='Cheque' && $reportrange == $_REQUEST['reportrange'] && $Trans_Type=='Saree')
{
     $query1="SELECT transactions_saree.Trans_Id, transactions_saree.Trans_Invoice_No, transactions_saree.Trans_Date, transactions_saree.Trans_Amt, transactions_saree.Payment_Type, transactions_saree.Bank_Id, transactions_saree.Chq_No, transactions_saree.Chq_Date, transactions_saree.`Description`, transactions_saree.Status, transactions_saree.Entry_Date,transactions_saree.Entry_Id FROM transactions_saree WHERE transactions_saree.Payment_Type = 'Cheque' AND transactions_saree.Trans_Date between '".$dt."' and '".$dt1."' order by transactions_saree.Trans_Id asc";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
	
    if($totalRowsRsMain==0)
	{
		echo "<center>There is no record</center>";
	}
	else
	{
	?>
    <div align="right">
    <a href="totaltransactionreportprint?print&reportrange=<?php echo $reportrange; ?>&Payment_Type=Cheque&Trans_Type=Saree" target="_blank"><i class="icon-print"></i></a>
  </div>
                             <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                       
                                        <tr> 
                                             <th width="6%">Sr No.</th>
                                             <th width="8%">Trans. ID</th>
                                             <th width="8%">Inv. ID</th>
                                            <th width="10%">Inv. Date</th>
                                            <th width="10%">Inv. Amount</th>
                                            <th width="10%">Payment Type</th>
                                            <th width="7%">Bank</th>
                                            <th width="7%">Cheque No.</th>
                                            <th width="7%">Cheque Date</th>
                                            <th width="5%">Status</th>
                                            <th width="10%">Entry Date</th>
                                            <th width="10%">Entry #ID</th>
                                        </tr>
                                      
                                       </thead>
                                    <tbody>
                                    
                                    <?php $i=0;
	  $i++;?>
      <?php do { ?>
                                       
                                      
  <tr class="odd gradeX"> 
    
    <td><?php echo $i++; ?></td>
     <td><?php echo $rowMain['Trans_Id']; ?></td>
   <td><?php echo $rowMain['Trans_Invoice_No']; ?></td>
    <td><?php echo $rowMain['Trans_Date']; ?></td>
    <td><?php echo $rowMain['Trans_Amt']; ?></td>
    <td><?php echo $rowMain['Payment_Type']; ?></td>
    <td><?php echo $rowMain['Bank_Id']; ?></td>
    <td><?php echo $rowMain['Chq_No']; ?></td>
    <td><?php echo $rowMain['Chq_Date']; ?></td>
    <td><?php echo $rowMain['Status']; ?></td>
    <td><?php echo $rowMain['Entry_Date']; ?></td>
    <td><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
    
  <?php 
  $Tran_Amt = $Tran_Amt + $rowMain['Trans_Amt'];
  } while ($rowMain = mysql_fetch_assoc($rsMain)); ?>
  <tr>
  <th colspan="12">
  <span style="float:right">Total Amount&nbsp;:&nbsp;<?php echo $Tran_Amt;?></span>
  </th>
  </tr>
  
                                    </tbody>
                                </table>
<?php 
	}
	}
///////////////////////////////////////////////////////////////////////////////////////////////////////////
else
{
	echo "<center>Please select beam / bobbin / taka /saree with date range and cheque / cash</center>";
}
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
elseif($reportrange == $_REQUEST['reportrange'] && $Trans_Type=='Beam' && $Status=='Paid')
{
	$query1="SELECT transactions_beam1.Trans_Id, transactions_beam1.Trans_Invoice_No, transactions_beam1.Trans_Date, transactions_beam1.Trans_Amt, transactions_beam1.Payment_Type, transactions_beam1.Bank_Id, transactions_beam1.Chq_No, transactions_beam1.Chq_Date, transactions_beam1.`Description`, transactions_beam1.Status, transactions_beam1.Entry_Date,transactions_beam1.Entry_Id FROM transactions_beam1 WHERE transactions_beam1.Status = 'Paid' AND transactions_beam1.Trans_Date between '".$dt."' and '".$dt1."' order by transactions_beam1.Trans_Id asc";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
	
    if($totalRowsRsMain==0)
	{
		echo "<center>There is no record</center>";
	}
	else
	{
	?>
    <div align="right">
    <a href="totaltransactionreportprint?print&reportrange=<?php echo $reportrange; ?>&Trans_Type=Beam&Status=Paid" target="_blank"><i class="icon-print"></i></a>
  </div>
                             <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                       
                                        <tr> 
                                             <th width="6%">Sr No.</th>
                                             <th width="8%">Trans. ID</th>
                                             <th width="8%">Inv. ID</th>
                                            <th width="11%">Inv. Date</th>
                                            <th width="7%">Inv. Amount</th>
                                            <th width="7%">Payment Type</th>
                                            <th width="15%">Bank</th>
                                            <th width="7%">Cheque No.</th>
                                            <th width="10%">Cheque Date</th>
                                            <th width="5%">Status</th>
                                            <th width="35%">Entry Date</th>
                                            <th width="10%">Entry #ID</th>
                                        </tr>
                                      
                                       </thead>
                                    <tbody>
                                    
                                    <?php $i=0;
	  $i++;?>
      <?php do { ?>
                                       
                                      
  <tr class="odd gradeX"> 
    
    <td><?php echo $i++; ?></td>
     <td><?php echo $rowMain['Trans_Id']; ?></td>
    <td><?php echo $rowMain['Trans_Invoice_No']; ?></td>
    <td><?php echo $rowMain['Trans_Date']; ?></td>
    <td><?php echo $rowMain['Trans_Amt']; ?></td>
    <td><?php echo $rowMain['Payment_Type']; ?></td>
    <td><?php echo $rowMain['Bank_Id']; ?></td>
    <td><?php echo $rowMain['Chq_No']; ?></td>
    <td><?php echo $rowMain['Chq_Date']; ?></td>
    <td><?php echo $rowMain['Status']; ?></td>
    <td><?php echo $rowMain['Entry_Date']; ?></td>
    <td><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
    
  <?php 
  $Tran_Amt = $Tran_Amt + $rowMain['Trans_Amt'];
  } while ($rowMain = mysql_fetch_assoc($rsMain)); ?>
  <tr>
  <th colspan="12">
  <span style="float:right">Total Amount&nbsp;:&nbsp;<?php echo $Tran_Amt;?></span>
  </th>
  </tr>
  
                                    </tbody>
                                </table>
<?php 
}
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////
else if($reportrange == $_REQUEST['reportrange'] && $Trans_Type=='Bobbin' && $Status=='Paid')
{
	$query1="SELECT transactions_bobbin.Trans_Id, transactions_bobbin.Trans_Invoice_No, transactions_bobbin.Trans_Date,transactions_bobbin.Trans_Amt, transactions_bobbin.Payment_Type, transactions_bobbin.Bank_Id, transactions_bobbin.Chq_No, transactions_bobbin.Chq_Date, transactions_bobbin.`Description`, transactions_bobbin.Status, transactions_bobbin.Entry_Date,transactions_bobbin.Entry_Id FROM transactions_bobbin WHERE transactions_bobbin.Status = 'Paid' AND transactions_bobbin.Trans_Date between '".$dt."' and '".$dt1."' order by transactions_bobbin.Trans_Id asc";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
	
    if($totalRowsRsMain==0)
	{
		echo "<center>There is no record</center>";
	}
	else
	{
	?>
    <div align="right">
    <a href="totaltransactionreportprint?print&reportrange=<?php echo $reportrange; ?>&Trans_Type=Bobbin&Status=Paid" target="_blank"><i class="icon-print"></i></a>
  </div>
                             <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                       
                                        <tr> 
                                             <th width="6%">Sr No.</th>
                                             <th width="8%">Trans. ID</th>
                                            <th width="8%">Inv. ID</th>
                                            <th width="11%">Inv. Date</th>
                                            <th width="7%">Inv. Amount</th>
                                            <th width="7%">Payment Type</th>
                                            <th width="15%">Bank</th>
                                            <th width="7%">Cheque No.</th>
                                            <th width="10%">Cheque Date</th>
                                            <th width="5%">Status</th>
                                            <th width="35%">Entry Date</th>
                                            <th width="10%">Entry #ID</th>
                                        </tr>
                                      
                                       </thead>
                                    <tbody>
                                    
                                    <?php $i=0;
	  $i++;?>
      <?php do { ?>
                                       
                                      
  <tr class="odd gradeX"> 
    
    <td><?php echo $i++; ?></td>
     <td><?php echo $rowMain['Trans_Id']; ?></td>
    <td><?php echo $rowMain['Trans_Invoice_No']; ?></td>
    <td><?php echo $rowMain['Trans_Date']; ?></td>
    <td><?php echo $rowMain['Trans_Amt']; ?></td>
    <td><?php echo $rowMain['Payment_Type']; ?></td>
    <td><?php echo $rowMain['Bank_Id']; ?></td>
    <td><?php echo $rowMain['Chq_No']; ?></td>
    <td><?php echo $rowMain['Chq_Date']; ?></td>
    <td><?php echo $rowMain['Status']; ?></td>
    <td><?php echo $rowMain['Entry_Date']; ?></td>
    <td><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
    
  <?php 
  $Tran_Amt = $Tran_Amt + $rowMain['Trans_Amt'];
  } while ($rowMain = mysql_fetch_assoc($rsMain)); ?>
  <tr>
  <th colspan="12">
  <span style="float:right">Total Amount&nbsp;:&nbsp;<?php echo $Tran_Amt;?></span>
  </th>
  </tr>
  
                                    </tbody>
                                </table>
<?php 
}
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
else if($reportrange == $_REQUEST['reportrange'] && $Trans_Type=='Taka' && $Status=='Received')
{
     $query1="SELECT transactions_taka.Trans_Id, transactions_taka.Trans_Invoice_No, transactions_taka.Trans_Date, transactions_taka.Trans_Amt, transactions_taka.Payment_Type, transactions_taka.Bank_Id, transactions_taka.Chq_No, transactions_taka.Chq_Date, transactions_taka.`Description`, transactions_taka.Status, transactions_taka.Entry_Date ,transactions_taka.Entry_Id FROM transactions_taka WHERE transactions_taka.Status = 'Received' AND transactions_taka.Trans_Date between '".$dt."' and '".$dt1."' order by transactions_taka.Trans_Id asc";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
	
    if($totalRowsRsMain==0)
	{
		echo "<center>There is no record</center>";
	}
	else
	{
	?>
    <div align="right">

    <a href="totaltransactionreportprint?print&reportrange=<?php echo $reportrange; ?>&Trans_Type=Taka&Status=Received" target="_blank"><i class="icon-print"></i></a>
  </div>
                             <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                       
                                        <tr> 
                                             <th width="6%">Sr No.</th>
                                             <th width="8%">Trans. ID</th>
                                             <th width="8%">Inv. ID</th>
                                            <th width="10%">Inv. Date</th>
                                            <th width="10%">Inv. Amount</th>
                                            <th width="10%">Payment Type</th>
                                            <th width="7%">Bank</th>
                                            <th width="7%">Cheque No.</th>
                                            <th width="7%">Cheque Date</th>
                                            <th width="5%">Status</th>
                                            <th width="10%">Entry Date</th>
                                            <th width="10%">Entry #ID</th>
                                        </tr>
                                      
                                       </thead>
                                    <tbody>
                                    
                                    <?php $i=0;
	  $i++;?>
      <?php do { ?>
                                       
                                      
  <tr class="odd gradeX"> 
    
    <td><?php echo $i++; ?></td>
     <td><?php echo $rowMain['Trans_Id']; ?></td>
   <td><?php echo $rowMain['Trans_Invoice_No']; ?></td>
    <td><?php echo $rowMain['Trans_Date']; ?></td>
    <td><?php echo $rowMain['Trans_Amt']; ?></td>
    <td><?php echo $rowMain['Payment_Type']; ?></td>
    <td><?php echo $rowMain['Bank_Id']; ?></td>
    <td><?php echo $rowMain['Chq_No']; ?></td>
    <td><?php echo $rowMain['Chq_Date']; ?></td>
    <td><?php echo $rowMain['Status']; ?></td>
    <td><?php echo $rowMain['Entry_Date']; ?></td>
    <td><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
    
  <?php 
  $Tran_Amt = $Tran_Amt + $rowMain['Trans_Amt'];
  } while ($rowMain = mysql_fetch_assoc($rsMain)); ?>
  <tr>
  <th colspan="12">
  <span style="float:right">Total Amount&nbsp;:&nbsp;<?php echo $Tran_Amt;?></span>
  </th>
  </tr>
  
                                    </tbody>
                                </table>
<?php 
	}
	}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
else if($reportrange == $_REQUEST['reportrange'] && $Trans_Type=='Saree' && $Status=='Received')
{
     $query1="SELECT transactions_saree.Trans_Id, transactions_saree.Trans_Invoice_No, transactions_saree.Trans_Date, transactions_saree.Trans_Amt, transactions_saree.Payment_Type, transactions_saree.Bank_Id, transactions_saree.Chq_No, transactions_saree.Chq_Date, transactions_saree.`Description`, transactions_saree.Status, transactions_saree.Entry_Date,transactions_saree.Entry_Id FROM transactions_saree WHERE transactions_saree.Status = 'Received' AND transactions_saree.Trans_Date between '".$dt."' and '".$dt1."' order by transactions_saree.Trans_Id asc";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
	
    if($totalRowsRsMain==0)
	{
		echo "<center>There is no record</center>";
	}
	else
	{
	?>
    <div align="right">
    <a href="totaltransactionreportprint?print&reportrange=<?php echo $reportrange; ?>&Trans_Type=Saree&Status=Received" target="_blank"><i class="icon-print"></i></a>
  </div>
                             <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                       
                                        <tr> 
                                             <th width="6%">Sr No.</th>
                                             <th width="8%">Trans. ID</th>
                                            <th width="8%">Inv. ID</th>
                                            <th width="10%">Inv. Date</th>
                                            <th width="10%">Inv. Amount</th>
                                            <th width="10%">Payment Type</th>
                                            <th width="7%">Bank</th>
                                            <th width="7%">Cheque No.</th>
                                            <th width="7%">Cheque Date</th>
                                            <th width="5%">Status</th>
                                            <th width="10%">Entry Date</th>
                                            <th width="10%">Entry #ID</th>
                                        </tr>
                                      
                                       </thead>
                                    <tbody>
                                    
                                    <?php $i=0;
	  $i++;?>
      <?php do { ?>
                                       
                                      
  <tr class="odd gradeX"> 
    
    <td><?php echo $i++; ?></td>
     <td><?php echo $rowMain['Trans_Id']; ?></td>
    <td><?php echo $rowMain['Trans_Invoice_No']; ?></td>
    <td><?php echo $rowMain['Trans_Date']; ?></td>
    <td><?php echo $rowMain['Trans_Amt']; ?></td>
    <td><?php echo $rowMain['Payment_Type']; ?></td>
    <td><?php echo $rowMain['Bank_Id']; ?></td>
    <td><?php echo $rowMain['Chq_No']; ?></td>
    <td><?php echo $rowMain['Chq_Date']; ?></td>
    <td><?php echo $rowMain['Status']; ?></td>
    <td><?php echo $rowMain['Entry_Date']; ?></td>
    <td><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
    
 <?php 
  $Tran_Amt = $Tran_Amt + $rowMain['Trans_Amt'];
  } while ($rowMain = mysql_fetch_assoc($rsMain)); ?>
  <tr>
  <th colspan="12">
  <span style="float:right">Total Amount&nbsp;:&nbsp;<?php echo $Tran_Amt;?></span>
  </th>
  </tr>
  
                                    </tbody>
                                </table>
<?php 
	}
	}
///////////////////////////////////////////////////////////////////////////////////////////////////////////
elseif($reportrange == $_REQUEST['reportrange'] && $Trans_Type=='Beam' && $Status=='Un-Paid')
{
	$query1="SELECT transactions_beam1.Trans_Id, transactions_beam1.Trans_Invoice_No, transactions_beam1.Trans_Date, transactions_beam1.Trans_Amt, transactions_beam1.Payment_Type, transactions_beam1.Bank_Id, transactions_beam1.Chq_No, transactions_beam1.Chq_Date, transactions_beam1.`Description`, transactions_beam1.Status, transactions_beam1.Entry_Date,transactions_beam1.Entry_Id FROM transactions_beam1 WHERE transactions_beam1.Status = 'Un-Paid' AND transactions_beam1.Trans_Date between '".$dt."' and '".$dt1."' order by transactions_beam1.Trans_Id asc";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
	
    if($totalRowsRsMain==0)
	{
		echo "<center>There is no record</center>";
	}
	else
	{
	?>
    <div align="right">
    <a href="totaltransactionreportprint?print&reportrange=<?php echo $reportrange; ?>&Trans_Type=Beam&Status=Un-Paid" target="_blank"><i class="icon-print"></i></a>
  </div>
                             <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                       
                                        <tr> 
                                             <th width="6%">Sr No.</th>
                                             <th width="8%">Trans. ID</th>
                                             <th width="8%">Inv. ID</th>
                                            <th width="11%">Inv. Date</th>
                                            <th width="7%">Inv. Amount</th>
                                            <th width="7%">Payment Type</th>
                                            <th width="15%">Bank</th>
                                            <th width="7%">Cheque No.</th>
                                            <th width="10%">Cheque Date</th>
                                            <th width="5%">Status</th>
                                            <th width="35%">Entry Date</th>
                                            <th width="10%">Entry #ID</th>
                                        </tr>
                                      
                                       </thead>
                                    <tbody>
                                    
                                    <?php $i=0;
	  $i++;?>
      <?php do { ?>
                                       
                                      
  <tr class="odd gradeX"> 
    
    <td><?php echo $i++; ?></td>
     <td><?php echo $rowMain['Trans_Id']; ?></td>
    <td><?php echo $rowMain['Trans_Invoice_No']; ?></td>
    <td><?php echo $rowMain['Trans_Date']; ?></td>
    <td><?php echo $rowMain['Trans_Amt']; ?></td>
    <td><?php echo $rowMain['Payment_Type']; ?></td>
    <td><?php echo $rowMain['Bank_Id']; ?></td>
    <td><?php echo $rowMain['Chq_No']; ?></td>
    <td><?php echo $rowMain['Chq_Date']; ?></td>
    <td><?php echo $rowMain['Status']; ?></td>
    <td><?php echo $rowMain['Entry_Date']; ?></td>
    <td><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
    
  <?php 
  $Tran_Amt = $Tran_Amt + $rowMain['Trans_Amt'];
  } while ($rowMain = mysql_fetch_assoc($rsMain)); ?>
  <tr>
  <th colspan="12">
  <span style="float:right">Total Amount&nbsp;:&nbsp;<?php echo $Tran_Amt;?></span>
  </th>
  </tr>
  
                                    </tbody>
                                </table>
<?php 
}
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////
else if($reportrange == $_REQUEST['reportrange'] && $Trans_Type=='Bobbin' && $Status=='Un-Paid')
{
	$query1="SELECT transactions_bobbin.Trans_Id, transactions_bobbin.Trans_Invoice_No, transactions_bobbin.Trans_Date,transactions_bobbin.Trans_Amt, transactions_bobbin.Payment_Type, transactions_bobbin.Bank_Id, transactions_bobbin.Chq_No, transactions_bobbin.Chq_Date, transactions_bobbin.`Description`, transactions_bobbin.Status, transactions_bobbin.Entry_Date,transactions_bobbin.Entry_Id FROM transactions_bobbin WHERE transactions_bobbin.Status = 'Un-Paid' AND transactions_bobbin.Trans_Date between '".$dt."' and '".$dt1."' order by transactions_bobbin.Trans_Id asc";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
	
    if($totalRowsRsMain==0)
	{
		echo "<center>There is no record</center>";
	}
	else
	{
	?>
    <div align="right">
    <a href="totaltransactionreportprint?print&reportrange=<?php echo $reportrange; ?>&Trans_Type=Bobbin&Status=Un-Paid" target="_blank"><i class="icon-print"></i></a>
  </div>
                             <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                       
                                        <tr> 
                                             <th width="6%">Sr No.</th>
                                             <th width="8%">Trans. ID</th>
                                            <th width="8%">Inv. ID</th>
                                            <th width="11%">Inv. Date</th>
                                            <th width="7%">Inv. Amount</th>
                                            <th width="7%">Payment Type</th>
                                            <th width="15%">Bank</th>
                                            <th width="7%">Cheque No.</th>
                                            <th width="10%">Cheque Date</th>
                                            <th width="5%">Status</th>
                                            <th width="35%">Entry Date</th>
                                            <th width="10%">Entry #ID</th>
                                        </tr>
                                      
                                       </thead>
                                    <tbody>
                                    
                                    <?php $i=0;
	  $i++;?>
      <?php do { ?>
                                       
                                      
  <tr class="odd gradeX"> 
    
    <td><?php echo $i++; ?></td>
     <td><?php echo $rowMain['Trans_Id']; ?></td>
    <td><?php echo $rowMain['Trans_Invoice_No']; ?></td>
    <td><?php echo $rowMain['Trans_Date']; ?></td>
    <td><?php echo $rowMain['Trans_Amt']; ?></td>
    <td><?php echo $rowMain['Payment_Type']; ?></td>
    <td><?php echo $rowMain['Bank_Id']; ?></td>
    <td><?php echo $rowMain['Chq_No']; ?></td>
    <td><?php echo $rowMain['Chq_Date']; ?></td>
    <td><?php echo $rowMain['Status']; ?></td>
    <td><?php echo $rowMain['Entry_Date']; ?></td>
    <td><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
    
  <?php 
  $Tran_Amt = $Tran_Amt + $rowMain['Trans_Amt'];
  } while ($rowMain = mysql_fetch_assoc($rsMain)); ?>
  <tr>
  <th colspan="12">
  <span style="float:right">Total Amount&nbsp;:&nbsp;<?php echo $Tran_Amt;?></span>
  </th>
  </tr>
  
                                    </tbody>
                                </table>
<?php 
}
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
else if($reportrange == $_REQUEST['reportrange'] && $Trans_Type=='Taka' && $Status=='Not-Received')
{
     $query1="SELECT transactions_taka.Trans_Id, transactions_taka.Trans_Invoice_No, transactions_taka.Trans_Date, transactions_taka.Trans_Amt, transactions_taka.Payment_Type, transactions_taka.Bank_Id, transactions_taka.Chq_No, transactions_taka.Chq_Date, transactions_taka.`Description`, transactions_taka.Status, transactions_taka.Entry_Date,transactions_taka.Entry_Id FROM transactions_taka WHERE transactions_taka.Status = 'Not-Received' AND transactions_taka.Trans_Date between '".$dt."' and '".$dt1."' order by transactions_taka.Trans_Id asc";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
	
    if($totalRowsRsMain==0)
	{
		echo "<center>There is no record</center>";
	}
	else
	{
	?>
    <div align="right">

    <a href="totaltransactionreportprint?print&reportrange=<?php echo $reportrange; ?>&Trans_Type=Taka&Status=Not-Received" target="_blank"><i class="icon-print"></i></a>
  </div>
                             <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                       
                                        <tr> 
                                             <th width="6%">Sr No.</th>
                                             <th width="8%">Trans. ID</th>
                                             <th width="8%">Inv. ID</th>
                                            <th width="10%">Inv. Date</th>
                                            <th width="10%">Inv. Amount</th>
                                            <th width="10%">Payment Type</th>
                                            <th width="7%">Bank</th>
                                            <th width="7%">Cheque No.</th>
                                            <th width="7%">Cheque Date</th>
                                            <th width="5%">Status</th>
                                            <th width="10%">Entry Date</th>
                                            <th width="10%">Entry #ID</th>
                                        </tr>
                                      
                                       </thead>
                                    <tbody>
                                    
                                    <?php $i=0;
	  $i++;?>
      <?php do { ?>
                                       
                                      
  <tr class="odd gradeX"> 
    
    <td><?php echo $i++; ?></td>
     <td><?php echo $rowMain['Trans_Id']; ?></td>
   <td><?php echo $rowMain['Trans_Invoice_No']; ?></td>
    <td><?php echo $rowMain['Trans_Date']; ?></td>
    <td><?php echo $rowMain['Trans_Amt']; ?></td>
    <td><?php echo $rowMain['Payment_Type']; ?></td>
    <td><?php echo $rowMain['Bank_Id']; ?></td>
    <td><?php echo $rowMain['Chq_No']; ?></td>
    <td><?php echo $rowMain['Chq_Date']; ?></td>
    <td><?php echo $rowMain['Status']; ?></td>
    <td><?php echo $rowMain['Entry_Date']; ?></td>
    <td><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
    
  <?php 
  $Tran_Amt = $Tran_Amt + $rowMain['Trans_Amt'];
  } while ($rowMain = mysql_fetch_assoc($rsMain)); ?>
  <tr>
  <th colspan="12">
  <span style="float:right">Total Amount&nbsp;:&nbsp;<?php echo $Tran_Amt;?></span>
  </th>
  </tr>
  
                                    </tbody>
                                </table>
<?php 
	}
	}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
else if($reportrange == $_REQUEST['reportrange'] && $Trans_Type=='Saree' && $Status=='Not-Received')
{
     $query1="SELECT transactions_saree.Trans_Id, transactions_saree.Trans_Invoice_No, transactions_saree.Trans_Date, transactions_saree.Trans_Amt, transactions_saree.Payment_Type, transactions_saree.Bank_Id, transactions_saree.Chq_No, transactions_saree.Chq_Date, transactions_saree.`Description`, transactions_saree.Status, transactions_saree.Entry_Date,transactions_saree.Entry_Id FROM transactions_saree WHERE transactions_saree.Status = 'Not-Received' AND transactions_saree.Trans_Date between '".$dt."' and '".$dt1."' order by transactions_saree.Trans_Id asc";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
	
    if($totalRowsRsMain==0)
	{
		echo "<center>There is no record</center>";
	}
	else
	{
	?>
    <div align="right">
    <a href="totaltransactionreportprint?print&reportrange=<?php echo $reportrange; ?>&Trans_Type=Saree&Status=Not-Received" target="_blank"><i class="icon-print"></i></a>
  </div>
                             <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                       
                                        <tr> 
                                             <th width="6%">Sr No.</th>
                                             <th width="8%">Trans. ID</th>
                                            <th width="8%">Inv. ID</th>
                                            <th width="10%">Inv. Date</th>
                                            <th width="10%">Inv. Amount</th>
                                            <th width="10%">Payment Type</th>
                                            <th width="7%">Bank</th>
                                            <th width="7%">Cheque No.</th>
                                            <th width="7%">Cheque Date</th>
                                            <th width="5%">Status</th>
                                            <th width="10%">Entry Date</th>
                                            <th width="10%">Entry #ID</th>
                                        </tr>
                                      
                                       </thead>
                                    <tbody>
                                    
                                    <?php $i=0;
	  $i++;?>
      <?php do { ?>
                                       
                                      
  <tr class="odd gradeX"> 
    
    <td><?php echo $i++; ?></td>
     <td><?php echo $rowMain['Trans_Id']; ?></td>
    <td><?php echo $rowMain['Trans_Invoice_No']; ?></td>
    <td><?php echo $rowMain['Trans_Date']; ?></td>
    <td><?php echo $rowMain['Trans_Amt']; ?></td>
    <td><?php echo $rowMain['Payment_Type']; ?></td>
    <td><?php echo $rowMain['Bank_Id']; ?></td>
    <td><?php echo $rowMain['Chq_No']; ?></td>
    <td><?php echo $rowMain['Chq_Date']; ?></td>
    <td><?php echo $rowMain['Status']; ?></td>
    <td><?php echo $rowMain['Entry_Date']; ?></td>
    <td><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
    
  <?php 
  $Tran_Amt = $Tran_Amt + $rowMain['Trans_Amt'];
  } while ($rowMain = mysql_fetch_assoc($rsMain)); ?>
  <tr>
  <th colspan="12">
  <span style="float:right">Total Amount&nbsp;:&nbsp;<?php echo $Tran_Amt;?></span>
  </th>
  </tr>
  
                                    </tbody>
                                </table>
<?php 
	}
	}
///////////////////////////////////////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
else if($reportrange == $_REQUEST['reportrange'] && $Trans_Type=='Beam')
{
	
	$query1="SELECT transactions_beam1.Trans_Id, transactions_beam1.Trans_Invoice_No, transactions_beam1.Trans_Date, transactions_beam1.Trans_Amt, transactions_beam1.Payment_Type, transactions_beam1.Bank_Id, transactions_beam1.Chq_No, transactions_beam1.Chq_Date, transactions_beam1.`Description`, transactions_beam1.Status, transactions_beam1.Entry_Date,transactions_beam1.Entry_Id FROM transactions_beam1 WHERE transactions_beam1.Trans_Date between '".$dt."' and '".$dt1."' order by transactions_beam1.Trans_Id asc";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
	
    if($totalRowsRsMain==0)
	{
		echo "<center>There is no record</center>";
	}
	else
	{
	?>
    <div align="right">
    <a href="totaltransactionreportprint?print&reportrange=<?php echo $reportrange; ?>&Trans_Type=Beam" target="_blank"><i class="icon-print"></i></a>
  </div>
                             <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                       
                                        <tr> 
                                             <th width="6%">Sr No.</th>
                                             <th width="8%">Trans. ID</th>
                                             <th width="8%">Inv. ID</th>
                                            <th width="11%">Inv. Date</th>
                                            <th width="7%">Inv. Amount</th>
                                            <th width="7%">Payment Type</th>
                                            <th width="15%">Bank</th>
                                            <th width="7%">Cheque No.</th>
                                            <th width="10%">Cheque Date</th>
                                            <th width="5%">Status</th>
                                            <th width="35%">Entry Date</th>
                                            <th width="10%">Entry #ID</th>
                                        </tr>
                                      
                                       </thead>
                                    <tbody>
                                    
                                    <?php $i=0;
	  $i++;?>
      <?php do { ?>
                                       
                                      
  <tr class="odd gradeX"> 
    
    <td><?php echo $i++; ?></td>
     <td><?php echo $rowMain['Trans_Id']; ?></td>
   <td><?php echo $rowMain['Trans_Invoice_No']; ?></td>
    <td><?php echo $rowMain['Trans_Date']; ?></td>
    <td><?php echo $rowMain['Trans_Amt']; ?></td>
    <td><?php echo $rowMain['Payment_Type']; ?></td>
    <td><?php echo $rowMain['Bank_Id']; ?></td>
    <td><?php echo $rowMain['Chq_No']; ?></td>
    <td><?php echo $rowMain['Chq_Date']; ?></td>
    <td><?php echo $rowMain['Status']; ?></td>
    <td><?php echo $rowMain['Entry_Date']; ?></td>
    <td><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
    
 <?php 
  $Tran_Amt = $Tran_Amt + $rowMain['Trans_Amt'];
  } while ($rowMain = mysql_fetch_assoc($rsMain)); ?>
  <tr>
  <th colspan="12">
  <span style="float:right">Total Amount&nbsp;:&nbsp;<?php echo $Tran_Amt;?></span>
  </th>
  </tr>
  
                                    </tbody>
                                </table>
<?php 
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
}
else if($reportrange == $_REQUEST['reportrange'] && $Trans_Type=='Bobbin')
{
	
	$query1="SELECT transactions_bobbin.Trans_Id, transactions_bobbin.Trans_Invoice_No, transactions_bobbin.Trans_Date, transactions_bobbin.Trans_Amt, transactions_bobbin.Payment_Type, transactions_bobbin.Bank_Id, transactions_bobbin.Chq_No, transactions_bobbin.Chq_Date, transactions_bobbin.`Description`, transactions_bobbin.Status, transactions_bobbin.Entry_Date,transactions_bobbin.Entry_Id FROM transactions_bobbin WHERE transactions_bobbin.Trans_Date between '".$dt."' and '".$dt1."' order by transactions_bobbin.Trans_Id asc";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
	
    if($totalRowsRsMain==0)
	{
		echo "<center>There is no record</center>";
	}
	else
	{
	?>
    <div align="right">
    <a href="totaltransactionreportprint?print&reportrange=<?php echo $reportrange; ?>&Trans_Type=Bobbin" target="_blank"><i class="icon-print"></i></a>
  </div>
                             <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                       
                                        <tr> 
                                             <th width="6%">Sr No.</th>
                                             <th width="8%">Trans. ID</th>
                                            <th width="8%">Inv. ID</th>
                                            <th width="11%">Inv. Date</th>
                                            <th width="7%">Inv. Amount</th>
                                            <th width="7%">Payment Type</th>
                                            <th width="15%">Bank</th>
                                            <th width="7%">Cheque No.</th>
                                            <th width="10%">Cheque Date</th>
                                            <th width="5%">Status</th>
                                            <th width="35%">Entry Date</th>
                                            <th width="10%">Entry #ID</th>
                                        </tr>
                                      
                                       </thead>
                                    <tbody>
                                    
                                    <?php $i=0;
	  $i++;?>
      <?php do { ?>
                                       
                                      
  <tr class="odd gradeX"> 
    
    <td><?php echo $i++; ?></td>
     <td><?php echo $rowMain['Trans_Id']; ?></td>
    <td><?php echo $rowMain['Trans_Invoice_No']; ?></td>
    <td><?php echo $rowMain['Trans_Date']; ?></td>
    <td><?php echo $rowMain['Trans_Amt']; ?></td>
    <td><?php echo $rowMain['Payment_Type']; ?></td>
    <td><?php echo $rowMain['Bank_Id']; ?></td>
    <td><?php echo $rowMain['Chq_No']; ?></td>
    <td><?php echo $rowMain['Chq_Date']; ?></td>
    <td><?php echo $rowMain['Status']; ?></td>
    <td><?php echo $rowMain['Entry_Date']; ?></td>
    <td><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
    
 <?php 
  $Tran_Amt = $Tran_Amt + $rowMain['Trans_Amt'];
  } while ($rowMain = mysql_fetch_assoc($rsMain)); ?>
  <tr>
  <th colspan="12">
  <span style="float:right">Total Amount&nbsp;:&nbsp;<?php echo $Tran_Amt;?></span>
  </th>
  </tr>
  
                                    </tbody>
                                </table>
<?php 
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
}
else if($reportrange == $_REQUEST['reportrange'] && $Trans_Type=='Taka')
{
	
	$query1="SELECT transactions_taka.Trans_Id, transactions_taka.Trans_Invoice_No, transactions_taka.Trans_Date, transactions_taka.Trans_Amt, transactions_taka.Payment_Type, transactions_taka.Bank_Id, transactions_taka.Chq_No, transactions_taka.Chq_Date, transactions_taka.`Description`, transactions_taka.Status, transactions_taka.Entry_Date,transactions_taka.Entry_Id FROM transactions_taka WHERE transactions_taka.Trans_Date between '".$dt."' and '".$dt1."' order by transactions_taka.Trans_Id asc";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
	
    if($totalRowsRsMain==0)
	{
		echo "<center>There is no record</center>";
	}
	else
	{
	?>
    <div align="right">
    <a href="totaltransactionreportprint?print&reportrange=<?php echo $reportrange; ?>&Trans_Type=Taka" target="_blank"><i class="icon-print"></i></a>
  </div>
                             <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                       
                                        <tr> 
                                             <th width="6%">Sr No.</th>
                                             <th width="8%">Trans. ID</th>
                                            <th width="8%">Inv. ID</th>
                                            <th width="11%">Inv. Date</th>
                                            <th width="7%">Inv. Amount</th>
                                            <th width="7%">Payment Type</th>
                                            <th width="15%">Bank</th>
                                            <th width="7%">Cheque No.</th>
                                            <th width="10%">Cheque Date</th>
                                            <th width="5%">Status</th>
                                            <th width="35%">Entry Date</th>
                                            <th width="10%">Entry #ID</th>
                                        </tr>
                                      
                                       </thead>
                                    <tbody>
                                    
                                    <?php $i=0;
	  $i++;?>
      <?php do { ?>
                                       
                                      
  <tr class="odd gradeX"> 
    
    <td><?php echo $i++; ?></td>
     <td><?php echo $rowMain['Trans_Id']; ?></td>
   <td><?php echo $rowMain['Trans_Invoice_No']; ?></td>
    <td><?php echo $rowMain['Trans_Date']; ?></td>
    <td><?php echo $rowMain['Trans_Amt']; ?></td>
    <td><?php echo $rowMain['Payment_Type']; ?></td>
    <td><?php echo $rowMain['Bank_Id']; ?></td>
    <td><?php echo $rowMain['Chq_No']; ?></td>
    <td><?php echo $rowMain['Chq_Date']; ?></td>
    <td><?php echo $rowMain['Status']; ?></td>
    <td><?php echo $rowMain['Entry_Date']; ?></td>
    <td><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
    
  <?php 
  $Tran_Amt = $Tran_Amt + $rowMain['Trans_Amt'];
  } while ($rowMain = mysql_fetch_assoc($rsMain)); ?>
  <tr>
  <th colspan="12">
  <span style="float:right">Total Amount&nbsp;:&nbsp;<?php echo $Tran_Amt;?></span>
  </th>
  </tr>
  
                                    </tbody>
                                </table>
<?php 
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
}
else if($reportrange == $_REQUEST['reportrange'] && $Trans_Type=='Saree')
{
	
	$query1="SELECT transactions_saree.Trans_Id, transactions_saree.Trans_Invoice_No, transactions_saree.Trans_Date, transactions_saree.Trans_Amt, transactions_saree.Payment_Type, transactions_saree.Bank_Id, transactions_saree.Chq_No, transactions_saree.Chq_Date, transactions_saree.`Description`, transactions_saree.Status, transactions_saree.Entry_Date,transactions_saree.Entry_Id FROM transactions_saree WHERE transactions_saree.Trans_Date between '".$dt."' and '".$dt1."' order by transactions_saree.Trans_Id asc";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
    if($totalRowsRsMain==0)
	{
		echo "<center>There is no record</center>";
	}
	else
	{
	?>
    <div align="right">
    <a href="totaltransactionreportprint?print&reportrange=<?php echo $reportrange; ?>&Trans_Type=Saree" target="_blank"><i class="icon-print"></i></a>
  </div>
                             <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                       
                                        <tr> 
                                             <th width="6%">Sr No.</th>
                                             <th width="8%">Trans. ID</th>
                                            <th width="8%">Inv. ID</th>
                                            <th width="11%">Inv. Date</th>
                                            <th width="7%">Inv. Amount</th>
                                            <th width="7%">Payment Type</th>
                                            <th width="15%">Bank</th>
                                            <th width="7%">Cheque No.</th>
                                            <th width="10%">Cheque Date</th>
                                            <th width="5%">Status</th>
                                            <th width="35%">Entry Date</th>
                                            <th width="10%">Entry #ID</th>
                                        </tr>
                                      
                                       </thead>
                                    <tbody>
                                    
                                    <?php $i=0;
	  $i++;?>
      <?php do { ?>
                                       
                                      
  <tr class="odd gradeX"> 
    
    <td><?php echo $i++; ?></td>
     <td><?php echo $rowMain['Trans_Id']; ?></td>
    <td><?php echo $rowMain['Trans_Invoice_No']; ?></td>
    <td><?php echo $rowMain['Trans_Date']; ?></td>
    <td><?php echo $rowMain['Trans_Amt']; ?></td>
    <td><?php echo $rowMain['Payment_Type']; ?></td>
    <td><?php echo $rowMain['Bank_Id']; ?></td>
    <td><?php echo $rowMain['Chq_No']; ?></td>
    <td><?php echo $rowMain['Chq_Date']; ?></td>
    <td><?php echo $rowMain['Status']; ?></td>
    <td><?php echo $rowMain['Entry_Date']; ?></td>
    <td><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
    
  <?php 
  $Tran_Amt = $Tran_Amt + $rowMain['Trans_Amt'];
  } while ($rowMain = mysql_fetch_assoc($rsMain)); ?>
  <tr>
  <th colspan="12">
  <span style="float:right">Total Amount&nbsp;:&nbsp;<?php echo $Tran_Amt;?></span>
  </th>
  </tr>
  
                                    </tbody>
                                </table>
<?php 
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////
else if($reportrange == $_REQUEST['reportrange'])
{
	echo "<center>You cannot search records, only by date range</center>";
}
	}
	?>
    
