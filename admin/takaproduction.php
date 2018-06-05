<?php include("logcode.php"); require_once('../Connections/brijesh8510.php'); error_reporting(0);
include("databaseconnect.php");
if(isset($_REQUEST['action']))
{
	$action = $_REQUEST['action'];
	if($action == "insert")
	{	
	$decodeurl = $_REQUEST['Be_M_Id'];
	$durl = urldecode($decodeurl); 
	$turl = str_replace("'"," ",$durl);
	$urls = explode(" ",$turl);
	$Be_M_Id = $urls[1];
	$sql = "SELECT beam_machine.Be_M_Id, beam_machine.Started_Date, beam_dcorg.Beam_Meter,beam_dcorg.Beam_No,machine_details.Machine_No FROM beam_machine, beam_dcorg, machine_details WHERE beam_machine.Be_D_C_Id = beam_dcorg.Be_D_C_Id AND beam_machine.Machine_Id = machine_details.Machine_Id AND Be_M_Id = '".$Be_M_Id."' ";
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
	$Ta_Pro_Id = getNewChallanID();
	$Be_M_Id = $row['Be_M_Id'];
	$Started_Date = $row['Started_Date'];
	date_default_timezone_set('Asia/Calcutta');
	$T_Date = date('Y-m-d');
	$Beam_Meter = $row['Beam_Meter'];
    $Beam_No = $row['Beam_No'];
	$Machine_No = $row['Machine_No'];
	 include("webrenew.php");	
	}
 if($action=='update')
	{
		$decodeurl = $_REQUEST['Ta_Pro_Id'];
		$durl = urldecode($decodeurl); 
	$turl = str_replace("'"," ",$durl);
	$urls = explode(" ",$turl);
	$Ta_Pro_Id = $urls[1];
		$sql = "SELECT taka_production.Ta_Pro_Id,beam_machine.Be_M_Id,beam_dcorg.Beam_No,machine_details.Machine_No,taka_production.Started_Date,taka_production.Total_Taka,taka_production.Total_Meter,taka_production.Beam_Meter,taka_production.Shortage,taka_production.Shortageper,taka_production.Entry_Id FROM taka_production, beam_dcorg,beam_machine,machine_details WHERE beam_dcorg.Be_D_C_Id = beam_machine.Be_D_C_Id AND beam_machine.Be_M_Id = taka_production.Be_M_Id AND machine_details.Machine_Id = beam_machine.Machine_Id AND taka_production.Ta_Pro_Id = '".$Ta_Pro_Id."' ";
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
	$Ta_Pro_Id = $row['Ta_Pro_Id'];	
	date_default_timezone_set('Asia/Calcutta');
	$T_Date = date('Y-m-d');
	$Be_M_Id = $row['Be_M_Id'];		
	$Started_Date = $row['Started_Date'];
	$Total_Taka = $row['Total_Taka'];
	$Total_Meter = $row['Total_Meter'];
	$Beam_Meter = $row['Beam_Meter'];
	$Beam_No = $row['Beam_No'];
	$Machine_No = $row['Machine_No'];	
	$Shortage = $row['Shortage'];
	$Shortageper = $row['Shortageper'];
	$Entry_Id = $row['Entry_Id'];
	 include("webrenew.php");
	$sel_check_entry = "select count(Ta_Pro_Id) as count_taka,sum(Taka_Meter) as sum_meter from taka_detailsorg where Ta_Pro_Id='$Ta_Pro_Id'";
	$sel_check_exe = mysql_query($sel_check_entry);
	$sel_check_fetch = mysql_fetch_array($sel_check_exe);
	if($sel_check_fetch[0]==$Total_Taka && $sel_check_fetch[1]==$Total_Meter)
	{
	}
	else
	{
		$msg_check_takaprod ='<strong style="color:#F00;">'.'* Please verify all entry and then update this taka-production which is required</strong>';
	}
	}
}
	 if(isset ($_REQUEST['submit']))
{
	if(!isset($_SESSION['User']))
{} 
else
{
	$Be_M_Id = $_REQUEST['Be_M_Id'];
	$Started_Date = $_REQUEST['Started_Date'];
	$Total_Taka = $_REQUEST['Total_Taka'];
	$Total_Meter = $_REQUEST['Total_Meter'];
	$Beam_Meter = $_REQUEST['Beam_Meter'];
	$Shortage = $_REQUEST['Shortage'];
	$Shortageper = $_REQUEST['Shortageper'];
	$Entry_Id = $row_result['Registration_Id'];
	$query = mysql_query("select * from taka_production where Be_M_Id='".$Be_M_Id."' ") or die(mysql_error());
$duplicate = mysql_num_rows($query);
   if($duplicate==0)
    {
	$sql= "INSERT INTO  `taka_production` (`Ta_Pro_Id` ,`Be_M_Id` ,`Started_Date` ,`Total_Taka` ,`Total_Meter` ,`Beam_Meter` ,`Shortage` ,`Shortageper` ,`Entry_Id`)
VALUES (NULL , '$Be_M_Id' ,  '$Started_Date',  '$Total_Taka',  '$Total_Meter',  '$Beam_Meter',  '$Shortage',  '$Shortageper', '$Entry_Id')";
$result = mysql_query($sql);
$sel_sub = "select * from taka_details where taka_details.Ta_Pro_Id = '".$Ta_Pro_Id."'";
$sel_exe = mysql_query($sel_sub);
while($sel_fetch = mysql_fetch_array($sel_exe))
{
	$ins_sub = "insert into taka_detailsorg (Taka_Id,Ta_Pro_Id,T_Date,Taka_Meter,Taka_Weight,Quality_Id,Status,Description,R_Id) values(NULL,'".$sel_fetch[1]."','".$sel_fetch[2]."','".$sel_fetch[3]."','".$sel_fetch[4]."','".$sel_fetch[5]."','".$sel_fetch[6]."','".$sel_fetch[7]."','".$sel_fetch[8]."')";
	mysql_query($ins_sub);
}
$del_sub = "delete from taka_details where taka_details.Ta_Pro_Id='$Ta_Pro_Id'";
$del_exe = mysql_query($del_sub);
$sel_sub_or = "select * from taka_detailsorg where taka_detailsorg.Ta_Pro_Id = '".$Ta_Pro_Id."'";
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
 $insertGoTo = "takaproductionlist?msg_error=$msg_error";
  echo '<script>window.location="'.$insertGoTo.'";</script>';
	}
	else
	{
		echo '<script>alert("This Beam-machine ID : '.$Be_M_Id.' allready exists in taka production.");</script>';
	}
}
		}
 if(isset ($_REQUEST['update']))
      {
		  if(!isset($_SESSION['User']))
{ } 
else
{
//update
     $Ta_Pro_Id = $_REQUEST['Ta_Pro_Id'];
	$Be_M_Id = $_REQUEST['Be_M_Id'];
	$Started_Date = $_REQUEST['Started_Date'];
	$Total_Taka = $_REQUEST['Total_Taka'];
	$Total_Meter = $_REQUEST['Total_Meter'];
	$Beam_Meter = $_REQUEST['Beam_Meter'];
	$Shortage = $_REQUEST['Shortage'];
	$Shortageper = $_REQUEST['Shortageper'];
	$Entry_Id = $row_result['Registration_Id'];
$sql= "UPDATE `taka_production` SET `Be_M_Id` = '$Be_M_Id', `Started_Date` = '$Started_Date', `Total_Taka` = '$Total_Taka', `Total_Meter` = '$Total_Meter', `Beam_Meter` = '$Beam_Meter', `Shortage` = '$Shortage', `Shortageper` = '$Shortageper', `Entry_Id` = '$Entry_Id' WHERE `taka_production`.`Ta_Pro_Id` = '".$Ta_Pro_Id."' ";
$result = mysql_query($sql);
 $updateGoTo = "takaproductionlist?msg";
  echo '<script>window.location="'.$updateGoTo.'";</script>';
}
	}
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
$query_rsQuality = "SELECT Quality_Id, Quality_Name FROM quality_details";
$rsQuality = mysql_query($query_rsQuality, $brijesh8510) or die(mysql_error());
$row_rsQuality = mysql_fetch_assoc($rsQuality);
$totalRows_rsQuality = mysql_num_rows($rsQuality);
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
                    <h1 class="page-header" align="center">TAKA PRODUCTION</h1>
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
                    <label for="text2" class="control-label col-lg-6">Beam-Machine ID :</label>
                    <div class="col-lg-6">
                    <input type="text" id="Be_M_Id" placeholder="" class="form-control" name="Be_M_Id" value="<?php echo $Be_M_Id; ?>" readonly />
                    </div>
                </div>
                        </div>
                        <div class="col-lg-4">
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-6">Taka-Production ID :</label>
                    <div class="col-lg-6">
                    <input type="text" id="Ta_Pro_Id" placeholder="" class="form-control" name="Ta_Pro_Id" value="<?php echo $Ta_Pro_Id; ?>" readonly />
                    </div>
                </div>
                        </div>
                        <div class="col-lg-4">
                        <div class="form-group">
                        <label class="control-label col-lg-6"> Fitted Date :</label>
                        <div class="col-lg-6">
                            <input class="form-control" type="text"   name="Started_Date" id="Started_Date" value="<?php echo $Started_Date; ?>" readonly/>
                            </div>
                        </div>
                    </div>
                        </div>
                        <div class="form-group row">
                        <div class="col-lg-4">
                        <div class="form-group">
                        <label class="control-label col-lg-6">Meter :</label>
                        <div class="col-lg-6" >
                                <input class="form-control" type="text" name="Taka_Meter" id="Taka_Meter" onkeypress="return isDecimalNumberKey(event)"  />
                          <input type="hidden" name="action" id="action" value="<?php echo $action;?>"/>     
                        </div>
                    </div>    
                        </div>
                        <div class="col-lg-4">
                        <div class="form-group">
                        <label class="control-label col-lg-6" >Date :</label>
                        <div class="col-lg-6">
                              <input class="form-control" type="text" id="T_Date"  value="<?php echo $T_Date; ?>" name="T_Date" readonly />
                        </div>
                    </div>
                        </div>
                        <div class="col-lg-4">
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-6">Weight :</label>
                    <div class="col-lg-6">
                    <input type="text" id="Taka_Weight" placeholder="" class="form-control" name="Taka_Weight" onkeypress="return isDecimalNumberKey(event)" />
                    <input type="hidden" id="R_Id" name="R_Id" value="<?php echo $row_result['Registration_Id']; ?>"  />
                    </div>
                </div>
                        </div>
                        </div>
                        <div class="form-group row">
                        <div class="col-lg-4">
                        <div class="form-group">
