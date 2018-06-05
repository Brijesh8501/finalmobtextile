<?php include("logcode.php"); error_reporting(0);
include("databaseconnect.php");
if(isset($_REQUEST['action']))
{
	$action = $_REQUEST['action'];
	if($action=='insert')
	{
		$Mach_Part_Id = getNewMachinePartID();
		date_default_timezone_set('Asia/Calcutta');
	include("webrenew.php");
	}
	elseif($action=='update')
	{
		$Mach_Part_Id = $_REQUEST['Mach_Part_Id'];
		$sel_part = "select * from machine_parts where Mach_part_Id = '$Mach_Part_Id'";
		$sel_exep = mysql_query($sel_part);
		$sel_fetchp = mysql_fetch_array($sel_exep);
		$Mach_Part_Id = $sel_fetchp['Mach_Part_Id'];
		$Mach_Pname = $sel_fetchp['Mach_Pname'];
		date_default_timezone_set('Asia/Calcutta');
	}
}
if(isset($_REQUEST['submit']))
{
	$Mach_Pname = strtoupper($_REQUEST['Mach_Pname']);
	$Entry_Id = $row_result['Registration_Id'];
	$query = mysql_query("select * from machine_parts where Mach_Pname='".$Mach_Pname."' ") or die(mysql_error());
$duplicate = mysql_num_rows($query);
   if($duplicate==0)
    {
	$ins_part = "insert into machine_parts (Mach_Part_Id,Mach_Pname,Entry_Id) values(NULL,'$Mach_Pname','$Entry_Id')";
	$ins_exe = mysql_query($ins_part);
	
	$dateact = date('Y-m-d');
	$dateactfull = date('d-m-Y        h:i:s A');
	$Partact = "New Machine-Parts Entry<br/>Parts : ".$Mach_Pname;
	$insactivity = "insert into activity(Activity_Id,Date,Particular,Type,Action,Datefull,Id) values(NULL,'$dateact','$Partact','Machine-Parts - Insert','insert','$dateactfull','$Entry_Id')";
	mysql_query($insactivity); 
	
	$insertGoTo = "machineusagepartlistpage";
  echo '<script>alert("Record inserted....");</script>';
  echo '<script>window.location="'.$insertGoTo.'";</script>';
    }
    else
    {
      echo '<script>alert("This parts is allready exists....");</script>';
    }
}
if(isset($_REQUEST['update']))
{
	$Mach_Part_Id = $_REQUEST['Mach_Part_Id'];
	$Mach_Pname = strtoupper($_REQUEST['Mach_Pname']);
	$Entry_Id = $row_result['Registration_Id'];
	$query = mysql_query("select * from machine_parts where Mach_Pname='".$Mach_Pname."' ") or die(mysql_error());
$duplicate = mysql_num_rows($query);
   if($duplicate==0)
    {
	$up_part = "update machine_parts set Mach_Pname = '$Mach_Pname', Entry_Id = '$Entry_Id' where Mach_Part_Id = '$Mach_Part_Id'";
		$up_exe = mysql_query($up_part);
		
		$dateact = date('Y-m-d');
	$dateactfull = date('d-m-Y        h:i:s A');
	$Partact = "Machine-Parts Entry<br/>Parts : ".$Mach_Pname;
	$insactivity = "insert into activity(Activity_Id,Date,Particular,Type,Action,Datefull,Id) values(NULL,'$dateact','$Partact','Machine-Parts - Update','update','$dateactfull','$Entry_Id')";
	mysql_query($insactivity); 
	
		$updateGoTo = "machineusagepartlistpage";
  echo '<script>alert("Record updated....");</script>';
  echo '<script>window.location="'.$updateGoTo.'";</script>';
    }
    else
    {
      echo '<script>alert("This parts is allready exists....");</script>';
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
</head>
<body>
<?php include("sidemenu.php"); ?>
                <div class="inner">
                    <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" align="center">MACHINE PARTS</h1>
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
            if(Machineparts(this))
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
            if(Machineparts(this))
            {
            update.value = 'Updating...';
            submitting = true;
            return true; 
            }
            return false;"<?php } ?>>
            <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Machine-Use ID :</label>
                    <div class="col-lg-8">
                        <input type="text" name="Mach_Part_Id" id="Mach_Part_Id" class="form-control" value="<?php echo $Mach_Part_Id; ?>" readonly/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Parts :</label>
                    <div class="col-lg-8">
                      <input type="text" id="Mach_Pname" class="form-control"  name="Mach_Pname" value="<?php echo $Mach_Pname;?>" />
                      <span id="error1" style="color:#F00";></span>
                    </div>
                </div>
                                        <div style="text-align:center" class="form-actions no-margin-bottom">
                                            <a href="machineusagepartlistpage"><input type="button" value="Back" class="btn btn-inverse btn-lg " /></a>
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
                                            <input type="submit" value="Submit" name="submit" class="btn btn-primary btn-lg " /><?php } } elseif($action=='update') { ?>
                                             <input type="submit" value="Update" name="update" class="btn btn-primary btn-lg " />
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
    <script src="assets/js/machineusageparts.js"></script>
    <script type="text/javascript">
	<?php include("shortcutkeys.php");?>
	</script>
</body>
</html>
<?php
function getNewMachinePartID()
{
	include("databaseconnect.php");
	$sql="select max(Mach_Part_Id)+1 from machine_parts";
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