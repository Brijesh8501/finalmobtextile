<?php
if(isset($_REQUEST['TypeSalary']))
{
	$Type = $_REQUEST['TypeSalary'];
	if($Type=='Meter')
	{
		?>
        <div class="input-group">
                      <select name="Status" id="Status" class="form-control">
                      <option value="">--Select--</option>
                     <option value="Paid">Paid</option>
                    <option value="Un-Paid">Un-Paid</option>
                      </select>
                     
                      </div>
        <?php
	}
	elseif($Type=='Fixed')
	{
		?>
        <div class="input-group">
                      <select name="Status" id="Status" class="form-control">
                      <option value="">--Select--</option>
                    <option value="Paid">Paid</option>
                    <option value="Un-Paid">Un-Paid</option>
                      </select>
                     
                      </div>
        <?php
	}
}
?>