<?php
include("databaseconnect.php");
if(isset($_REQUEST['search']))
{
	$Name1 = $_REQUEST['Name'];
	$Name2 = str_replace(","," ",$Name1);
	$Name = strtoupper($Name2);
	if($Name=="")
	{
		echo '<script>document.getElementById("checkna").innerHTML = "* Required";</script>';
		echo '<script>document.getElementById("checkna").style.color = "#F00";</script>';
		echo '<script>document.getElementById("error1").style.display = "none";</script>';
	}
	elseif($Name!=""){
	$select = "select Name from registration_details where Name = '$Name'";
	$sel_exe = mysql_query($select);
	$sel_num = mysql_num_rows($sel_exe);
	if($sel_num==0)
	{
echo '<script>document.getElementById("checkna").innerHTML = "Name valid to submit";</script>';	
echo '<script>document.getElementById("checkna").style.color = "#3C0";</script>';	
echo '<script>document.getElementById("error1").style.display = "none";</script>';	
 } else {
		     echo '<script>document.getElementById("checkna").innerHTML = "Name allready exists";</script>';
			 echo '<script>document.getElementById("checkna").style.color = "#F00";</script>';
			 echo '<script>document.getElementById("error1").style.display = "none";</script>';
			  }}}
if(isset($_REQUEST['searchusername']))
{
	$Username1 = $_REQUEST['Username'];
	$Username2 = str_replace(","," ",$Username1);
	$Username = strtoupper($Username2);
	if($Username=="")
	{
		echo '<script>document.getElementById("checkus").innerHTML = "* Required";</script>';
		echo '<script>document.getElementById("checkus").style.color = "#F00";</script>';
		echo '<script>document.getElementById("error3").style.display = "none";</script>';
	}
	elseif($Username!=""){
	$select = "select Username from registration_details where Username = '$Username'";
	$sel_exe = mysql_query($select);
	$sel_num = mysql_num_rows($sel_exe);
	if($sel_num==0)
	{
echo '<script>document.getElementById("checkus").innerHTML = "Username valid to submit";</script>';	
echo '<script>document.getElementById("checkus").style.color = "#3C0";</script>';	
echo '<script>document.getElementById("error3").style.display = "none";</script>';	
 } else {
		     echo '<script>document.getElementById("checkus").innerHTML = "Username allready exists";</script>';
			 echo '<script>document.getElementById("checkus").style.color = "#F00";</script>';
			 echo '<script>document.getElementById("error3").style.display = "none";</script>';
			  }}}			  
if(isset($_REQUEST['searchemailid']))
{
	$Email_Id1 = $_REQUEST['Email_Id'];
	$Email_Id = str_replace(","," ",$Email_Id1);
	if($Email_Id=="")
	{
		echo '<script>document.getElementById("checkem").innerHTML = "* Required";</script>';
		echo '<script>document.getElementById("checkem").style.color = "#F00";</script>';
	}
	elseif($Email_Id!=""){
	$select = "select Email_Id from registration_details where Email_Id = '$Email_Id'";
	$sel_exe = mysql_query($select);
	$sel_num = mysql_num_rows($sel_exe);
	if($sel_num==0)
	{
echo '<script>document.getElementById("checkem").innerHTML = "Email id valid to submit";</script>';	
echo '<script>document.getElementById("checkem").style.color = "#3C0";</script>';	
 } else {
		     echo '<script>document.getElementById("checkem").innerHTML = "Email id allready exists";</script>';
			 echo '<script>document.getElementById("checkem").style.color = "#F00";</script>';
			  }}}					  
			  ?>
			  