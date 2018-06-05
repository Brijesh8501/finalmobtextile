$(document).ready(function() {
	    $("#reload").click(function() {
        $("img#img").remove();
		var id = Math.random();
        $('<img id="img" src="loginadmin_captcha.php?id='+id+'"/>').appendTo("#imgdiv");
		 id ='';
    });
	 $("#reloademail").click(function() {
        $("img#imgemail").remove();
		var id = Math.random();
        $('<img id="imgemail" src="loginadmin_captchaemail.php?id='+id+'"/>').appendTo("#imgdivemail");
		 id ='';
    });
	setTimeout(function() {
		$("#msg_login").fadeOut('fast');},10000);
$('#Username').on('keypress', function (e) {
    var ingnore_key_codes = [34, 39];
    if ($.inArray(e.which, ingnore_key_codes) >= 0) {
        e.preventDefault();
        $("#error1").html("only valid special character allowed").show();
    } else {
        $("#error1").hide();
    }
});
$('#Password').on('keypress', function (e) {
    var ingnore_key_codes = [34, 39];
    if ($.inArray(e.which, ingnore_key_codes) >= 0) {
        e.preventDefault();
        $("#error2").html("only valid special character allowed").show();
    } else {
        $("#error2").hide();
    }
});
$('#user').on('keypress', function (e) {
    var ingnore_key_codes = [34, 39];
    if ($.inArray(e.which, ingnore_key_codes) >= 0) {
        e.preventDefault();
        $("#error3").html("only valid special character allowed").show();
    } else {
        $("#error3").hide();
    }
});
$('#pass').on('keypress', function (e) {
    var ingnore_key_codes = [34, 39];
    if ($.inArray(e.which, ingnore_key_codes) >= 0) {
        e.preventDefault();
        $("#error4").html("only valid special character allowed").show();
    } else {
        $("#error4").hide();
    }
});
$('#pass1').on('keypress', function (e) {
    var ingnore_key_codes = [34, 39];
    if ($.inArray(e.which, ingnore_key_codes) >= 0) {
        e.preventDefault();
        $("#error5").html("only valid special character allowed").show();
    } else {
        $("#error5").hide();
    }
});
$('#pass2').on('keypress', function (e) {
    var ingnore_key_codes = [34, 39];
    if ($.inArray(e.which, ingnore_key_codes) >= 0) {
        e.preventDefault();
        $("#error6").html("only valid special character allowed").show();
    } else {
        $("#error6").hide();
    }
});
$('#new_username').on('keypress', function (e) {
    var ingnore_key_codes = [34, 39];
    if ($.inArray(e.which, ingnore_key_codes) >= 0) {
        e.preventDefault();
        $("#error7").html("only valid special character allowed").show();
    } else {
        $("#error7").hide();
    }
});
$('#new_emailid').on('keypress', function (e) {
    var ingnore_key_codes = [34, 39];
    if ($.inArray(e.which, ingnore_key_codes) >= 0) {
        e.preventDefault();
        $("#error8").html("only valid special character allowed").show();
    } else {
        $("#error8").hide();
    }
});
$('#UsernameCh').on('keypress', function (e) {
    var ingnore_key_codes = [34, 39];
    if ($.inArray(e.which, ingnore_key_codes) >= 0) {
        e.preventDefault();
        $("#error9").html("only valid special character allowed").show();
    } else {
        $("#error9").hide();
    }
});
$('#PasswordCh').on('keypress', function (e) {
    var ingnore_key_codes = [34, 39];
    if ($.inArray(e.which, ingnore_key_codes) >= 0) {
        e.preventDefault();
        $("#error10").html("only valid special character allowed").show();
    } else {
        $("#error10").hide();
    }
});
$('#UsernameChe').on('keypress', function (e) {
    var ingnore_key_codes = [34, 39];
    if ($.inArray(e.which, ingnore_key_codes) >= 0) {
        e.preventDefault();
        $("#error11").html("only valid special character allowed").show();
    } else {
        $("#error11").hide();
    }
});
$('#PasswordChe').on('keypress', function (e) {
    var ingnore_key_codes = [34, 39];
    if ($.inArray(e.which, ingnore_key_codes) >= 0) {
        e.preventDefault();
        $("#error12").html("only valid special character allowed").show();
    } else {
        $("#error12").hide();
    }
});

});
function checkQuote(mf)
{
	if(mf.user.value=="")
    {
       alert("Please enter username ");
       mf.user.focus();
       return false;
    }
  if(mf.pass.value=="")
    {
       alert("Please enter old password ");
       mf.pass.focus();
       return false;
    }
	if(mf.pass1.value=="")
    {
       alert("Please enter new password ");
       mf.pass1.focus();
       return false;
    }
   if(mf.pass2.value=="")
    {
       alert("Please enter confirm password ");
       mf.pass2.focus();
       return false;
    }
	if(mf.pass1.value != mf.pass2.value)
    {
       alert("New password and confirm password are not match");
       mf.pass2.focus();
       return false;
    }
}
function checkQuotee(mff)
{
	if(mff.Username.value=="")
    {
       alert("Please Enter Username");
       mff.Username.focus();
       return false;
    }
	if(mff.Password.value=="")
    {
       alert("Please Enter Password");
       mff.Password.focus();
       return false;
    }
	if(mff.captcha.value=="")
    {
       alert("Captcha code is required");
       mff.captcha.focus();
       return false;
    }
}
function recoverpassword(mff)
{
	if(mff.email.value=="")
    {
       alert("Email id is required");
       mff.email.focus();
       return false;
    }
	if(mff.captcha8.value=="")
    {
       alert("Captcha code is required");
       mff.captcha8.focus();
       return false;
    }
}
function changeusername(mff)
{
	if(mff.Username.value=="")
    {
       alert("Old username is required");
       mff.Username.focus();
       return false;
    }
if(mff.Password.value=="")
    {
       alert("Password is required");
       mff.Password.focus();
       return false;
    }
if(mff.new_username.value=="")
    {
       alert("New username is required");
       mff.new_username.focus();
       return false;
    }
else if(mff.new_username.value.length>=14)
    {
       alert("Username limit is 13 only");
       mff.new_username.focus();
       return false;
    }
}
function changeemailid(mff)
{
	if(mff.Username.value=="")
    {
       alert("Username is required");
       mff.Username.focus();
       return false;
    }
if(mff.Password.value=="")
    {
       alert("Password is required");
       mff.Password.focus();
       return false;
    }
if(mff.new_emailid.value=="")
    {
       alert("Email id is required");
       mff.new_emailid.focus();
       return false;
    }
}
  /* function updateIndicator() {
     var t1 = navigator.onLine ? 'Internet connected' : 'Internet error';
	 if(t1=='Internet error')
	 {   
	     $('.container').hide();
		 alert(t1);
		 $('.panel-body').show();
	 }
	 else if(t1=='Internet connected') 
	 {
		  $('.panel-body').hide();
		  $('.container').show();
		
	 }
   }
   onload="updateIndicator()" ononline="updateIndicator()" onoffline="updateIndicator()"
   */
