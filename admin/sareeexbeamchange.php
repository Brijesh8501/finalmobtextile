<?php  include("logcode.php");
include("databaseconnect.php");	
if(isset($_REQUEST['saree_exbeam']))
{
	if(!isset($_SESSION['User']))
	{}else
	{
	$Sa_Ex_Id = $_REQUEST['select_status'];
	$Org_Be_Mg_Meter = $_REQUEST['Org_Be_Mg_Meter'];
	$Shortage = $_REQUEST['Shortage'];
	$Shortageper = $_REQUEST['Shortageper'];
	$Remove_Date = $_REQUEST['Remove_Date'];
	date_default_timezone_set('Asia/Calcutta');
	$R_D_C = strtotime($Remove_Date);
	$R_Id = $row_result['Registration_Id'];
	$select_check = "select Fitted_Date from saree_exbeam_detailorg where Sa_Ex_Id = '$Sa_Ex_Id'";
	   $sel_ec = mysql_query($select_check);
	   $sel_ec_f = mysql_fetch_array($sel_ec);
	   $F_D = strtotime($sel_ec_f['Fitted_Date']);
	   if($R_D_C>=$F_D)
	{
	$sql = "update saree_exbeam_detailorg set Org_Be_Mg_Meter = '$Org_Be_Mg_Meter', Shortage = '$Shortage', Shortageper = '$Shortageper', Remove_Date = '$Remove_Date', R_Id = '$R_Id' where Sa_Ex_Id = '$Sa_Ex_Id'  ";
	 $res = mysql_query($sql);
	 
	echo '<script>alert("Data updated");</script>';
	}
	else
	{
		echo '<script>alert("Please give remove date properly");</script>';
	}
	}
}
?>
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
     <link rel="stylesheet" href="assets/css/datepick.css">
</head>
<body>
<?php include("sidemenu.php"); ?>
              <div class="inner">
                    <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" align="center">SAREE EXTRA BEAM</h1>
                </div>
            </div>
<div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <div id="div-1" class="accordion-body collapse in body">
            <form class="form-horizontal"  method="post" name="form1" onSubmit="if(submitting) {
            alert('The record is being updated, please wait a moment...');
            saree_exbeam.disabled = true; 
            return false;
            }
            if(checkQuotee(this))
            {
            saree_exbeam.value = 'Updating...';
            submitting = true;
            return true; 
            }
            return false;">
               <div class="form-group">
               <div class="col-lg-2">
               </div>
<div class="col-lg-10">
<label class="control-label col-lg-5">Sub-Beam-Extra ID :</label>
<div class="col-lg-7">
  <select name="select_status" id="select_status" class="form-control chzn-select" tabindex="2" data-placeholder="Choose a Country">
    <option value="">--Select--</option>
   <?php
   $sel_exbeam = "select Sa_Ex_Id from saree_exbeam_detailorg";
   $sel_exbeam_exe = mysql_query($sel_exbeam);
  while($sel_exbeam_fetch = mysql_fetch_array($sel_exbeam_exe))
  {
   echo '<option value="'.$sel_exbeam_fetch['Sa_Ex_Id'].'">'.$sel_exbeam_fetch['Sa_Ex_Id'].'</option>'; 
  }
   ?>
  </select>
  </div>
  </div>
</div>
 <div id="show">
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
<script src="assets/js/sareeexbeamchange.js"></script>
<script type="text/javascript">
<?php include("shortcutkeys.php");?>
</script>
</body>
</html>
<?php
 ob_flush(); ?>