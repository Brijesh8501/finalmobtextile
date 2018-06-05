<?php session_start();
include("databaseconnect.php");
    if(isset($_REQUEST['delete_id'])) {
      $W_Type_Id = mysql_real_escape_string($_REQUEST['delete_id']);
	   if(!isset($_SESSION['User']))
		  {
		  }
		  else
		  {
    $result = mysql_query("delete from work_type where W_Type_Id = ".$W_Type_Id);
    if($result !== false) {
        echo 'true';
      }
	  }
    }
?>