<?php session_start(); ob_start(); error_reporting(0);
include("databaseconnect.php"); include("urlencryptdecyrpt.php");
date_default_timezone_set("Asia/Calcutta");
	if(isset($_REQUEST['msg']))
{
  $msg_error_login = "You must log in first";
}
if(isset($_REQUEST['submit']))
	{
		if (urlencode(encryptor('encrypt',gzdeflate(str_rot13($_SESSION["code"])))) == urlencode(encryptor('encrypt',gzdeflate(str_rot13($_POST["captcha"]))))) {
			$pinno = urlencode(encryptor('encrypt',gzdeflate(str_rot13($_REQUEST['pinno']))));
		if($pinno==urlencode(encryptor('encrypt',gzdeflate(str_rot13('8501')))))	
		{	
	$Username1 = strtoupper($_REQUEST['Username']);
	$Username = str_replace("'","ahir8501",$Username1);
	$Password1 = $_REQUEST['Password'];
	$Password2 = str_replace("'","ahir8501",$Password1);
	$Password = gzdeflate(str_rot13($Password2));
	if(isset($_REQUEST['chk'])) {
	date_default_timezone_set("Asia/Calcutta");
    setcookie("Username", $Username, time()+86400);
	 }
	 if(isset($_SESSION['User']))
{ 
	  $msg_session = "Someone is allready log in so you cannot log in";
	  $msg_redirect = "Redirecting to allready log in user profile.....";
	  header("refresh:5;index");
} 
else
{
	$sql = mysql_query("select * from registration_details where Username = '".$Username."' and Password = '".$Password."' ") or die(mysql_error());
	$Row_result = mysql_fetch_array($sql);
	$N = mysql_num_rows($sql);
	if($N==0)
	{
		$msg = "Wrong Username or Password";
	}
	else
	{
	if($Row_result['Status']=="Left")
	{
		$msg = "Admin has rejected your authentication so you cannot Login";
	}
	else
	{
	if($Row_result['Role']=='Admin')
	{
	echo "<strong>Welcome, ".$Username."</strong>";
		echo '<br>';
		echo "<strong>Please wait for redirecting...</strong>";
	  $_SESSION['User'] = $Username;
	  ////////////////////// activity ////////////////////////////////////////////////////////
	  $dateact = date('Y-m-d');
	$dateactfull = date('d-m-Y        h:i:s A');
	$Partact = "Login Entry<br/>Login : ".$Username;
	$insactivity = "insert into activity(Activity_Id,Date,Particular,Type,Action,Datefull,Id) values(NULL,'$dateact','$Partact','Login','insert','$dateactfull','0')";
	mysql_query($insactivity); 
	  ////////////////////////////////////////////////////////////////////////////////////////
	  ///////////////////////////////////// browser detection ///////////////////////////////////
	  if(strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== FALSE)
   $browser_check = 'Internet explorer';
 elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Trident') !== FALSE) //For Supporting IE 11
    $browser_check = 'Internet explorer';
 elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox') !== FALSE)
   $browser_check = 'Mozilla Firefox';
 elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome') !== FALSE)
   $browser_check = 'Google Chrome';
 elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mini') !== FALSE)
   $browser_check = "Opera Mini";
 elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Opera') !== FALSE)
   $browser_check = "Opera";
 elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Safari') !== FALSE)
   $browser_check = "Safari";
 else
   $browser_check = 'You have login from unknown browser';
  
  $message = "Dear Employee, You got login from <b>".$browser_check."</b> browser having username - ".$Row_result['Username']."";
$to = $Row_result['Email_Id'];
$subject = "Login notification : SHINGORI TEXTILE";
$from = 'mickyahir@shingoritextile.in';
$headers     =<<<AKAM
From: Admin <$from>
Reply-To: $from
MIME-Version: 1.0
Content-Type: multipart/mixed;
AKAM;
$headers = "From: $from";
mail($to,$subject,$message,$headers);
	  ///////////////////////////////////////////////////////////////////////////////////////////
	 $insertGoTo = "index";
   echo '<script>window.location="'.$insertGoTo.'";</script>';	
		
		
		
		
		
		
		
		
		
		
		
		
	}
	else
	{	
	
	$ipaddress = urlencode(encryptor('encrypt', gzdeflate(str_rot13("192.168.43.71"))));
		if($ipaddress==urlencode(encryptor('encrypt', gzdeflate(str_rot13('192.168.43.71')))) || $ipaddress==urlencode(encryptor('encrypt', gzdeflate(str_rot13('175.100.148.85')))))
		{
		echo "<strong>Welcome, ".$Username."</strong>";
		echo '<br>';
		echo "<strong>Please wait for redirecting...</strong>";
	  $_SESSION['User'] = $Username;
	  ////////////////////// activity ////////////////////////////////////////////////////////
	  $dateact = date('Y-m-d');
	$dateactfull = date('d-m-Y        h:i:s A');
	$Partact = "Login Entry<br/>Login : ".$Username;
	$insactivity = "insert into activity(Activity_Id,Date,Particular,Type,Action,Datefull,Id) values(NULL,'$dateact','$Partact','Login','insert','$dateactfull','0')";
	mysql_query($insactivity); 
	  ////////////////////////////////////////////////////////////////////////////////////////
	  ///////////////////////////////////// browser detection ///////////////////////////////////
	  if(strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== FALSE)
   $browser_check = 'Internet explorer';
 elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Trident') !== FALSE) //For Supporting IE 11
    $browser_check = 'Internet explorer';
 elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox') !== FALSE)
   $browser_check = 'Mozilla Firefox';
 elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome') !== FALSE)
   $browser_check = 'Google Chrome';
 elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mini') !== FALSE)
   $browser_check = "Opera Mini";
 elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Opera') !== FALSE)
   $browser_check = "Opera";
 elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Safari') !== FALSE)
   $browser_check = "Safari";
 else
   $browser_check = 'You have login from unknown browser';
  
  $message = "Dear Employee, You got login from <b>".$browser_check."</b> browser having username - ".$Row_result['Username']."";
$to = $Row_result['Email_Id'];
$subject = "Login notification : SHINGORI TEXTILE";
$from = 'mickyahir@shingoritextile.in';
$headers     =<<<AKAM
From: Admin <$from>
Reply-To: $from
MIME-Version: 1.0
Content-Type: multipart/mixed;
AKAM;
$headers = "From: $from";
mail($to,$subject,$message,$headers);




	  ///////////////////////////////////////////////////////////////////////////////////////////
	 $insertGoTo = "index";
   echo '<script>window.location="'.$insertGoTo.'";</script>';
		}
		else
		{
			$msg = "You cannot login";
			 ///////////////////////////////////// browser detection ///////////////////////////////////
	  if(strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== FALSE)
   $browser_check = 'Internet explorer';
 elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Trident') !== FALSE) //For Supporting IE 11
    $browser_check = 'Internet explorer';
 elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox') !== FALSE)
   $browser_check = 'Mozilla Firefox';
 elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome') !== FALSE)
   $browser_check = 'Google Chrome';
 elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mini') !== FALSE)
   $browser_check = "Opera Mini";
 elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Opera') !== FALSE)
   $browser_check = "Opera";
 elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Safari') !== FALSE)
   $browser_check = "Safari";
 else
   $browser_check = 'You have login from unknown browser';
  
  $message = "Dear Employee, Someone is trying to login from outside the organization,from <b>".$browser_check."</b> browser having username - ".$Row_result['Username']." and name - ".$Row_result['Name']."";
$to = "mickyahir@shingoritextile.in";
$subject = "Login alert : SHINGORI TEXTILE";
$from = 'mickyahir@shingoritextile.in';
$headers     =<<<AKAM
From: Admin <$from>
Reply-To: $from
MIME-Version: 1.0
Content-Type: multipart/mixed;
AKAM;
$headers = "From: $from";
mail($to,$subject,$message,$headers);
		}
	}
}





}}
		}
		else
		{
			$msg = "Please enter valid pin no";
		}


}else{
	   $msg = "Wrong captcha code entered";
	}}else{
	 $Username = '';
if(isset($_COOKIE['Username'])) {
    $Username = $_COOKIE['Username'];
  } }			  
