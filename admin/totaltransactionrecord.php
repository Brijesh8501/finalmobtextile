<?php include("logcode.php"); error_reporting(0); ?>
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
                    <h1 class="page-header" align="center">TRANSACTION REPORT</h1>
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
                                <input type="text" class="form-control" value="" id="reportrange" name="reportrange" />                                
                                </div> 
                                </div>      
                            </div>
                            <center>-------------------- OR --------------------</center> 
                            <fieldset style="background-color:#F7F7F7; width:60%; height:100px;">
         <legend><center>Fresh Invoice</center></legend>
         <center>
                             <div class="input-group">
                      <select name="Trans_TypefreshTra" id="Trans_TypefreshTra" class="form-control">
                      <option value="">--Select--</option>
                     <option value="Beam">Beam</option>
                    <option value="Bobbin">Bobbin</option>
                     <option value="Taka">Taka</option>
                    <option value="Saree">Saree</option>
                    </select>
                      </div> 
                      </center>
                      </fieldset> 
                      <button class="btn btn-primary btn-grad" type="button" id="SearchfreshTra" name="Searchfresh"><i class="icon-search">&nbsp;Fresh Invoice Search</i></button>
                            </div>
         <div class="col-lg-3">
         <fieldset style="background-color:#F7F7F7; width:60%; height:170px;">
         <legend><center>Search By</center></legend>
         <center>
         <div class="input-group">
                      <select name="Trans_TypeTra" id="Trans_TypeTra" class="form-control">
                      <option value="">--Select--</option>
                     <option value="Beam">Beam</option>
                    <option value="Bobbin">Bobbin</option>
                     <option value="Taka">Taka</option>
                    <option value="Saree">Saree</option>
                      </select>
                      </div> 
                      <div class="input-group">
                      <select name="Payment_TypeTra" id="Payment_TypeTra" class="form-control">
                      <option value="">--Select--</option>
                     <option value="Cheque">Cheque</option>
                    <option value="Cash">Cash</option>
                      </select>
                      </div>
                       <div id="showTra">
                       </div>
                      </center>
                      </fieldset> 
                      </div>
                      </div>     
                    <div align="center">
                        <button class="btn btn-primary btn-grad" type="button" id="SearchTra" name="SearchTra"><i class="icon-search">&nbsp;Transaction Search</i></button>
                   </div>
                    <div id="loader">
                 </div>     
                  <hr />
                            <div class="table-responsive" id="tableTra">
                            </div>
                        <hr />
                       <div class="table-responsive" id="tablefreshTra">
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
       $(document).ready(function() {
		   $("#Trans_TypeTra").change(function(){
		t5=$("#Trans_TypeTra").val();
		var q="?Trans_TypeTra="+t5;
		$("#showTra").load("tottransstatus.php"+q);
		 });
		  $("#SearchTra").click(function(){
			  $("#loader").fadeIn();
		t1 = $("#reportrange").val();
		t2 = $("#Payment_TypeTra").val();
		t3 = $("#Trans_TypeTra").val();
		t4 = $("#Status").val();
sql="?reportrange="+t1+"&Payment_TypeTra="+t2+"&Trans_TypeTra="+t3+"&Status="+t4+"&SearchTra=SearchTra";
  $("#tableTra").load("totaltransactionreporttables.php"+sql);
             $("#loader").fadeOut();
		  });
		   $("#SearchfreshTra").click(function(){
			   $("#loader").fadeIn();
		t1 = $("#Trans_TypefreshTra").val();
sql="?Trans_TypefreshTra="+t1+"&SearchfreshTra=SearchfreshTra";
  $("#tablefreshTra").load("totaltransfreshreporttables.php"+sql);
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