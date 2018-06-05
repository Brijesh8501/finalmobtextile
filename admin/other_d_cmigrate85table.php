<?php session_start(); require_once('../Connections/brijesh8510.php'); 
include("databaseconnect.php");
if(isset($_REQUEST['action']))
{ 
$Other_D_C_Id = $_REQUEST['Other_D_C_Id'];
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
     $Other_D_C_Id = $_REQUEST['Other_D_C_Id'];
	 $Mach_Part_Id = $_REQUEST['Mach_Part_Id'];  
	$Quantity = $_REQUEST['Quantity'];
	$R_Id = $_REQUEST['R_Id'];
	if($Mach_Part_Id=="")
	    {
		echo '<script>alert("Machine-Parts is required....");</script>';
		}
	elseif($Quantity=="")
	    {
		echo '<script>alert("Quantity is required....");</script>';
		}
	 	else
		{
		if($action=='insert')
             {
	$query = mysql_query("select * from other_sub_migrate where Mach_Part_Id='".$Mach_Part_Id."' AND Other_D_C_Id = '".$Other_D_C_Id."' ") or die(mysql_error());
	$res_Fetch = mysql_fetch_array($query);
	$duplicate = mysql_num_rows($query);
   if($duplicate==0)
    {	
	$sql= "INSERT INTO  `other_sub_migrate` (`Ot_D_C_Id` ,`Other_D_C_Id` ,`Mach_Part_Id` ,`Quantity` ,`R_Id`)VALUES (
NULL , '$Other_D_C_Id' , '$Mach_Part_Id', '$Quantity', '$R_Id')";
$result = mysql_query($sql);
	}
	else
	{
		echo "<center style='color:#F00;'>This machine-parts is allready exists in this challan</center>";
	}
	}
else if($action=='update')
{
$query = mysql_query("select * from other_sub_orgmigrate where Mach_Part_Id='".$Mach_Part_Id."' AND Other_D_C_Id = '".$Other_D_C_Id."' ") or die(mysql_error());
	$res_Fetch = mysql_fetch_array($query);
	$duplicate = mysql_num_rows($query);
   if($duplicate==0)
    {	
	$sql= "INSERT INTO  `other_sub_orgmigrate` (`Ot_D_C_Id` ,`Other_D_C_Id` ,`Mach_Part_Id` ,`Quantity` ,`R_Id`)
VALUES (NULL , '$Other_D_C_Id' , '$Mach_Part_Id', '$Quantity','$R_Id')";
$result = mysql_query($sql);
	}
	else
	{
		echo "<center style='color:#F00;'>This machine-parts is allready exists in this challan</center>";
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
$query_rsSaree = "select Ot_D_C_Id,Other_D_C_Id,machine_parts.Mach_Part_Id,machine_parts.Mach_Pname,Quantity,R_Id from other_sub_migrate,machine_parts where machine_parts.Mach_Part_Id = other_sub_migrate.Mach_Part_Id AND Other_D_C_Id = '$Other_D_C_Id' ";
$rsSaree = mysql_query($query_rsSaree, $brijesh8510) or die(mysql_error());
$row_rsSaree = mysql_fetch_assoc($rsSaree);
$totalRows_rsSaree = mysql_num_rows($rsSaree);
}
elseif($action=='update')
{
	mysql_select_db($database_brijesh8510, $brijesh8510);
$query_rsSaree = "select Ot_D_C_Id,Other_D_C_Id,machine_parts.Mach_Part_Id,machine_parts.Mach_Pname,Quantity,R_Id from other_sub_orgmigrate,machine_parts where machine_parts.Mach_Part_Id = other_sub_orgmigrate.Mach_Part_Id AND Other_D_C_Id = '$Other_D_C_Id'";
$rsSaree = mysql_query($query_rsSaree, $brijesh8510) or die(mysql_error());
$row_rsSaree = mysql_fetch_assoc($rsSaree);
$totalRows_rsSaree = mysql_num_rows($rsSaree);
}
?>
<script src="assets/js/googleapi.js">
</script>
<script>
$(document).ready(function(){
	count =0;
        count += $('#mybody').children('tr').length;
        $('#Total_Entry1').html(count);
		$('#Total_Entry').val(count);
	  function Count() {
	      count =0;
        count += $('#mybody').children('tr').length;
        $('#Total_Entry1').html(count);
		$('#Total_Entry').val(count);
	  }
	 var add1 = 0;
                $(".rowDataSd1").each(function() {
                    add1 += Number($(this).html());
                });
                $("#Total_Other").val(add1);
	function total() {
	     var add1 = 0;
                $(".rowDataSd1").each(function() {
                    add1 += Number($(this).html());
                });
                $("#Total_Other").val(add1);
	}
	<?php if($action=='insert')
{
	?>
    $('.btn-danger').click(function(){
       var del_id = $(this).attr('rel');
       $.post('other_d_c_migratetabledelete.php?del=ins', {delete_id:del_id}, function(data) {
          if(data == 'true') {
		  $('#'+del_id).remove();
			alert("Deleted!");
			Count();
			total();
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
       $.post('other_d_c_migratetabledelete.php?del=upd', {delete_id:del_id}, function(data) {
          if(data == 'true') {
		  $('#'+del_id).remove();
			alert("Deleted!");
			Count();
			total();
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
                                            <th>Machine-Parts</th>
                                            <th>Quantity</th>
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
          <tr id="<?php echo $row_rsSaree['Ot_D_C_Id']; ?>">
                                            <td width="10%"><?php echo $i++; ?></td>
                                            <td width="15%"><?php echo $row_rsSaree['Mach_Pname']; ?></td>
                                           <td class="rowDataSd1" width="10%"><?php echo $row_rsSaree['Quantity']; ?></td> 
                                           <td width="10%"><?php echo $row_rsSaree['R_Id']; ?></td>
                                            <td align="center" width="15%"> 
                                             <button type="button" class="btn-danger" id="#del" rel="<?php echo $row_rsSaree['Ot_D_C_Id']; ?>"><i class="icon-remove icon-white"></i></button>
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
                                            <th>Machine-Parts</th>
                                            <th>Quantity</th>
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
          <tr id="<?php echo $row_rsSaree['Ot_D_C_Id']; ?>">
                                            <td width="10%"><?php echo $i++; ?></td>
                                            <td width="15%"><?php echo $row_rsSaree['Mach_Pname']; ?></td>
                                           <td class="rowDataSd1" width="10%"><?php echo $row_rsSaree['Quantity']; ?></td> 
                                           <td width="10%"><?php echo $row_rsSaree['R_Id']; ?></td>
                                            <td align="center" width="15%"> 
                                             <button type="button" class="btn-danger" id="#del" rel="<?php echo $row_rsSaree['Ot_D_C_Id']; ?>"><i class="icon-remove icon-white"></i></button>
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
