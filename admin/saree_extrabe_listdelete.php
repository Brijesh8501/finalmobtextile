<?php session_start();
include("databaseconnect.php");
    if(isset($_REQUEST['delete_id'])) {
      $Sa_Exbeam_Id = mysql_real_escape_string($_REQUEST['delete_id']);
	   if(!isset($_SESSION['User']))
		  {
		  }
		  else
		  {
    $result = mysql_query("delete from saree_exbe_master where Sa_Exbeam_Id = ".$Sa_Exbeam_Id);
    if($result !== false) {
        echo 'true';
      }
    }
    }
?>