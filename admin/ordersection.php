<?php include("logcode.php"); require_once('../Connections/brijesh8510.php'); error_reporting(0);
include("databaseconnect.php");
if(isset($_REQUEST['action']))
{
	$action = $_REQUEST['action'];
	if($action=='update')
	{
	$decodeurl = $_REQUEST['Order_Id'];
	$durl = urldecode($decodeurl); 
	$turl = str_replace("'"," ",$durl);
	$urls = explode(" ",$turl);
	$Order_Id = $urls[1];
	$sql = "select * from order_master where Order_Id = '".$Order_Id."' ";
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
	$Order_Id = $row['Order_Id'];
	$Om_Date = $row['Om_Date'];
	$t2 = $row['Customer_Id'];
	$t3 = $row['Broker_Id'];
	$Total_Amt = $row['Total_Amt'];
	$Discount = $row['Discount'];
	$Grandtotal = $row['Grandtotal'];
	$Advance_Amt = $row['Advance_Amt'];
	$Delivery_Date = $row['Delivery_Date'];
	$Remark = $row['Remark'];
	$Status = $row['Status'];
	$Re_Amt = $row['Re_Amt'];
	$Entry_Id = $row['Entry_Id'];
	date_default_timezone_set('Asia/Calcutta');
	include("webrenew.php");
	$sel_check_entry = "select sum(Amount) as sum_amount from order_detailsorg where Order_Id='$Order_Id'";
	$sel_check_exe = mysql_query($sel_check_entry);
	$sel_check_fetch = mysql_fetch_array($sel_check_exe);
	if($sel_check_fetch[0]==$Total_Amt)
	{
	}
	else
	{
		$msg_check_amount ='<strong style="color:#F00;">'.'* Please verify all the data and then update this order which is required</strong>';
	}}
else if($action=='insert')
{
	$Order_Id = getNewOrderID();
	date_default_timezone_set('Asia/Calcutta');
	$Om_Date = date('Y-m-d');
	$Delivery_Date = date('Y-m-d');
	include("webrenew.php");
	}
}
	 if(isset($_REQUEST['submit']))
{
//insert
     if(!isset($_SESSION['User']))
{ 
} 
else
{
	$Om_Date = $_REQUEST['Om_Date'];
	$t2 = $_REQUEST['customer'];
	$t3 = $_REQUEST['broker'];
	$Total_Amt = $_REQUEST['Total_Amt'];
	$Discount = $_REQUEST['Discount'];
	$Grandtotal = $_REQUEST['Grandtotal'];
	$Advance_Amt = $_REQUEST['Advance_Amt'];
	$Delivery_Date = $_REQUEST['Delivery_Date'];
	$Remark = $_REQUEST['autosize'];
	$Status = $_REQUEST['Status'];
	$Re_Amt = $_REQUEST['Re_Amt'];
	$Entry_Id = $row_result['Registration_Id'];
	$sql= "INSERT INTO  `order_master` (`Order_Id` ,`Om_Date` ,`Customer_Id` ,`Broker_Id`,`Total_Amt`,`Discount`,`Grandtotal` ,`Advance_Amt`,`Delivery_Date`,`Remark`,`Status`,`Re_Amt`,`Entry_Id`)
VALUES (NULL , '$Om_Date' ,  '$t2',  '$t3',  '$Total_Amt',  '$Discount',  '$Grandtotal',  '$Advance_Amt',  '$Delivery_Date',  '$Remark',  '$Status',  '$Re_Amt', '$Entry_Id')";
$result = mysql_query($sql);
 $sel_sub = "select * from order_details where order_details.Order_Id = '$Order_Id'";
$sel_exe = mysql_query($sel_sub);
while($sel_fetch = mysql_fetch_array($sel_exe))
{
	$ins_sub = "insert into order_detailsorg (Od_Id,Order_Id,Design_Id,Quantity,Rate,Amount,R_Id) values(NULL,'".$sel_fetch[1]."','".$sel_fetch[2]."','".$sel_fetch[3]."','".$sel_fetch[4]."','".$sel_fetch[5]."','".$sel_fetch[6]."')";
	mysql_query($ins_sub);
}
$del_sub = "delete from order_details where order_details.Order_Id = '$Order_Id'";
$del_exe = mysql_query($del_sub);
$sel_sub_or = "select * from order_detailsorg where order_detailsorg.Order_Id = '$Order_Id'";
$sel_exe_or = mysql_query($sel_sub_or);
$total_sel_row = mysql_num_rows($sel_exe_or);
if($total_sel_row==0)
{
	$msg_error='Something gone wrong so your sub entry is not inserted in your last inserted entry, now please update that entry first';
}
else
{
	$msg_error='Record inserted';
}
 $insertGoTo = "order_listpage?msg_error=$msg_error";
  echo '<script>window.location="'.$insertGoTo.'";</script>';
}
}
if(isset($_REQUEST['update']))
      {
	 if(!isset($_SESSION['User']))
{ } 
else
{	  
    $Order_Id = $_REQUEST['Order_Id'];
    $Om_Date = $_REQUEST['Om_Date'];
	$t2 = $_REQUEST['customer'];
	$t3 = $_REQUEST['broker'];
	$Total_Amt = $_REQUEST['Total_Amt'];
	$Discount = $_REQUEST['Discount'];
	$Grandtotal = $_REQUEST['Grandtotal'];
	$Advance_Amt = $_REQUEST['Advance_Amt'];
	$Delivery_Date = $_REQUEST['Delivery_Date'];
	$Remark = $_REQUEST['autosize'];
	$Status = $_REQUEST['Status'];
	$Re_Amt = $_REQUEST['Re_Amt'];
	$Entry_Id = $row_result['Registration_Id'];
	$sql1="UPDATE `order_master` SET `Om_Date` = '$Om_Date', `Customer_Id` = '$t2', `Broker_Id` = '$t3', `Total_Amt` = '$Total_Amt', `Discount` = '$Discount', `Grandtotal` = '$Grandtotal', `Advance_Amt` = '$Advance_Amt', `Delivery_Date` = '$Delivery_Date', `Remark` = '$Remark', `Status` = '$Status', `Re_Amt` = '$Re_Amt', `Entry_Id` = '$Entry_Id' WHERE `order_master`.`Order_Id` = '".$Order_Id."' ";
	$result1 = mysql_query($sql1);
	$updateGoTo = "order_listpage?msg";
  echo '<script>window.location="'.$updateGoTo.'";</script>';
	  }}
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
mysql_select_db($database_brijesh8510, $brijesh8510);
$query_broo = "SELECT Broker_Id, B_Name FROM broker_details1";
$broo = mysql_query($query_broo, $brijesh8510) or die(mysql_error());
$row_broo = mysql_fetch_assoc($broo);
$totalRows_broo = mysql_num_rows($broo);
mysql_select_db($database_brijesh8510, $brijesh8510);
$query_rsCustomer = "SELECT Customer_Id, Cu_En_Name FROM customer_details";
$rsCustomer = mysql_query($query_rsCustomer, $brijesh8510) or die(mysql_error());
$row_rsCustomer = mysql_fetch_assoc($rsCustomer);
$totalRows_rsCustomer = mysql_num_rows($rsCustomer);
?>
<!DOCTYPE html>
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<head>
      <meta charset="UTF-8" />
    <title>Shingori Textile</title>
     <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
    <noscript>
    <style> html {display:none; }</style>
     <META HTTP-EQUIV="Refresh" CONTENT="0; URL=javascripterror.php">
    </noscript>
    <link rel="shortcut icon" href="Icons/st85.png">
   <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="assets/css/main.css" />
  <link rel="stylesheet" href="assets/css/joint-jquery-ui-datepicker.css">
