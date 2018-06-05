<?php session_start();
include("databaseconnect.php");
    if(isset($_REQUEST['delete_id'])) {
      $Taka_D_C_Id = mysql_real_escape_string($_REQUEST['delete_id']);
	   if(!isset($_SESSION['User']))
		  {
		  }
		  else
		  {
    $result = mysql_query("delete from taka_d_c_mill where Taka_D_C_Id = ".$Taka_D_C_Id);
    if($result !== false) {
        echo 'true';
      }
    }
    }
?>