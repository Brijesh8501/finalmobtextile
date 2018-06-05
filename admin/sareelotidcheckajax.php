<?php
include("databaseconnect.php");
if(isset($_REQUEST['search']))
{
	$Saree_Lot_Id = $_REQUEST['Saree_Lot_Id'];
	if($Saree_Lot_Id=="")
	{
		echo '<script>document.getElementById("check").innerHTML = "* Required";</script>';
		echo '<script>document.getElementById("check").style.color = "#F00";</script>';
	}
	elseif($Saree_Lot_Id!=""){
	$select = "select Saree_Lot_Id from saree_dcorg where Saree_Lot_Id = '$Saree_Lot_Id' AND Status = 'Sale'";
	$sel_exe = mysql_query($select);
	$sel_num = mysql_num_rows($sel_exe);
	if($sel_num==0)
	{
	$select1 = "select Saree_Lot_Id from saree_d_c_2 where Saree_Lot_Id = '$Saree_Lot_Id' AND Status = 'Sale'";
	$sel_exe1 = mysql_query($select1);
	$sel_num1 = mysql_num_rows($sel_exe1);
	if($sel_num1==0)
	{
	$select_sareepro = "select Saree_Lot_Id from saree_detailsorg where Saree_Lot_Id = '$Saree_Lot_Id'";
	$sel_sar_exe = mysql_query($select_sareepro);
	$sel_sar_num = mysql_num_rows($sel_sar_exe);
	if($sel_sar_num>0)
	{	
echo '<script>document.getElementById("check").innerHTML = "Lot id valid to submit";</script>';	
echo '<script>document.getElementById("check").style.color = "#3C0";</script>';	
	}
	else
	{
		echo '<script>document.getElementById("check").innerHTML = "Invalid Lot id";</script>';	
echo '<script>document.getElementById("check").style.color = "#F00";</script>';	

	}
	}
	else
	{
		 echo '<script>document.getElementById("check").innerHTML = "Lot id allready exists";</script>';
			 echo '<script>document.getElementById("check").style.color = "#F00";</script>';
	}
 } else {
		     echo '<script>document.getElementById("check").innerHTML = "Lot id allready exists";</script>';
			 echo '<script>document.getElementById("check").style.color = "#F00";</script>';
			  }}}?>
			  