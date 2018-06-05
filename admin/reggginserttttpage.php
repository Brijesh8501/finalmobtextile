<?php include("logcode.php"); 
error_reporting(0); require_once('../Connections/brijesh8510.php'); 
include("databaseconnect.php");
date_default_timezone_set('Asia/Calcutta');
	include("webrenew.php");
	if($row_result['Role']=='Admin')
{
	
}
else
{
	
	echo '<script>alert("You have no rights to view this page");</script>';
	$updateGoTo = "index";
  echo '<script>window.location="'.$updateGoTo.'";</script>';
}
if(!isset($_SESSION['User']))
	{}else{
		if ($_SESSION["codereg"] == $_POST["captcha"]) {
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
$Photo = $_FILES['Photo']['name'];
if ($Photo) 
{
	$filename = stripslashes($_FILES['Photo']['name']);
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
		$size = filesize($_FILES['Photo']['tmp_name']);
		if ($size > MAX_SIZE*1024)
		{
			echo '<script>alert("You have exceeded the size limit!");</script>';
			$errors = 1;
		}
		else
		{
		
$Registration_Id = $_POST['Registration_Id'];
$Name = $_POST['Name'];
$new1 = strtoupper($Name);
$Role = $_POST['Role'];
$Address = $_POST['Address'];
$ct_name = $_POST['ct_name'];
$cnt_name = $_POST['cnt_name'];
$st_name = $_POST['st_name'];
$ct_id = $_POST['ct_id'];
$cnt_id = $_POST['cnt_id'];
$st_id = $_POST['st_id'];
$Mob_No = $_POST['Mob_No'];
$Mobile_No = $_POST['Mobile_No'];
$Email_Id = $_POST['Email_Id'];
$Status = $_POST['Status'];
$Username = $_POST['Username'];
$User = strtoupper($Username);
$Password = gzdeflate(str_rot13($_POST['Password']));
$Entry_Id = $row_result['Registration_Id'];
$query = mysql_query("select * from registration_details where registration_details.Name='".$new1."' ") or die(mysql_error());
$duplicate = mysql_num_rows($query);
   if($duplicate==0)
    {
		$query3 = mysql_query("select * from registration_details where registration_details.Username='".$User."' ") or die(mysql_error());
$duplicate3 = mysql_num_rows($query3);
   if($duplicate3==0)
    {
		$query10 = mysql_query("select * from registration_details where registration_details.Email_Id='".$Email_Id."' ") or die(mysql_error());
$duplicate10 = mysql_num_rows($query10);
		if($duplicate10==0)
		{
			$query1 = mysql_query("SELECT city1.ct_id, city1.ct_name, `state1`.st_name, `state1`.st_id, country1.cnt_id, country1.cnt_name FROM city1, `state1`, country1 WHERE `state1`.st_id = '".$st_id."' AND country1.cnt_id = '".$cnt_id."' AND city1.ct_id = '".$ct_id."' ") or die(mysql_error());
$duplicate1 = mysql_num_rows($query1);
   if($duplicate1==0)
    {
       echo '<script>alert("Country city state are not match....");</script>';  
	}
	else
	{
		date_default_timezone_set('Asia/Calcutta');
		$image_name = time().'.'.$extension;
		$newname = "imagefolder/".$image_name;
		$copied = copy($_FILES['Photo']['tmp_name'], $newname);
		if (!$copied) 
		{
			echo '<sript>alert("Copy unsuccessfull!");</script>';
			$errors = 1;
		}
		else 
		{
      $query2 = mysql_query("INSERT INTO `registration_details` (`Registration_Id`, `Role`, `Name`, `Photo`, `Address`, `cnt_id`, `st_id`, `ct_id`, `Mob_No`, `Mobile_No`, `Email_Id`, `Status`, `Username`, `Password`,`Entry_Id`) VALUES (NULL, '$Role', '$new1', '$newname', '$Address', '$cnt_id', '$st_id', '$ct_id', '$Mob_No', '$Mobile_No', '$Email_Id', '$Status', '$User', '$Password', '$Entry_Id')") or die(mysql_error());
	  
	   $dateact = date('Y-m-d');
	$dateactfull = date('d-m-Y        h:i:s A');
	$Partact = "New Registration Entry<br/>Name : ".$new1.", Role : ".$Role."<br/>Status : ".$Status;
	$insactivity = "insert into activity(Activity_Id,Date,Particular,Type,Action,Datefull,Id) values(NULL,'$dateact','$Partact','Registration - Insert','insert','$dateactfull','$Entry_Id')";
	mysql_query($insactivity); 
	
	   $insertGoTo = "registrationlistpage";
  echo '<script>alert("Record inserted....");</script>';
  echo '<script>window.location="'.$insertGoTo.'";</script>';
		}
    }
		}
		else
		{
			echo '<script>alert("This email id is allready exists please enter another email id....");</script>';
			}
	}
	else
	{
		echo '<script>alert("This username is allready exists please enter another username....");</script>';
	}
	}
    else
    {
      echo '<script>alert("This registration name is allready exists....");</script>';
    }
	}}}}
	else
	{
	   $msg = "* Enter valid captcha code";
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
    <link rel="stylesheet" href="assets/css/joint-jquery-ui-datepicker.css">
    <link rel="stylesheet" href="assets/css/bootstrap-fileupload.min.css" />
     <style type="text/css">
	#imgdiv{
width:160px;	
float:left;
margin-left:20px;
}
#reload{
float:right; 
margin-right:75%; 
}
</style>
</head>
<body>
<?php include("sidemenu.php");?>
                <div class="inner">
                    <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" align="center">REGISTRATION</h1>
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
            if(Registration(this))
            {
            submit.value = 'Submitting...';
            submitting = true;
            return true; 
            }
            return false;" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Registration ID :</label>
                    <div class="col-lg-8">
                      <input type="text" id="Registration_Id" placeholder="" class="form-control" value="<?php echo getNewRegistrationID(); ?>" name="Registration_Id" readonly />
                    </div>
                </div>
                <div class="form-group">
