<?php include("logcode.php"); error_reporting(0);
include("databaseconnect.php");
if($row_result['Role']=='Admin' || $row_result['Role']=='Manager' || $row_result['Role']=='Accountant')
{
	
}
else
{
	
	echo '<script>alert("You have no rights to view this page");</script>';
	$updateGoTo = "index";
  echo '<script>window.location="'.$updateGoTo.'";</script>';
}
if(isset($_REQUEST['action']))
{
	$action = $_REQUEST['action'];
	if($action=='insert')
	{
		date_default_timezone_set('Asia/Calcutta');
$Date1 = date('Y-m-d');
	include("webrenew.php");
	}
	elseif($action=='update')
	{
		$decodeurl = $_REQUEST['Petty_Id'];
	$durl = urldecode($decodeurl); 
	$turl = str_replace("'"," ",$durl);
	$urls = explode(" ",$turl);
	$Petty_Id = $urls[1];
		$sql = "select * from petty_details where Petty_Id = '$Petty_Id'";
		$sql_exe = mysql_query($sql);
		$row = mysql_fetch_array($sql_exe);
		$Petty_Id = $row['Petty_Id'];
		$Subject = $row['Subject'];
		$Description = $row['Description'];
		$Payment_Type = $row['Payment_Type'];
		$Bank_Id = $row['Bank_Id'];
		$bank_replace = str_replace(" ",",",$Bank_Id);
		$Cheque_No = $row['Cheque_No'];
		$Cheque_Amount = $row['Cheque_Amount'];
		$Date1 = $row['Date'];
		$Status = $row['Status'];
		$Entry_Date = $row['Entry_Date'];
		$Entry_Id = $row['Entry_Id'];
	}}
if(isset($_REQUEST['submit']))
{
	if(!isset($_SESSION['User']))
	{}
	else
	{
$Petty_Id = getNewPettyID();
$Subject = $_POST['Subject'];
$Description = $_POST['Description'];
$Payment_Type = $_POST['Payment_Type'];
$Bank_Id = $_POST['Bank_Id'];
$Cheque_No = $_POST['Cheque_No'];
$Cheque_Amount = $_POST['Cheque_Amount'];
$Date1 = $_POST['Date1'];
$Status = $_POST['Status'];
	$Entry_Date = date('Y-m-d      h:i:s a');
$Entry_Id = $row_result['Registration_Id'];
      $query1 = mysql_query("INSERT INTO `petty_details` (`Petty_Id`, `Subject`, `Description`,`Payment_Type`, `Bank_Id`, `Cheque_No`,`Date`,`Cheque_Amount`,`Entry_Date`, `Entry_Id`,`Status`) VALUES ($Petty_Id, '$Subject', '$Description','$Payment_Type', '$Bank_Id', '$Cheque_No','$Date1','$Cheque_Amount','$Entry_Date','$Entry_Id','$Status')") or die(mysql_error());
	   $insertGoTo = "pettylistpage";
	   
	   if($Payment_Type=='Other_Charges' || $Payment_Type=='Bank_Charges') 
	   {
	    $particular = $Subject.'<br/>'.$Description.'<br/>(Expense ID : '.$Petty_Id.')<br/>For '.$Payment_Type;	   
	   }
	   else
	   {
	   $particular = $Subject.'<br/>'.$Description.'<br/>(Expense ID : '.$Petty_Id.')<br/>By '.$Payment_Type;
	   }
	   $insaccount = "insert into accounts(Account_Id,Id,Date,Bank_Id,Particular,Cheque_No,Debit,Credit,For_S,Status) values(NULL,'$Petty_Id','$Date1','$Bank_Id','$particular','$Cheque_No','$Cheque_Amount','0.00','Expense','$Status')";
	   mysql_query($insaccount);
  echo '<script>alert("Expense made successfully....");</script>';
  header("refresh:3;pettydetail?action=insert");
	}}
