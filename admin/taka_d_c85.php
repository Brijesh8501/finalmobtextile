<?php 
include("logcode.php"); error_reporting(0);
  include("databaseconnect.php");
if(isset($_REQUEST['action']))
{
	$action = $_REQUEST['action'];
    if($action == "insert")
	{
	$decodeurl = $_REQUEST['T_Order_Id'];
	$durl = urldecode($decodeurl); 
	$turl = str_replace("'"," ",$durl);
	$urls = explode(" ",$turl);
	$T_Order_Id = $urls[1];
	$sql = "SELECT taka_order_master.T_Order_Id, taka_order_master.Om_Date, customer_details.Cu_En_Name,customer_details.Customer_Id, broker_details1.B_Name, broker_details1.Broker_Id FROM taka_order_master, customer_details, broker_details1 WHERE customer_details.Customer_Id = taka_order_master.Customer_Id AND broker_details1.Broker_Id = taka_order_master.Broker_Id AND taka_order_master.T_Order_Id = '".$T_Order_Id."' ";
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
	$T_Order_Id = $row['T_Order_Id'];
	date_default_timezone_set('Asia/Calcutta');
	$Taka_D_C_Date = date('Y-m-d');
	$Cu_En_Name = $row['Cu_En_Name'];
    $Customer_Id = $row['Customer_Id'];
	$B_Name = $row['B_Name'];
	$Broker_Id = $row['Broker_Id'];
	$Taka_D_C_Id = getNewChallanID();
	 include("webrenew.php");
}
 if($action == 'update')
	{
		$decodeurl = $_REQUEST['Taka_D_C_Id'];
	$durl = urldecode($decodeurl); 
	$turl = str_replace("'"," ",$durl);
	$urls = explode(" ",$turl);
	$Taka_D_C_Id = $urls[1];
	$sql = "SELECT taka_d_c_1.Taka_D_C_Id, taka_d_c_1.Taka_D_C_Date, customer_details.Cu_En_Name,customer_details.Customer_Id, broker_details1.B_Name, broker_details1.Broker_Id,taka_d_c_1.T_Order_Id, taka_d_c_1.Total_Taka, taka_d_c_1.Entry_Id FROM taka_d_c_1, customer_details, broker_details1 WHERE customer_details.Customer_Id = taka_d_c_1.Customer_Id AND broker_details1.Broker_Id = taka_d_c_1.Broker_Id AND taka_d_c_1.Taka_D_C_Id = '".$Taka_D_C_Id."' ";
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
	$Taka_D_C_Id = $row['Taka_D_C_Id'];
	$Taka_D_C_Date = $row['Taka_D_C_Date'];
	$Cu_En_Name = $row['Cu_En_Name'];
    $Customer_Id = $row['Customer_Id'];
	$B_Name = $row['B_Name'];
	$Broker_Id = $row['Broker_Id'];
	$T_Order_Id = $row['T_Order_Id'];
	$Total_Taka = $row['Total_Taka'];
	$Entry_Id = $row['Entry_Id'];
	date_default_timezone_set('Asia/Calcutta');
	 include("webrenew.php");
	$sel_check_entry = "select count(Ta_D_C_Id) as count_taka from taka_dcorg where Taka_D_C_Id='$Taka_D_C_Id'";
	$sel_check_exe = mysql_query($sel_check_entry);
	$sel_check_fetch = mysql_fetch_array($sel_check_exe);
	if($sel_check_fetch[0]==$Total_Taka)
	{
	}
	else
	{
		$msg_check_taka ='<strong style="color:#F00;">'.'Please update this challan which is required</strong>';
	}
}
}
	 if(isset($_REQUEST['submit']))
{
//insert
   if(!isset($_SESSION['User']))
{ } 
else
{  
	$Taka_D_C_Date = $_REQUEST['Taka_D_C_Date'];
	$Customer_Id = $_REQUEST['Customer_Id'];
	$Broker_Id = $_REQUEST['Broker_Id'];
	$T_Order_Id = $_REQUEST['T_Order_Id'];
	$Total_Taka = $_REQUEST['Total_Taka'];
	$Entry_Id = $row_result['Registration_Id'];
	$sql= "INSERT INTO  `taka_d_c_1` (`Taka_D_C_Id` ,`Taka_D_C_Date` ,`Customer_Id` ,`Broker_Id`,`T_Order_Id`,`Total_Taka`,`Entry_Id`)VALUES (NULL , '$Taka_D_C_Date' ,  '$Customer_Id',  '$Broker_Id',  '$T_Order_Id', '$Total_Taka', '$Entry_Id')";
$result = mysql_query($sql);
$sel_sub = "select * from taka_d_c_2 where taka_d_c_2.Taka_D_C_Id = '$Taka_D_C_Id'";
$sel_exe = mysql_query($sel_sub);
while($sel_fetch = mysql_fetch_array($sel_exe))
{
	$ins_sub = "insert into taka_dcorg (Ta_D_C_Id,Taka_D_C_Id,Taka_Id,Taka_Meter,Taka_Weight,Quality_Id,Status,R_Id) values(NULL,'".$sel_fetch[1]."','".$sel_fetch[2]."','".$sel_fetch[3]."','".$sel_fetch[4]."','".$sel_fetch[5]."','".$sel_fetch[6]."','".$sel_fetch[7]."')";
	mysql_query($ins_sub);
}
$del_sub = "delete from taka_d_c_2 where taka_d_c_2.Taka_D_C_Id='$Taka_D_C_Id'";
$del_exe = mysql_query($del_sub);
$sel_sub_or = "select * from taka_dcorg where taka_dcorg.Taka_D_C_Id = '$Taka_D_C_Id'";
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

 $insertGoTo = "taka_d_c_list?msg_error=$msg_error";
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
    $Taka_D_C_Id = $_REQUEST['Taka_D_C_Id']; 
	$Taka_D_C_Date = $_REQUEST['Taka_D_C_Date'];
	$Customer_Id = $_REQUEST['Customer_Id'];
	$Broker_Id = $_REQUEST['Broker_Id'];
	$T_Order_Id = $_REQUEST['T_Order_Id'];
	$Total_Taka = $_REQUEST['Total_Taka'];
	$Entry_Id = $row_result['Registration_Id'];
	$sql= "UPDATE `taka_d_c_1` SET `Taka_D_C_Date` = '$Taka_D_C_Date', `Customer_Id` = '$Customer_Id', `Broker_Id` = '$Broker_Id', `T_Order_Id` = '$T_Order_Id', `Total_Taka` = '$Total_Taka', `Entry_Id` = '$Entry_Id' WHERE `taka_d_c_1`.`Taka_D_C_Id` = '".$Taka_D_C_Id."' ";
$result = mysql_query($sql);
 $updateGoTo = "taka_d_c_list?msg";
  echo '<script>window.location="'.$updateGoTo.'";</script>';
}
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
       <?php include("sidemenu.php") ?>
                <div class="inner">
                    <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" align="center">TAKA CHALLAN</h1>
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
                    <label for="text2" class="control-label col-lg-5">Customer :</label>
                    <div class="col-lg-7">
                    <input type="text" id="Cu_En_Name" placeholder="" name="Cu_En_Name" value="<?php echo $Cu_En_Name; ?>" class="form-control" readonly />
                    <input type="hidden" name="Customer_Id" value="<?php echo $Customer_Id ?>" />
                    </div>
                </div>
                        </div>
                       <div class="col-lg-4">
                       <div class="form-group">
                        <label class="control-label col-lg-5" >Challan Date :</label>
                        <div class="col-lg-7">
                              <input class="form-control" type="text" name="Taka_D_C_Date" id="Taka_D_C_Date" value="<?php echo $Taka_D_C_Date; ?>" readonly />
                            </div>
                    </div>
                        </div>
                         <div class="col-lg-4">
                         <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Challan ID :</label>
                    <div class="col-lg-7">
                    <input type="text" id="Taka_D_C_Id" placeholder="" class="form-control" name="Taka_D_C_Id" value="<?php echo $Taka_D_C_Id; ?>" readonly />
                    </div>
                </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-4">
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Broker :</label>
                    <div class="col-lg-7">
                    <input type="text" id="B_Name" placeholder="" name="B_Name" class="form-control" value="<?php echo $B_Name; ?>" readonly />
                    <input type="hidden" name="Broker_Id" value="<?php echo $Broker_Id ?>" />
                    </div>
                </div>
                        </div>
                        <div class="col-lg-4">
                        </div>
                        <div class="col-lg-4">
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Order ID :</label>
                    <div class="col-lg-7">
                    <input type="text" id="T_Order_Id" placeholder="" class="form-control" name="T_Order_Id" value="<?php echo $T_Order_Id; ?>" readonly />
                    </div>
                </div>
                        </div>
                    </div>
                     <div class="form-group row">
                        <div class="col-lg-4">
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Taka ID :</label>
                    <div class="col-lg-7">
                    <input type="text" id="countryname_1" placeholder="" class="form-control" name="countryname_1" />
                    <input type="hidden" name="action" id="action" value="<?php echo $action;?>"/>
                    <span id="check"></span>
                    </div>
                </div>
                        </div>
                        <div id="show"></div>
                        <div class="col-lg-4">
                            <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Taka Meter :</label>
                    <div class="col-lg-7">
                    <input type="text" id="country_no_1" placeholder="" class="form-control" name="country_no_1" readonly />
                     <input type="hidden" id="R_Id" name="R_Id" value="<?php echo $row_result['Registration_Id']; ?>"  />
                    </div>
                </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Taka Weight :</label>
                    <div class="col-lg-7">
                    <input type="text" id="phone_code_1" placeholder="" class="form-control" name="phone_code_1" readonly />
                    </div>
                </div>
                        </div>
                        </div>
                        <div class="form-group row">
                        <div class="col-lg-4">
                        <input type="hidden" name="country_1" id="country_1" readonly />
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Quality :</label>
                    <div class="col-lg-7">
                    <input type="text" id="phone_1" placeholder="" class="form-control" name="phone_1" readonly />
                    </div>
                </div>
                        </div>
                        <div class="col-lg-4">
                        </div>
                        <div class="col-lg-4">
                        <div class="form-group">
<label class="control-label col-lg-5">Status :</label>
<div class="col-lg-7">
  <select name="Status" class="form-control" id="Status">
    <option value="Sale">Sale</option>
    <option value="Return">Return</option>
  </select>
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
                        <div style="color:#F00" align="right">Only 34 taka acceptable in one challan</div>
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Total Taka :</label>
                    <div class="col-lg-7">
                    <input type="text" id="Total_Taka" placeholder="" class="form-control" name="Total_Taka" value="<?php echo $Total_Taka; ?>" readonly/>
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
								  echo $msg_check_taka;
							 }
							?>
                             <?php
							if($action=="update" )
                             {
							?>
                                            <a href="taka_d_c_list"><input type="button" value="Back" class="btn btn-inverse btn-lg " name="back"/></a> <input type="submit" value=" Update Challan" class="btn btn-primary btn-lg" name="update" />
                        <?php }
						else if($action=="insert")
						{
						?>
                                  <a href="taka_order_listpage"><input type="button" value="Back" class="btn btn-inverse btn-lg " name="back1"/></a> 
                                   <?php
								   if($days_remaining<=0)
{}
elseif($days_remaining>0)
{
	?>
                                  <input type="submit" value="Submit Challan" class="btn btn-primary btn-lg" name="submit" />
                        <?php }} ?>
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
		sql="?Taka_D_C_Id=<?php echo $Taka_D_C_Id; ?>&action=<?php echo $action;?>";
		$("#table").load("taka_d_c85table.php"+sql);
	});
	<?php include("shortcutkeys.php");?>
</SCRIPT>
<script src="assets/js/takachallan.js"></script>
<script src="assets/js/jointjquerydateandpicker.js"></script>
</body>
</html>
<?php
function getNewChallanID()
{
	include("databaseconnect.php");
	$sql = "select max(Taka_D_C_Id)+1 from taka_d_c_1";
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