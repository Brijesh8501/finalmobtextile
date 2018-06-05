<?php include("logcode.php"); 
require_once('../Connections/brijesh8510.php');
if($row_result['Role']=='Admin' || $row_result['Role']=='Manager' || $row_result['Role']=='Accountant')
{
	
}
else
{
	
	echo '<script>alert("You have no rights to view this page");</script>';
	$updateGoTo = "index";
  echo '<script>window.location="'.$updateGoTo.'";</script>';
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
if(isset($_REQUEST['beam']))
{
	$msg_for_tra = "BEAM";
mysql_select_db($database_brijesh8510, $brijesh8510);
$query_rsTra = "SELECT transactions_beam1.Trans_Id, transactions_beam1.Trans_Invoice_No, transactions_beam1.Trans_Date, transactions_beam1.Trans_Amt, transactions_beam1.Payment_Type, transactions_beam1.Chq_No, transactions_beam1.Chq_Date, transactions_beam1.`Description`, transactions_beam1.Status, transactions_beam1.Entry_Date, transactions_beam1.Entry_Id FROM transactions_beam1";
$rsTra = mysql_query($query_rsTra, $brijesh8510) or die(mysql_error());
$row_rsTra = mysql_fetch_assoc($rsTra);
$totalRows_rsTra = mysql_num_rows($rsTra);
}
if(isset($_REQUEST['bobbin']))
{
	$msg_for_tra = "BOBBIN";
	mysql_select_db($database_brijesh8510, $brijesh8510);
$query_rsTra = "SELECT transactions_bobbin.Trans_Id, transactions_bobbin.Trans_Invoice_No, transactions_bobbin.Trans_Date, transactions_bobbin.Trans_Amt, transactions_bobbin.Payment_Type, transactions_bobbin.Chq_No, transactions_bobbin.Chq_Date, transactions_bobbin.`Description`, transactions_bobbin.Status, transactions_bobbin.Entry_Date, transactions_bobbin.Entry_Id FROM transactions_bobbin";
$rsTra = mysql_query($query_rsTra, $brijesh8510) or die(mysql_error());
$row_rsTra = mysql_fetch_assoc($rsTra);
$totalRows_rsTra = mysql_num_rows($rsTra);
}
if(isset($_REQUEST['taka']))
{
	$msg_for_tra = "TAKA";
	mysql_select_db($database_brijesh8510, $brijesh8510);
$query_rsTra = "SELECT transactions_taka.Trans_Id, transactions_taka.Trans_Invoice_No, transactions_taka.Trans_Date, transactions_taka.Trans_Amt, transactions_taka.Payment_Type, transactions_taka.Chq_No, transactions_taka.Chq_Date, transactions_taka.`Description`, transactions_taka.Status, transactions_taka.Entry_Date, transactions_taka.Entry_Id FROM transactions_taka";
$rsTra = mysql_query($query_rsTra, $brijesh8510) or die(mysql_error());
$row_rsTra = mysql_fetch_assoc($rsTra);
$totalRows_rsTra = mysql_num_rows($rsTra);
}
if(isset($_REQUEST['saree']))
{
	$msg_for_tra = "SAREE";
	mysql_select_db($database_brijesh8510, $brijesh8510);
$query_rsTra = "SELECT transactions_saree.Trans_Id, transactions_saree.Trans_Invoice_No, transactions_saree.Trans_Date, transactions_saree.Trans_Amt, transactions_saree.Payment_Type, transactions_saree.Chq_No, transactions_saree.Chq_Date, transactions_saree.`Description`, transactions_saree.Status, transactions_saree.Entry_Date, transactions_saree.Entry_Id FROM transactions_saree";
$rsTra = mysql_query($query_rsTra, $brijesh8510) or die(mysql_error());
$row_rsTra = mysql_fetch_assoc($rsTra);
$totalRows_rsTra = mysql_num_rows($rsTra);
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
   <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="stylesheet" href="assets/css/MoneAdmin.css" />
    <link rel="stylesheet" href="assets/plugins/Font-Awesome/css/font-awesome.css" />
    <link href="assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
     <link rel="shortcut icon" href="Icons/st85.png">
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
                        <h2 align="center"><?php echo $msg_for_tra;?>&nbsp;TRANSACTION PROFILE</h2>
                    </div>
                </div>
                <hr />
                <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <table border="0">
                        <tr>
                        <td>
                        <select name="Trans_Type" class="form-control" id="Trans_Type">
    <option value="">--Select--</option>
    <option value="Beam" >Beam</option>
                    <option value="Bobbin">Bobbin</option>
                    <option value="Taka">Taka</option>
                    <option value="Saree">Saree</option>
  </select></td><td id="result">&nbsp;</td></tr></table></div>
                        <div class="panel-body">
                            <div class="table-responsive">
                            <?php if(isset($_REQUEST['beam']))
							{
								?>
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Transaction ID</th>
                                              <th>Invoice ID</th>
                                            <th>Invoice Date</th>
                                            <th>Invoice Amount</th>
                                           <th>Status</th>
                                           <th>Entry Date</th>
                                           <th>Entry #ID</th>
                                           <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
        <?php if($totalRows_rsTra==0) { 
	
	}
	else
	{
	?>
                                      <?php do { ?>
  <tr class="odd gradeX" id="<?php echo $row_rsTra['Trans_Id']; ?>">
    
    <td><?php echo $row_rsTra['Trans_Id']; ?></td>
    <td><?php echo $row_rsTra['Trans_Invoice_No']; ?></td>
    <td><?php echo $row_rsTra['Trans_Date']; ?></td>
    <td><?php echo $row_rsTra['Trans_Amt']; ?></td>
    <td><?php echo $row_rsTra['Status']; ?></td>
     <td><?php echo $row_rsTra['Entry_Date']; ?></td>
    <td><?php echo $row_rsTra['Entry_Id']; ?></td>
    <td class="center" align="center">
    <?php
    $url = "'".$row_rsTra['Trans_Id']."'";
   $encodedUrl = urlencode($url);
   $strshuffle = str_shuffle($encodedUrl); ?> 
   <div class="tooltip-demo">
    <a href="transviewpg?view=Beam&Trans_Id=<?php echo $encodedUrl.''.$encodedUrl.''.$strshuffle; ?>" target="_blank"><button class="btn btn-xs" data-toggle="tooltip" data-placement="top" title="View" name="View<?php echo $row_rsTra['Trans_Id']; ?>" id="View<?php echo $row_rsTra['Trans_Id']; ?>"><i class="icon-eye-open" ></i></button></a>&nbsp;
    <a href="transcationinsert?act=Beam&Trans_Id=<?php echo $encodedUrl.''.$encodedUrl.''.$strshuffle; ?>" target="_blank"><button class="btn btn-inverse btn-xs" data-toggle="tooltip" data-placement="top" title="Update" name="Update<?php echo $row_rsTra['Trans_Id']; ?>" id="Update<?php echo $row_rsTra['Trans_Id']; ?>"><i class="icon-edit"></i></button></a>&nbsp;
     <button class="btn-danger" name="Delete<?php echo $row_rsTra['Trans_Id']; ?>" id="Delete<?php echo $row_rsTra['Trans_Id']; ?>" rel="<?php echo $row_rsTra['Trans_Id']; ?>"><i class="icon-remove icon-white"></i></button>
   </div>
    </td>
  </tr>
  <?php } while ($row_rsTra = mysql_fetch_assoc($rsTra)); ?>
   <?php }
	?>
                                    </tbody>
                                </table>
                                <?php } elseif(isset($_REQUEST['bobbin']))
							{
								?>
                                 <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Transaction ID</th>
                                              <th>Invoice ID</th>
                                            <th>Invoice Date</th>
                                            <th>Invoice Amount</th>
                                           <th>Status</th>
                                            <th>Entry Date</th>
                                           <th>Entry #ID</th>
                                           <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
        <?php if($totalRows_rsTra==0) { 
	
	}
	else
	{
	?>
                                      <?php do { ?>
  <tr class="odd gradeX" id="<?php echo $row_rsTra['Trans_Id']; ?>">
    
    <td><?php echo $row_rsTra['Trans_Id']; ?></td>
    <td><?php echo $row_rsTra['Trans_Invoice_No']; ?></td>
    <td><?php echo $row_rsTra['Trans_Date']; ?></td>
    <td><?php echo $row_rsTra['Trans_Amt']; ?></td>
    <td><?php echo $row_rsTra['Status']; ?></td>
     <td><?php echo $row_rsTra['Entry_Date']; ?></td>
    <td><?php echo $row_rsTra['Entry_Id']; ?></td>
    <td class="center" align="center">
     <?php
    $url = "'".$row_rsTra['Trans_Id']."'";
   $encodedUrl = urlencode($url);
   $strshuffle = str_shuffle($encodedUrl); ?> 
   <div class="tooltip-demo">
    <a href="transviewpg?view=Bobbin&Trans_Id=<?php echo $encodedUrl.''.$encodedUrl.''.$strshuffle; ?>" target="_blank"><button class="btn btn-xs" data-toggle="tooltip" data-placement="top" title="View" name="View<?php echo $row_rsTra['Trans_Id']; ?>" id="View<?php echo $row_rsTra['Trans_Id']; ?>"><i class="icon-eye-open"></i></button></a>&nbsp;
    <a href="transcationinsert?act=Bobbin&Trans_Id=<?php echo $encodedUrl.''.$encodedUrl.''.$strshuffle; ?>" target="_blank"><button class="btn btn-inverse btn-xs" data-toggle="tooltip" data-placement="top" title="Update" name="Update<?php echo $row_rsTra['Trans_Id']; ?>" id="Update<?php echo $row_rsTra['Trans_Id']; ?>"><i class="icon-edit"></i></button></a>&nbsp;
    <button class="btn-danger" name="Delete<?php echo $row_rsTra['Trans_Id']; ?>" id="Delete<?php echo $row_rsTra['Trans_Id']; ?>" rel="<?php echo $row_rsTra['Trans_Id']; ?>"><i class="icon-remove icon-white"></i></button>
   </div>
    </td>
  </tr>
  <?php } while ($row_rsTra = mysql_fetch_assoc($rsTra)); ?>
   <?php }
	?>
                                    </tbody>
                                </table>
                                <?php } elseif(isset($_REQUEST['taka']))
							{
								?>
                                 <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Transaction ID</th>
                                              <th>Invoice ID</th>
                                            <th>Invoice Date</th>
                                            <th>Invoice Amount</th>
                                           <th>Status</th>
                                            <th>Entry Date</th>
                                           <th>Entry #ID</th>
                                           <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
        <?php if($totalRows_rsTra==0) { 
	
	}
	else
	{
	?>
                                      <?php do { ?>
  <tr class="odd gradeX" id="<?php echo $row_rsTra['Trans_Id']; ?>">
    
    <td><?php echo $row_rsTra['Trans_Id']; ?></td>
    <td><?php echo $row_rsTra['Trans_Invoice_No']; ?></td>
    <td><?php echo $row_rsTra['Trans_Date']; ?></td>
    <td><?php echo $row_rsTra['Trans_Amt']; ?></td>
    <td><?php echo $row_rsTra['Status']; ?></td>
     <td><?php echo $row_rsTra['Entry_Date']; ?></td>
    <td><?php echo $row_rsTra['Entry_Id']; ?></td>
    <td class="center" align="center">
     <?php
    $url = "'".$row_rsTra['Trans_Id']."'";
   $encodedUrl = urlencode($url);
   $strshuffle = str_shuffle($encodedUrl); ?> 
   <div class="tooltip-demo">
    <a href="transviewpg?view=Taka&Trans_Id=<?php echo $encodedUrl.''.$encodedUrl.''.$strshuffle; ?>" target="_blank"><button class="btn btn-xs" data-toggle="tooltip" data-placement="top" title="View" name="View<?php echo $row_rsTra['Trans_Id']; ?>" id="View<?php echo $row_rsTra['Trans_Id']; ?>"><i class="icon-eye-open" ></i></button></a>&nbsp;
    <a href="transcationinsert?act=Taka&Trans_Id=<?php echo $encodedUrl.''.$encodedUrl.''.$strshuffle; ?>" target="_blank"><button class="btn btn-inverse btn-xs" data-toggle="tooltip" data-placement="top" title="Update" name="Update<?php echo $row_rsTra['Trans_Id']; ?>" id="Update<?php echo $row_rsTra['Trans_Id']; ?>"><i class="icon-edit"></i></button></a>&nbsp;
     <button class="btn-danger" name="Delete<?php echo $row_rsTra['Trans_Id']; ?>" id="Delete<?php echo $row_rsTra['Trans_Id']; ?>" rel="<?php echo $row_rsTra['Trans_Id']; ?>"><i class="icon-remove icon-white"></i></button>
   </div>
    </td>
  </tr>
  <?php } while ($row_rsTra = mysql_fetch_assoc($rsTra)); ?>
   <?php }
	?>
                                    </tbody>
                                </table>
                                <?php } elseif(isset($_REQUEST['saree']))
							{
								?>
                                 <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Transaction ID</th>
                                              <th>Invoice ID</th>
                                            <th>Invoice Date</th>
                                            <th>Invoice Amount</th>
                                           <th>Status</th>
                                            <th>Entry Date</th>
                                           <th>Entry #ID</th>
                                           <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
        <?php if($totalRows_rsTra==0) { 
	
	}
	else
	{
	?>
                                      <?php do { ?>
  <tr class="odd gradeX" id="<?php echo $row_rsTra['Trans_Id']; ?>">
    
    <td><?php echo $row_rsTra['Trans_Id']; ?></td>
    <td><?php echo $row_rsTra['Trans_Invoice_No']; ?></td>
    <td><?php echo $row_rsTra['Trans_Date']; ?></td>
    <td><?php echo $row_rsTra['Trans_Amt']; ?></td>
    <td><?php echo $row_rsTra['Status']; ?></td>
    <td><?php echo $row_rsTra['Entry_Date']; ?></td>
    <td><?php echo $row_rsTra['Entry_Id']; ?></td>
    <td class="center" align="center">
     <?php
    $url = "'".$row_rsTra['Trans_Id']."'";
   $encodedUrl = urlencode($url);
   $strshuffle = str_shuffle($encodedUrl); ?> 
   <div class="tooltip-demo">
    <a href="transviewpg?view=Saree&Trans_Id=<?php echo $encodedUrl.''.$encodedUrl.''.$strshuffle; ?>" target="_blank"><button class="btn btn-xs" data-toggle="tooltip" data-placement="top" title="View" name="View<?php echo $row_rsTra['Trans_Id']; ?>" id="View<?php echo $row_rsTra['Trans_Id']; ?>"><i class="icon-eye-open"></i></button></a>&nbsp;
    <a href="transcationinsert?act=Saree&Trans_Id=<?php echo $encodedUrl.''.$encodedUrl.''.$strshuffle; ?>" target="_blank"><button class="btn btn-inverse btn-xs" data-toggle="tooltip" data-placement="top" title="Update" name="Update<?php echo $row_rsTra['Trans_Id']; ?>" id="Update<?php echo $row_rsTra['Trans_Id']; ?>"><i class="icon-edit"></i></button></a>&nbsp;
   <button class="btn-danger" name="Delete<?php echo $row_rsTra['Trans_Id']; ?>" id="Delete<?php echo $row_rsTra['Trans_Id']; ?>" rel="<?php echo $row_rsTra['Trans_Id']; ?>"><i class="icon-remove icon-white"></i></button>
   </div>
    </td>
  </tr>
  <?php } while ($row_rsTra = mysql_fetch_assoc($rsTra)); ?>
   <?php }
	?>
                                    </tbody>
                                </table>
                                <?php } ?>
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
	$('#Trans_Type').focus();
$("#Trans_Type").change(function(){
		t5=$("#Trans_Type").val();
		var q="?Trans_Type="+t5;
		$("#result").load("trans_list_addbtn.php"+q);
		});
	 <?php if(isset($_REQUEST['beam']))
							{
								?>
	$('.btn-danger').click(function(){
       var del_id = $(this).attr('rel');
       $.post('transaction_listdelete.php?act=beam', {delete_id:del_id}, function(data) {
          if(data == 'true') {
		  $('#'+del_id+' a').removeAttr('href');  
			 $('#Update'+del_id).prop('disabled', true);
			  $('#View'+del_id).prop('disabled', true);
			 $('#Delete'+del_id).prop('disabled', true);
			 $('#'+del_id).css("color","red");
			alert("Deleted!");
          } else {
             alert('Could not delete!');
	      }
       });
    });
	 <?php } elseif(isset($_REQUEST['bobbin']))
							{
								?>
	$('.btn-danger').click(function(){
       var del_id = $(this).attr('rel');
       $.post('transaction_listdelete.php?act=bobbin', {delete_id:del_id}, function(data) {
          if(data == 'true') {
		  $('#'+del_id+' a').removeAttr('href');  
			 $('#Update'+del_id).prop('disabled', true);
			  $('#View'+del_id).prop('disabled', true);
			 $('#Delete'+del_id).prop('disabled', true);
			 $('#'+del_id).css("color","red");
			alert("Deleted!");
          } else {
             alert('Could not delete!');
	      }
       });
    });
	<?php } elseif(isset($_REQUEST['taka']))
							{
								?>
	$('.btn-danger').click(function(){
       var del_id = $(this).attr('rel');
       $.post('transaction_listdelete.php?act=taka', {delete_id:del_id}, function(data) {
          if(data == 'true') {
		  $('#'+del_id+' a').removeAttr('href');  
			 $('#Update'+del_id).prop('disabled', true);
			  $('#View'+del_id).prop('disabled', true);
			 $('#Delete'+del_id).prop('disabled', true);
			 $('#'+del_id).css("color","red");
			alert("Deleted!");
          } else {
             alert('Could not delete!');
	      }
       });
    });
	 <?php } elseif(isset($_REQUEST['saree']))
							{
								?>
	$('.btn-danger').click(function(){
       var del_id = $(this).attr('rel');
       $.post('transaction_listdelete.php?act=saree', {delete_id:del_id}, function(data) {
          if(data == 'true') {
		   $('#'+del_id+' a').removeAttr('href');  
			 $('#Update'+del_id).prop('disabled', true);
			  $('#View'+del_id).prop('disabled', true);
			 $('#Delete'+del_id).prop('disabled', true);
			 $('#'+del_id).css("color","red");
			alert("Deleted!");
          } else {
             alert('Could not delete!');
	      }
       });
    });
	<?php } ?>
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
mysql_free_result($rsTra);
 ob_flush(); ?>