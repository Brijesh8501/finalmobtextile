         $(document).ready(function () {
			 $('#Be_M_Id').focus();
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
	$('#Started_Date').datepicker({
                    format: "yyyy-mm-dd"
                }); 
		 });
		 history.pushState(null, null);
    window.addEventListener('popstate', function(event)  {
    history.pushState(null, null);
    }); 
    var submitting = false; 
    function BeamMachine(mff)
{
	if(mff.Be_D_C_Id.value=="")
    {
       alert("Beam no is required");
       mff.Be_D_C_Id.focus();
       return false;
    }
	if(mff.Machine_Id.value=="")
    {
       alert("Machine no is required");
       mff.Machine_Id.focus();
       return false;
    }
		if(mff.Started_Date.value=="")
    {
       alert("Fitted date is required");
       mff.Started_Date.focus();
       return false;
    }
    return true;	
}