if(isset($_REQUEST['submit1']))
{
   $user = strtoupper($_REQUEST['user']);
   $pass = gzdeflate(str_rot13($_REQUEST['pass']));
   $pass1= gzdeflate(str_rot13($_REQUEST['pass1']));
   $pass2= gzdeflate(str_rot13($_REQUEST['pass2']));
    $sql = mysql_query("select * from registration_details where Username='$user' and Password='$pass'") or die(mysql_error());
	$n = mysql_num_rows($sql);
	if($n==0)
	{
   	 echo '<script>alert("Wrong username or password....");</script>';
   }
   else
  {
     if($pass1 == $pass2)
   		{
			$sql1 = mysql_query("update registration_details set Password = '$pass1' where Username='$user' and Password = '$pass'") or die(mysql_error());
		   echo"<script>alert(\"Password changed...\")</script>";
	  }
	  else
	  {
		   echo"<script>alert(\"New password and old password not matched...\")</script>";
	  }}}
if(isset($_REQUEST['submit2']))
{
	if ($_SESSION["codeemail"] == $_POST["captcha8"]) {
	$email = $_REQUEST['email'];
	$sql="select * from registration_details where Email_Id = '$email' ";
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
	$n = mysql_num_rows($result);
	if($row['Email_Id']==$email)
	{
		$user = $row['Username'];
		$pass = str_rot13(gzinflate($row['Password']));
		$message = "Dear Employee, ".$user." Your Password is : ".$pass."";
$to = $email;
$subject = "Forgot Password  Mail : SHINGORI TEXTILE";
$from = 'mickyahir@shingoritextile.in';
$headers     =<<<AKAM
From: Admin <$from>
Reply-To: $from
MIME-Version: 1.0
Content-Type: multipart/mixed;
AKAM;
$headers = "From: $from";
mail($to,$subject,$message,$headers);
		 echo '<script>alert("Password sent successfully to your registered mail ID");</script>';
	}else{
		 echo '<script>alert("Please enter registered email ID");</script>';
	}}else{
	   echo '<script>alert("Wrong captcha code entered");</script>';
	}}