if(isset($_REQUEST['update']))
{
	if(!isset($_SESSION['User']))
	{}
	else
	{
$Petty_Id = $_POST['Petty_Id'];
$Subject = $_POST['Subject'];
$Description = $_POST['Description'];
$Payment_Type = $_POST['Payment_Type'];
$Bank_Id = $_POST['Bank_Id'];
$Cheque_No = $_POST['Cheque_No'];
$Cheque_Amount = $_POST['Cheque_Amount'];
$Date1 = $_POST['Date1'];
	$Entry_Date = $_POST['Entry_Date'];;
$Entry_Id = $row_result['Registration_Id'];
$Status = $_POST['Status'];
      $query1 = mysql_query("update petty_details set Subject = '$Subject', Description = '$Description', Payment_Type = '$Payment_Type', Bank_Id = '$Bank_Id', Cheque_No = '$Cheque_No', Date = '$Date1',Cheque_Amount = '$Cheque_Amount', Entry_Date = '$Entry_Date', Entry_Id = '$Entry_Id', Status = '$Status' where Petty_Id = '$Petty_Id'") or die(mysql_error());
	  
	    if($Payment_Type=='Other_Charges' || $Payment_Type=='Bank_Charges') 
	   {
	    $particular = $Subject.'<br/>'.$Description.'<br/>(Expense ID : '.$Petty_Id.')<br/>For '.$Payment_Type;	   
	   }
	   else
	   {
	   $particular = $Subject.'<br/>'.$Description.'<br/>(Expense ID : '.$Petty_Id.')<br/>By '.$Payment_Type;
	   }
		$updaccount = "update accounts set Date = '$Date1', Particular = '$particular', Cheque_No = '$Cheque_No', Credit = '0.00', Debit = '$Cheque_Amount', Status = '$Status' where Id = '$Petty_Id' and For_S = 'Expense'";
		mysql_query($updaccount);
  echo '<script>alert("Expense updated successfully....");</script>';
  echo '<script>close();</script>';
	}}
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
</head>
<body>
<?php include("sidemenu.php"); ?>
                <div class="inner">
                    <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" align="center">EXPENSE ENTRY</h1>
                </div>
            </div>
<div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <div id="div-1" class="accordion-body collapse in body">
            <form class="form-horizontal" method="post" name="form1" <?php if($action =='insert') { ?>onsubmit="if(submitting){alert('The record is being submitted, please wait a moment...');submit.disabled = true;return false;}if(Pettyins(this)){submit.value = 'Submitting...';submitting = true;return true;}return false;" <?php } elseif($action=='update') { ?> onsubmit="if(submitting){alert('The record is being updated, please wait a moment...');update.disabled = true;return false;}if(Pettyins(this)){update.value = 'Updating...';submitting = true;return true;}return false;"<?php } ?>>
            <input type="text" name="Petty_Id" id="Petty_Id" value="<?php echo $Petty_Id;?>"/>
                 <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Subject :</label>
                    <div class="col-lg-8">
                      <input type="text" id="Subject" placeholder="" class="form-control"  name="Subject" value="<?php echo $Subject;?>" />
                      <span id="error1" style="color:#F00";></span>
                    </div>
                </div>
                 <div class="form-group">
                    <label for="autosize" class="control-label col-lg-4">Description :</label>
                    <div class="col-lg-8">
                      <textarea name="Description" class="form-control" id="autosize"><?php echo $Description; ?></textarea>
                      <span id="auto" style="color:#F00";></span>
                    </div>
