<?php include("logcode.php");
include("databaseconnect.php");
error_reporting(0);
	if(isset($_REQUEST['action']))
	{
		$action = $_REQUEST['action'];
		if($action=='insert')
		{
			date_default_timezone_set('Asia/Calcutta');
	include("webrenew.php");
	          $Courier_Id = getNewCourierentryID();
			 	}
		elseif($action=='update')
		{
	$Courier_Id = $_REQUEST['Courier_Id'];
	$sel_upd = "select * from courier_details where Courier_Id = '$Courier_Id'";
	$sel_upd_exe = mysql_query($sel_upd);
	$row = mysql_fetch_array($sel_upd_exe);
	$Courier_Id = $row['Courier_Id'];
	$Cou_Com_Id = $row['Cou_Com_Id'];
	$C_No = $row['C_No'];
	$C_Date = $row['C_Date'];
	$C_Pro = $row['C_Pro'];
	$Destination = $row['Destination'];
	$To = $row['Top'];
	$Amt = $row['Amt'];
	$Entry_Id = $row['Entry_Id'];
		}
	}
if(isset($_REQUEST['submit']))
{
	$Cou_Com_Id = $_REQUEST['Cou_Com_Id'];
	$C_No = $_REQUEST['C_No'];
	$C_Date = $_REQUEST['C_Date'];
	$C_Pro = strtoupper($_REQUEST['C_Pro']);
	$Destination = $_REQUEST['Destination'];
	$To = strtoupper($_REQUEST['To']);
	$Amt = $_REQUEST['Amt'];
	$Entry_Id = $row_result['Registration_Id'];
	$query = mysql_query("select * from courier_details where C_No='".$C_No."' ") or die(mysql_error());
$duplicate = mysql_num_rows($query);
   if($duplicate==0)
    {
	$ins = "insert into courier_details(Courier_Id,Cou_Com_Id,C_No,C_Date,C_Pro,Destination,Top,Amt,Entry_Id) values(NULL,'$Cou_Com_Id','$C_No','$C_Date','$C_Pro','$Destination','$To','$Amt','$Entry_Id')";
	$ins_exe = mysql_query($ins);
	
	$selectcompany = mysql_query("select Cou_Comp from courier_company where Cou_Com_Id = '$Cou_Com_Id'");
	$selectcompanyfetch = mysql_fetch_array($selectcompany);
	
	 $dateact = date('Y-m-d');
	$dateactfull = date('d-m-Y        h:i:s A');
	$Partact = "New Courier Entry<br/>Courier : ".$selectcompanyfetch['Cou_Comp'].", C_No : ".$C_No."<br/>C_Thing : ".$C_Pro.", To : ".$To;
	$insactivity = "insert into activity(Activity_Id,Date,Particular,Type,Action,Datefull,Id) values(NULL,'$dateact','$Partact','Courier - Insert','insert','$dateactfull','$Entry_Id')";
	mysql_query($insactivity); 
	
	$insertGoTo = "courierentrylist";
  echo '<script>alert("Record inserted....");</script>';
  echo '<script>window.location="'.$insertGoTo.'";</script>';
    }
    else
    {
      echo '<script>alert("This c_no is allready exists....");</script>';
    }
	}
	if(isset($_REQUEST['update']))
{
	$Courier_Id = $_REQUEST['Courier_Id'];
	$Cou_Com_Id = $_REQUEST['Cou_Com_Id'];
	$C_No = $_REQUEST['C_No'];
	$C_Date = $_REQUEST['C_Date'];
	$C_Pro = strtoupper($_REQUEST['C_Pro']);
	$Destination = $_REQUEST['Destination'];
	$To = $_REQUEST['To'];
	$Amt = $_REQUEST['Amt'];
	$Entry_Id = $row_result['Registration_Id'];
	$ins = "update courier_details set Courier_Id = '$Courier_Id',Cou_Com_Id = '$Cou_Com_Id',C_No = '$C_No',C_Date = '$C_Date',C_Pro = '$C_Pro',Destination = '$Destination',Top = '$To',Amt = '$Amt',Entry_Id = '$Entry_Id' where Courier_Id = '$Courier_Id'";
	$ins_exe = mysql_query($ins);
	$updateGoTo = "courierentrylist";
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
      <link rel="stylesheet" href="assets/css/joint-jquery-ui-datepicker.css">
</head>
<body>   
<?php include("sidemenu.php"); ?>
                <div class="inner">
                    <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" align="center">COURIER ENTRY</h1>
                </div>
            </div>
<div class="row">
<div class="col-lg-12">
    <div class="box dark">
          <div id="div-1" class="accordion-body collapse in body">
            <form class="form-horizontal" method="post" name="form1" <?php if($action =='insert') { ?>onsubmit="if(submitting) {
            alert('The record is being submitted, please wait a moment...');
            submit.disabled = true; 
            return false;
            }
            if(Courier(this))
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
            if(Courier(this))
            {
            update.value = 'Updating...';
            submitting = true;
            return true; 
            }
            return false;"<?php } ?>>
            <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Courier ID :</label>
                    <div class="col-lg-8">
                        <input type="text" name="Courier_Id" id="Courier_Id" class="form-control" value="<?php echo $Courier_Id;?>" readonly/>
                    </div>
                </div>
            <div class="form-group">
<label class="control-label col-lg-4">Courier-Company :</label>
<div class="col-lg-8">
  <select name="Cou_Com_Id" class="form-control">
    <option value="">--Select--</option>
     <?php 
	 $sel = "select * from courier_company";
	 $sel_exe = mysql_query($sel);
	 while($sel_fetch = mysql_fetch_array($sel_exe)) { 
	 if($sel_fetch['Cou_Com_Id']==$Cou_Com_Id)
	 {
		 $sel = "selected='selected'";
	 }
	 else
	 {
		 $sel = "";
	 }
?>
             <option value="<?php echo $sel_fetch['Cou_Com_Id'];?>" <?php echo $sel;?>><?php echo $sel_fetch['Cou_Comp'];?></option>
             <?php
}
?>
  </select>
 </div>
</div>
<?php if($action=='insert')
{
	?>
                <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">C_No :</label>
                    <div class="col-lg-8">
                      <input type="text" id="C_No" class="form-control"  name="C_No" value="" />
                      <span id="error1" style="color:#F00";></span>
                    </div>
                </div>
                <?php }
				elseif($action=='update')
				{
					?>
                     <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">C_No :</label>
                    <div class="col-lg-8">
                      <input type="text" id="C_No" class="form-control"  name="C_No" value="<?php echo $C_No;?>" readonly/>
                     </div>
                </div>
                    <?php
				}
				?>
                <div class="form-group">
                        <label class="control-label col-lg-4" >Date :</label>
                        <div class="col-lg-3">
                              <input class="form-control" type="text"  value="<?php if($action=='insert'){} else if($action=='update') { echo $C_Date;} ?>" name="C_Date" id="C_Date" readonly />
                              </div>
                    </div>
                     <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">C_Thing :</label>
                    <div class="col-lg-8">
                      <input type="text" id="C_Pro" class="form-control"  name="C_Pro" value="<?php echo $C_Pro;?>"/> <span id="error5" style="color:#F00";></span>
                     </div>
                </div>
                <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Destination :</label>
                    <div class="col-lg-8">
                      <input type="text" id="Destination" class="form-control"  name="Destination" value="<?php echo $Destination;?>" />
                      <span id="error2" style="color:#F00";></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">To :</label>
                    <div class="col-lg-8">
                      <input type="text" id="To" class="form-control"  name="To" value="<?php echo $To;?>" />
                      <span id="error3" style="color:#F00";></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Amount :</label>
                    <div class="col-lg-8">
                      <input type="text" id="Amt" class="form-control"  name="Amt" value="<?php echo $Amt;?>" onkeypress="return isDecimalNumberKey(event)"/>
                     </div>
                </div>
                                        <div style="text-align:center" class="form-actions no-margin-bottom">
                                         <a href="courierentrylistpage"><input type="button" value="Back" class="btn btn-inverse btn-lg " /></a>
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
                                            <input type="submit" value="Submit" name="submit" class="btn btn-primary btn-lg " />
                                            <?php }}
											elseif($action=='update')
											{
												?>
                                            <input type="submit" value="Update" name="update" class="btn btn-primary btn-lg " />
                                                <?php
											}?>
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
<script src="assets/js/courierentry.js"></script>
<script src="assets/js/jointjquerydateandpicker.js"></script>
<script type="text/javascript">
<?php include("shortcutkeys.php");?>
</script>
</body>
</html>
<?php
function getNewCourierentryID()
{
	include("databaseconnect.php");
	$sql="select max(Courier_Id)+1 from courier_details";
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