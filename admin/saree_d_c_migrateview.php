<?php include("logcode.php"); require_once('../Connections/brijesh8510.php');
include("databaseconnect.php");
if(isset($_REQUEST['view']))
{
		$decodeurl = $_REQUEST['Saree_D_C_Id'];
	$durl = urldecode($decodeurl); 
	$turl = str_replace("'"," ",$durl);
	$urls = explode(" ",$turl);
	$Saree_D_C_Id = $urls[1];
	$sql = "select * from saree_d_migrate where saree_d_migrate.Saree_D_C_Id = '".$Saree_D_C_Id."'  ";
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
	$Saree_D_C_Id = $row['Saree_D_C_Id'];
	$Saree_D_C_Date = $row['Saree_D_C_Date'];
	$Total_Lot = $row['Total_Lot'];
	$Saree_Mig = $row['Saree_Mig'];
	$Entry_Id = $row['Entry_Id'];
	$Entry_Date = $row['Entry_Date'];
	$Status = $row['Status'];
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
}}
mysql_select_db($database_brijesh8510, $brijesh8510);
$query_rsLotid = "SELECT saree_dcorgmigrate.Sa_D_C_Id, saree_dcorgmigrate.Saree_D_C_Id, saree_dcorgmigrate.Saree_Lot_Id, saree_dcorgmigrate.Saree_Lot_Meter, saree_dcorgmigrate.Saree_Pieces, saree_dcorgmigrate.Saree_Weight, quality_details.Quality_Name, design_details.Design, saree_dcorgmigrate.R_Id FROM saree_dcorgmigrate, quality_details, design_details WHERE quality_details.Quality_Id = design_details.Quality_Id AND design_details.Design_Id = saree_dcorgmigrate.Design_Id AND saree_dcorgmigrate.Saree_D_C_Id='".$Saree_D_C_Id."' ";
$rsLotid = mysql_query($query_rsLotid, $brijesh8510) or die(mysql_error());
$row_rsLotid = mysql_fetch_assoc($rsLotid);
$totalRows_rsLotid = mysql_num_rows($rsLotid);
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
                    <h1 class="page-header" align="center">MIGRATION-SAREE CHALLAN</h1>
                </div>
            </div>
<div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <div id="div-1" class="accordion-body collapse in body">
            <form class="form-horizontal" method="post">
            <div class="form-group row">
            <div class="col-lg-4">
            <div class="form-group">
                    <label class="control-label col-lg-6">To :</label>
                    <div class="col-lg-6">
                    <span id="error1" style="color:#F00";></span>
                        <textarea rows="3" cols="20" id="textarea1" name="Saree_Mig" class="form-control" readonly><?php echo $Saree_Mig;?></textarea>
                    </div>
                </div>
                        </div>
                       <div class="col-lg-4">
                       <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Challan ID :</label>
                    <div class="col-lg-7">
                    <input type="text" id="Saree_D_C_Id" placeholder="" class="form-control" value="<?php echo $Saree_D_C_Id; ?>" name="Saree_D_C_Id" readonly/>
                    </div>
                </div>
                        </div>
                         <div class="col-lg-4">
                         <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Challan Date :</label>
                    <div class="col-lg-7">
                    <input type="text" id="Saree_D_C_Date" placeholder="" class="form-control" value="<?php echo $Saree_D_C_Date; ?>" name="Saree_D_C_Date" readonly/>
                    </div>
                </div>
                      </div>
                    </div>
                       <hr/>
                        <div class="col-lg-12" align="center">
                         <div class="row">
                <div class="col-lg-12">
                            <div class="table-responsive" id="table">
                                <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                        <tr>
                                            <th>Sr.No</th>
                                            <th>Lot Id</th>
                                             <th>Lot meter</th>
                                             <th>Lot weight</th>
                                              <th>Pieces</th>
                                            <th>Quality</th>
                                            <th>Design</th>
                                            <th>#ID</th>
                                           </tr>
                                    </thead>
                                    <tbody>
                             <?php $i=0;$i++;do { ?>
  <tr>
    <td><?php echo $i++; ?></td>
    <td><?php echo $row_rsLotid['Saree_Lot_Id']; ?></td>
    <td><?php echo $row_rsLotid['Saree_Lot_Meter']; ?></td>
   <td><?php echo $row_rsLotid['Saree_Weight']; ?></td>
    <td><?php echo $row_rsLotid['Saree_Pieces']; ?></td>
   <td><?php echo $row_rsLotid['Quality_Name']; ?></td>
    <td><?php echo $row_rsLotid['Design']; ?></td>
    <td><?php echo $row_rsLotid['R_Id']; ?></td>
  </tr>
  <?php } while ($row_rsLotid = mysql_fetch_assoc($rsLotid)); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                        </div>
                         <hr/>
                         <div class="col-lg-4">
                        </div>
                        <div class="col-lg-4">
                        </div>
                        <div class="col-lg-4">
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Total Lot :</label>
                    <div class="col-lg-7">
                    <input type="text" id="Total_Lot" placeholder="" class="form-control" name="Total_Lot" value="<?php echo $Total_Lot; ?>" readonly />
                    </div>
                </div>
                        </div>
                        <div class="col-lg-4">
                        </div>
                        <div class="col-lg-4">
                        </div>
                        <div class="col-lg-4">
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Status :</label>
                    <div class="col-lg-7">
                    <input type="text" id="Status" placeholder="" class="form-control" name="Status" value="<?php echo $Status; ?>" readonly />
                    </div>
                </div>
                        </div>
                        <div class="col-lg-4">
                        </div>
                        <div class="col-lg-4">
                        </div>
                        <div class="col-lg-4">
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Entry Date :</label>
                    <div class="col-lg-7">
                    <input type="text" id="Entry_Date" placeholder="" class="form-control" name="Entry_Date" value="<?php echo $Entry_Date; ?>" readonly />
                    </div>
                </div>
                        </div>
                        <div class="col-lg-4">
                        </div>
                        <div class="col-lg-4">
                        </div>
                        <div class="col-lg-4">
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Entry #ID :</label>
                    <div class="col-lg-7">
                    <input type="text" id="Entry_Id" placeholder="" class="form-control" name="Entry_Id" value="<?php echo $Entry_Id; ?>" readonly />
                    </div>
                </div>
                        </div>
                    <div class="form-group row">
                        <div class="col-lg-5">
                        </div>
                        <div class="col-lg-3">
                        </div>
                        <div class="col-lg-4">
                           <a href="saree_d_c_migratelist"> <input type="button" value=" Back" class="btn btn-inverse btn-lg " /></a>
                        </div>
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
mysql_free_result($rsLotid); ob_flush(); ?>