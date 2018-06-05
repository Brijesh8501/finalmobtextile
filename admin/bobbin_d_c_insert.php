<?php 
include("logcode.php"); require_once('../Connections/brijesh8510.php'); error_reporting(0);
 include("databaseconnect.php");
if(isset($_REQUEST['action']))
{        
	 $action = $_REQUEST['action'];
	 if($action=='update')
	 {
	$decodeurl = $_REQUEST['Bo_D_C_Id'];
	$durl = urldecode($decodeurl); 
	$turl = str_replace("'"," ",$durl);
	$urls = explode(" ",$turl);
	$t0 = $urls[1];
	$sql = "select * from bobbin_d_c where Bo_D_C_Id= '".$t0."' ";
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
	$t0 = $row['Bo_D_C_Id'];
	$Bo_D_C_Date = $row['Bo_D_C_Date'];
	$Bo_D_C_No = $row['Bo_D_C_No'];
	$t3 = $row['Company_Id'];
	$t4 = $row['Broker_Id'];
	$Total_Cart = $row['Total_Cart'];
	$Entry_Date = $row['Entry_Date'];
	$Entry_Id = $row['Entry_Id'];
	date_default_timezone_set('Asia/Calcutta');
	include("webrenew.php");
	$sel_check_entry = "select sum(Total_Cartoon) as sum_bobbin from boobin_dcorg where Bo_D_C_Id='$t0'";
	$sel_check_exe = mysql_query($sel_check_entry);
	$sel_check_fetch = mysql_fetch_array($sel_check_exe);
	if($sel_check_fetch[0]==$Total_Cart)
	{}
	else
	{
		$msg_check_bobbin ='<strong style="color:#F00;">'.'Please update this challan which is required</strong>';
	}
	 }
   else if($action=='insert')
{
	$t0 = getNewChallanID();
	date_default_timezone_set('Asia/Calcutta');
	include("webrenew.php");
	$Bo_D_C_Date = date('Y-m-d');
	}
}
	 if(isset($_REQUEST['submit']))
{
//insert
      if(!isset($_SESSION['User']))
{ } 
else
{
	$Bo_D_C_Date = $_REQUEST['Bo_D_C_Date'];
	$Bo_D_C_No = $_REQUEST['Bo_D_C_No'];
	$t3 = $_REQUEST['company'];
	$t4 = $_REQUEST['broker'];
	$Total_Cart = $_REQUEST['Total_Cart'];
	date_default_timezone_set('Asia/Calcutta');
	$Entry_Date = date('Y-m-d    h:i:s a');
	$Entry_Id = $row_result['Registration_Id'];
	$sql= "INSERT INTO  `bobbin_d_c` (`Bo_D_C_Id` ,`Bo_D_C_Date` ,`Bo_D_C_No` ,`Company_Id` ,`Broker_Id` ,`Total_Cart` ,`Entry_Date` ,`Entry_Id`)VALUES (NULL , '$Bo_D_C_Date' ,  '$Bo_D_C_No',  '$t3',  '$t4',  '$Total_Cart', '$Entry_Date', '$Entry_Id')";
$result = mysql_query($sql);
 $sel_sub = "select * from boobin_d_c_2 where boobin_d_c_2.Bo_D_C_Id = '$t0'";
$sel_exe = mysql_query($sel_sub);
while($sel_fetch = mysql_fetch_array($sel_exe))
{
	$ins_sub = "insert into boobin_dcorg (Bobbin_D_C_Id,Bo_D_C_Id,Quality_Id,Total_Cartoon,Total_Weight,Status,R_Id) values(NULL,'".$sel_fetch[1]."','".$sel_fetch[2]."','".$sel_fetch[3]."','".$sel_fetch[4]."','".$sel_fetch[5]."','".$sel_fetch[6]."')";
	mysql_query($ins_sub);
}
$del_sub = "delete from boobin_d_c_2 where boobin_d_c_2.Bo_D_C_Id='$t0'";
$del_exe = mysql_query($del_sub);
$sel_sub_or = "select * from boobin_dcorg where boobin_dcorg.Bo_D_C_Id = '$t0'";
$sel_exe_or = mysql_query($sel_sub_or);
$sel_fetch_or = mysql_fetch_array($sel_exe_or);
$total_sel_row = mysql_num_rows($sel_exe_or);
if($total_sel_row==0)
{
	$msg_error='Something gone wrong so your sub entry is not inserted in your last inserted challan, now please update that challan first';
}
else
{
	$msg_error='Record inserted';
}
$updateGoTo = "bobbinlistpage?msg_error=$msg_error";
  echo '<script>window.location="'.$updateGoTo.'";</script>';
} }
      if(isset($_REQUEST['update']))
      {
//update
    if(!isset($_SESSION['User']))
{ } 
else
{ 
     $t0 = $_REQUEST['challanid'];
	$Bo_D_C_Date = $_REQUEST['Bo_D_C_Date'];
	$Bo_D_C_No = $_REQUEST['Bo_D_C_No'];
	$t3 = $_REQUEST['company'];
	$t4 = $_REQUEST['broker'];
	$Total_Cart = $_REQUEST['Total_Cart'];
	$Entry_Date = $_REQUEST['Entry_Date'];
	$Entry_Id = $row_result['Registration_Id'];
$sql = "update `bobbin_d_c` set `Bo_D_C_Date` = '$Bo_D_C_Date',`Bo_D_C_No` = '$Bo_D_C_No' ,`Company_Id` = '$t3' ,`Broker_Id` = '$t4' ,`Total_Cart` = '$Total_Cart' ,`Entry_Date` = '$Entry_Date' ,`Entry_Id` = '$Entry_Id' where Bo_D_C_Id = '".$t0."'";
$result = mysql_query($sql);
 $updateGoTo = "bobbinlistpage?msg";
  echo '<script>window.location="'.$updateGoTo.'";</script>';
	} }
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
$query_srdeatilsss = "SELECT Company_Id, C_Name FROM company_deetaails";
$srdeatilsss = mysql_query($query_srdeatilsss, $brijesh8510) or die(mysql_error());
$row_srdeatilsss = mysql_fetch_assoc($srdeatilsss);
$totalRows_srdeatilsss = mysql_num_rows($srdeatilsss);
mysql_select_db($database_brijesh8510, $brijesh8510);
$query_broke = "SELECT Broker_Id, B_Name FROM broker_details1";
$broke = mysql_query($query_broke, $brijesh8510) or die(mysql_error());
$row_broke = mysql_fetch_assoc($broke);
$totalRows_broke = mysql_num_rows($broke);
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
    <link rel="stylesheet" href="assets/css/datepick.css">
