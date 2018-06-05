<?php  session_start(); require_once('../Connections/brijesh8510.php'); 
include("databaseconnect.php");
if(isset($_REQUEST['action']))
{
$Taka_D_C_Id = $_REQUEST['Taka_D_C_Id'];
$action = $_REQUEST['action'];
if(isset($_REQUEST['Add1']))
{
//insert
if(!isset($_SESSION['User']))
{ 
   $loginGoTo = "loginadmin.php?msg";
    echo '<script>window.location="'.$loginGoTo.'";</script>';
} 
if(isset($_SESSION['User']))
{
     $Taka_D_C_Id = $_REQUEST['Taka_D_C_Id'];  
	$Taka_Id = $_REQUEST['countryname_1'];
	$Taka_Meter = $_REQUEST['country_no_1'];
	$Taka_Weight = $_REQUEST['phone_code_1'];
	$Quality_Id = $_REQUEST['country_1'];
	$R_Id = $_REQUEST['R_Id'];
	 if($Taka_Id<=0 && $Taka_Meter=="" && $Taka_Weight=="" && $Quality_Id<=0)
	    {
		echo '<script>alert("Above all(Taka id, Taka meter, Taka weight, Quality) details are required....");</script>';
		}
	 elseif($Taka_Id<=0)
	    {
		echo '<script>alert("please select taka id first...");</script>';
		}
	 elseif($Taka_Meter=="")
	    {
		echo '<script>alert("Taka meter is required...");</script>';
		}
	elseif($Taka_Weight=="")
	    {
		echo '<script>alert("Taka weight is required...");</script>';
		}
	elseif($Quality_Id<=0)
	    {
		echo '<script>alert("Quality is required...");</script>';
		}
		else
		{
			if($action=='insert')
             {
	   $query = mysql_query("select * from taka_dcorgmill WHERE taka_dcorgmill.Taka_Id='".$Taka_Id."' ") or die(mysql_error());
	   $duplicate_fetch = mysql_fetch_array($query);
$duplicate = mysql_num_rows($query);
$duplicate_taka = $duplicate_fetch['Taka_D_C_Id'];
   if($duplicate==0)
    {
		$query3 = mysql_query("select * from taka_d_c_2mill1 WHERE taka_d_c_2mill1.Taka_Id='".$Taka_Id."' ") or die(mysql_error());
	  $duplicate3 = mysql_num_rows($query3);
   if($duplicate3==0)
    {
	$sql= "INSERT INTO  `taka_d_c_2mill1` (`Ta_D_C_Id` ,`Taka_D_C_Id` ,`Taka_Id` ,`Taka_Meter` ,`Taka_Weight` ,`Quality_Id` ,`R_Id`)VALUES (NULL , '$Taka_D_C_Id' ,  '$Taka_Id',  '$Taka_Meter',  '$Taka_Weight', '$Quality_Id',  '$R_Id')";
$result = mysql_query($sql);
	}
	else
	{
		echo "<center style='color:#F00;'>This taka id : $Taka_Id allready exists in this challan</center>";
	}
	}
	else
	{
		echo "<center style='color:#F00;'>This taka id : $Taka_Id allready exists in  challan id : $duplicate_taka</center>";
	}
	}
else if($action=='update')
{
	$query = mysql_query("select * from taka_dcorgmill WHERE taka_dcorgmill.Taka_Id='".$Taka_Id."' ") or die(mysql_error());
	 $duplicate_fetch = mysql_fetch_array($query);
$duplicate = mysql_num_rows($query);
$duplicate_taka = $duplicate_fetch['Taka_D_C_Id'];
   if($duplicate==0)
    {
	$sql= "INSERT INTO  `taka_dcorgmill` (`Ta_D_C_Id` ,`Taka_D_C_Id` ,`Taka_Id` ,`Taka_Meter` ,`Taka_Weight` ,`Quality_Id` ,`R_Id`)VALUES (NULL , '$Taka_D_C_Id' ,  '$Taka_Id',  '$Taka_Meter',  '$Taka_Weight', '$Quality_Id', '$R_Id')";
$result = mysql_query($sql);
	}
	else
	{
		echo "<center style='color:#F00;'>This taka id : $Taka_Id allready exists in  challan id : $duplicate_taka</center>";
	}
}}}}}
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }
  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);
  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}
