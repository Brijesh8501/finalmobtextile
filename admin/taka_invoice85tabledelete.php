<?php
include("databaseconnect.php");
    if(isset($_POST['delete_id'])) {
      $delete_id = mysql_real_escape_string($_POST['delete_id']);
      $result = mysql_query("DELETE FROM `taka_invoice_1` WHERE `Ta_invoice_Id`=".$delete_id);
      if($result !== false) {
        echo 'true';
      }
    }
?>