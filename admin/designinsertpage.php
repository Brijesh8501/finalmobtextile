<?php include("logcode.php"); error_reporting(0); require_once('../Connections/brijesh8510.php'); 
include("databaseconnect.php");
date_default_timezone_set('Asia/Calcutta');
	include("webrenew.php");
if(!isset($_SESSION['User']))
	{}else{
define ("MAX_SIZE","1000"); 
function getExtension($str)
{
	 $i = strrpos($str,".");
	 if (!$i) { return ""; }
	 $l = strlen($str) - $i;
	 $ext = substr($str,$i+1,$l);
	 return $ext;
}
$errors = 0;
$image = $_FILES['image']['name'];
if ($image) 
{
	$filename = stripslashes($_FILES['image']['name']);
	$extension = getExtension($filename);
	$extension = strtolower($extension);
	if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") 
		&& ($extension != "gif")&& ($extension != "JPG") && ($extension != "JPEG") 
		&& ($extension != "PNG") && ($extension != "GIF")) 
	{
		echo '<script>alert("Unknown extension!")</script>';
		$errors = 1;
	}
	else
	{
		$size = filesize($_FILES['image']['tmp_name']);
		if ($size > MAX_SIZE*1024)
		{
			echo '<script>alert("You have exceeded the size limit!")</script>';
			$errors = 1;
		}
		else
		{
			$Design = $_POST['Design'];
 $Quality_Id = $_POST['Quality_Id'];
 $new1 = strtoupper($Design);
 $Entry_Id = $row_result['Registration_Id'];
 $query = mysql_query("select * from design_details where Design='".$new1."' ") or die(mysql_error());
$duplicate = mysql_num_rows($query);
   if($duplicate==0)
    {
		date_default_timezone_set('Asia/Calcutta');
		$image_name = time().'.'.$extension;
		$newname = "imagefolder/".$image_name;
		$copied = copy($_FILES['image']['tmp_name'], $newname);
		if (!$copied) 
		{
			echo '<script>alert("Copy unsuccessfull!")</script>';
			$errors = 1;
		}
		else 
		{
 
      $query1 = mysql_query("INSERT INTO `design_details` (`Design_Id`, `Design`, `Quality_Id`, `Photo`, `Entry_Id`) VALUES (NULL, '$new1', '$Quality_Id', '".$newname."', '$Entry_Id')") or die(mysql_error());
	   $insertGoTo = "deswignlistpage";
	   
	   $selectquality = mysql_query("select Quality_Name from quality_details where Quality_Id = '$Quality_Id'");
	   $selectqualityfetch = mysql_fetch_array($selectquality);
	   
	    $dateact = date('Y-m-d');
	$dateactfull = date('d-m-Y        h:i:s A');
	$Partact = "New Design Entry<br/>Design : ".$new1.", Quality : ".$selectqualityfetch['Quality_Name'];
	$insactivity = "insert into activity(Activity_Id,Date,Particular,Type,Action,Datefull,Id) values(NULL,'$dateact','$Partact','Design - Insert','insert','$dateactfull','$Entry_Id')";
	mysql_query($insactivity); 
	
  echo '<script>alert("Record inserted....");</script>';
  echo '<script>window.location="'.$insertGoTo.'";</script>';
		}
    }
    else
    {
      echo '<script>alert("This design-quality is allready exists....");</script>';
    }}}}}
mysql_select_db($database_brijesh8510, $brijesh8510);
$query_quaa = "SELECT * FROM quality_details";
$quaa = mysql_query($query_quaa, $brijesh8510) or die(mysql_error());
$row_quaa = mysql_fetch_assoc($quaa);
$totalRows_quaa = mysql_num_rows($quaa);
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
 <link rel="stylesheet" href="assets/css/bootstrap-fileupload.min.css" />
 </head>
<body>
<?php include("sidemenu.php"); ?>
              <div class="inner">
                    <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" align="center">DESIGN</h1>
                </div>
            </div>
<div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <div id="div-1" class="accordion-body collapse in body">
            <form class="form-horizontal" method="post" name="form1" enctype="multipart/form-data" onsubmit="if(submitting) {
            alert('The record is submitting, please wait a moment...');
            submit.disabled = true; 
            return false;
            }
            if(Designpage(this))
            {
            submit.value = 'Submitting...';
            submitting = true;
            return true; 
            }
            return false;">
            <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Design Code :</label>
                    <div class="col-lg-8">
                        <input type="text" name="Design_Id" id="Design_Id" class="form-control" value="<?php echo getNewDesignID(); ?>" readonly>
                    </div>
                </div>
              <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Design :</label>
                    <div class="col-lg-8">
                      <input type="text" id="Design" placeholder="Design Code/Name" class="form-control" name="Design" value="<?php echo $new1; ?>" />
                    <span id="error1" style="color:#F00";></span>
                    <span id="checkno"></span>
                    </div>
                </div>
                <div id="show"></div>
                <div class="form-group">
<label class="control-label col-lg-4">Quality :</label>
<div class="col-lg-8">
  <select name="Quality_Id" class="form-control">
    <option value="">--Select--</option>
    <?php 
do {  
?>
        <option value="<?php echo $row_quaa['Quality_Id']?>" ><?php echo $row_quaa['Quality_Name']?></option>
        <?php
}while($row_quaa = mysql_fetch_assoc($quaa));
  $rows = mysql_num_rows($quaa);
  if($rows > 0) {
      mysql_data_seek($quaa, 0);
	  $row_quaa = mysql_fetch_assoc($quaa);
  }
?>
  </select>
 </div>
</div>
<div class="form-group">
                        <label class="control-label col-lg-4">Image :</label>
                        <div class="col-lg-8">
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="assets/img/demoUpload.jpg" alt="" /></div>
                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                <div>
                                    <span class="btn btn-file btn-primary"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input type="file" name="image" value="<?php echo $newname; ?>"  /></span>
                                    <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a> &nbsp;&nbsp;<span style="color:#F00";>only JPG, GIF, PNG, JPEG extensions are accepted</span>
                                </div>
                            </div>
                        </div>
                    </div>
                                        <div style="text-align:center" class="form-actions no-margin-bottom">
                                         <a href="deswignlistpage">   <input type="button" value=" Back" class="btn btn-inverse btn-lg " /></a>
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
  <script src="assets/js/design.js"></script>
<script src="assets/plugins/jasny/js/bootstrap-fileupload.js"></script>
<script type="text/javascript">
<?php include("shortcutkeys.php");?>
</script>
     </body>
</html>
<?php
function getNewDesignID()
{
	include("databaseconnect.php");
	$sql="select max(Design_Id)+1 from design_details";
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
mysql_free_result($quaa); ob_flush(); ?>
