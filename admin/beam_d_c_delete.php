<?php session_start();
include("databaseconnect.php");
    if(isset($_REQUEST['delete_id'])) {
      $Beam_D_C_Id = mysql_real_escape_string($_REQUEST['delete_id']);
	   if(!isset($_SESSION['User']))
		  {}else
		  {
    $result = mysql_query("delete from beam_d_c_1 where Beam_D_C_Id = ".$Beam_D_C_Id);
    if($result !== false) {
        echo 'true';
      }}}
?>