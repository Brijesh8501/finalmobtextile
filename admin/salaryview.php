<?php include("logcode.php"); require_once('../Connections/brijesh8510.php'); 
   include("databaseconnect.php");
if(isset($_REQUEST['view']))
{
	$decodeurl = $_REQUEST['Sal_Mast_Id'];
	$durl = urldecode($decodeurl); 
	$turl = str_replace("'"," ",$durl);
	$urls = explode(" ",$turl);
	$Sal_Mast_Id = $urls[1];
	$sql = "select Sal_Mast_Id,Date_Range,labour_details.Name,Total_Amt,Total_Meter,Upad_Amt,Re_Amt,Grand_Total,Re_Upad_Amt,salary_master.Status,salary_master.Entry_Date,salary_master.Entry_Id from salary_master,labour_details where labour_details.Labour_Id = salary_master.Labour_Id AND Sal_Mast_Id = '$Sal_Mast_Id'";
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
	$Sal_Mast_Id = $row['Sal_Mast_Id'];
	$Date_Range = $row['Date_Range'];
	$Name = $row['Name'];
	$Total_Amt = $row['Total_Amt'];
	$Total_Meter = $row['Total_Meter'];
	$Upad_Amt = $row['Upad_Amt'];
	$Re_Amt = $row['Re_Amt'];
	$Grand_Total = $row['Grand_Total'];
	$Re_Upad_Amt = $row['Re_Upad_Amt'];
	$Status = $row['Status'];
	$Entry_Date = $row['Entry_Date'];
	$Entry_Id = $row['Entry_Id'];
}?>
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
<?php include("sidemenu.php");?>
                <div class="inner">
                    <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" align="center">SALARY </h1>
                </div>
            </div>
<div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <div id="div-1" class="accordion-body collapse in body">
            <form class="form-horizontal" method="post">
            <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Salary ID :</label>
                    <div class="col-lg-8">
                    <input type="text" id="text2" placeholder="" name="Sal_Mast_Id" value="<?php echo $Sal_Mast_Id; ?>" class="form-control" readonly />
                    </div>
                </div>
                       <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Date_Range :</label>
                    <div class="col-lg-8">
                    <input type="text" id="Date_Range" placeholder="" class="form-control" value="<?php echo $Date_Range; ?>" name="Date_Range" readonly />
                    </div>
                </div>
                         <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Labour :</label>
                    <div class="col-lg-8">
                    <input type="text" id="Name" placeholder="" class="form-control" value="<?php echo $Name; ?>" name="Name" readonly />
                    </div>
                </div>
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Total Meter :</label>
                    <div class="col-lg-8">
                    <input type="text" id="Total_Meter" placeholder="" name="Total_Meter" class="form-control" value="<?php echo $Total_Meter; ?>" readonly />
                    </div>
                </div> 
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Total Amount :</label>
                    <div class="col-lg-8">
                    <input type="text" id="Total_Amt" placeholder="" name="Total_Amt" class="form-control" value="<?php echo $Total_Amt; ?>" readonly />
                    </div>
                </div>
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Upad Amount :</label>
                    <div class="col-lg-8">
                    <input type="text" id="Upad_Amt" placeholder="" class="form-control" name="Upad_Amt" value="<?php echo $Upad_Amt; ?>" readonly />
                    </div>
                </div>
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Remaining Amount :</label>
                    <div class="col-lg-8">
                    <input type="text" id="Re_Amt" placeholder="" class="form-control" name="Re_Amt" value="<?php echo $Re_Amt; ?>" readonly/>
                    </div>
                </div>
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Grand Total :</label>
                    <div class="col-lg-8">
                    <input type="text" id="Grand_Total" placeholder="" class="form-control" name="Grand_Total" value="<?php echo $Grand_Total; ?>" readonly/>
                    </div>
                </div>
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Remaining Upad Amount :</label>
                    <div class="col-lg-8">
                    <input type="text" id="Re_Upad_Amt" placeholder="" class="form-control" name="Re_Upad_Amt" value="<?php echo $Re_Upad_Amt; ?>" readonly/>
                    </div>
                </div>
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Status :</label>
                    <div class="col-lg-8">
                    <input type="text" id="Status" placeholder="" class="form-control" name="Status" value="<?php echo $Status; ?>" readonly/>
                    </div>
                </div>
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Entry Date :</label>
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
                                     <a href="salarylistpage"><input type="button" value=" Back" class="btn btn-inverse btn-lg " id="btnback" name="btnback" /></a>
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
	<?php include("shortcutkeys.php");?>
	</script>
</body>
</html>
<?php
ob_flush(); ?>