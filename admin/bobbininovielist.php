<?php include("logcode.php"); require_once('../Connections/brijesh8510.php'); error_reporting(0);
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
$query_rsInvoice = "SELECT bobbin_invoice.Bobbin_Invoice_Id, bobbin_invoice.Bobbin_Invoice_Date, bobbin_invoice.Invoice_No, bobbin_invoice.Bo_D_C_Id, bobbin_d_c.Bo_D_C_No,bobbin_invoice.Grand_Amt, bobbin_invoice.Entry_Date,bobbin_invoice.Entry_Id FROM bobbin_invoice, bobbin_d_c WHERE bobbin_invoice.Bo_D_C_Id = bobbin_d_c.Bo_D_C_Id";
$rsInvoice = mysql_query($query_rsInvoice, $brijesh8510) or die(mysql_error());
$row_rsInvoice = mysql_fetch_assoc($rsInvoice);
$totalRows_rsInvoice = mysql_num_rows($rsInvoice);
if(isset($_REQUEST['msg_error']))
{
	$msg_error = $_REQUEST['msg_error'];
	if($msg_error=='Something gone wrong so your sub entry is not inserted in your last inserted invoice, now please update that invoice first')
	{
		$errorinsert = '<center style="color:#F00; font-size:18px">Something gone wrong so your sub entry is not inserted in your last inserted invoice, now please update that invoice first';
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
                        <h2 align="center">BOBBIN INVOICE PROFILE</h2>
                    </div>
                </div>
                <hr />
                <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                       <div class="panel-heading"><?php if(isset($_REQUEST['msg_error']))
{ echo $errorinsert; } if(isset($_REQUEST['msg']))
{ echo $msg; } ?></div> 
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Invoice ID</th>
                                            <th>Invoice No</th>
                                            <th>Date</th>
                                            <th>Challan ID</th>
                                            <th>Challan No</th>
                                           <th>Grand Total</th>
                                            <th>Entry Date</th>
                                            <th>Entry #ID</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
    <?php   if($totalRows_rsInvoice==0) {
	}
	else
	{
                                       do { ?>
  <tr class="odd gradeX" id="<?php echo $row_rsInvoice['Bobbin_Invoice_Id']; ?>">
    <td><?php echo $row_rsInvoice['Bobbin_Invoice_Id']; ?></td>
    <td><?php echo $row_rsInvoice['Invoice_No']; ?></td>
    <td><?php echo $row_rsInvoice['Bobbin_Invoice_Date']; ?></td>
    <td><?php echo $row_rsInvoice['Bo_D_C_Id']; ?></td>
    <td><?php echo $row_rsInvoice['Bo_D_C_No']; ?></td>
    <td><?php echo $row_rsInvoice['Grand_Amt']; ?></td>
    <td><?php echo $row_rsInvoice['Entry_Date']; ?></td>
   <td><?php echo $row_rsInvoice['Entry_Id']; ?></td>
    <td class="center" align="center">
     <?php $url = "'".$row_rsInvoice['Bobbin_Invoice_Id']."'";
   $encodedUrl = urlencode($url);
   $strshuffle = str_shuffle($encodedUrl); 
    ?> <div class="tooltip-demo">
    <a href="bobbininvoice85view?view&Bobbin_Invoice_Id=<?php echo $encodedUrl.''.$encodedUrl.''.$strshuffle; ?>" target="_blank"><button class="btn btn-xs" data-toggle="tooltip" data-placement="top" title="View" name="View<?php echo $row_rsInvoice['Bobbin_Invoice_Id']; ?>" id="View<?php echo $row_rsInvoice['Bobbin_Invoice_Id']; ?>"><i class="icon-eye-open"></i></button></a>&nbsp;
    <a href="bobbin_invoice85?action=update&Bobbin_Invoice_Id=<?php echo $encodedUrl.''.$encodedUrl.''.$strshuffle; ?>" target="_blank"><button class="btn btn-inverse btn-xs" data-toggle="tooltip" data-placement="top" title="Update challan" name="Update<?php echo $row_rsInvoice['Bobbin_Invoice_Id']; ?>" id="Update<?php echo $row_rsInvoice['Bobbin_Invoice_Id']; ?>"><i class="icon-edit"></i></button></a>&nbsp;<?php if($row_result['Role']=='Admin'){
	   if($row_result['Name']=='MICKY AHIR'){ ?>
   <button class="btn-danger" name="Delete<?php echo $row_rsInvoice['Bobbin_Invoice_Id']; ?>" id="Delete<?php echo $row_rsInvoice['Bobbin_Invoice_Id']; ?>" rel="<?php echo $row_rsInvoice['Bobbin_Invoice_Id']; ?>"><i class="icon-remove icon-white"></i></button><?php } } ?></div></td>
  </tr>
  <?php } while ($row_rsInvoice = mysql_fetch_assoc($rsInvoice)); 
             } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
   <?php include("footer.php"); ?>
     <script src="assets/js/shortcut.js"></script>
    <script src="assets/js/googleapi.js">
	</script>
     <script>
        $(document).ready(function () {
     		$('.btn-danger').click(function(){
       var del_id = $(this).attr('rel');
       $.post('bobbin_invoicedelete.php', {delete_id:del_id}, function(data) {
          if(data == 'true') {
		  $('#'+del_id+' a').removeAttr('href'); 
			 $('#Update'+del_id).prop('disabled', true);
			 $('#View'+del_id).prop('disabled', true);
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
mysql_free_result($rsInvoice);
 ob_flush(); ?>