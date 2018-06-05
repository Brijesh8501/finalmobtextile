         $(document).ready(function () {
			 $('#Design_Id').focus();
    $('#Design').on('keypress', function (e) {
    var ingnore_key_codes = [34, 39];
    if ($.inArray(e.which, ingnore_key_codes) >= 0) {
        e.preventDefault();
        $("#error1").html("only valid special character allowed").show();
    } else {
        $("#error1").hide();
    }
});
$("#Design").blur(function(){
		t5=$("#Design").val().split(" ");
		var q="?Design="+t5+"&search=search";
		$("#show").load("designcheckajax.php"+q);
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
	var submitting = false;
    function Designpage(mff)
{
	if(mff.Design.value=="")
    {
       alert("Design is required");
       mff.Design.focus();
       return false;
    }
if(mff.Quality_Id.value=="")
    {
       alert("Quality is required");
       mff.Quality_Id.focus();
       return false;
    }
	if(mff.image.value=="")
    {
       alert("Image is required");
       mff.image.focus();
       return false;
    }
	return true;
}
function Designupdpage(mff)
{
	if(mff.Design.value=="")
    {
       alert("Design is required");
       mff.Design.focus();
       return false;
    }
if(mff.Quality_Id.value=="")
    {
       alert("Quality is required");
       mff.Quality_Id.focus();
       return false;
    }
	if(mff.image.value=="")
    {
       alert("Please re-select image for confirmation");
       mff.image.focus();
       return false;
    }
	return true;
}
