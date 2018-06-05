<?php include("logcode.php"); require('../Connections/brijesh8510.php'); error_reporting(0); include("databaseconnect.php");
	if(isset($_REQUEST['view']))
{
	$decodeurl = $_REQUEST['Sa_Exbeam_Id'];
	$durl = urldecode($decodeurl); 
	$turl = str_replace("'"," ",$durl);
	$urls = explode(" ",$turl);
	$Sa_Exbeam_Id = $urls[1];
	$sql = "select Sa_Exbeam_Id,machine_details.Machine_No,machine_details.Machine_Id,Mul_Beam_No,Sa_Beam_Total,Entry_Date,saree_exbe_master.Entry_Id from saree_exbe_master,machine_details where machine_details.Machine_Id = saree_exbe_master.Machine_Id AND Sa_Exbeam_Id = '".$Sa_Exbeam_Id."' ";
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
	$Sa_Exbeam_Id = $row['Sa_Exbeam_Id'];
	$Machine_No = $row['Machine_No'];
	$Machine_Id = $row['Machine_Id'];
	$Mul_Beam_No = $row['Mul_Beam_No'];
	$Sa_Beam_Total = $row['Sa_Beam_Total'];
	$Entry_Date = $row['Entry_Date'];
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
$query_quaa = "select Sa_Ex_Id,Sa_Exbeam_Id,Sa_Beam_No,Be_Ref_No,Fitted_Date,Be_Meter,Be_Taar,Be_Weight,quality_details.Quality_Name,Org_Be_Mg_Meter,Shortage,Shortageper,Remove_Date,R_Id from saree_exbeam_detailorg,quality_details where quality_details.Quality_Id = saree_exbeam_detailorg.Quality_Id AND Sa_Exbeam_Id = '$Sa_Exbeam_Id'";
$quaa = mysql_query($query_quaa, $brijesh8510) or die(mysql_error());
$row_quaa = mysql_fetch_assoc($quaa);
$totalRows_quaa = mysql_num_rows($quaa);
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
       <?php include("sidemenu.php");?>
                <div class="inner">
                    <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" align="center">SAREE EXTRA BEAM</h1>
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
                    <label for="text2" class="control-label col-lg-5">Saree-Extra-Beam ID :</label>
                    <div class="col-lg-7">
                    <input type="text" id="Sa_Exbeam_Id" placeholder="" class="form-control" value="<?php echo $Sa_Exbeam_Id; ?>" name="Sa_Exbeam_Id" readonly/>
                    </div>
                </div>
                        </div>
                       <div class="col-lg-4">
                       <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Machine No :</label>
                    <div class="col-lg-7">
                    <input type="text" id="Machine_No" placeholder="" class="form-control" value="<?php echo $Machine_No; ?>" name="Machine_No" readonly/>
                    <input type="hidden" id="Machine_Id" value="<?php echo $Machine_Id; ?>" name="Machine_Id" readonly/>
                    </div>
                </div>
                        </div>
                         <div class="col-lg-4">
                         <div class="form-group">
                    <label for="autosize" class="control-label col-lg-4">Beam No :</label>
                    <div class="col-lg-8">
                      <textarea name="Mul_Beam_No" class="form-control" id="autosize" readonly><?php echo $Mul_Beam_No; ?></textarea>         </div>
</div>
                        </div>
                    </div>
                        <hr />
                        <div class="col-lg-12" align="center">
                         <div class="row">
                <div class="col-lg-12">
                            <div class="table-responsive" id="table">
                              <table class="table table-striped table-bordered table-hover" valign="center" >
                                    <thead>
                                        <tr>
                                            <th>Sr.No</th>
                                            <th width="15%">Sub-Beam-Extra ID</th>
                                            <th width="10%">Beam No</th>
                                           <th width="10%">Beam-Ref. No</th>
                                            <th width="10%">Fitted Date</th>
                                            <th width="10%">Meter</th>
                                             <th width="7%">Taar</th>
                                            <th width="7%">Weight</th>
                                            <th width="20%">Quality</th>
                                            <th width="10%">Produced Meter</th>
                                           <th width="20%">Shortage Mtr (%)</th>
                                            <th width="15%">Remove Date</th>
                                            <th width="10%">#ID</th>
                                         </tr>
                                    </thead>
                                    <tbody id="mybody">
                                    <?php $i=0;
	  $i++;
                                     do { ?>
  <tr class="tableRow">
    <td><?php echo $i++; ?></td>
    <td><?php echo $row_quaa['Sa_Ex_Id']; ?></td>
    <td><?php echo $row_quaa['Sa_Beam_No']; ?></td>
    <td><?php echo $row_quaa['Be_Ref_No']; ?></td>
    <td><?php echo $row_quaa['Fitted_Date']; ?></td>
    <td><?php echo $row_quaa['Be_Meter']; ?></td>
    <td><?php echo $row_quaa['Be_Taar']; ?></td>
    <td><?php echo $row_quaa['Be_Weight']; ?></td>
    <td><?php echo $row_quaa['Quality_Name']; ?></td>
    <td><?php echo $row_quaa['Org_Be_Mg_Meter']; ?></td>
    <td><?php echo $row_quaa['Shortage']; ?>&nbsp;(<?php echo $row_quaa['Shortageper']; ?>%)</td>
    <td><?php echo $row_quaa['Remove_Date']; ?></td>
     <td><?php echo $row_quaa['R_Id']; ?></td>
  </tr>
  <?php } while ($row_quaa  = mysql_fetch_assoc($quaa)); 
    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                        </div>
                         <hr />
                         <div class="col-lg-4">
                        </div>
                        <div class="col-lg-4">
                        </div>
                        <div class="col-lg-4">
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Total Beam :</label>
                    <div class="col-lg-7">
                    <input type="text" id="Sa_Beam_Total" placeholder="" class="form-control" name="Sa_Beam_Total" value="<?php echo $Sa_Beam_Total; ?>" readonly/>
                    </div>
                </div>
                        </div>
                           <div class="col-lg-4">
                        </div>
                        <div class="col-lg-4">
                        </div>
                        <div class="col-lg-4">
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Entry Date :</label>
                    <div class="col-lg-8">
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
                     <input type="text" name="Entry_Id" id="Entry_Id" class="form-control" value="<?php echo $Entry_Id;  ?>" readonly/>
                    </div>
                </div>
                        </div>
                    <div class="form-group row">
                    <div class="col-lg-5">
                    </div>
                        <div class="col-lg-3">
                        </div>
                        <div class="col-lg-4">
                           <a href="saree_extrabeam_listpage"><input type="button" value=" Back" class="btn btn-inverse btn-lg " name="back" id="back" /></a>
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
mysql_free_result($quaa);
 ob_flush(); ?>