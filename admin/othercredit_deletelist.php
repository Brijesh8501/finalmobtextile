<?php session_start();
include("databaseconnect.php");
    if(isset($_REQUEST['delete_id'])) {
      $Petty_Id = mysql_real_escape_string($_REQUEST['delete_id']);
	   if(!isset($_SESSION['User']))
		  {
		  }
		  else
		  {
    $result = mysql_query("delete from other_credit_details where Petty_Id = ".$Petty_Id);
	$resultaccounts = mysql_query("delete from accounts where Id = '$Petty_Id' and For_S = 'Other Credit'");
    if($result !== false && $resultaccounts !== false) {
        echo 'true';
      }
	  }
    }
?>