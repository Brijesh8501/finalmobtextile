<?php 
include("logcode.php");
date_default_timezone_set('Asia/Calcutta');
include("webrenew.php");
?>
<!DOCTYPE html>
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>Home Page | Shingori Textile</title>
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
     <link rel="stylesheet" type="text/css" href="assets/css/style-elegant-modal.css">
</head>
<body onload="updateIndicator()" ononline="updateIndicator()" onoffline="updateIndicator()">
     <?php include("sidemenu.php"); ?>
      
	
            <div class="inner">
                <?php include("internetconnectpanel.php");?>
                
                <div class="row">
                    <div class="col-lg-12">
                        <h1 align="right"> <img src="Icons/Logost1.png"/> </h1>
                    </div>
                </div>
                 <br />
                 <br />
                 <br />
                 <br />
                 <br />
                 <br />
                 <br />
                
                 <div class="row">
                    <div class="col-lg-12">
                     
                        <div style="text-align:end;font-size: 36px; color:#00F">
                          <p id="demo1"></p>
                        </div>
                    </div>
                </div>
                
                 <div class="row">
                    <div class="col-lg-12">
                        <div style="text-align:end;font-size: 36px; color:#00F">
                          <p id="demo"></p>
                        </div>
                        
                        <div style="text-align:end;font-size: 24px;">
<?php                          

if($days_remaining<=0)
{
	echo "<p style='color:#F00;'>Please renew your website.</p>";
	
}
elseif($days_remaining==1)
{
	echo "<p style='color:#F00;'>There is $days_remaining day remaining please renew your website.</p>";
}
elseif($days_remaining<=30)
{
	echo "<p style='color:#F00;'>There are $days_remaining days remaining please renew your website.</p>";
}
                       ?>  
                       </div>  
                    </div>
                </div>
               </div>
 <?php include("footer.php"); include("accountingshortcut.php"); include("challanshortcut.php"); include("invoiceshortcut.php");include("ordershortcut.php");?>
    <script src="assets/js/shortcut.js"></script>
  <script src="assets/js/jquery-2.1.4.js"></script>
 <script src="assets/js/script-elegant-modal.js"></script>
    <script src="assets/js/googleapi.js"></script>
 <script>
$(document).ready(function(){
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
var myVar=setInterval(function(){myTimer()},1000);

function myTimer() {
    var d = new Date();
    document.getElementById("demo").innerHTML = d.toLocaleTimeString();
	document.getElementById("demo1").innerHTML = d.toDateString();
}
function updateIndicator() {
     var t1 = navigator.onLine ? 'Internet connected' : 'Internet error';
	 if(t1=='Internet error')
	 {   
	     
		 $('.panel-body').show();
		}
	 else if(t1=='Internet connected') 
	 {
		  $('.panel-body').hide();
		  
		}
   }
    history.pushState(null, null);
    window.addEventListener('popstate', function(event)  {
    history.pushState(null, null);
	});
	<?php include("shortcutkeys.php");?>
</script>
</body>
</html>
<?php ob_flush();  ?>