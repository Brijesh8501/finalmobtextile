<?php session_start();
include("databaseconnect.php");
    if(isset($_POST['delete_id'])) {
      $delete_id = mysql_real_escape_string($_POST['delete_id']);
	  $del = $_REQUEST['del'];
	  if($del=='ins')
	  {
		   if(!isset($_SESSION['User']))
		  {
		  }
		  else
		  {
      $result = mysql_query("DELETE FROM `bobbin_invoice_2` WHERE `Bo_Invoice_Id`=".$delete_id);
      if($result !== false) {
        echo 'true';
      }
	  }
	  }
	  else if($del=='upd')
	  {
		   if(!isset($_SESSION['User']))
		  {
		  }
		  else
		  {
		  $result = mysql_query("DELETE FROM `bobbin_invoiceorg` WHERE `Bo_Invoice_Id`=".$delete_id);
      if($result !== false) {
        echo 'true';
	  }
      }
	  }
    }
?>