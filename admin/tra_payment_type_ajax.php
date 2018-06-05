<?php
include("pettytransijquery.php");
error_reporting(0); 
include("databaseconnect.php");  
if(isset($_GET['Payment_Type']))
{
	$Payment_Type = $_GET['Payment_Type'];
	$checking = $_GET['checking'];
	$Bank_Id = $_GET['Bank_Id'];
	$bank_replace = str_replace(","," ",$Bank_Id);
	$Chq_No = $_GET['Chq_No'];
	$Chq_Date = $_GET['Chq_Date'];
	if($Payment_Type=='Cheque')
	{
		?>
                     <div class="form-group row">
               &nbsp;
                  <div class="col-lg-12">
                     <div class="well well-sm">
                     <div class="form-group">
<label class="control-label col-lg-4">Bank :</label>
<div class="col-lg-8">
  <select name="Bank_Id" class="form-control" id="Bank_Id">
    <option value="">--Select--</option>
     <?php 
	 if($checking=='Beam' || $checking=="Bobbin")
	 {
	 $sql = "select * from bank_details where Groups in ('Company','Company Personal')";
	 $result = mysql_query($sql);
	 }
	  if($checking=='Taka' || $checking=="Saree")
	 {
	 $sql = "select * from bank_details where Groups in ('Firm','Personal')";
	 $result = mysql_query($sql);
	 }
	 
	while($row = mysql_fetch_array($result))
 {
if($bank_replace==$row['Bank_Name'] )
{
	if($checking=="Beam" || $checking=="Bobbin")
	{
	 echo '<option selected="selected" value="'.$row['Bank_Name'].'">'.$row['Bank_Name'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;##'.$row['Party'].'</option>';
	}
	elseif($checking=="Taka" || $checking=="Saree")
	{
	 echo '<option selected="selected" value="'.$row['Bank_Name'].'">'.$row['Bank_Name'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;##'.$row['P_Name'].'</option>';
	}
}
else
{   
if($checking=="Beam" || $checking=="Bobbin")
	{
		 echo '<option value="'.$row['Bank_Name'].'">'.$row['Bank_Name'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;##'.$row['Party'].'</option>';
		 }
	elseif($checking=="Taka" || $checking=="Saree")
	{
		echo '<option value="'.$row['Bank_Name'].'">'.$row['Bank_Name'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;##'.$row['P_Name'].'</option>';
	}
}
} 
?>
    
  </select>
 </div>
</div>

                     <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Cheque No :</label>
                    <div class="col-lg-8">
                        <input type="text" name="Chq_No" id="Chq_No" class="form-control" value="<?php echo $Chq_No; ?>"  /><span id="error3" style="color:#F00";></span>
                    </div>
                </div>
                <div class="form-group">
                        <label class="control-label col-lg-4">Date</label>
<div class="col-lg-8">
                            <div class="input-group">
                                <input class="form-control" type="text" data-mask="9999-99-99" name="Chq_Date" id="Chq_Date" value="<?php echo $Chq_Date; ?>"/>
                                <span class="input-group-addon">9999-99-99</span>
                            </div>
                        </div>
                    </div>
             </div>
             </div>
            
               </div>
                <?php 
   
}
else if($Payment_Type=='Cash')
{
	?>
    <input type="hidden" name="Bank_Id" id="Bank_Id" value="---"  />
	<input type="hidden" name="Chq_No" id="Chq_No" value="---"  />
    <div class="form-group row">
               &nbsp;
                  <div class="col-lg-12">
                     <div class="well well-sm">
                     <div class="form-group">
                        <label class="control-label col-lg-4">Date</label>
                        <div class="col-lg-8">
                            <div class="input-group">
                                <input class="form-control" type="text" data-mask="9999-99-99" name="Chq_Date" id="Chq_Date" value="<?php echo $Chq_Date; ?>"/>
                                <span class="input-group-addon">9999-99-99</span>
                            </div>
                        </div>
                    </div>
                     
             </div>
             </div>
               </div>
    <?php }
  else if($Payment_Type=='RTGS')
{
	?>
  <input type="hidden" name="Chq_No" id="Chq_No" value="---"  />
     
    <div class="form-group row">
               &nbsp;
                  <div class="col-lg-12">
                     <div class="well well-sm">
                     <div class="form-group">
<label class="control-label col-lg-4">Bank :</label>
<div class="col-lg-8">
  <select name="Bank_Id" class="form-control" id="Bank_Id">
    <option value="">--Select--</option>
     <?php 
	 if($checking=='Beam' || $checking=="Bobbin")
	 {
	 $sql = "select * from bank_details where Groups in ('Company','Company Personal')";
	 $result = mysql_query($sql);
	 }
	  if($checking=='Taka' || $checking=="Saree")
	 {
	 $sql = "select * from bank_details where Groups in ('Firm','Personal')";
	 $result = mysql_query($sql);
	 }
	 
	while($row = mysql_fetch_array($result))
 {
if($bank_replace==$row['Bank_Name'] )
{
	if($checking=="Beam" || $checking=="Bobbin")
	{
	 echo '<option selected="selected" value="'.$row['Bank_Name'].'">'.$row['Bank_Name'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;##'.$row['Party'].'</option>';
	}
	elseif($checking=="Taka" || $checking=="Saree")
	{
	 echo '<option selected="selected" value="'.$row['Bank_Name'].'">'.$row['Bank_Name'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;##'.$row['P_Name'].'</option>';
	}
}
else
{   
if($checking=="Beam" || $checking=="Bobbin")
	{
		 echo '<option value="'.$row['Bank_Name'].'">'.$row['Bank_Name'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;##'.$row['Party'].'</option>';
		 }
	elseif($checking=="Taka" || $checking=="Saree")
	{
		echo '<option value="'.$row['Bank_Name'].'">'.$row['Bank_Name'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;##'.$row['P_Name'].'</option>';
	}
}
} 
?>
    
  </select>
 </div>
</div>
                <div class="form-group">
                        <label class="control-label col-lg-4">Date</label>
<div class="col-lg-8">
                            <div class="input-group">
                                <input class="form-control" type="text" data-mask="9999-99-99" name="Chq_Date" id="Chq_Date" value="<?php echo $Chq_Date; ?>"/>
                                <span class="input-group-addon">9999-99-99</span>
                            </div>
                        </div>
                    </div>
             </div>
             </div>
            
               </div>
               <?php }
			   else if($Payment_Type=='Online')
{
	?>
 	<input type="hidden" name="Chq_No" id="Chq_No" value="---"  />
     
    <div class="form-group row">
               &nbsp;
                  <div class="col-lg-12">
                     <div class="well well-sm">
                     <div class="form-group">
<label class="control-label col-lg-4">Bank :</label>
<div class="col-lg-8">
  <select name="Bank_Id" class="form-control" id="Bank_Id">
    <option value="">--Select--</option>
     <?php 
	 if($checking=='Beam' || $checking=="Bobbin")
	 {
	 $sql = "select * from bank_details where Groups in ('Company','Company Personal')";
	 $result = mysql_query($sql);
	 }
	  if($checking=='Taka' || $checking=="Saree")
	 {
	 $sql = "select * from bank_details where Groups in ('Firm','Personal')";
	 $result = mysql_query($sql);
	 }
	 
	while($row = mysql_fetch_array($result))
 {
if($bank_replace==$row['Bank_Name'] )
{
	if($checking=="Beam" || $checking=="Bobbin")
	{
	 echo '<option selected="selected" value="'.$row['Bank_Name'].'">'.$row['Bank_Name'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;##'.$row['Party'].'</option>';
	}
	elseif($checking=="Taka" || $checking=="Saree")
	{
	 echo '<option selected="selected" value="'.$row['Bank_Name'].'">'.$row['Bank_Name'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;##'.$row['P_Name'].'</option>';
	}
}
else
{   
if($checking=="Beam" || $checking=="Bobbin")
	{
		 echo '<option value="'.$row['Bank_Name'].'">'.$row['Bank_Name'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;##'.$row['Party'].'</option>';
		 }
	elseif($checking=="Taka" || $checking=="Saree")
	{
		echo '<option value="'.$row['Bank_Name'].'">'.$row['Bank_Name'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;##'.$row['P_Name'].'</option>';
	}
}
} 
?>
    
  </select>
 </div>
</div>
                <div class="form-group">
                        <label class="control-label col-lg-4">Date</label>
<div class="col-lg-8">
                            <div class="input-group">
                                <input class="form-control" type="text" data-mask="9999-99-99" name="Chq_Date" id="Chq_Date" value="<?php echo $Chq_Date; ?>"/>
                                <span class="input-group-addon">9999-99-99</span>
                            </div>
                        </div>
                    </div>
             </div>
             </div>
            
               </div>
               <?php } } ?>

