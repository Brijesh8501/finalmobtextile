<?php include("logcode.php"); 
error_reporting(0); require_once('../Connections/brijesh8510.php'); 
include("databaseconnect.php");
date_default_timezone_set("Asia/Calcutta");
if($row_result['Role']=='Admin')
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
}}
$colname_reeggg = "-1";
if (isset($_GET['Registration_Id'])) {
  $colname_reeggg = $_GET['Registration_Id'];
}
mysql_select_db($database_brijesh8510, $brijesh8510);
$query_reeggg = sprintf("SELECT registration_details.Registration_Id, registration_details.Role, registration_details.Name, registration_details.Photo, registration_details.Address, country1.cnt_id, country1.cnt_name, `state1`.st_id, `state1`.st_name, city1.ct_id, city1.ct_name, registration_details.Mob_No, registration_details.Mobile_No, registration_details.Email_Id, registration_details.Status, registration_details.Username, registration_details.Password FROM registration_details, country1, `state1`, city1 WHERE country1.cnt_id = registration_details.cnt_id AND `state1`.st_id = registration_details.st_id AND city1.ct_id = registration_details.ct_id AND Registration_Id = %s", GetSQLValueString($colname_reeggg, "int"));
$reeggg = mysql_query($query_reeggg, $brijesh8510) or die(mysql_error());
$row_reeggg = mysql_fetch_assoc($reeggg);
$totalRows_reeggg = mysql_num_rows($reeggg);
if(isset($_REQUEST['update'])){
if(!isset($_SESSION['User']))
	{}else{
define ("MAX_SIZE","1000"); 
function getExtension($str)
{
	 $i = strrpos($str,".");
	 if (!$i) { return ""; }
	 $l = strlen($str) - $i;
	 $ext = substr($str,$i+1,$l);
	 return $ext;
}
$errors = 0;
$Photo = $_FILES['Photo']['name'];
if ($Photo) 
{
	$filename = stripslashes($_FILES['Photo']['name']);
	$extension = getExtension($filename);
	$extension = strtolower($extension);
	if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") 
		&& ($extension != "gif")&& ($extension != "JPG") && ($extension != "JPEG") 
		&& ($extension != "PNG") && ($extension != "GIF")) 
	{
		echo '<script>alert("Unknown extension!");</script>';
		$errors = 1;
	}
	else
	{
		$size = filesize($_FILES['Photo']['tmp_name']);
		if ($size > MAX_SIZE*1024)
		{
			echo '<script>alert("You have exceeded the size limit!");</script>';
			$errors = 1;
		}
		else
		{
		date_default_timezone_set('Asia/Calcutta');
		$image_name = time().'.'.$extension;
		$newname = "imagefolder/".$image_name;
		$copied = copy($_FILES['Photo']['tmp_name'], $newname);
		if (!$copied) 
		{
			echo '<script>alert("Copy unsuccessfull!")</script>';
			$errors = 1;
		}
		else 
		{
	$Registration_Id = $_POST['Registration_Id'];
$ct_id = $_POST['ct_id'];
$cnt_id = $_POST['cnt_id'];
$st_id = $_POST['st_id'];
$Username = $_POST['Username'];
$new2 = strtoupper($Username);
$Password = gzdeflate(str_rot13($_POST['Password']));
$Entry_Id = $row_result['Registration_Id'];
		$query1 = mysql_query("SELECT city1.ct_id, city1.ct_name, `state1`.st_name, `state1`.st_id, country1.cnt_id, country1.cnt_name FROM city1, `state1`, country1 WHERE `state1`.st_id = '".$st_id."' AND country1.cnt_id = '".$cnt_id."' AND city1.ct_id = '".$ct_id."' ") or die(mysql_error());
$duplicate1 = mysql_num_rows($query1);
   if($duplicate1==0)
    {
       echo '<script>alert("Country city state are not match....");</script>';  
	}
	else
	{	
  $updateSQL = sprintf("UPDATE registration_details SET Role=%s, Name=%s, Photo='".$newname."', Address=%s, cnt_id=%s, st_id=%s, ct_id=%s, Mob_No=%s, Mobile_No=%s, Email_Id=%s, Status=%s, Username='".$new2."', Password='".$Password."', Entry_Id='".$Entry_Id."' WHERE Registration_Id=%s",
                       GetSQLValueString($_POST['Role'], "text"),
                       GetSQLValueString($_POST['Name'], "text"),
                       GetSQLValueString($_POST['Address'], "text"),
					   GetSQLValueString($_POST['cnt_id'], "int"),
                       GetSQLValueString($_POST['st_id'], "int"),
                       GetSQLValueString($_POST['ct_id'], "int"),
                       GetSQLValueString($_POST['Mob_No'], "double"),
                       GetSQLValueString($_POST['Mobile_No'], "double"),
                       GetSQLValueString($_POST['Email_Id'], "text"),
                       GetSQLValueString($_POST['Status'], "text"),
                       GetSQLValueString($_POST['Registration_Id'], "int"));
  mysql_select_db($database_brijesh8510, $brijesh8510);
  $Result1 = mysql_query($updateSQL, $brijesh8510) or die(mysql_error());
  unlink($row_reeggg['Photo']);
  
   $dateact = date('Y-m-d');
	$dateactfull = date('d-m-Y        h:i:s A');
	$Nameactivity = strtoupper($_REQUEST['Name']);
	$Roleactivity = $_REQUEST['Role'];
	$Statusactivity = $_REQUEST['Status'];
	$Partact = "Registration Entry<br/>Name : ".$Nameactivity.", Role : ".$Roleactivity."<br/>Status : ".$Statusactivity;
	$insactivity = "insert into activity(Activity_Id,Date,Particular,Type,Action,Datefull,Id) values(NULL,'$dateact','$Partact','Registration - Update','update','$dateactfull','$Entry_Id')";
	mysql_query($insactivity); 
	
  $updateGoTo = "registrationlistpage";
 echo '<script>alert("Record updated....");</script>';
  echo '<script>window.location="'.$updateGoTo.'";</script>';
	}}}}}
elseif($Photo==""){
$Registration_Id = $_POST['Registration_Id'];
$ct_id = $_POST['ct_id'];
$cnt_id = $_POST['cnt_id'];
$st_id = $_POST['st_id'];
$Username = $_POST['Username'];
$new2 = strtoupper($Username);
$Password = gzdeflate(str_rot13($_POST['Password']));
$Entry_Id = $row_result['Registration_Id'];
		$query1 = mysql_query("SELECT city1.ct_id, city1.ct_name, `state1`.st_name, `state1`.st_id, country1.cnt_id, country1.cnt_name FROM city1, `state1`, country1 WHERE `state1`.st_id = '".$st_id."' AND country1.cnt_id = '".$cnt_id."' AND city1.ct_id = '".$ct_id."' ") or die(mysql_error());
$duplicate1 = mysql_num_rows($query1);
   if($duplicate1==0)
    {
       echo '<script>alert("Country city state are not match....");</script>';  
	}
	else
	{	
  $updateSQL = sprintf("UPDATE registration_details SET Role=%s, Name=%s, Address=%s, cnt_id=%s, st_id=%s, ct_id=%s, Mob_No=%s, Mobile_No=%s, Email_Id=%s, Status=%s, Username='".$new2."', Password='".$Password."', Entry_Id='".$Entry_Id."' WHERE Registration_Id=%s",
                       GetSQLValueString($_POST['Role'], "text"),
                       GetSQLValueString($_POST['Name'], "text"),
                       GetSQLValueString($_POST['Address'], "text"),
					   GetSQLValueString($_POST['cnt_id'], "int"),
                       GetSQLValueString($_POST['st_id'], "int"),
                       GetSQLValueString($_POST['ct_id'], "int"),
                       GetSQLValueString($_POST['Mob_No'], "double"),
                       GetSQLValueString($_POST['Mobile_No'], "double"),
                       GetSQLValueString($_POST['Email_Id'], "text"),
                       GetSQLValueString($_POST['Status'], "text"),
                       GetSQLValueString($_POST['Registration_Id'], "int"));
  mysql_select_db($database_brijesh8510, $brijesh8510);
  $Result1 = mysql_query($updateSQL, $brijesh8510) or die(mysql_error());
  unlink($row_reeggg['Photo']);
  
    $dateact = date('Y-m-d');
	$dateactfull = date('d-m-Y        h:i:s A');
	$Nameactivity = strtoupper($_REQUEST['Name']);
	$Roleactivity = $_REQUEST['Role'];
	$Statusactivity = $_REQUEST['Status'];
	$Partact = "Registration Entry<br/>Name : ".$Nameactivity.", Role : ".$Roleactivity."<br/>Status : ".$Statusactivity;
	$insactivity = "insert into activity(Activity_Id,Date,Particular,Type,Action,Datefull,Id) values(NULL,'$dateact','$Partact','Registration - Update','update','$dateactfull','$Entry_Id')";
	mysql_query($insactivity); 
	
  $updateGoTo = "registrationlistpage";
 echo '<script>alert("Record updated....");</script>';
  echo '<script>window.location="'.$updateGoTo.'";</script>';		
}}}}
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
    <link rel="stylesheet" href="assets/css/bootstrap-fileupload.min.css" />
