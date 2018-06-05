<?php include("logcode.php");
include("databaseconnect.php");
date_default_timezone_set('Asia/Calcutta');
	include("webrenew.php");
if(isset($_REQUEST['submit']))
{
	$Cou_Comp = strtoupper($_REQUEST['Cou_Comp']);
	$Entry_Id = $row_result['Registration_Id'];
	$query = mysql_query("select * from courier_company where Cou_Comp='".$Cou_Comp."' ") or die(mysql_error());
$duplicate = mysql_num_rows($query);
   if($duplicate==0)
    {
	$ins = "insert into courier_company(Cou_Com_Id,Cou_Comp,Entry_Id) values(NULL,'$Cou_Comp','$Entry_Id')";
	$ins_exe = mysql_query($ins);
	
	 $dateact = date('Y-m-d');
	$dateactfull = date('d-m-Y        h:i:s A');
	$Partact = "New Courier-Company Entry<br/>Company : ".$Cou_Comp;
	$insactivity = "insert into activity(Activity_Id,Date,Particular,Type,Action,Datefull,Id) values(NULL,'$dateact','$Partact','Courier-Company - Insert','insert','$dateactfull','$Entry_Id')";
	mysql_query($insactivity); 
	
	$insertGoTo = "couriercomplistpage";
  echo '<script>alert("Record inserted....");</script>';
  echo '<script>window.location="'.$insertGoTo.'";</script>';
    }
    else
    {
      echo '<script>alert("This courier-company is allready exists....");</script>';
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
                    <h1 class="page-header" align="center">COURIER-COMPANY</h1>
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
            if(Courier(this))
            {
            submit.value = 'Submitting...';
            submitting = true;
            return true; 
            }
            return false;">
            <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Courier-Company ID :</label>
                    <div class="col-lg-8">
                        <input type="text" name="Cou_Com_Id" id="Cou_Com_Id" class="form-control" value="<?php echo getNewCouComID(); ?>" readonly/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Courier-Company :</label>
                    <div class="col-lg-8">
                      <input type="text" id="Cou_Comp" class="form-control"  name="Cou_Comp" value="" />
                      <span id="error1" style="color:#F00";></span>
                    </div>
                </div>
                                        <div style="text-align:center" class="form-actions no-margin-bottom">
                                         <a href="couriercomplistpage"><input type="button" value="Back" class="btn btn-inverse btn-lg " /></a>
                                         <?php
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
    <script src="assets/js/couriercomp.js"></script>
    <script type="text/javascript">
	<?php include("shortcutkeys.php");?>
	</script>
</body>
</html>
<?php
function getNewCouComID()
{
	include("databaseconnect.php");
	$sql="select max(Cou_Com_Id)+1 from courier_company";
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