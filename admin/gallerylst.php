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
$query_rsGallery = "SELECT * FROM gallery";
$rsGallery = mysql_query($query_rsGallery, $brijesh8510) or die(mysql_error());
$row_rsGallery = mysql_fetch_assoc($rsGallery);
$totalRows_rsGallery = mysql_num_rows($rsGallery);
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
                        <h2 align="center">GALLERY PROFILE</h2>
                    </div>
                </div>
                <hr />
                <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading"><a href="galleryinsert" target="_blank"><button class="btn btn-primary" > <i class="icon-plus-sign icon-white"></i> Add Entry</button></a> </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Gallery ID</th>
                                            <th>Image Name</th>
                                            <th>Thumbnail</th>
                                            <th>Image</th>
                                            <th>Sequence</th>
                                            <th>Status</th>
                                            <th>#ID</th>
                                            <th>Action</th>
                                           </tr>
                                    </thead>
                                    <tbody>
              <?php if($totalRows_rsGallery==0) {
	}
	else
	{
                                       do { ?>
  <tr class="odd gradeX" id="<?php echo $row_rsGallery['gallery_id']; ?>">
    <td width="10%"><?php echo $row_rsGallery['gallery_id']; ?></td>
    <td width="25%"><?php echo $row_rsGallery['image_name']; ?></td>
    <td><img src="<?php echo $row_rsGallery['thumbnail'];?>" width="150" /></td>
    <td><img src="<?php echo $row_rsGallery['image']; ?>" width="150" /></td>
    <td width="10%"><?php echo $row_rsGallery['sequence']; ?></td>
    <td width="7%"><?php echo $row_rsGallery['status']; ?></td>
    <td><?php echo $row_rsGallery['Entry_Id']; ?></td>
    <td class="center" align="center">
    <div class="tooltip-demo">
    <a href="galleryupdate?gallery_id=<?php echo $row_rsGallery['gallery_id']; ?>" target="_blank"><button class="btn btn-inverse btn-xs" data-toggle="tooltip" data-placement="top" title="Update" name="Update<?php echo $row_rsGallery['gallery_id']; ?>" id="Update<?php echo $row_rsGallery['gallery_id']; ?>"><i class="icon-edit"></i></button></a>&nbsp;<?php if($row_result['Role']=='Admin'){
	   if($row_result['Name']=='MICKY AHIR'){ ?>
   <button class="btn-danger" name="Delete<?php echo $row_rsGallery['gallery_id']; ?>" id="Delete<?php echo $row_rsGallery['gallery_id']; ?>" rel="<?php echo $row_rsGallery['gallery_id']; ?>"><i class="icon-remove icon-white"></i></button><?php } } ?></div></td>
  </tr>
  <?php } while ($row_rsGallery = mysql_fetch_assoc($rsGallery)); 
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
      <script src="assets/js/googleapi.js"></script>
    <script>
	 $(document).ready(function () {
    		$('.btn-danger').click(function(){
       var del_id = $(this).attr('rel');
       $.post('gallerydelete.php', {delete_id:del_id}, function(data) {
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
mysql_free_result($rsGallery);
ob_flush(); ?>