</head>
<body>
<?php include("sidemenu.php"); ?>
                <div class="inner">
                    <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" align="center">REGISTRATION</h1>
                </div>
            </div>
<div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <div id="div-1" class="accordion-body collapse in body">
            <form class="form-horizontal" method="post" name="form1" onsubmit="if(submitting) {
            alert('The record is updating, please wait a moment...');
            update.disabled = true; 
            return false;
            }
            if(Registrationupd(this))
            {
            update.value = 'Updating...';
            submitting = true;
            return true; 
            }
            return false;" enctype="multipart/form-data">
             <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Registration ID :</label>
        <div class="col-lg-8">
                      <input type="text" id="Registration_Id" placeholder="" name="Registration_Id" value="<?php echo $row_reeggg['Registration_Id']; ?>" class="form-control" readonly />
                    </div>
                </div>
                <div class="form-group">
<label class="control-label col-lg-4">Role :</label>
<div class="col-lg-8">
  <select name="Role" class="form-control">
    <option value="">--Select--</option>
    <option value="Admin" <?php if (!(strcmp("Admin", htmlentities($row_reeggg['Role'], ENT_COMPAT, 'UTF-8')))) {echo "SELECTED";} ?>>Admin</option>
                    <option value="Supervisor" <?php if (!(strcmp("Supervisor", htmlentities($row_reeggg['Role'], ENT_COMPAT, 'UTF-8')))) {echo "SELECTED";} ?>>Supervisor</option>
                    <option value="Manager" <?php if (!(strcmp("Manager", htmlentities($row_reeggg['Role'], ENT_COMPAT, 'UTF-8')))) {echo "SELECTED";} ?>>Manager</option>
                <option value="Accountant" <?php if (!(strcmp("Accountant", htmlentities($row_reeggg['Role'], ENT_COMPAT, 'UTF-8')))) {echo "SELECTED";} ?>>Accountant</option>
                <?php if($row_result['Role']=='Company') { ?>
                 <option value="Company" <?php if (!(strcmp("Company", htmlentities($row_reeggg['Role'], ENT_COMPAT, 'UTF-8')))) {echo "SELECTED";} ?>>Company</option><?php } ?>
  </select>
  </div>
