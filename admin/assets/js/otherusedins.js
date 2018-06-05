$(document).ready(function(){
	$('#Other_Used_Id').focus();
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
	$('#Other_Used_Date').datepicker({
                    format: "yyyy-mm-dd"
                }); 
$('#Mach_Pname').autocomplete({
	source: function( request, response ) {
		$.ajax({
			url : 'otherused_autocompleteajax.php?type=country_table',
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
		$('#Mach_Part_Id').val(names[1]);	
	}		      	
});	
		});
		var submitting = false;
		function checkQuotee(mff)
{
	if(mff.Mach_Pname.value=="")
    {
       alert("Machine-Parts is required");
       mff.Mach_Pname.focus();
       return false;
    }
if(mff.Mach_Part_Id.value=="")
    {
       alert("Please enter machine-parts properly");
       mff.Mach_Part_Id.focus();
       return false;
    }
	if(mff.Quantity_Used.value=="")
    {
       alert("Quantity is required");
       mff.Quantity_Used.focus();
       return false;
    }
	if(mff.Labour_Id.value=="")
    {
       alert("Please select master");
       mff.Labour_Id.focus();
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
	  history.pushState(null, null);
    window.addEventListener('popstate', function(event)  {
    history.pushState(null, null);
    }); 