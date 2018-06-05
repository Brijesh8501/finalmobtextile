         $(document).ready(function () {
			 $('#Subject').focus();
			 $('#autosize').on('keypress', function (e) {
    var ingnore_key_codes = [34, 39];
    if ($.inArray(e.which, ingnore_key_codes) >= 0) {
        e.preventDefault();
        $("#auto").html("only valid special character allowed").show();
    } else {
        $("#auto").hide();
    }
});
			 $('#Subject').on('keypress', function (e) {
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
	  function isDecimalNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }
		 var submitting = false;
		 function Pettyins(mff)
{
	if(mff.Subject.value=="")
    {
       alert("Subject is required");
       mff.Subject.focus();
       return false;
    }
if(mff.Description.value=="")
    {
       alert("Description is required");
       mff.Description.focus();
       return false;
    }
	if(mff.Payment_Type.value=="")
    {
       alert("Payment type is required");
       mff.Payment_Type.focus();
       return false;
    }
	if(mff.Bank_Id.value=="")
    {
       alert("Bank name is required");
       mff.Bank_Id.focus();
       return false;
    }
	if(mff.Cheque_No.value=="")
    {
       alert("Cheque no  is required");
       mff.Cheque_No.focus();
       return false;
    }
	if(mff.Date1.value=="")
    {
       alert("Date is required");
       mff.Date1.focus();
       return false;
    }
	else if(mff.Date1.value=="____-__-__")
    {
       alert("Date is required");
       mff.Date1.focus();
       return false;
    }
	if(mff.Cheque_Amount.value=="")
    {
       alert("Amount is required");
       mff.Cheque_Amount.focus();
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
