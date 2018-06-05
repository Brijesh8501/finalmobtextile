$(document).ready(function(){
	$('#Be_M_Id').focus();
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
	$("#Add1").click(function(){
		t1=$("#Ta_Pro_Id").val();
		t2=$("#T_Date").val();
		t4=$("#Taka_Meter").val();
		t5=$("#Taka_Weight").val();
		t6=$("#Quality_Id").val();
		t7=$("#Status").val();
		t8=$("#textarea1").val().split(" ");
		t9=$("#Be_M_Id").val();
		t10=$("#R_Id").val();
		t12=$("#action").val();
sql="?Ta_Pro_Id="+t1+"&T_Date="+t2+"&Taka_Meter="+t4+"&Taka_Weight="+t5+"&Quality_Id="+t6+"&Status="+t7+"&textarea1="+t8+"&Be_M_Id="+t9+"&R_Id="+t10+"&action="+t12+"&Add1=Add";
		$("#Taka_Meter").val("");
		$("#Taka_Weight").val("");
		$("#Quality_Id").val("");
		$("#textarea1").val("");
		$('#Taka_Meter').focus();
		$("#table").load('takaprotable.php'+sql);
	});
$('#Total_Meter, #Beam_Meter').keyup(function(){
    var rate = parseFloat($('#Total_Meter').val()) || 0;
    var box = parseFloat($('#Beam_Meter').val()) || 0;
     var shortage = box-rate;
    $('#Shortage').val(shortage.toFixed(2));    
});
$('#Beam_Meter,#Shortageper').keyup(function(){
    var totalmeter = parseFloat($('#Total_Meter').val()) || 0;
    var beammeter = parseFloat($('#Beam_Meter').val()) || 0;
     var shortage1 = beammeter-totalmeter;
	 var shortageper = shortage1/beammeter;
	 var shortpercent = shortageper*100;
    $('#Shortageper').val(shortpercent.toFixed(2));    
});
$(function() {
    $('#Total_Taka').bind('keyup', function() {
           count = 0;
        count += $('#mybody').children('tr').length;
        $('#Total_Taka').val(count);
    });
});
 $("#Total_Taka").bind('keyup', function() {
                var add = 0;
                $(".rowDataSd1").each(function() {
                    add += Number($(this).html());
                });
                $("#Total_Meter").val(add.toFixed(2));
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
});
 var submitting = false;     
function checkQuotee(mff)
{
	if(mff.Total_Taka.value=="")
    {
       alert("Total taka is required");
       mff.Total_Taka.focus();
       return false;
    }
	else if (mff.Total_Taka.value<=0)
	{
		alert("You cannot submit as there is no entry in taka-production");
       mff.Total_Taka.focus();
       return false;
	}
	if(mff.Total_Meter.value=="")
    {
       alert("Total meter is required");
       mff.Total_Meter.focus();
       return false;
    }
	else if (mff.Total_Meter.value<=0)
	{
		alert("Total meters never be zero,please add meters");
       mff.Total_Meter.focus();
       return false;
	}
	if(mff.Shortage.value=="")
    {
       alert("Shortage is required");
       mff.Shortage.focus();
       return false;
    }
	else if (mff.Shortage.value<0)
	{
		alert("Shortage should never be in minus(-),please remove unwanted meters");
       mff.Shortage.focus();
       return false;
	}
	if(mff.Shortageper.value=="")
    {
       alert("Shortage(%) is required");
       mff.Shortageper.focus();
       return false;
    }
	else if (mff.Shortageper.value<0)
	{
		alert("Shortage(%) should never be 0%");
       mff.Shortageper.focus();
       return false;
	}
	return true;
	}
history.pushState(null, null);
    window.addEventListener('popstate', function(event)  {
    history.pushState(null, null);
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