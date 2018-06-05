<?php include("logcode.php"); error_reporting(0);
include("databaseconnect.php");	
if(isset($_REQUEST['action']))
{
	$action = $_REQUEST['action'];
	if($action == "insert")
	{	
	$decodeurl = $_REQUEST['Bo_D_C_Id'];
	$durl = urldecode($decodeurl); 
	$turl = str_replace("'"," ",$durl);
	$urls = explode(" ",$turl);
	$Bo_D_C_Id = $urls[1];
	$sql = "SELECT bobbin_d_c.Bo_D_C_Id,company_deetaails.C_Name,company_deetaails.Company_Id, broker_details1.B_Name, broker_details1.Broker_Id FROM bobbin_d_c, company_deetaails, broker_details1 WHERE company_deetaails.Company_Id = bobbin_d_c.Company_Id AND broker_details1.Broker_Id = bobbin_d_c.Broker_Id AND bobbin_d_c.Bo_D_C_Id = '".$Bo_D_C_Id."' ";
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
	$Bobbin_Invoice_Id = getNewInvoiceID();
	date_default_timezone_set('Asia/Calcutta');
	$Bobbin_Invoice_Date = date('Y-m-d');
	$C_Name = $row['C_Name'];
	$Company_Id = $row['Company_Id'];
	$B_Name = $row['B_Name'];
	$Broker_Id = $row['Broker_Id'];
	$Bo_D_C_Id = $row['Bo_D_C_Id'];
	include("webrenew.php");
}
 if($action=='update')
	{
		$decodeurl = $_REQUEST['Bobbin_Invoice_Id'];
	$durl = urldecode($decodeurl); 
	$turl = str_replace("'"," ",$durl);
	$urls = explode(" ",$turl);
	$Bobbin_Invoice_Id = $urls[1];
	$sql ="SELECT bobbin_invoice.Bobbin_Invoice_Id, bobbin_invoice.Bobbin_Invoice_Date, bobbin_invoice.Invoice_No, bobbin_invoice.Bo_D_C_Id, company_deetaails.Company_Id, company_deetaails.C_Name, broker_details1.Broker_Id, broker_details1.B_Name, bobbin_invoice.Total_Amt, bobbin_invoice.Addtnl_Amt, bobbin_invoice.Grand_Amt, bobbin_invoice.Total_Cart, bobbin_invoice.Entry_Date, bobbin_invoice.Entry_Id FROM bobbin_invoice, company_deetaails, broker_details1 WHERE company_deetaails.Company_Id = bobbin_invoice.Company_Id AND broker_details1.Broker_Id = bobbin_invoice.Broker_Id AND Bobbin_Invoice_Id = '".$Bobbin_Invoice_Id."' ";
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
	$Bobbin_Invoice_Id = $row['Bobbin_Invoice_Id'];	
	$Bobbin_Invoice_Date = $row['Bobbin_Invoice_Date'];		
	$Bo_D_C_Id = $row['Bo_D_C_Id'];
	$Total_Cart = $row['Total_Cart'];
	$C_Name = $row['C_Name'];
	$Company_Id = $row['Company_Id'];
	$B_Name = $row['B_Name'];
	$Broker_Id = $row['Broker_Id'];
	$Entry_Date = $row['Entry_Date'];
	$Addtnl_Amt = $row['Addtnl_Amt'];
	$Grand_Amt = $row['Grand_Amt'];
	$Total_Amt = $row['Total_Amt'];
	$Invoice_No = $row['Invoice_No'];
	$Entry_Id = $row['Entry_Id'];
	date_default_timezone_set('Asia/Calcutta');
	include("webrenew.php");
	$sel_check_entry = "select sum(Total_Cartoon) as sum_cartoon,sum(Amt) as sum_amt from bobbin_invoiceorg where Bobbin_Invoice_Id='$Bobbin_Invoice_Id'";
	$sel_check_exe = mysql_query($sel_check_entry);
	$sel_check_fetch = mysql_fetch_array($sel_check_exe);
	if($sel_check_fetch[0]==$Total_Cart && $sel_check_fetch[1]==$Total_Amt)
	{
	}
	else
	{
		$msg_check_bobbininvoice ='<strong style="color:#F00;">'.'* Please verify entry of invoice id : '.$Bobbin_Invoice_Id.' challan id : '.$Bo_D_C_Id.' and then update this invoice which is required</strong>';
	}
	}
}
	 if(isset($_REQUEST['submit']))
{
//insert
if(!isset($_SESSION['User']))
{ } 
else
{
	$Bobbin_Invoice_Date = $_REQUEST['Bobbin_Invoice_Date'];
	$Bo_D_C_Id = $_REQUEST['Bo_D_C_Id'];
	$Company_Id = $_REQUEST['Company_Id'];
	$Broker_Id = $_REQUEST['Broker_Id'];
	$Invoice_No = $_REQUEST['Invoice_No'];
	$Total_Cart = $_REQUEST['Total_Cart'];
	date_default_timezone_set('Asia/Calcutta');
	$Entry_Date = date('Y-m-d    h:i:s a');
	$Entry_Id = $row_result['Registration_Id'];
	$Addtnl_Amt = $_REQUEST['Addtnl_Amt'];
	$Grand_Amt = $_REQUEST['Grand_Amt'];
	$Total_Amt = $_REQUEST['Total_Amt'];
    $query = mysql_query("select * from bobbin_invoice where Bo_D_C_Id = '".$Bo_D_C_Id."' ") or die(mysql_error());
    $duplicate = mysql_num_rows($query);
    if($duplicate==0)
        {
	$sql= "INSERT INTO `bobbin_invoice` (`Bobbin_Invoice_Id`, `Bobbin_Invoice_Date`, `Invoice_No`, `Bo_D_C_Id`, `Company_Id`, `Broker_Id`, `Total_Amt`, `Addtnl_Amt`, `Grand_Amt`, `Total_Cart`, `Entry_Date`, `Entry_Id`) VALUES (NULL, '$Bobbin_Invoice_Date', '$Invoice_No', '$Bo_D_C_Id', '$Company_Id', '$Broker_Id', '$Total_Amt', '$Addtnl_Amt', '$Grand_Amt', '$Total_Cart', '$Entry_Date', '$Entry_Id')";
$result = mysql_query($sql);
 $sel_sub = "select * from bobbin_invoice_2 where bobbin_invoice_2.Bobbin_Invoice_Id = '$Bobbin_Invoice_Id'";
$sel_exe = mysql_query($sel_sub);
while($sel_fetch = mysql_fetch_array($sel_exe))
{
	$ins_sub = "insert into bobbin_invoiceorg (Bo_Invoice_Id,Bobbin_Invoice_Id,Total_Cartoon,	Total_Weight,Quality_Id,Rate,Amt,R_Id) values(NULL,'".$sel_fetch[1]."','".$sel_fetch[2]."','".$sel_fetch[3]."','".$sel_fetch[4]."','".$sel_fetch[5]."','".$sel_fetch[6]."','".$sel_fetch[7]."')";
	mysql_query($ins_sub);
}
$del_sub = "delete from bobbin_invoice_2 where bobbin_invoice_2.Bobbin_Invoice_Id='$Bobbin_Invoice_Id'";
$del_exe = mysql_query($del_sub);
$sel_sub_or = "select * from bobbin_invoiceorg where bobbin_invoiceorg.Bobbin_Invoice_Id = '$Bobbin_Invoice_Id'";
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
 $insertGoTo = "bobbininovielist?msg_error=$msg_error";
  echo '<script>window.location="'.$insertGoTo.'";</script>';
		}
		else
		{
	 echo '<script>alert("This challan id is allready exists....");</script>';
	}
}
}
if(isset($_REQUEST['update']))
      {
//update
     if(!isset($_SESSION['User']))
{ } 
else
{
     $Bobbin_Invoice_Id = $_REQUEST['Bobbin_Invoice_Id'];
	 $Bobbin_Invoice_Date = $_REQUEST['Bobbin_Invoice_Date'];
	$Bo_D_C_Id = $_REQUEST['Bo_D_C_Id'];
	$Invoice_No = $_REQUEST['Invoice_No'];
	$Company_Id = $_REQUEST['Company_Id'];
	$Broker_Id = $_REQUEST['Broker_Id'];
	$Total_Cart = $_REQUEST['Total_Cart'];
	$Entry_Date = $_REQUEST['Entry_Date'];
	$Entry_Id = $row_result['Registration_Id'];
	$Addtnl_Amt = $_REQUEST['Addtnl_Amt'];
	$Grand_Amt = $_REQUEST['Grand_Amt'];
	$Total_Amt = $_REQUEST['Total_Amt'];
$sql= "UPDATE `bobbin_invoice` SET `Bobbin_Invoice_Date` = '$Bobbin_Invoice_Date', `Invoice_No` = '$Invoice_No', `Bo_D_C_Id` = '$Bo_D_C_Id', `Company_Id` = '$Company_Id', `Broker_Id` = '$Broker_Id',`Total_Amt` = '$Total_Amt', `Addtnl_Amt` = '$Addtnl_Amt', `Grand_Amt` = '$Grand_Amt', `Total_Cart` = '$Total_Cart', `Entry_Date` = '$Entry_Date', `Entry_Id` = '$Entry_Id' WHERE `bobbin_invoice`.`Bobbin_Invoice_Id` = '".$Bobbin_Invoice_Id."' ";
$result = mysql_query($sql);
 $updateGoTo = "bobbininovielist?msg";
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
                    <h1 class="page-header" align="center">BOBBIN INOVICE</h1>
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
                    <label for="text2" class="control-label col-lg-5">Company :</label>
                    <div class="col-lg-7">
                    <input type="text" id="C_Name" placeholder="" name="C_Name" value="<?php echo $C_Name; ?>" class="form-control" readonly />
                    <input type="hidden" name="Company_Id" value="<?php echo $Company_Id; ?>" />
                    </div>
                </div>
                        </div>
                       <div class="col-lg-4">
                       <div class="form-group">
                        <label class="control-label col-lg-5" >Date :</label>
                        <div class="col-lg-7">
                              <input class="form-control" type="text" name="Bobbin_Invoice_Date" value="<?php echo $Bobbin_Invoice_Date; ?>" id="Bobbin_Invoice_Date" readonly />
                        </div>
                    </div>
                        </div>
                         <div class="col-lg-4">
                         <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Invoice ID :</label>
                    <div class="col-lg-7">
                    <input type="text" id="Bobbin_Invoice_Id" placeholder="" class="form-control" name="Bobbin_Invoice_Id" value="<?php echo  $Bobbin_Invoice_Id; ?>" readonly />
                    </div>
                </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-4">
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Broker :</label>
                    <div class="col-lg-7">
                    <input type="text" id="text2" placeholder="" name="B_Name" class="form-control" value="<?php echo $B_Name; ?>" readonly />
                    <input type="hidden" name="Broker_Id" value="<?php echo $Broker_Id; ?>" />
                    </div>
                </div>
                        </div>
                        <div class="col-lg-4">
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Invoice No :</label>
                    <div class="col-lg-7">
                    <span id="error1" style="color:#F00";></span>
                    <input type="text" id="Invoice_No" placeholder="" class="form-control" name="Invoice_No" value="<?php echo  $Invoice_No; ?>"  />
                    </div>
                </div>
                        </div>
                        <div class="col-lg-4">
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Challan ID :</label>
                    <div class="col-lg-7">
                    <input type="text" id="Bo_D_C_Id" placeholder="" class="form-control" name="Bo_D_C_Id" value="<?php echo $Bo_D_C_Id; ?>" readonly/>
                    </div>
                </div>
                        </div>
                    </div>
                     <div class="form-group row">
                       <div class="col-lg-4">
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Quality :</label>
                    <div class="col-lg-7">
                    <input type="text" id="Quality_Name" placeholder="" class="form-control" name="Quality_Name"/>
                    <input type="hidden" id="Quality_Id"  name="Quality_Id"/>
                    </div>
                </div>    
                        </div>
                        <div class="col-lg-4">
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-7">Cartoon / Bags / Cases :</label>
                    <div class="col-lg-5">
                    <input type="text" id="Total_Cartoon" placeholder="" class="form-control" name="Total_Cartoon" onkeypress="return isNumberKey(event)" readonly />
                    <input type="hidden" name="R_Id" id="R_Id" value="<?php echo $row_result['Registration_Id']; ?>"/>
                    </div>
                </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Weight :</label>
                    <div class="col-lg-7">
                    <input type="text" id="Total_Weight" placeholder="Total Weight" class="form-control" name="Total_Weight" onkeypress="return isDecimalNumberKey(event)" readonly/>
                    <input type="hidden" name="action" id="action" value="<?php echo $action;?>"/>
                    </div>
                </div>
                        </div>
                    </div>
                    <div class="form-group row">
                    <div class="col-lg-3">
                   <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Rate :</label>
                    <div class="col-lg-7">
                    <input type="text" id="Rate" placeholder="" class="form-control" name="Rate" onkeypress="return isDecimalNumberKey(event)" />
                    </div>
                </div>     
                </div>
                <div class="col-lg-6">
                </div>
                <div class="col-lg-3">
                   <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Amount :</label>
                    <div class="col-lg-7">
                    <input type="text" id="Amt" placeholder="" class="form-control" name="Amt" onkeypress="return isDecimalNumberKey(event)" readonly />
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
                        <hr />
                        <div class="col-lg-12" align="center">
                         <div class="row">
                <div class="col-lg-12">
                            <div class="table-responsive" id="table">
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
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-6">Cartoons :</label>
                    <div class="col-lg-6">
                    <input type="text" id="Total_Cart" placeholder="" name="Total_Cart" class="form-control"  value="<?php echo $Total_Cart; ?>" readonly/>
                    </div>
                </div>
                        </div>
                        <div class="col-lg-4">
                        </div>
                        <div class="col-lg-3">
                        </div>
                        <div class="col-lg-5">
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-6">Total Amount :</label>
                    <div class="col-lg-6">
                    <input type="text" id="Total_Amt" placeholder="" class="form-control" name="Total_Amt" value="<?php echo $Total_Amt; ?>" readonly />
                    </div>
                </div>
                        </div>
                         <div class="col-lg-4">
                         </div>
                          <div class="col-lg-3">
                          </div>
                        <div class="col-lg-5">
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-6">Additional Amount :</label>
                    <div class="col-lg-6">
                    <input type="text" id="Addtnl_Amt" placeholder="" class="form-control" name="Addtnl_Amt" value="<?php echo $Addtnl_Amt; ?>" readonly />
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
                    <input type="text" id="Grand_Amt" placeholder="" class="form-control" name="Grand_Amt" value="<?php echo $Grand_Amt; ?>" onkeypress="return isDecimalNumberKey(event)"  />
                    </div>
                </div>
                        </div> 
                        <?php
							if($action=="update" )
                             {
							?>
                       <div class="col-lg-4">
                         </div>
                          <div class="col-lg-3">
                          </div>
                        <div class="col-lg-5">
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-6">Entry Date :</label>
                    <div class="col-lg-6">
                    <input type="text" id="Entry_Date" placeholder="" class="form-control" name="Entry_Date" value="<?php echo $Entry_Date; ?>" readonly />
                    </div>
                </div>
                        </div>  
                         <div class="col-lg-4">
                        </div>
                        <div class="col-lg-3">
                        </div>
                        <div class="col-lg-5">
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-6">Entry #ID :</label>
                    <div class="col-lg-6">
                     <input type="text" name="Entry_Id" id="Entry_Id" class="form-control" value="<?php echo $Entry_Id;  ?>" readonly/>
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
								  echo $msg_check_bobbininvoice;
								 }
							if($action=="update" )
                             {
							?>
                                            <a href="bobbininovielist"><input type="button" value="Back" class="btn btn-inverse btn-lg " name="back"/></a> <input type="submit" value=" Update Invoice " class="btn btn-primary btn-lg " name="update" />
                        <?php }
						elseif($action=='insert') 
						{
						?>
                                  <a href="bobbinlistpage"><input type="button" value="Back" class="btn btn-inverse btn-lg " name="back1"/></a> 
                                <?php  if($days_remaining<=0)
{}
elseif($days_remaining>0)
{ ?>
	<input type="submit" value="Submit Invoice" class="btn btn-primary btn-lg " name="submit" />
                                  <?php } } ?>
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
		sql="?Bobbin_Invoice_Id=<?php echo $Bobbin_Invoice_Id; ?>&action=<?php echo $action;?>";
		$("#table").load("bobbin_invoicetable85.php"+sql);
			$('#Quality_Name').autocomplete({
	source: function( request, response ) {
		$.ajax({
			url : 'bobbininvoice_autocompleteajax.php?type=country_table&Bo_D_C_Id=<?php echo $Bo_D_C_Id; ?>',
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
		$('#Quality_Id').val(names[1]);
		$('#Total_Cartoon').val(names[2]);
		$('#Total_Weight').val(names[3]);
		}		      	
});	
});	
<?php include("shortcutkeys.php");?>	
   </SCRIPT>
   <script src="assets/js/bobbininvoice.js"></script>
<script src="assets/js/jointjquerydateandpicker.js"></script>
</body>
</html>
<?php
function getNewInvoiceID()
{
	include("databaseconnect.php");
	$sql = "select max(Bobbin_Invoice_Id)+1 from  bobbin_invoice";
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