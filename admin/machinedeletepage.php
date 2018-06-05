<?php session_start();
include("databaseconnect.php");
    if(isset($_REQUEST['delete_id'])) {
      $Machine_Id = mysql_real_escape_string($_REQUEST['delete_id']);
	   if(!isset($_SESSION['User']))
		  {
		  }
		  else
		  {
    $result = mysql_query("delete from machine_details where Machine_Id = ".$Machine_Id);
    if($result !== false) {
        echo 'true';
      }
	  }
    }
?>