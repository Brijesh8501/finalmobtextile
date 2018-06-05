<?php include("logcode.php"); require_once('../Connections/brijesh8510.php');error_reporting(0);
include("databaseconnect.php");
if(isset($_REQUEST['view']))
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
    <link rel="stylesheet" href="assets/css/MoneAdmin.css" />
    <link rel="stylesheet" href="assets/plugins/Font-Awesome/css/font-awesome.css" />
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
            <form class="form-horizontal" method="post" name="form1">
            <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Sal-Fixed ID :</label>
                    <div class="col-lg-8">
                        <input type="text" name="Sal_Fixed_Id" class="form-control" value="<?php echo $Sal_Fixed_Id; ?>" readonly/>
                    </div>
                </div>
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
<div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Number Of Beam / Attendence / ... :</label>
                    <div class="col-lg-8">
                      <input type="text" id="No_Of" placeholder="" class="form-control"  name="No_Of" value="<?php echo $No_Of;?>" readonly/>
                    </div>
                </div>
<div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Rate :</label>
                    <div class="col-lg-8">
                      <input type="text" id="Rate" placeholder="" class="form-control"  name="Rate" value="<?php echo $Rate; ?>" readonly/>
                    </div>
                </div>
<div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Amount :</label>
                    <div class="col-lg-8">
                      <input type="text" id="Amount" placeholder="" class="form-control"  name="Amount" value="<?php echo $Amount; ?>" readonly/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Upad Amount / Adjust Upad Amount :</label>
                    <div class="col-lg-8">
                      <input type="text" id="Upad_Amount" placeholder="" class="form-control"  name="Upad_Amount" value="<?php echo $Upad_Amount;?>" readonly/>
                    </div>
                </div>
<div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Grand Total :</label>
                    <div class="col-lg-8">
                      <input type="text" id="Grand_Total" placeholder="" class="form-control"  name="Grand_Total" value="<?php echo $Grand_Total;?>" readonly/>
                    </div>
                </div>
              <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Remaining Amount :</label>
                    <div class="col-lg-8">
                      <input type="text" id="Re_Amount" placeholder="" class="form-control"  name="Re_Amount" value="<?php echo $Re_Amount;?>" readonly/>
                </div>
                </div>
 <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Status :</label>
                    <div class="col-lg-8">
                      <input type="text" id="Status" placeholder="" class="form-control"  name="Status" value="<?php echo $Status;?>" readonly/>
                </div>
                </div>
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
                                        <div style="text-align:center" class="form-actions no-margin-bottom">
                                            <a href="salaryfixedlistpage"><input type="button" value="Back" class="btn btn-inverse btn-lg " /></a>
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
$(".dropdown").hover(            
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideDown("fast");
            $(this).toggleClass('open');        
        },
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideUp("fast");
            $(this).toggleClass('open');       
        }
    );
});
history.pushState(null, null);
    window.addEventListener('popstate', function(event)  {
    history.pushState(null, null);
	
    }); 
	<?php include("shortcutkeys.php");?>
   </script>
</body>
</html>
<?php
 ob_flush(); ?>