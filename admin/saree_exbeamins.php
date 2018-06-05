<?php include("logcode.php"); require('../Connections/brijesh8510.php'); error_reporting(0); 
	 include("databaseconnect.php");
	if(isset($_REQUEST['action']))
{
	$action = $_REQUEST['action'];
	if($action=='update')
	{
	$decodeurl = $_REQUEST['Sa_Exbeam_Id'];
	$durl = urldecode($decodeurl); 
	$turl = str_replace("'"," ",$durl);
	$urls = explode(" ",$turl);
	$Sa_Exbeam_Id = $urls[1];
	$sql = "select Sa_Exbeam_Id,machine_details.Machine_No,machine_details.Machine_Id,Mul_Beam_No,Sa_Beam_Total,Entry_Date,saree_exbe_master.Entry_Id from saree_exbe_master,machine_details where machine_details.Machine_Id = saree_exbe_master.Machine_Id AND Sa_Exbeam_Id = '".$Sa_Exbeam_Id."' ";
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
	$Sa_Exbeam_Id = $row['Sa_Exbeam_Id'];
	$Machine_No = $row['Machine_No'];
	$Machine_Id = $row['Machine_Id'];
	$Mul_Beam_No = $row['Mul_Beam_No'];
	$Sa_Beam_Total = $row['Sa_Beam_Total'];
	$Entry_Date = $row['Entry_Date'];
	$Entry_Id = $row['Entry_Id'];
	date_default_timezone_set('Asia/Calcutta');
	$Fitted_Date = date('Y-m-d');
	include("webrenew.php");
	$sel_check_entry = "select count(Be_Ref_No) as count_beam from saree_exbeam_detailorg where Sa_Exbeam_Id='$Sa_Exbeam_Id'";
	$sel_check_exe = mysql_query($sel_check_entry);
	$sel_check_fetch = mysql_fetch_array($sel_check_exe);
	if($sel_check_fetch[0]==$Sa_Beam_Total)
	{
	}
	else
	{
		$msg_check_beam ='<strong style="color:#F00;">'.'Please update this entry which is required</strong>';
	}}
	else if($action=='insert')
{
	$Sa_Exbeam_Id = getNewChallanID();
	date_default_timezone_set('Asia/Calcutta');
	$Fitted_Date = date('Y-m-d');
	include("webrenew.php");
	}}
	if(isset($_REQUEST['submit']))
{
//insert
 if(!isset($_SESSION['User']))
{ } 
else
{
     $Machine_Id = $_REQUEST['Machine_Id'];
	$Mul_Beam_No = $_REQUEST['Mul_Beam_No'];
	$Sa_Beam_Total = $_REQUEST['Sa_Beam_Total'];
	date_default_timezone_set('Asia/Calcutta');
	$Entry_Date = date('Y-m-d      h:i:s a');
	$Entry_Id = $row_result['Registration_Id'];
	$sql = "INSERT INTO  `saree_exbe_master` (`Sa_Exbeam_Id` ,`Machine_Id` ,`Mul_Beam_No` ,`Sa_Beam_Total` ,`Entry_Date`,`Entry_Id`)VALUES (NULL , '$Machine_Id' ,  '$Mul_Beam_No',  '$Sa_Beam_Total', '$Entry_Date', '$Entry_Id')";
$result = mysql_query($sql);
$sel_sub = "select * from saree_exbeam_detail where saree_exbeam_detail.Sa_Exbeam_Id = '$Sa_Exbeam_Id'";
$sel_exe = mysql_query($sel_sub);
while($sel_fetch = mysql_fetch_array($sel_exe))
{
	$ins_sub = "insert into saree_exbeam_detailorg (Sa_Ex_Id,Sa_Exbeam_Id,Sa_Pro_Id,Sa_Beam_No,Be_Ref_No,Fitted_Date,Be_Meter,Be_Taar,Be_Weight,Quality_Id,Org_Be_Mg_Meter,Shortage,Shortageper,Remove_Date,R_Id) values(NULL,'".$sel_fetch[1]."','".$sel_fetch[2]."','".$sel_fetch[3]."','".$sel_fetch[4]."','".$sel_fetch[5]."','".$sel_fetch[6]."','".$sel_fetch[7]."','".$sel_fetch[8]."','".$sel_fetch[9]."','".$sel_fetch[10]."','".$sel_fetch[11]."','".$sel_fetch[12]."','".$sel_fetch[13]."','".$sel_fetch[14]."')";
	mysql_query($ins_sub);
}
$del_sub = "delete from saree_exbeam_detail where  saree_exbeam_detail.Sa_Exbeam_Id='$Sa_Exbeam_Id'";
$del_exe = mysql_query($del_sub);
$sel_sub_or = "select * from saree_exbeam_detailorg where saree_exbeam_detailorg.Sa_Exbeam_Id = '$Sa_Exbeam_Id'";
$sel_exe_or = mysql_query($sel_sub_or);
$total_sel_row = mysql_num_rows($sel_exe_or);
if($total_sel_row==0)
{
	$msg_error='Something gone wrong so your sub entry is not inserted in your last inserted entry, now please update that entry first';
}
else
{
	$msg_error='Record inserted';
}
$insertGoTo = "saree_extrabeam_listpage?msg_error=$msg_error";
  echo '<script>window.location="'.$insertGoTo.'";</script>';
}
}
if(isset($_REQUEST['update']))
{
//update
if(!isset($_SESSION['User']))
{ } 
else
{
	$Sa_Exbeam_Id = $_REQUEST['Sa_Exbeam_Id'];
       $Machine_Id = $_REQUEST['Machine_Id'];
	$Mul_Beam_No = $_REQUEST['Mul_Beam_No'];
	$Sa_Beam_Total = $_REQUEST['Sa_Beam_Total'];
	$Entry_Date = $_REQUEST['Entry_Date'];
	$Entry_Id = $row_result['Registration_Id'];
$sql= "UPDATE `saree_exbe_master` SET `Machine_Id` = '$Machine_Id', `Mul_Beam_No` = '$Mul_Beam_No', `Sa_Beam_Total` = '$Sa_Beam_Total', `Entry_Date` = '$Entry_Date', `Entry_Id` = '$Entry_Id' WHERE `saree_exbe_master`.`Sa_Exbeam_Id` = '".$Sa_Exbeam_Id."'";
$result = mysql_query($sql);
  $updateGoTo = "saree_extrabeam_listpage?msg";
  echo '<script>window.location="'.$updateGoTo.'";</script>';
}}
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
mysql_select_db($database_brijesh8510, $brijesh8510);
$query_quaa = "SELECT Quality_Id, Quality_Name FROM quality_details";
$quaa = mysql_query($query_quaa, $brijesh8510) or die(mysql_error());
$row_quaa = mysql_fetch_assoc($quaa);
$totalRows_quaa = mysql_num_rows($quaa);
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
       <?php include("sidemenu.php");?>
                <div class="inner">
                    <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" align="center">SAREE EXTRA BEAM</h1>
                </div>
            </div>
