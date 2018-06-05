<?php include("logcode.php");
include("databaseconnect.php");
date_default_timezone_set("Asia/Calcutta");
if(isset($_REQUEST['upd']))
{
	$Company_About_Id = $_REQUEST['Company_About_Id'];
	$sel_comp = "select * from company_about";
	$sel_exe = mysql_query($sel_comp);
	$sel_fetch = mysql_fetch_array($sel_exe);
	$Company_About_Id = $sel_fetch['Company_About_Id'];
	$About_Us = $sel_fetch['About_Us'];
	}
if(isset($_REQUEST['update']))
{
	if(!isset($_SESSION['User']))
	{
	}
	else
	{
	$Company_About_Id = $_REQUEST['Company_About_Id'];
	$About_Us = $_REQUEST['About_Us'];
	$update = "update company_about set About_Us = '$About_Us' where Company_About_Id = '$Company_About_Id'";
	$upd_exe = mysql_query($update);
	
	 $dateact = date('Y-m-d');
	$dateactfull = date('d-m-Y        h:i:s A');
	$Entry_Id = $row_result['Registration_Id'];
	$Partact = "Company-About Us Entry<br/>About Us : ".$About_Us;
	$insactivity = "insert into activity(Activity_Id,Date,Particular,Type,Action,Datefull,Id) values(NULL,'$dateact','$Partact','About Us - Update','update','$dateactfull','$Entry_Id')";
	mysql_query($insactivity); 
	
	 $updateGoTo = "company_aboutlist";
  echo '<script>alert("Record updated....");</script>';
  echo '<script>window.location="'.$updateGoTo.'";</script>';
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
                    <h1 class="page-header" align="center">COMPANY-ABOUT US</h1>
                </div>
            </div>
<div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <div id="div-1" class="accordion-body collapse in body">
            <form class="form-horizontal" method="post" name="form1" onsubmit="if(submitting) {
            alert('The record is being submitting, please wait a moment...');
            update.disabled = true; 
            return false;
            }
            if(Aboutus(this))
            {
            update.value = 'Updating...';
            submitting = true;
            return true; 
            }
            return false;">
            <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Company-About ID :</label>
                    <div class="col-lg-8">
                        <input type="text" name="Company_About_Id" id="Company_About_Id" class="form-control" value="<?php echo $Company_About_Id;?>" readonly/>
                    </div>
                </div>
                 <div class="form-group">
                    <label for="autosize" class="control-label col-lg-4">About Us :</label>
                    <div class="col-lg-8">
                      <textarea name="About_Us" class="form-control" id="autosize"><?php echo $About_Us; ?></textarea>
                    <span id="auto" style="color:#F00";></span>
                    </div>
                </div>
                                        <div style="text-align:center" class="form-actions no-margin-bottom">
                                            <a href="company_aboutlistpage"><input type="button" value="Back" class="btn btn-inverse btn-lg " /></a>
                                            <input type="submit" value="Update" name="update" class="btn btn-primary btn-lg " />
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
	$('#Company_About_Id').focus();
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
	    var submitting = false;
    function Aboutus(mff)
{
if(mff.About_Us.value=="")
    {
       alert("About us is required");
       mff.About_Us.focus();
       return false;
    }
 return true;
} 
<?php include("shortcutkeys.php");?> 
</script>
</body>
</html>
<?php
 ob_flush(); ?>