<?php error_reporting(0); 
include("databaseconnect.php");
if(isset($_REQUEST['SearchfreshTra']))
    {   
    $Trans_Typefresh = $_REQUEST['Trans_TypefreshTra'];  
    if($Trans_Typefresh=='Beam')
	{
	$query1 = "SELECT beam_invoice.Beam_Invoice_Id,transactions_beam1.Status,beam_invoice.Grand_Amt,beam_invoice.Beam_Invoice_Date FROM beam_invoice LEFT JOIN transactions_beam1 ON beam_invoice.Beam_Invoice_Id = transactions_beam1.Trans_Invoice_No WHERE transactions_beam1.Status IS NULL";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
	}
	else if($Trans_Typefresh=='Bobbin')
	{
		$query1 = "SELECT bobbin_invoice.Bobbin_Invoice_Id,transactions_bobbin.Status,bobbin_invoice.Grand_Amt,bobbin_invoice.Bobbin_Invoice_Date FROM bobbin_invoice LEFT JOIN transactions_bobbin ON bobbin_invoice.Bobbin_Invoice_Id = transactions_bobbin.Trans_Invoice_No WHERE transactions_bobbin.Status IS NULL";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
	}
	elseif($Trans_Typefresh=='Taka')
	{
		$query1 = "SELECT taka_invoice.Taka_Invoice_Id,transactions_taka.Status,taka_invoice.Grandtotal,taka_invoice.Taka_Invoice_Date FROM taka_invoice LEFT JOIN transactions_taka ON taka_invoice.Taka_Invoice_Id = transactions_taka.Trans_Invoice_No WHERE transactions_taka.Status IS NULL";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
	}
	elseif($Trans_Typefresh=='Saree')
	{
		$query1 = "SELECT saree_invoice.Saree_Invoice_Id,transactions_saree.Status,saree_invoice.Grandtotal,saree_invoice.Saree_Invoice_Date FROM saree_invoice LEFT JOIN transactions_saree ON saree_invoice.Saree_Invoice_Id = transactions_saree.Trans_Invoice_No WHERE transactions_saree.Status IS NULL";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
	}
	}
if($Trans_Typefresh=="")
	{
		echo '<script>alert("Please select fresh type first....");</script>';
	}
