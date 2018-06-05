         $(document).ready(function () {
			 $('#Registration_Id').focus();
			 $("#Name").blur(function(){
		t5=$("#Name").val().split(" ");
		var q="?Name="+t5+"&search=search";
		$("#show").load("regnameajax.php"+q);
		 });
		 $("#Username").blur(function(){
		t5=$("#Username").val().split(" ");
		var q="?Username="+t5+"&searchusername=searchusername";
		$("#show").load("regnameajax.php"+q);
		 });
		  $("#Email_Id").blur(function(){
		t5=$("#Email_Id").val().split(" ");
		var q="?Email_Id="+t5+"&searchemailid=searchemailid";
		$("#show").load("regnameajax.php"+q);
		 });
			 $("#reload").click(function() {
	
        $("img#img").remove();
		var id = Math.random();
        $('<img id="img" src="loginadmin_captchareg.php?id='+id+'"/>').appendTo("#imgdiv");
		 id ='';
    });
	$('#Name').on('keypress', function (e) {
    var ingnore_key_codes = [34, 39];
    if ($.inArray(e.which, ingnore_key_codes) >= 0) {
        e.preventDefault();
        $("#error1").html("only valid special character allowed").show();
    } else {
        $("#error1").hide();
    }
});
$('#pass2').on('keypress', function (e) {
    var ingnore_key_codes = [34, 39];
    if ($.inArray(e.which, ingnore_key_codes) >= 0) {
        e.preventDefault();
        $("#error4").html("only valid special character allowed").show();
    } else {
        $("#error4").hide();
    }
});
$('#Username').on('keypress', function (e) {
    var ingnore_key_codes = [34, 39];
    if ($.inArray(e.which, ingnore_key_codes) >= 0) {
        e.preventDefault();
        $("#error3").html("only valid special character allowed").show();
    } else {
        $("#error3").hide();
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
	$('#autosize').on('keypress', function (e) {
    var ingnore_key_codes = [34, 39];
    if ($.inArray(e.which, ingnore_key_codes) >= 0) {
        e.preventDefault();
        $("#auto").html("only valid special character allowed").show();
    } else {
        $("#auto").hide();
    }
});
			$('#ct_name').autocomplete({
	source: function( request, response ) {
		$.ajax({
			url : 'countrycitystate_autocomplete.php',
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
		var names = ui.item.data.split("|");						
		$('#ct_id').val(names[1]);
		$('#st_name').val(names[2]);
		$('#st_id').val(names[3]);
		$('#cnt_name').val(names[4]);
		$('#cnt_id').val(names[5]);
		
	}		      	
});
		 });
 function isNumberKey(evt) 
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }
history.pushState(null, null);
    window.addEventListener('popstate', function(event)  {
    history.pushState(null, null);
    }); 
var submitting = false;
function Registration(mff)
{
	if(mff.Role.value=="")
    {
       alert("Role is required");
       mff.Role.focus();
       return false;
    }
if(mff.Name.value=="")
    {
       alert("Name is required");
       mff.Name.focus();
       return false;
    }
	if(mff.Photo.value=="")
    {
       alert("Photo is required");
       mff.Photo.focus();
       return false;
    }
	if(mff.Address.value=="")
    {
       alert("Address is required");
       mff.Address.focus();
       return false;
    }
	if(mff.ct_name.value=="")
    {
       alert("City is required");
       mff.ct_name.focus();
       return false;
    }
	if(mff.ct_id.value=="")
    {
       alert("Please enter city properly");
       mff.ct_id.focus();
       return false;
    }
	if(mff.st_name.value=="")
    {
       alert("State is required");
       mff.st_name.focus();
       return false;
    }
	if(mff.st_id.value=="")
    {
       alert("Please enter state properly");
       mff.st_id.focus();
       return false;
    }
if(mff.cnt_name.value=="")
    {
       alert("Country is required");
       mff.cnt_name.focus();
       return false;
    }
if(mff.cnt_id.value=="")
    {
       alert("Please enter country properly");
       mff.cnt_id.focus();
       return false;
    }
	if (mff.Mob_No.value=="")
	{
		alert("Mobile no is required");
       mff.Mob_No.focus();
       return false;
	}
	else if(mff.Mob_No.value.length!=10)
    {
       alert("Please Enter 10 digits mobile number");
       mff.Mob_No.focus();
       return false;
    }
	if (mff.Mobile_No.value=="")
	{
		alert("Alternate mobile no is required");
       mff.Mobile_No.focus();
       return false;
	}
	else if(mff.Mobile_No.value.length!=10)
    {
       alert("Please enter 10 digits alternate mobile number");
       mff.Mobile_No.focus();
       return false;
    }
	if (mff.Email_Id.value=="")
	{
		alert("Email id is required");
       mff.Email_Id.focus();
       return false;
	}
	if (mff.Status.value=="")
	{
		alert("Status is required");
       mff.Status.focus();
       return false;
	}
	if (mff.Username.value=="")
	{
		alert("Username is required");
       mff.Username.focus();
       return false;
	}
	if (mff.Password.value=="")
	{
		alert("Password is required");
       mff.Password.focus();
       return false;
	}
	if (mff.Confirm_Password.value=="")
	{
		alert("Please confirm the password");
       mff.Confirm_Password.focus();
       return false;
	}
	if(mff.Password.value != mff.Confirm_Password.value)
    {
       alert("New password and confirm password are not match");
       mff.Confirm_Password.focus();
       return false;
    }
	if (mff.captcha.value=="")
	{
		alert("Please enter captacha code");
       mff.captcha.focus();
       return false;
	}
	return true;
}  
function Registrationupd(mff)
{
	if(mff.Role.value=="")
    {
       alert("Role is required");
       mff.Role.focus();
       return false;
    }
if(mff.Name.value=="")
    {
       alert("Name is required");
       mff.Name.focus();
       return false;
    }
	if(mff.Address.value=="")
    {
       alert("Address is required");
       mff.Address.focus();
       return false;
    }
	if(mff.ct_name.value=="")
    {
       alert("City is required");
       mff.ct_name.focus();
       return false;
    }
	if(mff.ct_id.value=="")
    {
       alert("Please enter city properly");
       mff.ct_id.focus();
       return false;
    }
	if(mff.st_name.value=="")
    {
       alert("State is required");
       mff.st_name.focus();
       return false;
    }
	if(mff.st_id.value=="")
    {
       alert("Please enter state properly");
       mff.st_id.focus();
       return false;
    }
if(mff.cnt_name.value=="")
    {
       alert("Country is required");
       mff.cnt_name.focus();
       return false;
    }
if(mff.cnt_id.value=="")
    {
       alert("Please enter country properly");
       mff.cnt_id.focus();
       return false;
    }
	if (mff.Mob_No.value=="")
	{
		alert("Mobile no is required");
       mff.Mob_No.focus();
       return false;
	}
	else if(mff.Mob_No.value.length!=10)
    {
       alert("Please Enter 10 digits mobile number");
       mff.Mob_No.focus();
       return false;
    }
	if (mff.Mobile_No.value=="")
	{
		alert("Alternate mobile no is required");
       mff.Mobile_No.focus();
       return false;
	}
	else if(mff.Mobile_No.value.length!=10)
    {
       alert("Please enter 10 digits alternate mobile number");
       mff.Mobile_No.focus();
       return false;
    }
	if (mff.Email_Id.value=="")
	{
		alert("Email id is required");
       mff.Email_Id.focus();
       return false;
	}
	if (mff.Status.value=="")
	{
		alert("Status is required");
       mff.Status.focus();
       return false;
	}
	if (mff.Username.value=="")
	{
		alert("Username is required");
       mff.Username.focus();
       return false;
	}
	if (mff.Password.value=="")
	{
		alert("Password is required");
       mff.Password.focus();
       return false;
	}
	if (mff.Confirm_Password.value=="")
	{
		alert("Please confirm the password");
       mff.Confirm_Password.focus();
       return false;
	}
	if(mff.Password.value != mff.Confirm_Password.value)
    {
       alert("New password and confirm password are not match");
       mff.Confirm_Password.focus();
       return false;
    }
	return true;
}  
