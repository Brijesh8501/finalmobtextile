<?php
if(isset($_REQUEST['TypeLabMF']))
{
	$Type = $_REQUEST['TypeLabMF'];
	if($Type=='Meter')
	{
		?>
       <select name="Labour" id="Labour" class="form-control">
                      <option value="">--Select--</option>
                      <?php
					  include("databaseconnect.php");
					  $sel = "select Name,Labour_Id from labour_details where Status = 'Meter-Join'";
					  $sel_exe = mysql_query($sel);
					  while($sel_fetch = mysql_fetch_array($sel_exe))
					  {
					  ?>
					  <option value="<?php echo $sel_fetch['Labour_Id']; ?>"><?php echo $sel_fetch['Name']; ?></option><?php }
					  ?>
                      </select>    
	<?php	
		}
		elseif($Type=='Fixed')
	{
		?>
		  <select name="Labour" id="Labour" class="form-control">
                      <option value="">--Select--</option>
                      <?php
					 include("databaseconnect.php");
					  $sel = "select Name,Labour_Id from labour_details where Status = 'Fixed-Join'";
					  $sel_exe = mysql_query($sel);
					  while($sel_fetch = mysql_fetch_array($sel_exe))
					  {
					  ?>
					  <option value="<?php echo $sel_fetch['Labour_Id']; ?>"><?php echo $sel_fetch['Name']; ?></option><?php }
					  ?>
                      </select>    
		<?php
		
		}
}
?>