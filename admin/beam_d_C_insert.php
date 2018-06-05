<?php include("logcode.php"); require('../Connections/brijesh8510.php'); error_reporting(0); 
include("databaseconnect.php");
	if(isset($_REQUEST['action']))
{
	$action = $_REQUEST['action'];
	if($action=='update')
	{
	$decodeurl = $_REQUEST['Beam_D_C_Id'];
	$durl = urldecode($decodeurl); 
	$turl = str_replace("'"," ",$durl);
	$urls = explode(" ",$turl);
	$t0 = $urls[1];
	$sql = "select * from beam_d_c_1 where Beam_D_C_Id = '".$t0."' ";
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
	$t0 = $row['Beam_D_C_Id'];
	$t1 = $row['Beam_D_C_Date'];
	$t2 = $row['Beam_D_C_No'];
	$t3 = $row['Company_Id'];
	$t4 = $row['Broker_Id'];
	$Total_Beam = $row['Total_Beam'];
	$Entry_Date = $row['Entry_Date'];
	$Entry_Id = $row['Entry_Id'];
	date_default_timezone_set('Asia/Calcutta');
	include("webrenew.php");
    $dateact = date('Y-m-d');
	$dateactfull = date('d-m-Y        h:i:s A');
	$Entry_Idactivity = $row_result['Registration_Id'];
	
	$Partact = "Beam Challan Page [Update] - This page is open to view.<br/>By : ".$row_result['Name']."<br/>For Challan ID : ".$t0;
	$selectactivitycheck = mysql_query("select Particular from activity order by Activity_Id desc limit 1"); 
	$selectactivitycheckfetch = mysql_fetch_array($selectactivitycheck);
	if($selectactivitycheckfetch['Particular']!=$Partact)
	{
	$insactivity = "insert into activity(Activity_Id,Date,Particular,Type,Action,Datefull,Id) values(NULL,'$dateact','$Partact','Beam Challan [Update] - View','view','$dateactfull','$Entry_Idactivity')";
	mysql_query($insactivity);
	}
	
	$sel_check_entry = "select count(Be_D_C_Id) as count_beam from beam_dcorg where Beam_D_C_Id='$t0'";
	$sel_check_exe = mysql_query($sel_check_entry);
	$sel_check_fetch = mysql_fetch_array($sel_check_exe);
	if($sel_check_fetch[0]==$Total_Beam)
	{}
	else
	{
		$msg_check_beam ='<strong style="color:#F00;">'.'* Please update this challan which is required</strong>';
	}}
	else if($action=='insert')
{
	$t0 = getNewChallanID();
	date_default_timezone_set('Asia/Calcutta');
	$t1 = date('Y-m-d');
	include("webrenew.php");
	
	 $dateact = date('Y-m-d');
	$dateactfull = date('d-m-Y        h:i:s A');
	$Entry_Idactivity = $row_result['Registration_Id'];
	
	$Partact = "Beam Challan Page [Insert] - This page is open to view.<br/>By : ".$row_result['Name'];
	$selectactivitycheck = mysql_query("select Particular from activity order by Activity_Id desc limit 1"); 
	$selectactivitycheckfetch = mysql_fetch_array($selectactivitycheck);
	if($selectactivitycheckfetch['Particular']!=$Partact)
	{
	$insactivity = "insert into activity(Activity_Id,Date,Particular,Type,Action,Datefull,Id) values(NULL,'$dateact','$Partact','Beam Challan [Insert] - View','view','$dateactfull','$Entry_Idactivity')";
	mysql_query($insactivity);
	}
	
	}}
	if(isset($_REQUEST['submit']))
{
//insert
 if(!isset($_SESSION['User']))
{ } 
else
{
     $t1 = $_REQUEST['date'];
	$t2 = $_REQUEST['challanno'];
	$t3 = $_REQUEST['company'];
	$t4 = $_REQUEST['broker'];
	$Labour_Id = $_REQUEST['Labour_Id'];
	$Total_Beam = $_REQUEST['Total_Beam'];
	date_default_timezone_set('Asia/Calcutta');
	$Entry_Date = date('Y-m-d      h:i:s a');
	$Entry_Id = $row_result['Registration_Id'];
	$sql = "INSERT INTO  `beam_d_c_1`(`Beam_D_C_Id` ,`Beam_D_C_Date` ,`Beam_D_C_No` ,`Company_Id` ,`Broker_Id` , `Labour_Id`,`Total_Beam` ,`Entry_Date`,`Entry_Id`)VALUES (NULL , '$t1' ,  '$t2',  '$t3',  '$t4', '$Labour_Id',  '$Total_Beam', '$Entry_Date', '$Entry_Id')";
$result = mysql_query($sql);

    $dateact = date('Y-m-d');
	$dateactfull = date('d-m-Y        h:i:s A');

      $comselectactivity = mysql_query("select Company_Id,C_Name from company_deetaails where Company_Id = '$t3'");
	   $comselectactivityfetch = mysql_fetch_array($comselectactivity);
	   
	   $brokerselectactivity = mysql_query("select Broker_Id,B_Name from broker_details1 where Broker_Id = '$t4'");
	   $brokerselectacitivityfetch = mysql_fetch_array($brokerselectactivity);
	 
	$Partact = "New Beam Challan Entry<br/>Challan No : ".$t2.", Date : ".$t1."<br/>Company : ".$comselectactivityfetch['C_Name'].", Broker : ".$brokerselectacitivityfetch['B_Name']."<br/>Total Beam : ".$Total_Beam;
	$insactivity = "insert into activity(Activity_Id,Date,Particular,Type,Action,Datefull,Id) values(NULL,'$dateact','$Partact','Beam Challan - Insert','insert','$dateactfull','$Entry_Id')";
	mysql_query($insactivity); 


$sel_sub = "select * from beam_d_c_2 where beam_d_c_2.Beam_D_C_Id = '$t0'";
$sel_exe = mysql_query($sel_sub);
while($sel_fetch = mysql_fetch_array($sel_exe))
{
$ins_sub = "insert into beam_dcorg (Be_D_C_Id,Beam_D_C_Id,Beam_No,Taar,Beam_Meter,Weight,Quality_Id,Status,R_Id) values(NULL,'".$sel_fetch[1]."','".$sel_fetch[2]."','".$sel_fetch[3]."','".$sel_fetch[4]."','".$sel_fetch[5]."','".$sel_fetch[6]."','".$sel_fetch[7]."','".$sel_fetch[8]."')";
	mysql_query($ins_sub);
}
$del_sub = "delete from beam_d_c_2 where beam_d_c_2.Beam_D_C_Id='$t0'";
$del_exe = mysql_query($del_sub);
$sel_sub_or = "select * from beam_dcorg where beam_dcorg.Beam_D_C_Id = '$t0'";
$sel_exe_or = mysql_query($sel_sub_or);
$total_sel_row = mysql_num_rows($sel_exe_or);
if($total_sel_row==0)
{
	$msg_error='Something gone wrong so your sub entry is not inserted in your last inserted challan, now please update that challan first';
}
else
{
	$msg_error='Record inserted';
}
$insertGoTo = "beam_d_c_listpage?msg_error=$msg_error";
  echo '<script>window.location="'.$insertGoTo.'";</script>';
}
}
if(isset($_REQUEST['update']))
{
//update
if(!isset($_SESSION['User']))
{} 
else
{
    $t0 = $_REQUEST['challanid'];
	$t1 = $_REQUEST['date'];
	$t2 = $_REQUEST['challanno'];
	$t3 = $_REQUEST['company'];
	$t4 = $_REQUEST['broker'];
	$Labour_Id = $_REQUEST['Labour_Id'];
	$Total_Beam = $_REQUEST['Total_Beam'];
	$Entry_Date = $_REQUEST['Entry_Date'];
	$Entry_Id = $row_result['Registration_Id'];
$sql= "UPDATE `beam_d_c_1` SET `Beam_D_C_Date` = '$t1', `Beam_D_C_No` = '$t2', `Company_Id` = '$t3', `Broker_Id` = '$t4', `Labour_Id` = '$Labour_Id', `Total_Beam` = '$Total_Beam', `Entry_Date` = '$Entry_Date', `Entry_Id` = '$Entry_Id' WHERE `beam_d_c_1`.`Beam_D_C_Id` = '".$t0."'";
$result = mysql_query($sql);

    $dateact = date('Y-m-d');
	$dateactfull = date('d-m-Y        h:i:s A');
	
	 $comselectactivity = mysql_query("select Company_Id,C_Name from company_deetaails where Company_Id = '$t3'");
	   $comselectactivityfetch = mysql_fetch_array($comselectactivity);
	   
	   $brokerselectactivity = mysql_query("select Broker_Id,B_Name from broker_details1 where Broker_Id = '$t4'");
	   $brokerselectacitivityfetch = mysql_fetch_array($brokerselectactivity);
	 
	$Partact = "Beam Challan Entry<br/>Challan No : ".$t2.", Date : ".$t1."<br/>Company : ".$comselectactivityfetch['C_Name'].", Broker : ".$brokerselectacitivityfetch['B_Name']."<br/>Total Beam : ".$Total_Beam.", Challan ID : ".$t0;
	$insactivity = "insert into activity(Activity_Id,Date,Particular,Type,Action,Datefull,Id) values(NULL,'$dateact','$Partact','Beam Challan - Update','update','$dateactfull','$Entry_Id')";
	mysql_query($insactivity);
	
  $updateGoTo = "beam_d_c_listpage?msg";
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
}
}
mysql_select_db($database_brijesh8510, $brijesh8510);
$query_comm = "SELECT Company_Id, C_Name FROM company_deetaails";
$comm = mysql_query($query_comm, $brijesh8510) or die(mysql_error());
$row_comm = mysql_fetch_assoc($comm);
$totalRows_comm = mysql_num_rows($comm);
mysql_select_db($database_brijesh8510, $brijesh8510);
$query_broo = "SELECT Broker_Id, B_Name FROM broker_details1";
$broo = mysql_query($query_broo, $brijesh8510) or die(mysql_error());
$row_broo = mysql_fetch_assoc($broo);
$totalRows_broo = mysql_num_rows($broo);
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
    <style> html {display:none; }
		 </style>
     <META HTTP-EQUIV="Refresh" CONTENT="0; URL=javascripterror.php">
    </noscript>
    <link rel="shortcut icon" href="Icons/st85.png">
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="stylesheet" href="assets/css/datepick.css">
</head>
<body>
       <?php include("sidemenu.php");?>
                <div class="inner">
                    <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" align="center">BEAM CHALLAN</h1>
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
            if(Beamdc(this))
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
            if(Beamdc(this))
            {
            update.value = 'Updating...';
            submitting = true;
            return true; 
            }
            return false;"<?php } ?>>
            <div class="form-group row">
            <div class="col-lg-4">
            <div class="form-group">
