<!doctype html>
<html lang="en">
<head>
  <title>Shingori Textile | About Us</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta name="description" content="Margo - Responsive HTML5 Template">
  <meta name="author" content="iThemesLab">
  <link rel="stylesheet" href="asset/css/bootstrap.min.css" type="text/css" media="screen">
  <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" media="screen">
  <link rel="stylesheet" type="text/css" href="css/style.css" media="screen">
  <link rel="stylesheet" type="text/css" href="css/responsive.css" media="screen">
  <link rel="stylesheet" type="text/css" href="css/colors/red.css" title="red" media="screen" />
  <link rel="stylesheet" type="text/css" href="css/colors/jade.css" title="jade" media="screen" />
  <link rel="stylesheet" type="text/css" href="css/colors/blue.css" title="blue" media="screen" />
  <link rel="stylesheet" type="text/css" href="css/colors/beige.css" title="beige" media="screen" />
  <link rel="stylesheet" type="text/css" href="css/colors/cyan.css" title="cyan" media="screen" />
  <link rel="stylesheet" type="text/css" href="css/colors/green.css" title="green" media="screen" />
  <link rel="stylesheet" type="text/css" href="css/colors/orange.css" title="orange" media="screen" />
  <link rel="stylesheet" type="text/css" href="css/colors/peach.css" title="peach" media="screen" />
  <link rel="stylesheet" type="text/css" href="css/colors/pink.css" title="pink" media="screen" />
  <link rel="stylesheet" type="text/css" href="css/colors/purple.css" title="purple" media="screen" />
  <link rel="stylesheet" type="text/css" href="css/colors/sky-blue.css" title="sky-blue" media="screen" />
  <link rel="stylesheet" type="text/css" href="css/colors/yellow.css" title="yellow" media="screen" />
<style>
.active { background-color: #000; }
</style>
</head>
<body>
  <div id="container">
    <div class="hidden-header"></div>
    <header class="clearfix">
      <div class="top-bar">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <ul class="contact-details">
                               <?php include("companyside.php"); ?>
                            </ul>
            </div>
            <div class="col-md-6">
            </div>
          </div>
        </div>
      </div>
      <div class="navbar navbar-default navbar-top">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="index.php"><img alt="" src="images/brijesh logo.png"></a>
          </div>
          <div class="navbar-collapse collapse">
             <div id="sub-header">
           <?php include("topside.php"); ?>
           </div>
          </div>
        </div>
      </div>
    </header>
    <div class="page-banner" style="padding:40px 0; background: url(images/slide-02-bg.jpg) center #f9f9f9;">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h2>About Us</h2>
            <p>We Are Professional</p>
          </div>
          <div class="col-md-6">
            <ul class="breadcrumbs">
              <li><a href="index.php">Home</a></li>
              <li>About Us</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div id="content">
      <div class="container">
        <div class="page-content">
          <div class="row">
            <div class="col-md-7">
              <h4 class="classic-title"><span>Welcome To Shingori-Textile</span></h4>
              <?php
               include("../admin/databaseconnect.php");
			  $sel_about = "select * from company_about";
			  $sel_exe = mysql_query($sel_about);
			  $sel_fetch = mysql_fetch_array($sel_exe);
			  ?>
              <p><?php echo $sel_fetch[1];?></p>
            </div>
            <div class="col-md-5"> 
              <div class="touch-slider" data-slider-navigation="true" data-slider-pagination="true">
                <div class="item"><img alt="" src="images/IMG_1090.JPG"></div>
                <div class="item"><img alt="" src="images/IMG_1092.JPG"></div>
                <div class="item"><img alt="" src="images/IMG_1075.JPG"></div>
                <div class="item"><img alt="" src="images/IMG_1062.JPG"></div>
                <div class="item"><img alt="" src="images/IMG_1087.JPG"></div>
                <div class="item"><img alt="" src="images/IMG_1126.JPG"></div>
              </div>
            </div>
          </div>
          <div class="hr1" style="margin-bottom:50px;"></div>
          <div class="row">
          </div>
        </div>
      </div>
    </div>
    <footer>
      <div class="container">
        <div class="row footer-widgets">
         <?php include("bottomside.php") ?>
      </div>
    </footer>
  </div>
  <a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>
  <div id="loader">
    <div class="spinner">
      <div class="dot1"></div>
      <div class="dot2"></div>
    </div>
  </div>
  <?php include("settingbar.php"); ?>
    <script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
  <script type="text/javascript" src="js/jquery.migrate.js"></script>
  <script type="text/javascript" src="js/modernizrr.js"></script>
  <script type="text/javascript" src="asset/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/jquery.fitvids.js"></script>
  <script type="text/javascript" src="js/owl.carousel.min.js"></script>
  <script type="text/javascript" src="js/nivo-lightbox.min.js"></script>
  <script type="text/javascript" src="js/jquery.isotope.min.js"></script>
  <script type="text/javascript" src="js/jquery.appear.js"></script>
  <script type="text/javascript" src="js/count-to.js"></script>
  <script type="text/javascript" src="js/jquery.textillate.js"></script>
  <script type="text/javascript" src="js/jquery.lettering.js"></script>
  <script type="text/javascript" src="js/jquery.easypiechart.min.js"></script>
  <script type="text/javascript" src="js/jquery.nicescroll.min.js"></script>
  <script type="text/javascript" src="js/jquery.parallax.js"></script>
  <script type="text/javascript" src="js/script.js"></script>
<script>
$(function(){
    var url = window.location.href; 
    $("#sub-header a").each(function() {
        if(url == (this.href)) { 
            $(this).closest("li").addClass("active");
        }
    });
});
</script>
</body>
</html>