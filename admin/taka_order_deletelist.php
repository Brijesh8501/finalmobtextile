<?php session_start();
include("databaseconnect.php");
    if(isset($_REQUEST['delete_id'])) {
      $T_Order_Id = mysql_real_escape_string($_REQUEST['delete_id']);
	   if(!isset($_SESSION['User']))
		  {
		  }
		  else
		  {
    $result = mysql_query("delete from taka_order_master where T_Order_Id = ".$T_Order_Id);
    if($result !== false) {
        echo 'true';
      }
    }
    }
?>