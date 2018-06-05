<?php include("logcode.php"); require_once('../Connections/brijesh8510.php'); error_reporting(0); 
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
	{}
	else
	{
	            if(isset($_REQUEST['st']))
					{
						$decodeurl = $_REQUEST['st'];
						$durl = urldecode($decodeurl); 
	                     $turl = str_replace("'"," ",$durl);
	                      $urls = explode(" ",$turl);
						  $t0 = $urls[1];
						if($t0=='Fitted')
						{
	$Entry_Id = $row_result['Registration_Id'];
  $updateSQL = sprintf("UPDATE beam_machine SET Be_D_C_Id=%s, Machine_Id=%s, Started_Date=%s, Status=%s, Entry_Id='$Entry_Id' WHERE Be_M_Id=%s",
                       GetSQLValueString($_POST['Be_D_C_Id'], "int"),
                       GetSQLValueString($_POST['Machine_Id'], "int"),
                       GetSQLValueString($_POST['Started_Date'], "date"),
                       GetSQLValueString($_POST['Status'], "text"),
					   GetSQLValueString($_POST['Be_M_Id'], "int"));
  mysql_select_db($database_brijesh8510, $brijesh8510);
  $Result1 = mysql_query($updateSQL, $brijesh8510) or die(mysql_error());
   $Be_D_C_Idactivity = $_REQUEST['Be_D_C_Id'];
  $Machine_Idactivity = $_REQUEST['Machine_Id'];
  $selectbeamno = mysql_query("select Beam_No,Taar,Beam_Meter,Quality_Name from beam_dcorg,quality_details where quality_details.Quality_Id = beam_dcorg.Quality_Id and Be_D_C_Id = '".$Be_D_C_Idactivity."'");
  $selectbeamnofetch = mysql_fetch_array($selectbeamno);
  
  $selectmachno = mysql_query("select Machine_No from machine_details where Machine_Id = '$Machine_Idactivity'");
  $selectmachnofetch = mysql_fetch_array($selectmachno);
  
  $dateact = date('Y-m-d');
	$dateactfull = date('d-m-Y        h:i:s A');
	$Partact = "BEAM-Machine Entry<br/>Beam No : ".$selectbeamnofetch['Beam_No'].", Taar : ".$selectbeamnofetch['Taar'].",  Meter : ".$selectbeamnofetch['Beam_Meter']."<br/>Machine No : ".$selectmachnofetch['Machine_No']."<br/>Status : ".$t0;
	$insactivity = "insert into activity(Activity_Id,Date,Particular,Type,Action,Datefull,Id) values(NULL,'$dateact','$Partact','Beam-Machine - Update','update','$dateactfull','$Entry_Id')";
	mysql_query($insactivity);  
	
						}
       else if($t0=='R-temporary')
						{
							$Entry_Id = $row_result['Registration_Id'];
  $updateSQL = sprintf("UPDATE beam_machine SET Be_D_C_Id=%s, Machine_Id=%s, Started_Date=%s, Status=%s, Entry_Id='$Entry_Id' WHERE Be_M_Id=%s",
                       GetSQLValueString($_POST['Be_D_C_Id'], "int"),
                       GetSQLValueString($_POST['Machine_Id'], "int"),
                       GetSQLValueString($_POST['Started_Date'], "date"),
                       GetSQLValueString($_POST['Status'], "text"),
					   GetSQLValueString($_POST['Be_M_Id'], "int"));
  mysql_select_db($database_brijesh8510, $brijesh8510);
  $Result1 = mysql_query($updateSQL, $brijesh8510) or die(mysql_error());
  
   $Be_D_C_Idactivity = $_REQUEST['Be_D_C_Id'];
  $Machine_Idactivity = $_REQUEST['Machine_Id'];
  $selectbeamno = mysql_query("select Beam_No,Taar,Beam_Meter,Quality_Name from beam_dcorg,quality_details where quality_details.Quality_Id = beam_dcorg.Quality_Id and Be_D_C_Id = '".$Be_D_C_Idactivity."'");
  $selectbeamnofetch = mysql_fetch_array($selectbeamno);
  
  $selectmachno = mysql_query("select Machine_No from machine_details where Machine_Id = '$Machine_Idactivity'");
  $selectmachnofetch = mysql_fetch_array($selectmachno);
  
  $dateact = date('Y-m-d');
	$dateactfull = date('d-m-Y        h:i:s A');
	$Partact = "BEAM-Machine Entry<br/>Beam No : ".$selectbeamnofetch['Beam_No'].", Taar : ".$selectbeamnofetch['Taar'].",  Meter : ".$selectbeamnofetch['Beam_Meter']."<br/>Machine No : ".$selectmachnofetch['Machine_No']."<br/>Status : ".$t0;
	$insactivity = "insert into activity(Activity_Id,Date,Particular,Type,Action,Datefull,Id) values(NULL,'$dateact','$Partact','Beam-Machine - Update','update','$dateactfull','$Entry_Id')";
	mysql_query($insactivity);  
	
							}
							else if($t0=='R-permanent')
						{
							if($row_result['Role']=='Admin')
							{
								$Entry_Id = $row_result['Registration_Id'];
  $updateSQL = sprintf("UPDATE beam_machine SET Be_D_C_Id=%s, Machine_Id=%s, Started_Date=%s, Status=%s, Entry_Id='$Entry_Id' WHERE Be_M_Id=%s",
                       GetSQLValueString($_POST['Be_D_C_Id'], "int"),
                       GetSQLValueString($_POST['Machine_Id'], "int"),
                       GetSQLValueString($_POST['Started_Date'], "date"),
                       GetSQLValueString($_POST['Status'], "text"),
					   GetSQLValueString($_POST['Be_M_Id'], "int"));
  mysql_select_db($database_brijesh8510, $brijesh8510);
  $Result1 = mysql_query($updateSQL, $brijesh8510) or die(mysql_error());
  
   $Be_D_C_Idactivity = $_REQUEST['Be_D_C_Id'];
  $Machine_Idactivity = $_REQUEST['Machine_Id'];
  $selectbeamno = mysql_query("select Beam_No,Taar,Beam_Meter,Quality_Name from beam_dcorg,quality_details where quality_details.Quality_Id = beam_dcorg.Quality_Id and Be_D_C_Id = '".$Be_D_C_Idactivity."'");
  $selectbeamnofetch = mysql_fetch_array($selectbeamno);
  
  $selectmachno = mysql_query("select Machine_No from machine_details where Machine_Id = '$Machine_Idactivity'");
  $selectmachnofetch = mysql_fetch_array($selectmachno);
  
  $dateact = date('Y-m-d');
	$dateactfull = date('d-m-Y        h:i:s A');
	$Partact = "BEAM-Machine Entry<br/>Beam No : ".$selectbeamnofetch['Beam_No'].", Taar : ".$selectbeamnofetch['Taar'].",  Meter : ".$selectbeamnofetch['Beam_Meter']."<br/>Machine No : ".$selectmachnofetch['Machine_No']."<br/>Status : ".$t0;
	$insactivity = "insert into activity(Activity_Id,Date,Particular,Type,Action,Datefull,Id) values(NULL,'$dateact','$Partact','Beam-Machine - Update','update','$dateactfull','$Entry_Id')";
	mysql_query($insactivity);  
	
							}
							if($row_result['Role']=='Manager')
							{
								$Entry_Id = $row_result['Registration_Id'];
  $updateSQL = sprintf("UPDATE beam_machine SET Be_D_C_Id=%s, Machine_Id=%s, Started_Date=%s, Status=%s, Entry_Id='$Entry_Id' WHERE Be_M_Id=%s",
                       GetSQLValueString($_POST['Be_D_C_Id'], "int"),
                       GetSQLValueString($_POST['Machine_Id'], "int"),
                       GetSQLValueString($_POST['Started_Date'], "date"),
                       GetSQLValueString($_POST['Status'], "text"),
					   GetSQLValueString($_POST['Be_M_Id'], "int"));
  mysql_select_db($database_brijesh8510, $brijesh8510);
  $Result1 = mysql_query($updateSQL, $brijesh8510) or die(mysql_error());
  
  $Be_D_C_Idactivity = $_REQUEST['Be_D_C_Id'];
  $Machine_Idactivity = $_REQUEST['Machine_Id'];
  $selectbeamno = mysql_query("select Beam_No,Taar,Beam_Meter,Quality_Name from beam_dcorg,quality_details where quality_details.Quality_Id = beam_dcorg.Quality_Id and Be_D_C_Id = '".$Be_D_C_Idactivity."'");
  $selectbeamnofetch = mysql_fetch_array($selectbeamno);
  
  $selectmachno = mysql_query("select Machine_No from machine_details where Machine_Id = '$Machine_Idactivity'");
  $selectmachnofetch = mysql_fetch_array($selectmachno);
  
  $dateact = date('Y-m-d');
	$dateactfull = date('d-m-Y        h:i:s A');
	$Partact = "BEAM-Machine Entry<br/>Beam No : ".$selectbeamnofetch['Beam_No'].", Taar : ".$selectbeamnofetch['Taar'].",  Meter : ".$selectbeamnofetch['Beam_Meter']."<br/>Machine No : ".$selectmachnofetch['Machine_No']."<br/>Status : ".$t0;
	$insactivity = "insert into activity(Activity_Id,Date,Particular,Type,Action,Datefull,Id) values(NULL,'$dateact','$Partact','Beam-Machine - Update','update','$dateactfull','$Entry_Id')";
	mysql_query($insactivity);  
							}
							elseif($row_result['Role']=='Supervisor' || $row_result['Role']=='Accountant' )
							{
							$Entry_Id = $row_result['Registration_Id'];
  $updateSQL = sprintf("UPDATE beam_machine SET Be_D_C_Id=%s, Machine_Id=%s, Started_Date=%s, Entry_Id='$Entry_Id' WHERE Be_M_Id=%s",
                       GetSQLValueString($_POST['Be_D_C_Id'], "int"),
                       GetSQLValueString($_POST['Machine_Id'], "int"),
                       GetSQLValueString($_POST['Started_Date'], "date"),
                       GetSQLValueString($_POST['Be_M_Id'], "int"));
  mysql_select_db($database_brijesh8510, $brijesh8510);
  $Result1 = mysql_query($updateSQL, $brijesh8510) or die(mysql_error());
  
  $Be_D_C_Idactivity = $_REQUEST['Be_D_C_Id'];
  $Machine_Idactivity = $_REQUEST['Machine_Id'];
  $selectbeamno = mysql_query("select Beam_No,Taar,Beam_Meter,Quality_Name from beam_dcorg,quality_details where quality_details.Quality_Id = beam_dcorg.Quality_Id and Be_D_C_Id = '".$Be_D_C_Idactivity."'");
  $selectbeamnofetch = mysql_fetch_array($selectbeamno);
  
  $selectmachno = mysql_query("select Machine_No from machine_details where Machine_Id = '$Machine_Idactivity'");
  $selectmachnofetch = mysql_fetch_array($selectmachno);
  
  $dateact = date('Y-m-d');
	$dateactfull = date('d-m-Y        h:i:s A');
	$Partact = "BEAM-Machine Entry<br/>Beam No : ".$selectbeamnofetch['Beam_No'].", Taar : ".$selectbeamnofetch['Taar'].",  Meter : ".$selectbeamnofetch['Beam_Meter']."<br/>Machine No : ".$selectmachnofetch['Machine_No']."<br/>Status : ".$t0;
	$insactivity = "insert into activity(Activity_Id,Date,Particular,Type,Action,Datefull,Id) values(NULL,'$dateact','$Partact','Beam-Machine - Update','update','$dateactfull','$Entry_Id')";
	mysql_query($insactivity);  
							}}}
  $updateGoTo = "beammachlistpage";
  echo '<script>alert("Record updated....");</script>';
    echo '<script>window.location="'.$updateGoTo.'";</script>';
}}
$colname_Recordset1 = "-1";
if (isset($_GET['Be_M_Id'])) {
   $colname_Recordset1 = $_GET['Be_M_Id'];
                       }
