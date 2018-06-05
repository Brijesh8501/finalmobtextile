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
                    <h1 class="page-header" align="center">EXPENSE ENTRY REPORT</h1>
                </div>
            </div>
<div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <div id="div-1" class="accordion-body collapse in body">
        <form class="form-horizontal" method="post" id="form">
        <div class="form-group row">
            <div class="col-lg-4" >
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
                    </div>
                           <div class="col-lg-3">
         <fieldset style="background-color:#F7F7F7; width:60%; height:130px;">
         <legend><center>Search By</center></legend>
         <center>
         <div class="input-group">
                      <select name="TypePetty" id="TypePetty" class="form-control">
                     <option value="All">All</option>
                      <option value="Cheque">Cheque</option>
                      <option value="Cash">Cash</option>
                      <option value="RTGS">RTGS</option>
                      <option value="Online">Online</option>
                      <option value="Bank_Charges">Bank_Charges</option>
                      <option value="Other_Charges">Other_Charges</option>
                      </select>
                      </div>
                      </center>
                      </fieldset> 
                      </div>
                      </div>     
                   <div align="center">
                        <button class="btn btn-primary btn-grad" type="button" id="SearchPetty" name="SearchPetty"><i class="icon-search">&nbsp;Search</i></button>
                   </div>
                    <div id="loader">
                 </div>     
                  <hr />
                <div class="col-lg-12">
                            <div class="table-responsive" id="tablePetty">
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
   $("#SearchPetty").click(function(){
	   $("#loader").fadeIn();
		t1=$("#reportrange").val();
		t2=$("#TypePetty").val();
sql="?reportrange="+t1+"&TypePetty="+t2+"&SearchPetty=SearchPetty";
  $("#tablePetty").load("totalpettyreportstable.php"+sql);
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