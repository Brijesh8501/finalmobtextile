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
$colname_Recordset1 = "-1";
if (isset($_GET['Broker_Id'])) {
  $colname_Recordset1 = $_GET['Broker_Id'];
}
mysql_select_db($database_brijesh8510, $brijesh8510);
$query_Recordset1 = sprintf("SELECT broker_details1.Broker_Id, broker_details1.B_Name, broker_details1.Address, city1.ct_name, `state1`.st_name,`country1`.cnt_name, broker_details1.Mobile_No, broker_details1.Email_Id, broker_details1.Status, broker_details1.Entry_Id FROM broker_details1, city1, country1, `state1` WHERE city1.ct_id = broker_details1.ct_id AND `state1`.st_id = broker_details1.st_id AND `country1`.cnt_id = broker_details1.cnt_id AND Broker_Id = %s", GetSQLValueString($colname_Recordset1, "int"));
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
                    <h1 class="page-header" align="center">BROKER</h1>
                </div>
            </div>
<div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <div id="div-1" class="accordion-body collapse in body">
            <form class="form-horizontal" method="post" name="form1" >
                <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Broker ID :</label>
                    <div class="col-lg-8">
                      <input type="text" id="text" name="Broker_Id" placeholder="" class="form-control" value="<?php echo $row_Recordset1['Broker_Id']; ?>" readonly />
                    </div>
                </div>
                <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Name :</label>
                    <div class="col-lg-8">
                    <input type="text" id="text" placeholder="Broker Name" class="form-control" name="B_Name" value="<?php echo htmlentities($row_Recordset1['B_Name'], ENT_COMPAT, 'UTF-8'); ?>"  readonly/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="autosize" class="control-label col-lg-4">Address :</label>
                    <div class="col-lg-8">
                      <textarea name="Address" class="form-control" id="autosize" readonly><?php echo htmlentities($row_Recordset1['Address'], ENT_COMPAT, 'UTF-8'); ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">City :</label>
                    <div class="col-lg-8">
                    <input type="text" id="text4" name="ct_name" placeholder="" class="form-control"value="<?php echo htmlentities($row_Recordset1['ct_name'], ENT_COMPAT, 'UTF-8'); ?>" readonly />
                    </div>
                </div>
<div class="form-group">
                    <label for="text2" class="control-label col-lg-4">State :</label>
                    <div class="col-lg-8">
                    <input type="text" id="text4" name="st_name" placeholder="" class="form-control"value="<?php echo htmlentities($row_Recordset1['st_name'], ENT_COMPAT, 'UTF-8'); ?>" readonly />
                    </div>
                </div>
<div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Country :</label>
                    <div class="col-lg-8">
                    <input type="text" id="text4" name="ct_name" placeholder="" class="form-control"value="<?php echo htmlentities($row_Recordset1['cnt_name'], ENT_COMPAT, 'UTF-8'); ?>" readonly />
                    </div>
                </div>
                    <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Mobile No :</label>
                    <div class="col-lg-8">
                    <input type="text" id="text" placeholder="" class="form-control" name="Mobile_No" value="<?php echo htmlentities($row_Recordset1['Mobile_No'], ENT_COMPAT, 'UTF-8'); ?>" readonly />
                    </div>
                </div>
<div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Email ID :</label>
                    <div class="col-lg-8">
                    <input type="text" id="text4" name="Email_Id" placeholder="Email ID" class="form-control"value="<?php echo htmlentities($row_Recordset1['Email_Id'], ENT_COMPAT, 'UTF-8'); ?>" readonly />
                    </div>
                </div>
                    <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Status :</label>
                    <div class="col-lg-8">
                    <input type="text" id="text4" name="Status" placeholder="" class="form-control"value="<?php echo htmlentities($row_Recordset1['Status'], ENT_COMPAT, 'UTF-8'); ?>" readonly />
                    </div>
                </div>
                 <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">#ID :</label>
                    <div class="col-lg-8">
                    <input type="text" id="text4" name="Status" placeholder="" class="form-control"value="<?php echo htmlentities($row_Recordset1['Entry_Id'], ENT_COMPAT, 'UTF-8'); ?>" readonly />
                    </div>
                </div>
                                        <div style="text-align:center" class="form-actions no-margin-bottom">
                                            <a href="brokerprofilelistpage"><input type="button" value="Back" class="btn btn-inverse btn-lg " /></a>
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
ob_flush(); ?>