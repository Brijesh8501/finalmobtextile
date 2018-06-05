<?php require_once('../Connections/brijesh8510.php');
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
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form2")) {
  $insertSQL = sprintf("INSERT INTO contact (contact_id, contact_name, mobile_number, email, subject, details, contact_date, status) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['contact_id'], "int"),
                       GetSQLValueString($_POST['contact_name'], "text"),
                       GetSQLValueString($_POST['mobile_number'], "double"),
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_POST['subject'], "text"),
                       GetSQLValueString($_POST['details'], "text"),
                       GetSQLValueString($_POST['contact_date'], "date"),
                       GetSQLValueString($_POST['status'], "text"));

  mysql_select_db($database_brijesh8510, $brijesh8510);
  $Result1 = mysql_query($insertSQL, $brijesh8510) or die(mysql_error());
   echo '<script>alert("You Have successfully placed your message for contact please remember your contact ID and we will soon contact you by your registered mobile number or email address....");</script>';
}
mysql_select_db($database_brijesh8510, $brijesh8510);
$query_Recordset1 = "SELECT * FROM contact";
$Recordset1 = mysql_query($query_Recordset1, $brijesh8510) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<!doctype html>
<html lang="en">
<head>
	<title>Shingori Textile | Contact</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="description" content="Margo - Responsive HTML5 Template">
	<meta name="author" content="iThemesLab">
	<link rel="stylesheet" href="asset/css/bootstrap.min.css" type="text/css" media="screen">
	<link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" media="screen">
	<link rel="stylesheet" type="text/css" href="css/style.css" media="screen">
	<link rel="stylesheet" type="text/css" href="css/responsive.css" media="screen">
	<link rel="stylesheet" type="text/css" href="css/colors/red.css" title="red" media="screen" />
	<link rel="stylesheet" type="text/css" href="css/colors/jade.css" title="jade" media="screen" />
	<link rel="stylesheet" type="text/css" href="css/colors/blue.css" title="blue" media="screen" />
	<link rel="stylesheet" type="text/css" href="css/colors/beige.css" title="beige" media="screen" />
	<link rel="stylesheet" type="text/css" href="css/colors/cyan.css" title="cyan" media="screen" />
	<link rel="stylesheet" type="text/css" href="css/colors/green.css" title="green" media="screen" />
	<link rel="stylesheet" type="text/css" href="css/colors/orange.css" title="orange" media="screen" />
	<link rel="stylesheet" type="text/css" href="css/colors/peach.css" title="peach" media="screen" />
	<link rel="stylesheet" type="text/css" href="css/colors/pink.css" title="pink" media="screen" />
	<link rel="stylesheet" type="text/css" href="css/colors/purple.css" title="purple" media="screen" />
	<link rel="stylesheet" type="text/css" href="css/colors/sky-blue.css" title="sky-blue" media="screen" />
	<link rel="stylesheet" type="text/css" href="css/colors/yellow.css" title="yellow" media="screen" />
	<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
	<link href="../SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css">
    <style>
