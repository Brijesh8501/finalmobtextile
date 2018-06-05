<?php 
include("databaseconnect.php"); ?>
<div class="form-group">
<label class="control-label col-lg-4">Broker :</label>
<div class="col-lg-8">
<select name="broker" class="form-control" id="broker">
    <option value="">--Select--</option>
<?php 
$comp="";
$brk="";
if( isset($_GET['company']))
{
	global $comp;
	global $brk;
	$comp = $_GET['company'];
	$brk = $_GET['broker'];
	$q="select Broker_Id from bro_com_detaailss where Company_Id like '".$comp."' ";
	$sql = "select * from broker_details1 where Broker_Id in(".$q.")";
}
else
{
$sql="select * from broker_details1";
}
$result = mysql_query($sql);
while($row = mysql_fetch_array($result))
{
	global $comp;
	global $brk;
	if($brk==$row['Broker_Id'])
	{
	echo '<option selected="selected" value="'.$row['Broker_Id'].'">'.$row['B_Name'].'</option>'; 
    }
	else
	{
		echo '<option value="'.$row['Broker_Id'].'">'.$row['B_Name'].'</option>';
		}
}
?>
</select>
 </div>
</div>