<label class="control-label col-lg-6">Quality :</label>
<div class="col-lg-6">
  <select name="Quality_Id" class="form-control" id="Quality_Id">
    <option value="">--Select--</option>
    <?php
do {  
?>
    <option value="<?php echo $row_rsQuality['Quality_Id']?>"><?php echo $row_rsQuality['Quality_Name']?></option>
    <?php
} while ($row_rsQuality = mysql_fetch_assoc($rsQuality));
  $rows = mysql_num_rows($rsQuality);
  if($rows > 0) {
      mysql_data_seek($rsQuality, 0);
	  $row_rsQuality = mysql_fetch_assoc($rsQuality);
  }
?>
  </select>
  </div>
  </div>
</div>
                        <div class="col-lg-4">
                        <div class="form-group">
    <label class="control-label col-lg-6">Status :</label>
    <div class="col-lg-6">
      <select name="Status" class="form-control" id="Status">
        <option value="Fresh">Fresh</option>
        <option value="Damage">Damage</option>
      </select>
     </div>
</div>
                        </div>
                        <div class="col-lg-4">
                        <div class="form-group">
                    <label class="control-label col-lg-6">Description :</label>
                    <div class="col-lg-6">
                    <span id="error1" style="color:#F00";></span>
                        <textarea rows="3" cols="20" id="textarea1" class="form-control" ></textarea>
                    </div>
                </div>
                </div>
                </div>
                    <div align="right">
                        <?php
                                            if($days_remaining<=0)
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
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Total Taka :</label>
                    <div class="col-lg-7">
                    <input type="text" id="Total_Taka" placeholder="" class="form-control" name="Total_Taka" value="<?php echo $Total_Taka; ?>" readonly/>
                    </div>
                </div>
                        </div>
                        <div class="col-lg-4">
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Total Meter :</label>
                    <div class="col-lg-7">
                    <input type="text" id="Total_Meter" placeholder="" class="form-control" name="Total_Meter"  value="<?php echo $Total_Meter; ?>"  readonly />
                    </div>
                </div>
                      </div>
                        <div class="col-lg-4">
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Beam Meter :</label>
                    <div class="col-lg-7">
                    <input type="text" id="Beam_Meter" placeholder="" class="form-control" name="Beam_Meter" value="<?php echo $Beam_Meter; ?>" readonly
                     />
                    </div>
                </div>
                        </div>
                        <div class="col-lg-4">
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Beam No :</label>
                    <div class="col-lg-7">
                    <input type="text" id="Beam_No" placeholder="" class="form-control" name="Beam_No" value="<?php echo $Beam_No; ?>" readonly
                     />
                    </div>
                </div>
                        </div>
                        <div class="col-lg-4">
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Machine No :</label>
                    <div class="col-lg-7">
                    <input type="text" id="Machine_No" placeholder="" class="form-control" name="Machine_No" value="<?php echo $Machine_No; ?>" readonly
                     />
                    </div>
                </div>
                        </div>
                        <div class="col-lg-4">
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Shortage(Mtr) :</label>
                    <div class="col-lg-7">
                    <input type="text" id="Shortage" placeholder="" class="form-control" name="Shortage"  value="<?php echo $Shortage; ?>" readonly />
                    </div>
                </div>
                        </div>
                        <div class="col-lg-4">
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Shortage(%) :</label>
                    <div class="col-lg-7">
                    <input type="text" id="Shortageper" placeholder="" class="form-control" name="Shortageper"  value="<?php echo $Shortageper; ?>" readonly />
                    </div>
                </div>
                        </div>
                        <div class="col-lg-4">
                        </div>
                         <?php if($action=='update')
						{
							?>
                        <div class="col-lg-4">
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Entry #ID :</label>
                    <div class="col-lg-7">
                    <input type="text" id="Entry_Id" placeholder="" class="form-control" name="Entry_Id"  value="<?php echo $Entry_Id; ?>"  readonly/>
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
								  echo $msg_check_takaprod;
								 }
							if($action=="update" )
                             {
							?>
                                            <a href="takaproductionlist"><input type="button" value=" Back" class="btn btn-inverse btn-lg " name="back"/></a> <input type="submit" value=" Update" class="btn btn-primary btn-lg " name="update" />
                        <?php }
						else if($action=="insert" ) 
						{
						?>
                                  <a href="beammachlistpage"><input type="button" value="Back" class="btn btn-inverse btn-lg " name="back1"/></a> 
                                  <?php
								   if($days_remaining<=0)
{}
elseif($days_remaining>0)
{
	?><input type="submit" value="Submit" class="btn btn-primary btn-lg " name="submit" />
                        <?php }}?>
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
		sql="?Ta_Pro_Id=<?php echo $Ta_Pro_Id; ?>&action=<?php echo $action;?>";
		$("#table").load("takaprotable.php"+sql);
});
<?php include("shortcutkeys.php");?>
   </SCRIPT>
 <script src="assets/js/takaproduction.js"></script>
<script src="assets/js/jointjquerydateandpicker.js"></script>
</body>
</html>
<?php
function getNewChallanID()
{
	include("databaseconnect.php");
	$sql="select max(Ta_Pro_Id)+1 from taka_production";
	$result= mysql_query($sql);
	$row= mysql_fetch_array($result);
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
mysql_free_result($rsQuality);
 ob_flush(); ?>