</div>
                <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Name :</label>
                    <div class="col-lg-8">
                      <input type="text" id="text" placeholder="Person Name" name="Name" value="<?php echo htmlentities($row_reeggg['Name'], ENT_COMPAT, 'UTF-8'); ?>" class="form-control" readonly />
                    </div>
                </div>
                <div class="form-group">
                        <label class="control-label col-lg-4">Photo :</label>
                        <div class="col-lg-8">
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="<?php echo htmlentities($row_reeggg['Photo'], ENT_COMPAT, 'UTF-8'); ?>" /></div>
                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                <div>
                                    <span class="btn btn-file btn-primary"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input type="file" name="Photo" value="<?php echo htmlentities($row_reeggg['Photo'], ENT_COMPAT, 'UTF-8'); ?>" /></span>
                                    <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>&nbsp;&nbsp;<span style="color:#F00";>only JPG, GIF, PNG, JPEG extensions are accepted</span>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="form-group">
                    <label for="autosize" class="control-label col-lg-4">Address :</label>
                    <div class="col-lg-8">
                      <textarea name="Address" class="form-control" id="autosize"><?php echo htmlentities($row_reeggg['Address'], ENT_COMPAT, 'UTF-8'); ?></textarea>
                      <span id="auto" style="color:#F00";></span>
                    </div>
                </div>
 <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">City :</label>
                    <div class="col-lg-8">
                    <input type="text" placeholder="" class="form-control" name="ct_name" id="ct_name" value="<?php echo htmlentities($row_reeggg['ct_name'], ENT_COMPAT, 'UTF-8'); ?>" />
                     <input type="hidden" name="ct_id" id="ct_id" value="<?php echo htmlentities($row_reeggg['ct_id'], ENT_COMPAT, 'UTF-8'); ?>" />
                   </div>
                </div>
