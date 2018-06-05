<?php session_start();
include("databaseconnect.php");

    if(isset($_REQUEST['delete_id'])) {
      $Beam_Invoice_Id = mysql_real_escape_string($_REQUEST['delete_id']);
	   if(!isset($_SESSION['User']))
		  {
		  }
		  else
		  {
    $result = mysql_query("delete from beam_invoice where Beam_Invoice_Id = ".$Beam_Invoice_Id);
    if($result !== false) {
        echo 'true';
      }
	  }
    }
?>