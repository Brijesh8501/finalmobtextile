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
		echo '<script>alert("Unknown extension!");</script>';
		$errors = 1;
	}
	else
	{
		$size=filesize($_FILES['image']['tmp_name']);
		if ($size > MAX_SIZE*1024)
		{
			echo '<script>alert("You have exceeded the size limit!");</script>';
			$errors = 1;
		}
		else
		{
        
$Labour_Id = $_POST['Labour_Id'];
$Name = $_POST['Name'];
$new1 = str_replace('\' ', '\'', ucwords(str_replace('\'', '\' ', strtolower($Name))));
$Address = $_POST['Address'];
$ct_name = $_POST['ct_name'];                                  
$st_name = $_POST['st_name'];
$cnt_name = $_POST['cnt_name'];
$ct_id = $_POST['ct_id'];                                  
$st_id = $_POST['st_id'];
$cnt_id = $_POST['cnt_id'];
$Mobb_No = $_POST['Mobb_No'];
$Mobile_No = $_POST['Mobile_No'];
$W_Type_Id = $_POST['W_Type_Id'];
$Status = $_POST['Status'];
$Entry_Id = $row_result['Registration_Id'];
$query = mysql_query("select * from labour_details where Name='".$new1."' ") or die(mysql_error());
$duplicate = mysql_num_rows($query);
   if($duplicate==0)
    {
	$query1=mysql_query("SELECT city1.ct_id, city1.ct_name, `state1`.st_name, `state1`.st_id, country1.cnt_id, country1.cnt_name FROM city1, `state1`, country1 WHERE `state1`.st_id = '".$st_id."' AND country1.cnt_id = '".$cnt_id."' AND city1.ct_id = '".$ct_id."' ") or die(mysql_error());
$duplicate1=mysql_num_rows($query1);
   if($duplicate1==0)
    {
       echo '<script>alert("Country city state are not match....");</script>';  
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
		$query1 = mysql_query("INSERT INTO `labour_details` (`Labour_Id`, `Name`, `Photo`, `Address`,`cnt_id`, `st_id`, `ct_id`, `Mobb_No`, `Mobile_No`, `W_Type_Id`, `Status`, `Entry_Id`) VALUES (NULL, '$new1', '$newname', '$Address','$cnt_id', '$st_id', '$ct_id', '$Mobb_No', '$Mobile_No', '$W_Type_Id', '$Status', '$Entry_Id')") or die(mysql_error());
		
		$selectquality = mysql_query("select W_Type_Name from work_type where W_Type_Id = '$W_Type_Id'");
	   $selectqualityfetch = mysql_fetch_array($selectquality);
	   
	    $dateact = date('Y-m-d');
	$dateactfull = date('d-m-Y        h:i:s A');
	$Partact = "New Labour Entry<br/>Labour : ".$new1.", Work-Type : ".$selectqualityfetch['W_Type_Name']."<br/>Status : ".$Status;
	$insactivity = "insert into activity(Activity_Id,Date,Particular,Type,Action,Datefull,Id) values(NULL,'$dateact','$Partact','Labour - Insert','insert','$dateactfull','$Entry_Id')";
	mysql_query($insactivity); 
	
	   $insertGoTo = "labourprofilelistpage";
  echo '<script>alert("Record inserted....");</script>';
  echo '<script>window.location="'.$insertGoTo.'";</script>';
		}
		}
		}
    else
    {
      echo '<script>alert("This labour is allready exists....");</script>';
}
}
}
}
}
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
            <form class="form-horizontal"  method="post" name="form1" onsubmit="if(submitting){alert('The record is submitting, please wait a moment...'); submit.disabled = true; return false;} if(Labourins(this)){submit.value = 'Submitting...';submitting = true;return true;}return false;" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Labour ID :</label>
                    <div class="col-lg-8">
                      <input type="text" id="Labour_Id" name="Labour_Id" placeholder="" class="form-control" value="<?php echo getNewLabourID(); ?>" readonly />
                    </div>
                </div>
                <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Name :</label>
                    <div class="col-lg-8">
                      <input type="text" id="Labour_Name" placeholder="labour name is not changeable afterwards so enter appropriate name" class="form-control" name="Name" value="<?php echo $new1; ?>" />
                      <span id="error1" style="color:#F00";></span>
                      <span id="checkno"></span>
                   </div>
                </div>
                <div id="show"></div>
                <div class="form-group">
                        <label class="control-label col-lg-4">Labour Photo :</label>
                        <div class="col-lg-8">
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="assets/img/demoUpload.jpg" alt="" /></div>
                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                <div>
                                    <span class="btn btn-file btn-primary"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input type="file" name="image" value="" /></span>
                                    <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a> &nbsp;&nbsp;<span style="color:#F00";>only JPG, GIF, PNG, JPEG extensions are accepted</span>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="form-group">
                    <label for="autosize" class="control-label col-lg-4">Address :</label>
                    <div class="col-lg-8">
                      <textarea name="Address" class="form-control"  id="autosize"><?php echo $Address; ?></textarea>
                      <span id="auto" style="color:#F00";></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">City :</label>
    <div class="col-lg-8">
                    <input type="text" placeholder="" class="form-control" name="ct_name" id="ct_name" value="<?php echo $ct_name; ?>" />
                     <input type="hidden" name="ct_id" id="ct_id" value="<?php echo $ct_id; ?>" />
                   </div>
                </div>
