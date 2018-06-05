<?php session_start();
include("databaseconnect.php");
    if(isset($_REQUEST['delete_id'])) {
      $Trans_Id = mysql_real_escape_string($_REQUEST['delete_id']);
	  $act = $_REQUEST['act'];
	   if(!isset($_SESSION['User']))
		  {
		  }
		  else
		  {
			  if($act=='beam')
			  {
    
	$selbeam = "select Trans_Invoice_No from transactions_beam1 where Trans_Id = '$Trans_Id'";
	$selbeamexe = mysql_query($selbeam);
	$selbeamfetch = mysql_fetch_array($selbeamexe);
	$resultaccounts = mysql_query("delete from accounts where Id = '".$selbeamfetch['Trans_Invoice_No']."' and For_S = 'Beam'");
	$result = mysql_query("delete from transactions_beam1 where Trans_Id = ".$Trans_Id);
    if($result !== false && $resultaccounts !== false) {
        echo 'true';
      }
			  }
			  elseif($act=='bobbin')
			  {
				
				 $selbobbin = "select Trans_Invoice_No from transactions_bobbin where Trans_Id = '$Trans_Id'";
	$selbobbinexe = mysql_query($selbobbin);
	$selbobbinfetch = mysql_fetch_array($selbobbinexe);
	$resultaccounts = mysql_query("delete from accounts where Id = '".$selbobbinfetch['Trans_Invoice_No']."' and For_S = 'Bobbin'");
	 $result = mysql_query("delete from transactions_bobbin where Trans_Id = ".$Trans_Id);
    if($result !== false && $resultaccounts !== false) {
        echo 'true';
      }  
			  }
			  elseif($act=='taka')
			  {
				   
				   $seltaka = "select Trans_Invoice_No from transactions_taka where Trans_Id = '$Trans_Id'";
	$seltakaexe = mysql_query($seltaka);
	$seltakafetch = mysql_fetch_array($seltakaexe);
	$resultaccounts = mysql_query("delete from accounts where Id = '".$seltakafetch['Trans_Invoice_No']."' and For_S = 'Taka'");
	$result = mysql_query("delete from transactions_taka where Trans_Id = ".$Trans_Id);
    if($result !== false && $resultaccounts !== false) {
        echo 'true';
      }
			  }
			  elseif($act=='saree')
			  {
				  
				   $selsaree = "select Trans_Invoice_No from transactions_saree where Trans_Id = '$Trans_Id'";
	$selsareeexe = mysql_query($selsaree);
	$selsareefetch = mysql_fetch_array($selsareeexe);
	$resultaccounts = mysql_query("delete from accounts where Id = '".$selsareefetch['Trans_Invoice_No']."' and For_S = 'Saree'");
	 $result = mysql_query("delete from transactions_saree where Trans_Id = ".$Trans_Id);
    if($result !== false && $resultaccounts !== false) {
        echo 'true';
      }
			  }
    }
    }
?>