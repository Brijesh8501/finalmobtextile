<?php
require_once 'config.php';
if(isset($_REQUEST['Bo_D_C_Id']))
{
	$Bo_D_C_Id = $_REQUEST['Bo_D_C_Id'];
}

if(isset($_POST['type']))
{
if($_POST['type'] == 'country_table'){
	
	
	$row_num = $_POST['row_num'];
	$name = $_POST['name_startsWith'];
	
	$query = "select quality_details.Quality_Name,quality_details.Quality_Id,sum(boobin_dcorg.Total_Cartoon) as Total_Cartoon,sum(boobin_dcorg.Total_Weight) as Total_Weight from quality_details,boobin_dcorg where quality_details.Quality_Id = boobin_dcorg.Quality_Id AND boobin_dcorg.Status != 'Return' AND boobin_dcorg.Bo_D_C_Id = '".$Bo_D_C_Id."' AND UPPER(Quality_Name) LIKE '".strtoupper($name)."%' group by quality_details.Quality_Name";
	$result = mysqli_query($con, $query);
	$data = array();
	while ($row = mysqli_fetch_assoc($result)) {
		$name = $row['Quality_Name'].'|'.$row['Quality_Id'].'|'.$row['Total_Cartoon'].'|'.$row['Total_Weight'];
		array_push($data, $name);	
	}	
	echo json_encode($data);
}
}
?>
