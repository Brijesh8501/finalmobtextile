<?php session_start(); require_once('../Connections/brijesh8510.php'); 
include("databaseconnect.php");	
if(isset($_REQUEST['action']))
{ 
$Beam_D_C_Id = $_REQUEST['Beam_D_C_Id'];
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
     $Beam_D_C_Id = $_REQUEST['Beam_D_C_Id'];  
	$beamno = $_REQUEST['Beam_No'];
	$Beam_No = str_replace(","," ",$beamno);
	$Taar = $_REQUEST['Taar'];
	$Beam_Meter = $_REQUEST['Beam_Meter'];
	$Weight = $_REQUEST['Weight'];
	$Quality_Id = $_REQUEST['Quality_Id'];
	$R_Id = $_REQUEST['R_Id'];
	$Chbe_D_C_Id = $_REQUEST['Chbe_D_C_Id'];
	if($Chbe_D_C_Id<=0 && $Beam_No=="" && $Taar=="" && $Beam_Meter=="" && $Weight=="" && $Quality_Id<=0)
	    {
		echo '<script>alert("Above all ( Beam no, Taar, Meter, Weight, Quality) are required....");</script>';
		}
	 elseif($Chbe_D_C_Id<=0)
	    {
		echo '<script>alert("Please give beam no properly....");</script>';
		}
	 elseif($Beam_No=="")
        {
		echo '<script>alert("Beam no is required....");</script>';
		}
		elseif($Taar=="")
	    {
		echo '<script>alert("Taar is required....");</script>';
		}
	 elseif($Beam_Meter=="")
	    {
		echo '<script>alert("Meter is required....");</script>';
		}
	 elseif($Weight=="")
	   {
		echo '<script>alert("Weight is required....");</script>';
		}
	elseif($Quality_Id<=0)
	    {
		echo '<script>alert("Quality is required....");</script>';
		}
	else
		{
		if($action=='insert')
             {
	$query = mysql_query("select * from beam_d_c_2migrate where Beam_No='".$Beam_No."' ") or die(mysql_error());
	$res_Fetch = mysql_fetch_array($query);
	$duplicate = mysql_num_rows($query);
   if($duplicate==0)
    {	
	$query4 = mysql_query("select * from beam_dcorgmigrate where Beam_No='".$Beam_No."' ") or die(mysql_error());
	$res_Fetch4 = mysql_fetch_array($query4);
	$duplicate4 = mysql_num_rows($query4);
	$res_Beam_D_C_Id4 = $res_Fetch4['Beam_D_C_Id'];
   if($duplicate4==0)
    {	
	$sql= "INSERT INTO `beam_d_c_2migrate` (`Be_D_C_Id` ,`Beam_D_C_Id` ,`Chbe_D_C_Id` ,`Beam_No` ,`Taar` ,`Beam_Meter` ,`Weight` ,`Quality_Id` ,`R_Id`)VALUES (NULL , '$Beam_D_C_Id' , '$Chbe_D_C_Id',  '$Beam_No',  '$Taar', '$Beam_Meter',  '$Weight', '$Quality_Id', '$R_Id')";
$result = mysql_query($sql);
	}else{
		echo "<center style='color:#F00;'>This beam no : ".$Beam_No." allready exists in migration-challan id : ".$res_Beam_D_C_Id4."</center>";
	}}else{
		echo "<center style='color:#F00;'>This beam no : ".$Beam_No." allready exists in this migration-challan</center>";
	}}
else if($action=='update')
{
$query = mysql_query("select * from beam_dcorgmigrate where Beam_No='".$Beam_No."' ") or die(mysql_error());
	$res_Fetch = mysql_fetch_array($query);
	$duplicate = mysql_num_rows($query);
	$res_Beam_D_C_Id = $res_Fetch['Beam_D_C_Id'];
   if($duplicate==0)
    {	
	$sql= "INSERT INTO  `beam_dcorgmigrate` (`Be_D_C_Id` ,`Beam_D_C_Id` ,`Chbe_D_C_Id` ,`Beam_No` ,`Taar` ,`Beam_Meter` ,`Weight` ,`Quality_Id` ,`R_Id`)VALUES (NULL , '$Beam_D_C_Id' , '$Chbe_D_C_Id',  '$Beam_No',  '$Taar', '$Beam_Meter',  '$Weight', '$Quality_Id', '$R_Id')";
$result = mysql_query($sql);
	}
	else
	{
		echo "<center style='color:#F00;'>This beam no : ".$Beam_No." allready exists in migration-challan id : ".$res_Beam_D_C_Id."</center>";
	}}}}}}
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
$query_rsSaree = "select Be_D_C_Id,Beam_D_C_Id,Chbe_D_c_Id,Beam_No,Taar,Beam_Meter,Weight,quality_details.Quality_Name,R_Id from beam_d_c_2migrate,quality_details where quality_details.Quality_Id = beam_d_c_2migrate.Quality_Id AND Beam_D_C_Id = '$Beam_D_C_Id' ";
$rsSaree = mysql_query($query_rsSaree, $brijesh8510) or die(mysql_error());
$row_rsSaree = mysql_fetch_assoc($rsSaree);
$totalRows_rsSaree = mysql_num_rows($rsSaree);
}
elseif($action=='update')
{
	mysql_select_db($database_brijesh8510, $brijesh8510);
$query_rsSaree = "select Be_D_C_Id,Beam_D_C_Id,Chbe_D_c_Id,Beam_No,Taar,Beam_Meter,Weight,quality_details.Quality_Name,R_Id from beam_dcorgmigrate,quality_details where quality_details.Quality_Id = beam_dcorgmigrate.Quality_Id AND Beam_D_C_Id = '$Beam_D_C_Id' ";
$rsSaree = mysql_query($query_rsSaree, $brijesh8510) or die(mysql_error());
$row_rsSaree = mysql_fetch_assoc($rsSaree);
$totalRows_rsSaree = mysql_num_rows($rsSaree);
}
?>
<script src="assets/js/googleapi.js">
</script>
<script>
$(document).ready(function(){
	 count = 0;
        count += $('#mybody').children('tr').length;
        $('#Total_Beam').val(count);
		function Count() {
		 count = 0;
        count += $('#mybody').children('tr').length;
        $('#Total_Beam').val(count);
		}
	<?php if($action=='insert')
{
	?>
    $('.btn-danger').click(function(){
       var del_id = $(this).attr('rel');
       $.post('beam_d_c_migratetabledelete.php?del=ins', {delete_id:del_id}, function(data) {
          if(data == 'true') {
		  $('#'+del_id).remove();
			alert("Deleted!");
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
       $.post('beam_d_c_migratetabledelete.php?del=upd', {delete_id:del_id}, function(data) {
          if(data == 'true') {
		  $('#'+del_id).remove();
			alert("Deleted!");
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
                                            <th>Beam No</th>
                                            <th>Taar</th>
                                            <th>Meter</th>
                                            <th>Weight</th>
                                            <th>Quality</th>
                                           <th>#ID</th>
                                            <th>Delete</th>
      </tr>
       </thead>
       <tbody id="mybody">
        <?php if($totalRows_rsSaree==0) {
		
	}
		else
		{
		
                                         $i=0;
									$i++;
									
                                        do { ?>
          <tr id="<?php echo $row_rsSaree['Be_D_C_Id']; ?>">
                                            <td width="10%"><?php echo $i++; ?></td>
                                            <td width="15%"><?php echo $row_rsSaree['Beam_No']; ?></td>
                                            <td width="10%"><?php echo $row_rsSaree['Taar']; ?></td>
                                            <td width="10%"><?php echo $row_rsSaree['Beam_Meter']; ?></td>
                                            <td class="rowDataSd1" width="10%"><?php echo $row_rsSaree['Weight']; ?></td>
                                            <td width="25%"><?php echo $row_rsSaree['Quality_Name']; ?></td>
                                           <td width="10%"><?php echo $row_rsSaree['R_Id']; ?></td>
                                            <td align="center"> 
                                             <button type="button" class="btn-danger" id="#del" rel="<?php echo $row_rsSaree['Be_D_C_Id']; ?>"><i class="icon-remove icon-white"></i></button>
                                              </td>
                                          </tr>
                                           <?php } while ($row_rsSaree = mysql_fetch_assoc($rsSaree));
		                                            }
		                                          ?>
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
                                            <th>Beam No</th>
                                            <th>Taar</th>
                                            <th>Meter</th>
                                            <th>Weight</th>
                                            <th>Quality</th>
                                           <th>#ID</th>
                                            <th>Delete</th>
      </tr>
       </thead>
       <tbody id="mybody">
        <?php if($totalRows_rsSaree==0) {
		
	}
		else
		{
		
                                         $i=0;
									$i++;
									
                                        do { ?>
          <tr id="<?php echo $row_rsSaree['Be_D_C_Id']; ?>">
                                            <td width="10%"><?php echo $i++; ?></td>
                                            <td width="15%"><?php echo $row_rsSaree['Beam_No']; ?></td>
                                            <td width="10%"><?php echo $row_rsSaree['Taar']; ?></td>
                                            <td width="10%"><?php echo $row_rsSaree['Beam_Meter']; ?></td>
                                            <td class="rowDataSd1" width="10%"><?php echo $row_rsSaree['Weight']; ?></td>
                                            <td width="25%"><?php echo $row_rsSaree['Quality_Name']; ?></td>
                                           <td width="10%"><?php echo $row_rsSaree['R_Id']; ?></td>
                                            <td align="center"> 
                                             <button type="button" class="btn-danger" id="#del" rel="<?php echo $row_rsSaree['Be_D_C_Id']; ?>"><i class="icon-remove icon-white"></i></button>
                                              </td>
                                          </tr>
                                           <?php } while ($row_rsSaree = mysql_fetch_assoc($rsSaree));
		                                            }
		                                          ?>
                                          </tbody>
                             </table>
<?php }
if($action=='insert')
{
mysql_free_result($rsSaree);
}
elseif($action=='update')
{
mysql_free_result($rsSaree);
}
?>