mysql_select_db($database_brijesh8510, $brijesh8510);
$query_Recordset1 = sprintf("SELECT beam_machine.Be_M_Id, beam_dcorg.Beam_No, beam_machine.Be_D_C_Id, machine_details.Machine_No, beam_machine.Started_Date, beam_machine.Status, beam_machine.Machine_Id FROM beam_machine, beam_dcorg, machine_details WHERE beam_dcorg.Be_D_C_Id = beam_machine.Be_D_C_Id AND machine_details.Machine_Id = beam_machine.Machine_Id AND beam_machine.Be_M_Id = %s", GetSQLValueString($colname_Recordset1, "int"));
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
                    <h1 class="page-header" align="center">BEAM-MACHINE</h1>
                </div>
            </div>
<div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <div id="div-1" class="accordion-body collapse in body">
            <form class="form-horizontal" method="post" name="form1" onsubmit="if(submitting) {
            alert('The record is being updated, please wait a moment...');
            update.disabled = true; 
            return false;
            }
            if(BeamMachine(this))
            {
            update.value = 'Updating...';
            submitting = true;
            return true; 
            }
            return false;">
                <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Beam on Machine ID :</label>
                    <div class="col-lg-8">
                      <input type="text" name="Be_M_Id" id="Be_M_Id" value="<?php echo $row_Recordset1['Be_M_Id']; ?>" class="form-control"  readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Beam No :</label>
                    <div class="col-lg-8">
                     <input type="hidden" name="Be_D_C_Id" class="form-control" value="<?php echo $row_Recordset1['Be_D_C_Id']; ?>" readonly/>
                        <input type="text" name="beamno" class="form-control" value="<?php echo $row_Recordset1['Beam_No']; ?>" readonly/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Machine No :</label>
                    <div class="col-lg-8">
                     <input type="hidden" name="Machine_Id" class="form-control" value="<?php echo $row_Recordset1['Machine_Id']; ?>" readonly/>
                        <input type="text" name="machineno" class="form-control" value="<?php echo $row_Recordset1['Machine_No']; ?>" readonly/>
                    </div>
                </div>
