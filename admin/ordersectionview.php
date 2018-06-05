<?php include("logcode.php"); require_once('../Connections/brijesh8510.php'); error_reporting(0);
include("databaseconnect.php");
if(isset($_REQUEST['view']))
{
	$decodeurl = $_REQUEST['Order_Id'];
	$durl = urldecode($decodeurl); 
	$turl = str_replace("'"," ",$durl);
	$urls = explode(" ",$turl);
	$Order_Id = $urls[1];
	$sql = "SELECT order_master.Order_Id, order_master.Om_Date, customer_details.Cu_En_Name, broker_details1.B_Name, order_master.Total_Amt, order_master.Discount, order_master.Grandtotal, order_master.Advance_Amt, order_master.Delivery_Date, order_master.Remark, order_master.Status, order_master.Re_Amt, order_master.Entry_Id FROM order_master, customer_details, broker_details1 WHERE customer_details.Customer_Id = order_master.Customer_Id AND broker_details1.Broker_Id = order_master.Broker_Id AND order_master.Order_Id ='".$Order_Id."'  ";
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
	$Order_Id = $row['Order_Id'];
	$Om_Date = $row['Om_Date'];
	$t2 = $row['Cu_En_Name'];
	$t3 = $row['B_Name'];
	$Total_Amt = $row['Total_Amt'];
	$Discount = $row['Discount'];
	$Grandtotal = $row['Grandtotal'];
	$Advance_Amt = $row['Advance_Amt'];
	$Delivery_Date = $row['Delivery_Date'];
	$Remark = $row['Remark'];
	$Status = $row['Status'];
	$Re_Amt = $row['Re_Amt'];
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
$query_RsOrderDetails = "SELECT order_detailsorg.Od_Id, order_detailsorg.Order_Id, quality_details.Quality_Name, design_details.Design, order_detailsorg.Quantity, order_detailsorg.Rate, order_detailsorg.Amount, order_detailsorg.R_Id FROM order_detailsorg, quality_details, design_details WHERE quality_details.Quality_Id = design_details.Quality_Id AND design_details.Design_Id = order_detailsorg.Design_Id AND order_detailsorg.Order_Id ='".$Order_Id."' ";
$RsOrderDetails = mysql_query($query_RsOrderDetails, $brijesh8510) or die(mysql_error());
$row_RsOrderDetails = mysql_fetch_assoc($RsOrderDetails);
$totalRows_RsOrderDetails = mysql_num_rows($RsOrderDetails);
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
                    <h1 class="page-header" align="center">SAREE ORDER</h1>
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
                    <input type="text" id="Order_Id" placeholder="" class="form-control" value="<?php echo $t2; ?>" name="Order_Id" readonly />
                    </div>
                </div>
                        </div>
                       <div class="col-lg-4">
                       <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Order Date :</label>
                    <div class="col-lg-7">
                    <input type="text" id="Om_Date" placeholder="" class="form-control" value="<?php echo $Om_Date; ?>" name="Om_Date" readonly />
                    </div>
                </div>
               </div>
                         <div class="col-lg-4">
                         <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Order ID :</label>
                    <div class="col-lg-7">
                    <input type="text" id="Order_Id" placeholder="" class="form-control" value="<?php echo $Order_Id; ?>" name="Order_Id" readonly />
                    </div>
                </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-4">
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Broker :</label>
                    <div class="col-lg-7">
                    <input type="text" id="Order_Id" placeholder="" class="form-control" value="<?php echo $t3; ?>" name="Order_Id" readonly />
                    </div>
                </div>
                        </div>
                        <div class="col-lg-4">
                        </div>
                        <div class="col-lg-4">
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
                                            <th>Quality</th>
                                            <th>Design</th>
                                            <th>Quantity</th>
                                             <th>Rate</th>
                                            <th>Amount</th>
                                             <th>#ID</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i=0;
									$i++;
									?>
                                    <?php do { ?>
  <tr>
    <td width="10%"><?php echo $i++; ?></td>
    <td width="25%"><?php echo $row_RsOrderDetails['Quality_Name']; ?></td>
    <td width="25%"><?php echo $row_RsOrderDetails['Design']; ?></td>
    <td width="10%"><?php echo $row_RsOrderDetails['Quantity']; ?></td>
    <td width="10%"><?php echo $row_RsOrderDetails['Rate']; ?></td>
    <td width="10%"><?php echo $row_RsOrderDetails['Amount']; ?></td>
    <td width="10%"><?php echo $row_RsOrderDetails['R_Id']; ?></td>
  </tr>
  <?php } while ($row_RsOrderDetails = mysql_fetch_assoc($RsOrderDetails)); ?>
                               </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                        </div>
                       <hr />
                        <div class="form-group row">
                        <div class="col-lg-5">
                        <div class="form-group">
                    <label  class="control-label col-lg-6">Delivery Date :</label>
                    <div class="col-lg-6">
                    <input type="text" id="Delivery_Date" class="form-control" name="Delivery_Date" value="<?php echo $Delivery_Date; ?>" readonly/>
                    </div>
                </div>
                    </div>
                         <div class="col-lg-2">
                         </div>
                         <div class="col-lg-5">
                         <div class="form-group">
                    <label  class="control-label col-lg-6">Total Amount :</label>
                    <div class="col-lg-6">
                    <input type="text" id="Total_Amt" placeholder="" class="form-control" name="Total_Amt" value="<?php echo $Total_Amt; ?>" readonly/>
                    </div>
                </div>
                         </div>
                         </div>
                         <div class="form-group row">
                          <div class="col-lg-5">
                          <div class="form-group">
                    <label for="text2" class="control-label col-lg-6">Status :</label>
                    <div class="col-lg-6">
                    <input type="text" id="Status" placeholder="" class="form-control" value="<?php echo $Status; ?>" name="Status" readonly />
                    </div>
                </div>
                          </div>
                        <div class="col-lg-2">
                        </div>
                       <div class="col-lg-5">
                       <div class="form-group">
                    <label for="text2" class="control-label col-lg-6">Discount(%) :</label>
                    <div class="col-lg-6">
                    <input type="text" id="Discount" placeholder="" class="form-control" name="Discount" value="<?php echo $Discount; ?>" readonly/>
                    </div>
                </div>
                         </div>
                         </div>
                         <div class="form-group row">
                         <div class="col-lg-5">
                         <div class="form-group">
                    <label for="autosize"  class="control-label col-lg-6">Description :</label>
                    <div class="col-lg-6">
                     <textarea id="autosize" class="form-control" name="autosize" placeholder="Any information related to this order" readonly><?php echo $Remark;  ?></textarea>
                    </div>
                </div>
                          </div>
                        <div class="col-lg-2">
                        </div>
                       <div class="col-lg-5">
                       <div class="form-group">
                    <label  class="control-label col-lg-6">Grand Total :</label>
                    <div class="col-lg-6">
                    <input type="text" id="Grandtotal" placeholder="" class="form-control" name="Grandtotal" value="<?php echo $Grandtotal; ?>" readonly />
                    </div>
                </div>
                         </div>
                         </div>
                         <div class="form-group row">
                          <div class="col-lg-5">
                          <div class="form-group">
                    <label  class="control-label col-lg-6">Advance Amount :</label>
                    <div class="col-lg-6">
                    <input type="text" id="Advance_Amt" placeholder="" class="form-control" name="Advance_Amt" value="<?php echo $Advance_Amt; ?>" readonly />
                    </div>
                </div>
                          </div>
                        <div class="col-lg-2">
                        <div class="form-group">
                    <label  class="control-label col-lg-7">Entry #ID :</label>
                    <div class="col-lg-5">
                         <input type="text" id="Entry_Id" placeholder="" class="form-control" name="Entry_Id" value="<?php echo $Entry_Id; ?>" readonly />
                        </div>
                </div>
                          </div>
                          <div class="col-lg-5">
                          <div class="form-group">
                    <label  class="control-label col-lg-6">Remaining Amount :</label>
                    <div class="col-lg-6">
                    <input type="text" id="Re_Amt" placeholder="" class="form-control" name="Re_Amt" value="<?php echo $Re_Amt; ?>" readonly/>
                    </div>
                </div>
                          </div>
                          </div>
                     <div class="form-group row">
                        <div class="col-lg-5">
                        </div>
                        <div class="col-lg-3">
                        </div>
                        <div class="col-lg-4">
                            <a href="order_listpage"><input type="button" value=" Back" class="btn btn-inverse btn-lg" /></a>
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
mysql_free_result($RsOrderDetails);
 ob_flush(); ?>