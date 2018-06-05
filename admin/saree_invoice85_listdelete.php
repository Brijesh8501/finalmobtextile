<?php session_start();
include("databaseconnect.php");
    if(isset($_REQUEST['delete_id'])) {
      $Saree_Invoice_Id = mysql_real_escape_string($_REQUEST['delete_id']);
	   if(!isset($_SESSION['User']))
		  {
		  }
		  else
		  {
    $result = mysql_query("delete from saree_invoice where Saree_Invoice_Id = ".$Saree_Invoice_Id);
    if($result !== false) {
        echo 'true';
      }
    }
    }
?>