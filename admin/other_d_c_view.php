<?php include("logcode.php"); require_once('../Connections/brijesh8510.php'); error_reporting(0);
include("databaseconnect.php");
if(isset($_REQUEST['view']))
{
		$decodeurl = $_REQUEST['Other_D_C_Id'];
	$durl = urldecode($decodeurl); 
	$turl = str_replace("'"," ",$durl);
	$urls = explode(" ",$turl);
	$Other_D_C_Id = $urls[1];
	$sql = "select * from other_d_c where other_d_c.Other_D_C_Id = '".$Other_D_C_Id."'  ";
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
	$Other_D_C_Id = $row['Other_D_C_Id'];
	$Other_D_C_Date = $row['Other_D_C_Date'];
	$Other_D_C_No = $row['Other_D_C_No'];
	$Total_Other = $row['Total_Other'];
	$Total_Amount = $row['Total_Amount'];
	$From_Ad = $row['From_Ad'];
	$Entry_Id = $row['Entry_Id'];
	$Entry_Date = $row['Entry_Date'];
mysql_select_db($database_brijesh8510, $brijesh8510);
$query_rsSaree = "select Ot_D_C_Id,Other_D_C_Id,machine_parts.Mach_Part_Id,machine_parts.Mach_Pname,Quantity,Rate,Amount,R_Id from other_sub_orgdc,machine_parts where machine_parts.Mach_Part_Id = other_sub_orgdc.Mach_Part_Id AND Other_D_C_Id = '$Other_D_C_Id'";
$rsSaree = mysql_query($query_rsSaree, $brijesh8510) or die(mysql_error());
$row_rsSaree = mysql_fetch_assoc($rsSaree);
$totalRows_rsSaree = mysql_num_rows($rsSaree);	
}
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
       <?php include("sidemenu.php") ?>
                <div class="inner">
                    <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" align="center">OTHER CHALLAN CUM INVOICE</h1>
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
                    <label class="control-label col-lg-6">Party :</label>
                    <div class="col-lg-6">
                        <textarea rows="3" cols="20" id="textarea1" name="From_Ad" class="form-control" readonly><?php echo $From_Ad;?></textarea>
                    </div>
                </div>      
                        </div>
                       <div class="col-lg-4">
                       <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Challan-Invoice Date :</label>
                    <div class="col-lg-7">
                    <input type="text" id="Other_D_C_Date" placeholder="" class="form-control" name="Other_D_C_Date" value="<?php echo $Other_D_C_Date; ?>" readonly />
                    </div>
                </div>
                        </div>
                         <div class="col-lg-4">
                         <div class="form-group">
                    <label for="text2" class="control-label col-lg-6">Other-Challan-Invoice ID :</label>
                    <div class="col-lg-6">
                    <input type="text" id="Other_D_C_Id" placeholder="" class="form-control" name="Other_D_C_Id" value="<?php echo $Other_D_C_Id; ?>" readonly />
                    </div>
                </div>
                        </div>
                    </div>
                    <hr />
                        <div class="col-lg-12" >
                         <div class="row">
                <div class="col-lg-12" >
                            <div class="table-responsive" id="table" >
                               <table class="table table-striped table-bordered table-hover" valign="center">
  <thead>
    <tr>
                                          <th>Sr.No</th>
                                            <th>Machine-Parts</th>
                                            <th>Quantity</th>
                                            <th>Rate</th>
                                            <th>Amount</th>
                                           <th>#ID</th>
      </tr>
       </thead>
       <tbody id="mybody">
        <?php 
                                         $i=0;
									$i++;
                                        do { ?>
          <tr>
                                            <td width="10%"><?php echo $i++; ?></td>
                                            <td width="15%"><?php echo $row_rsSaree['Mach_Pname']; ?></td>
                                           <td class="rowDataSd1" width="10%"><?php echo $row_rsSaree['Quantity']; ?></td> <td width="10%"><?php echo $row_rsSaree['Rate']; ?></td>
                                            <td class="rowDataSd" width="10%"><?php echo $row_rsSaree['Amount']; ?></td>
                                           <td width="10%"><?php echo $row_rsSaree['R_Id']; ?></td>
                                          </tr>
                                           <?php } while ($row_rsSaree = mysql_fetch_assoc($rsSaree));
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
                    <label for="text2" class="control-label col-lg-5">Total :</label>
                    <div class="col-lg-7">
                    <input type="text" id="Total_Other" placeholder="" class="form-control" name="Total_Other" value="<?php echo $Total_Other; ?>" readonly/>
                    </div>
                </div>
                        </div>
                        <div class="col-lg-4">
                        </div>
                        <div class="col-lg-4">
                        </div>
                        <div class="col-lg-4">
                         <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Total Amount :</label>
                    <div class="col-lg-7">
                    <input type="text" id="Total_Amount" placeholder="" class="form-control" name="Total_Amount" value="<?php echo $Total_Amount; ?>" readonly/>
                    </div>
                </div>
                        </div>
                         <div class="col-lg-4">
                        </div>
                        <div class="col-lg-4">
                        </div>
                        <div class="col-lg-4">
                         <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Challan No :</label>
                    <div class="col-lg-7">
                    <input type="text" id="Other_D_C_No" placeholder="" class="form-control" name="Other_D_C_No" value="<?php echo $Other_D_C_No; ?>" readonly/>
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
                    <input type="text" id="Entry_Date" placeholder="" class="form-control" name="Entry_Date"  value="<?php echo $Entry_Date; ?>"  readonly/>
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
                    <input type="text" id="Entry_Id" placeholder="" class="form-control" name="Entry_Id"  value="<?php echo $Entry_Id; ?>"  readonly/>
                    </div>
                </div>
                        </div>
                    <div class="form-group row">
                        <div class="col-lg-8">
                        </div>
                        <div class="col-lg-4">
                                         <a href="other_d_c_list"><input type="button" value="Back" class="btn btn-inverse btn-lg " name="back"/></a> 
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
mysql_free_result($rsSaree);
ob_flush(); ?>