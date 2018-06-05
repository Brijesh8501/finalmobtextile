<?php include("databaseconnect.php");
if(isset($_REQUEST['action']))
{
	$action = $_REQUEST['action'];
	if($action=="insert")
	{
	$company = $_REQUEST['company'];
	$comself = "select Company_Id,C_Name from company_deetaails where Company_Id = '$company'";
	$comselfexe = mysql_query($comself);
	$comselffetch = mysql_fetch_array($comselfexe); 
	if($comselffetch['C_Name']=="SELF")
	{
		$sellabour = "select Labour_Id,Name from labour_details,work_type where work_type.W_Type_Id = labour_details.W_Type_Id and W_Type_Name = 'Master' and Status = 'Fixed-Join'";
		$sellabourexe = mysql_query($sellabour);
		
		?>
         <div class="form-group">
                    <label for="text2" class="control-label col-lg-6">Labour (Warper):</label>
                    <div class="col-lg-6">
     <select name="Labour_Id" id="Labour_Id" class="form-control">
     <?php
	 while($sellabourfetch = mysql_fetch_array($sellabourexe)) {
		  ?>
     <option value="<?php echo $sellabourfetch['Labour_Id'];?>"><?php echo $sellabourfetch['Name'];?></option>
     <?php } ?>
     </select> 
     </div>
     </div>  
	<?php }
	else
	{
	}
	
	}
	elseif($action=="update")
	{
		$challanid = $_REQUEST['challanid'];
		$company = $_REQUEST['company'];
	$comself = "select Company_Id,C_Name from company_deetaails where Company_Id = '$company'";
	$comselfexe = mysql_query($comself);
	$comselffetch = mysql_fetch_array($comselfexe); 
	if($comselffetch['C_Name']=="SELF")
	{
		
		$checklab = "select Beam_D_C_Id,Labour_Id from beam_d_c_1 where Beam_D_C_Id = '$challanid'";
		$checklabexe = mysql_query($checklab);
		$checklabfetch = mysql_fetch_array($checklabexe);
		if($checklabfetch['Labour_Id']>0)
		{
			$sellabour = "select Labour_Id,Name from labour_details,work_type where work_type.W_Type_Id = labour_details.W_Type_Id and W_Type_Name = 'Master' and Status = 'Fixed-Join'";
		$sellabourexe = mysql_query($sellabour);
		
		?>
         <div class="form-group">
                    <label for="text2" class="control-label col-lg-6">Labour (Warper):</label>
                    <div class="col-lg-6">
     <select name="Labour_Id" id="Labour_Id" class="form-control">
     <?php
	 while($sellabourfetch = mysql_fetch_array($sellabourexe)) {
		 if($checklabfetch['Labour_Id']==$sellabourfetch['Labour_Id']) { ?>
          <option value="<?php echo $sellabourfetch['Labour_Id'];?>" selected><?php echo $sellabourfetch['Name'];?></option>
         <?php } else { ?>
     <option value="<?php echo $sellabourfetch['Labour_Id'];?>"><?php echo $sellabourfetch['Name'];?></option>
     <?php } } ?>
     </select> 
     </div>
     </div>  
     <?php 
		}
		else
		{
		}
		
	}
	else
	{
	}
	}
}
?>