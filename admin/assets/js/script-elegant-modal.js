// Elegant Modal

// Function to open Modal when the page finishes loading (with time to display animation)

// Click event function to open modal (active)
function accounting() {
	$(".maskaccounting").addClass("activeaccounting"); //Finds .mask class and adds the active class
	$(".maskinvoicekey").removeClass("activeinvoicekey");
	 $(".maskchallankey").removeClass("activechallankey");
	  $(".maskorderkey").removeClass("activeorderkey");
	 
}
function challan () {
  $(".maskchallankey").addClass("activechallankey"); //Finds .mask class and adds the active class
  $(".maskaccounting").removeClass("activeaccounting");
  $(".maskinvoicekey").removeClass("activeinvoicekey");
   $(".maskorderkey").removeClass("activeorderkey");
}
function order () {
  $(".maskorderkey").addClass("activeorderkey"); //Finds .mask class and adds the active class
   $(".maskinvoicekey").removeClass("activeinvoicekey");
   $(".maskchallankey").removeClass("activechallankey");
    $(".maskaccounting").removeClass("activeaccounting");
}
function invoice () {
  $(".maskinvoicekey").addClass("activeinvoicekey"); //Finds .mask class and adds the active class
   $(".maskchallankey").removeClass("activechallankey");
   $(".maskorderkey").removeClass("activeorderkey");
    $(".maskaccounting").removeClass("activeaccounting");
}

// Função para fechar o modal.
function closeModalaccounting(){
  $(".maskaccounting").removeClass("activeaccounting"); //Remove the active class
}
function closeModalchallankey(){
  $(".maskchallankey").removeClass("activechallankey"); //Remove the active class
}
function closeModalinvoicekey(){
  $(".maskinvoicekey").removeClass("activeinvoicekey"); //Remove the active class
}
function closeModalorderkey(){
  $(".maskorderkey").removeClass("activeorderkey"); //Remove the active class
}

// Function to close the modal screen
$(".closeaccounting, .maskaccounting").on("click", function(){
  closeModalaccounting();
});
$(".closechallankey, .maskchallankey").on("click", function(){
  closeModalchallankey();
});
$(".closeinvoicekey, .maskinvoicekey").on("click", function(){
  closeModalinvoicekey();
});
$(".closeorderkey, .maskorderkey").on("click", function(){
  closeModalorderkey();
});

// Closes the modal with the button within the content
$(".content-button-closeaccounting").click(function(){
	closeModalaccounting();
});
$(".content-button-closechallankey").click(function(){
	closeModalchallankey();
});
$(".content-button-closeinvoicekey").click(function(){
	closeModalinvoicekey();
});
$(".content-button-closeorderkey").click(function(){
	closeModalorderkey();
});

// or the keyboard (esc)
$(document).keyup(function(e) {
  if (e.keyCode == 27) {
    closeModalaccounting();
	closeModalchallankey();
	closeModalinvoicekey();
	closeModalorderkey();
  }
  if (e.keyCode == 119) {
		accounting();
		
  }
   if (e.keyCode == 120) {
		challan();
  }
  if (e.keyCode == 122) {
		invoice();
  }
  if (e.keyCode == 123) {
		order();
  }
  	if (e.keyCode == 45) {
	$("#bank_vigataccount").focus();
	}

});
