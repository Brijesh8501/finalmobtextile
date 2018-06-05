<?php 
include("logcode.php"); error_reporting(0);  include("databaseconnect.php");
if(isset($_REQUEST['action']))
{
	$action = $_REQUEST['action'];
    if($action == "insert")
	{
	$decodeurl = $_REQUEST['Taka_D_C_Id'];
	$durl = urldecode($decodeurl); 
	$turl = str_replace("'"," ",$durl);
	$urls = explode(" ",$turl);
	 $Taka_D_C_Id = $urls[1];
	$sql = "SELECT taka_d_c_1.Taka_D_C_Id, taka_d_c_1.Taka_D_C_Date, customer_details.Customer_Id, customer_details.Cu_En_Name, broker_details1.Broker_Id, broker_details1.B_Name, taka_d_c_1.T_Order_Id, taka_d_c_1.Total_Taka FROM taka_d_c_1, customer_details, broker_details1 WHERE customer_details.Customer_Id = taka_d_c_1.Customer_Id AND broker_details1.Broker_Id = taka_d_c_1.Broker_Id AND taka_d_c_1.Taka_D_C_Id = '".$Taka_D_C_Id."' ";
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
	$Taka_D_C_Id = $row['Taka_D_C_Id'];
	$Taka_D_C_Date = $row['Taka_D_C_Date'];
     $Cu_En_Name = $row['Cu_En_Name'];
	$Customer_Id = $row['Customer_Id'];
	$Broker_Id = $row['Broker_Id'];
	$B_Name = $row['B_Name'];
	$Taka_Invoice_Id = getNewInvoiceID();
	date_default_timezone_set('Asia/Calcutta');
	$Taka_Invoice_Date = date('Y-m-d');
	 include("webrenew.php");
}
 if($action=='update')
	{
		$decodeurl = $_REQUEST['Taka_Invoice_Id'];
	$durl = urldecode($decodeurl); 
	$turl = str_replace("'"," ",$durl);
	$urls = explode(" ",$turl);
	$Taka_Invoice_Id = $urls[1];
		$sql = "SELECT taka_invoice.Taka_Invoice_Id, taka_invoice.Taka_Invoice_Date, taka_invoice.Taka_D_C_Id, taka_invoice.Taka_D_C_Date, customer_details.Customer_Id, customer_details.Cu_En_Name, broker_details1.Broker_Id, broker_details1.B_Name, taka_invoice.Total_Amt, taka_invoice.Discount,taka_invoice.Interest, taka_invoice.Grandtotal, taka_invoice.Entry_Id FROM taka_invoice, customer_details, broker_details1 WHERE customer_details.Customer_Id = taka_invoice.Customer_Id AND broker_details1.Broker_Id = taka_invoice.Broker_Id AND Taka_Invoice_Id = '".$Taka_Invoice_Id."' ";
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
	$Taka_Invoice_Id = $row['Taka_Invoice_Id'];	
	$Taka_Invoice_Date = $row['Taka_Invoice_Date'];		
	$Taka_D_C_Id = $row['Taka_D_C_Id'];
	$Taka_D_C_Date = $row['Taka_D_C_Date'];
	$Cu_En_Name = $row['Cu_En_Name'];
	$Customer_Id = $row['Customer_Id'];
	$Broker_Id = $row['Broker_Id'];
	$B_Name = $row['B_Name'];
	$Total_Amt = $row['Total_Amt'];
	$Discount = $row['Discount'];
	$Interest = $row['Interest'];
	$Grandtotal = $row['Grandtotal'];
	$Entry_Id = $row['Entry_Id'];
	date_default_timezone_set('Asia/Calcutta');
	 include("webrenew.php");
	$sel_check_entry = "select sum(Amt) as sum_amt from taka_invoiceorg where Taka_Invoice_Id='$Taka_Invoice_Id'";
	$sel_check_exe = mysql_query($sel_check_entry);
	$sel_check_fetch = mysql_fetch_array($sel_check_exe);
	if($sel_check_fetch[0]==$Total_Amt)
	{
	}
	else
	{
		$msg_check_takainvoice ='<strong style="color:#F00;">'.'* Please verify entry of invoice id : '.$Taka_Invoice_Id.' challan id : '.$Taka_D_C_Id.' and then update this invoice which is required</strong>';
	}
}
}
	 if(isset ($_REQUEST['submit']))
{
//insert
if(!isset($_SESSION['User']))
{ } 
else
{
   $Taka_Invoice_Id = $_REQUEST['Taka_Invoice_Id']; 
	$Taka_Invoice_Date = $_REQUEST['Taka_Invoice_Date'];
	$Taka_D_C_Id = $_REQUEST['Taka_D_C_Id'];
	$Taka_D_C_Date = $_REQUEST['Taka_D_C_Date'];
	$Customer_Id = $_REQUEST['Customer_Id'];
	$Broker_Id = $_REQUEST['Broker_Id'];
	$Discount = $_REQUEST['Discount'];
	$Interest = $_REQUEST['Interest'];
	$Total_Amt = $_REQUEST['Total_Amt'];
	$Grandtotal = $_REQUEST['Grandtotal'];
	$Entry_Id = $row_result['Registration_Id'];
	$query = mysql_query("select * from taka_invoice where Taka_D_C_Id='".$Taka_D_C_Id."' ") or die(mysql_error());
$duplicate = mysql_num_rows($query);
   if($duplicate==0)
    {
	$sql1= "INSERT INTO  `taka_invoice` (`Taka_Invoice_Id` ,`Taka_Invoice_Date` ,`Taka_D_C_Id` ,`Taka_D_C_Date` ,`Customer_Id` ,`Broker_Id` ,`Total_Amt` ,`Discount` , `Interest`,`Grandtotal` ,`Entry_Id`)VALUES (NULL , '$Taka_Invoice_Date', '$Taka_D_C_Id', '$Taka_D_C_Date',  '$Customer_Id',  '$Broker_Id',  '$Total_Amt',  '$Discount', '$Interest',  '$Grandtotal', '$Entry_Id')";
$result1 = mysql_query($sql1);
$sel_sub = "select * from taka_invoice_1 where taka_invoice_1.Taka_Invoice_Id = '$Taka_Invoice_Id'";
$sel_exe = mysql_query($sel_sub);
while($sel_fetch = mysql_fetch_array($sel_exe))
{
	$ins_sub = "insert into taka_invoiceorg (Ta_Invoice_Id,Taka_Invoice_Id,Quality_Id,Total_Taka,Total_Meter,Rate,Amt,R_Id) values(NULL,'".$sel_fetch[1]."','".$sel_fetch[2]."','".$sel_fetch[3]."','".$sel_fetch[4]."','".$sel_fetch[5]."','".$sel_fetch[6]."','".$sel_fetch[7]."')";
	mysql_query($ins_sub);
}
$del_sub = "delete from taka_invoice_1 where taka_invoice_1.Taka_Invoice_Id='$Taka_Invoice_Id'";
$del_exe = mysql_query($del_sub);
$sel_sub_or = "select * from taka_invoiceorg where taka_invoiceorg.Taka_Invoice_Id = '$Taka_Invoice_Id'";
$sel_exe_or = mysql_query($sel_sub_or);
$total_sel_row = mysql_num_rows($sel_exe_or);
if($total_sel_row==0)
{
	$msg_error='Something gone wrong so your sub entry is not inserted in your last inserted invoice, now please update that invoice first';
}
else
{
	$msg_error='Record inserted';
}
 $insertGoTo = "taka_invoice85_list?msg_error=$msg_error";
  echo '<script>window.location="'.$insertGoTo.'";</script>';
	}
	else
		{
	 echo '<script>alert("This challan id is allready exists....");</script>';
}
}
}
if(isset ($_REQUEST['update']))
      {
//update
if(!isset($_SESSION['User']))
{ } 
else
{
      $Taka_Invoice_Id = $_REQUEST['Taka_Invoice_Id']; 
	$Taka_Invoice_Date = $_REQUEST['Taka_Invoice_Date'];
	$Taka_D_C_Id = $_REQUEST['Taka_D_C_Id'];
	$Taka_D_C_Date = $_REQUEST['Taka_D_C_Date'];
	$Customer_Id = $_REQUEST['Customer_Id'];
	$Broker_Id = $_REQUEST['Broker_Id'];
	$Discount = $_REQUEST['Discount'];
	$Interest = $_REQUEST['Interest'];
	$Total_Amt = $_REQUEST['Total_Amt'];
	$Grandtotal = $_REQUEST['Grandtotal'];
	$Entry_Id = $row_result['Registration_Id'];
$sql2 = "update `taka_invoice` set `Taka_Invoice_Date` = '$Taka_Invoice_Date' ,`Taka_D_C_Id` = '$Taka_D_C_Id' ,`Taka_D_C_Date` = '$Taka_D_C_Date' ,`Customer_Id` = '$Customer_Id' ,`Broker_Id` = '$Broker_Id' ,`Total_Amt` = '$Total_Amt' ,`Discount` = '$Discount' , `Interest` = '$Interest',`Grandtotal` = '$Grandtotal',`Entry_Id` = '$Entry_Id' where Taka_Invoice_Id = '".$Taka_Invoice_Id."' ";
$result2 = mysql_query($sql2);
 $updateGoTo = "taka_invoice85_list?msg";
  echo '<script>window.location="'.$updateGoTo.'";</script>';
}
	  }
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
       <?php include("sidemenu.php") ?>
                <div class="inner">
                    <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" align="center">TAKA INVOICE</h1>
                </div>
            </div>
