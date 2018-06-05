<?php 
include("databaseconnect.php"); 
if(isset($_GET['Trans_Invoice_No']))
{
	$Trans_Type = $_GET['Trans_Action'];
	$Trans_Invoice_No = $_GET['Trans_Invoice_No'];
	if($Trans_Type=='Beam')
	{
	$Trans_Invoice_No = $_GET['Trans_Invoice_No'];
	$sql= "select Beam_Invoice_Id,Beam_Invoice_Date,Grand_Amt from beam_invoice where Beam_Invoice_Id = '".$Trans_Invoice_No."' ";
	$result = mysql_query($sql);
	$row_result = mysql_fetch_array($result);
	
	 $sqltrans = "select Trans_Date,Trans_Amt from transactions_beam1 where Trans_Invoice_No = '".$Trans_Invoice_No."' ";
	$resulttrans = mysql_query($sqltrans);
	$result_fetchtrans = mysql_fetch_array($resulttrans);
	if($result_fetchtrans['Trans_Amt']==$row_result['Grand_Amt']){
		$checkamtmsg = "";
		
	}
				else
				{
					$checkamtmsg = '<center style="color:#F00;">'."* Amount is changed so update is required / Avoid it ! , for new entry</center>";
				}
		?>
                <div class="form-group row">
               &nbsp;
                <div class="col-lg-12">
                    <div class="well well-sm">
	                 <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Invoice Date :</label>
                    <div class="col-lg-7">
                        <input type="text" name="Trans_Date" id="Trans_Date" class="form-control" value="<?php echo $row_result['Beam_Invoice_Date'];  ?>" readonly="readonly"  />
                    </div>
                </div>
                <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Invoice Amount :</label>
                    <div class="col-lg-7">
                        <input type="text" name="Trans_Amt" id="Trans_Amt" class="form-control" value="<?php echo $row_result['Grand_Amt']; ?>" readonly="readonly" /><?php echo $checkamtmsg;?>
                    </div>
                </div>
               </div>
             </div>
             </div>
                <?php 
}
else if($Trans_Type=='Bobbin')
{
	$Trans_Invoice_No = $_GET['Trans_Invoice_No'];
	$sql= "SELECT Bobbin_Invoice_Id,Bobbin_Invoice_Date,Grand_Amt FROM bobbin_invoice where Bobbin_Invoice_Id = '".$Trans_Invoice_No."' ";
	$result = mysql_query($sql);
	$row_result = mysql_fetch_array($result);
	$sqltrans = "select Trans_Date,Trans_Amt from transactions_bobbin where Trans_Invoice_No = '".$Trans_Invoice_No."' ";
	$resulttrans = mysql_query($sqltrans);
	$result_fetchtrans = mysql_fetch_array($resulttrans);
	if($result_fetchtrans['Trans_Amt']==$row_result['Grand_Amt']){
		$checkamtmsg = "";
		
	}
				else
				{
					$checkamtmsg = '<center style="color:#F00;">'."* Amount is changed so update is required / Avoid it ! , for new entry</center>";
				}
		?>
               <div class="form-group row">
               &nbsp;
                <div class="col-lg-12">
                    <div class="well well-sm">
                    <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Invoice Date :</label>
                    <div class="col-lg-8">
                        <input type="text" name="Trans_Date" id="Trans_Date" class="form-control" value="<?php echo $row_result['Bobbin_Invoice_Date'];  ?>" readonly="readonly"  />
                    </div>
                </div>
                <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Invoice Amount :</label>
                    <div class="col-lg-8">
                        <input type="text" name="Trans_Amt" id="Trans_Amt" class="form-control" value="<?php echo $row_result['Grand_Amt']; ?>" readonly="readonly" /><?php echo $checkamtmsg;?>
                    </div>
                </div>
                    </div>
                    </div>
                    </div>
               <?php
}
else if($Trans_Type=='Taka')
{
	$Trans_Invoice_No = $_GET['Trans_Invoice_No'];
	$sql= "SELECT Taka_Invoice_Id,Taka_Invoice_Date,Grandtotal FROM taka_invoice where Taka_Invoice_Id = '".$Trans_Invoice_No."' ";
	$result = mysql_query($sql);
	$row_result = mysql_fetch_array($result);
	$sqltrans = "select Trans_Date,Trans_Amt from transactions_taka where Trans_Invoice_No = '".$Trans_Invoice_No."' ";
	$resulttrans = mysql_query($sqltrans);
	$result_fetchtrans = mysql_fetch_array($resulttrans);
	if($result_fetchtrans['Trans_Amt']==$row_result['Grandtotal']){
		$checkamtmsg = "";
		
	}
				else
				{
					$checkamtmsg = '<center style="color:#F00;">'."* Amount is changed so update is required / Avoid it ! , for new entry</center>";
				}
		?>
               <div class="form-group row">
               &nbsp;
                <div class="col-lg-12">
                    <div class="well well-sm">
	                 <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Invoice Date :</label>
                    <div class="col-lg-7">
                        <input type="text" name="Trans_Date" id="Trans_Date" class="form-control" value="<?php echo $row_result['Taka_Invoice_Date'];  ?>" readonly="readonly"  />
                    </div>
                </div>
                <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Invoice Amount :</label>
                    <div class="col-lg-7">
                        <input type="text" name="Trans_Amt" id="Trans_Amt" class="form-control" value="<?php echo $row_result['Grandtotal']; ?>" readonly="readonly" /><?php echo $checkamtmsg;?>
                    </div>
                </div>
               </div>
               </div>
               </div>
               <?php
}
else if($Trans_Type=='Saree')
{
	$Trans_Invoice_No = $_GET['Trans_Invoice_No'];
	$sql= "SELECT Saree_Invoice_Id,Saree_Invoice_Date,Grandtotal FROM saree_invoice where Saree_Invoice_Id = '".$Trans_Invoice_No."' ";
	$result = mysql_query($sql);
	$row_result = mysql_fetch_array($result);
	$sqltrans = "select Trans_Date,Trans_Amt from transactions_saree where Trans_Invoice_No = '".$Trans_Invoice_No."' ";
	$resulttrans = mysql_query($sqltrans);
	$result_fetchtrans = mysql_fetch_array($resulttrans);
	if($result_fetchtrans['Trans_Amt']==$row_result['Grandtotal']){
		$checkamtmsg = "";
		
	}
				else
				{
					$checkamtmsg = '<center style="color:#F00;">'."* Amount is changed so update is required / Avoid it ! , for new entry</center>";
				}
		?>
                 <div class="form-group row">
               &nbsp;
                <div class="col-lg-12">
                    <div class="well well-sm">
	                 <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Invoice Date :</label>
                    <div class="col-lg-7">
                        <input type="text" name="Trans_Date" id="Trans_Date" class="form-control" value="<?php echo $row_result['Saree_Invoice_Date'];  ?>" readonly="readonly"  />
                    </div>
                </div>
                <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Invoice Amount :</label>
                    <div class="col-lg-7">
                        <input type="text" name="Trans_Amt" id="Trans_Amt" class="form-control" value="<?php echo $row_result['Grandtotal']; ?>" readonly="readonly" /><?php echo $checkamtmsg;?>
                    </div>
                </div>
               </div>
               </div>
               </div>
               <?php
}
}
?>

