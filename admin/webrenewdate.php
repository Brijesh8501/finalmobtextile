<?php include("logcode.php"); 
include("databaseconnect.php");
$sel_date = "select * from renew_website";
$sel_exe = mysql_query($sel_date);
$sel_fetch = mysql_fetch_array($sel_exe);
$Renew_Id = $sel_fetch['Renew_Id'];
$Renew_Date = $sel_fetch['Renew_Date'];
if(isset($_REQUEST['update']))
{
$Renew_Id = $_REQUEST['Renew_Id'];
$Renew_Date = $_REQUEST['Renew_Date'];
$upd = "update renew_website set Renew_Date = '$Renew_Date' where Renew_Id = '$Renew_Id'";
$upd_exe = mysql_query($upd);
$updateGoTo = "index.php";
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
<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="stylesheet" href="assets/css/datepick.css">
     <link rel="shortcut icon" href="Icons/st85.png">
</head>
<body>   
<?php include("sidemenu.php"); ?>
                <div class="inner">
                    <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" align="center">WEBSITE RENEW</h1>
                </div>
            </div>
<div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <div id="div-1" class="accordion-body collapse in body">
            <form class="form-horizontal" method="post" name="form1" onsubmit="if(submitting) {
            alert('The record is being updating, please wait a moment...');
            update.disabled = true; 
            return false;
            }
            if(checkQuotee(this))
            {
            update.value = 'Updating...';
            submitting = true;
            return true; 
            }
            return false;">
            <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Renew ID :</label>
                    <div class="col-lg-8">
                        <input type="text" name="Renew_Id" class="form-control" value="<?php echo $Renew_Id; ?>" readonly/>
                    </div>
                </div>
                <div class="form-group">
                        <label class="control-label col-lg-4" >Date :</label>
                        <div class="col-lg-3">
                              <input class="form-control" type="text"  value="<?php echo $Renew_Date; ?>" name="Renew_Date" id="Renew_Date" readonly />
                        </div>
                    </div>
                                        <div style="text-align:center" class="form-actions no-margin-bottom">
                                            <a href="index"><input type="button" value="Back" class="btn btn-inverse btn-lg " /></a>
                                            <input type="submit" value="Update" name="update" class="btn btn-primary btn-lg " />
                                        </div>                                       
                </form>
            </div>
        </div>
    </div>
</div>
                    </div>
   <?php include("footer.php"); ?>
   <script src="assets/js/googleapi.js"></script>
<script>
         $(document).ready(function () {
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
$('#Renew_Date').datepicker({
                    format: "yyyy-mm-dd"
                });}); 
    var submitting = false;
  function checkQuotee(mff)
{
	return true;
}
 history.pushState(null, null);
    window.addEventListener('popstate', function(event)  {
    history.pushState(null, null);
	
    }); 
	</script>
    <script src="assets/js/boot.datepick.js"></script>
</body>
</html>
<?php
 ob_flush(); ?>