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
      $result = mysql_query("DELETE FROM `saree_d_c_2mill` WHERE `Sa_D_C_Id`=".$delete_id);
      if($result !== false) {
        echo 'true';
		 }
	  }
	  }
	  elseif($del=='upd')
	  {
		   if(!isset($_SESSION['User']))
		  {
		  }
		  else
		  {
			   $result = mysql_query("DELETE FROM `saree_dcorgmill` WHERE `Sa_D_C_Id`=".$delete_id);
      if($result !== false) {
        echo 'true';
		 }
		  }
      }
    }
?>