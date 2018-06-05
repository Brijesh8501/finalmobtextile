<?php  include("logcode.php");
include("databaseconnect.php");
date_default_timezone_set("Asia/Calcutta");
$Entry_Id = $row_result['Registration_Id'];
if(isset($_REQUEST['updatebeam']))
{
	if(!isset($_SESSION['User']))
	{
	}
	else
	{
	$Be_D_C_Id = $_REQUEST['Challan_Id'];
	$Status = $_REQUEST['Status'];
	$sql = "update beam_dcorg set Status = '$Status' where Be_D_C_Id = '$Be_D_C_Id'  ";
	 $res = mysql_query($sql);
	 
	  $dateact = date('Y-m-d');
	$dateactfull = date('d-m-Y        h:i:s A');
	
	$Partact = "Status Change Entry [Beam Challan]<br/>Sub-ID : ".$Be_D_C_Id.", Status : ".$Status;
	$insactivity = "insert into activity(Activity_Id,Date,Particular,Type,Action,Datefull,Id) values(NULL,'$dateact','$Partact','Status [Beam Challan] - Update','update','$dateactfull','$Entry_Id')";
	mysql_query($insactivity); 
	
	echo '<script>alert("Status changed");</script>';
	}
}
if(isset($_REQUEST['updatebobbin']))
{
	if(!isset($_SESSION['User']))
	{
	}
	else
	{
	$Bobbin_D_C_Id = $_REQUEST['Challan_Id'];
	$Status = $_REQUEST['Status'];
	$sql = "update boobin_dcorg set Status = '$Status' where Bobbin_D_C_Id = '$Bobbin_D_C_Id'  ";
	 $res = mysql_query($sql);
	 
	 $dateact = date('Y-m-d');
	$dateactfull = date('d-m-Y        h:i:s A');
	
	$Partact = "Status Change Entry [Bobbin Challan]<br/>Sub-ID : ".$Bobbin_D_C_Id.", Status : ".$Status;
	$insactivity = "insert into activity(Activity_Id,Date,Particular,Type,Action,Datefull,Id) values(NULL,'$dateact','$Partact','Status [Bobbin Challan] - Update','update','$dateactfull','$Entry_Id')";
	mysql_query($insactivity); 
	
	 echo '<script>alert("Status changed");</script>';
	}
}
if(isset($_REQUEST['updatetaka']))
{
	if(!isset($_SESSION['User']))
	{
	}
	else
	{
	$Ta_D_C_Id = $_REQUEST['Challan_Id'];
	$Status = $_REQUEST['Status'];
	$sql = "update taka_dcorg set Status = '$Status' where Ta_D_C_Id = '$Ta_D_C_Id'  ";
	 $res = mysql_query($sql);
	 
	  $dateact = date('Y-m-d');
	$dateactfull = date('d-m-Y        h:i:s A');
	
	$Partact = "Status Change Entry [Taka Challan]<br/>Sub-ID : ".$Ta_D_C_Id.", Status : ".$Status;
	$insactivity = "insert into activity(Activity_Id,Date,Particular,Type,Action,Datefull,Id) values(NULL,'$dateact','$Partact','Status [Taka Challan] - Update','update','$dateactfull','$Entry_Id')";
	mysql_query($insactivity); 
	
	 echo '<script>alert("Status changed");</script>';
	}
}
if(isset($_REQUEST['updatesaree']))
{
	if(!isset($_SESSION['User']))
	{
	}
	else
	{
	$Sa_D_C_Id = $_REQUEST['Challan_Id'];
	$Status = $_REQUEST['Status'];
	$sql = "update saree_dcorg set Status = '$Status' where Sa_D_C_Id = '$Sa_D_C_Id'  ";
	 $res = mysql_query($sql);
	 
	  $dateact = date('Y-m-d');
	$dateactfull = date('d-m-Y        h:i:s A');
	
	$Partact = "Status Change Entry [Saree Challan]<br/>Sub-ID : ".$Sa_D_C_Id.", Status : ".$Status;
	$insactivity = "insert into activity(Activity_Id,Date,Particular,Type,Action,Datefull,Id) values(NULL,'$dateact','$Partact','Status [Saree Challan] - Update','update','$dateactfull','$Entry_Id')";
	mysql_query($insactivity); 
	
	 echo '<script>alert("Status changed");</script>';
	}
}
?>
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
                    <h1 class="page-header" align="center">STATUS</h1>
                </div>
            </div>
<div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <div id="div-1" class="accordion-body collapse in body">
            <form class="form-horizontal"  method="post" name="form1" onsubmit='return checkQuotee(this)'>
               <div class="form-group">
               <div class="col-lg-4">
               </div>
<div class="col-lg-4">
  <select name="select_status" id="select_status" class="form-control">
    <option value="">--Select--</option>
    <option value="ch_beam">Sub-Beam</option>
  <option value="ch_bobbin">Sub-Bobbin</option>
  <option value="ch_taka">Sub-Taka</option>
  <option value="ch_saree">Sub-Saree</option>
  </select>
  </div>
  <div class="col-lg-4">
  </div>
</div>
 <div id="show">
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
    <script src="assets/js/statuschange.js"></script>
    <script type="text/javascript">
	<?php include("shortcutkeys.php");?>
	</script>
</body>
</html>
<?php
 ob_flush(); ?>