<?php include("logcode.php"); error_reporting(0); 
include("databaseconnect.php");
if(isset($_REQUEST['action']))
{
	$action = $_REQUEST['action'];
    if($action == "insert")
	{
$decodeurl = $_REQUEST['Beam_D_C_Id'];
	$durl = urldecode($decodeurl); 
	$turl = str_replace("'"," ",$durl);
	$urls = explode(" ",$turl);
	$Beam_D_C_Id = $urls[1];
	$sql = "SELECT beam_d_c_1.Beam_D_C_Id,company_deetaails.C_Name,company_deetaails.Company_Id, broker_details1.B_Name, broker_details1.Broker_Id FROM beam_d_c_1, company_deetaails, broker_details1 WHERE company_deetaails.Company_Id = beam_d_c_1.Company_Id AND broker_details1.Broker_Id = beam_d_c_1.Broker_Id AND beam_d_c_1.Beam_D_C_Id= '".$Beam_D_C_Id."' ";
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
	$Beam_D_C_Id = $row['Beam_D_C_Id'];
	date_default_timezone_set('Asia/Calcutta');
	$Beam_Invoice_Date = date('Y-m-d');
	$Beam_Invoice_Id = getNewInvoiceID();
	$C_Name = $row['C_Name'];
	$Company_Id = $row['Company_Id'];
	$Broker_Id = $row['Broker_Id'];
	$B_Name = $row['B_Name'];
	include("webrenew.php");
}
 if($action=='update')
	{
		$decodeurl = $_REQUEST['Beam_Invoice_Id'];
	$durl = urldecode($decodeurl); 
	$turl = str_replace("'"," ",$durl);
	$urls = explode(" ",$turl);
	$Beam_Invoice_Id = $urls[1];
		$sql = "SELECT beam_invoice.Beam_Invoice_Id, beam_invoice.Beam_Invoice_Date, beam_invoice.Invoice_No, beam_invoice.Beam_D_C_Id, company_deetaails.Company_Id, company_deetaails.C_Name, broker_details1.Broker_Id, broker_details1.B_Name, beam_invoice.Total_B, beam_invoice.Total_Amt, beam_invoice.Addtnl_Amt, beam_invoice.Grand_Amt, beam_invoice.Entry_Date, beam_invoice.Entry_Id FROM beam_invoice, company_deetaails, broker_details1 WHERE company_deetaails.Company_Id = beam_invoice.Company_Id AND broker_details1.Broker_Id = beam_invoice.Broker_Id AND beam_invoice.Beam_Invoice_Id = '".$Beam_Invoice_Id."' ";
	   $result = mysql_query($sql);
	   $row = mysql_fetch_array($result);
	$Beam_Invoice_Id = $row['Beam_Invoice_Id'];	
	$Beam_Invoice_Date = $row['Beam_Invoice_Date'];		
	$Total_B = $row['Total_B'];
	$Beam_D_C_Id = $row['Beam_D_C_Id'];
	$Company_Id = $row['Company_Id'];
	$C_Name = $row['C_Name'];
	$Broker_Id = $row['Broker_Id'];
	$B_Name = $row['B_Name'];
	$Total_Amt = $row['Total_Amt'];
	$Addtnl_Amt = $row['Addtnl_Amt'];
	$Grand_Amt = $row['Grand_Amt'];
	$Entry_Date = $row['Entry_Date'];
	$Invoice_No = $row['Invoice_No'];
	$Entry_Id = $row['Entry_Id'];
	date_default_timezone_set('Asia/Calcutta');
	include("webrenew.php");
	$sel_check_entry = "select sum(Total_Beam) as sum_beam,sum(Amount) as sum_amount from beam_invoiceorg where Beam_Invoice_Id='$Beam_Invoice_Id'";
	$sel_check_exe = mysql_query($sel_check_entry);
	$sel_check_fetch = mysql_fetch_array($sel_check_exe);
	if($sel_check_fetch[0]==$Total_B && $sel_check_fetch[1]==$Total_Amt)
	{}else{
		$msg_check_beaminvoice ='<strong style="color:#F00;">'.'* Please verify entry of invoice id : '.$Beam_Invoice_Id.' challan id : '.$Beam_D_C_Id.' and then update this invoice which is required</strong>';
	}}}
	 if(isset ($_REQUEST['submit']))
{
//insert
if(!isset($_SESSION['User']))
{ } 
else
{
   $Beam_Invoice_Id = $_REQUEST['Beam_Invoice_Id']; 
	$Beam_Invoice_Date = $_REQUEST['Beam_Invoice_Date'];
	$Beam_D_C_Id = $_REQUEST['Beam_D_C_Id'];
	$Company_Id = $_REQUEST['Company_Id'];
	$Broker_Id = $_REQUEST['Broker_Id'];
	$Total_B = $_REQUEST['Total_B'];
	$Total_Amt = $_REQUEST['Total_Amt'];
	$Addtnl_Amt = $_REQUEST['Addtnl_Amt'];
	$Grand_Amt = $_REQUEST['Grand_Amt'];
	date_default_timezone_set('Asia/Calcutta');
	$Entry_Date = date('Y-m-d    h:i:s a');
	$Invoice_No = $_REQUEST['Invoice_No'];
	$Entry_Id = $row_result['Registration_Id'];
	$query = mysql_query("select * from beam_invoice where Beam_D_C_Id='".$Beam_D_C_Id."' ") or die(mysql_error());
	$query_fetch = mysql_fetch_array($query);
$duplicate = mysql_num_rows($query);
$query_Beam_Invoice_Id = $query_fetch['Beam_Invoice_Id'];
   if($duplicate==0)
    {
	$sql1 = "INSERT INTO  `beam_invoice` (`Beam_Invoice_Id` ,`Beam_Invoice_Date` ,`Invoice_No` ,`Beam_D_C_Id` ,`Company_Id` ,`Broker_Id` ,`Total_B` ,`Total_Amt` ,`Addtnl_Amt` ,`Grand_Amt` ,`Entry_Date` ,`Entry_Id`)VALUES (
NULL , '$Beam_Invoice_Date', '$Invoice_No',  '$Beam_D_C_Id',  '$Company_Id',  '$Broker_Id',  '$Total_B',  '$Total_Amt',  '$Addtnl_Amt',  '$Grand_Amt',  '$Entry_Date',  '$Entry_Id')";
$result1 = mysql_query($sql1);
$sel_sub = "select * from beam_invoice_2 where beam_invoice_2.Beam_Invoice_Id = '$Beam_Invoice_Id'";
$sel_exe = mysql_query($sel_sub);
while($sel_fetch = mysql_fetch_array($sel_exe))
{
	$ins_sub = "insert into beam_invoiceorg (Be_Invoice_Id,Beam_Invoice_Id,Total_Beam,	Ends,Quantity,Quality_Id,Rate,Amount,R_Id) values(NULL,'".$sel_fetch[1]."','".$sel_fetch[2]."','".$sel_fetch[3]."','".$sel_fetch[4]."','".$sel_fetch[5]."','".$sel_fetch[6]."','".$sel_fetch[7]."','".$sel_fetch[8]."')";
	mysql_query($ins_sub);
}
$del_sub = "delete from beam_invoice_2 where beam_invoice_2.Beam_Invoice_Id='$Beam_Invoice_Id'";
$del_exe = mysql_query($del_sub);
$sel_sub_or = "select * from beam_invoiceorg where beam_invoiceorg.Beam_Invoice_Id = '$Beam_Invoice_Id'";
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
 $insertGoTo = "beam_invoicelist?msg_error=$msg_error";
  echo '<script>window.location="'.$insertGoTo.'";</script>';
  }
	else
		{
	 echo '<script>alert("This challan allready exists");</script>';
}}}
if(isset ($_REQUEST['update']))
      {
//update
if(!isset($_SESSION['User']))
{   } 
else
{
      $Beam_Invoice_Id = $_REQUEST['Beam_Invoice_Id'];
     $Beam_Invoice_Date = $_REQUEST['Beam_Invoice_Date'];
	$Beam_D_C_Id = $_REQUEST['Beam_D_C_Id'];
	$Company_Id = $_REQUEST['Company_Id'];
	$Broker_Id = $_REQUEST['Broker_Id'];
	$Total_B = $_REQUEST['Total_B'];
	$Total_Amt = $_REQUEST['Total_Amt'];
	$Addtnl_Amt = $_REQUEST['Addtnl_Amt'];
	$Grand_Amt = $_REQUEST['Grand_Amt'];
	$Entry_Date = $_REQUEST['Entry_Date'];
	$Invoice_No = $_REQUEST['Invoice_No'];
	$Entry_Id = $row_result['Registration_Id'];
$sql2 = "update `beam_invoice` set `Beam_Invoice_Date` = '$Beam_Invoice_Date' ,`Invoice_No` = '$Invoice_No' ,`Beam_D_C_Id` = '$Beam_D_C_Id' ,`Company_Id` = '$Company_Id' ,`Broker_Id` = '$Broker_Id' ,`Total_B` = '$Total_B' ,`Total_Amt` = '$Total_Amt' ,`Addtnl_Amt` = '$Addtnl_Amt' ,`Grand_Amt` = '$Grand_Amt' ,`Entry_Date` = '$Entry_Date' , `Entry_Id` = '$Entry_Id' where Beam_Invoice_Id = '".$Beam_Invoice_Id."' ";
$result2 = mysql_query($sql2);
 $updateGoTo = "beam_invoicelist?msg";
  echo '<script>window.location="'.$updateGoTo.'";</script>';
}}
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
                    <h1 class="page-header" align="center">BEAM INVOICE</h1>
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
                    <label for="text2" class="control-label col-lg-5">Company :</label>
                    <div class="col-lg-7">
                    <input type="text" id="C_Name" placeholder="" name="C_Name" value="<?php echo $C_Name; ?>" class="form-control" readonly />
                    <input type="hidden" name="Company_Id"  value="<?php echo $Company_Id; ?>" readonly />
                    </div>
                </div>
                        </div>
                       <div class="col-lg-4">
                       <div class="form-group">
                        <label class="control-label col-lg-5" >Invoice Date :</label>
                        <div class="col-lg-7">
                              <input class="form-control" type="text" name="Beam_Invoice_Date" id="Beam_Invoice_Date" value="<?php echo $Beam_Invoice_Date; ?>" readonly />
                        </div>
                    </div>
                        </div>
                         <div class="col-lg-4">
                         <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Invoice ID :</label>
                    <div class="col-lg-7">
                    <input type="text" id="Beam_Invoice_Id" placeholder="" class="form-control" name="Beam_Invoice_Id" value="<?php echo $Beam_Invoice_Id; ?>" readonly />
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
                    <input type="hidden" name="Broker_Id"  value="<?php echo $Broker_Id; ?>" readonly />
                    </div>
                </div>
                        </div>
                        <div class="col-lg-4">
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Invoice No :</label>
                    <div class="col-lg-7">
                    <span id="error1" style="color:#F00";></span>
                    <input name="Invoice_No" type="text"  class="form-control" id="Invoice_No" placeholder="" value="<?php echo $Invoice_No; ?>" />
                    </div>
                </div>
                        </div>
                        <div class="col-lg-4">
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Challan ID :</label>
                    <div class="col-lg-7">
                    <input type="text" id="Beam_D_C_Id" placeholder="" class="form-control" name="Beam_D_C_Id" value="<?php echo $Beam_D_C_Id; ?>" readonly />
                    <input type="hidden" name="action" id="action" value="<?php echo $action;?>"/>
                    </div>
                </div>
                        </div>
                    </div>
                     <div class="form-group row">
                     <div class="col-lg-3">
                     <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Quality :</label>
                    <div class="col-lg-7">
                    <input type="text" id="Quality_Name" placeholder="" class="form-control" name="Quality_Name" />
                    </div>
                </div>
                        <input type="hidden" name="Quality_Id" id="Quality_Id" />    
                        </div>
                        <div class="col-lg-3">
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-5"> Total Beam :</label>
                    <div class="col-lg-7">
                    <input type="text" id="Total_Beam" placeholder="Total Beam" class="form-control" name="Total_Beam" onkeypress="return isNumberKey(event)" readonly/>
                    <input type="hidden" name="R_Id" id="R_Id" value="<?php echo $row_result['Registration_Id']; ?>"/>
                    </div>
                </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Ends :</label>
                    <div class="col-lg-7">
                    <input type="text" id="Ends" placeholder="Taar" class="form-control" name="Ends" onkeypress="return isNumberKey(event)" readonly />
                    </div>
                </div>
                        </div>
                        <div class="col-lg-3">
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-6">Quantity(Kgs) :</label>
                    <div class="col-lg-6">
                    <input type="text" id="Quantity" placeholder="Total weight" class="form-control" name="Quantity" onkeypress="return isDecimalNumberKey(event)" readonly/>
                    </div>
                </div>
                        </div>
                    </div>
                     <div class="form-group row">
                        <div class="col-lg-3">
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-6">Rate :</label>
                    <div class="col-lg-6">
                    <input type="text" id="Rate" placeholder="Rate" class="form-control" name="Rate" onkeypress="return isDecimalNumberKey(event)" />
                    </div>
                </div>
                        </div>
                        <div class="col-lg-6">
                        </div>
                        <div class="col-lg-3">
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-6">Amount :</label>
                    <div class="col-lg-6">
                    <input type="text" id="Amount" placeholder="Amount" class="form-control" name="Amount" readonly/>
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
                        <div class="form-group">
                    <label for="text2" class="control-label col-lg-6">No. Of Beams :</label>
                    <div class="col-lg-6">
                    <input type="text" id="Total_B" placeholder="" class="form-control" name="Total_B" value="<?php echo $Total_B; ?>" readonly/>
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
                    <input type="text" id="Total_Amt" placeholder="" class="form-control" name="Total_Amt" value="<?php echo $Total_Amt; ?>" readonly/>
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
                    <input type="text" id="additionalamount" placeholder="" class="form-control" name="Addtnl_Amt" value="<?php echo $Addtnl_Amt; ?>" readonly />
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
                    <input type="text" id="Grand_Amt" placeholder="" class="form-control" name="Grand_Amt" value="<?php echo $Grand_Amt; ?>" onkeypress="return isDecimalNumberKey(event)" />
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
								  echo $msg_check_beaminvoice;
								 }
							 ?>
                             <?php
							 if($days_remaining<=0)
{
	echo "<strong style='color:#F00;'>* Please renew your website</strong>";
	
}
							if($action=="update")
                             {
						?>
							                  <a href="beam_invoicelist"><input type="button" value=" Back" class="btn btn-inverse btn-lg " name="back"/></a> <input type="submit" value="Update Invoice" class="btn btn-primary btn-lg " name="update" id="update" />
                                           
                        <?php }
						elseif($action=="insert")
						{
							?>
							 <a href="beam_d_c_listpage"><input type="button" value=" Back" class="btn btn-inverse btn-lg " name="back1"/></a> <?php
							if($days_remaining<=0)
{}
elseif($days_remaining>0)
{
						?>
                                 
                                  <input type="submit" value="Submit Invoice" class="btn btn-primary btn-lg " name="submit" id="submit"/>
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
		sql="?Beam_Invoice_Id=<?php echo $Beam_Invoice_Id; ?>&action=<?php echo $action;?>";
		$("#table").load("beam_invoicetable85.php"+sql);
$('#Quality_Name').autocomplete({
	source: function( request, response ) {
		$.ajax({
			url : 'beaminvoice_autocompleteajax.php?type=country_table&Beam_D_C_Id=<?php echo $Beam_D_C_Id; ?>',
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
		$('#Total_Beam').val(names[2]);
		$('#Ends').val(names[3]);
		$('#Quantity').val(names[4]);
	}		      	
});	
});
<?php include("shortcutkeys.php");?>
</SCRIPT>
<script src="assets/js/beaminvoice.js"></script>
<script src="assets/js/jointjquerydateandpicker.js"></script>
</body>
</html>
<?php
function getNewInvoiceID()
{
	include("databaseconnect.php");
	$sql = "select max(Beam_Invoice_Id)+1 from beam_invoice";
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