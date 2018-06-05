<?php session_start(); require_once('../Connections/brijesh8510.php'); 
	include("databaseconnect.php");
if(isset($_REQUEST['action']))
{ 
$Ta_Labour_Id = $_REQUEST['Ta_Labour_Id'];
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
     $Ta_Labour_Id = $_REQUEST['Ta_Labour_Id'];
	 $Ta_Pro_Id = $_REQUEST['Ta_Pro_Id'];  
	$T_Date = $_REQUEST['T_Date'];
	$Taka_Meter = $_REQUEST['Taka_Meter'];
	$L_Rate = $_REQUEST['L_Rate'];
	$L_Amount = $_REQUEST['L_Amount'];
	$Quality_Id = $_REQUEST['Quality_Id'];
	$Labour_Id = $_REQUEST['Labour_Id'];
	$Description = $_REQUEST['textarea1'];
	$description_replace = str_replace(","," ",$Description);
	$R_Id = $_REQUEST['R_Id'];
		if($Taka_Meter=="" && $Quality_Id<=0 && $Labour_Id<=0 && $L_Rate=="" && $L_Amount=="" && $description_replace=="")
	    {
		echo '<script>alert("Above all (Taka meter,Rate,Amount,Quality,Desciption ) are required....");</script>';
		}
	 elseif($Taka_Meter=="")
	    {
		echo '<script>alert("Taka meter is required....");</script>';
		}
	elseif($L_Rate=="")
	    {
		echo '<script>alert("labour rate is required....");</script>';
		}
	elseif($L_Amount=="")
	    {
		echo '<script>alert("Amount is required....");</script>';
		}
	 elseif($Quality_Id<=0)
	    {
		echo '<script>alert("Quality is required....");</script>';
		}
		elseif($Labour_Id<=0)
	    {
		echo '<script>alert("Labour is required....");</script>';
		}
     elseif($description_replace=="")
		{
		echo '<script>alert("Description is required....");</script>';
		}
		else
		{
			if($action=='insert')
             {
    $query7 = mysql_query("select * from taka_labsal where Ta_Pro_Id = '".$Ta_Pro_Id."' ") or die(mysql_error());
	$res_fetch_t = mysql_fetch_array($query7);
$duplicate7 = mysql_num_rows($query7);
$res_fetch_Ta = $res_fetch_t['Ta_Labour_Id'];
   if($duplicate7==0)
    {
	$sql= "INSERT INTO `taka_labsalsub1` (`Taka_Labour_Id` ,`Ta_Labour_Id` ,`T_Date` ,`Taka_Meter` ,`L_Rate` ,`L_Amount` ,`Quality_Id` ,`Labour_Id` ,`Description` ,`R_Id`)VALUES (NULL ,  '$Ta_Labour_Id',  '$T_Date', '$Taka_Meter','$L_Rate','$L_Amount','$Quality_Id', '$Labour_Id',  '$description_replace', '$R_Id')";
$result = mysql_query($sql);
	}
	else
	{
		 echo '<center style="color:#F00;">'."This taka-labour id allready exists in taka-labour id : ".$res_fetch_Ta." you cannot re-enter this taka-labour id</center>";
	}
			 }
else if($action=='update')
{
	$sql= "INSERT INTO `taka_labsalsuborg` (`Taka_Labour_Id` ,`Ta_Labour_Id` ,`T_Date` ,`Taka_Meter` ,`L_Rate` ,`L_Amount` ,`Quality_Id` ,`Labour_Id` ,`Description` ,`R_Id`)VALUES (NULL ,  '$Ta_Labour_Id',  '$T_Date', '$Taka_Meter','$L_Rate','$L_Amount','$Quality_Id', '$Labour_Id',  '$description_replace', '$R_Id')";
$result = mysql_query($sql);
	}
}}}}
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
$query_rsTaks = "select Taka_Labour_Id,Ta_Labour_Id,T_Date,Taka_Meter,L_Rate,L_Amount,labour_details.Name,taka_labsalsub1.Description,R_Id,quality_details.Quality_Name from taka_labsalsub1,labour_details,quality_details where labour_details.Labour_Id = taka_labsalsub1.Labour_Id and quality_details.Quality_Id = taka_labsalsub1.Quality_Id AND taka_labsalsub1.Ta_Labour_Id = '".$Ta_Labour_Id."' order by taka_labsalsub1.Taka_Labour_Id asc";
$rsTaks = mysql_query($query_rsTaks, $brijesh8510) or die(mysql_error());
$row_rsTaks = mysql_fetch_assoc($rsTaks);
$totalRows_rsTaks = mysql_num_rows($rsTaks);
}
elseif($action=='update')
{
mysql_select_db($database_brijesh8510, $brijesh8510);
$query_rsTaks = "select Taka_Labour_Id,Ta_Labour_Id,T_Date,Taka_Meter,L_Rate,L_Amount,labour_details.Name,taka_labsalsuborg.Description,R_Id,quality_details.Quality_Name from taka_labsalsuborg,labour_details,quality_details where labour_details.Labour_Id = taka_labsalsuborg.Labour_Id and quality_details.Quality_Id = taka_labsalsuborg.Quality_Id AND taka_labsalsuborg.Ta_Labour_Id = '".$Ta_Labour_Id."' order by taka_labsalsuborg.Taka_Labour_Id asc";
$rsTaks = mysql_query($query_rsTaks, $brijesh8510) or die(mysql_error());
$row_rsTaks = mysql_fetch_assoc($rsTaks);
$totalRows_rsTaks = mysql_num_rows($rsTaks);
}
?>
<script src="assets/js/googleapi.js"></script>
<script>
$(document).ready(function(){
	 var add = 0;
                $(".rowDataSd1").each(function() {
                    add += Number($(this).html());
                });
                $("#Total_MeterLab").val(add.toFixed(2));
	function totmeterminus() {
	  var add = 0;
                $(".rowDataSd1").each(function() {
                    add += Number($(this).html());
                });
                $("#Total_MeterLab").val(add.toFixed(2));
	}
	 var add = 0;
                $(".rowDataSdAmount").each(function() {
                    add += Number($(this).html());
                });
                $("#Total_L_Amount").val(add.toFixed(2));
	function totamtminus() {
	 var add = 0;
                $(".rowDataSdAmount").each(function() {
                    add += Number($(this).html());
                });
                $("#Total_L_Amount").val(add.toFixed(2));
	}
	function checkmtr() {
	 var rate = parseFloat($('#Total_MeterLab').val()) || 0;
    var box = parseFloat($('#Taka_T_Meter').val()) || 0;
     var Check = box-rate;
    $('#Check').val(Check.toFixed(2)); 
	}
	 var rate85 = parseFloat($('#Total_MeterLab').val()) || 0;
    var box85 = parseFloat($('#Taka_T_Meter').val()) || 0;
     var Check85 = box85-rate85;
    $('#Check').val(Check85.toFixed(2)); 
$('.btn-danger').click(function(){
<?php	if($action=='insert')
{
?>  var del_id = $(this).attr('rel');
       $.post('taka_prosallabtabledelete.php?del=ins', {delete_id:del_id}, function(data) {
          if(data == 'true') {
            $('#'+del_id).remove();
			alert('Deleted');
			totmeterminus();
			totamtminus();
			checkmtr();
          } else {
            alert('Could not delete!');
			window.location="loginadmin.php?msg";
          }
       });
    });
	<?php	} else if($action=='update')
 {    ?>
 var del_id = $(this).attr('rel');
       $.post('taka_prosallabtabledelete.php?del=upd', {delete_id:del_id}, function(data) {
          if(data == 'true') {
	        $('#'+del_id).remove();
			alert('Deleted');
			totmeterminus();
			totamtminus();
			checkmtr();
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
<?php	if($action=='insert')
{
?>
<table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                        <tr>
                                            <th>Sr.No</th>
                                            <th>Date</th>
                                             <th>Quality</th>
                                             <th>Meter</th>
                                             <th>Rate</th>
                                             <th>Amount</th>
                                              <th>Labour</th>
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
  <tr id="<?php echo $row_rsTaks['Taka_Labour_Id']; ?>">
    <td width="7%"><?php echo $i++; ?></td>
    <td width="10%"><?php echo $row_rsTaks['T_Date']; ?></td>
    <td width="25%"><?php echo $row_rsTaks['Quality_Name']; ?></td>
    <td class="rowDataSd1" width="10%"><?php echo $row_rsTaks['Taka_Meter']; ?></td>
    <td width="10%"><?php echo $row_rsTaks['L_Rate']; ?></td>
    <td class="rowDataSdAmount" width="10%"><?php echo $row_rsTaks['L_Amount']; ?></td>
    <td width="15%"><?php echo $row_rsTaks['Name']; ?></td>
    <td width="20%"><?php echo $row_rsTaks['Description']; ?></td>
    <td width="10%"><?php echo $row_rsTaks['R_Id']; ?></td>
    <td align="center">
     <button type="button" class="btn-danger" id="del1" rel="<?php echo $row_rsTaks['Taka_Labour_Id']; ?>"><i class="icon-remove icon-white"></i></button>
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
                                            <th>Date</th>
                                             <th>Quality</th>
                                              <th>Meter</th>
                                             <th>Rate</th>
                                             <th>Amount</th>
                                              <th>Labour</th>
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
  <tr id="<?php echo $row_rsTaks['Taka_Labour_Id']; ?>">
    <td width="7%"><?php echo $i++; ?></td>
    <td width="10%"><?php echo $row_rsTaks['T_Date']; ?></td>
    <td width="25%"><?php echo $row_rsTaks['Quality_Name']; ?></td>
    <td class="rowDataSd1" width="10%"><?php echo $row_rsTaks['Taka_Meter']; ?></td>
    <td width="10%"><?php echo $row_rsTaks['L_Rate']; ?></td>
    <td class="rowDataSdAmount" width="10%"><?php echo $row_rsTaks['L_Amount']; ?></td>
    <td width="15%"><?php echo $row_rsTaks['Name']; ?></td>
    <td width="20%"><?php echo $row_rsTaks['Description']; ?></td>
    <td width="10%"><?php echo $row_rsTaks['R_Id']; ?></td>
    <td align="center">
     <button type="button" class="btn-danger" id="del" rel="<?php echo $row_rsTaks['Taka_Labour_Id']; ?>"><i class="icon-remove icon-white"></i></button>
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
