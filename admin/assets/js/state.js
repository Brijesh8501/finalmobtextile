         $(document).ready(function () {
			 $('#st_id').focus();
			 $('#st_name').on('keypress', function (e) {
    var ingnore_key_codes = [34, 39];
    if ($.inArray(e.which, ingnore_key_codes) >= 0) {
        e.preventDefault();
        $("#error1").html("only valid special character allowed").show();
    } else {
        $("#error1").hide();
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
    function State(mff)
{
	if(mff.st_name.value=="")
    {
       alert("State is required");
       mff.st_name.focus();
       return false;
    }
if(mff.cnt_id.value=="")
    {
       alert("Country is required");
       mff.cnt_id.focus();
       return false;
    }
 return true;
} 