<div class="form-group">
                        <label class="control-label col-lg-4" >Date :</label>
                        <div class="col-lg-3">
                              <input class="form-control" type="text"  value="<?php echo htmlentities($row_Recordset1['Started_Date'], ENT_COMPAT, 'UTF-8'); ?>" name="Started_Date" id="Started_Date" readonly />
                        </div>
                    </div>
                    <?php if(isset($_REQUEST['st']))
					{
						$decodeurl = $_REQUEST['st'];
						 $durl = urldecode($decodeurl); 
	                     $turl = str_replace("'"," ",$durl);
	                      $urls = explode(" ",$turl);
						   $t0 = $urls[1];
						if($t0=='Fitted')
						{
							?>
							<div class="form-group">
    <label class="control-label col-lg-4">Status :</label>
    <div class="col-lg-8">
      <select name="Status" class="form-control">
        <option value="Fitted" <?php if (!(strcmp("Fitted", htmlentities($row_Recordset1['Status'], ENT_COMPAT, 'UTF-8')))) {echo "SELECTED";} ?>>Fitted</option>
        <option value="R-permanent" <?php if (!(strcmp("R-permanent", htmlentities($row_Recordset1['Status'], ENT_COMPAT, 'UTF-8')))) {echo "SELECTED";} ?>>Remove-permanent</option>
        <option value="R-temporary" <?php if (!(strcmp("R-temporary", htmlentities($row_Recordset1['Status'], ENT_COMPAT, 'UTF-8')))) {echo "SELECTED";} ?>>Remove-temporary</option> 
      </select>
      </div>
</div><?php
						}
						else if($t0=='R-temporary')
						{
							?>
							<div class="form-group">
    <label class="control-label col-lg-4">Status :</label>
    <div class="col-lg-8">
      <select name="Status" class="form-control">
        <option value="Fitted" <?php if (!(strcmp("Fitted", htmlentities($row_Recordset1['Status'], ENT_COMPAT, 'UTF-8')))) {echo "SELECTED";} ?>>Fitted</option>
        <option value="R-permanent" <?php if (!(strcmp("R-permanent", htmlentities($row_Recordset1['Status'], ENT_COMPAT, 'UTF-8')))) {echo "SELECTED";} ?>>Remove-permanent</option>
        <option value="R-temporary" <?php if (!(strcmp("R-temporary", htmlentities($row_Recordset1['Status'], ENT_COMPAT, 'UTF-8')))) {echo "SELECTED";} ?>>Remove-temporary</option> 
      </select>
      </div>
</div><?php
						}
						else if($t0=='R-permanent')
						{
							if($row_result['Role']=='Admin')
							{  ?>
								<div class="form-group">
    <label class="control-label col-lg-4">Status :</label>
    <div class="col-lg-8">
      <select name="Status" class="form-control">
        <option value="Fitted" <?php if (!(strcmp("Fitted", htmlentities($row_Recordset1['Status'], ENT_COMPAT, 'UTF-8')))) {echo "SELECTED";} ?>>Fitted</option>
        <option value="R-permanent" <?php if (!(strcmp("R-permanent", htmlentities($row_Recordset1['Status'], ENT_COMPAT, 'UTF-8')))) {echo "SELECTED";} ?>>Remove-permanent</option>
        <option value="R-temporary" <?php if (!(strcmp("R-temporary", htmlentities($row_Recordset1['Status'], ENT_COMPAT, 'UTF-8')))) {echo "SELECTED";} ?>>Remove-temporary</option> 
      </select>
      </div>
</div><?php
							}
						elseif($row_result['Role']=='Manager')
							{
								?>
                                <div class="form-group">
    <label class="control-label col-lg-4">Status :</label>
    <div class="col-lg-8">
      <select name="Status" class="form-control">
        <option value="Fitted" <?php if (!(strcmp("Fitted", htmlentities($row_Recordset1['Status'], ENT_COMPAT, 'UTF-8')))) {echo "SELECTED";} ?>>Fitted</option>
        <option value="R-permanent" <?php if (!(strcmp("R-permanent", htmlentities($row_Recordset1['Status'], ENT_COMPAT, 'UTF-8')))) {echo "SELECTED";} ?>>Remove-permanent</option>
        <option value="R-temporary" <?php if (!(strcmp("R-temporary", htmlentities($row_Recordset1['Status'], ENT_COMPAT, 'UTF-8')))) {echo "SELECTED";} ?>>Remove-temporary</option> 
      </select>
      </div>
</div>
						<?php }
						elseif($row_result['Role']=='Supervisor' || $row_result['Role']=='Accountant' )
							{
								echo '<center style="color:#F00;">'."If you want to change status of beam-machine then contact admin or manager to change status of this beam-machine id : $colname_Recordset1".'</center>';
							}
						}
					}
						?>
                                        <div style="text-align:center" class="form-actions no-margin-bottom">
                                           <a href="beammachlistpage"> <input type="button" value="Back" class="btn btn-inverse btn-lg " /></a>
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
<script src="assets/js/beammachupd.js"></script>
<script src="assets/js/jointjquerydateandpicker.js"></script>
<script type="text/javascript">
<?php include("shortcutkeys.php");?>
</script>
</body>
</html>
<?php
mysql_free_result($Recordset1);
ob_flush(); ?>