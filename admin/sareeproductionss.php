<?php include("logcode.php");  error_reporting(0);
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
	$sql = "SELECT beam_machine.Be_M_Id, beam_machine.Started_Date, beam_dcorg.Beam_Meter,beam_dcorg.Beam_No,machine_details.Machine_No FROM beam_machine, beam_dcorg,machine_details WHERE beam_machine.Be_D_C_Id = beam_dcorg.Be_D_C_Id AND beam_machine.Machine_Id = machine_details.Machine_Id AND Be_M_Id = '".$Be_M_Id."' ";
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
	$Sa_Pro_Id = getNewChallanID();
	$Be_M_Id = $row['Be_M_Id'];
	$Started_Date = $row['Started_Date'];
	date_default_timezone_set('Asia/Calcutta');
	$S_Date  = date('Y-m-d');
	$Beam_Meter = $row['Beam_Meter'];
	 $Beam_No = $row['Beam_No'];
	$Machine_No = $row['Machine_No'];
	 include("webrenew.php");
	}
 if($action=='update')
	{
		$decodeurl = $_REQUEST['Sa_Pro_Id'];
		$durl = urldecode($decodeurl); 
	$turl = str_replace("'"," ",$durl);
	$urls = explode(" ",$turl);
	$Sa_Pro_Id = $urls[1];
		$sql = "SELECT saree_production.Sa_Pro_Id,beam_machine.Be_M_Id,beam_dcorg.Beam_No,machine_details.Machine_No,saree_production.Started_Date,saree_production.Total_Piecess,saree_production.Total_Meter,saree_production.Beam_Meter,saree_production.Shortage,saree_production.Shortageper,saree_production.Entry_Id FROM saree_production, beam_dcorg,beam_machine,machine_details WHERE beam_dcorg.Be_D_C_Id = beam_machine.Be_D_C_Id AND beam_machine.Be_M_Id = saree_production.Be_M_Id AND machine_details.Machine_Id = beam_machine.Machine_Id AND saree_production.Sa_Pro_Id = '".$Sa_Pro_Id."' ";
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
	$Sa_Pro_Id = $row['Sa_Pro_Id'];	
	date_default_timezone_set('Asia/Calcutta');
	$S_Date  = date('Y-m-d');
	$Be_M_Id = $row['Be_M_Id'];		
	$Started_Date = $row['Started_Date'];
	$Total_Piecess = $row['Total_Piecess'];
	$Total_Meter = $row['Total_Meter'];
	$Beam_Meter = $row['Beam_Meter'];
	 $Beam_No = $row['Beam_No'];
	$Machine_No = $row['Machine_No'];	
	$Shortage = $row['Shortage'];
	$Shortageper = $row['Shortageper'];
	$Entry_Id = $row['Entry_Id'];
	 include("webrenew.php");
	$sel_check_entry = "select sum(Saree_Pieces) as sum_pieces,sum(Saree_Lot_Meter) as sum_meter from saree_detailsorg where Sa_Pro_Id='$Sa_Pro_Id'";
	$sel_check_exe = mysql_query($sel_check_entry);
	$sel_check_fetch = mysql_fetch_array($sel_check_exe);
	if($sel_check_fetch[0]==$Total_Piecess && $sel_check_fetch[1]==$Total_Meter)
	{
	}
	else
	{
		$msg_check_sareeprod ='<strong style="color:#F00;">'.'* Please verify all entry and then update this saree-production which is required</strong>';
	}
	}
}
	 if(isset($_REQUEST['submit']))
{
//insert
	$Be_M_Id = $_REQUEST['Be_M_Id'];
	$Started_Date = $_REQUEST['Started_Date'];
	$Total_Piecess = $_REQUEST['Total_Piecess'];
	$Total_Meter = $_REQUEST['Total_Meter'];
	$Beam_Meter = $_REQUEST['Beam_Meter'];
	$Shortage = $_REQUEST['Shortage'];
	$Shortageper = $_REQUEST['Shortageper'];
	$Entry_Id = $row_result['Registration_Id'];
	  $query = mysql_query("select * from saree_production where Be_M_Id='".$Be_M_Id."' ") or die(mysql_error());
$duplicate = mysql_num_rows($query);
   if($duplicate==0)
    {
	$sql= "INSERT INTO  `saree_production` (`Sa_Pro_Id` ,`Be_M_Id` ,`Started_Date` ,`Total_Piecess` ,`Total_Meter` ,
`Beam_Meter` ,`Shortage` ,`Shortageper` ,`Entry_Id`)VALUES (NULL , '$Be_M_Id' ,  '$Started_Date',  '$Total_Piecess',  '$Total_Meter',  '$Beam_Meter',  '$Shortage',  '$Shortageper', '$Entry_Id')";
$result = mysql_query($sql);
$sel_sub = "select * from saree_details where saree_details.Sa_Pro_Id = '".$Sa_Pro_Id."'";
$sel_exe = mysql_query($sel_sub);
while($sel_fetch = mysql_fetch_array($sel_exe))
{
	$ins_sub = "insert into saree_detailsorg (Saree_Lot_Id,Sa_Pro_Id,Date,Saree_Lot_Meter,Saree_Pieces,Saree_Weight,Design_Id,Status,Description,R_Id) values(NULL,'".$sel_fetch[1]."','".$sel_fetch[2]."','".$sel_fetch[3]."','".$sel_fetch[4]."','".$sel_fetch[5]."','".$sel_fetch[6]."','".$sel_fetch[7]."','".$sel_fetch[8]."','".$sel_fetch[9]."')";
	mysql_query($ins_sub);
}
$del_sub = "delete from saree_details where saree_details.Sa_Pro_Id='$Sa_Pro_Id'";
$del_exe = mysql_query($del_sub);
$sel_sub_or = "select * from saree_detailsorg where saree_detailsorg.Sa_Pro_Id = '".$Sa_Pro_Id."'";
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
 $insertGoTo = "saree_pro_listpage?msg_error=$msg_error";
  echo '<script>window.location="'.$insertGoTo.'";</script>';
       }
	else
	{
		echo '<script>alert("This Beam-machine ID : '.$Be_M_Id.' allready exists in saree production.");</script>';
	}
		}
 if(isset ($_REQUEST['update']))
      {
//update
     $Sa_Pro_Id = $_REQUEST['Sa_Pro_Id'];
	$Be_M_Id = $_REQUEST['Be_M_Id'];
	$Started_Date = $_REQUEST['Started_Date'];
	$Total_Piecess = $_REQUEST['Total_Piecess'];
	$Total_Meter = $_REQUEST['Total_Meter'];
	$Beam_Meter = $_REQUEST['Beam_Meter'];
	$Shortage = $_REQUEST['Shortage'];
	$Shortageper = $_REQUEST['Shortageper'];
	$Entry_Id = $row_result['Registration_Id'];
$sql= "UPDATE `saree_production` SET  `Be_M_Id` =  '$Be_M_Id',`Started_Date` =  '$Started_Date',`Total_Piecess` =  '$Total_Piecess',`Total_Meter` =  '$Total_Meter',`Beam_Meter` =  '$Beam_Meter',
`Shortage` =  '$Shortage', `Shortageper` =  '$Shortageper',`Entry_Id` =  '$Entry_Id' WHERE  `saree_production`.`Sa_Pro_Id` = '$Sa_Pro_Id' ";
$result = mysql_query($sql);
 $updateGoTo = "saree_pro_listpage?msg";
  echo '<script>window.location="'.$updateGoTo.'";</script>';
	}
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
                    <h1 class="page-header" align="center">SAREE PRODUCTION</h1>
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
                    <label for="text2" class="control-label col-lg-6">Saree-Production ID :</label>
                    <div class="col-lg-6">
                    <input type="text" id="Sa_Pro_Id" placeholder="" class="form-control" name="Sa_Pro_Id" value="<?php echo $Sa_Pro_Id; ?>" readonly />
                    </div>
                </div>
                        </div>
                        <div class="col-lg-4">
                        <div class="form-group">
                        <label class="control-label col-lg-4"> Fitted Date :</label>
                        <div class="col-lg-6">
                            <input class="form-control" type="text"   name="Started_Date" id="Started_Date" value="<?php echo $Started_Date; ?>" readonly/>
                            </div>
                        </div>
                        </div>
                        </div>
                        <div class="form-group row">
                        <div class="col-lg-3">
                        <div class="form-group">
                        <label class="control-label col-lg-5">Meter :</label>
                        <div class="col-lg-7" >
                                <input class="form-control" type="text" name="Saree_lot_Meter" id="Saree_Lot_Meter" onkeypress="return isDecimalNumberKey(event)"  />
                        </div>
                    </div>    
                        </div>
                        <div class="col-lg-3">
                        <div class="form-group">
                        <label class="control-label col-lg-4" >Date :</label>
                        <div class="col-lg-8">
                              <input class="form-control" type="text" id="Date"  value="<?php echo $S_Date; ?>" name="Date" readonly/>
                        </div>
                    </div>
                       </div>
                        <div class="col-lg-3">
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Weight :</label>
                    <div class="col-lg-7">
                    <input type="text" id="Saree_Weight" placeholder="" class="form-control" name="Saree_Weight" onkeypress="return isDecimalNumberKey(event)" />
                    </div>
                </div>
                     </div>
                        <div class="col-lg-3">
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Piecess :</label>
                    <div class="col-lg-7">
                    <input type="text" id="Saree_Pieces" placeholder="Total Piecess" class="form-control" name="Saree_Pieces" onkeypress="return isNumberKey(event)" />
                     <input type="hidden" id="R_Id" name="R_Id" value="<?php echo $row_result['Registration_Id']; ?>"  />
                    </div>
                </div>
                        </div>
                        </div>
                         <div class="form-group row">
                        <div class="col-lg-3">
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Design :</label>
                    <div class="col-lg-7">
                    <input type="text" id="Design" placeholder="" class="form-control" name="Design"/>
                    <input type="hidden" id="design_id" name="design_id"  />
                    </div>
                </div>
                        </div>
                        <div class="col-lg-3">
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Quality :</label>
                    <div class="col-lg-7">
                    <input type="text" id="Quality_Name" placeholder="" class="form-control" name="Quality_Name"  readonly/>
                    <input type="hidden" id="quality" name="quality"  />
                    <input type="hidden" name="action" id="action" value="<?php echo $action;?>"/>
                    </div>
                </div>
