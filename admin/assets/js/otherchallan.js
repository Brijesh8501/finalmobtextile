$(document).ready(function(){
	$('#textarea1').focus();
	 $('#textarea1').on('keypress', function (e) {
    var ingnore_key_codes = [34, 39];
    if ($.inArray(e.which, ingnore_key_codes) >= 0) {
        e.preventDefault();
        $("#error1").html(" not allowed").show();
    } else {
        $("#error1").hide();
    }
});	
$('#Other_D_C_Date').datepicker({
                    format: "yyyy-mm-dd"
                }); 
$('#Other_D_C_No').on('keypress', function (e) {
    var ingnore_key_codes = [34, 39];
    if ($.inArray(e.which, ingnore_key_codes) >= 0) {
        e.preventDefault();
        $("#error2").html("Only valid special character allowed").show();
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
	$("#Add1").click(function(){
		t1=$("#Other_D_C_Id").val();
		t2=$("#Mach_Part_Id").val();
		t3=$("#Quantity").val();
		t4=$("#R_Id").val();
		t5=$("#action").val();
		t6=$("#Rate").val();
	t7=$("#Amount").val();
sql="?Other_D_C_Id="+t1+"&Mach_Part_Id="+t2+"&Quantity="+t3+"&R_Id="+t4+"&action="+t5+"&Rate="+t6+"&Amount="+t7+"&Add1=Add";
		$("#Mach_Part_Id").val("");
		$("#Quantity").val("");
		$("#Rate").val("");
		$("#Amount").val("");
		$('#Mach_Part_Id').focus();
		$("#table").load("other_d_c85table.php"+sql);
	});
 	$('#Quantity, #Rate').keyup(function(){
    var Quantity = parseFloat($('#Quantity').val()) || 0;
    var Rate = parseFloat($('#Rate').val()) || 0;
     var Amount = Quantity*Rate;
    $('#Amount').val(Amount.toFixed(2));    
});
	});
	  var submitting = false;
function checkQuotee(mff)
{
    if(mff.From_Ad.value=="")
    {
       alert("Party name is required");
       mff.From_Ad.focus();
       return false;
    }
	if(mff.Total_Other.value=="")
    {
       alert("Total is required");
       mff.Total_Other.focus();
       return false;
    }
	else if (mff.Total_Other.value==0)
	{
		alert("You cannot submit as there is no entry in challan");
       mff.Total_Other.focus();
       return false;
	}
	if(mff.Total_Amount.value=="")
    {
       alert("Total amount is required");
       mff.Total_Amount.focus();
       return false;
    }
	if(mff.Other_D_C_No.value=="")
    {
       alert("Challan no is required");
       mff.Other_D_C_No.focus();
       return false;
    }
	return true;
}
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