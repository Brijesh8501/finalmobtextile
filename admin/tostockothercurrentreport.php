<?php include("logcode.php");?>
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
                    <h1 class="page-header" align="center">STOCK-OTHER</h1>
                </div>
            </div>
<div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <div id="div-1" class="accordion-body collapse in body">
        <form class="form-horizontal" method="post">
        <div class="form-group row" align="center">
            <div class="col-lg-5">
                 </div>
                  <div class="col-lg-4">
                       <div class="form-group">
<div class="col-lg-8">
  <select name="Mach_Part_Id" class="form-control" id="Mach_Part_Id">
    <option value="">--Select--</option>
   <?php
   include("databaseconnect.php");
   $sel = "select Mach_Part_Id,Mach_Pname from machine_parts";
   $sel_exe = mysql_query($sel);
   while($sel_fetch = mysql_fetch_array($sel_exe))
   {
   ?>
   <option value="<?php echo $sel_fetch['Mach_Part_Id'];?>"><?php echo $sel_fetch['Mach_Pname'];?></option>
   <?php
   }
   ?>
  </select>
  </div>
</div>
                        </div>
                         <div class="col-lg-3">
                 </div>
                   </div>
                   <div align="center">
                   <button type="button" value="Search" class="btn btn-primary btn-grad" name="SearchStockOther" id="SearchStockOther"><i class="icon-search"></i> Search
                            </button>
                        </div>
                         <div id="loader">
                 </div> 
                  <hr />
                      <div class="col-lg-12" align="center">
                         <div class="row">
                <div class="col-lg-12">
                            <div class="table-responsive" id="tableStockOther">
                            </div>
                        </div>
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
$(document).ready(function(){
 $("#SearchStockOther").click(function(){
	 $("#loader").fadeIn();
		t1 = $("#Mach_Part_Id").val();
	var q="?Mach_Part_Id="+t1+"&SearchStockOther=SearchStockOther";
		$("#tableStockOther").load("totalstockotherajaxtable.php"+q);
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