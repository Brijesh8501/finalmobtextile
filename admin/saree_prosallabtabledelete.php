<?php session_start();
include("databaseconnect.php");
    if(isset($_POST['delete_id'])) {
      $delete_id = mysql_real_escape_string($_POST['delete_id']);
	  $del = $_REQUEST['del'];
	  if($del=='ins')
	  {
		  if(!isset($_SESSION['User']))
		  {
		  }
		  else
		  {
      $result = mysql_query("DELETE FROM `saree_labsalsub1` WHERE `Saree_Labour_Id`=".$delete_id);
      if($result !== false) {
        echo 'true';
	  }
      }
	  }
	  else if($del=='upd')
	  {
		  if(!isset($_SESSION['User']))
		  {
		  }
		  else
		  {
		  $result = mysql_query("DELETE FROM `saree_labsalsuborg1` WHERE `Saree_Labour_Id`=".$delete_id);
      if($result !== false) {
        echo 'true';
      }
		  }
	  }
    }
?>