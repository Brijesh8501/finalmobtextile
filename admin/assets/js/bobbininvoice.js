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
	$("#Add1").click(function(){
		t0=$("#Bobbin_Invoice_Id").val();
		t1=$("#Total_Cartoon").val();
		t2=$("#Total_Weight").val();
		t3=$("#Quality_Id").val();
		t6=$("#Rate").val();
		t7=$("#Amt").val();
		t8=$("#Bo_D_C_Id").val();
		t9=$("#R_Id").val();
		t10=$("#action").val();
sql="?Bobbin_Invoice_Id="+t0+"&Total_Cartoon="+t1+"&Total_Weight="+t2+"&Quality_Id="+t3+"&Rate="+t6+"&Amt="+t7+"&Bo_D_C_Id="+t8+"&R_Id="+t9+"&action="+t10+"&Add1=Add";
		$("#Total_Cartoon").val("");
		$("#Total_Weight").val("");
		$("#Quality_Id").val("");
		$("#Quality_Name").val("");
		$("#Rate").val("");
		$("#Amt").val("");
		$('#Quality_Name').focus();
		$("#table").load("bobbin_invoicetable85.php"+sql);
	});
$('#Total_Weight,#Rate').keyup(function(){
    var Total_Weight = parseFloat($('#Total_Weight').val()) || 0;
    var Rate = parseFloat($('#Rate').val()) || 0;
     var Amount = Total_Weight*Rate;
    $('#Amt').val(Amount.toFixed(2));    
});
$('#Total_Amt,#Grand_Amt').keyup(function(){
    var Total_Amt = parseFloat($('#Total_Amt').val()) || 0;
    var Grand_Amt = parseFloat($('#Grand_Amt').val()) || 0;
     var additionalamount = Grand_Amt-Total_Amt;
    $('#Addtnl_Amt').val(additionalamount.toFixed(2));    
});
 	 $("#Total_Cart").bind('keyup', function() {
                var add = 0;
                $(".rowDataSd1").each(function() {
                    add += Number($(this).html());
                });
                $("#Total_Amt").val(add.toFixed(2));
            });		
		$("#Total_Cart").bind('keyup', function() {
                var add1 = 0;
                $(".rowDataSd").each(function() {
                    add1 += Number($(this).html());
                });
                $("#Total_Cart").val(add1);
            });	
$('#Bobbin_Invoice_Date').datepicker({
                    format: "yyyy-mm-dd"
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
var submitting = false;     
function checkQuotee(mff)
{
if(mff.Invoice_No.value=="")
    {
       alert("Invoice no is required");
       mff.Invoice_No.focus();
       return false;
    }
	if(mff.Total_Cart.value=="")
    {
       alert("Total cartoon is required");
       mff.Total_Cart.focus();
       return false;
    }
	else if (mff.Total_Cart.value=="0")
	{
		alert("You cannot submit invoice as there is no entry in invoice");
       mff.Total_Cart.focus();
       return false;
	}
	if(mff.Total_Amt.value=="")
    {
       alert("Total amount is required");
       mff.Total_Amt.focus();
       return false;
    }
	if(mff.Addtnl_Amt.value=="")
    {
       alert("Additional amount is required");
       mff.Addtnl_Amt.focus();
       return false;
    }
	else if(mff.Addtnl_Amt.value<="0")
    {
       alert("Additional amount should never be in minus(-)");
       mff.Addtnl_Amt.focus();
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
