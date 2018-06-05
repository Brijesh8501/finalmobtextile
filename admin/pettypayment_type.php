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
	$pettystatuschck = "select Status from petty_details where Petty_Id = '$Petty_Id' ";
	$pettystatuschckexe = mysql_query($pettystatuschck);
	$pettystatuschckfetch = mysql_fetch_array($pettystatuschckexe);
	if($Payment_Type=='Cheque')
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
	 $sql = "select * from bank_details where Groups in ('Firm','Personal')";
	 $result = mysql_query($sql);
	while($row = mysql_fetch_array($result))
 {
if($bank_replace==$row['Bank_Name'] )
{
	 echo '<option selected="selected" value="'.$row['Bank_Name'].'">'.$row['Bank_Name'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;##'.$row['P_Name'].'</option>'; 
}
else
{
	 echo '<option value="'.$row['Bank_Name'].'">'.$row['Bank_Name'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;##'.$row['P_Name'].'</option>';
}} ?>
</select>
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
                        <input type="text" name="Cheque_Amount" id="Cheque_Amount" class="form-control" value="<?php echo $Cheque_Amount; ?>"  onkeypress="return isDecimalNumberKey(event)"/>
                    </div>
                </div>
             </div>
             </div>
               </div>
                <div class="form-group row">
               &nbsp;
                  <div class="col-lg-12">
                     <div class="well well-sm">
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
                        <input type="text" name="Cheque_Amount" id="Cheque_Amount" class="form-control" value="<?php echo $Cheque_Amount; ?>" onkeypress="return isDecimalNumberKey(event)" />
                    </div>
                </div>
             </div>
             </div>
               </div>
                <div class="form-group row">
               &nbsp;
                  <div class="col-lg-12">
                     <div class="well well-sm">
               <div class="form-group">
    <label class="control-label col-lg-4">Status :</label>
    <div class="col-lg-8">
      <select name="Status" class="form-control" id="Status">
<option value="">--Select--</option>
<option value="Paid">Paid</option>
    <option value="Pending" <?php if($pettystatuschckfetch['Status']=="Pending") { echo "selected"; }?>>Pending</option>
    <option value="Un-Paid" <?php if($pettystatuschckfetch['Status']=="Un-Paid") { echo "selected"; }?>>Un-Paid</option>
    </select>
    </div>
    </div>
    </div>
    </div>
    </div>
    <?php }
	else if($Payment_Type=='Bank_Charges')
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
	 $sql = "select * from bank_details where Groups in ('Firm','Personal')";
	 $result = mysql_query($sql);
	while($row = mysql_fetch_array($result))
 {
if($bank_replace==$row['Bank_Name'] )
{
	 echo '<option selected="selected" value="'.$row['Bank_Name'].'">'.$row['Bank_Name'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;##'.$row['P_Name'].'</option>'; 
}
else
{
	 echo '<option value="'.$row['Bank_Name'].'">'.$row['Bank_Name'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;##'.$row['P_Name'].'</option>';
}} ?>
</select>
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
                        <input type="text" name="Cheque_Amount" id="Cheque_Amount" class="form-control" value="<?php echo $Cheque_Amount; ?>" onkeypress="return isDecimalNumberKey(event)" />
                    </div>
                </div>
             </div>
             </div>
               </div>
                <div class="form-group row">
               &nbsp;
                  <div class="col-lg-12">
                     <div class="well well-sm">
                   
               <div class="form-group">
    <label class="control-label col-lg-4">Status :</label>
    <div class="col-lg-8">
      <select name="Status" class="form-control" id="Status">
<option value="">--Select--</option>
 <option value="Pending" <?php if($pettystatuschckfetch['Status']=="Pending") { echo "selected"; }?>>Pending</option>
 <option value="Withdrawal" <?php if($pettystatuschckfetch['Status']=="Withdrawal") { echo "selected"; }?>>Withdrawl</option>
    </select>
    </div>
    </div>
    </div>
    </div>
    </div>
               <?php }
			   else if($Payment_Type=='Other_Charges')
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
	 $sql = "select * from bank_details where Groups in ('Firm','Personal')";
	 $result = mysql_query($sql);
	while($row = mysql_fetch_array($result))
 {
if($bank_replace==$row['Bank_Name'] )
{
	 echo '<option selected="selected" value="'.$row['Bank_Name'].'">'.$row['Bank_Name'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;##'.$row['P_Name'].'</option>'; 
}
else
{
	 echo '<option value="'.$row['Bank_Name'].'">'.$row['Bank_Name'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;##'.$row['P_Name'].'</option>';
}} ?>
</select>
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
                        <input type="text" name="Cheque_Amount" id="Cheque_Amount" class="form-control" value="<?php echo $Cheque_Amount; ?>" onkeypress="return isDecimalNumberKey(event)" />
                    </div>
                </div>
             </div>
             </div>
               </div>
                <div class="form-group row">
               &nbsp;
                  <div class="col-lg-12">
                     <div class="well well-sm">
               <div class="form-group">
    <label class="control-label col-lg-4">Status :</label>
    <div class="col-lg-8">
      <select name="Status" class="form-control" id="Status">
<option value="">--Select--</option>
  <option value="Paid" <?php if($pettystatuschckfetch['Status']=="Paid") { echo "selected"; }?>>Paid</option>
    <option value="Pending" <?php if($pettystatuschckfetch['Status']=="Pending") { echo "selected"; }?>>Pending</option>
    <option value="Un-Paid" <?php if($pettystatuschckfetch['Status']=="Un-Paid") { echo "selected"; }?>>Un-Paid</option>
    </select>
    </div>
    </div>
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
	 $sql = "select * from bank_details where Groups in ('Firm','Personal')";
	 $result = mysql_query($sql);
	while($row = mysql_fetch_array($result))
 {
if($bank_replace==$row['Bank_Name'] )
{
	 echo '<option selected="selected" value="'.$row['Bank_Name'].'">'.$row['Bank_Name'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;##'.$row['P_Name'].'</option>'; 
}
else
{
	 echo '<option value="'.$row['Bank_Name'].'">'.$row['Bank_Name'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;##'.$row['P_Name'].'</option>';
}} ?>
</select>
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
                        <input type="text" name="Cheque_Amount" id="Cheque_Amount" class="form-control" value="<?php echo $Cheque_Amount; ?>" onkeypress="return isDecimalNumberKey(event)" />
                    </div>
                </div>
             </div>
             </div>
               </div>
                <div class="form-group row">
               &nbsp;
                  <div class="col-lg-12">
                     <div class="well well-sm">
               <div class="form-group">
    <label class="control-label col-lg-4">Status :</label>
    <div class="col-lg-8">
      <select name="Status" class="form-control" id="Status">
<option value="">--Select--</option>
 <option value="Clearing" <?php if($pettystatuschckfetch['Status']=="Clearing") { echo "selected"; }?>>Clearing</option>
    <option value="Cleared" <?php if($pettystatuschckfetch['Status']=="Cleared") { echo "selected"; }?>>Cleared</option>
    </select>
    </div>
    </div>
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
	 $sql = "select * from bank_details where Groups in ('Firm','Personal')";
	 $result = mysql_query($sql);
	while($row = mysql_fetch_array($result))
 {
if($bank_replace==$row['Bank_Name'] )
{
	 echo '<option selected="selected" value="'.$row['Bank_Name'].'">'.$row['Bank_Name'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;##'.$row['P_Name'].'</option>'; 
}
else
{
	 echo '<option value="'.$row['Bank_Name'].'">'.$row['Bank_Name'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;##'.$row['P_Name'].'</option>';
}} ?>
</select>
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
                        <input type="text" name="Cheque_Amount" id="Cheque_Amount" class="form-control" value="<?php echo $Cheque_Amount; ?>" onkeypress="return isDecimalNumberKey(event)" />
                    </div>
                </div>
             </div>
             </div>
               </div>
                <div class="form-group row">
               &nbsp;
                  <div class="col-lg-12">
                     <div class="well well-sm">
               <div class="form-group">
    <label class="control-label col-lg-4">Status :</label>
    <div class="col-lg-8">
      <select name="Status" class="form-control" id="Status">
<option value="">--Select--</option>
  <option value="Paid" <?php if($pettystatuschckfetch['Status']=="Paid") { echo "selected"; }?>>Paid</option>
    <option value="Pending" <?php if($pettystatuschckfetch['Status']=="Pending") { echo "selected"; }?>>Pending</option>
    <option value="Un-Paid" <?php if($pettystatuschckfetch['Status']=="Un-Paid") { echo "selected"; }?>>Un-Paid</option>
    </select>
    </div>
    </div>
    </div>
    </div>
    </div>
               <?php } } ?>
