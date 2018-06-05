<?php session_start();
include("databaseconnect.php");
    if(isset($_REQUEST['delete_id'])) {
      $ct_id = mysql_real_escape_string($_REQUEST['delete_id']);
	   if(!isset($_SESSION['User']))
		  {
		  }
		  else
		  {
    $result = mysql_query("delete from city1 where ct_id = ".$ct_id);
    if($result !== false) {
        echo 'true';
      }
	  }
    }
?>