<div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <div id="div-1" class="accordion-body collapse in body">
            <form class="form-horizontal" method="post" <?php if($action =='insert') { ?>onsubmit="if(submitting) {
            alert('The record is being submitted, please wait a moment...');
            submit.disabled = true; 
            return false;
            }
            if(checkQuotee(this))
            {
            submit.value = 'Submitting...';
            submitting = true;
            return true; 
            }
            return false;" <?php } elseif($action=='update') { ?> onsubmit="if(submitting) {
            alert('The record is being updated, please wait a moment...');
            update.disabled = true; 
            return false;
            }
            if(checkQuotee(this))
            {
            update.value = 'Updating...';
            submitting = true;
            return true; 
            }
            return false;"<?php } ?>>
            <div class="form-group row">
            <div class="col-lg-4">
            <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Saree-Extra-Beam ID :</label>
                    <div class="col-lg-7">
                    <input type="text" id="Sa_Exbeam_Id" placeholder="" class="form-control" value="<?php echo $Sa_Exbeam_Id; ?>" name="Sa_Exbeam_Id" readonly/>
                    </div>
                </div>
                        </div>
                       <div class="col-lg-4">
                       <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Machine No :</label>
                    <div class="col-lg-7">
                    <input type="text" id="Machine_No" placeholder="" class="form-control" value="<?php echo $Machine_No; ?>" name="Machine_No" readonly/>
                    <input type="hidden" id="Machine_Id" value="<?php echo $Machine_Id; ?>" name="Machine_Id" readonly/>
                    </div>
                </div>
                        </div>
                         <div class="col-lg-4">
                         <div class="form-group">
                    <label for="autosize" class="control-label col-lg-4">Beam No :</label>
                    <div class="col-lg-8">
                      <textarea name="Mul_Beam_No" class="form-control" id="autosize"><?php echo $Mul_Beam_No; ?></textarea>
                      <span id="error1" style="color:#F00";></span>
                    </div>
</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-3">
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Beam-Ref. No : </label>
                    <div class="col-lg-7">
                    <input type="text" id="Be_Ref_No" placeholder="" class="form-control" name="Be_Ref_No" />
                    <span id="error2" style="color:#F00";></span>
                    </div>
                </div>
                        </div>
                        <div class="col-lg-3">
                        <div class="form-group">
                        <label class="control-label col-lg-5" >Fitted Date :</label>
                        <div class="col-lg-7">
                              <input class="form-control" type="text"  value="<?php echo $Fitted_Date; ?>" name="Fitted_Date" id="Fitted_Date" readonly />
                        </div>
                    </div>
                    </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Meter : </label>
                    <div class="col-lg-7">
                    <input type="text" id="Be_Meter" placeholder="" class="form-control" name="Be_Meter" onkeypress="return isDecimalNumberKey(event)" />
                    <input type="hidden" name="action" id="action" value="<?php echo $action;?>"/>
                    </div>
                </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Taar : </label>
                    <div class="col-lg-7">
                    <input type="text" id="Be_Taar" placeholder="" class="form-control" name="Be_Taar" onkeypress="return isNumberKey(event)" />
                    </div>
                </div>
                        </div>
                        </div>
                       <div class="form-group row">
                        <div class="col-lg-3">
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Weight : </label>
                    <div class="col-lg-7">
                    <input type="text" id="Be_Weight" placeholder="" class="form-control" name="Be_Weight" onkeypress="return isDecimalNumberKey(event)"  />
                   <input type="hidden" name="R_Id" id="R_Id" value="<?php echo $row_result['Registration_Id']; ?>"/>
                    </div>
                </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Saree-Production ID : </label>
                    <div class="col-lg-7">
                    <input type="text" id="Sa_Pro_Id" placeholder="" class="form-control" name="Sa_Pro_Id" onkeypress="return isNumberKey(event)" />
                    </div>
                </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Main-Beam No : </label>
                    <div class="col-lg-7">
                    <input type="text" id="Sa_Beam_No" placeholder="" class="form-control" name="Sa_Beam_No" readonly/>
                    </div>
                </div>
                        </div>
                        <div class="col-lg-3">
                        <div class="form-group">
