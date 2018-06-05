<?php session_start();
include("databaseconnect.php");
    if(isset($_REQUEST['delete_id'])) {
      $Saree_D_C_Id = mysql_real_escape_string($_REQUEST['delete_id']);
	   if(!isset($_SESSION['User']))
		  {
		  }
		  else
		  {
    $result = mysql_query("delete from saree_d_mill where Saree_D_C_Id = ".$Saree_D_C_Id);
    if($result !== false) {
        echo 'true';
      }
    }
    }
?>