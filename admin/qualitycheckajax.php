<?php
include("databaseconnect.php");
if(isset($_REQUEST['search']))
{
	$Quality_Name1 = $_REQUEST['Quality_Name'];
	$Quality_Name2 = str_replace(","," ",$Quality_Name1);
	$Quality_Name = strtoupper($Quality_Name2);
	if($Quality_Name=="")
	{
		echo '<script>document.getElementById("checkno").innerHTML = "* Required";</script>';
		echo '<script>document.getElementById("checkno").style.color = "#F00";</script>';
		echo '<script>document.getElementById("error2").style.display = "none";</script>';
	}
	elseif($Quality_Name!=""){
	$select = "select Quality_Name from quality_details where Quality_Name = '$Quality_Name'";
	$sel_exe = mysql_query($select);
	$sel_num = mysql_num_rows($sel_exe);
	if($sel_num==0)
	{
echo '<script>document.getElementById("checkno").innerHTML = "Quality name valid to submit";</script>';	
echo '<script>document.getElementById("checkno").style.color = "#3C0";</script>';	
echo '<script>document.getElementById("error2").style.display = "none";</script>';	
 } else {
		     echo '<script>document.getElementById("checkno").innerHTML = "Quality name allready exists";</script>';
			 echo '<script>document.getElementById("checkno").style.color = "#F00";</script>';
			 echo '<script>document.getElementById("error2").style.display = "none";</script>';
			  }}}
			  ?>
			  