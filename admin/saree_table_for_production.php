<?php session_start(); require_once('../Connections/brijesh8510.php');  
include("databaseconnect.php");
if(isset($_REQUEST['action']))
{ 
$Sa_Pro_Id = $_REQUEST['Sa_Pro_Id'];
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
     $Sa_Pro_Id = $_REQUEST['Sa_Pro_Id'];  
	$Saree_Lot_Meter = $_REQUEST['Saree_Lot_Meter'];
	$Date = $_REQUEST['Date'];
	$Saree_Pieces = $_REQUEST['Saree_Pieces'];
	$Saree_Weight = $_REQUEST['Saree_Weight'];
	$design_id = $_REQUEST['design_id'];
	$Status = $_REQUEST['Status'];
	$Description = $_REQUEST['textarea1'];
	$description_replace = str_replace(","," ",$Description);
	$Be_M_Id = $_REQUEST['Be_M_Id'];
	$R_Id = $_REQUEST['R_Id'];
	if($Saree_Lot_Meter=="" && $Saree_Weight=="" && $Saree_Pieces=="" && $design_id<=0 && $description_replace=="")
	    {
		echo '<script>alert("Above all ( Lot meter, Lot weight, Saree piecess, Quality, Design, Status, Desciption ) are required....");</script>';
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
     elseif($design_id<=0)
	    {
		echo '<script>alert("Design is required....");</script>';
		}
	elseif($description_replace=="")
		{
		echo '<script>alert("Description is required....");</script>';
		}
		else
		{
		if($action=='insert')
             {
    $query = mysql_query("select * from taka_production where Be_M_Id='".$Be_M_Id."' ") or die(mysql_error());
	$res_fetch = mysql_fetch_array($query);
$duplicate = mysql_num_rows($query);
$Ta_Pro_Id = $res_fetch['Ta_Pro_Id'];
   if($duplicate==0)
    {//////////////////////////////////////////////////////////////////////////////////////////////////
	 $query85 = mysql_query("select * from saree_production where Be_M_Id='".$Be_M_Id."' ") or die(mysql_error());
	$res_fetch85 = mysql_fetch_array($query85);
$duplicate85 = mysql_num_rows($query85);
$Sa_Pro_Id85 = $res_fetch85['Sa_Pro_Id'];
   if($duplicate85==0)
    {
	$query1 = mysql_query("select * from beam_machine where Be_M_Id='".$Be_M_Id."' AND Status = 'Fitted' ") or die(mysql_error());
$duplicate1 = mysql_num_rows($query1);
   if($duplicate1==0)
    {
	   echo "<center style='color:#F00;'>You cannot enter data as beam is allready remove from machine....please check the status in <i>' beam-machine'</i></center>";
     }
	 else
	 {
		 $sql= "INSERT INTO  `saree_details` (`Saree_Lot_Id` ,`Sa_Pro_Id` ,`Date` ,`Saree_Lot_Meter` ,`Saree_Pieces` ,
`Saree_Weight` ,`Design_Id` ,`Status` ,`Description` ,`R_Id`)VALUES (NULL , '$Sa_Pro_Id', '$Date', '$Saree_Lot_Meter', '$Saree_Pieces', '$Saree_Weight', '$design_id' ,  '$Status',  '$description_replace', '$R_Id')";
$result = mysql_query($sql);
	}
	}
	else
	{
		echo "<center style='color:#F00;'>This beam-machine id : $Be_M_Id is allready exists in saree-production id : $Sa_Pro_Id85 so you cannot re-enter this beam-machine id : $Be_M_Id in <i>'&nbsp;Saree production&nbsp;'</i></center>";
	}
		}
	  else
    {
      echo "<center style='color:#F00;'>This beam-machine id : $Be_M_Id is allready exists in taka-production id : $Ta_Pro_Id so you cannot re-enter this beam-machine id : $Be_M_Id in <i>'&nbsp;Saree production&nbsp;'</i></center>";
    }
			 }
		elseif($action=='update')
             {
				 $query1 = mysql_query("select * from beam_machine where Be_M_Id='".$Be_M_Id."' AND Status = 'Fitted' ") or die(mysql_error());
$duplicate1 = mysql_num_rows($query1);
   if($duplicate1==0)
    {
	   echo "<center style='color:#F00;'>You cannot enter data as beam is allready remove from machine....please check the status in <i>' beam-machine'</i></center>";
     }
	 else
	 {
		 $sql= "INSERT INTO  `saree_detailsorg` (`Saree_Lot_Id` ,`Sa_Pro_Id` ,`Date` ,`Saree_Lot_Meter` ,`Saree_Pieces` ,`Saree_Weight` ,`Design_Id` ,`Status` ,`Description` ,`R_Id`)VALUES (NULL , '$Sa_Pro_Id', '$Date', '$Saree_Lot_Meter', '$Saree_Pieces', '$Saree_Weight', '$design_id' ,  '$Status',  '$description_replace', '$R_Id')";
$result = mysql_query($sql);
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
$query_rsSareees = "SELECT saree_details.Saree_Lot_Id, saree_details.Sa_Pro_Id, saree_details.Date, saree_details.Saree_Lot_Meter, saree_details.Saree_Pieces, saree_details.Saree_Weight, quality_details.Quality_Name, design_details.Design, saree_details.Status, saree_details.`Description`, saree_details.`R_Id` FROM saree_details, quality_details, design_details WHERE design_details.Quality_Id = quality_details.Quality_Id AND saree_details.Design_Id = design_details.Design_Id AND saree_details.Sa_Pro_Id = '".$Sa_Pro_Id."' ";
$rsSareees = mysql_query($query_rsSareees, $brijesh8510) or die(mysql_error());
$row_rsSareees = mysql_fetch_assoc($rsSareees);
$totalRows_rsSareees = mysql_num_rows($rsSareees);
			 }
			 elseif($action=='update')
             {
mysql_select_db($database_brijesh8510, $brijesh8510);
$query_rsSareees = "SELECT saree_detailsorg.Saree_Lot_Id, saree_detailsorg.Sa_Pro_Id, saree_detailsorg.Date, saree_detailsorg.Saree_Lot_Meter, saree_detailsorg.Saree_Pieces, saree_detailsorg.Saree_Weight, quality_details.Quality_Name, design_details.Design, saree_detailsorg.Status, saree_detailsorg.`Description`, saree_detailsorg.`R_Id` FROM saree_detailsorg, quality_details, design_details WHERE design_details.Quality_Id = quality_details.Quality_Id AND saree_detailsorg.Design_Id = design_details.Design_Id AND saree_detailsorg.Sa_Pro_Id = '".$Sa_Pro_Id."' ";
$rsSareees = mysql_query($query_rsSareees, $brijesh8510) or die(mysql_error());
$row_rsSareees = mysql_fetch_assoc($rsSareees);
$totalRows_rsSareees = mysql_num_rows($rsSareees);
			 }
?>
<script src="assets/js/googleapi.js">
</script>
<script>
$(document).ready(function(){
	 var totalp = 0;
                $(".rowDataSd").each(function() {
                    totalp += Number($(this).html());
                });
                $("#Total_Piecess").val(totalp);
		function totalpiecess() {
				 var add1 = 0;
                $(".rowDataSd").each(function() {
                    add1 += Number($(this).html());
                });
                $("#Total_Piecess").val(add1);
		}
  var addmeter = 0;
                $(".rowDataSd1").each(function() {
                    addmeter += Number($(this).html());
                });
                $("#Total_Meter").val(addmeter.toFixed(2));
	function meterminus() {
	     var add1 = 0;
                $(".rowDataSd1").each(function() {
                    add1 += Number($(this).html());
                });
                $("#Total_Meter").val(add1.toFixed(2));
	}
	 var rate = parseFloat($('#Total_Meter').val()) || 0;
    var box = parseFloat($('#Beam_Meter').val()) || 0;
     var shortage = box-rate;
    $('#Shortage').val(shortage.toFixed(2));  
	function shortagees() {  
	 var rate = parseFloat($('#Total_Meter').val()) || 0;
    var box = parseFloat($('#Beam_Meter').val()) || 0;
     var shortage = box-rate;
    $('#Shortage').val(shortage.toFixed(2));     
} 
var totalmeter = parseFloat($('#Total_Meter').val()) || 0;
    var beammeter = parseFloat($('#Beam_Meter').val()) || 0;
     var shortage1 = beammeter-totalmeter;
	 var shortageper = shortage1/beammeter;
	 var shortpercent = shortageper*100;
    $('#Shortageper').val(shortpercent.toFixed(2)); 
function shortageespercent() { 
 var totalmeter = parseFloat($('#Total_Meter').val()) || 0;
    var beammeter = parseFloat($('#Beam_Meter').val()) || 0;
     var shortage1 = beammeter-totalmeter;
	 var shortageper = shortage1/beammeter;
	 var shortpercent = shortageper*100;
    $('#Shortageper').val(shortpercent.toFixed(2)); 
}
	<?php if($action=='insert')
             {
				 ?>
 $('.btn-danger').click(function(){
       var del_id = $(this).attr('rel');
       $.post('Saree_productiontabledelete.php?del=ins', {delete_id:del_id}, function(data) {
          if(data == 'true') {
		  $('#'+del_id).remove();
			alert("Deleted!");
			totalpiecess();
			meterminus();
			shortagees();
			shortageespercent();
          } else {
             alert('Could not delete!');
          }
       });
    });
	<?php } if($action=='update')
             {
				 ?>
				  $('.btn-danger').click(function(){
       var del_id = $(this).attr('rel');
       $.post('Saree_productiontabledelete.php?del=upd', {delete_id:del_id}, function(data) {
          if(data == 'true') {
		  $('#'+del_id).remove();
			alert("Deleted!");
			totalpiecess();
			meterminus();
			shortagees();
			shortageespercent();
          } else {
             alert('Could not delete!');
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
<table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                        <tr>
                                            <th>Sr.No</th>
                                            <th>Lot ID</th>
                                            <th>Lot Meter</th>
                                            <th>Date</th>
                                            <th>Weight</th>
                                            <th>Piecess</th>
                                            <th>Quality</th>
                                            <th>Design</th>
                                            <th>Status</th>
                                            <th>Description</th>
                                            <th>#ID</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody id="mybody">
    <?php if($totalRows_rsSareees==0) {
	}
		else
		{
                                     $i=0;
	                                    $i++;
                                     do { ?>
  <tr id="<?php echo $row_rsSareees['Saree_Lot_Id']; ?>">
    <td width="7%"><?php echo $i++; ?></td>
    <td width="10%"><?php echo $row_rsSareees['Saree_Lot_Id']; ?></td>
    <td class="rowDataSd1" width="10%"><?php echo $row_rsSareees['Saree_Lot_Meter']; ?></td>
    <td width="10%"><?php echo $row_rsSareees['Date']; ?></td>
    <td width="10%"><?php echo $row_rsSareees['Saree_Weight']; ?></td>
    <td class="rowDataSd" width="10%"><?php echo $row_rsSareees['Saree_Pieces']; ?></td>
    <td width="30%"><?php echo $row_rsSareees['Quality_Name']; ?></td>
    <td width="15%"><?php echo $row_rsSareees['Design']; ?></td>
    <td width="10%"><?php echo $row_rsSareees['Status']; ?></td>
    <td width="30%"><?php echo $row_rsSareees['Description']; ?></td>
    <td width="10%"><?php echo $row_rsSareees['R_Id']; ?></td>
    <td align="center">
   <button type="button" class="btn-danger" id="#del" rel="<?php echo $row_rsSareees['Saree_Lot_Id']; ?>"><i class="icon-remove icon-white"></i></button>
    </td>
  </tr>
  <?php } while ($row_rsSareees = mysql_fetch_assoc($rsSareees));
        } ?>
                                    </tbody>
                                </table>
                                <?php } elseif($action=='update')
             {
				 ?>
                 <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                        <tr>
                                            <th>Sr.No</th>
                                            <th>Lot ID</th>
                                            <th>Lot Meter</th>
                                            <th>Date</th>
                                            <th>Weight</th>
                                            <th>Piecess</th>
                                            <th>Quality</th>
                                            <th>Design</th>
                                            <th>Status</th>
                                            <th>Description</th>
                                            <th>#ID</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody id="mybody">
    <?php if($totalRows_rsSareees==0) {
	}
		else
		{
                                     $i=0;
	                                    $i++;
                                     do { ?>
  <tr id="<?php echo $row_rsSareees['Saree_Lot_Id']; ?>">
    <td width="7%"><?php echo $i++; ?></td>
    <td width="10%"><?php echo $row_rsSareees['Saree_Lot_Id']; ?></td>
    <td class="rowDataSd1" width="10%"><?php echo $row_rsSareees['Saree_Lot_Meter']; ?></td>
    <td width="10%"><?php echo $row_rsSareees['Date']; ?></td>
    <td width="10%"><?php echo $row_rsSareees['Saree_Weight']; ?></td>
    <td class="rowDataSd" width="10%"><?php echo $row_rsSareees['Saree_Pieces']; ?></td>
    <td width="30%"><?php echo $row_rsSareees['Quality_Name']; ?></td>
    <td width="15%"><?php echo $row_rsSareees['Design']; ?></td>
    <td width="10%"><?php echo $row_rsSareees['Status']; ?></td>
    <td width="30%"><?php echo $row_rsSareees['Description']; ?></td>
    <td width="10%"><?php echo $row_rsSareees['R_Id']; ?></td>
    <td align="center">
   <button type="button" class="btn-danger" id="#del" rel="<?php echo $row_rsSareees['Saree_Lot_Id']; ?>"><i class="icon-remove icon-white"></i></button>
    </td>
  </tr>
  <?php } while ($row_rsSareees = mysql_fetch_assoc($rsSareees));
        } ?>
                                    </tbody>
                                </table>
<?php }
if($action=='insert')
{
mysql_free_result($rsSareees);
}
else if($action=='update')
{
	mysql_free_result($rsSareees);
}
?>
