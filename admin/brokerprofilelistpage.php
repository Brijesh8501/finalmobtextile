﻿<?php include("logcode.php"); require_once('../Connections/brijesh8510.php'); 
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
$query_Recordset1 = "SELECT broker_details1.Broker_Id, broker_details1.B_Name, broker_details1.Address, broker_details1.status, broker_details1.Entry_Id FROM broker_details1";
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
                        <h2 align="center">BROKER PROFILE</h2>
                    </div>
                </div>
                <hr />
                <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading"><a href="brokerinsertpage" target="_blank"><button class="btn btn-primary"><i class="icon-plus-sign icon-white"></i> Add Entry</button></a></div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Broker ID</th>
                                            <th>Name</th>
                                            <th>Address</th>
                                           <th>Status</th>
                                            <th>#ID</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
             <?php if($totalRows_Recordset1==0) {
	}
	else
	{
		                                do { ?>
                                        <tr class="odd gradeX" id="<?php echo $row_Recordset1['Broker_Id']; ?>">
                                            <td width="10%"><?php echo $row_Recordset1['Broker_Id']; ?></td>
                                            <td width="30%"><?php echo $row_Recordset1['B_Name']; ?></td>
                                            <td width="30%"><?php echo $row_Recordset1['Address']; ?></td>
                                            <td width="10%"><?php echo $row_Recordset1['status']; ?></td>
                                            <td><?php echo $row_Recordset1['Entry_Id']; ?></td>
                                            <td class="center" align="center"><div class="tooltip-demo"><a href="brokerviewpage?Broker_Id=<?php echo $row_Recordset1['Broker_Id']; ?>" target="_blank"><button class="btn btn-inverse btn-xs" data-toggle="tooltip" data-placement="top" title="View" name="View<?php echo $row_Recordset1['Broker_Id']; ?>" id="View<?php echo $row_Recordset1['Broker_Id']; ?>"><i class="icon-eye-open"></i></button></a>&nbsp;
                                            <a href="brokerupdatepage?Broker_Id=<?php echo $row_Recordset1['Broker_Id']; ?>" target="_blank"><button class="btn btn-inverse btn-xs" data-toggle="tooltip" data-placement="top" title="Update" name="Update<?php echo $row_Recordset1['Broker_Id']; ?>" id="Update<?php echo $row_Recordset1['Broker_Id']; ?>"><i class="icon-edit"></i></button></a>&nbsp;<?php if($row_result['Role']=='Admin'){
	   if($row_result['Name']=='MICKY AHIR'){ ?>
                                             <button class="btn-danger" name="Delete<?php echo $row_Recordset1['Broker_Id']; ?>" id="Delete<?php echo $row_Recordset1['Broker_Id']; ?>" rel="<?php echo $row_Recordset1['Broker_Id']; ?>"><i class="icon-remove icon-white"></i></button><?php } } ?></div></td>
                                          </tr>
                                          <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); 
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
     <script src="assets/js/googleapi.js"></script>
    <script>
	 $(document).ready(function () {
    		$('.btn-danger').click(function(){
       var del_id = $(this).attr('rel');
       $.post('brokerdelete.php', {delete_id:del_id}, function(data) {
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
mysql_free_result($Recordset1);
ob_flush(); ?>