<?php include("logcode.php"); require_once('../Connections/brijesh8510.php');
 include("databaseconnect.php");
if(isset($_REQUEST['view']))
{
	$decodeurl = $_REQUEST['Taka_D_C_Id'];
	$durl = urldecode($decodeurl); 
	$turl = str_replace("'"," ",$durl);
	$urls = explode(" ",$turl);
	$Taka_D_C_Id = $urls[1];
	$sql = "select * from taka_d_c_migrate where taka_d_c_migrate.Taka_D_C_Id = '".$Taka_D_C_Id."' ";
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
	$Taka_D_C_Id = $row['Taka_D_C_Id'];
	$Taka_D_C_Date = $row['Taka_D_C_Date'];
	$Total_Taka = $row['Total_Taka'];
	$Taka_Mig = $row['Taka_Mig'];
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
}
}
mysql_select_db($database_brijesh8510, $brijesh8510);
$query_rsTakaid = "SELECT taka_dcorgmigrate.Ta_D_C_Id, taka_dcorgmigrate.Taka_D_C_Id, taka_dcorgmigrate.Taka_Id, taka_dcorgmigrate.Taka_Meter, taka_dcorgmigrate.Taka_Weight, taka_dcorgmigrate.R_Id, quality_details.Quality_Name FROM taka_dcorgmigrate, quality_details WHERE quality_details.Quality_Id = taka_dcorgmigrate.Quality_Id AND taka_dcorgmigrate.Taka_D_C_Id='".$Taka_D_C_Id."' ";
$rsTakaid = mysql_query($query_rsTakaid, $brijesh8510) or die(mysql_error());
$row_rsTakaid = mysql_fetch_assoc($rsTakaid);
$totalRows_rsTakaid = mysql_num_rows($rsTakaid);
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
                    <h1 class="page-header" align="center">MIGRATION-TAKA CHALLAN</h1>
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
                        <textarea rows="3" cols="20" id="textarea1" name="Taka_Mill" class="form-control" readonly><?php echo $Taka_Mig;?></textarea>
                    </div>
                </div>
                        </div>
                       <div class="col-lg-4">
                       <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Challan Date :</label>
                    <div class="col-lg-7">
                    <input type="text" id="Taka_D_C_Date" placeholder="" class="form-control" value="<?php echo $Taka_D_C_Date; ?>" name="Taka_D_C_Date" readonly/>
                    </div>
                </div>
                        </div>
                         <div class="col-lg-4">
                         <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Challan ID :</label>
                    <div class="col-lg-7">
                    <input type="text" id="Taka_D_C_Id" placeholder="" class="form-control" value="<?php echo $Taka_D_C_Id; ?>" name="Taka_D_C_Id" readonly/>
                    </div>
                </div>
                        </div>
                    </div>
                        <hr />
                        <div class="col-lg-12" align="center">
                         <div class="row">
                <div class="col-lg-12">
                            <div class="table-responsive" id="table">
                                <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                        <tr>
                                            <th>Sr.No</th>
                                            <th>Taka Id</th>
                                            <th>Taka Meter</th>
                                            <th>Taka Weight</th>
                                            <th>Quality</th>
                                           <th>#ID</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i=0;
									$i++;
                                    do { ?>
                                    <tr>
                                      <td width="10%"><?php echo $i++; ?></td>
                                      <td width="15%"><?php echo $row_rsTakaid['Taka_Id']; ?></td>
                                      <td width="10%"><?php echo $row_rsTakaid['Taka_Meter']; ?></td>
                                      <td width="10%"><?php echo $row_rsTakaid['Taka_Weight']; ?></td>
                                      <td width="25%"><?php echo $row_rsTakaid['Quality_Name']; ?></td>
                                      <td width="10%"><?php echo $row_rsTakaid['R_Id']; ?></td>
                                      </tr>
                                      <?php } while ($row_rsTakaid = mysql_fetch_assoc($rsTakaid)); ?>
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
                    <label for="text2" class="control-label col-lg-5">Total Taka :</label>
                    <div class="col-lg-7">
                    <input type="text" id="Total_Taka" placeholder="" class="form-control" value="<?php echo $Total_Taka; ?>" name="Total_Taka" readonly/>
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
                    <input type="text" id="Status" placeholder="" class="form-control" value="<?php echo $Status; ?>" name="Status" readonly/>
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
                    <input type="text" id="Entry_Date" placeholder="" class="form-control" value="<?php echo $Entry_Date; ?>" name="Entry_Date" readonly/>
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
                    <input type="text" id="Entry_Id" placeholder="" class="form-control" value="<?php echo $Entry_Id; ?>" name="Entry_Id" readonly/>
                    </div>
                </div>
                        </div>  
                    <div class="form-group row">
                        <div class="col-lg-5">
                        </div>
                        <div class="col-lg-3">
                        </div>
                        <div class="col-lg-4">
                            <a href="taka_d_c_migratelist"><input type="button" value=" Back" class="btn btn-inverse btn-lg " /></a>
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
mysql_free_result($rsTakaid);
ob_flush(); ?>