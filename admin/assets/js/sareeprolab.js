$(document).ready(function(){
	$('#Sa_Labour_Id').focus();
	$('#S_Date').datepicker({
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
$('#Saree_Meter,#S_Date,#Labour_Id,#Design,#Quality_Name,#S_Rate,#S_Amount').keyup(function(){
    var Saree_Meter = parseFloat($('#Saree_Meter').val()) || 0;
    var S_Rate = parseFloat($('#S_Rate').val()) || 0;
     var S_Amount = Saree_Meter*S_Rate;
    $('#S_Amount').val(S_Amount.toFixed(2));    
});
 $("#Total_Meter,#Check,#Total_S_Amount").bind('keyup', function() {
                var add = 0;
                $(".rowDataSdAmount").each(function() {
                    add += Number($(this).html());
                });
                $("#Total_S_Amount").val(add.toFixed(2));
            });	
	$("#Add1").click(function(){
		t1=$("#Sa_Labour_Id").val();
		t2=$("#S_Date").val();
		t4=$("#Saree_Meter").val();
		t6=$("#Design_Id").val();
		t8=$("#textarea1").val().split(" ");
		t10=$("#R_Id").val();
		t12=$("#action").val();
		t13=$("#Labour_Id").val();
		t14=$("#Sa_Pro_Id").val();
		t15=$("#S_Rate").val();
		t16=$("#S_Amount").val();
sql="?Sa_Labour_Id="+t1+"&S_Date="+t2+"&Saree_Meter="+t4+"&Design_Id="+t6+"&textarea1="+t8+"&R_Id="+t10+"&action="+t12+"&Labour_Id="+t13+"&Sa_Pro_Id="+t14+"&S_Rate="+t15+"&S_Amount="+t16+"&Add1=Add";
		$("#Saree_Meter").val("");
		$("#Design_Id").val("");
		$("#Design").val("");
		$("#Quality_Id").val("");
		$("#Quality_Name").val("");
		$("#Labour_Id").val("");
		$("#S_Rate").val("");
		$("#S_Amount").val("");
		$("#textarea1").val("");
		$('#Saree_Meter').focus();
		$("#table").load('sareeprosallabtable.php'+sql);
	});
$("#Total_MeterLab").bind('keyup', function() {
                var add = 0;
                $(".rowDataSd1").each(function() {
                    add += Number($(this).html());
                });
                $("#Total_MeterLab").val(add.toFixed(2));
            });	
			$('#textarea1').on('keypress', function (e) {
    var ingnore_key_codes = [34, 39];
    if ($.inArray(e.which, ingnore_key_codes) >= 0) {
        e.preventDefault();
        $("#error1").html(" not allowed").show();
    } else {
        $("#error1").hide();
    }
});	
$('#Total_MeterLab, #Beam_No').keyup(function(){
    var rate = parseFloat($('#Total_MeterLab').val()) || 0;
    var box = parseFloat($('#Saree_T_Meter').val()) || 0;
     var Check = box-rate;
    $('#Check').val(Check.toFixed(2));    
});	
});
 var submitting = false;    
function checkQuotee(mff)
{
	if(mff.Total_MeterLab.value=="")
    {
       alert("Total meter is required");
       mff.Total_MeterLab.focus();
       return false;
    }
	else if (mff.Total_MeterLab.value<=0)
	{
		alert("You cannot submit as there is no entry in saree-labour");
       mff.Total_MeterLab.focus();
       return false;
	}
	if(mff.Total_S_Amount.value=="")
    {
       alert("Total amount is required");
       mff.Total_S_Amount.focus();
       return false;
    }
	if(mff.Check.value=="")
    {
       alert("Please check meter(+) by tab button is required");
       mff.Check.focus();
       return false;
    }
	else if (mff.Check.value<0)
	{
		alert("Meter(+) should not be in minus(-) settle down appropriate records");
       mff.Check.focus();
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