</head>
<body>
<?php include("sidemenu.php"); ?>
               <div class="inner">
                    <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" align="center">SAREE ORDER</h1>
                </div>
            </div>
<div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <div id="div-1" class="accordion-body collapse in body">
            <form class="form-horizontal" method="post" <?php if($action =='insert') { ?>onsubmit="if(submitting) {
            alert('The record is being submitted, please wait a moment...');
            submit.disabled = true; 
            return false;
            }
            if(checkQuotee(this))
            {
            submit.value = 'Submitting...';
            submitting = true;
            return true; 
            }
            return false;" <?php } elseif($action=='update') { ?> onsubmit="if(submitting) {
            alert('The record is being updated, please wait a moment...');
            update.disabled = true; 
            return false;
            }
            if(checkQuotee(this))
            {
            update.value = 'Updating...';
            submitting = true;
            return true; 
            }
            return false;"<?php } ?>>
            <div class="form-group row">
            <div class="col-lg-4">
            <div class="form-group">
<label class="control-label col-lg-4">Customer :</label>
<div class="col-lg-8">
  <select name="customer" class="form-control" id="customer">
    <option value="">--Select--</option>
    <?php
do {  
if($t2==$row_rsCustomer['Customer_Id'] )
{
	$cmp = " selected='selected'";
}
else
{
	$cmp = "";
}  
?>
    <option value="<?php echo $row_rsCustomer['Customer_Id']?>" <?php echo $cmp;?>><?php echo $row_rsCustomer['Cu_En_Name']?></option>
    <?php
} while ($row_rsCustomer = mysql_fetch_assoc($rsCustomer));
  $rows = mysql_num_rows($rsCustomer);
  if($rows > 0) {
      mysql_data_seek($rsCustomer, 0);
	  $row_rsCustomer = mysql_fetch_assoc($rsCustomer);
  }
?>
  </select>
  </div>
