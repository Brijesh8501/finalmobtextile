<?php include("logcode.php"); ?>
<!DOCTYPE html>
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<head>
      <meta charset="UTF-8" />
    <title>Shingori Textile</title>
     <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
    <link rel="shortcut icon" href="Icons/st85.png">
  <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="assets/css/main.css" />
</head>
<body>
<?php include("sidemenu.php"); ?>
               <div class="inner">
                    <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" align="center">STOCK</h1>
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
  <select name="Stock" class="form-control" id="Stock">
    <option value="">--Select--</option>
    <option value="Beam">Beam</option>
    <option value="Bobbin">Bobbin</option>
    <option value="Taka">Taka</option>
    <option value="Saree">Saree</option>
  </select>
  </div>
</div>
                        </div>
                         <div class="col-lg-3">
                 </div>
                   </div>
                   <div id="show">
                   </div>
                   <div align="center">
                   <button type="button" value="Search" class="btn btn-primary btn-grad" name="SearchStock" id="SearchStock"><i class="icon-search"></i> Search
                            </button>
                        </div>
                  <hr />
                      <div class="col-lg-12" align="center">
                         <div class="row">
                <div class="col-lg-12">
                            <div class="table-responsive" id="table">
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
     <script src="assets/js/shortcut.js"></script>
    <script src="assets/js/googleapi.js"></script>
<script>
         $(document).ready(function () {
			 $('#Stock').focus();
    $("#Stock").change(function(){
		t5 = $("#Stock").val();
		var z = "?Stock="+t5;
		$("#show").load("stockcurrentbobbinajax.php"+z);
		 });	
	$("#SearchStock").click(function(){
		t5 = $("#Stock").val();
		t6 = $("#Status").val();
		var q="?Stock="+t5+"&Status="+t6+"&SearchStock=SearchStock";
		$("#table").load("stockcurrentajax.php"+q);
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
	<?php include("shortcutkeys.php");?>
	</script>
</body>
</html>
<?php ob_flush(); ?>