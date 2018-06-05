$(document).ready(function(){
	$('#Sal_Fixed_Id').focus();
	 $("#Labour_Id").change(function(){
		t5=$("#Labour_Id").val();
		var q="?Labour_Id="+t5;
		$("#show").load("salary_fixedremain.php"+q);
		 });
$('#Amount, #Rate,#No_Of').keyup(function(){
    var Rate = parseFloat($('#Rate').val()) || 0;
    var No_Of = parseFloat($('#No_Of').val()) || 0;
     var Amount85 = Rate*No_Of;
    $('#Amount').val(Amount85.toFixed(2));    
});	
$('#Amount,#Upad_Amount,#Grand_Total,#Re_Amount').keyup(function(){
    var Amount = parseFloat($('#Amount').val()) || 0;
    var Upad_Amount = parseFloat($('#Upad_Amount').val()) || 0;
     var Re_Amount85 = Amount - Upad_Amount;
    $('#Grand_Total').val(Re_Amount85.toFixed(2));    
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
		 });
		 history.pushState(null, null);
    window.addEventListener('popstate', function(event)  {
    history.pushState(null, null);
    });
	function isDecimalNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }
	   function isNumberKey(evt) 
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }
	 function isDecimalplusNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode != 45 && charCode != 43 && charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
         return true;
      }	  
