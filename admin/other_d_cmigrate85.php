﻿<?php include("logcode.php"); error_reporting(0);
 include("databaseconnect.php");
if(isset($_REQUEST['action']))
{
	$action = $_REQUEST['action'];
    if($action == "insert")
	{
	date_default_timezone_set('Asia/Calcutta');
	$Other_D_C_Date = date('Y-m-d');
	$Other_D_C_Id = getNewChallanID();
	include("webrenew.php");
}
 if($action == 'update')
	{
		$decodeurl = $_REQUEST['Other_D_C_Id'];
	$durl = urldecode($decodeurl); 
	$turl = str_replace("'"," ",$durl);
	$urls = explode(" ",$turl);
	$Other_D_C_Id = $urls[1];
	$sql = "select * from other_migrate where other_migrate.Other_D_C_Id = '".$Other_D_C_Id."'  ";
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
	$Other_D_C_Id = $row['Other_D_C_Id'];
	$Other_D_C_Date = $row['Other_D_C_Date'];
	$Total_Other = $row['Total_Other'];
	$From_Ad = $row['From_Ad'];
	$Entry_Id = $row['Entry_Id'];
	$Entry_Date = $row['Entry_Date'];
	$Status = $row['Status'];
	date_default_timezone_set('Asia/Calcutta');
	include("webrenew.php");
	$sel_check_entry = "select sum(Quantity) as sum_quantity from other_sub_orgmigrate where Other_D_C_Id='$Other_D_C_Id'";
	$sel_check_exe = mysql_query($sel_check_entry);
	$sel_check_fetch = mysql_fetch_array($sel_check_exe);
	if($sel_check_fetch[0]==$Total_Other)
	{
	}
	else
	{
		$msg_check_other ='<strong style="color:#F00;">'.'* Please update this migration challan which is required</strong>';
	}}}
	 if(isset ($_REQUEST['submit']))
{
//insert
     if(!isset($_SESSION['User']))
{ } 
else
{   
	$Other_D_C_Date = $_REQUEST['Other_D_C_Date'];
	$Total_Other = $_REQUEST['Total_Other'];
	$Entry_Id = $row_result['Registration_Id'];
   $From_Ad = strtoupper($_REQUEST['From_Ad']);
	$Status = $_REQUEST['Status'];
	$Entry_Id = $row_result['Registration_Id'];
	date_default_timezone_set('Asia/Calcutta');
	$Entry_Date = date('Y-m-d      h:i:s a');
	$sql= "INSERT INTO  `other_migrate` (`Other_D_C_Id` ,`Other_D_C_Date` ,`From_Ad`,`Total_Other`,`Entry_Date`,`Entry_Id`,`Status`)VALUES (NULL , '$Other_D_C_Date',  '$From_Ad', '$Total_Other', '$Entry_Date', '$Entry_Id', '$Status')";
$result = mysql_query($sql);
$sel_sub = "select * from other_sub_migrate where other_sub_migrate.Other_D_C_Id = '$Other_D_C_Id'";
$sel_exe = mysql_query($sel_sub);
while($sel_fetch = mysql_fetch_array($sel_exe))
{
	$ins_sub = "insert into other_sub_orgmigrate (Ot_D_C_Id,Other_D_C_Id,Mach_Part_Id,Quantity,R_Id) values(NULL,'".$sel_fetch[1]."','".$sel_fetch[2]."','".$sel_fetch[3]."','".$sel_fetch[4]."')";
	mysql_query($ins_sub);
}
$del_sub = "delete from other_sub_migrate where other_sub_migrate.Other_D_C_Id='$Other_D_C_Id'";
$del_exe = mysql_query($del_sub);
$sel_sub_or = "select * from other_sub_orgmigrate where other_sub_orgmigrate.Other_D_C_Id = '$Other_D_C_Id'";
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
 $insertGoTo = "other_d_c_migratelist?msg_error=$msg_error";
  echo '<script>window.location="'.$insertGoTo.'";</script>';
}}
	 if(isset($_REQUEST['update']))
{
//update
if(!isset($_SESSION['User']))
{ } 
else
{
	$Other_D_C_Id = $_REQUEST['Other_D_C_Id'];
    $Other_D_C_Date = $_REQUEST['Other_D_C_Date'];
	$Total_Other = $_REQUEST['Total_Other'];
	$Entry_Id = $row_result['Registration_Id'];
   $From_Ad = strtoupper($_REQUEST['From_Ad']);
	$Status = $_REQUEST['Status'];
	$Entry_Id = $row_result['Registration_Id'];
	$Entry_Date = $_REQUEST['Entry_Date'];
	 $sql= "UPDATE `other_migrate` SET `Other_D_C_Date` = '$Other_D_C_Date', `From_Ad` = '$From_Ad', `Status` = '$Status', `Entry_Date` = '$Entry_Date', `Total_Other` = '$Total_Other', `Entry_Id` = '$Entry_Id' WHERE `other_migrate`.`Other_D_C_Id` = '".$Other_D_C_Id."' ";
$result = mysql_query($sql);
 $updateGoTo = "other_d_c_migratelist?msg";
  echo '<script>window.location="'.$updateGoTo.'";</script>';
}}
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
       <?php include("sidemenu.php") ?>
                <div class="inner">
                    <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" align="center">MIGRATION-OTHER CHALLAN</h1>
                </div>
            </div>
