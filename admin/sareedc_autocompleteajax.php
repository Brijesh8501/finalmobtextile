<?php
require_once 'config.php';
if(isset($_POST['type']))
{
if($_POST['type'] == 'country_table'){
	$row_num = $_POST['row_num'];
	$name = $_POST['name_startsWith'];
	$query = "SELECT saree_detailsorg.Saree_Lot_Id, saree_detailsorg.Saree_Lot_Meter, saree_detailsorg.Saree_Weight, saree_detailsorg.Saree_Pieces, quality_details.Quality_Name, quality_details.Quality_Id, design_details.Design, design_details.Design_Id FROM saree_detailsorg, quality_details,design_details WHERE quality_details.Quality_Id = design_details.Quality_Id AND design_details.Design_Id = saree_detailsorg.Design_Id AND UPPER(Saree_Lot_Id) LIKE '".strtoupper($name)."%'";
	$result = mysqli_query($con, $query);
	$data = array();
	while ($row = mysqli_fetch_assoc($result)) {
		$name = $row['Saree_Lot_Id'].'|'.$row['Saree_Lot_Meter'].'|'.$row['Saree_Weight'].'|'.$row['Saree_Pieces'].'|'.$row['Quality_Name'].'|'.$row['Quality_Id'].'|'.$row['Design'].'|'.$row['Design_Id'];
		array_push($data, $name);	
	}	
	echo json_encode($data);
}
}
?>
