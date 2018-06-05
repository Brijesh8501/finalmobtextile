<?php session_start(); require_once('../Connections/brijesh8510.php'); 
	include("databaseconnect.php");
if(isset($_REQUEST['action']))
{ 
$Ta_Pro_Id = $_REQUEST['Ta_Pro_Id'];
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
     $Ta_Pro_Id = $_REQUEST['Ta_Pro_Id'];  
	$T_Date = $_REQUEST['T_Date'];
	$Taka_Meter = $_REQUEST['Taka_Meter'];
	$Taka_Weight = $_REQUEST['Taka_Weight'];
	$Quality_Id = $_REQUEST['Quality_Id'];
	$Status = $_REQUEST['Status'];
	$Description = $_REQUEST['textarea1'];
	$description_replace = str_replace(","," ",$Description);
	$Be_M_Id = $_REQUEST['Be_M_Id'];
	$R_Id = $_REQUEST['R_Id'];
		if($Taka_Meter=="" && $Taka_Weight=="" && $Quality_Id<=0 && $description_replace=="")
	    {
		echo '<script>alert("Above all ( Taka no, Taka meter, Taka weight, Quality, Status, Desciption ) are required....");</script>';
		}
	 elseif($Taka_Meter=="")
	    {
		echo '<script>alert("Taka meter is required....");</script>';
		}
	 elseif($Taka_Weight=="")
	    {
		echo '<script>alert("Taka weight is required....");</script>';
		}
	 elseif($Quality_Id<=0)
	    {
		echo '<script>alert("Quality is required....");</script>';
		}
     elseif($description_replace=="")
		{
		echo '<script>alert("Description is required....");</script>';
		}
		else
		{
			if($action=='insert')
             {
     $query7 = mysql_query("select * from taka_production where Be_M_Id = '".$Be_M_Id."' ") or die(mysql_error());
	$res_fetch_t = mysql_fetch_array($query7);
$duplicate7 = mysql_num_rows($query7);
$res_fetch_Ta = $res_fetch_t['Ta_Pro_Id'];
   if($duplicate7==0)
    {
	$query = mysql_query("select * from saree_production where Be_M_Id = '".$Be_M_Id."' ") or die(mysql_error());
	$res_fetch = mysql_fetch_array($query);
$duplicate = mysql_num_rows($query);
$Sa_Pro_Id = $res_fetch['Sa_Pro_Id'];
   if($duplicate==0)
    {
	$query1 = mysql_query("select * from beam_machine where Be_M_Id = '".$Be_M_Id."' AND Status = 'Fitted' ") or die(mysql_error());
$duplicate1 = mysql_num_rows($query1);
   if($duplicate1==0)
    {
	   echo "<center style='color:#F00;'>You cannot enter data as beam is allready remove from machine....please check the status in <i>' beam-machine '</i></center>";
     }
	 else
	 {
	$sql= "INSERT INTO `taka_details` (
`Taka_Id` ,
`Ta_Pro_Id` ,
`T_Date` ,
`Taka_Meter` ,
`Taka_Weight` ,
`Quality_Id` ,
`Status` ,
`Description` ,
`R_Id`
)
VALUES (
NULL ,  '$Ta_Pro_Id',  '$T_Date', '$Taka_Meter',  '$Taka_Weight',  '$Quality_Id', '$Status',  '$description_replace', '$R_Id')";
$result = mysql_query($sql);
	}
	}
	 else
    {
      echo "<center style='color:#F00;'>This beam-machine id : $Be_M_Id is allready exists in saree-production id : $Sa_Pro_Id so you cannot re-enter this beam-machine id : $Be_M_Id in <i>'&nbsp;Taka production&nbsp;'</i></center>";
    }
	}
	else
	{
		 echo "<center style='color:#F00;'>This beam-machine id allready exists in taka production id : ".$res_fetch_Ta." you cannot re-enter this beam-machine id in another taka production</center>";
	}
	}
else if($action=='update')
{
	$query1 = mysql_query("select * from beam_machine where Be_M_Id = '".$Be_M_Id."' AND Status = 'Fitted' ") or die(mysql_error());
$duplicate1 = mysql_num_rows($query1);
   if($duplicate1==0)
    {
	   echo "<center style='color:#F00;'>You cannot enter data as beam is allready remove from machine....please check the status in <i>' beam-machine '</i></center>";
     }
	 else
	 {
	$sql= "INSERT INTO `taka_detailsorg` (
`Taka_Id` ,
`Ta_Pro_Id` ,
`T_Date` ,
`Taka_Meter` ,
`Taka_Weight` ,
`Quality_Id` ,
`Status` ,
`Description` ,
`R_Id`
)
VALUES (
NULL ,  '$Ta_Pro_Id',  '$T_Date', '$Taka_Meter',  '$Taka_Weight',  '$Quality_Id', '$Status',  '$description_replace', '$R_Id')";
$result = mysql_query($sql);
	}
}
}
}
}
}
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
$query_rsTaks = "select taka_details.Taka_Id,taka_details.Ta_Pro_Id,taka_details.T_Date,taka_details.Taka_Meter,taka_details.Taka_Weight,quality_details.Quality_Name,taka_details.Status,taka_details.Description,taka_details.R_Id from taka_details,quality_details where quality_details.Quality_Id = taka_details.Quality_Id AND taka_details.Ta_Pro_Id = '$Ta_Pro_Id' order by taka_details.Taka_Id asc";
$rsTaks = mysql_query($query_rsTaks, $brijesh8510) or die(mysql_error());
$row_rsTaks = mysql_fetch_assoc($rsTaks);
$totalRows_rsTaks = mysql_num_rows($rsTaks);
}
elseif($action=='update')
{
mysql_select_db($database_brijesh8510, $brijesh8510);
$query_rsTaks = "SELECT taka_detailsorg.Ta_Pro_Id, taka_detailsorg.T_Date, taka_detailsorg.Taka_Meter, taka_detailsorg.Taka_Weight, quality_details.Quality_Name, taka_detailsorg.Status, taka_detailsorg.`Description`, taka_detailsorg.Taka_Id, taka_detailsorg.R_Id FROM taka_detailsorg, quality_details WHERE quality_details.Quality_Id = taka_detailsorg.Quality_Id AND taka_detailsorg.Ta_Pro_Id ='".$Ta_Pro_Id."' order by taka_detailsorg.Taka_Id asc";
$rsTaks = mysql_query($query_rsTaks, $brijesh8510) or die(mysql_error());
$row_rsTaks = mysql_fetch_assoc($rsTaks);
$totalRows_rsTaks = mysql_num_rows($rsTaks);
}
?>
<script src="assets/js/googleapi.js"></script>
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
 var add1 = 0;
                $(".rowDataSd1").each(function() {
                    add1 += Number($(this).html());
                });
                $("#Total_Meter").val(add1.toFixed(2));
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
$('.btn-danger').click(function(){
<?php	if($action=='insert')
{
?>  var del_id = $(this).attr('rel');
       $.post('taka_productiontabledelete.php?del=ins', {delete_id:del_id}, function(data) {
          if(data == 'true') {
            $('#'+del_id).remove();
			alert('Deleted');
			Count();
			meterminus();
			shortagees();
			shortageespercent();
          } else {
            alert('Could not delete!');
          }
       });
    });
	<?php	} else if($action=='update')
 {    ?>
 var del_id = $(this).attr('rel');
       $.post('taka_productiontabledelete.php?del=upd', {delete_id:del_id}, function(data) {
          if(data == 'true') {
            $('#'+del_id).remove();
			alert('Deleted');
			Count();
			meterminus();
			shortagees();
			shortageespercent();
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
<?php	if($action=='insert')
{
?>
<table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                        <tr>
                                            <th>Sr.No</th>
                                            <th>Date</th>
                                            <th>Meter</th>
                                            <th>Weight</th>
                                             <th>Quality</th>
                                              <th>Status</th>
                                               <th>Description</th>
                                               <th>#ID</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody id="mybody">
   <?php  if($totalRows_rsTaks==0) {
   }
   else
   {
                                     $i=0;
	  $i++;?>
                                    <?php do { ?>
  <tr id="<?php echo $row_rsTaks['Taka_Id']; ?>" class="tableRow">
    <td width="7%"><?php echo $i++; ?></td>
    <td width="10%"><?php echo $row_rsTaks['T_Date']; ?></td>
    <td class="rowDataSd1" width="10%"><?php echo $row_rsTaks['Taka_Meter']; ?></td>
    <td width="10%"><?php echo $row_rsTaks['Taka_Weight']; ?></td>
    <td width="25%"><?php echo $row_rsTaks['Quality_Name']; ?></td>
    <td width="7%"><?php echo $row_rsTaks['Status']; ?></td>
    <td width="20%"><?php echo $row_rsTaks['Description']; ?></td>
    <td width="10%"><?php echo $row_rsTaks['R_Id']; ?></td>
    <td align="center">
     <button type="button" class="btn-danger" rel="<?php echo $row_rsTaks['Taka_Id']; ?>"><i class="icon-remove icon-white"></i></button>
      </td>
  </tr>
  <?php } while ($row_rsTaks = mysql_fetch_assoc($rsTaks)); 
  } ?>
                                    </tbody>
                                </table>
<?php	} else if($action=='update')
 {    ?>
 <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                        <tr>
                                            <th>Sr.No</th>
                                            <th>Taka ID</th>
                                            <th>Date</th>
                                            <th>Meter</th>
                                            <th>Weight</th>
                                             <th>Quality</th>
                                              <th>Status</th>
                                               <th>Description</th>
                                               <th>#ID</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody id="mybody">
   <?php  if($totalRows_rsTaks==0) {
   }
   else
   {
                                     $i=0;
	  $i++;?>
                                    <?php do { ?>
  <tr id="<?php echo $row_rsTaks['Taka_Id']; ?>" class="tableRow">
    <td width="7%"><?php echo $i++; ?></td>
    <td width="10%"><?php echo $row_rsTaks['Taka_Id']; ?></td>
    <td width="10%"><?php echo $row_rsTaks['T_Date']; ?></td>
    <td class="rowDataSd1" width="10%"><?php echo $row_rsTaks['Taka_Meter']; ?></td>
    <td width="10%"><?php echo $row_rsTaks['Taka_Weight']; ?></td>
    <td width="25%"><?php echo $row_rsTaks['Quality_Name']; ?></td>
    <td width="7%"><?php echo $row_rsTaks['Status']; ?></td>
    <td width="20%"><?php echo $row_rsTaks['Description']; ?></td>
    <td width="10%"><?php echo $row_rsTaks['R_Id']; ?></td>
    <td align="center">
     <button type="button" class="btn-danger" rel="<?php echo $row_rsTaks['Taka_Id']; ?>"><i class="icon-remove icon-white"></i></button>
      </td>
  </tr>
  <?php } while ($row_rsTaks = mysql_fetch_assoc($rsTaks)); 
  } ?>
                                    </tbody>
                                </table>
 <?php } if($action=='insert')
{
mysql_free_result($rsTaks);
}
if($action=='update')
{
mysql_free_result($rsTaks);
}
?>
