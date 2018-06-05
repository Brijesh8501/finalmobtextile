<?php session_start();
include("databaseconnect.php");
    if(isset($_REQUEST['delete_id'])) {
      $Bro_Cus_Id = mysql_real_escape_string($_REQUEST['delete_id']);
	   if(!isset($_SESSION['User']))
		  {
		  }
		  else
		  {
    $result = mysql_query("delete from bro_cus_id where Bro_Cus_Id = ".$Bro_Cus_Id);
    if($result !== false) {
        echo 'true';
      }
	  }
    }
?>