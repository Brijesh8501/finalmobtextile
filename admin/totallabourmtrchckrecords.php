<?php include("logcode.php"); error_reporting(0); ?>
<!DOCTYPE html>
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<head>
      <meta charset="UTF-8" />
    <title>Shingori Textile</title>
     <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
   <?php include("reportsfileup.php"); ?>
</head>
<body>
<?php include("sidemenu.php"); ?>
                <div class="inner">
                    <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" align="center">LABOUR-METER / FIXED REPORT</h1>
                </div>
            </div>
<div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <div id="div-1" class="accordion-body collapse in body">
        <form class="form-horizontal" method="post" id="form">
        <div class="form-group row">
        <div class="col-lg-4">
        </div>
         <div class="col-lg-3">
                       <div class="form-group">
                       <div class="col-lg-11">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="icon-calendar"></i></span>
                                <input type="text" class="form-control" value="" id="reportrange" name="reportrange" />                                </div> 
                                <span style="color:#F00">* Put exact date range to search labour-fixed records then only records  will shown.</span>
                                <fieldset style="background-color:#F7F7F7; width:100%; height:100px;">
         <legend><center>Labour-Fixed Date For Info.</center></legend>
         <center>
         <div class="input-group">
                      <select name="Date_Range" id="Date_Range" class="form-control">
                      <?php
					 include("databaseconnect.php");
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
                                </div>      
                            </div>
                            </div>
         <div class="col-lg-3">
         <fieldset style="background-color:#F7F7F7; width:100%; height:170px;">
         <legend><center>Search By</center></legend>
         <center>
         <div class="input-group">
                      <select name="TypeLabMF" id="TypeLabMF" class="form-control">
                      <option value="">--Select--</option>
                     <option value="Meter">Meter</option>
                    <option value="Fixed">Fixed</option>
                      </select>
                      <div id="show">
                       </div>
                       </div> 
                      </center>
                      </fieldset> 
                      </div>
                      </div>         
                   <div align="center">
                        <button class="btn btn-primary btn-grad" type="button" id="SearchLabMF" name="SearchLabMF"><i class="icon-search">&nbsp;Search</i></button>
                   </div>
                    <div id="loader">
                 </div>     
                  <hr />
                <div class="col-lg-12">
                            <div class="table-responsive" id="tableLabMF">
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
 $("#TypeLabMF").change(function(){
		t5=$("#TypeLabMF").val();
		var q="?TypeLabMF="+t5;
		$("#show").load("totallabourshow.php"+q);
		 });
		  $("#SearchLabMF").click(function(){
			  $("#loader").fadeIn();
		t1=$("#reportrange").val();
		t2=$("#TypeLabMF").val();
		t3=$("#Labour").val();
		sql="?reportrange="+t1+"&TypeLabMF="+t2+"&Labour="+t3+"&SearchLabMF=SearchLabMF";
  $("#tableLabMF").load("totallabourmtrreporttable.php"+sql);
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
   <?php include("reportsfiledown.php"); ?>
</body>
</html>
<?php ob_flush(); ?>