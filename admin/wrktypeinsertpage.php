<?php include("logcode.php"); require_once('../Connections/brijesh8510.php');
date_default_timezone_set('Asia/Calcutta');
	include("webrenew.php");
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
	if(!isset($_SESSION['User']))
	{
	}
	else
	{ 
  mysql_select_db($database_brijesh8510, $brijesh8510);
$W_Type_Id = $_POST['W_Type_Id'];
$W_Type_Name = $_POST['W_Type_Name'];
$new1 = str_replace('\' ', '\'', ucwords(str_replace('\'', '\' ', strtolower($W_Type_Name))));
$Description=$_POST['Description'];
$Entry_Id = $row_result['Registration_Id'];
$query = mysql_query("select * from work_type where W_Type_Name='".$new1."' ") or die(mysql_error());
$duplicate = mysql_num_rows($query);
   if($duplicate==0)
    {
      $query1 = mysql_query("INSERT INTO `textile`.`work_type` (`W_Type_Id`, `W_Type_Name`, `Description`, `Entry_Id`) VALUES (NULL, '$new1', '$Description', '$Entry_Id')") or die(mysql_error());
	  
	   $dateact = date('Y-m-d');
	$dateactfull = date('d-m-Y        h:i:s A');
	
	$Partact = "New Work Type Entry<br/>Work Type : ".$new1;
	$insactivity = "insert into activity(Activity_Id,Date,Particular,Type,Action,Datefull,Id) values(NULL,'$dateact','$Partact','Work Type - Insert','insert','$dateactfull','$Entry_Id')";
	mysql_query($insactivity); 
	
	   $insertGoTo = "work_typetlistpage";
  echo '<script>alert("Record inserted....");</script>';
  echo '<script>window.location="'.$insertGoTo.'";</script>';
    }
    else
    {
      echo '<script>alert("This worktype is allready exists....");</script>';
    }
}
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
            alert('The record is submitting, please wait a moment...');
            submit.disabled = true; 
            return false;
            }
            if(Worktype(this))
            {
            submit.value = 'Submitting...';
            submitting = true;
            return true; 
            }
            return false;">
                <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Work Type ID :</label>
                    <div class="col-lg-8">
                        <input type="text" name="W_Type_Id" id="W_Type_Id" class="form-control" value="<?php echo getNewWorkTypeID(); ?>" readonly ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Work Type :</label>
                    <div class="col-lg-8">
                      <input type="text" id="W_Type_Name" placeholder="Work Type" class="form-control" name="W_Type_Name" value="<?php if (isset($_POST["MM_insert"])) { echo $W_Type_Name; } ?>" onKeyPress="checkQuotee(this)"/>
                     <span id="error1" style="color:#F00";></span> 
                    </div>
                </div>
                <div class="form-group">
                    <label for="autosize" class="control-label col-lg-4">Description :</label>
                    <div class="col-lg-8">
                      <textarea name="Description" class="form-control" placeholder="description is not changeable afterwards so enter appropriate description" id="autosize"><?php if (isset($_POST["MM_insert"])) { echo $Description; } ?></textarea>
                   <span id="auto" style="color:#F00";></span>  
                  </div>
                </div>

                                        <div style="text-align:center" class="form-actions no-margin-bottom">
                                            <a href="work_typetlistpage"><input type="button" value="Back" class="btn btn-inverse btn-lg " /></a><?php
                                            if($days_remaining<=0)
{
echo "<strong style='color:#F00;'>* Please renew your website</strong>";	
	}
elseif($days_remaining>0)
{
	?>
                                            <input type="submit" value="Submit" name="submit" class="btn btn-primary btn-lg " />
                                            <input type="hidden" name="MM_insert" value="form1">
                                            <?php } ?>
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
function getNewWorkTypeID()
{
	include("databaseconnect.php");
	$sql="select max(W_Type_Id)+1 from work_type";
	$result= mysql_query($sql);
	$row= mysql_fetch_array($result);
	if($row != null && $row[0] > 0)
		{
			echo $row[0];
		}
		else
		{
			echo '1';
		}
		
	}
	
 ob_flush(); ?>