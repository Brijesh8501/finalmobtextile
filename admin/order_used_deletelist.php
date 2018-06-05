<?php session_start();
include("databaseconnect.php");
    if(isset($_REQUEST['delete_id'])) {
      $Other_Used_Id = mysql_real_escape_string($_REQUEST['delete_id']);
	   if(!isset($_SESSION['User']))
		  {
		  }
		  else
		  {
    $result = mysql_query("delete from other_used1 where Other_Used_Id = ".$Other_Used_Id);
    if($result !== false) {
        echo 'true';
      }
	  }
    }
?>