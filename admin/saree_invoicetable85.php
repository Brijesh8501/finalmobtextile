<?php session_start(); require_once('../Connections/brijesh8510.php'); 
	include("databaseconnect.php");
	if(isset($_REQUEST['action']))
{ $Saree_Invoice_Id = $_REQUEST['Saree_Invoice_Id'];
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
     $Saree_Invoice_Id = $_REQUEST['Saree_Invoice_Id']; 
	  $Saree_D_C_Id = $_REQUEST['Saree_D_C_Id'];  
	$Total_Meter = $_REQUEST['Total_Meter'];
	$Total_Pieces = $_REQUEST['Total_Pieces'];
	$Design_Id = $_REQUEST['Design_Id'];
	$R_Id = $_REQUEST['R_Id'];
	$Rate = $_REQUEST['Rate'];
	$Amt = $_REQUEST['Amt'];
	$Total_Weight = $_REQUEST['Total_Weight'];
	if($Total_Meter=="" && $Total_Weight=="" && $Total_Pieces=="" && $Design_Id<=0 && $Rate=="" && $Amt=="")
	    {
		echo '<script>alert("Above all ( Total meters, Total weight, Total piecess, Quality, Design, Rate, Amount) are required....");</script>';
		}
	elseif($Design_Id<=0)
	    {
		echo '<script>alert("Design is required....");</script>';
		}
	 elseif($Total_Meter=="")
	    {
		echo '<script>alert("Total meter is required....");</script>';
		}
		elseif($Total_Weight=="")
	    {
		echo '<script>alert("Total weight is required....");</script>';
		}
	 elseif($Total_Pieces=="")
	    {
		echo '<script>alert("Total piecess are required....");</script>';
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
	$query = mysql_query("select * from saree_invoice_1 where Saree_Invoice_Id = '".$Saree_Invoice_Id."' AND Design_Id='".$Design_Id."' ") or die(mysql_error());
$duplicate = mysql_num_rows($query);
   if($duplicate==0)
    {
		$query4 = mysql_query("select * from saree_invoice where saree_invoice.Saree_D_C_Id = '".$Saree_D_C_Id."'") or die(mysql_error());
		$res_fetch4 = mysql_fetch_array($query4);
$duplicate4 = mysql_num_rows($query4);
$res_Saree4 = $res_fetch4['Saree_Invoice_Id'];
   if($duplicate4==0)
    {
	$sql= "INSERT INTO `saree_invoice_1` (`Sa_Invoice_Id`, `Saree_Invoice_Id`, `Design_Id`,  `Total_Meter`,`Total_Weight`, `Total_Pieces`, `Rate`, `Amt`, `R_Id`) VALUES ('NULL', '$Saree_Invoice_Id', '$Design_Id',  '$Total_Meter','$Total_Weight', '$Total_Pieces', '$Rate', '$Amt', '$R_Id')";
$result = mysql_query($sql);
	}
	else
	{
		echo "<center style='color:#F00;'>This challan id : ".$Saree_D_C_Id." allready exists in invoice id : ".$res_Saree4."</center>" ;
	}
	}
	else
	{
	echo "<center style='color:#F00;'>This design is allready exists in this invoice</center> " ;
	}
	}
else if($action=='update')
{
	$query = mysql_query("select * from saree_invoiceorg where Saree_Invoice_Id = '".$Saree_Invoice_Id."' AND Design_Id='".$Design_Id."' ") or die(mysql_error());
$duplicate = mysql_num_rows($query);
   if($duplicate==0)
    {
	$sql= "INSERT INTO `saree_invoiceorg` (`Sa_Invoice_Id`, `Saree_Invoice_Id`, `Design_Id`,  `Total_Meter`,`Total_Weight`, `Total_Pieces`, `Rate`, `Amt`, `R_Id`) VALUES ('NULL', '$Saree_Invoice_Id', '$Design_Id',  '$Total_Meter','$Total_Weight', '$Total_Pieces', '$Rate', '$Amt', '$R_Id')";
$result = mysql_query($sql);
	}
	else
	{
	echo "<center style='color:#F00;'>This design is allready exists in this invoice</center> " ;
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
$query_Recordset1 = "SELECT saree_invoice_1.Sa_Invoice_Id, saree_invoice_1.Saree_Invoice_Id, quality_details.Quality_Name, design_details.Design, saree_invoice_1.Total_Meter,saree_invoice_1.Total_Weight, saree_invoice_1.Total_Pieces, saree_invoice_1.Rate, saree_invoice_1.Amt, saree_invoice_1.R_Id FROM saree_invoice_1, quality_details, design_details WHERE quality_details.Quality_Id = design_details.Quality_Id AND design_details.Design_Id = saree_invoice_1.Design_Id AND saree_invoice_1.Saree_Invoice_Id='".$Saree_Invoice_Id."' ";
$Recordset1 = mysql_query($query_Recordset1, $brijesh8510) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
}
elseif($action=='update')
{
	mysql_select_db($database_brijesh8510, $brijesh8510);
$query_Recordset1 = "SELECT saree_invoiceorg.Sa_Invoice_Id, saree_invoiceorg.Saree_Invoice_Id, quality_details.Quality_Name, design_details.Design, saree_invoiceorg.Total_Meter,saree_invoiceorg.Total_Weight, saree_invoiceorg.Total_Pieces, saree_invoiceorg.Rate, saree_invoiceorg.Amt, saree_invoiceorg.R_Id FROM saree_invoiceorg, quality_details, design_details WHERE quality_details.Quality_Id = design_details.Quality_Id AND design_details.Design_Id = saree_invoiceorg.Design_Id AND saree_invoiceorg.Saree_Invoice_Id='".$Saree_Invoice_Id."' ";
$Recordset1 = mysql_query($query_Recordset1, $brijesh8510) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
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
	      count =0;
        count += $('#mybody').children('tr').length;
        $('#Total_Entry1').html(count);
		$('#Total_Entry').val(count);
	  }
	   var add = 0;
                $(".rowDataSd").each(function() {
                    add += Number($(this).html());
                });
                $("#Total_Amt").val(add.toFixed(2));
				function Amtsum() {
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
       $.post('Saree_invoice_tabledelete.php?del=ins', {delete_id:del_id}, function(data) {
          if(data == 'true') {
		  $('#'+del_id).remove();
			alert("Deleted!");
			Count();
			Amtsum();
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
       $.post('Saree_invoice_tabledelete.php?del=upd', {delete_id:del_id}, function(data) {
          if(data == 'true') {
		  $('#'+del_id).remove();
			alert("Deleted!");
			Count();
			Amtsum();
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
                                            <th>Design</th>
                                            <th>Total Meter</th>
                                            <th>Total Weight</th>
                                            <th>Total Pieces</th>
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
  <tr id="<?php echo $row_Recordset1['Sa_Invoice_Id']; ?>">
    <td width="10%"><?php echo $i++; ?></td>
    <td width="25%"><?php echo $row_Recordset1['Quality_Name']; ?></td>
    <td width="20%"><?php echo $row_Recordset1['Design']; ?></td>
    <td width="10%"><?php echo $row_Recordset1['Total_Meter']; ?></td>
    <td width="10%"><?php echo $row_Recordset1['Total_Weight']; ?></td>
    <td width="10%"><?php echo $row_Recordset1['Total_Pieces']; ?></td>
    <td width="10%"><?php echo $row_Recordset1['Rate']; ?></td>
    <td class="rowDataSd" width="10%"><?php echo $row_Recordset1['Amt']; ?></td>
     <td width="10%"><?php echo $row_Recordset1['R_Id']; ?></td>
    <td align="center">
    <button type="button" class="btn-danger" id="#del" rel="<?php echo $row_Recordset1['Sa_Invoice_Id']; ?>"><i class="icon-remove icon-white"></i></button>
    </td>
  </tr>
  <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1));
    }  ?>
                                    </tbody>
                                </table>
                                <?php	} elseif($action=='update')
{ ?>
<table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                        <tr class="titlerow">
                                            <th>Sr.No</th>
                                            <th>Quality</th>
                                            <th>Design</th>
                                            <th>Total Meter</th>
                                            <th>Total Weight</th>
                                            <th>Total Pieces</th>
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
  <tr id="<?php echo $row_Recordset1['Sa_Invoice_Id']; ?>">
    <td width="10%"><?php echo $i++; ?></td>
    <td width="25%"><?php echo $row_Recordset1['Quality_Name']; ?></td>
    <td width="20%"><?php echo $row_Recordset1['Design']; ?></td>
    <td width="10%"><?php echo $row_Recordset1['Total_Meter']; ?></td>
    <td width="10%"><?php echo $row_Recordset1['Total_Weight']; ?></td>
    <td width="10%"><?php echo $row_Recordset1['Total_Pieces']; ?></td>
    <td width="10%"><?php echo $row_Recordset1['Rate']; ?></td>
    <td class="rowDataSd" width="10%"><?php echo $row_Recordset1['Amt']; ?></td>
     <td width="10%"><?php echo $row_Recordset1['R_Id']; ?></td>
    <td align="center">
    <button type="button" class="btn-danger" id="#del" rel="<?php echo $row_Recordset1['Sa_Invoice_Id']; ?>"><i class="icon-remove icon-white"></i></button>
    </td>
  </tr>
  <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1));
    }  ?>
                                    </tbody>
                                </table>
<?php
}
if($action=='insert')
{mysql_free_result($Recordset1);}
else if($action=='update')
{mysql_free_result($Recordset1);}
?>