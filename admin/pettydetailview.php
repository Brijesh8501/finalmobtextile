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
if(isset($_REQUEST['view']))
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
		$Cheque_No = $row['Cheque_No'];
		$Cheque_Amount = $row['Cheque_Amount'];
		$Date1 = $row['Date'];
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
    <link rel="shortcut icon" href="Icons/st85.png">
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="assets/css/main.css" />
</head>
<body>
<?php include("sidemenu.php"); ?>
                <div class="inner">
                    <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" align="center">PETTY ENTRY</h1>
                </div>
            </div>
<div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <div id="div-1" class="accordion-body collapse in body">
            <form class="form-horizontal" method="post" name="form1">
            <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Petty ID :</label>
                    <div class="col-lg-8">
                        <input type="text" name="Petty_Id" class="form-control" value="<?php echo $Petty_Id; ?>" readonly/>
                    </div>
                </div>
                 <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Subject :</label>
                    <div class="col-lg-8">
                      <input type="text" id="Subject" placeholder="" class="form-control"  name="Subject" value="<?php echo $Subject;?>" readonly/>
                    </div>
                </div>
                 <div class="form-group">
                    <label for="autosize" class="control-label col-lg-4">Description :</label>
                    <div class="col-lg-8">
                      <textarea name="Description" class="form-control" id="autosize" readonly><?php echo $Description; ?></textarea>
                    </div>
</div>
<div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Payment Type :</label>
                    <div class="col-lg-8">
                      <input type="text" id="Payment_Type" placeholder="" class="form-control"  name="Payment_Type" value="<?php echo $Payment_Type;?>" readonly/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Bank :</label>
                    <div class="col-lg-8">
                      <input type="text" id="Bank_Id" placeholder="" class="form-control"  name="Bank_Id" value="<?php echo $Bank_Id;?>" readonly/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Cheque No :</label>
                    <div class="col-lg-8">
                      <input type="text" id="Cheque_No" placeholder="" class="form-control"  name="Cheque_No" value="<?php echo $Cheque_No;?>" readonly/>
                    </div>
                </div>
               <?php if($Bank_Id=='---' && $Cheque_No=='---' && $Payment_Type=='Cash')
		{
		?>
         <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Cash Date :</label>
                    <div class="col-lg-8">
                      <input type="text" id="Date" placeholder="" class="form-control"  name="Date" value="<?php echo $Date1;?>" readonly/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Cash Amount :</label>
                    <div class="col-lg-8">
                      <input type="text" id="Cheque_Amount" placeholder="" class="form-control"  name="Cheque_Amount" value="<?php echo $Cheque_Amount;?>" readonly/>
                    </div>
                </div>
				<?php } elseif($Cheque_No=='---')
		{
		?>
         <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Date :</label>
                    <div class="col-lg-8">
                      <input type="text" id="Date" placeholder="" class="form-control"  name="Date" value="<?php echo $Date1;?>" readonly/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Amount :</label>
                    <div class="col-lg-8">
                      <input type="text" id="Cheque_Amount" placeholder="" class="form-control"  name="Cheque_Amount" value="<?php echo $Cheque_Amount;?>" readonly/>
                    </div>
                </div>
				<?php } elseif($Bank_Id!='---' && $Cheque_No!='---')
				{
					?>
                     <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Cheque Date :</label>
                    <div class="col-lg-8">
                      <input type="text" id="Date" placeholder="" class="form-control"  name="Date" value="<?php echo $Date1;?>" readonly/>
                    </div>
                </div>
                     <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Cheque Amount :</label>
                    <div class="col-lg-8">
                      <input type="text" id="Cheque_Amount" placeholder="" class="form-control"  name="Cheque_Amount" value="<?php echo $Cheque_Amount;?>" readonly/>
                    </div>
                </div>
                    <?php } ?>
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
                                        <div style="text-align:center" class="form-actions no-margin-bottom">
                                            <input type="button" value="Back" class="btn btn-inverse btn-lg " id="btnback" name="btnback" onClick="closetab();"/>
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