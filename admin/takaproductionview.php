<?php include("logcode.php"); require_once('../Connections/brijesh8510.php');  include("databaseconnect.php");
if(isset($_REQUEST['view']))
{
	$decodeurl = $_REQUEST['Ta_Pro_Id'];
	$durl = urldecode($decodeurl); 
	$turl = str_replace("'"," ",$durl);
	$urls = explode(" ",$turl);
	$Ta_Pro_Id = $urls[1];
	$sql = "SELECT taka_production.Ta_Pro_Id,beam_machine.Be_M_Id,beam_dcorg.Beam_No,machine_details.Machine_No,taka_production.Started_Date,taka_production.Total_Taka,taka_production.Total_Meter,taka_production.Beam_Meter,taka_production.Shortage,taka_production.Shortageper,taka_production.Entry_Id FROM taka_production, beam_dcorg,beam_machine,machine_details WHERE beam_dcorg.Be_D_C_Id = beam_machine.Be_D_C_Id AND beam_machine.Be_M_Id = taka_production.Be_M_Id AND machine_details.Machine_Id = beam_machine.Machine_Id AND taka_production.Ta_Pro_Id = '".$Ta_Pro_Id."' ";
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
	$Ta_Pro_Id = $row['Ta_Pro_Id'];	
	$Be_M_Id = $row['Be_M_Id'];		
	$Started_Date = $row['Started_Date'];
	$Total_Taka = $row['Total_Taka'];
	$Total_Meter = $row['Total_Meter'];
	$Beam_Meter = $row['Beam_Meter'];
	$Beam_No = $row['Beam_No'];
	$Machine_No = $row['Machine_No'];	
	$Shortage = $row['Shortage'];
	$Shortageper = $row['Shortageper'];
	$Entry_Id = $row['Entry_Id'];
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
$query_RsTaka = "SELECT taka_detailsorg.Ta_Pro_Id, taka_detailsorg.T_Date, taka_detailsorg.Taka_Meter, taka_detailsorg.Taka_Weight, quality_details.Quality_Name, taka_detailsorg.Status, taka_detailsorg.`Description`, taka_detailsorg.Taka_Id, taka_detailsorg.R_Id FROM taka_detailsorg, quality_details WHERE quality_details.Quality_Id = taka_detailsorg.Quality_Id AND taka_detailsorg.Ta_Pro_Id ='".$Ta_Pro_Id."' order by taka_detailsorg.Taka_Id asc";
$RsTaka = mysql_query($query_RsTaka, $brijesh8510) or die(mysql_error());
$row_RsTaka = mysql_fetch_assoc($RsTaka);
$totalRows_RsTaka = mysql_num_rows($RsTaka);
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
                    <h1 class="page-header" align="center">TAKA PRODUCTION</h1>
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
                    <label for="text2" class="control-label col-lg-6">Beam-Machine ID :</label>
                    <div class="col-lg-6">
                    <input type="text" id="Be_M_Id" placeholder="" class="form-control" name="Be_M_Id" value="<?php echo $Be_M_Id; ?>" readonly />
                    </div>
                </div>
                        </div>
                        <div class="col-lg-4">
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-6">Taka-Production ID :</label>
                    <div class="col-lg-6">
                    <input type="text" id="Ta_Pro_Id" placeholder="" class="form-control" name="Ta_Pro_Id" value="<?php echo $Ta_Pro_Id; ?>" readonly />
                    </div>
                </div>
                        </div>
                        <div class="col-lg-4">
                        <div class="form-group">
                        <label class="control-label col-lg-5"> Fitted Date :</label>
                        <div class="col-lg-7">
                            <input class="form-control" type="text"   name="Started_Date" id="Started_Date" value="<?php echo $Started_Date; ?>" readonly/>
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
                                            <th>Sr No.</th>
                                            <th>Taka ID</th>
                                             <th>Date</th>
                                             <th>Meter</th>
                                            <th>Weight</th>
                                             <th>Quality</th>
                                            <th>Status</th>
                                            <th>Description</th>
                                            <th>#ID</th>
                                        </tr>
                                    </thead>
                                    <?php 
									$i = 0;
									$i++;
									?>
                                    <tbody>
                                      <?php do { ?>
                                      <tr>
                                          <td width="10%"><?php echo $i++; ?></td>
                                          <td width="10%"><?php echo $row_RsTaka['Taka_Id']; ?></td>
                                          <td width="10%"><?php echo $row_RsTaka['T_Date']; ?></td>
                                          <td width="10%"><?php echo $row_RsTaka['Taka_Meter']; ?></td>
                                          <td width="10%"><?php echo $row_RsTaka['Taka_Weight']; ?></td>
                                          <td width="25%"><?php echo $row_RsTaka['Quality_Name']; ?></td>
                                          <td width="10%"><?php echo $row_RsTaka['Status']; ?></td>
                                          <td width="30%"><?php echo $row_RsTaka['Description']; ?></td>
                                          <td width="10%"><?php echo $row_RsTaka['R_Id']; ?></td>
                                        </tr>
                                        <?php } while ($row_RsTaka = mysql_fetch_assoc($RsTaka)); ?>
                                    </tbody>
                                </table>
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
                                            <th>Sr No.</th>
                                            <th>Quality</th>
                                             <th>Total Meter</th>
                                        </tr>
                                    </thead>
                                    <?php 
									$i = 0;
									$i++;
									?>
                                    <tbody>
                                      <?php $sqllab = "select sum(Taka_Meter) as Sum_Meter , quality_details.Quality_Name from taka_detailsorg,quality_details where quality_details.Quality_Id = taka_detailsorg.Quality_Id AND Ta_Pro_Id = '".$Ta_Pro_Id."' group by quality_details.Quality_Name";
	$resultlab = mysql_query($sqllab);
	while($rowlab = mysql_fetch_array($resultlab)) {?>
                                      <tr>
                                          <td width="10%"><?php echo $i++; ?></td>
                                          <td width="20%"><?php echo $rowlab['Quality_Name']; ?></td>
                                          <td width="10%"><?php echo $rowlab['Sum_Meter']; ?></td>
                                        </tr>
                                        <?php }  ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                        </div>
                       <hr />
                       <div class="col-lg-4">
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Total Taka :</label>
                    <div class="col-lg-7">
                    <input type="text" id="Total_Taka" placeholder="" class="form-control" name="Total_Taka" value="<?php echo $Total_Taka; ?>" readonly/>
                    </div>
                </div>
                        </div>
                        <div class="col-lg-4">
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Total Meter :</label>
                    <div class="col-lg-7">
                    <input type="text" id="Total_Meter" placeholder="" class="form-control" name="Total_Meter"  value="<?php echo $Total_Meter; ?>"  readonly />
                    </div>
                </div>
                      </div>
                        <div class="col-lg-4">
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Beam Meter :</label>
                    <div class="col-lg-7">
                    <input type="text" id="Beam_Meter" placeholder="" class="form-control" name="Beam_Meter" value="<?php echo $Beam_Meter; ?>" readonly
                     />
                    </div>
                </div>
                        </div>
                        <div class="col-lg-4">
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Beam No :</label>
                    <div class="col-lg-7">
                    <input type="text" id="Beam_No" placeholder="" class="form-control" name="Beam_No" value="<?php echo $Beam_No; ?>" readonly
                     />
                    </div>
                </div>
                        </div>
                        <div class="col-lg-4">
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Machine No :</label>
                    <div class="col-lg-7">
                    <input type="text" id="Machine_No" placeholder="" class="form-control" name="Machine_No" value="<?php echo $Machine_No; ?>" readonly
                     />
                    </div>
                </div>
                        </div>
                        <div class="col-lg-4">
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Shortage(Mtr) :</label>
                    <div class="col-lg-7">
                    <input type="text" id="Shortage" placeholder="" class="form-control" name="Shortage"  value="<?php echo $Shortage; ?>" readonly />
                    </div>
                </div>
                        </div>
                        <div class="col-lg-4">
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Shortage(%) :</label>
                    <div class="col-lg-7">
                    <input type="text" id="Shortageper" placeholder="" class="form-control" name="Shortageper"  value="<?php echo $Shortageper; ?>" readonly />
                    </div>
                </div>
                        </div>
                        <div class="col-lg-4">
                        </div>
                        <div class="col-lg-4">
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Entry #ID :</label>
                    <div class="col-lg-7">
                    <input type="text" id="Entry_Id" placeholder="" class="form-control" name="Entry_Id"  value="<?php echo $Entry_Id; ?>"  readonly/>
                    </div>
                </div>
                        </div>
                         <div style="text-align:center" class="form-actions no-margin-bottom">
                                     <a href="takaproductionlist"><input type="button" value="Back" class="btn btn-inverse btn-lg " name="back"/></a> 
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
         $(document).ready(function () {
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
mysql_free_result($RsTaka);
ob_flush(); ?>