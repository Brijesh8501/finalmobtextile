<?php
require_once 'config.php';
if(isset($_POST['type']))
{
if($_POST['type'] == 'country_table'){
	$row_num = $_POST['row_num'];
	$name = $_POST['name_startsWith'];
	$query = "select Bank_Name from bank_details where UPPER(Bank_Name) LIKE '".strtoupper($name)."%'";
	$result = mysqli_query($con, $query);
	$data = array();
	while ($row = mysqli_fetch_assoc($result)) {
		$name = $row['Bank_Name'];
		array_push($data, $name);	
	}	
	echo json_encode($data);
}
}
?>
