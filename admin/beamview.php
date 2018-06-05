<?php include("logcode.php"); require_once('../Connections/brijesh8510.php'); 
   include("databaseconnect.php");
   date_default_timezone_set("Asia/Calcutta");
if(isset($_REQUEST['view']))
{
	$decodeurl = $_REQUEST['Beam_D_C_Id'];
	$durl = urldecode($decodeurl); 
	$turl = str_replace("'"," ",$durl);
	$urls = explode(" ",$turl);
	$Beam_D_C_Id = $urls[1];
	 $dateact = date('Y-m-d');
	$dateactfull = date('d-m-Y        h:i:s A');
	$Entry_Idactivity = $row_result['Registration_Id'];
	
	$Partact = "Beam Challan Page [View] - This page is open to view.<br/>By : ".$row_result['Name']."<br/>For Challan ID : ".$Beam_D_C_Id;
	$insactivity = "insert into activity(Activity_Id,Date,Particular,Type,Action,Datefull,Id) values(NULL,'$dateact','$Partact','Beam Challan [View] - View','view','$dateactfull','$Entry_Idactivity')";
	mysql_query($insactivity); 
	
	
	$sql = "SELECT beam_d_c_1.Beam_D_C_Id, beam_d_c_1.Beam_D_C_Date, beam_d_c_1.Beam_D_C_No, company_deetaails.C_Name, broker_details1.B_Name, beam_d_c_1.Total_Beam, beam_d_c_1.Entry_Date, beam_d_c_1.Entry_Id FROM beam_d_c_1, company_deetaails, broker_details1 WHERE company_deetaails.Company_Id = beam_d_c_1.Company_Id AND beam_d_c_1.Broker_Id = broker_details1.Broker_Id AND beam_d_c_1.Beam_D_C_Id ='".$Beam_D_C_Id."' ";
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
	$t0 = $row['Beam_D_C_Id'];
	$t1 = $row['Beam_D_C_Date'];
	$t2 = $row['Beam_D_C_No'];
	$C_Name = $row['C_Name'];
	$B_Name = $row['B_Name'];
	$t5 = $row['Total_Beam'];
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
$query_Recordset1 = "SELECT beam_dcorg.Be_D_C_Id, beam_dcorg.Beam_D_C_Id, beam_dcorg.Beam_No, beam_dcorg.Taar, beam_dcorg.Beam_Meter, beam_dcorg.Weight, quality_details.Quality_Name, beam_dcorg.Status, beam_dcorg.R_Id FROM beam_dcorg, quality_details WHERE quality_details.Quality_Id = beam_dcorg.Quality_Id AND beam_dcorg.Beam_D_C_Id='".$t0."'";
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
<?php include("sidemenu.php");?>
                <div class="inner">
                    <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" align="center">BEAM CHALLAN</h1>
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
                    <label for="text2" class="control-label col-lg-5">Company :</label>
                    <div class="col-lg-7">
                    <input type="text" id="text2" placeholder="" name="C_Name" value="<?php echo $C_Name; ?>" class="form-control" readonly />
                    </div>
                </div>
                        </div>
                       <div class="col-lg-4">
                       <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Challan ID :</label>
                    <div class="col-lg-7">
                    <input type="text" id="challanid" placeholder="" class="form-control" value="<?php echo $t0; ?>" name="challanid" readonly />
                    </div>
                </div>
                        </div>
                         <div class="col-lg-4">
                         <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Challan Date :</label>
                    <div class="col-lg-7">
                    <input type="text" id="date" placeholder="" class="form-control" value="<?php echo $t1; ?>" name="date" readonly />
                    </div>
                </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-4">
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Broker :</label>
                    <div class="col-lg-7">
                    <input type="text" id="text2" placeholder="" name="B_Name" class="form-control" value="<?php echo $B_Name; ?>" readonly />
                    </div>
                </div>
                        </div>
                        <div class="col-lg-3">
                        </div>
                        <div class="col-lg-5">
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-7">Delivery Challan No :</label>
                    <div class="col-lg-5">
                    <input type="text" id="challanno" placeholder=" Beam Delivery Challan No" class="form-control" name="challanno" value="<?php echo $t2; ?>" readonly />
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
                                            <th>Sub-Beam ID</th>
                                            <th>Beam No</th>
                                            <th>Taar</th>
                                            <th>Meter</th>
                                            <th>Weight</th>
                                            <th>Quality</th>
                                            <th>Status</th>
                                            <th>#ID</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                   <?php $i=0;
	  $i++;?>
									<?php do { ?>
								    <tr>
								      <td><?php echo $i++; ?></td>
                                        <td><?php echo $row_Recordset1['Be_D_C_Id']; ?></td>
									    <td><?php echo $row_Recordset1['Beam_No']; ?></td>
									    <td><?php echo $row_Recordset1['Taar']; ?></td>
									    <td><?php echo $row_Recordset1['Beam_Meter']; ?></td>
                                        <td><?php echo $row_Recordset1['Weight']; ?></td>
									    <td><?php echo $row_Recordset1['Quality_Name']; ?></td>
                                        <td><?php echo $row_Recordset1['Status']; ?></td>
                                        <td><?php echo $row_Recordset1['R_Id']; ?></td>
									    </tr>
									  <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
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
                    <input type="text" id="cartoon" placeholder="" class="form-control" name="cartoon" value="<?php echo $t5; ?>" readonly/>
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
                    <input type="text" id="Entry_Id" placeholder="" class="form-control" name="Entry_Id" value="<?php echo $Entry_Id; ?>" readonly/>
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
                    <input type="text" id="Entry_Date" placeholder="" class="form-control" name="Entry_Date" value="<?php echo $Entry_Date; ?>" readonly/>
                    </div>
                </div>
                        </div>  
                    <div class="form-group row">
                        <div class="col-lg-5">
                        </div>
                        <div class="col-lg-3">
                        </div>
                        <div class="col-lg-4">
                           
                                     <a href="beam_d_c_listpage"><input type="button" value=" Back" class="btn btn-inverse btn-lg " id="btnback" name="btnback" /></a>
                        </div>
                    </div>
                </form>
            </div>
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