<?php include("logcode.php"); error_reporting(0); require_once('../Connections/brijesh8510.php'); 
date_default_timezone_set('Asia/Calcutta');
	include("webrenew.php");
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form2")) {
	if(!isset($_SESSION['User']))
	{
	}
	else
	{
	mysql_select_db($database_brijesh8510, $brijesh8510);
$cnt_name = $_POST['cnt_name'];
$new1 = str_replace('\' ', '\'', ucwords(str_replace('\'', '\' ', strtolower($cnt_name))));
$Entry_Id = $row_result['Registration_Id'];
$query = mysql_query("select * from country1 where cnt_name='".$new1."' ") or die(mysql_error());
$duplicate = mysql_num_rows($query);
   if($duplicate==0)
    {
  $insertSQL = mysql_query("INSERT INTO country1 (cnt_id, cnt_name, Entry_Id) VALUES ('NULL', '$new1', '$Entry_Id')") or die(mysql_error());
  $insertGoTo = "countrylistpage";
  
   $dateact = date('Y-m-d');
	$dateactfull = date('d-m-Y        h:i:s A');
	$Partact = "New Country Entry<br/>Country : ".$new1;
	$insactivity = "insert into activity(Activity_Id,Date,Particular,Type,Action,Datefull,Id) values(NULL,'$dateact','$Partact','Country - Insert','insert','$dateactfull','$Entry_Id')";
	mysql_query($insactivity); 
	
  echo '<script>alert("Record inserted....");</script>';
  echo '<script>window.location="'.$insertGoTo.'";</script>';
	}
  else
    {
      echo '<script>alert("This country is allready exists....");</script>';
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
                    <h1 class="page-header" align="center">COUNTRY</h1>
                </div>
            </div>
<div class="row">
<div class="col-lg-12">
    <div class="box dark">
          <div id="div-1" class="accordion-body collapse in body">
            <form class="form-horizontal"  name="form2"  method="post" onsubmit="if(submitting) {
            alert('The record is being submitting, please wait a moment...');
            submit.disabled = true; 
            return false;
            }
            if(Country(this))
            {
            submit.value = 'Submitting...';
            submitting = true;
            return true; 
            }
            return false;" >
              <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Country ID :</label>
                    <div class="col-lg-8">
                       <input type="text" name="cnt_id" id="cnt_id" class="form-control" value="<?php echo getNewCountryID(); ?>" readonly> 
                    </div>
                </div>
                <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Country :</label>
                    <div class="col-lg-8">
                      <input type="text" id="cnt_name" placeholder="Country Name" class="form-control"  name="cnt_name" value="<?php echo $cnt_name; ?>"  />
                      <span id="error1" style="color:#F00";></span>
                   </div>
                </div>
                                        <div style="text-align:center" class="form-actions no-margin-bottom">
                                           <a href="countrylistpage"> <input type="button" value="Back" class="btn btn-inverse btn-lg " /></a>
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
                                            <input type="submit" value="Submit" name="submit" class="btn btn-primary btn-lg " /><input type="hidden" name="MM_insert" value="form2">
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
    <script src="assets/js/country.js"></script>
    <script type="text/javascript">
	<?php include("shortcutkeys.php");?>
	</script>
</body>
</html>
<?php
function getNewCountryID()
{
	include("databaseconnect.php");
	$sql="select max(cnt_id)+1 from country1";
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
mysql_free_result($Recordset1);
ob_flush(); ?>
