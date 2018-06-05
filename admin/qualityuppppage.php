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
}}
if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
	if(!isset($_SESSION['User']))
	{}else
	{
	$Quality_Name = $_POST['Quality_Name'];
	$Description = $_POST['Description'];
	$Quality_Id = $_POST['Quality_Id'];
    $new1 = strtoupper($Quality_Name);
	$Entry_Id = $row_result['Registration_Id'];
	if($row_result['Role']=='Admin' || $row_result['Role']=='Manager' )
{$Labour_Rate = $_POST['Labour_Rate'];}
if($row_result['Role']=='Admin' || $row_result['Role']=='Manager' )
				{
  $updateSQL = "UPDATE quality_details SET Quality_Name='".$new1."', `Description`= '$Description',`Labour_Rate`='".$Labour_Rate."', `Entry_Id`='$Entry_Id' WHERE Quality_Id = '$Quality_Id'";
                        mysql_select_db($database_brijesh8510, $brijesh8510);
  $Result1 = mysql_query($updateSQL, $brijesh8510) or die(mysql_error());
  
   $dateact = date('Y-m-d');
	$dateactfull = date('d-m-Y        h:i:s A');
	$Partact = "Quality Entry<br/>Quality Name : ".$new1;
	$insactivity = "insert into activity(Activity_Id,Date,Particular,Type,Action,Datefull,Id) values(NULL,'$dateact','$Partact','Quality - Update','update','$dateactfull','$Entry_Id')";
	mysql_query($insactivity); 
	
 $updateGoTo = "qualitylistpage";
 echo '<script>alert("Record updated....");</script>';
  echo '<script>window.location="'.$updateGoTo.'";</script>';
				}
	 else if($row_result['Role']=='Supervisor' || $row_result['Role']=='Accountant')
				{
  $updateSQL = "UPDATE quality_details SET Quality_Name='".$new1."', `Description`= '$Description', `Entry_Id`='$Entry_Id' WHERE Quality_Id = '$Quality_Id'";
          
  mysql_select_db($database_brijesh8510, $brijesh8510);
  $Result1 = mysql_query($updateSQL, $brijesh8510) or die(mysql_error());
  
   $dateact = date('Y-m-d');
	$dateactfull = date('d-m-Y        h:i:s A');
	$Partact = "Quality Entry<br/>Quality Name : ".$new1;
	$insactivity = "insert into activity(Activity_Id,Date,Particular,Type,Action,Datefull,Id) values(NULL,'$dateact','$Partact','Quality - Update','update','$dateactfull','$Entry_Id')";
	mysql_query($insactivity); 
	
 $updateGoTo = "qualitylistpage";
 echo '<script>alert("Record updated....");</script>';
  echo '<script>window.location="'.$updateGoTo.'";</script>';
				}}}
$colname_quality = "-1";
if (isset($_GET['Quality_Id'])) {
  $colname_quality = $_GET['Quality_Id'];
}
mysql_select_db($database_brijesh8510, $brijesh8510);
$query_quality = sprintf("SELECT * FROM quality_details WHERE Quality_Id = %s", GetSQLValueString($colname_quality, "int"));
$quality = mysql_query($query_quality, $brijesh8510) or die(mysql_error());
$row_quality = mysql_fetch_assoc($quality);
$totalRows_quality = mysql_num_rows($quality);
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
                    <h1 class="page-header" align="center">QUALITY</h1>
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
            if(Quality(this))
            {
            update.value = 'Updating...';
            submitting = true;
            return true; 
            }
            return false;">
                <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Quality ID :</label>
                    <div class="col-lg-8">
                      <input type="text" class="form-control" name="Quality_Id" id="Quality_Id" value="<?php echo $row_quality['Quality_Id']; ?>" readonly />
                    </div>
                </div>
                <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Quality :</label>
                    <div class="col-lg-8">
                      <input type="text" id="Quality_Name" placeholder="Quality Name" class="form-control" name="Quality_Name" value="<?php echo htmlentities($row_quality['Quality_Name'], ENT_COMPAT, 'UTF-8'); ?>" readonly/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="autosize" class="control-label col-lg-4">Description :</label>
                    <div class="col-lg-8">
                      <textarea name="Description" class="form-control" id="autosize"><?php echo htmlentities($row_quality['Description'], ENT_COMPAT, 'UTF-8'); ?></textarea>
                      <span id="auto" style="color:#F00";></span>
                    </div>
                </div>
<?php if($row_result['Role']=='Admin' || $row_result['Role']=='Manager' )
				{
					?>
                 <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Labour Rate :</label>
                    <div class="col-lg-8">
                      <input type="text" id="Labour_Rate" placeholder="Labour rate for quality" class="form-control" name="Labour_Rate" value="<?php echo $row_quality['Labour_Rate']; ?>" onkeypress="return isDecimalNumberKey(event)" /><span style="color:#F00";>(Optional)</span>
                    </div>
                </div>
                <?php }
				else if($row_result['Role']=='Supervisor' || $row_result['Role']=='Accountant')
				{
					echo '<center style="color:#F00;">'."If you want to set or update labour rate for this quality then please contact admin or manager".'</center>';
				}
				?>
                                        <div style="text-align:center" class="form-actions no-margin-bottom">
                                            <a href="qualitylistpage"><input type="button" value=" Back" class="btn btn-inverse btn-lg " /></a>
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
 <script src="assets/js/quality.js"></script>
 <script type="text/javascript">
 <?php include("shortcutkeys.php");?>
 </script>
</body>
</html>
<?php
mysql_free_result($quality);
 ob_flush(); ?>
