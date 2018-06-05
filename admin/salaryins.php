<?php include("logcode.php");
include("databaseconnect.php");
date_default_timezone_set('Asia/Calcutta');
	 include("webrenew.php");
if(isset($_REQUEST['makesalary']))
{
	if(!isset($_SESSION['User']))
	{}else{
	$count = $_REQUEST['count'];
	$Date_Range = $_REQUEST['Date_Range'];
	$Labour_Id = $_REQUEST['Labour_Id'];
	$Total_Meter = $_REQUEST['Total_Meter'];
	$Total_Amt = $_REQUEST['Total_Amt'];
	$Upad_Amt = $_REQUEST['Upad_Amt'];
	$Re_Amt = $_REQUEST['Re_Amt'];
	$Grand_Total = $_REQUEST['Grand_Total'];
	$Re_Upad_Amt = $_REQUEST['Re_Upad_Amt'];
	$Status = "Paid";
	date_default_timezone_set('Asia/Calcutta');
	$Entry_Date = date('Y-m-d      h:i:s a');
	$Entry_Id = $row_result['Registration_Id'];
	$fetchsize = 0;
	$fetchsize1 = 0;
	$fetchsize2 = 0;
	$fetchsize3 = 0;
	$fetchsize4 = 0;
	$fetchsize5 = 0;
	$fetchsize6 = 0;
	$fetchsize7 = 0;
	for($j=1;$j<=$count;$j++)
	{
	    $ins = "insert into salary_master (Sal_Mast_Id,Date_Range,Labour_Id,Total_Amt,Total_Meter,Upad_Amt,Re_Amt,Grand_Total,Re_Upad_Amt,Status,Entry_Date,Entry_Id) values(NULL,'".$Date_Range[$fetchsize++]."','".$Labour_Id[$fetchsize1++]."','".$Total_Amt[$fetchsize2++]."','".$Total_Meter[$fetchsize3++]."','".$Upad_Amt[$fetchsize4++]."','".$Re_Amt[$fetchsize5++]."','".$Grand_Total[$fetchsize6++]."','".$Re_Upad_Amt[$fetchsize7++]."','$Status','".$Entry_Date."','".$Entry_Id."')";
		      $ins_exe = mysql_query($ins);
	}
	$insertGoTo = "salarylistpage?msg";
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
    <link rel="stylesheet" href="assets/plugins/daterangepicker/daterangepicker-bs3.css" />
</head>
<body>
<?php include("sidemenu.php"); ?>
            <div class="inner">
                    <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" align="center">SALARY</h1>
                </div>
            </div>
<div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <div id="div-1" class="accordion-body collapse in body">
        <form class="form-horizontal" method="post" id="form" onsubmit="if(submitting) {
            alert('The record is being submitted, please wait a moment...');
            makesalary.disabled = true; 
            return false;
            }
            if(checkQuotee(this))
            {
            makesalary.value = 'Submitting...';
            submitting = true;
            return true; 
            }
            return false;">
        <div class="form-group row">
            <div class="col-lg-5" >
                </div>
                  <div class="col-lg-5">
                       <div class="form-group">
                        <div class="col-lg-8">
                            <div class="input-group">
                                <input type="text" class="form-control" value="" id="reservation" name="reservation" readonly />
                            </div>
                        </div>
                    </div>
                          <div class="col-lg-2">
                          </div>  
                        </div>
                  </div>
                   <div align="center">
                    <?php
                                            if($days_remaining<=0)
{
	echo "<strong style='color:#F00;'>* Please renew your website</strong>";
}
                                            if($days_remaining<=0)
{}
elseif($days_remaining>0)
{
?>	
                        <button class="btn btn-primary btn-grad" type="button" id="Search" name="Search"><i class="icon-search">&nbsp;Search</i></button>
                        <?php } ?>
                   </div>    
                  <hr />
                <div class="col-lg-12">
                            <div class="table-responsive" id="table">
                            </div>
                        </div>
                        <hr />
         </form>
            </div>
        </div>
    </div>
</div>
                    </div>
   <?php include("footer.php"); ?>
     <script src="assets/js/shortcut.js"></script>
<script src="assets/js/googleapi.js"></script>
<script src="assets/js/salaryins.js"></script>
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
			<?php include("shortcutkeys.php");?>
		</script>
        </body>
</html>
<?php ob_flush(); ?>