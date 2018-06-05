<?php
require_once 'config.php';
if(isset($_POST['type']))
{
if($_POST['type'] == 'country_table'){
	$row_num = $_POST['row_num'];
	$name = $_POST['name_startsWith'];
	$query = "select machine_parts.Mach_Part_Id,machine_parts.Mach_Pname from machine_parts where UPPER(Mach_Pname) LIKE '".strtoupper($name)."%'";
	$result = mysqli_query($con, $query);
	$data = array();
	while ($row = mysqli_fetch_assoc($result)) {
		$name = $row['Mach_Pname'].'|'.$row['Mach_Part_Id'];
		array_push($data, $name);	
	}	
	echo json_encode($data);
}
}
?>
