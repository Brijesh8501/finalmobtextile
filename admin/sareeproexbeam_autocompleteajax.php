<?php
require_once 'config.php';
if(isset($_POST['type']))
{
if($_POST['type'] == 'country_table'){
	
	
	$row_num = $_POST['row_num'];
	$name = $_POST['name_startsWith'];
	
	$query = "SELECT saree_production.Sa_Pro_Id,beam_machine.Be_M_Id,beam_dcorg.Beam_No,machine_details.Machine_No,machine_details.Machine_Id FROM saree_production, beam_dcorg,beam_machine,machine_details WHERE beam_dcorg.Be_D_C_Id = beam_machine.Be_D_C_Id AND beam_machine.Be_M_Id = saree_production.Be_M_Id AND machine_details.Machine_Id = beam_machine.Machine_Id AND UPPER(Sa_Pro_Id) LIKE '".strtoupper($name)."%'";
	$result = mysqli_query($con, $query);
	$data = array();
	while ($row = mysqli_fetch_assoc($result)) {
		$name = $row['Sa_Pro_Id'].'|'.$row['Beam_No'].'|'.$row['Machine_No'].'|'.$row['Machine_Id'];
		array_push($data, $name);	
	}	
	echo json_encode($data);
}
}
?>
