<?php include("logcode.php"); error_reporting(0); require_once('../Connections/brijesh8510.php');
include("databaseconnect.php");
date_default_timezone_set('Asia/Calcutta');
	include("webrenew.php");
if(!isset($_SESSION['User']))
	{}else{
define ("MAX_SIZE1","1000"); 
function getExtensions($str1)
{
	 $j = strrpos($str1,".");
	 if (!$j) { return ""; }
	 $l = strlen($str1) - $j;
	 $ext = substr($str1,$j+1,$l);
	 return $ext;
}
$errors = 0;
$thumbnail = $_FILES['thumbnail']['name'];
if ($thumbnail) 
{
	$filename = stripslashes($_FILES['thumbnail']['name']);
	$extension = getExtensions($filename);
	$extension = strtolower($extension);
	if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") 
		&& ($extension != "gif")&& ($extension != "JPG") && ($extension != "JPEG") 
		&& ($extension != "PNG") && ($extension != "GIF")) 
	{
		echo '<script>alert("Unknown extension!");</script>';
		$errors = 1;
	}
	else
	{
		$size=filesize($_FILES['thumbnail']['tmp_name']);
		if ($size > MAX_SIZE1*1024)
		{
			echo '<script>alert("You have exceeded the size limit!");</script>';
			$errors = 1;
		}
		else
		{
			date_default_timezone_set('Asia/Calcutta');
		$image_name = time().'.'.$extension;
		$newname1 = "thumbnailfolder/".$image_name;
		$copied = copy($_FILES['thumbnail']['tmp_name'], $newname1);
		if (!$copied) 
		{
			echo '<script>alert("Copy unsuccessfull!")</script>';
			$errors = 1;
		}
		else 
		{
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
			echo '<script>alert("You have exceeded the size limit!");</script>';
			$errors = 1;
		}
		else
		{
		date_default_timezone_set('Asia/Calcutta');
		$image_name = time().'.'.$extension;
		$newname = "imagefolder/".$image_name;
		$copied = copy($_FILES['image']['tmp_name'], $newname);
		if (!$copied) 
		{
			echo '<script>alert("Copy unsuccessfull!");</script>';
			$errors = 1;
		}
		else 
		{
$gallery_id = $_POST['gallery_id'];
$image_name = $_POST['image_name'];
$new1 = str_replace('\' ', '\'', ucwords(str_replace('\'', '\' ', strtolower($image_name))));
$sequence = $_POST['sequence'];
$status = $_POST['status'];
$Entry_Id = $row_result['Registration_Id'];
$query = mysql_query("select * from gallery where image_name='".$new1."'") or die(mysql_error());
$duplicate = mysql_num_rows($query);
if($duplicate==0)
    {
		$query1 = mysql_query("select * from gallery where sequence='".$sequence."'") or die(mysql_error());
$duplicate1 = mysql_num_rows($query1);
   if($duplicate1==0)
    {
  $query1 = mysql_query("INSERT INTO `gallery` (`gallery_id`, `image_name`, `thumbnail`, `image`, `sequence`, `status`,`Entry_Id`) VALUES (NULL, '$new1', '".$newname1."', '".$newname."', '$sequence', '$status','$Entry_Id')") or die(mysql_error());
	   $insertGoTo = "gallerylst";
	   
	     $dateact = date('Y-m-d');
	$dateactfull = date('d-m-Y        h:i:s A');
	$Partact = "New Gallery Entry<br/>Image Name : ".$new1.", Sequence : ".$sequence."<br/>Status : ".$status;
	$insactivity = "insert into activity(Activity_Id,Date,Particular,Type,Action,Datefull,Id) values(NULL,'$dateact','$Partact','Gallery - Insert','insert','$dateactfull','$Entry_Id')";
	mysql_query($insactivity); 
	
  echo '<script>alert("Record inserted....");</script>';
  echo '<script>window.location="'.$insertGoTo.'";</script>';
	}
	else
	{
		 echo '<script>alert("This sequence is allready exists....");</script>';
	}
	}
    else
    {
      echo '<script>alert("This image name is allready exists....");</script>';
	}}}}}}}}}}
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
                    <h1 class="page-header" align="center">GALLERY</h1>
                </div>
            </div>
<div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <div id="div-1" class="accordion-body collapse in body">
            <form class="form-horizontal" method="post" name="form2" enctype="multipart/form-data" onsubmit="if(submitting) {
            alert('The record is submitting, please wait a moment...');
            submit.disabled = true; 
            return false;
            }
            if(Gallery(this))
            {
            submit.value = 'Submitting...';
            submitting = true;
            return true; 
            }
            return false;">
                <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Gallery ID :</label>
                    <div class="col-lg-8">
                        <input type="text" name="gallery_id" id="gallery_id" class="form-control" value="<?php echo getNewGalleryID(); ?>" readonly/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Image Name :</label>
                    <div class="col-lg-8">
                      <input type="text" id="image_name" placeholder="image name is not changeable afterwards so enter appropriate name" class="form-control"  name="image_name" value="<?php echo $new1; ?>"/>
                      <span id="error1" style="color:#F00";></span>
                      <span id="checkno"></span>
                    </div>
                </div>
                <div id="show"></div>
                <div class="form-group">
                        <label class="control-label col-lg-4">Thumbnail :</label>
                        <div class="col-lg-8">
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="assets/img/demoUpload.jpg" alt="" /></div>
                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                <div>
                                    <span class="btn btn-file btn-primary"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input type="file" name="thumbnail" value=""/></span>
                                    <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
&nbsp;&nbsp;<span style="color:#F00";>only JPG, GIF, PNG, JPEG extensions are accepted</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-4">Image :</label>
                        <div class="col-lg-8">
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="assets/img/demoUpload.jpg" alt="" /></div>
                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                <div>
                                    <span class="btn btn-file btn-primary"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input type="file" name="image" value=""/></span>
                                    <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a> &nbsp;&nbsp;<span style="color:#F00";>only JPG, GIF, PNG, JPEG extensions are accepted</span>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Sequence :</label>
                    <div class="col-lg-8">
                      <input type="text" id="sequence" placeholder="sequence is not changeable afterwards so enter appropriate sequence" class="form-control"  name="sequence" value="<?php echo $sequence; ?>" onkeypress="return isNumberKey(event)"/>
                      <span id="check"></span>
                    </div>
                </div>
                <div id="show"></div>
                <div class="form-group">
    <label class="control-label col-lg-4">Status :</label>
    <div class="col-lg-8">
        <select class="form-control" name="status">
           <option value="Show" <?php if (!(strcmp('Show', ""))) {echo "SELECTED";} ?>>Show</option>
        <option value="Disable" <?php if (!(strcmp('Disable', ""))) {echo "SELECTED";} ?>>Disable</option>
        </select>
    </div>
</div>
                                        <div style="text-align:center" class="form-actions no-margin-bottom">
                                            <a href="gallerylst"><input type="button" value="Back" class="btn btn-inverse btn-lg " /></a>
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
<script src="assets/js/gallery.js"></script>
<script src="assets/plugins/jasny/js/bootstrap-fileupload.js"></script>
<script type="text/javascript">
<?php include("shortcutkeys.php");?>
</script>
</body>
</html>
<?php
function getNewGalleryID()
{
	include("databaseconnect.php");
	$sql="select max(gallery_id)+1 from gallery";
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