         $(document).ready(function() {
			$('#Groups').change(function(){
				var t1 = $('#Groups').val().split(" ");
				var sql = "?Groups="+t1+"&give=give";
				$('#groupshow').load("grpopeningbalance.php"+sql);
			});
			 $('#Bank_Name').focus();
  $('#Bank_Name').on('keypress', function (e) {
    var ingnore_key_codes = [34, 39];
    if ($.inArray(e.which, ingnore_key_codes) >= 0) {
        e.preventDefault();
        $("#error1").html("only valid special character allowed").show();
    } else {
        $("#error1").hide();
    }
});
 $('#Ifsc_Code').on('keypress', function (e) {
    var ingnore_key_codes = [34, 39];
    if ($.inArray(e.which, ingnore_key_codes) >= 0) {
        e.preventDefault();
        $("#error3").html("only valid special character allowed").show();
    } else {
        $("#error3").hide();
    }
});
$('#P_Name').on('keypress', function (e) {
    var ingnore_key_codes = [34, 39];
    if ($.inArray(e.which, ingnore_key_codes) >= 0) {
        e.preventDefault();
        $("#error4").html("only valid special character allowed").show();
    } else {
        $("#error4").hide();
    }
});
	$('#Branch_Name').on('keypress', function (e) {
    var ingnore_key_codes = [34, 39];
    if ($.inArray(e.which, ingnore_key_codes) >= 0) {
        e.preventDefault();
        $("#error2").html("only valid special character allowed").show();
    } else {
        $("#error2").hide();
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
		 	  function isNumberKey(evt) 
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }
	   function isDecimalNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }
		 history.pushState(null, null);
    window.addEventListener('popstate', function(event)  {
    history.pushState(null, null);
    }); 
var submitting = false;
 function bankinsert(mff)
{
	if(mff.Bank_Name.value=="")
    {
       alert("Bank name is required");
       mff.Bank_Name.focus();
       return false;
    }
	if(mff.Branch_Name.value=="")
    {
       alert("Branch is required");
       mff.Branch_Name.focus();
       return false;
    }
	if(mff.Account_No.value=="")
    {
       alert("Account no is required");
       mff.Account_No.focus();
       return false;
    }
	if(mff.Ifsc_Code.value=="")
    {
       alert("IFSC code is required");
       mff.Ifsc_Code.focus();
       return false;
    }
	if(mff.Account_Type.value=="")
    {
       alert("Account is required");
       mff.Account_Type.focus();
       return false;
    }
	if(mff.Groups.value=="")
    {
       alert("Group is required");
       mff.Groups.focus();
       return false;
    }
	if(mff.Opening_Balance.value=="")
    {
       alert("Opening balance is required");
       mff.Opening_Balance.focus();
       return false;
    }
	if(mff.Party.value=="")
    {
       alert("Party is required");
       mff.Party.focus();
       return false;
    }
	if(mff.P_Name.value=="")
    {
       alert("Name is required");
       mff.P_Name.focus();
       return false;
    }

return true;
}
 function bankupdate(mff)
{
	if(mff.Bank_Name.value=="")
    {
       alert("Bank name is required");
       mff.Bank_Name.focus();
       return false;
    }
	if(mff.Branch_Name.value=="")
    {
       alert("Branch is required");
       mff.Branch_Name.focus();
       return false;
    }
	if(mff.Account_No.value=="")
    {
       alert("Account no is required");
       mff.Account_No.focus();
       return false;
    }
	if(mff.Ifsc_Code.value=="")
    {
       alert("IFSC code is required");
       mff.Ifsc_Code.focus();
       return false;
    }
	if(mff.Account_Type.value=="")
    {
       alert("Account is required");
       mff.Account_Type.focus();
       return false;
    }

return true;
}