</div>
<div class="form-group">
    <label class="control-label col-lg-4">Payment Type :</label>
    <div class="col-lg-8">
      <select name="Payment_Type" class="form-control" id="Payment_Typepetty">
      <option value="" >--Select--</option>
       <?php if($action=='update') 
	{
		?>
    <option value="Cheque" <?php if($Payment_Type == 'Cheque') { echo 'selected = \"selected\"'; } ?>>Cheque</option>
    <option value="Cash" <?php if($Payment_Type == 'Cash') { echo 'selected = \"selected\"'; } ?> ?>Cash</option>
    <option value="Bank_Charges" <?php if($Payment_Type == 'Bank_Charges') { echo 'selected = \"selected\"'; } ?> ?>Bank Charges</option>
    <option value="Other_Charges" <?php if($Payment_Type == 'Other_Charges') { echo 'selected = \"selected\"'; } ?> ?>Other Charges</option>
     <option value="RTGS" <?php if($Payment_Type == 'RTGS') { echo 'selected = \"selected\"'; } ?> ?>RTGS</option>
       <option value="Online" <?php if($Payment_Type == 'Online') { echo 'selected = \"selected\"'; } ?> ?>Online</option>
                    <?php }
					elseif($action=='insert')
					{
						?>
                       <option value="Cheque">Cheque</option>
    <option value="Cash">Cash</option>
    <option value="Bank_Charges">Bank Charges</option>
    <option value="Other_Charges">Other Charges</option>
    <option value="RTGS">RTGS</option>
    <option value="Online">Online</option> 
                        <?php }
					?>
      </select>
      <div id="Invoice_Chq_Date">
</div> 
      </div>
</div>

<?php if($action=='update')
{
	?>
<div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Entry Date :</label>
                    <div class="col-lg-8">
                      <input type="text" id="Entry_Date" placeholder="" class="form-control"  name="Entry_Date" value="<?php echo $Entry_Date;?>" readonly/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Entry #Id :</label>
                    <div class="col-lg-8">
                      <input type="text" id="Entry_Id" placeholder="" class="form-control"  name="Entry_Id" value="<?php echo $Entry_Id;?>" readonly/>
                    </div>
                </div>
                <?php } ?>
                                        <div style="text-align:center" class="form-actions no-margin-bottom">
                                            <a href="pettylistpage"><input type="button" value="Back" class="btn btn-inverse btn-lg " /></a><?php if($action=='insert')
{
                                            if($days_remaining<=0)
{
	echo "<strong style='color:#F00;'>* Please renew your website</strong>";
}
                                            if($days_remaining<=0)
{}
elseif($days_remaining>0)
{
?>	
	                                    <input type="submit" value="Submit" name="submit" class="btn btn-primary btn-lg " /><?php } } elseif($action=='update')
{
	?><input type="submit" value="Update" name="update" class="btn btn-primary btn-lg " /> <?php } ?>
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
    $("#Payment_Typepetty").change(function(){
		t1=$("#Payment_Typepetty").val();
		var q="?Payment_Typepetty="+t1+"&Bank_Id=<?php echo $bank_replace; ?>&Cheque_No=<?php echo $Cheque_No; ?>&Cheque_Amount=<?php echo $Cheque_Amount; ?>&Date1=<?php echo $Date1; ?>&Petty_Id=<?php echo $Petty_Id;?>";
		$("#Invoice_Chq_Date").load("pettypayment_type.php"+q);
	});
	$("#Payment_Typepetty").val("<?php echo $Payment_Type; ?>");
		t5=$("#Payment_Typepetty").val();
		var q="?Payment_Typepetty="+t5+"&Bank_Id=<?php echo $bank_replace; ?>&Cheque_No=<?php echo $Cheque_No; ?>&Cheque_Amount=<?php echo $Cheque_Amount; ?>&Date1=<?php echo $Date1; ?>&Petty_Id=<?php echo $Petty_Id;?>";
		$("#Invoice_Chq_Date").load("pettypayment_type.php"+q);

});
<?php include("shortcutkeys.php");?>
</script>
<script src="assets/js/pettydetail.js"></script>
<script src="assets/plugins/jasny/js/bootstrap-inputmask.js"></script>
</body>
</html>
<?php
function getNewPettyID()
{
	include("databaseconnect.php");
	$sql = "select max(Petty_Id)+1 from petty_details";
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
	if($row != null && $row[0] > 0)
		{
			$new_id =  $row[0];
		}
		else
		{
			$new_id = '1';
		}
		return $new_id;
	}
ob_flush(); ?>