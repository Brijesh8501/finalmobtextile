<?php include("logcode.php"); error_reporting(0); require_once('../Connections/brijesh8510.php');
include("databaseconnect.php");
date_default_timezone_set("Asia/Calcutta");
$colname_rsLabour = "-1";
if (isset($_GET['Labour_Id'])) {
  $colname_rsLabour = $_GET['Labour_Id'];
}
mysql_select_db($database_brijesh8510, $brijesh8510);
$query_rsLabour = "SELECT labour_details.Labour_Id, labour_details.Name, labour_details.Photo, labour_details.Address, country1.cnt_id, country1.cnt_name, `state1`.st_id, `state1`.st_name, city1.ct_id, city1.ct_name, labour_details.Mobb_No, labour_details.Mobile_No, labour_details.W_Type_Id, labour_details.Status FROM labour_details, country1, `state1`, city1 WHERE country1.cnt_id = labour_details.cnt_id AND `state1`.st_id = labour_details.st_id AND city1.ct_id =  labour_details.ct_id AND Labour_Id = '".$colname_rsLabour."' ";
$rsLabour = mysql_query($query_rsLabour, $brijesh8510) or die(mysql_error());
$row_rsLabour = mysql_fetch_assoc($rsLabour);
$totalRows_rsLabour = mysql_num_rows($rsLabour);
if(isset($_REQUEST['update'])){
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
			$errors = 1;
		}
		else
		{
		date_default_timezone_set('Asia/Calcutta');
		$image_name=time().'.'.$extension;
		$newname="imagefolder/".$image_name;
		$copied = copy($_FILES['image']['tmp_name'], $newname);
		if (!$copied) 
		{
			echo '<script>alert("Copy unsuccessfull!");</script>';
			$errors = 1;
		}
		else 
		{
$Labour_Id = $_POST['Labour_Id'];
$Name = $_POST['Name'];
$new1 = str_replace('\' ', '\'', ucwords(str_replace('\'', '\' ', strtolower($Name))));
$Address = $_POST['Address'];
$cnt_id = $_POST['cnt_id'];
$ct_id = $_POST['ct_id'];
$st_id = $_POST['st_id'];
$Mobb_No = $_POST['Mobb_No'];
$Mobile_No = $_POST['Mobile_No'];
$W_Type_Id = $_POST['W_Type_Id'];
$Status = $_POST['Status'];
$Entry_Id = $row_result['Registration_Id'];
$query1 = mysql_query("SELECT city1.ct_id, city1.ct_name, `state1`.st_name, `state1`.st_id, country1.cnt_id, country1.cnt_name FROM city1, `state1`, country1 WHERE `state1`.st_id = '".$st_id."' AND country1.cnt_id = '".$cnt_id."' AND city1.ct_id = '".$ct_id."' ") or die(mysql_error());
$duplicate1 = mysql_num_rows($query1);
   if($duplicate1==0)
    {
       echo '<script>alert("Country city state are not match....");</script>';  
	}
	else
	{
  $updateSQL = "UPDATE labour_details SET Name='".$new1."', Photo='".$newname."', Address='".$Address."',cnt_id='".$cnt_id."', st_id='".$st_id."', ct_id='".$ct_id."', Mobb_No='".$Mobb_No."', Mobile_No='".$Mobile_No."', W_Type_Id='".$W_Type_Id."', Status='".$Status."', Entry_Id='".$Entry_Id."' WHERE Labour_Id='".$Labour_Id."'";
  mysql_select_db($database_brijesh8510, $brijesh8510);
  $Result1 = mysql_query($updateSQL, $brijesh8510) or die(mysql_error());
  unlink($row_rsLabour['Photo']);
  
  $selectquality = mysql_query("select W_Type_Name from work_type where W_Type_Id = '$W_Type_Id'");
	   $selectqualityfetch = mysql_fetch_array($selectquality);
	   
    $dateact = date('Y-m-d');
	$dateactfull = date('d-m-Y        h:i:s A');
	$Partact = "Labour Entry<br/>Labour : ".$new1.", Work-Type : ".$selectqualityfetch['W_Type_Name']."<br/>Status : ".$Status;
	$insactivity = "insert into activity(Activity_Id,Date,Particular,Type,Action,Datefull,Id) values(NULL,'$dateact','$Partact','Labour - Update','update','$dateactfull','$Entry_Id')";
	mysql_query($insactivity); 
	
  $updateGoTo = "labourprofilelistpage";
   echo '<script>alert("Record updated....");</script>';
  echo '<script>window.location="'. $updateGoTo.'";</script>';
	}}}}}
