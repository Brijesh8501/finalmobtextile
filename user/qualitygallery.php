<?php require_once('../Connections/brijesh8510.php'); 
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysql_select_db($database_brijesh8510, $brijesh8510);
$query_Recordset1 = "SELECT * FROM gallery where status = 'Show' order by sequence asc";
$Recordset1 = mysql_query($query_Recordset1, $brijesh8510) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<!doctype html>
<html lang="en">
<head>
	<title>Shingori Textile | Gallery</title>
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
		<div class="page-banner">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
					</div>
					<div class="col-md-6">
						<ul class="breadcrumbs">
							<li><a href="index.php">Home</a></li>
							<li><a href="qualitygallery.php">Gallery</a></li>
							<li>Quality</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div id="content">
			<div class="container">
				<div class="project-page row">
					<div class="project-media col-md-8">
						<div class="touch-slider project-slider">
							<?php do { ?>
                              <div class="item"> <a class="lightbox" title="<?php echo $row_Recordset1['image_name']; ?>" href="../admin/<?php echo $row_Recordset1['image']; ?>" data-lightbox-gallery="gallery2">
							    <div class="thumb-overlay"><i class="fa fa-arrows-alt"></i></div>
							    <img alt="" src="../admin/<?php echo $row_Recordset1['thumbnail']; ?>" style="width:100%;"> </a> </div>
							  <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
				      </div>
					</div>
					<div class="project-content col-md-4">
						<h4><span>Gallery Description</span></h4>
						<p>The gallery shows the image of quality which is currently made in shingori textile, you can also contact us for particular quality by using contact page in which you have to write quality name in subject which is allready specified in image</p>
						<div class="post-share">
						</div>
					</div>
				</div>
			</div>
		</div>
		<footer>
			<div class="container">
				<div class="row footer-widgets">
				<?php include("bottomside.php"); ?>
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
<?php
mysql_free_result($Recordset1);
?>
