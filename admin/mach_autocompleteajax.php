<?php
require_once 'config.php';
if(isset($_POST['type']))
{
if($_POST['type'] == 'country_table'){
	$row_num = $_POST['row_num'];
	$name = $_POST['name_startsWith'];
	$query = "select * from meter_board WHERE UPPER(Mach_No) LIKE '".strtoupper($name)."%'";
	$result = mysqli_query($con, $query);
	$data = array();
	while ($row = mysqli_fetch_assoc($result)) {
		$name = $row['Mach_No'].'|'.$row['Mach_Status'].'|'.$row['Lab_Shift'].'|'.$row['Meter_Readiing'].'|'.$row['current_datee'];
		array_push($data, $name);	
	}	
	echo json_encode($data);
}
}
?>
<table>
<tr>
<td>Machine No</td>
<td>Status</td>
<td>Shift</td>
<td>Meter Reading</td>
<td>Date</td>
</tr>
<tr>
<td><?php echo $row['Mach_No']; ?></td>
<td><?php echo $row['Mach_Status']; ?></td>
<td><?php echo $row['Lab_Shift']; ?></td>
<td><?php echo $row['Meter_Readiing']; ?></td>
<td><?php echo $row['current_datee']; ?></td>
</tr>
</table>
