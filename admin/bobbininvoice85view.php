<?php include("logcode.php"); require_once('../Connections/brijesh8510.php'); 
include("databaseconnect.php");
if(isset($_REQUEST['view']))
{
	$decodeurl = $_REQUEST['Bobbin_Invoice_Id'];
	$durl = urldecode($decodeurl); 
	$turl = str_replace("'"," ",$durl);
	$urls = explode(" ",$turl);
	$Bobbin_Invoice_Id = $urls[1];
	$sql = "SELECT bobbin_invoice.Bobbin_Invoice_Id, bobbin_invoice.Bobbin_Invoice_Date, bobbin_invoice.Invoice_No, bobbin_invoice.Bo_D_C_Id, company_deetaails.Company_Id, company_deetaails.C_Name, broker_details1.Broker_Id, broker_details1.B_Name, bobbin_invoice.Total_Amt, bobbin_invoice.Addtnl_Amt, bobbin_invoice.Grand_Amt, bobbin_invoice.Total_Cart, bobbin_invoice.Entry_Date, bobbin_invoice.Entry_Id FROM bobbin_invoice, company_deetaails, broker_details1 WHERE company_deetaails.Company_Id = bobbin_invoice.Company_Id AND broker_details1.Broker_Id = bobbin_invoice.Broker_Id AND  Bobbin_Invoice_Id = '".$Bobbin_Invoice_Id."'";
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
	$Bobbin_Invoice_Id = $row['Bobbin_Invoice_Id'];
	$Bo_D_C_Id = $row['Bo_D_C_Id'];
	$Bobbin_Invoice_Date = $row['Bobbin_Invoice_Date'];
	$Invoice_No = $row['Invoice_No'];
	$Total_Amt = $row['Total_Amt'];
	$Addtnl_Amt = $row['Addtnl_Amt'];
	$C_Name = $row['C_Name'];
	$B_Name = $row['B_Name'];
	$Total_Cart = $row['Total_Cart'];
	$Grand_Amt = $row['Grand_Amt'];
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
$query_Recordset1 = "SELECT bobbin_invoiceorg.Bo_Invoice_Id, bobbin_invoiceorg.Bobbin_Invoice_Id, bobbin_invoiceorg.Total_Cartoon, bobbin_invoiceorg.Total_Weight, quality_details.Quality_Name, bobbin_invoiceorg.Rate, bobbin_invoiceorg.Amt, bobbin_invoiceorg.R_Id FROM bobbin_invoiceorg, quality_details WHERE quality_details.Quality_Id = bobbin_invoiceorg.Quality_Id AND bobbin_invoiceorg.Bobbin_Invoice_Id='".$Bobbin_Invoice_Id."' ";
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
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="assets/css/main.css" />
</head>
<body>
       <?php include("sidemenu.php") ?>
                <div class="inner">
                    <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" align="center">BOBBIN INVOICE</h1>
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
                    <label for="text2" class="control-label col-lg-5">Invoice Date :</label>
                    <div class="col-lg-7">
                    <input type="text" id="Bobbin_Invoice_Date" placeholder="" name="Bobbin_Invoice_Date" value="<?php echo $Bobbin_Invoice_Date; ?>" class="form-control" readonly />
                    </div>
                </div>
                        </div>
                         <div class="col-lg-4">
                         <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Invoice ID :</label>
                    <div class="col-lg-7">
                    <input type="text" id="Bobbin_Invoice_Id" placeholder="" class="form-control" name="Bobbin_Invoice_Id" value="<?php echo $Bobbin_Invoice_Id; ?>" readonly />
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
                    <label for="text2" class="control-label col-lg-5">Invoice No :</label>
                    <div class="col-lg-7">
                    <input type="text" id="Invoice_No" placeholder="" class="form-control" name="Invoice_No" value="<?php echo $Invoice_No; ?>" readonly />
                    </div>
                </div>
                        </div>
                        <div class="col-lg-4">
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Challan ID :</label>
                    <div class="col-lg-7">
                    <input type="text" id="Bo_D_C_Id" placeholder="" class="form-control" name="Bo_D_C_Id" value="<?php echo $Bo_D_C_Id; ?>" readonly />
                    </div>
                </div>
                        </div>
                    </div>
                    <hr />
                        <div class="col-lg-12" >
                         <div class="row">
                <div class="col-lg-12" >
                            <div class="table-responsive" id="table" >
                                <table class="table table-striped table-bordered table-hover" >
                                    <thead>
                                        <tr>
                                            <th>Sr.No</th>
                                            <th>Cartoon</th>
                                            <th>Weight</th>
                                            <th>Quality</th>
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
                                          <td><?php echo $row_Recordset1['Total_Cartoon']; ?></td>
                                          <td><?php echo $row_Recordset1['Total_Weight']; ?></td>
                                          <td><?php echo $row_Recordset1['Quality_Name']; ?></td>
                                          <td><?php echo $row_Recordset1['Rate']; ?></td>
                                          <td><?php echo $row_Recordset1['Amt']; ?></td>
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
                        <div class="col-lg-3">
                        </div>
                        <div class="col-lg-5">
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Total Cartoon :</label>
                    <div class="col-lg-7">
                    <input type="text" id="totalbeam" placeholder="" class="form-control" name="Total_Cart" value="<?php echo $Total_Cart; ?>"  readonly />
                    </div>
                </div>
                        </div>
                         <div class="col-lg-4">
                        </div>
                        <div class="col-lg-3">
                        </div>
                        <div class="col-lg-5">
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Total Amount :</label>
                    <div class="col-lg-7">
                    <input type="text" id="totalamt" placeholder="" class="form-control" name="Total_Amt" value="<?php echo $Total_Amt; ?>"  readonly />
                    </div>
                </div>
                        </div>
                         <div class="col-lg-4">
                        </div>
                        <div class="col-lg-3">
                        </div>
                        <div class="col-lg-5">
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Additional Amount :</label>
                    <div class="col-lg-7">
                    <input type="text" id="addtnlamt" placeholder="" class="form-control" name="Addtnl_Amt" value="<?php echo $Addtnl_Amt; ?>"  readonly />
                    </div>
                </div>
                        </div>
                        <div class="col-lg-4">
                        </div>
                        <div class="col-lg-3">
                        </div>
                        <div class="col-lg-5">
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Grand Amount :</label>
                    <div class="col-lg-7">
                    <input type="text" id="grandamt" placeholder="" class="form-control" name="Grand_Amt" value="<?php echo $Grand_Amt; ?>"  readonly />
                    </div>
                </div>
                        </div>
                         <div class="col-lg-4">
                        </div>
                        <div class="col-lg-3">
                        </div>
                        <div class="col-lg-5">
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Entry #ID :</label>
                    <div class="col-lg-7">
                     <input type="text" name="Entry_Id" id="Entry_Id" class="form-control" value="<?php echo $Entry_Id;  ?>" readonly/>
                    </div>
                </div>
                        </div> 
                        <div class="col-lg-4">
                        </div>
                        <div class="col-lg-3">
                        </div>
                        <div class="col-lg-5">
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Entry Date :</label>
                    <div class="col-lg-7">
                    <input type="text" id="entrydate" placeholder="" class="form-control" name="Entry_Date" value="<?php echo $Entry_Date; ?>"  readonly />
                    </div>
                </div>
                        </div>
                    <div class="form-group row">
                        <div class="col-lg-5">
                        </div>
                        <div class="col-lg-3">
                        </div>
                        <div class="col-lg-4">
                                  <a href="bobbininovielist"><input type="button" value=" Back" class="btn btn-inverse btn-lg " name="back1"/></a> 
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
mysql_free_result($Recordset1);
ob_flush(); ?>