</div>
                        <div class="col-lg-3">
                        <div class="form-group">
    <label class="control-label col-lg-4">Status :</label>
    <div class="col-lg-8">
      <select name="Status" class="form-control" id="Status">
        <option value="Fresh">Fresh</option>
        <option value="Damage">Damage</option>
      </select>
     </div>
</div>
                        </div>
                        <div class="col-lg-3">
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
                    <label for="text2" class="control-label col-lg-5">Total Piecess :</label>
                    <div class="col-lg-7">
                    <input type="text" id="Total_Piecess" placeholder="" class="form-control" name="Total_Piecess" value="<?php echo $Total_Piecess; ?>" readonly/>
                    </div>
                </div>
                        </div>
                        <div class="col-lg-4">
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Total Meter :</label>
                    <div class="col-lg-7">
                    <input type="text" id="Total_Meter" placeholder="" class="form-control" name="Total_Meter"  value="<?php echo $Total_Meter; ?>"  readonly/>
                    </div>
                </div>
                        </div>
                        <div class="col-lg-4">
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Beam Meter :</label>
                    <div class="col-lg-7">
                    <input type="text" id="Beam_Meter" placeholder="" class="form-control" name="Beam_Meter" value="<?php echo $Beam_Meter; ?>" readonly />
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
                    <input type="text" id="Shortage" placeholder="" class="form-control" name="Shortage"  value="<?php echo $Shortage; ?>"  readonly/>
                    </div>
                </div>
                        </div>
                        <div class="col-lg-4">
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Shortage(%) :</label>
                    <div class="col-lg-7">
                    <input type="text" id="Shortageper" placeholder="" class="form-control" name="Shortageper"  value="<?php echo $Shortageper; ?>"  readonly/>
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
								  echo $msg_check_sareeprod;
								 }
							if($action=="update" )
                             {
							?>
                                            <a href="saree_pro_listpage"><input type="button" value=" Back" class="btn btn-inverse btn-lg " name="back"/></a> <input type="submit" value=" Update" class="btn btn-primary btn-lg " name="update" />
                        <?php }
						elseif($action=='insert') 
						{
						?>
                                  <a href="beammachlistpage"><input type="button" value=" Back" class="btn btn-inverse btn-lg " name="back1"/></a> 
                                  <?php
								   if($days_remaining<=0)
{}
elseif($days_remaining>0)
{
	?>
                                  <input type="submit" value="Submit" class="btn btn-primary btn-lg " name="submit" />
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
<script src="assets/js/sareeproduction.js"></script>
<script src="assets/js/jointjquerydateandpicker.js"></script>
<script>
$(document).ready(function(){
		sql="?Sa_Pro_Id=<?php echo $Sa_Pro_Id; ?>&action=<?php echo $action;?>";
		$("#table").load("saree_table_for_production.php"+sql);
});
<?php include("shortcutkeys.php");?>
	</SCRIPT>
</body>
</html>
<?php
function getNewChallanID()
{
	include("databaseconnect.php");
	$sql="select max(Sa_Pro_Id)+1 from saree_production";
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
 ob_flush(); ?>