</div>
                        </div>
                       <div class="col-lg-4">
                       <div class="form-group">
                        <label class="control-label col-lg-5" >Order Date :</label>
                        <div class="col-lg-7">
                               <input class="form-control" type="text"  value="<?php echo $Om_Date; ?>" name="Om_Date" id="Om_Date" readonly />
                         </div>
                    </div>
               </div>
                         <div class="col-lg-4">
                         <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Order ID :</label>
                    <div class="col-lg-7">
                    <input type="text" id="Order_Id" placeholder="" class="form-control" value="<?php echo $Order_Id; ?>" name="Order_Id" readonly />
                    </div>
                </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-4">
                        <div id="broker">
                        </div>   
                        </div>
                        <div class="col-lg-4">
                        </div>
                        <div class="col-lg-4">
</div>
                        </div>
                    <div class="form-group row" >
                      <div id="d1">
                       <div class="col-lg-4">
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Design :</label>
                    <div class="col-lg-7">
                    <input type="text" id="Design" placeholder="" class="form-control" name="Design"/>
                    <input type="hidden" id="design_id" name="design_id"  />
                    </div>
                </div>
                        </div>
                        <div class="col-lg-4">
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Quality :</label>
                    <div class="col-lg-7">
                    <input type="text" id="Quality_Name" placeholder="" class="form-control" name="Quality_Name" readonly/>
                   <input type="hidden" id="quality" name="quality"  />
                    </div>
                </div>
</div> 
  </div>                          
                        <div class="col-lg-4">
                            <div class="form-group">
                    <label  class="control-label col-lg-5">Quantity :</label>
                    <div class="col-lg-7">
                    <input type="text" id="Quantity" placeholder="Piecess" class="form-control" name="Quantity" onkeypress="return isNumberKey(event)"/>
                    <input type="hidden" id="R_Id" name="R_Id" value="<?php echo $row_result['Registration_Id']; ?>"  />
                    </div>
                </div>
                        </div>
                    </div>
                    <div class="form-group row" >
                    <div class="col-lg-4">
                        <div class="form-group">
                    <label  class="control-label col-lg-5">Rate :</label>
                    <div class="col-lg-7">
                    <input type="text" id="Rate" placeholder="Rate" class="form-control" name="Rate" onkeypress="return isDecimalNumberKey(event)" />
                    <input type="hidden" name="action" id="action" value="<?php echo $action;?>"/>
                    </div>
                </div>
                        </div>
                        <div class="col-lg-4">
                        </div>
                        <div class="col-lg-4">
                        <div class="form-group">
                    <label  class="control-label col-lg-5">Amount :</label>
                    <div class="col-lg-7">
                    <input type="text" id="Amount" placeholder="" class="form-control" name="Amount" readonly/>
                    </div>
                </div>
                        </div>
                        </div>
                   <div align="right">
                       <?php if($days_remaining<=0)
{}
elseif($days_remaining>0)
{
	?>
                        <input type="button" value="Add" class="btn btn-primary btn-grad " name="Add1" id="Add1" />
                        <?php } ?>
                        </div>
                        <hr/>
                        <div class="col-lg-12" align="center">
                         <div class="row">
                <div class="col-lg-12">
                            <div class="table-responsive" id="table">
                            </div>
                        </div>
                    </div>
                        </div>
                       <hr />
                        <div class="form-group row">
                        <div class="col-lg-5">
                        <div class="form-group">
                        <label class="control-label col-lg-6" >Delivery Date :</label>
                        <div class="col-lg-6">
                              <input class="form-control" type="text"  value="<?php echo $Delivery_Date; ?>" name="Delivery_Date" id="Delivery_Date" readonly />
                        </div>
                    </div>
                    </div>
                         <div class="col-lg-2">
                         </div>
                         <div class="col-lg-5">
                         <div class="form-group">
                    <label  class="control-label col-lg-6">Total Amount :</label>
                    <div class="col-lg-6">
                    <input type="text" id="Total_Amt" placeholder="" class="form-control" name="Total_Amt" value="<?php echo $Total_Amt; ?>" readonly/>
                    </div>
                </div>
                         </div>
                         </div>
                         <div class="form-group row">
                          <div class="col-lg-5">
                          <div class="form-group">
    <label class="control-label col-lg-6">Status :</label>
    <div class="col-lg-6">
      <select name="Status" class="form-control" id="Status">
        <option value="">--Select--</option>
	<option value="Processing" <?php if($Status == 'Processing') { echo 'selected = \"selected\"'; } ?>>Processing</option>
       <option value="Completed" <?php if($Status == 'Completed') { echo 'selected = \"selected\"'; } ?>>Completed</option>
      </select>
      </div>
