         $(document).ready(function () {
			 $('#Company_Id').focus();
			 $('#C_Name').on('keypress', function (e) {
    var ingnore_key_codes = [34, 39];
    if ($.inArray(e.which, ingnore_key_codes) >= 0) {
        e.preventDefault();
        $("#error1").html("only valid special character allowed").show();
    } else {
        $("#error1").hide();
    }
});
$("#C_Name").blur(function(){
		t5=$("#C_Name").val().split(" ");
		var q="?C_Name="+t5+"&search=search";
		$("#show").load("companynamecheckajax.php"+q);
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
     function Company(mff)
{
	if(mff.C_Name.value=="")
    {
       alert("Company is required");
       mff.C_Name.focus();
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
	if (mff.Phone_No.value=="")
	{
		alert("Phone no is required");
       mff.Phone_No.focus();
       return false;
	}
	else if(mff.Phone_No.value.length!=11)
    {
       alert("Please enter 11 digits phone number");
       mff.Phone_No.focus();
       return false;
    }
	if (mff.Mobile_No.value=="")
	{
		alert("Mobile no is required");
       mff.Mobile_No.focus();
       return false;
	}
	else if(mff.Mobile_No.value.length!=10)
    {
       alert("Please enter 10 digits mobile number");
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
	return true;
}     
