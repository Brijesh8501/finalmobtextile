<?php include("logcode.php"); error_reporting(0);
include("databaseconnect.php");
if($row_result['Role']=='Admin' || $row_result['Role']=='Manager' || $row_result['Role']=='Accountant')
{
	
}
else
{
	
	echo '<script>alert("You have no rights to view this page");</script>';
	$updateGoTo = "index";
  echo '<script>window.location="'.$updateGoTo.'";</script>';
}
if(isset($_REQUEST['action']))
{
	$action = $_REQUEST['action'];
	if($action=='Beam')
	{
		$msg_check_trascat = "BEAM";
	date_default_timezone_set('Asia/Calcutta');
	$Entry_Date = date('Y-m-d     h:i:s a');
	$Chq_Date = date('Y-m-d');
   
	include("webrenew.php");
	}
	else if($action=='Bobbin')
	{
		$msg_check_trascat = "Bobbin";
	date_default_timezone_set('Asia/Calcutta');
	$Entry_Date = date('Y-m-d     h:i:s a');
	$Chq_Date = date('Y-m-d');
	
	include("webrenew.php");
	}
	else if($action=='Taka')
	{
		$msg_check_trascat = "TAKA";
	date_default_timezone_set('Asia/Calcutta');
	$Entry_Date = date('Y-m-d     h:i:s a');
	$Chq_Date = date('Y-m-d');
    include("webrenew.php");
	}
	else if($action=='Saree')
	{
		$msg_check_trascat = "SAREE";
	date_default_timezone_set('Asia/Calcutta');
	$Entry_Date = date('Y-m-d     h:i:s a');
	$Chq_Date = date('Y-m-d');
	include("webrenew.php");
	}
}
if(isset($_REQUEST['act']))
{
	$act = $_REQUEST['act'];
	if($act=='Beam')
	{
		$msg_check_trascat = "BEAM";
	$decodeurl = $_REQUEST['Trans_Id'];
	$durl = urldecode($decodeurl); 
	$turl = str_replace("'"," ",$durl);
	$urls = explode(" ",$turl);
	$Trans_Id = $urls[1];
	$query = "select * from transactions_beam1 where Trans_Id = '".$Trans_Id."'";
	$res = mysql_query($query);
	$row = mysql_fetch_array($res);
	$Trans_Id = $row['Trans_Id'];
	$Trans_Type = $row['Trans_Type'];
	$Trans_Invoice_No = $row['Trans_Invoice_No'];
	$Trans_Date = $row['Trans_Date'];
	$Trans_Amt = $row['Trans_Amt'];
	$Payment_Type = $row['Payment_Type'];
	$Bank_Id = $row['Bank_Id'];
	$bank_replace = str_replace(" ",",",$Bank_Id);
	$Chq_No = $row['Chq_No'];
	$Chq_Date = $row['Chq_Date'];
	$Description = $row['Description'];
	$Status = $row['Status'];
	$Entry_Date = $row['Entry_Date'];
	$Entry_Id = $row['Entry_Id'];
	}
	else if($act=='Bobbin')
	{
		$msg_check_trascat = "BOBBIN";
		$decodeurl = $_REQUEST['Trans_Id'];
     $durl = urldecode($decodeurl); 
	$turl = str_replace("'"," ",$durl);
	$urls = explode(" ",$turl);
	$Trans_Id = $urls[1];
	  $query = "select * from transactions_bobbin where Trans_Id = '".$Trans_Id."' ";
	$res = mysql_query($query);
	$row = mysql_fetch_array($res);
	$Trans_Id = $row['Trans_Id'];
	$Trans_Type = $row['Trans_Type'];
	$Trans_Invoice_No = $row['Trans_Invoice_No'];
	$Trans_Date = $row['Trans_Date'];
	$Trans_Amt = $row['Trans_Amt'];
	$Payment_Type = $row['Payment_Type'];
	$Bank_Id = $row['Bank_Id'];
	$bank_replace = str_replace(" ",",",$Bank_Id);
	$Chq_No = $row['Chq_No'];
	$Chq_Date = $row['Chq_Date'];
	$Description = $row['Description'];
	$Status = $row['Status'];
	$Entry_Date = $row['Entry_Date'];
	$Entry_Id = $row['Entry_Id'];
	}
	else if($act=='Taka')
	{
		$msg_check_trascat = "TAKA";
		$decodeurl = $_REQUEST['Trans_Id'];
		$durl = urldecode($decodeurl); 
	$turl = str_replace("'"," ",$durl);
	$urls = explode(" ",$turl);
	$Trans_Id = $urls[1];
	$query = "select * from transactions_taka where Trans_Id = '".$Trans_Id."' ";
	$res = mysql_query($query);
	$row = mysql_fetch_array($res);
	$Trans_Id = $row['Trans_Id'];
	$Trans_Type = $row['Trans_Type'];
	$Trans_Invoice_No = $row['Trans_Invoice_No'];
	$Trans_Date = $row['Trans_Date'];
	$Trans_Amt = $row['Trans_Amt'];
	$Payment_Type = $row['Payment_Type'];
	$Bank_Id = $row['Bank_Id'];
	$bank_replace = str_replace(" ",",",$Bank_Id);
	$Chq_No = $row['Chq_No'];
	$Chq_Date = $row['Chq_Date'];
	$Description = $row['Description'];
	$Status = $row['Status'];
	$Entry_Date = $row['Entry_Date'];
	$Entry_Id = $row['Entry_Id'];
	}
	else if($act=='Saree')
	{
		$msg_check_trascat = "SAREE";
		$decodeurl = $_REQUEST['Trans_Id'];
		$durl = urldecode($decodeurl); 
	$turl = str_replace("'"," ",$durl);
	$urls = explode(" ",$turl);
	$Trans_Id = $urls[1];
	$query = "select * from transactions_saree where Trans_Id = '".$Trans_Id."' ";
	$res = mysql_query($query);
	$row = mysql_fetch_array($res);
	$Trans_Id = $row['Trans_Id'];
	$Trans_Type = $row['Trans_Type'];
	$Trans_Invoice_No = $row['Trans_Invoice_No'];
	$Trans_Date = $row['Trans_Date'];
	$Trans_Amt = $row['Trans_Amt'];
	$Payment_Type = $row['Payment_Type'];
	$Bank_Id = $row['Bank_Id'];
	$bank_replace = str_replace(" ",",",$Bank_Id);
	$Chq_No = $row['Chq_No'];
	$Chq_Date = $row['Chq_Date'];
	$Description = $row['Description'];
	$Status = $row['Status'];
	$Entry_Date = $row['Entry_Date'];
	$Entry_Id = $row['Entry_Id'];
	}
	}
	if($action=='Beam')
	{
	 if(isset($_REQUEST['submit_be']))
{
//insert
   if(!isset($_SESSION['User']))
{ 
} 
else
{
	$Trans_Invoice_No = $_REQUEST['Trans_Invoice_No'];
	$Trans_Date = $_REQUEST['Trans_Date'];
	$Trans_Amt = $_REQUEST['Trans_Amt'];
	$Payment_Type = $_REQUEST['Payment_Type'];
	$Bank_Id = $_REQUEST['Bank_Id'];
	$Chq_No = $_REQUEST['Chq_No'];
	$Description = $_REQUEST['Description'];
	$Status = $_REQUEST['Status'];
	date_default_timezone_set('Asia/Calcutta');
	$Entry_Date = date('Y-m-d     h:i:s a');
	$Entry_Id = $row_result['Registration_Id'];
	if($Payment_Type=='Cheque')
	{
	$Chq_Date = $_REQUEST['Chq_Date'];
	}
	else if($Payment_Type=='Cash')
	{
	$Chq_Date = $_REQUEST['Chq_Date'];	
	}
	$query = mysql_query("select * from transactions_beam1 where Trans_Invoice_No = '".$Trans_Invoice_No."'") or die(mysql_error());
	$res_fetch = mysql_fetch_array($query);
$duplicate = mysql_num_rows($query);
$Trans_Id123 = $res_fetch['Trans_Id'];
   if($duplicate==0)
    {
	$sql = "INSERT INTO `textile`.`transactions_beam1` (`Trans_Id`, `Trans_Invoice_No`, `Trans_Date`, `Trans_Amt`, `Payment_Type`,`Bank_Id`, `Chq_No`, `Chq_Date`, `Description`, `Status`, `Entry_Date`, `Entry_Id`) VALUES (NULL, '$Trans_Invoice_No', '$Trans_Date', '$Trans_Amt', '$Payment_Type', '$Bank_Id', '$Chq_No', '$Chq_Date', '$Description', '$Status', '$Entry_Date', '$Entry_Id')";
$result = mysql_query($sql);

 $particular = $Description.'<br/>(Invoice ID : '.$Trans_Invoice_No.')<br/>(Invoice Date : '.$Trans_Date.')<br/>By '.$Payment_Type;
	   $insaccount = "insert into accounts(Account_Id,Id,Date,Bank_Id,Particular,Cheque_No,Debit,Credit,For_S,Status) values(NULL,'$Trans_Invoice_No','$Chq_Date','$Bank_Id','$particular','$Chq_No','$Trans_Amt','0.00','Beam','$Status')";
	   mysql_query($insaccount);
	   
 echo '<script>alert("Transaction made successfully");</script>'; 
  }
    else
    {
      echo '<script>alert("You have allready paid and made successfully transaction for this inovice no : '.$Trans_Invoice_No.' having transaction ID : '.$Trans_Id123.'");</script>';
    }
}
}
	}
	else if($action=='Bobbin')
	{
		 if(!isset($_SESSION['User']))
{ 
	
} 
else
{
		 if(isset($_REQUEST['submit_bo']))
{
//insert
  	$Trans_Invoice_No = $_REQUEST['Trans_Invoice_No'];
	$Trans_Date = $_REQUEST['Trans_Date'];
	$Trans_Amt = $_REQUEST['Trans_Amt'];
	$Payment_Type = $_REQUEST['Payment_Type'];
	$Bank_Id = $_REQUEST['Bank_Id'];
	$Chq_No = $_REQUEST['Chq_No'];
	$Description = $_REQUEST['Description'];
	$Status = $_REQUEST['Status'];
	date_default_timezone_set('Asia/Calcutta');
	$Entry_Date = date('Y-m-d     h:i:s a');
	$Entry_Id = $row_result['Registration_Id'];
	if($Payment_Type=='Cheque')
	{
	
	$Chq_Date = $_REQUEST['Chq_Date'];
	}
	else if($Payment_Type=='Cash')
	{
	$Chq_Date = $_REQUEST['Chq_Date'];	
	}
	$query = mysql_query("select * from transactions_bobbin where Trans_Invoice_No = '".$Trans_Invoice_No."'") or die(mysql_error());
	$res_fetch = mysql_fetch_array($query);
$duplicate = mysql_num_rows($query);
$Trans_Id123 = $res_fetch['Trans_Id'];
   if($duplicate==0)
    {
	$sql = "INSERT INTO `textile`.`transactions_bobbin` (`Trans_Id`, `Trans_Invoice_No`, `Trans_Date`, `Trans_Amt`, `Payment_Type`,`Bank_Id`, `Chq_No`, `Chq_Date`, `Description`, `Status`, `Entry_Date`, `Entry_Id`) VALUES (NULL, '$Trans_Invoice_No', '$Trans_Date', '$Trans_Amt', '$Payment_Type', '$Bank_Id', '$Chq_No', '$Chq_Date', '$Description', '$Status', '$Entry_Date', '$Entry_Id')";
$result = mysql_query($sql);

$particular = $Description.'<br/>(Invoice ID : '.$Trans_Invoice_No.')<br/>(Invoice Date : '.$Trans_Date.')<br/>By '.$Payment_Type;
	   $insaccount = "insert into accounts(Account_Id,Id,Date,Bank_Id,Particular,Cheque_No,Debit,Credit,For_S,Status) values(NULL,'$Trans_Invoice_No','$Chq_Date','$Bank_Id','$particular','$Chq_No','$Trans_Amt','0.00','Bobbin','$Status')";
	   mysql_query($insaccount);
echo '<script>alert("Transaction made successfully");</script>'; 
  }
    else
    {
      echo '<script>alert("You have allready paid and made successfully transaction for this inovice no : '.$Trans_Invoice_No.' having transaction ID : '.$Trans_Id123.'");</script>';
    }
}
	}
	}
	else if($action=='Taka')
	{
		 if(isset($_REQUEST['submit_ta']))
{
//insert
 if(!isset($_SESSION['User']))
{ } 
else
{
	$Trans_Invoice_No = $_REQUEST['Trans_Invoice_No'];
	$Trans_Date = $_REQUEST['Trans_Date'];
	$Trans_Amt = $_REQUEST['Trans_Amt'];
	$Payment_Type = $_REQUEST['Payment_Type'];
	$Bank_Id = $_REQUEST['Bank_Id'];
	$Chq_No = $_REQUEST['Chq_No'];
	$Description = $_REQUEST['Description'];
	$Status = $_REQUEST['Status'];
	date_default_timezone_set('Asia/Calcutta');
	$Entry_Date = date('Y-m-d     h:i:s a');
	$Entry_Id = $row_result['Registration_Id'];
	if($Payment_Type=='Cheque')
	{
	
	$Chq_Date = $_REQUEST['Chq_Date'];
	}
	else if($Payment_Type=='Cash')
	{
	$Chq_Date = $_REQUEST['Chq_Date'];	
	}
	$query = mysql_query("select * from transactions_taka where Trans_Invoice_No = '".$Trans_Invoice_No."'") or die(mysql_error());
	$res_fetch = mysql_fetch_array($query);
$duplicate = mysql_num_rows($query);
$Trans_Id123 = $res_fetch['Trans_Id'];
   if($duplicate==0)
    {
	$sql = "INSERT INTO `textile`.`transactions_taka` (`Trans_Id`,`Trans_Invoice_No`, `Trans_Date`, `Trans_Amt`, `Payment_Type`,`Bank_Id`, `Chq_No`, `Chq_Date`, `Description`, `Status`, `Entry_Date`, `Entry_Id`) VALUES (NULL, '$Trans_Invoice_No', '$Trans_Date', '$Trans_Amt', '$Payment_Type', '$Bank_Id', '$Chq_No', '$Chq_Date', '$Description', '$Status', '$Entry_Date', '$Entry_Id')";
$result = mysql_query($sql);

$particular = $Description.'<br/>(Invoice ID : '.$Trans_Invoice_No.')<br/>(Invoice Date : '.$Trans_Date.')<br/>By '.$Payment_Type;
	    $insaccount = "insert into accounts(Account_Id,Id,Date,Bank_Id,Particular,Cheque_No,Debit,Credit,For_S,Status) values(NULL,'$Trans_Invoice_No','$Chq_Date','$Bank_Id','$particular','$Chq_No','0.00','$Trans_Amt','Taka','$Status')";
	   mysql_query($insaccount);
echo '<script>alert("Transaction made successfully");</script>'; 
  }
    else
    {
      echo '<script>alert("You have allready paid and made successfully transaction for this inovice no : '.$Trans_Invoice_No.' having transaction ID : '.$Trans_Id123.'");</script>';
    }
}
	}
	}
	else if($action=='Saree')
	{
		 if(isset($_REQUEST['submit_sa']))
{
//insert
    if(!isset($_SESSION['User']))
{ } 
else
{
	$Trans_Invoice_No = $_REQUEST['Trans_Invoice_No'];
	$Trans_Date = $_REQUEST['Trans_Date'];
	$Trans_Amt = $_REQUEST['Trans_Amt'];
	$Payment_Type = $_REQUEST['Payment_Type'];
	$Bank_Id = $_REQUEST['Bank_Id'];
	$Chq_No = $_REQUEST['Chq_No'];
	$Description = $_REQUEST['Description'];
	$Status = $_REQUEST['Status'];
	date_default_timezone_set('Asia/Calcutta');
	$Entry_Date = date('Y-m-d     h:i:s a');
	$Entry_Id = $row_result['Registration_Id'];
	if($Payment_Type=='Cheque')
	{
	
	$Chq_Date = $_REQUEST['Chq_Date'];
	}
	else if($Payment_Type=='Cash')
	{
	$Chq_Date = $_REQUEST['Chq_Date'];	
	}
	$query = mysql_query("select * from transactions_saree where Trans_Invoice_No = '".$Trans_Invoice_No."'") or die(mysql_error());
	$res_fetch = mysql_fetch_array($query);
$duplicate = mysql_num_rows($query);
$Trans_Id123 = $res_fetch['Trans_Id'];
   if($duplicate==0)
    {
	$sql = "INSERT INTO `textile`.`transactions_saree` (`Trans_Id`,`Trans_Invoice_No`, `Trans_Date`, `Trans_Amt`, `Payment_Type`,`Bank_Id`, `Chq_No`, `Chq_Date`, `Description`, `Status`, `Entry_Date`, `Entry_Id`) VALUES (NULL, '$Trans_Invoice_No', '$Trans_Date', '$Trans_Amt', '$Payment_Type', '$Bank_Id', '$Chq_No', '$Chq_Date', '$Description', '$Status', '$Entry_Date', '$Entry_Id')";
$result = mysql_query($sql);

$particular = $Description.'<br/>(Invoice ID : '.$Trans_Invoice_No.')<br/>(Invoice Date : '.$Trans_Date.')<br/>By '.$Payment_Type;
	    $insaccount = "insert into accounts(Account_Id,Id,Date,Bank_Id,Particular,Cheque_No,Debit,Credit,For_S,Status) values(NULL,'$Trans_Invoice_No','$Chq_Date','$Bank_Id','$particular','$Chq_No','0.00','$Trans_Amt','Saree','$Status')";
	   mysql_query($insaccount);
echo '<script>alert("Transaction made successfully");</script>'; 
  }
    else
    {
      echo '<script>alert("You have allready paid and made successfully transaction for this inovice no : '.$Trans_Invoice_No.' having transaction ID : '.$Trans_Id123.'");</script>';
    }
}
	}
	}
