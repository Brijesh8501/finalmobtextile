<?php session_start();
include("databaseconnect.php");
    if(isset($_REQUEST['delete_id'])) {
      $Other_D_C_Id = mysql_real_escape_string($_REQUEST['delete_id']);
	   if(!isset($_SESSION['User']))
		  {
		  }
		  else
		  {
    $result = mysql_query("delete from other_d_c where Other_D_C_Id = ".$Other_D_C_Id);
    if($result !== false) {
        echo 'true';
      }
	  }
    }
?>