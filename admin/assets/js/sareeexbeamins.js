$(document).ready(function(){
	$('#Sa_Exbeam_Id').focus();
	$('#Fitted_Date').datepicker({
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
		t1=$("#Be_Ref_No").val();
		t2=$("#Fitted_Date").val();
		t3=$("#Be_Meter").val();
		t4=$("#Be_Taar").val();
		t6=$("#Be_Weight").val();
		t5=$("#quality").val();
		t8=$("#R_Id").val();
		t9=$("#action").val();
		t10=$("#Sa_Exbeam_Id").val();
		t11=$("#Sa_Beam_No").val().split(" ");
		t12=$("#Sa_Pro_Id").val();
sql="?Be_Ref_No="+t1+"&Fitted_Date="+t2+"&Be_Meter="+t3+"&Be_Taar="+t4+"&Be_Weight="+t6+"&quality="+t5+"&R_Id="+t8+"&action="+t9+"&Sa_Exbeam_Id="+t10+"&Sa_Beam_No="+t11+"&Sa_Pro_Id="+t12+"&Add1=Add";
		$("#Be_Ref_No").val("");
		$("#Be_Meter").val("");
		$("#Be_Taar").val("");
		$("#Be_Weight").val("");
		$("#quality").val("");
		$("#Sa_Beam_No").val("");
		$("#Sa_Pro_Id").val("");
		$('#Be_Ref_No').focus();
		$("#table").load("saree_exbeam_table.php"+sql);
	});
		$(function() {
    $('#Sa_Beam_Total').bind('keyup', function() {
           count =0;
        count += $('#mybody').children('tr').length;
        $('#Sa_Beam_Total').val(count);
    });
});
$('#Sa_Pro_Id').autocomplete({
	source: function( request, response ) {
		$.ajax({
			url : 'sareeproexbeam_autocompleteajax.php',
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
		$('#Sa_Beam_No').val(names[1]);
		$('#Machine_No').val(names[2]);
		$('#Machine_Id').val(names[3]);
	}		      	
});		
$('#autosize').on('keypress', function (e) {
    var ingnore_key_codes = [34, 39];
    if ($.inArray(e.which, ingnore_key_codes) >= 0) {
        e.preventDefault();
        $("#error1").html("only valid special character allowed").show();
    } else {
        $("#error1").hide();
    }
});
$('#Be_Ref_No').on('keypress', function (e) {
    var ingnore_key_codes = [34, 39];
    if ($.inArray(e.which, ingnore_key_codes) >= 0) {
        e.preventDefault();
        $("#error2").html("only valid special character allowed").show();
    } else {
        $("#error2").hide();
    }
});
	});
 var submitting = false;
 function checkQuotee(mff)
{
	if(mff.Machine_No.value=="")
    {
       alert("Machine no is required");
       mff.Machine_No.focus();
       return false;
    }
	if(mff.Machine_Id.value=="")
    {
       alert("Please enter machine no properly");
       mff.Machine_Id.focus();
       return false;
    }
	if(mff.Mul_Beam_No.value=="")
    {
       alert("Multiple-Beam no is required");
       mff.Mul_Beam_No.focus();
       return false;
    }
	if(mff.Sa_Beam_Total.value=="")
    {
       alert("Total beam is required");
       mff.Sa_Beam_Total.focus();
       return false;
    }
	else if (mff.Sa_Beam_Total.value<=0)
	{
		alert("You cannot submit challan as there is no entry in challan");
       mff.Sa_Beam_Total.focus();
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