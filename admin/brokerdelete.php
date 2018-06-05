<?php session_start();
include("databaseconnect.php");
    if(isset($_REQUEST['delete_id'])) {
      $Broker_Id = mysql_real_escape_string($_REQUEST['delete_id']);
	   if(!isset($_SESSION['User']))
		  {
		  }
		  else
		  {
    $result = mysql_query("delete from broker_details1 where Broker_Id = ".$Broker_Id);
    if($result !== false) {
        echo 'true';
      }
	  }
    }
?>