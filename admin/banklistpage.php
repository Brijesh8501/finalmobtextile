<?php include("logcode.php"); require_once('../Connections/brijesh8510.php'); 
date_default_timezone_set("Asia/Calcutta");
$dateact = date('Y-m-d');
	$dateactfull = date('d-m-Y        h:i:s A');
	$Entry_Id = $row_result['Registration_Id'];
	
	$Partact = "Bank List Page - This page is open to view.<br/>By : ".$row_result['Name'];
	$insactivity = "insert into activity(Activity_Id,Date,Particular,Type,Action,Datefull,Id) values(NULL,'$dateact','$Partact','Bank List - View','view','$dateactfull','$Entry_Id')";
	mysql_query($insactivity); 
	
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
mysql_select_db($database_brijesh8510, $brijesh8510);
$query_Recordset1 = "SELECT * FROM bank_details";
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
                        <h2 align="center">BANK PROFILE</h2>
                    </div>
                </div>
                <hr />
                <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading"><a href="bank_insert" target="_blank"><button class="btn btn-primary" > <i class="icon-plus-sign icon-white"></i> Add Entry</button></a> </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Bank ID</th>
                                            <th>Bank</th>
                                            <th>IFSC Code</th>
                                            <th>Account</th>
                                            <th>Group</th>
                                            <th>Party</th>
                                            <th>Name</th>
                                            <th>Opening Balance</th>
                                            <th>Current Balance</th>
                                            <th>#ID</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                   <?php if($totalRows_Recordset1==0) {
	}
	else
	{
		?>
                                        <?php do { ?>
                                        <tr class="odd gradeX" id="<?php echo $row_Recordset1['Bank_Id']; ?>">
                                            <td width="10%"><?php echo $row_Recordset1['Bank_Id']; ?></td>
                                            <td width="20%"><?php echo $row_Recordset1['Bank_Name']; ?></td>
                                            <td width="10%"><?php echo $row_Recordset1['Ifsc_Code']; ?></td>
                                            <td width="7%"><?php echo $row_Recordset1['Account_Type']; ?></td>
                                            <td width="10%"><?php echo $row_Recordset1['Groups']; ?></td>
                                             <?php if($row_Recordset1['Party']=="---" || $row_Recordset1['Party']=="Firm"){ ?>
                                            <td></td>
                                            <?php } 
											else
											{ ?>
                                            <td width="15%"><?php echo $row_Recordset1['Party']; ?></td>
                                            <?php } ?>
                                            <?php if($row_Recordset1['P_Name']=="---"){ ?>
                                            <td></td>
                                            <?php } 
											else
											{ ?>
                                            <td width="15%"><?php echo $row_Recordset1['P_Name']; ?></td>
                                            <?php } ?>
                                            <?php if($row_Recordset1['Opening_Balance']==0.00){ ?>
                                            <td></td>
                                            <td></td>
                                            <?php } else {?>
                                            <td width="12%"><?php echo $row_Recordset1['Opening_Balance']; ?></td>
                                            <td width="12%"><?php echo $row_Recordset1['Current_Balance']; ?></td><?php } ?>
                                            <td width="5%"><?php echo $row_Recordset1['Entry_Id']; ?></td>
                                            <td class="center" align="center" width="7%"><div class="tooltip-demo"><a href="bank_update?Bank_Id=<?php echo $row_Recordset1['Bank_Id']; ?>" target="_blank"><button class="btn btn-inverse btn-xs" data-toggle="tooltip" data-placement="top" title="Update" name="Update<?php echo $row_Recordset1['Bank_Id']; ?>" id="Update<?php echo $row_Recordset1['Bank_Id']; ?>"><i class="icon-edit"></i></button></a>&nbsp;
                                           <button class="btn-danger" data-toggle="tooltip" data-placement="top" title="Delete" name="Delete<?php echo $row_Recordset1['Bank_Id']; ?>" id="Delete<?php echo $row_Recordset1['Bank_Id']; ?>" rel="<?php echo $row_Recordset1['Bank_Id']; ?>"><i class="icon-remove icon-white"></i></button></div></td>
                                          </tr>
                                          <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
                     <?php } ?>
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
 <script>
$(document).ready(function(){
	$('.btn-danger').click(function(){
       var del_id = $(this).attr('rel');
       $.post('bankdeletepage.php', {delete_id:del_id}, function(data) {
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
mysql_free_result($Recordset1);
 ob_flush(); ?>
