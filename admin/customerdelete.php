<?php session_start();
include("databaseconnect.php");
    if(isset($_REQUEST['delete_id'])) {
      $Customer_Id = mysql_real_escape_string($_REQUEST['delete_id']);
	   if(!isset($_SESSION['User']))
		  {
		  }
		  else
		  {
    $result = mysql_query("delete from customer_details where Customer_Id = ".$Customer_Id);
    if($result !== false) {
        echo 'true';
      }
	  }
    }
?>