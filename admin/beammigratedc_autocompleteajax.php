<?php
require_once 'config.php';

if(isset($_POST['type']))
{
if($_POST['type'] == 'country_table'){
	
	
	$row_num = $_POST['row_num'];
	$name = $_POST['name_startsWith'];
	
	$query = "select Be_D_C_Id,Beam_No,Taar,Beam_Meter,Weight,quality_details.Quality_Id,quality_details.Quality_Name from beam_dcorg,quality_details where quality_details.Quality_Id = beam_dcorg.Quality_Id AND UPPER(Beam_No) LIKE '".strtoupper($name)."%'";
	$result = mysqli_query($con, $query);
	$data = array();
	while ($row = mysqli_fetch_assoc($result)) {
		$name = $row['Beam_No'].'|'.$row['Be_D_C_Id'].'|'.$row['Taar'].'|'.$row['Beam_Meter'].'|'.$row['Weight'].'|'.$row['Quality_Id'].'|'.$row['Quality_Name'];
		array_push($data, $name);	
	}	
	echo json_encode($data);
}
}
?>
