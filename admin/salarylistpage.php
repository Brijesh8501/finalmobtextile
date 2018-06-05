<?php include("logcode.php");require_once('../Connections/brijesh8510.php'); 
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
$query_rsBe = "select salary_master.Sal_Mast_Id,salary_master.Date_Range,salary_master.Total_Meter,salary_master.Total_Amt,salary_master.Status,Entry_Date,salary_master.`Entry_Id`,labour_details.Name from salary_master,labour_details where labour_details.Labour_Id = salary_master.Labour_Id";
$rsBe = mysql_query($query_rsBe, $brijesh8510) or die(mysql_error());
$row_rsBe = mysql_fetch_assoc($rsBe);
$totalRows_rsBe = mysql_num_rows($rsBe);
if(isset($_REQUEST['msg']))
{
	$msg = '<center style="color:#090; font-size:24px">'."Record inserted</center>";
}
if(isset($_REQUEST['msg_up']))
{
	$msg = '<center style="color:#090; font-size:24px">'."Record updated</center>";
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
    <link rel="stylesheet" href="assets/css/MoneAdmin.css" />
    <link rel="stylesheet" href="assets/plugins/Font-Awesome/css/font-awesome.css" />
    <link href="assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    <style type="text/css">
    .btn-danger {
		border-radius:5px;
	}
</style>
    </head>
<body>
      <?php include("sidemenu.php"); ?>   
            <div class="inner">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 align="center">SALARY PROFILE</h2>
                          </div>
                </div>
                <hr />
                <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading"><table border="0"><tr><td><a href="salaryins.php" target="_blank"><button class="btn btn-primary"><i class="icon-plus-sign icon-white"></i> Add Entry</button></a></td><td width="100%"><?php if(isset($_REQUEST['msg_up']))
{ echo $msg; } if(isset($_REQUEST['msg']))
{ echo $msg; } ?></td></tr></table></div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th width="10%">Salary ID</th>
                                             <th width="15%">Date Range</th>
                                              <th width="10%">Labour</th>
                                            <th width="10%">Total Meter</th>
                                            <th width="10%">Total Amount</th>
                                            <th width="10%">Status</th>
                                           <th width="10%">Entry Date</th>
                                           <th width="10%">Entry #ID</th>
                                           <th width="15%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
        <?php if($totalRows_rsBe==0) { 
	}
	else
	{
                                       do { ?>
  <tr class="odd gradeX">
    <td><?php echo $row_rsBe['Sal_Mast_Id']; ?></td>
    <td><?php echo $row_rsBe['Date_Range']; ?></td>
    <td><?php echo $row_rsBe['Name']; ?></td>
    <td><?php echo $row_rsBe['Total_Meter']; ?></td>
    <td><?php echo $row_rsBe['Total_Amt']; ?></td>
    <td><?php echo $row_rsBe['Status']; ?></td>
    <td><?php echo $row_rsBe['Entry_Date']; ?></td>
    <td><?php echo $row_rsBe['Entry_Id']; ?></td>
    <td class="center">
    <?php $url = "'".$row_rsBe['Sal_Mast_Id']."'";
   $encodedUrl = urlencode($url);
   $strshuffle = str_shuffle($encodedUrl); 
    ?> <div class="tooltip-demo">
   <a href="salaryview.php?view&Sal_Mast_Id=<?php echo $encodedUrl.''.$encodedUrl.''.$strshuffle; ?>" target="_blank"><button class="btn btn-xs" data-toggle="tooltip" data-placement="top" title="View"><i class="icon-eye-open"></i></button></a>&nbsp;
   <a href="salaryupdate.php?update&Sal_Mast_Id=<?php echo $encodedUrl.''.$encodedUrl.''.$strshuffle; ?>" target="_blank"><button class="btn btn-inverse btn-xs" data-toggle="tooltip" data-placement="top" title="Update"><i class="icon-edit"></i></button></a>&nbsp;
   </div> </td>
  </tr>
  <?php } while ($row_rsBe = mysql_fetch_assoc($rsBe)); 
   }
	?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
  <?php include("footer.php");?>
    <script src="assets/js/shortcut.js"></script>
   <script src="assets/js/googleapi.js"></script>
    <script src="assets/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="assets/plugins/dataTables/dataTables.bootstrap.js"></script>
     <script>
         $(document).ready(function () {
             $('#dataTables-example').dataTable();
			 
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
mysql_free_result($rsBe);
ob_flush(); ?>