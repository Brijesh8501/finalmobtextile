<?php session_start();
include("databaseconnect.php");
    if(isset($_REQUEST['delete_id'])) {
      $Cou_Com_Id = mysql_real_escape_string($_REQUEST['delete_id']);
	   if(!isset($_SESSION['User']))
		  {
		  }
		  else
		  {
    $result = mysql_query("delete from courier_company where Cou_Com_Id = ".$Cou_Com_Id);
    if($result !== false) {
        echo 'true';
      }
	  }
    }
?>