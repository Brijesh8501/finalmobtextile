$(document).ready(function(){
	$('#C_Name').focus();
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
	$('#Beam_Invoice_Date').datepicker({
                    format: "yyyy-mm-dd"
                }); 
	$("#Add1").click(function(){
		t1=$("#Beam_Invoice_Id").val();
		t2=$("#Total_Beam").val();
		t3=$("#Ends").val();
		t4=$("#Quantity").val();
		t5=$("#Rate").val();
		t6=$("#Quality_Id").val();
		t7=$("#Amount").val();
		t8=$("#Beam_D_C_Id").val();
		t9=$("#R_Id").val();
		t10=$("#action").val();
sql="?Beam_Invoice_Id="+t1+"&Total_Beam="+t2+"&Ends="+t3+"&Quantity="+t4+"&Rate="+t5+"&Quality_Id="+t6+"&Amount="+t7+"&Beam_D_C_Id="+t8+"&R_Id="+t9+"&action="+t10+"&Add1=Add";
        $("#Quality_Name").val("");
		$("#Total_Beam").val("");
		$("#Ends").val("");
		$("#Quantity").val("");
		$("#Rate").val("");
		$("#Quality_Id").val("");
		$("#Amount").val("");
		$('#Quality_Name').focus();
		$("#table").load("beam_invoicetable85.php"+sql);
	});
$('#Quantity, #Rate').keyup(function(){
    var Quantity = parseFloat($('#Quantity').val()) || 0;
    var Rate = parseFloat($('#Rate').val()) || 0;
     var Amount = Quantity*Rate;
    $('#Amount').val(Amount.toFixed(2));    
});
$('#Total_Amt,#Grand_Amt').keyup(function(){
    var Total_Amt = parseFloat($('#Total_Amt').val()) || 0;
    var Grand_Amt = parseFloat($('#Grand_Amt').val()) || 0;
     var additionalamount = Grand_Amt-Total_Amt;
    $('#additionalamount').val(additionalamount.toFixed(2));    
});
		 $("#Total_B").bind('keyup', function() {
                var add = 0;
                $(".rowDataSd").each(function() {
                    add += Number($(this).html());
                });
                $("#Total_Amt").val(add.toFixed(2));
            });		
		$("#Total_B").bind('keyup', function() {
                var add1 = 0;
                $(".rowDataSd1").each(function() {
                    add1 += Number($(this).html());
                });
                $("#Total_B").val(add1);
            });	
$('#Invoice_No').on('keypress', function (e) {
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
	if(mff.Invoice_No.value=="")
    {
       alert("Invoice no is required");
       mff.Invoice_No.focus();
       return false;
    }
	if(mff.Total_B.value=="")
    {
       alert("No of beams are required");
       mff.Total_B.focus();
       return false;
    }
	else if (mff.Total_B.value==0)
	{
		alert("You cannot submit challan as there is no entry in invoice");
       mff.Total_B.focus();
       return false;
	}
	if(mff.Total_Amt.value=="")
    {
       alert("Total amount is required");
       mff.Total_Amt.focus();
       return false;
    }
	if(mff.additionalamount.value=="")
    {
       alert("Additional amount is required");
       mff.additionalamount.focus();
       return false;
    }
	else if(mff.additionalamount.value<=0)
    {
       alert("Additional amount should never be in minus(-)");
       mff.additionalamount.focus();
       return false;
    }
	if(mff.Grand_Amt.value=="")
    {
       alert("Grand total is required");
       mff.Grand_Amt.focus();
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
