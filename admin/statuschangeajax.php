<?php if(isset($_REQUEST['select_status']))
{
	   $select_status = $_REQUEST['select_status'];
	   if($select_status=='ch_beam')
	   {
	?>
                            <div class="form-group">
                            <div class="col-lg-4">
                            </div>
<div class="col-lg-4">
  <select name="Challan_Id" class="form-control" id="Challan_Id">
    <?php
	 include("databaseconnect.php");
	$sql_select = "select * from beam_dcorg";
	$sql_exe = mysql_query($sql_select);
	while($sql_fetch = mysql_fetch_array($sql_exe))
	{
    echo '<option value="'.$sql_fetch['Be_D_C_Id'].'">'.$sql_fetch['Be_D_C_Id'].'</option>';
	}
	?>
  </select>
  </div>
  <div class="col-lg-4">
  </div>
</div>
                      <div class="form-group">
                            <div class="col-lg-4">
                            </div>
             <div class="col-lg-4">
  <select name="Status" class="form-control" id="Status">
    <option value="NotReturn">NotReturn</option>
    <option value="Return">Return</option>
  </select>
  </div>
                    <div class="col-lg-4">
                    </div>
                    </div>
                                        <div style="text-align:center" class="form-actions no-margin-bottom">
                                            <input type="submit" value="Update Beam Status" id="updatebeam" name="updatebeam" class="btn btn-primary btn-lg " />
                                        </div>
 <?php 
	   }
	   else if($select_status=='ch_bobbin')
	   {
		   ?>
           <div class="form-group">
                            <div class="col-lg-4">
                            </div>
<div class="col-lg-4">
  <select name="Challan_Id" class="form-control" id="Challan_Id">
    <?php
	 include("databaseconnect.php");
	$sql_select = "select * from boobin_dcorg";
	$sql_exe = mysql_query($sql_select);
	while($sql_fetch = mysql_fetch_array($sql_exe))
	{
    echo '<option value="'.$sql_fetch['Bobbin_D_C_Id'].'">'.$sql_fetch['Bobbin_D_C_Id'].'</option>';
	}
	?>
  </select>
  </div>
  <div class="col-lg-4">
  </div>
</div>
                      <div class="form-group">
                            <div class="col-lg-4">
                            </div>
             <div class="col-lg-4">
  <select name="Status" class="form-control" id="Status">
    <option value="NotReturn-unused">NotReturn-unused</option>
    <option value="In-Using">In-Using</option>
     <option value="NotReturn-used">NotReturn-used</option>
    <option value="Return">Return</option>
  </select>
  </div>
                    <div class="col-lg-4">
                    </div>
                    </div>
            <div style="text-align:center" class="form-actions no-margin-bottom">
                                            <input type="submit" value="Update Bobbin Status" id="updatebobbin" name="updatebobbin" class="btn btn-primary btn-lg " />
                                        </div>
           <?php
	   }
	    else if($select_status=='ch_taka')
	   {
		   ?>
           <div class="form-group">
                            <div class="col-lg-4">
                            </div>
<div class="col-lg-4">
  <select name="Challan_Id" class="form-control" id="Challan_Id">
    <?php
	 include("databaseconnect.php");
	$sql_select = "select * from taka_dcorg";
	$sql_exe = mysql_query($sql_select);
	while($sql_fetch = mysql_fetch_array($sql_exe))
	{
    echo '<option value="'.$sql_fetch['Ta_D_C_Id'].'">'.$sql_fetch['Ta_D_C_Id'].'</option>';
	}
	?>
  </select>
  </div>
  <div class="col-lg-4">
  </div>
</div>
                      <div class="form-group">
                            <div class="col-lg-4">
                            </div>
             <div class="col-lg-4">
  <select name="Status" class="form-control" id="Status">
    <option value="Sale">Sale</option>
    <option value="Return">Return</option>
  </select>
  </div>
                    <div class="col-lg-4">
                    </div>
                    </div>
		    <div style="text-align:center" class="form-actions no-margin-bottom">
                                            <input type="submit" value="Update Taka Status" id="updatetaka" name="updatetaka" class="btn btn-primary btn-lg " />
                                        </div>
                                        <?php
	   }
	    else if($select_status=='ch_saree')
	   {
		   ?>
            <div class="form-group">
                            <div class="col-lg-4">
                            </div>
<div class="col-lg-4">
  <select name="Challan_Id" class="form-control" id="Challan_Id">
    <?php
	 include("databaseconnect.php");
	$sql_select = "select * from saree_dcorg";
	$sql_exe = mysql_query($sql_select);
	while($sql_fetch = mysql_fetch_array($sql_exe))
	{
    echo '<option value="'.$sql_fetch['Sa_D_C_Id'].'">'.$sql_fetch['Sa_D_C_Id'].'</option>';
	}
	?>
  </select>
  </div>
  <div class="col-lg-4">
  </div>
</div>
                      <div class="form-group">
                            <div class="col-lg-4">
                            </div>
             <div class="col-lg-4">
  <select name="Status" class="form-control" id="Status">
    <option value="Sale">Sale</option>
    <option value="Return">Return</option>
  </select>
  </div>
                    <div class="col-lg-4">
                    </div>
                    </div>
            <div style="text-align:center" class="form-actions no-margin-bottom">
                                            <input type="submit" value="Update Saree Status" id="updatesaree" name="updatesaree" class="btn btn-primary btn-lg " />
                                        </div>
		   <?php
	   }
}
	   ?>
