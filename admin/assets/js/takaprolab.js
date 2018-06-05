$(document).ready(function(){
	$('#Ta_Labour_Id').focus();
	$('#textarea1').on('keypress', function (e) {
    var ingnore_key_codes = [34, 39];
    if ($.inArray(e.which, ingnore_key_codes) >= 0) {
        e.preventDefault();
        $("#error1").html(" not allowed").show();
    } else {
        $("#error1").hide();
    }
});	
 $('#Taka_Meter,#Quality_Name,#Labour_Id, #L_Rate,#L_Amount').keyup(function(){
    var Taka_Meter = parseFloat($('#Taka_Meter').val()) || 0;
    var L_Rate = parseFloat($('#L_Rate').val()) || 0;
     var L_Amount = Taka_Meter*L_Rate;
    $('#L_Amount').val(L_Amount.toFixed(2));    
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
	$('#T_Date').datepicker({
                    format: "yyyy-mm-dd"
                }); 

 $("#Total_Meter,#Check,#Total_L_Amount").bind('keyup', function() {
                var add = 0;
                $(".rowDataSdAmount").each(function() {
                    add += Number($(this).html());
                });
                $("#Total_L_Amount").val(add.toFixed(2));
            });	
	$("#Add1").click(function(){
		t1=$("#Ta_Labour_Id").val();
		t2=$("#T_Date").val();
		t4=$("#Taka_Meter").val();
		t6=$("#Quality_Id").val();
		t8=$("#textarea1").val().split(" ");
		t10=$("#R_Id").val();
		t12=$("#action").val();
		t13=$("#Labour_Id").val();
		t14=$("#Ta_Pro_Id").val();
		t15=$("#L_Rate").val();
		t16=$("#L_Amount").val();
sql="?Ta_Labour_Id="+t1+"&T_Date="+t2+"&Taka_Meter="+t4+"&Quality_Id="+t6+"&textarea1="+t8+"&R_Id="+t10+"&action="+t12+"&Labour_Id="+t13+"&Ta_Pro_Id="+t14+"&L_Rate="+t15+"&L_Amount="+t16+"&Add1=Add";
		$("#Taka_Meter").val("");
		$("#Quality_Id").val("");
		$("#Quality_Name").val("");
		$("#Labour_Id").val("");
		$("#L_Rate").val("");
		$("#L_Amount").val("");
		$("#textarea1").val("");
		$('#Taka_Meter').focus();
		$("#table").load('takaprosallabtable.php'+sql);
	});
$("#Total_MeterLab").bind('keyup', function() {
                var add = 0;
                $(".rowDataSd1").each(function() {
                    add += Number($(this).html());
                });
                $("#Total_MeterLab").val(add.toFixed(2));
            });	
			
$('#Total_MeterLab, #Beam_No').keyup(function(){
    var rate = parseFloat($('#Total_MeterLab').val()) || 0;
    var box = parseFloat($('#Taka_T_Meter').val()) || 0;
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
		alert("You cannot submit as there is no entry in taka-labour");
       mff.Total_MeterLab.focus();
       return false;
	}
	if(mff.Total_L_Amount.value=="")
    {
       alert("Total amount is required");
       mff.Total_L_Amount.focus();
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
	
	 function isDecimalNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }