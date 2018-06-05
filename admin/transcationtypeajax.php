<?php 
include("databaseconnect.php"); ?>
<select name="Trans_Invoice_No" class="form-control" id="Trans_Invoice_No">
    <option value="">--Select--</option>
<?php 
$comp="";
$brk="";
if( isset($_GET['Trans_Type']))
{
	$Trans_Type = $_GET['Trans_Type'];
	$Trans_Invoice_No = $_GET['Trans_Invoice_No'];
	if($Trans_Type=='Beam')
	{
	$sql= "select Beam_Invoice_Id,Beam_Invoice_Date,Grand_Amt from beam_invoice";
	$result = mysql_query($sql);
while($row = mysql_fetch_array($result))
{
	if($Trans_Invoice_No==$row['Beam_Invoice_Id'])
	{
	echo '<option selected="selected" value="'.$row['Beam_Invoice_Id'].'">'.$row['Beam_Invoice_Id'].'</option>'; 
    }
	else
	{
		echo '<option value="'.$row['Beam_Invoice_Id'].'">'.$row['Beam_Invoice_Id'].'</option>';
		}
}
	}
	else if($Trans_Type=='Bobbin')
	{
	$sql= "SELECT Bobbin_Invoice_Id,Bobbin_Invoice_Date,Grand_Amt FROM bobbin_invoice ";
	$result = mysql_query($sql);
while($row = mysql_fetch_array($result))
{
	if($Trans_Invoice_No==$row['Bobbin_Invoice_Id'])
	{
	echo '<option selected="selected" value="'.$row['Bobbin_Invoice_Id'].'">'.$row['Bobbin_Invoice_Id'].'</option>'; 
    }
	else
	{
		echo '<option value="'.$row['Bobbin_Invoice_Id'].'">'.$row['Bobbin_Invoice_Id'].'</option>';
		}
}
	}
	else if($Trans_Type=='Taka')
	{
	$sql= "SELECT Taka_Invoice_Id,Taka_Invoice_Date,Grandtotal FROM taka_invoice ";
	$result = mysql_query($sql);
while($row = mysql_fetch_array($result))
{
	if($Trans_Invoice_No==$row['Taka_Invoice_Id'])
	{
	echo '<option selected="selected" value="'.$row['Taka_Invoice_Id'].'">'.$row['Taka_Invoice_Id'].'</option>'; 
    }
	else
	{
		echo '<option value="'.$row['Taka_Invoice_Id'].'">'.$row['Taka_Invoice_Id'].'</option>';
		}
}
	}
	else if($Trans_Type=='Saree')
	{
	$sql= "SELECT Saree_Invoice_Id,Saree_Invoice_Date,Grandtotal FROM saree_invoice ";
	$result = mysql_query($sql);
while($row = mysql_fetch_array($result))
{
	if($Trans_Invoice_No==$row['Saree_Invoice_Id'])
	{
	echo '<option selected="selected" value="'.$row['Saree_Invoice_Id'].'">'.$row['Saree_Invoice_Id'].'</option>'; 
    }
	else
	{
		echo '<option value="'.$row['Saree_Invoice_Id'].'">'.$row['Saree_Invoice_Id'].'</option>';
		}}}}
?>
</select>