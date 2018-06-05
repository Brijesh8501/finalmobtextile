<?php 
include("databaseconnect.php");
if(isset($_REQUEST['SSa_Pro_Id']))
{
	$SSa_Pro_Id = $_REQUEST['SSa_Pro_Id'];
	
 $sql = "select saree_production.Total_Meter from saree_production where saree_production.Sa_Pro_Id = '".$SSa_Pro_Id."' ";
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
}
	?>
 <div class="form-group">
                    <label for="text2" class="control-label col-lg-5">Prod-Total Meter :</label>

                    <div class="col-lg-7">
                    <input type="text" id="Saree_T_Meter" placeholder="" class="form-control" name="Saree_T_Meter"  value="<?php echo $row['Total_Meter']; ?>"  readonly />
                    </div>
                </div>