<?php include("logcode.php"); require_once('../Connections/brijesh8510.php'); error_reporting(0);
include("databaseconnect.php");
if(isset($_REQUEST['action']))
{
	$action = $_REQUEST['action'];
	if($action=='insert')
	{
		$Other_Used_Id = getNewOtUsedID();
		date_default_timezone_set('Asia/Calcutta');
	$Other_Used_Date = date('Y-m-d');
	include("webrenew.php");
	}
}
if(isset($_REQUEST['submit']))
{
		$Other_Used_Date = $_REQUEST['Other_Used_Date'];
		$Mach_Part_Id = $_REQUEST['Mach_Part_Id'];
		$Quantity_Used = $_REQUEST['Quantity_Used'];
		$Labour_Id = $_REQUEST['Labour_Id'];
		$Entry_Date = date('Y-m-d      h:i:s a');
	$Entry_Id = $row_result['Registration_Id'];
		$sel_check85 = "select machine_parts.Mach_Part_Id,machine_parts.Mach_Pname,Quantity_Used,Quantity_Re from other_used1,machine_parts where machine_parts.Mach_Part_Id = other_used1.Mach_Part_Id AND machine_parts.Mach_Part_Id = '$Mach_Part_Id' order by Other_Used_Id desc limit 1";
		$sel_exe_ch85 = mysql_query($sel_check85);
	   	$sel_num85 = mysql_num_rows($sel_exe_ch85);
		if($sel_num85==0)
		{
		$sel_check = "select sum(Quantity) as sum,Mach_Part_Id from other_sub_orgdc where Mach_Part_Id = '$Mach_Part_Id'";
		$sel_exe_ch = mysql_query($sel_check);
		$sel_fetch_ch = mysql_fetch_array($sel_exe_ch);
		$sel_sum = $sel_fetch_ch['sum'];
		$sel_mach = $sel_fetch_ch['Mach_Part_Id'];
		  $sel_final = $sel_sum - $Quantity_Used;
		}
		elseif($sel_num85==1)
		{
			$sel_check1 = "select sum(Quantity) as sum,Mach_Part_Id from other_sub_orgdc where Mach_Part_Id = '$Mach_Part_Id'";
		$sel_exe_ch1 = mysql_query($sel_check1);
		$sel_fetch_ch1 = mysql_fetch_array($sel_exe_ch1);
		$sel_check2 = "select sum(Quantity_Used) as sum,Mach_Part_Id from other_used1 where Mach_Part_Id = '$Mach_Part_Id'";
		$sel_exe_ch2 = mysql_query($sel_check2);
		$sel_fetch_ch2 = mysql_fetch_array($sel_exe_ch2);
		$result_re = $sel_fetch_ch1['sum'] - $sel_fetch_ch2['sum'];
		if($result_re<0)
		{
			echo '<script>alert("Please check stock first and then add quantity properly");</script>';
		}
		else
		{
		$sel_fetch_ch85 = mysql_fetch_array($sel_exe_ch85);
		$sel_mach = $sel_fetch_ch85['Mach_Part_Id'];
		  $sel_final = $result_re - $Quantity_Used;	
		}
		}
		if($sel_final<0)
		{
			echo '<script>alert("Please check stock first and then add quantity properly");</script>';
		}
		else
		{
		  $ins_sel = "insert into other_used1 (Other_Used_Id,Other_Used_Date,Mach_Part_Id,Quantity_Used,Quantity_Re,Entry_Date,Entry_Id,Labour_Id) values(NULL,'$Other_Used_Date','$sel_mach','$Quantity_Used','$sel_final','$Entry_Date','$Entry_Id','$Labour_Id')";
		  $ins_sel_exe = mysql_query($ins_sel);
		  $insertGoTo = "otherusedlist";
  echo '<script>alert("Record inserted....");</script>';
  echo '<script>window.location="'.$insertGoTo.'";</script>';
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
<?php include("sidemenu.php"); ?>
                <div class="inner">
                    <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" align="center">OTHER-USED</h1>
                </div>
            </div>
<div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <div id="div-1" class="accordion-body collapse in body">
            <form class="form-horizontal" method="post" name="form1" onsubmit="if(submitting) {alert('The record is being submitted, please wait a moment...');submit.disabled = true;return false;}if(checkQuotee(this)){submit.value = 'Submitting...';submitting = true;return true;}return false;">
            <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Other-Used ID :</label>
                    <div class="col-lg-8">
                        <input type="text" name="Other_Used_Id" id="Other_Used_Id" class="form-control" value="<?php echo $Other_Used_Id;?>" readonly/>
                    </div>
                </div>
            <div class="form-group">
                        <label class="control-label col-lg-4" >Date :</label>
                        <div class="col-lg-3"><?php date_default_timezone_set('Asia/Calcutta'); ?>
                              <input class="form-control" type="text"  value="<?php echo $Other_Used_Date; ?>" name="Other_Used_Date" id="Other_Used_Date" readonly />
                        </div>
                    </div>
                <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Machine-Parts :</label>
                    <div class="col-lg-8">
                      <input type="text" id="Mach_Pname" placeholder="" class="form-control"  name="Mach_Pname" value="<?php echo $Mach_Pname?>" />
                       <input type="hidden" id="Mach_Part_Id" name="Mach_Part_Id" value="<?php echo $Mach_Part_Id;?>" />
                    </div>
                </div>
                 <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Quantity :</label>
                    <div class="col-lg-8">
                      <input type="text" id="Quantity_Used" placeholder="" class="form-control"  name="Quantity_Used" value="<?php echo $Quantity_Used; ?>" onkeypress="return isNumberKey(event)"/>
                    </div>
                </div>
                 <div class="form-group">
<label class="control-label col-lg-4">Master :</label>
<div class="col-lg-8">
  <select name="Labour_Id" class="form-control" id="Labour_Id">
    <option value="">--Select--</option>
    <?php
   $lab = "select Labour_Id,Name,W_Type_Name from labour_details,work_type where work_type.W_Type_Id = labour_details.W_Type_Id AND work_type.W_Type_Name = 'Master' AND Status = 'Fixed-Join'";
   $lab_exe = mysql_query($lab);
   while($lab_fetch = mysql_fetch_array($lab_exe))
   {  
?>
    <option value="<?php echo $lab_fetch['Labour_Id']?>"><?php echo $lab_fetch['Name']?></option>
    <?php
}
?>
  </select>
  </div>
</div>
                                        <div style="text-align:center" class="form-actions no-margin-bottom">
                                            <a href="otherusedlistpage"><input type="button" value="Back" class="btn btn-inverse btn-lg " /></a>
                                            <?php
											if($action=='insert')
											{
												if($days_remaining<=0)
{
	echo "<strong style='color:#F00;'>* Please renew your website</strong>";
}
                                            if($days_remaining<=0)
{}
elseif($days_remaining>0)
{
												?>
                                            <input type="submit" value="Submit" name="submit" class="btn btn-primary btn-lg " /><?php } }
											?>
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
<script src="assets/js/otherusedins.js"></script>
<script src="assets/js/jointjquerydateandpicker.js"></script>
<script type="text/javascript">
<?php include("shortcutkeys.php");?>
</script>
</body>
</html>
<?php
function getNewOtUsedID()
{
	include("databaseconnect.php");
	$sql="select max(Other_Used_Id)+1 from other_used1";
	$result= mysql_query($sql);
	$row= mysql_fetch_array($result);
	if($row != null && $row[0] > 0)
		{
			$msg = $row[0];
		}
		else
		{
			$msg = '1';
		}
		return $msg;
	}
 ob_flush(); ?>