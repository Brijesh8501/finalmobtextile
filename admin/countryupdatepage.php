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
	{}else{
	$cnt_name = $_POST['cnt_name'];
$new1 = str_replace('\' ', '\'', ucwords(str_replace('\'', '\' ', strtolower($cnt_name))));
$Entry_Id = $row_result['Registration_Id'];
$query = mysql_query("select * from country1 where cnt_name='".$new1."' ") or die(mysql_error());
$duplicate = mysql_num_rows($query);
   if($duplicate==0)
    {
  $updateSQL = sprintf("UPDATE country1 SET cnt_name=%s, Entry_Id='$Entry_Id' WHERE cnt_id=%s",
                       GetSQLValueString($_POST['cnt_name'], "text"),
                       GetSQLValueString($_POST['cnt_id'], "int"));
  mysql_select_db($database_brijesh8510, $brijesh8510);
  $Result1 = mysql_query($updateSQL, $brijesh8510) or die(mysql_error());
  
   $dateact = date('Y-m-d');
	$dateactfull = date('d-m-Y        h:i:s A');
	$Partact = "Country Entry<br/>Country : ".$new1;
	$insactivity = "insert into activity(Activity_Id,Date,Particular,Type,Action,Datefull,Id) values(NULL,'$dateact','$Partact','Company - Update','update','$dateactfull','$Entry_Id')";
	mysql_query($insactivity); 
	
  $updateGoTo = "countrylistpage";
  echo '<script>alert("Record updated....");</script>';
  echo '<script>window.location="'.$updateGoTo.'";</script>';
}
else
    {
      echo '<script>alert("This country is allready exists....");</script>';
    }
	}
}
$colname_Recordset1 = "-1";
if (isset($_GET['cnt_id'])) {
  $colname_Recordset1 = $_GET['cnt_id'];
}
mysql_select_db($database_brijesh8510, $brijesh8510);
$query_Recordset1 = sprintf("SELECT * FROM country1 WHERE cnt_id = %s", GetSQLValueString($colname_Recordset1, "int"));
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
</head>
<body>
<?php include("sidemenu.php"); ?>
                <div class="inner">
                    <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" align="center">COUNTRY</h1>
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
            if(Country(this))
            {
            update.value = 'Updating...';
            submitting = true;
            return true; 
            }
            return false;" >
              <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Country ID :</label>
                    <div class="col-lg-8">
                       <input type="text" name="cnt_id" id="cnt_id" class="form-control" value="<?php echo $row_Recordset1['cnt_id']; ?>" readonly> 
                    </div>
                </div>
                <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Country :</label>
                    <div class="col-lg-8">
                      <input type="text" id="cnt_name" placeholder="Country Name" class="form-control" name="cnt_name" value="<?php echo htmlentities($row_Recordset1['cnt_name'], ENT_COMPAT, 'UTF-8'); ?>"/>
                       <span id="error1" style="color:#F00";></span>
                    </div>
                </div>
                                        <div style="text-align:center" class="form-actions no-margin-bottom">
                                            <a href="countrylistpage"><input type="button" value="Back" class="btn btn-inverse btn-lg " /></a>
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
    <script src="assets/js/country.js"></script>
    <script type="text/javascript">
	<?php include("shortcutkeys.php");?>
	</script>
    </body>
</html>
<?php
mysql_free_result($Recordset1);
 ob_flush(); ?>
