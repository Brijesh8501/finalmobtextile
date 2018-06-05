<?php session_start(); require_once('../Connections/brijesh8510.php');include("databaseconnect.php");
	if(isset($_REQUEST['action']))
{ 
$T_Order_Id = $_REQUEST['T_Order_Id'];
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
     $T_Order_Id = $_REQUEST['T_Order_Id'];  
	$t2 = $_REQUEST['quality'];
	$Quantity = $_REQUEST['Quantity'];
	$Rate = $_REQUEST['Rate'];
	$Amount = $_REQUEST['Amount'];
	$R_Id = $_REQUEST['R_Id'];
	 if($t2<=0 && $Quantity=="" && $Rate=="" && $Amount=="")
	    {
		echo '<script>alert("Above all(Quality, Quantity, Rate, Amount) details are required....");</script>';
		}	
	elseif($t2<=0)
		{
			echo '<script>alert("Quality is required....");</script>';
		}
	elseif($Quantity=="")
	    {
		echo '<script>alert("Quantity is required....");</script>';
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
		$query = mysql_query("select * from taka_order_details where taka_order_details.T_Order_Id = '".$T_Order_Id."' AND taka_order_details.Quality_Id = '".$t2."'  ") or die(mysql_error());
  $duplicate = mysql_num_rows($query);
   if($duplicate==0)
    {
	$sql= "INSERT INTO  `taka_order_details` (`T_Od_Id` ,`T_Order_Id` ,`Quality_Id` ,`Quantity` ,`Rate` ,`Amount` ,`R_Id`)VALUES (NULL , '$T_Order_Id' ,  '$t2', '$Quantity',  '$Rate',  '$Amount', '$R_Id')";
$result = mysql_query($sql);
}
	else
		{
	echo "<center style='color:#F00;'>This quality is allready exists in this order</center>";
}
}
else if($action=='update')
{
	$query = mysql_query("select * from taka_order_detailsorg where taka_order_detailsorg.T_Order_Id = '".$T_Order_Id."' AND taka_order_detailsorg.Quality_Id = '".$t2."'  ") or die(mysql_error());
  $duplicate = mysql_num_rows($query);
   if($duplicate==0)
    {
	$sql= "INSERT INTO `taka_order_detailsorg` (`T_Od_Id` ,`T_Order_Id` ,`Quality_Id` ,`Quantity` ,`Rate` ,`Amount` ,
`R_Id`)VALUES (NULL , '$T_Order_Id' ,  '$t2', '$Quantity',  '$Rate',  '$Amount', '$R_Id')";
$result = mysql_query($sql);
}
	else
		{
	echo "<center style='color:#F00;'>This quality is allready exists in this order</center>";
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
$query_rsOrderss = "SELECT taka_order_details.T_Od_Id, taka_order_details.T_Order_Id, quality_details.Quality_Name, taka_order_details.Quantity, taka_order_details.Rate, taka_order_details.Amount, taka_order_details.R_Id FROM taka_order_details, quality_details WHERE quality_details.Quality_Id = taka_order_details.Quality_Id AND taka_order_details.T_Order_Id = '".$T_Order_Id."' ";
$rsOrderss = mysql_query($query_rsOrderss, $brijesh8510) or die(mysql_error());
$row_rsOrderss = mysql_fetch_assoc($rsOrderss);
$totalRows_rsOrderss = mysql_num_rows($rsOrderss);
}
elseif($action=='update')
{
	mysql_select_db($database_brijesh8510, $brijesh8510);
$query_rsOrderss = "SELECT taka_order_detailsorg.T_Od_Id, taka_order_detailsorg.T_Order_Id, quality_details.Quality_Name, taka_order_detailsorg.Quantity, taka_order_detailsorg.Rate, taka_order_detailsorg.Amount, taka_order_detailsorg.R_Id FROM taka_order_detailsorg, quality_details WHERE quality_details.Quality_Id = taka_order_detailsorg.Quality_Id AND taka_order_detailsorg.T_Order_Id = '".$T_Order_Id."' ";
$rsOrderss = mysql_query($query_rsOrderss, $brijesh8510) or die(mysql_error());
$row_rsOrderss = mysql_fetch_assoc($rsOrderss);
$totalRows_rsOrderss = mysql_num_rows($rsOrderss);
}
?>
<script src="assets/js/googleapi.js"></script>
<script>
$(document).ready(function(){
	 function amount() {
	  var add = 0;
                $(".rowDataSd").each(function() {
                    add += Number($(this).html());
                });
                $("#Total_Amt").val(add.toFixed(2));
	 }
	  var add = 0;
                $(".rowDataSd").each(function() {
                    add += Number($(this).html());
                });
                $("#Total_Amt").val(add.toFixed(2));
	 var Total_Amt = parseFloat($('#Total_Amt').val()) || 0;
    var Discount = parseFloat($('#Discount').val()) || 0;
     var Percentage = (Total_Amt/100)*Discount;
	 var Grandtotal = Total_Amt - Percentage;
    $('#Grandtotal').val(Grandtotal.toFixed(2));
	function Amt_T() {
		 var Total_Amt = parseFloat($('#Total_Amt').val()) || 0;
    var Discount = parseFloat($('#Discount').val()) || 0;
     var Percentage = (Total_Amt/100)*Discount;
	 var Grandtotal = Total_Amt - Percentage;
    $('#Grandtotal').val(Grandtotal.toFixed(2));
	}
	  var Grandtotal = parseFloat($('#Grandtotal').val()) || 0;
    var Advance_Amt = parseFloat($('#Advance_Amt').val()) || 0;
     var Re_Amt = Grandtotal-Advance_Amt;
    $('#Re_Amt').val(Re_Amt.toFixed(2)); 
	function Grand_T() {
		var Grandtotal = parseFloat($('#Grandtotal').val()) || 0;
    var Advance_Amt = parseFloat($('#Advance_Amt').val()) || 0;
     var Re_Amt = Grandtotal-Advance_Amt;
    $('#Re_Amt').val(Re_Amt.toFixed(2)); 
	}
	 <?php if($action=='insert')
	 {
		 ?>
    $('.btn-danger').click(function(){
       var del_id = $(this).attr('rel');
       $.post('takaordertabledelete.php?del=ins', {delete_id:del_id}, function(data) {
          if(data == 'true') {
            $('#'+del_id).remove();
			alert('Deleted');
			amount();
			Amt_T();
			Grand_T();
          } else {
            alert('Could not delete!');
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
       $.post('takaordertabledelete.php?del=upd', {delete_id:del_id}, function(data) {
          if(data == 'true') {
            $('#'+del_id).remove();
			alert('Deleted');
			amount();
			Amt_T();
			Grand_T();
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
                                           <th>Quality</th>
                                            <th>Quantity</th>
                                             <th>Rate</th>
                                            <th>Amount</th>
                                             <th>#ID</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
      <?php if($totalRows_rsOrderss==0) {
	  }
	  else
	  {
                                     $i=0;
									$i++;
                                     do { ?>
  <tr id="<?php echo $row_rsOrderss['T_Od_Id']; ?>">
    <td width="10%"><?php echo $i++; ?></td>
    <td width="30%"><?php echo $row_rsOrderss['Quality_Name']; ?></td>
    <td width="10%"><?php echo $row_rsOrderss['Quantity']; ?></td>
    <td width="10%"><?php echo $row_rsOrderss['Rate']; ?></td>
    <td class="rowDataSd" width="10%"><?php echo $row_rsOrderss['Amount']; ?></td>
    <td width="10%"><?php echo $row_rsOrderss['R_Id']; ?></td>
     <td align="center"> 
       <button type="button" class="btn-danger" rel="<?php echo $row_rsOrderss['T_Od_Id']; ?>"><i class="icon-remove icon-white"></i></button>
      </td>
  </tr>
  <?php } while ($row_rsOrderss = mysql_fetch_assoc($rsOrderss)); 
                           } ?>
                                    </tbody>
                                </table>
 <?php
}
elseif($action=='update')
{
	?>
    <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                        <tr>
                                            <th>Sr.No</th>
                                           <th>Quality</th>
                                            <th>Quantity</th>
                                             <th>Rate</th>
                                            <th>Amount</th>
                                             <th>#ID</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
      <?php if($totalRows_rsOrderss==0) {
	  }
	  else
	  {
                                     $i=0;
									$i++;
                                     do { ?>
  <tr id="<?php echo $row_rsOrderss['T_Od_Id']; ?>">
    <td width="10%"><?php echo $i++; ?></td>
    <td width="30%"><?php echo $row_rsOrderss['Quality_Name']; ?></td>
    <td width="10%"><?php echo $row_rsOrderss['Quantity']; ?></td>
    <td width="10%"><?php echo $row_rsOrderss['Rate']; ?></td>
    <td class="rowDataSd" width="10%"><?php echo $row_rsOrderss['Amount']; ?></td>
    <td width="10%"><?php echo $row_rsOrderss['R_Id']; ?></td>
     <td align="center"> 
       <button type="button" class="btn-danger" rel="<?php echo $row_rsOrderss['T_Od_Id']; ?>"><i class="icon-remove icon-white"></i></button>
      </td>
  </tr>
  <?php } while ($row_rsOrderss = mysql_fetch_assoc($rsOrderss)); 
                           } ?>
                                    </tbody>
                                </table>
 <?php
}
							   if($action=='insert')
							   {
mysql_free_result($rsOrderss);
}
							    elseif($action=='update')
							   {
								   mysql_free_result($rsOrderss);
							   }
?>
