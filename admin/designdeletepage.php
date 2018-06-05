<?php session_start();
include("databaseconnect.php");
    if(isset($_REQUEST['delete_id'])) {
      $Design_Id = mysql_real_escape_string($_REQUEST['delete_id']);
	   if(!isset($_SESSION['User']))
		  {
		  }
		  else
		  {
    $sel_res = mysql_query("select Photo from design_details where Design_Id = ".$Design_Id);
	$sel_fetch = mysql_fetch_array($sel_res);
	$Photo_Path = $sel_fetch['Photo'];
    $result = mysql_query("delete from design_details where Design_Id = ".$Design_Id);
	if($result !== false) {
        echo 'true';
		unlink($Photo_Path);
      }
	  }
    }
?>