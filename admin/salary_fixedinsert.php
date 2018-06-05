<?php include("logcode.php"); require_once('../Connections/brijesh8510.php'); error_reporting(0);
include("databaseconnect.php");	
mysql_select_db($database_brijesh8510, $brijesh8510);
$query_state = "SELECT * FROM `labour_details` where Status = 'Fixed-Join'";
$state = mysql_query($query_state, $brijesh8510) or die(mysql_error());
$row_state = mysql_fetch_assoc($state);
$totalRows_state = mysql_num_rows($state);
if(isset($_REQUEST['action']))
{
	$action = $_REQUEST['action'];
	if($action=='insert')
	{
		$Sal_Fixed_Id = getNewSalfixID();
		date_default_timezone_set('Asia/Calcutta');
	include("webrenew.php");
	}
	elseif($action=='update')
	{
		$Sal_Fixed_Id = $_REQUEST['Sal_Fixed_Id'];
		$select = "select Sal_Fixed_Id,Date_Range,labour_details.Labour_Id,labour_details.Name,No_Of,Rate,Amount,Upad_Amount,Grand_Total,Re_Amount,salary_fixed_master.Status,Entry_Date,salary_fixed_master.Entry_Id from salary_fixed_master,labour_details where labour_details.Labour_Id = salary_fixed_master.Labour_Id AND Sal_Fixed_Id = '$Sal_Fixed_Id'";
		$sel_exe = mysql_query($select);
		$sel_fetch = mysql_fetch_array($sel_exe);
		$Sal_Fixed_Id = $sel_fetch['Sal_Fixed_Id'];
		$reservation = $sel_fetch['Date_Range'];
	$Labour_Id = $sel_fetch['Labour_Id'];
	$Name = $sel_fetch['Name'];
	$No_Of = $sel_fetch['No_Of'];
	$Rate = $sel_fetch['Rate'];
	$Amount = $sel_fetch['Amount'];
	$Upad_Amount = $sel_fetch['Upad_Amount'];
	$Grand_Total = $sel_fetch['Grand_Total'];
	$Re_Amount = $sel_fetch['Re_Amount'];
	$Status = $sel_fetch['Status'];
	$Entry_Date = $sel_fetch['Entry_Date'];
	$Entry_Id = $sel_fetch['Entry_Id'];
	date_default_timezone_set('Asia/Calcutta');
	include("webrenew.php");
		}
}
if(isset($_REQUEST['submit']))
{
	$reservation = $_REQUEST['reservation'];
	$splitdate = explode("-",$reservation);
$date = $splitdate[0];
$date1 = $splitdate[1];
$datechecksecond = strtotime($date);
	$Labour_Id = $_REQUEST['Labour_Id'];
	$No_Of = $_REQUEST['No_Of'];
	$Rate = $_REQUEST['Rate'];
	$Amount = $_REQUEST['Amount'];
	$Upad_Amount = $_REQUEST['Upad_Amount'];
	$Grand_Total = $_REQUEST['Grand_Total'];
	$Re_Amount = $_REQUEST['Re_Amount'];
	$Status = $_REQUEST['Status'];
	$Entry_Date = date('Y-m-d      h:i:s a');
	$Entry_Id = $row_result['Registration_Id'];
	$selcheckdate = "select Date_Range from salary_Fixed_master where Labour_Id = '$Labour_Id' order by Sal_Fixed_Id desc limit 1";
	$selcheckdate_exe = mysql_query($selcheckdate);
	$selcheckdate_fetch = mysql_fetch_array($selcheckdate_exe);
	$datecheckfirst = $selcheckdate_fetch['Date_Range'];
	$datefinal = explode("-",$datecheckfirst);
	$datefulfinal = strtotime($datefinal[1]);
	 if($datechecksecond>$datefulfinal)
	 {
	 $query = mysql_query("select * from salary_fixed_master where salary_fixed_master.Date_Range = '$reservation' AND Labour_Id = '$Labour_Id'") or die(mysql_error());
  $query_fetch = mysql_fetch_array($query);
  $duplicate = mysql_num_rows($query);
  $query_fetch_id =  $query_fetch['Sal_Fixed_Id'];
   if($duplicate==0)
    {
	$ins_sal = "insert into salary_fixed_master (Sal_Fixed_Id,Date_Range,Labour_Id,No_Of,Rate,Amount,Upad_Amount,Grand_Total,Re_Amount,Status,Entry_Date,Entry_Id) values(NULL,'$reservation','$Labour_Id','$No_Of','$Rate','$Amount','$Upad_Amount','$Grand_Total','$Re_Amount','$Status','$Entry_Date','$Entry_Id')";
	$ins_exe = mysql_query($ins_sal);
	$insertGoTo = "salaryfixedlist";
  echo '<script>alert("Record inserted....");</script>';
  echo '<script>window.location="'.$insertGoTo.'";</script>';
  }
	else
	{
	   echo '<script>alert("This date range with this labour is allready exists in sal-fixed id : '.$query_fetch_id.'");</script>';	
	}
	 }
	 else
	 {
		  echo '<script>alert("Please give appropriate date range");</script>';	
	 }
}
if(isset($_REQUEST['update']))
{
	$Sal_Fixed_Id = $_REQUEST['Sal_Fixed_Id'];
	$reservation = $_REQUEST['reservation1'];
	$Labour_Id = $_REQUEST['Labour_Id'];
	$No_Of = $_REQUEST['No_Of'];
	$Rate = $_REQUEST['Rate'];
	$Amount = $_REQUEST['Amount'];
	$Upad_Amount = $_REQUEST['Upad_Amount'];
	$Grand_Total = $_REQUEST['Grand_Total'];
	$Re_Amount = $_REQUEST['Re_Amount'];
	$Status = $_REQUEST['Status'];
	$Entry_Date = $_REQUEST['Entry_Date'];
	$Entry_Id = $row_result['Registration_Id'];
	$upd_sal = "update salary_fixed_master set Date_Range = '$reservation', Labour_Id = '$Labour_Id', No_Of = '$No_Of', Rate = '$Rate', Amount = '$Amount', Upad_Amount = '$Upad_Amount', Grand_Total = '$Grand_Total', Re_Amount = '$Re_Amount', Status = '$Status', Entry_Date = '$Entry_Date', Entry_Id = '$Entry_Id'";
	$upd_exe = mysql_query($upd_sal);
	$updateGoTo = "salaryfixedlist";
  echo '<script>alert("Record updated....");</script>';
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
    <link rel="stylesheet" href="assets/plugins/daterangepicker/daterangepicker-bs3.css" />
</head>
<body>   
<?php include("sidemenu.php"); ?>
                <div class="inner">
                    <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" align="center">SALARY-FIXED</h1>
                </div>
            </div>
<div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <div id="div-1" class="accordion-body collapse in body">
            <form class="form-horizontal" method="post" name="form1" <?php if($action =='insert') { ?>onsubmit="if(submitting){alert('The record is being submitted, please wait a moment...');submit.disabled = true;return false;} if(checkQuotee(this)){submit.value = 'Submitting...';submitting = true;return true;}return false;" <?php } elseif($action=='update') { ?> onsubmit="if(submitting){alert('The record is being updated, please wait a moment...');update.disabled = true;return false;}if(checkQuotee(this)){update.value = 'Updating...';submitting = true;return true;}return false;"<?php } ?>>
            <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Sal-Fixed ID :</label>
                    <div class="col-lg-8">
                        <input type="text" name="Sal_Fixed_Id" id="Sal_Fixed_Id" class="form-control" value="<?php echo $Sal_Fixed_Id; ?>" readonly/>
                    </div>
                </div>
                 <?php if($action=='insert')
				{
					?>
            <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Date Range :</label>
                    <div class="col-lg-8">
                      <input type="text" id="reservation" placeholder="" class="form-control"  name="reservation" value="<?php echo $reservation;?>" readonly/>
                        <span id="checkno"></span>
                     </div>
                </div><div id="show2"></div>
                <div class="form-group">
<label class="control-label col-lg-4">Labour :</label>
<div class="col-lg-8">
  <select name="Labour_Id" id="Labour_Id" class="form-control">
    <option value="">--Select--</option>
     <?php 
 do{
	if($row_state['Labour_Id']==$sel_fetch['Labour_Id'])
	{
		$msg = "selected";
	}
	else
	{
		$msg = "";
	}
?> 
             <option value="<?php echo $row_state['Labour_Id'];?>" <?php echo $msg;?>><?php echo $row_state['Name'];?></option>
             <?php
}while ($row_state = mysql_fetch_assoc($state));
?>
  </select>
  <span id="check"><span style="color:#F00">You have to select / re-select labour always even if it is selected allready, when you change date range !</span></span>
 </div>
</div>
<?php } elseif($action=='update')
{
	?>
     <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Date Range :</label>
                    <div class="col-lg-8">
                      <input type="text" id="reservation1" placeholder="" class="form-control"  name="reservation1" value="<?php echo $reservation;?>" readonly/>
                    </div>
                </div>
    <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Labour :</label>
                    <div class="col-lg-8">
                      <input type="text" id="Name" placeholder="" class="form-control"  name="Name" value="<?php echo $Name;?>" readonly/>
                      <input type="hidden" name="Labour_Id" id="Labour_Id" value="<?php echo $Labour_Id;?>" readonly/>
                    </div>
                </div>
<?php } 
?>
<div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Number Of Beam / Attendence / ... :</label>
                    <div class="col-lg-8">
                      <input type="text" id="No_Of" placeholder="" class="form-control"  name="No_Of" value="<?php echo $No_Of;?>" onkeypress="return isNumberKey(event)"/>
                    </div>
                </div>
<div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Rate :</label>
                    <div class="col-lg-8">
                      <input type="text" id="Rate" placeholder="" class="form-control"  name="Rate" value="<?php echo $Rate; ?>" onkeypress="return isDecimalNumberKey(event)" />
                    </div>
                </div>
<div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Amount :</label>
                    <div class="col-lg-8">
                      <input type="text" id="Amount" placeholder="" class="form-control"  name="Amount" value="<?php echo $Amount; ?>" onkeypress="return isDecimalNumberKey(event)" readonly/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Upad Amount / Adjust Upad Amount :</label>
                    <div class="col-lg-8">
                      <input type="text" id="Upad_Amount" placeholder="" class="form-control"  name="Upad_Amount" value="<?php echo $Upad_Amount;?>" onkeypress="return isDecimalNumberKey(event)" />
                    </div>
                </div>
<div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Grand Total :</label>
                    <div class="col-lg-8">
                      <input type="text" id="Grand_Total" placeholder="" class="form-control"  name="Grand_Total" value="<?php echo $Grand_Total;?>" onkeypress="return isDecimalNumberKey(event)" readonly/>
                    </div>
                </div>
                <?php if($action=='insert')
				{
					?>
                <div id="show">
                    </div>
                    <?php } 
					elseif($action=='update')
					{?>
                <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Remaining Amount :</label>
                    <div class="col-lg-8">
                      <input type="text" id="Re_Amount" placeholder="" class="form-control"  name="Re_Amount" value="<?php echo $Re_Amount;?>" onkeypress="return isDecimalplusNumberKey(event)" />
                </div>
                </div>
                <?php } ?>
 <div class="form-group">
    <label class="control-label col-lg-4">Status :</label>
    <div class="col-lg-8">
      <select name="Status" class="form-control" id="Status">
     	<option value="Paid" <?php if($Status == 'Paid') { echo 'selected = \"selected\"'; } ?>>Paid</option>
       <option value="Un-Paid" <?php if($Status == 'Un-Paid') { echo 'selected = \"selected\"'; } ?>>Un-Paid</option>
      </select>
      </div>
</div>
<?php if($action=='update')
{
	?>
<div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Entry Date :</label>
                    <div class="col-lg-8">
                      <input type="text" id="Entry_Date" placeholder="" class="form-control"  name="Entry_Date" value="<?php echo $Entry_Date;?>" readonly/>
                    </div>
                </div>
<div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Entry #ID :</label>
                    <div class="col-lg-8">
                      <input type="text" id="Entry_Id" placeholder="" class="form-control"  name="Entry_Id" value="<?php echo $Entry_Id; ?>" readonly/>
                    </div>
                </div>
                <?php } ?>
                                        <div style="text-align:center" class="form-actions no-margin-bottom">
                                            <a href="salaryfixedlistpage"><input type="button" value="Back" class="btn btn-inverse btn-lg " /></a>
											<?php if($action=='insert')
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
     <input type="submit" value="Make Salary" name="submit" id="submit" class="btn btn-primary btn-lg " />
         <?php } } elseif($action=='update')
{
	?>                                   <input type="submit" value="Update" name="update" id="update" class="btn btn-primary btn-lg " />
    <?php } ?>
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
 <script src="assets/js/salaryfixed.js"></script>