if($action=='insert')
{
mysql_select_db($database_brijesh8510, $brijesh8510);
$query_Recordset1 = "SELECT taka_d_c_2mill1.Ta_D_C_Id, taka_d_c_2mill1.Taka_Id, taka_d_c_2mill1.Taka_Meter, taka_d_c_2mill1.Taka_Weight, quality_details.Quality_Name,taka_d_c_2mill1.Taka_D_C_Id, taka_d_c_2mill1.R_Id FROM taka_d_c_2mill1,quality_details WHERE quality_details.Quality_Id = taka_d_c_2mill1.Quality_Id AND taka_d_c_2mill1.Taka_D_C_Id='".$Taka_D_C_Id."' ";
$Recordset1 = mysql_query($query_Recordset1, $brijesh8510) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
}
elseif($action=='update')
{
	mysql_select_db($database_brijesh8510, $brijesh8510);
$query_Recordset1 = "SELECT taka_dcorgmill.Ta_D_C_Id, taka_dcorgmill.Taka_Id, taka_dcorgmill.Taka_Meter, taka_dcorgmill.Taka_Weight, quality_details.Quality_Name, taka_dcorgmill.Taka_D_C_Id, taka_dcorgmill.R_Id FROM taka_dcorgmill,quality_details WHERE quality_details.Quality_Id = taka_dcorgmill.Quality_Id AND taka_dcorgmill.Taka_D_C_Id='".$Taka_D_C_Id."' ";
$Recordset1 = mysql_query($query_Recordset1, $brijesh8510) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
}
?>
<script src="assets/js/googleapi.js">
</script>
<script>
$(document).ready(function(){
	 count = 0;
        count += $('#mybody').children('tr').length;
        $('#Total_Taka').val(count);
		function Count() {
		 count = 0;
        count += $('#mybody').children('tr').length;
        $('#Total_Taka').val(count);
		}
	<?php if($action=='insert')
{
	?>
 $('.btn-danger').click(function(){
       var del_id = $(this).attr('rel');
       $.post('taka_d_cmilltabledelete.php?del=ins', {delete_id:del_id}, function(data) {
          if(data == 'true') {
	        $('#'+del_id).remove();
			alert('Deleted');
			Count();
          } else {
            alert('Could not delete!');
          }
       });
    });
	<?php }
elseif($action=='update')
{
	?>
	$('.btn-danger').click(function(){
       var del_id = $(this).attr('rel');
       $.post('taka_d_cmilltabledelete.php?del=upd', {delete_id:del_id}, function(data) {
          if(data == 'true') {
	        $('#'+del_id).remove();
			alert('Deleted');
			Count();
          } else {
            alert('Could not delete!');
          }
       });
    });
	<?php } ?>
  });
</script>
<style type="text/css">
	.btn-danger {
		border-radius:5px;
	}
</style>  
<?php if($action=='insert')
{
	?>
<table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                        <tr>
                                            <th>Sr.No</th>
                                            <th>Taka ID</th>
                                            <th>Taka Meter</th>
                                            <th>Taka Weight</th>
                                            <th>Quality</th>
                                            <th>#ID</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody id="mybody">
      <?php if($totalRows_Recordset1==0) {
	  }
	  else
	  {
                                     $i=0;
	                                 $i++;
                                     do { ?>
  <tr id="<?php echo $row_Recordset1['Ta_D_C_Id']; ?>">
    <td width="10%"><?php echo $i++; ?></td>
    <td width="15%"><?php echo $row_Recordset1['Taka_Id']; ?></td>
    <td width="10%"><?php echo $row_Recordset1['Taka_Meter']; ?></td>
    <td width="10%"><?php echo $row_Recordset1['Taka_Weight']; ?></td>
    <td width="25%"><?php echo $row_Recordset1['Quality_Name']; ?></td>
     <td width="10%"><?php echo $row_Recordset1['R_Id']; ?></td>
    <td align="center"> 
     <button type="button" class="btn-danger" rel="<?php echo $row_Recordset1['Ta_D_C_Id']; ?>"><i class="icon-remove icon-white"></i></button>
    </td>
  </tr>
  <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); 
  } ?>
                                    </tbody>
                                </table>
                                <?php }
elseif($action=='update')
{
	?>
    <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                        <tr>
                                            <th>Sr.No</th>
                                            <th>Taka ID</th>
                                            <th>Taka Meter</th>
                                            <th>Taka Weight</th>
                                            <th>Quality</th>
                                            <th>#ID</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody id="mybody">
      <?php if($totalRows_Recordset1==0) {
	  }
	  else
	  {
                                     $i=0;
	                                 $i++;
                                     do { ?>
  <tr id="<?php echo $row_Recordset1['Ta_D_C_Id']; ?>">
    <td width="10%"><?php echo $i++; ?></td>
    <td width="15%"><?php echo $row_Recordset1['Taka_Id']; ?></td>
    <td width="10%"><?php echo $row_Recordset1['Taka_Meter']; ?></td>
    <td width="10%"><?php echo $row_Recordset1['Taka_Weight']; ?></td>
    <td width="25%"><?php echo $row_Recordset1['Quality_Name']; ?></td>
     <td width="10%"><?php echo $row_Recordset1['R_Id']; ?></td>
    <td align="center"> 
     <button type="button" class="btn-danger" rel="<?php echo $row_Recordset1['Ta_D_C_Id']; ?>"><i class="icon-remove icon-white"></i></button>
    </td>
  </tr>
  <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); 
  } ?>
                                    </tbody>
                                </table>
<?php } 
 if($action=='insert')
{
mysql_free_result($Recordset1);
}
elseif($action=='update')
{
	mysql_free_result($Recordset1);
}
?>
