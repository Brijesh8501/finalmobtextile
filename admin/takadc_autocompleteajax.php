<?php
require_once 'config.php';
if(isset($_POST['type']))
{
if($_POST['type'] == 'country_table'){
	
	
	$row_num = $_POST['row_num'];
	$name = $_POST['name_startsWith'];
	
	$query = "SELECT taka_detailsorg.Taka_Id, taka_detailsorg.Taka_Meter, taka_detailsorg.Taka_Weight, quality_details.Quality_Name, quality_details.Quality_Id FROM taka_detailsorg, quality_details WHERE quality_details.Quality_Id = taka_detailsorg.Quality_Id AND UPPER(Taka_Id) LIKE '".strtoupper($name)."%'";
	$result = mysqli_query($con, $query);
	$data = array();
	while ($row = mysqli_fetch_assoc($result)) {
		$name = $row['Taka_Id'].'|'.$row['Taka_Meter'].'|'.$row['Taka_Weight'].'|'.$row['Quality_Id'].'|'.$row['Quality_Name'];
		array_push($data, $name);	
	}	
	echo json_encode($data);
}
}
?>
