<?php
require_once 'config.php';
if(isset($_REQUEST['Saree_D_C_Id']))
	{
	$Saree_D_C_Id=$_REQUEST['Saree_D_C_Id'];
	}
if(isset($_POST['type']))
{
if($_POST['type'] == 'country_table'){
	$row_num = $_POST['row_num'];
	$name = $_POST['name_startsWith'];
	$query = "SELECT quality_details.Quality_Name, quality_details.Quality_Id, design_details.Design, design_details.Design_Id, sum(saree_dcorg.Saree_Lot_Meter) as SUM,sum(saree_dcorg.Saree_Weight) as Weight ,sum(saree_dcorg.Saree_Pieces) as PIECES FROM `quality_details`,`design_details`,`saree_dcorg` WHERE quality_details.Quality_Id = design_details.Quality_Id AND design_details.Design_Id = saree_dcorg.Design_Id AND saree_dcorg.Saree_D_C_Id='".$Saree_D_C_Id."' AND Saree_dcorg.Status ='Sale' AND UPPER(Design) LIKE '".strtoupper($name)."%' group by design_details.Design";
	$result = mysqli_query($con, $query);
	$data = array();
	while ($row = mysqli_fetch_assoc($result)) {
		$name = $row['Design'].'|'.$row['Design_Id'].'|'.$row['Quality_Id'].'|'.$row['Quality_Name'].'|'.$row['SUM'].'|'.$row['Weight'].'|'.$row['PIECES'];
		array_push($data, $name);	
	}	
	echo json_encode($data);
}}
?>
