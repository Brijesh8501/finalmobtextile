$(document).ready(function(){
	$('#Cu_En_Name').focus();
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
	$('#Taka_D_C_Date').datepicker({
                    format: "yyyy-mm-dd"
                }); 
		 $("#countryname_1").blur(function(){
		t5=$("#countryname_1").val().split(" ");
		var q="?countryname_1="+t5+"&search=search";
		$("#show").load("takacheckajax.php"+q);
		 });
	$("#Add1").click(function(){
		t1=$("#Taka_D_C_Id").val();
		t2=$("#countryname_1").val();
		t3=$("#country_no_1").val();
		t4=$("#phone_code_1").val();
	    t6=$("#country_1").val();
		t7=$("#Status").val();
		t8=$("#R_Id").val();
		t9=$("#action").val();
		t10=$("#T_Order_Id").val();
sql="?Taka_D_C_Id="+t1+"&countryname_1="+t2+"&country_no_1="+t3+"&phone_code_1="+t4+"&country_1="+t6+"&Status="+t7+"&R_Id="+t8+"&action="+t9+"&T_Order_Id="+t10+"&Add1=Add";
		$("#countryname_1").val("");
		$("#country_no_1").val("");
		$("#phone_code_1").val("");
		$("#phone_1").val("");
		$("#country_1").val("");
		$("#check").html("");
		$('#countryname_1').focus();
		$("#table").load("taka_d_c85table.php"+sql);
	});
		$(function() {
    $('#Total_Taka').bind('keyup', function() {
           count =0;
        count += $('#mybody').children('tr').length;
        $('#Total_Taka').val(count);
    });
});
$('#countryname_1').autocomplete({
	source: function( request, response ) {
		$.ajax({
			url : 'takadc_autocompleteajax.php',
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
		$('#country_no_1').val(names[1]);
		$('#phone_code_1').val(names[2]);
		$('#country_1').val(names[3]);
		$('#phone_1').val(names[4]);
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
		alert("You cannot submit as there is no entry in taka-challan");
       mff.Total_Taka.focus();
       return false;
	}
	else if (mff.Total_Taka.value>=35)
	{
		alert("More than 34 taka is not acceptable please settle down appropiate records");
       mff.Total_Taka.focus();
       return false;
	}
	return true;
	}
 history.pushState(null, null);
    window.addEventListener('popstate', function(event)  {
    history.pushState(null, null);
    }); 