<script>
	var submitting = false;
		function checkQuotee(mff)
{
<?php if($action=='insert')
{
	?>
	if(mff.reservation.value=="")
    {
       alert("Date range is required");
       mff.reservation.focus();
       return false;
    }
	<?php } ?>
if(mff.Labour_Id.value=="")
    {
       alert("Labour is required");
       mff.Labour_Id.focus();
       return false;
    }
	if(mff.No_Of.value=="")
    {
       alert("Number of Beams / Attendence / ... is required");
       mff.No_Of.focus();
       return false;
    }
	if(mff.Rate.value=="")
    {
       alert("Rate is required");
       mff.Rate.focus();
       return false;
    }
	if(mff.Amount.value=="")
    {
       alert("Amount is required");
       mff.Amount.focus();
       return false;
    }
	else if(mff.Amount.value==0)
    {
       alert("Amount should not be 0");
       mff.Amount.focus();
       return false;
    }
	if(mff.Upad_Amount.value=="")
    {
       alert("Upad amount is required");
       mff.Upad_Amount.focus();
       return false;
    }
	if(mff.Grand_Total.value=="")
    {
       alert("Grand total is required");
       mff.Grand_Total.focus();
       return false;
    }
	else if(mff.Grand_Total.value==0)
    {
       alert("Grand total should not be 0");
       mff.Grand_Total.focus();
       return false;
    }
	else if(mff.Grand_Total.value<0)
    {
       alert("Grand total should not be in minus (-)");
       mff.Grand_Total.focus();
       return false;
    }
	if(mff.Re_Amount.value=="")
    {
       alert("Remaining amount is required");
       mff.Re_Amount.focus();
       return false;
    }
 return true;
}
<?php include("shortcutkeys.php");?>
   </script>
 <script src="assets/js/jquery-ui.min.js"></script>
 <script src="assets/plugins/uniform/jquery.uniform.min.js"></script>
<script src="assets/plugins/inputlimiter/jquery.inputlimiter.1.3.1.min.js"></script>
<script src="assets/plugins/chosen/chosen.jquery.min.js"></script>
<script src="assets/plugins/colorpicker/js/bootstrap-colorpicker.js"></script>
<script src="assets/plugins/tagsinput/jquery.tagsinput.min.js"></script>
<script src="assets/plugins/validVal/js/jquery.validVal.min.js"></script>
<script src="assets/plugins/daterangepicker/daterangepicker.js"></script>
<script src="assets/plugins/daterangepicker/moment.min.js"></script>
<script src="assets/plugins/autosize/jquery.autosize.min.js"></script>
       <script src="assets/js/formsInit.js"></script>
        <script>
            $(function () { formInit(); });
		</script>
        </body>
</html>
<?php
function getNewSalfixID()
{
	include("databaseconnect.php");
	$sql="select max(Sal_Fixed_Id)+1 from salary_fixed_master";
	$result= mysql_query($sql);
	$row= mysql_fetch_array($result);
	if($row != null && $row[0] > 0)
		{
			$rw = $row[0];
		}
		else
		{
			$rw = '1';
		}
		return $rw;
	}
mysql_free_result($state);
 ob_flush(); ?>