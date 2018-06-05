<?php
include("databaseconnect.php");
if(isset($_REQUEST['search']))
{
	$beamno1 = $_REQUEST['beamno'];
	$beamno = str_replace(","," ",$beamno1);;
	if($beamno=="")
	{
		echo '<script>document.getElementById("check").innerHTML = "* Required";</script>';
		echo '<script>document.getElementById("check").style.color = "#F00";</script>';
		echo '<script>document.getElementById("error2").style.display = "none";</script>';
	}
	elseif($beamno!=""){
	$select = "select Beam_No from beam_dcorg where Beam_No = '$beamno'";
	$sel_exe = mysql_query($select);
	$sel_num = mysql_num_rows($sel_exe);
	if($sel_num==0)
	{
		$select1 = "select Beam_No from beam_d_c_2 where Beam_No = '$beamno'";
	$sel_exe1 = mysql_query($select1);
	$sel_num1 = mysql_num_rows($sel_exe1);
	if($sel_num1==0)
	{
echo '<script>document.getElementById("check").innerHTML = "Beam no valid to submit";</script>';	
echo '<script>document.getElementById("check").style.color = "#3C0";</script>';	
echo '<script>document.getElementById("error2").style.display = "none";</script>';	
 } else {
		     echo '<script>document.getElementById("check").innerHTML = "beam no allready exists";</script>';
			 echo '<script>document.getElementById("check").style.color = "#F00";</script>';
			 echo '<script>document.getElementById("error2").style.display = "none";</script>';
			  }
	}
			  else
			  {
		    echo '<script>document.getElementById("check").innerHTML = "beam no allready exists";</script>';
			 echo '<script>document.getElementById("check").style.color = "#F00";</script>';
			 echo '<script>document.getElementById("error2").style.display = "none";</script>';
			  }
			  
			  }}?>
			  