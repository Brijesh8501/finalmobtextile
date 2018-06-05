<?php include("logcode.php"); error_reporting(0); ?>
<!DOCTYPE html>
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<head>
      <meta charset="UTF-8" />
    <title>Shingori Textile</title>
     <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
   <noscript>
    <style> html {display:none; }</style>
     <META HTTP-EQUIV="Refresh" CONTENT="0; URL=javascripterror.php">
    </noscript>
    <link rel="shortcut icon" href="Icons/st85.png">
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="assets/css/main.css" />
      <link rel="stylesheet" href="assets/css/joint-jquery-ui-datepicker.css">
     </head>
     <body>
<?php include("sidemenu.php"); ?>
              <div class="inner">
                    <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" align="center">OTHER CREDIT SEARCH</h1>
                </div>
            </div>
<div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <div id="div-1" class="accordion-body collapse in body">
        <form class="form-horizontal" method="post" id="form">
        <div class="form-group row">
            <div class="col-lg-5" >
                </div>
                  <div class="col-lg-4">
                       <div class="form-group">
                        <div class="col-lg-8">
                            <div class="input-group">
                                <input type="text" class="form-control" value="" id="search" name="search" autofocus/>
                              
                            </div>
                        </div>
                    </div>
                          <div class="col-lg-3">
                          </div>  
                        </div>
                  </div>
                   <div align="center">
                        <button class="btn btn-primary btn-grad" type="button" id="Searchcredit" name="Searchcredit"><i class="icon-search">&nbsp;Search</i></button>
                   </div>  
                    <div id="loader">
                 </div>   
                  <hr />
                 <div class="col-lg-12">
                            <div class="table-responsive" id="table">
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
			$('#search').autocomplete({
	source: function( request, response ) {
		$.ajax({
			url : 'searchcreditajax.php',
			dataType: "json",
			method: 'post',
			data: {
			   name_startsWith: request.term,
			   type: 'country_table',
			   row_num : 1
			},
			 success: function( data ) {
				 response( $.map( data, function( item ) {
				 	var code = item.split("|");
					return {
						label: code[0],
						value: code[0],
						data : item
					}
				}));
			}
		});
	},
	autoFocus: true,	      	
	minLength: 0,
	select: function( event, ui ) {
		$('#search').html(ui.item.value);
	}		      	
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
<script src="assets/js/jointjquerydateandpicker.js"></script>
</body>
</html>
<?php ob_flush(); ?>