if(isset($_REQUEST['newuser1']))
{
   $User_name = strtoupper($_REQUEST['Username']);
   $Password = gzdeflate(str_rot13($_REQUEST['Password']));
   $new_username = strtoupper($_REQUEST['new_username']);
    $sql = mysql_query("select * from registration_details where Username='".$User_name."' and Password='".$Password."'") or die(mysql_error());
	$n = mysql_num_rows($sql);
	if($n==0)
	{
	echo"<script>alert(\"Wrong username or password\");</script>";	 
   }
   else
  {
    $sql1="select * from registration_details where Username ='$new_username'";
	$result1 = mysql_query($sql1);
	$n1 = mysql_num_rows($result1);
   	  if($n1==0)
   		{
   		$sql = "update registration_details set Username = '$new_username' where Username='$User_name' and Password = '$Password'";
	      $res = mysql_query($sql);
	 		  echo"<script>alert(\"Username is changed\");</script>";
	  } else{
		   echo"<script>alert('This username allready exists please enter another username');</script>";
	  }}}
if(isset($_REQUEST['newemail1']))
{
   $User_name = strtoupper($_REQUEST['Username']);
   $Password = gzdeflate(str_rot13($_REQUEST['Password']));
   $new_emailid = $_REQUEST['new_emailid'];
    $sql = mysql_query("select * from registration_details where Username='".$User_name."' and Password='".$Password."'") or die(mysql_error());
	$n = mysql_num_rows($sql);
	if($n==0)
	{
	echo"<script>alert(\"Wrong username or password\");</script>";	 
   }
   else
  {
    $sql1="select * from registration_details where Email_Id ='$new_emailid'";
	$result1 = mysql_query($sql1);
	$n1 = mysql_num_rows($result1);
   	  if($n1==0)
   		{
   		$sql = "update registration_details set Email_Id = '$new_emailid' where Username='$User_name' and Password = '$Password'";
	      $res = mysql_query($sql);
	 		  echo"<script>alert(\"Email id is changed\");</script>";
	  }
	  else
	  {
		   echo"<script>alert('This email id allready exists please enter another email id');</script>";
	  }}}
?>
<?php $ipaddress = urlencode(encryptor('encrypt', gzdeflate(str_rot13("192.168.43.71")))); ?>
<!DOCTYPE html>
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<head>
     <meta charset="UTF-8" />
    <title> <?php
if($ipaddress==urlencode(encryptor('encrypt', gzdeflate(str_rot13('192.168.43.71')))) || $ipaddress==urlencode(encryptor('encrypt', gzdeflate(str_rot13('175.100.148.85'))))) {?>Login Page<?php } else {?>Page Not Found<?php } ?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
     <noscript>
    <style> html {display:none; }</style>
     <META HTTP-EQUIV="Refresh" CONTENT="0; URL=javascripterror1log.php">
    </noscript>
   <?php
