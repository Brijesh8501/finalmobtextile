<?php
include("databaseconnect.php");
if(isset($_REQUEST['search']))
{
	$countryname_11 = $_REQUEST['countryname_1'];
	$countryname_1 = str_replace(","," ",$countryname_11);;
	if($countryname_1=="")
	{
		echo '<script>document.getElementById("check").innerHTML = "* Required";</script>';
		echo '<script>document.getElementById("check").style.color = "#F00";</script>';
	}
	elseif($countryname_1!=""){
	$select = "select Taka_Id from taka_dcorg where Taka_Id = '$countryname_1' AND Status = 'Sale'";
	$sel_exe = mysql_query($select);
	$sel_num = mysql_num_rows($sel_exe);
	if($sel_num==0)
	{
	$select1 = "select Taka_Id from taka_d_c_2 where Taka_Id = '$countryname_1' AND Status = 'Sale'";
	$sel_exe1 = mysql_query($select1);
	$sel_num1 = mysql_num_rows($sel_exe1);
	if($sel_num1==0)
	{
	$select_takapro = "select Taka_Id from taka_detailsorg where Taka_Id = '$countryname_1'";
	$sel_tak_exe = mysql_query($select_takapro);
	$sel_tak_num = mysql_num_rows($sel_tak_exe);
	if($sel_tak_num>0)
	{	
echo '<script>document.getElementById("check").innerHTML = "Taka id valid to submit";</script>';	
echo '<script>document.getElementById("check").style.color = "#3C0";</script>';	
	}
	else
	{
		echo '<script>document.getElementById("check").innerHTML = "Invalid taka id";</script>';	
echo '<script>document.getElementById("check").style.color = "#F00";</script>';	

	}
	}
	else
	{
		 echo '<script>document.getElementById("check").innerHTML = "Taka id allready exists";</script>';
			 echo '<script>document.getElementById("check").style.color = "#F00";</script>';
	}
 } else {
		     echo '<script>document.getElementById("check").innerHTML = "Taka id allready exists";</script>';
			 echo '<script>document.getElementById("check").style.color = "#F00";</script>';
			  }}}?>
			  