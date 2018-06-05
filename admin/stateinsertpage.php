<?php include("logcode.php"); error_reporting(0); require_once('../Connections/brijesh8510.php');
date_default_timezone_set('Asia/Calcutta');
 include("webrenew.php");
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
	if(!isset($_SESSION['User']))
	{
	}
	else
	{
	 mysql_select_db($database_brijesh8510, $brijesh8510);
$st_id = $_POST['st_id'];
$st_name = $_POST['st_name'];
$new1 = str_replace('\' ', '\'', ucwords(str_replace('\'', '\' ', strtolower($st_name))));
$cnt_id = $_POST['cnt_id'];
$Entry_Id = $row_result['Registration_Id'];
$query = mysql_query("select * from state1 where st_name='".$new1."' ") or die(mysql_error());
$duplicate = mysql_num_rows($query);
   if($duplicate==0)
    {
      $query1 = mysql_query("INSERT INTO `state1` (`st_id`, `st_name`, `cnt_id`, `Entry_Id`) VALUES (NULL, '$new1', '$cnt_id', '$Entry_Id')") or die(mysql_error());
	  
	  
    $dateact = date('Y-m-d');
	$dateactfull = date('d-m-Y        h:i:s A');
	$Partact = "New State Entry<br/>State : ".$new1;
	$insactivity = "insert into activity(Activity_Id,Date,Particular,Type,Action,Datefull,Id) values(NULL,'$dateact','$Partact','State - Insert','insert','$dateactfull','$Entry_Id')";
	mysql_query($insactivity); 
	
	
	   $insertGoTo = "statelistpage";
  echo '<script>alert("Record inserted....");</script>';
  echo '<script>window.location="'.$insertGoTo.'";</script>';
    }
    else
    {
      echo '<script>alert("This state is allready exists....");</script>';
    }
}
}
mysql_select_db($database_brijesh8510, $brijesh8510);
$query_cntt = "SELECT * FROM country1";
$cntt = mysql_query($query_cntt, $brijesh8510) or die(mysql_error());
$row_cntt = mysql_fetch_assoc($cntt);
$totalRows_cntt = mysql_num_rows($cntt);
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
                    <h1 class="page-header" align="center">STATE</h1>
                </div>
            </div>
<div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <div id="div-1" class="accordion-body collapse in body">
            <form class="form-horizontal"  method="post" name="form1" onsubmit="if(submitting) {
            alert('The record is submitting, please wait a moment...');
            submit.disabled = true; 
            return false;
            }
            if(State(this))
            {
            submit.value = 'Submitting...';
            submitting = true;
            return true; 
            }
            return false;">
<div class="form-group">
                    <label for="text2" class="control-label col-lg-4">State ID :</label>
                    <div class="col-lg-8">
                        <input type="text" name="st_id" id="st_id" class="form-control" value="<?php echo getNewStateID(); ?>" readonly />
                    </div>
                </div>
                <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">State :</label>
                    <div class="col-lg-8">
                      <input type="text" id="st_name" placeholder="state name is not changeable afterwards so enter appropriate name" class="form-control"  name="st_name" value="<?php echo $st_name; ?>" />
                      <span id="error1" style="color:#F00";></span>
                    </div>
                </div>
                <div class="form-group">
<label class="control-label col-lg-4">Country :</label>
<div class="col-lg-8">
  <select name="cnt_id" class="form-control">
    <option value="">--Select--</option>
    <?php 
do {  
?>
                    <option value="<?php echo $row_cntt['cnt_id']?>" ><?php echo $row_cntt['cnt_name']?></option>
                    <?php
}while($row_cntt = mysql_fetch_assoc($cntt));
  $rows = mysql_num_rows($cntt);
  if($rows > 0) {
      mysql_data_seek($cntt, 0);
	  $row_cntt = mysql_fetch_assoc($cntt);
  }
?>
  </select>
  </div>
</div>
                                        <div style="text-align:center" class="form-actions no-margin-bottom">
                                            <a href="statelistpage"><input type="button" value="Back" class="btn btn-inverse btn-lg " /></a>
                                            <?php
											 if($days_remaining<=0)
{
	echo "<strong style='color:#F00;'>* Please renew your website</strong>";
}
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
<script src="assets/js/state.js"></script>
<script type="text/javascript">
<?php include("shortcutkeys.php");?>
</script>
</body>
</html>
<?php
function getNewStateID()
{
	include("databaseconnect.php");
	$sql="select max(st_id)+1 from state1";
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
mysql_free_result($cntt);
 ob_flush(); ?>