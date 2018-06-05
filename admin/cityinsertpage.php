<?php include("logcode.php"); require_once('../Connections/brijesh8510.php');
date_default_timezone_set('Asia/Calcutta');
	include("webrenew.php");
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")){
	if(!isset($_SESSION['User']))
	{}
	else
	{
   mysql_select_db($database_brijesh8510, $brijesh8510);
$ct_id = $_POST['ct_id'];
$ct_name = $_POST['ct_name'];
$new1 = str_replace('\' ', '\'', ucwords(str_replace('\'', '\' ', strtolower($ct_name))));
$st_id = $_POST['st_id'];
$Entry_Id = $row_result['Registration_Id'];
$query = mysql_query("select * from city1 where ct_name='".$new1."' ") or die(mysql_error());
$duplicate = mysql_num_rows($query);
   if($duplicate==0)
    {
      $query1 = mysql_query("INSERT INTO `city1` (`ct_id`, `ct_name`, `st_id`, `Entry_Id`) VALUES (NULL, '$new1', '$st_id','$Entry_Id')") or die(mysql_error());
	  
	  $dateact = date('Y-m-d');
	$dateactfull = date('d-m-Y        h:i:s A');
	$Partact = "New City Entry<br/>City : ".$new1;
	$insactivity = "insert into activity(Activity_Id,Date,Particular,Type,Action,Datefull,Id) values(NULL,'$dateact','$Partact','City - Insert','insert','$dateactfull','$Entry_Id')";
	mysql_query($insactivity); 
	
	   $insertGoTo = "citylistpage";
  echo '<script>alert("Record inserted....");</script>';
  echo '<script>window.location="'.$insertGoTo.'";</script>';
    }
    else
    {
      echo '<script>alert("This city is allready exists....");</script>';
    }
	}
}
mysql_select_db($database_brijesh8510, $brijesh8510);
$query_state = "SELECT * FROM `state1`";
$state = mysql_query($query_state, $brijesh8510) or die(mysql_error());
$row_state = mysql_fetch_assoc($state);
$totalRows_state = mysql_num_rows($state);
?>
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
</head>
<body>   
<?php include("sidemenu.php"); ?>
                <div class="inner">
                    <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" align="center">CITY</h1>
                </div>
            </div>
<div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <div id="div-1" class="accordion-body collapse in body">
            <form class="form-horizontal" method="post" name="form1" onsubmit="if(submitting) {
            alert('The record is being submitting, please wait a moment...');
            submit.disabled = true; 
            return false;
            }
            if(City(this))
            {
            submit.value = 'Submitting...';
            submitting = true;
            return true; 
            }
            return false;">
            <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">City ID :</label>
                    <div class="col-lg-8">
                        <input type="text" name="ct_id" id="ct_id" class="form-control" value="<?php echo getNewCityID(); ?>" readonly/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">City :</label>
                    <div class="col-lg-8">
                      <input type="text" id="ct_name" placeholder="city name is not changeable afterwards so enter appropriate name" class="form-control"  name="ct_name" value="" />
                      <span id="error1" style="color:#F00";></span>
                    </div>
                </div>
                <div class="form-group">
<label class="control-label col-lg-4">State :</label>
<div class="col-lg-8">
  <select name="st_id" class="form-control">
    <option value="">--Select--</option>
     <?php 
do {  
?>
             <option value="<?php echo $row_state['st_id']?>" ><?php echo $row_state['st_name']?></option>
             <?php
}while($row_state = mysql_fetch_assoc($state));
  $rows = mysql_num_rows($state);
  if($rows > 0) {
      mysql_data_seek($state, 0);
	  $row_state = mysql_fetch_assoc($state);
  }
?>
  </select>
 </div>
</div>
                                        <div style="text-align:center" class="form-actions no-margin-bottom">
                                         <a href="citylistpage"><input type="button" value="Back" class="btn btn-inverse btn-lg " /></a>
                                         <?php
                                            if($days_remaining<=0)
{
	echo "<strong style='color:#F00;'>* Please renew your website</strong>";
	
}
                                            if($days_remaining<=0)
{	}
elseif($days_remaining>0)
{
?>	
                                           
                                            <input type="submit" value="Submit" name="submit" class="btn btn-primary btn-lg " />
                                            <input type="hidden" name="MM_insert" value="form1">
                                            <?php } ?>
                                        </div>                                       
                </form>
            </div>
        </div>
    </div>
</div>
                    </div>
   <?php include("footer.php"); ?>
     <script src="assets/js/shortcut.js"></script>
    <script src="assets/js/googleapi.js"></script>
    <script src="assets/js/city.js"></script>
    <script type="text/javascript">
	<?php include("shortcutkeys.php");?>
	</script>
</body>
</html>
<?php
function getNewCityID()
{
	include("databaseconnect.php");
	$sql="select max(ct_id)+1 from city1";
	$result= mysql_query($sql);
	$row= mysql_fetch_array($result);
	if($row != null && $row[0] > 0)
		{
			echo $row[0];
		}
		else
		{
			echo '1';
		}
	}
mysql_free_result($state);
 ob_flush(); ?>