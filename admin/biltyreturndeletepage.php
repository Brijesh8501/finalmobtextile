<?php session_start();
include("databaseconnect.php");
    if(isset($_REQUEST['delete_id'])) {
      $Bilty_Id = mysql_real_escape_string($_REQUEST['delete_id']);
	   if(!isset($_SESSION['User']))
		  {
		  }
		  else
		  {
	$sel = mysql_query("select B_Image from bilty_return where Bilty_Id = ".$Bilty_Id);
	$sel_fetch = mysql_fetch_array($sel);
    $result = mysql_query("delete from bilty_return where Bilty_Id = ".$Bilty_Id);
    if($result !== false) {
        echo 'true';
		unlink($sel_fetch['B_Image']);
      }
	  }
    }
?>