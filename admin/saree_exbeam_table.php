<?php session_start(); require_once('../Connections/brijesh8510.php'); include("databaseconnect.php");
if(isset($_REQUEST['action']))
{ 
$Sa_Exbeam_Id = $_REQUEST['Sa_Exbeam_Id'];
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

     $Sa_Exbeam_Id = $_REQUEST['Sa_Exbeam_Id'];
	 $Sa_Pro_Id = $_REQUEST['Sa_Pro_Id'];  
	$Be_Ref_No = strtoupper($_REQUEST['Be_Ref_No']);
	$Fitted_Date = $_REQUEST['Fitted_Date'];
	$Be_Meter = $_REQUEST['Be_Meter'];
	$Be_Taar = $_REQUEST['Be_Taar'];
	$Be_Weight = $_REQUEST['Be_Weight'];
	$Quality_Id = $_REQUEST['quality'];
	$Sa_Beam_Noorg = $_REQUEST['Sa_Beam_No'];
	$Sa_Beam_No = str_replace(","," ",$Sa_Beam_Noorg);
	$R_Id = $_REQUEST['R_Id'];
	 if($Be_Ref_No=="" && $Fitted_Date=="" && $Be_Meter=="" && $Be_Taar<=0 && $Be_Weight=="" && $Quality_Id<=0 && $Sa_Beam_No=="")
	    {
		echo '<script>alert("Above all(Beam no, Taka, Meter, Quality, Weight, Status) details are required....");</script>';
		}	
	 elseif($Be_Ref_No=="")
	    {
		echo '<script>alert("Beam refernce no is required....");</script>';
		}
		elseif($Fitted_Date=="")
		{
			echo '<script>alert("Fitted date is required....");</script>';
		}
		elseif($Be_Meter=="")
		{
			echo '<script>alert("Meter is required....");</script>';
		}
		elseif($Be_Taar=="")
		{
			echo '<script>alert("Taar is required....");</script>';
		}
		elseif($Be_Weight=="")
		{
			echo '<script>alert("Weight is required....");</script>';
		}
		elseif($Sa_Beam_No=="")
		{
			echo '<script>alert("Beam no is required....");</script>';
		}
		elseif($Quality_Id<=0)
		{
			echo '<script>alert("Quality is required....");</script>';
		}
	    else
		{
			if($action=='insert')
             {
  $query = mysql_query("select * from saree_exbeam_detailorg where saree_exbeam_detailorg.Be_Ref_No = '".$Be_Ref_No."' ") or die(mysql_error());
  $query_fetch = mysql_fetch_array($query);
  $duplicate = mysql_num_rows($query);
  $query_fetch_id =  $query_fetch['Sa_Exbeam_Id'];
   if($duplicate==0)
    {
		 $query5 = mysql_query("select * from saree_exbeam_detail where saree_exbeam_detail.Be_Ref_No = '".$Be_Ref_No."' ") or die(mysql_error());
  $duplicate5 = mysql_num_rows($query5);
   if($duplicate5==0)
    {
	$sql= "INSERT INTO `saree_exbeam_detail` (`Sa_Ex_Id`, `Sa_Exbeam_Id`, `Be_Ref_No`, `Fitted_Date`, `Be_Meter`, `Be_Taar`, `Be_Weight`,`Sa_Beam_No`, `Quality_Id`, `Org_Be_Mg_Meter`, `Shortage`, `Shortageper`, `Remove_Date`, `R_Id`, `Sa_Pro_Id`) VALUES (NULL, '$Sa_Exbeam_Id', '$Be_Ref_No', '$Fitted_Date', '$Be_Meter', '$Be_Taar', '$Be_Weight','$Sa_Beam_No', '$Quality_Id', '0.00', '0.00', '0.00', '---', '$R_Id', '$Sa_Pro_Id');";
$result = mysql_query($sql);
	}
	else
	{
		echo '<center style="color:#F00;">'."This beam no&nbsp;: ".$Be_Ref_No."&nbsp;allready exists in this entry</center>";
	}
	}
	else
		{
	echo '<center style="color:#F00;">'."This beam no&nbsp;: ".$Be_Ref_No."&nbsp;allready exists in saree-extra-beam id : ".$query_fetch_id." you cannot re-enter this beam no</center>";
}
}
else if($action=='update')
{
	 $query = mysql_query("select * from saree_exbeam_detailorg where saree_exbeam_detailorg.Be_Ref_No = '".$Be_Ref_No."' ") or die(mysql_error());
   $query_fetch = mysql_fetch_array($query);
  $duplicate = mysql_num_rows($query);
  $query_fetch_id =  $query_fetch['Sa_Exbeam_Id'];
   if($duplicate==0)
    {
	$sql= "INSERT INTO `saree_exbeam_detailorg` (`Sa_Ex_Id`, `Sa_Exbeam_Id`, `Be_Ref_No`, `Fitted_Date`, `Be_Meter`, `Be_Taar`, `Be_Weight`, `Sa_Beam_No`, `Quality_Id`, `Org_Be_Mg_Meter`, `Shortage`, `Shortageper`, `Remove_Date`, `R_Id`, `Sa_Pro_Id`) VALUES (NULL, '$Sa_Exbeam_Id', '$Be_Ref_No', '$Fitted_Date', '$Be_Meter', '$Be_Taar', '$Be_Weight','$Sa_Beam_No', '$Quality_Id', '0.00', '0.00', '0.00', '---', '$R_Id', '$Sa_Pro_Id');";
$result = mysql_query($sql);
	}
	else
		{
	echo '<center style="color:#F00;">'."This beam no&nbsp;: ".$Be_Ref_No."&nbsp;allready exists in saree-extra-beam id : ".$query_fetch_id." you cannot re-enter this beam no</center>";
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
$query_rsBeam22 = "select Sa_Ex_Id,Sa_Exbeam_Id,Sa_Beam_No,Be_Ref_No,Fitted_Date,Be_Meter,Be_Taar,Be_Weight,quality_details.Quality_Name,Org_Be_Mg_Meter,Shortage,Shortageper,Remove_Date,R_Id from saree_exbeam_detail,quality_details where quality_details.Quality_Id = saree_exbeam_detail.Quality_Id AND Sa_Exbeam_Id ='".$Sa_Exbeam_Id."' order by Sa_Ex_Id asc";
$rsBeam22 = mysql_query($query_rsBeam22, $brijesh8510) or die(mysql_error());
$row_rsBeam22 = mysql_fetch_assoc($rsBeam22);
$totalRows_rsBeam22 = mysql_num_rows($rsBeam22);
}
elseif($action=='update')
{
	mysql_select_db($database_brijesh8510, $brijesh8510);
$sel_sub_query = "select Sa_Ex_Id,Sa_Exbeam_Id,Sa_Beam_No,Be_Ref_No,Fitted_Date,Be_Meter,Be_Taar,Be_Weight,quality_details.Quality_Name,Org_Be_Mg_Meter,Shortage,Shortageper,Remove_Date,R_Id from saree_exbeam_detailorg,quality_details where quality_details.Quality_Id = saree_exbeam_detailorg.Quality_Id AND Sa_Exbeam_Id ='".$Sa_Exbeam_Id."' order by Sa_Ex_Id asc";
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
        $('#Sa_Beam_Total').val(count);
function Count() {	 
    count = 0;
        count += $('#mybody').children('tr').length;
        $('#Sa_Beam_Total').val(count);
}
	 <?php if($action=='insert')
	 {
		 ?>
    $('.btn-danger').click(function(){
       var del_id = $(this).attr('rel');
       $.post('saree_exbeam_tabledelete.php?del=ins', {delete_id:del_id}, function(data) {
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
       $.post('saree_exbeam_tabledelete.php?del=upd', {delete_id:del_id}, function(data) {
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
                                            <th width="10%">Main-Beam No</th>
                                            <th width="10%">Beam-Ref. No</th>
                                            <th width="10%">Fitted Date</th>
                                            <th width="10%">Meter</th>
                                             <th width="7%">Taar</th>
                                            <th width="7%">Weight</th>
                                            <th width="20%">Quality</th>
                                            <th width="10%">Produced Meter</th>
                                           <th width="20%">Shortage Mtr (%)</th>
                                            <th width="15%">Remove Date</th>
                                            <th width="10%">#ID</th>
                                            <th width="10%">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody id="mybody">
                                    <?php $i=0;
	  $i++;
       if($totalRows_rsBeam22==0)
	  {}
		  else
		  {
                                     do { ?>
  <tr id="<?php echo $row_rsBeam22['Sa_Ex_Id']; ?>" class="tableRow">
    <td><?php echo $i++; ?></td>
    <td><?php echo $row_rsBeam22['Sa_Beam_No']; ?></td>
    <td><?php echo $row_rsBeam22['Be_Ref_No']; ?></td>
    <td><?php echo $row_rsBeam22['Fitted_Date']; ?></td>
    <td><?php echo $row_rsBeam22['Be_Meter']; ?></td>
    <td><?php echo $row_rsBeam22['Be_Taar']; ?></td>
    <td><?php echo $row_rsBeam22['Be_Weight']; ?></td>
    <td><?php echo $row_rsBeam22['Quality_Name']; ?></td>
    <td><?php echo $row_rsBeam22['Org_Be_Mg_Meter']; ?></td>
  <td><?php echo $row_rsBeam22['Shortage']; ?>&nbsp;(<?php echo $row_rsBeam22['Shortageper']; ?>%)</td>
    <td><?php echo $row_rsBeam22['Remove_Date']; ?></td>
     <td><?php echo $row_rsBeam22['R_Id']; ?></td>
    <td align="center">
     <button type="button" class="btn-danger" id="#del" rel="<?php echo $row_rsBeam22['Sa_Ex_Id']; ?>"><i class="icon-remove icon-white"></i></button>
     </td>
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
                                            <th width="15%">Sub-Beam-Extra ID</th>
                                            <th width="10%">Main-Beam No</th>
                                           <th width="10%">Beam-Ref. No</th>
                                            <th width="10%">Fitted Date</th>
                                            <th width="10%">Meter</th>
                                             <th width="7%">Taar</th>
                                            <th width="7%">Weight</th>
                                            <th width="20%">Quality</th>
                                            <th width="10%">Produced Meter</th>
                                           <th width="20%">Shortage Mtr (%)</th>
                                            <th width="15%">Remove Date</th>
                                            <th width="10%">#ID</th>
                                            <th width="10%">Delete</th>
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
  <tr id="<?php echo $sel_sub_fetch['Sa_Ex_Id']; ?>" class="tableRow">
    <td><?php echo $i++; ?></td>
    <td><?php echo $sel_sub_fetch['Sa_Ex_Id']; ?></td>
    <td><?php echo $sel_sub_fetch['Sa_Beam_No']; ?></td>
    <td><?php echo $sel_sub_fetch['Be_Ref_No']; ?></td>
    <td><?php echo $sel_sub_fetch['Fitted_Date']; ?></td>
    <td><?php echo $sel_sub_fetch['Be_Meter']; ?></td>
    <td><?php echo $sel_sub_fetch['Be_Taar']; ?></td>
    <td><?php echo $sel_sub_fetch['Be_Weight']; ?></td>
    <td><?php echo $sel_sub_fetch['Quality_Name']; ?></td>
    <td><?php echo $sel_sub_fetch['Org_Be_Mg_Meter']; ?></td>
    <td><?php echo $sel_sub_fetch['Shortage']; ?>&nbsp;(<?php echo $sel_sub_fetch['Shortageper']; ?>%)</td>
    <td><?php echo $sel_sub_fetch['Remove_Date']; ?></td>
     <td><?php echo $sel_sub_fetch['R_Id']; ?></td>
    <td align="center">
     <button type="button" class="btn-danger" id="#del" rel="<?php echo $sel_sub_fetch['Sa_Ex_Id']; ?>"><i class="icon-remove icon-white"></i></button>
     </td>
  </tr>
  <?php } while ($sel_sub_fetch = mysql_fetch_assoc($sel_sub_exe)); 
   } ?>
                                    </tbody>
                                </table>
    <?php
}
							   if($action=='insert')
							   {mysql_free_result($rsBeam22);}
							    elseif($action=='update')
							   {mysql_free_result($sel_sub_exe);}
?>
