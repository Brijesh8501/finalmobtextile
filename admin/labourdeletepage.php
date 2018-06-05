<?php session_start();
include("databaseconnect.php");
    if(isset($_REQUEST['delete_id'])) {
      $Labour_Id = mysql_real_escape_string($_REQUEST['delete_id']);
	   if(!isset($_SESSION['User']))
		  {
		  }
		  else
		  {
	 $sel_res = mysql_query("select Photo from labour_details where Labour_Id = ".$Labour_Id);
	$sel_fetch = mysql_fetch_array($sel_res);
	$Photo = $sel_fetch['Photo'];
    $result = mysql_query("delete from labour_details where Labour_Id = ".$Labour_Id);
    if($result !== false) {
        echo 'true';
		unlink($Photo);
      }
	  }
    }
?>