$(document).ready(function(){
	$('#textarea1').focus();
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
	 $('#textarea1').on('keypress', function (e) {
    var ingnore_key_codes = [34, 39];
    if ($.inArray(e.which, ingnore_key_codes) >= 0) {
        e.preventDefault();
        $("#error1").html(" not allowed").show();
    } else {
        $("#error1").hide();
    }
});	
	$("#Add1").click(function(){
		t1=$("#Beam_D_C_Id").val();
		t2=$("#Beam_No").val().split(" ");
		t3=$("#Taar").val();
		t4=$("#Beam_Meter").val();
		t7=$("#Weight").val();
		t5=$("#Quality_Id").val();
		t8=$("#R_Id").val();
		t9=$("#Chbe_D_C_Id").val();
		t10=$("#action").val();
sql="?Beam_D_C_Id="+t1+"&Beam_No="+t2+"&Taar="+t3+"&Beam_Meter="+t4+"&Weight="+t7+"&Quality_Id="+t5+"&R_Id="+t8+"&Chbe_D_C_Id="+t9+"&action="+t10+"&Add1=Add";
		$("#Beam_No").val("");
		$("#Chbe_D_C_Id").val("");
		$("#Taar").val("");
		$("#Beam_Meter").val("");
		$("#Weight").val("");
		$("#Quality_Id").val("");
		$("#Quality_Name").val("");
		$('#Beam_No').focus();
		$("#table").load("beam_d_cmigrate85table.php"+sql);
	});
  	$(function() {
    $('#Total_Beam').bind('keyup', function() {
           count =0;
        count += $('#mybody').children('tr').length;
        $('#Total_Beam').val(count);
    });
});
$('#Beam_D_C_Date').datepicker({
                    format: "yyyy-mm-dd"
                }); 
$('#Beam_No').autocomplete({
	source: function( request, response ) {
		$.ajax({
			url : 'beammigratedc_autocompleteajax.php',
			dataType: "json",
			method: 'post',
			data: {
			   name_startsWith: request.term,
			   type: 'country_table',
			   row_num : 1
			},
			 success: function( data ) {
				 response( $.map( data, function( item ) {
				 	var code = item.split("|");
					return {
						label: code[0],
						value: code[0],
						data : item
					}
				}));
			}
		});
	},
	autoFocus: true,	      	
	minLength: 0,
	select: function( event, ui ) {
		var names = ui.item.data.split("|");
		$('#Chbe_D_C_Id').val(names[1]);						
		$('#Taar').val(names[2]);
		$('#Beam_Meter').val(names[3]);
		$('#Weight').val(names[4]);
		$('#Quality_Id').val(names[5]);
		$('#Quality_Name').val(names[6]);
			}		      	
});
	});
	 history.pushState(null, null);
    window.addEventListener('popstate', function(event)  {
    history.pushState(null, null);
	
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
	if(mff.Total_Beam.value=="")
    {
       alert("Total beam is required");
       mff.Total_Beam.focus();
       return false;
    }
	else if (mff.Total_Beam.value==0)
	{
		alert("You cannot submit as there is no entry in challan");
       mff.Total_Beam.focus();
       return false;
	}
	else if (mff.Total_Beam.value<6)
	{
		alert("Less than 6 beam is not acceptable please settle down appropriate records");
       mff.Total_Beam.focus();
       return false;
	}
	else if (mff.Total_Beam.value>=35)
	{
		alert("More than 34 beam is not acceptable please settle down appropriate records");
       mff.Total_Beam.focus();
       return false;
	}
	return true;
}
