<?php session_start(); require_once('../Connections/brijesh8510.php'); error_reporting(0);
	include("databaseconnect.php");
	if(isset($_REQUEST['action']))
{ $Taka_Invoice_Id = $_REQUEST['Taka_Invoice_Id'];
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
     $Taka_Invoice_Id = $_REQUEST['Taka_Invoice_Id']; 
	  $Taka_D_C_Id = $_REQUEST['Taka_D_C_Id'];  
	$Total_Taka = $_REQUEST['country_no_1'];
	$Total_Meter = $_REQUEST['phone_code_1'];
	$Quality_Id = $_REQUEST['country_1'];
	$Rate = $_REQUEST['Rate'];
	$Amt = $_REQUEST['Amt'];
	$R_Id = $_REQUEST['R_Id'];
	if($Total_Taka=="" && $Total_Meter=="" && $Quality_Id<=0 && $Rate=="" && $Amt=="")
	    {
		echo '<script>alert("Above all ( Total Meters, Total Piecess, Quality, Rate, Amount) are required....");</script>';
		}
	 elseif($Total_Taka=="")
	    {
		echo '<script>alert("Total taka is required....");</script>';
		}
	 elseif($Total_Meter=="")
	    {
		echo '<script>alert("Total meter is required....");</script>';
		}
	elseif($Quality_Id<=0)
	    {
		echo '<script>alert("Quality is required....");</script>';
		}
	elseif($Rate=="")
		{
		echo '<script>alert("Rate is required....");</script>';
		}
		elseif($Amt=="")
	    {
		echo '<script>alert("Amount is required....");</script>';
		}
		else
		{
		if($action=='insert')
             {
	$query = mysql_query("select * from taka_invoice_1 where Taka_Invoice_Id = '".$Taka_Invoice_Id."' AND Quality_Id='".$Quality_Id."' ") or die(mysql_error());
$duplicate=mysql_num_rows($query);
   if($duplicate==0)
    {
		$query4 = mysql_query("select * from taka_invoice where Taka_D_C_Id = '".$Taka_D_C_Id."'") or die(mysql_error());
		$res_fetch4 = mysql_fetch_array($query4);
$duplicate4 = mysql_num_rows($query4);
$res_Taka4 = $res_fetch4['Taka_Invoice_Id'];
   if($duplicate4==0)
    {
	$sql= "INSERT INTO `taka_invoice_1` (`Ta_Invoice_Id`, `Taka_Invoice_Id`, `Quality_Id`, `Total_Taka`, `Total_Meter`, `Rate`, `Amt`, `R_Id`) VALUES ('NULL', '$Taka_Invoice_Id', '$Quality_Id', '$Total_Taka', '$Total_Meter', '$Rate', '$Amt', '$R_Id')";
$result = mysql_query($sql);
	}
	else
	{
		echo "<center style='color:#F00;'>This challan id : ".$Taka_D_C_Id." allready exists in invoice id : ".$res_Taka4."</center>" ;
	}
	}
	else
	{
	echo "<center style='color:#F00;'>This quality allready exists in invoice id : ".$Taka_Invoice_Id."</center>" ;
	}
	}
else if($action=='update')
{
	$query4 = mysql_query("select * from taka_invoiceorg where Taka_Invoice_Id = '".$Taka_Invoice_Id."' AND Quality_Id='".$Quality_Id."' ") or die(mysql_error());
$duplicate4 = mysql_num_rows($query4);
   if($duplicate4==0)
    {
	$sql= "INSERT INTO `taka_invoiceorg` (`Ta_Invoice_Id`, `Taka_Invoice_Id`, `Quality_Id`, `Total_Taka`, `Total_Meter`, `Rate`, `Amt`, `R_Id`) VALUES ('NULL', '$Taka_Invoice_Id', '$Quality_Id', '$Total_Taka', '$Total_Meter', '$Rate', '$Amt', '$R_Id')";
$result = mysql_query($sql);
	}
	else
	{
		echo "<center style='color:#F00;'>This quality allready exists in invoice id : ".$Taka_Invoice_Id."</center>" ;
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
$query_Recordset1 = "SELECT taka_invoice_1.Ta_Invoice_Id, taka_invoice_1.Taka_Invoice_Id, quality_details.Quality_Name, taka_invoice_1.Total_Taka, taka_invoice_1.Total_Meter, taka_invoice_1.Rate, taka_invoice_1.Amt, taka_invoice_1.R_Id FROM taka_invoice_1,quality_details WHERE quality_details.Quality_Id = taka_invoice_1.Quality_Id AND taka_invoice_1.Taka_Invoice_Id = '$Taka_Invoice_Id' ";
$Recordset1 = mysql_query($query_Recordset1, $brijesh8510) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
}
elseif($action=='update')
{
	mysql_select_db($database_brijesh8510, $brijesh8510);
$query_Recordset1 = "SELECT taka_invoiceorg.Ta_Invoice_Id, taka_invoiceorg.Taka_Invoice_Id, quality_details.Quality_Name, taka_invoiceorg.Total_Taka, taka_invoiceorg.Total_Meter, taka_invoiceorg.Rate, taka_invoiceorg.Amt, taka_invoiceorg.R_Id FROM taka_invoiceorg,quality_details WHERE quality_details.Quality_Id = taka_invoiceorg.Quality_Id AND taka_invoiceorg.Taka_Invoice_Id = '$Taka_Invoice_Id'";
$Recordset1 = mysql_query($query_Recordset1, $brijesh8510) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
}
?>
<script src="assets/js/googleapi.js">
</script>
<script>
$(document).ready(function(){
	      count = 0;
        count += $('#mybody').children('tr').length;
        $('#Total_Entry1').html(count);
		$('#Total_Entry').val(count);
		function Count() {
			 count = 0;
        count += $('#mybody').children('tr').length;
        $('#Total_Entry1').html(count);
		$('#Total_Entry').val(count);
		}
	var add = 0;
                $(".rowDataSd").each(function() {
                    add += Number($(this).html());
                });
                $("#Total_Amt").val(add.toFixed(2));
				function Amount() {
					var add = 0;
                $(".rowDataSd").each(function() {
                    add += Number($(this).html());
                });
                $("#Total_Amt").val(add.toFixed(2));
				}
	 var Total_Amt = parseFloat($('#Total_Amt').val()) || 0;
     var Discount = parseFloat($('#Discount').val()) || 0;
	  var Interest = parseFloat($('#Interest').val()) || 0;
     var Percentage = (Total_Amt/100)*Discount;
	 var Grandtotaltmp = Total_Amt - Percentage;
     var Interest_Amt = (Grandtotaltmp*Interest)/100;
	  var Grandtotal = Grandtotaltmp + Interest_Amt;
    $('#Grandtotal').val(Grandtotal.toFixed(2));        
	 function Grand() {
	var Total_Amt = parseFloat($('#Total_Amt').val()) || 0;
     var Discount = parseFloat($('#Discount').val()) || 0;
	  var Interest = parseFloat($('#Interest').val()) || 0;
     var Percentage = (Total_Amt/100)*Discount;
	 var Grandtotaltmp = Total_Amt - Percentage;
     var Interest_Amt = (Grandtotaltmp*Interest)/100;
	  var Grandtotal = Grandtotaltmp + Interest_Amt;
    $('#Grandtotal').val(Grandtotal.toFixed(2));        
	 }
           <?php
	 if($action=='insert')
{
	?>
$('.btn-danger').click(function(){
       var del_id = $(this).attr('rel');
       $.post('taka_invoice_tabledelete.php?del=ins', {delete_id:del_id}, function(data) {
          if(data == 'true') {
            $('#'+del_id).remove();
			alert('Deleted');
			Count();
			Amount();
			Grand();
          } else {
            alert('Could not delete!');
          }
       });
    });
	<?php	} elseif($action=='update')
{ ?>
$('.btn-danger').click(function(){
       var del_id = $(this).attr('rel');
       $.post('taka_invoice_tabledelete.php?del=upd', {delete_id:del_id}, function(data) {
          if(data == 'true') {
            $('#'+del_id).remove();
			alert('Deleted');
			Count();
			Amount();
			Grand();
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
<?php
	 if($action=='insert')
{
	?> 
<table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                        <tr class="titlerow">
                                            <th>Sr.No</th>
                                            <th>Quality</th>
                                            <th>Total Meter</th>
                                            <th>Total Taka</th>
                                            <th>Rate</th>
                                            <th>Amount</th>
                                            <th>#ID</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody id="mybody">
               <?php if($totalRows_Recordset1==0) {
			   }
			   else
			   {
                                     $i=0;
	  $i++;
                                     do { ?>
  <tr id="<?php echo $row_Recordset1['Ta_Invoice_Id']; ?>">
    <td width="10%"><?php echo $i++; ?></td>
    <td width="25%"><?php echo $row_Recordset1['Quality_Name']; ?></td>
    <td width="10%"><?php echo $row_Recordset1['Total_Taka']; ?></td>
   <td width="10%"><?php echo $row_Recordset1['Total_Meter']; ?></td>
    <td width="10%"><?php echo $row_Recordset1['Rate']; ?></td>
    <td class="rowDataSd" width="10%"><?php echo $row_Recordset1['Amt']; ?></td>
    <td width="10%"><?php echo $row_Recordset1['R_Id']; ?></td>
    <td align="center">
     <button type="button" class="btn-danger" rel="<?php echo $row_Recordset1['Ta_Invoice_Id']; ?>"><i class="icon-remove icon-white"></i></button>
    </td>
  </tr>
  <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); 
  } ?>
                                    </tbody>
                                </table>
                                <?php	} elseif($action=='update')
{ ?>
<table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                        <tr class="titlerow">
                                            <th>Sr.No</th>
                                            <th>Quality</th>
                                            <th>Total Meter</th>
                                            <th>Total Taka</th>
                                            <th>Rate</th>
                                            <th>Amount</th>
                                            <th>#ID</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody id="mybody">
               <?php if($totalRows_Recordset1==0) {
			   }
			   else
			   {
                                     $i=0;
	  $i++;
                                     do { ?>
  <tr id="<?php echo $row_Recordset1['Ta_Invoice_Id']; ?>">
    <td width="10%"><?php echo $i++; ?></td>
    <td width="25%"><?php echo $row_Recordset1['Quality_Name']; ?></td>
    <td width="10%"><?php echo $row_Recordset1['Total_Taka']; ?></td>
   <td width="10%"><?php echo $row_Recordset1['Total_Meter']; ?></td>
    <td width="10%"><?php echo $row_Recordset1['Rate']; ?></td>
    <td class="rowDataSd" width="10%"><?php echo $row_Recordset1['Amt']; ?></td>
    <td width="10%"><?php echo $row_Recordset1['R_Id']; ?></td>
    <td align="center">
     <button type="button" class="btn-danger" rel="<?php echo $row_Recordset1['Ta_Invoice_Id']; ?>"><i class="icon-remove icon-white"></i></button>
    </td>
  </tr>
  <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); 
  } ?>
                                    </tbody>
                                </table>
<?php
}
 if($action=='insert')
{
mysql_free_result($Recordset1);
}
elseif($action=='update')
{
	mysql_free_result($Recordset1);
}
?>
