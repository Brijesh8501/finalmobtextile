<?php include("logcode.php"); require_once('../Connections/brijesh8510.php');
date_default_timezone_set("Asia/Calcutta");
$dateact = date('Y-m-d');
	$dateactfull = date('d-m-Y        h:i:s A');
	$Entry_Id = $row_result['Registration_Id'];
	
	$Partact = "Bank Update Page - This page is open to view.<br/>By : ".$row_result['Name'];
	$insactivity = "insert into activity(Activity_Id,Date,Particular,Type,Action,Datefull,Id) values(NULL,'$dateact','$Partact','Bank Update - View','view','$dateactfull','$Entry_Id')";
	mysql_query($insactivity); 
	
if($row_result['Role']=='Admin' || $row_result['Role']=='Manager' || $row_result['Role']=='Accountant')
{
	
}
else
{
	
	echo '<script>alert("You have no rights to view this page");</script>';
	$updateGoTo = "index";
  echo '<script>window.location="'.$updateGoTo.'";</script>';
}
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }
  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);
  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}
$colname_Recordset1 = "-1";
if (isset($_GET['Bank_Id'])) {
  $colname_Recordset1 = $_GET['Bank_Id'];
}
mysql_select_db($database_brijesh8510, $brijesh8510);
$query_Recordset1 = sprintf("SELECT * FROM bank_details WHERE Bank_Id = %s", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysql_query($query_Recordset1, $brijesh8510) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
$row_Bankk = $row_Recordset1['Bank_Name'];
$row_ba = explode("-",$row_Bankk);
if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
	if(!isset($_SESSION['User']))
	{
	}
	else
	{
	  mysql_select_db($database_brijesh8510, $brijesh8510);
	$Bank_Id = $_POST['Bank_Id'];
	$Bank_Name = $_POST['Bank_Name'];
	$Bank_str = implode("-",$Bank_Name);
$new1 = strtoupper($Bank_str);
$Entry_Id = $row_result['Registration_Id'];
$Account_Type = $_POST['Account_Type'];
$Ifsc_Code = $_POST['Ifsc_Code'];
$P_Name = strtoupper($_POST['P_Name']);
$Groups = $_REQUEST['Groups'];
date_default_timezone_set("Asia/Calcutta");
$query = mysql_query("select * from bank_details where Bank_Name = '".$new1."' ") or die(mysql_error());
$duplicate = mysql_num_rows($query);
   if($duplicate==0)
    {
		if($row_Recordset1['Groups']=="Friend" || $row_Recordset1['Groups']=="Relative" || $row_Recordset1['Groups']=="Personal")
		{
  $updateSQL = "UPDATE bank_details SET Bank_Name='$new1',Entry_Id='$Entry_Id',Account_Type='$Account_Type',Ifsc_Code='$Ifsc_Code',P_Name='$P_Name' WHERE Bank_Id='".$Bank_Id."'";
  
  $dateact = date('Y-m-d');
	$dateactfull = date('d-m-Y        h:i:s A');
	$Partact = "Update Bank Entry : ".$Bank_str."<br/>Group : ".$Groups;
	$insactivity = "insert into activity(Activity_Id,Date,Particular,Type,Action,Datefull,Id) values(NULL,'$dateact','$Partact','Bank - Update','update','$dateactfull','$Entry_Id')";
	mysql_query($insactivity); 
		}
		else
		{
 $updateSQL = "UPDATE bank_details SET Bank_Name='$new1',Entry_Id='$Entry_Id',Account_Type='$Account_Type',Ifsc_Code='$Ifsc_Code' WHERE Bank_Id='".$Bank_Id."'";
 
  $dateact = date('Y-m-d');
	$dateactfull = date('d-m-Y        h:i:s A');
	$Partact = "Update Bank Entry : ".$Bank_str."<br/>Group : ".$Groups;
	$insactivity = "insert into activity(Activity_Id,Date,Particular,Type,Action,Datefull,Id) values(NULL,'$dateact','$Partact','Bank - Update','update','$dateactfull','$Entry_Id')";
	mysql_query($insactivity); 
	
		}
  $Result1 = mysql_query($updateSQL, $brijesh8510) or die(mysql_error());
 echo '<script>alert("Record updated....");</script>';
  echo '<script>close();</script>';
  }
    else
    {
		if($row_Recordset1['Groups']=="Friend" || $row_Recordset1['Groups']=="Relative" || $row_Recordset1['Groups']=="Personal")
		{
		$updateSQL = "UPDATE bank_details SET Account_Type='$Account_Type',Ifsc_Code='$Ifsc_Code',P_Name='$P_Name' WHERE Bank_Id='".$Bank_Id."'";
  $Result1 = mysql_query($updateSQL, $brijesh8510) or die(mysql_error());
  
   $dateact = date('Y-m-d');
	$dateactfull = date('d-m-Y        h:i:s A');
	$Partact = "Update Bank Entry : ".$Bank_str."<br/>Group : ".$Groups;
	$insactivity = "insert into activity(Activity_Id,Date,Particular,Type,Action,Datefull,Id) values(NULL,'$dateact','$Partact','Bank - Update','update','$dateactfull','$Entry_Id')";
	mysql_query($insactivity); 
		
		}
		else
		{
		$updateSQL = "UPDATE bank_details SET Account_Type='$Account_Type',Ifsc_Code='$Ifsc_Code' WHERE Bank_Id='".$Bank_Id."'";
  $Result1 = mysql_query($updateSQL, $brijesh8510) or die(mysql_error());
  
   $dateact = date('Y-m-d');
	$dateactfull = date('d-m-Y        h:i:s A');
	$Partact = "Update Bank Entry : ".$Bank_str."<br/>Group : ".$Groups;
	$insactivity = "insert into activity(Activity_Id,Date,Particular,Type,Action,Datefull,Id) values(NULL,'$dateact','$Partact','Bank - Update','update','$dateactfull','$Entry_Id')";
	mysql_query($insactivity); 
		}

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
    <link rel="shortcut icon" href="Icons/st85.png">
 <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="assets/css/main.css" />
    </head>
<body>
<?php include("sidemenu.php"); ?>
                <div class="inner">
                    <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" align="center">BANK PROFILE</h1>
                </div>
            </div>
<div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <div id="div-1" class="accordion-body collapse in body">
            <form class="form-horizontal"  method="post" name="form1" onsubmit="if(submitting) {
            alert('The record is being updating, please wait a moment...');
            update.disabled = true; 
            return false;
            }
            if(bankupdate(this))
            {
            update.value = 'Updating...';
            submitting = true;
            return true; 
            }
            return false;">
            <div class="form-group row">
            <div class="col-lg-6">   
              <div class="form-group">
                    <label for="text2" class="control-label col-lg-6">Bank ID :</label>
                    <div class="col-lg-6">
                        <input type="text" name="Bank_Id" id="Bank_Id" class="form-control" value="<?php echo $row_Recordset1['Bank_Id']; ?>" readonly>
                    </div>
                </div>
                </div>
                <div class="col-lg-3">
                </div>
                <div class="col-lg-3">
                <span style="color:#00F">
                 <?php if($row_Recordset1['Groups']=="Firm") { ?>
                Current Balance : <?php echo $row_Recordset1['Current_Balance']; } ?></span>
                </div>
                </div>
 <div class="form-group row">
                 <div class="col-lg-6">
                <div class="form-group">
                    <label for="text2" class="control-label col-lg-6">Bank Name - Branch - Account :</label>
                    <div class="col-lg-6">
                      <input type="text" id="Bank_Name" placeholder="Bank Name" class="form-control"  name="Bank_Name[]" value="<?php echo htmlentities($row_ba[0], ENT_COMPAT, 'UTF-8'); ?>" /><span id="error1" style="color:#F00";></span>
                    </div>
                </div>
                </div>
                <div class="col-lg-3">
                <input type="text" id="Branch_Name" placeholder="Branch Name" class="form-control"  name="Bank_Name[]" value="<?php echo htmlentities($row_ba[1], ENT_COMPAT, 'UTF-8'); ?>" /><span id="error2" style="color:#F00";></span>
                </div>
                <div class="col-lg-3">
                <input type="text" id="Account_No" placeholder="Account Number" class="form-control"  name="Bank_Name[]" value="<?php echo htmlentities($row_ba[2], ENT_COMPAT, 'UTF-8'); ?>" onkeypress="return isNumberKey(event)" />
                </div>
                </div>
                <div class="form-group row">
                <div class="col-lg-6">
                <div class="form-group">
                    <label for="text2" class="control-label col-lg-6">IFSC Code :</label>
                    <div class="col-lg-6">
                      <input type="text" id="Ifsc_Code" class="form-control"  name="Ifsc_Code" value="<?php echo htmlentities($row_Recordset1['Ifsc_Code'], ENT_COMPAT, 'UTF-8'); ?>" /><span id="error3" style="color:#F00";></span>
                    </div>
                </div>
                </div>
                </div>
                 <div class="form-group row">
            <div class="col-lg-6">    
            <div class="form-group">
                    <label for="text2" class="control-label col-lg-6">Account :</label>
                    <div class="col-lg-6">
                        <select name="Account_Type" id="Account_Type" class="form-control">
                        <option value="">--select--</option>
                        <option value="Current" <?php if($row_Recordset1['Account_Type']=="Current") { echo "selected";}?>>Current</option>
                        <option value="Saving" <?php if($row_Recordset1['Account_Type']=="Saving") { echo "selected";}?>>Saving</option>
                        </select>
                    </div>
                </div>
                </div>
               </div>
                <div class="form-group row">
            <div class="col-lg-6">    
            <div class="form-group">
                    <label for="text2" class="control-label col-lg-6">Group :</label>
                    <div class="col-lg-6">
                    <input type="text" id="Groups" class="form-control"  name="Groups" value="<?php echo htmlentities($row_Recordset1['Groups'], ENT_COMPAT, 'UTF-8'); ?>" readonly/>     
                    </div>
                </div>
                </div>
               </div>
               <?php if($row_Recordset1['Party']!="---") { ?>
                <div class="form-group row">
            <div class="col-lg-6">    
            <div class="form-group">
                    <label for="text2" class="control-label col-lg-6">Party :</label>
                    <div class="col-lg-6">
                    <input type="text" id="Party" class="form-control"  name="Party" value="<?php echo htmlentities($row_Recordset1['Party'], ENT_COMPAT, 'UTF-8'); ?>" readonly/>     
                    </div>
                </div>
                </div>
               </div><?php } ?>
                <?php if($row_Recordset1['P_Name']!="---") { ?>
                <div class="form-group row">
            <div class="col-lg-6">    
            <div class="form-group">
                    <label for="text2" class="control-label col-lg-6">Name :</label>
                    <div class="col-lg-6">
                    <input type="text" id="P_Name" class="form-control"  name="P_Name" value="<?php echo htmlentities($row_Recordset1['P_Name'], ENT_COMPAT, 'UTF-8'); ?>"/>     
                    </div>
                </div>
                </div>
               </div><?php } ?>
               <?php if($row_Recordset1['Groups']=="Firm") { ?>
                <div class="form-group row">
            <div class="col-lg-6">    
            <div class="form-group">
                    <label for="text2" class="control-label col-lg-6">Opening Balance :</label>
                    <div class="col-lg-6">
                        <input type="text" name="Opening_Balance" id="Opening_Balance" class="form-control" value="<?php echo $row_Recordset1['Opening_Balance']; ?>" readonly/>
                    </div>
                </div>
                </div>
               </div>
               <?php } ?>
                                        <div style="text-align:center" class="form-actions no-margin-bottom">
                                           <a href="banklistpage"> <input type="button" value="Back" class="btn btn-inverse btn-lg " /></a>
                                            <input type="submit" value="Update" name="update" class="btn btn-primary btn-lg " />
                                        </div>
<input type="hidden" name="MM_update" value="form1">
                </form>
            </div>
        </div>
    </div>
</div>
                </div>
   <?php include("footer.php"); ?>
     <script src="assets/js/shortcut.js"></script>
       <script src="assets/js/googleapi.js"></script>
       <script src="assets/js/bankins.js"></script>
       <script type="text/javascript">
	   <?php include("shortcutkeys.php");?>
	   </script>
    </body>
</html>
<?php
mysql_free_result($Recordset1);
?>
