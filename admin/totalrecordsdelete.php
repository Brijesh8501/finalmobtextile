<?php error_reporting(0); 
include("databaseconnect.php");
if(isset($_REQUEST['delete']))
    {   
    $reportrangesplit = $_REQUEST['reportrange']; 
	$type = $_REQUEST['type']; 
	$splitdate = explode("-",$reportrangesplit);
$date = $splitdate[0];
$date1 = $splitdate[1];
$dt = date('Y-m-d', strtotime($date));
$dt1 = date('Y-m-d', strtotime($date1));

if($reportrangesplit=="")
{
	echo '<script>alert("Please give date range first");</script>';
}
elseif($type=="")
{
	echo "<center>Please select delete by</center>";
}
else
{
	if($type=='All'){
	$query1="delete from beam_d_c_1 where Beam_D_C_Date between '".$dt."' and '".$dt1."'";
    mysql_query($query1);
	 $query2= "delete from bobbin_d_c where Bo_D_C_Date between '".$dt."' and '".$dt1."'";
       mysql_query($query2);
	 $query3 = "delete from other_d_c where Other_D_C_Date between '".$dt."' and '".$dt1."'";
	 mysql_query($query3);
	 $query4 = "delete from salary_master where Date_Range = '$reportrangesplit'";
	  mysql_query($query4);
	 $query5 = "delete from salary_fixed_master where Date_Range = '$reportrangesplit'";
	  mysql_query($query5);
	 $query6 = "delete from petty_details where Date between '".$dt."' and '".$dt1."'";
	  mysql_query($query6);
	 
	  echo "<center>Records deleted from all challans, invoices, production entries, labour entries, transactions, petty entries, salary entries of date-range ".$reportrangesplit."</center>";
	}
	elseif($type=='Salarymeter')
	{
	 $query4 = "delete from salary_master where Date_Range = '$reportrangesplit'";
	  mysql_query($query4);	
	  echo "<center>Records deleted from salary-meter of date-range ".$reportrangesplit."</center>";
	}
}
	}
	
?>