         $(document).ready(function () {
			 $('#W_Type_Id').focus();
			 $('#W_Type_Name').on('keypress', function (e) {
    var ingnore_key_codes = [34, 39];
    if ($.inArray(e.which, ingnore_key_codes) >= 0) {
        e.preventDefault();
        $("#error1").html("only valid special character allowed").show();
    } else {
        $("#error1").hide();
    }
		});
$('#autosize').on('keypress', function (e) {
    var ingnore_key_codes = [34, 39];
    if ($.inArray(e.which, ingnore_key_codes) >= 0) {
        e.preventDefault();
        $("#auto").html("only valid special character allowed").show();
    } else {
        $("#auto").hide();
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
}); 
 history.pushState(null, null);
    window.addEventListener('popstate', function(event)  {
    history.pushState(null, null);
    });
		  var submitting = false;
    function Worktype(mff)
{
	if(mff.W_Type_Name.value=="")
    {
       alert("Work type is required");
	   mff.W_Type_Name.focus();
       return false;
    }
if(mff.Description.value=="")
    {
      alert("Description is required");
	   mff.Description.focus();
       return false;
    }
 return true;
} 