<div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <div id="div-1" class="accordion-body collapse in body">
            <form class="form-horizontal" method="post" name="form1" <?php if($action =='insert') { ?>onsubmit="if(submitting) {
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
                    <label for="text2" class="control-label col-lg-5">Customer :</label>
                    <div class="col-lg-7">
                    <input type="text" id="Cu_En_Name" placeholder="" name="Cu_En_Name" value="<?php echo $Cu_En_Name; ?>" class="form-control" readonly />
                    <input type="hidden" name="Customer_Id" value="<?php echo $Customer_Id; ?>" />
                    </div>
                </div>
                        </div>
                       <div class="col-lg-4">
                       <div class="form-group">
                        <label class="control-label col-lg-5" >Invoice Date :</label>
                        <div class="col-lg-7">
                              <input class="form-control" type="text" name="Taka_Invoice_Date" id="Taka_Invoice_Date" value="<?php echo $Taka_Invoice_Date; ?>" readonly />
                        </div>
                    </div>
                        </div>
                         <div class="col-lg-4">
                         <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Invoice ID :</label>
                    <div class="col-lg-7">
                    <input type="text" id="Taka_Invoice_Id" placeholder="" class="form-control" name="Taka_Invoice_Id" value="<?php echo $Taka_Invoice_Id; ?>" readonly />
                    </div>
                </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-4">
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Broker :</label>
                    <div class="col-lg-7">
                    <input type="text" id="B_Name" class="form-control" name="B_Name" value="<?php echo $B_Name; ?>" readonly />
                    <input type="hidden" name="Broker_Id" value="<?php echo $Broker_Id; ?>" />
                    </div>
                </div>
                        </div>
                        <div class="col-lg-4">
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Challan Date :</label>
                    <div class="col-lg-7">
                    <input type="text" id="text2" placeholder="" name="Taka_D_C_Date" value="<?php echo $Taka_D_C_Date; ?>" class="form-control" readonly />
                    </div>
                </div>
                        </div>
                        <div class="col-lg-4">
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Challan ID :</label>
                    <div class="col-lg-7">
                    <input type="text" id="Taka_D_C_Id" placeholder="" class="form-control" name="Taka_D_C_Id" value="<?php echo $Taka_D_C_Id; ?>" readonly />
                    </div>
                </div>
                        </div>
                    </div>
                     <div class="form-group row">
                        <div class="col-lg-4">
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Quality :</label>
                    <div class="col-lg-7">
                    <input type="text" id='countryname_1' placeholder="" class="form-control" name="countryname_1"  />
                    <input type="hidden" name="action" id="action" value="<?php echo $action;?>"/>
                    </div>
                </div>
                            
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Total Taka :</label>
                    <div class="col-lg-7">
                    <input type="text" id='country_no_1' placeholder="" class="form-control" name="country_no_1" onkeypress="return isNumberKey(event)" readonly/>
                    </div>
                </div>
                        </div>
                        <div class="col-lg-4">
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-6">Total Meter :</label>
                    <div class="col-lg-6">
                    <input type="text" id='phone_code_1' placeholder="" class="form-control" name="phone_code_1" onkeypress="return isDecimalNumberKey(event)" readonly/>
                    <input type="hidden" name="country_1" id="country_1" />
                    </div>
                </div>
                        </div>
                    </div>
                     <div class="form-group row">
                        <div class="col-lg-4">
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Rate :</label>
                    <div class="col-lg-6">
                    <input type="text" id="Rate" placeholder="Rate" class="form-control" name="Rate" onkeypress="return isDecimalNumberKey(event)" />
                    <input type="hidden" id="R_Id" name="R_Id" value="<?php echo $row_result['Registration_Id']; ?>"  />
                    </div>
                </div>
                        </div>
                        <div class="col-lg-4">
                        </div>
                        <div class="col-lg-4">
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-6">Amount :</label>
                    <div class="col-lg-6">
                    <input type="text" id="Amt" placeholder="" class="form-control" name="Amt" readonly />
                    </div>
                </div>
                        </div>
                        </div>
                    <div align="right">
                        <?php
                                            if($days_remaining<=0)
{}
elseif($days_remaining>0)
{
?>	
                        <input type="button" value="Add" class="btn btn-primary btn-grad " name="Add1" id="Add1" />
                      <?php } ?>      
                      </div>
                    <hr />
                        <div class="col-lg-12" >
                         <div class="row">
                <div class="col-lg-12" >
                            <div class="table-responsive" id="table" >
                                  </div>
                        </div>
                    </div>
                     </div>
                        <hr />
                      <div class="col-lg-4">
                        </div>
                        <div class="col-lg-3">
                        </div>
                        <div class="col-lg-5">
                         <div style="color:#F00" align="right" id="Total_Entry1">Only 8 entry acceptable in one invoice</div><input type="hidden" name="Total_Entry" id="Total_Entry" value=""  />
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-6">Total Amount :</label>
                    <div class="col-lg-6">
                    <input type="text" id="Total_Amt" placeholder="" class="form-control" name="Total_Amt" value="<?php echo $Total_Amt; ?>" readonly  />
                    </div>
                </div>
                        </div>
                         <div class="col-lg-4">
                         </div>
                          <div class="col-lg-3">
                          </div>
                        <div class="col-lg-5">
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-6">Discount(%) :</label>
                    <div class="col-lg-6">
                    <input type="text" id="Discount" placeholder="" class="form-control" name="Discount" value="<?php echo $Discount; ?>" onkeypress="return isDecimalNumberKey(event)" />
                    </div>
                </div>
                        </div>
                         <div class="col-lg-4">
                         </div>
                          <div class="col-lg-3">
                          </div>
                        <div class="col-lg-5">
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-6">Interest(%) :</label>
                    <div class="col-lg-6">
                    <input type="text" id="Interest" placeholder="" class="form-control" name="Interest" value="<?php echo $Interest; ?>" onkeypress="return isDecimalNumberKey(event)" />
                    </div>
                </div>
                        </div>
                        <div class="col-lg-4">
                         </div>
                          <div class="col-lg-3">
                          </div>
                        <div class="col-lg-5">
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-6">Grand Total :</label>
                    <div class="col-lg-6">
                    <input type="text" id="Grandtotal" placeholder="" class="form-control" name="Grandtotal" value="<?php echo $Grandtotal; ?>" readonly />
                    </div>
                </div>
                        </div> 
                       <?php if($action=='update')
						{
							?>
                        <div class="col-lg-4">
                        </div>
                        <div class="col-lg-3">
                        </div>
                        <div class="col-lg-5">
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-6">Entry #ID :</label>
                    <div class="col-lg-6">
                    <input type="text" id="Entry_Id" placeholder="" class="form-control" name="Entry_Id"  value="<?php echo $Entry_Id; ?>"  readonly/>
                    </div>
                </div>
                        </div>
                        <?php 
						}
						?>  
                   <div style="text-align:center" class="form-actions no-margin-bottom">
                        <?php
						 if($days_remaining<=0)
{
	echo "<strong style='color:#F00;'>* Please renew your website</strong>";
} 
							if($action=='update')
                             {
								  echo $msg_check_takainvoice;
								 }
							 ?>
                             <?php
							if($action=="update" )
                             {
							?>
                                            <a href="taka_invoice85_list"><input type="button" value=" Back" class="btn btn-inverse btn-lg " name="back"/></a> <input type="submit" value="Update Invoice" class="btn btn-primary btn-lg " name="update" />
                        <?php }
						else if($action=="insert")
						{
						?>
                                  <a href="taka_d_c_list"><input type="button" value=" Back" class="btn btn-inverse btn-lg " name="back1"/></a> 
                                   <?php
								   if($days_remaining<=0)
{}
elseif($days_remaining>0)
{
	?>
                                  <input type="submit" value="Submit Invoice" class="btn btn-primary btn-lg " name="submit" />
                        <?php }}?>
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
			$('#countryname_1').autocomplete({
	source: function( request, response ) {
		$.ajax({
			url : 'taka_invoice_autocompleteajax.php?type=country_table&Taka_D_C_Id=<?php echo $Taka_D_C_Id; ?>',
			dataType: "json",
			method: 'post',
			data: {
			   name_startsWith: request.term,
			   type: 'country_table',
			   row_num : 1
			},
			 success: function( data ) {
				 response( $.map( data, function( item ) {
				 	var code = item.split("|");
					return {
						label: code[0],
						value: code[0],
						data : item
					}
				}));
			}
		});
	},
	autoFocus: true,	      	
	minLength: 0,
	select: function( event, ui ) {
		var names = ui.item.data.split("|");						
		$('#country_no_1').val(names[1]);
		$('#phone_code_1').val(names[2]);
		$('#country_1').val(names[3]);
		
	}		      	
});
		sql="?Taka_Invoice_Id=<?php echo $Taka_Invoice_Id; ?>&action=<?php echo $action;?>";
		$("#table").load("Taka_invoicetable85.php"+sql);
});	
<?php include("shortcutkeys.php");?>	
</SCRIPT>
<script src="assets/js/takainvoice.js"></script>
<script src="assets/js/jointjquerydateandpicker.js"></script>
</body>
</html>
<?php
function getNewInvoiceID()
{
	include("databaseconnect.php");
	$sql="select max(Taka_Invoice_Id)+1 from taka_invoice";
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
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
 ob_flush(); ?>