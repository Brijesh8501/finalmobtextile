         $(document).ready(function () {
			 $('#company').focus();
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
$('#challanno').on('keypress', function (e) {
    var ingnore_key_codes = [34, 39];
    if ($.inArray(e.which, ingnore_key_codes) >= 0) {
        e.preventDefault();
		$("#error1").html("only valid special character allowed").show();
    } else {
        $("#error1").hide();
    }
});
$('#beamno').on('keypress', function (e) {
    var ingnore_key_codes = [34, 39];
    if ($.inArray(e.which, ingnore_key_codes) >= 0) {
        e.preventDefault();
		$("#error2").css("color","red");
	    $("#error2").html("only valid special character allowed").show();
    } else {
        $("#error2").hide();
    }
});
$('#date').datepicker({
                    format: "yyyy-mm-dd"
                }); 
			 $("#company").change(function(){
		t5=$("#company").val();
		var q="?company="+t5;
		$("#broker").load("brokerajax.php"+q);
		 });
		  $("#broker").change(function(){
		t5=$("#company").val();
		var q="?company="+t5+"&action=insert";
		alert(q);
		$("#showlabour").load("beamdclabour.php"+q);
		 });
		  $("#beamno").blur(function(){
		t5=$("#beamno").val().split(" ");
		var q="?beamno="+t5+"&search=search";
		$("#show").load("beamnocheckajax.php"+q);
		 });
		 $("#challanno").blur(function(){
		t5=$("#challanno").val().split(" ");
		var q="?challanno="+t5+"&search=search";
		$("#show").load("beamchallannocheckajax.php"+q);
		 });
	$("#Add1BeamDC").click(function(){
		
		t1=$("#challanid").val();
		t2=$("#beamno").val().split(" ");
		t3=$("#taar").val();
		t4=$("#meter").val();
		t6=$("#weight").val();
		t5=$("#quality").val();
		t7=$("#Status").val();
		t8=$("#R_Id").val();
		t9=$("#action").val();
		
sql="?challanid="+t1+"&beamno="+t2+"&taar="+t3+"&meter="+t4+"&weight="+t6+"&quality="+t5+"&Status="+t7+"&R_Id="+t8+"&action="+t9+"&Add1BeamDC=Add";
		$("#beamno").val("");
		$("#taar").val("");
		$("#meter").val("");
		$("#weight").val("");
		$("#quality").val("");
		$("#check").html("");
		$('#beamno').focus();
		$("#tableBeamDC").load("beam_d_c_table.php"+sql);
		
	});
		$(function() {
    $('#Total_Beam').bind('keyup', function() {
           count =0;
        count += $('#mybody').children('tr').length;
        $('#Total_Beam').val(count);
    });
});
		 });
var submitting = false;
 function Beamdc(mff)
{
	if(mff.company.value=="")
    {
       alert("Company is required");
       mff.company.focus();
       return false;
    }
	if(mff.broker.value=="")
    {
       alert("Broker is required");
       mff.broker.focus();
       return false;
    }
	if(mff.challanno.value=="")
    {
       alert("Challan no is required");
       mff.challanno.focus();
       return false;
    }
	if(mff.Total_Beam.value=="")
    {
       alert("Total beam is required");
       mff.Total_Beam.focus();
       return false;
    }
	else if (mff.Total_Beam.value<=0)
	{
		alert("You cannot submit challan as there is no entry in challan");
       mff.Total_Beam.focus();
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
