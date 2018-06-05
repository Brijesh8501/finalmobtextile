<?php include("logcode.php"); require_once('../Connections/brijesh8510.php'); 
date_default_timezone_set('Asia/Calcutta');
include("webrenew.php");
date_default_timezone_set("Asia/Calcutta");
$dateact = date('Y-m-d');
	$dateactfull = date('d-m-Y        h:i:s A');
	$Entry_Id = $row_result['Registration_Id'];
	
	$Partact = "Bank Insert Page - This page is open to view.<br/>By : ".$row_result['Name'];
	$insactivity = "insert into activity(Activity_Id,Date,Particular,Type,Action,Datefull,Id) values(NULL,'$dateact','$Partact','Bank Insert - View','view','$dateactfull','$Entry_Id')";
	mysql_query($insactivity); 
	
if($row_result['Role']=='Admin' || $row_result['Role']=='Manager' || $row_result['Role']=='Accountant')
{
	
}
else
{
	
	echo '<script>alert("You have no rights to view this page");</script>';
	$updateGoTo = "index";
  echo '<script>window.location="'.$updateGoTo.'";</script>';
}
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")){
	if(!isset($_SESSION['User']))
	{
	}
	else
	{
   mysql_select_db($database_brijesh8510, $brijesh8510);
$Bank_Name = $_POST['Bank_Name'];
$Bank_str = implode("-",$Bank_Name);
$new1 = strtoupper($Bank_str);
$Account_Type = $_POST['Account_Type'];
$Groups = $_POST['Groups'];
$Opening_Balance = $_POST['Opening_Balance'];
$P_Name = $_POST['P_Name'];
$Party = $_POST['Party'];
$Ifsc_Code = strtoupper($_POST['Ifsc_Code']);
$Entry_Id = $row_result['Registration_Id'];
$query = mysql_query("select * from bank_details where Bank_Name = '".$new1."'") or die(mysql_error());
$duplicate = mysql_num_rows($query);
   if($duplicate==0)
    {
$query2 = mysql_query("INSERT INTO `textile`.`bank_details` (`Bank_Id`, `Bank_Name`, `Opening_Balance`, `Current_Balance`, `Account_Type`, `Groups`, `Entry_Id`,`Ifsc_Code`,`P_Name`,`Party`) VALUES (NULL, '$new1','$Opening_Balance','$Opening_Balance','$Account_Type','$Groups','$Entry_Id','$Ifsc_Code','$P_Name','$Party')") or die(mysql_error());
	
	$dateact = date('Y-m-d');
	$dateactfull = date('d-m-Y        h:i:s A');
	$Partact = "New Bank Entry : ".$new1."<br/>Group : ".$Groups;
	$insactivity = "insert into activity(Activity_Id,Date,Particular,Type,Action,Datefull,Id) values(NULL,'$dateact','$Partact','Bank - Insert','insert','$dateactfull','$Entry_Id')";
	mysql_query($insactivity);  
  echo '<script>alert("Record inserted....");</script>';
   echo '<script>close();</script>';
    }
    else
    {
      echo '<script>alert("This bank-branch is allready exists....");</script>';
    }
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
                    <h1 class="page-header" align="center">BANK PROFILE</h1>
                </div>
            </div>
<div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <div id="div-1" class="accordion-body collapse in body">
            <form class="form-horizontal" method="post" name="form1" onsubmit="if(submitting) {
            alert('The record is being submitting, please wait a moment...');
            submit.disabled = true; 
            return false;
            }
            if(bankinsert(this))
            {
            submit.value = 'Submitting...';
            submitting = true;
            return true; 
            }
            return false;">
            <div class="form-group row">
            <div class="col-lg-6">    
            <div class="form-group">
                    <label for="text2" class="control-label col-lg-6">Branch ID :</label>
                    <div class="col-lg-6">
                        <input type="text" name="Branch_Id" id="Branch_Id" class="form-control" value="<?php echo getNewBankID(); ?>" readonly/>
                    </div>
                </div>
                </div>
               </div> 
        <div class="form-group row">
                 <div class="col-lg-6">
                <div class="form-group">
                    <label for="text2" class="control-label col-lg-6">Bank Name - Branch - Account :</label>
                    <div class="col-lg-6">
                      <input type="text" id="Bank_Name" placeholder="Bank Name" class="form-control"  name="Bank_Name[]" value="" /><span id="error1" style="color:#F00";></span>
                    </div>
                </div>
                </div>
                <div class="col-lg-3">
                <input type="text" id="Branch_Name" placeholder="Branch Name" class="form-control"  name="Bank_Name[]" value="" /><span id="error2" style="color:#F00";></span>
                </div>
                <div class="col-lg-3">
                <input type="text" id="Account_No" placeholder="Account Number" class="form-control"  name="Bank_Name[]" value="" onkeypress="return isNumberKey(event)" />
                </div>
                </div>
                <div class="form-group row">
                <div class="col-lg-6">
                <div class="form-group">
                    <label for="text2" class="control-label col-lg-6">IFSC Code :</label>
                    <div class="col-lg-6">
                      <input type="text" id="Ifsc_Code" class="form-control"  name="Ifsc_Code" value="" /><span id="error3" style="color:#F00";></span>
                    </div>
                </div>
                </div>
                </div>
                
                 <div class="form-group row">
            <div class="col-lg-6">    
            <div class="form-group">
                    <label for="text2" class="control-label col-lg-6">Account :</label>
                    <div class="col-lg-6">
                        <select name="Account_Type" id="Account_Type" class="form-control">
                        <option value="">--select--</option>
                        <option value="Current">Current</option>
                        <option value="Saving">Saving</option>
                        </select>
                    </div>
                </div>
                </div>
               </div>
                <div class="form-group row">
            <div class="col-lg-6">    
            <div class="form-group">
                    <label for="text2" class="control-label col-lg-6">Group :</label>
                    <div class="col-lg-6">
                        <select name="Groups" id="Groups" class="form-control">
                        <option value="">--select--</option>
                        <option value="Company">Company</option>
                         <option value="Company Personal">Company (Personal)</option>
                        <option value="Customer">Customer</option>
                         <option value="Customer Personal">Customer (Personal)</option>
                        <option value="Broker">Broker</option>
                        <option value="Friend">Friend</option>
                        <option value="Relative">Relative</option>
                         <option value="Personal">Personal (Self or Family)</option>
                        <option value="Firm">Firm (Shingori Textile)</option>
                        </select>
                    </div>
                </div>
                </div>
               </div>
               <div id="groupshow">
               
               </div>
                                        <div style="text-align:center" class="form-actions no-margin-bottom">
                                            <a href="banklistpage"><input type="button" value="Back" class="btn btn-inverse btn-lg " /></a><?php
											if($days_remaining<=0)
{
	echo "<strong style='color:#F00;'>* Please renew your website</strong>";
	
}
                                            if($days_remaining<=0)
{
}
elseif($days_remaining>0)
{
?>	
                                            <input type="submit" value="Submit" name="submit" class="btn btn-primary btn-lg " />
                                                 <input type="hidden" name="MM_insert" value="form1">
                                            <?php
}
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
        <script src="assets/js/bankins.js"></script>
        <script type="text/javascript">
		<?php include("shortcutkeys.php");?>
		</script>
</body>
</html>
<?php
function getNewBankID()
{
	include("databaseconnect.php");
	$sql="select max(Bank_Id)+1 from bank_details";
	$result= mysql_query($sql);
	$row= mysql_fetch_array($result);
	if($row != null && $row[0] > 0)
		{
			echo $row[0];
		}
		else
		{
			echo '1';
		}
	}
	ob_flush(); ?>