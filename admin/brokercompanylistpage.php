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
$query_rsBroCom = "SELECT bro_com_detaailss.Bro_Com_Id, broker_details1.B_Name,broker_details1.Broker_Id, company_deetaails.C_Name,company_deetaails.Company_Id,bro_com_detaailss.Entry_Id FROM bro_com_detaailss, broker_details1, company_deetaails WHERE broker_details1.Broker_Id = bro_com_detaailss.Broker_Id AND company_deetaails.Company_Id = bro_com_detaailss.Company_Id";
$rsBroCom = mysql_query($query_rsBroCom, $brijesh8510) or die(mysql_error());
$row_rsBroCom = mysql_fetch_assoc($rsBroCom);
$totalRows_rsBroCom = mysql_num_rows($rsBroCom);
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
                        <h2 align="center">BROKER-COMPANY PROFILE</h2>
                    </div>
                </div>
                <hr />
                <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading"><a href="broker-company" target="_blank"><button class="btn btn-primary" > <i class="icon-plus-sign icon-white"></i> Add Entry</button></a> </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Bro-Cus ID</th>
                                            <th>Broker</th>
                                            <th>Company</th>
                                            <th>#ID</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
      <?php if($totalRows_rsBroCom==0) {
	}
	else
	{
                                         do { ?>
                                        <tr class="odd gradeX" id="<?php echo $row_rsBroCom['Bro_Com_Id']; ?>">
                                            <td width="15%"><?php echo $row_rsBroCom['Bro_Com_Id']; ?></td>
                                            <td width="30%"><?php echo $row_rsBroCom['B_Name']; ?></td>
                                            <td width="40%"><?php echo $row_rsBroCom['C_Name']; ?></td>
                                            <td><?php echo $row_rsBroCom['Entry_Id']; ?></td>
                                            <td class="center" align="center"><div class="tooltip-demo"><a href="broker-companyupdate?Bro_Com_Id=<?php echo $row_rsBroCom['Bro_Com_Id']; ?>" target="_blank"><button class="btn btn-inverse btn-xs" data-toggle="tooltip" data-placement="top" title="Update" name="Update<?php echo $row_rsBroCom['Bro_Com_Id']; ?>" id="Update<?php echo $row_rsBroCom['Bro_Com_Id']; ?>"><i class="icon-edit"></i></button></a>&nbsp;<?php if($row_result['Role']=='Admin'){
	   if($row_result['Name']=='MICKY AHIR'){ ?>
                                           <button class="btn-danger" name="Delete<?php echo $row_rsBroCom['Bro_Com_Id']; ?>" id="Delete<?php echo $row_rsBroCom['Bro_Com_Id']; ?>" rel="<?php echo $row_rsBroCom['Bro_Com_Id']; ?>"><i class="icon-remove icon-white"></i></button><?php } } ?></div></td>
                                          </tr>
                                          <?php } while ($row_rsBroCom = mysql_fetch_assoc($rsBroCom)); 
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
       $.post('brocomp_delete.php', {delete_id:del_id}, function(data) {
          if(data == 'true') {
		  $('#'+del_id+' a').removeAttr('href');  
			 $('#Update'+del_id).prop('disabled', true);
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
mysql_free_result($rsBroCom);
ob_flush(); ?>