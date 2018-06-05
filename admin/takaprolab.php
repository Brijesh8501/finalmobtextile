<?php include("logcode.php"); require_once('../Connections/brijesh8510.php'); error_reporting(0);
	include("databaseconnect.php");
if(isset($_REQUEST['action']))
{
	$action = $_REQUEST['action'];
	if($action == "insert")
	{	
	$decodeurl = $_REQUEST['Ta_Pro_Id'];
	$durl = urldecode($decodeurl); 
	$turl = str_replace("'"," ",$durl);
	$urls = explode(" ",$turl);
	$Ta_Pro_Id = $urls[1];
	$sql = "select taka_production.Ta_Pro_Id,machine_details.Machine_No,beam_dcorg.Beam_No from taka_production,beam_machine,machine_details,beam_dcorg where beam_machine.Be_M_Id = taka_production.Be_M_Id AND machine_details.Machine_Id = beam_machine.Machine_Id AND beam_machine.Be_D_C_Id = beam_dcorg.Be_D_C_Id AND taka_production.Ta_Pro_Id = '".$Ta_Pro_Id."' ";
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
	date_default_timezone_set('Asia/Calcutta');
	$T_Date  = date('Y-m-d');
	$Ta_Labour_Id = getNewChallanID();
	$Ta_Pro_Id = $row['Ta_Pro_Id'];
	$Machine_No = $row['Machine_No'];
	$Beam_No = $row['Beam_No'];
	 include("webrenew.php");
	}
 if($action=='update')
	{
		$decodeurl = $_REQUEST['Ta_Labour_Id'];
		$durl = urldecode($decodeurl); 
	$turl = str_replace("'"," ",$durl);
	$urls = explode(" ",$turl);
	$Ta_Labour_Id = $urls[1];
		$sql = "select taka_labsal.Ta_Labour_Id,taka_labsal.Total_L_Amount,taka_production.Total_Meter,taka_labsal.Ta_Pro_Id,machine_details.Machine_No,beam_dcorg.Beam_No,taka_labsal.Total_MeterLab,taka_labsal.Entry_Date,taka_labsal.Entry_Id from taka_production,beam_dcorg,taka_labsal,beam_machine,machine_details where taka_production.Ta_Pro_Id = taka_labsal.Ta_Pro_Id AND beam_machine.Be_M_Id = taka_production.Be_M_Id AND machine_details.Machine_Id = beam_machine.Machine_Id AND beam_machine.Be_D_C_Id = beam_dcorg.Be_D_C_Id AND Ta_Labour_Id = '".$Ta_Labour_Id."' ";
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
	$Ta_Labour_Id = $row['Ta_Labour_Id'];	
	$Ta_Pro_Id = $row['Ta_Pro_Id'];		
	$Machine_No = $row['Machine_No'];
	$Total_MeterLab = $row['Total_MeterLab'];
	$Entry_Id = $row['Entry_Id'];
	$Entry_Date = $row['Entry_Date'];
	$Taka_T_Meter = $row['Total_Meter'];
	date_default_timezone_set('Asia/Calcutta');
	$T_Date  = date('Y-m-d');
	$Beam_No = $row['Beam_No'];
	$Total_L_Amount = $row['Total_L_Amount'];
	 include("webrenew.php");
	$sel_check_entry = "select sum(Taka_Meter) as sum_meter,sum(L_Amount) as sum_amount from taka_labsalsuborg where Ta_Labour_Id='$Ta_Labour_Id'";
	$sel_check_exe = mysql_query($sel_check_entry);
	$sel_check_fetch = mysql_fetch_array($sel_check_exe);
	if($sel_check_fetch[0]==$Total_MeterLab && $sel_check_fetch[1]==$Total_L_Amount)
	{
	}
	else
	{
		$msg_check_takaprodlab ='<strong style="color:#F00;">'.'* Please verify all entry and then update this taka-labour which is required</strong>';
	}
	}
}
	 if(isset ($_REQUEST['submit']))
{
	if(!isset($_SESSION['User']))
{ } 
else
{
//insert
	$Ta_Pro_Id = $_REQUEST['Ta_Pro_Id'];
	date_default_timezone_set('Asia/Calcutta');
	$Entry_Date = date('Y-m-d      h:i:s a');
	$Total_MeterLab = $_REQUEST['Total_MeterLab'];
	$Total_L_Amount = $_REQUEST['Total_L_Amount'];
	$Entry_Id = $row_result['Registration_Id'];
	$query = mysql_query("select * from taka_labsal where Ta_Pro_Id='".$Ta_Pro_Id."' ") or die(mysql_error());
$duplicate = mysql_num_rows($query);
   if($duplicate==0)
    {
	$sql= "INSERT INTO  `taka_labsal` (`Ta_Labour_Id` ,`Ta_Pro_Id` ,`Total_MeterLab` ,`Total_L_Amount`,`Entry_Date` ,
`Entry_Id`)VALUES (NULL , '$Ta_Pro_Id' , '$Total_MeterLab','$Total_L_Amount', '$Entry_Date', '$Entry_Id')";
$result = mysql_query($sql);
$sel_sub = "select * from taka_labsalsub1 where taka_labsalsub1.Ta_Labour_Id = '$Ta_Labour_Id'";
$sel_exe = mysql_query($sel_sub);
while($sel_fetch = mysql_fetch_array($sel_exe))
{
	$ins_sub = "insert into taka_labsalsuborg (Taka_Labour_Id,Ta_Labour_Id,T_Date,Taka_Meter,L_Rate,L_Amount,Quality_Id,Labour_Id,Description,R_Id) values(NULL,'".$sel_fetch[1]."','".$sel_fetch[2]."','".$sel_fetch[3]."','".$sel_fetch[4]."','".$sel_fetch[5]."','".$sel_fetch[6]."','".$sel_fetch[7]."','".$sel_fetch[8]."','".$sel_fetch[9]."')";
	mysql_query($ins_sub);
}
$del_sub = "delete from taka_labsalsub1 where taka_labsalsub1.Ta_Labour_Id='$Ta_Labour_Id'";
$del_exe = mysql_query($del_sub);
$sel_sub_or = "select * from taka_labsalsuborg where taka_labsalsuborg.Ta_Labour_Id = '$Ta_Labour_Id'";
$sel_exe_or = mysql_query($sel_sub_or);
$total_sel_row = mysql_num_rows($sel_exe_or);
if($total_sel_row==0)
{
	$msg_error="Something gone wrong so your sub entry is not inserted in your last inserted entry, now please update that entry first";
}
else
{
	$msg_error="Record inserted";
}
 $insertGoTo = "takaprolabsalist?msg_error=$msg_error";
  echo '<script>window.location="'.$insertGoTo.'";</script>';
	}
	else
	{
		echo '<script>alert("This Taka-Production ID : '.$Ta_Pro_Id.' allready exists in taka-labour.");</script>';
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
	$Ta_Labour_Id = $_REQUEST['Ta_Labour_Id'];
	$Entry_Date = $_REQUEST['Entry_Date'];
	$Total_MeterLab = $_REQUEST['Total_MeterLab'];
	$Total_L_Amount = $_REQUEST['Total_L_Amount'];
	$Entry_Id = $row_result['Registration_Id'];
$sql= "UPDATE `taka_labsal` SET `Ta_Pro_Id` = '$Ta_Pro_Id', `Entry_Date` = '$Entry_Date',`Total_MeterLab` = '$Total_MeterLab',`Total_L_Amount` = '$Total_L_Amount', `Entry_Id` = '$Entry_Id' WHERE `taka_labsal`.`Ta_Labour_Id` = '".$Ta_Labour_Id."' ";
$result = mysql_query($sql);
 $updateGoTo = "takaprolabsalist?msg";
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
<?php include("sidemenu.php"); ?>
                <div class="inner">
                    <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" align="center">TAKA-LABOUR</h1>
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
                    <label for="text2" class="control-label col-lg-6">Taka-Labour ID :</label>
                    <div class="col-lg-6">
                    <input type="text" id="Ta_Labour_Id" placeholder="" class="form-control" name="Ta_Labour_Id" value="<?php echo $Ta_Labour_Id; ?>" readonly />
                    </div>
                </div>
                        </div>
                        <div class="col-lg-4">
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-6">Machine No :</label>
                    <div class="col-lg-6">
                    <input type="text" id="Machine_No" placeholder="" class="form-control" name="Machine_No" value="<?php echo $Machine_No; ?>" readonly />
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
                        </div>
                        <div class="form-group row">
                        <div class="col-lg-4">
                        <div class="form-group">
                        <label class="control-label col-lg-6">Meter :</label>
                        <div class="col-lg-6" >
                                <input class="form-control" type="text" name="Taka_Meter" id="Taka_Meter" onkeypress="return isDecimalNumberKey(event)"  />
                          <input type="hidden" name="action" id="action" value="<?php echo $action;?>"/>     
                          <input type="hidden" name="R_Id" id="R_Id" value="<?php echo $row_result['Registration_Id']; ?>"/> 
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
<label class="control-label col-lg-6">Labour :</label>
<div class="col-lg-6">
  <select name="Labour_Id" class="form-control" id="Labour_Id">
    <option value="">--Select--</option>
    <?php
	$sel_lab = "select labour_Id,Name from labour_details,work_type where work_type.W_Type_Id = labour_details.W_Type_Id AND Status = 'Meter-Join' AND W_Type_Name = 'Plane Machine'";
	$sel_lab_exe = mysql_query($sel_lab);
	while($sel_lab_fetch = mysql_fetch_array($sel_lab_exe)){  
?>
    <option value="<?php echo $sel_lab_fetch[0];?>"><?php echo $sel_lab_fetch[1];?></option>
    <?php
} 
?>
  </select>
  </div>
  </div>
                        </div>
                        </div>
                        <div class="form-group row">
                        <div class="col-lg-4">
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-6">Quality :</label>
                    <div class="col-lg-6">
                    <input type="text" id="Quality_Name" placeholder="" class="form-control" name="Quality_Name" value="<?php echo $Quality_Name; ?>"/>
                    <input type="hidden" id="Quality_Id" name="Quality_Id" value="<?php echo $Quality_Id; ?>" readonly />
                    </div>
                </div>
</div>
                       <div class="col-lg-2">
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-6">Rate :</label>
                    <div class="col-lg-6">
                    <input type="text" id="L_Rate" placeholder="" class="form-control" name="L_Rate" value="<?php echo $L_Rate; ?>" readonly />
                    </div>
                </div>
</div>
 <div class="col-lg-3">
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-6">Amount :</label>
                    <div class="col-lg-6">
                    <input type="text" id="L_Amount" placeholder="" class="form-control" name="L_Amount" value="<?php echo $L_Amount; ?>" readonly />
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
                    <label for="text2" class="control-label col-lg-5">Total Meter :</label>
                    <div class="col-lg-7">
                    <input type="text" id="Total_MeterLab" placeholder="" class="form-control" name="Total_MeterLab"  value="<?php echo $Total_MeterLab; ?>"  readonly />
                    </div>
                </div>
                        </div>
                        <div class="col-lg-4">
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Beam No :</label>
                    <div class="col-lg-7">
                    <input type="text" id="Beam_No" placeholder="" class="form-control" name="Beam_No" value="<?php echo $Beam_No;?>" readonly />
                    </div>
                </div>
                        </div>
                        <div class="col-lg-4">
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Meter (+) :</label>
                    <div class="col-lg-7">
                    <input type="text" id="Check" placeholder="" class="form-control" name="Check" readonly />
                    </div>
                </div>
                        </div>
                         <div class="col-lg-4">
                         <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Total Amount :</label>
                    <div class="col-lg-7">
                    <input type="text" id="Total_L_Amount" placeholder="" class="form-control" name="Total_L_Amount" value="<?php echo $Total_L_Amount;?>" readonly />
                    </div>
                </div>
                        </div>
                        <div class="col-lg-4">
                        </div>
                         <div class="col-lg-4" id="load">
                        </div>
                         <?php if($action=='update')
						{
							?>
                             <div class="col-lg-4">
                             <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Entry Date :</label>
                    <div class="col-lg-7">
                    <input type="text" id="Entry_Date" placeholder="" class="form-control" name="Entry_Date"  value="<?php echo $Entry_Date; ?>" readonly />
                    </div>
                </div>
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
} if($action=='update')
                             {
								  echo $msg_check_takaprodlab;
								 }  ?>
                           <?php
							if($action=="update" )
                             {
							?>
                                            <a href="takaprolabourlist"><input type="button" value=" Back" class="btn btn-inverse btn-lg " name="back"/></a> <input type="submit" value=" Update" class="btn btn-primary btn-lg " name="update" />
                        <?php }
						else if($action=="insert" )
						{
						?>
                                  <a href="takaproductionlist"><input type="button" value=" Back" class="btn btn-inverse btn-lg " name="back1"/></a>
                                  <?php
								   if($days_remaining<=0)
{}
elseif($days_remaining>0)
{
	?> <input type="submit" value="Submit" class="btn btn-primary btn-lg " name="submit" />
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
		$('#Quality_Name').autocomplete({
	source: function( request, response ) {
		$.ajax({
			url : 'qualitylabour_autocompleteajax.php?type=country_table&Ta_Pro_Id=<?php echo $Ta_Pro_Id;?>',
			dataType: "json",
			method: 'post',
			data: {
			   name_startsWith: request.term,
			   type: 'country_table',
			   row_num : 1
			},
			 success: function( data ) {
				 response( $.map( data, function( item ) {
				 	var code = item.split("|");
					return {
						label: code[0],
						value: code[0],
						data : item
					}
				}));
			}
		});
	},
	autoFocus: true,	      	
	minLength: 0,
	select: function( event, ui ) {
		var names = ui.item.data.split("|");						
		$('#Quality_Id').val(names[1]);
		$('#L_Rate').val(names[2]);
		
	}		      	
});	

		sql="?Ta_Labour_Id=<?php echo $Ta_Labour_Id; ?>&action=<?php echo $action;?>";
		$("#table").load("takaprosallabtable.php"+sql);
});
 function autoRefresh_div()
 {
      $("#load").load("takaprolabmetercheck.php?TTa_Pro_Id=<?php echo $Ta_Pro_Id;?>");  }
  setInterval('autoRefresh_div()', 1000); // refresh div after 5 secs
history.pushState(null, null);
    window.addEventListener('popstate', function(event)  {
    history.pushState(null, null);
    });
	<?php include("shortcutkeys.php");?>
   </SCRIPT>
 <script src="assets/js/takaprolab.js"></script>
<script src="assets/js/jointjquerydateandpicker.js"></script>
</body>
</html>
<?php
function getNewChallanID()
{
	include("databaseconnect.php");
	$sql="select max(Ta_Labour_Id)+1 from taka_labsal";
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