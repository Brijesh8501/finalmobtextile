 <?php 
 if(isset($_REQUEST['Stock']))
 {
	 $Stock = $_REQUEST['Stock'];
	 if($Stock=='Bobbin')
	 {
	 ?>
    <div class="form-group row" align="center">
  <div class="col-lg-5">
                 </div>
                  <div class="col-lg-4">
                       <div class="form-group">
<div class="col-lg-8">
  <select name="Status" class="form-control" id="Status">
    <option value="NotReturn-unused">NotReturn-unused</option>
    <option value="In-Using">In-Using</option>
    <option value="NotReturn-used">NotReturn-used</option>
  </select>
  </div>
    </div>                
    </div>
    <div class="col-lg-3">
                    </div>
                    </div>
                <?php
	 }
	 else
	 {
	 }
 }
	 ?>