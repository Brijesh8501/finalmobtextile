<?php include("logcode.php"); require_once('../Connections/brijesh8510.php');
include("databaseconnect.php");
if(isset($_REQUEST['view']))
{
		$decodeurl = $_REQUEST['Saree_D_C_Id'];
	$durl = urldecode($decodeurl); 
	$turl = str_replace("'"," ",$durl);
	$urls = explode(" ",$turl);
	$Saree_D_C_Id = $urls[1];
	$sql = "SELECT saree_d_c.Saree_D_C_Id, saree_d_c.Saree_D_C_Date, customer_details.Cu_En_Name,customer_details.Customer_Id, broker_details1.B_Name, broker_details1.Broker_Id, saree_d_c.Order_Id, saree_d_c.Total_Lot, saree_d_c.Entry_Id FROM saree_d_c, customer_details, broker_details1 WHERE customer_details.Customer_Id = saree_d_c.Customer_Id AND broker_details1.Broker_Id = saree_d_c.Broker_Id AND saree_d_c.Saree_D_C_Id = '".$Saree_D_C_Id."' ";
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
	$Saree_D_C_Id = $row['Saree_D_C_Id'];
	$Saree_D_C_Date = $row['Saree_D_C_Date'];
	$Cu_En_Name = $row['Cu_En_Name'];
	$B_Name = $row['B_Name'];
	$Order_Id = $row['Order_Id'];
	$Total_Lot = $row['Total_Lot'];
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
$query_rsLotid = "SELECT saree_dcorg.Sa_D_C_Id, saree_dcorg.Saree_D_C_Id, saree_dcorg.Saree_Lot_Id, saree_dcorg.Saree_Lot_Meter, saree_dcorg.Saree_Pieces, saree_dcorg.Saree_Weight, quality_details.Quality_Name, design_details.Design, saree_dcorg.Status, saree_dcorg.R_Id FROM saree_dcorg, quality_details, design_details WHERE quality_details.Quality_Id = design_details.Quality_Id AND design_details.Design_Id = saree_dcorg.Design_Id AND saree_dcorg.Saree_D_C_Id='".$Saree_D_C_Id."' ";
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
                    <h1 class="page-header" align="center">SAREE CHALLAN</h1>
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
                    <label for="text2" class="control-label col-lg-5">Customer :</label>
                    <div class="col-lg-7">
                    <input type="text" id="Cu_En_Name" placeholder="" class="form-control" value="<?php echo $Cu_En_Name; ?>" name="Cu_En_Name" readonly/>
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
                    <div class="form-group row">
                        <div class="col-lg-4">
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Broker :</label>
                    <div class="col-lg-7">
                    <input type="text" id="B_Name" placeholder="" class="form-control" value="<?php echo $B_Name; ?>" name="B_Name" readonly/>
                    </div>
                </div>
         </div>
                        <div class="col-lg-4">
                        </div>
                        <div class="col-lg-4">
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Order ID :</label>
                    <div class="col-lg-7">
                    <input type="text" id="Order_Id" placeholder="" class="form-control" value="<?php echo $Order_Id; ?>" name="Order_Id" readonly/>
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
                                            <th>Sub-Saree ID</th>
                                            <th>Lot Id</th>
                                            <th>Lot meter</th>
                                             <th>Lot weight</th>
                                              <th>Pieces</th>
                                            <th>Quality</th>
                                            <th>Design</th>
                                            <th>#ID</th>
                                            <th>Status</th>
                                            </tr>
                                    </thead>
                                    <tbody>
                             <?php $i=0;$i++;do { ?>
  <tr>
    <td><?php echo $i++; ?></td>
    <td><?php echo $row_rsLotid['Sa_D_C_Id']; ?></td>
    <td><?php echo $row_rsLotid['Saree_Lot_Id']; ?></td>
    <td><?php echo $row_rsLotid['Saree_Lot_Meter']; ?></td>
   <td><?php echo $row_rsLotid['Saree_Weight']; ?></td>
    <td><?php echo $row_rsLotid['Saree_Pieces']; ?></td>
   <td><?php echo $row_rsLotid['Quality_Name']; ?></td>
    <td><?php echo $row_rsLotid['Design']; ?></td>
    <td><?php echo $row_rsLotid['Status']; ?></td>
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
                           <a href="saree_d_c_list"> <input type="button" value=" Back" class="btn btn-inverse btn-lg " /></a>
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