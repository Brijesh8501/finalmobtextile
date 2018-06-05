<?php include("logcode.php"); require_once('../Connections/brijesh8510.php'); 
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
$colname_rsLabour = "-1";
if (isset($_GET['Labour_Id'])) {
  $colname_rsLabour = $_GET['Labour_Id'];
}
mysql_select_db($database_brijesh8510, $brijesh8510);
$query_rsLabour = sprintf("SELECT labour_details.Labour_Id, labour_details.Name, labour_details.Photo, labour_details.Address,`country1`.cnt_name, `state1`.st_name, city1.ct_name, labour_details.Mobb_No, labour_details.Mobile_No, work_type.W_Type_Name, labour_details.Status, labour_details.Entry_Id FROM labour_details, `state1`, city1, country1, work_type WHERE `country1`.cnt_id = labour_details.cnt_id AND `state1`.st_id = labour_details.st_id AND city1.ct_id = labour_details.ct_id AND work_type.W_Type_Id = labour_details.W_Type_Id AND Labour_Id = %s", GetSQLValueString($colname_rsLabour, "int"));
$rsLabour = mysql_query($query_rsLabour, $brijesh8510) or die(mysql_error());
$row_rsLabour = mysql_fetch_assoc($rsLabour);
$totalRows_rsLabour = mysql_num_rows($rsLabour);
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
                    <h1 class="page-header" align="center">LABOUR</h1>
                </div>
            </div>
<div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <div id="div-1" class="accordion-body collapse in body">
            <form class="form-horizontal" method="post" name="form2">
                <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Labour ID :</label>
                    <div class="col-lg-8">
                      <input type="text" id="text2" placeholder="" class="form-control" value="<?php echo $row_rsLabour['Labour_Id']; ?>" name="Labour_Id" readonly />
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
                                <div class="fileupload-new thumbnail" style="width: 100px; height: 100px;"><img src="<?php echo $row_rsLabour['Photo']; ?>" alt="" /></div>
                            </div>
                        </div>
                    </div>
                <div class="form-group">
                    <label for="autosize" class="control-label col-lg-4">Address :</label>
                    <div class="col-lg-8">
                      <textarea name="Address" class="form-control" id="autosize" readonly><?php echo htmlentities($row_rsLabour['Address'], ENT_COMPAT, 'UTF-8'); ?></textarea>
                   </span></div>
                </div>
                <div class="form-group">
                  <label for="text2" class="control-label col-lg-4">City :</label>
                    <div class="col-lg-8">
                    <input type="text" id="text" placeholder="" class="form-control" name="ct_name" value="<?php echo $row_rsLabour['ct_name']; ?>" readonly />
                   </div>
                </div>
<div class="form-group">
                  <label for="text2" class="control-label col-lg-4">State :</label>
                    <div class="col-lg-8">
                    <input type="text" id="text" placeholder="" class="form-control" name="st_name" value="<?php echo $row_rsLabour['st_name']; ?>" readonly />
                   </div>
                </div>
                <div class="form-group">
                  <label for="text2" class="control-label col-lg-4">Country :</label>
                    <div class="col-lg-8">
                    <input type="text" id="text" placeholder="" class="form-control" name="cnt_name" value="<?php echo $row_rsLabour['cnt_name']; ?>" readonly />
                   </div>
                </div>
<div class="form-group">
                  <label for="text2" class="control-label col-lg-4">Mobile No :</label>
                    <div class="col-lg-8">
                    <input type="text" id="text" placeholder="" class="form-control" name="Mobb_No" value="<?php echo htmlentities($row_rsLabour['Mobb_No'], ENT_COMPAT, 'UTF-8'); ?>" readonly />
                   </div>
                </div>
                <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Alternate Mobile No :</label>
                    <div class="col-lg-8">
                    <input type="text" id="text" placeholder="" class="form-control" name="Mobile_No" value="<?php echo htmlentities($row_rsLabour['Mobile_No'], ENT_COMPAT, 'UTF-8'); ?>"  readonly/>
                    </div>
                </div>
                    <div class="form-group">
                  <label for="text2" class="control-label col-lg-4">Work Type :</label>
                    <div class="col-lg-8">
                    <input type="text" id="text" placeholder="" class="form-control" name="W_Type_Name" value="<?php echo htmlentities($row_rsLabour['W_Type_Name'], ENT_COMPAT, 'UTF-8');?>" readonly />
                   </div>
                </div>
                    <div class="form-group">
                  <label for="text2" class="control-label col-lg-4">Status :</label>
                    <div class="col-lg-8">
                    <input type="text" id="text" placeholder="" class="form-control" name="Status" value="<?php echo htmlentities($row_rsLabour['Status'], ENT_COMPAT, 'UTF-8'); ?>" readonly />
                   </div>
                </div>
                <div class="form-group">
                  <label for="text2" class="control-label col-lg-4">#ID :</label>
                    <div class="col-lg-8">
                    <input type="text" id="text" placeholder="" class="form-control" name="Status" value="<?php echo htmlentities($row_rsLabour['Entry_Id'], ENT_COMPAT, 'UTF-8'); ?>" readonly />
                   </div>
                </div>
                                        <div style="text-align:center" class="form-actions no-margin-bottom">
                                            <a href="labourprofilelistpage"><input type="button" value=" Back" class="btn btn-inverse btn-lg " /></a>
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
mysql_free_result($rsLabour);
ob_flush(); ?>
