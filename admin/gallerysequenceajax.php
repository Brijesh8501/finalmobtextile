<?php
include("databaseconnect.php");
if(isset($_REQUEST['search']))
{
	$sequence = $_REQUEST['sequence'];
	if($sequence=="")
	{
		echo '<script>document.getElementById("check").innerHTML = "* Required";</script>';
		echo '<script>document.getElementById("check").style.color = "#F00";</script>';
	}
	elseif($sequence!=""){
	$select = "select sequence from gallery where sequence = '$sequence'";
	$sel_exe = mysql_query($select);
	$sel_num = mysql_num_rows($sel_exe);
	if($sel_num==0)
	{
echo '<script>document.getElementById("check").innerHTML = "sequence valid to submit";</script>';	
echo '<script>document.getElementById("check").style.color = "#3C0";</script>';	
 } else {
		     echo '<script>document.getElementById("check").innerHTML = "sequence allready exists";</script>';
			 echo '<script>document.getElementById("check").style.color = "#F00";</script>';
			  }}}
?>
			  