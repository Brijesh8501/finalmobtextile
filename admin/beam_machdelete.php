<?php session_start();
include("databaseconnect.php");
    if(isset($_REQUEST['delete_id'])) {
      $Be_M_Id = mysql_real_escape_string($_REQUEST['delete_id']);
	   if(!isset($_SESSION['User']))
		  {}else{
			  $query1 = mysql_query("select Status from beam_machine where Be_M_Id='".$Be_M_Id."' ") or die(mysql_error());
$duplicate1 = mysql_fetch_array($query1);
if($duplicate1['Status']=='R-permanent' || $duplicate1['Status']=='R-temporary')
{}
elseif($duplicate1['Status']=='Fitted')
{
    $result = mysql_query("delete from beam_machine where Be_M_Id = ".$Be_M_Id);
    if($result !== false) {
        echo 'true';
      }}}}
?>