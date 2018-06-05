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
		t1=$("#Bo_D_C_Id").val();
		t2=$("#Total_Cartoon").val();
		t3=$("#Quality_Id").val();
		t4=$("#R_Id").val();
		t5=$("#Chbo_D_C_Id").val();
		t6=$("#action").val();
sql="?Bo_D_C_Id="+t1+"&Total_Cartoon="+t2+"&Quality_Id="+t3+"&R_Id="+t4+"&Chbo_D_C_Id="+t5+"&action="+t6+"&Add1=Add";
		$("#Chbo_D_C_Id").val("");
		$("#Total_Cartoon").val("");
		$("#Quality_Id").val("");
		$("#Quality_Name").val("");
		$('#Chbo_D_C_Id').focus();
		$("#table").load("bobbin_d_cmigrate85table.php"+sql);
	});
		$("#Total_Cart").bind('keyup', function() {
                var add1 = 0;
                $(".rowDataSd1").each(function() {
                    add1 += Number($(this).html());
                });
                $("#Total_Cart").val(add1);
            });	
			$('#Bo_D_C_Date').datepicker({
                    format: "yyyy-mm-dd"
                }); 
$('#Chbo_D_C_Id').autocomplete({
	source: function( request, response ) {
		$.ajax({
			url : 'bobbinmigratedc_autocompleteajax.php',
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
		$('#Total_Cartoon').val(names[1]);
		$('#Quality_Id').val(names[2]);
		$('#Quality_Name').val(names[3]);
			}		      	
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
	if(mff.Total_Cart.value=="")
    {
       alert("Total cartoon is required");
       mff.Total_Cart.focus();
       return false;
    }
	else if (mff.Total_Cart.value==0)
	{
		alert("You cannot submit as there is no entry in challan");
       mff.Total_Cart.focus();
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
