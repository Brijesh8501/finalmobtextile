<?php session_start(); require_once('../Connections/brijesh8510.php'); 
include("databaseconnect.php");	
if(isset($_REQUEST['action']))
{ 
$Bo_D_C_Id = $_REQUEST['Bo_D_C_Id'];
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
     $Bo_D_C_Id = $_REQUEST['Bo_D_C_Id'];  
	$Total_Cartoon = $_REQUEST['Total_Cartoon'];
	$Quality_Id = $_REQUEST['Quality_Id'];
	$R_Id = $_REQUEST['R_Id'];
	$Chbo_D_C_Id = $_REQUEST['Chbo_D_C_Id'];
	if($Chbo_D_C_Id<=0 && $Total_Cartoon=="" && $Quality_Id<=0)
	    {
		echo '<script>alert("Above all ( Cartoon, Quality) are required....");</script>';
		}
	 elseif($Chbo_D_C_Id<=0)
	    {
		echo '<script>alert("Please give cartoon properly....");</script>';
		}
	 elseif($Total_Cartoon=="")
	    {
		echo '<script>alert("Cartoon is required....");</script>';
		}
	elseif($Quality_Id<=0)
	    {
		echo '<script>alert("Quality is required....");</script>';
		}
		else
		{
			$check = "select sum(Total_Cartoon) as sum_cartoon from boobin_dcorg where Quality_Id = '$Quality_Id'";
		$check_exe = mysql_query($check);
		$check_fetch = mysql_fetch_array($check_exe);
		    $check1 = "select sum(Total_Cartoon) as sum_cartoon1 from boobin_d_c_2migrate where Quality_Id = '$Quality_Id'";
		$check_exe1 = mysql_query($check1);
		$check_fetch1 = mysql_fetch_array($check_exe1);
		     $check2 = "select sum(Total_Cartoon) as sum_cartoon2 from boobin_dcorgmigrate where Quality_Id = '$Quality_Id'";
		$check_exe2 = mysql_query($check2);
		$check_fetch2 = mysql_fetch_array($check_exe2);
		   
		   if($check_fetch1['sum_cartoon1']!="" && $check_fetch2['sum_cartoon2']!=""){
	    $migrate_total =  $check_fetch1['sum_cartoon1'] + $check_fetch2['sum_cartoon2'];
		$final_total_check = $check_fetch['sum_cartoon'] - $migrate_total; 
		  }
		 elseif($check_fetch2['sum_cartoon2']!=""){
		$migrate_total =  $check_fetch1['sum_cartoon1'] + $check_fetch2['sum_cartoon2'];
		$final_total_check = $check_fetch['sum_cartoon'] - $migrate_total; 
		  }
		  else if($check_fetch1['sum_cartoon1']!="")
		  {
		 $final_total_check = $check_fetch['sum_cartoon'] - $check_fetch1['sum_cartoon1'];
		  }
		  else
		  {
			   $final_total_check = $check_fetch['sum_cartoon'];
		  }
		if($action=='insert')
             {
		  if($final_total_check>=$Total_Cartoon){		
	$sql= "INSERT INTO  `boobin_d_c_2migrate` (`Bobbin_D_C_Id` ,`Bo_D_C_Id` ,`Chbo_D_C_Id` ,`Total_Cartoon` ,`Quality_Id` ,`R_Id`)VALUES (NULL , '$Bo_D_C_Id' , '$Chbo_D_C_Id', '$Total_Cartoon', '$Quality_Id', '$R_Id')";
$result = mysql_query($sql);
		}
		else
		{
			echo '<center style="color:#F00;">'."Please enter quantity (cartoons) properly</center>";
		}
	}
else if($action=='update')
{
	if($final_total_check>=$Total_Cartoon){
		$sql= "INSERT INTO  `boobin_dcorgmigrate` (`Bobbin_D_C_Id` ,`Bo_D_C_Id` ,`Chbo_D_C_Id` ,`Total_Cartoon` ,`Quality_Id` ,`R_Id`)VALUES (NULL , '$Bo_D_C_Id' , '$Chbo_D_C_Id', '$Total_Cartoon', '$Quality_Id', '$R_Id')";
$result = mysql_query($sql);
}
		else
		{
			echo '<center style="color:#F00;">'."Please enter quantity (cartoons) properly</center>";
		}
}}}}}
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
$query_rsSaree = "select Bobbin_D_C_Id,Bo_D_C_Id,Chbo_D_C_Id,Total_Cartoon,quality_details.Quality_Name,R_Id from boobin_d_c_2migrate,quality_details where quality_details.Quality_Id = boobin_d_c_2migrate.Quality_Id AND Bo_D_C_Id = '$Bo_D_C_Id' ";
$rsSaree = mysql_query($query_rsSaree, $brijesh8510) or die(mysql_error());
$row_rsSaree = mysql_fetch_assoc($rsSaree);
$totalRows_rsSaree = mysql_num_rows($rsSaree);
}
elseif($action=='update')
{
	mysql_select_db($database_brijesh8510, $brijesh8510);
$query_rsSaree = "select Bobbin_D_C_Id,Bo_D_C_Id,Chbo_D_C_Id,Total_Cartoon,quality_details.Quality_Name,R_Id from boobin_dcorgmigrate,quality_details where quality_details.Quality_Id = boobin_dcorgmigrate.Quality_Id AND Bo_D_C_Id = '$Bo_D_C_Id' ";
$rsSaree = mysql_query($query_rsSaree, $brijesh8510) or die(mysql_error());
$row_rsSaree = mysql_fetch_assoc($rsSaree);
$totalRows_rsSaree = mysql_num_rows($rsSaree);
}
?>
<script src="assets/js/googleapi.js">
</script>
<script>
$(document).ready(function(){
	count=0;
        count += $('#mybody').children('tr').length;
        $('#Total_Entry1').html(count);
		$('#Total_Entry').val(count);
	  function Count() {
	      count=0;
        count += $('#mybody').children('tr').length;
        $('#Total_Entry1').html(count);
		$('#Total_Entry').val(count);
	  }
	 var add1 = 0;
                $(".rowDataSd1").each(function() {
                    add1 += Number($(this).html());
                });
                $("#Total_Cart").val(add1);
	function total() {
	     var add1 = 0;
                $(".rowDataSd1").each(function() {
                    add1 += Number($(this).html());
                });
                $("#Total_Cart").val(add1);
	}
	<?php if($action=='insert')
{
	?>
    $('.btn-danger').click(function(){
       var del_id = $(this).attr('rel');
       $.post('bobbin_d_c_migratetabledelete.php?del=ins', {delete_id:del_id}, function(data) {
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
       $.post('bobbin_d_c_migratetabledelete.php?del=upd', {delete_id:del_id}, function(data) {
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
                                            <th>Cartoon</th>
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
          <tr id="<?php echo $row_rsSaree['Bobbin_D_C_Id']; ?>">
                                            <td width="10%"><?php echo $i++; ?></td>
                                           <td class="rowDataSd1" width="10%"><?php echo $row_rsSaree['Total_Cartoon']; ?></td> 
                                           <td width="40%"><?php echo $row_rsSaree['Quality_Name']; ?></td>
                                           <td width="10%"><?php echo $row_rsSaree['R_Id']; ?></td>
                                            <td align="center"> 
                                             <button type="button" class="btn-danger" id="#del" rel="<?php echo $row_rsSaree['Bobbin_D_C_Id']; ?>"><i class="icon-remove icon-white"></i></button>
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
                                            <th>Cartoon</th>
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
          <tr id="<?php echo $row_rsSaree['Bobbin_D_C_Id']; ?>">
                                            <td width="10%"><?php echo $i++; ?></td>
                                           <td class="rowDataSd1" width="10%"><?php echo $row_rsSaree['Total_Cartoon']; ?></td>
                                              <td width="40%"><?php echo $row_rsSaree['Quality_Name']; ?></td>
                                           <td width="10%"><?php echo $row_rsSaree['R_Id']; ?></td>
                                            <td align="center"> 
                                             <button type="button" class="btn-danger" id="#del" rel="<?php echo $row_rsSaree['Bobbin_D_C_Id']; ?>"><i class="icon-remove icon-white"></i></button>
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