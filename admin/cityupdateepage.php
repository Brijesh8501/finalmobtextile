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
	$Entry_Id = $row_result['Registration_Id'];
  $updateSQL = sprintf("UPDATE city1 SET ct_name=%s, st_id=%s, Entry_Id='$Entry_Id' WHERE ct_id=%s",
                       GetSQLValueString($_POST['ct_name'], "text"),
                       GetSQLValueString($_POST['st_id'], "int"),
                       GetSQLValueString($_POST['ct_id'], "int"));
  mysql_select_db($database_brijesh8510, $brijesh8510);
  $Result1 = mysql_query($updateSQL, $brijesh8510) or die(mysql_error());
  
  $dateact = date('Y-m-d');
	$dateactfull = date('d-m-Y        h:i:s A');
	$ct_nameactivity = $_REQUEST['ct_name'];
	$new1 = str_replace('\' ', '\'', ucwords(str_replace('\'', '\' ', strtolower($ct_nameactivity))));
	$Partact = "City Entry<br/>City : ".$new1;
	$insactivity = "insert into activity(Activity_Id,Date,Particular,Type,Action,Datefull,Id) values(NULL,'$dateact','$Partact','City - Update','update','$dateactfull','$Entry_Id')";
	mysql_query($insactivity); 
	
  $updateGoTo = "citylistpage";
  echo '<script>alert("Record updated....");</script>';
  echo '<script>window.location="'.$updateGoTo.'";</script>';
	}
}
mysql_select_db($database_brijesh8510, $brijesh8510);
$query_state = "SELECT * FROM `state1`";
$state = mysql_query($query_state, $brijesh8510) or die(mysql_error());
$row_state = mysql_fetch_assoc($state);
$totalRows_state = mysql_num_rows($state);
$colname_Recordset1 = "-1";
if (isset($_GET['ct_id'])) {
  $colname_Recordset1 = $_GET['ct_id'];
}
mysql_select_db($database_brijesh8510, $brijesh8510);
$query_Recordset1 = sprintf("SELECT * FROM city1 WHERE ct_id = %s", GetSQLValueString($colname_Recordset1, "int"));
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
                    <h1 class="page-header" align="center">CITY</h1>
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
            if(City(this))
            {
            update.value = 'Updating...';
            submitting = true;
            return true; 
            }
            return false;">
              <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">City ID :</label>
                    <div class="col-lg-8">
                        <input type="text" name="ct_id" id="ct_id" class="form-control" value="<?php echo $row_Recordset1['ct_id']; ?>" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">City :</label>
                    <div class="col-lg-8">
                      <input type="text" id="text" placeholder="City Name" class="form-control" name="ct_name" value="<?php echo htmlentities($row_Recordset1['ct_name'], ENT_COMPAT, 'UTF-8'); ?>"  readonly />
                    </div>
                </div>
                <div class="form-group">
<label class="control-label col-lg-4">State :</label>
<div class="col-lg-8">
  <select name="st_id" class="form-control">
    <option value="">--Select--</option>
    <?php 
do {  
?>
        <option value="<?php echo $row_state['st_id']?>" <?php if (!(strcmp($row_state['st_id'], htmlentities($row_Recordset1['st_id'], ENT_COMPAT, 'UTF-8')))) {echo "SELECTED";} ?>><?php echo $row_state['st_name']?></option>
        <?php
}while($row_state = mysql_fetch_assoc($state));
  $rows = mysql_num_rows($state);
  if($rows > 0) {
      mysql_data_seek($state, 0);
	  $row_state = mysql_fetch_assoc($state);
  }
?>
  </select>
  </div>
</div>
                                        <div style="text-align:center" class="form-actions no-margin-bottom">
                                           <a href="citylistpage"> <input type="button" value="Back" class="btn btn-inverse btn-lg " /></a>
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
    <script src="assets/js/city.js"></script>
    <script type="text/javascript">
	<?php include("shortcutkeys.php");?>
	</script>
</body>
</html>
<?php
mysql_free_result($state);
mysql_free_result($Recordset1);
 ob_flush(); ?>