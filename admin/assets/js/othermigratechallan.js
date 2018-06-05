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
sql="?Other_D_C_Id="+t1+"&Mach_Part_Id="+t2+"&Quantity="+t3+"&R_Id="+t4+"&action="+t5+"&Add1=Add";
		$("#Mach_Part_Id").val("");
		$("#Quantity").val("");
		$('#Mach_Part_Id').focus();
		$("#table").load("other_d_cmigrate85table.php"+sql);
	});
 	});
	  var submitting = false;
function checkQuotee(mff)
{
    if(mff.From_Ad.value=="")
    {
       alert("To is required");
       mff.From_Ad.focus();
       return false;
    }
	if(mff.Total_Other.value=="")
    {
       alert("Total beam is required");
       mff.Total_Beam.focus();
       return false;
    }
	else if (mff.Total_Other.value==0)
	{
		alert("You cannot submit as there is no entry in challan");
       mff.Total_Beam.focus();
       return false;
	}
	if (mff.Total_Entry.value=="")
	{
		alert("Please check entry by tab button");
       mff.Total_Entry.focus();
       return false;
	}
	 else if (mff.Total_Entry.value>=35)
	{
		alert("More than 34 entry is not acceptable please settle down appropriate records");
       mff.Total_Entry.focus();
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
	  history.pushState(null, null);
    window.addEventListener('popstate', function(event)  {
    history.pushState(null, null);
    }); 