<?php session_start();
include("databaseconnect.php");
    if(isset($_REQUEST['delete_id'])) {
      $Taka_Invoice_Id = mysql_real_escape_string($_REQUEST['delete_id']);
	   if(!isset($_SESSION['User']))
		  {
		  }
		  else
		  {
    $result = mysql_query("delete from taka_invoice where Taka_Invoice_Id = ".$Taka_Invoice_Id);
    if($result !== false) {
        echo 'true';
      }
    }
    }
?>