if($act=='Beam')
{
 if(isset ($_REQUEST['update_be']))
      {
//update
if(!isset($_SESSION['User']))
{ } 
else
{
     $Trans_Id = $_REQUEST['Trans_Id'];
	$Trans_Invoice_No = $_REQUEST['Trans_Invoice_No'];
	$Trans_Date = $_REQUEST['Trans_Date'];
	$Trans_Amt = $_REQUEST['Trans_Amt'];
	$Payment_Type = $_REQUEST['Payment_Type'];
	$Bank_Id = $_REQUEST['Bank_Id'];
	$Chq_No = $_REQUEST['Chq_No'];
	$Chq_Date = $_REQUEST['Chq_Date'];
	$Description = $_REQUEST['Description'];
	$Status = $_REQUEST['Status'];
	$Entry_Date=$_REQUEST['Entry_Date'];
	$Entry_Id = $row_result['Registration_Id'];
    $sql= "UPDATE `textile`.`transactions_beam1` SET `Trans_Invoice_No` = '$Trans_Invoice_No', `Trans_Date` = '$Trans_Date', `Trans_Amt` = '$Trans_Amt', `Payment_Type` = '$Payment_Type', `Bank_Id` = '$Bank_Id', `Chq_No` = '$Chq_No', `Chq_Date` = '$Chq_Date', `Description` = '$Description', `Status` = '$Status', `Entry_Date` = '$Entry_Date', `Entry_Id` = '$Entry_Id' WHERE `transactions_beam1`.`Trans_Id` = '".$Trans_Id."' ";
$result = mysql_query($sql);

$particular = $Description.'<br/>(Invoice ID : '.$Trans_Invoice_No.')<br/>(Invoice Date : '.$Trans_Date.')<br/>By '.$Payment_Type;
	  
	   $updaccount = "update accounts set Date = '$Chq_Date', Bank_Id = '$Bank_Id', Particular = '$particular', Cheque_No = '$Chq_No', Debit = '$Trans_Amt', Credit = '0.00', Status = '$Status' where For_S = 'Beam' and Id = '$Trans_Invoice_No'";
	   mysql_query($updaccount);

echo '<script>alert("Transaction updated successfully");</script>'; 
echo '<script>close();</script>';
}
}
}
else if($act=='Bobbin')
{
	 if(isset ($_REQUEST['update_bo']))
      {
//update
if(!isset($_SESSION['User']))
{ } 
else
{
     $Trans_Id = $_REQUEST['Trans_Id'];
	$Trans_Invoice_No = $_REQUEST['Trans_Invoice_No'];
	$Trans_Date = $_REQUEST['Trans_Date'];
	$Trans_Amt = $_REQUEST['Trans_Amt'];
	$Payment_Type = $_REQUEST['Payment_Type'];
	$Bank_Id = $_REQUEST['Bank_Id'];
	$Chq_No = $_REQUEST['Chq_No'];
	$Chq_Date = $_REQUEST['Chq_Date'];
	$Description = $_REQUEST['Description'];
	$Status = $_REQUEST['Status'];
	$Entry_Date=$_REQUEST['Entry_Date'];
	$Entry_Id = $row_result['Registration_Id'];
$sql= "UPDATE `textile`.`transactions_bobbin` SET `Trans_Invoice_No` = '$Trans_Invoice_No', `Trans_Date` = '$Trans_Date', `Trans_Amt` = '$Trans_Amt', `Payment_Type` = '$Payment_Type', `Bank_Id` = '$Bank_Id', `Chq_No` = '$Chq_No', `Chq_Date` = '$Chq_Date', `Description` = '$Description', `Status` = '$Status', `Entry_Date` = '$Entry_Date', `Entry_Id` = '$Entry_Id' WHERE `transactions_bobbin`.`Trans_Id` = '".$Trans_Id."' ";
$result = mysql_query($sql);

$particular = $Description.'<br/>(Invoice ID : '.$Trans_Invoice_No.')<br/>(Invoice Date : '.$Trans_Date.')<br/>By '.$Payment_Type;

 $updaccount = "update accounts set Date = '$Chq_Date', Bank_Id = '$Bank_Id', Particular = '$particular', Cheque_No = '$Chq_No', Debit = '$Trans_Amt', Credit = '0.00', Status = '$Status' where For_S = 'Bobbin' and Id = '$Trans_Invoice_No'";
	   mysql_query($updaccount);
	   
echo '<script>alert("Transaction updated successfully");</script>';
echo '<script>close();</script>';
}
}
}
else if($act=='Taka')
{
	 if(isset ($_REQUEST['update_ta']))
      {
//update
if(!isset($_SESSION['User']))
{ } 
else
{
     $Trans_Id = $_REQUEST['Trans_Id'];
	$Trans_Invoice_No = $_REQUEST['Trans_Invoice_No'];
	$Trans_Date = $_REQUEST['Trans_Date'];
	$Trans_Amt = $_REQUEST['Trans_Amt'];
	$Payment_Type = $_REQUEST['Payment_Type'];
	$Bank_Id = $_REQUEST['Bank_Id'];
	$Chq_No = $_REQUEST['Chq_No'];
	$Chq_Date = $_REQUEST['Chq_Date'];
	$Description = $_REQUEST['Description'];
	$Status = $_REQUEST['Status'];
	$Entry_Date=$_REQUEST['Entry_Date'];
	$Entry_Id = $row_result['Registration_Id'];
$sql= "UPDATE `textile`.`transactions_taka` SET `Trans_Invoice_No` = '$Trans_Invoice_No', `Trans_Date` = '$Trans_Date', `Trans_Amt` = '$Trans_Amt', `Payment_Type` = '$Payment_Type', `Bank_Id` = '$Bank_Id', `Chq_No` = '$Chq_No', `Chq_Date` = '$Chq_Date', `Description` = '$Description', `Status` = '$Status', `Entry_Date` = '$Entry_Date', `Entry_Id` = '$Entry_Id' WHERE `transactions_taka`.`Trans_Id` = '".$Trans_Id."' ";
$result = mysql_query($sql);

$particular = $Description.'<br/>(Invoice ID : '.$Trans_Invoice_No.')<br/>(Invoice Date : '.$Trans_Date.')<br/>By '.$Payment_Type;

 $updaccount = "update accounts set Date = '$Chq_Date', Bank_Id = '$Bank_Id', Particular = '$particular', Cheque_No = '$Chq_No', Credit = '$Trans_Amt', Debit = '0.00', Status = '$Status' where For_S = 'Taka' and Id = '$Trans_Invoice_No'";
	   mysql_query($updaccount);
	   
echo '<script>alert("Transaction updated successfully");</script>';
echo '<script>close();</script>';
}
}
}
else if($act=='Saree')
{
	 if(isset ($_REQUEST['update_sa']))
      {
//update
if(!isset($_SESSION['User']))
{ } 
else
{
     $Trans_Id = $_REQUEST['Trans_Id'];
  $Trans_Invoice_No = $_REQUEST['Trans_Invoice_No'];
	$Trans_Date = $_REQUEST['Trans_Date'];
	$Trans_Amt = $_REQUEST['Trans_Amt'];
	$Payment_Type = $_REQUEST['Payment_Type'];
	$Bank_Id = $_REQUEST['Bank_Id'];
	$Chq_No = $_REQUEST['Chq_No'];
	$Chq_Date = $_REQUEST['Chq_Date'];
	$Description = $_REQUEST['Description'];
	$Status = $_REQUEST['Status'];
	$Entry_Date=$_REQUEST['Entry_Date'];
	$Entry_Id = $row_result['Registration_Id'];
$sql= "UPDATE `textile`.`transactions_saree` SET `Trans_Invoice_No` = '$Trans_Invoice_No', `Trans_Date` = '$Trans_Date', `Trans_Amt` = '$Trans_Amt', `Payment_Type` = '$Payment_Type', `Bank_Id` = '$Bank_Id', `Chq_No` = '$Chq_No', `Chq_Date` = '$Chq_Date', `Description` = '$Description', `Status` = '$Status', `Entry_Date` = '$Entry_Date', `Entry_Id` = '$Entry_Id' WHERE `transactions_saree`.`Trans_Id` = '".$Trans_Id."' ";
$result = mysql_query($sql);

$particular = $Description.'<br/>(Invoice ID : '.$Trans_Invoice_No.')<br/>(Invoice Date : '.$Trans_Date.')<br/>By '.$Payment_Type;

 $updaccount = "update accounts set Date = '$Chq_Date', Bank_Id = '$Bank_Id', Particular = '$particular', Cheque_No = '$Chq_No', Credit = '$Trans_Amt', Debit = '0.00', Status = '$Status' where For_S = 'Saree' and Id = '$Trans_Invoice_No'";
	   mysql_query($updaccount);
	   
	   
echo '<script>alert("Transaction updated successfully");</script>';
echo '<script>close();</script>';
}
}
}
?>
<!DOCTYPE html>
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<head>
      <meta charset="UTF-8" />
    <title>Shingori Textile</title>
     <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
    <noscript>
    <style> html {display:none; }</style>
     <META HTTP-EQUIV="Refresh" CONTENT="0; URL=javascripterror.php">
    </noscript>
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="assets/css/main.css" />
     <link rel="shortcut icon" href="Icons/st85.png">
