<?php
require_once 'config.php';
if(isset($_POST['type']))
{
if($_POST['type'] == 'country_table'){
	$row_num = $_POST['row_num'];
	$name = $_POST['name_startsWith'];
	$query = "SELECT design_details.Design_Id, design_details.Design, quality_details.Quality_Id, quality_details.Quality_Name FROM design_details, quality_details WHERE quality_details.Quality_Id = design_details.Quality_Id AND UPPER(Design) LIKE '".strtoupper($name)."%'";
	$result = mysqli_query($con, $query);
	$data = array();
	while ($row = mysqli_fetch_assoc($result)) {
		$name = $row['Design'].'|'.$row['Design_Id'].'|'.$row['Quality_Name'].'|'.$row['Quality_Id'];
		array_push($data, $name);	
	}	
	echo json_encode($data);
}}
?>