<div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <div id="div-1" class="accordion-body collapse in body">
            <form class="form-horizontal" method="post" <?php if($action =='insert') { ?>onsubmit="if(submitting) {
alert('The record is being submitted, please wait a moment...');submit.disabled = true;return false;}if(checkQuotee(this)){submit.value = 'Submitting...';submitting = true;return true;}return false;" <?php } elseif($action=='update') { ?> onsubmit="if(submitting){alert('The record is being updated, please wait a moment...');update.disabled = true;return false;}if(checkQuotee(this)){update.value = 'Updating...';submitting = true; return true;}return false;"<?php } ?>>
            <div class="form-group row">
            <div class="col-lg-4">
             <div class="form-group">
                    <label class="control-label col-lg-6">To :</label>
           <div class="col-lg-6">
                        <textarea rows="3" cols="20" id="textarea1" name="From_Ad" class="form-control" ><?php echo $From_Ad;?></textarea><span id="error1" style="color:#F00";></span>
                    </div>
                </div>      
                        </div>
                       <div class="col-lg-4">
                       <div class="form-group">
                        <label class="control-label col-lg-5" >Challan Date :</label>
                        <div class="col-lg-7">
                              <input class="form-control" type="text" name="Other_D_C_Date" id="Other_D_C_Date" value="<?php echo $Other_D_C_Date; ?>" readonly />
                        </div>
                    </div>
                        </div>
                         <div class="col-lg-4">
                         <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Migration-Challan ID :</label>
                    <div class="col-lg-7">
                    <input type="text" id="Other_D_C_Id" placeholder="" class="form-control" name="Other_D_C_Id" value="<?php echo $Other_D_C_Id; ?>" readonly />
                    </div>
                </div>
                        </div>
                    </div>
                     <div class="form-group row">
                        <div class="col-lg-4">
                        <div class="form-group">
<label class="control-label col-lg-4">Machine-Parts :</label>
<div class="col-lg-8">
  <select name="Mach_Part_Id" class="form-control" id="Mach_Part_Id">
    <option value="">--Select--</option>
    <?php
   $select = "select Mach_Part_Id,Mach_Pname from machine_parts";
   $se_exe = mysql_query($select);
  while($se_fetch = mysql_fetch_array($se_exe))
  {
 echo '<option value="'.$se_fetch['Mach_Part_Id'].'">'.$se_fetch['Mach_Pname'].'</option>';
  }
