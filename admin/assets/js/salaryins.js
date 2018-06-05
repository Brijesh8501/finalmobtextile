       $(document).ready(function() {
		   $('#reservation').focus();
		  $("#Search").click(function(){
		t1=$("#reservation").val();
sql="?reservation="+t1+"&Search=Search";
  $("#table").load("salaryinserttb.php"+sql);
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
	  var submitting = false;
	  function checkQuotee(mff)
{
	return true;
}
