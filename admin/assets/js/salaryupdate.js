$(document).ready(function(){
	$('#Sal_Mast_Id').focus();
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
	$('#Total_Amt, #Upad_Amt').keyup(function(){
	 var Total_Amt = parseFloat($('#Total_Amt').val()) || 0;
    var Upad_Amt = parseFloat($('#Upad_Amt').val()) || 0;
     var Re_Amt = Total_Amt-Upad_Amt;
    $('#Re_Amt').val(Re_Amt.toFixed(2));
	});
});
	   function isDecimalNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }
var submitting = false;
function checkQuotee(mff)
{
	if(mff.Upad_Amt.value=="")
    {
       alert("Upad amount is required");
       mff.Upad_Amt.focus();
       return false;
    }
	if(mff.Re_Amt.value=="")
    {
       alert("Remaining amount is required");
       mff.Re_Amt.focus();
       return false;
    }
	if(mff.Grand_Total.value=="")
    {
       alert("Grand total is required");
       mff.Grand_Total.focus();
       return false;
    }
	if(mff.Re_Upad_Amt.value=="")
    {
       alert("Remaining upad amount is required");
       mff.Re_Upad_Amt.focus();
       return false;
    }
    return true;
}
 history.pushState(null, null);
    window.addEventListener('popstate', function(event)  {
    history.pushState(null, null);
    }); 
