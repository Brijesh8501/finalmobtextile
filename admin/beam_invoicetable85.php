<?php session_start(); require_once('../Connections/brijesh8510.php'); error_reporting(0); 
	include("databaseconnect.php");
	if(isset($_REQUEST['action']))
{
$Beam_Invoice_Id = $_REQUEST['Beam_Invoice_Id'];
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
     $Beam_D_C_Id = $_REQUEST['Beam_D_C_Id'];
     $Beam_Invoice_Id = $_REQUEST['Beam_Invoice_Id']; 
	$Total_Beam = $_REQUEST['Total_Beam'];
	$Ends = $_REQUEST['Ends'];
	$Quantity = $_REQUEST['Quantity'];
	$Quality_Id = $_REQUEST['Quality_Id'];
	$Rate = $_REQUEST['Rate'];
	$Amount = $_REQUEST['Amount'];
	$R_Id = $_REQUEST['R_Id'];
	if($Total_Beam=="" && $Ends=="" && $Quantity=="" && $Quality_Id<=0 && $Rate=="" && $Amount=="")
	    {
		echo '<script>alert("Above all(Total Beam, Ends, Quantity, Quality, Rate, Amount) details are required....");</script>';
		}	
	elseif($Total_Beam=="")
	    {
		echo '<script>alert("Total beam is required....");</script>';
		}
		elseif($Ends=="")
		{
			echo '<script>alert("Ends is required....");</script>';
		}
		elseif($Quantity=="")
		{
			echo '<script>alert("Quantity is required....");</script>';
		}
		elseif($Quality_Id<=0)
		{
			echo '<script>alert("Quality is required....");</script>';
		}
		elseif($Rate=="")
		{
			echo '<script>alert("Rate is required....");</script>';
		}
		elseif($Amount=="")
		{
			echo '<script>alert("Amount is required....");</script>';
		}
	    else
		{
			if($action=='insert')
             {
				  $query1= mysql_query("select * from beam_invoice where beam_invoice.Beam_D_C_Id = '".$Beam_D_C_Id."'") or die(mysql_error());
				  $query_fetch = mysql_fetch_array($query1);
  $duplicate1 = mysql_num_rows($query1);
  $query_fetch_invoice = $query_fetch['Beam_Invoice_Id'];
   if($duplicate1==0)
    {	
	 $query = mysql_query("select * from beam_invoiceorg where beam_invoiceorg.Quality_Id = '".$Quality_Id."' AND beam_invoiceorg.Beam_Invoice_Id = '".$Beam_Invoice_Id."' AND beam_invoiceorg.Ends = '".$Ends."' ") or die(mysql_error());
  $duplicate = mysql_num_rows($query);
   if($duplicate==0)
    {	
	 $query4 = mysql_query("select * from beam_invoice_2 where beam_invoice_2.Quality_Id = '".$Quality_Id."' AND beam_invoice_2.Beam_Invoice_Id = '".$Beam_Invoice_Id."' AND beam_invoice_2.Ends = '".$Ends."' ") or die(mysql_error());
  $duplicate4 = mysql_num_rows($query4);
   if($duplicate4==0)
    {	
	$sql = "INSERT INTO `beam_invoice_2` (`Be_Invoice_Id`, `Beam_Invoice_Id`, `Total_Beam`, `Ends`, `Quantity`, `Quality_Id`, `Rate`, `Amount`, `R_Id`) VALUES (NULL, '$Beam_Invoice_Id', '$Total_Beam', '$Ends', '$Quantity', '$Quality_Id', '$Rate', '$Amount', '$R_Id')";
$result = mysql_query($sql);
	}
	else
	{
		echo '<center style="color:#F00;">'."This quality and ends allready exists you cannot re-enter this Quality and ends in this invoice</center>";
	}
         }
		else
		{
	echo '<center style="color:#F00;">'."This quality and ends allready exists you cannot re-enter this Quality and ends in invoice id : ".$Beam_Invoice_Id."</center>";
}
			 }
			 else
			 {
				 echo '<center style="color:#F00;">'."This challan id allready exists in invoice id : ".$query_fetch_invoice." you cannot re-enter this challan id in another invoice</center>";
			 }
}
else if($action=='update')
{
	 $query = mysql_query("select * from beam_invoiceorg where beam_invoiceorg.Quality_Id = '".$Quality_Id."' AND beam_invoiceorg.Beam_Invoice_Id = '".$Beam_Invoice_Id."' AND beam_invoiceorg.Ends = '".$Ends."' ") or die(mysql_error());
  $duplicate = mysql_num_rows($query);
   if($duplicate==0)
    {	
	$sql = "INSERT INTO `beam_invoiceorg` (`Be_Invoice_Id`, `Beam_Invoice_Id`, `Total_Beam`, `Ends`, `Quantity`, `Quality_Id`, `Rate`, `Amount`, `R_Id`) VALUES (NULL, '$Beam_Invoice_Id', '$Total_Beam', '$Ends', '$Quantity', '$Quality_Id', '$Rate', '$Amount', '$R_Id')";
$result = mysql_query($sql);
         }
		else
		{
	echo '<center style="color:#F00;">'."This quality and ends allready exists you cannot re-enter this Quality and ends in invoice id : ".$Beam_Invoice_Id."</center>";
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
$query_Recordset1 = "SELECT beam_invoice_2.Be_Invoice_Id, beam_invoice_2.Beam_Invoice_Id, beam_invoice_2.Total_Beam, beam_invoice_2.Ends, beam_invoice_2.Quantity, quality_details.Quality_Name, beam_invoice_2.Rate, beam_invoice_2.Amount, beam_invoice_2.R_Id FROM beam_invoice_2, quality_details WHERE beam_invoice_2.Quality_Id = quality_details.Quality_Id AND beam_invoice_2.Beam_Invoice_Id ='".$Beam_Invoice_Id."' order by beam_invoice_2.Be_Invoice_Id asc";
$Recordset1 = mysql_query($query_Recordset1, $brijesh8510) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
}
elseif($action=='update')
{
mysql_select_db($database_brijesh8510, $brijesh8510);
$query_Recordset1 = "SELECT  beam_invoiceorg.Be_Invoice_Id,  beam_invoiceorg.Beam_Invoice_Id,  beam_invoiceorg.Total_Beam,  beam_invoiceorg.Ends,  beam_invoiceorg.Quantity, quality_details.Quality_Name,  beam_invoiceorg.Rate,  beam_invoiceorg.Amount, beam_invoiceorg.R_Id FROM  beam_invoiceorg, quality_details WHERE  beam_invoiceorg.Quality_Id = quality_details.Quality_Id AND  beam_invoiceorg.Beam_Invoice_Id ='".$Beam_Invoice_Id."' order by beam_invoiceorg.Be_Invoice_Id asc";
$Recordset1 = mysql_query($query_Recordset1, $brijesh8510) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
}
 ?>
<script src="assets/js/googleapi.js">
</script>
<script>
 $(document).ready(function(){
	 var add1 = 0;
                $(".rowDataSd").each(function() {
                    add1 += Number($(this).html());
                });
                $("#Total_Amt").val(add1.toFixed(2));
function amountminus() {
	     var add1 = 0;
                $(".rowDataSd").each(function() {
                    add1 += Number($(this).html());
                });
                $("#Total_Amt").val(add1.toFixed(2));
	}
 var add1 = 0;
                $(".rowDataSd1").each(function() {
                    add1 += Number($(this).html());
                });
                $("#Total_B").val(add1);
function beamminus() {
	     var add1 = 0;
                $(".rowDataSd1").each(function() {
                    add1 += Number($(this).html());
                });
                $("#Total_B").val(add1);
	}
	 var Total_Amt = parseFloat($('#Total_Amt').val()) || 0;
    var Grand_Amt = parseFloat($('#Grand_Amt').val()) || 0;
     var additionalamount = Grand_Amt-Total_Amt;
    $('#additionalamount').val(additionalamount.toFixed(2));   
function addtnlamt() {  
	 var Total_Amt = parseFloat($('#Total_Amt').val()) || 0;
    var Grand_Amt = parseFloat($('#Grand_Amt').val()) || 0;
     var additionalamount = Grand_Amt-Total_Amt;
    $('#additionalamount').val(additionalamount.toFixed(2));    
} 
	 <?php
	 if($action=='insert')
{
	?>
    $('.btn-danger').click(function(){
       var del_id = $(this).attr('rel');
       $.post('beam_invoicetabledelete.php?del=ins', {delete_id:del_id}, function(data) {
          if(data == 'true') {
            $('#'+del_id).remove();
			alert('Deleted');
			amountminus();
			beamminus();
			addtnlamt();
          } else {
            alert('Could not delete!');
			window.location="loginadmin.php?msg";
          }
       });
    });
<?php	} elseif($action=='update')
{ ?>
 $('.btn-danger').click(function(){
       var del_id = $(this).attr('rel');
       $.post('beam_invoicetabledelete.php?del=upd', {delete_id:del_id}, function(data) {
          if(data == 'true') {
            $('#'+del_id).remove();
			alert('Deleted');
			amountminus();
			beamminus();
			addtnlamt();
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
 <?php
	 if($action=='insert')
{
	?>
<table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                        <tr class="titlerow">
                                            <th>Sr.No</th>
                                            <th>Total Beam</th>
                                            <th>Ends</th>
                                            <th>Quantity(Kgs)</th>
                                            <th>Quality</th>
                                            <th>Rate</th>
                                            <th>Amount</th>
                                             <th>#ID</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody id="mybody">
    <?php if($totalRows_Recordset1==0)
	{
	}
	else
	{
 $i=0;$i++;
                                     do { ?>
  <tr id="<?php echo $row_Recordset1['Be_Invoice_Id']; ?>" class="tableRow">
    <td><?php echo $i++; ?></td>
    <td class="rowDataSd1"><?php echo $row_Recordset1['Total_Beam']; ?></td>
    <td><?php echo $row_Recordset1['Ends']; ?></td>
    <td><?php echo $row_Recordset1['Quantity']; ?></td>
    <td><?php echo $row_Recordset1['Quality_Name']; ?></td>
    <td><?php echo $row_Recordset1['Rate']; ?></td>
    <td class="rowDataSd"><?php echo $row_Recordset1['Amount']; ?></td>
    <td><?php echo $row_Recordset1['R_Id']; ?></td>
    <td align="center">
     <button type="button" class="btn-danger" id="#del" rel="<?php echo $row_Recordset1['Be_Invoice_Id']; ?>"></button>
    </td>
  </tr>
  <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
                                    <?php } ?>
                                    </tbody>
                                </table>
                                <?php	} elseif($action=='update')
{ ?>
<table class="table table-striped table-bordered table-hover" valign="center" id="sum_table">
                                    <thead>
                                        <tr class="titlerow">
                                            <th>Sr.No</th>
                                            <th>Total Beam</th>
                                            <th>Ends</th>
                                            <th>Quantity(Kgs)</th>
                                            <th>Quality</th>
                                            <th>Rate</th>
                                            <th>Amount</th>
                                             <th>#ID</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody id="mybody">
    <?php if($totalRows_Recordset1==0)
	{
	}
	else
	{
$i=0; $i++;
                                     do { ?>
  <tr id="<?php echo $row_Recordset1['Be_Invoice_Id']; ?>" class="tableRow">
    <td><?php echo $i++; ?></td>
    <td class="rowDataSd1"><?php echo $row_Recordset1['Total_Beam']; ?></td>
    <td><?php echo $row_Recordset1['Ends']; ?></td>
    <td><?php echo $row_Recordset1['Quantity']; ?></td>
    <td><?php echo $row_Recordset1['Quality_Name']; ?></td>
    <td><?php echo $row_Recordset1['Rate']; ?></td>
    <td class="rowDataSd"><?php echo $row_Recordset1['Amount']; ?></td>
    <td><?php echo $row_Recordset1['R_Id']; ?></td>
    <td align="center">
     <button type="button" class="btn-danger" id="#del1" rel="<?php echo $row_Recordset1['Be_Invoice_Id']; ?>"></button>
    </td>
  </tr>
  <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
                                    <?php } ?>
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
