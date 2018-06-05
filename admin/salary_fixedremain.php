<?php 
include("databaseconnect.php");
if(isset($_REQUEST['Labour_Id']))
{
$Labour_Id = $_REQUEST['Labour_Id'];
$qu_upd = "select Re_Amount from salary_fixed_master where Labour_Id='$Labour_Id' order by Sal_Fixed_Id desc limit 1";
	$qu_exe = mysql_query($qu_upd);
	$qu_fetch = mysql_fetch_array($qu_exe);
	$qu_count = mysql_num_rows($qu_exe);
	if($qu_count==0)
	{
		$Re_Amount = "0.00";
	}
	else
	{
		$Re_Amount = $qu_fetch['Re_Amount'];
	}
}
	?>
	<div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Remaining Amount :</label>
                    <div class="col-lg-8">
                      <input type="text" id="Re_Amount" placeholder="" class="form-control"  name="Re_Amount" value="<?php echo $Re_Amount;?>" onkeypress="return isDecimalplusNumberKey(event)" />
                    </div>
                </div>