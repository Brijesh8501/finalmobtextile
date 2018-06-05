$(document).ready(function(){
	$('#select_status').focus();
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
 $("#select_status").change(function(){
		t5=$("#select_status").val();
		var q="?select_status="+t5;
		$("#show").load("saree_exbeamajax.php"+q);
		 });	
	});
	var submitting = false;
function checkQuotee(mff)
{
	if(mff.Org_Be_Mg_Meter.value=="")
    {
       alert("Produced meter is required");
       mff.Org_Be_Mg_Meter.focus();
       return false;
    }
	else if(mff.Org_Be_Mg_Meter.value==0)
    {
       alert("Produced meter should not be 0");
       mff.Org_Be_Mg_Meter.focus();
       return false;
    }
	if(mff.Shortage.value==0)
    {
       alert("Shortage meter should not be 0");
       mff.Shortage.focus();
       return false;
    }
	else if(mff.Shortage.value<0)
    {
       alert("Shortage meter should not be in minus (-)");
       mff.Shortage.focus();
       return false;
    }
	return true;
}
history.pushState(null, null);
    window.addEventListener('popstate', function(event)  {
    history.pushState(null, null);
    });
	function isDecimalNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }