         $(document).ready(function () {
			 $('#Labour_Id').focus();
    $('#Labour_Name').on('keypress', function (e) {
    var ingnore_key_codes = [34, 39];
    if ($.inArray(e.which, ingnore_key_codes) >= 0) {
        e.preventDefault();
        $("#error1").html("only valid special character allowed").show();
    } else {
        $("#error1").hide();
    }
});
$("#Labour_Name").blur(function(){
		t5=$("#Labour_Name").val().split(" ");
		var q="?Labour_Name="+t5+"&search=search";
		$("#show").load("labournamecheckajax.php"+q);
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
    function Labourins(mff)
{
	if(mff.Name.value=="")
    {
       alert("Name is required");
       mff.Name.focus();
       return false;
    }
   if(mff.image.value=="")
    {
       alert("Photo is required");
       mff.image.focus();
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
	if(mff.Mobb_No.value=="")
    {
       alert("Mobile no is required");
       mff.Mobb_No.focus();
       return false;
    }
	else if(mff.Mobb_No.value.length!=10)
    {
       alert("Please enter 10 digit mobile number");
       mff.Mobb_No.focus();
       return false;
    }
	if(mff.Mobile_No.value=="")
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
	if(mff.W_Type_Id.value=="")
    {
       alert("Work type is required");
       mff.W_Type_Id.focus();
       return false;
    }
if(mff.Status.value=="")
    {
       alert("Status is required");
       mff.Status.focus();
       return false;
    }
return true;		
}        
    function Labourupd(mff)
{
	if(mff.Name.value=="")
    {
       alert("Name is required");
       mff.Name.focus();
       return false;
    }
   if(mff.image.value=="")
    {
       alert("Please confirm photo by re-selecting photo");
       mff.image.focus();
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
	if(mff.Mobb_No.value=="")
    {
       alert("Mobile no is required");
       mff.Mobb_No.focus();
       return false;
    }
	else if(mff.Mobb_No.value.length!=10)
    {
       alert("Please enter 10 digit mobile number");
       mff.Mobb_No.focus();
       return false;
    }
	if(mff.Mobile_No.value=="")
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
	if(mff.W_Type_Id.value=="")
    {
       alert("Work type is required");
       mff.W_Type_Id.focus();
       return false;
    }
if(mff.Status.value=="")
    {
       alert("Status is required");
       mff.Status.focus();
       return false;
    }
return true;		
}        