</head>
<body>
<?php include("sidemenu.php"); ?>
                <div class="inner">
                    <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" align="center"><?php echo $msg_check_trascat;?>&nbsp;TRANSCATION</h1>
                </div>
            </div>
<div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <div id="div-1" class="accordion-body collapse in body">
            <form class="form-horizontal" method="post" name="form1" <?php if($action =='Beam') { ?>onsubmit="if(submitting) {
            alert('The record is being submitted, please wait a moment...');
            submit_be.disabled = true; 
            return false;
            }
            if(Transactionins(this))
            {
            submit_be.value = 'Submitting...';
            submitting = true;
            return true; 
            }
            return false;" <?php } elseif($action=='Bobbin') { ?> onsubmit="if(submitting) {
            alert('The record is being submitted, please wait a moment...');
            submit_bo.disabled = true; 
            return false;
            }
            if(Transactionins(this))
            {
            submit_bo.value = 'Submitting...';
            submitting = true;
            return true; 
            }
            return false;"<?php } elseif($action=='Taka') { ?>onsubmit="if(submitting) {
            alert('The record is being submitted, please wait a moment...');
            submit_ta.disabled = true; 
            return false;
            }
            if(Transactionins(this))
            {
            submit_ta.value = 'Submitting...';
            submitting = true;
            return true; 
            }
            return false;" <?php } elseif($action=='Saree') { ?>onsubmit="if(submitting) {
            alert('The record is being submitted, please wait a moment...');
            submit_sa.disabled = true; 
            return false;
            }
            if(Transactionins(this))
            {
            submit_sa.value = 'Submitting...';
            submitting = true;
            return true; 
            }
            return false;" <?php } elseif($act=='Beam') { ?>onsubmit="if(submitting) {
            alert('The record is being updated, please wait a moment...');
            update_be.disabled = true; 
            return false;
            }
            if(Transactionins(this))
            {
            update_be.value = 'Updating...';
            submitting = true;
            return true; 
            }
            return false;" <?php } elseif($act=='Bobbin') { ?>onsubmit="if(submitting) {
            alert('The record is being updated, please wait a moment...');
            update_bo.disabled = true; 
            return false;
            }
            if(Transactionins(this))
            {
            update_bo.value = 'Updating...';
            submitting = true;
            return true; 
            }
            return false;" <?php } elseif($act=='Taka') { ?>onsubmit="if(submitting) {
            alert('The record is being updated, please wait a moment...');
            update_ta.disabled = true; 
            return false;
            }
            if(Transactionins(this))
            {
            update_ta.value = 'Updating...';
            submitting = true;
            return true; 
            }
            return false;" <?php } elseif($act=='Saree') { ?>onsubmit="if(submitting) {
            alert('The record is being updated, please wait a moment...');
            update_sa.disabled = true; 
            return false;
            }
            if(Transactionins(this))
            {
            update_sa.value = 'Updating...';
            submitting = true;
            return true; 
            }
            return false;" <?php } ?> >
           
                        <input type="text" name="Trans_Id" id="Trans_Id"  value="<?php echo $Trans_Id; ?>" readonly/>
                        <?php if(isset($_REQUEST['action'])) { ?>
                        <input type="text" name="checking" id="checking" value="<?php echo $action;?>"/>
                        <?php }
						if(isset($_REQUEST['act']))
						{ ?>
							<input type="text" name="checking" id="checking" value="<?php echo $act;?>"/>
                            <?php } ?>
                       
