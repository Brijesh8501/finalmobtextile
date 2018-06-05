<?php session_start(); ob_start();
if(!isset($_SESSION['User']))
{
$insertGoTo = "loginadmin.php?msg";
  echo '<script>window.location="'.$insertGoTo.'";</script>';	
}
if(isset($_SESSION['User']))
	{
		$admin = $_SESSION['User'];
	    include("databaseconnect.php");
		$sql= "SELECT registration_details.Registration_Id, registration_details.Role, registration_details.Name, registration_details.Username,registration_details.Photo FROM registration_details WHERE registration_details.Username='".$admin."' ";
		$result = mysql_query($sql);
		$row_result = mysql_fetch_array($result);
	}
	?>
