<?php include("logcode.php"); require_once('../Connections/brijesh8510.php'); 
 include("databaseconnect.php");
if(isset($_REQUEST['view']))
{
		$decodeurl = $_REQUEST['Saree_Invoice_Id'];
	$durl = urldecode($decodeurl); 
	$turl = str_replace("'"," ",$durl);
	$urls = explode(" ",$turl);
	$Saree_Invoice_Id = $urls[1];
		$sql = "SELECT saree_invoice.Saree_Invoice_Id, saree_invoice.Saree_Invoice_Date, saree_invoice.Saree_D_C_Id, saree_invoice.Saree_D_C_Date, customer_details.Cu_En_Name, customer_details.Customer_Id, broker_details1.B_Name, broker_details1.Broker_Id, saree_invoice.Total_Amt, saree_invoice.Discount, saree_invoice.Grandtotal, saree_invoice.Entry_Id FROM saree_invoice, customer_details, broker_details1 WHERE customer_details.Customer_Id = saree_invoice.Customer_Id AND broker_details1.Broker_Id = saree_invoice.Broker_Id AND  Saree_Invoice_Id = '".$Saree_Invoice_Id."' ";
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
	$Saree_Invoice_Id = $row['Saree_Invoice_Id'];	
	$Saree_Invoice_Date = $row['Saree_Invoice_Date'];		
	$Saree_D_C_Id = $row['Saree_D_C_Id'];
	$Saree_D_C_Date = $row['Saree_D_C_Date'];
	$Cu_En_Name = $row['Cu_En_Name'];
	$B_Name = $row['B_Name'];
	$Total_Amt = $row['Total_Amt'];
	$Discount = $row['Discount'];
	$Grandtotal = $row['Grandtotal'];
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
}}
mysql_select_db($database_brijesh8510, $brijesh8510);
$query_rsLotid = "SELECT saree_invoiceorg.Sa_Invoice_Id, saree_invoiceorg.Saree_Invoice_Id, quality_details.Quality_Name, design_details.Design, saree_invoiceorg.Total_Meter,saree_invoiceorg.Total_Weight, saree_invoiceorg.Total_Pieces, saree_invoiceorg.Rate, saree_invoiceorg.Amt, saree_invoiceorg.R_Id FROM saree_invoiceorg, quality_details, design_details WHERE quality_details.Quality_Id = design_details.Quality_Id AND design_details.Design_Id = saree_invoiceorg.Design_Id AND saree_invoiceorg.Saree_Invoice_Id='".$Saree_Invoice_Id."' ";
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
                    <h1 class="page-header" align="center">SAREE INVOICE</h1>
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
                    <input type="text" id="text2" placeholder="" name="Cu_En_Name" value="<?php echo $Cu_En_Name; ?>" class="form-control" readonly />
                    </div>
                </div>
                        </div>
                       <div class="col-lg-4">
                       <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Invoice Date :</label>
                    <div class="col-lg-7">
                    <input type="text" id="Saree_Invoice_Date" placeholder="" class="form-control" name="Saree_Invoice_Date" value="<?php echo $Saree_Invoice_Date; ?>" readonly />
                    </div>
                </div>     
                        </div>
                         <div class="col-lg-4">
                         <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Invoice ID :</label>
                    <div class="col-lg-7">
                    <input type="text" id="Saree_Invoice_Id" placeholder="" class="form-control" name="Saree_Invoice_Id" value="<?php echo $Saree_Invoice_Id; ?>" readonly />
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
                        <div class="col-lg-4">
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Challan Date :</label>
                    <div class="col-lg-7">
                    <input type="text" id="text2" placeholder="" name="Saree_D_C_Date" value="<?php echo $Saree_D_C_Date; ?>" class="form-control" readonly />
                    </div>
                </div>
                        </div>
                        <div class="col-lg-4">
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Challan ID :</label>
                    <div class="col-lg-7">
                    <input type="text" id="Saree_D_C_Id" placeholder="" class="form-control" name="Saree_D_C_Id" value="<?php echo $Saree_D_C_Id; ?>" readonly />
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
                                            <th>Quality</th>
                                            <th>Design</th>
                                             <th>Total meter</th>
                                             <th>Total weight</th>
                                            <th>Total pieces</th>
                                            <th>Rate</th>
                                            <th>Amount</th>
                                            <th>#ID</th>
                                            </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i=0;
									$i++;
									 do { ?>
  <tr>
    <td><?php echo $i++; ?></td>
    <td><?php echo $row_rsLotid['Quality_Name']; ?></td>
    <td><?php echo $row_rsLotid['Design']; ?></td>
    <td><?php echo $row_rsLotid['Total_Meter']; ?></td>
    <td><?php echo $row_rsLotid['Total_Weight']; ?></td>
    <td><?php echo $row_rsLotid['Total_Pieces']; ?></td>
    <td><?php echo $row_rsLotid['Rate']; ?></td>
    <td><?php echo $row_rsLotid['Amt']; ?></td>
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
                        <div class="col-lg-3">
                        </div>
                        <div class="col-lg-5">
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-6">Total Amount :</label>
                    <div class="col-lg-6">
                    <input type="text" id="Total_Amt" placeholder="" class="form-control" name="Total_Amt" value="<?php echo $Total_Amt; ?>" readonly  />
                    </div>
                </div>
                        </div>
                         <div class="col-lg-4">
                         </div>
                          <div class="col-lg-3">
                          </div>
                        <div class="col-lg-5">
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-6">Discount(%) :</label>
                    <div class="col-lg-6">
                    <input type="text" id="Discount" placeholder="" class="form-control" name="Discount" value="<?php echo $Discount; ?>"  readonly/>
                    </div>
                </div>
                        </div>
                        <div class="col-lg-4">
                         </div>
                          <div class="col-lg-3">
                          </div>
                        <div class="col-lg-5">
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-6">Grand Total :</label>
                    <div class="col-lg-6">
                    <input type="text" id="Grandtotal" placeholder="" class="form-control" name="Grandtotal" value="<?php echo $Grandtotal; ?>" readonly />
                    </div>
                </div>
                        </div> 
                          <div class="col-lg-4">
                         </div>
                          <div class="col-lg-3">
                          </div>
                        <div class="col-lg-5">
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-6">Entry #ID :</label>
                    <div class="col-lg-6">
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
                           <a href="saree_invoice85_list"> <input type="button" value=" Back" class="btn btn-inverse btn-lg " /></a>
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
mysql_free_result($rsLotid);
ob_flush(); ?>