<label class="control-label col-lg-4">Company :</label>
<div class="col-lg-8">
  <select name="company" class="form-control" id="company">
    <option value="">--Select--</option>
    <?php
do {  
if($t3 == $row_comm['Company_Id'] )
{
	$cmp = " selected='selected'";
}
else
{
	$cmp = "";
}
?>
    <option value="<?php echo $row_comm['Company_Id']?>"   <?php echo $cmp;?> ><?php echo $row_comm['C_Name']?></option>
    <?php
} while ($row_comm = mysql_fetch_assoc($comm));
  $rows = mysql_num_rows($comm);
  if($rows > 0) {
      mysql_data_seek($comm, 0);
	  $row_comm = mysql_fetch_assoc($comm);
  }
?>
  </select>
  <span id="er_com"></span>
  </div>
</div>
                        </div>
                       <div class="col-lg-4">
                       <div class="form-group">
                        <label class="control-label col-lg-5" >Challan Date :</label>
                        <div class="col-lg-7">
                              <input class="form-control" type="text"  value="<?php echo $t1; ?>" name="date" id="date" readonly />
                    </div>
                        </div>
                        </div>
                         <div class="col-lg-4">
                         <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Challan ID :</label>
                    <div class="col-lg-7">
                    <input type="text" id="challanid" placeholder="" class="form-control" value="<?php echo $t0; ?>" name="challanid" readonly/>
                    </div>
                </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-4">
                        <div id="broker">
                      </div>     
                        </div>
                        <div class="col-lg-3">
                         <div id="showlabour">
                      </div>
                        </div>
                        <div class="col-lg-5">
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-6">Delivery Challan No :</label>
                    <div class="col-lg-6">
                    <input type="text" id="challanno" placeholder="Beam Delivery Challan No" class="form-control" name="challanno" value="<?php echo $t2; ?>" />
                     <span id="error1" style="color:#F00";></span>
                     <span id="checkno"></span>
                    </div>
                </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-3">
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Beam No : </label>
                   <div class="col-lg-7">
                    <input type="text" id="beamno" placeholder="Beam No" class="form-control" name="beamno" />
                    <span id="error2"></span>
                    <span id="check"></span>
                    </div>
                </div>
                        </div>
                         <div id="show">
               </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Taar : </label>
                <div class="col-lg-7">
                    <input type="text" id="taar" placeholder="Taar" class="form-control" name="taar" onkeypress="return isNumberKey(event)" />
                    <input type="hidden" name="action" id="action" value="<?php echo $action;?>"/>
                    </div>
                </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Meter : </label>
       <div class="col-lg-7">
                    <input type="text" id="meter" placeholder="Meter" class="form-control" name="meter" onkeypress="return isDecimalNumberKey(event)"  />
                     <input type="hidden" name="R_Id" id="R_Id" value="<?php echo $row_result['Registration_Id']; ?>"/>
                    </div>
                </div>
                        </div>
                        <div class="col-lg-3">
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Weight : </label>
                    <div class="col-lg-7">
                    <input type="text" id="weight" placeholder="Weight" class="form-control" name="weight" onkeypress="return isDecimalNumberKey(event)"  />
                    </div>
                </div>
                        </div>
                        </div>
                        <div class="form-group row">
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
                        <div class="col-lg-6">
                        </div>
                        <div class="col-lg-3">
                        <div class="form-group">
