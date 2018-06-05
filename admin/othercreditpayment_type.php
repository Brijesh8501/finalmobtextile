<script src="assets/js/googleapi.js"></script>
<script>
         $(document).ready(function () {
			 $("#Cheque_Amount,#Bank_Id").blur(function(){
		t1=$("#Cheque_Amount").val();
		t2=$("#Pay_Type").val();
		t3=$("#Bank_Id").val().split(" ");
		var q="?Cheque_Amount="+t1+"&Pay_Type="+t2+"&Bank_Id="+t3+"&checkbalance=checkbalance";
		alert(q);
		$("#balance").load("checkbalance.php"+q);
	});
		 });
	</script>
<?php include("pettytransijquery.php");error_reporting(0);include("databaseconnect.php");
if(isset($_GET['Payment_Typepetty']))
{
	$Payment_Type = $_GET['Payment_Typepetty'];
	$Bank_Id = $_GET['Bank_Id'];
	$bank_replace = str_replace(","," ",$Bank_Id);
	$Cheque_No = $_GET['Cheque_No'];
	$Cheque_Amount = $_GET['Cheque_Amount'];
	$Date1 = $_GET['Date1'];
	$Petty_Id = $_GET['Petty_Id'];
	$pettystatuschck = "select Status from other_credit_details where Petty_Id = '$Petty_Id' ";
	$pettystatuschckexe = mysql_query($pettystatuschck);
	$pettystatuschckfetch = mysql_fetch_array($pettystatuschckexe);
	?>
	<input type="text" name="Pay_Type" id="Pay_Type" value="<?php echo $Payment_Type;?>"/><span id="balance"></span>
	<?php if($Payment_Type=='Cheque')
	{
		?>
                     <div class="form-group row">
               &nbsp;
                  <div class="col-lg-12">
                     <div class="well well-sm">
                     <div class="form-group">
<label class="control-label col-lg-4">Bank :</label>
<div class="col-lg-8">
  <select name="Bank_Id" class="form-control" id="Bank_Id">
    <option value="">--Select--</option>
     <?php 
	 $sql = "select * from bank_details where Groups='Firm'";
	 $result = mysql_query($sql);
	while($row = mysql_fetch_array($result))
 {
if($bank_replace==$row['Bank_Name'] )
{
	if($row['Party']=='---')
	{
	 echo '<option selected="selected" value="'.$row['Bank_Name'].'">'.$row['Bank_Name'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;##'.$row['P_Name'].'</option>'; 
	}
	if($row['Party']!='---')
	{
	 echo '<option selected="selected" value="'.$row['Bank_Name'].'">'.$row['Bank_Name'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;##'.$row['Party'].'</option>'; 
	}
}
else
{
	if($row['Party']=='---')
	{
	 echo '<option value="'.$row['Bank_Name'].'">'.$row['Bank_Name'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;##'.$row['P_Name'].'</option>';
	 }
	if($row['Party']!='---')
	{
	 echo '<option value="'.$row['Bank_Name'].'">'.$row['Bank_Name'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;##'.$row['Party'].'</option>';
	}
}} ?>
</select><span id="checkbaank"></span>
 </div>
</div>
                     <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Cheque No :</label>
                    <div class="col-lg-8">
                        <input type="text" name="Cheque_No" id="Cheque_No" class="form-control" value="<?php echo $Cheque_No; ?>"  /><span id="error3" style="color:#F00";></span>
                    </div>
                </div>
                 <div class="form-group">
                        <label class="control-label col-lg-4">Date :</label>
                        <div class="col-lg-8">
                            <div class="input-group">
                                <input class="form-control" type="text" data-mask="9999-99-99" name="Date1" id="Date1" value="<?php echo $Date1; ?>"/>
                                <span class="input-group-addon">9999-99-99</span>
                            </div>
                        </div>
                    </div>
                 <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Cheque Amount :</label>
                    <div class="col-lg-8">
                        <input type="text" name="Cheque_Amount" id="Cheque_Amount" class="form-control" value="<?php echo $Cheque_Amount; ?>"  onkeypress="return isDecimalNumberKey(event)"/><span id="checkbal"></span>
                    </div>
                </div>
             </div>
             </div>
               </div>
                <div class="form-group row">
               &nbsp;
                  <div class="col-lg-12">
                     <div class="well well-sm">
                      <?php if($pettystatuschckfetch['Status']=="Cleared" || $pettystatuschckfetch['Status']=="Received" || $pettystatuschckfetch['Status']=="Deposited" || $pettystatuschckfetch['Status']=="Transferred")
					 { ?>	
                      <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Status :</label>
                    <div class="col-lg-8">
<input type="text" name="Status" id="Status" class="form-control" value="Cleared" readonly="readonly"/>                     </div>					 
					 <?php }
					 else
					 { ?>
               <div class="form-group">
    <label class="control-label col-lg-4">Status :</label>
    <div class="col-lg-8">
      <select name="Status" class="form-control" id="Status">
<option value="">--Select--</option>
 <option value="Clearing" <?php if($pettystatuschckfetch['Status']=="Clearing") { echo "selected"; }?>>Clearing</option>
    <option value="Cleared" <?php if($pettystatuschckfetch['Status']=="Cleared") { echo "selected"; }?>>Cleared</option>
    <option value="Return" <?php if($pettystatuschckfetch['Status']=="Return") { echo "selected"; }?>>Return</option>
    <option value="Bounce" <?php if($pettystatuschckfetch['Status']=="Bounce") { echo "selected"; }?>>Bounce</option>
    </select>
    </div>
    </div>
    <?php } ?>
    </div>
    </div>
    </div>
                <?php 
}
else if($Payment_Type=='Cash')
{
	?>
    <input type="hidden" name="Bank_Id" id="Bank_Id" value="---"  />
	<input type="hidden" name="Cheque_No" id="Cheque_No" value="---"  />
    <div class="form-group row">
               &nbsp;
                  <div class="col-lg-12">
                     <div class="well well-sm">
                     <div class="form-group">
                        <label class="control-label col-lg-4">Date</label>
                        <div class="col-lg-8">
                            <div class="input-group">
                                <input class="form-control" type="text" data-mask="9999-99-99" name="Date1" id="Date1" value="<?php echo $Date1; ?>"/>
                                <span class="input-group-addon">9999-99-99</span>
                            </div>
                        </div>
                    </div>
                      <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Cash Amount :</label>
                    <div class="col-lg-8">
                        <input type="text" name="Cheque_Amount" id="Cheque_Amount" class="form-control" value="<?php echo $Cheque_Amount; ?>" onkeypress="return isDecimalNumberKey(event)" /><span id="checkbal"></span>
                    </div>
                </div>
             </div>
             </div>
               </div>
                <div class="form-group row">
               &nbsp;
                  <div class="col-lg-12">
                     <div class="well well-sm">
                      <?php if($pettystatuschckfetch['Status']=="Cleared" || $pettystatuschckfetch['Status']=="Received" || $pettystatuschckfetch['Status']=="Deposited" || $pettystatuschckfetch['Status']=="Transferred")
					 { ?>	
                      <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Status :</label>
                    <div class="col-lg-8">
<input type="text" name="Status" id="Status" class="form-control" value="Received" readonly="readonly"/>                     </div>					 
					 <?php }
					 else
					 { ?>
               <div class="form-group">
    <label class="control-label col-lg-4">Status :</label>
    <div class="col-lg-8">
      <select name="Status" class="form-control" id="Status">
<option value="">--Select--</option>
<option value="Received" <?php if($pettystatuschckfetch['Status']=="Received") { echo "selected"; }?>>Received</option>
    <option value="Pending" <?php if($pettystatuschckfetch['Status']=="Pending") { echo "selected"; }?>>Pending</option>
    <option value="Not-Received" <?php if($pettystatuschckfetch['Status']=="Not-Received") { echo "selected"; }?>>Not-Received</option>
    </select>
    </div>
    </div>
    <?php } ?>
    </div>
    </div>
    </div>
    <?php }
	else if($Payment_Type=='Bank_Interest')
{
	?>
  <input type="hidden" name="Cheque_No" id="Cheque_No" value="---"  />
    <div class="form-group row">
               &nbsp;
                  <div class="col-lg-12">
                     <div class="well well-sm">
                     <div class="form-group">
<label class="control-label col-lg-4">Bank :</label>
<div class="col-lg-8">
  <select name="Bank_Id" class="form-control" id="Bank_Id">
    <option value="">--Select--</option>
     <?php 
	 $sql = "select * from bank_details where Groups='Firm'";
	 $result = mysql_query($sql);
	while($row = mysql_fetch_array($result))
 {
if($bank_replace==$row['Bank_Name'] )
{
	if($row['Party']=='---')
	{
	 echo '<option selected="selected" value="'.$row['Bank_Name'].'">'.$row['Bank_Name'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;##'.$row['P_Name'].'</option>'; 
	}
	if($row['Party']!='---')
	{
	 echo '<option selected="selected" value="'.$row['Bank_Name'].'">'.$row['Bank_Name'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;##'.$row['Party'].'</option>'; 
	}
}
else
{
	if($row['Party']=='---')
	{
	 echo '<option value="'.$row['Bank_Name'].'">'.$row['Bank_Name'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;##'.$row['P_Name'].'</option>';
	 }
	if($row['Party']!='---')
	{
	 echo '<option value="'.$row['Bank_Name'].'">'.$row['Bank_Name'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;##'.$row['Party'].'</option>';
	}
}} ?>
</select><span id="checkbaank"></span>
 </div>
</div>
                     <div class="form-group">
                        <label class="control-label col-lg-4">Date</label>
                        <div class="col-lg-8">
                            <div class="input-group">
                                <input class="form-control" type="text" data-mask="9999-99-99" name="Date1" id="Date1" value="<?php echo $Date1; ?>"/>
                                <span class="input-group-addon">9999-99-99</span>
                            </div>
                        </div>
                    </div>
                      <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Amount :</label>
                    <div class="col-lg-8">
                        <input type="text" name="Cheque_Amount" id="Cheque_Amount" class="form-control" value="<?php echo $Cheque_Amount; ?>" onkeypress="return isDecimalNumberKey(event)" /><span id="checkbal"></span>
                    </div>
                </div>

             </div>
             </div>
               </div>
                <div class="form-group row">
               &nbsp;
                  <div class="col-lg-12">
                     <div class="well well-sm">
                    <?php if($pettystatuschckfetch['Status']=="Cleared" || $pettystatuschckfetch['Status']=="Received" || $pettystatuschckfetch['Status']=="Deposited" || $pettystatuschckfetch['Status']=="Transferred")
					 { ?>	
                      <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Status :</label>
                    <div class="col-lg-8">
<input type="text" name="Status" id="Status" class="form-control" value="Deposited" readonly="readonly"/>                     	</div>				 
					 <?php }
					 else
					 { ?>
               <div class="form-group">
    <label class="control-label col-lg-4">Status :</label>
    <div class="col-lg-8">
      <select name="Status" class="form-control" id="Status">
<option value="">--Select--</option>
 <option value="Pending" <?php if($pettystatuschckfetch['Status']=="Pending") { echo "selected"; }?>>Pending</option>
 <option value="Deposited" <?php if($pettystatuschckfetch['Status']=="Deposited") { echo "selected"; }?>>Deposited</option>
    </select>
    </div>
    </div>
    <?php } ?>
    </div>
    </div>
    </div>
               <?php }
			   else if($Payment_Type=='Other_Interest')
{
	?>
  <input type="hidden" name="Cheque_No" id="Cheque_No" value="---"  />
    <div class="form-group row">
               &nbsp;
                  <div class="col-lg-12">
                     <div class="well well-sm">
                     <div class="form-group">
<label class="control-label col-lg-4">Bank :</label>
<div class="col-lg-8">
  <select name="Bank_Id" class="form-control" id="Bank_Id">
    <option value="">--Select--</option>
     <?php 
	 $sql = "select * from bank_details where Groups='Firm'";
	 $result = mysql_query($sql);
	while($row = mysql_fetch_array($result))
 {
if($bank_replace==$row['Bank_Name'] )
{
	if($row['Party']=='---')
	{
	 echo '<option selected="selected" value="'.$row['Bank_Name'].'">'.$row['Bank_Name'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;##'.$row['P_Name'].'</option>'; 
	}
	if($row['Party']!='---')
	{
	 echo '<option selected="selected" value="'.$row['Bank_Name'].'">'.$row['Bank_Name'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;##'.$row['Party'].'</option>'; 
	}
}
else
{
	if($row['Party']=='---')
	{
	 echo '<option value="'.$row['Bank_Name'].'">'.$row['Bank_Name'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;##'.$row['P_Name'].'</option>';
	 }
	if($row['Party']!='---')
	{
	 echo '<option value="'.$row['Bank_Name'].'">'.$row['Bank_Name'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;##'.$row['Party'].'</option>';
	}
}} ?>
</select><span id="checkbaank"></span>
 </div>
</div>
                     <div class="form-group">
                        <label class="control-label col-lg-4">Date</label>
                        <div class="col-lg-8">
                            <div class="input-group">
                                <input class="form-control" type="text" data-mask="9999-99-99" name="Date1" id="Date1" value="<?php echo $Date1; ?>"/>
                                <span class="input-group-addon">9999-99-99</span>
                            </div>
                        </div>
                    </div>
                      <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Amount :</label>
                    <div class="col-lg-8">
                        <input type="text" name="Cheque_Amount" id="Cheque_Amount" class="form-control" value="<?php echo $Cheque_Amount; ?>" onkeypress="return isDecimalNumberKey(event)" /><span id="checkbal"></span>
                    </div>
                </div>
             </div>
             </div>
               </div>
                <div class="form-group row">
               &nbsp;
                  <div class="col-lg-12">
                     <div class="well well-sm">
                      <?php if($pettystatuschckfetch['Status']=="Cleared" || $pettystatuschckfetch['Status']=="Received" || $pettystatuschckfetch['Status']=="Deposited" || $pettystatuschckfetch['Status']=="Transferred")
					 { ?>
                      <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Status :</label>
                    <div class="col-lg-8">	
<input type="text" name="Status" id="Status" class="form-control" value="Received" readonly="readonly"/>                     </div>					 
					 <?php }
					 else
					 { ?>
               <div class="form-group">
    <label class="control-label col-lg-4">Status :</label>
    <div class="col-lg-8">
      <select name="Status" class="form-control" id="Status">
<option value="">--Select--</option>
  <option value="Received" <?php if($pettystatuschckfetch['Status']=="Received") { echo "selected"; }?>>Received</option>
    <option value="Pending" <?php if($pettystatuschckfetch['Status']=="Pending") { echo "selected"; }?>>Pending</option>
    <option value="Not-Received" <?php if($pettystatuschckfetch['Status']=="Not-Received") { echo "selected"; }?>>Not-Received</option>
    </select>
    </div>
    </div>
    <?php } ?>
    </div>
    </div>
    </div>
               <?php }
			   else if($Payment_Type=='RTGS')
{
	?>
  <input type="hidden" name="Cheque_No" id="Cheque_No" value="---"  />
    <div class="form-group row">
               &nbsp;
                  <div class="col-lg-12">
                     <div class="well well-sm">
                     <div class="form-group">
<label class="control-label col-lg-4">Bank :</label>
<div class="col-lg-8">
  <select name="Bank_Id" class="form-control" id="Bank_Id">
    <option value="">--Select--</option>
     <?php 
	 $sql = "select * from bank_details where Groups='Firm'";
	 $result = mysql_query($sql);
	while($row = mysql_fetch_array($result))
 {
if($bank_replace==$row['Bank_Name'] )
{
	if($row['Party']=='---')
	{
	 echo '<option selected="selected" value="'.$row['Bank_Name'].'">'.$row['Bank_Name'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;##'.$row['P_Name'].'</option>'; 
	}
	if($row['Party']!='---')
	{
	 echo '<option selected="selected" value="'.$row['Bank_Name'].'">'.$row['Bank_Name'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;##'.$row['Party'].'</option>'; 
	}
}
else
{
	if($row['Party']=='---')
	{
	 echo '<option value="'.$row['Bank_Name'].'">'.$row['Bank_Name'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;##'.$row['P_Name'].'</option>';
	 }
	if($row['Party']!='---')
	{
	 echo '<option value="'.$row['Bank_Name'].'">'.$row['Bank_Name'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;##'.$row['Party'].'</option>';
	}
}} ?>
</select><span id="checkbaank"></span>
 </div>
</div>
                     <div class="form-group">
                        <label class="control-label col-lg-4">Date</label>
                        <div class="col-lg-8">
                            <div class="input-group">
                                <input class="form-control" type="text" data-mask="9999-99-99" name="Date1" id="Date1" value="<?php echo $Date1; ?>"/>
                                <span class="input-group-addon">9999-99-99</span>
                            </div>
                        </div>
                    </div>
                      <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Amount :</label>
                    <div class="col-lg-8">
                        <input type="text" name="Cheque_Amount" id="Cheque_Amount" class="form-control" value="<?php echo $Cheque_Amount; ?>" onkeypress="return isDecimalNumberKey(event)" /><span id="checkbal"></span>
                    </div>
                </div>
             </div>
             </div>
               </div>
                <div class="form-group row">
               &nbsp;
                  <div class="col-lg-12">
                     <div class="well well-sm">
                      <?php if($pettystatuschckfetch['Status']=="Cleared" || $pettystatuschckfetch['Status']=="Received" || $pettystatuschckfetch['Status']=="Deposited" || $pettystatuschckfetch['Status']=="Transferred")
					 { ?>	
                      <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Status :</label>
                    <div class="col-lg-8">
<input type="text" name="Status" id="Status" class="form-control" value="Transferred" readonly="readonly"/>                     	</div>				 
					 <?php }
					 else
					 { ?>
               <div class="form-group">
    <label class="control-label col-lg-4">Status :</label>
    <div class="col-lg-8">
      <select name="Status" class="form-control" id="Status">
<option value="">--Select--</option>
 <option value="Transferred" <?php if($pettystatuschckfetch['Status']=="Transferred") { echo "selected"; }?>>Transferred</option>
    <option value="Pending" <?php if($pettystatuschckfetch['Status']=="Pending") { echo "selected"; }?>>Pending</option>
    <option value="Not-Transferred" <?php if($pettystatuschckfetch['Status']=="Not-Transferred") { echo "selected"; }?>>Not-Transferred</option>
    </select>
    </div>
    </div>
    <?php } ?>
    </div>
    </div>
    </div>
               <?php }
			   else if($Payment_Type=='Online')
{
	?>
   <input type="hidden" name="Cheque_No" id="Cheque_No" value="---"  />
    <div class="form-group row">
               &nbsp;
                  <div class="col-lg-12">
                     <div class="well well-sm">
                     <div class="form-group">
<label class="control-label col-lg-4">Bank :</label>
<div class="col-lg-8">
  <select name="Bank_Id" class="form-control" id="Bank_Id">
    <option value="">--Select--</option>
     <?php 
	 $sql = "select * from bank_details where Groups='Firm'";
	 $result = mysql_query($sql);
	while($row = mysql_fetch_array($result))
 {
if($bank_replace==$row['Bank_Name'] )
{
	if($row['Party']=='---')
	{
	 echo '<option selected="selected" value="'.$row['Bank_Name'].'">'.$row['Bank_Name'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;##'.$row['P_Name'].'</option>'; 
	}
	if($row['Party']!='---')
	{
	 echo '<option selected="selected" value="'.$row['Bank_Name'].'">'.$row['Bank_Name'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;##'.$row['Party'].'</option>'; 
	}
}
else
{
	if($row['Party']=='---')
	{
	 echo '<option value="'.$row['Bank_Name'].'">'.$row['Bank_Name'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;##'.$row['P_Name'].'</option>';
	 }
	if($row['Party']!='---')
	{
	 echo '<option value="'.$row['Bank_Name'].'">'.$row['Bank_Name'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;##'.$row['Party'].'</option>';
	}
}} ?>
</select><span id="checkbaank"></span>
 </div>
</div>
                     <div class="form-group">
                        <label class="control-label col-lg-4">Date</label>
                        <div class="col-lg-8">
                            <div class="input-group">
                                <input class="form-control" type="text" data-mask="9999-99-99" name="Date1" id="Date1" value="<?php echo $Date1; ?>"/>
                                <span class="input-group-addon">9999-99-99</span>
                            </div>
                        </div>
                    </div>
                      <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Amount :</label>
                    <div class="col-lg-8">
                        <input type="text" name="Cheque_Amount" id="Cheque_Amount" class="form-control" value="<?php echo $Cheque_Amount; ?>" onkeypress="return isDecimalNumberKey(event)" /><span id="checkbal"></span>
                    </div>
                </div>
             </div>
             </div>
               </div>
                <div class="form-group row">
               &nbsp;
                  <div class="col-lg-12">
                     <div class="well well-sm">
                     <?php if($pettystatuschckfetch['Status']=="Cleared" || $pettystatuschckfetch['Status']=="Received" || $pettystatuschckfetch['Status']=="Deposited" || $pettystatuschckfetch['Status']=="Transferred")
					 { ?>	
                      <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Status :</label>
                    <div class="col-lg-8">
<input type="text" name="Status" id="Status" class="form-control" value="Transferred" readonly="readonly"/>                     	</div>				 
					 <?php }
					 else
					 { ?>
                <div class="form-group">
    <label class="control-label col-lg-4">Status :</label>
    <div class="col-lg-8">
      <select name="Status" class="form-control" id="Status">
<option value="">--Select--</option>
  <option value="Transferred" <?php if($pettystatuschckfetch['Status']=="Transferred") { echo "selected"; }?>>Transferred</option>
    <option value="Pending" <?php if($pettystatuschckfetch['Status']=="Pending") { echo "selected"; }?>>Pending</option>
    <option value="Not-Transferred" <?php if($pettystatuschckfetch['Status']=="Not-Transfered") { echo "selected"; }?>>Not-Transferred</option>
    </select>
    </div>
    </div>
    <?php } ?>
    </div>
    </div>
    </div>
               <?php } } ?>
