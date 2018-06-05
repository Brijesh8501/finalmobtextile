<?php session_start(); require_once('../Connections/brijesh8510.php'); 
 include("databaseconnect.php");
if(isset($_REQUEST['action']))
{ 
$Saree_D_C_Id = $_REQUEST['Saree_D_C_Id'];
$action = $_REQUEST['action'];
if(isset($_REQUEST['Add1']))
{
if(!isset($_SESSION['User']))
{ 
   $loginGoTo = "loginadmin.php?msg";
    echo '<script>window.location="'.$loginGoTo.'";</script>';
} 
if(isset($_SESSION['User']))
{
     $Saree_D_C_Id = $_REQUEST['Saree_D_C_Id'];  
	$Saree_Lot_Id = $_REQUEST['Saree_Lot_Id'];
	$Saree_Lot_Meter = $_REQUEST['Saree_Lot_Meter'];
	$Saree_Pieces = $_REQUEST['Saree_Pieces'];
	$Design_Id = $_REQUEST['Design_Id'];
	$Status = $_REQUEST['Status'];
	$R_Id = $_REQUEST['R_Id'];
	$Saree_Weight = $_REQUEST['Saree_Weight'];
	$Order_Id = $_REQUEST['Order_Id'];
	if($Saree_Lot_Id<=0 && $Saree_Lot_Meter=="" && $Saree_Pieces=="" && $Saree_Weight=="" && $Design_Id<=0)
	    {
		echo '<script>alert("Above all ( Lot meter,Lot weight, Saree piecess, Quality, Design, Status) are required....");</script>';
		}
	 elseif($Saree_Lot_Id<=0)
	    {
		echo '<script>alert("Lot id is required....");</script>';
		}
	 elseif($Saree_Lot_Meter=="")
	    {
		echo '<script>alert("Lot meter is required....");</script>';
		}
		elseif($Saree_Weight=="")
	    {
		echo '<script>alert("Lot weight is required....");</script>';
		}
	 elseif($Saree_Pieces=="")
	    {
		echo '<script>alert("Total piecess are required....");</script>';
		}
	elseif($Design_Id<=0)
	    {
		echo '<script>alert("Design is required....");</script>';
		}
		else
		{
		if($action=='insert')
             {
				 $query10 = mysql_query("select * from saree_d_c where Order_Id='".$Order_Id."' ") or die(mysql_error());
	$res_Fetch10 = mysql_fetch_array($query10);
	$duplicate10 = mysql_num_rows($query10);
	$res_order = $res_Fetch10['Saree_D_C_Id'];
   if($duplicate10==0)
    {	
	$query = mysql_query("select * from saree_d_c_2 where Saree_Lot_Id='".$Saree_Lot_Id."' AND Status = 'Sale'") or die(mysql_error());
	$res_Fetch = mysql_fetch_array($query);
	$duplicate = mysql_num_rows($query);
   if($duplicate==0)
    {	
	$query4 = mysql_query("select * from saree_dcorg where Saree_Lot_Id='".$Saree_Lot_Id."' AND Status = 'Sale'") or die(mysql_error());
	$res_Fetch4 = mysql_fetch_array($query4);
	$duplicate4 = mysql_num_rows($query4);
	$res_Saree_D_C_Id4 = $res_Fetch4['Saree_D_C_Id'];
   if($duplicate4==0)
    {	
	$sql= "INSERT INTO  `saree_d_c_2`(`Sa_D_C_Id` ,`Saree_D_C_Id` ,`Saree_Lot_Id` ,`Saree_Lot_Meter` ,`Saree_Weight` ,`Saree_Pieces` ,`Design_Id` ,`Status`,`R_Id`)VALUES (NULL , '$Saree_D_C_Id' ,  '$Saree_Lot_Id',  '$Saree_Lot_Meter', '$Saree_Weight',  '$Saree_Pieces', '$Design_Id',  '$Status',  '$R_Id')";
$result = mysql_query($sql);
	}
	else
	{
		echo "<center style='color:#F00;'>This lot id : ".$Saree_Lot_Id." allready exists in challan id : ".$res_Saree_D_C_Id4."</center>";
	}}else{
		echo "<center style='color:#F00;'>This lot id : ".$Saree_Lot_Id." allready exists in this challan</center>";
	}}else{
				 echo "<center style='color:#F00;'>This order id : ".$Order_Id." allready exists in this challan id : ".$res_order."</center>";
			 }}
else if($action=='update')
{
$query = mysql_query("select * from saree_dcorg where Saree_Lot_Id='".$Saree_Lot_Id."' ") or die(mysql_error());
	$res_Fetch = mysql_fetch_array($query);
	$duplicate = mysql_num_rows($query);
	$res_Saree_D_C_Id = $res_Fetch['Saree_D_C_Id'];
   if($duplicate==0)
    {	
	$sql= "INSERT INTO  `saree_dcorg` (`Sa_D_C_Id` ,`Saree_D_C_Id` ,`Saree_Lot_Id` ,`Saree_Lot_Meter` ,`Saree_Weight` ,`Saree_Pieces` ,`Design_Id` ,`Status`,`R_Id`)VALUES (NULL , '$Saree_D_C_Id' ,  '$Saree_Lot_Id',  '$Saree_Lot_Meter', '$Saree_Weight',  '$Saree_Pieces', '$Design_Id',  '$Status',  '$R_Id')";
$result = mysql_query($sql);
	}else{
		echo "<center style='color:#F00;'>This Lot ID : ".$Saree_Lot_Id." allready exists in challan id : ".$res_Saree_D_C_Id."</center>";
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
}}
if($action=='insert')
{
mysql_select_db($database_brijesh8510, $brijesh8510);
$query_rsSaree = "SELECT saree_d_c_2.Sa_D_C_Id, saree_d_c_2.Saree_D_C_Id, saree_d_c_2.Saree_Lot_Id, saree_d_c_2.Saree_Pieces,saree_d_c_2.Saree_Lot_Meter, saree_d_c_2.Saree_Weight, quality_details.Quality_Name, design_details.Design, saree_d_c_2.Status, saree_d_c_2.R_Id FROM saree_d_c_2, quality_details, design_details WHERE design_details.Quality_Id = quality_details.Quality_Id AND saree_d_c_2.Design_Id = design_details.Design_Id AND saree_d_c_2.Saree_D_C_Id='".$Saree_D_C_Id."' ";
$rsSaree = mysql_query($query_rsSaree, $brijesh8510) or die(mysql_error());
$row_rsSaree = mysql_fetch_assoc($rsSaree);
$totalRows_rsSaree = mysql_num_rows($rsSaree);
}
elseif($action=='update')
{
	mysql_select_db($database_brijesh8510, $brijesh8510);
$query_rsSaree = "SELECT saree_dcorg.Sa_D_C_Id, saree_dcorg.Saree_D_C_Id, saree_dcorg.Saree_Lot_Id, saree_dcorg.Saree_Pieces,saree_dcorg.Saree_Lot_Meter, saree_dcorg.Saree_Weight, quality_details.Quality_Name, design_details.Design, saree_dcorg.Status, saree_dcorg.R_Id FROM saree_dcorg, quality_details, design_details WHERE design_details.Quality_Id = quality_details.Quality_Id AND saree_dcorg.Design_Id = design_details.Design_Id AND saree_dcorg.Saree_D_C_Id='".$Saree_D_C_Id."' ";
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
        $('#Total_Lot').val(count);
		function Count() {
		 count = 0;
        count += $('#mybody').children('tr').length;
        $('#Total_Lot').val(count);
		}
	<?php if($action=='insert')
{
	?>
    $('.btn-danger').click(function(){
       var del_id = $(this).attr('rel');
       $.post('saree_d_c_tabledelete.php?del=ins', {delete_id:del_id}, function(data) {
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
       $.post('saree_d_c_tabledelete.php?del=upd', {delete_id:del_id}, function(data) {
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
                                            <th>Lot Id</th>
                                            <th>Lot Meter</th>
                                            <th>Lot Weight</th>
                                            <th>Lot Pieces</th>
                                            <th>Quality</th>
                                            <th>Design</th>
                                            <th>Status</th>
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
          <tr id="<?php echo $row_rsSaree['Sa_D_C_Id']; ?>">
                                            <td width="10%"><?php echo $i++; ?></td>
                                            <td width="15%"><?php echo $row_rsSaree['Saree_Lot_Id']; ?></td>
                                            <td width="10%"><?php echo $row_rsSaree['Saree_Lot_Meter']; ?></td>
                                            <td width="10%"><?php echo $row_rsSaree['Saree_Weight']; ?></td>
                                            <td class="rowDataSd1" width="10%"><?php echo $row_rsSaree['Saree_Pieces']; ?></td>
                                            <td width="25%"><?php echo $row_rsSaree['Quality_Name']; ?></td>
                                            <td width="20%"><?php echo $row_rsSaree['Design']; ?></td>
                                            <td width="10%"><?php echo $row_rsSaree['Status']; ?></td>
                                            <td width="10%"><?php echo $row_rsSaree['R_Id']; ?></td>
                                            <td align="center"> 
                                             <button type="button" class="btn-danger" id="#del" rel="<?php echo $row_rsSaree['Sa_D_C_Id']; ?>"><i class="icon-remove icon-white"></i></button>
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
                                            <th>Sub-Saree ID</th>
                                            <th>Lot Id</th>
                                            <th>Lot Meter</th>
                                            <th>Lot Weight</th>
                                            <th>Lot Pieces</th>
                                            <th>Quality</th>
                                            <th>Design</th>
                                            <th>Status</th>
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
          <tr id="<?php echo $row_rsSaree['Sa_D_C_Id']; ?>">
                                            <td width="7%"><?php echo $i++; ?></td>
                                            <td width="15%"><?php echo $row_rsSaree['Sa_D_C_Id']; ?></td>
                                            <td width="15%"><?php echo $row_rsSaree['Saree_Lot_Id']; ?></td>
                                            <td width="10%"><?php echo $row_rsSaree['Saree_Lot_Meter']; ?></td>
                                            <td width="10%"><?php echo $row_rsSaree['Saree_Weight']; ?></td>
                                            <td class="rowDataSd1" width="10%"><?php echo $row_rsSaree['Saree_Pieces']; ?></td>
                                            <td width="25%"><?php echo $row_rsSaree['Quality_Name']; ?></td>
                                            <td width="20%"><?php echo $row_rsSaree['Design']; ?></td>
                                            <td width="10%"><?php echo $row_rsSaree['Status']; ?></td>
                                            <td width="10%"><?php echo $row_rsSaree['R_Id']; ?></td>
                                            <td align="center"> 
                                             <button type="button" class="btn-danger" id="#del" rel="<?php echo $row_rsSaree['Sa_D_C_Id']; ?>"><i class="icon-remove icon-white"></i></button>
                                              </td>
                                          </tr>
                                           <?php } while ($row_rsSaree = mysql_fetch_assoc($rsSaree));
		                                            }
		                                          ?>
                                          </tbody>
                             </table>
<?php }
if($action=='insert')
{mysql_free_result($rsSaree);}
elseif($action=='update')
{mysql_free_result($rsSaree);}
?>