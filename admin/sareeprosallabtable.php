<?php session_start(); require_once('../Connections/brijesh8510.php'); 
	include("databaseconnect.php");

if(isset($_REQUEST['action']))
{ 
$Sa_Labour_Id = $_REQUEST['Sa_Labour_Id'];
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
     $Sa_Labour_Id = $_REQUEST['Sa_Labour_Id'];
	 
	 $Sa_Pro_Id = $_REQUEST['Sa_Pro_Id'];  

	$S_Date = $_REQUEST['S_Date'];
		
	//$Taka_No=$_REQUEST['Taka_No'];
		
	$Saree_Meter = $_REQUEST['Saree_Meter'];
	
	$S_Rate = $_REQUEST['S_Rate'];
	
	$S_Amount = $_REQUEST['S_Amount'];
	
	$Design_Id = $_REQUEST['Design_Id'];
	
	$Labour_Id = $_REQUEST['Labour_Id'];
	
	$Description = $_REQUEST['textarea1'];
	
	$description_replace = str_replace(","," ",$Description);
	
	$R_Id = $_REQUEST['R_Id'];
		
		if($Saree_Meter=="" && $Design_Id<=0 && $Labour_Id<=0 && $S_Rate=="" && $S_Amount=="" && $description_replace<="")
	
	    {
		echo '<script>alert("Above all (Saree meter,Rate,Amount,Quality,Design,Description ) are required....");</script>';
		}
	 elseif($Saree_Meter=="")
	
	    {
		echo '<script>alert("Saree meter is required....");</script>';
		}
	elseif($S_Rate=="")
	
	    {
		echo '<script>alert("labour rate is required....");</script>';
		}
	elseif($S_Amount=="")
	
	    {
		echo '<script>alert("Amount is required....");</script>';
		}
	 elseif($Design_Id<=0)
	
	    {
		echo '<script>alert("Design is required....");</script>';
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
    $query7 = mysql_query("select * from saree_labsal where Sa_Pro_Id = '".$Sa_Pro_Id."' ") or die(mysql_error());
	$res_fetch_t = mysql_fetch_array($query7);
$duplicate7 = mysql_num_rows($query7);
$res_fetch_Sa = $res_fetch_t['Sa_Pro_Id'];
   if($duplicate7==0)
    {
	$sql= "INSERT INTO `saree_labsalsub1` (
`Saree_Labour_Id` ,
`Sa_Labour_Id` ,
`S_Date` ,
`Saree_Meter` ,
`S_Rate` ,
`S_Amount` ,
`Design_Id` ,
`Labour_Id` ,
`Description` ,
`R_Id`
)
VALUES (
NULL ,  '$Sa_Labour_Id',  '$S_Date', '$Saree_Meter','$S_Rate','$S_Amount','$Design_Id', '$Labour_Id',  '$description_replace', '$R_Id')";
$result = mysql_query($sql);
	}
	else
	{
		 echo '<center style="color:#F00;">'."This saree-labour id allready exists in saree-production id : ".$res_fetch_Sa." you cannot re-enter this saree-labour id</center>";
	}
			 }
