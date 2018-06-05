$(document).ready(function(){
	$('#customer').focus();
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
	$('#Om_Date').datepicker({
                    format: "yyyy-mm-dd"
                });
	$('#Delivery_Date').datepicker({
                    format: "yyyy-mm-dd"
                }); 
	$("#customer").change(function(){
		t5=$("#customer").val();
		var q="?customer="+t5;
		$("#broker").load("broajaxcustomer.php"+q);
	});
	$("#Add1").click(function(){
		t1=$("#T_Order_Id").val();
		t3=$("#quality").val();
		t8=$("#Quantity").val();
		t6=$("#Rate").val();
		t7=$("#Amount").val();
		t9=$("#R_Id").val();
		t10=$("#action").val();
sql="?T_Order_Id="+t1+"&quality="+t3+"&Quantity="+t8+"&Rate="+t6+"&Amount="+t7+"&R_Id="+t9+"&action="+t10+"&Add1=Add";
		$("#quality").val("");
		$("#Quality_Name").val(""); 
		$("#Quantity").val("");
		$("#Rate").val("");
		$("#Amount").val("");
		$('#Quality_Name').focus();
		$("#table").load("takaordertable.php"+sql);
	});
$('#Quality_Name').autocomplete({
	source: function( request, response ) {
		$.ajax({
			url : 'qualityorder_autocompleteajax.php',
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
		$('#quality').val(names[1]);
	}		      	
});	
$('#Quantity, #Rate').keyup(function(){
    var Quantity = parseFloat($('#Quantity').val()) || 0;
    var Rate = parseFloat($('#Rate').val()) || 0;
     var Amount = Quantity*Rate;
    $('#Amount').val(Amount.toFixed(2));    
});
$('#Advance_Amt').keyup(function(){
    var Grandtotal = parseFloat($('#Grandtotal').val()) || 0;
    var Advance_Amt = parseFloat($('#Advance_Amt').val()) || 0;
     var Re_Amt = Grandtotal-Advance_Amt;
    $('#Re_Amt').val(Re_Amt.toFixed(2));    
});
$('#Grandtotal, #Discount').keyup(function(){
    var Total_Amt = parseFloat($('#Total_Amt').val()) || 0;
    var Discount = parseFloat($('#Discount').val()) || 0;
     var Percentage = (Total_Amt/100)*Discount;
	 var Grandtotal = Total_Amt - Percentage;
    $('#Grandtotal').val(Grandtotal.toFixed(2));    
});
$("#Total_Amt").bind('keyup', function() {
                var add = 0;
                $(".rowDataSd").each(function() {
                    add += Number($(this).html());
                });
                $("#Total_Amt").val(add.toFixed(2));
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
		});
	history.pushState(null, null);
    window.addEventListener('popstate', function(event)  {
    history.pushState(null, null);
    });
  var submitting = false;   
function checkQuotee(mff)
{
	if(mff.customer.value=="")
    {
       alert("Customer is required");
       mff.customer.focus();
       return false;
    }
	if(mff.broker.value=="")
    {
       alert("Broker is required");
       mff.broker.focus();
       return false;
    }
	if(mff.Discount.value=="")
    {
       alert("Discount is required");
       mff.Discount.focus();
       return false;
    }
	if(mff.Total_Amt.value=="")
    {
       alert("Total amount is required");
       mff.Total_Amt.focus();
       return false;
    }
	else if(mff.Total_Amt.value<=0)
    {
       alert("Total amount should be more than 0.00");
       mff.Total_Amt.focus();
       return false;
    }
	if(mff.Status.value=="")
    {
       alert("Status is required");
       mff.Status.focus();
       return false;
    }
	if(mff.autosize.value=="")
    {
       alert("Description is required");
       mff.autosize.focus();
       return false;
    }
	if(mff.Grandtotal.value=="")
    {
       alert("Grand total is required");
       mff.Grandtotal.focus();
       return false;
    }
	else if(mff.Grandtotal.value<=0)
    {
       alert("Grand total should be more than 0.00");
       mff.Grandtotal.focus();
       return false;
    }
	if(mff.Advance_Amt.value=="")
    {
       alert("Advance amount is required");
       mff.Advance_Amt.focus();
       return false;
    }
	if (mff.Re_Amt.value=="")
	{
		alert("Remaining amount is required");
       mff.Re_Amt.focus();
       return false;
	}
	else if (mff.Re_Amt.value<=0)
	{
		alert("Remaining amount should never be in minus(-),please settle advance amount properly");
       mff.Re_Amt.focus();
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
	   function isDecimalNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }