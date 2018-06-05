<?php session_start();
include("databaseconnect.php");
    if(isset($_REQUEST['delete_id'])) {
      $Sal_Fixed_Id = mysql_real_escape_string($_REQUEST['delete_id']);
	   if(!isset($_SESSION['User']))
		  {
		  }
		  else
		  {
    $result = mysql_query("delete from salary_fixed_master where Sal_Fixed_Id = ".$Sal_Fixed_Id);
    if($result !== false) {
        echo 'true';
      }
    }
    }
?>