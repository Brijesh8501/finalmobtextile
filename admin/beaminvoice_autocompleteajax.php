<?php
require_once 'config.php';
if(isset($_REQUEST['Beam_D_C_Id']))
{
	$Beam_D_C_Id = $_REQUEST['Beam_D_C_Id'];
}

if(isset($_POST['type']))
{
if($_POST['type'] == 'country_table'){
	
	
	$row_num = $_POST['row_num'];
	$name = $_POST['name_startsWith'];
	
	$query = "select quality_details.Quality_Name,quality_details.Quality_Id,beam_dcorg.Taar,sum(beam_dcorg.Weight) as Weight,count(beam_dcorg.Beam_No) as Total_Beam from quality_details,beam_dcorg where quality_details.Quality_Id = beam_dcorg.Quality_Id AND beam_dcorg.Status = 'NotReturn' AND beam_dcorg.Beam_D_C_Id = '".$Beam_D_C_Id."' AND UPPER(Quality_Name) LIKE '".strtoupper($name)."%' group by beam_dcorg.Taar,quality_details.Quality_Name";
	$result = mysqli_query($con, $query);
	$data = array();
	while ($row = mysqli_fetch_assoc($result)) {
		$name = $row['Quality_Name'].'|'.$row['Quality_Id'].'|'.$row['Total_Beam'].'|'.$row['Taar'].'|'.$row['Weight'];
		array_push($data, $name);	
	}	
	echo json_encode($data);
}
}

?>
