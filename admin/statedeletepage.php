<?php session_start();
include("databaseconnect.php");
    if(isset($_REQUEST['delete_id'])) {
      $st_id = mysql_real_escape_string($_REQUEST['delete_id']);
	   if(!isset($_SESSION['User']))
		  {
		  }
		  else
		  {
    $result = mysql_query("delete from state1 where st_id = ".$st_id);
    if($result !== false) {
        echo 'true';
      }
    }
    }
?>