<?php include("logcode.php");
include("databaseconnect.php");
date_default_timezone_set("Asia/Calcutta");
    if(isset($_REQUEST['delete_id'])) {
      $Bank_Id = mysql_real_escape_string($_REQUEST['delete_id']);
	   if(!isset($_SESSION['User']))
		  {}else{
	$getdata = "select Bank_Name,Groups from bank_details where Bank_Id = '$Bank_Id'";
	$getdataexe = mysql_query($getdata);		  
	$getdatafetch = mysql_fetch_array($getdataexe);
	
	 $dateact = date('Y-m-d');
	$dateactfull = date('d-m-Y        h:i:s A');
	$Bank_str = $getdatafetch['Bank_Name'];
	$Groups = $getdatafetch['Groups'];
	$Partact = "Delete Bank Entry : ".$Bank_str."<br/>Group : ".$Groups;
	$insactivity = "insert into activity(Activity_Id,Date,Particular,Type,Action,Datefull,Id) values(NULL,'$dateact','$Partact','Bank - Delete','delete','$dateactfull','".$row_result['Registration_Id']."')";
	mysql_query($insactivity); 
			  
    $result = mysql_query("delete from bank_details where Bank_Id = ".$Bank_Id);
    if($result !== false) {
        echo 'true';
      }}}
?>