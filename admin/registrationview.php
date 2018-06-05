<?php include("logcode.php"); require_once('../Connections/brijesh8510.php');
if($row_result['Role']=='Admin')
{
	
}
else
{
	
	echo '<script>alert("You have no rights to view this page");</script>';
	$updateGoTo = "index";
  echo '<script>window.location="'.$updateGoTo.'";</script>';
}
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }
  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);
  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}
$colname_reeggg = "-1";
if (isset($_GET['Registration_Id'])) {
  $colname_reeggg = $_GET['Registration_Id'];
}
mysql_select_db($database_brijesh8510, $brijesh8510);
$query_reeggg = sprintf("SELECT registration_details.Registration_Id, registration_details.Role, registration_details.Name, registration_details.Photo, registration_details.Address, country1.cnt_name, `state1`.st_name, city1.ct_name, registration_details.Mob_No, registration_details.Mobile_No, registration_details.Email_Id, registration_details.Status, registration_details.Username, registration_details.Password, registration_details.Entry_Id FROM registration_details, country1, `state1`, city1 WHERE country1.cnt_id = registration_details.cnt_id AND `state1`.st_id = registration_details.st_id AND city1.ct_id = registration_details.ct_id AND Registration_Id = %s", GetSQLValueString($colname_reeggg, "int"));
$reeggg = mysql_query($query_reeggg, $brijesh8510) or die(mysql_error());
$row_reeggg = mysql_fetch_assoc($reeggg);
$totalRows_reeggg = mysql_num_rows($reeggg);
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
                    <h1 class="page-header" align="center">REGISTRATION</h1>
                </div>
            </div>
<div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <div id="div-1" class="accordion-body collapse in body">
            <form class="form-horizontal" method="post" name="form1" >
                <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Registration ID :</label>
                    <div class="col-lg-8">
                      <input type="text" id="text2" placeholder="" name="Registration_Id" value="<?php echo $row_reeggg['Registration_Id']; ?>" class="form-control" readonly />
                    </div>
                </div>
                <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Role :</label>
                    <div class="col-lg-8">
                      <input type="text" id="text2" placeholder="" name="" value="<?php echo $row_reeggg['Role']; ?>" class="form-control" readonly />
                    </div>
                </div>
                <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Name :</label>
                    <div class="col-lg-8">
                      <input type="text" id="text" placeholder="" name="Name" value="<?php echo htmlentities($row_reeggg['Name'], ENT_COMPAT, 'UTF-8'); ?>" class="form-control" readonly />
                    </div>
                </div>
                <div class="form-group">
                        <label class="control-label col-lg-4">Photo :</label>
                        <div class="col-lg-8">
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" style="width: 150px; height: 150px;"><img src="<?php echo htmlentities($row_reeggg['Photo'], ENT_COMPAT, 'UTF-8'); ?>" /></div>
                                </div>
                            </div>
                        </div>
                <div class="form-group">
                    <label for="autosize" class="control-label col-lg-4">Address :</label>
                    <div class="col-lg-8">
                      <textarea name="Address" class="form-control" id="autosize" readonly><?php echo htmlentities($row_reeggg['Address'], ENT_COMPAT, 'UTF-8'); ?></textarea>
                    </div>
                </div>
<div class="form-group">
                    <label for="text2" class="control-label col-lg-4">City :</label>
                    <div class="col-lg-8">
                      <input type="text" id="text" placeholder="" name="" value="<?php echo htmlentities($row_reeggg['ct_name'], ENT_COMPAT, 'UTF-8'); ?>" class="form-control" readonly />
                    </div>
                </div>
                <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">State :</label>
                    <div class="col-lg-8">
                      <input type="text" id="text" placeholder="" name="" value="<?php echo htmlentities($row_reeggg['st_name'], ENT_COMPAT, 'UTF-8'); ?>" class="form-control" readonly />
                    </div>
                </div>
                    <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Country :</label>
                    <div class="col-lg-8">
                      <input type="text" id="text" placeholder="" name="" value="<?php echo htmlentities($row_reeggg['cnt_name'], ENT_COMPAT, 'UTF-8'); ?>" class="form-control" readonly />
                    </div>
                </div>
 <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Mobile No :</label>
                    <div class="col-lg-8">
                    <input type="text" id="text" placeholder="" class="form-control" name="Mob_No" value="<?php echo htmlentities($row_reeggg['Mob_No'], ENT_COMPAT, 'UTF-8'); ?>" readonly />
                    </div>
                </div>
                <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Alternate Mobile No :</label>
                    <div class="col-lg-8">
                    <input type="text" id="text" placeholder="" class="form-control" name="Mobile_No" value="<?php echo htmlentities($row_reeggg['Mobile_No'], ENT_COMPAT, 'UTF-8'); ?>" readonly />
                    </div>
                </div>
<div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Email ID :</label>
                    <div class="col-lg-8">
                    <input type="text" id="text4" placeholder="Email ID" name="Email_Id" value="<?php echo htmlentities($row_reeggg['Email_Id'], ENT_COMPAT, 'UTF-8'); ?>" class="form-control"  readonly/>
                    </div>
                </div>
                    <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Status :</label>
                    <div class="col-lg-8">
                      <input type="text" id="text" placeholder="" name="Status" value="<?php echo htmlentities($row_reeggg['Status'], ENT_COMPAT, 'UTF-8'); ?>" class="form-control" readonly />
                    </div>
                </div>
<div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Username :</label>
                    <div class="col-lg-8">
                      <input type="text" id="text5" placeholder="Username" name="Username" value="<?php echo htmlentities($row_reeggg['Username'], ENT_COMPAT, 'UTF-8'); ?>" class="form-control"  readonly/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="pass1" class="control-label col-lg-4">Password :</label>
                    <div class="col-lg-8">
                      <input class="form-control" type="password" id="pass2" data-original-title="Please use your secure password" data-placement="top" name="Password" value="<?php echo htmlentities($row_reeggg['Password'], ENT_COMPAT, 'UTF-8'); ?>" readonly/>
                   </div>
                </div>
                 <div class="form-group">
                    <label for="pass1" class="control-label col-lg-4">#ID :</label>
                    <div class="col-lg-8">
                      <input class="form-control" type="text" id="Entry_Id" name="Entry_Id" value="<?php echo htmlentities($row_reeggg['Entry_Id'], ENT_COMPAT, 'UTF-8'); ?>" readonly/>
                   </div>
                </div>
                                        <div style="text-align:center" class="form-actions no-margin-bottom">
                                            <a href="registrationlistpage"><input type="button" value="Back" class="btn btn-inverse btn-lg " /></a>
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
	<?php include("shortcutkeys.php");?>
</script>
</body>
</html>
<?php
mysql_free_result($reeggg);
 ob_flush(); ?>