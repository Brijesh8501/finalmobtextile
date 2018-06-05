<?php include("logcode.php"); require_once('../Connections/brijesh8510.php');  error_reporting(0);
    include("databaseconnect.php");
if(isset($_REQUEST['update']))
{
	$decodeurl = $_REQUEST['Sal_Mast_Id'];
	$durl = urldecode($decodeurl); 
	$turl = str_replace("'"," ",$durl);
	$urls = explode(" ",$turl);
	$Sal_Mast_Id = $urls[1];
	$sql = "select Sal_Mast_Id,Date_Range,labour_details.Name,labour_details.Labour_Id,Total_Amt,Total_Meter,Upad_Amt,Re_Amt,Grand_Total,Re_Upad_Amt,salary_master.Status,salary_master.Entry_Date,salary_master.Entry_Id from salary_master,labour_details where labour_details.Labour_Id = salary_master.Labour_Id AND Sal_Mast_Id = '$Sal_Mast_Id'";
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
	$Sal_Mast_Id = $row['Sal_Mast_Id'];
	$Date_Range = $row['Date_Range'];
	$Name = $row['Name'];
	$Labour_Id = $row['Labour_Id'];
	$Total_Amt = $row['Total_Amt'];
	$Total_Meter = $row['Total_Meter'];
	$Upad_Amt = $row['Upad_Amt'];
	$Re_Amt = $row['Re_Amt'];
	$Grand_Total = $row['Grand_Total'];
	$Re_Upad_Amt = $row['Re_Upad_Amt'];
	$Status = $row['Status'];
	$Entry_Date = $row['Entry_Date'];
	$Entry_Id = $row['Entry_Id'];
}
if(isset($_REQUEST['update_form']))
{
	if(!isset($_SESSION['User']))
	{}else
	{
	$Sal_Mast_Id = $_REQUEST['Sal_Mast_Id'];
	$Date_Range = $_REQUEST['Date_Range'];
	$Labour_Id = $_REQUEST['Labour_Id'];
	$Name = $_REQUEST['Name'];
	$Total_Amt = $_REQUEST['Total_Amt'];
	$Total_Meter = $_REQUEST['Total_Meter'];
	$Upad_Amt = $_REQUEST['Upad_Amt'];
	$Re_Amt = $_REQUEST['Re_Amt'];
	$Grand_Total = $_REQUEST['Grand_Total'];
	$Re_Upad_Amt = $_REQUEST['Re_Upad_Amt'];
	$Status = $_REQUEST['Status'];
	$Entry_Date = $_REQUEST['Entry_Date'];
	$Entry_Id = $row_result['Registration_Id'];
	$sql_update = "update salary_master set Date_Range = '$Date_Range', Labour_Id = '$Labour_Id', Total_Amt = '$Total_Amt', Total_Meter = '$Total_Meter', Upad_Amt = '$Upad_Amt', Re_Amt = '$Re_Amt', Grand_Total = '$Grand_Total', Re_Upad_Amt = '$Re_Upad_Amt', Status = '$Status', Entry_Date = '$Entry_Date', Entry_Id = '$Entry_Id' where Sal_Mast_Id = '$Sal_Mast_Id'";
	$sql_update_exe = mysql_query($sql_update);
	$updateGoTo = "salarylistpage?msg_up";
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
</head>
<body>
<?php include("sidemenu.php");?>
                <div class="inner">
                    <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" align="center">SALARY </h1>
                </div>
            </div>
<div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <div id="div-1" class="accordion-body collapse in body">
            <form class="form-horizontal" method="post" onsubmit="if(submitting) {
            alert('The record is being updated, please wait a moment...');
            update_form.disabled = true; 
            return false;
            }
            if(checkQuotee(this))
            {
            update_form.value = 'Updating...';
            submitting = true;
            return true; 
            }
            return false;">
            <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Salary ID :</label>
                    <div class="col-lg-8">
                    <input type="text" id="sal_Mast_Id" placeholder="" name="Sal_Mast_Id" value="<?php echo $Sal_Mast_Id; ?>" class="form-control" readonly />
                    </div>
                </div>
                       <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Date_Range :</label>
                    <div class="col-lg-8">
                    <input type="text" id="Date_Range" placeholder="" class="form-control" value="<?php echo $Date_Range; ?>" name="Date_Range" readonly />
                    </div>
                </div>
                         <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Labour :</label>
                    <div class="col-lg-8">
                    <input type="text" id="Name" placeholder="" class="form-control" value="<?php echo $Name; ?>" name="Name" readonly />
                    <input type="hidden" id="Labour_Id" placeholder="" value="<?php echo $Labour_Id; ?>" name="Labour_Id" readonly />
                    </div>
                </div>
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Total Meter :</label>
                    <div class="col-lg-8">
                    <input type="text" id="Total_Meter" placeholder="" name="Total_Meter" class="form-control" value="<?php echo $Total_Meter; ?>" readonly />
                    </div>
                </div> 
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Total Amount :</label>
                    <div class="col-lg-8">
                    <input type="text" id="Total_Amt" placeholder="" name="Total_Amt" class="form-control" value="<?php echo $Total_Amt; ?>" readonly />
                    </div>
                </div>
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Upad Amount :</label>
                    <div class="col-lg-8">
                    <input type="text" id="Upad_Amt" placeholder="" class="form-control" name="Upad_Amt" value="<?php echo $Upad_Amt; ?>" onkeypress="return isDecimalNumberKey(event)"/>
                    </div>
                </div>
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Remaining Amount :</label>
                    <div class="col-lg-8">
                    <input type="text" id="Re_Amt" placeholder="" class="form-control" name="Re_Amt" value="<?php echo $Re_Amt; ?>" readonly/>
                    </div>
                </div>
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Grand Total :</label>
                    <div class="col-lg-8">
                    <input type="text" id="Grand_Total" placeholder="" class="form-control" name="Grand_Total" value="<?php echo $Grand_Total; ?>" onkeypress="return isDecimalNumberKey(event)"/>
                    </div>
                </div>
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Remaining Upad Amount :</label>
                    <div class="col-lg-8">
                    <input type="text" id="Re_Upad_Amt" placeholder="" class="form-control" name="Re_Upad_Amt" value="<?php echo $Re_Upad_Amt; ?>" onkeypress="return isDecimalNumberKey(event)"/>
                    </div>
                </div>
                        <div class="form-group">
    <label class="control-label col-lg-4">Status :</label>
    <div class="col-lg-8">
      <select name="Status" class="form-control" id="Status">
        <option value="">--Select--</option>
	<option value="Paid" <?php if($Status == 'Paid') { echo 'selected = \"selected\"'; } ?>>Paid</option>
       <option value="Un-Paid" <?php if($Status == 'Un-Paid') { echo 'selected = \"selected\"'; } ?>>Un-Paid</option>
      </select>
      </div>
</div>
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Entry Date :</label>
                    <div class="col-lg-8">
                    <input type="text" id="Entry_Date" placeholder="" class="form-control" name="Entry_Date" value="<?php echo $Entry_Date; ?>" readonly/>
                    </div>
                </div>
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Entry #ID :</label>
                    <div class="col-lg-8">
                    <input type="text" id="Entry_Id" placeholder="" class="form-control" name="Entry_Id" value="<?php echo $Entry_Id; ?>" readonly/>
                    </div>
                </div>
                    <div style="text-align:center" class="form-actions no-margin-bottom">
                                            <a href="salarylistpage"><input type="button" value=" Back" class="btn btn-inverse btn-lg " /></a>
                                            <input type="submit" value="Update" name="update_form" id="update_form" class="btn btn-primary btn-lg "/>
                                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
                    </div>
                  </div>  
   <?php include("footer.php"); ?>
     <script src="assets/js/shortcut.js"></script>
    <script src="assets/js/googleapi.js"></script>
    <script src="assets/js/salaryupdate.js"></script>
    <script type="text/javascript">
	<?php include("shortcutkeys.php");?>
	</script>
</body>
</html>
<?php
ob_flush(); ?>