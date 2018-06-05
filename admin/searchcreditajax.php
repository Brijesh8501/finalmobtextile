<?php
require_once 'config.php';
if(isset($_POST['type']))
{
if($_POST['type'] == 'country_table'){
	
	
	$row_num = $_POST['row_num'];
	$name = $_POST['name_startsWith'];
	
	$query = "SELECT Subject FROM other_credit_details where UPPER(Subject) LIKE '".strtoupper($name)."%' group by Subject";
	$result = mysqli_query($con, $query);
	$data = array();
	while ($row = mysqli_fetch_assoc($result)) {
		$name = $row['Subject'];
		array_push($data, $name);	
	}	
	echo json_encode($data);
}
}
?>