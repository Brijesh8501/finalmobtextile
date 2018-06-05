<?php include("logcode.php"); require_once('../Connections/brijesh8510.php'); 
date_default_timezone_set("Asia/Calcutta");
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
if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
	if(!isset($_SESSION['User']))
	{
	}
	else
	{
	mysql_select_db($database_brijesh8510, $brijesh8510);
	$cnt_id = $_POST['cnt_id'];
	$st_id = $_POST['st_id'];
	$ct_id = $_POST['ct_id'];
	$Entry_Id = $row_result['Registration_Id'];
	$query1 = mysql_query("SELECT city1.ct_id, city1.ct_name, `state1`.st_name, `state1`.st_id, country1.cnt_id, country1.cnt_name FROM city1, `state1`, country1 WHERE `state1`.st_id = '".$st_id."' AND country1.cnt_id = '".$cnt_id."' AND city1.ct_id = '".$ct_id."' " ) or die(mysql_error());
$duplicate1 = mysql_num_rows($query1);
   if($duplicate1==0)
    {
       echo '<script>alert("Country city state are not match....");</script>';  
	}
	else
	{
  $updateSQL = sprintf("UPDATE company_deetaails SET C_Name=%s, Address=%s, cnt_id=%s, ct_id=%s, st_id=%s, Phone_No=%s, Mobile_No=%s, Email_Id=%s, Status=%s, Entry_Id='$Entry_Id' WHERE Company_Id=%s",
                       GetSQLValueString($_POST['C_Name'], "text"),
                       GetSQLValueString($_POST['Address'], "text"),
					   GetSQLValueString($_POST['cnt_id'], "int"),
                       GetSQLValueString($_POST['ct_id'], "int"),
                       GetSQLValueString($_POST['st_id'], "int"),
                       GetSQLValueString($_POST['Phone_No'], "text"),
                       GetSQLValueString($_POST['Mobile_No'], "double"),
                       GetSQLValueString($_POST['Email_Id'], "text"),
                       GetSQLValueString($_POST['Status'], "text"),
                       GetSQLValueString($_POST['Company_Id'], "int"));
  mysql_select_db($database_brijesh8510, $brijesh8510);
  $Result1 = mysql_query($updateSQL, $brijesh8510) or die(mysql_error());
  
  $dateact = date('Y-m-d');
	$dateactfull = date('d-m-Y        h:i:s A');
	$C_Nameactivity = strtoupper($_REQUEST['C_Name']);
	$statusactivity = $_REQUEST['Status'];
	$Partact = "Company Entry<br/>Company : ".$C_Nameactivity."<br/>Status : ".$statusactivity;
	$insactivity = "insert into activity(Activity_Id,Date,Particular,Type,Action,Datefull,Id) values(NULL,'$dateact','$Partact','Company - Update','update','$dateactfull','$Entry_Id')";
	mysql_query($insactivity); 
	
  $updateGoTo = "companyprofilelistpage";
   echo '<script>alert("Record updated....");</script>';
  echo '<script>window.location="'.$updateGoTo.'";</script>';
}
		}
}
$colname_Recordset1 = "-1";
if (isset($_GET['Company_Id'])) {
  $colname_Recordset1 = $_GET['Company_Id'];
}
mysql_select_db($database_brijesh8510, $brijesh8510);
$query_Recordset1 = sprintf("SELECT company_deetaails.Company_Id, company_deetaails.C_Name, company_deetaails.Address, country1.cnt_id, country1.cnt_name, city1.ct_id, city1.ct_name, `state1`.st_id, `state1`.st_name, company_deetaails.Phone_No, company_deetaails.Mobile_No, company_deetaails.Email_Id, company_deetaails.Status FROM company_deetaails, country1, city1, `state1` WHERE country1.cnt_id = company_deetaails.cnt_id AND city1.ct_id = company_deetaails.ct_id AND `state1`.st_id = company_deetaails.st_id AND Company_Id = %s", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysql_query($query_Recordset1, $brijesh8510) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
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
 <link rel="stylesheet" href="assets/css/joint-jquery-ui-datepicker.css">
</head>
<body>
<?php include("sidemenu.php"); ?>
             <div class="inner">
                    <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" align="center">COMPANY</h1>
                </div>
            </div>
<div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <div id="div-1" class="accordion-body collapse in body">
            <form class="form-horizontal" method="post" name="form1" onsubmit="if(submitting) {
            alert('The record is being updating, please wait a moment...');
            update.disabled = true; 
            return false;
            }
            if(Company(this))
            {
            update.value = 'Updating...';
            submitting = true;
            return true; 
            }
            return false;">
                <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Company ID :</label>
                    <div class="col-lg-8">
                      <input type="text" id="Company_Id" placeholder="" name="Company_Id" value="<?php echo $row_Recordset1['Company_Id']; ?>" class="form-control" readonly />
                    </div>
                </div>
                <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Company :</label>
                    <div class="col-lg-8">
                      <input type="text" id="text" placeholder="Company name" name="C_Name" value="<?php echo htmlentities($row_Recordset1['C_Name'], ENT_COMPAT, 'UTF-8'); ?>" class="form-control" readonly />
                    </div>
                </div>
                <div class="form-group">
                    <label for="autosize" class="control-label col-lg-4">Address :</label>
                    <div class="col-lg-8">
                      <textarea name="Address" class="form-control" id="autosize"><?php echo htmlentities($row_Recordset1['Address'], ENT_COMPAT, 'UTF-8'); ?></textarea>
                      <span id="auto" style="color:#F00";></span>
                    </div>
                </div>
                 <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">City :</label>
                    <div class="col-lg-8">
                    <input type="text" placeholder="" class="form-control" name="ct_name" id="ct_name" value="<?php echo htmlentities($row_Recordset1['ct_name'], ENT_COMPAT, 'UTF-8'); ?>" />
                     <input type="hidden" name="ct_id" id="ct_id" value="<?php echo htmlentities($row_Recordset1['ct_id'], ENT_COMPAT, 'UTF-8'); ?>" />
                   </div>
                </div>
