<?php include("logcode.php"); 
error_reporting(0);
include("databaseconnect.php");
if(isset($_REQUEST['print']))
{
	 $reportrange = $_REQUEST['reportrange'];
	 $Trans_Type = $_REQUEST['Trans_Type'];
	 $Payment_Type = $_REQUEST['Payment_Type'];
	 $Status = $_REQUEST['Status']; 
	$splitdate = explode("-",$reportrange);
$date = $splitdate[0];
$date1 = $splitdate[1];
$dt= date('Y-m-d', strtotime($date));
$dt1= date('Y-m-d', strtotime($date1)); 
if($Payment_Type=='Cash' && $reportrange == $_REQUEST['reportrange'])
{
	if($reportrange == $_REQUEST['reportrange'] && $Payment_Type == 'Cash' && $Trans_Type=='Beam' && $Status=='Paid')
{
	$query1="SELECT transactions_beam1.Trans_Id, transactions_beam1.Trans_Invoice_No, transactions_beam1.Trans_Date, transactions_beam1.Trans_Amt, transactions_beam1.Payment_Type, transactions_beam1.Bank_Id, transactions_beam1.Chq_No, transactions_beam1.Chq_Date, transactions_beam1.`Description`, transactions_beam1.Status, transactions_beam1.Entry_Date,transactions_beam1.Entry_Id FROM transactions_beam1 WHERE transactions_beam1.Payment_Type = 'Cash' AND transactions_beam1.Status = 'Paid' AND transactions_beam1.Trans_Date between '".$dt."' and '".$dt1."' order by transactions_beam1.Trans_Id asc";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
	
}
else if($reportrange == $_REQUEST['reportrange'] && $Payment_Type == 'Cash' && $Trans_Type=='Bobbin' && $Status=='Paid')
{
	$query1="SELECT transactions_bobbin.Trans_Id, transactions_bobbin.Trans_Invoice_No, transactions_bobbin.Trans_Date,transactions_bobbin.Trans_Amt, transactions_bobbin.Payment_Type, transactions_bobbin.Bank_Id, transactions_bobbin.Chq_No, transactions_bobbin.Chq_Date, transactions_bobbin.`Description`, transactions_bobbin.Status, transactions_bobbin.Entry_Date,transactions_bobbin.Entry_Id FROM transactions_bobbin WHERE transactions_bobbin.Payment_Type = 'Cash' AND transactions_bobbin.Status = 'Paid' AND transactions_bobbin.Trans_Date between '".$dt."' and '".$dt1."' order by transactions_bobbin.Trans_Id asc";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);

}
else if($Payment_Type=='Cash' && $reportrange == $_REQUEST['reportrange'] && $Trans_Type=='Taka' && $Status=='Received')
{
     $query1="SELECT transactions_taka.Trans_Id, transactions_taka.Trans_Invoice_No, transactions_taka.Trans_Date, transactions_taka.Trans_Amt, transactions_taka.Payment_Type, transactions_taka.Bank_Id, transactions_taka.Chq_No, transactions_taka.Chq_Date, transactions_taka.`Description`, transactions_taka.Status, transactions_taka.Entry_Date,transactions_taka.Entry_Id FROM transactions_taka WHERE transactions_taka.Payment_Type = 'Cash' AND transactions_taka.Status = 'Received' AND transactions_taka.Trans_Date between '".$dt."' and '".$dt1."' order by transactions_taka.Trans_Id asc";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
	}
else if($Payment_Type=='Cash' && $reportrange == $_REQUEST['reportrange'] && $Trans_Type=='Saree' && $Status=='Received')
{
     $query1="SELECT transactions_saree.Trans_Id, transactions_saree.Trans_Invoice_No, transactions_saree.Trans_Date, transactions_saree.Trans_Amt, transactions_saree.Payment_Type, transactions_saree.Bank_Id, transactions_saree.Chq_No, transactions_saree.Chq_Date, transactions_saree.`Description`, transactions_saree.Status, transactions_saree.Entry_Date,transactions_saree.Entry_Id FROM transactions_saree WHERE transactions_saree.Payment_Type = 'Cash' AND transactions_saree.Status = 'Received' AND transactions_saree.Trans_Date between '".$dt."' and '".$dt1."' order by transactions_saree.Trans_Id asc";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
	}
elseif($reportrange == $_REQUEST['reportrange'] && $Payment_Type == 'Cash' && $Trans_Type=='Beam' && $Status=='Un-Paid')
{
	$query1="SELECT transactions_beam1.Trans_Id, transactions_beam1.Trans_Invoice_No, transactions_beam1.Trans_Date, transactions_beam1.Trans_Amt, transactions_beam1.Payment_Type, transactions_beam1.Bank_Id, transactions_beam1.Chq_No, transactions_beam1.Chq_Date, transactions_beam1.`Description`, transactions_beam1.Status, transactions_beam1.Entry_Date,transactions_beam1.Entry_Id FROM transactions_beam1 WHERE transactions_beam1.Payment_Type = 'Cash' AND transactions_beam1.Status = 'Un-Paid' AND transactions_beam1.Trans_Date between '".$dt."' and '".$dt1."' order by transactions_beam1.Trans_Id asc";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
}
else if($reportrange == $_REQUEST['reportrange'] && $Payment_Type == 'Cash' && $Trans_Type=='Bobbin' && $Status=='Un-Paid')
{
	$query1="SELECT transactions_bobbin.Trans_Id, transactions_bobbin.Trans_Invoice_No, transactions_bobbin.Trans_Date,transactions_bobbin.Trans_Amt, transactions_bobbin.Payment_Type, transactions_bobbin.Bank_Id, transactions_bobbin.Chq_No, transactions_bobbin.Chq_Date, transactions_bobbin.`Description`, transactions_bobbin.Status, transactions_bobbin.Entry_Date,transactions_bobbin.Entry_Id FROM transactions_bobbin WHERE transactions_bobbin.Payment_Type = 'Cash' AND transactions_bobbin.Status = 'Un-Paid' AND transactions_bobbin.Trans_Date between '".$dt."' and '".$dt1."' order by transactions_bobbin.Trans_Id asc";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
}
else if($Payment_Type=='Cash' && $reportrange == $_REQUEST['reportrange'] && $Trans_Type=='Taka' && $Status=='Not-Received')
{
     $query1="SELECT transactions_taka.Trans_Id, transactions_taka.Trans_Invoice_No, transactions_taka.Trans_Date, transactions_taka.Trans_Amt, transactions_taka.Payment_Type, transactions_taka.Bank_Id, transactions_taka.Chq_No, transactions_taka.Chq_Date, transactions_taka.`Description`, transactions_taka.Status, transactions_taka.Entry_Date,transactions_taka.Entry_Id FROM transactions_taka WHERE transactions_taka.Payment_Type = 'Cash' AND transactions_taka.Status = 'Not-Received' AND transactions_taka.Trans_Date between '".$dt."' and '".$dt1."' order by transactions_taka.Trans_Id asc";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
	
	}
else if($Payment_Type=='Cash' && $reportrange == $_REQUEST['reportrange'] && $Trans_Type=='Saree' && $Status=='Not-Received')
{
     $query1="SELECT transactions_saree.Trans_Id, transactions_saree.Trans_Invoice_No, transactions_saree.Trans_Date, transactions_saree.Trans_Amt, transactions_saree.Payment_Type, transactions_saree.Bank_Id, transactions_saree.Chq_No, transactions_saree.Chq_Date, transactions_saree.`Description`, transactions_saree.Status, transactions_saree.Entry_Date,transactions_saree.Entry_Id FROM transactions_saree WHERE transactions_saree.Payment_Type = 'Cash' AND transactions_saree.Status = 'Not-Received' AND transactions_saree.Trans_Date between '".$dt."' and '".$dt1."' order by transactions_saree.Trans_Id asc";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
	}
	elseif($reportrange == $_REQUEST['reportrange'] && $Payment_Type == 'Cash' && $Trans_Type=='Beam')
{
	$query1="SELECT transactions_beam1.Trans_Id, transactions_beam1.Trans_Invoice_No, transactions_beam1.Trans_Date, transactions_beam1.Trans_Amt, transactions_beam1.Payment_Type, transactions_beam1.Bank_Id, transactions_beam1.Chq_No, transactions_beam1.Chq_Date, transactions_beam1.`Description`, transactions_beam1.Status, transactions_beam1.Entry_Date,transactions_beam1.Entry_Id FROM transactions_beam1 WHERE transactions_beam1.Payment_Type = 'Cash' AND transactions_beam1.Trans_Date between '".$dt."' and '".$dt1."' order by transactions_beam1.Trans_Id asc";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
   
}
else if($reportrange == $_REQUEST['reportrange'] && $Payment_Type == 'Cash' && $Trans_Type=='Bobbin')
{
	$query1="SELECT transactions_bobbin.Trans_Id, transactions_bobbin.Trans_Invoice_No, transactions_bobbin.Trans_Date,transactions_bobbin.Trans_Amt, transactions_bobbin.Payment_Type, transactions_bobbin.Bank_Id, transactions_bobbin.Chq_No, transactions_bobbin.Chq_Date, transactions_bobbin.`Description`, transactions_bobbin.Status, transactions_bobbin.Entry_Date,transactions_bobbin.Entry_Id FROM transactions_bobbin WHERE transactions_bobbin.Payment_Type = 'Cash' AND transactions_bobbin.Trans_Date between '".$dt."' and '".$dt1."' order by transactions_bobbin.Trans_Id asc";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
}
else if($Payment_Type=='Cash' && $reportrange == $_REQUEST['reportrange'] && $Trans_Type=='Taka')
{
     $query1="SELECT transactions_taka.Trans_Id, transactions_taka.Trans_Invoice_No, transactions_taka.Trans_Date, transactions_taka.Trans_Amt, transactions_taka.Payment_Type, transactions_taka.Bank_Id, transactions_taka.Chq_No, transactions_taka.Chq_Date, transactions_taka.`Description`, transactions_taka.Status, transactions_taka.Entry_Date,transactions_taka.Entry_Id FROM transactions_taka WHERE transactions_taka.Payment_Type = 'Cash' AND transactions_taka.Trans_Date between '".$dt."' and '".$dt1."' order by transactions_taka.Trans_Id asc";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
	}
else if($Payment_Type=='Cash' && $reportrange == $_REQUEST['reportrange'] && $Trans_Type=='Saree')
{
     $query1="SELECT transactions_saree.Trans_Id, transactions_saree.Trans_Invoice_No, transactions_saree.Trans_Date, transactions_saree.Trans_Amt, transactions_saree.Payment_Type, transactions_saree.Bank_Id, transactions_saree.Chq_No, transactions_saree.Chq_Date, transactions_saree.`Description`, transactions_saree.Status, transactions_saree.Entry_Date,transactions_saree.Entry_Id FROM transactions_saree WHERE transactions_saree.Payment_Type = 'Cash' AND transactions_saree.Trans_Date between '".$dt."' and '".$dt1."' order by transactions_saree.Trans_Id asc";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
	}
}
else if($Payment_Type=='Cheque' && $reportrange == $_REQUEST['reportrange'])
{
	if($reportrange == $_REQUEST['reportrange'] && $Payment_Type == 'Cheque' && $Trans_Type=='Beam' && $Status=='Paid')
{
	$query1="SELECT transactions_beam1.Trans_Id, transactions_beam1.Trans_Invoice_No, transactions_beam1.Trans_Date, transactions_beam1.Trans_Amt, transactions_beam1.Payment_Type, transactions_beam1.Bank_Id, transactions_beam1.Chq_No, transactions_beam1.Chq_Date, transactions_beam1.`Description`, transactions_beam1.Status, transactions_beam1.Entry_Date,transactions_beam1.Entry_Id FROM transactions_beam1 WHERE transactions_beam1.Payment_Type = 'Cheque' AND transactions_beam1.Status = 'Paid' AND transactions_beam1.Trans_Date between '".$dt."' and '".$dt1."' order by transactions_beam1.Trans_Id asc";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
}
else if($reportrange == $_REQUEST['reportrange'] && $Payment_Type == 'Cheque' && $Trans_Type=='Bobbin' && $Status=='Paid')
{
	$query1="SELECT transactions_bobbin.Trans_Id, transactions_bobbin.Trans_Invoice_No, transactions_bobbin.Trans_Date,transactions_bobbin.Trans_Amt, transactions_bobbin.Payment_Type, transactions_bobbin.Bank_Id, transactions_bobbin.Chq_No, transactions_bobbin.Chq_Date, transactions_bobbin.`Description`, transactions_bobbin.Status, transactions_bobbin.Entry_Date,transactions_bobbin.Entry_Id FROM transactions_bobbin WHERE transactions_bobbin.Payment_Type = 'Cheque' AND transactions_bobbin.Status = 'Paid' AND transactions_bobbin.Trans_Date between '".$dt."' and '".$dt1."' order by transactions_bobbin.Trans_Id asc";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
}
else if($Payment_Type=='Cheque' && $reportrange == $_REQUEST['reportrange'] && $Trans_Type=='Taka' && $Status=='Received')
{
     $query1="SELECT transactions_taka.Trans_Id, transactions_taka.Trans_Invoice_No, transactions_taka.Trans_Date, transactions_taka.Trans_Amt, transactions_taka.Payment_Type, transactions_taka.Bank_Id, transactions_taka.Chq_No, transactions_taka.Chq_Date, transactions_taka.`Description`, transactions_taka.Status, transactions_taka.Entry_Date ,transactions_taka.Entry_Id FROM transactions_taka WHERE transactions_taka.Payment_Type = 'Cheque' AND transactions_taka.Status = 'Received' AND transactions_taka.Trans_Date between '".$dt."' and '".$dt1."' order by transactions_taka.Trans_Id asc";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
	}
else if($Payment_Type=='Cheque' && $reportrange == $_REQUEST['reportrange'] && $Trans_Type=='Saree' && $Status=='Received')
{
     $query1="SELECT transactions_saree.Trans_Id, transactions_saree.Trans_Invoice_No, transactions_saree.Trans_Date, transactions_saree.Trans_Amt, transactions_saree.Payment_Type, transactions_saree.Bank_Id, transactions_saree.Chq_No, transactions_saree.Chq_Date, transactions_saree.`Description`, transactions_saree.Status, transactions_saree.Entry_Date,transactions_saree.Entry_Id FROM transactions_saree WHERE transactions_saree.Payment_Type = 'Cheque' AND transactions_saree.Status = 'Received' AND transactions_saree.Trans_Date between '".$dt."' and '".$dt1."' order by transactions_saree.Trans_Id asc";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
	}
elseif($reportrange == $_REQUEST['reportrange'] && $Payment_Type == 'Cheque' && $Trans_Type=='Beam' && $Status=='Un-Paid')
{
	$query1="SELECT transactions_beam1.Trans_Id, transactions_beam1.Trans_Invoice_No, transactions_beam1.Trans_Date, transactions_beam1.Trans_Amt, transactions_beam1.Payment_Type, transactions_beam1.Bank_Id, transactions_beam1.Chq_No, transactions_beam1.Chq_Date, transactions_beam1.`Description`, transactions_beam1.Status, transactions_beam1.Entry_Date,transactions_beam1.Entry_Id FROM transactions_beam1 WHERE transactions_beam1.Payment_Type = 'Cheque' AND transactions_beam1.Status = 'Un-Paid' AND transactions_beam1.Trans_Date between '".$dt."' and '".$dt1."' order by transactions_beam1.Trans_Id asc";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
}
else if($reportrange == $_REQUEST['reportrange'] && $Payment_Type == 'Cheque' && $Trans_Type=='Bobbin' && $Status=='Un-Paid')
{
	$query1="SELECT transactions_bobbin.Trans_Id, transactions_bobbin.Trans_Invoice_No, transactions_bobbin.Trans_Date,transactions_bobbin.Trans_Amt, transactions_bobbin.Payment_Type, transactions_bobbin.Bank_Id, transactions_bobbin.Chq_No, transactions_bobbin.Chq_Date, transactions_bobbin.`Description`, transactions_bobbin.Status, transactions_bobbin.Entry_Date,transactions_bobbin.Entry_Id FROM transactions_bobbin WHERE transactions_bobbin.Payment_Type = 'Cheque' AND transactions_bobbin.Status = 'Un-Paid' AND transactions_bobbin.Trans_Date between '".$dt."' and '".$dt1."' order by transactions_bobbin.Trans_Id asc";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
else if($Payment_Type=='Cheque' && $reportrange == $_REQUEST['reportrange'] && $Trans_Type=='Taka' && $Status=='Not-Received')
{
     $query1="SELECT transactions_taka.Trans_Id, transactions_taka.Trans_Invoice_No, transactions_taka.Trans_Date, transactions_taka.Trans_Amt, transactions_taka.Payment_Type, transactions_taka.Bank_Id, transactions_taka.Chq_No, transactions_taka.Chq_Date, transactions_taka.`Description`, transactions_taka.Status, transactions_taka.Entry_Date ,transactions_taka.Entry_Id FROM transactions_taka WHERE transactions_taka.Payment_Type = 'Cheque' AND transactions_taka.Status = 'Not-Received' AND transactions_taka.Trans_Date between '".$dt."' and '".$dt1."' order by transactions_taka.Trans_Id asc";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
	}
else if($Payment_Type=='Cheque' && $reportrange == $_REQUEST['reportrange'] && $Trans_Type=='Saree' && $Status=='Not-Received')
{
     $query1="SELECT transactions_saree.Trans_Id, transactions_saree.Trans_Invoice_No, transactions_saree.Trans_Date, transactions_saree.Trans_Amt, transactions_saree.Payment_Type, transactions_saree.Bank_Id, transactions_saree.Chq_No, transactions_saree.Chq_Date, transactions_saree.`Description`, transactions_saree.Status, transactions_saree.Entry_Date,transactions_saree.Entry_Id FROM transactions_saree WHERE transactions_saree.Payment_Type = 'Cheque' AND transactions_saree.Status = 'Not-Received' AND transactions_saree.Trans_Date between '".$dt."' and '".$dt1."' order by transactions_saree.Trans_Id asc";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
	}
	elseif($reportrange == $_REQUEST['reportrange'] && $Payment_Type == 'Cheque' && $Trans_Type=='Beam')
{
	$query1="SELECT transactions_beam1.Trans_Id, transactions_beam1.Trans_Invoice_No, transactions_beam1.Trans_Date, transactions_beam1.Trans_Amt, transactions_beam1.Payment_Type, transactions_beam1.Bank_Id, transactions_beam1.Chq_No, transactions_beam1.Chq_Date, transactions_beam1.`Description`, transactions_beam1.Status, transactions_beam1.Entry_Date,transactions_beam1.Entry_Id FROM transactions_beam1 WHERE transactions_beam1.Payment_Type = 'Cheque' AND transactions_beam1.Trans_Date between '".$dt."' and '".$dt1."' order by transactions_beam1.Trans_Id asc";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////
else if($reportrange == $_REQUEST['reportrange'] && $Payment_Type == 'Cheque' && $Trans_Type=='Bobbin')
{
	$query1="SELECT transactions_bobbin.Trans_Id, transactions_bobbin.Trans_Invoice_No, transactions_bobbin.Trans_Date, transactions_bobbin.Trans_Amt, transactions_bobbin.Payment_Type, transactions_bobbin.Bank_Id, transactions_bobbin.Chq_No, transactions_bobbin.Chq_Date, transactions_bobbin.`Description`, transactions_bobbin.Status, transactions_bobbin.Entry_Date,transactions_bobbin.Entry_Id FROM transactions_bobbin WHERE transactions_bobbin.Payment_Type = 'Cheque' AND transactions_bobbin.Trans_Date between '".$dt."' and '".$dt1."' order by transactions_bobbin.Trans_Id asc";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
}
else if($Payment_Type=='Cheque' && $reportrange == $_REQUEST['reportrange'] && $Trans_Type=='Taka')
{
     $query1="SELECT transactions_taka.Trans_Id, transactions_taka.Trans_Invoice_No, transactions_taka.Trans_Date, transactions_taka.Trans_Amt, transactions_taka.Payment_Type, transactions_taka.Bank_Id, transactions_taka.Chq_No, transactions_taka.Chq_Date, transactions_taka.`Description`, transactions_taka.Status, transactions_taka.Entry_Date,transactions_taka.Entry_Id FROM transactions_taka WHERE transactions_taka.Payment_Type = 'Cheque' AND transactions_taka.Trans_Date between '".$dt."' and '".$dt1."' order by transactions_taka.Trans_Id asc";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
	}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
else if($Payment_Type=='Cheque' && $reportrange == $_REQUEST['reportrange'] && $Trans_Type=='Saree')
{
     $query1="SELECT transactions_saree.Trans_Id, transactions_saree.Trans_Invoice_No, transactions_saree.Trans_Date, transactions_saree.Trans_Amt, transactions_saree.Payment_Type, transactions_saree.Bank_Id, transactions_saree.Chq_No, transactions_saree.Chq_Date, transactions_saree.`Description`, transactions_saree.Status, transactions_saree.Entry_Date,transactions_saree.Entry_Id FROM transactions_saree WHERE transactions_saree.Payment_Type = 'Cheque' AND transactions_saree.Trans_Date between '".$dt."' and '".$dt1."' order by transactions_saree.Trans_Id asc";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
	
	}
///////////////////////////////////////////////////////////////////////////////////////////////////////////
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
elseif($reportrange == $_REQUEST['reportrange'] && $Trans_Type=='Beam' && $Status=='Paid')
{
	$query1="SELECT transactions_beam1.Trans_Id, transactions_beam1.Trans_Invoice_No, transactions_beam1.Trans_Date, transactions_beam1.Trans_Amt, transactions_beam1.Payment_Type, transactions_beam1.Bank_Id, transactions_beam1.Chq_No, transactions_beam1.Chq_Date, transactions_beam1.`Description`, transactions_beam1.Status, transactions_beam1.Entry_Date,transactions_beam1.Entry_Id FROM transactions_beam1 WHERE transactions_beam1.Status = 'Paid' AND transactions_beam1.Trans_Date between '".$dt."' and '".$dt1."' order by transactions_beam1.Trans_Id asc";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////
else if($reportrange == $_REQUEST['reportrange'] && $Trans_Type=='Bobbin' && $Status=='Paid')
{
	$query1="SELECT transactions_bobbin.Trans_Id, transactions_bobbin.Trans_Invoice_No, transactions_bobbin.Trans_Date,transactions_bobbin.Trans_Amt, transactions_bobbin.Payment_Type, transactions_bobbin.Bank_Id, transactions_bobbin.Chq_No, transactions_bobbin.Chq_Date, transactions_bobbin.`Description`, transactions_bobbin.Status, transactions_bobbin.Entry_Date,transactions_bobbin.Entry_Id FROM transactions_bobbin WHERE transactions_bobbin.Status = 'Paid' AND transactions_bobbin.Trans_Date between '".$dt."' and '".$dt1."' order by transactions_bobbin.Trans_Id asc";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
	    
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
else if($reportrange == $_REQUEST['reportrange'] && $Trans_Type=='Taka' && $Status=='Received')
{
     $query1="SELECT transactions_taka.Trans_Id, transactions_taka.Trans_Invoice_No, transactions_taka.Trans_Date, transactions_taka.Trans_Amt, transactions_taka.Payment_Type, transactions_taka.Bank_Id, transactions_taka.Chq_No, transactions_taka.Chq_Date, transactions_taka.`Description`, transactions_taka.Status, transactions_taka.Entry_Date,transactions_taka.Entry_Id FROM transactions_taka WHERE transactions_taka.Status = 'Received' AND transactions_taka.Trans_Date between '".$dt."' and '".$dt1."' order by transactions_taka.Trans_Id asc";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
	}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
else if($reportrange == $_REQUEST['reportrange'] && $Trans_Type=='Saree' && $Status=='Received')
{
     $query1="SELECT transactions_saree.Trans_Id, transactions_saree.Trans_Invoice_No, transactions_saree.Trans_Date, transactions_saree.Trans_Amt, transactions_saree.Payment_Type, transactions_saree.Bank_Id, transactions_saree.Chq_No, transactions_saree.Chq_Date, transactions_saree.`Description`, transactions_saree.Status, transactions_saree.Entry_Date,transactions_saree.Entry_Id FROM transactions_saree WHERE transactions_saree.Status = 'Received' AND transactions_saree.Trans_Date between '".$dt."' and '".$dt1."' order by transactions_saree.Trans_Id asc";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
	}
///////////////////////////////////////////////////////////////////////////////////////////////////////////
elseif($reportrange == $_REQUEST['reportrange'] && $Trans_Type=='Beam' && $Status=='Un-Paid')
{
	$query1="SELECT transactions_beam1.Trans_Id, transactions_beam1.Trans_Invoice_No, transactions_beam1.Trans_Date, transactions_beam1.Trans_Amt, transactions_beam1.Payment_Type, transactions_beam1.Bank_Id, transactions_beam1.Chq_No, transactions_beam1.Chq_Date, transactions_beam1.`Description`, transactions_beam1.Status, transactions_beam1.Entry_Date,transactions_beam1.Entry_Id FROM transactions_beam1 WHERE transactions_beam1.Status = 'Un-Paid' AND transactions_beam1.Trans_Date between '".$dt."' and '".$dt1."' order by transactions_beam1.Trans_Id asc";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////
else if($reportrange == $_REQUEST['reportrange'] && $Trans_Type=='Bobbin' && $Status=='Un-Paid')
{
	$query1="SELECT transactions_bobbin.Trans_Id, transactions_bobbin.Trans_Invoice_No, transactions_bobbin.Trans_Date,transactions_bobbin.Trans_Amt, transactions_bobbin.Payment_Type, transactions_bobbin.Bank_Id, transactions_bobbin.Chq_No, transactions_bobbin.Chq_Date, transactions_bobbin.`Description`, transactions_bobbin.Status, transactions_bobbin.Entry_Date,transactions_bobbin.Entry_Id FROM transactions_bobbin WHERE transactions_bobbin.Status = 'Un-Paid' AND transactions_bobbin.Trans_Date between '".$dt."' and '".$dt1."' order by transactions_bobbin.Trans_Id asc";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
	
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
else if($reportrange == $_REQUEST['reportrange'] && $Trans_Type=='Taka' && $Status=='Not-Received')
{
     $query1="SELECT transactions_taka.Trans_Id, transactions_taka.Trans_Invoice_No, transactions_taka.Trans_Date, transactions_taka.Trans_Amt, transactions_taka.Payment_Type, transactions_taka.Bank_Id, transactions_taka.Chq_No, transactions_taka.Chq_Date, transactions_taka.`Description`, transactions_taka.Status, transactions_taka.Entry_Date ,transactions_taka.Entry_Id FROM transactions_taka WHERE transactions_taka.Status = 'Not-Received' AND transactions_taka.Trans_Date between '".$dt."' and '".$dt1."' order by transactions_taka.Trans_Id asc";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
	}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
else if($reportrange == $_REQUEST['reportrange'] && $Trans_Type=='Saree' && $Status=='Not-Received')
{
     $query1="SELECT transactions_saree.Trans_Id, transactions_saree.Trans_Invoice_No, transactions_saree.Trans_Date, transactions_saree.Trans_Amt, transactions_saree.Payment_Type, transactions_saree.Bank_Id, transactions_saree.Chq_No, transactions_saree.Chq_Date, transactions_saree.`Description`, transactions_saree.Status, transactions_saree.Entry_Date,transactions_saree.Entry_Id FROM transactions_saree WHERE transactions_saree.Status = 'Not-Received' AND transactions_saree.Trans_Date between '".$dt."' and '".$dt1."' order by transactions_saree.Trans_Id asc";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
	}
else if($reportrange == $_REQUEST['reportrange'] && $Trans_Type=='Beam')
{
	
	$query1="SELECT transactions_beam1.Trans_Id, transactions_beam1.Trans_Invoice_No, transactions_beam1.Trans_Date, transactions_beam1.Trans_Amt, transactions_beam1.Payment_Type, transactions_beam1.Bank_Id, transactions_beam1.Chq_No, transactions_beam1.Chq_Date, transactions_beam1.`Description`, transactions_beam1.Status, transactions_beam1.Entry_Date,transactions_beam1.Entry_Id FROM transactions_beam1 WHERE transactions_beam1.Trans_Date between '".$dt."' and '".$dt1."' order by transactions_beam1.Trans_Id asc";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
}
else if($reportrange == $_REQUEST['reportrange'] && $Trans_Type=='Bobbin')
{
	
	$query1="SELECT transactions_bobbin.Trans_Id, transactions_bobbin.Trans_Invoice_No, transactions_bobbin.Trans_Date, transactions_bobbin.Trans_Amt, transactions_bobbin.Payment_Type, transactions_bobbin.Bank_Id, transactions_bobbin.Chq_No, transactions_bobbin.Chq_Date, transactions_bobbin.`Description`, transactions_bobbin.Status, transactions_bobbin.Entry_Date,transactions_bobbin.Entry_Id FROM transactions_bobbin WHERE transactions_bobbin.Trans_Date between '".$dt."' and '".$dt1."' order by transactions_bobbin.Trans_Id asc";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
}
else if($reportrange == $_REQUEST['reportrange'] && $Trans_Type=='Taka')
{
	
	$query1="SELECT transactions_taka.Trans_Id, transactions_taka.Trans_Invoice_No, transactions_taka.Trans_Date, transactions_taka.Trans_Amt, transactions_taka.Payment_Type, transactions_taka.Bank_Id, transactions_taka.Chq_No, transactions_taka.Chq_Date, transactions_taka.`Description`, transactions_taka.Status, transactions_taka.Entry_Date ,transactions_taka.Entry_Id FROM transactions_taka WHERE transactions_taka.Trans_Date between '".$dt."' and '".$dt1."' order by transactions_taka.Trans_Id asc";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
}
else if($reportrange == $_REQUEST['reportrange'] && $Trans_Type=='Saree')
{
	
	$query1="SELECT transactions_saree.Trans_Id, transactions_saree.Trans_Invoice_No, transactions_saree.Trans_Date, transactions_saree.Trans_Amt, transactions_saree.Payment_Type, transactions_saree.Bank_Id, transactions_saree.Chq_No, transactions_saree.Chq_Date, transactions_saree.`Description`, transactions_saree.Status, transactions_saree.Entry_Date,transactions_saree.Entry_Id FROM transactions_saree WHERE transactions_saree.Trans_Date between '".$dt."' and '".$dt1."' order by transactions_saree.Trans_Id asc";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
}
}
////////////////////////////////// number format in point ///////////////////////////////////////////////////////
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
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>TRANSACTION[[M] [<?php echo $Trans_Type;?>]] <?php echo $date.' - '.$date1;?></title>
 <link rel="shortcut icon" href="Icons/st85.png">
<style type="text/css">
table{
	border-collapse:collapse;
}
</style>
</head>
<body onload="window.print()">
<table width="990" border="0" align="center" cellpadding="5" cellspacing="5" >
  <tr  style="font-size:24px"><?php date_default_timezone_set("Asia/Calcutta"); ?>
    <td width="25">&nbsp;</td>
    <td> <div id="print-header-wrapper">
                    <div class="row-fluid">&nbsp;&nbsp;&nbsp;METER-TRANSACTION&nbsp;[<?php echo $Trans_Type;?>]&nbsp;<b>Report</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i><?php echo $date.' - '.$date1;?></i></div>
                    <div class="row-fluid" align="center"><strong>!! Shree Ganeshayah Namaha !!</strong><br/>
    <strong>SHINGORI TEXTILE</strong></div>
                    <div class="row-fluid" align="right"><?php echo date('Y/m/d h:i:s A'); ?>&nbsp;&nbsp;</div>
                   </div></td>
  </tr>
  <tr>
        <td colspan="7" valign="top"><table width="100%" border="1" cellspacing="2" cellpadding="2" id="table">
 <?php
        if($Payment_Type=='Cash' && $reportrange == $_REQUEST['reportrange'])
{
	if($reportrange == $_REQUEST['reportrange'] && $Payment_Type == 'Cash' && $Trans_Type=='Beam' && $Status=='Paid')
{
?>
          <tr>
      
                                             <th width="6%"><center>Sr No.</center></th>
                                             <th width="8%"><center>Trans. ID</center></th>
                                            <th width="8%"><center>Inv. No</center></th>
                                            <th width="11%"><center>Inv. Date</center></th>
                                            <th width="7%"><center>Inv. Amount</center></th>
                                            <th width="7%"><center>Payment Type</center></th>
                                            <th width="15%"><center>Bank</center></th>
                                            <th width="7%"><center>Cheque No.</center></th>
                                            <th width="10%"><center>Cheque Date</center></th>
                                            <th width="5%"><center>Status</center></th>
                                            <th width="35%"><center>Entry Date</center></th>
                                            <th width="10%"><center>Entry #ID</center></th>
      </tr> 
       
    <?php $i=0;
	  $i++;?>
    <?php
									do { ?>                                    
                                      
  <tr align="center"> 
    
    <td><?php echo $i++; ?></td>
    <td><?php echo $rowMain['Trans_Id']; ?></td>
   <td><?php echo $rowMain['Trans_Invoice_No']; ?></td>
    <td><?php echo $rowMain['Trans_Date']; ?></td>
    <td><?php echo moneyFormatIndia($rowMain['Trans_Amt']); ?></td>
    <td><?php echo $rowMain['Payment_Type']; ?></td>
    <td><?php echo $rowMain['Bank_Id']; ?></td>
    <td><?php echo $rowMain['Chq_No']; ?></td>
    <td><?php echo $rowMain['Chq_Date']; ?></td>
    <td><?php echo $rowMain['Status']; ?></td>
    <td><?php echo $rowMain['Entry_Date']; ?></td>
    <td><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
    <?php 
  $Tran_Amt = $Tran_Amt + $rowMain['Trans_Amt'];
  } while ($rowMain = mysql_fetch_assoc($rsMain)); ?>
  <tr>
  <th colspan="12">
  <span style="float:right">Total Amount&nbsp;:&nbsp;<?php echo moneyFormatIndia($Tran_Amt);?></span>
  </th>
  </tr>
  <?php
	}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////
else if($reportrange == $_REQUEST['reportrange'] && $Payment_Type == 'Cash' && $Trans_Type=='Bobbin' && $Status=='Paid')
{
	?>
	<tr>
      
                                             <th width="6%"><center>Sr No.</center></th>
                                             <th width="8%"><center>Trans. ID</center></th>
                                            <th width="8%"><center>Inv. ID</center></th>
                                            <th width="11%"><center>Inv. Date</center></th>
                                            <th width="7%"><center>Inv. Amount</center></th>
                                            <th width="7%"><center>Payment Type</center></th>
                                            <th width="15%"><center>Bank</center></th>
                                            <th width="7%"><center>Cheque No.</center></th>
                                            <th width="10%"><center>Cheque Date</center></th>
                                            <th width="5%"><center>Status</center></th>
                                            <th width="35%"><center>Entry Date</center></th>
                                            <th width="10%"><center>Entry #ID</center></th>
      </tr> 
       
    <?php $i=0;
	  $i++;?>
    <?php
									do { ?>                                    
                                      
  <tr align="center"> 
     <td><?php echo $i++; ?></td>
    <td><?php echo $rowMain['Trans_Id']; ?></td>
    <td><?php echo $rowMain['Trans_Invoice_No']; ?></td>
    <td><?php echo $rowMain['Trans_Date']; ?></td>
    <td><?php echo moneyFormatIndia($rowMain['Trans_Amt']); ?></td>
    <td><?php echo $rowMain['Payment_Type']; ?></td>
    <td><?php echo $rowMain['Bank_Id']; ?></td>
    <td><?php echo $rowMain['Chq_No']; ?></td>
    <td><?php echo $rowMain['Chq_Date']; ?></td>
    <td><?php echo $rowMain['Status']; ?></td>
    <td><?php echo $rowMain['Entry_Date']; ?></td>
    <td><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
    <?php 
  $Tran_Amt = $Tran_Amt + $rowMain['Trans_Amt'];
  } while ($rowMain = mysql_fetch_assoc($rsMain)); ?>
  <tr>
  <th colspan="12">
  <span style="float:right">Total Amount&nbsp;:&nbsp;<?php echo moneyFormatIndia($Tran_Amt);?></span>
  </th>
  </tr>
  <?php
	}
else if($Payment_Type=='Cash' && $reportrange == $_REQUEST['reportrange'] && $Trans_Type=='Taka' && $Status=='Received')
{
	?>
    <tr>
      
                                             <th width="6%"><center>Sr No.</center></th>
                                             <th width="8%"><center>Trans. ID</center></th>
                                            <th width="8%"><center>Inv. ID</center></th>
                                            <th width="11%"><center>Inv. Date</center></th>
                                            <th width="7%"><center>Inv. Amount</center></th>
                                            <th width="7%"><center>Payment Type</center></th>
                                            <th width="15%"><center>Bank</center></th>
                                            <th width="7%"><center>Cheque No.</center></th>
                                            <th width="10%"><center>Cheque Date</center></th>
                                            <th width="5%"><center>Status</center></th>
                                            <th width="35%"><center>Entry Date</center></th>
                                            <th width="10%"><center>Entry #ID</center></th>
      </tr> 
       
    <?php $i=0;
	  $i++;?>
    <?php
									do { ?>                                    
                                      
  <tr align="center"> 
    
    <td><?php echo $i++; ?></td>
    <td><?php echo $rowMain['Trans_Id']; ?></td>
   <td><?php echo $rowMain['Trans_Invoice_No']; ?></td>
    <td><?php echo $rowMain['Trans_Date']; ?></td>
    <td><?php echo moneyFormatIndia($rowMain['Trans_Amt']); ?></td>
    <td><?php echo $rowMain['Payment_Type']; ?></td>
    <td><?php echo $rowMain['Bank_Id']; ?></td>
    <td><?php echo $rowMain['Chq_No']; ?></td>
    <td><?php echo $rowMain['Chq_Date']; ?></td>
    <td><?php echo $rowMain['Status']; ?></td>
    <td><?php echo $rowMain['Entry_Date']; ?></td>
    <td><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
    <?php 
  $Tran_Amt = $Tran_Amt + $rowMain['Trans_Amt'];
  } while ($rowMain = mysql_fetch_assoc($rsMain)); ?>
  <tr>
  <th colspan="12">
  <span style="float:right">Total Amount&nbsp;:&nbsp;<?php echo moneyFormatIndia($Tran_Amt);?></span>
  </th>
  </tr>
  <?php
	}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
else if($Payment_Type=='Cash' && $reportrange == $_REQUEST['reportrange'] && $Trans_Type=='Saree' && $Status=='Received')
{
	?>
    <tr>
      
                                              <th width="6%"><center>Sr No.</center></th>
                                             <th width="8%"><center>Trans. ID</center></th>
                                            <th width="8%"><center>Inv. ID</center></th>
                                            <th width="11%"><center>Inv. Date</center></th>
                                            <th width="7%"><center>Inv. Amount</center></th>
                                            <th width="7%"><center>Payment Type</center></th>
                                            <th width="15%"><center>Bank</center></th>
                                            <th width="7%"><center>Cheque No.</center></th>
                                            <th width="10%"><center>Cheque Date</center></th>
                                            <th width="5%"><center>Status</center></th>
                                            <th width="35%"><center>Entry Date</center></th>
                                            <th width="10%"><center>Entry #ID</center></th>
      </tr> 
       
    <?php $i=0;
	  $i++;?>
    <?php
									do { ?>                                    
                                      
  <tr align="center"> 
    
    <td><?php echo $i++; ?></td>
    <td><?php echo $rowMain['Trans_Id']; ?></td>
   <td><?php echo $rowMain['Trans_Invoice_No']; ?></td>
    <td><?php echo $rowMain['Trans_Date']; ?></td>
    <td><?php echo moneyFormatIndia($rowMain['Trans_Amt']); ?></td>
    <td><?php echo $rowMain['Payment_Type']; ?></td>
    <td><?php echo $rowMain['Bank_Id']; ?></td>
    <td><?php echo $rowMain['Chq_No']; ?></td>
    <td><?php echo $rowMain['Chq_Date']; ?></td>
    <td><?php echo $rowMain['Status']; ?></td>
    <td><?php echo $rowMain['Entry_Date']; ?></td>
    <td><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
    <?php 
  $Tran_Amt = $Tran_Amt + $rowMain['Trans_Amt'];
  } while ($rowMain = mysql_fetch_assoc($rsMain)); ?>
  <tr>
  <th colspan="12">
  <span style="float:right">Total Amount&nbsp;:&nbsp;<?php echo moneyFormatIndia($Tran_Amt);?></span>
  </th>
  </tr>
  <?php
	}
elseif($reportrange == $_REQUEST['reportrange'] && $Payment_Type == 'Cash' && $Trans_Type=='Beam' && $Status=='Un-Paid')
{
?>
          <tr>
      
                                              <th width="6%"><center>Sr No.</center></th>
                                             <th width="8%"><center>Trans. ID</center></th>
                                            <th width="8%"><center>Inv. ID</center></th>
                                            <th width="11%"><center>Inv. Date</center></th>
                                            <th width="7%"><center>Inv. Amount</center></th>
                                            <th width="7%"><center>Payment Type</center></th>
                                            <th width="15%"><center>Bank</center></th>
                                            <th width="7%"><center>Cheque No.</center></th>
                                            <th width="10%"><center>Cheque Date</center></th>
                                            <th width="5%"><center>Status</center></th>
                                            <th width="35%"><center>Entry Date</center></th>
                                            <th width="10%"><center>Entry #ID</center></th>
      </tr> 
       
    <?php $i=0;
	  $i++;?>
    <?php
									do { ?>                                    
                                      
  <tr align="center"> 
    
    <td><?php echo $i++; ?></td>
    <td><?php echo $rowMain['Trans_Id']; ?></td>
   <td><?php echo $rowMain['Trans_Invoice_No']; ?></td>
    <td><?php echo $rowMain['Trans_Date']; ?></td>
    <td><?php echo moneyFormatIndia($rowMain['Trans_Amt']); ?></td>
    <td><?php echo $rowMain['Payment_Type']; ?></td>
    <td><?php echo $rowMain['Bank_Id']; ?></td>
    <td><?php echo $rowMain['Chq_No']; ?></td>
    <td><?php echo $rowMain['Chq_Date']; ?></td>
    <td><?php echo $rowMain['Status']; ?></td>
    <td><?php echo $rowMain['Entry_Date']; ?></td>
    <td><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
    <?php 
  $Tran_Amt = $Tran_Amt + $rowMain['Trans_Amt'];
  } while ($rowMain = mysql_fetch_assoc($rsMain)); ?>
  <tr>
  <th colspan="12">
  <span style="float:right">Total Amount&nbsp;:&nbsp;<?php echo moneyFormatIndia($Tran_Amt);?></span>
  </th>
  </tr>
  <?php
	}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////
else if($reportrange == $_REQUEST['reportrange'] && $Payment_Type == 'Cash' && $Trans_Type=='Bobbin' && $Status=='Un-Paid')
{
	?>
	<tr>
      
                                             <th width="6%"><center>Sr No.</center></th>
                                             <th width="8%"><center>Trans. ID</center></th>
                                            <th width="8%"><center>Inv. ID</center></th>
                                            <th width="11%"><center>Inv. Date</center></th>
                                            <th width="7%"><center>Inv. Amount</center></th>
                                            <th width="7%"><center>Payment Type</center></th>
                                            <th width="15%"><center>Bank</center></th>
                                            <th width="7%"><center>Cheque No.</center></th>
                                            <th width="10%"><center>Cheque Date</center></th>
                                            <th width="5%"><center>Status</center></th>
                                            <th width="35%"><center>Entry Date</center></th>
                                            <th width="10%"><center>Entry #ID</center></th>
      </tr> 
       
    <?php $i=0;
	  $i++;?>
    <?php
									do { ?>                                    
                                      
  <tr align="center"> 
    
    <td><?php echo $i++; ?></td>
    <td><?php echo $rowMain['Trans_Id']; ?></td>
    <td><?php echo $rowMain['Trans_Invoice_No']; ?></td>
    <td><?php echo $rowMain['Trans_Date']; ?></td>
    <td><?php echo moneyFormatIndia($rowMain['Trans_Amt']); ?></td>
    <td><?php echo $rowMain['Payment_Type']; ?></td>
    <td><?php echo $rowMain['Bank_Id']; ?></td>
    <td><?php echo $rowMain['Chq_No']; ?></td>
    <td><?php echo $rowMain['Chq_Date']; ?></td>
    <td><?php echo $rowMain['Status']; ?></td>
    <td><?php echo $rowMain['Entry_Date']; ?></td>
    <td><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
    <?php 
  $Tran_Amt = $Tran_Amt + $rowMain['Trans_Amt'];
  } while ($rowMain = mysql_fetch_assoc($rsMain)); ?>
  <tr>
  <th colspan="12">
  <span style="float:right">Total Amount&nbsp;:&nbsp;<?php echo moneyFormatIndia($Tran_Amt);?></span>
  </th>
  </tr>
  <?php
	}
else if($Payment_Type=='Cash' && $reportrange == $_REQUEST['reportrange'] && $Trans_Type=='Taka' && $Status=='Not-Received')
{
	?>
    <tr>
      
                                             <th width="6%"><center>Sr No.</center></th>
                                             <th width="8%"><center>Trans. ID</center></th>
                                            <th width="8%"><center>Inv. ID</center></th>
                                            <th width="11%"><center>Inv. Date</center></th>
                                            <th width="7%"><center>Inv. Amount</center></th>
                                            <th width="7%"><center>Payment Type</center></th>
                                            <th width="15%"><center>Bank</center></th>
                                            <th width="7%"><center>Cheque No.</center></th>
                                            <th width="10%"><center>Cheque Date</center></th>
                                            <th width="5%"><center>Status</center></th>
                                            <th width="35%"><center>Entry Date</center></th>
                                            <th width="10%"><center>Entry #ID</center></th>
      </tr> 
       
    <?php $i=0;
	  $i++;?>
    <?php
									do { ?>                                    
                                      
  <tr align="center"> 
    
    <td><?php echo $i++; ?></td>
    <td><?php echo $rowMain['Trans_Id']; ?></td>
   <td><?php echo $rowMain['Trans_Invoice_No']; ?></td>
    <td><?php echo $rowMain['Trans_Date']; ?></td>
    <td><?php echo moneyFormatIndia($rowMain['Trans_Amt']); ?></td>
    <td><?php echo $rowMain['Payment_Type']; ?></td>
    <td><?php echo $rowMain['Bank_Id']; ?></td>
    <td><?php echo $rowMain['Chq_No']; ?></td>
    <td><?php echo $rowMain['Chq_Date']; ?></td>
    <td><?php echo $rowMain['Status']; ?></td>
    <td><?php echo $rowMain['Entry_Date']; ?></td>
    <td><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
    <?php 
  $Tran_Amt = $Tran_Amt + $rowMain['Trans_Amt'];
  } while ($rowMain = mysql_fetch_assoc($rsMain)); ?>
  <tr>
  <th colspan="12">
  <span style="float:right">Total Amount&nbsp;:&nbsp;<?php echo moneyFormatIndia($Tran_Amt);?></span>
  </th>
  </tr>
  <?php
	}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
else if($Payment_Type=='Cash' && $reportrange == $_REQUEST['reportrange'] && $Trans_Type=='Saree' && $Status=='Not-Received')
{
	?>
    <tr>
      
                                              <th width="6%"><center>Sr No.</center></th>
                                             <th width="8%"><center>Trans. ID</center></th>
                                            <th width="8%"><center>Inv. ID</center></th>
                                            <th width="11%"><center>Inv. Date</center></th>
                                            <th width="7%"><center>Inv. Amount</center></th>
                                            <th width="7%"><center>Payment Type</center></th>
                                            <th width="15%"><center>Bank</center></th>
                                            <th width="7%"><center>Cheque No.</center></th>
                                            <th width="10%"><center>Cheque Date</center></th>
                                            <th width="5%"><center>Status</center></th>
                                            <th width="35%"><center>Entry Date</center></th>
                                            <th width="10%"><center>Entry #ID</center></th>
      </tr> 
       
    <?php $i=0;
	  $i++;?>
    <?php
									do { ?>                                    
                                      
  <tr align="center"> 
    
    <td><?php echo $i++; ?></td>
    <td><?php echo $rowMain['Trans_Id']; ?></td>
   <td><?php echo $rowMain['Trans_Invoice_No']; ?></td>
    <td><?php echo $rowMain['Trans_Date']; ?></td>
    <td><?php echo moneyFormatIndia($rowMain['Trans_Amt']); ?></td>
    <td><?php echo $rowMain['Payment_Type']; ?></td>
    <td><?php echo $rowMain['Bank_Id']; ?></td>
    <td><?php echo $rowMain['Chq_No']; ?></td>
    <td><?php echo $rowMain['Chq_Date']; ?></td>
    <td><?php echo $rowMain['Status']; ?></td>
    <td><?php echo $rowMain['Entry_Date']; ?></td>
    <td><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
    <?php 
  $Tran_Amt = $Tran_Amt + $rowMain['Trans_Amt'];
  } while ($rowMain = mysql_fetch_assoc($rsMain)); ?>
  <tr>
  <th colspan="12">
  <span style="float:right">Total Amount&nbsp;:&nbsp;<?php echo moneyFormatIndia($Tran_Amt);?></span>
  </th>
  </tr>
  <?php
	}
	elseif($reportrange == $_REQUEST['reportrange'] && $Payment_Type == 'Cash' && $Trans_Type=='Beam')
{
?>
          <tr>
      
                                              <th width="6%"><center>Sr No.</center></th>
                                             <th width="8%"><center>Trans. ID</center></th>
                                            <th width="8%"><center>Inv. ID</center></th>
                                            <th width="11%"><center>Inv. Date</center></th>
                                            <th width="7%"><center>Inv. Amount</center></th>
                                            <th width="7%"><center>Payment Type</center></th>
                                            <th width="15%"><center>Bank</center></th>
                                            <th width="7%"><center>Cheque No.</center></th>
                                            <th width="10%"><center>Cheque Date</center></th>
                                            <th width="5%"><center>Status</center></th>
                                            <th width="35%"><center>Entry Date</center></th>
                                            <th width="10%"><center>Entry #ID</center></th>
      </tr> 
       
    <?php $i=0;
	  $i++;?>
    <?php
									do { ?>                                    
                                      
  <tr align="center"> 
    
    <td><?php echo $i++; ?></td>
    <td><?php echo $rowMain['Trans_Id']; ?></td>
   <td><?php echo $rowMain['Trans_Invoice_No']; ?></td>
    <td><?php echo $rowMain['Trans_Date']; ?></td>
    <td><?php echo moneyFormatIndia($rowMain['Trans_Amt']); ?></td>
    <td><?php echo $rowMain['Payment_Type']; ?></td>
    <td><?php echo $rowMain['Bank_Id']; ?></td>
    <td><?php echo $rowMain['Chq_No']; ?></td>
    <td><?php echo $rowMain['Chq_Date']; ?></td>
    <td><?php echo $rowMain['Status']; ?></td>
    <td><?php echo $rowMain['Entry_Date']; ?></td>
    <td><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
    <?php 
  $Tran_Amt = $Tran_Amt + $rowMain['Trans_Amt'];
  } while ($rowMain = mysql_fetch_assoc($rsMain)); ?>
  <tr>
  <th colspan="12">
  <span style="float:right">Total Amount&nbsp;:&nbsp;<?php echo moneyFormatIndia($Tran_Amt);?></span>
  </th>
  </tr>
  <?php
	}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////
else if($reportrange == $_REQUEST['reportrange'] && $Payment_Type == 'Cash' && $Trans_Type=='Bobbin')
{
	?>
	<tr>
      
                                              <th width="6%"><center>Sr No.</center></th>
                                             <th width="8%"><center>Trans. ID</center></th>
                                            <th width="8%"><center>Inv. ID</center></th>
                                            <th width="11%"><center>Inv. Date</center></th>
                                            <th width="7%"><center>Inv. Amount</center></th>
                                            <th width="7%"><center>Payment Type</center></th>
                                            <th width="15%"><center>Bank</center></th>
                                            <th width="7%"><center>Cheque No.</center></th>
                                            <th width="10%"><center>Cheque Date</center></th>
                                            <th width="5%"><center>Status</center></th>
                                            <th width="35%"><center>Entry Date</center></th>
                                            <th width="10%"><center>Entry #ID</center></th>
      </tr> 
       
    <?php $i=0;
	  $i++;?>
    <?php
									do { ?>                                    
                                      
  <tr align="center"> 
    
    <td><?php echo $i++; ?></td>
    <td><?php echo $rowMain['Trans_Id']; ?></td>
    <td><?php echo $rowMain['Trans_Invoice_No']; ?></td>
    <td><?php echo $rowMain['Trans_Date']; ?></td>
    <td><?php echo moneyFormatIndia($rowMain['Trans_Amt']); ?></td>
    <td><?php echo $rowMain['Payment_Type']; ?></td>
    <td><?php echo $rowMain['Bank_Id']; ?></td>
    <td><?php echo $rowMain['Chq_No']; ?></td>
    <td><?php echo $rowMain['Chq_Date']; ?></td>
    <td><?php echo $rowMain['Status']; ?></td>
    <td><?php echo $rowMain['Entry_Date']; ?></td>
    <td><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
    <?php 
  $Tran_Amt = $Tran_Amt + $rowMain['Trans_Amt'];
  } while ($rowMain = mysql_fetch_assoc($rsMain)); ?>
  <tr>
  <th colspan="12">
  <span style="float:right">Total Amount&nbsp;:&nbsp;<?php echo moneyFormatIndia($Tran_Amt);?></span>
  </th>
  </tr>
  <?php
	}
else if($Payment_Type=='Cash' && $reportrange == $_REQUEST['reportrange'] && $Trans_Type=='Taka')
{
	?>
    <tr>
      
                                             <th width="6%"><center>Sr No.</center></th>
                                             <th width="8%"><center>Trans. ID</center></th>
                                            <th width="8%"><center>Inv. ID</center></th>
                                            <th width="11%"><center>Inv. Date</center></th>
                                            <th width="7%"><center>Inv. Amount</center></th>
                                            <th width="7%"><center>Payment Type</center></th>
                                            <th width="15%"><center>Bank</center></th>
                                            <th width="7%"><center>Cheque No.</center></th>
                                            <th width="10%"><center>Cheque Date</center></th>
                                            <th width="5%"><center>Status</center></th>
                                            <th width="35%"><center>Entry Date</center></th>
                                            <th width="10%"><center>Entry #ID</center></th>
      </tr> 
       
    <?php $i=0;
	  $i++;?>
    <?php
									do { ?>                                    
                                      
  <tr align="center"> 
    
    <td><?php echo $i++; ?></td>
    <td><?php echo $rowMain['Trans_Id']; ?></td>
   <td><?php echo $rowMain['Trans_Invoice_No']; ?></td>
    <td><?php echo $rowMain['Trans_Date']; ?></td>
    <td><?php echo moneyFormatIndia($rowMain['Trans_Amt']); ?></td>
    <td><?php echo $rowMain['Payment_Type']; ?></td>
    <td><?php echo $rowMain['Bank_Id']; ?></td>
    <td><?php echo $rowMain['Chq_No']; ?></td>
    <td><?php echo $rowMain['Chq_Date']; ?></td>
    <td><?php echo $rowMain['Status']; ?></td>
    <td><?php echo $rowMain['Entry_Date']; ?></td>
    <td><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
    <?php 
  $Tran_Amt = $Tran_Amt + $rowMain['Trans_Amt'];
  } while ($rowMain = mysql_fetch_assoc($rsMain)); ?>
  <tr>
  <th colspan="12">
  <span style="float:right">Total Amount&nbsp;:&nbsp;<?php echo moneyFormatIndia($Tran_Amt);?></span>
  </th>
  </tr>
  <?php
	}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
else if($Payment_Type=='Cash' && $reportrange == $_REQUEST['reportrange'] && $Trans_Type=='Saree')
{
	?>
    <tr>
      
                                             <th width="6%"><center>Sr No.</center></th>
                                             <th width="8%"><center>Trans. ID</center></th>
                                            <th width="8%"><center>Inv. ID</center></th>
                                            <th width="11%"><center>Inv. Date</center></th>
                                            <th width="7%"><center>Inv. Amount</center></th>
                                            <th width="7%"><center>Payment Type</center></th>
                                            <th width="15%"><center>Bank</center></th>
                                            <th width="7%"><center>Cheque No.</center></th>
                                            <th width="10%"><center>Cheque Date</center></th>
                                            <th width="5%"><center>Status</center></th>
                                            <th width="35%"><center>Entry Date</center></th>
                                            <th width="10%"><center>Entry #ID</center></th>
      </tr> 
       
    <?php $i=0;
	  $i++;?>
    <?php
									do { ?>                                    
                                      
  <tr align="center"> 
    
    <td><?php echo $i++; ?></td>
    <td><?php echo $rowMain['Trans_Id']; ?></td>
   <td><?php echo $rowMain['Trans_Invoice_No']; ?></td>
    <td><?php echo $rowMain['Trans_Date']; ?></td>
    <td><?php echo moneyFormatIndia($rowMain['Trans_Amt']); ?></td>
    <td><?php echo $rowMain['Payment_Type']; ?></td>
    <td><?php echo $rowMain['Bank_Id']; ?></td>
    <td><?php echo $rowMain['Chq_No']; ?></td>
    <td><?php echo $rowMain['Chq_Date']; ?></td>
    <td><?php echo $rowMain['Status']; ?></td>
    <td><?php echo $rowMain['Entry_Date']; ?></td>
    <td><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
    <?php 
  $Tran_Amt = $Tran_Amt + $rowMain['Trans_Amt'];
  } while ($rowMain = mysql_fetch_assoc($rsMain)); ?>
  <tr>
  <th colspan="12">
  <span style="float:right">Total Amount&nbsp;:&nbsp;<?php echo moneyFormatIndia($Tran_Amt);?></span>
  </th>
  </tr>
  <?php
	}
///////////////////////////////////////////////////////////////////////////////////////////////////////////cashdate
///////////////////////////////////////////////////////////////////////////////////////////////////////////
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////
else if($Payment_Type=='Cheque' && $reportrange == $_REQUEST['reportrange'])
{
	if($reportrange == $_REQUEST['reportrange'] && $Payment_Type == 'Cheque' && $Trans_Type=='Beam' && $Status=='Paid' )
{
	?>
    <tr>
      
                                             <th width="6%"><center>Sr No.</center></th>
                                             <th width="8%"><center>Trans. ID</center></th>
                                            <th width="8%"><center>Inv. ID</center></th>
                                            <th width="11%"><center>Inv. Date</center></th>
                                            <th width="7%"><center>Inv. Amount</center></th>
                                            <th width="7%"><center>Payment Type</center></th>
                                            <th width="15%"><center>Bank</center></th>
                                            <th width="7%"><center>Cheque No.</center></th>
                                            <th width="10%"><center>Cheque Date</center></th>
                                            <th width="5%"><center>Status</center></th>
                                            <th width="35%"><center>Entry Date</center></th>
                                            <th width="10%"><center>Entry #ID</center></th>
      </tr> 
       
    <?php $i=0;
	  $i++;?>
    <?php
									do { ?>                                    
                                      
  <tr align="center"> 
    
    <td><?php echo $i++; ?></td>
    <td><?php echo $rowMain['Trans_Id']; ?></td>
    <td><?php echo $rowMain['Trans_Invoice_No']; ?></td>
    <td><?php echo $rowMain['Trans_Date']; ?></td>
    <td><?php echo moneyFormatIndia($rowMain['Trans_Amt']); ?></td>
    <td><?php echo $rowMain['Payment_Type']; ?></td>
    <td><?php echo $rowMain['Bank_Id']; ?></td>
    <td><?php echo $rowMain['Chq_No']; ?></td>
    <td><?php echo $rowMain['Chq_Date']; ?></td>
    <td><?php echo $rowMain['Status']; ?></td>
    <td><?php echo $rowMain['Entry_Date']; ?></td>
    <td><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
    <?php 
  $Tran_Amt = $Tran_Amt + $rowMain['Trans_Amt'];
  } while ($rowMain = mysql_fetch_assoc($rsMain)); ?>
  <tr>
  <th colspan="12">
  <span style="float:right">Total Amount&nbsp;:&nbsp;<?php echo moneyFormatIndia($Tran_Amt);?></span>
  </th>
  </tr>
  <?php
	}

////////////////////////////////////////////////////////////////////////////////////////////////////////////
else if($reportrange == $_REQUEST['reportrange'] && $Payment_Type == 'Cheque' && $Trans_Type=='Bobbin' && $Status=='Paid')
{
	?>
    <tr>
      
                                             <th width="6%"><center>Sr No.</center></th>
                                             <th width="8%"><center>Trans. ID</center></th>
                                            <th width="8%"><center>Inv. ID</center></th>
                                            <th width="11%"><center>Inv. Date</center></th>
                                            <th width="7%"><center>Inv. Amount</center></th>
                                            <th width="7%"><center>Payment Type</center></th>
                                            <th width="15%"><center>Bank</center></th>
                                            <th width="7%"><center>Cheque No.</center></th>
                                            <th width="10%"><center>Cheque Date</center></th>
                                            <th width="5%"><center>Status</center></th>
                                            <th width="35%"><center>Entry Date</center></th>
                                            <th width="10%"><center>Entry #ID</center></th>
      </tr> 
       
    <?php $i=0;
	  $i++;?>
    <?php
									do { ?>                                    
                                      
  <tr align="center"> 
    
    <td><?php echo $i++; ?></td>
    <td><?php echo $rowMain['Trans_Id']; ?></td>
   <td><?php echo $rowMain['Trans_Invoice_No']; ?></td>
    <td><?php echo $rowMain['Trans_Date']; ?></td>
    <td><?php echo moneyFormatIndia($rowMain['Trans_Amt']); ?></td>
    <td><?php echo $rowMain['Payment_Type']; ?></td>
    <td><?php echo $rowMain['Bank_Id']; ?></td>
    <td><?php echo $rowMain['Chq_No']; ?></td>
    <td><?php echo $rowMain['Chq_Date']; ?></td>
    <td><?php echo $rowMain['Status']; ?></td>
    <td><?php echo $rowMain['Entry_Date']; ?></td>
    <td><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
    <?php 
  $Tran_Amt = $Tran_Amt + $rowMain['Trans_Amt'];
  } while ($rowMain = mysql_fetch_assoc($rsMain)); ?>
  <tr>
  <th colspan="12">
  <span style="float:right">Total Amount&nbsp;:&nbsp;<?php echo moneyFormatIndia($Tran_Amt);?></span>
  </th>
  </tr>
  <?php
	}
else if($Payment_Type=='Cheque' && $reportrange == $_REQUEST['reportrange'] && $Trans_Type=='Taka' && $Status=='Received' )
{
	?>
    <tr>
      
                                             <th width="6%"><center>Sr No.</center></th>
                                             <th width="8%"><center>Trans. ID</center></th>
                                            <th width="8%"><center>Inv. ID</center></th>
                                            <th width="11%"><center>Inv. Date</center></th>
                                            <th width="7%"><center>Inv. Amount</center></th>
                                            <th width="7%"><center>Payment Type</center></th>
                                            <th width="15%"><center>Bank</center></th>
                                            <th width="7%"><center>Cheque No.</center></th>
                                            <th width="10%"><center>Cheque Date</center></th>
                                            <th width="5%"><center>Status</center></th>
                                            <th width="35%"><center>Entry Date</center></th>
                                            <th width="10%"><center>Entry #ID</center></th>
      </tr> 
       
    <?php $i=0;
	  $i++;?>
    <?php
									do { ?>                                    
                                      
  <tr align="center"> 
    
    <td><?php echo $i++; ?></td>
    <td><?php echo $rowMain['Trans_Id']; ?></td>
   <td><?php echo $rowMain['Trans_Invoice_No']; ?></td>
    <td><?php echo $rowMain['Trans_Date']; ?></td>
    <td><?php echo moneyFormatIndia($rowMain['Trans_Amt']); ?></td>
    <td><?php echo $rowMain['Payment_Type']; ?></td>
    <td><?php echo $rowMain['Bank_Id']; ?></td>
    <td><?php echo $rowMain['Chq_No']; ?></td>
    <td><?php echo $rowMain['Chq_Date']; ?></td>
    <td><?php echo $rowMain['Status']; ?></td>
    <td><?php echo $rowMain['Entry_Date']; ?></td>
    <td><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
    <?php 
  $Tran_Amt = $Tran_Amt + $rowMain['Trans_Amt'];
  } while ($rowMain = mysql_fetch_assoc($rsMain)); ?>
  <tr>
  <th colspan="12">
  <span style="float:right">Total Amount&nbsp;:&nbsp;<?php echo moneyFormatIndia($Tran_Amt);?></span>
  </th>
  </tr>
  <?php
	}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
else if($Payment_Type=='Cheque' && $reportrange == $_REQUEST['reportrange'] && $Trans_Type=='Saree' && $Status=='Received' )
{
	?>
    <tr>
      
                                             <th width="6%"><center>Sr No.</center></th>
                                             <th width="8%"><center>Trans. ID</center></th>
                                            <th width="8%"><center>Inv. ID</center></th>
                                            <th width="11%"><center>Inv. Date</center></th>
                                            <th width="7%"><center>Inv. Amount</center></th>
                                            <th width="7%"><center>Payment Type</center></th>
                                            <th width="15%"><center>Bank</center></th>
                                            <th width="7%"><center>Cheque No.</center></th>
                                            <th width="10%"><center>Cheque Date</center></th>
                                            <th width="5%"><center>Status</center></th>
                                            <th width="35%"><center>Entry Date</center></th>
                                            <th width="10%"><center>Entry #ID</center></th>
      </tr> 
       
    <?php $i=0;
	  $i++;?>
    <?php
									do { ?>                                    
                                      
  <tr align="center"> 
    
    <td><?php echo $i++; ?></td>
    <td><?php echo $rowMain['Trans_Id']; ?></td>
   <td><?php echo $rowMain['Trans_Invoice_No']; ?></td>
    <td><?php echo $rowMain['Trans_Date']; ?></td>
    <td><?php echo moneyFormatIndia($rowMain['Trans_Amt']); ?></td>
    <td><?php echo $rowMain['Payment_Type']; ?></td>
    <td><?php echo $rowMain['Bank_Id']; ?></td>
    <td><?php echo $rowMain['Chq_No']; ?></td>
    <td><?php echo $rowMain['Chq_Date']; ?></td>
    <td><?php echo $rowMain['Status']; ?></td>
    <td><?php echo $rowMain['Entry_Date']; ?></td>
    <td><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
    <?php 
  $Tran_Amt = $Tran_Amt + $rowMain['Trans_Amt'];
  } while ($rowMain = mysql_fetch_assoc($rsMain)); ?>
  <tr>
  <th colspan="12">
  <span style="float:right">Total Amount&nbsp;:&nbsp;<?php echo moneyFormatIndia($Tran_Amt);?></span>
  </th>
  </tr>
  <?php
	}
	elseif($reportrange == $_REQUEST['reportrange'] && $Payment_Type == 'Cheque' && $Trans_Type=='Beam' && $Status=='Un-Paid' )
{
	?>
    <tr>
      
                                             <th width="6%"><center>Sr No.</center></th>
                                             <th width="8%"><center>Trans. ID</center></th>
                                            <th width="8%"><center>Inv. ID</center></th>
                                            <th width="11%"><center>Inv. Date</center></th>
                                            <th width="7%"><center>Inv. Amount</center></th>
                                            <th width="7%"><center>Payment Type</center></th>
                                            <th width="15%"><center>Bank</center></th>
                                            <th width="7%"><center>Cheque No.</center></th>
                                            <th width="10%"><center>Cheque Date</center></th>
                                            <th width="5%"><center>Status</center></th>
                                            <th width="35%"><center>Entry Date</center></th>
                                            <th width="10%"><center>Entry #ID</center></th>
      </tr> 
       
    <?php $i=0;
	  $i++;?>
    <?php
									do { ?>                                    
                                      
  <tr align="center"> 
    
    <td><?php echo $i++; ?></td>
    <td><?php echo $rowMain['Trans_Id']; ?></td>
    <td><?php echo $rowMain['Trans_Invoice_No']; ?></td>
    <td><?php echo $rowMain['Trans_Date']; ?></td>
    <td><?php echo moneyFormatIndia($rowMain['Trans_Amt']); ?></td>
    <td><?php echo $rowMain['Payment_Type']; ?></td>
    <td><?php echo $rowMain['Bank_Id']; ?></td>
    <td><?php echo $rowMain['Chq_No']; ?></td>
    <td><?php echo $rowMain['Chq_Date']; ?></td>
    <td><?php echo $rowMain['Status']; ?></td>
    <td><?php echo $rowMain['Entry_Date']; ?></td>
    <td><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
    <?php 
  $Tran_Amt = $Tran_Amt + $rowMain['Trans_Amt'];
  } while ($rowMain = mysql_fetch_assoc($rsMain)); ?>
  <tr>
  <th colspan="12">
  <span style="float:right">Total Amount&nbsp;:&nbsp;<?php echo moneyFormatIndia($Tran_Amt);?></span>
  </th>
  </tr>
  <?php
	}

////////////////////////////////////////////////////////////////////////////////////////////////////////////
else if($reportrange == $_REQUEST['reportrange'] && $Payment_Type == 'Cheque' && $Trans_Type=='Bobbin' && $Status=='Un-Paid')
{
	?>
    <tr>
      
                                             <th width="6%"><center>Sr No.</center></th>
                                             <th width="8%"><center>Trans. ID</center></th>
                                            <th width="8%"><center>Inv. ID</center></th>
                                            <th width="11%"><center>Inv. Date</center></th>
                                            <th width="7%"><center>Inv. Amount</center></th>
                                            <th width="7%"><center>Payment Type</center></th>
                                            <th width="15%"><center>Bank</center></th>
                                            <th width="7%"><center>Cheque No.</center></th>
                                            <th width="10%"><center>Cheque Date</center></th>
                                            <th width="5%"><center>Status</center></th>
                                            <th width="35%"><center>Entry Date</center></th>
                                            <th width="10%"><center>Entry #ID</center></th>
      </tr> 
       
    <?php $i=0;
	  $i++;?>
    <?php
									do { ?>                                    
                                      
  <tr align="center"> 
    
    <td><?php echo $i++; ?></td>
    <td><?php echo $rowMain['Trans_Id']; ?></td>
   <td><?php echo $rowMain['Trans_Invoice_No']; ?></td>
    <td><?php echo $rowMain['Trans_Date']; ?></td>
    <td><?php echo moneyFormatIndia($rowMain['Trans_Amt']); ?></td>
    <td><?php echo $rowMain['Payment_Type']; ?></td>
    <td><?php echo $rowMain['Bank_Id']; ?></td>
    <td><?php echo $rowMain['Chq_No']; ?></td>
    <td><?php echo $rowMain['Chq_Date']; ?></td>
    <td><?php echo $rowMain['Status']; ?></td>
    <td><?php echo $rowMain['Entry_Date']; ?></td>
    <td><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
    <?php 
  $Tran_Amt = $Tran_Amt + $rowMain['Trans_Amt'];
  } while ($rowMain = mysql_fetch_assoc($rsMain)); ?>
  <tr>
  <th colspan="12">
  <span style="float:right">Total Amount&nbsp;:&nbsp;<?php echo moneyFormatIndia($Tran_Amt);?></span>
  </th>
  </tr>
  <?php
	}
else if($Payment_Type=='Cheque' && $reportrange == $_REQUEST['reportrange'] && $Trans_Type=='Taka' && $Status=='Not-Received' )
{
	?>
    <tr>
      
                                             <th width="6%"><center>Sr No.</center></th>
                                             <th width="8%"><center>Trans. ID</center></th>
                                            <th width="8%"><center>Inv. ID</center></th>
                                            <th width="11%"><center>Inv. Date</center></th>
                                            <th width="7%"><center>Inv. Amount</center></th>
                                            <th width="7%"><center>Payment Type</center></th>
                                            <th width="15%"><center>Bank</center></th>
                                            <th width="7%"><center>Cheque No.</center></th>
                                            <th width="10%"><center>Cheque Date</center></th>
                                            <th width="5%"><center>Status</center></th>
                                            <th width="35%"><center>Entry Date</center></th>
                                            <th width="10%"><center>Entry #ID</center></th>
      </tr> 
       
    <?php $i=0;
	  $i++;?>
    <?php
									do { ?>                                    
                                      
  <tr align="center"> 
    
    <td><?php echo $i++; ?></td>
    <td><?php echo $rowMain['Trans_Id']; ?></td>
   <td><?php echo $rowMain['Trans_Invoice_No']; ?></td>
    <td><?php echo $rowMain['Trans_Date']; ?></td>
    <td><?php echo moneyFormatIndia($rowMain['Trans_Amt']); ?></td>
    <td><?php echo $rowMain['Payment_Type']; ?></td>
    <td><?php echo $rowMain['Bank_Id']; ?></td>
    <td><?php echo $rowMain['Chq_No']; ?></td>
    <td><?php echo $rowMain['Chq_Date']; ?></td>
    <td><?php echo $rowMain['Status']; ?></td>
    <td><?php echo $rowMain['Entry_Date']; ?></td>
    <td><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
    <?php 
  $Tran_Amt = $Tran_Amt + $rowMain['Trans_Amt'];
  } while ($rowMain = mysql_fetch_assoc($rsMain)); ?>
  <tr>
  <th colspan="12">
  <span style="float:right">Total Amount&nbsp;:&nbsp;<?php echo moneyFormatIndia($Tran_Amt);?></span>
  </th>
  </tr>
  <?php
	}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
else if($Payment_Type=='Cheque' && $reportrange == $_REQUEST['reportrange'] && $Trans_Type=='Saree' && $Status=='Not-Received' )
{
	?>
    <tr>
      
                                              <th width="6%"><center>Sr No.</center></th>
                                             <th width="8%"><center>Trans. ID</center></th>
                                            <th width="8%"><center>Inv. ID</center></th>
                                            <th width="11%"><center>Inv. Date</center></th>
                                            <th width="7%"><center>Inv. Amount</center></th>
                                            <th width="7%"><center>Payment Type</center></th>
                                            <th width="15%"><center>Bank</center></th>
                                            <th width="7%"><center>Cheque No.</center></th>
                                            <th width="10%"><center>Cheque Date</center></th>
                                            <th width="5%"><center>Status</center></th>
                                            <th width="35%"><center>Entry Date</center></th>
                                            <th width="10%"><center>Entry #ID</center></th>
      </tr> 
       
    <?php $i=0;
	  $i++;?>
    <?php
									do { ?>                                    
                                      
  <tr align="center"> 
    
    <td><?php echo $i++; ?></td>
    <td><?php echo $rowMain['Trans_Id']; ?></td>
   <td><?php echo $rowMain['Trans_Invoice_No']; ?></td>
    <td><?php echo $rowMain['Trans_Date']; ?></td>
    <td><?php echo moneyFormatIndia($rowMain['Trans_Amt']); ?></td>
    <td><?php echo $rowMain['Payment_Type']; ?></td>
    <td><?php echo $rowMain['Bank_Id']; ?></td>
    <td><?php echo $rowMain['Chq_No']; ?></td>
    <td><?php echo $rowMain['Chq_Date']; ?></td>
    <td><?php echo $rowMain['Status']; ?></td>
    <td><?php echo $rowMain['Entry_Date']; ?></td>
    <td><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
    <?php 
  $Tran_Amt = $Tran_Amt + $rowMain['Trans_Amt'];
  } while ($rowMain = mysql_fetch_assoc($rsMain)); ?>
  <tr>
  <th colspan="12">
  <span style="float:right">Total Amount&nbsp;:&nbsp;<?php echo moneyFormatIndia($Tran_Amt);?></span>
  </th>
  </tr>
  <?php
	}
	
	elseif($reportrange == $_REQUEST['reportrange'] && $Payment_Type == 'Cheque' && $Trans_Type=='Beam')
{
	?>
    <tr>
      
                                             <th width="6%"><center>Sr No.</center></th>
                                             <th width="8%"><center>Trans. ID</center></th>
                                            <th width="8%"><center>Inv. ID</center></th>
                                            <th width="11%"><center>Inv. Date</center></th>
                                            <th width="7%"><center>Inv. Amount</center></th>
                                            <th width="7%"><center>Payment Type</center></th>
                                            <th width="15%"><center>Bank</center></th>
                                            <th width="7%"><center>Cheque No.</center></th>
                                            <th width="10%"><center>Cheque Date</center></th>
                                            <th width="5%"><center>Status</center></th>
                                            <th width="35%"><center>Entry Date</center></th>
                                            <th width="10%"><center>Entry #ID</center></th>
      </tr> 
       
    <?php $i=0;
	  $i++;?>
    <?php
									do { ?>                                    
                                      
  <tr align="center"> 
    
    <td><?php echo $i++; ?></td>
    <td><?php echo $rowMain['Trans_Id']; ?></td>
    <td><?php echo $rowMain['Trans_Invoice_No']; ?></td>
    <td><?php echo $rowMain['Trans_Date']; ?></td>
    <td><?php echo moneyFormatIndia($rowMain['Trans_Amt']); ?></td>
    <td><?php echo $rowMain['Payment_Type']; ?></td>
    <td><?php echo $rowMain['Bank_Id']; ?></td>
    <td><?php echo $rowMain['Chq_No']; ?></td>
    <td><?php echo $rowMain['Chq_Date']; ?></td>
    <td><?php echo $rowMain['Status']; ?></td>
    <td><?php echo $rowMain['Entry_Date']; ?></td>
    <td><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
    <?php 
  $Tran_Amt = $Tran_Amt + $rowMain['Trans_Amt'];
  } while ($rowMain = mysql_fetch_assoc($rsMain)); ?>
  <tr>
  <th colspan="12">
  <span style="float:right">Total Amount&nbsp;:&nbsp;<?php echo moneyFormatIndia($Tran_Amt);?></span>
  </th>
  </tr>
  <?php
	}

////////////////////////////////////////////////////////////////////////////////////////////////////////////
else if($reportrange == $_REQUEST['reportrange'] && $Payment_Type == 'Cheque' && $Trans_Type=='Bobbin')
{
	?>
    <tr>
      
                                              <th width="6%"><center>Sr No.</center></th>
                                             <th width="8%"><center>Trans. ID</center></th>
                                            <th width="8%"><center>Inv. ID</center></th>
                                            <th width="11%"><center>Inv. Date</center></th>
                                            <th width="7%"><center>Inv. Amount</center></th>
                                            <th width="7%"><center>Payment Type</center></th>
                                            <th width="15%"><center>Bank</center></th>
                                            <th width="7%"><center>Cheque No.</center></th>
                                            <th width="10%"><center>Cheque Date</center></th>
                                            <th width="5%"><center>Status</center></th>
                                            <th width="35%"><center>Entry Date</center></th>
                                            <th width="10%"><center>Entry #ID</center></th>
      </tr> 
       
    <?php $i=0;
	  $i++;?>
    <?php
									do { ?>                                    
                                      
  <tr align="center"> 
    
    <td><?php echo $i++; ?></td>
    <td><?php echo $rowMain['Trans_Id']; ?></td>
   <td><?php echo $rowMain['Trans_Invoice_No']; ?></td>
    <td><?php echo $rowMain['Trans_Date']; ?></td>
    <td><?php echo moneyFormatIndia($rowMain['Trans_Amt']); ?></td>
    <td><?php echo $rowMain['Payment_Type']; ?></td>
    <td><?php echo $rowMain['Bank_Id']; ?></td>
    <td><?php echo $rowMain['Chq_No']; ?></td>
    <td><?php echo $rowMain['Chq_Date']; ?></td>
    <td><?php echo $rowMain['Status']; ?></td>
    <td><?php echo $rowMain['Entry_Date']; ?></td>
    <td><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
    <?php 
  $Tran_Amt = $Tran_Amt + $rowMain['Trans_Amt'];
  } while ($rowMain = mysql_fetch_assoc($rsMain)); ?>
  <tr>
  <th colspan="12">
  <span style="float:right">Total Amount&nbsp;:&nbsp;<?php echo moneyFormatIndia($Tran_Amt);?></span>
  </th>
  </tr>
  <?php
	}
else if($Payment_Type=='Cheque' && $reportrange == $_REQUEST['reportrange'] && $Trans_Type=='Taka')
{
	?>
    <tr>
      
                                             <th width="6%"><center>Sr No.</center></th>
                                             <th width="8%"><center>Trans. ID</center></th>
                                            <th width="8%"><center>Inv. ID</center></th>
                                            <th width="11%"><center>Inv. Date</center></th>
                                            <th width="7%"><center>Inv. Amount</center></th>
                                            <th width="7%"><center>Payment Type</center></th>
                                            <th width="15%"><center>Bank</center></th>
                                            <th width="7%"><center>Cheque No.</center></th>
                                            <th width="10%"><center>Cheque Date</center></th>
                                            <th width="5%"><center>Status</center></th>
                                            <th width="35%"><center>Entry Date</center></th>
                                            <th width="10%"><center>Entry #ID</center></th>
      </tr> 
       
    <?php $i=0;
	  $i++;?>
    <?php
									do { ?>                                    
                                      
  <tr align="center"> 
    
    <td><?php echo $i++; ?></td>
    <td><?php echo $rowMain['Trans_Id']; ?></td>
   <td><?php echo $rowMain['Trans_Invoice_No']; ?></td>
    <td><?php echo $rowMain['Trans_Date']; ?></td>
    <td><?php echo moneyFormatIndia($rowMain['Trans_Amt']); ?></td>
    <td><?php echo $rowMain['Payment_Type']; ?></td>
    <td><?php echo $rowMain['Bank_Id']; ?></td>
    <td><?php echo $rowMain['Chq_No']; ?></td>
    <td><?php echo $rowMain['Chq_Date']; ?></td>
    <td><?php echo $rowMain['Status']; ?></td>
    <td><?php echo $rowMain['Entry_Date']; ?></td>
    <td><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
    <?php 
  $Tran_Amt = $Tran_Amt + $rowMain['Trans_Amt'];
  } while ($rowMain = mysql_fetch_assoc($rsMain)); ?>
  <tr>
  <th colspan="12">
  <span style="float:right">Total Amount&nbsp;:&nbsp;<?php echo moneyFormatIndia($Tran_Amt);?></span>
  </th>
  </tr>
  <?php
	}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
else if($Payment_Type=='Cheque' && $reportrange == $_REQUEST['reportrange'] && $Trans_Type=='Saree')
{
	?>
    <tr>
      
                                             <th width="6%"><center>Sr No.</center></th>
                                             <th width="8%"><center>Trans. ID</center></th>
                                            <th width="8%"><center>Inv. ID</center></th>
                                            <th width="11%"><center>Inv. Date</center></th>
                                            <th width="7%"><center>Inv. Amount</center></th>
                                            <th width="7%"><center>Payment Type</center></th>
                                            <th width="15%"><center>Bank</center></th>
                                            <th width="7%"><center>Cheque No.</center></th>
                                            <th width="10%"><center>Cheque Date</center></th>
                                            <th width="5%"><center>Status</center></th>
                                            <th width="35%"><center>Entry Date</center></th>
                                            <th width="10%"><center>Entry #ID</center></th>
                                              </tr> 
       
    <?php $i=0;
	  $i++;?>
    <?php
									do { ?>                                    
                                      
  <tr align="center"> 
    
    <td><?php echo $i++; ?></td>
    <td><?php echo $rowMain['Trans_Id']; ?></td>
   <td><?php echo $rowMain['Trans_Invoice_No']; ?></td>
    <td><?php echo $rowMain['Trans_Date']; ?></td>
    <td><?php echo moneyFormatIndia($rowMain['Trans_Amt']); ?></td>
    <td><?php echo $rowMain['Payment_Type']; ?></td>
    <td><?php echo $rowMain['Bank_Id']; ?></td>
    <td><?php echo $rowMain['Chq_No']; ?></td>
    <td><?php echo $rowMain['Chq_Date']; ?></td>
    <td><?php echo $rowMain['Status']; ?></td>
    <td><?php echo $rowMain['Entry_Date']; ?></td>
    <td><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
    <?php 
  $Tran_Amt = $Tran_Amt + $rowMain['Trans_Amt'];
  } while ($rowMain = mysql_fetch_assoc($rsMain)); ?>
  <tr>
  <th colspan="12">
  <span style="float:right">Total Amount&nbsp;:&nbsp;<?php echo moneyFormatIndia($Tran_Amt);?></span>
  </th>
  </tr>
  <?php
	}
///////////////////////////////////////////////////////////////////////////////////////////////////////////chqdte

}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
else if($reportrange == $_REQUEST['reportrange'] && $Trans_Type=='Beam' && $Status=='Paid')
{
	?>
    <tr>
      
                                            <th width="6%"><center>Sr No.</center></th>
                                             <th width="8%"><center>Trans. ID</center></th>
                                            <th width="8%"><center>Inv. ID</center></th>
                                            <th width="11%"><center>Inv. Date</center></th>
                                            <th width="7%"><center>Inv. Amount</center></th>
                                            <th width="7%"><center>Payment Type</center></th>
                                            <th width="15%"><center>Bank</center></th>
                                            <th width="7%"><center>Cheque No.</center></th>
                                            <th width="10%"><center>Cheque Date</center></th>
                                            <th width="5%"><center>Status</center></th>
                                            <th width="35%"><center>Entry Date</center></th>
                                            <th width="10%"><center>Entry #ID</center></th>
      </tr> 
       
    <?php $i=0;
	  $i++;?>
    <?php
									do { ?>                                    
                                      
  <tr align="center"> 
    
    <td><?php echo $i++; ?></td>
    <td><?php echo $rowMain['Trans_Id']; ?></td>
   <td><?php echo $rowMain['Trans_Invoice_No']; ?></td>
    <td><?php echo $rowMain['Trans_Date']; ?></td>
    <td><?php echo moneyFormatIndia($rowMain['Trans_Amt']); ?></td>
    <td><?php echo $rowMain['Payment_Type']; ?></td>
    <td><?php echo $rowMain['Bank_Id']; ?></td>
    <td><?php echo $rowMain['Chq_No']; ?></td>
    <td><?php echo $rowMain['Chq_Date']; ?></td>
    <td><?php echo $rowMain['Status']; ?></td>
    <td><?php echo $rowMain['Entry_Date']; ?></td>
    <td><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
    <?php 
  $Tran_Amt = $Tran_Amt + $rowMain['Trans_Amt'];
  } while ($rowMain = mysql_fetch_assoc($rsMain)); ?>
  <tr>
  <th colspan="12">
  <span style="float:right">Total Amount&nbsp;:&nbsp;<?php echo moneyFormatIndia($Tran_Amt);?></span>
  </th>
  </tr>
  <?php
	}
else if($reportrange == $_REQUEST['reportrange'] && $Trans_Type=='Bobbin' && $Status=='Paid')
{
	?>
    <tr>
      
                                             <th width="6%"><center>Sr No.</center></th>
                                             <th width="8%"><center>Trans. ID</center></th>
                                            <th width="8%"><center>Inv. ID</center></th>
                                            <th width="11%"><center>Inv. Date</center></th>
                                            <th width="7%"><center>Inv. Amount</center></th>
                                            <th width="7%"><center>Payment Type</center></th>
                                            <th width="15%"><center>Bank</center></th>
                                            <th width="7%"><center>Cheque No.</center></th>
                                            <th width="10%"><center>Cheque Date</center></th>
                                            <th width="5%"><center>Status</center></th>
                                            <th width="35%"><center>Entry Date</center></th>
                                            <th width="10%"><center>Entry #ID</center></th>
      </tr> 
       
    <?php $i=0;
	  $i++;?>
    <?php
									do { ?>                                    
                                      
  <tr align="center"> 
    
    <td><?php echo $i++; ?></td>
    <td><?php echo $rowMain['Trans_Id']; ?></td>
   <td><?php echo $rowMain['Trans_Invoice_No']; ?></td>
    <td><?php echo $rowMain['Trans_Date']; ?></td>
    <td><?php echo moneyFormatIndia($rowMain['Trans_Amt']); ?></td>
    <td><?php echo $rowMain['Payment_Type']; ?></td>
    <td><?php echo $rowMain['Bank_Id']; ?></td>
    <td><?php echo $rowMain['Chq_No']; ?></td>
    <td><?php echo $rowMain['Chq_Date']; ?></td>
    <td><?php echo $rowMain['Status']; ?></td>
    <td><?php echo $rowMain['Entry_Date']; ?></td>
    <td><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
    <?php 
  $Tran_Amt = $Tran_Amt + $rowMain['Trans_Amt'];
  } while ($rowMain = mysql_fetch_assoc($rsMain)); ?>
  <tr>
  <th colspan="12">
  <span style="float:right">Total Amount&nbsp;:&nbsp;<?php echo moneyFormatIndia($Tran_Amt);?></span>
  </th>
  </tr>
  <?php
	}
else if($reportrange == $_REQUEST['reportrange'] && $Trans_Type=='Taka' && $Status=='Received')
{
	?>
    <tr>
      
                                             <th width="6%"><center>Sr No.</center></th>
                                             <th width="8%"><center>Trans. ID</center></th>
                                            <th width="8%"><center>Inv. ID</center></th>
                                            <th width="11%"><center>Inv. Date</center></th>
                                            <th width="7%"><center>Inv. Amount</center></th>
                                            <th width="7%"><center>Payment Type</center></th>
                                            <th width="15%"><center>Bank</center></th>
                                            <th width="7%"><center>Cheque No.</center></th>
                                            <th width="10%"><center>Cheque Date</center></th>
                                            <th width="5%"><center>Status</center></th>
                                            <th width="35%"><center>Entry Date</center></th>
                                            <th width="10%"><center>Entry #ID</center></th>
      </tr> 
       
    <?php $i=0;
	  $i++;?>
    <?php
									do { ?>                                    
                                      
  <tr align="center"> 
    
    <td><?php echo $i++; ?></td>
    <td><?php echo $rowMain['Trans_Id']; ?></td>
   <td><?php echo $rowMain['Trans_Invoice_No']; ?></td>
    <td><?php echo $rowMain['Trans_Date']; ?></td>
    <td><?php echo moneyFormatIndia($rowMain['Trans_Amt']); ?></td>
    <td><?php echo $rowMain['Payment_Type']; ?></td>
    <td><?php echo $rowMain['Bank_Id']; ?></td>
    <td><?php echo $rowMain['Chq_No']; ?></td>
    <td><?php echo $rowMain['Chq_Date']; ?></td>
    <td><?php echo $rowMain['Status']; ?></td>
    <td><?php echo $rowMain['Entry_Date']; ?></td>
    <td><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
    <?php 
  $Tran_Amt = $Tran_Amt + $rowMain['Trans_Amt'];
  } while ($rowMain = mysql_fetch_assoc($rsMain)); ?>
  <tr>
  <th colspan="12">
  <span style="float:right">Total Amount&nbsp;:&nbsp;<?php echo moneyFormatIndia($Tran_Amt);?></span>
  </th>
  </tr>
  <?php
	}
else if($reportrange == $_REQUEST['reportrange'] && $Trans_Type=='Saree' && $Status=='Received')
{
	?>
    <tr>
      
                                              <th width="6%"><center>Sr No.</center></th>
                                             <th width="8%"><center>Trans. ID</center></th>
                                            <th width="8%"><center>Inv. ID</center></th>
                                            <th width="11%"><center>Inv. Date</center></th>
                                            <th width="7%"><center>Inv. Amount</center></th>
                                            <th width="7%"><center>Payment Type</center></th>
                                            <th width="15%"><center>Bank</center></th>
                                            <th width="7%"><center>Cheque No.</center></th>
                                            <th width="10%"><center>Cheque Date</center></th>
                                            <th width="5%"><center>Status</center></th>
                                            <th width="35%"><center>Entry Date</center></th>
                                            <th width="10%"><center>Entry #ID</center></th>
      </tr> 
       
    <?php $i=0;
	  $i++;?>
    <?php
									do { ?>                                    
                                      
  <tr align="center"> 
    
    <td><?php echo $i++; ?></td>
    <td><?php echo $rowMain['Trans_Id']; ?></td>
   <td><?php echo $rowMain['Trans_Invoice_No']; ?></td>
    <td><?php echo $rowMain['Trans_Date']; ?></td>
    <td><?php echo moneyFormatIndia($rowMain['Trans_Amt']); ?></td>
    <td><?php echo $rowMain['Payment_Type']; ?></td>
    <td><?php echo $rowMain['Bank_Id']; ?></td>
    <td><?php echo $rowMain['Chq_No']; ?></td>
    <td><?php echo $rowMain['Chq_Date']; ?></td>
    <td><?php echo $rowMain['Status']; ?></td>
    <td><?php echo $rowMain['Entry_Date']; ?></td>
    <td><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
    <?php 
  $Tran_Amt = $Tran_Amt + $rowMain['Trans_Amt'];
  } while ($rowMain = mysql_fetch_assoc($rsMain)); ?>
  <tr>
  <th colspan="12">
  <span style="float:right">Total Amount&nbsp;:&nbsp;<?php echo moneyFormatIndia($Tran_Amt);?></span>
  </th>
  </tr>
  <?php
	}
else if($reportrange == $_REQUEST['reportrange'] && $Trans_Type=='Beam' && $Status=='Un-Paid')
{
	?>
    <tr>
      
                                             <th width="6%"><center>Sr No.</center></th>
                                             <th width="8%"><center>Trans. ID</center></th>
                                            <th width="8%"><center>Inv. ID</center></th>
                                            <th width="11%"><center>Inv. Date</center></th>
                                            <th width="7%"><center>Inv. Amount</center></th>
                                            <th width="7%"><center>Payment Type</center></th>
                                            <th width="15%"><center>Bank</center></th>
                                            <th width="7%"><center>Cheque No.</center></th>
                                            <th width="10%"><center>Cheque Date</center></th>
                                            <th width="5%"><center>Status</center></th>
                                            <th width="35%"><center>Entry Date</center></th>
                                            <th width="10%"><center>Entry #ID</center></th>
      </tr> 
       
    <?php $i=0;
	  $i++;?>
    <?php
									do { ?>                                    
                                      
  <tr align="center"> 
    
    <td><?php echo $i++; ?></td>
    <td><?php echo $rowMain['Trans_Id']; ?></td>
   <td><?php echo $rowMain['Trans_Invoice_No']; ?></td>
    <td><?php echo $rowMain['Trans_Date']; ?></td>
    <td><?php echo moneyFormatIndia($rowMain['Trans_Amt']); ?></td>
    <td><?php echo $rowMain['Payment_Type']; ?></td>
    <td><?php echo $rowMain['Bank_Id']; ?></td>
    <td><?php echo $rowMain['Chq_No']; ?></td>
    <td><?php echo $rowMain['Chq_Date']; ?></td>
    <td><?php echo $rowMain['Status']; ?></td>
    <td><?php echo $rowMain['Entry_Date']; ?></td>
    <td><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
    <?php 
  $Tran_Amt = $Tran_Amt + $rowMain['Trans_Amt'];
  } while ($rowMain = mysql_fetch_assoc($rsMain)); ?>
  <tr>
  <th colspan="12">
  <span style="float:right">Total Amount&nbsp;:&nbsp;<?php echo moneyFormatIndia($Tran_Amt);?></span>
  </th>
  </tr>
  <?php
	}
else if($reportrange == $_REQUEST['reportrange'] && $Trans_Type=='Bobbin' && $Status=='Un-Paid')
{
	?>
    <tr>
      
                                             <th width="6%"><center>Sr No.</center></th>
                                             <th width="8%"><center>Trans. ID</center></th>
                                            <th width="8%"><center>Inv. ID</center></th>
                                            <th width="11%"><center>Inv. Date</center></th>
                                            <th width="7%"><center>Inv. Amount</center></th>
                                            <th width="7%"><center>Payment Type</center></th>
                                            <th width="15%"><center>Bank</center></th>
                                            <th width="7%"><center>Cheque No.</center></th>
                                            <th width="10%"><center>Cheque Date</center></th>
                                            <th width="5%"><center>Status</center></th>
                                            <th width="35%"><center>Entry Date</center></th>
                                            <th width="10%"><center>Entry #ID</center></th>
      </tr> 
       
    <?php $i=0;
	  $i++;?>
    <?php
									do { ?>                                    
                                      
  <tr align="center"> 
    
    <td><?php echo $i++; ?></td>
    <td><?php echo $rowMain['Trans_Id']; ?></td>
   <td><?php echo $rowMain['Trans_Invoice_No']; ?></td>
    <td><?php echo $rowMain['Trans_Date']; ?></td>
    <td><?php echo moneyFormatIndia($rowMain['Trans_Amt']); ?></td>
    <td><?php echo $rowMain['Payment_Type']; ?></td>
    <td><?php echo $rowMain['Bank_Id']; ?></td>
    <td><?php echo $rowMain['Chq_No']; ?></td>
    <td><?php echo $rowMain['Chq_Date']; ?></td>
    <td><?php echo $rowMain['Status']; ?></td>
    <td><?php echo $rowMain['Entry_Date']; ?></td>
    <td><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
    <?php 
  $Tran_Amt = $Tran_Amt + $rowMain['Trans_Amt'];
  } while ($rowMain = mysql_fetch_assoc($rsMain)); ?>
  <tr>
  <th colspan="12">
  <span style="float:right">Total Amount&nbsp;:&nbsp;<?php echo moneyFormatIndia($Tran_Amt);?></span>
  </th>
  </tr>
  <?php
	}
else if($reportrange == $_REQUEST['reportrange'] && $Trans_Type=='Taka' && $Status=='Not-Received')
{
	?>
    <tr>
      
                                             <th width="6%"><center>Sr No.</center></th>
                                             <th width="8%"><center>Trans. ID</center></th>
                                            <th width="8%"><center>Inv. ID</center></th>
                                            <th width="11%"><center>Inv. Date</center></th>
                                            <th width="7%"><center>Inv. Amount</center></th>
                                            <th width="7%"><center>Payment Type</center></th>
                                            <th width="15%"><center>Bank</center></th>
                                            <th width="7%"><center>Cheque No.</center></th>
                                            <th width="10%"><center>Cheque Date</center></th>
                                            <th width="5%"><center>Status</center></th>
                                            <th width="35%"><center>Entry Date</center></th>
                                            <th width="10%"><center>Entry #ID</center></th>
      </tr> 
       
    <?php $i=0;
	  $i++;?>
    <?php
									do { ?>                                    
                                      
  <tr align="center"> 
    
    <td><?php echo $i++; ?></td>
    <td><?php echo $rowMain['Trans_Id']; ?></td>
   <td><?php echo $rowMain['Trans_Invoice_No']; ?></td>
    <td><?php echo $rowMain['Trans_Date']; ?></td>
    <td><?php echo moneyFormatIndia($rowMain['Trans_Amt']); ?></td>
    <td><?php echo $rowMain['Payment_Type']; ?></td>
    <td><?php echo $rowMain['Bank_Id']; ?></td>
    <td><?php echo $rowMain['Chq_No']; ?></td>
    <td><?php echo $rowMain['Chq_Date']; ?></td>
    <td><?php echo $rowMain['Status']; ?></td>
    <td><?php echo $rowMain['Entry_Date']; ?></td>
    <td><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
    <?php 
  $Tran_Amt = $Tran_Amt + $rowMain['Trans_Amt'];
  } while ($rowMain = mysql_fetch_assoc($rsMain)); ?>
  <tr>
  <th colspan="12">
  <span style="float:right">Total Amount&nbsp;:&nbsp;<?php echo moneyFormatIndia($Tran_Amt);?></span>
  </th>
  </tr>
  <?php
	}
else if($reportrange == $_REQUEST['reportrange'] && $Trans_Type=='Saree' && $Status=='Not-Received')
{
	?>
    <tr>
      
                                              <th width="6%"><center>Sr No.</center></th>
                                             <th width="8%"><center>Trans. ID</center></th>
                                            <th width="8%"><center>Inv. ID</center></th>
                                            <th width="11%"><center>Inv. Date</center></th>
                                            <th width="7%"><center>Inv. Amount</center></th>
                                            <th width="7%"><center>Payment Type</center></th>
                                            <th width="15%"><center>Bank</center></th>
                                            <th width="7%"><center>Cheque No.</center></th>
                                            <th width="10%"><center>Cheque Date</center></th>
                                            <th width="5%"><center>Status</center></th>
                                            <th width="35%"><center>Entry Date</center></th>
                                            <th width="10%"><center>Entry #ID</center></th>
      </tr> 
       
    <?php $i=0;
	  $i++;?>
    <?php
									do { ?>                                    
                                      
  <tr align="center"> 
    
    <td><?php echo $i++; ?></td>
    <td><?php echo $rowMain['Trans_Id']; ?></td>
   <td><?php echo $rowMain['Trans_Invoice_No']; ?></td>
    <td><?php echo $rowMain['Trans_Date']; ?></td>
    <td><?php echo moneyFormatIndia($rowMain['Trans_Amt']); ?></td>
    <td><?php echo $rowMain['Payment_Type']; ?></td>
    <td><?php echo $rowMain['Bank_Id']; ?></td>
    <td><?php echo $rowMain['Chq_No']; ?></td>
    <td><?php echo $rowMain['Chq_Date']; ?></td>
    <td><?php echo $rowMain['Status']; ?></td>
    <td><?php echo $rowMain['Entry_Date']; ?></td>
    <td><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
    <?php 
  $Tran_Amt = $Tran_Amt + $rowMain['Trans_Amt'];
  } while ($rowMain = mysql_fetch_assoc($rsMain)); ?>
  <tr>
  <th colspan="12">
  <span style="float:right">Total Amount&nbsp;:&nbsp;<?php echo moneyFormatIndia($Tran_Amt);?></span>
  </th>
  </tr>
  <?php
	}
else if($reportrange == $_REQUEST['reportrange'] && $Trans_Type=='Beam')
{
	?>
    <tr>
      
                                             <th width="6%"><center>Sr No.</center></th>
                                             <th width="8%"><center>Trans. ID</center></th>
                                            <th width="8%"><center>Inv. ID</center></th>
                                            <th width="11%"><center>Inv. Date</center></th>
                                            <th width="7%"><center>Inv. Amount</center></th>
                                            <th width="7%"><center>Payment Type</center></th>
                                            <th width="15%"><center>Bank</center></th>
                                            <th width="7%"><center>Cheque No.</center></th>
                                            <th width="10%"><center>Cheque Date</center></th>
                                            <th width="5%"><center>Status</center></th>
                                            <th width="35%"><center>Entry Date</center></th>
                                            <th width="10%"><center>Entry #ID</center></th>
      </tr> 
       
    <?php $i=0;
	  $i++;?>
    <?php
									do { ?>                                    
                                      
  <tr align="center"> 
    
    <td><?php echo $i++; ?></td>
    <td><?php echo $rowMain['Trans_Id']; ?></td>
   <td><?php echo $rowMain['Trans_Invoice_No']; ?></td>
    <td><?php echo $rowMain['Trans_Date']; ?></td>
    <td><?php echo moneyFormatIndia($rowMain['Trans_Amt']); ?></td>
    <td><?php echo $rowMain['Payment_Type']; ?></td>
    <td><?php echo $rowMain['Bank_Id']; ?></td>
    <td><?php echo $rowMain['Chq_No']; ?></td>
    <td><?php echo $rowMain['Chq_Date']; ?></td>
    <td><?php echo $rowMain['Status']; ?></td>
    <td><?php echo $rowMain['Entry_Date']; ?></td>
    <td><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
    <?php 
  $Tran_Amt = $Tran_Amt + $rowMain['Trans_Amt'];
  } while ($rowMain = mysql_fetch_assoc($rsMain)); ?>
  <tr>
  <th colspan="12">
  <span style="float:right">Total Amount&nbsp;:&nbsp;<?php echo moneyFormatIndia($Tran_Amt);?></span>
  </th>
  </tr>
  <?php
	}
else if($reportrange == $_REQUEST['reportrange'] && $Trans_Type=='Bobbin')
{
	?>
    <tr>
      
                                             <th width="6%"><center>Sr No.</center></th>
                                             <th width="8%"><center>Trans. ID</center></th>
                                            <th width="8%"><center>Inv. ID</center></th>
                                            <th width="11%"><center>Inv. Date</center></th>
                                            <th width="7%"><center>Inv. Amount</center></th>
                                            <th width="7%"><center>Payment Type</center></th>
                                            <th width="15%"><center>Bank</center></th>
                                            <th width="7%"><center>Cheque No.</center></th>
                                            <th width="10%"><center>Cheque Date</center></th>
                                            <th width="5%"><center>Status</center></th>
                                            <th width="35%"><center>Entry Date</center></th>
                                            <th width="10%"><center>Entry #ID</center></th>
      </tr> 
       
    <?php $i=0;
	  $i++;?>
    <?php
									do { ?>                                    
                                      
  <tr align="center"> 
    
    <td><?php echo $i++; ?></td>
    <td><?php echo $rowMain['Trans_Id']; ?></td>
   <td><?php echo $rowMain['Trans_Invoice_No']; ?></td>
    <td><?php echo $rowMain['Trans_Date']; ?></td>
    <td><?php echo moneyFormatIndia($rowMain['Trans_Amt']); ?></td>
    <td><?php echo $rowMain['Payment_Type']; ?></td>
    <td><?php echo $rowMain['Bank_Id']; ?></td>
    <td><?php echo $rowMain['Chq_No']; ?></td>
    <td><?php echo $rowMain['Chq_Date']; ?></td>
    <td><?php echo $rowMain['Status']; ?></td>
    <td><?php echo $rowMain['Entry_Date']; ?></td>
    <td><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
    <?php 
  $Tran_Amt = $Tran_Amt + $rowMain['Trans_Amt'];
  } while ($rowMain = mysql_fetch_assoc($rsMain)); ?>
  <tr>
  <th colspan="12">
  <span style="float:right">Total Amount&nbsp;:&nbsp;<?php echo moneyFormatIndia($Tran_Amt);?></span>
  </th>
  </tr>
  <?php
	}
	else if($reportrange == $_REQUEST['reportrange'] && $Trans_Type=='Taka')
{
	?>
    <tr>
      
                                             <th width="6%"><center>Sr No.</center></th>
                                             <th width="8%"><center>Trans. ID</center></th>
                                            <th width="8%"><center>Inv. ID</center></th>
                                            <th width="11%"><center>Inv. Date</center></th>
                                            <th width="7%"><center>Inv. Amount</center></th>
                                            <th width="7%"><center>Payment Type</center></th>
                                            <th width="15%"><center>Bank</center></th>
                                            <th width="7%"><center>Cheque No.</center></th>
                                            <th width="10%"><center>Cheque Date</center></th>
                                            <th width="5%"><center>Status</center></th>
                                            <th width="35%"><center>Entry Date</center></th>
                                            <th width="10%"><center>Entry #ID</center></th>
      </tr> 
       
    <?php $i=0;
	  $i++;?>
    <?php
									do { ?>                                    
                                      
  <tr align="center"> 
    
    <td><?php echo $i++; ?></td>
    <td><?php echo $rowMain['Trans_Id']; ?></td>
    <td><?php echo $rowMain['Trans_Invoice_No']; ?></td>
    <td><?php echo $rowMain['Trans_Date']; ?></td>
    <td><?php echo moneyFormatIndia($rowMain['Trans_Amt']); ?></td>
    <td><?php echo $rowMain['Payment_Type']; ?></td>
    <td><?php echo $rowMain['Bank_Id']; ?></td>
    <td><?php echo $rowMain['Chq_No']; ?></td>
    <td><?php echo $rowMain['Chq_Date']; ?></td>
    <td><?php echo $rowMain['Status']; ?></td>
    <td><?php echo $rowMain['Entry_Date']; ?></td>
    <td><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
    <?php 
  $Tran_Amt = $Tran_Amt + $rowMain['Trans_Amt'];
  } while ($rowMain = mysql_fetch_assoc($rsMain)); ?>
  <tr>
  <th colspan="12">
  <span style="float:right">Total Amount&nbsp;:&nbsp;<?php echo moneyFormatIndia($Tran_Amt);?></span>
  </th>
  </tr>
  <?php
	}
else if($reportrange == $_REQUEST['reportrange'] && $Trans_Type=='Saree')
{
	?>
    <tr>
      
                                             <th width="6%"><center>Sr No.</center></th>
                                             <th width="8%"><center>Trans. ID</center></th>
                                            <th width="8%"><center>Inv. ID</center></th>
                                            <th width="11%"><center>Inv. Date</center></th>
                                            <th width="7%"><center>Inv. Amount</center></th>
                                            <th width="7%"><center>Payment Type</center></th>
                                            <th width="15%"><center>Bank</center></th>
                                            <th width="7%"><center>Cheque No.</center></th>
                                            <th width="10%"><center>Cheque Date</center></th>
                                            <th width="5%"><center>Status</center></th>
                                            <th width="35%"><center>Entry Date</center></th>
                                            <th width="10%"><center>Entry #ID</center></th>
      </tr> 
       
    <?php $i=0;
	  $i++;?>
    <?php
									do { ?>                                    
                                      
  <tr align="center"> 
    
    <td><?php echo $i++; ?></td>
    <td><?php echo $rowMain['Trans_Id']; ?></td>
   <td><?php echo $rowMain['Trans_Invoice_No']; ?></td>
    <td><?php echo $rowMain['Trans_Date']; ?></td>
    <td><?php echo moneyFormatIndia($rowMain['Trans_Amt']); ?></td>
    <td><?php echo $rowMain['Payment_Type']; ?></td>
    <td><?php echo $rowMain['Bank_Id']; ?></td>
    <td><?php echo $rowMain['Chq_No']; ?></td>
    <td><?php echo $rowMain['Chq_Date']; ?></td>
    <td><?php echo $rowMain['Status']; ?></td>
    <td><?php echo $rowMain['Entry_Date']; ?></td>
    <td><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
   <?php 
  $Tran_Amt = $Tran_Amt + $rowMain['Trans_Amt'];
  } while ($rowMain = mysql_fetch_assoc($rsMain)); ?>
  <tr>
  <th colspan="12">
  <span style="float:right">Total Amount&nbsp;:&nbsp;<?php echo moneyFormatIndia($Tran_Amt);?></span>
  </th>
  </tr>
  <?php
	}
	?>

        </table>
         
                </td>
             </tr>
</table>
</body>
</html>
<?php
 ob_flush(); ?>