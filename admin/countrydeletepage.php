<?php session_start();
include("databaseconnect.php");
    if(isset($_REQUEST['delete_id'])) {
      $cnt_id = mysql_real_escape_string($_REQUEST['delete_id']);
	   if(!isset($_SESSION['User']))
		  {
		  }
		  else
		  {
    $result = mysql_query("delete from country1 where cnt_id = ".$cnt_id);
    if($result !== false) {
        echo 'true';
      }
	  }
    }
?>