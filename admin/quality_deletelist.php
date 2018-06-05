<?php session_start();
include("databaseconnect.php");
    if(isset($_REQUEST['delete_id'])) {
      $Quality_Id = mysql_real_escape_string($_REQUEST['delete_id']);
	   if(!isset($_SESSION['User']))
		  {
		  }
		  else
		  {
    $result = mysql_query("delete from quality_details where Quality_Id = ".$Quality_Id);
    if($result !== false) {
        echo 'true';
      }
	  }
    }
?>