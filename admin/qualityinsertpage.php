<?php include("logcode.php"); require_once('../Connections/brijesh8510.php'); 
date_default_timezone_set('Asia/Calcutta');
	include("webrenew.php");
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
	if(!isset($_SESSION['User']))
	{}
	else
	{
   mysql_select_db($database_brijesh8510, $brijesh8510);
$Quality_Id = $_POST['Quality_Id'];
$Quality_Name = $_POST['Quality_Name'];
$new1 = strtoupper($Quality_Name);
$Description = $_POST['Description'];
if($row_result['Role']=='Admin' || $row_result['Role']=='Manager' )
				{
$Labour_Rate = $_POST['Labour_Rate'];
				}
$Entry_Id = $row_result['Registration_Id'];
if($row_result['Role']=='Admin' || $row_result['Role']=='Manager' )
				{
	$query = mysql_query("select * from quality_details where Quality_Name='".$new1."' ") or die(mysql_error());
$duplicate = mysql_num_rows($query);
   if($duplicate==0)
    {
      $query1 = mysql_query("INSERT INTO `quality_details` (`Quality_Id`, `Quality_Name`, `Description`,`Labour_Rate`, `Entry_Id`) VALUES (NULL, '$new1', '$Description','$Labour_Rate', '$Entry_Id');") or die(mysql_error());
	  
	  $dateact = date('Y-m-d');
	$dateactfull = date('d-m-Y        h:i:s A');
	$Partact = "New Quality Entry<br/>Quality Name : ".$new1;
	$insactivity = "insert into activity(Activity_Id,Date,Particular,Type,Action,Datefull,Id) values(NULL,'$dateact','$Partact','Quality - Insert','insert','$dateactfull','$Entry_Id')";
	mysql_query($insactivity); 
	
	   $insertGoTo = "qualitylistpage";
  echo '<script>alert("Record inserted....");</script>';
  echo '<script>window.location="'.$insertGoTo.'";</script>';
    }
    else
    {
      echo '<script>alert("This quality is allready exists....");</script>';
    }
}
else if($row_result['Role']=='Supervisor' || $row_result['Role']=='Accountant')
{
$query = mysql_query("select * from quality_details where Quality_Name='".$new1."' ") or die(mysql_error());
$duplicate = mysql_num_rows($query);
   if($duplicate==0)
    {
      $query1 = mysql_query("INSERT INTO `quality_details` (`Quality_Id`, `Quality_Name`, `Description`, `Entry_Id`) VALUES (NULL, '$new1', '$Description', '$Entry_Id');") or die(mysql_error());
	  
	   $dateact = date('Y-m-d');
	$dateactfull = date('d-m-Y        h:i:s A');
	$Partact = "New Quality Entry<br/>Quality Name : ".$new1;
	$insactivity = "insert into activity(Activity_Id,Date,Particular,Type,Action,Datefull,Id) values(NULL,'$dateact','$Partact','Quality - Insert','insert','$dateactfull','$Entry_Id')";
	mysql_query($insactivity); 
	
	   $insertGoTo = "qualitylistpage";
  echo '<script>alert("Record inserted....");</script>';
  echo '<script>window.location="'.$insertGoTo.'";</script>';
    }
    else
    {
      echo '<script>alert("This quality is allready exists....");</script>';
    }}}}
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
                <?php include("internetconnectpanel.php"); ?>
                    <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" align="center">QUALITY</h1>
                </div>
            </div>
<div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <div id="div-1" class="accordion-body collapse in body">
            <form class="form-horizontal" method="post" name="form1" onsubmit="if(submitting) {
            alert('The record is submitting, please wait a moment...');
            submit.disabled = true; 
            return false;
            }
            if(Quality(this))
            {
            submit.value = 'Submitting...';
            submitting = true;
            return true; 
            }
            return false;">
               <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Quality ID :</label>
                    <div class="col-lg-8">
                      <input type="text" class="form-control" id="Quality_Id" name="Quality_Id" value="<?php echo getNewQualityID(); ?>" readonly />
                    </div>
                </div> 
                <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Quality :</label>
                    <div class="col-lg-8">
                      <input type="text" id="Quality_Name" placeholder="Quality is not changeable afterwards so enter appropriate quality" class="form-control" name="Quality_Name" value="<?php if(isset($_POST["MM_insert"])) { echo $Quality_Name; } ?>" /><span id="error2" style="color:#F00";></span>
                      <span id="checkno"></span>
                    </div>
                </div>
                <div id="show"></div>
                <div class="form-group">
                    <label for="autosize" class="control-label col-lg-4">Description :</label>
                    <div class="col-lg-8">
                      <textarea name="Description" class="form-control" placeholder="" id="autosize"><?php if(isset($_POST["MM_insert"])) { echo $Description; } ?></textarea>
                      <span id="auto" style="color:#F00";></span>
                   </div>
                </div>
                <?php if($row_result['Role']=='Admin' || $row_result['Role']=='Manager' )
				{
					?>
                 <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Labour Rate :</label>
                    <div class="col-lg-8">
                      <input type="text" id="Labour_Rate" placeholder="Labour rate for quality " class="form-control" name="Labour_Rate" value="<?php if(isset($_POST["MM_insert"])) { echo $Labour_Rate; } ?>" onkeypress="return isDecimalNumberKey(event)" /><span style="color:#F00";>(Optional)</span>
                    </div>
                </div>
                <?php }
				else if($row_result['Role']=='Supervisor' || $row_result['Role']=='Accountant')
				{
					echo '<center style="color:#F00;">'."If you want to set labour rate for this quality then please contact admin or manager".'</center>';
				}
				?>
                                        <div style="text-align:center" class="form-actions no-margin-bottom">
                                           <a href="qualitylistpage"> <input type="button" value=" Back" class="btn btn-inverse btn-lg " /></a>
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
                                            <input type="submit" value="Submit" name="submit" class="btn btn-primary btn-lg " />
                                            <input type="hidden" name="MM_insert" value="form1">
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
     <script src="assets/js/quality.js"></script>
     <script type="text/javascript">
	 <?php include("shortcutkeys.php");?>
	 </script>
     </body>
</html>
<?php
function getNewQualityID()
{
	include("databaseconnect.php");
	$sql="select max(Quality_Id)+1 from quality_details";
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