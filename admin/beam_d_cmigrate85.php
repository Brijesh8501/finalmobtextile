<?php include("logcode.php"); error_reporting(0);
include("databaseconnect.php");
if(isset($_REQUEST['action']))
{
	$action = $_REQUEST['action'];
    if($action == "insert")
	{
	date_default_timezone_set('Asia/Calcutta');
	$Beam_D_C_Date = date('Y-m-d');
	include("webrenew.php");
	$Beam_D_C_Id = getNewChallanID();
	}
 if($action == 'update')
	{
	$decodeurl = $_REQUEST['Beam_D_C_Id'];
	$durl = urldecode($decodeurl); 
	$turl = str_replace("'"," ",$durl);
	$urls = explode(" ",$turl);
	$Beam_D_C_Id = $urls[1];
	$sql = "select * from beam_d_c_1migrate where beam_d_c_1migrate.Beam_D_C_Id = '".$Beam_D_C_Id."'  ";
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
	$Beam_D_C_Id = $row['Beam_D_C_Id'];
	$Beam_D_C_Date = $row['Beam_D_C_Date'];
	$Total_Beam = $row['Total_Beam'];
	$From_Ad = $row['From_Ad'];
	$Entry_Id = $row['Entry_Id'];
	$Entry_Date = $row['Entry_Date'];
	$Status = $row['Status'];
	date_default_timezone_set('Asia/Calcutta');
	include("webrenew.php");
	$sel_check_entry = "select count(Be_D_C_Id) as count_saree from beam_dcorgmigrate where Beam_D_C_Id='$Beam_D_C_Id'";
	$sel_check_exe = mysql_query($sel_check_entry);
	$sel_check_fetch = mysql_fetch_array($sel_check_exe);
	if($sel_check_fetch[0]==$Total_Beam)
	{}
	else
	{
		$msg_check_beam ='<strong style="color:#F00;">'.'* Please update this migration challan which is required</strong>';
	}}}
	 if(isset ($_REQUEST['submit']))
{
//insert
     if(!isset($_SESSION['User']))
{} 
else
{   
	$Beam_D_C_Date = $_REQUEST['Beam_D_C_Date'];
	$Total_Beam = $_REQUEST['Total_Beam'];
	$Entry_Id = $row_result['Registration_Id'];
   $From_Ad = strtoupper($_REQUEST['From_Ad']);
	$Status = $_REQUEST['Status'];
	$Entry_Id = $row_result['Registration_Id'];
	date_default_timezone_set('Asia/Calcutta');
	$Entry_Date = date('Y-m-d      h:i:s a');
	$sql= "INSERT INTO  `beam_d_c_1migrate` (`Beam_D_C_Id` ,`Beam_D_C_Date` ,`From_Ad`,`Total_Beam`,`Entry_Date`,`Entry_Id`,`Status`)VALUES (NULL , '$Beam_D_C_Date',  '$From_Ad', '$Total_Beam', '$Entry_Date', '$Entry_Id', '$Status')";
$result = mysql_query($sql);
$sel_sub = "select * from beam_d_c_2migrate where beam_d_c_2migrate.Beam_D_C_Id = '$Beam_D_C_Id'";
$sel_exe = mysql_query($sel_sub);
while($sel_fetch = mysql_fetch_array($sel_exe))
{
	$ins_sub = "insert into beam_dcorgmigrate (Be_D_C_Id,Beam_D_C_Id,Chbe_D_C_Id,Beam_No,Taar,Beam_Meter,Weight,Quality_Id,R_Id) values(NULL,'".$sel_fetch[1]."','".$sel_fetch[2]."','".$sel_fetch[3]."','".$sel_fetch[4]."','".$sel_fetch[5]."','".$sel_fetch[6]."','".$sel_fetch[7]."','".$sel_fetch[8]."')";
	mysql_query($ins_sub);
}
$del_sub = "delete from beam_d_c_2migrate where beam_d_c_2migrate.Beam_D_C_Id='$Beam_D_C_Id'";
$del_exe = mysql_query($del_sub);
$sel_sub_or = "select * from beam_dcorgmigrate where beam_dcorgmigrate.Beam_D_C_Id = '$Beam_D_C_Id'";
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
 $insertGoTo = "beam_d_c_migratelist?msg_error=$msg_error";
  echo '<script>window.location="'.$insertGoTo.'";</script>';
}}
	 if(isset($_REQUEST['update']))
{
//update
if(!isset($_SESSION['User']))
{} 
else
{
	$Beam_D_C_Id = $_REQUEST['Beam_D_C_Id'];
    $Beam_D_C_Date = $_REQUEST['Beam_D_C_Date'];
	$Total_Beam = $_REQUEST['Total_Beam'];
	$Entry_Id = $row_result['Registration_Id'];
   $From_Ad = strtoupper($_REQUEST['From_Ad']);
	$Status = $_REQUEST['Status'];
	$Entry_Id = $row_result['Registration_Id'];
	$Entry_Date = $_REQUEST['Entry_Date'];
	 $sql= "UPDATE `beam_d_c_1migrate` SET `Beam_D_C_Date` = '$Beam_D_C_Date', `From_Ad` = '$From_Ad', `Status` = '$Status', `Entry_Date` = '$Entry_Date', `Total_Beam` = '$Total_Beam', `Entry_Id` = '$Entry_Id' WHERE `beam_d_c_1migrate`.`Beam_D_C_Id` = '".$Beam_D_C_Id."' ";
$result = mysql_query($sql);
 $updateGoTo = "beam_d_c_migratelist?msg";
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
                    <h1 class="page-header" align="center">MIGRATION-BEAM CHALLAN</h1>
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
                    <label class="control-label col-lg-6">To :</label>
                    <div class="col-lg-6">
                    <span id="error1" style="color:#F00";></span>
                        <textarea rows="3" cols="20" id="textarea1" name="From_Ad" class="form-control" ><?php echo $From_Ad;?></textarea>
                    </div>
                </div>      
                        </div>
                       <div class="col-lg-4">
                       <div class="form-group">
                        <label class="control-label col-lg-5" >Challan Date :</label>
                        <div class="col-lg-7">
                              <input class="form-control" type="text" name="Beam_D_C_Date" id="Beam_D_C_Date" value="<?php echo $Beam_D_C_Date; ?>" readonly />
                            </div>
                    </div>
                        </div>
                         <div class="col-lg-4">
                         <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Migration-Challan ID :</label>
                    <div class="col-lg-7">
                    <input type="text" id="Beam_D_C_Id" placeholder="" class="form-control" name="Beam_D_C_Id" value="<?php echo $Beam_D_C_Id; ?>" readonly />
                    </div>
                </div>
                        </div>
                    </div>
                     <div class="form-group row">
                        <div class="col-lg-4">
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Beam No :</label>
                    <div class="col-lg-7">
                    <input type="text" id="Beam_No" placeholder="" class="form-control" name="Beam_No"/>
                    <input type="hidden" name="Chbe_D_C_Id" id="Chbe_D_C_Id" />
                    </div>
                </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Taar :</label>
                    <div class="col-lg-7">
                    <input type="text" id="Taar" placeholder="" class="form-control" name="Taar" readonly /><input type="hidden" name="action" id="action" value="<?php echo $action;?>"/>
                    </div>
                </div>
                        </div>
                         <div class="col-lg-4">
                            <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Meter :</label>
                    <div class="col-lg-7">
                    <input type="text" id="Beam_Meter" placeholder="" class="form-control" name="Beam_Meter" readonly />
                    </div>
                </div>
                </div>
                         </div>
                        <div class="form-group row">
                         <div class="col-lg-4">
                            <div class="form-group">
                    <label for="text2" class="control-label col-lg-6">Weight :</label>
                    <div class="col-lg-6">
                    <input type="text" id="Weight" placeholder="" class="form-control" name="Weight" readonly />
                    </div>
                </div>
                        </div>
                      <div class="col-lg-4">
                         </div>
                        <div class="col-lg-4">
                        <input type="hidden" name="Quality_Id" id="Quality_Id" readonly />
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Quality :</label>
                    <div class="col-lg-7">
                    <input type="text" id="Quality_Name" placeholder="" class="form-control" name="Quality_Name" readonly />
                    <input type="hidden" id="R_Id" name="R_Id" value="<?php echo $row_result['Registration_Id']; ?>"  />
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
                        <div style="color:#F00" align="right">No less than 6 beam acceptable in one challan</div>
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Total Beam :</label>
                    <div class="col-lg-7">
                    <input type="text" id="Total_Beam" placeholder="" class="form-control" name="Total_Beam" value="<?php echo $Total_Beam; ?>" readonly/>
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
								  echo $msg_check_beam;
							 }
							?>
                       <a href="beam_d_c_migratelist"><input type="button" value="Back" class="btn btn-inverse btn-lg " name="back"/></a>
                             <?php
							if($action=="update" )
                             {
							?>
                                            <input type="submit" value="Update Challan" class="btn btn-primary btn-lg" name="update" />
                                           
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
       <script src="assets/js/googleapi.js">
</script>
<script>
$(document).ready(function(){
	    sql="?Beam_D_C_Id=<?php echo $Beam_D_C_Id; ?>&action=<?php echo $action;?>";
		$("#table").load("beam_d_cmigrate85table.php"+sql);
});
<?php include("shortcutkeys.php");?>
</script>
<script src="assets/js/beamdcmigratechallan.js"></script>
<script src="assets/js/jointjquerydateandpicker.js"></script>
</body>
</html>
<?php
function getNewChallanID()
{
	include("databaseconnect.php");
	$sql = "select max(Beam_D_C_Id)+1 from beam_d_c_1migrate";
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