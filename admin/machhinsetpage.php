<?php include("logcode.php"); error_reporting(0); require_once('../Connections/brijesh8510.php');
date_default_timezone_set('Asia/Calcutta');
	include("webrenew.php");
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
	if(!isset($_SESSION['User']))
	{}else{
   mysql_select_db($database_brijesh8510, $brijesh8510);
$Machine_Id = $_POST['Machine_Id'];
$Machine_No = strtoupper($_POST['Machine_No']);
$Entry_Id = $row_result['Registration_Id'];
$query = mysql_query("select * from machine_details where Machine_No='".$Machine_No."' ") or die(mysql_error());
$duplicate = mysql_num_rows($query);
   if($duplicate==0)
    {
      $query1 = mysql_query("INSERT INTO `textile`.`machine_details` (`Machine_Id`, `Machine_No`,`Entry_Id`) VALUES (NULL, '$Machine_No','$Entry_Id')") or die(mysql_error());
	   $insertGoTo = "machinelistpage";
	   
	    $dateact = date('Y-m-d');
	$dateactfull = date('d-m-Y        h:i:s A');
	$Partact = "New Machine Entry<br/>Machine No : ".$Machine_No;
	$insactivity = "insert into activity(Activity_Id,Date,Particular,Type,Action,Datefull,Id) values(NULL,'$dateact','$Partact','Machine - Insert','insert','$dateactfull','$Entry_Id')";
	mysql_query($insactivity); 
	
  echo '<script>alert("Record inserted....");</script>';
  echo '<script>window.location="'.$insertGoTo.'";</script>';
    }else{echo '<script>alert("This machine no is allready exists....");</script>';}}}
$colname_Recordset1 = "-1";
if (isset($_GET['Machine_Id'])) {
  $colname_Recordset1 = $_GET['Machine_Id'];
}
mysql_select_db($database_brijesh8510, $brijesh8510);
$query_Recordset1 = "SELECT * FROM machine_details WHERE Machine_Id ='".$colname_Recordset1."'";
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
                    <h1 class="page-header" align="center">MACHINE</h1>
                </div>
            </div>
<div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <div id="div-1" class="accordion-body collapse in body">
            <form class="form-horizontal" method="post" name="form1" onsubmit="if(submitting) {
            alert('The record is submitting, please wait a moment...');
            submit.disabled = true; 
            return false;
            }
            if(Machineins(this))
            {
            submit.value = 'Submitting...';
            submitting = true;
            return true; 
            }
            return false;">
               <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Machine ID :</label>
                    <div class="col-lg-8">
                       <input type="text" name="Machine_Id" id="Machine_Id" class="form-control" value="<?php echo getNewMachId(); ?>" readonly>
                    </div>
                </div>
               <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Machine No :</label>
                    <div class="col-lg-8">
                    <input type="text" id="Machine_No" placeholder="Machine No" class="form-control" name="Machine_No" value="<?php echo $Machine_No;?>" onkeypress="return isNumberKey(event)"/>
                    </div>
                </div>
                                        <div style="text-align:center" class="form-actions no-margin-bottom">
                                            <a href="machinelistpage"><input type="button" value=" Back" class="btn btn-inverse btn-lg " /></a>
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
 <script src="assets/js/machine.js"></script>
 <script type="text/javascript">
 <?php include("shortcutkeys.php");?>
 </script>
</body>
</html>
<?php
function getNewMachId()
{
	include("databaseconnect.php");
	$sql="select max(Machine_Id)+1 from machine_details";
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
 ob_flush(); ?>