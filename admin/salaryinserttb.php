<?php session_start(); error_reporting(0); 
include("databaseconnect.php");
if(isset($_REQUEST['Search']))
    {   
    $reportrange = $_REQUEST['reservation']; 
	$splitdate = explode("-",$reportrange);
$date = $splitdate[0];
$date1 = $splitdate[1];
$dt = date('Y-m-d', strtotime($date));
$dt1 = date('Y-m-d', strtotime($date1)); 
$datechecksecond = strtotime($date);
	}
	?>
    <script src="assets/js/googleapi.js">
</script>
    <?php
	 if($reportrange=="")
	{
		echo '<script>alert("Please select any option first....");</script>';
	}
	else
	{    
	if(!isset($_SESSION['User']))
	{
		 $loginGoTo = "loginadmin.php?msg";
    echo '<script>window.location="'.$loginGoTo.'";</script>';
	}
	else
	{
	$selcheckdate = "select Date_Range from salary_master order by Sal_Mast_Id desc limit 1";
	$selcheckdate_exe = mysql_query($selcheckdate);
	$selcheckdate_fetch = mysql_fetch_array($selcheckdate_exe);
	$datecheckfirst = $selcheckdate_fetch['Date_Range'];
	$datefinal = explode("-",$datecheckfirst);
	$datefulfinal = strtotime($datefinal[1]);
	 if($datechecksecond>$datefulfinal)
	 {
	          $i=0;$j=0;$j++;$i++;
	  $sel_labour = "select Labour_Id from labour_details where Status = 'Meter-Join'";
$sel_lab_exe = mysql_query($sel_labour);
$sel_lab_num = mysql_num_rows($sel_lab_exe);
while($sel_lab_fetch = mysql_fetch_array($sel_lab_exe))
{
	$query1 = "(select sum(Taka_Meter) as sum_meter, sum(L_Amount) as sum_amount,labour_details.Name,labour_details.Labour_Id from taka_labsalsuborg,labour_details where labour_details.Labour_Id = taka_labsalsuborg.Labour_Id AND taka_labsalsuborg.T_Date between '$dt' and '$dt1' AND taka_labsalsuborg.Labour_Id='".$sel_lab_fetch[0]."') union (select sum(Saree_Meter) as sum_meter, sum(S_Amount) as sum_amount,labour_details.Name,labour_details.Labour_Id from saree_labsalsuborg1,labour_details where labour_details.Labour_Id = saree_labsalsuborg1.Labour_Id AND saree_labsalsuborg1.S_Date between '$dt' and '$dt1' AND saree_labsalsuborg1.Labour_Id='".$sel_lab_fetch[0]."')";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
	if($totalRowsRsMain<=1)
	{
		echo "<center>No record of labour : ".$rowMain['Name']."</center>";
	}
	else
	{
		$check_saldate = "select * from salary_master where Date_Range = '$reportrange'";
		$check_salexe = mysql_query($check_saldate);
		$check_salfetch = mysql_fetch_array($check_salexe);
        $check_saltotal = mysql_num_rows($check_salexe);
		if($check_saltotal==0)
		{
			$qu_upd = "select Re_Upad_Amt from salary_master where Labour_Id='".$sel_lab_fetch[0]."' order by Sal_Mast_Id desc limit 1";
	$qu_exe = mysql_query($qu_upd);
	$qu_fetch = mysql_fetch_array($qu_exe);
	$qu_count = mysql_num_rows($qu_exe);
	if($qu_count==0)
	{
		$throw_value = "0.00";
	}
	else
	{
		$throw_value = $qu_fetch['Re_Upad_Amt'];
	}
		?>
    <table border="0">
    <tr><td style="color:#F00;"><?php echo $id_val = $j++; ?>.
<script>
$(document).ready(function(){
     var meter<?php echo $id_val;?> = 0;
                $(".sum_meter<?php echo $id_val;?>").each(function() {
                    meter<?php echo $id_val;?> += Number($(this).val());
                });
                $("#Total_Meter<?php echo $id_val;?>").val(meter<?php echo $id_val;?>.toFixed(2));
	 var amount<?php echo $id_val;?> = 0;
                $(".sum_amount<?php echo $id_val;?>").each(function() {
                    amount<?php echo $id_val;?> += Number($(this).val());
	            });
                $("#Total_Amt<?php echo $id_val;?>").val(amount<?php echo $id_val;?>.toFixed(2)); 
				 var Total_Amt<?php echo $id_val;?> = parseFloat($('#Total_Amt<?php echo $id_val;?>').val()) || 0;
    var Upad_Amt<?php echo $id_val;?> = parseFloat($('#Upad_Amt<?php echo $id_val;?>').val()) || 0;
     var Re_Amt<?php echo $id_val;?> = Total_Amt<?php echo $id_val;?>-Upad_Amt<?php echo $id_val;?>;
    $('#Re_Amt<?php echo $id_val;?>').val(Re_Amt<?php echo $id_val;?>.toFixed(2)); 
				$('#Total_Amt<?php echo $id_val;?>,#Upad_Amt<?php echo $id_val;?>').keyup(function(){
				 var Total_Amt<?php echo $id_val;?> = parseFloat($('#Total_Amt<?php echo $id_val;?>').val()) || 0;
    var Upad_Amt<?php echo $id_val;?> = parseFloat($('#Upad_Amt<?php echo $id_val;?>').val()) || 0;
     var Re_Amt<?php echo $id_val;?> = Total_Amt<?php echo $id_val;?>-Upad_Amt<?php echo $id_val;?>;
    $('#Re_Amt<?php echo $id_val;?>').val(Re_Amt<?php echo $id_val;?>.toFixed(2)); 
				});
});
</script> <input type="hidden" value="<?php echo $reportrange; ?>" id="Date_Range" name="Date_Range[]" />
	<input type="hidden" name="Labour_Id[]" id="Labour_Id" value="<?php echo $rowMain['Labour_Id']; ?>"/><strong><?php echo $rowMain['Name']; ?></strong></td></tr></table>
    <?php
									do { 
									if($i%2==0)
									{
										$even_odd = "Saree";
									}
									else if($i%2!=0)
									{
										$even_odd = "Taka";
									}
									?> 
  <table class="table table-striped table-bordered table-hover" valign="center">
  <tr><td><?php echo $i++." -- ".$even_odd; ?></td></tr>
 <tr>
  <td>
  <div class="col-lg-1" style="color:#F00">
     <input type="text" value="<?php echo $rowMain['sum_meter']; ?>"  name="sum_meter<?php echo $id_val;?>" class="sum_meter<?php echo $id_val;?>" readonly="readonly"/><center>( Meter )</center></div>
     <div class="col-lg-1" style="color:#F00">
    <input type="text" value="<?php echo $rowMain['sum_amount']; ?>" class="sum_amount<?php echo $id_val;?>" name="sum_amount<?php echo $id_val;?>" readonly="readonly"/><center>( Amount )</center></div>
     <?php if($even_odd=='Taka')
	{
		?>
        <div class="col-lg-4">
        </div>
     <div class="col-lg-2" style="color:#F00">
    <input type="text"  placeholder="Total Meter" value="" id="Total_Meter<?php echo $id_val;?>" name="Total_Meter[]" readonly="readonly"/><br /><center>( Total Meter )</center></div>
     <div class="col-lg-2" style="color:#F00">
    <input type="text"  placeholder="Total amount" value="" id="Total_Amt<?php echo $id_val;?>" name="Total_Amt[]" readonly="readonly"/><br /><center>( Total Amount )</center></div>
    <?php } if($even_odd=='Saree')
	{
		?>
        <div class="col-lg-1">
        </div>
    <div class="col-lg-2" style="color:#F00">
    <input type="text"  placeholder="Upad amount / Adjust upad amount" name="Upad_Amt[]"  id="Upad_Amt<?php echo $id_val;?>" onkeypress="return isDecimalNumberKey(event)" required="required"/><br /><center>( Upad Amount / Adjust Upad Amount )</center></div>
    <div class="col-lg-2" style="color:#F00">
    <input type="text"  placeholder="Remaining amount" value="" id="Re_Amt<?php echo $id_val;?>" name="Re_Amt[]" onkeypress="return isDecimalNumberKey(event)" readonly="readonly"/><br /><center>( Remaining Amount )</center></div>
    <div class="col-lg-2" style="color:#F00">
    <input type="text"  placeholder="Grand total" value="" id="Grand_Total<?php echo $id_val;?>" name="Grand_Total[]" onkeypress="return isDecimalNumberKey(event)" required="required"/><br /><center>( Grand Total )</center></div>
     <div class="col-lg-2" style="color:#F00">
    <input type="text"  placeholder="- / +" id="Re_Upad_Amt<?php echo $id_val;?>" name="Re_Upad_Amt[]" value="<?php echo $throw_value; ?>" onkeypress="return isDecimalplusNumberKey(event)" required="required"/><br /><center>( - / + )</center></div>
    <?php } ?>
   </td>
    </tr>
                                </table>
    <?php echo '<br>';} while($rowMain=mysql_fetch_assoc($rsMain)); 
		}
		else
		{
		}
} 
}
if($totalRowsRsMain<=1)
{
}
else
{
		if($check_saltotal==0)
		{ 
		?>
 <div style="text-align:center" class="form-actions no-margin-bottom">
                                            <a href="statelistpage"><input type="button" value="Back" class="btn btn-inverse btn-lg " /></a>
                                           
                                            <input type="submit" value="Make Salary" name="makesalary" id="makesalary" class="btn btn-primary btn-lg " />
                                        </div> 
<input type="hidden" name="count" id="count" value="<?php
echo $sel_lab_num; ?>" /><?php } else { echo "<center>You have allready made salary successfully of date range : $reportrange</center>"; } }
	} else
	{
		echo "<center>Please give appropriate date range</center>";
	}}} ?>
