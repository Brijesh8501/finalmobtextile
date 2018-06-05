<?php
require_once 'config.php';
if(isset($_REQUEST['Ta_Pro_Id']))
{
	$Ta_Pro_Id = $_REQUEST['Ta_Pro_Id'];
}
if(isset($_POST['type']))
{
if($_POST['type'] == 'country_table'){
	$row_num = $_POST['row_num'];
	$name = $_POST['name_startsWith'];
	$query = "SELECT quality_details.Quality_Id, quality_details.Quality_Name, quality_details.Labour_Rate FROM quality_details,taka_detailsorg WHERE quality_details.Quality_Id = taka_detailsorg.Quality_Id AND taka_detailsorg.Ta_Pro_Id = '".$Ta_Pro_Id."' AND UPPER(Quality_Name) LIKE '".strtoupper($name)."%' group by quality_details.Quality_Name";
	$result = mysqli_query($con, $query);
	$data = array();
	while ($row = mysqli_fetch_assoc($result)) {
		$name = $row['Quality_Name'].'|'.$row['Quality_Id'].'|'.$row['Labour_Rate'];
		array_push($data, $name);	
	}	
	echo json_encode($data);}}
?>