<div class="form-group">
                    <label for="text2" class="control-label col-lg-4">State :</label>
                    <div class="col-lg-8">
                    <input type="text" placeholder="" class="form-control" name="st_name" id="st_name" value="<?php echo $st_name; ?>" readonly/>
                     <input type="hidden" name="st_id" id="st_id" value="<?php echo $st_id; ?>" />
                   </div>
                </div>
                <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Country :</label>
                    <div class="col-lg-8">
                    <input type="text" placeholder="" class="form-control" name="cnt_name" id="cnt_name" value="<?php echo $cnt_name; ?>" readonly/>
                     <input type="hidden" name="cnt_id" id="cnt_id" value="<?php echo $cnt_id; ?>" />
                   </div>
                </div>
<div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Mobile No :</label>
                    <div class="col-lg-8">
                    <input type="text" id="text" placeholder="" class="form-control" name="Mobb_No" value="<?php echo $Mobb_No; ?>" onkeypress="return isNumberKey(event)" />
                   </div>
                </div>
                <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Alternate Mobile No :</label>
                    <div class="col-lg-8">
                    <input type="text" id="text" placeholder="" class="form-control" name="Mobile_No" value="<?php echo $Mobile_No; ?>" onkeypress="return isNumberKey(event)" />
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
        <option value="<?php echo $row_wrktype['W_Type_Id']?>" ><?php echo $row_wrktype['W_Type_Name']?></option>
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
         <option value="Meter-Join" <?php if (!(strcmp('Meter-Join', ""))) {echo "SELECTED";} ?>>Meter-Join</option>
        <option value="Meter-Left" <?php if (!(strcmp('Meter-Left', ""))) {echo "SELECTED";} ?>>Meter-Left</option>
         <option value="Fixed-Join" <?php if (!(strcmp('Fixed-Join', ""))) {echo "SELECTED";} ?>>Fixed-Join</option>
        <option value="Fixed-Left" <?php if (!(strcmp('Fixed-Left', ""))) {echo "SELECTED";} ?>>Fixed-Left</option>
      </select>
      </div>
</div>
                                        <div style="text-align:center" class="form-actions no-margin-bottom">
                                           <a href="labourprofilelistpage"> <input type="button" value="Back" class="btn btn-inverse btn-lg " /></a>
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
    <script src="assets/js/labour.js"></script>
<script src="assets/js/jointjquerydateandpicker.js"></script>
<script src="assets/plugins/jasny/js/bootstrap-fileupload.js"></script>
<script type="text/javascript">
<?php include("shortcutkeys.php");?>
</script>
</body>
</html>
<?php
function getNewLabourID()
{
	include("databaseconnect.php");
	$sql="select max(Labour_Id)+1 from labour_details";
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
mysql_free_result($wrktype);
ob_flush(); ?>