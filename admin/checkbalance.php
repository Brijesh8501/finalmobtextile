<?php
include("databaseconnect.php");
if(isset($_REQUEST['checkbalance']))
{
	$Cheque_Amount = $_REQUEST['Cheque_Amount'];
	$Pay_Type = $_REQUEST['Pay_Type'];
	$Bank_Id1 = $_REQUEST['Bank_Id'];
	$Bank_Id = str_replace(","," ",$Bank_Id1);
	if($Pay_Type=='Cash')
	{
	if($Cheque_Amount=="")
	{
		echo '<script>document.getElementById("checkbal").innerHTML = "* Required";</script>';
		echo '<script>document.getElementById("checkbal").style.color = "#F00";</script>';
	}
	elseif($Cheque_Amount!=""){
	$selectcashbalance = "select Current_Amount from cash_capital where Cash_Id = '1'";
	$selcashbalance_exe = mysql_query($selectcashbalance);
	$selcashbalance_fetch = mysql_fetch_array($selcashbalance_exe);
	if($selcashbalance_fetch['Current_Amount']>$Cheque_Amount)
	{
echo '<script>document.getElementById("checkbal").innerHTML = "Cash amount valid to submit";</script>';	
echo '<script>document.getElementById("checkbal").style.color = "#3C0";</script>';	
 } else {
		     echo '<script>document.getElementById("checkbal").innerHTML = "Insufficient cash capital please check capital first !";</script>';
			 echo '<script>document.getElementById("checkbal").style.color = "#F00";</script>';
			  }}
	}
	elseif($Pay_Type!='Cash')
	{
		if($Cheque_Amount=="")
	{
		echo '<script>document.getElementById("checkbal").innerHTML = "* Required";</script>';
		echo '<script>document.getElementById("checkbal").style.color = "#F00";</script>';
	}
	if($Bank_Id=="")
	{
		echo '<script>document.getElementById("checkbaank").innerHTML = "* Required";</script>';
		echo '<script>document.getElementById("checkbaank").style.color = "#F00";</script>';
	}
	elseif($Cheque_Amount!="" && $Bank_Id!=""){
	$selectcashbalance = "select Current_Balance from bank_details where Bank_Name = '$Bank_Id'";
	$selcashbalance_exe = mysql_query($selectcashbalance);
	$selcashbalance_fetch = mysql_fetch_array($selcashbalance_exe);
	if($selcashbalance_fetch['Current_Balance']>$Cheque_Amount)
	{
echo '<script>document.getElementById("checkbal").innerHTML = "Amount valid to submit";</script>';	
echo '<script>document.getElementById("checkbal").style.color = "#3C0";</script>';	
echo '<script>document.getElementById("checkbaank").style.display = "none";</script>';
 } else {
		     echo '<script>document.getElementById("checkbal").innerHTML = "Insufficient cuurent balannce in this account please check first !";</script>';
			 echo '<script>document.getElementById("checkbal").style.color = "#F00";</script>';
			  }}
	}
			  
			  
			  
			  }
			  ?>
			  