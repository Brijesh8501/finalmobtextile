<?php include("logcode.php"); require_once('../Connections/brijesh8510.php');  
    include("databaseconnect.php");
if(isset($_REQUEST['view']))
{
	$decodeurl = $_REQUEST['Sa_Labour_Id'];
		$durl = urldecode($decodeurl); 
	$turl = str_replace("'"," ",$durl);
	$urls = explode(" ",$turl);
	$Sa_Labour_Id = $urls[1];
		$sql = "select saree_labsal.Sa_Labour_Id,saree_labsal.Total_S_Amount,saree_production.Total_Meter,saree_labsal.Sa_Pro_Id,machine_details.Machine_No,beam_dcorg.Beam_No,saree_labsal.Total_MeterLab,saree_labsal.Entry_Date,saree_labsal.Entry_Id from saree_production,beam_dcorg,saree_labsal,beam_machine,machine_details where saree_production.Sa_Pro_Id = saree_labsal.Sa_Pro_Id AND beam_machine.Be_M_Id = saree_production.Be_M_Id AND machine_details.Machine_Id = beam_machine.Machine_Id AND beam_machine.Be_D_C_Id = beam_dcorg.Be_D_C_Id AND Sa_Labour_Id = '".$Sa_Labour_Id."' ";
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
	$Sa_Labour_Id = $row['Sa_Labour_Id'];	
	$Sa_Pro_Id = $row['Sa_Pro_Id'];		
	$Machine_No = $row['Machine_No'];
	$Total_MeterLab = $row['Total_MeterLab'];
	$Entry_Id = $row['Entry_Id'];
	$Entry_Date = $row['Entry_Date'];
	$Saree_T_Meter = $row['Total_Meter'];
	$Beam_No = $row['Beam_No'];
	$Total_S_Amount = $row['Total_S_Amount'];
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
$query_RsTaka = "select Saree_Labour_Id,Sa_Labour_Id,S_Date,Saree_Meter,S_Rate,S_Amount,labour_details.Name,saree_labsalsuborg1.Description,R_Id,quality_details.Quality_Name,design_details.Design from saree_labsalsuborg1,labour_details,quality_details,design_details where labour_details.Labour_Id = saree_labsalsuborg1.Labour_Id and design_details.Design_Id = saree_labsalsuborg1.Design_Id AND quality_details.Quality_Id = design_details.Quality_Id AND saree_labsalsuborg1.Sa_Labour_Id = '".$Sa_Labour_Id."' order by saree_labsalsuborg1.saree_Labour_Id asc";
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
                    <h1 class="page-header" align="center">SAREE-LABOUR</h1>
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
                    <label for="text2" class="control-label col-lg-6">Saree-Labour ID :</label>
                    <div class="col-lg-6">
                    <input type="text" id="Sa_Labour_Id" placeholder="" class="form-control" name="Sa_Labour_Id" value="<?php echo $Sa_Labour_Id; ?>" readonly />
                    </div>
                </div>
                        </div>
                        <div class="col-lg-4">
                        <div class="form-group">
                        <label class="control-label col-lg-5">Machine No :</label>
                        <div class="col-lg-7">
                            <input class="form-control" type="text"   name="Machine_No" id="Machine_No" value="<?php echo $Machine_No; ?>" readonly/>
                            </div>
                        </div>
                    </div>
                        <div class="col-lg-4">
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-6">Saree-Production ID :</label>
                    <div class="col-lg-6">
                    <input type="text" id="Sa_Pro_Id" placeholder="" class="form-control" name="Sa_Pro_Id" value="<?php echo $Sa_Pro_Id; ?>" readonly />
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
                                             <th>Date</th>
                                             <th>Quality</th>
                                             <th>Design</th>
                                             <th>Meter</th>
                                             <th>Rate</th>
                                             <th>Amount</th>
                                            <th>Labour</th>
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
                                          <td width="10%"><?php echo $row_RsTaka['S_Date']; ?></td>
                                           <td width="25%"><?php echo $row_RsTaka['Quality_Name']; ?></td>
                                           <td width="15%"><?php echo $row_RsTaka['Design']; ?></td>
                                          <td width="10%"><?php echo $row_RsTaka['Saree_Meter']; ?></td>
                                          <td width="10%"><?php echo $row_RsTaka['S_Rate']; ?></td>
                                          <td width="10%"><?php echo $row_RsTaka['S_Amount']; ?></td>
                                          <td width="10%"><?php echo $row_RsTaka['Name']; ?></td>
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
                                            <th>Labour</th>
                                            <th>Quality</th>
                                            <th>Design</th>
                                             <th>Total Meter</th>
                                             <th>Total Amount</th>
                                        </tr>
                                    </thead>
                                    <?php 
									$i = 0;
									$i++;
									?>
                                    <tbody>
                                      <?php $sqllab = "select sum(Saree_Meter) as Sum_Meter ,sum(S_Amount) as Sum_Amount , quality_details.Quality_Name,design_details.Design,labour_details.Name from saree_labsalsuborg1,quality_details,labour_details,design_details where design_details.Design_Id = saree_labsalsuborg1.Design_Id AND quality_details.Quality_Id = design_details.Quality_Id AND labour_details.Labour_Id = saree_labsalsuborg1.Labour_Id AND Sa_Labour_Id = '".$Sa_Labour_Id."' group by quality_details.Quality_Name,labour_details.Name,design_details.Design";
	$resultlab = mysql_query($sqllab);
	while($rowlab = mysql_fetch_array($resultlab)) {?>
                                      <tr>
                                          <td width="10%"><?php echo $i++; ?></td>
                                          <td width="10%"><?php echo $rowlab['Name']; ?></td>
                                          <td width="20%"><?php echo $rowlab['Quality_Name']; ?></td>
                                          <td width="20%"><?php echo $rowlab['Design']; ?></td>
                                          <td width="10%"><?php echo $rowlab['Sum_Meter']; ?></td>
                                          <td width="10%"><?php echo $rowlab['Sum_Amount']; ?></td>
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
                    <label for="text2" class="control-label col-lg-5">Total Meter :</label>
                    <div class="col-lg-7">
                    <input type="text" id="Total_MeterLab" placeholder="" class="form-control" name="Total_MeterLab" value="<?php echo $Total_MeterLab; ?>" readonly/>
                    </div>
                </div>
                        </div>
                        <div class="col-lg-4">
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Prod-Total Meter :</label>
                    <div class="col-lg-7">
                    <input type="text" id="Saree_T_Meter" placeholder="" class="form-control" name="Saree_T_Meter"  value="<?php echo $Saree_T_Meter; ?>"  readonly />
                    </div>
                </div>
                      </div>
                       <div class="col-lg-4">
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Total Amount :</label>
                    <div class="col-lg-7">
                    <input type="text" id="Total_S_Amount" placeholder="" class="form-control" name="Total_S_Amount"  value="<?php echo $Total_S_Amount; ?>"  readonly />
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
                    <label for="text2" class="control-label col-lg-5">Entry #Date :</label>
                    <div class="col-lg-7">
                    <input type="text" id="Entry_Date" placeholder="" class="form-control" name="Entry_Date"  value="<?php echo $Entry_Date; ?>"  readonly/>
                    </div>
                </div>
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
                                     <a href="sareeprolabsalist"><input type="button" value="Back" class="btn btn-inverse btn-lg " name="back"/></a> 
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