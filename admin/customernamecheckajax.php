<?php
include("databaseconnect.php");
if(isset($_REQUEST['search']))
{
	$Cu_En_Name1 = $_REQUEST['Cu_En_Name'];
	$Cu_En_Name2 = str_replace(","," ",$Cu_En_Name1);
	$Cu_En_Name = strtoupper($Cu_En_Name2);
	if($Cu_En_Name=="")
	{
		echo '<script>document.getElementById("checkno").innerHTML = "* Required";</script>';
		echo '<script>document.getElementById("checkno").style.color = "#F00";</script>';
		echo '<script>document.getElementById("error1").style.display = "none";</script>';
	}
	elseif($Cu_En_Name!=""){
	$select = "select Cu_En_Name from customer_details where Cu_En_Name = '$Cu_En_Name'";
	$sel_exe = mysql_query($select);
	$sel_num = mysql_num_rows($sel_exe);
	if($sel_num==0)
	{
echo '<script>document.getElementById("checkno").innerHTML = "customer name valid to submit";</script>';	
echo '<script>document.getElementById("checkno").style.color = "#3C0";</script>';	
echo '<script>document.getElementById("error1").style.display = "none";</script>';	
 } else {
		     echo '<script>document.getElementById("checkno").innerHTML = "customer name allready exists";</script>';
			 echo '<script>document.getElementById("checkno").style.color = "#F00";</script>';
			 echo '<script>document.getElementById("error1").style.display = "none";</script>';
			  }}}?>
			  