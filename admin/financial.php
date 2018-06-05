<?php include("logcode.php"); ?>
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
                    <h1 class="page-header" align="center">STOCK</h1>
                </div>
            </div>
<div class="row">
<div class="col-lg-12">
      
               <div id="visualization" style="width: 100%; height: 600px;float:left" class="col-lg-12"></div>
                 <div id="visualization1" style="width: 100%; height: 600px;float:right" class="col-lg-12"></div>
                 
                <div id="visualization2" style="width: 100%; height: 600px;float:left" class="col-lg-12"></div>
                 <div id="visualization3" style="width: 100%; height: 600px;float:right" class="col-lg-12"></div>
                
            
    
    </div>
</div>
                    </div>
                 <?php
 
    //include database connection
  
 
    //query all records from the database
    $query = "select C_Name,sum(Grand_Amt) as sum_amt from beam_invoice,company_deetaails where company_deetaails.Company_Id = beam_invoice.Company_Id group by C_Name";
 
    //execute the query
    $result = $con->query( $query );
 
    //get number of rows returned
    $num_results = $result->num_rows;
    ?>
      
                      
   <?php include("footer.php"); ?>
     <script src="assets/js/shortcut.js"></script>
    <script src="assets/js/googleapi.js"></script>
<script>
         $(document).ready(function () {
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