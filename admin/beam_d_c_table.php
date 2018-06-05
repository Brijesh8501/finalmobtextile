<?php session_start(); require_once('../Connections/brijesh8510.php'); 
 include("databaseconnect.php");
if(isset($_REQUEST['action']))
{ 
$t500 = $_REQUEST['challanid'];
$action = $_REQUEST['action'];
if(isset($_REQUEST['Add1BeamDC']))
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
	$beamnoorg = $_REQUEST['beamno'];
	$t1 = str_replace(","," ",$beamnoorg);
	$t2 = $_REQUEST['taar'];
	$t3 = $_REQUEST['meter'];
	$t4 = $_REQUEST['quality'];
	$t5 = $_REQUEST['weight'];
	$Status = $_REQUEST['Status'];
	$R_Id = $_REQUEST['R_Id'];
	 if($t1=="" && $t2=="" && $t3=="" && $t4<=0 && $t5=="")
	    {
		echo '<script>alert("Above all(Beam no, Taka, Meter, Quality, Weight, Status) details are required....");</script>';
		}	
	 elseif($t1=="")
	    {
		echo '<script>alert("Beam no is required....");</script>';
		}
		elseif($t2=="")
		{
			echo '<script>alert("Taar is required....");</script>';
		}
		elseif($t3=="")
		{
			echo '<script>alert("Meter is required....");</script>';
		}
		elseif($t5=="")
		{
			echo '<script>alert("Weight is required....");</script>';
		}
		elseif($t4<=0)
		{
			echo '<script>alert("Quality is required....");</script>';
		}
	    else
		{
			if($action=='insert')
             {
  $query = mysql_query("select * from beam_dcorg where beam_dcorg.Beam_No = '".$t1."' ") or die(mysql_error());
  $query_fetch = mysql_fetch_array($query);
  $duplicate = mysql_num_rows($query);
  $query_fetch_id =  $query_fetch['Beam_D_C_Id'];
   if($duplicate==0)
    {
		 $query5 = mysql_query("select * from beam_d_c_2 where beam_d_c_2.Beam_No = '".$t1."' ") or die(mysql_error());
  $duplicate5 = mysql_num_rows($query5);
   if($duplicate5==0)
    {
	$sql= "INSERT INTO  `beam_d_c_2` (`Be_D_C_Id` ,`Beam_D_C_Id` ,`Beam_No` ,`Taar` ,`Beam_Meter` ,`Weight` ,`Quality_Id` ,`Status` ,`R_Id`)VALUES (NULL , '$t0' ,  '$t1',  '$t2',  '$t3',  '$t5',  '$t4', '$Status', '$R_Id')";
$result = mysql_query($sql);
	}
	else
	{
		echo '<center style="color:#F00;">'."This beam no&nbsp;: ".$t1."&nbsp;allready exists in this challan</center>";
	}
	}
	else
		{
	echo '<center style="color:#F00;">'."This beam no&nbsp;: ".$t1."&nbsp;allready exists in challan id : ".$query_fetch_id." you cannot re-enter this beam no</center>";
}
}
else if($action=='update')
{
	 $query = mysql_query("select * from beam_dcorg where beam_dcorg.Beam_No = '".$t1."' ") or die(mysql_error());
   $query_fetch = mysql_fetch_array($query);
  $duplicate = mysql_num_rows($query);
  $query_fetch_id =  $query_fetch['Beam_D_C_Id'];
   if($duplicate==0)
    {
	$sql= "INSERT INTO  `beam_dcorg` (`Be_D_C_Id` ,`Beam_D_C_Id` ,`Beam_No` ,`Taar` ,`Beam_Meter` ,`Weight` ,`Quality_Id` ,`Status` ,`R_Id`)VALUES (NULL , '$t0' ,  '$t1',  '$t2',  '$t3',  '$t5',  '$t4', '$Status', '$R_Id')";
$result = mysql_query($sql);
	}
	else
		{
	echo '<center style="color:#F00;">'."This beam no&nbsp;: ".$t1."&nbsp;allready exists in challan id : ".$query_fetch_id." you cannot re-enter this beam no</center>";
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
$query_rsBeam22 = "SELECT beam_d_c_2.Be_D_C_Id, beam_d_c_2.Beam_D_C_Id, beam_d_c_2.Beam_No, beam_d_c_2.Taar, beam_d_c_2.Beam_Meter,beam_d_c_2.Weight, quality_details.Quality_Name , beam_d_c_2.Status, beam_d_c_2.R_Id FROM beam_d_c_2, quality_details WHERE beam_d_c_2.Quality_Id = quality_details.Quality_Id AND beam_d_c_2.Beam_D_C_Id ='".$t500."' order by beam_d_c_2.Be_D_C_Id asc";
$rsBeam22 = mysql_query($query_rsBeam22, $brijesh8510) or die(mysql_error());
$row_rsBeam22 = mysql_fetch_assoc($rsBeam22);
$totalRows_rsBeam22 = mysql_num_rows($rsBeam22);
}
elseif($action=='update')
{
	mysql_select_db($database_brijesh8510, $brijesh8510);
	$sel_sub_query = "select beam_dcorg.Be_D_C_Id,beam_dcorg.Beam_D_C_Id, beam_dcorg.Beam_No, beam_dcorg.Taar, beam_dcorg.Beam_Meter,beam_dcorg.Weight, quality_details.Quality_Name , beam_dcorg.Status, beam_dcorg.R_Id FROM beam_dcorg, quality_details WHERE beam_dcorg.Quality_Id = quality_details.Quality_Id AND beam_dcorg.Beam_D_C_Id ='".$t500."' order by beam_dcorg.Be_D_C_Id asc";
	$sel_sub_exe = mysql_query($sel_sub_query, $brijesh8510) or die(mysql_error());
$sel_sub_fetch = mysql_fetch_assoc($sel_sub_exe);
$totalRows_sel_sub_fetch = mysql_num_rows($sel_sub_exe);
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
       $.post('beam_d_c_tabledelete.php?del=ins', {delete_id:del_id}, function(data) {
          if(data == 'true') {
		  $('#'+del_id).remove();
			alert("Deleted!");
            Count();
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
       $.post('beam_d_c_tabledelete.php?del=upd', {delete_id:del_id}, function(data) {
	      if(data == 'true') {
		  $('#'+del_id).remove();
			alert("Deleted!");
			Count();
          } else {
             alert('Could not delete!');
			 window.location="loginadmin.php?msg";
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
<table class="table table-striped table-bordered table-hover" valign="center" >
                                    <thead>
                                        <tr>
                                            <th>Sr.No</th>
                                            <th>Beam No</th>
                                            <th>Taar</th>
                                            <th>Meter</th>
                                            <th>Weight</th>
                                            <th>Quality</th>
                                            <th>Status</th>
                                            <th>#ID</th>
                                          <?php if(isset($_SESSION['User']))
	{
		$admin = $_SESSION['User'];
	   $sqlsub = "SELECT registration_details.Name FROM registration_details WHERE registration_details.Username='".$admin."' ";
		$resultsub = mysql_query($sqlsub);
		$row_resultsub = mysql_fetch_array($resultsub);
		if($row_resultsub['Name']=="MICKY AHIR") {
	?>
                                            <th>Delete</th>
                                            <?php  }} ?>
                                        </tr>
                                    </thead>
                                    <tbody id="mybody">
                                    <?php $i=0;
	  $i++;
       if($totalRows_rsBeam22==0)
	  {
	  }
		  else
		  {
		  
                                     do { ?>
  <tr id="<?php echo $row_rsBeam22['Be_D_C_Id']; ?>" class="tableRow">
    <td><?php echo $i++; ?></td>
    <td><?php echo $row_rsBeam22['Beam_No']; ?></td>
    <td><?php echo $row_rsBeam22['Taar']; ?></td>
    <td><?php echo $row_rsBeam22['Beam_Meter']; ?></td>
    <td><?php echo $row_rsBeam22['Weight']; ?></td>
    <td><?php echo $row_rsBeam22['Quality_Name']; ?></td>
    <td><?php echo $row_rsBeam22['Status']; ?></td>
     <td><?php echo $row_rsBeam22['R_Id']; ?></td>
     <?php if(isset($_SESSION['User']))
	{
		$admin = $_SESSION['User'];
	   $sqlsub = "SELECT registration_details.Name FROM registration_details WHERE registration_details.Username='".$admin."' ";
		$resultsub = mysql_query($sqlsub);
		$row_resultsub = mysql_fetch_array($resultsub);
		if($row_resultsub['Name']=="MICKY AHIR") {
	?>
    <td align="center">
     <button type="button" class="btn-danger" rel="<?php echo $row_rsBeam22['Be_D_C_Id']; ?>"></button>
     </td><?php } } ?>
  </tr>
  <?php } while ($row_rsBeam22 = mysql_fetch_assoc($rsBeam22)); 
   } ?>
                                    </tbody>
                                </table>
<?php
}
elseif($action=='update')
{
	?>
    <table class="table table-striped table-bordered table-hover" valign="center" >
                                    <thead>
                                        <tr>
                                            <th>Sr.No</th>
                                            <th>Sub-Beam ID</th>
                                            <th>Beam No</th>
                                            <th>Taar</th>
                                            <th>Meter</th>
                                            <th>Weight</th>
                                            <th>Quality</th>
                                            <th>Status</th>
                                            <th>#ID</th>
                                             <?php if(isset($_SESSION['User']))
	{
		$admin = $_SESSION['User'];
	   $sqlsub = "SELECT registration_details.Name FROM registration_details WHERE registration_details.Username='".$admin."' ";
		$resultsub = mysql_query($sqlsub);
		$row_resultsub = mysql_fetch_array($resultsub);
		if($row_resultsub['Name']=="MICKY AHIR") {
	?>
                                            <th>Delete</th><?php } } ?>
                                        </tr>
                                    </thead>
                                    <tbody id="mybody">
                                    <?php $i=0;
	  $i++;
       if($totalRows_sel_sub_fetch==0)
	  {
	  }
		  else
		  {
		  
                                     do { ?>
  <tr id="<?php echo $sel_sub_fetch['Be_D_C_Id']; ?>" class="tableRow">
    <td><?php echo $i++; ?></td>
    <td><?php echo $sel_sub_fetch['Be_D_C_Id']; ?></td>
    <td><?php echo $sel_sub_fetch['Beam_No']; ?></td>
    <td><?php echo $sel_sub_fetch['Taar']; ?></td>
    <td><?php echo $sel_sub_fetch['Beam_Meter']; ?></td>
    <td><?php echo $sel_sub_fetch['Weight']; ?></td>
    <td><?php echo $sel_sub_fetch['Quality_Name']; ?></td>
    <td><?php echo $sel_sub_fetch['Status']; ?></td>
     <td><?php echo $sel_sub_fetch['R_Id']; ?></td>
      <?php if(isset($_SESSION['User']))
	{
		$admin = $_SESSION['User'];
	   $sqlsub = "SELECT registration_details.Name FROM registration_details WHERE registration_details.Username='".$admin."' ";
		$resultsub = mysql_query($sqlsub);
		$row_resultsub = mysql_fetch_array($resultsub);
		if($row_resultsub['Name']=="MICKY AHIR") {
	?>
    <td align="center">
     <button type="button" class="btn-danger" rel="<?php echo $sel_sub_fetch['Be_D_C_Id']; ?>"></button>
     </td><?php } } ?>
  </tr>
  <?php } while ($sel_sub_fetch = mysql_fetch_assoc($sel_sub_exe)); 
   } ?>
                                    </tbody>
                                </table>
    <?php
}

							   if($action=='insert')
							   {
mysql_free_result($rsBeam22);
							   }
							    elseif($action=='update')
							   {
mysql_free_result($sel_sub_exe);
							   }
?>
