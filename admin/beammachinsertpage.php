<?php include("logcode.php"); require_once('../Connections/brijesh8510.php'); error_reporting(0);
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
date_default_timezone_set('Asia/Calcutta');
	include("webrenew.php");
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
	if(!isset($_SESSION['User']))
	{}
	else
	{
	          $Entry_Id = $row_result['Registration_Id'];
  $insertSQL = sprintf("INSERT INTO beam_machine (Be_M_Id, Be_D_C_Id, Machine_Id, Started_Date, Status, Entry_Id) VALUES (%s, %s, %s, %s, %s, '$Entry_Id')",
                       GetSQLValueString($_POST['Be_M_Id'], "int"),
                       GetSQLValueString($_POST['Be_D_C_Id'], "int"),
                       GetSQLValueString($_POST['Machine_Id'], "int"),
                       GetSQLValueString($_POST['Started_Date'], "date"),
                       GetSQLValueString($_POST['Status'], "text"));
  mysql_select_db($database_brijesh8510, $brijesh8510);
  $Result1 = mysql_query($insertSQL, $brijesh8510) or die(mysql_error());
  
  $Be_D_C_Idactivity = $_REQUEST['Be_D_C_Id'];
  $Machine_Idactivity = $_REQUEST['Machine_Id'];
  $Statusactivity = $_REQUEST['Status']; 
  $selectbeamno = mysql_query("select Beam_No,Taar,Beam_Meter,Quality_Name from beam_dcorg,quality_details where quality_details.Quality_Id = beam_dcorg.Quality_Id and Be_D_C_Id = '".$Be_D_C_Idactivity."'");
  $selectbeamnofetch = mysql_fetch_array($selectbeamno);
  
  $selectmachno = mysql_query("select Machine_No from machine_details where Machine_Id = '$Machine_Idactivity'");
  $selectmachnofetch = mysql_fetch_array($selectmachno);
  
  $dateact = date('Y-m-d');
	$dateactfull = date('d-m-Y        h:i:s A');
	$Partact = "New BEAM-Machine Entry<br/>Beam No : ".$selectbeamnofetch['Beam_No'].", Taar : ".$selectbeamnofetch['Taar'].",  Meter : ".$selectbeamnofetch['Beam_Meter']."<br/>Machine No : ".$selectmachnofetch['Machine_No']."<br/>Status : ".$Statusactivity;
	$insactivity = "insert into activity(Activity_Id,Date,Particular,Type,Action,Datefull,Id) values(NULL,'$dateact','$Partact','Beam-Machine - Insert','insert','$dateactfull','$Entry_Id')";
	mysql_query($insactivity);  
	
  $insertGoTo = "beammachlistpage";
  echo '<script>alert("Record inserted....");</script>';
  echo '<script>window.location="'.$insertGoTo.'";</script>';
}}
mysql_select_db($database_brijesh8510, $brijesh8510);
$query_Recordset1 = "SELECT * FROM beam_machine";
$Recordset1 = mysql_query($query_Recordset1, $brijesh8510) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
mysql_select_db($database_brijesh8510, $brijesh8510);
$query_machh = "SELECT machine_details.Machine_No,machine_details.Machine_Id FROM machine_details LEFT JOIN beam_machine ON machine_details.Machine_Id = beam_machine.Machine_Id WHERE (beam_machine.Status IS NULL) or (beam_machine.Status = 'R-temporary') ";
$machh = mysql_query($query_machh, $brijesh8510) or die(mysql_error());
$row_machh = mysql_fetch_assoc($machh);
$totalRows_machh = mysql_num_rows($machh);
mysql_select_db($database_brijesh8510, $brijesh8510);
$query_rsBeam = "SELECT beam_dcorg.Beam_No,beam_dcorg.Be_D_C_Id
FROM beam_dcorg LEFT JOIN beam_machine ON beam_dcorg.Be_D_C_Id = beam_machine.Be_D_C_Id WHERE beam_machine.Status IS NULL AND beam_dcorg.Status='NotReturn' ";
$rsBeam = mysql_query($query_rsBeam, $brijesh8510) or die(mysql_error());
$row_rsBeam = mysql_fetch_assoc($rsBeam);
$totalRows_rsBeam = mysql_num_rows($rsBeam);
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
            alert('The record is being submitting, please wait a moment...');
            submit.disabled = true; 
            return false;
            }
            if(BeamMachine(this))
            {
            submit.value = 'Submitting...';
            submitting = true;
            return true; 
            }
            return false;">
             <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Beam on Machine ID :</label>
                    <div class="col-lg-8">
                      <input type="text" name="Be_M_Id" id="Be_M_Id" value="<?php echo getNewBeamMachId(); ?>" class="form-control" readonly>
                    </div>
                </div>
                <div class="form-group">