.active { background-color: #000; }
</style>
</head>
<body>
	<div id="container">
		<div class="hidden-header"></div>
		<header class="clearfix">
			<div class="top-bar">
				<div class="container">
					<div class="row">
						<div class="col-md-6">
							<ul class="contact-details">
                                <?php include("companyside.php"); ?>
                            </ul>
						</div>
						<div class="col-md-6">
						</div>
					</div>
				</div>
			</div>
			<div class="navbar navbar-default navbar-top">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
							<i class="fa fa-bars"></i>
						</button>
						<a class="navbar-brand" href="index.php"><img alt="" src="images/brijesh logo.png"></a>
					</div>
					<div class="navbar-collapse collapse">
                        <div id="sub-header">
						<?php include("topside.php"); ?>
                        </div>
					</div>
				</div>
			</div>
		</header>
<div id="content">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<h4 class="classic-title"><span>Contact Us</span></h4>
    <form role="form" class="contact-form" id="contact-form" method="post"  name="form2" onsubmit='return checkQuotee(this)'>
    <div class="form-group">
    <div class="controls">
    <label>Contact ID :</label>
    <input type="text" placeholder="Name" name="contact_id" value="<?php echo getNewContactID(); ?>" readonly>
    </div>
    </div>
    <div class="form-group">
    <div class="controls"><span id="sprytextfield1">
    <span id="error1" style="color:#F00";></span>
      <input type="text" placeholder="Name" name="contact_name" id="contact_name" value="">
      <span class="textfieldRequiredMsg">Name is required.</span></span></div>
    </div>
    <div class="form-group">
    <div class="controls"><span id="sprytextfield2">
      <input type="text" placeholder="Mobile Number" name="mobile_number" value="" onkeypress="return isNumberKey(event)">
      <span class="textfieldRequiredMsg">Mobile Number is required.</span></span></div>
    </div>
    <div class="form-group">
    <div class="controls"><span id="sprytextfield4">
     <span id="error2" style="color:#F00";></span>
    <input type="text" class="email" placeholder="Email" name="email" id="email" value="">
    <span class="textfieldRequiredMsg">Email is required.</span><span class="textfieldInvalidFormatMsg">Invalid email.</span></span></div>
    </div>
    <div class="form-group">
    <div class="controls"><span id="sprytextfield3">
    <span id="error3" style="color:#F00";></span>
      <input type="text" class="requiredField" placeholder="Subject" name="subject" id="subject" value="">
      <span class="textfieldRequiredMsg">Subject is required.</span></span></div>
    </div>
    <div class="form-group">
    <div class="controls"><span id="sprytextarea1">
    <span id="error4" style="color:#F00";></span>
      <textarea rows="7"  placeholder="Message" name="details" id="details"></textarea>
      <span class="textareaRequiredMsg">Message is required.</span></span></div>
    </div>
    <div class="form-group">
    <div class="controls">
    <?php date_default_timezone_set('Asia/Calcutta'); ?>
    <input type="hidden" class="requiredField" placeholder="" name="contact_date" value="<?php echo date('Y-m-d  h:i:s a'); ?>">
    </div>
    </div>
        <select  hidden="hidden" name="status">
         <option value="Pending" <?php if (!(strcmp("Pending", ""))) {echo "SELECTED";} ?>>Pending</option>
          <option value="Completed" <?php if (!(strcmp("Completed", ""))) {echo "SELECTED";} ?>>Completed</option>  
        </select>
    <button type="submit" class="btn-system btn-large">Send</button>
    <input type="hidden" name="MM_insert" value="form2">
    </form>
			</div>
			<div class="col-md-4">
				<h4 class="classic-title"><span>Information</span></h4>
				<div class="hr1" style="margin-bottom:10px;"></div>
				<ul class="icons-list">
					<li><i class="fa fa-globe">  </i> <strong>Address 1 :</strong> Plot No : D-5/6 Prince industrial society, jiyav - Budiya road, bhestan, surat</li>
                    <li><i class="fa fa-globe">  </i> <strong>Address 2 :</strong> Plot No : D-1 To 4, Plot No : D-1 To 6 Maruti industrial society, behind daksheshwar mahadev mandir, pandesara, surat</li>
					<li><i class="fa fa-envelope-o"></i> <strong>Email:</strong> brijeshahir8501@yahoo.in</li>
					<li><i class="fa fa-mobile"></i> <strong>Phone:</strong> +9327399999</li>
				</ul>
				<div class="hr1" style="margin-bottom:15px;"></div>
				<h4 class="classic-title"><span>Working Hours</span></h4>
				<ul class="list-unstyled">
					<li><strong>Monday - Sunday</strong> - 24 hrs</li>
					</ul>
			</div>
		</div>
	</div>
</div>
<footer>
	<div class="container">
		<div class="row footer-widgets">
                   <?php include("bottomside.php"); ?>
	</div>
</footer>
</div>
<a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>
<div id="loader">
	<div class="spinner">
		<div class="dot1"></div>
		<div class="dot2"></div>
	</div>
</div>
    <script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="js/jquery.migrate.js"></script>
	<script type="text/javascript" src="js/modernizrr.js"></script>
	<script type="text/javascript" src="asset/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery.fitvids.js"></script>
	<script type="text/javascript" src="js/owl.carousel.min.js"></script>
	<script type="text/javascript" src="js/nivo-lightbox.min.js"></script>
	<script type="text/javascript" src="js/jquery.isotope.min.js"></script>
	<script type="text/javascript" src="js/jquery.appear.js"></script>
	<script type="text/javascript" src="js/count-to.js"></script>
	<script type="text/javascript" src="js/jquery.textillate.js"></script>
	<script type="text/javascript" src="js/jquery.lettering.js"></script>
	<script type="text/javascript" src="js/jquery.easypiechart.min.js"></script>
	<script type="text/javascript" src="js/jquery.nicescroll.min.js"></script>
	<script type="text/javascript" src="js/jquery.parallax.js"></script>
	<script src="http://maps.googleapis.com/maps/api/js?sensor=false" type="text/javascript"></script>
	<script type="text/javascript" src="js/script.js"></script>
<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="../SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
<script src="asset/js/googleapi.js"></script>
<script>
$(document).ready(function(){
	$('#contact_name').on('keypress', function (e) {
    var ingnore_key_codes = [34, 39];
    if ($.inArray(e.which, ingnore_key_codes) >= 0) {
        e.preventDefault();
        $("#error1").html("only valid special character allowed").show();
    } else {
        $("#error1").hide();
    }
});
$('#email').on('keypress', function (e) {
    var ingnore_key_codes = [34, 39];
    if ($.inArray(e.which, ingnore_key_codes) >= 0) {
        e.preventDefault();
        $("#error2").html("only valid special character allowed").show();
    } else {
        $("#error2").hide();
    }
});
$('#subject').on('keypress', function (e) {
    var ingnore_key_codes = [34, 39];
    if ($.inArray(e.which, ingnore_key_codes) >= 0) {
        e.preventDefault();
        $("#error3").html("only valid special character allowed").show();
    } else {
        $("#error3").hide();
    }
});
$('#details').on('keypress', function (e) {
    var ingnore_key_codes = [34, 39];
    if ($.inArray(e.which, ingnore_key_codes) >= 0) {
        e.preventDefault();
        $("#error4").html("only valid special character allowed").show();
    } else {
        $("#error4").hide();
    }
});
});
$(function(){
    var url = window.location.href; 
    $("#sub-header a").each(function() {
        if(url == (this.href)) { 
            $(this).closest("li").addClass("active");
        }
    });
});
	function isNumberKey(evt) 
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }
 function checkQuotee(mff)
{
	if(mff.contact_name.value=="")
    {
       alert("Name is Required");
       mff.contact_name.focus();
       return false;
    }
if(mff.mobile_number.value=="")
    {
       alert("Mobile Number is Required");
       mff.mobile_number.focus();
       return false;
    }
else if(mff.mobile_number.value.length!=10)
    {
       alert("Please Enter 10 digits mobile number");
       mff.mobile_number.focus();
       return false;
    }
	if(mff.email.value=="")
    {
       alert("Email is Required");
       mff.email.focus();
       return false;
    }
if(mff.subject.value=="")
    {
       alert("Subject is Required");
       mff.subject.focus();
       return false;
    }
if(mff.details.value=="")
    {
       alert("Message is Required");
       mff.details.focus();
       return false;
    }
}     
   </SCRIPT>	
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {validateOn:["blur"]});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "none", {validateOn:["blur"]});
var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextarea1", {validateOn:["blur"]});
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "email", {validateOn:["blur"]});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "none", {validateOn:["blur"]});
</script>
</body>
</html>
<?php
function getNewContactID()
{
	include("../admin/databaseconnect.php");
	$sql="select max(contact_id)+1 from contact";
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
mysql_free_result($Recordset1);
?>
