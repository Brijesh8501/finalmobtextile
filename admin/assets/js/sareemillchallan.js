$(document).ready(function(){
	$('#textarea1').focus();
	$('#Saree_D_C_Date').datepicker({
                    format: "yyyy-mm-dd"
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
		t1=$("#Saree_D_C_Id").val();
		t2=$("#Saree_Lot_Meter").val();
		t3=$("#Saree_Pieces").val();
		t4=$("#Quality_Id").val();
		t7=$("#Saree_Lot_Id").val();
		t5=$("#Design_Id").val();
		t8=$("#R_Id").val();
		t9=$("#Saree_Weight").val();
		t10=$("#action").val();
sql="?Saree_D_C_Id="+t1+"&Saree_Lot_Meter="+t2+"&Saree_Lot_Id="+t7+"&Saree_Pieces="+t3+"&Quality_Id="+t4+"&Design_Id="+t5+"&R_Id="+t8+"&Saree_Weight="+t9+"&action="+t10+"&Add1=Add";
		$("#Saree_Lot_Id").val("");
		$("#Saree_Lot_Meter").val("");
		$("#Saree_Pieces").val("");
		$("#Quality_Id").val("");
		$("#Design_Id").val("");
		$("#Quality_Name").val("");
		$("#Design").val("");
		$("#Saree_Weight").val("");
		$('#Saree_Lot_Id').focus();
		$("#table").load("saree_d_cmill85table.php"+sql);
	});
		$(function() {
    $('#Total_Lot').bind('keyup', function() {
           count =0;
        count += $('#mybody').children('tr').length;
        $('#Total_Lot').val(count);
    });
});
$('#Saree_Lot_Id').autocomplete({
	source: function( request, response ) {
		$.ajax({
			url : 'sareedc_autocompleteajax.php',
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
		$('#Saree_Lot_Meter').val(names[1]);
		$('#Saree_Weight').val(names[2]);
		$('#Saree_Pieces').val(names[3]);
		$('#Quality_Name').val(names[4]);
		$('#Quality_Id').val(names[5]);
		$('#Design').val(names[6]);
		$('#Design_Id').val(names[7]);
	}		      	
});
	});
	  var submitting = false;
function checkQuotee(mff)
{
    if(mff.Saree_Mill.value=="")
    {
       alert("Mill name is required");
       mff.Saree_Mill.focus();
       return false;
    }
	if(mff.Total_Lot.value=="")
    {
       alert("Total lot is required");
       mff.Total_Lot.focus();
       return false;
    }
	else if (mff.Total_Lot.value==0)
	{
		alert("You cannot submit as there is no entry in challan");
       mff.Total_Lot.focus();
       return false;
	}
	else if (mff.Total_Lot.value>=35)
	{
		alert("More than 34 lot is not acceptable please settle down appropriate records");
       mff.Total_Lot.focus();
       return false;
	}
	return true;
} 
history.pushState(null, null);
    window.addEventListener('popstate', function(event)  {
    history.pushState(null, null);
    });