if($ipaddress==urlencode(encryptor('encrypt', gzdeflate(str_rot13('192.168.43.71')))) || $ipaddress==urlencode(encryptor('encrypt', gzdeflate(str_rot13('175.100.148.85'))))) {?>
    <link rel="shortcut icon" href="Icons/st85.png"><?php } ?>
     <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="assets/css/login.css" />
    <link rel="stylesheet" href="assets/plugins/magic/magic.css" />
    <style type="text/css">
	#imgdiv{
width:160px;	
float:left;
margin-left:20px;
}
#reload{
float:right; 
margin-right:70px; 
}
#imgdivemail{
width:160px;	
float:left;
margin-left:20px;
}
#reloademail{
float:right; 
margin-right:70px; 
}
</style>
</head>
<body>
<?php 
//$ipaddress = urlencode(encryptor('encrypt', gzdeflate(str_rot13("175.100.148.87"))));
if($ipaddress==urlencode(encryptor('encrypt', gzdeflate(str_rot13('192.168.43.71')))) || $ipaddress==urlencode(encryptor('encrypt', gzdeflate(str_rot13('175.100.148.85'))))) { ?>
    <div class="container">
    <div><center><img src="Icons/ST logo.png" id="logoimg" alt="Logo" /></center></div>
    <div class="tab-content">
        <div id="login" class="tab-pane active">
            <form class="form-signin" method="post"  onsubmit='return checkQuotee(this)'>
                <p class="text-muted text-center btn-block btn btn-primary btn-rect">
                    Enter your username and password
                </p>
               <center><span id="msg_login" style="color:#F00;"><?php if(isset($_REQUEST['msg']))
{ echo nl2br("$msg_error_login\n");
    } ?> </span> <span id="msg_log" style="color:#F00;"><?php if(isset($_SESSION['User']))
{ 
echo nl2br("$msg_session\n$msg_redirect");}
?></span></center>
                <input type="text" placeholder="Username" class="form-control" name="Username" id="Username" value="<?php echo $Username;?>" autofocus/>
                <span id="error1" style="color:#F00";></span>
                <input type="password" placeholder="Password" class="form-control"  name="Password" id="Password" />
                <span id="error2" style="color:#F00";></span>
                <table>
                <tr>
                <td>
                <div id="imgdiv"><img id="img" src="loginadmin_captcha.php" /></div><img id="reload" src="assets/img/reload.png" /></td>
                </tr>
                </table>
                <div class="col-lg-6">
                <input id="captcha1" name="captcha" placeholder="Captcha code" class="form-control" type="text"></div><div class="col-lg-6"><input id="pinno" name="pinno" placeholder="Pin no" class="form-control" type="password">
                </div>
                <?php if(isset($_COOKIE['Username']))
										{
											?>
                                        <center><label><input type="checkbox" name="chk"  checked="checked"/> Remember me </label></center> 
                                        <?php
										}
										else
										{
											?>
                                      <center><label><input type="checkbox" name="chk" /> Remember me </label></center>
                                       <?php
										}
										?>
                                        <center><span style="color:#F00;"><?php if(isset($_REQUEST['submit'])) { echo $msg; } ?></span></center>
                <center><button class="btn text-muted text-center btn-danger" type="submit" name="submit" id="SubmitBtn">Sign in</button></center>
            </form>
           </div>
        <div id="forgot" class="tab-pane">
            <form class="form-signin" method="post" onsubmit='return recoverpassword(this)'>
                <p class="text-muted text-center btn-block btn btn-primary btn-rect">Enter your valid e-mail</p>
                <input type="email"  required="required" placeholder="Your E-mail"  class="form-control" name="email" /><table>
                <tr>
                <td>
                <div id="imgdivemail"><img id="imgemail" src="loginadmin_captchaemail.php" /></div><img id="reloademail" src="assets/img/reload.png" /></td>
                </tr>
                </table>
                <input id="captcha1" name="captcha8" placeholder="please enter captcha code here" class="form-control" type="text">
                <br />
                <button class="btn text-muted text-center btn-success" type="submit" name="submit2">Recover Password</button>
            </form>
        </div>
        <div id="signup" class="tab-pane">
            <form class="form-signin" method="post" onsubmit='return checkQuote(this)'>
                <p class="text-muted text-center btn-block btn btn-primary btn-rect">Fill the below details</p>
                 <input type="text" placeholder="Username" class="form-control" name="user" id="user"/>
                 <span id="error3" style="color:#F00";></span>
                 <input type="password" placeholder="Password" class="form-control" name="pass" id="pass" />
                 <span id="error4" style="color:#F00";></span>
                <input type="password" placeholder="New Password" class="form-control" name="pass1" id="pass1"/>
                <span id="error5" style="color:#F00";></span>
                <input type="password" placeholder="Confirm Password" class="form-control" name="pass2" id="pass2"/>
                <span id="error6" style="color:#F00";></span>
                <button class="btn text-muted text-center btn-success" type="submit" name="submit1">Change Password</button>
            </form>
        </div>
         <div id="newuser" class="tab-pane">
            <form class="form-signin" method="post"  onsubmit='return changeusername(this)'>
                <p class="text-muted text-center btn-block btn btn-primary btn-rect">Fill the below details</p>
                 <input type="text" placeholder="Username" class="form-control" name="Username" id="UsernameCh"/>
                 <span id="error9" style="color:#F00";></span>
                 <input type="password" placeholder="Password" class="form-control" name="Password" id="PasswordCh" />
                 <span id="error10" style="color:#F00";></span>
                <input type="text" placeholder="New Username" class="form-control" name="new_username" id="new_username"/>
                <span id="error7" style="color:#F00";></span>
               <br/>
                <button class="btn text-muted text-center btn-success" type="submit" name="newuser1">Change Username</button>
            </form>
        </div>
        <div id="newemail" class="tab-pane">
            <form class="form-signin" method="post" onsubmit='return changeemailid(this)'>
                <p class="text-muted text-center btn-block btn btn-primary btn-rect">Fill the below details</p>
                 <input type="text" placeholder="Username" class="form-control" name="Username" id="UsernameChe" />
                 <span id="error11" style="color:#F00";></span>
                 <input type="password" placeholder="Password" class="form-control" name="Password" id="PasswordChe"/>
                 <span id="error12" style="color:#F00";></span>
                <input type="email" placeholder="New Email ID" class="form-control" name="new_emailid" id="new_emailid" required/>
                <span id="error8" style="color:#F00";></span>
                <br />
                <button class="btn text-muted text-center btn-success" type="submit" name="newemail1">Change Email ID</button>
            </form>
        </div>
    </div>
    <div class="text-center">
        <ul class="list-inline">
            <li><a class="text-muted" href="#login" data-toggle="tab"><b>Login</b></a></li>
            <li><a class="text-muted" href="#forgot" data-toggle="tab"><b>Forgot Password</b></a></li>
            <li><a class="text-muted" href="#signup" data-toggle="tab"><b>Change Password</b></a></li>
            <br/> 
             <li><a class="text-muted" href="#newuser" data-toggle="tab"><b>Change Username</b></a></li>
             <li><a class="text-muted" href="#newemail" data-toggle="tab"><b>Change Email ID</b></a></li>
        </ul>
    </div>
</div><?php }
else
{
				 ///////////////////////////////////// browser detection ///////////////////////////////////
	  if(strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== FALSE)
   $browser_check = 'Internet explorer';
 elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Trident') !== FALSE) //For Supporting IE 11
    $browser_check = 'Internet explorer';
 elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox') !== FALSE)
   $browser_check = 'Mozilla Firefox';
 elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome') !== FALSE)
   $browser_check = 'Google Chrome';
 elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mini') !== FALSE)
   $browser_check = "Opera Mini";
 elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Opera') !== FALSE)
   $browser_check = "Opera";
 elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Safari') !== FALSE)
   $browser_check = "Safari";
 else
   $browser_check = 'You have login from unknown browser';
  
  $message = "Dear Employee, Untrusted person has opened your admin panel login from <b>".$browser_check."</b> browser";
$to = "mickyahir@shingoritextile.in";
$subject = "Login alert : SHINGORI TEXTILE";
$from = 'mickyahir@shingoritextile.in';
$headers     =<<<AKAM
From: Admin <$from>
Reply-To: $from
MIME-Version: 1.0
Content-Type: multipart/mixed;
AKAM;
$headers = "From: $from";
mail($to,$subject,$message,$headers);
}?>
      <script src="assets/plugins/jquery-2.0.3.min.js"></script>
      <script src="assets/plugins/bootstrap/js/bootstrap.js"></script>
   <script src="assets/js/login.js"></script>
   <script src="assets/js/googleapi.js"></script>
<script src="assets/js/loginmanual.js"></script>
</body>
</html>
<?php ob_flush(); ?>