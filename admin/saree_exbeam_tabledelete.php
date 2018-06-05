<?php session_start();
include("databaseconnect.php");
    if(isset($_REQUEST['delete_id'])) {
      $Be_D_C_Id = mysql_real_escape_string($_REQUEST['delete_id']);
	  $del = $_REQUEST['del'];
	  if($del=='ins')
	  {
		  if(!isset($_SESSION['User']))
		  {
		  }
		  else
		  {
    $result = mysql_query("DELETE FROM `saree_exbeam_detail` WHERE `Sa_Ex_Id`=".$Be_D_C_Id);
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
		   $result = mysql_query("DELETE FROM `saree_exbeam_detailorg` WHERE `Sa_Ex_Id`=".$Be_D_C_Id);
         if($result !== false) {
        echo 'true';
      }
	  }
	  }
    }
?>