<label class="control-label col-lg-4">Status :</label>
<div class="col-lg-8">
  <select name="Status" class="form-control" id="Status">
    <option value="NotReturn">NotReturn</option>
    <option value="Return">Return</option>
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
                        <input type="button" value="Add" class="btn btn-primary btn-grad " name="Add1BeamDC" id="Add1BeamDC" />
                        <?php } ?>
                        </div>
                        <hr />
                         <div class="col-lg-12" align="center">
                         <div class="row">
                <div class="col-lg-12">
                            <div class="table-responsive" id="tableBeamDC">
                            
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
                    <input type="text" id="Total_Beam" placeholder="" class="form-control" name="Total_Beam" value="<?php echo $Total_Beam; ?>" readonly/>
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
                           <a href="beam_d_c_listpage"><input type="button" value=" Back" class="btn btn-inverse btn-lg " name="back" id="back" /></a>
                            
                                 <?php
							if($action=='update')
                             {
							?>
                          <input type="submit" value=" Update Challan " class="btn btn-primary btn-lg " name="update" />
                        <?php }
						elseif($action=='insert')
						{
		
if($days_remaining<=0)
{}
elseif($days_remaining>0)
{
	
						?>
                                   <input type="submit" value="Submit Challan" class="btn btn-primary btn-lg " name="submit" />
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
<script>
         $(document).ready(function () {
		sql="?challanid=<?php echo $t0; ?>&action=<?php echo $action;?>";
		$("#tableBeamDC").load("beam_d_c_table.php"+sql);
		<?php if($action=='update'){?>
		$("#company").val("<?php echo $t3; ?>");
		t5=$("#company").val();
		var q="?company="+t5+"&broker=<?php echo $t4; ?>";
		$("#broker").load("brokerajax.php"+q);
		$("#broker").val("<?php echo $t4; ?>");
		$("#broker option[value=<?php echo $t4; ?>]").attr("selected",true);
		
		sql1="?company="+t5+"&challanid=<?php echo $t0; ?>&action=<?php echo $action;?>";
		$("#showlabour").load("beamdclabour"+sql1);
		<?php } ?>
		 });
<?php include("shortcutkeys.php");?>
</script>
<script src="assets/js/beamdcchallan.js"></script>
<script src="assets/js/boot.datepick.js"></script>
</body>
</html>
<?php
function getNewChallanID()
{
	include("databaseconnect.php");
	$sql = "select max(Beam_D_C_Id)+1 from beam_d_c_1";
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

mysql_free_result($comm);
mysql_free_result($broo);
mysql_free_result($quaa);
ob_flush(); ?>