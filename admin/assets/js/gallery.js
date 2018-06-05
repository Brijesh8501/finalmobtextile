         $(document).ready(function () {
			 $('#gallery_id').focus();
			 $("#sequence").blur(function(){
		t5=$("#sequence").val();
		var q="?sequence="+t5+"&search=search";
		$("#show").load("gallerysequenceajax.php"+q);
		 });
    $('#image_name').on('keypress', function (e) {
    var ingnore_key_codes = [34, 39];
    if ($.inArray(e.which, ingnore_key_codes) >= 0) {
        e.preventDefault();
        $("#error1").html("only valid special character allowed").show();
    } else {
        $("#error1").hide();
    }
});
 $("#image_name").blur(function(){
		t5=$("#image_name").val().split(" ");
		var q="?image_name="+t5+"&search=search";
		$("#show").load("imagenamecheckajax.php"+q);
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
	 function isNumberKey(evt) 
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      } 
 var submitting = false;
    function Gallery(mff)
{
	if(mff.image_name.value=="")
    {
       alert("Image name is required");
       mff.image_name.focus();
       return false;
    }
if(mff.thumbnail.value=="")
    {
       alert("Thumbnail is required");
       mff.thumbnail.focus();
       return false;
    }
	if(mff.image.value=="")
    {
       alert("Image is required");
       mff.image.focus();
       return false;
    }
if(mff.sequence.value=="")
    {
       alert("Sequence is required");
       mff.sequence.focus();
       return false;
    }
	return true;
}  
    function Galleryupd(mff)
{
if(mff.thumbnail.value=="")
    {
       alert("Please cofirm thumbnail by re-selecting thumbnail");
       mff.thumbnail.focus();
       return false;
    }
	if(mff.image.value=="")
    {
       alert("Please cofirm image by re-selecting image");
       mff.image.focus();
       return false;
    }
	return true;
}  
