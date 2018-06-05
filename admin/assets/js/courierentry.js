         $(document).ready(function () {
			 $('#Courier_Id').focus();
			$('#C_No').on('keypress', function (e) {
    var ingnore_key_codes = [34, 39];
    if ($.inArray(e.which, ingnore_key_codes) >= 0) {
        e.preventDefault();
        $("#error1").html("only valid special character allowed").show();
    } else {
        $("#error1").hide();
    }
});
$('#C_Date').datepicker({
                    format: "yyyy-mm-dd"
                });
$('#C_Pro').on('keypress', function (e) {
    var ingnore_key_codes = [34, 39];
    if ($.inArray(e.which, ingnore_key_codes) >= 0) {
        e.preventDefault();
        $("#error5").html("only valid special character allowed").show();
    } else {
        $("#error5").hide();
    }
});
$('#Destination').on('keypress', function (e) {
    var ingnore_key_codes = [34, 39];
    if ($.inArray(e.which, ingnore_key_codes) >= 0) {
        e.preventDefault();
        $("#error2").html("only valid special character allowed").show();
    } else {
        $("#error2").hide();
    }
});
$('#To').on('keypress', function (e) {
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
    function Courier(mff)
{
	if(mff.Cou_Com_Id.value=="")
    {
       alert("Courier-Company is required");
       mff.Cou_Com_Id.focus();
       return false;
    }
	if(mff.C_No.value=="")
    {
       alert("C_No is required");
       mff.C_No.focus();
       return false;
    }
	if(mff.C_Date.value=="")
    {
       alert("Date is required");
       mff.C_Date.focus();
       return false;
    }
	if(mff.C_Pro.value=="")
    {
       alert("C_Thing is required");
       mff.C_Pro.focus();
       return false;
    }
	if(mff.Destination.value=="")
    {
       alert("Destination is required");
       mff.Destination.focus();
       return false;
    }
	if(mff.To.value=="")
    {
       alert("To is required");
       mff.To.focus();
       return false;
    }
	if(mff.Amt.value=="")
    {
       alert("Amount is required");
       mff.Amt.focus();
       return false;
    }
 return true;
}