<label class="control-label col-lg-4">Quality :</label>
<div class="col-lg-8">
  <select name="quality" class="form-control" id="quality">
    <option value="">--Select--</option>
    <?php
do {  
?>
    <option value="<?php echo $row_quaa['Quality_Id']?>"><?php echo $row_quaa['Quality_Name']?></option>
    <?php
} while ($row_quaa = mysql_fetch_assoc($quaa));
  $rows = mysql_num_rows($quaa);
  if($rows > 0) {
      mysql_data_seek($quaa, 0);
	  $row_quaa = mysql_fetch_assoc($quaa);
  }
?>
  </select>
  </div>
</div>
                        </div>
                        </div>
                        <div align="right">
                       <?php if($days_remaining<=0)
{}
elseif($days_remaining>0)
{
	?>
                        <input type="button" value="Add" class="btn btn-primary btn-grad " name="Add1" id="Add1" />
                        <?php } ?>
                        </div>
                        <hr />
                        <div class="col-lg-12" align="center">
                         <div class="row">
                <div class="col-lg-12">
                            <div class="table-responsive" id="table">
                            </div>
                        </div>
                    </div>
                        </div>
                         <hr />
                         <div class="col-lg-4">
                        </div>
                        <div class="col-lg-4">
                        </div>
                        <div class="col-lg-4">
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Total Beam :</label>
                    <div class="col-lg-7">
                    <input type="text" id="Sa_Beam_Total" placeholder="" class="form-control" name="Sa_Beam_Total" value="<?php echo $Sa_Beam_Total; ?>" readonly/>
                    </div>
                </div>
                        </div>
                      <?php
					  if($action=='update')
					  {
						  ?>
                           <div class="col-lg-4">
                        </div>
                        <div class="col-lg-4">
                        </div>
                        <div class="col-lg-4">
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Entry #ID :</label>
                    <div class="col-lg-7">
                     <input type="text" name="Entry_Id" id="Entry_Id" class="form-control" value="<?php echo $Entry_Id;  ?>" readonly/>
                    </div>
                </div>
                        </div>
                           <div class="col-lg-4">
                        </div>
                        <div class="col-lg-4">
                        </div>
                        <div class="col-lg-4">
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Entry Date :</label>
                    <div class="col-lg-8">
                    <input type="text" id="Entry_Date" placeholder="" class="form-control" name="Entry_Date" value="<?php echo $Entry_Date; ?>" readonly />
                    </div>
                </div>
                        </div>
                          <?php
					  }
					  ?>
                   <div style="text-align:center" class="form-actions no-margin-bottom">
                       <?php if($days_remaining<=0)
{
	echo "<strong style='color:#F00;'>* Please renew your website</strong>";
}
							if($action=='update')
                             {
								  echo $msg_check_beam;
							 }
							?>
                      <a href="saree_extrabeam_listpage"><input type="button" value=" Back" class="btn btn-inverse btn-lg " name="back" id="back" /></a>
                                 <?php
							if($action=='update')
                             {
							?>
                          <input type="submit" value="Update Challan " class="btn btn-primary btn-lg " name="update" />
                        <?php }
						elseif($action=='insert')
						{
if($days_remaining<=0)
{}
elseif($days_remaining>0)
{
						?>
                                   <input type="submit" value="Submit Challan " class="btn btn-primary btn-lg " name="submit" />
                        <?php } }?>
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
<script src="assets/js/sareeexbeamins.js"></script>
<script src="assets/js/jointjquerydateandpicker.js"></script>
 <script>
$(document).ready(function(){
		sql="?Sa_Exbeam_Id=<?php echo $Sa_Exbeam_Id; ?>&action=<?php echo $action;?>";
		$("#table").load("saree_exbeam_table.php"+sql);
});
<?php include("shortcutkeys.php");?>
    </script>
</body>
</html>
<?php
function getNewChallanID()
{
	include("databaseconnect.php");
	$sql = "select max(Sa_Exbeam_Id)+1 from saree_exbe_master";
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
	if($row != null && $row[0] > 0)
		{
			$new_id =  $row[0];
		}
		else
		{
			$new_id = '1';
		}
		return $new_id;
	}
mysql_free_result($quaa);
 ob_flush(); ?>