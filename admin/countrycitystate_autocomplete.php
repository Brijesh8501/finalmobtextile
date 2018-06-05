<?php
require_once 'config.php';
if(isset($_POST['type']))
{
if($_POST['type'] == 'country_table'){
	$row_num = $_POST['row_num'];
	$name = $_POST['name_startsWith'];
	$query = "SELECT city1.ct_id, city1.ct_name, `state1`.st_name, `state1`.st_id, country1.cnt_id, country1.cnt_name
FROM city1, `state1`, country1 WHERE `state1`.st_id = city1.st_id AND country1.cnt_id = `state1`.cnt_id AND UPPER(ct_name) LIKE '".strtoupper($name)."%'";
	$result = mysqli_query($con, $query);
	$data = array();
	while ($row = mysqli_fetch_assoc($result)) {
		$name = $row['ct_name'].'|'.$row['ct_id'].'|'.$row['st_name'].'|'.$row['st_id'].'|'.$row['cnt_name'].'|'.$row['cnt_id'];
		array_push($data, $name);	
	}	
	echo json_encode($data);
}
}
?>
