<?php include("logcode.php"); require_once('../Connections/brijesh8510.php');
date_default_timezone_set("Asia/Calcutta");
if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
	if(!isset($_SESSION['User']))
	{
	}
	else
	{
  mysql_select_db($database_brijesh8510, $brijesh8510);
$Bro_Cus_Id = $_POST['Bro_Cus_Id'];
$Broker_Id = $_POST['Broker_Id'];
$Customer_Id = $_POST['Customer_Id'];
$Entry_Id = $row_result['Registration_Id'];
$query = mysql_query("select Broker_Id,Customer_Id from bro_cus_id where Broker_Id='".$Broker_Id."' AND Customer_Id = '".$Customer_Id."'") or die(mysql_error());
$duplicate = mysql_num_rows($query);
   if($duplicate==0)
    {
      $query1 = mysql_query("UPDATE `bro_cus_id` SET `Broker_Id` = '".$Broker_Id."', `Customer_Id` = '".$Customer_Id."', `Entry_Id` = '".$Entry_Id."' WHERE `bro_cus_id`.`Bro_Cus_Id` = '".$Bro_Cus_Id."' ") or die(mysql_error());
	   $updateGoTo = "brokercustomerlistpage";
	   
	    $comselect = mysql_query("select Customer_Id,Cu_En_Name from customer_details where Customer_Id = '$Customer_Id'");
	   $comselectfetch = mysql_fetch_array($comselect);
	   
	   $brokerselect = mysql_query("select Broker_Id,B_Name from broker_details1 where Broker_Id = '$Broker_Id'");
	   $brokerselectfetch = mysql_fetch_array($brokerselect);
	   
	    $dateact = date('Y-m-d');
	$dateactfull = date('d-m-Y        h:i:s A');
	$Partact = "Broker-Customer Entry<br/>Customer : ".$comselectfetch['Cu_En_Name'].", Broker : ".$brokerselectfetch['B_Name'];
	$insactivity = "insert into activity(Activity_Id,Date,Particular,Type,Action,Datefull,Id) values(NULL,'$dateact','$Partact','Broker-Customer - Update','update','$dateactfull','$Entry_Id')";
	mysql_query($insactivity);  	
	
  echo '<script>alert("Record updated....");</script>';
  echo '<script>window.location="'.$updateGoTo.'";</script>';
    }
    else
    {
      echo '<script>alert("This broker-company is allready exists....");</script>';
    }
	}
}
$colname_RsBrocu = "-1";
if (isset($_GET['Bro_Cus_Id'])) {
  $colname_RsBrocu = $_GET['Bro_Cus_Id'];
}
mysql_select_db($database_brijesh8510, $brijesh8510);
$query_RsBrocu = "SELECT * FROM bro_cus_id WHERE Bro_Cus_Id = '".$colname_RsBrocu."'";
$RsBrocu = mysql_query($query_RsBrocu, $brijesh8510) or die(mysql_error());
$row_RsBrocu = mysql_fetch_assoc($RsBrocu);
$totalRows_RsBrocu = mysql_num_rows($RsBrocu);
mysql_select_db($database_brijesh8510, $brijesh8510);
$query_rsBro = "SELECT Broker_Id, B_Name FROM broker_details1";
$rsBro = mysql_query($query_rsBro, $brijesh8510) or die(mysql_error());
$row_rsBro = mysql_fetch_assoc($rsBro);
$totalRows_rsBro = mysql_num_rows($rsBro);
mysql_select_db($database_brijesh8510, $brijesh8510);
$query_rsCus = "SELECT Customer_Id, Cu_En_Name FROM customer_details";
$rsCus = mysql_query($query_rsCus, $brijesh8510) or die(mysql_error());
$row_rsCus = mysql_fetch_assoc($rsCus);
$totalRows_rsCus = mysql_num_rows($rsCus);
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
                    <h1 class="page-header" align="center">BROKER-CUSTOMER</h1>
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
            if(BrokerCustomer(this))
            {
            update.value = 'Updating...';
            submitting = true;
            return true; 
            }
            return false;">
                <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Broker-Customer ID :</label>
                    <div class="col-lg-8">
                      <input type="text" id="Bro_Cus_Id" placeholder="" name="Bro_Cus_Id" value="<?php echo $row_RsBrocu['Bro_Cus_Id']; ?>" class="form-control" readonly />
                    </div>
                </div>
<div class="form-group">
<label class="control-label col-lg-4">Broker :</label>
<div class="col-lg-8">
<div id="state2">
  <select name="Broker_Id" class="form-control">
    <option value="">--Select--</option>
     <?php 
do{ 
?>
             <option value="<?php echo $row_rsBro['Broker_Id']?>" <?php if (!(strcmp($row_rsBro['Broker_Id'], htmlentities($row_RsBrocu['Broker_Id'], ENT_COMPAT, 'UTF-8')))) {echo "SELECTED";} ?>><?php echo $row_rsBro['B_Name']?></option>
             <?php
}while ($row_rsBro = mysql_fetch_assoc($rsBro));
  $rows = mysql_num_rows($rsBro);
  if($rows > 0) {
      mysql_data_seek($rsBro, 0);
	  $row_rsBro = mysql_fetch_assoc($rsBro);
  }
?>
  </select>
  </div>
  </div>
</div>
<div class="form-group">
<label class="control-label col-lg-4">Customer :</label>
<div class="col-lg-8">
<div id="city2">
  <select name="Customer_Id" class="form-control">
    <option value="">--Select--</option>
    <?php 
do{ 
?>
    <option value="<?php echo $row_rsCus['Customer_Id']?>" <?php if (!(strcmp($row_rsCus['Customer_Id'], htmlentities($row_RsBrocu['Customer_Id'], ENT_COMPAT, 'UTF-8')))) {echo "SELECTED";} ?>><?php echo $row_rsCus['Cu_En_Name']?></option>
    <?php
}while ($row_rsCus = mysql_fetch_assoc($rsCus));
  $rows = mysql_num_rows($rsCus);
  if($rows > 0) {
      mysql_data_seek($rsCus, 0);
	  $row_rsCus = mysql_fetch_assoc($rsCus);
  }
?>
  </select>
  </div>
 </div>
</div>
                                        <div style="text-align:center" class="form-actions no-margin-bottom">
                                           <a href="brokercustomerlistpage"> <input type="button" value="Back" class="btn btn-inverse btn-lg " /></a>
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
<script src="assets/js/brokercustomer.js"></script>
<script type="text/javascript">
<?php include("shortcutkeys.php");?>
</script>
</body>
</html>
<?php
mysql_free_result($RsBrocu);
mysql_free_result($rsBro);
mysql_free_result($rsCus);
 ob_flush(); ?>