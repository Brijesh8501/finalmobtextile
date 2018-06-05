 <?php 
 include("databaseconnect.php");
 if(isset($_REQUEST['apvalevana']))
 {
	 $apvalevana = $_REQUEST['apvalevana'];
	 if($apvalevana=='Apvana')
	 {
	 ?>
    <div class="form-group row" align="center">
  <div class="col-lg-5">
                 </div>
                  <div class="col-lg-4">
                       <div class="form-group">
<div class="col-lg-8">
  <select name="Company" class="form-control" id="Company">
 <?php 
  $sel_comp = "select Company_Id,C_Name from company_deetaails";
  $sel_comp_exe = mysql_query($sel_comp);
 while($sel_comp_fetch = mysql_fetch_array($sel_comp_exe)){
 ?>
 <option value="<?php echo $sel_comp_fetch['Company_Id'];?>"><?php echo $sel_comp_fetch['C_Name'];?></option>
 <?php } ?>
   </select>
  </div>
    </div>                
    </div>
    <div class="col-lg-3">
                    </div>
                    </div>
                <?php
	 }
	 elseif($apvalevana=='Levana')
	 { ?>
      <div class="form-group row" align="center">
  <div class="col-lg-5">
                 </div>
                  <div class="col-lg-4">
                       <div class="form-group">
<div class="col-lg-8">
  <select name="Company" class="form-control" id="Company">
 <?php 
  $sel_comp = "select Customer_Id,Cu_En_Name from customer_details";
  $sel_comp_exe = mysql_query($sel_comp);
 while($sel_comp_fetch = mysql_fetch_array($sel_comp_exe)){
 ?>
 <option value="<?php echo $sel_comp_fetch['Customer_Id'];?>"><?php echo $sel_comp_fetch['Cu_En_Name'];?></option>
 <?php } ?>
   </select>
  </div>
    </div>                
    </div>
    <div class="col-lg-3">
                    </div>
                    </div>
	 <?php }
 }
	 ?>