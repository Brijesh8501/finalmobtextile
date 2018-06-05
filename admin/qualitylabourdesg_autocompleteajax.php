<?php
require_once 'config.php';
if(isset($_REQUEST['Sa_Pro_Id']))
{$Sa_Pro_Id = $_REQUEST['Sa_Pro_Id'];}
if(isset($_POST['type']))
{if($_POST['type'] == 'country_table'){
	$row_num = $_POST['row_num'];
	$name = $_POST['name_startsWith'];
	$query = "SELECT design_details.Design,design_details.Design_Id,quality_details.Quality_Id, quality_details.Quality_Name, quality_details.Labour_Rate FROM quality_details,design_details,saree_detailsorg WHERE design_details.Design_Id = saree_detailsorg.Design_Id AND quality_details.Quality_Id = design_details.Quality_Id AND saree_detailsorg.Sa_Pro_Id = '".$Sa_Pro_Id."' AND UPPER(Design) LIKE '".strtoupper($name)."%' group by quality_details.Quality_Name,design_details.Design";
	$result = mysqli_query($con, $query);
	$data = array();
	while ($row = mysqli_fetch_assoc($result)) {
		$name = $row['Design'].'|'.$row['Design_Id'].'|'.$row['Quality_Name'].'|'.$row['Quality_Id'].'|'.$row['Labour_Rate'];
		array_push($data, $name);	
	}	
	echo json_encode($data);}}
?>
