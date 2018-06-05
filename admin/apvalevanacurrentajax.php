<?php include("logcode.php");
include("databaseconnect.php");
date_default_timezone_set("Asia/Calcutta");
if(isset($_REQUEST['Search']))
{
	////////////////////////////////// number format in point 
  function moneyFormatIndia($num){
$explrestunits = "" ;
$num=preg_replace('/,+/', '', $num);
$words = explode(".", $num);
$des="00";
if(count($words)<=2){
    $num=$words[0];
    if(count($words)>=2){$des=$words[1];}
    if(strlen($des)<2){$des="$des0";}else{$des=substr($des,0,2);}
}
if(strlen($num)>3){
    $lastthree = substr($num, strlen($num)-3, strlen($num));
    $restunits = substr($num, 0, strlen($num)-3); // extracts the last three digits
    $restunits = (strlen($restunits)%2 == 1)?"0".$restunits:$restunits; // explodes the remaining digits in 2's formats, adds a zero in the beginning to maintain the 2's grouping.
    $expunit = str_split($restunits, 2);
    for($i=0; $i<sizeof($expunit); $i++){
        // creates each of the 2's group and adds a comma to the end
        if($i==0)
        {
            $explrestunits .= (int)$expunit[$i].","; // if is first value , convert into integer
        }else{
            $explrestunits .= $expunit[$i].",";
        }
    }
    $thecash = $explrestunits.$lastthree;
} else {
    $thecash = $num;
}
return "$thecash.$des"; // writes the final format where $currency is the currency symbol.
}
	$apvalevana = $_REQUEST['apvalevana'];
	$Company = $_REQUEST['Company'];
	if($apvalevana==""){
		echo "Please select option first";
	}
	else{
	if($apvalevana=='Apvana'){	
 $sql_apv1 = "SELECT sum(Grand_Amt) as grandtotal FROM beam_invoice LEFT JOIN transactions_beam1 ON beam_invoice.Beam_Invoice_Id = transactions_beam1.Trans_Invoice_No WHERE (transactions_beam1.Status IS NULL) or (transactions_beam1.Status = 'Un-Paid') and beam_invoice.Company_Id = '$Company'";
$result_apv1 = mysql_query($sql_apv1);
$row_result_apv1 = mysql_fetch_array($result_apv1); 

$sql_apv2 = "SELECT sum(Grand_Amt) as grandtotal FROM bobbin_invoice LEFT JOIN transactions_bobbin ON bobbin_invoice.Bobbin_Invoice_Id = transactions_bobbin.Trans_Invoice_No WHERE (transactions_bobbin.Status IS NULL) or (transactions_bobbin.Status = 'Un-Paid') and bobbin_invoice.Company_Id = '$Company'";
$result_apv2 = mysql_query($sql_apv2);
$row_result_apv2 = mysql_fetch_array($result_apv2); 
$total_apvana = $row_result_apv1['grandtotal'] + $row_result_apv2['grandtotal'];

 $dateact = date('Y-m-d');
	$dateactfull = date('d-m-Y        h:i:s A');
	$Entry_Id = $row_result['Registration_Id'];
	
	$selectcompany = mysql_query("select C_Name from company_deetaails where Company_Id = '$Company'");
	$selectcompanyfetch = mysql_fetch_array($selectcompany);
	
	$Partact = "Apvana Levana Search<br/>Search For : ".$apvalevana.", Company : ".$selectcompanyfetch['C_Name'];
	$insactivity = "insert into activity(Activity_Id,Date,Particular,Type,Action,Datefull,Id) values(NULL,'$dateact','$Partact','Apvana Levana - Search','search','$dateactfull','$Entry_Id')";
	mysql_query($insactivity); 
 ?> 

<table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                         <tr> 
                                            <th>Apvana</th>
                                            </tr>
                                       </thead>
                                    <tbody>
  <tr class="odd gradeX"> 
     <td width="10%"><?php echo moneyFormatIndia($total_apvana); ?></td>
    </tr>
      </tbody>
  </table>

	<?php }
elseif($apvalevana=='Levana')
{
	$sql_leva1 = "SELECT sum(Grandtotal) as grandtotal FROM taka_invoice LEFT JOIN transactions_taka ON taka_invoice.Taka_Invoice_Id = transactions_taka.Trans_Invoice_No WHERE (transactions_taka.Status IS NULL) or (transactions_taka.Status = 'Not-Received') and taka_invoice.Customer_Id = '$Company'";
	$result_leva1 = mysql_query($sql_leva1);
$row_result_leva1 = mysql_fetch_array($result_leva1); 

     $sql_leva2 = "SELECT sum(Grandtotal) as grandtotal FROM saree_invoice LEFT JOIN transactions_saree ON saree_invoice.Saree_Invoice_Id = transactions_saree.Trans_Invoice_No WHERE (transactions_saree.Status IS NULL) or (transactions_saree.Status = 'Not-Received') and saree_invoice.Customer_Id = '$Company'";
$result_leva2 = mysql_query($sql_leva2);
$row_result_leva2 = mysql_fetch_array($result_leva2); 
$total_levana = $row_result_leva1['grandtotal'] + $row_result_leva2['grandtotal'];

$dateact = date('Y-m-d');
	$dateactfull = date('d-m-Y        h:i:s A');
	$Entry_Id = $row_result['Registration_Id'];
	
	$selectcompany = mysql_query("select Cu_En_Name from customer_details where Customer_Id = '$Company'");
	$selectcompanyfetch = mysql_fetch_array($selectcompany);
	
	$Partact = "Apvana Levana Search<br/>Search For : ".$apvalevana.", Company : ".$selectcompanyfetch['Cu_En_Name'];
	$insactivity = "insert into activity(Activity_Id,Date,Particular,Type,Action,Datefull,Id) values(NULL,'$dateact','$Partact','Apvana Levana - Search','search','$dateactfull','$Entry_Id')";
	mysql_query($insactivity); 
	 ?>
<table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                         <tr> 
                                            <th>Ugharani</th>
                                            </tr>
                                       </thead>
                                    <tbody>
  <tr class="odd gradeX"> 
     <td width="10%"><?php echo moneyFormatIndia($total_levana); ?></td>
    </tr>
      </tbody>
  </table>
<?php }}} ?>

