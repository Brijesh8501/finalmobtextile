<?php include("databaseconnect.php");
if(isset($_REQUEST['give']))
{
	$Groups1 = $_REQUEST['Groups'];
	$Groups = str_replace(","," ",$Groups1);
	if($Groups=="Firm")
	{ ?>
		<div class="form-group row">
            <div class="col-lg-6">    
            <div class="form-group">
                    <label for="text2" class="control-label col-lg-6">Opening Balance :</label>
                    <div class="col-lg-6">
                        <input type="text" name="Opening_Balance" id="Opening_Balance" class="form-control" onkeypress="return isDecimalNumberKey(event)"/>
                    </div>
                </div>
                </div>
               </div>
               <input type="text" name="P_Name" id="P_Name" value="ST"/>
               <input type="text" name="Party" id="Party" value="---"/>
               <?php
	}
	elseif($Groups=="Personal" || $Groups=="Relative" || $Groups=="Friend")
	{ ?>
		<div class="form-group row">
            <div class="col-lg-6">    
            <div class="form-group">
                    <label for="text2" class="control-label col-lg-6">Name :</label>
                    <div class="col-lg-6">
                        <input type="text" name="P_Name" id="P_Name" class="form-control"/><span id="error4" style="color:#F00";></span>
                    </div>
                </div>
                </div>
               </div>
               <input type="text" name="Opening_Balance" id="Opening_Balance" value="0.00"/>
               <input type="text" name="Party" id="Party" value="---"/>
			   <?php 
	}
	else
	{ ?>
    <div class="form-group row">
            <div class="col-lg-6">
            <div class="form-group">
<label class="control-label col-lg-6">Party :</label>
<div class="col-lg-6">
  <select name="Party" class="form-control" id="Party">
    <option value="">--Select--</option>
    <?php
$selpartyco = "select C_Name from company_deetaails";
$selpartycoexe = mysql_query($selpartyco);

$selpartycu = "select Cu_En_Name from customer_details";
$selpartycuexe = mysql_query($selpartycu);

$selpartybro = "select B_Name from broker_details1";
$selpartybroexe = mysql_query($selpartybro);
if($Groups=='Company' || $Groups=='Company Personal')
{
?><option value="">Company :</option>
<?php while($selpartycofetch = mysql_fetch_array($selpartycoexe)) {
?>
    <option value="<?php echo $selpartycofetch['C_Name']?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $selpartycofetch['C_Name']?></option>
    <?php
} 
}
if($Groups=='Customer' || $Groups=='Customer Personal')
{
?>
<option value="">Customer :</option>
<?php
while($selpartycufetch = mysql_fetch_array($selpartycuexe))
{
?>
 <option value="<?php echo $selpartycufetch['Cu_En_Name']?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $selpartycufetch['Cu_En_Name']?></option>
<?php } } 
if($Groups=='Broker' || $Groups=='Broker') {?>
<option value="">Broker :</option>
<?php
while($selpartybrofetch = mysql_fetch_array($selpartybroexe))
{
?>
 <option value="<?php echo $selpartybrofetch['B_Name']?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $selpartybrofetch['B_Name']?></option>
<?php } } ?>
  </select>
  </div>
</div>
                        </div>
                        </div>
	<input type="text" name="Opening_Balance" id="Opening_Balance" value="0.00"/>
    <input type="text" name="P_Name" id="P_Name" value="---"/>	
	<?php }
}
if(isset($_REQUEST['giveupdate']))
{
	$Bank_Id = $_REQUEST['Bank_Id'];
	$Groups1 = $_REQUEST['Groups'];
	$Groups = str_replace(","," ",$Groups1);
	$sel_bankupd = "select Opening_Balance from bank_details where Bank_Id = '$Bank_Id'";
	$sel_bankupdexe = mysql_query($sel_bankupd);
	$sel_bankupdfetch = mysql_fetch_array($sel_bankupdexe);
	if($Groups=="Personal" || $Groups=="Firm")
	{ ?>
		<div class="form-group row">
            <div class="col-lg-6">    
            <div class="form-group">
                    <label for="text2" class="control-label col-lg-6">Opening Balance :</label>
                    <div class="col-lg-6">
                        <input type="text" name="Opening_Balance" id="Opening_Balance" class="form-control" value="<?php echo $sel_bankupdfetch['Opening_Balance']; ?>" readonly/>
                    </div>
                </div>
                </div>
               </div>
			   <?php 
	}
	else
	{ ?>
	<input type="text" name="Opening_Balance" id="Opening_Balance" value="0.00" readonly/>	
	<?php }
}
?>