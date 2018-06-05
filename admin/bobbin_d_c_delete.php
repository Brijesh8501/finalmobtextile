<?php session_start();
include("databaseconnect.php");
    if(isset($_REQUEST['delete_id'])) {
      $Bo_D_C_Id = mysql_real_escape_string($_REQUEST['delete_id']);
	   if(!isset($_SESSION['User']))
		  {
		  }
		  else
		  {
    $result = mysql_query("delete from bobbin_d_c where Bo_D_C_Id = ".$Bo_D_C_Id);
    if($result !== false) {
        echo 'true';
      }
	  }
    }
?>