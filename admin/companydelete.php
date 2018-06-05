<?php session_start();
include("databaseconnect.php");
    if(isset($_REQUEST['delete_id'])) {
      $Company_Id = mysql_real_escape_string($_REQUEST['delete_id']);
	   if(!isset($_SESSION['User']))
		  {
		  }
		  else
		  {
    $result = mysql_query("delete from company_deetaails where Company_Id = ".$Company_Id);
    if($result !== false) {
        echo 'true';
      }
	  }
    }
?>