<?php
if($act=='Beam')
{
	?>
	<div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Invoice ID :</label>
                    <div class="col-lg-8">
                        <input type="text" name="Trans_Invoice_No" id="Trans_Invoice_No" class="form-control" value="<?php echo $Trans_Invoice_No; ?>" readonly/>
                        <div id="Invoice_Date_Amt">
</div>
                    </div>
                </div>
                <?php
}
else if($act=='Bobbin')
{
	?>
	<div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Invoice ID :</label>
                    <div class="col-lg-8">
                        <input type="text" name="Trans_Invoice_No" id="Trans_Invoice_No" class="form-control" value="<?php echo $Trans_Invoice_No; ?>" readonly/>
                        <div id="Invoice_Date_Amt">
</div>
                    </div>
                </div>
                <?php
}
else if($act=='Taka')
{
	?>
	<div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Invoice ID :</label>
                    <div class="col-lg-8">
                        <input type="text" name="Trans_Invoice_No" id="Trans_Invoice_No" class="form-control" value="<?php echo $Trans_Invoice_No; ?>" readonly/>
                        <div id="Invoice_Date_Amt">
</div>
                    </div>
                </div>
                <?php
}
elseif($act=='Saree')
{
	?>
	<div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Invoice ID :</label>
                    <div class="col-lg-8">
                        <input type="text" name="Trans_Invoice_No" id="Trans_Invoice_No" class="form-control" value="<?php echo $Trans_Invoice_No; ?>" readonly/>
                        <div id="Invoice_Date_Amt">
</div>
                    </div>
                </div>
                <?php
}
if($action=='Beam')
{
?>
<div class="form-group">
<input type="hidden" name="Trans_Action" id="Trans_Action" value="<?php echo $action;?>"/>
<label class="control-label col-lg-4">Invoice ID :</label>
<div class="col-lg-8">
<div id="Trans_Invoice_Id">
<select name="Trans_Invoice_No" class="form-control" id="Trans_Invoice_No">
    <option value="">--Select--</option>
    <?php
	$sql= "SELECT beam_invoice.Beam_Invoice_Id,transactions_beam1.Status FROM beam_invoice LEFT JOIN transactions_beam1 ON beam_invoice.Beam_Invoice_Id = transactions_beam1.Trans_Invoice_No WHERE transactions_beam1.Status IS NULL";
	$result = mysql_query($sql);
	while($row_result = mysql_fetch_array($result))
	{
	?>
     <option value="<?php echo $row_result['Beam_Invoice_Id']?>"><?php echo $row_result['Beam_Invoice_Id'];?></option>
     <?php }
	 ?>
    </select>
 </div>
<div id="Invoice_Date_Amt">
</div>
</div>
</div>
<?php } 
else if($action=='Bobbin')
{
?>
<div class="form-group">
<input type="hidden" name="Trans_Action" id="Trans_Action" value="<?php echo $action;?>"/>
<label class="control-label col-lg-4">Invoice ID :</label>
<div class="col-lg-8">
<div id="Trans_Invoice_Id">
<select name="Trans_Invoice_No" class="form-control" id="Trans_Invoice_No">
    <option value="">--Select--</option>
    <?php
	$sql= "SELECT bobbin_invoice.Bobbin_Invoice_Id,transactions_bobbin.Status FROM bobbin_invoice LEFT JOIN transactions_bobbin ON bobbin_invoice.Bobbin_Invoice_Id = transactions_bobbin.Trans_Invoice_No WHERE transactions_bobbin.Status IS NULL";
	$result = mysql_query($sql);
	while($row_result = mysql_fetch_array($result))
	{
	?>
     <option value="<?php echo $row_result['Bobbin_Invoice_Id']?>"><?php echo $row_result['Bobbin_Invoice_Id'];?></option>
     <?php }
	 ?>
    </select>
  
 </div>
<div id="Invoice_Date_Amt">
</div>
</div>
</div>
<?php } 
else if($action=='Taka')
{
?>
<div class="form-group">
<input type="hidden" name="Trans_Action" id="Trans_Action" value="<?php echo $action;?>"/>
<label class="control-label col-lg-4">Invoice ID :</label>
<div class="col-lg-8">
<div id="Trans_Invoice_Id">
<select name="Trans_Invoice_No" class="form-control" id="Trans_Invoice_No">
    <option value="">--Select--</option>
    <?php
	$sql= "SELECT taka_invoice.Taka_Invoice_Id,transactions_taka.Status FROM taka_invoice LEFT JOIN transactions_taka ON taka_invoice.Taka_Invoice_Id = transactions_taka.Trans_Invoice_No WHERE transactions_taka.Status IS NULL";
	$result = mysql_query($sql);
	while($row_result = mysql_fetch_array($result))
	{
	?>
     <option value="<?php echo $row_result['Taka_Invoice_Id']?>"><?php echo $row_result['Taka_Invoice_Id'];?></option>
     <?php }
	 ?>
    </select>
 </div>
<div id="Invoice_Date_Amt">
</div>
</div>
</div>
<?php } 
else if($action=='Saree')
{
?>
<div class="form-group">
<input type="hidden" name="Trans_Action" id="Trans_Action" value="<?php echo $action;?>"/>
<label class="control-label col-lg-4">Invoice ID :</label>
<div class="col-lg-8">
<div id="Trans_Invoice_Id">
<select name="Trans_Invoice_No" class="form-control" id="Trans_Invoice_No">
    <option value="">--Select--</option>
    <?php
	$sql= "SELECT saree_invoice.Saree_Invoice_Id,transactions_saree.Status FROM saree_invoice LEFT JOIN transactions_saree ON saree_invoice.Saree_Invoice_Id = transactions_saree.Trans_Invoice_No WHERE transactions_saree.Status IS NULL";
	$result = mysql_query($sql);
	while($row_result = mysql_fetch_array($result))
	{
	?>
     <option value="<?php echo $row_result['Saree_Invoice_Id']?>"><?php echo $row_result['Saree_Invoice_Id'];?></option>
     <?php }
	 ?>
    </select>
 </div>
<div id="Invoice_Date_Amt">
</div>
</div>
</div>
<?php } ?>
<div class="form-group">
<label class="control-label col-lg-4">Payment Type :</label>
<div class="col-lg-8">
  <select name="Payment_Type" class="form-control" id="Payment_Type">
    <option value="">--Select--</option>
    <?php if(isset($_REQUEST['act'])) 
	{
		?>
   <option value="Cheque" <?php if($Payment_Type == 'Cheque') { echo 'selected = \"selected\"'; } ?>>Cheque</option>
    <option value="Cash" <?php if($Payment_Type == 'Cash') { echo 'selected = \"selected\"'; } ?> ?>Cash</option>
     <option value="RTGS" <?php if($Payment_Type == 'RTGS') { echo 'selected = \"selected\"'; } ?> ?>RTGS</option>
       <option value="Online" <?php if($Payment_Type == 'Online') { echo 'selected = \"selected\"'; } ?> ?>Online</option>
                    <?php }
					else
					{
						?>
                        <option value="Cheque">Cheque</option>
                        <option value="Cash">Cash</option>
    <option value="RTGS">RTGS</option>
    <option value="Online">Online</option> 
                        <?php }
					?>
  </select>
  <div id="Invoice_Chq_Date">
