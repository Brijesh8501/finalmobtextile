<script type="text/javascript" src="assets/js/jquerywebsite.js"></script>
<SCRIPT language=Javascript>
 $('#Cheque_No').on('keypress', function (e) {
    var ingnore_key_codes = [34, 39];
    if ($.inArray(e.which, ingnore_key_codes) >= 0) {
        e.preventDefault();
        $("#error3").html("only valid special character allowed").show();
    } else {
        $("#error3").hide();
    }
});
$('#Chq_No').on('keypress', function (e) {
    var ingnore_key_codes = [34, 39];
    if ($.inArray(e.which, ingnore_key_codes) >= 0) {
        e.preventDefault();
        $("#error3").html("only valid special character allowed").show();
    } else {
        $("#error3").hide();
    }
});
function isDecimalNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }
</script>