<div class="form-group">
                    <label for="text2" class="control-label col-lg-4">State :</label>
                    <div class="col-lg-8">
                    <input type="text" placeholder="" class="form-control" name="st_name" id="st_name" value="<?php echo htmlentities($row_reeggg['st_name'], ENT_COMPAT, 'UTF-8'); ?>" readonly/>
                     <input type="hidden" name="st_id" id="st_id" value="<?php echo htmlentities($row_reeggg['st_id'], ENT_COMPAT, 'UTF-8'); ?>" />
                   </div>
                </div>
                <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Country :</label>
                    <div class="col-lg-8">
                    <input type="text" placeholder="" class="form-control" name="cnt_name" id="cnt_name" value="<?php echo htmlentities($row_reeggg['cnt_name'], ENT_COMPAT, 'UTF-8'); ?>" readonly/>
                     <input type="hidden" name="cnt_id" id="cnt_id" value="<?php echo htmlentities($row_reeggg['cnt_id'], ENT_COMPAT, 'UTF-8'); ?>" />
                   </div>
                </div>
 <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Mobile No :</label>
                    <div class="col-lg-8">
                    <input type="text" id="text" placeholder="" class="form-control" name="Mob_No" value="<?php echo htmlentities($row_reeggg['Mob_No'], ENT_COMPAT, 'UTF-8'); ?>" onkeypress="return isNumberKey(event)"/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Alternate Mobile No :</label>
                    <div class="col-lg-8">
                    <input type="text" id="text" placeholder="" class="form-control" name="Mobile_No" value="<?php echo htmlentities($row_reeggg['Mobile_No'], ENT_COMPAT, 'UTF-8'); ?>" onkeypress="return isNumberKey(event)"/>
                    </div>
                </div>
<div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Email ID :</label>
                    <div class="col-lg-8">
                    <input type="email" id="text4" placeholder="Email ID" name="Email_Id" value="<?php echo htmlentities($row_reeggg['Email_Id'], ENT_COMPAT, 'UTF-8'); ?>" class="form-control" readonly/>
                   </div>
                </div>
                    <div class="form-group">
    <label class="control-label col-lg-4">Status :</label>
    <div class="col-lg-8">
      <select name="Status" class="form-control">
      <option value="Join" <?php if (!(strcmp('Join', htmlentities($row_reeggg['Status'], ENT_COMPAT, 'UTF-8')))) {echo "SELECTED";} ?>>Join</option>
                <option value="Left" <?php if (!(strcmp('Left', htmlentities($row_reeggg['Status'], ENT_COMPAT, 'UTF-8')))) {echo "SELECTED";} ?>>Left</option>
      </select>
      </div>
</div>
<div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Username :</label>
                    <div class="col-lg-8">
                      <input type="text" id="Username" placeholder="Username" name="Username" value="<?php echo htmlentities($row_reeggg['Username'], ENT_COMPAT, 'UTF-8'); ?>" class="form-control" readonly/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Password :</label>
                    <div class="col-lg-8">
                      <input class="form-control" type="password" id="pass2" name="Password" value=""/>
                               <span id="error4" style="color:#F00";></span>
                              </div>
                </div>
                <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Confirm Password :</label>
                    <div class="col-lg-8">
                      <input class="form-control" type="password" id="pass1" name="Confirm_Password"/>
                   </div>
                </div>
                                        <div style="text-align:center" class="form-actions no-margin-bottom">
                                            <a href="registrationlistpage"><input type="button" value=" Back" class="btn btn-inverse btn-lg " /></a>
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
 <script src="assets/js/registration.js"></script>
<script src="assets/js/jointjquerydateandpicker.js"></script>
<script src="assets/plugins/jasny/js/bootstrap-fileupload.js"></script>
<script type="text/javascript">
<?php include("shortcutkeys.php");?>
</script>
</body>
</html>
<?php
mysql_free_result($reeggg);
 ob_flush(); ?>