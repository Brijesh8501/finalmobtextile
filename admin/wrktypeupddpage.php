<?php include("logcode.php"); require_once('../Connections/brijesh8510.php');
date_default_timezone_set("Asia/Calcutta");
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
if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
	if(!isset($_SESSION['User']))
	{
	}
	else
	{
	
$W_Type_Name = $_POST['W_Type_Name'];
$new1 = str_replace('\' ', '\'', ucwords(str_replace('\'', '\' ', strtolower($W_Type_Name))));
$Entry_Id = $row_result['Registration_Id'];

$query = mysql_query("select * from work_type where W_Type_Name='".$new1."' ") or die(mysql_error());
$duplicate = mysql_num_rows($query);
   if($duplicate==0)
    {

  $updateSQL = sprintf("UPDATE work_type SET W_Type_Name=%s, `Description`=%s, `Entry_Id`='$Entry_Id' WHERE W_Type_Id=%s",
                       GetSQLValueString($_POST['W_Type_Name'], "text"),
                       GetSQLValueString($_POST['Description'], "text"),
                       GetSQLValueString($_POST['W_Type_Id'], "int"));

  mysql_select_db($database_brijesh8510, $brijesh8510);
  $Result1 = mysql_query($updateSQL, $brijesh8510) or die(mysql_error());

    $dateact = date('Y-m-d');
	$dateactfull = date('d-m-Y        h:i:s A');
	
	$Partact = "Work Type Entry<br/>Work Type : ".$new1;
	$insactivity = "insert into activity(Activity_Id,Date,Particular,Type,Action,Datefull,Id) values(NULL,'$dateact','$Partact','Work Type - Update','update','$dateactfull','$Entry_Id')";
	mysql_query($insactivity); 
	
  $updateGoTo = "work_typetlistpage";
 echo '<script>alert("Record updated....");</script>';
  
  echo '<script>window.location="'.$updateGoTo.'";</script>';
   }
    else
    {
      echo '<script>alert("This worktype is allready exists....");</script>';
    }
	}
}

$colname_rsWork = "-1";
if (isset($_GET['W_Type_Id'])) {
  $colname_rsWork = $_GET['W_Type_Id'];
}
mysql_select_db($database_brijesh8510, $brijesh8510);
$query_rsWork = sprintf("SELECT * FROM work_type WHERE W_Type_Id = %s", GetSQLValueString($colname_rsWork, "int"));
$rsWork = mysql_query($query_rsWork, $brijesh8510) or die(mysql_error());
$row_rsWork = mysql_fetch_assoc($rsWork);
$totalRows_rsWork = mysql_num_rows($rsWork);
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
     <link rel="shortcut icon" href="Icons/st85.png">
</head>
<body>
<?php include("sidemenu.php"); ?>
              <div class="inner">
                    <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" align="center">WORK TYPE</h1>
                </div>
            </div>
<div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <div id="div-1" class="accordion-body collapse in body">
            <form class="form-horizontal" method="post" name="form1" onsubmit="if(submitting) {
            alert('The record is updating, please wait a moment...');
            update.disabled = true; 
            return false;
            }
            if(Worktype(this))
            {
            update.value = 'Updating...';
            submitting = true;
            return true; 
            }
            return false;">
              
                <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Work Type ID :</label>

                    <div class="col-lg-8">
                        <input type="text" name="W_Type_Id" id="W_Type_Id" class="form-control" value="<?php echo $row_rsWork['W_Type_Id']; ?>" readonly ?>
                    </div>
                </div>

               <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Work Type :</label>

                    <div class="col-lg-8">
                      <input type="text" id="W_Type_Name" placeholder="Work Type" class="form-control" name="W_Type_Name" value="<?php echo htmlentities($row_rsWork['W_Type_Name'], ENT_COMPAT, 'UTF-8'); ?>" />
                      <span id="error1" style="color:#F00";></span>
                   </div>
                </div>
                <div class="form-group">
                    <label for="autosize" class="control-label col-lg-4">Description :</label>

                    <div class="col-lg-8">
                      <textarea name="Description" class="form-control" id="autosize" readonly><?php echo htmlentities($row_rsWork['Description'], ENT_COMPAT, 'UTF-8'); ?></textarea>
                    </div>
                </div>
                                        <div style="text-align:center" class="form-actions no-margin-bottom">
                                            <a href="work_typetlistpage"><input type="button" value=" Back" class="btn btn-inverse btn-lg " /></a>
                                            <input type="submit" value="Update" name="update" class="btn btn-primary btn-lg " />
                                        </div>
<input type="hidden" name="MM_update" value="form1">
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
			 $('#W_Type_Id').focus();
			 $('#W_Type_Name').on('keypress', function (e) {
    var ingnore_key_codes = [34, 39];
    if ($.inArray(e.which, ingnore_key_codes) >= 0) {
        e.preventDefault();
        $("#error1").html("only valid special character allowed").show();
    } else {
        $("#error1").hide();
    }
		});
$('#autosize').on('keypress', function (e) {
    var ingnore_key_codes = [34, 39];
    if ($.inArray(e.which, ingnore_key_codes) >= 0) {
        e.preventDefault();
        $("#auto").html("only valid special character allowed").show();
    } else {
        $("#auto").hide();
    }
		});
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
		  var submitting = false;
    function Worktype(mff)
{
	if(mff.W_Type_Name.value=="")
    {
       alert("Work type is required");
	   mff.W_Type_Name.focus();
       return false;
    }
if(mff.Description.value=="")
    {
      alert("Description is required");
	   mff.Description.focus();
       return false;
    }
 return true;
} 
<?php include("shortcutkeys.php");?>   
</script>  
</body>
</html>
<?php
mysql_free_result($rsWork);
ob_flush(); ?>