else if($action=='update')
{
	
	$sql= "INSERT INTO `saree_labsalsuborg1` (
`Saree_Labour_Id` ,
`Sa_Labour_Id` ,
`S_Date` ,
`Saree_Meter` ,
`S_Rate` ,
`S_Amount` ,
`Design_Id` ,
`Labour_Id` ,
`Description` ,
`R_Id`
)
VALUES (
NULL ,  '$Sa_Labour_Id',  '$S_Date', '$Saree_Meter','$S_Rate','$S_Amount','$Design_Id', '$Labour_Id',  '$description_replace', '$R_Id')";
$result = mysql_query($sql);
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
$query_rsTaks = "select Saree_Labour_Id,Sa_Labour_Id,S_Date,Saree_Meter,S_Rate,S_Amount,labour_details.Name,saree_labsalsub1.Description,R_Id,quality_details.Quality_Name,design_details.Design from saree_labsalsub1,labour_details,quality_details,design_details where labour_details.Labour_Id = saree_labsalsub1.Labour_Id and design_details.Design_Id = saree_labsalsub1.Design_Id AND quality_details.Quality_Id = design_details.Quality_Id AND saree_labsalsub1.Sa_Labour_Id = '".$Sa_Labour_Id."' order by saree_labsalsub1.saree_Labour_Id asc";
$rsTaks = mysql_query($query_rsTaks, $brijesh8510) or die(mysql_error());
$row_rsTaks = mysql_fetch_assoc($rsTaks);
$totalRows_rsTaks = mysql_num_rows($rsTaks);
}
elseif($action=='update')
{
mysql_select_db($database_brijesh8510, $brijesh8510);
$query_rsTaks = "select Saree_Labour_Id,Sa_Labour_Id,S_Date,Saree_Meter,S_Rate,S_Amount,labour_details.Name,saree_labsalsuborg1.Description,R_Id,quality_details.Quality_Name,design_details.Design from saree_labsalsuborg1,labour_details,quality_details,design_details where labour_details.Labour_Id = saree_labsalsuborg1.Labour_Id and design_details.Design_Id = saree_labsalsuborg1.Design_Id AND quality_details.Quality_Id = design_details.Quality_Id AND saree_labsalsuborg1.Sa_Labour_Id = '".$Sa_Labour_Id."' order by saree_labsalsuborg1.saree_Labour_Id asc";
$rsTaks = mysql_query($query_rsTaks, $brijesh8510) or die(mysql_error());
$row_rsTaks = mysql_fetch_assoc($rsTaks);
$totalRows_rsTaks = mysql_num_rows($rsTaks);
}
?>
<script src="assets/js/googleapi.js">
</script>
<script>
$(document).ready(function(){
	//////////////METER//////////////////////////////////
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
	////////////////////////AMT//////////////////////////////
	 var add = 0;
                $(".rowDataSdAmount").each(function() {
                    add += Number($(this).html());
                });
                $("#Total_S_Amount").val(add.toFixed(2));
	function totamtminus() {
	 var add = 0;
                $(".rowDataSdAmount").each(function() {
                    add += Number($(this).html());
                });
                $("#Total_S_Amount").val(add.toFixed(2));
	}
	////////////////////////////////////////////////////////////CHECK/////////////
	function checkmtr() {
	 var rate = parseFloat($('#Total_MeterLab').val()) || 0;
    var box = parseFloat($('#Saree_T_Meter').val()) || 0;
     var Check = box-rate;
    $('#Check').val(Check.toFixed(2)); 
	}
	 var rate85 = parseFloat($('#Total_MeterLab').val()) || 0;
    var box85 = parseFloat($('#Saree_T_Meter').val()) || 0;
     var Check85 = box85-rate85;
    $('#Check').val(Check85.toFixed(2)); 
	//////////////////////////////////////////////////////////
$('.btn-danger').click(function(){
<?php	if($action=='insert')
{
?>  var del_id = $(this).attr('rel');
       $.post('saree_prosallabtabledelete.php?del=ins', {delete_id:del_id}, function(data) {
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
       $.post('saree_prosallabtabledelete.php?del=upd', {delete_id:del_id}, function(data) {
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
                                             <th>Design</th>
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
  <tr id="<?php echo $row_rsTaks['Saree_Labour_Id']; ?>">
    <td width="7%"><?php echo $i++; ?></td>
    <td width="10%"><?php echo $row_rsTaks['S_Date']; ?></td>
    <td width="25%"><?php echo $row_rsTaks['Quality_Name']; ?></td>
     <td width="15%"><?php echo $row_rsTaks['Design']; ?></td>
    <td class="rowDataSd1" width="10%"><?php echo $row_rsTaks['Saree_Meter']; ?></td>
    <td width="10%"><?php echo $row_rsTaks['S_Rate']; ?></td>
    <td class="rowDataSdAmount" width="10%"><?php echo $row_rsTaks['S_Amount']; ?></td>
    <td width="15%"><?php echo $row_rsTaks['Name']; ?></td>
    <td width="20%"><?php echo $row_rsTaks['Description']; ?></td>
    <td width="10%"><?php echo $row_rsTaks['R_Id']; ?></td>
    <td align="center">
     <button type="button" class="btn-danger" id="del1" rel="<?php echo $row_rsTaks['Saree_Labour_Id']; ?>"><i class="icon-remove icon-white"></i></button>
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
                                             <th>Design</th>
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
  <tr id="<?php echo $row_rsTaks['Saree_Labour_Id']; ?>">
    <td width="7%"><?php echo $i++; ?></td>
    <td width="10%"><?php echo $row_rsTaks['S_Date']; ?></td>
    <td width="25%"><?php echo $row_rsTaks['Quality_Name']; ?></td>
    <td width="15%"><?php echo $row_rsTaks['Design']; ?></td>
    <td class="rowDataSd1" width="10%"><?php echo $row_rsTaks['Saree_Meter']; ?></td>
    <td width="10%"><?php echo $row_rsTaks['S_Rate']; ?></td>
    <td class="rowDataSdAmount" width="10%"><?php echo $row_rsTaks['S_Amount']; ?></td>
    <td width="15%"><?php echo $row_rsTaks['Name']; ?></td>
    <td width="20%"><?php echo $row_rsTaks['Description']; ?></td>
    <td width="10%"><?php echo $row_rsTaks['R_Id']; ?></td>
    <td align="center">
     <button type="button" class="btn-danger" id="del" rel="<?php echo $row_rsTaks['Saree_Labour_Id']; ?>"><i class="icon-remove icon-white"></i></button>
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

