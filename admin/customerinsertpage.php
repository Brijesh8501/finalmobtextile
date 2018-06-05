<?php include("logcode.php"); error_reporting(0); require_once('../Connections/brijesh8510.php'); 
date_default_timezone_set('Asia/Calcutta');
	include("webrenew.php");
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
	if(!isset($_SESSION['User']))
	{}else{
  mysql_select_db($database_brijesh8510, $brijesh8510);
$Customer_Id = $_POST['Customer_Id'];
$Cu_En_Name = $_POST['Cu_En_Name'];
$new1 = strtoupper($Cu_En_Name);
$Address = $_POST['Address'];
$ct_name = $_POST['ct_name'];
$cnt_name = $_POST['cnt_name'];
$st_name = $_POST['st_name'];
$ct_id = $_POST['ct_id'];
$cnt_id = $_POST['cnt_id'];
$st_id = $_POST['st_id'];
$Phone_No = $_POST['Phone_No'];
$Mobile_No = $_POST['Mobile_No'];
$Email_Id = $_POST['Email_Id'];
$Status = $_POST['Status'];
$Entry_Id = $row_result['Registration_Id'];
$query = mysql_query("select * from customer_details where Cu_En_Name='".$new1."' ") or die(mysql_error());
$duplicate = mysql_num_rows($query);
   if($duplicate==0)
    {
		$query1 = mysql_query("SELECT city1.ct_id, city1.ct_name, `state1`.st_name, `state1`.st_id, country1.cnt_id, country1.cnt_name FROM city1, `state1`, country1 WHERE `state1`.st_id = '".$st_id."' AND country1.cnt_id = '".$cnt_id."' AND city1.ct_id = '".$ct_id."' " ) or die(mysql_error());
$duplicate1 = mysql_num_rows($query1);
   if($duplicate1==0)
    {
       echo '<script>alert("Country city state are not match....");</script>';  
	}
	else
	{	 
      $query2 = mysql_query("INSERT INTO `customer_details` (`Customer_Id`, `Cu_En_Name`, `Address`,`ct_id`,`cnt_id`,`st_id`,`Phone_No`,`Mobile_No`,`Email_Id`,`status`,`Entry_Id`) VALUES (NULL, '$new1', '$Address', '$ct_id', '$cnt_id', '$st_id', '$Phone_No', '$Mobile_No', '$Email_Id', '$Status', '$Entry_Id')") or die(mysql_error());
	   $insertGoTo = "customerprofilelistpage";
	   
	    $dateact = date('Y-m-d');
	$dateactfull = date('d-m-Y        h:i:s A');
	$Partact = "New Customer Entry<br/>Customer : ".$new1."<br/>Status : ".$Status;
	$insactivity = "insert into activity(Activity_Id,Date,Particular,Type,Action,Datefull,Id) values(NULL,'$dateact','$Partact','Customer - Insert','insert','$dateactfull','$Entry_Id')";
	mysql_query($insactivity); 
  echo '<script>alert("Record inserted....");</script>';
  echo '<script>window.location="'.$insertGoTo.'";</script>';
    }
	}
    else
    {
      echo '<script>alert("This customer is allready exists....");</script>';
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
    <link rel="shortcut icon" href="Icons/st85.png">
 <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="stylesheet" href="assets/css/joint-jquery-ui-datepicker.css">
</head>
<body>
<?php include("sidemenu.php"); ?>
                <div class="inner">
                    <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" align="center">CUSTOMER</h1>
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
            if(Customer(this))
            {
            submit.value = 'Submitting...';
            submitting = true;
            return true; 
            }
            return false;">
                <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Customer ID :</label>
                    <div class="col-lg-8">
                      <input type="text" id="Customer_Id" name="Customer_Id" placeholder="" value="<?php echo getNewCustomerID(); ?>" class="form-control" readonly />
                    </div>
                </div>
                <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Enterprise :</label>
                    <div class="col-lg-8">
                      <input type="text" id="Cu_En_Name" placeholder="enterprise name is not changeable afterwards so enter appropriate name" class="form-control"  name="Cu_En_Name" value="<?php echo $new1; ?>" />
                    <span id="error1" style="color:#F00";></span>
                    <span id="checkno"></span>
                    </div>
                </div>
                <div id="show"></div>
                <div class="form-group">
                    <label for="autosize" class="control-label col-lg-4">Address :</label>
                    <div class="col-lg-8">
                      <textarea name="Address" class="form-control" id="autosize"><?php echo $Address; ?></textarea>
                      <span id="auto" style="color:#F00";></span>
                    </div>
                </div>
<div class="form-group">
                    <label for="text2" class="control-label col-lg-4">City :</label>
                    <div class="col-lg-8">
                    <input type="text" placeholder="" class="form-control" name="ct_name" id="ct_name" value="<?php echo $ct_name; ?>" />
                     <input type="hidden" name="ct_id" id="ct_id" value="<?php echo $ct_id; ?>" />
                   </div>
                </div>
<div class="form-group">
                    <label for="text2" class="control-label col-lg-4">State :</label>
                    <div class="col-lg-8">
                    <input type="text" placeholder="" class="form-control" name="st_name" id="st_name" value="<?php echo $st_name; ?>" readonly/>
                     <input type="hidden" name="st_id" id="st_id" value="<?php echo $st_id; ?>" />
                   </div>
                </div>
                <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Country :</label>
                    <div class="col-lg-8">
                    <input type="text" placeholder="" class="form-control" name="cnt_name" id="cnt_name" value="<?php echo $cnt_name; ?>" readonly/>
                     <input type="hidden" name="cnt_id" id="cnt_id" value="<?php echo $cnt_id; ?>" />
                   </div>
                </div>
                    <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Phone No :</label>
                    <div class="col-lg-8">
                    <input type="text" id="text" placeholder="" class="form-control" name="Phone_No" value="<?php echo $Phone_No; ?>" onkeypress="return isNumberKey(event)" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Alternate Mobile No :</label>
                    <div class="col-lg-8">
                    <input type="text" id="text" placeholder="" class="form-control" name="Mobile_No" value="<?php echo $Mobile_No; ?>" onkeypress="return isNumberKey(event)" />
                    </div>
                </div>
<div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Email ID :</label>
                    <div class="col-lg-8">
                    <input type="email" id="text4" name="Email_Id" value="<?php echo $Email_Id; ?>" placeholder="Email ID" class="form-control" required/>
                   </div>
                </div>
                    <div class="form-group">
    <label class="control-label col-lg-4">Status :</label>
    <div class="col-lg-8">
      <select name="Status" class="form-control">
      <option value="Join" <?php if (!(strcmp("Join", ""))) {echo "SELECTED";} ?>>Join</option>
      <option value="Left" <?php if (!(strcmp("Left", ""))) {echo "SELECTED";} ?>>Left</option>
      </select>
      </div>
</div>
                                   <div style="text-align:center" class="form-actions no-margin-bottom">
                                            <a href="customerprofilelistpage"><input type="button" value=" Back" class="btn btn-inverse btn-lg " /></a>
                                             <?php
                                            if($days_remaining<=0)
{
	echo "<strong style='color:#F00;'>* Please renew your website</strong>";
}
                                            if($days_remaining<=0)
{}
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
 <script src="assets/js/customer.js"></script>
<script src="assets/js/jointjquerydateandpicker.js"></script>
<script type="text/javascript">
<?php include("shortcutkeys.php");?>
</script>
</body>
</html>
<?php
function getNewCustomerID()
{
	include("databaseconnect.php");
	$sql="select max(Customer_Id)+1 from customer_details";
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