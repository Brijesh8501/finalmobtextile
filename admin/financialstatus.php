<?php include("logcode.php"); error_reporting(0); ?>
<!DOCTYPE html>
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<head>
      <meta charset="UTF-8" />
    <title>Shingori Textile</title>
     <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
   <?php include("reportsfileup.php"); ?>
</head>
<body>
<?php include("sidemenu.php"); ?>
                <div class="inner">
                    <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" align="center">FINANCIAL RELATIONSHIP STATUS</h1>
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
 
    if( $num_results > 0){
 
    ?>
        <!-- load api -->
        <script type="text/javascript" src="assets/js/googlejsapi.js"></script>
        
        <script type="text/javascript">
            //load package
            google.load('visualization', '1', {packages: ['corechart']});
        </script>
 
        <script type="text/javascript">
            function drawVisualization() {
                // Create and populate the data table.
                var data = google.visualization.arrayToDataTable([
                    ['PL', 'Ratings'],
                    <?php
                    while( $row = $result->fetch_assoc() ){
                        extract($row);
						echo "['{$C_Name}', {$sum_amt}],";
                    }
                    ?>
                ]);
 
                // Create and draw the visualization.
                new google.visualization.PieChart(document.getElementById('visualization')).
                draw(data, {title:"BEAM COMPANY"});
            }
 
            google.setOnLoadCallback(drawVisualization);
        </script>
    <?php
 
    }else{
        echo "No results found!";
    }
    ?>
     <?php
 
    //include database connection
  
 
    //query all records from the database
    $query = "select C_Name,sum(Grand_Amt) as sum_amt from bobbin_invoice,company_deetaails where company_deetaails.Company_Id = bobbin_invoice.Company_Id group by C_Name";
 
    //execute the query
    $result = $con->query( $query );
 
    //get number of rows returned
    $num_results = $result->num_rows;
 
    if( $num_results > 0){
 
    ?>
        <!-- load api -->
        <script type="text/javascript" src="assets/js/googlejsapi.js"></script>
        
        <script type="text/javascript">
            //load package
            google.load('visualization', '1', {packages: ['corechart']});
        </script>
 
        <script type="text/javascript">
            function drawVisualization() {
                // Create and populate the data table.
                var data = google.visualization.arrayToDataTable([
                    ['PL', 'Ratings'],
                    <?php
                    while( $row = $result->fetch_assoc() ){
                        extract($row);
						echo "['{$C_Name}', {$sum_amt}],";
                    }
                    ?>
                ]);
 
                // Create and draw the visualization.
                new google.visualization.PieChart(document.getElementById('visualization1')).
                draw(data, {title:"BOBBIN COMPANY"});
            }
 
            google.setOnLoadCallback(drawVisualization);
        </script>
    <?php
 
    }else{
        echo "No results found!";
    }
    ?>
         <?php
 
    //include database connection
  
 
    //query all records from the database
    $query = "select Cu_En_Name,sum(Grandtotal) as sum_amt from taka_invoice,customer_details where customer_details.Customer_Id = taka_invoice.Customer_Id group by Cu_En_Name";
 
    //execute the query
    $result = $con->query( $query );
 
    //get number of rows returned
    $num_results = $result->num_rows;
 
    if( $num_results > 0){
 
    ?>
        <!-- load api -->
        <script type="text/javascript" src="assets/js/googlejsapi.js"></script>
        
        <script type="text/javascript">
            //load package
            google.load('visualization', '1', {packages: ['corechart']});
        </script>
 
        <script type="text/javascript">
            function drawVisualization() {
                // Create and populate the data table.
                var data = google.visualization.arrayToDataTable([
                    ['PL', 'Ratings'],
                    <?php
                    while( $row = $result->fetch_assoc() ){
                        extract($row);
						echo "['{$C_Name}', {$sum_amt}],";
                    }
                    ?>
                ]);
   // Create and draw the visualization.
                new google.visualization.PieChart(document.getElementById('visualization2')).
                draw(data, {title:"TAKA CUSTOMER"});
            }
 
            google.setOnLoadCallback(drawVisualization);
        </script>
    <?php
 
    }else{
        echo "No results found!";
    }
    ?>
             <?php
 
    //include database connection
  
 
    //query all records from the database
    $query = "select Cu_En_Name,sum(Grandtotal) as sum_amt from saree_invoice,customer_details where customer_details.Customer_Id = saree_invoice.Customer_Id group by Cu_En_Name";
 
    //execute the query
    $result = $con->query( $query );
 
    //get number of rows returned
    $num_results = $result->num_rows;
 
    if( $num_results > 0){
 
    ?>
        <!-- load api -->
        <script type="text/javascript" src="assets/js/googlejsapi.js"></script>
        
        <script type="text/javascript">
            //load package
            google.load('visualization', '1', {packages: ['corechart']});
        </script>
 
        <script type="text/javascript">
            function drawVisualization() {
                // Create and populate the data table.
                var data = google.visualization.arrayToDataTable([
                    ['PL', 'Ratings'],
                    <?php
                    while( $row = $result->fetch_assoc() ){
                        extract($row);
						echo "['{$C_Name}', {$sum_amt}],";
                    }
                    ?>
                ]);
 
                // Create and draw the visualization.
                new google.visualization.PieChart(document.getElementById('visualization3')).
                draw(data, {title:"SAREE CUSTOMER"});
            }
 
            google.setOnLoadCallback(drawVisualization);
        </script>
    <?php
 
    }else{
        echo "No results found!";
    } ?>
                      
         
   <?php include("footer.php"); ?>
    <?php include("reportsfiledown.php"); ?>
    <script src="assets/js/shortcut.js"></script>
    <script src="assets/js/googleapi.js"></script>
<script>
         $(document).ready(function () {
		 $('#dataTables-example').dataTable();
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