<div class="form-group">
                    <label for="text2" class="control-label col-lg-4">State :</label>
                    <div class="col-lg-8">
                    <input type="text" placeholder="" class="form-control" name="st_name" id="st_name" value="<?php echo htmlentities($row_Recordset1['st_name'], ENT_COMPAT, 'UTF-8'); ?>" readonly/>
                     <input type="hidden" name="st_id" id="st_id" value="<?php echo htmlentities($row_Recordset1['st_id'], ENT_COMPAT, 'UTF-8'); ?>" />
                   </div>
                </div>
                <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Country :</label>
                    <div class="col-lg-8">
                    <input type="text" placeholder="" class="form-control" name="cnt_name" id="cnt_name" value="<?php echo htmlentities($row_Recordset1['cnt_name'], ENT_COMPAT, 'UTF-8'); ?>" readonly/>
                     <input type="hidden" name="cnt_id" id="cnt_id" value="<?php echo htmlentities($row_Recordset1['cnt_id'], ENT_COMPAT, 'UTF-8'); ?>" />
                   </div>
                </div>
                    <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Phone No :</label>
                    <div class="col-lg-8">
                    <input type="text" id="text" placeholder="" class="form-control"name="Phone_No" value="<?php echo htmlentities($row_Recordset1['Phone_No'], ENT_COMPAT, 'UTF-8'); ?>" onkeypress="return isNumberKey(event)"   />
                    </div>
                </div>
                <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Alternate Mobile No :</label>
                    <div class="col-lg-8">
                    <input type="text" id="text" placeholder="" class="form-control" name="Mobile_No" value="<?php echo htmlentities($row_Recordset1['Mobile_No'], ENT_COMPAT, 'UTF-8'); ?>"  onkeypress="return isNumberKey(event)"  />
                    </div>
                </div>
<div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Email ID :</label>
                    <div class="col-lg-8">
                    <input type="email" id="text4" name="Email_Id" value="<?php echo htmlentities($row_Recordset1['Email_Id'], ENT_COMPAT, 'UTF-8'); ?>" placeholder="Email ID" class="form-control" required/>
                   </div>
                </div>
                    <div class="form-group">
    <label class="control-label col-lg-4">Status :</label>
    <div class="col-lg-8">
      <select name="Status" class="form-control">
      <option value="Join" <?php if (!(strcmp("Join", htmlentities($row_Recordset1['Status'], ENT_COMPAT, 'UTF-8')))) {echo "SELECTED";} ?>>Join</option>
             <option value="Left" <?php if (!(strcmp("Left", htmlentities($row_Recordset1['Status'], ENT_COMPAT, 'UTF-8')))) {echo "SELECTED";} ?>>Left</option>
      </select>
     </div>
</div>
                                        <div style="text-align:center" class="form-actions no-margin-bottom">
                                            <a href="companyprofilelistpage"><input type="button" value="Back" class="btn btn-inverse btn-lg " /></a>
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
 <script src="assets/js/company.js"></script>
<script src="assets/js/jointjquerydateandpicker.js"></script>
<script type="text/javascript">
<?php include("shortcutkeys.php");?>
</script>
</body>
</html>
<?php
mysql_free_result($Recordset1);
 ob_flush(); ?>