else if($totalRowsRsMain==0)
{
	echo "<center>There is no record</center>";
}
else
{
	?>

                                   <?php if($Trans_Typefresh=='Beam'){ 
								   ?>
                                   <div align="right">
<a href="totaltransfreshprint?print&Trans_Typefresh=Beam" target="_blank"><i class="icon-print"></i></a>
</div>
 <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                       <tr> <th width="10%">Sr No.</th>
                                             <th width="15%">Invoice ID</th>
                                             <th width="15%">Grand Total</th>
                                             <th width="15%">Invoice Date</th>
                                        </tr>
                                       </thead>
                                    <tbody>
    <?php
	          $i=0;
	  $i++;
	  
									do { ?>                                    
  <tr class="odd gradeX"> 
  <td><?php echo $i++; ?></td>
     <td><?php echo $rowMain['Beam_Invoice_Id']; ?></td>
     <td><?php echo $rowMain['Grand_Amt']; ?></td>
     <td><?php echo $rowMain['Beam_Invoice_Date']; ?></td>
   </tr>
    <?php 
	$Gr_Amt = $Gr_Amt + $rowMain['Grand_Amt'];
	} while($rowMain=mysql_fetch_assoc($rsMain)); ?>
    <tr>
    <th colspan="4"><span style="float:right">Total Amount&nbsp;:&nbsp;<?php echo $Gr_Amt;?></span></th>
    </tr>
	  </tbody>
                                </table>
	<?php  }
	  else if($Trans_Typefresh=='Bobbin')
	  {
		  ?>
          <div align="right">
<a href="totaltransfreshprint?print&Trans_Typefresh=Bobbin" target="_blank"><i class="icon-print"></i></a>
</div>
 <table class="table table-striped table-bordered table-hover" valign="center">
          <thead>
                                       <tr> <th width="10%">Sr No.</th>
                                             <th width="15%">Invoice ID</th>
                                             <th width="15%">Grand Total</th>
                                             <th width="15%">Invoice Date</th>
                                        </tr>
                                       </thead>
                                    <tbody>
                                    <?php  $i=0;
	  $i++;
		  do { ?>                                    
                                      
  <tr class="odd gradeX"> 
  <td><?php echo $i++; ?></td>
     <td><?php echo $rowMain['Bobbin_Invoice_Id']; ?></td>
     <td><?php echo $rowMain['Grand_Amt']; ?></td>
     <td><?php echo $rowMain['Bobbin_Invoice_Date']; ?></td>
   </tr>
   <?php 
	$Gr_Amt = $Gr_Amt + $rowMain['Grand_Amt'];
	} while($rowMain=mysql_fetch_assoc($rsMain)); ?>
    <tr>
    <th colspan="4"><span style="float:right">Total Amount&nbsp;:&nbsp;<?php echo $Gr_Amt;?></span></th>
    </tr>
	 </tbody>
                                </table>
	<?php  }
	  else if($Trans_Typefresh=='Taka')
	  {
		  ?>
          <div align="right">
<a href="totaltransfreshprint?print&Trans_Typefresh=Taka" target="_blank"><i class="icon-print"></i></a>
</div>
 <table class="table table-striped table-bordered table-hover" valign="center">
          <thead>
                                       <tr> <th width="10%">Sr No.</th>
                                             <th width="15%">Invoice ID</th>
                                             <th width="15%">Grand Total</th>
                                             <th width="15%">Invoice Date</th>
                                        </tr>
                                       </thead>
                                    <tbody>
                                    <?php  $i=0;
	  $i++;
		  do { ?>                                    
                                      
  <tr class="odd gradeX"> 
  <td><?php echo $i++; ?></td>
     <td><?php echo $rowMain['Taka_Invoice_Id']; ?></td>
     <td><?php echo $rowMain['Grandtotal']; ?></td>
     <td><?php echo $rowMain['Taka_Invoice_Date']; ?></td>
   </tr>
    <?php 
	$Gr_Amt = $Gr_Amt + $rowMain['Grandtotal'];
	} while($rowMain=mysql_fetch_assoc($rsMain)); ?>
    <tr>
    <th colspan="4"><span style="float:right">Total Amount&nbsp;:&nbsp;<?php echo $Gr_Amt;?></span></th>
    </tr>
	</tbody>
                                </table>
	<?php  }
	  elseif($Trans_Typefresh=='Saree')
	  {
		  ?>
          <div align="right">
<a href="totaltransfreshprint?print&Trans_Typefresh=Saree" target="_blank"><i class="icon-print"></i></a>
</div>
 <table class="table table-striped table-bordered table-hover" valign="center">
          <thead>
                                       <tr> <th width="10%">Sr No.</th>
                                             <th width="15%">Invoice ID</th>
                                             <th width="15%">Grand Total</th>
                                             <th width="15%">Invoice Date</th>
                                        </tr>
                                       </thead>
                                    <tbody>
                                    <?php  $i=0;
	  $i++;
		  do { ?>                                    
                                      
  <tr class="odd gradeX"> 
  <td><?php echo $i++; ?></td>
     <td><?php echo $rowMain['Saree_Invoice_Id']; ?></td>
     <td><?php echo $rowMain['Grandtotal']; ?></td>
     <td><?php echo $rowMain['Saree_Invoice_Date']; ?></td>
   </tr>
   <?php 
	$Gr_Amt = $Gr_Amt + $rowMain['Grandtotal'];
	} while($rowMain=mysql_fetch_assoc($rsMain)); ?>
    <tr>
    <th colspan="4"><span style="float:right">Total Amount&nbsp;:&nbsp;<?php echo $Gr_Amt;?></span></th>
    </tr><?php
	  }?>
                                    </tbody>
                                </table>
                     
<?php

 } ?>
    
