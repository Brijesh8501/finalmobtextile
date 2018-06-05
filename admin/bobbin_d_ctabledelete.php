<?php session_start();
include("databaseconnect.php");
    if(isset($_REQUEST['delete_id'])) {
      $delete_id = mysql_real_escape_string($_REQUEST['delete_id']);
	   $del = $_REQUEST['del'];
	  if($del=='ins')
	  {
		  if(!isset($_SESSION['User']))
		  {
		  }
		  else
		  {
      $result = mysql_query("DELETE FROM `boobin_d_c_2` WHERE `Bobbin_D_C_Id`=".$delete_id);
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
		   $result = mysql_query("DELETE FROM `boobin_dcorg` WHERE `Bobbin_D_C_Id`=".$delete_id);
    
	 if($result !== false) {
        echo 'true';
      }
	  }
	  }
	}
?>