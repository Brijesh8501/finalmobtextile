<?php session_start();
include("databaseconnect.php");
    if(isset($_REQUEST['delete_id'])) {
      $gallery_id = mysql_real_escape_string($_REQUEST['delete_id']);
	   if(!isset($_SESSION['User']))
		  {
		  }
		  else
		  {
   $sel_res = mysql_query("select thumbnail,image from gallery where gallery_id = ".$gallery_id);
	$sel_fetch = mysql_fetch_array($sel_res);
	$thumbnail = $sel_fetch['thumbnail'];
	$image = $sel_fetch['image'];
    $result = mysql_query("delete from gallery where gallery_id = ".$gallery_id);
    if($result !== false) {
        echo 'true';
		unlink($thumbnail);
		unlink($image);
      }
	  }
    }
?>