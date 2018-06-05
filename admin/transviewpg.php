<?php include("logcode.php"); require_once('../Connections/brijesh8510.php'); 
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
if(isset($_REQUEST['view']))
{
	$view = $_REQUEST['view'];
	if($view=='Beam')
	{
$decodeurl = $_REQUEST['Trans_Id'];
$durl = urldecode($decodeurl); 
	$turl = str_replace("'"," ",$durl);
	$urls = explode(" ",$turl);
	$Trans_Id = $urls[1];
	$sql = "SELECT Trans_Id,Trans_Invoice_No,Trans_Date,Trans_Amt,Payment_Type,Bank_Id,Chq_No,Chq_Date,Description,Status,Entry_Date,Entry_Id FROM `transactions_beam1` where Trans_Id ='".$Trans_Id."' ";
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
	}
	else if($view=='Bobbin')
	{
$decodeurl = $_REQUEST['Trans_Id'];
$durl = urldecode($decodeurl); 
	$turl = str_replace("'"," ",$durl);
	$urls = explode(" ",$turl);
	$Trans_Id = $urls[1];
	$sql = "SELECT Trans_Id,Trans_Invoice_No,Trans_Date,Trans_Amt,Payment_Type,Bank_Id,Chq_No,Chq_Date,Description,Status,Entry_Date,Entry_Id FROM `transactions_bobbin` where Trans_Id ='".$Trans_Id."' ";
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
	}
	else if($view=='Taka')
	{
$decodeurl = $_REQUEST['Trans_Id'];
$durl = urldecode($decodeurl); 
	$turl = str_replace("'"," ",$durl);
	$urls = explode(" ",$turl);
	$Trans_Id = $urls[1];
	$sql = "SELECT Trans_Id,Trans_Invoice_No,Trans_Date,Trans_Amt,Payment_Type,Bank_Id,Chq_No,Chq_Date,Description,Status,Entry_Date,Entry_Id FROM `transactions_taka` where Trans_Id ='".$Trans_Id."' ";
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
	}
	else if($view=='Saree')
	{
$decodeurl = $_REQUEST['Trans_Id'];
$durl = urldecode($decodeurl); 
	$turl = str_replace("'"," ",$durl);
	$urls = explode(" ",$turl);
	$Trans_Id = $urls[1];
	$sql = "SELECT Trans_Id,Trans_Invoice_No,Trans_Date,Trans_Amt,Payment_Type,Bank_Id,Chq_No,Chq_Date,Description,Status,Entry_Date,Entry_Id FROM `transactions_saree` where Trans_Id ='".$Trans_Id."' ";
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
	}
	$Trans_Id = $row['Trans_Id'];
	$Trans_Invoice_No = $row['Trans_Invoice_No'];
	$Trans_Date = $row['Trans_Date'];
	$Trans_Amt = $row['Trans_Amt'];
	$Payment_Type = $row['Payment_Type'];
	$Bank_Id = $row['Bank_Id'];
	$Chq_No = $row['Chq_No'];
	$Chq_Date = $row['Chq_Date'];
	$Description = $row['Description'];
	$Status = $row['Status'];
	$Entry_Date = $row['Entry_Date'];
	$Entry_Id = $row['Entry_Id'];
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
<?php include("sidemenu.php");?>
                <div class="inner">
                    <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" align="center"><?php echo strtoupper($view);?>&nbsp;TRANSACTION</h1>
                </div>
            </div>
<div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <div id="div-1" class="accordion-body collapse in body">
            <form class="form-horizontal" method="post">
            <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Trans ID :</label>
                    <div class="col-lg-8">
                    <input type="text" id="text2" placeholder="" name="Trans_Id" value="<?php echo $Trans_Id; ?>" class="form-control" readonly />
                    </div>
                </div>
                       <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Invoice ID :</label>
                    <div class="col-lg-8">
                    <input type="text" id="Trans_Invoice_No" placeholder="" class="form-control" value="<?php echo $Trans_Invoice_No; ?>" name="Trans_Invoice_No" readonly />
                    </div>
                </div>
                         <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Date :</label>
                    <div class="col-lg-8">
                    <input type="text" id="Trans_Date" placeholder="" class="form-control" value="<?php echo $Trans_Date; ?>" name="Trans_Date" readonly />
                    </div>
                </div>
                <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Amount :</label>
                    <div class="col-lg-8">
                    <input type="text" id="Trans_Amt" placeholder="" class="form-control" value="<?php echo $Trans_Amt; ?>" name="Trans_Amt" readonly />
                    </div>
                </div>
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Payment Type :</label>
                    <div class="col-lg-8">
                    <input type="text" id="text2" placeholder="" name="Payment_Type" class="form-control" value="<?php echo $Payment_Type; ?>" readonly />
                    </div>
                </div>
                         <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Bank :</label>
                    <div class="col-lg-8">
                    <input type="text" id="Bank_Id" placeholder=" Beam Delivery Challan No" class="form-control" name="Bank_Id" value="<?php echo $Bank_Id; ?>" readonly />
                    </div>
                </div>
                       <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Cheque No :</label>
                    <div class="col-lg-8">
                    <input type="text" id="Chq_No" placeholder="" class="form-control" name="Chq_No" value="<?php echo $Chq_No; ?>" readonly/>
                    </div>
                </div>
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Date :</label>
                    <div class="col-lg-8">
                    <input type="text" id="Chq_Date" placeholder="" class="form-control" name="Chq_Date" value="<?php echo $Chq_Date; ?>" readonly/>
                    </div>
                </div>
                       <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Description :</label>
                    <div class="col-lg-8">
                    <textarea name="Description" class="form-control" id="autosize" placeholder="" disabled><?php echo $Description; ?></textarea>
                    </div>
                </div>
                       <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Status :</label>
                    <div class="col-lg-8">
                    <input type="text" id="Status" placeholder="" class="form-control" name="Status" value="<?php echo $Status; ?>" readonly/>
                    </div>
                </div>
                       <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Entry Date:</label>
                    <div class="col-lg-8">
                    <input type="text" id="Entry_Date" placeholder="" class="form-control" name="Entry_Date" value="<?php echo $Entry_Date; ?>" readonly/>
                    </div>
                </div>
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Entry #ID :</label>
                    <div class="col-lg-8">
                    <input type="text" id="Entry_Id" placeholder="" class="form-control" name="Entry_Id" value="<?php echo $Entry_Id; ?>" readonly/>
                    </div>
                </div>
                  <div style="text-align:center" class="form-actions no-margin-bottom">
                  <?php if($view=='Beam')
				  {
					  ?>
                       <input type="button" value="Back" class="btn btn-inverse btn-lg " id="btnback" name="btnback" onClick="closetab();"/>
                         <?php } elseif($view=='Bobbin')
				  {
					  ?>
                       <input type="button" value="Back" class="btn btn-inverse btn-lg " id="btnback" name="btnback" onClick="closetab();"/>
                         <?php } else if($view=='Taka')
				  {
					  ?>
                        <input type="button" value="Back" class="btn btn-inverse btn-lg " id="btnback" name="btnback" onClick="closetab();"/>
                      
                        <?php } else if($view=='Saree')
				  {
					  ?>
                        <input type="button" value="Back" class="btn btn-inverse btn-lg " id="btnback" name="btnback" onClick="closetab();"/>
                        <?php } ?>
                        </div>
                </form>
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
$(document).ready(function(){
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
	function closetab()
	{
		close();
	}
	<?php include("shortcutkeys.php");?> 
	</script>
</body>
</html>
<?php
ob_flush(); ?>