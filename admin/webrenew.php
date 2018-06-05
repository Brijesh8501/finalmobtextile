<?php 
include("databaseconnect.php");
$sel_date = "select * from renew_website";
$sel_exe = mysql_query($sel_date);
$sel_fetch = mysql_fetch_array($sel_exe);
$Renew_Date = $sel_fetch['Renew_Date'];
$date8501 = strtotime($Renew_Date);
$remaining = $date8501 - time();
$days_remaining = floor($remaining / 86400);
?>