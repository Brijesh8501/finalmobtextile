$(document).ready(function(){
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
	$("#company").change(function(){
		t5=$("#company").val();
		var q="?company="+t5;
		$("#broker").load("brokerajax.php"+q);
	});
	$("#challanno").blur(function(){
		t5=$("#challanno").val().split(" ");
		var q="?challanno="+t5+"&search=search";
		$("#show").load("bobbinchallannocheckajax.php"+q);
		 });
	$("#Add1").click(function(){
		t0=$("#challanid").val();
		t1=$("#totalcartoon").val();
		t2=$("#totalweight").val();
		t3=$("#quality").val();
		t4=$("#Status").val();
		t5=$("#R_Id").val();
		t6=$("#action").val();
sql="?challanid="+t0+"&totalcartoon="+t1+"&totalweight="+t2+"&quality="+t3+"&Status="+t4+"&R_Id="+t5+"&action="+t6+"&Add1=Add";
		$("#totalcartoon").val("");
		$("#totalweight").val("");
		$("#quality").val("");
		$('#totalcartoon').focus();
		$("#table").load("bobbin_d_c_table.php"+sql);
	});
	$("#cartoon").bind('keyup', function() {
                var add1 = 0;
                $(".rowDataSd1").each(function() {
                    add1 += Number($(this).html());
                });
                $("#cartoon").val(add1);
            });	
			$('#challanno').on('keypress', function (e) {
    var ingnore_key_codes = [34, 39];
    if ($.inArray(e.which, ingnore_key_codes) >= 0) {
        e.preventDefault();
        $("#error1").html("only valid special character allowed").show();
    } else {
        $("#error1").hide();
    }
});
$('#Bo_D_C_Date').datepicker({
                    format: "yyyy-mm-dd"
                }); 
});
     var submitting = false;
  function checkQuotee(mff)
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
	if(mff.cartoon.value=="")
    {
       alert("Total cartoon is required");
       mff.cartoon.focus();
       return false;
    }
	else if (mff.cartoon.value==0)
	{
		alert("You cannot submit challan as there is no entry in challan");
       mff.cartoon.focus();
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
