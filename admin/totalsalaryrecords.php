<?php include("logcode.php"); error_reporting(0); 
include("databaseconnect.php");
 ?>
<!DOCTYPE html>
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<head>
      <meta charset="UTF-8" />
    <title>Shingori Textile</title>
     <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
    <?php include("reportsfileup.php");?>
</head>
<body>
<?php include("sidemenu.php"); ?>
                <div class="inner">
                    <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" align="center">SALARY METER / FIXED REPORT</h1>
                </div>
            </div>
<div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <div id="div-1" class="accordion-body collapse in body">
        <form class="form-horizontal" method="post" id="form">
        <div class="form-group row">
        <div class="col-lg-5">
        </div>
         <div class="col-lg-3">
                       <div class="input-group">
                       <select name="Date_Range" id="Date_Range" class="form-control">
                      <option value="">--Select--</option>
                      <?php
					  $sel = "select Date_Range from salary_master group by Date_Range";
					  $sel_exe = mysql_query($sel);
					  while($sel_fetch = mysql_fetch_array($sel_exe))
					  {
					  ?>
					  <option value="<?php echo $sel_fetch['Date_Range']; ?>"><?php echo $sel_fetch['Date_Range']; ?></option><?php }
					  ?>
                      </select>    
                            </div>
                            <center>-------------------- OR --------------------</center> 
                            <fieldset style="background-color:#F7F7F7; width:220px; height:120px;">
         <legend><center>Labour-Fixed</center></legend>
         <center>
         <div class="input-group">
                      <select name="Date_Rangefixed" id="Date_Rangefixed" class="form-control">
                      <option value="">--Select--</option>
                      <?php
					  $sel = "select Date_Range from salary_fixed_master group by Date_Range";
					  $sel_exe = mysql_query($sel);
					  while($sel_fetch = mysql_fetch_array($sel_exe))
					  {
					  ?>
					  <option value="<?php echo $sel_fetch['Date_Range']; ?>"><?php echo $sel_fetch['Date_Range']; ?></option><?php }
					  ?>
                      </select>  
                       </div> 
                      </center>
                      </fieldset> 
                      <button class="btn btn-primary btn-grad" type="button" id="Searchfixed" name="Searchfixed"><i class="icon-search">&nbsp;Salary-Fixed Search</i></button>
                            </div>
         <div class="col-lg-4">
         <fieldset style="background-color:#F7F7F7; width:40%; height:140px;">
         <legend><center>Search By</center></legend>
         <center>
         <div class="input-group">
                      <select name="TypeSalary" id="TypeSalary" class="form-control">
                      <option value="">--Select--</option>
                      <option value="Meter">Meter</option>
                      <option value="Fixed">Fixed</option>
                      </select>
                      </div>
                       <div id="showSalary">
                       </div>
                      </center>
                      </fieldset> 
                      </div>
                      </div>     
                   <div align="center">
                        <button class="btn btn-primary btn-grad" type="button" id="SearchSalary" name="SearchSalary"><i class="icon-search">&nbsp;Salary-Meter Search</i></button>
                   </div>  
                    <div id="loader">
                 </div>   
                  <hr />
                <div class="col-lg-12">
                            <div class="table-responsive" id="tableSalary">
                            </div>
                        </div>
                        <hr />
         </form>
            </div>
        </div>
    </div>
</div>
                    </div>
   <?php include("footer.php"); ?>
     <script src="assets/js/googleapi.js"></script>
<script>
         $(document).ready(function () {
     $("#TypeSalary").change(function(){
		t5=$("#TypeSalary").val();
		var q="?TypeSalary="+t5;
		$("#showSalary").load("totalsalarystatus.php"+q);
		 });
		  $("#SearchSalary").click(function(){
			  $("#loader").fadeIn();
		t1=$("#Date_Range").val();
		t2=$("#TypeSalary").val();
		t3=$("#Status").val();
sql="?Date_Range="+t1+"&TypeSalary="+t2+"&Status="+t3+"&SearchSalary=SearchSalary";
  $("#tableSalary").load("totalsalaryreporttable.php"+sql);
   $("#loader").fadeOut();
		  });
		  $("#Searchfixed").click(function(){
			  $("#loader").fadeIn();
		t1=$("#Date_Rangefixed").val();
		t2=$("#TypeSalary").val();
		t3=$("#Status").val();
sql="?Date_Rangefixed="+t1+"&TypeSalary="+t2+"&Status="+t3+"&Searchfixed=Searchfixed";
  $("#tableSalary").load("totalsalaryreporttable.php"+sql);
   $("#loader").fadeOut();
		  });
		 $(".dropdown").hover(            
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideDown("fast");
            $(this).toggleClass('open');        
        },
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideUp("fast");
            $(this).toggleClass('open');       
        }
    );
		 });
		history.pushState(null, null);
    window.addEventListener('popstate', function(event)  {
    history.pushState(null, null);
    });
</script>
    <?php include("reportsfiledown.php");?>
</body>
</html>
<?php ob_flush(); ?>