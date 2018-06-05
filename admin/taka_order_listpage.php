<?php include("logcode.php"); require_once('../Connections/brijesh8510.php');
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
$query_rsOrder = "SELECT taka_order_master.T_Order_Id, taka_order_master.Om_Date, customer_details.Cu_En_Name, broker_details1.B_Name, taka_order_master.Status, taka_order_master.Entry_Id FROM taka_order_master, customer_details, broker_details1 WHERE customer_details.Customer_Id = taka_order_master.Customer_Id AND broker_details1.Broker_Id = taka_order_master.Broker_Id";
$rsOrder = mysql_query($query_rsOrder, $brijesh8510) or die(mysql_error());
$row_rsOrder = mysql_fetch_assoc($rsOrder);
$totalRows_rsOrder = mysql_num_rows($rsOrder);
if(isset($_REQUEST['msg_error']))
{
	$msg_error = $_REQUEST['msg_error'];
	if($msg_error=='Something gone wrong so your sub entry is not inserted in your last inserted entry, now please update that entry first')
	{
		$errorinsert = '<center style="color:#F00; font-size:18px">Something gone wrong so your sub entry is not inserted in your last inserted entry, now please update that entry first';
	}
	elseif($msg_error=='Record inserted')
	{
		$errorinsert = '<center style="color:#090; font-size:24px">Record inserted</center>';
	}
}
if(isset($_REQUEST['msg']))
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
                        <h2 align="center">TAKA ORDER PROFILE</h2>
                    </div>
                </div>
                <hr />
                <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading"><table border="0"><tr><td><a href="takaordersection?action=insert" target="_blank"><button class="btn btn-primary"><i class="icon-plus-sign icon-white"></i> Add Entry</button></a></td><td width="100%"><?php if(isset($_REQUEST['msg_error']))
{ echo $errorinsert; } if(isset($_REQUEST['msg']))
{ echo $msg; } ?></td></tr></table></div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Order ID</th>
                                             <th>Order Date</th>
                                            <th>Customer</th>
                                            <th>Broker</th>
                                            <th>Status</th>
                                            <th>Entry #ID</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
           <?php if($totalRows_rsOrder==0)
		   {                         
		   }
		   else
		   {
                                       do { ?>
  <tr class="odd gradeX" id="<?php echo $row_rsOrder['T_Order_Id']; ?>">
    <td width="10%"><?php echo $row_rsOrder['T_Order_Id']; ?></td>
    <td width="10%"><?php echo $row_rsOrder['Om_Date']; ?></td>
    <td width="25%"><?php echo $row_rsOrder['Cu_En_Name']; ?></td>
    <td width="20%"><?php echo $row_rsOrder['B_Name']; ?></td>
    <td width="10%"><?php echo $row_rsOrder['Status']; ?></td>
    <td width="10%"><?php echo $row_rsOrder['Entry_Id']; ?></td>
    <td class="center" align="center">
     <?php $url = "'".$row_rsOrder['T_Order_Id']."'";
   $encodedUrl = urlencode($url);
   $strshuffle = str_shuffle($encodedUrl); 
    ?> <div class="tooltip-demo">
    <a href="taka_d_c85?action=insert&T_Order_Id=<?php echo $encodedUrl.''.$encodedUrl.''.$strshuffle; ?>" target="_blank"><button class="btn btn-xs" data-toggle="tooltip" data-placement="top" title="Create taka challan" name="Taka<?php echo $row_rsOrder['T_Order_Id']; ?>" id="Taka<?php echo $row_rsOrder['T_Order_Id']; ?>">Taka</button></a>&nbsp;
    <a href="takaordersectionview?view&T_Order_Id=<?php echo $encodedUrl.''.$encodedUrl.''.$strshuffle; ?>" target="_blank"><button class="btn btn-xs" data-toggle="tooltip" data-placement="top" title="view" name="View<?php echo $row_rsOrder['T_Order_Id']; ?>" id="View<?php echo $row_rsOrder['T_Order_Id']; ?>"><i class="icon-eye-open"></i></button></a>&nbsp;
    <a href="takaordersection?action=update&T_Order_Id=<?php echo $encodedUrl.''.$encodedUrl.''.$strshuffle; ?>" target="_blank"><button class="btn btn-inverse btn-xs" data-toggle="tooltip" data-placement="top" title="Update" name="Update<?php echo $row_rsOrder['T_Order_Id']; ?>" id="Update<?php echo $row_rsOrder['T_Order_Id']; ?>"><i class="icon-edit"></i></button></a>&nbsp;
    <?php if($row_result['Role']=='Admin'){
	   if($row_result['Name']=='MICKY AHIR'){ ?>
    <button class="btn-danger" name="Delete<?php echo $row_rsOrder['T_Order_Id']; ?>" id="Delete<?php echo $row_rsOrder['T_Order_Id']; ?>" rel="<?php echo $row_rsOrder['T_Order_Id']; ?>"><i class="icon-remove icon-white"></i></button><?php } } ?></div></td>
  </tr>
  <?php } while ($row_rsOrder = mysql_fetch_assoc($rsOrder)); 
   } ?>
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
      <script src="assets/js/googleapi.js">
	</script>
    <script>
	 $(document).ready(function () {
    		$('.btn-danger').click(function(){
       var del_id = $(this).attr('rel');
       $.post('taka_order_deletelist.php', {delete_id:del_id}, function(data) {
          if(data == 'true') {
		   $('#'+del_id+' a').removeAttr('href');  
			 $('#Update'+del_id).prop('disabled', true);
			  $('#View'+del_id).prop('disabled', true);
			  $('#Taka'+del_id).prop('disabled', true);
			 $('#Delete'+del_id).prop('disabled', true);
			 $('#'+del_id).css("color","red");
		 	alert("Deleted!");
          } else {
             alert('Could not delete!');
			 window.location="loginadmin.php?msg";
	      }
       });
    });
	 });
	 <?php include("shortcutkeys.php");?>
	</script>
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
    </script>
</body>
</html>
<?php
mysql_free_result($rsOrder);
 ob_flush(); ?>