</head>
<body>
<?php include("sidemenu.php"); ?>
                <div class="inner">
                    <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" align="center">BOBBIN CHALLAN</h1>
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
<label class="control-label col-lg-4">Company :</label>
<div class="col-lg-8">
  <select name="company" class="form-control" id="company">
    <option value="">--Select--</option>
    <?php
do {  
if($t3 == $row_srdeatilsss['Company_Id'] )
{
	$cmp = " selected='selected'";
}
else
{
	$cmp = "";
}
?>
    <option value="<?php echo $row_srdeatilsss['Company_Id']?>"  <?php echo $cmp;?> ><?php echo $row_srdeatilsss['C_Name']?></option>
    <?php
} while ($row_srdeatilsss = mysql_fetch_assoc($srdeatilsss));
  $rows = mysql_num_rows($srdeatilsss);
  if($rows > 0) {
      mysql_data_seek($srdeatilsss, 0);
	  $row_srdeatilsss = mysql_fetch_assoc($srdeatilsss);
  }
?>
  </select>
  </div>
</div>
                        </div>
                       <div class="col-lg-4">
                       <div class="form-group">
                        <label class="control-label col-lg-5" >Challan Date :</label>
                        <div class="col-lg-7">
                              <input class="form-control" type="text"  value="<?php echo $Bo_D_C_Date; ?>" name="Bo_D_C_Date" id="Bo_D_C_Date" readonly />
                        </div>
                    </div>
                        </div>
                          <div class="col-lg-4">
                         <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Challan ID :</label>
                    <div class="col-lg-7">
                    <input type="text" id="challanid" placeholder="" class="form-control" name="challanid" value="<?php echo $t0; ?>" readonly/>
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
                        </div>
                        <div class="col-lg-5">
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-6">Delivery Challan No :</label>
                    <div class="col-lg-6">
                    <input type="text" id="challanno" placeholder=" Bobbin Delivery Challan No" class="form-control" name="Bo_D_C_No" value="<?php echo $Bo_D_C_No; ?>" />
                    <span id="error1" style="color:#F00";></span>
                     <span id="checkno"></span>
                    </div>
                </div>
                        </div>
                    </div>
                     <div id="show">
               </div>
                    <div class="form-group row">
                        <div class="col-lg-3">
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-8">Cartoon/Bags/Cases :</label>
                    <div class="col-lg-4">
                    <input type="text" id="totalcartoon" placeholder="" class="form-control" name="totalcartoon" onkeypress="return isNumberKey(event)" />
                     <input type="hidden" name="R_Id" id="R_Id" value="<?php echo $row_result['Registration_Id']; ?>"/>
                    </div>
                </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Weight :</label>
                    <div class="col-lg-7">
                    <input type="text" id="totalweight" placeholder="Total Weight" class="form-control" name="totalweight" onkeypress="return isDecimalNumberKey(event)"y/>
                    <input type="hidden" name="action" id="action" value="<?php echo $action;?>"/>
                    </div>
                </div>
                        </div>
                        <div class="col-lg-3">
                        <div class="form-group">