</div> 
 </div>
</div>
                     <div class="form-group">
                    <label for="autosize" class="control-label col-lg-4">Description :</label>
                    <div class="col-lg-8">
                      <textarea name="Description" class="form-control" id="autosize" placeholder=""><?php echo $Description; ?></textarea><span id="auto" style="color:#F00";></span>
                  </div>
                </div>
                <?php if($action=='Beam' || $action=='Bobbin' || $act=='Beam' || $act=='Bobbin')
				{
					?>
                <div class="form-group">
<label class="control-label col-lg-4">Status :</label>
<div class="col-lg-8">
  <select name="Status" class="form-control" id="Status">
    <option value="Paid" <?php if($Status == 'Paid') { echo 'selected = \"selected\"'; } ?>>Paid</option>
    <option value="Un-Paid" <?php if($Status == 'Un-Paid') { echo 'selected = \"selected\"'; } ?>>Un-Paid</option>
                      </select>
 </div>
</div>
<?php } elseif($action=='Taka' || $action=='Saree' || $act=='Taka' || $act=='Saree')
{
	?>
    <div class="form-group">
<label class="control-label col-lg-4">Status :</label>
<div class="col-lg-8">
  <select name="Status" class="form-control" id="Status">
    <option value="Received" <?php if($Status == 'Received') { echo 'selected = \"selected\"'; } ?>>Received</option>
    <option value="Not-Received" <?php if($Status == 'Not-Received') { echo 'selected = \"selected\"'; } ?>>Not-Received</option>
                      </select>
 </div>
</div>
<?php
}
if(isset($_REQUEST['act']))
{
	?>
                <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Entry Date :</label>
                    <div class="col-lg-8">
                        <input type="text" name="Entry_Date" id="Entry_Date" class="form-control" value="<?php echo $Entry_Date; ?>" readonly/>
                    </div>
                </div>
                 <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Entry #ID :</label>
                    <div class="col-lg-8">
                        <input type="text" name="Entry_Id" id="Entry_Id" class="form-control" value="<?php echo $Entry_Id; ?>" readonly/>
                    </div>
                </div>
                <?php } ?>
                                        <div style="text-align:center" class="form-actions no-margin-bottom">
                                            <?php
							if($act=='Beam')
                             {
							?> <a href="transaction_listpage?beam"><input type="button" value="Back" class="btn btn-inverse btn-lg " /></a>
                                            <input type="submit" value="Update Beam Transaction"  class="btn btn-primary btn-lg " name="update_be" />
                        <?php }
						else if($act=='Bobbin')
                             {
							?> <a href="transaction_listpage?bobbin"><input type="button" value="Back" class="btn btn-inverse btn-lg " /></a>
                                            <input type="submit" value="Update Bobbin Transaction"  class="btn btn-primary btn-lg " name="update_bo" />
                        <?php }
						else if($act=='Taka')
                             {
							?> <a href="transaction_listpage?taka"><input type="button" value="Back" class="btn btn-inverse btn-lg " /></a>
                                            <input type="submit" value="Update Taka Transaction" class="btn btn-primary btn-lg " name="update_ta" />
                        <?php }
						else if($act=='Saree')
                             {
							?> <a href="transaction_listpage?saree"><input type="button" value="Back" class="btn btn-inverse btn-lg " /></a>
                                            <input type="submit" value="Update Saree Transaction" class="btn btn-primary btn-lg " name="update_sa" />
                        <?php }
						if($action=='Beam')
						{
						?> <a href="transaction_listpage?beam"><input type="button" value="Back" class="btn btn-inverse btn-lg " /></a>
                      <?php  if($days_remaining<=0)
{
echo "<strong style='color:#F00;'>* Please renew your website</strong>";	
}
elseif($days_remaining>0)
{
	?>
                                   <input type="submit" value="Submit Beam Transaction" class="btn btn-primary btn-lg " name="submit_be" />
                        <?php } }
                        elseif($action=='Bobbin')
						{
						?> <a href="transaction_listpage?bobbin"><input type="button" value="Back" class="btn btn-inverse btn-lg " /></a>
                       <?php if($days_remaining<=0)
{
echo "<strong style='color:#F00;'>* Please renew your website</strong>";	
	
}
elseif($days_remaining>0)
{
?>	
                                   <input type="submit" value="Submit Bobbin Transaction" class="btn btn-primary btn-lg " name="submit_bo" />
                        <?php } }
						elseif($action=='Taka')
						{
						?> <a href="transaction_listpage?taka"><input type="button" value="Back" class="btn btn-inverse btn-lg " /></a>
                       <?php if($days_remaining<=0)
{
	
echo "<strong style='color:#F00;'>* Please renew your website</strong>";	
}
elseif($days_remaining>0)
{
	?>
                                   <input type="submit" value="Submit Taka Transaction" class="btn btn-primary btn-lg " name="submit_ta" />
                        <?php } }
						elseif($action=='Saree')
						{
						?> <a href="transaction_listpage?saree"><input type="button" value="Back" class="btn btn-inverse btn-lg " /></a>
                        <?php if($days_remaining<=0)
{
echo "<strong style='color:#F00;'>* Please renew your website</strong>";	
	
}
elseif($days_remaining>0)
{
	?>
                                   <input type="submit" value="Submit Saree Transaction" class="btn btn-primary btn-lg " name="submit_sa" />
                        <?php }} ?>
                                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
                    </div>
   <?php include("footer.php"); ?>
     <script src="assets/js/shortcut.js"></script>
    <script src="assets/js/googleapi.js"></script>
