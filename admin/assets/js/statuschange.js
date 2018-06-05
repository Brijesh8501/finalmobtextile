         $(document).ready(function () {
			 $('#select_status').focus();
	$("#select_status").change(function(){
		t5=$("#select_status").val();
		var q="?select_status="+t5;
		$("#show").load("statuschangeajax.php"+q);
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
    function Statuschange(mff)
{
	if(mff.Challan_Id.value=="")
    {
       alert("Challan-Sub id is required");
       mff.Challan_Id.focus();
       return false;
    }
} 
