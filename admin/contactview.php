﻿<?php include("logcode.php"); require_once('../Connections/brijesh8510.php');
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
$colname_Recordset1 = "-1";
if (isset($_GET['contact_id'])) {
  $colname_Recordset1 = $_GET['contact_id'];
}
mysql_select_db($database_brijesh8510, $brijesh8510);
$query_Recordset1 = sprintf("SELECT * FROM contact WHERE contact_id = %s", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysql_query($query_Recordset1, $brijesh8510) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
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
                    <h1 class="page-header" align="center">CONTACT</h1>
                </div>
            </div>
<div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <div id="div-1" class="accordion-body collapse in body">
            <form class="form-horizontal" method="post" name="form2">
            <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Contact ID :</label>
                    <div class="col-lg-8">
                        <input type="text" name="contact_id" class="form-control" value="<?php echo $row_Recordset1['contact_id']; ?>" readonly/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Name :</label>
                    <div class="col-lg-8">
                        <input type="text" name="contact_name" value="<?php echo htmlentities($row_Recordset1['contact_name'], ENT_COMPAT, 'UTF-8'); ?>" class="form-control" readonly/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Mobile Number :</label>
                    <div class="col-lg-8">
                        <input type="text"  name="mobile_number" value="<?php echo htmlentities($row_Recordset1['mobile_number'], ENT_COMPAT, 'UTF-8'); ?>" class="form-control" readonly/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Email ID :</label>
                    <div class="col-lg-8">
                        <input type="text" name="email" value="<?php echo htmlentities($row_Recordset1['email'], ENT_COMPAT, 'UTF-8'); ?>" class="form-control" readonly/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Subject :</label>
                    <div class="col-lg-8">
                        <input type="text" name="subject" value="<?php echo htmlentities($row_Recordset1['subject'], ENT_COMPAT, 'UTF-8'); ?>" class="form-control" readonly/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="autosize" class="control-label col-lg-4">Message :</label>
                    <div class="col-lg-8">
                        <textarea id="autosize" name="details" class="form-control" readonly><?php echo htmlentities($row_Recordset1['details'], ENT_COMPAT, 'UTF-8'); ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Date :</label>
                    <div class="col-lg-8">
                      <input type="text"  placeholder="" class="form-control"  name="contact_date" value="<?php echo htmlentities($row_Recordset1['contact_date'], ENT_COMPAT, 'UTF-8'); ?>" readonly/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Status :</label>
                    <div class="col-lg-8">
                      <input type="text"  placeholder="" class="form-control"  name="contact_date" value="<?php echo htmlentities($row_Recordset1['status'], ENT_COMPAT, 'UTF-8'); ?>" readonly/>
                    </div>
                </div>
                                        <div style="text-align:center" class="form-actions no-margin-bottom">
                                            <a href="contactlistpage"><input type="button" value="Back" class="btn btn-inverse btn-lg " /></a>
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
mysql_free_result($Recordset1);
?>