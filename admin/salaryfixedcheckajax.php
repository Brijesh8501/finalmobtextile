<?php
include("databaseconnect.php");
error_reporting(0);
if(isset($_REQUEST['search']))
{ 
$reservation1 = $_REQUEST['reservation'];
	$reservation = explode("-",$reservation1);
	$date = $reservation[0];
	$datechecksecond = strtotime($date);
	$Labour_Id = $_REQUEST['Labour_Id'];

if($datechecksecond!="" && $Labour_Id!=""){
$selcheckdate = "select Date_Range from salary_Fixed_master where Labour_Id = '$Labour_Id' order by Sal_Fixed_Id desc limit 1";
	$selcheckdate_exe = mysql_query($selcheckdate);
	$selcheckdate_fetch = mysql_fetch_array($selcheckdate_exe);
	$datecheckfirst = $selcheckdate_fetch['Date_Range'];
	$datefinal = explode("-",$datecheckfirst);
	$datefulfinal = strtotime($datefinal[1]);
	 if($datechecksecond>$datefulfinal)
	 {
echo '<script>document.getElementById("checkno").innerHTML = "Date range valid to submit";</script>';	
echo '<script>document.getElementById("checkno").style.color = "#3C0";</script>';
echo '<script>document.getElementById("check").style.display = "none";</script>';	
 } else {
		     echo '<script>document.getElementById("checkno").innerHTML = "Please give date range properly";</script>';
			 echo '<script>document.getElementById("checkno").style.color = "#F00";</script>';
			  }
}
else
{
	 		 echo '<script>document.getElementById("check").innerHTML = "Date range and labour both required together";</script>';
			 echo '<script>document.getElementById("check").style.color = "#F00";</script>';
}
			  }?>
			  