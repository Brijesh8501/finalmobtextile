<?php 
include("databaseconnect.php");
	if(isset($_REQUEST['select_status']))
{
	   $select_status = $_REQUEST['select_status'];
	   $select_exbeam_result = "select Sa_Beam_No,Be_Ref_No,Be_Meter,Org_Be_Mg_Meter,Shortage,Shortageper,Remove_Date from saree_exbeam_detailorg where Sa_Ex_Id = '$select_status'";
	   $sel_ex_exe = mysql_query($select_exbeam_result);
	   $sel_ex_fetch = mysql_fetch_array($sel_ex_exe);
	   if($select_status=="")
	   {
	   }
	   else
	   {
		   if($sel_ex_fetch['Remove_Date']=='---')
		   {date_default_timezone_set('Asia/Calcutta');
	          $Remove_Date = date('Y-m-d');
		   }
		   else
		   {
			   $Remove_Date = $sel_ex_fetch['Remove_Date'];
		   }
	?>
 <div class="form-group">
                    <label for="text2" class="control-label col-lg-6">Main-Beam No :</label>
                    <div class="col-lg-6">
                    <input type="text" id="Sa_Beam_No" placeholder="" class="form-control" name="Sa_Beam_No" value="<?php echo $sel_ex_fetch['Sa_Beam_No']; ?>" readonly/>
                    </div>
                </div>
  <div class="form-group">
                    <label for="text2" class="control-label col-lg-6">Beam-Ref. No :</label>
                    <div class="col-lg-6">
                    <input type="text" id="Be_Ref_No" placeholder="" class="form-control" name="Be_Ref_No" value="<?php echo $sel_ex_fetch['Be_Ref_No']; ?>" readonly/>
                    </div>
                </div>
                      <div class="form-group">
                    <label for="text2" class="control-label col-lg-6">Meter :</label>
                    <div class="col-lg-6">
                    <input type="text" id="Be_Meter" placeholder="" class="form-control" name="Be_Meter" value="<?php echo $sel_ex_fetch['Be_Meter']; ?>" readonly/>
                    </div>
                    </div>
                     <div class="form-group">
                    <label for="text2" class="control-label col-lg-6">Produced Meter :</label>
                    <div class="col-lg-6">
                    <input type="text" id="Org_Be_Mg_Meter" placeholder="" class="form-control" name="Org_Be_Mg_Meter" value="<?php echo $sel_ex_fetch['Org_Be_Mg_Meter']; ?>" onkeypress="return isDecimalNumberKey(event)"/>
                    </div>
                    </div>
                 <div class="form-group">
                    <label for="text2" class="control-label col-lg-6">Shortage (Mtr) :</label>
                    <div class="col-lg-6">
                    <input type="text" id="Shortage" placeholder="" class="form-control" name="Shortage" value="<?php echo $sel_ex_fetch['Shortage']; ?>" readonly/>
                    </div>
                    </div>
                 <div class="form-group">
                    <label for="text2" class="control-label col-lg-6">Shortage (%) :</label>
                    <div class="col-lg-6">
                    <input type="text" id="Shortageper" placeholder="" class="form-control" name="Shortageper" value="<?php echo $sel_ex_fetch['Shortageper']; ?>" readonly/>
                    </div>
                </div>
                 <div class="form-group">
                    <label for="text2" class="control-label col-lg-6">Remove Date :</label>
                    <div class="col-lg-6">
                    <input type="text" id="Remove_Date" placeholder="" class="form-control" name="Remove_Date" value="<?php echo $Remove_Date; ?>" readonly="readonly"/>
                 
                    </div>
                </div>
                                        <div style="text-align:center" class="form-actions no-margin-bottom">
                                            <input type="submit" value="Update" id="saree_exbeam" name="saree_exbeam" class="btn btn-primary btn-lg " />
                                        </div>
 <?php 
	   } } ?>
<script src="assets/js/googleapi.js"></script>
<script>
$(document).ready(function(){
	   $('#Remove_Date').datepicker({
                    format: "yyyy-mm-dd"
                }); 
		 $('#Org_Be_Mg_Meter, #Be_Meter').keyup(function(){
    var rate = parseFloat($('#Org_Be_Mg_Meter').val()) || 0;
    var box = parseFloat($('#Be_Meter').val()) || 0;
     var shortage = box-rate;
    $('#Shortage').val(shortage.toFixed(2));    
});
$('#Org_Be_Mg_Meter,#Shortageper').keyup(function(){
    var totalmeter = parseFloat($('#Org_Be_Mg_Meter').val()) || 0;
    var beammeter = parseFloat($('#Be_Meter').val()) || 0;
     var shortage1 = beammeter-totalmeter;
	 var shortageper = shortage1/beammeter;
	 var shortpercent = shortageper*100;
    $('#Shortageper').val(shortpercent.toFixed(2));    
});
});
</script>
<script src="assets/js/boot.datepick.js"></script>