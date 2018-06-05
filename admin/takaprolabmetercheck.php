<?php 
include("databaseconnect.php");
if(isset($_REQUEST['TTa_Pro_Id']))
{
	$TTa_Pro_Id = $_REQUEST['TTa_Pro_Id'];
	
 $sql = "select taka_production.Total_Meter from taka_production where taka_production.Ta_Pro_Id = '".$TTa_Pro_Id."' ";
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
}
	?>
 <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Prod-Total Meter :</label>
                   <div class="col-lg-7">
                    <input type="text" id="Taka_T_Meter" placeholder="" class="form-control" name="Taka_T_Meter"  value="<?php echo $row['Total_Meter']; ?>"  readonly />
                    </div>
                </div>