<label class="control-label col-lg-4">Beam No :</label>
<div class="col-lg-8">
  <select name="Be_D_C_Id" class="form-control">
    <option value="">--Select--</option>
     <?php 
do{  
?>
               <option value="<?php echo $row_rsBeam['Be_D_C_Id']?>" ><?php echo $row_rsBeam['Beam_No']?></option>
               <?php
}while ($row_rsBeam = mysql_fetch_assoc($rsBeam))
?>
  </select>
  </div>
</div>
<div class="form-group">
<label class="control-label col-lg-4">Machine No :</label>
<div class="col-lg-8">
  <select name="Machine_Id" class="form-control">
    <option value="">--Select--</option>
    <?php 
 do{  
?>
               <option value="<?php echo $row_machh['Machine_Id']?>" ><?php echo $row_machh['Machine_No']?></option>
               <?php
}while ($row_machh = mysql_fetch_assoc($machh))
?>
  </select>
  </div>
</div>
<div class="form-group">
                        <label class="control-label col-lg-4" >Date :</label>
                        <div class="col-lg-3">
                              <input class="form-control" type="text"  value="" name="Started_Date" id="Started_Date" readonly />
                        </div>
                    </div>
                    <div class="form-group">
    <label class="control-label col-lg-4">Status :</label>
    <div class="col-lg-8">
      <select name="Status" class="form-control">
        <option value="Fitted" <?php if (!(strcmp("Fitted", ""))) {echo "SELECTED";} ?>>Fitted</option>
               <option value="R-permanent" <?php if (!(strcmp("R-permanent", ""))) {echo "SELECTED";} ?>>Remove-permanent</option>
         <option value="R-temporary" <?php if (!(strcmp("R-temporary", ""))) {echo "SELECTED";} ?>>Remove-temporary</option>
      </select>
      </div>
</div>
                                        <div style="text-align:center" class="form-actions no-margin-bottom">
                                            <a href="beammachlistpage"><input type="button" value=" Back" class="btn btn-inverse btn-lg " /></a>
                                            <?php 
											if($days_remaining<=0)
{
	echo "<strong style='color:#F00;'>* Please renew your website</strong>";
	
}
if($days_remaining<=0)
{}
elseif($days_remaining>0)
{
	?>
                                            <input type="submit" value="Submit" name="submit" class="btn btn-primary btn-lg " />
                                            <input type="hidden" name="MM_insert" value="form1">
                                            <?php } ?>
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
<script src="assets/js/beammachineins.js"></script>
<script src="assets/js/jointjquerydateandpicker.js"></script>
<script type="text/javascript">
<?php include("shortcutkeys.php");?>
</script>
</body>
</html>
<?php
function getNewBeamMachId()
{
	include("databaseconnect.php");
	$sql="select max(Be_M_Id)+1 from beam_machine";
	$result= mysql_query($sql);
	$row= mysql_fetch_array($result);
	if($row != null && $row[0] > 0)
		{
			echo $row[0];
		}
		else
		{
			echo '1';
		}
	}
mysql_free_result($Recordset1);
mysql_free_result($machh);
mysql_free_result($rsBeam);
 ob_flush(); ?>