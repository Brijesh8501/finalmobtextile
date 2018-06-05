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
if( isset($_GET['customer']))
{
	global $cus;
	global $brk;
	$cus = $_GET['customer'];
	$brk = $_GET['broker'];
	$q="select Broker_Id from bro_cus_id where Customer_Id like '".$cus."' ";
	$sql = "select * from broker_details1 where Broker_Id in(".$q.")";
}
else
{
$sql="select * from broker_details";
}
$result = mysql_query($sql);
while($row = mysql_fetch_array($result))
{ global $cus;
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