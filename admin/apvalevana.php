<?php include("logcode.php"); 
date_default_timezone_set("Asia/Calcutta");
$dateact = date('Y-m-d');
	$dateactfull = date('d-m-Y        h:i:s A');
	$Entry_Id = $row_result['Registration_Id'];
	
	$Partact = "Apvana Levana Page - This page is open to view.<br/>By : ".$row_result['Name'];
	$insactivity = "insert into activity(Activity_Id,Date,Particular,Type,Action,Datefull,Id) values(NULL,'$dateact','$Partact','Apvana Levana - View','view','$dateactfull','$Entry_Id')";
	mysql_query($insactivity); 
	
	
$sql_apv3 = "SELECT sum(Grand_Amt) as grandtotal FROM beam_invoice LEFT JOIN transactions_beam1 ON beam_invoice.Beam_Invoice_Id = transactions_beam1.Trans_Invoice_No WHERE (transactions_beam1.Status IS NULL) or (transactions_beam1.Status = 'Un-Paid')";
$result_apv3 = mysql_query($sql_apv3);
$row_result_apv3 = mysql_fetch_array($result_apv3); 

$sql_apv4 = "SELECT sum(Grand_Amt) as grandtotal FROM bobbin_invoice LEFT JOIN transactions_bobbin ON bobbin_invoice.Bobbin_Invoice_Id = transactions_bobbin.Trans_Invoice_No WHERE (transactions_bobbin.Status IS NULL) or (transactions_bobbin.Status = 'Un-Paid')";
$result_apv4 = mysql_query($sql_apv4);
$row_result_apv4 = mysql_fetch_array($result_apv4); 
$total_apvana1 = $row_result_apv3['grandtotal'] + $row_result_apv4['grandtotal'];

//////////////////////////////////////////////////////////////////////////////////////////////////////////
$sql_leva3 = "SELECT sum(Grandtotal) as grandtotal FROM taka_invoice LEFT JOIN transactions_taka ON taka_invoice.Taka_Invoice_Id = transactions_taka.Trans_Invoice_No WHERE (transactions_taka.Status IS NULL) or (transactions_taka.Status = 'Not-Received')";
	$result_leva3 = mysql_query($sql_leva3);
$row_result_leva3 = mysql_fetch_array($result_leva3); 

$sql_leva4 = "SELECT sum(Grandtotal) as grandtotal FROM saree_invoice LEFT JOIN transactions_saree ON saree_invoice.Saree_Invoice_Id = transactions_saree.Trans_Invoice_No WHERE (transactions_saree.Status IS NULL) or (transactions_saree.Status = 'Not-Received')";
$result_leva4 = mysql_query($sql_leva4);
$row_result_leva4 = mysql_fetch_array($result_leva4);
 
$total_levana1 = $row_result_leva3['grandtotal'] + $row_result_leva4['grandtotal']; 

////////////////////////////////// number format in point 
  function moneyFormatIndia($num){
$explrestunits = "" ;
$num=preg_replace('/,+/', '', $num);
$words = explode(".", $num);
$des="00";
if(count($words)<=2){
    $num=$words[0];
    if(count($words)>=2){$des=$words[1];}
    if(strlen($des)<2){$des="$des0";}else{$des=substr($des,0,2);}
}
if(strlen($num)>3){
    $lastthree = substr($num, strlen($num)-3, strlen($num));
    $restunits = substr($num, 0, strlen($num)-3); // extracts the last three digits
    $restunits = (strlen($restunits)%2 == 1)?"0".$restunits:$restunits; // explodes the remaining digits in 2's formats, adds a zero in the beginning to maintain the 2's grouping.
    $expunit = str_split($restunits, 2);
    for($i=0; $i<sizeof($expunit); $i++){
        // creates each of the 2's group and adds a comma to the end
        if($i==0)
        {
            $explrestunits .= (int)$expunit[$i].","; // if is first value , convert into integer
        }else{
            $explrestunits .= $expunit[$i].",";
        }
    }
    $thecash = $explrestunits.$lastthree;
} else {
    $thecash = $num;
}
return "$thecash.$des"; // writes the final format where $currency is the currency symbol.
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
    <link rel="shortcut icon" href="Icons/st85.png">
  <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="assets/css/main.css" />
</head>
<body>
<?php include("sidemenu.php"); ?>
               <div class="inner">
                    <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" align="center">APVANA-UGHARANI </h1>
                </div>
            </div>
<div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <div id="div-1" class="accordion-body collapse in body">
        <form class="form-horizontal" method="post">
        <div class="form-group row" align="center">
            <div class="col-lg-5" style="color:#00F">
            Total Apvana (Yarn) : <?php echo moneyFormatIndia($total_apvana1);?><br/>
            Total Ugharani : <?php echo moneyFormatIndia($total_levana1);?>
                 </div>
                  <div class="col-lg-4">
                       <div class="form-group">
<div class="col-lg-8">
  <select name="apvalevana" class="form-control" id="apvalevana">
    <option value="">--Select--</option>
    <option value="Apvana">Apvana</option>
    <option value="Levana">Ugharani</option>
      </select>
  </div>
</div>
                        </div>
                         <div class="col-lg-3">
                 </div>
                   </div>
                   <div id="show">
                   </div>
                   <div align="center">
                   <button type="button" value="Search" class="btn btn-primary btn-grad" name="Search" id="Search"><i class="icon-search"></i> Search
                            </button>
                        </div>
                  <hr />
                      <div class="col-lg-12" align="center">
                         <div class="row">
                <div class="col-lg-12">
                            <div class="table-responsive" id="table">
                            </div>
                        </div>
                    </div>
                        </div>
                        <hr />
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
    $("#apvalevana").change(function(){
		t5 = $("#apvalevana").val();
		var z = "?apvalevana="+t5;
		$("#show").load("apvalevanaajax.php"+z);
		 });	
	$("#Search").click(function(){
		t5 = $("#apvalevana").val();
		t6 = $("#Company").val();
		var q="?apvalevana="+t5+"&Company="+t6+"&Search=Search";
		$("#table").load("apvalevanacurrentajax.php"+q);
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
	<?php include("shortcutkeys.php");?>
	</script>
</body>
</html>
<?php ob_flush(); ?>