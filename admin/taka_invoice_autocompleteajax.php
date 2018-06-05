<?php
require_once 'config.php';
if(isset($_REQUEST['Taka_D_C_Id']))
	{
	$Taka_D_C_Id=$_REQUEST['Taka_D_C_Id'];
	}
if(isset($_POST['type']))
{
if($_POST['type'] == 'country_table'){
	
	
	$row_num = $_POST['row_num'];
	$name = $_POST['name_startsWith'];
	
	$query = "SELECT sum(taka_dcorg.Taka_Meter) as SUM, count(taka_dcorg.Taka_Id) as count,quality_details.Quality_Name,quality_details.Quality_Id FROM `quality_details`,`taka_dcorg` WHERE quality_details.Quality_Id = taka_dcorg.Quality_Id AND taka_dcorg.Taka_D_C_Id='$Taka_D_C_Id' AND taka_dcorg.Status ='Sale' AND UPPER(Quality_Name) LIKE '".strtoupper($name)."%' group by quality_details.Quality_Name";
	$result = mysqli_query($con, $query);
	$data = array();
	while ($row = mysqli_fetch_assoc($result)) {
		$name = $row['Quality_Name'].'|'.$row['count'].'|'.$row['SUM'].'|'.$row['Quality_Id'];
		array_push($data, $name);	
	}	
	echo json_encode($data);
}
}
?>
