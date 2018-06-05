<?php session_start();
include("databaseconnect.php");
    if(isset($_REQUEST['delete_id'])) {
      $Bobbin_Invoice_Id = mysql_real_escape_string($_REQUEST['delete_id']);
	   if(!isset($_SESSION['User']))
		  {
		  }
		  else
		  {
    $result = mysql_query("delete from bobbin_invoice where Bobbin_Invoice_Id = ".$Bobbin_Invoice_Id);
    if($result !== false) {
        echo 'true';
      }
	  }
    }
?>