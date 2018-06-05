<?php include("logcode.php"); error_reporting(0); require_once('../Connections/brijesh8510.php'); 
include("databaseconnect.php");
date_default_timezone_set("Asia/Calcutta");
$colname_Recordset1 = "-1";
if (isset($_GET['Design_Id'])) {
  $colname_Recordset1 = $_GET['Design_Id'];
}
mysql_select_db($database_brijesh8510, $brijesh8510);
$query_Recordset1 = "SELECT * FROM design_details WHERE Design_Id = '".$colname_Recordset1."' ";
$Recordset1 = mysql_query($query_Recordset1, $brijesh8510) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
mysql_select_db($database_brijesh8510, $brijesh8510);
if(isset($_REQUEST['update']))
{
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
		echo '<script>alert("Unknown extension!");</script>';
		$errors = 1;
	}
	else
	{
		$size = filesize($_FILES['image']['tmp_name']);
		if ($size > MAX_SIZE*1024)
		{
			echo '<script>alert("You have exceeded the size limit!");</script>';
			$errors=1;
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
$Design_Id = $_POST['Design_Id'];
$Design = $_POST['Design'];
 $Quality_Id = $_POST['Quality_Id'];
 $new1 = strtoupper($Design);
 $Entry_Id = $row_result['Registration_Id'];
  $updateSQL = "UPDATE design_details SET Design='".$new1."', Quality_Id='".$Quality_Id."', Photo='".$newname."', Entry_Id='".$Entry_Id."' WHERE Design_Id='".$Design_Id."' ";             
  mysql_select_db($database_brijesh8510, $brijesh8510);
  $Result1 = mysql_query($updateSQL, $brijesh8510) or die(mysql_error());
  unlink($row_Recordset1['Photo']);
  
   $selectquality = mysql_query("select Quality_Name from quality_details where Quality_Id = '$Quality_Id'");
	   $selectqualityfetch = mysql_fetch_array($selectquality);
	   
	    $dateact = date('Y-m-d');
	$dateactfull = date('d-m-Y        h:i:s A');
	$Partact = "Design Entry<br/>Design : ".$new1.", Quality : ".$selectqualityfetch['Quality_Name'];
	$insactivity = "insert into activity(Activity_Id,Date,Particular,Type,Action,Datefull,Id) values(NULL,'$dateact','$Partact','Design - Update','update','$dateactfull','$Entry_Id')";
	mysql_query($insactivity); 
	
  $updateGoTo = "deswignlistpage";
  echo '<script>alert("Record updated....");</script>';
  echo '<script>window.location="'.$updateGoTo.'";</script>';
}}}}
elseif($image=="")
{
	$Design_Id = $_POST['Design_Id'];
$Design = $_POST['Design'];
 $Quality_Id = $_POST['Quality_Id'];
 $new1 = strtoupper($Design);
 $Entry_Id = $row_result['Registration_Id'];
  $updateSQL = "UPDATE design_details SET Design='".$new1."', Quality_Id='".$Quality_Id."', Entry_Id='".$Entry_Id."' WHERE Design_Id='".$Design_Id."' ";             
  mysql_select_db($database_brijesh8510, $brijesh8510);
  $Result1 = mysql_query($updateSQL, $brijesh8510) or die(mysql_error());
  $updateGoTo = "deswignlistpage";
  echo '<script>alert("Record updated....");</script>';
  echo '<script>window.location="'.$updateGoTo.'";</script>';
}
}
}
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
            alert('The record is updating, please wait a moment...');
            update.disabled = true; 
            return false;
            }
            if(Designupdpage(this))
            {
            update.value = 'Updating...';
            submitting = true;
            return true; 
            }
            return false;">
            <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Design ID :</label>
                    <div class="col-lg-8">
                        <input type="text" name="Design_Id" id="Design_Id" class="form-control" value="<?php echo $row_Recordset1['Design_Id']; ?>" readonly>
                    </div>
                </div>
              <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Design :</label>
                    <div class="col-lg-8">
                      <input type="text" id="text" placeholder="Design Code/Name" class="form-control" name="Design" value="<?php echo htmlentities($row_Recordset1['Design'], ENT_COMPAT, 'UTF-8'); ?>" readonly/>
                    </div>
                </div>
                <div class="form-group">
<label class="control-label col-lg-4">Quality :</label>
<div class="col-lg-8">
  <select name="Quality_Id" class="form-control">
    <option value="">--Select--</option>
    <?php 
do {  
?>
        <option value="<?php echo $row_quaa['Quality_Id']?>" <?php if (!(strcmp($row_quaa['Quality_Id'], htmlentities($row_Recordset1['Quality_Id'], ENT_COMPAT, 'UTF-8')))) {echo "SELECTED";} ?>><?php echo $row_quaa['Quality_Name']?></option>
        <?php
} while ($row_quaa = mysql_fetch_assoc($quaa));
?>
  </select>
  </div>
</div>
<div class="form-group">
                        <label class="control-label col-lg-4">Image :</label>
                        <div class="col-lg-8">
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="<?php echo htmlentities($row_Recordset1['Photo'], ENT_COMPAT, 'UTF-8'); ?>"></div>
                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                <div>
                                    <span class="btn btn-file btn-primary"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input type="file" name="image" value=""/></span>
                                    <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>  &nbsp;&nbsp;<span style="color:#F00";>only JPG, GIF, PNG, JPEG extensions are accepted</span>
                                </div>
                            </div>
                        </div>
                    </div>
                                        <div style="text-align:center" class="form-actions no-margin-bottom">
                                            <a href="deswignlistpage"><input type="button" value="Back" class="btn btn-inverse btn-lg " /></a>
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
  <script src="assets/js/design.js"></script>
<script src="assets/plugins/jasny/js/bootstrap-fileupload.js"></script>
<script type="text/javascript">
<?php include("shortcutkeys.php");?>
</script>
 </body>
</html>
<?php
mysql_free_result($Recordset1);
mysql_free_result($quaa);
 ob_flush(); ?>