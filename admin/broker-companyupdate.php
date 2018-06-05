<?php include("logcode.php"); require_once('../Connections/brijesh8510.php'); 
date_default_timezone_set("Asia/Calcutta");
if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
	if(!isset($_SESSION['User']))
	{}
	else
	{
  mysql_select_db($database_brijesh8510, $brijesh8510);
$Bro_Com_Id = $_POST['Bro_Com_Id'];
$Broker_Id = $_POST['Broker_Id'];
$Company_Id = $_POST['Company_Id'];
$Entry_Id = $row_result['Registration_Id'];
$query = mysql_query("select Broker_Id,Company_Id from bro_com_detaailss where Broker_Id='".$Broker_Id."' AND Company_Id = '".$Company_Id."'") or die(mysql_error());
$duplicate = mysql_num_rows($query);
   if($duplicate==0)
    {
      $query1 = mysql_query("UPDATE `bro_com_detaailss` SET `Broker_Id` = '".$Broker_Id."', `Company_Id` = '".$Company_Id."', `Entry_Id` = '".$Entry_Id."' WHERE `bro_com_detaailss`.`Bro_Com_Id` = '".$Bro_Com_Id."' ") or die(mysql_error());
	  
	   $dateact = date('Y-m-d');
	$dateactfull = date('d-m-Y        h:i:s A');
	 $comselect = mysql_query("select Company_Id,C_Name from company_deetaails where Company_Id = '$Company_Id'");
	   $comselectfetch = mysql_fetch_array($comselect);
	   
	   $brokerselect = mysql_query("select Broker_Id,B_Name from broker_details1 where Broker_Id = '$Broker_Id'");
	   $brokerselectfetch = mysql_fetch_array($brokerselect);
	   
	$Partact = "Broker-Company Entry<br/>Company : ".$comselectfetch['C_Name'].", Broker : ".$brokerselectfetch['B_Name'];
	$insactivity = "insert into activity(Activity_Id,Date,Particular,Type,Action,Datefull,Id) values(NULL,'$dateact','$Partact','Broker-Company - Update','update','$dateactfull','$Entry_Id')";
	mysql_query($insactivity);  	
	
	   $updateGoTo = "brokercompanylistpage";
  echo '<script>alert("Record updated....");</script>';
  echo '<script>window.location="'.$updateGoTo.'";</script>';
    }
    else
    {
      echo '<script>alert("This broker-company is allready exists....");</script>';
    }
	}
       }
mysql_select_db($database_brijesh8510, $brijesh8510);
$query_RsBro = "SELECT Broker_Id, B_Name FROM broker_details1";
$RsBro = mysql_query($query_RsBro, $brijesh8510) or die(mysql_error());
$row_RsBro = mysql_fetch_assoc($RsBro);
$totalRows_RsBro = mysql_num_rows($RsBro);
mysql_select_db($database_brijesh8510, $brijesh8510);
$query_rsCom = "SELECT Company_Id, C_Name FROM company_deetaails";
$rsCom = mysql_query($query_rsCom, $brijesh8510) or die(mysql_error());
$row_rsCom = mysql_fetch_assoc($rsCom);
$totalRows_rsCom = mysql_num_rows($rsCom);
$colname_rsBroCom = "-1";
if (isset($_GET['Bro_Com_Id'])) {
  $colname_rsBroCom = $_GET['Bro_Com_Id'];
}
mysql_select_db($database_brijesh8510, $brijesh8510);
$query_rsBroCom = "SELECT * FROM bro_com_detaailss WHERE Bro_Com_Id = $colname_rsBroCom"; 
$rsBroCom = mysql_query($query_rsBroCom, $brijesh8510) or die(mysql_error());
$row_rsBroCom = mysql_fetch_assoc($rsBroCom);
$totalRows_rsBroCom = mysql_num_rows($rsBroCom);
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
                    <h1 class="page-header" align="center">BROKER-COMPANY</h1>
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
            if(BrokerCompany(this))
            {
            update.value = 'Updating...';
            submitting = true;
            return true; 
            }
            return false;">
                <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Broker-Company ID :</label>
                    <div class="col-lg-8">
                      <input type="text" id="Bro_Com_Id" placeholder="" name="Bro_Com_Id" value="<?php echo $row_rsBroCom['Bro_Com_Id']; ?>"class="form-control" readonly />
                    </div>
                </div>
<div class="form-group">
<label class="control-label col-lg-4">Broker :</label>
<div class="col-lg-8">
<div id="state2">
  <select name="Broker_Id" class="form-control">
    <option value="">--Select--</option>
    <?php 
do {  
?>
             <option value="<?php echo $row_RsBro['Broker_Id']?>" <?php if (!(strcmp($row_RsBro['Broker_Id'], htmlentities($row_rsBroCom['Broker_Id'], ENT_COMPAT, 'UTF-8')))) {echo "SELECTED";} ?>><?php echo $row_RsBro['B_Name']?></option>
             <?php
} while ($row_RsBro = mysql_fetch_assoc($RsBro));
  $rows = mysql_num_rows($RsBro);
  if($rows > 0) {
      mysql_data_seek($RsBro, 0);
	  $row_RsBro = mysql_fetch_assoc($RsBro);
  }
?>
  </select>
  </div>
  </div>
</div>
<div class="form-group">
<label class="control-label col-lg-4">Company :</label>
<div class="col-lg-8">
<div id="city2">
  <select name="Company_Id" class="form-control">
    <option value="">--Select--</option>
    <?php 
do {  
?>
    <option value="<?php echo $row_rsCom['Company_Id']?>" <?php if (!(strcmp($row_rsCom['Company_Id'], htmlentities($row_rsBroCom['Company_Id'], ENT_COMPAT, 'UTF-8')))) {echo "SELECTED";} ?>><?php echo $row_rsCom['C_Name']?></option>
    <?php
} while ($row_rsCom = mysql_fetch_assoc($rsCom));
  $rows = mysql_num_rows($rsCom);
  if($rows > 0) {
      mysql_data_seek($rsCom, 0);
	  $row_rsCom = mysql_fetch_assoc($rsCom);
  }
?>
  </select>
  </div>
  </div>
</div>
                                        <div style="text-align:center" class="form-actions no-margin-bottom">
                                            <a href="brokercompanylistpage"><input type="button" value=" Back" class="btn btn-inverse btn-lg " /></a>
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
<script src="assets/js/brokercompany.js"></script>
<script type="text/javascript">
<?php include("shortcutkeys.php");?>
</script>
</body>
</html>
<?php
mysql_free_result($RsBro);
mysql_free_result($rsCom);
mysql_free_result($rsBroCom);
ob_flush(); ?>