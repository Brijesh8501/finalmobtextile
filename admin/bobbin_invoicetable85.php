<?php session_start(); require_once('../Connections/brijesh8510.php'); error_reporting(0);
include("databaseconnect.php");
	if(isset($_REQUEST['action']))
{
	$Bobbin_Invoice_Id = $_REQUEST['Bobbin_Invoice_Id'];
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
//insert
     $Bobbin_Invoice_Id = $_REQUEST['Bobbin_Invoice_Id']; 
	$Total_Cartoon = $_REQUEST['Total_Cartoon'];
	$Total_Weight = $_REQUEST['Total_Weight'];
	$Quality_Id = $_REQUEST['Quality_Id'];
	$Bo_D_C_Id = $_REQUEST['Bo_D_C_Id'];
	$Rate = $_REQUEST['Rate'];
	$Amt = $_REQUEST['Amt'];
	$R_Id = $_REQUEST['R_Id'];
	if($Total_Cartoon=="" && $Total_Weight=="" && $Quality_Id<=0 && $Rate=="" && $Amt=="")
	    {
		echo '<script>alert("Above all(Total Cartoon, Total Weight, Quality, Rate, Amount) details are required....");</script>';
		}	
	elseif($Total_Cartoon=="")
	    {
		echo '<script>alert("Cartoon is required....");</script>';
		}
		elseif($Total_Weight=="")
		{
			echo '<script>alert("Total weight is required....");</script>';
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
		 $query = mysql_query("select * from bobbin_invoice where bobbin_invoice.Bo_D_C_Id = '".$Bo_D_C_Id."'") or die(mysql_error());
		 $query_fetch = mysql_fetch_array($query);
  $duplicate = mysql_num_rows($query);
  $query_fetch_invoice = $query_fetch['Bobbin_Invoice_Id'];
   if($duplicate==0)
    {
	 $query1 = mysql_query("select * from bobbin_invoice_2 where bobbin_invoice_2.Quality_Id = '".$Quality_Id."' AND bobbin_invoice_2.Bobbin_Invoice_Id = '".$Bobbin_Invoice_Id."' ") or die(mysql_error());
  $duplicate1 = mysql_num_rows($query1);
   if($duplicate1==0)
    {	
	$sql= "INSERT INTO `bobbin_invoice_2` (`Bo_Invoice_Id`, `Bobbin_Invoice_Id`, `Total_Cartoon`, `Total_Weight`, `Quality_Id`, `Rate`, `Amt`, `R_Id`) VALUES (NULL, '$Bobbin_Invoice_Id', '$Total_Cartoon', '$Total_Weight', '$Quality_Id', '$Rate', '$Amt', '$R_Id')";
$result = mysql_query($sql);
 }
	else
		{
	echo '<center style="color:#F00;">'."This Quality allready exists you cannot re-enter this quality in invoice id&nbsp;: ".$Bobbin_Invoice_Id."</center>";
}
		}
		else
		{	
	echo '<center style="color:#F00;">'."This challan id allready exists in invoice id : ".$query_fetch_invoice." you cannot re-enter this challan id in another invoice</center>";
	}
	}
else if($action=='update')
{
	 $query1 = mysql_query("select * from bobbin_invoiceorg where bobbin_invoiceorg.Quality_Id = '".$Quality_Id."' AND bobbin_invoiceorg.Bobbin_Invoice_Id = '".$Bobbin_Invoice_Id."' ") or die(mysql_error());
  $duplicate1 = mysql_num_rows($query1);
   if($duplicate1==0)
    {	
	$sql= "INSERT INTO `bobbin_invoiceorg` (`Bo_Invoice_Id`, `Bobbin_Invoice_Id`, `Total_Cartoon`, `Total_Weight`, `Quality_Id`, `Rate`, `Amt`, `R_Id`) VALUES (NULL, '$Bobbin_Invoice_Id', '$Total_Cartoon', '$Total_Weight', '$Quality_Id', '$Rate', '$Amt', '$R_Id')";
$result = mysql_query($sql);
 }
	else
		{
	echo '<center style="color:#F00;">'."This Quality allready exists you cannot re-enter this quality in invoice id&nbsp;: ".$Bobbin_Invoice_Id."</center>";
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
$query_Recordset1 = "SELECT bobbin_invoice_2.Bo_Invoice_Id, bobbin_invoice_2.Bobbin_Invoice_Id, bobbin_invoice_2.Total_Cartoon, bobbin_invoice_2.Total_Weight, quality_details.Quality_Name, bobbin_invoice_2.Rate, bobbin_invoice_2.Amt, bobbin_invoice_2.R_Id FROM bobbin_invoice_2, quality_details WHERE quality_details.Quality_Id = bobbin_invoice_2.Quality_Id AND bobbin_invoice_2.Bobbin_Invoice_Id='".$Bobbin_Invoice_Id."' ";
$Recordset1 = mysql_query($query_Recordset1, $brijesh8510) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
}
elseif($action=='update')
{
	mysql_select_db($database_brijesh8510, $brijesh8510);
$query_Recordset1 = "SELECT bobbin_invoiceorg.Bo_Invoice_Id, bobbin_invoiceorg.Bobbin_Invoice_Id, bobbin_invoiceorg.Total_Cartoon, bobbin_invoiceorg.Total_Weight, quality_details.Quality_Name, bobbin_invoiceorg.Rate, bobbin_invoiceorg.Amt, bobbin_invoiceorg.R_Id FROM bobbin_invoiceorg, quality_details WHERE quality_details.Quality_Id = bobbin_invoiceorg.Quality_Id AND bobbin_invoiceorg.Bobbin_Invoice_Id='".$Bobbin_Invoice_Id."' ";
$Recordset1 = mysql_query($query_Recordset1, $brijesh8510) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
}
?>
<script src="assets/js/googleapi.js">
</script>
<script>
$(document).ready(function(){
	var add = 0;
                $(".rowDataSd").each(function() {
                    add += Number($(this).html());
                });
                $("#Total_Cart").val(add);
function cartoonminus() {
	     var add = 0;
                $(".rowDataSd").each(function() {
                    add += Number($(this).html());
                });
                $("#Total_Cart").val(add);
	}
function amountminus() {
	     var add1 = 0;
                $(".rowDataSd1").each(function() {
                    add1 += Number($(this).html());
                });
                $("#Total_Amt").val(add1.toFixed(2));
	}
 var add1 = 0;
                $(".rowDataSd1").each(function() {
                    add1 += Number($(this).html());
                });
                $("#Total_Amt").val(add1.toFixed(2));
				 var Total_Amt = parseFloat($('#Total_Amt').val()) || 0;
    var Grand_Amt = parseFloat($('#Grand_Amt').val()) || 0;
     var additionalamount = Grand_Amt-Total_Amt;
    $('#Addtnl_Amt').val(additionalamount.toFixed(2)); 
				function addtnlamt() {  
	 var Total_Amt = parseFloat($('#Total_Amt').val()) || 0;
    var Grand_Amt = parseFloat($('#Grand_Amt').val()) || 0;
     var additionalamount = Grand_Amt-Total_Amt;
    $('#Addtnl_Amt').val(additionalamount.toFixed(2));    
} 
	<?php if($action=='insert')
{
	?>
  $('.btn-danger').click(function(){
       var del_id = $(this).attr('rel');
       $.post('bobbin_invoicetabledelete.php?del=ins', {delete_id:del_id}, function(data) {
          if(data == 'true') {
	        $('#'+del_id).remove();
			alert('Deleted');
			amountminus();
			cartoonminus();
			addtnlamt();
          } else {
            alert('Could not delete!');
			window.location="loginadmin.php?msg";
          }
       });
    });
<?php	}
elseif($action=='update')
{
	?>
	 $('.btn-danger').click(function(){
       var del_id = $(this).attr('rel');
       $.post('bobbin_invoicetabledelete.php?del=upd', {delete_id:del_id}, function(data) {
          if(data == 'true') {
	        $('#'+del_id).remove();
			alert('Deleted');
			amountminus();
			cartoonminus();
			addtnlamt();
          } else {
            alert('Could not delete!');
			window.location="loginadmin.php?msg";
          }
       });
    });
<?php }	?>
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
                                            <th>Cartoons / Bags / Cases</th>
                                            <th>Weight</th>
                                            <th>Quality</th>
                                           <th>Rate</th>
                                            <th>Amount</th>
                                            <th>#ID</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
    <?php if($totalRows_Recordset1==0)
	{
	}
	else
	{
                                     $i=0;
									$i++;
                                     do { ?>
  <tr id="<?php echo $row_Recordset1['Bo_Invoice_Id']; ?>" class="tableRow">
    <td><?php echo $i++; ?></td>
    <td class="rowDataSd"><?php echo $row_Recordset1['Total_Cartoon']; ?></td>
    <td><?php echo $row_Recordset1['Total_Weight']; ?></td>
    <td><?php echo $row_Recordset1['Quality_Name']; ?></td>
    <td><?php echo $row_Recordset1['Rate']; ?></td>
    <td class="rowDataSd1"><?php echo $row_Recordset1['Amt']; ?></td>
    <td><?php echo $row_Recordset1['R_Id']; ?></td>
    <td align="center">
     <button type="button" class="btn-danger" id="#del" rel="<?php echo $row_Recordset1['Bo_Invoice_Id']; ?>"><i class="icon-remove icon-white"></i></button>
    </td>
  </tr>
  <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); 
   } ?>
  </tbody>
</table>
<?php	}
elseif($action=='update')
{
	?>
    <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                        <tr>
                                            <th>Sr.No</th>
                                            <th>Cartoons / Bags / Cases</th>
                                            <th>Weight</th>
                                            <th>Quality</th>
                                           <th>Rate</th>
                                            <th>Amount</th>
                                            <th>#ID</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
    <?php if($totalRows_Recordset1==0)
	{
	}
	else
	{
                                     $i=0;
									$i++;
                                     do { ?>
  <tr id="<?php echo $row_Recordset1['Bo_Invoice_Id']; ?>" class="tableRow">
    <td><?php echo $i++; ?></td>
    <td class="rowDataSd"><?php echo $row_Recordset1['Total_Cartoon']; ?></td>
    <td><?php echo $row_Recordset1['Total_Weight']; ?></td>
    <td><?php echo $row_Recordset1['Quality_Name']; ?></td>
    <td><?php echo $row_Recordset1['Rate']; ?></td>
    <td class="rowDataSd1"><?php echo $row_Recordset1['Amt']; ?></td>
    <td><?php echo $row_Recordset1['R_Id']; ?></td>
    <td align="center">
     <button type="button" class="btn-danger" id="#del1" rel="<?php echo $row_Recordset1['Bo_Invoice_Id']; ?>"><i class="icon-remove icon-white"></i></button>
    </td>
  </tr>
  <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); 
   } ?>
  </tbody>
</table>
<?php }	
 if($action=='insert')
{
mysql_free_result($Recordset1);
}
							    elseif($action=='update')
							   {
								   mysql_free_result($Recordset1);
								   }
?>