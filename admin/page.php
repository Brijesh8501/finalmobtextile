<?php
include("databaseconnect.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
        <title>Pie Chart Demo (Google VAPI) - http://codeofaninja.com/</title>
    </head>
    
<body style="font-family: Arial;border: 0 none;">
    <!-- where the chart will be rendered -->
    <div id="visualization" style="width: 1000px; height: 600px;"></div>
 
    <?php
 
     $query = "select C_Name,sum(Grand_Amt) as sum_amt from beam_invoice,company_deetaails where company_deetaails.Company_Id = beam_invoice.Company_Id group by C_Name";
 
    //execute the query
    $result = $con->query( $query );
 
    //get number of rows returned
    $num_results = $result->num_rows;
 
    ?>
        <!-- load api -->
        <script type="text/javascript" src="http://www.google.com/jsapi"></script>
        
        <script type="text/javascript">
            //load package
            google.load('visualization', '1', {packages: ['corechart', 'bar']});
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
                draw(data, {title:"TITLE"});
            }
 
            google.setOnLoadCallback(drawVisualization);
        </script>
   
    
</body>
</html>