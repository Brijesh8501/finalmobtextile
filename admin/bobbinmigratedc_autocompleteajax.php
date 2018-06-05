<?php
require_once 'config.php';
if(isset($_POST['type']))
{
if($_POST['type'] == 'country_table'){
	$row_num = $_POST['row_num'];
	$name = $_POST['name_startsWith'];
	$query = "select Bobbin_D_C_Id,Total_Cartoon,quality_details.Quality_Id,quality_details.Quality_Name from boobin_dcorg,quality_details where quality_details.Quality_Id = boobin_dcorg.Quality_Id AND UPPER(Bobbin_D_C_Id) LIKE '".strtoupper($name)."%'";
	$result = mysqli_query($con, $query);
	$data = array();
	while ($row = mysqli_fetch_assoc($result)) {
		$name = $row['Bobbin_D_C_Id'].'|'.$row['Total_Cartoon'].'|'.$row['Quality_Id'].'|'.$row['Quality_Name'];
		array_push($data, $name);	
	}	
	echo json_encode($data);
}
}
?>
