<?php
ob_start();
	session_start();
	
	date_default_timezone_set("Asia/Calcutta");
    $dateact = date('Y-m-d');
	$dateactfull = date('d-m-Y        h:i:s A');
	
	if(isset($_SESSION['User']))
	{
		$admin = $_SESSION['User'];
	    include("databaseconnect.php");
		$sql= "SELECT registration_details.Registration_Id, registration_details.Role, registration_details.Name, registration_details.Username,registration_details.Photo FROM registration_details WHERE registration_details.Username='".$admin."' ";
		$result = mysql_query($sql);
		$row_result = mysql_fetch_array($result);
	}
	$Partact = "Logout Entry<br/>Logout : ".$row_result['Username'];
	$insactivity = "insert into activity(Activity_Id,Date,Particular,Type,Action,Datefull,Id) values(NULL,'$dateact','$Partact','Logout','update','$dateactfull','$Entry_Id')";
	mysql_query($insactivity); 
	
	session_destroy();
	header("location:loginadmin");
	?>