elseif($image==""){
$Labour_Id = $_POST['Labour_Id'];
$Name = $_POST['Name'];
$new1 = str_replace('\' ', '\'', ucwords(str_replace('\'', '\' ', strtolower($Name))));
$Address = $_POST['Address'];
$cnt_id = $_POST['cnt_id'];
$ct_id = $_POST['ct_id'];
$st_id = $_POST['st_id'];
$Mobb_No = $_POST['Mobb_No'];
$Mobile_No = $_POST['Mobile_No'];
$W_Type_Id = $_POST['W_Type_Id'];
$Status = $_POST['Status'];
$Entry_Id = $row_result['Registration_Id'];
$query1 = mysql_query("SELECT city1.ct_id, city1.ct_name, `state1`.st_name, `state1`.st_id, country1.cnt_id, country1.cnt_name FROM city1, `state1`, country1 WHERE `state1`.st_id = '".$st_id."' AND country1.cnt_id = '".$cnt_id."' AND city1.ct_id = '".$ct_id."' ") or die(mysql_error());
$duplicate1 = mysql_num_rows($query1);
   if($duplicate1==0)
    {
       echo '<script>alert("Country city state are not match....");</script>';  
	}
	else
	{
  $updateSQL = "UPDATE labour_details SET Name='".$new1."', Address='".$Address."',cnt_id='".$cnt_id."', st_id='".$st_id."', ct_id='".$ct_id."', Mobb_No='".$Mobb_No."', Mobile_No='".$Mobile_No."', W_Type_Id='".$W_Type_Id."', Status='".$Status."', Entry_Id='".$Entry_Id."' WHERE Labour_Id='".$Labour_Id."'";
  mysql_select_db($database_brijesh8510, $brijesh8510);
  $Result1 = mysql_query($updateSQL, $brijesh8510) or die(mysql_error());
  $updateGoTo = "labourprofilelistpage";
   echo '<script>alert("Record updated....");</script>';
  echo '<script>window.location="'. $updateGoTo.'";</script>';
	}
}
}}
mysql_select_db($database_brijesh8510, $brijesh8510);
$query_wrktype = "SELECT * FROM work_type";
$wrktype = mysql_query($query_wrktype, $brijesh8510) or die(mysql_error());
$row_wrktype = mysql_fetch_assoc($wrktype);
$totalRows_wrktype = mysql_num_rows($wrktype);

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
  <link rel="stylesheet" href="assets/css/joint-jquery-ui-datepicker.css">
    <link rel="stylesheet" href="assets/css/bootstrap-fileupload.min.css" />
</head>
<body>
<?php include("sidemenu.php"); ?>
             <div class="inner">
                    <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" align="center">LABOUR</h1>
                </div>
            </div>
<div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <div id="div-1" class="accordion-body collapse in body">
            <form class="form-horizontal" method="post" name="form2" onsubmit="if(submitting) {
            alert('The record is updating, please wait a moment...');
            update.disabled = true; 
            return false;
            }
            if(Labourupd(this))
            {
            update.value = 'Updating...';
            submitting = true;
            return true; 
            }
            return false;" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Labour ID :</label>
                    <div class="col-lg-8">
                      <input type="text" id="Labour_Id" placeholder="" class="form-control" value="<?php echo $row_rsLabour['Labour_Id']; ?>" name="Labour_Id" readonly />
                    </div>
                </div>
                <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Name :</label>
                    <div class="col-lg-8">
                      <input type="text" id="text" placeholder="Labour Name" class="form-control" value="<?php echo htmlentities($row_rsLabour['Name'], ENT_COMPAT, 'UTF-8'); ?>" name="Name" readonly />
                   </div>
                </div>
                <div class="form-group">
                        <label class="control-label col-lg-4">Labour Photo :</label>
                        <div class="col-lg-8">
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="<?php echo htmlentities($row_rsLabour['Photo'], ENT_COMPAT, 'UTF-8'); ?>" alt="" /></div>
                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                <div>
                                    <span class="btn btn-file btn-primary"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input type="file" value="<?php echo htmlentities($row_rsLabour['Photo'], ENT_COMPAT, 'UTF-8'); ?>" name="image" id="image" /></span>
                                    <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a> &nbsp;&nbsp;<span style="color:#F00";>only JPG, GIF, PNG, JPEG extensions are accepted</span>
                                </div>
                            </div>
                        </div>
                    </div>
                  <div class="form-group">
                    <label for="autosize" class="control-label col-lg-4">Address :</label>
                    <div class="col-lg-8">
                      <textarea name="Address" class="form-control" id="autosize"><?php echo htmlentities($row_rsLabour['Address'], ENT_COMPAT, 'UTF-8'); ?></textarea>
                      <span id="auto" style="color:#F00";></span>
                    </div>
                </div>  
                 <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">City :</label>
   <div class="col-lg-8">
                    <input type="text" placeholder="" class="form-control" name="ct_name" id="ct_name" value="<?php echo htmlentities($row_rsLabour['ct_name'], ENT_COMPAT, 'UTF-8'); ?>" />
                     <input type="hidden" name="ct_id" id="ct_id" value="<?php echo htmlentities($row_rsLabour['ct_id'], ENT_COMPAT, 'UTF-8'); ?>" />
                   </div>
                </div>
