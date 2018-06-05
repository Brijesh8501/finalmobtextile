<?php
include("databaseconnect.php");
if(isset($_REQUEST['search']))
{
	$Labour_Name1 = $_REQUEST['Labour_Name'];
	$Labour_Name2 = str_replace(","," ",$Labour_Name1);
	$Labour_Name = str_replace('\' ', '\'', ucwords(str_replace('\'', '\' ', strtolower($Labour_Name2))));
	if($Labour_Name=="")
	{
		echo '<script>document.getElementById("checkno").innerHTML = "* Required";</script>';
		echo '<script>document.getElementById("checkno").style.color = "#F00";</script>';
		echo '<script>document.getElementById("error1").style.display = "none";</script>';
	}
	elseif($Labour_Name!=""){
	$select = "select Name from labour_details where Name = '$Labour_Name'";
	$sel_exe = mysql_query($select);
	$sel_num = mysql_num_rows($sel_exe);
	if($sel_num==0)
	{
echo '<script>document.getElementById("checkno").innerHTML = "labour name valid to submit";</script>';	
echo '<script>document.getElementById("checkno").style.color = "#3C0";</script>';	
echo '<script>document.getElementById("error1").style.display = "none";</script>';	
 } else {
		     echo '<script>document.getElementById("checkno").innerHTML = "labour name allready exists";</script>';
			 echo '<script>document.getElementById("checkno").style.color = "#F00";</script>';
			 echo '<script>document.getElementById("error1").style.display = "none";</script>';
			  }}}?>
			  