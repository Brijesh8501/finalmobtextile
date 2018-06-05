$(document).ready(function(){
	$('#Be_M_Id').focus();
	$('#Date').datepicker({
                    format: "yyyy-mm-dd"
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
	$("#Add1").click(function(){
		t1=$("#Sa_Pro_Id").val();
		t2=$("#Date").val();
		t3=$("#Saree_Lot_Meter").val();
		t4=$("#Saree_Pieces").val();
		t5=$("#action").val();
		t66=$("#design_id").val();
		t7=$("#Status").val();
		t8=$("#textarea1").val().split(" ");
		t9=$("#Be_M_Id").val();
		t10=$("#R_Id").val();
		t11=$("#Saree_Weight").val();
sql="?Sa_Pro_Id="+t1+"&Date="+t2+"&Saree_Lot_Meter="+t3+"&Saree_Pieces="+t4+"&action="+t5+"&design_id="+t66+"&Status="+t7+"&textarea1="+t8+"&Be_M_Id="+t9+"&R_Id="+t10+"&Saree_Weight="+t11+"&Add1=Add";
	
	   $("#Saree_Lot_Meter").val("");
		$("#Saree_Pieces").val("");
		$("#Saree_Weight").val("");
		$("#quality").val("");
		$("#Quality_Name").val("");
		$("#Design").val("");
		$("#design_id").val("");
	    $("#textarea1").val("");
		$('#Saree_Lot_Meter').focus();
		$("#table").load("saree_table_for_production.php"+sql);
		
	});
$('#Total_Meter, #Beam_Meter').keyup(function(){
    var rate = parseFloat($('#Total_Meter').val()) || 0;
    var box = parseFloat($('#Beam_Meter').val()) || 0;
     var shortage = box-rate;
    $('#Shortage').val(shortage.toFixed(2));    
});
$('#Beam_Meter,#Shortageper').keyup(function(){
    var totalmeter = parseFloat($('#Total_Meter').val()) || 0;
    var beammeter = parseFloat($('#Beam_Meter').val()) || 0;
     var shortage1 = beammeter-totalmeter;
	 var shortageper = shortage1/beammeter;
	 var shortpercent = shortageper*100;
    $('#Shortageper').val(shortpercent.toFixed(2));    
});
$("#Total_Piecess").bind('keyup', function() {
                var add1 = 0;
                $(".rowDataSd").each(function() {
                    add1 += Number($(this).html());
                });
                $("#Total_Piecess").val(add1);
            });		
$("#Total_Piecess").bind('keyup', function() {
                var add = 0;
                $(".rowDataSd1").each(function() {
                    add += Number($(this).html());
                });
                $("#Total_Meter").val(add.toFixed(2));
            });	
$('#Design').autocomplete({
	source: function( request, response ) {
		$.ajax({
			url : 'qualitydesign_autocompleteajax.php',
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
		$('#design_id').val(names[1]);
		$('#Quality_Name').val(names[2]);
		$('#quality').val(names[3]);
	}		      	
});	
$('#textarea1').on('keypress', function (e) {
    var ingnore_key_codes = [34, 39];
    if ($.inArray(e.which, ingnore_key_codes) >= 0) {
        e.preventDefault();
        $("#error1").html(" not allowed").show();
    } else {
        $("#error1").hide();
    }
});		
});
var submitting = false;     
function checkQuotee(mff)
{
	if(mff.Total_Piecess.value=="")
    {
       alert("Total piecess is required");
       mff.Total_Piecess.focus();
       return false;
    }
	else if (mff.Total_Piecess.value==0)
	{
		alert("You cannot submit as there is no entry in saree-production");
       mff.Total_Piecess.focus();
       return false;
	}
	if(mff.Total_Meter.value=="")
    {
       alert("Total meter is required");
       mff.Total_Meter.focus();
       return false;
    }
	else if (mff.Total_Meter.value<=0)
	{
		alert("Total meters never be zero,please add meters");
       mff.Total_Meter.focus();
       return false;
	}
	if(mff.Shortage.value=="")
    {
       alert("Shortage is required");
       mff.Shortage.focus();
       return false;
    }
	else if (mff.Shortage.value<0)
	{
		alert("Shortage should never be in minus(-),please remove unwanted meters");
       mff.Shortage.focus();
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