<div class="form-group">
                    <label for="text2" class="control-label col-lg-4">State :</label>
                    <div class="col-lg-8">
                    <input type="text" placeholder="" class="form-control" name="st_name" id="st_name" value="<?php echo htmlentities($row_rsLabour['st_name'], ENT_COMPAT, 'UTF-8'); ?>" readonly/>
                     <input type="hidden" name="st_id" id="st_id" value="<?php echo htmlentities($row_rsLabour['st_id'], ENT_COMPAT, 'UTF-8'); ?>" />
                   </div>
                </div>
                <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Country :</label>
                    <div class="col-lg-8">
                    <input type="text" placeholder="" class="form-control" name="cnt_name" id="cnt_name" value="<?php echo htmlentities($row_rsLabour['cnt_name'], ENT_COMPAT, 'UTF-8'); ?>" readonly/>
                     <input type="hidden" name="cnt_id" id="cnt_id" value="<?php echo htmlentities($row_rsLabour['cnt_id'], ENT_COMPAT, 'UTF-8'); ?>" />
                   </div>
                </div>
<div class="form-group">
                  <label for="text2" class="control-label col-lg-4">Mobile No :</label>
                    <div class="col-lg-8">
                    <input type="text" id="text" placeholder="" class="form-control" name="Mobb_No" value="<?php echo htmlentities($row_rsLabour['Mobb_No'], ENT_COMPAT, 'UTF-8'); ?>" onkeypress="return isNumberKey(event)"/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Alternate Mobile No :</label>
                    <div class="col-lg-8">
                    <input type="text" id="text" placeholder="" class="form-control" name="Mobile_No" value="<?php echo htmlentities($row_rsLabour['Mobile_No'], ENT_COMPAT, 'UTF-8'); ?>" onkeypress="return isNumberKey(event)"/>
                    </div>
                </div>
                    <div class="form-group">
<label class="control-label col-lg-4">Work Type :</label>
<div class="col-lg-8">
  <select name="W_Type_Id" class="form-control">
    <option value="">--Select--</option>
     <?php 
do {  
?>
                <option value="<?php echo $row_wrktype['W_Type_Id']?>" <?php if (!(strcmp($row_wrktype['W_Type_Id'], htmlentities($row_rsLabour['W_Type_Id'], ENT_COMPAT, 'UTF-8')))) {echo "SELECTED";} ?>><?php echo $row_wrktype['W_Type_Name']?></option>
                <?php
} while ($row_wrktype = mysql_fetch_assoc($wrktype));
?>
  </select>
 </div>
</div>
                    <div class="form-group">
    <label class="control-label col-lg-4">Status :</label>
    <div class="col-lg-8">
      <select name="Status" class="form-control">
        <option value="">--Select--</option>
        <option value="Meter-Join" <?php if (!(strcmp("Meter-Join", htmlentities($row_rsLabour['Status'], ENT_COMPAT, 'UTF-8')))) {echo "SELECTED";} ?>>Meter-Join</option>
                <option value="Meter-Left" <?php if (!(strcmp("Meter-Left", htmlentities($row_rsLabour['Status'], ENT_COMPAT, 'UTF-8')))) {echo "SELECTED";} ?>>Meter-Left</option>
                <option value="Fixed-Join" <?php if (!(strcmp("Fixed-Join", htmlentities($row_rsLabour['Status'], ENT_COMPAT, 'UTF-8')))) {echo "SELECTED";} ?>>Fixed-Join</option>
                <option value="Fixed-Left" <?php if (!(strcmp("Fixed-Left", htmlentities($row_rsLabour['Status'], ENT_COMPAT, 'UTF-8')))) {echo "SELECTED";} ?>>Fixed-Left</option>
      </select>
      </div>
</div>
                                        <div style="text-align:center" class="form-actions no-margin-bottom">
                                            <a href="labourprofilelistpage"><input type="button" value="Back" class="btn btn-inverse btn-lg " /></a>
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
 <script src="assets/js/labour.js"></script>
<script src="assets/js/jointjquerydateandpicker.js"></script>
<script src="assets/plugins/jasny/js/bootstrap-fileupload.js"></script>
<script type="text/javascript">
<?php include("shortcutkeys.php");?>
</script>
</body>
</html>
<?php
mysql_free_result($wrktype);
mysql_free_result($rsLabour);
ob_flush(); ?>