<?php session_start(); require_once('../Connections/brijesh8510.php');
include("databaseconnect.php");
if(isset($_REQUEST['action']))
{ 	 
$t500 = $_REQUEST['challanid'];
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
     $t0 = $_REQUEST['challanid'];  
	$t1 = $_REQUEST['totalcartoon'];
	$t2 = $_REQUEST['totalweight'];
	$t3 = $_REQUEST['quality'];
	$Status = $_REQUEST['Status'];
	$R_Id = $_REQUEST['R_Id'];
	if($t1=="" && $t2=="" && $t3<=0)
	    {
		echo '<script>alert("Above all(Cartoon, Weight, Quality, Status) details are required....");</script>';
		}	
	 elseif($t1=="")
	    {
		echo '<script>alert("cartoon is required....");</script>';
		}
		elseif($t2=="")
		{
			echo '<script>alert("Weight is required....");</script>';
		}
		elseif($t3<=0)
		{
			echo '<script>alert("Quality is required....");</script>';
		}
		else
		{
			if($action=='insert')
             {
	$query = mysql_query("select * from boobin_d_c_2 where boobin_d_c_2.Quality_Id = '".$t3."' AND boobin_d_c_2.Bo_D_C_Id = '".$t0."' ") or die(mysql_error());
$duplicate = mysql_num_rows($query);
   if($duplicate==0)
    {
	$sql= "INSERT INTO  `boobin_d_c_2` (`Bobbin_D_C_Id` ,`Bo_D_C_Id` ,`Total_Cartoon` ,`Total_Weight` ,`Quality_Id` ,`Status` ,`R_Id`)VALUES (NULL , '$t0' ,  '$t1',  '$t2',  '$t3', '$Status', '$R_Id')";
$result = mysql_query($sql);
}
	else
		{
	echo '<center style="color:#F00;">'."This Quality allready exists you cannot re-enter this Quality in Challan id&nbsp;: ".$t0."</center>";
}
}
else if($action=='update')
{
	$query = mysql_query("select * from boobin_dcorg where boobin_dcorg.Quality_Id = '".$t3."' AND boobin_dcorg.Bo_D_C_Id = '".$t0."' ") or die(mysql_error());
$duplicate = mysql_num_rows($query);
   if($duplicate==0)
    {
	$sql= "INSERT INTO  `boobin_dcorg` (`Bobbin_D_C_Id` ,`Bo_D_C_Id` ,`Total_Cartoon` ,`Total_Weight` ,`Quality_Id` ,`Status` ,`R_Id`)VALUES (NULL , '$t0' ,  '$t1',  '$t2',  '$t3', '$Status', '$R_Id')";
$result = mysql_query($sql);
}
	else
		{
	echo '<center style="color:#F00;">'."This Quality allready exists you cannot re-enter this Quality in Challan id&nbsp;: ".$t0."</center>";
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
$query_rsBobbin2 = "SELECT boobin_d_c_2.Bobbin_D_C_Id, boobin_d_c_2.Bo_D_C_Id, boobin_d_c_2.Total_Cartoon, boobin_d_c_2.Total_Weight, quality_details.Quality_Name, boobin_d_c_2.Status, boobin_d_c_2.R_Id FROM boobin_d_c_2, quality_details WHERE boobin_d_c_2.Quality_Id = quality_details.Quality_Id AND boobin_d_c_2.Bo_D_C_Id = '".$t500."' order by boobin_d_c_2.Bobbin_D_C_Id asc";
$rsBobbin2 = mysql_query($query_rsBobbin2, $brijesh8510) or die(mysql_error());
$row_rsBobbin2 = mysql_fetch_assoc($rsBobbin2);
$totalRows_rsBobbin2 = mysql_num_rows($rsBobbin2);
}
elseif($action=='update')
{
	mysql_select_db($database_brijesh8510, $brijesh8510);
$query_rsBobbin2 = "SELECT boobin_dcorg.Bobbin_D_C_Id, boobin_dcorg.Bo_D_C_Id, boobin_dcorg.Total_Cartoon, boobin_dcorg.Total_Weight, quality_details.Quality_Name, boobin_dcorg.Status, boobin_dcorg.R_Id FROM boobin_dcorg, quality_details WHERE boobin_dcorg.Quality_Id = quality_details.Quality_Id AND boobin_dcorg.Bo_D_C_Id = '".$t500."' order by boobin_dcorg.Bobbin_D_C_Id asc";
$rsBobbin2 = mysql_query($query_rsBobbin2, $brijesh8510) or die(mysql_error());
$row_rsBobbin2 = mysql_fetch_assoc($rsBobbin2);
$totalRows_rsBobbin2 = mysql_num_rows($rsBobbin2);
}
?>
<script src="assets/js/googleapi.js">
</script>
<script>
$(document).ready(function(){
	 var add1 = 0;
                $(".rowDataSd1").each(function() {
                    add1 += Number($(this).html());
                });
                $("#cartoon").val(add1);
	function total() {
	     var add1 = 0;
                $(".rowDataSd1").each(function() {
                    add1 += Number($(this).html());
                });
                $("#cartoon").val(add1);
	}
	 <?php if($action=='insert')
	 {
		 ?>
    $('.btn-danger').click(function(){
       var del_id = $(this).attr('rel');
       $.post('bobbin_d_ctabledelete.php?del=ins', {delete_id:del_id}, function(data) {
          if(data == 'true') {
            $('#'+del_id).remove();
			alert('Deleted');
			total();
          } else {
            alert('Could not delete!');
			window.location="loginadmin.php?msg";
          }
       });
    });
	<?php 
	 }
	else if($action=='update')
	{
		?>
		 $('.btn-danger').click(function(){
       var del_id = $(this).attr('rel');
       $.post('bobbin_d_ctabledelete.php?del=upd', {delete_id:del_id}, function(data) {
          if(data == 'true') {
            $('#'+del_id).remove();
			alert('Deleted');
			total();
          } else {
            alert('Could not delete!');
			window.location="loginadmin.php?msg";
          }
       });
    });
	<?php
	}
	?>
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
<table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Sr.No</th>
                                            <th>Cartoons / Bags / Cases</th>
                                            <th>Total Weight</th>
                                           <th>Quality</th>
                                            <th>Status</th>
                                            <th>#ID</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody id="mybody">
                                    <?php $i=0;
									$i++;
									 if($totalRows_rsBobbin2==0) { 
	}
	else
	{
                                         do { ?>
                                        <tr id="<?php echo $row_rsBobbin2['Bobbin_D_C_Id']; ?>">
                                            <td><?php echo $i++; ?></td>
                                            <td  class="rowDataSd1"><?php echo $row_rsBobbin2['Total_Cartoon']; ?></td>
                                            <td><?php echo $row_rsBobbin2['Total_Weight']; ?></td>
                                            <td><?php echo $row_rsBobbin2['Quality_Name']; ?></td>
                                            <td><?php echo $row_rsBobbin2['Status']; ?></td>
                                            <td><?php echo $row_rsBobbin2['R_Id']; ?></td>
                                            <td align="center"> 
                                              <button type="button" class="btn-danger" id="#del" rel="<?php echo $row_rsBobbin2['Bobbin_D_C_Id']; ?>"><i class="icon-remove icon-white"></i></button>
                                            </td>
                                          </tr>
                                          <?php } while ($row_rsBobbin2 = mysql_fetch_assoc($rsBobbin2)); 
                                           } ?>
                                    </tbody>
                                </table>
 <?php
}
elseif($action=='update')
{
	?> 
	<table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Sr.No</th>
                                            <th>Sub-Bobbin ID</th>
                                            <th>Cartoons / Bags / Cases</th>
                                            <th>Total Weight</th>
                                           <th>Quality</th>
                                            <th>Status</th>
                                            <th>#ID</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody id="mybody">
                                    <?php $i=0;
									$i++;
									 if($totalRows_rsBobbin2==0) { 
	}
	else
	{
                                         do { ?>
                                        <tr id="<?php echo $row_rsBobbin2['Bobbin_D_C_Id']; ?>">
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $row_rsBobbin2['Bobbin_D_C_Id']; ?></td>
                                            <td  class="rowDataSd1"><?php echo $row_rsBobbin2['Total_Cartoon']; ?></td>
                                            <td><?php echo $row_rsBobbin2['Total_Weight']; ?></td>
                                            <td><?php echo $row_rsBobbin2['Quality_Name']; ?></td>
                                            <td><?php echo $row_rsBobbin2['Status']; ?></td>
                                            <td><?php echo $row_rsBobbin2['R_Id']; ?></td>
                                            <td align="center"> 
                                              <button type="button" class="btn-danger" id="#del1" rel="<?php echo $row_rsBobbin2['Bobbin_D_C_Id']; ?>"><i class="icon-remove icon-white"></i></button>
                                            </td>
                                          </tr>
                                          <?php } while ($row_rsBobbin2 = mysql_fetch_assoc($rsBobbin2)); 
                                           } ?>
                                    </tbody>
                                </table>
	<?php
}
							   if($action=='insert')
							   {
mysql_free_result($rsBobbin2); 
							   }
                             elseif($action=='update')
							   {
mysql_free_result($rsBobbin2);
							   }
							   ?>