<label class="control-label col-lg-4">Quality :</label>
<div class="col-lg-8">
  <select name="Quality_Id" class="form-control" id="quality">
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
                        <div class="col-lg-3">
                        <div class="form-group">
<label class="control-label col-lg-4">Status :</label>
<div class="col-lg-8">
  <select name="Status" class="form-control" id="Status">
    <option value="NotReturn-unused">NotReturn-unused</option>
    <option value="In-Using">In-Using</option>
     <option value="NotReturn-used">NotReturn-used</option>
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
                    <label for="text2" class="control-label col-lg-5">Total :</label>
                    <div class="col-lg-7">
                    <input type="text" id="cartoon" placeholder="" class="form-control" name="Total_Cart" value="<?php echo $Total_Cart; ?>" readonly/>
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
                         <?php
						 if($days_remaining<=0)
{
	echo "<strong style='color:#F00;'>* Please renew your website</strong>";
	
}
							if($action=='update')
                             {
								  echo $msg_check_bobbin;
							 }
							?>
                           <a href="bobbinlistpage"> <input type="button" value="Back" class="btn btn-inverse btn-lg " /></a>
                                 <?php
							if($action=='update')
                             {
							?>
                                            <input type="submit" value="Update Challan" class="btn btn-primary btn-lg " name="update" id="update" />
                        <?php }
						else if($action=='insert')
						{
							if($days_remaining<=0)
{}
elseif($days_remaining>0)
{
	
						?>
                                   <input type="submit" value="Submit Challan" class="btn btn-primary btn-lg " name="submit" id="submit" />
                        <?php } } ?>
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
$(document).ready(function(){
		<?php if($action=='update'){?>
		$("#company").val("<?php echo $t3; ?>");
		t5=$("#company").val();
		var q="?company="+t5+"&broker=<?php echo $t4; ?>";
		$("#broker").load("brokerajax.php"+q);
		$("#broker").val("<?php echo $t4; ?>");
		$("#broker option[value=<?php echo $t4; ?>]").attr("selected",true);<?php } ?>
		sql="?challanid=<?php echo $t0; ?>&action=<?php echo $action; ?>";
		$("#table").load("bobbin_d_c_table.php"+sql);
});
<?php include("shortcutkeys.php");?>
   </SCRIPT>
<script src="assets/js/bobbindcchallan.js"></script>
<script src="assets/js/boot.datepick.js"></script>
     </body>
</html>
<?php
function getNewChallanID()
{
	include("databaseconnect.php");
	$sql = "select max(Bo_D_C_Id)+1 from bobbin_d_c";
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
mysql_free_result($srdeatilsss);
mysql_free_result($broke);
mysql_free_result($quaa);
 ob_flush(); ?>