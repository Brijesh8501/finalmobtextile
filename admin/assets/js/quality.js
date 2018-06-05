         $(document).ready(function () {
			 $('#Quality_Id').focus();
$('#Quality_Name').on('keypress', function (e) {
    var ingnore_key_codes = [34, 39];
    if ($.inArray(e.which, ingnore_key_codes) >= 0) {
        e.preventDefault();
        $("#error2").html("only valid special character allowed").show();
    } else {
        $("#error2").hide();
    }
		});
		$('#autosize').on('keypress', function (e) {
    var ingnore_key_codes = [34, 39];
    if ($.inArray(e.which, ingnore_key_codes) >= 0) {
        e.preventDefault();
        $("#auto").html("only valid special character allowed").show();
    } else {
        $("#auto").hide();
    }
		});
		$("#Quality_Name").blur(function(){
		t5=$("#Quality_Name").val().split(" ");
		var q="?Quality_Name="+t5+"&search=search";
		$("#show").load("qualitycheckajax.php"+q);
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
	var submitting = false;
 function Quality(mff)
{
	if(mff.Quality_Name.value=="")
    {
       alert("Quality is required");
       mff.Quality_Name.focus();
       return false;
    }
	if(mff.Description.value=="")
    {
       alert("Description is required");
       mff.Description.focus();
       return false;
    }
return true;
} 
/*function updateIndicator() {
     var t1 = navigator.onLine ? 'Internet connected' : 'Internet error';
	 if(t1=='Internet error')
	 {   
		 $('.panel-body').show();
		$('.row').hide();
		}
	 else if(t1=='Internet connected') 
	 {
		  $('.panel-body').hide();
		  $('.row').show();
	onload="updateIndicator()" ononline="updateIndicator()" onoffline="updateIndicator()"
		}
   }
*/