<label class="control-label col-lg-4">Role :</label>
<div class="col-lg-8">
  <select name="Role" class="form-control">
    <option value="">--Select--</option>
      <option value="Admin" <?php if (!(strcmp('Admin', ""))) {echo "SELECTED";} ?>>Admin</option>
             <option value="Supervisor" <?php if (!(strcmp('Supervisor', ""))) {echo "SELECTED";} ?>>Supervisor</option>
             <option value="Manager" <?php if (!(strcmp('Manager', ""))) {echo "SELECTED";} ?>>Manager</option>
             <option value="Accountant" <?php if (!(strcmp('Accountant', ""))) {echo "SELECTED";} ?>>Accountant</option><?php if($row_result['Role']=='Company') {?>
             <option value="Company" <?php if (!(strcmp('Company', ""))) {echo "SELECTED";} ?>>Company</option>
             <?php } ?>
  </select>
 </div>
</div>
                <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Name :</label>
                    <div class="col-lg-8">
                      <input type="text" id="Name" placeholder="registration name is not changeable afterwards so enter appropriate name" class="form-control" name="Name" value="<?php echo $new1; ?>" />
                      <span id="error1" style="color:#F00";></span>
                      <span id="checkna"></span>
                    </div>
                </div>
                <div id="show"></div>
                <div class="form-group">
                        <label class="control-label col-lg-4">Photo :</label>
                        <div class="col-lg-8">
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="assets/img/demoUpload.jpg" alt="" /></div>
                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                <div>
                                    <span class="btn btn-file btn-primary"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input type="file" name="Photo" value="" /></span>
                                    <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>&nbsp;&nbsp;<span style="color:#F00";>only JPG, GIF, PNG, JPEG extensions are accepted</span>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="form-group">
                    <label for="autosize" class="control-label col-lg-4">Address :</label>
                    <div class="col-lg-8">
                      <textarea name="Address" class="form-control" id="autosize"><?php echo $Address; ?></textarea>
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
                    <input type="text" id="text" placeholder="" class="form-control" name="Mob_No" value="<?php echo $Mob_No; ?>" onkeypress="return isNumberKey(event)" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Alternate Mobile No :</label>
                    <div class="col-lg-8">
                    <input type="text" id="text" placeholder="" class="form-control" name="Mobile_No" value="<?php echo $Mobile_No; ?>" onkeypress="return isNumberKey(event)" />
                    </div>
                </div>
<div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Email ID :</label>
                    <div class="col-lg-8">
                    <input type="email" id="Email_Id" placeholder="email id is not changeable afterwards so enter appropriate email id" name="Email_Id" class="form-control" value="<?php echo $Email_Id; ?>" required/>
                    <span id="checkem"></span>
                   </div>
                </div>
                    <div class="form-group">
    <label class="control-label col-lg-4">Status :</label>
    <div class="col-lg-8">
      <select name="Status" class="form-control">
      <option value="Join" <?php if (!(strcmp('Join', ""))) {echo "SELECTED";} ?>>Join</option>
             <option value="Left" <?php if (!(strcmp('Left', ""))) {echo "SELECTED";} ?>>Left</option>
      </select>
      </div>
</div>
<div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Username :</label>
                    <div class="col-lg-8">
                      <input type="text" id="Username" placeholder="username is not changeable afterwards so enter appropriate username" class="form-control" name="Username" value="<?php echo $Username; ?>" />
                    <span id="error3" style="color:#F00";></span>
                    <span id="checkus"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Password :</label>
                    <div class="col-lg-8">
                      <input class="form-control" type="password" id="pass2" name="Password" value="<?php echo $Password; ?>"/><span id="error4" style="color:#F00";></span>
                               </div>
                </div>
                <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Confirm Password :</label>
                    <div class="col-lg-8">
                      <input class="form-control" type="password" id="pass1" name="Confirm_Password"/>
                   </div>
                </div>
               <div class="form-group">
                <label class="control-label col-lg-4"></label>
                  <div class="col-lg-8">
                <div id="imgdiv"><img id="img" src="loginadmin_captchareg.php" /></div><img id="reload" src="assets/img/reload.png" />
                </div>
                </div>
                 <div class="form-group">
                 <label class="control-label col-lg-4">Captcha Code :</label>
                  <div class="col-lg-8">
                <input id="captcha1" name="captcha" placeholder="please enter captcha code here" class="form-control" type="text">&nbsp;<?php echo "<i style='color:#F00;'>$msg</i>";?>
                </div>
                </div>
                                        <div style="text-align:center" class="form-actions no-margin-bottom">
                                            <a href="registrationlistpage"><input type="button" value=" Back" class="btn btn-inverse btn-lg " /></a><?php
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
 <script src="assets/js/registration.js"></script>
<script src="assets/js/jointjquerydateandpicker.js"></script>
<script src="assets/plugins/jasny/js/bootstrap-fileupload.js"></script>
<script type="text/javascript">
<?php include("shortcutkeys.php");?>
</script>
</body>
</html>
<?php
function getNewRegistrationID()
{
	include("databaseconnect.php");
	$sql="select max(Registration_Id)+1 from registration_details";
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
mysql_free_result($role);
 ob_flush(); ?>