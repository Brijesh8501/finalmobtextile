<?php
if(isset($_REQUEST['Trans_TypeTra']))
{
	$Trans_Type = $_REQUEST['Trans_TypeTra'];
	if($Trans_Type=='Beam' || $Trans_Type=='Bobbin' )
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
	elseif($Trans_Type=='Taka' || $Trans_Type=='Saree' )
	{
		?>
        <div class="input-group">
                      <select name="Status" id="Status" class="form-control">
                      <option value="">--Select--</option>
                     <option value="Received">Received</option>
                    <option value="Not-Received">Not-Received</option>
                      </select>
                     
                      </div>
        <?php
	}
}
?>