         $(document).ready(function () {
			 $('#Bro_Com_Id').focus();
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
    function BrokerCompany(mff)
{
	if(mff.Broker_Id.value=="")
    {
       alert("Broker is required");
       mff.Broker_Id.focus();
       return false;
    }
if(mff.Company_Id.value=="")
    {
       alert("Company is required");
       mff.Company_Id.focus();
       return false;
    }
	return true;
}
