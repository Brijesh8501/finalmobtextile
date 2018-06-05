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
                    <h1 class="page-header" align="center">BILTY ENTRY-NORMAL REPORT</h1>
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
                                <span class="input-group-addon"><i class="icon-calendar"></i></span>
                                <input type="text" class="form-control" value="" id="reportrange" name="reportrange" />
                            </div>
                             <center>-------------------- OR --------------------</center> 
                            <fieldset style="background-color:#F7F7F7; width:100%; height:100px;">
         <legend><center>Reference No. Print</center></legend>
         <center>
                             <div class="input-group">
                      <select name="Ref_No" id="Ref_No" class="form-control">
                      <option value="">--Select--</option>
                     <?php
					 include("databaseconnect.php");
					 $sel = "select * from bilty_details";
					 $sel_exe = mysql_query($sel);
					 while($sel_fetch = mysql_fetch_array($sel_exe))
					 {
						 ?>
						 <option value="<?php echo $sel_fetch['Ref_No']; ?>"><?php echo $sel_fetch['Bilty_Id']; ?></option>
                     <?php }
					 ?>
                    </select>
                      </div> 
                      </center>
                      </fieldset>
                       <button class="btn btn-primary btn-grad" type="button" id="Searchref" name="Searchref"><i class="icon-search">&nbsp;Ref. No Search</i></button>
                        </div>
                    </div>
                          <div class="col-lg-3">
                          </div>  
                        </div>
                  </div>
                   <div align="center">
                        <button class="btn btn-primary btn-grad" type="button" id="Search" name="Search"><i class="icon-search">&nbsp;Search</i></button>
                   </div> 
                    <div id="loader">
                 </div>    
                  <hr />
                <div class="col-lg-12">
                            <div class="table-responsive" id="table">
                            </div>
                        </div>
                        <hr />
                         <div class="col-lg-12">
                            <div class="table-responsive" id="tableprint">
                            </div>
                        </div>
                       <hr/>
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
     $("#Search").click(function(){
		 $("#loader").fadeIn();
		t1=$("#reportrange").val();
sql="?reportrange="+t1+"&Search=Search";
  $("#table").load("totalbiltyreportstable.php"+sql);
   $("#loader").fadeOut();
		  });
		   $("#Searchref").click(function(){
			    $("#loader").fadeIn();
		t1=$("#Ref_No").val();
sql="?Ref_No="+t1+"&Searchref=Searchref";
  $("#tableprint").load("totalbiltyprintreportstable.php"+sql);
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