<script>
         $(document).ready(function () {
			 $('#Trans_Invoice_No').focus();
			  $('#autosize').on('keypress', function (e) {
    var ingnore_key_codes = [34, 39];
    if ($.inArray(e.which, ingnore_key_codes) >= 0) {
        e.preventDefault();
        $("#auto").html("only valid special character allowed").show();
    } else {
        $("#auto").hide();
    }
});
    $("#Payment_Type").change(function(){
		t1=$("#Payment_Type").val();
		t2=$("#checking").val();
		var q="?Payment_Type="+t1+"&checking="+t2+"&Bank_Id=<?php echo $bank_replace; ?>&Chq_No=<?php echo $Chq_No; ?>&Chq_Date=<?php echo $Chq_Date; ?>";
		alert(q);
		$("#Invoice_Chq_Date").load("tra_payment_type_ajax.php"+q);
	});
	<?php if($_REQUEST['act'])
	{
		?>
		var q="?Trans_Invoice_No=<?php echo $Trans_Invoice_No;?>&Trans_Date=<?php echo $Trans_Date; ?>&Trans_Amt=<?php echo $Trans_Amt; ?>&Trans_Action=<?php echo $act;?>";
		$("#Invoice_Date_Amt").load("transcation_date_amt_ajax.php"+q);
		<?php }
		?>
	$("#Payment_Type").val("<?php echo $Payment_Type; ?>");
		t5=$("#Payment_Type").val();
		t2=$("#checking").val();
		var q="?Payment_Type="+t5+"&checking="+t2+"&Bank_Id=<?php echo $bank_replace; ?>&Chq_No=<?php echo $Chq_No; ?>&Chq_Date=<?php echo $Chq_Date; ?>";
		$("#Invoice_Chq_Date").load("tra_payment_type_ajax.php"+q);
	$("#Trans_Invoice_No").change(function(){
		t1=$("#Trans_Action").val();
		t2=$("#Trans_Invoice_No").val();
		var q="?Trans_Action="+t1+"&Trans_Invoice_No="+t2;
		$("#Invoice_Date_Amt").load("transcation_date_amt_ajax.php"+q);
	});
		 $(".dropdown").hover(            
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideDown("fast");
            $(this).toggleClass('open');        
        },
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideUp("fast");
            $(this).toggleClass('open');       
        }
    );
});
history.pushState(null, null);
    window.addEventListener('popstate', function(event)  {
    history.pushState(null, null);
    }); 
		 var submitting = false;
		 function Transactionins(mff)
{
	if(mff.Trans_Invoice_No.value=="")
    {
       alert("Invoice no is required");
       mff.Trans_Invoice_No.focus();
       return false;
    }
	if(mff.Payment_Type.value=="")
    {
       alert("Payment type is required");
       mff.Payment_Type.focus();
       return false;
    }
	if(mff.Bank_Id.value=="")
    {
       alert("Bank is required");
       mff.Bank_Id.focus();
       return false;
    }
	if(mff.Chq_No.value=="")
    {
       alert("Cheque no is required");
       mff.Chq_No.focus();
       return false;
    }
	if(mff.Chq_Date.value=="")
    {
       alert("Cheque date is required");
       mff.Chq_Date.focus();
       return false;
    }
	else if(mff.Chq_Date.value=="____-__-__")
    {
       alert("Cheque date is required");
       mff.Chq_Date.focus();
       return false;
    }
	if(mff.Description.value=="")
    {
       alert("Description is required");
       mff.Description.focus();
       return false;
    }
 return true;
}
<?php include("shortcutkeys.php");?>
</script>
<script src="assets/plugins/jasny/js/bootstrap-inputmask.js"></script>
</body>
</html>
<?php
ob_flush(); ?>