<?php session_start();
include("databaseconnect.php");
    if(isset($_REQUEST['delete_id'])) {
      $Registration_Id = mysql_real_escape_string($_REQUEST['delete_id']);
	  $Usercheck = $_REQUEST['Usercheck'];
	   if(!isset($_SESSION['User']))
		  {
		  }
		  else
		  {
			  if($Registration_Id==$Usercheck)
			  {
			  }
			  else
			  {
	  $query1 = mysql_query("select Registration_Id from registration_details") or die(mysql_error());
   $duplicate1 = mysql_num_rows($query1);  
  if($duplicate1>4)
  {
	  
	  $sel_res = mysql_query("select Photo,Name from registration_details where Registration_Id = ".$Registration_Id);
	  $sel_fetch = mysql_fetch_array($sel_res);
	  $Photo_Path = $sel_fetch['Photo'];
	  if($sel_fetch['Name']!='MICKY AHIR'){
    $result = mysql_query("delete from registration_details where Registration_Id = ".$Registration_Id);
	if($result !== false) {
        echo 'true';
		unlink($Photo_Path);
      }
	  }
	  elseif($sel_fetch['Name']=='MICKY AHIR')
	  {
	  }
	  
  }  
  else
  {
  }
			  }
	  }
    }
?>