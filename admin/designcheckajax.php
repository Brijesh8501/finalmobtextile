<?php
include("databaseconnect.php");
if(isset($_REQUEST['search']))
{
	$Design1 = $_REQUEST['Design'];
	$Design2 = str_replace(","," ",$Design1);
	$Design = strtoupper($Design2);
	if($Design=="")
	{
		echo '<script>document.getElementById("checkno").innerHTML = "* Required";</script>';
		echo '<script>document.getElementById("checkno").style.color = "#F00";</script>';
		echo '<script>document.getElementById("error1").style.display = "none";</script>';
	}
	elseif($Design!=""){
	$select = "select Design from design_details where Design = '$Design'";
	$sel_exe = mysql_query($select);
	$sel_num = mysql_num_rows($sel_exe);
	if($sel_num==0)
	{
echo '<script>document.getElementById("checkno").innerHTML = "design valid to submit";</script>';	
echo '<script>document.getElementById("checkno").style.color = "#3C0";</script>';	
echo '<script>document.getElementById("error1").style.display = "none";</script>';	
 } else {
		     echo '<script>document.getElementById("checkno").innerHTML = "design allready exists";</script>';
			 echo '<script>document.getElementById("checkno").style.color = "#F00";</script>';
			 echo '<script>document.getElementById("error1").style.display = "none";</script>';
			  }}}?>
			  