</div>
                          </div>
                        <div class="col-lg-2">
                        </div>
                       <div class="col-lg-5">
                       <div class="form-group">
                    <label for="text2" class="control-label col-lg-6">Discount(%) :</label>
                    <div class="col-lg-6">
                    <input type="text" id="Discount" placeholder="" class="form-control" name="Discount" value="<?php echo $Discount; ?>" onkeypress="return isDecimalNumberKey(event)" />
                    </div>
                </div>
                         </div>
                         </div>
                         <div class="form-group row">
                         <div class="col-lg-5">
                         <div class="form-group">
                    <label for="autosize"  class="control-label col-lg-6">Description :</label>
                    <div class="col-lg-6">
                     <textarea id="autosize" class="form-control" name="autosize" placeholder="Any information related to this order"><?php echo $Remark;  ?></textarea>
                     <span id="error1" style="color:#F00";></span>
                    </div>
                </div>
                          </div>
                        <div class="col-lg-2">
                        </div>
                       <div class="col-lg-5">
                       <div class="form-group">
                    <label  class="control-label col-lg-6">Grand Total :</label>
                    <div class="col-lg-6">
                    <input type="text" id="Grandtotal" placeholder="" class="form-control" name="Grandtotal" value="<?php echo $Grandtotal; ?>" readonly />
                    </div>
                </div>
                         </div>
                         </div>
                         <div class="form-group row">
                          <div class="col-lg-5">
                          <div class="form-group">
                    <label  class="control-label col-lg-6">Advance Amount :</label>
                    <div class="col-lg-6">
                    <input type="text" id="Advance_Amt" placeholder="" class="form-control" name="Advance_Amt" value="<?php echo $Advance_Amt; ?>" onkeypress="return isDecimalNumberKey(event)" />
                    </div>
                </div>
                          </div>
                        <div class="col-lg-2">
                        <?php if($action=='update')
						{
							?>
                        <div class="form-group">
                    <label  class="control-label col-lg-7">Entry #ID :</label>
                    <div class="col-lg-5">
                         <input type="text" id="Entry_Id" placeholder="" class="form-control" name="Entry_Id" value="<?php echo $Entry_Id; ?>" readonly />
                        </div>
                </div>
                <?php
						}
						?>
                        </div>
                          <div class="col-lg-5">
                          <div class="form-group">
                    <label  class="control-label col-lg-6">Remaining Amount :</label>
                    <div class="col-lg-6">
                    <input type="text" id="Re_Amt" placeholder="" class="form-control" name="Re_Amt" value="<?php echo $Re_Amt; ?>" readonly/>
                    </div>
                </div>
                          </div>
                          </div>
                    <div style="text-align:center" class="form-actions no-margin-bottom">
                        <?php
							if($action=='update')
                             {
								  echo $msg_check_amount;
							 }
							?>
                            <a href="order_listpage"><input type="button" value=" Back" class="btn btn-inverse btn-lg " /></a>
                            <?php
							if($action=='update')
                             {
							?>
                             <input type="submit" name="update" value=" Update Order " class="btn btn-primary btn-lg " />
                             <?php }
						else if($action=='insert')
						{
							    if($days_remaining<=0)
{
	echo "<strong style='color:#F00;'>* Please renew your website</strong>";
}
                                            if($days_remaining<=0)
{}
elseif($days_remaining>0)
{
?>	
                        <input type="submit" name="submit" value="Submit Order" class="btn btn-primary btn-lg " />
                        <?php } }?>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
     </div>
   <?php include("footer.php"); ?>
     <script src="assets/js/shortcut.js"></script>
<script src="assets/js/googleapi.js"></script>
<script>
$(document).ready(function(){
	<?php if($action=='update'){?>
	$("#customer").val("<?php echo $t2; ?>");
		t5=$("#customer").val();
		var s="?customer="+t5+"&broker=<?php echo $t3; ?>";
		$("#broker").load("broajaxcustomer.php"+s);
		$("#broker").val("<?php echo $t3; ?>");
		$("#broker option[value=<?php echo $t3; ?>]").attr("selected",true); <?php } ?>
		sql="?Order_Id=<?php echo $Order_Id; ?>&action=<?php echo $action;?>";
		$("#table").load("ordertable.php"+sql);
});
<?php include("shortcutkeys.php");?>
   </SCRIPT>
 <script src="assets/js/sareeorder.js"></script>
<script src="assets/js/jointjquerydateandpicker.js"></script>
</body>
</html>
<?php
function getNewOrderID()
{
	include("databaseconnect.php");
	$sql="select max(Order_Id)+1 from order_master";
	$result= mysql_query($sql);
	$row= mysql_fetch_array($result);
	if($row != null && $row[0] > 0)
		{
			$new_id =  $row[0];
		}
		else
		{
			$new_id = '1';
		}
		return $new_id;
	}
mysql_free_result($broo);
mysql_free_result($rsCustomer);
ob_flush(); ?>