?>
  </select>
  </div>
</div>
                        </div>
                         <div class="col-lg-4">
                           </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Quantity :</label>
                    <div class="col-lg-7">
                    <input type="text" id="Quantity" placeholder="" class="form-control" name="Quantity" onkeypress="return isNumberKey(event)"/><input type="hidden" name="action" id="action" value="<?php echo $action;?>"/>
         <input type="hidden" id="R_Id" name="R_Id" value="<?php echo $row_result['Registration_Id']; ?>"  />
                    </div>
                </div>
                        </div>
                         </div>
                   <div align="right">
                       <?php if($days_remaining<=0)
{}
elseif($days_remaining>0)
{?>
                        <input type="button" value="Add" class="btn btn-primary btn-grad " name="Add1" id="Add1" />
                        <?php } ?>
                        </div>
                    <hr />
                        <div class="col-lg-12" >
                         <div class="row">
                <div class="col-lg-12" >
                            <div class="table-responsive" id="table" >
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
                       <div style="color:#F00" align="right" id="Total_Entry1">Only 34 entry acceptable in one challan</div><input type="hidden" name="Total_Entry" id="Total_Entry" value=""  />
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Total :</label>
                    <div class="col-lg-7">
                    <input type="text" id="Total_Other" placeholder="" class="form-control" name="Total_Other" value="<?php echo $Total_Other; ?>" readonly/>
                    </div>
                </div>
                        </div>
                        <div class="col-lg-4">
                        </div>
                        <div class="col-lg-4">
                        </div>
                        <div class="col-lg-4">
                        <div class="form-group">
<label class="control-label col-lg-5">Status :</label>
<div class="col-lg-7">
  <select name="Status" class="form-control" id="Status">
    <option value="Further-Process" <?php if($Status == 'Further-Process') { echo 'selected = \"selected\"'; } ?>>Further-Process</option>
    <option value="Migrated" <?php if($Status == 'Migrated') { echo 'selected = \"selected\"'; } ?>>Migrated</option>
  </select>
  </div>
</div>
                        </div>
                         <?php if($action=='update')
						{
							?>
                            <div class="col-lg-4">
                        </div>
                        <div class="col-lg-4">
                        </div>
                        <div class="col-lg-4">
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Entry Date :</label>
                    <div class="col-lg-7">
                    <input type="text" id="Entry_Date" placeholder="" class="form-control" name="Entry_Date"  value="<?php echo $Entry_Date; ?>"  readonly/>
                    </div>
                </div>
                        </div>
                        <div class="col-lg-4">
                        </div>
                        <div class="col-lg-4">
                        </div>
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
								  echo $msg_check_other;
							 }
							?>
                         <a href="beam_d_c_migratelist"><input type="button" value="Back" class="btn btn-inverse btn-lg " name="back"/></a> 
                             <?php
							if($action=="update" )
                             {
							?>
                                           <input type="submit" value=" Update Challan" class="btn btn-primary btn-lg" name="update" />
                        <?php }
						else if($action=="insert" )
						{
if($days_remaining<=0)
{}
elseif($days_remaining>0)
{
						?>
                                  <input type="submit" value="Submit Challan" class="btn btn-primary btn-lg" name="submit" />
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
$(document).ready(function(){
		sql="?Other_D_C_Id=<?php echo $Other_D_C_Id; ?>&action=<?php echo $action;?>";
		$("#table").load("other_d_cmigrate85table.php"+sql);
});
<?php include("shortcutkeys.php");?>
</script>
 <script src="assets/js/othermigratechallan.js"></script>
<script src="assets/js/jointjquerydateandpicker.js"></script>
</body>
</html>
<?php
function getNewChallanID()
{
	include("databaseconnect.php");
	$sql = "select max(Other_D_C_Id)+1 from other_migrate";
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
	ob_flush(); ?>