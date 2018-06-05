<?php include("logcode.php"); error_reporting(0);
include("databaseconnect.php");
if($row_result['Role']=='Admin' || $row_result['Role']=='Manager' || $row_result['Role']=='Accountant')
{
	
}
else
{
	
	echo '<script>alert("You have no rights to view this page");</script>';
	$updateGoTo = "index";
  echo '<script>window.location="'.$updateGoTo.'";</script>';
}
if(isset($_REQUEST['action']))
{
	$action = $_REQUEST['action'];
	if($action=='insert')
	{
		date_default_timezone_set('Asia/Calcutta');
$Date1 = date('Y-m-d');
	include("webrenew.php");
	}
	elseif($action=='update')
	{
		$decodeurl = $_REQUEST['Petty_Id'];
	$durl = urldecode($decodeurl); 
	$turl = str_replace("'"," ",$durl);
	$urls = explode(" ",$turl);
	$Petty_Id = $urls[1];
		$sql = "select * from other_credit_details where Petty_Id = '$Petty_Id'";
		$sql_exe = mysql_query($sql);
		$row = mysql_fetch_array($sql_exe);
		$Petty_Id = $row['Petty_Id'];
		$Subject = $row['Subject'];
		$Description = $row['Description'];
		$Payment_Typeshow = $row['Payment_Type'];
		$Bank_Id = $row['Bank_Id'];
		$bank_replace = str_replace(" ",",",$Bank_Id);
		$Cheque_No = $row['Cheque_No'];
		$Cheque_Amountshow = $row['Cheque_Amount'];
		$Date1 = $row['Date'];
		$Statusshow = $row['Status'];
		$Entry_Date = $row['Entry_Date'];
		$Entry_Id = $row['Entry_Id'];
		
		
		
		if(isset($_REQUEST['update']))
{
	if(!isset($_SESSION['User']))
	{}
	else
	{
$Petty_Id = $_POST['Petty_Id'];
$Subject = $_POST['Subject'];
$Description = $_POST['Description'];
$Payment_Type = $_POST['Payment_Type'];
$Payment_Typejovo = $_POST['Payment_Typejovo'];
$Bank_Id = $_POST['Bank_Id'];
$Bank_Idjovo = $_POST['Bank_Idjovo'];
$Cheque_No = $_POST['Cheque_No'];
$Cheque_Amount = $_POST['Cheque_Amount'];
$Checkrokada = $_POST['Checkrokada'];
$Date1 = $_POST['Date1'];
$Status = $_POST['Status'];
	$Entry_Date = $_POST['Entry_Date'];;
$Entry_Id = $row_result['Registration_Id'];
     	
		if($Payment_Typejovo==$Payment_Type)
		{
			echo '<script>alert("same");</script>';
			/////////////////////////////////////////////////
			if($Payment_Type!="Cash")
	   {
   
   $selpettycheck = "select Status from other_credit_details where Petty_Id = '$Petty_Id' and Status in ('Cleared','Received','Deposited','Transferred')";
   $selpettycheckexe = mysql_query($selpettycheck);
   $selpettychecknum = mysql_num_rows($selpettycheckexe);
   if($selpettychecknum==0)
   {   
    echo '<script>alert("0");</script>';			   
 $query1 = mysql_query("update other_credit_details set Subject = '$Subject', Description = '$Description', Payment_Type = '$Payment_Type', Bank_Id = '$Bank_Id', Cheque_No = '$Cheque_No', Date = '$Date1',Cheque_Amount = '$Cheque_Amount', Entry_Date = '$Entry_Date', Entry_Id = '$Entry_Id', Status = '$Status' where Petty_Id = '$Petty_Id'") or die(mysql_error());
	  
	    $particular = $Subject.'<br/>'.$Description.'<br/>(Other-Credit ID : '.$Petty_Id.')<br/>By '.$Payment_Type;
		$updaccount = "update accounts set Bank_Id = '$Bank_Id', Date = '$Date1', Particular = '$particular', Cheque_No = '$Cheque_No', Credit = '$Cheque_Amount', Debit = '0.00', Status = '$Status' where Id = '$Petty_Id' and For_S = 'Other Credit'";
		mysql_query($updaccount);
		
		if($Status=="Cleared" || $Status=="Received" || $Status=="Deposited" || $Status=="Transferred")
		{
			if($Bank_Idjovo==$Bank_Id && $Checkrokada==$Cheque_Amount)
			{
				echo '<script>alert("Bank and amount same");</script>';
			}
			elseif($Bank_Idjovo==$Bank_Id && $Checkrokada!=$Cheque_Amount)
			{
	  echo '<script>alert("Bank same and amount different");</script>';
			}
			elseif($Bank_Idjovo!=$Bank_Id && $Checkrokada!=$Cheque_Amount)
			{
				echo '<script>alert("Bank and amount differrent");</script>';
			}
			elseif($Bank_Idjovo!=$Bank_Id && $Checkrokada==$Cheque_Amount)
			{
				echo '<script>alert("Bank different and amount same");</script>';
			}
	  $selbank = "select Bank_Id,Current_Balance from bank_details where Bank_Name = '$Bank_Id'";
$selbankexe = mysql_query($selbank);
$selbankfetch = mysql_fetch_array($selbankexe);
	
$updatedcurr_balance = $selbankfetch['Current_Balance']+$Cheque_Amount;
 $updcurrbalance = "update bank_details set Current_Balance = '$updatedcurr_balance' where Bank_Name = '$Bank_Id'";
	   mysql_query($updcurrbalance);
		}
	   }
   elseif($selpettychecknum==1)
   {
	    echo '<script>alert("1");</script>';
	    $query1 = mysql_query("update other_credit_details set Subject = '$Subject', Description = '$Description', Payment_Type = '$Payment_Type', Bank_Id = '$Bank_Id', Cheque_No = '$Cheque_No', Date = '$Date1',Cheque_Amount = '$Cheque_Amount', Entry_Date = '$Entry_Date', Entry_Id = '$Entry_Id', Status = '$Status' where Petty_Id = '$Petty_Id'") or die(mysql_error());
	  
	    $particular = $Subject.'<br/>'.$Description.'<br/>(Other-Credit ID : '.$Petty_Id.')<br/>By '.$Payment_Type;
		$updaccount = "update accounts set Bank_Id = '$Bank_Id', Date = '$Date1', Particular = '$particular', Cheque_No = '$Cheque_No', Credit = '$Cheque_Amount', Debit = '0.00', Status = '$Status' where Id = '$Petty_Id' and For_S = 'Other Credit'";
		mysql_query($updaccount);
		
		 $selbank = "select Bank_Id,Current_Balance from bank_details where Bank_Name = '$Bank_Id'";
$selbankexe = mysql_query($selbank);
$selbankfetch = mysql_fetch_array($selbankexe);

	   if($Cheque_Amount==$Checkrokada)
	{

	 echo '<script>alert("equallllll");</script>';	
	 if($Bank_Idjovo==$Bank_Id && $Checkrokada==$Cheque_Amount)
			{
				echo '<script>alert("Bank and amount same");</script>';
			}
			elseif($Bank_Idjovo==$Bank_Id && $Checkrokada!=$Cheque_Amount)
			{
	  echo '<script>alert("Bank same and amount different");</script>';
			}
			elseif($Bank_Idjovo!=$Bank_Id && $Checkrokada!=$Cheque_Amount)
			{
				echo '<script>alert("Bank and amount differrent");</script>';
			}
			elseif($Bank_Idjovo!=$Bank_Id && $Checkrokada==$Cheque_Amount)
			{
				echo '<script>alert("Bank different and amount same");</script>';
			}
	}
	elseif($Cheque_Amount>$Checkrokada)
	{
		
		$remamingresult = $Cheque_Amount-$Checkrokada;
		$updatedcurr_balance = $selbankfetch['Current_Balance']+$remamingresult;
		 $updcurrbalance = "update bank_details set Current_Balance = '$updatedcurr_balance' where Bank_Name = '$Bank_Id'";
	      mysql_query($updcurrbalance);
	   echo '<script>alert("greaterrrr");</script>';
	   if($Bank_Idjovo==$Bank_Id && $Checkrokada==$Cheque_Amount)
			{
				echo '<script>alert("Bank and amount same");</script>';
			}
			elseif($Bank_Idjovo==$Bank_Id && $Checkrokada!=$Cheque_Amount)
			{
	  echo '<script>alert("Bank same and amount different");</script>';
			}
			elseif($Bank_Idjovo!=$Bank_Id && $Checkrokada!=$Cheque_Amount)
			{
				echo '<script>alert("Bank and amount differrent");</script>';
			}
			elseif($Bank_Idjovo!=$Bank_Id && $Checkrokada==$Cheque_Amount)
			{
				echo '<script>alert("Bank different and amount same");</script>';
			}
	}
	elseif($Cheque_Amount<$Checkrokada)
	{
		
		$remamingresult = $Checkrokada-$Cheque_Amount;
		$updatedcurr_balance = $selbankfetch['Current_Balance']-$remamingresult;
		 $updcurrbalance = "update bank_details set Current_Balance = '$updatedcurr_balance' where Bank_Name = '$Bank_Id'";
	     mysql_query($updcurrbalance);
	    echo '<script>alert("lowerrrr");</script>';
		if($Bank_Idjovo==$Bank_Id && $Checkrokada==$Cheque_Amount)
			{
				echo '<script>alert("Bank and amount same");</script>';
			}
			elseif($Bank_Idjovo==$Bank_Id && $Checkrokada!=$Cheque_Amount)
			{
	  echo '<script>alert("Bank same and amount different");</script>';
			}
			elseif($Bank_Idjovo!=$Bank_Id && $Checkrokada!=$Cheque_Amount)
			{
				echo '<script>alert("Bank and amount differrent");</script>';
			}
			elseif($Bank_Idjovo!=$Bank_Id && $Checkrokada==$Cheque_Amount)
			{
				echo '<script>alert("Bank different and amount same");</script>';
			}
	}
   }
   ////////////////////////
	  
   /////////////////////////////
	   }
   elseif($Payment_Type=="Cash")
   {
	  
	   $selpettycheck = "select Status from other_credit_details where Petty_Id = '$Petty_Id' and Status = 'Received'";
   $selpettycheckexe = mysql_query($selpettycheck);
   $selpettychecknum = mysql_num_rows($selpettycheckexe);
   if($selpettychecknum==0)
   {   			   
 
		
		if($Status=="Received")
		{
			
	  $selbank = "select Cash_Id,Current_Amount from cash_capital where Cash_Id = '1'";
$selbankexe = mysql_query($selbank);
$selbankfetch = mysql_fetch_array($selbankexe);

if($selbankfetch['Current_Amount']>=$Cheque_Amount)
{	

$query1 = mysql_query("update other_credit_details set Subject = '$Subject', Description = '$Description', Payment_Type = '$Payment_Type', Bank_Id = '$Bank_Id', Cheque_No = '$Cheque_No', Date = '$Date1',Cheque_Amount = '$Cheque_Amount', Entry_Date = '$Entry_Date', Entry_Id = '$Entry_Id', Status = '$Status' where Petty_Id = '$Petty_Id'") or die(mysql_error());
	  
	    $particular = $Subject.'<br/>'.$Description.'<br/>(Other-Credit ID : '.$Petty_Id.')<br/>By '.$Payment_Type;
		$updaccount = "update accounts set Bank_Id = '$Bank_Id', Date = '$Date1', Particular = '$particular', Cheque_No = '$Cheque_No', Credit = '$Cheque_Amount', Debit = '0.00', Status = '$Status' where Id = '$Petty_Id' and For_S = 'Other Credit'";
		mysql_query($updaccount);
		
$updatedcurr_balance = $selbankfetch['Current_Amount']+$Cheque_Amount;
 $updcurrbalance = "update cash_capital set Current_Amount = '$updatedcurr_balance' where Cash_Id = '1'";
	   mysql_query($updcurrbalance);
	   
	    echo '<script>alert("Other-Credit transaction updated successfully....");</script>';
  echo '<script>close();</script>';
  
		}
		else
		{
			echo '<script>alert("You do not have sufficient cash capital, please check cash capital first!")</script>';	
			 echo '<script>close();</script>';
		}
	   
		}
	   }
   elseif($selpettychecknum==1)
   {
	   
		
		 $selbank = "select Cash_Id,Current_Amount from cash_capital where Cash_Id = '1'";
$selbankexe = mysql_query($selbank);
$selbankfetch = mysql_fetch_array($selbankexe);
       
	   
	   if($selbankfetch['Current_Amount']>=$Cheque_Amount)
{
	
	 $query1 = mysql_query("update other_credit_details set Subject = '$Subject', Description = '$Description', Payment_Type = '$Payment_Type', Bank_Id = '$Bank_Id', Cheque_No = '$Cheque_No', Date = '$Date1',Cheque_Amount = '$Cheque_Amount', Entry_Date = '$Entry_Date', Entry_Id = '$Entry_Id', Status = '$Status' where Petty_Id = '$Petty_Id'") or die(mysql_error());
	  
	    $particular = $Subject.'<br/>'.$Description.'<br/>(Other-Credit ID : '.$Petty_Id.')<br/>By '.$Payment_Type;
		$updaccount = "update accounts set Bank_Id = '$Bank_Id', Date = '$Date1', Particular = '$particular', Cheque_No = '$Cheque_No', Credit = '$Cheque_Amount', Debit = '0.00', Status = '$Status' where Id = '$Petty_Id' and For_S = 'Other Credit'";
		mysql_query($updaccount);
		
	   if($Cheque_Amount==$Checkrokada)
	{

	 echo '<script>alert("equallllll");</script>';	
	}
	elseif($Cheque_Amount>$Checkrokada)
	{
		
		$remamingresult = $Cheque_Amount-$Checkrokada;
		$updatedcurr_balance = $selbankfetch['Current_Amount']+$remamingresult;
		 $updcurrbalance = "update cash_capital set Current_Amount = '$updatedcurr_balance' where Cash_Id = '1'";
	      mysql_query($updcurrbalance);
	   echo '<script>alert("greaterrrr");</script>';
	}
	elseif($Cheque_Amount<$Checkrokada)
	{
		
		$remamingresult = $Checkrokada-$Cheque_Amount;
		$updatedcurr_balance = $selbankfetch['Current_Amount']-$remamingresult;
		 $updcurrbalance = "update cash_capital set Current_Amount = '$updatedcurr_balance' where Cash_Id = '1'";
	     mysql_query($updcurrbalance);
	    echo '<script>alert("lowerrrr");</script>';
	}
	
	 echo '<script>alert("Other-Credit transaction updated successfully....");</script>';
  echo '<script>close();</script>';
  
}
else
{
	echo '<script>alert("You do not have sufficient cash capital, please check cash capital first!")</script>';	
	 echo '<script>close();</script>';
}

   }
	  ////////////////////////////////////////////////////////
   }
			//////////////////////////////////////////////////
		}
		if($Payment_Typejovo!=$Payment_Type)
		{
			echo '<script>alert("not same");</script>';
		
		if($Payment_Type!="Cash")
	   {
   
   $selpettycheck = "select Status,Bank_Id from other_credit_details where Petty_Id = '$Petty_Id' and Status in ('Cleared','Received','Deposited','Transferred')";
   $selpettycheckexe = mysql_query($selpettycheck);
   $selpettychecknum = mysql_num_rows($selpettycheckexe);
   $selpettycheckfetch = mysql_fetch_array($selpettycheckfetch);
   if($selpettychecknum==0)
   {   			   
   echo '<script>alert("0");</script>';
 $query1 = mysql_query("update other_credit_details set Subject = '$Subject', Description = '$Description', Payment_Type = '$Payment_Type', Bank_Id = '$Bank_Id', Cheque_No = '$Cheque_No', Date = '$Date1',Cheque_Amount = '$Cheque_Amount', Entry_Date = '$Entry_Date', Entry_Id = '$Entry_Id', Status = '$Status' where Petty_Id = '$Petty_Id'") or die(mysql_error());
	  
	    $particular = $Subject.'<br/>'.$Description.'<br/>(Other-Credit ID : '.$Petty_Id.')<br/>By '.$Payment_Type;
		$updaccount = "update accounts set Bank_Id = '$Bank_Id', Date = '$Date1', Particular = '$particular', Cheque_No = '$Cheque_No', Credit = '$Cheque_Amount', Debit = '0.00', Status = '$Status' where Id = '$Petty_Id' and For_S = 'Other Credit'";
		mysql_query($updaccount);
		
		if($Status=="Cleared" || $Status=="Received" || $Status=="Deposited" || $Status=="Transferred")
		{
			if($Bank_Idjovo==$Bank_Id && $Checkrokada==$Cheque_Amount)
			{
				echo '<script>alert("Bank and amount same");</script>';
			}
			elseif($Bank_Idjovo==$Bank_Id && $Checkrokada!=$Cheque_Amount)
			{
	  echo '<script>alert("Bank same and amount different");</script>';
			}
			elseif($Bank_Idjovo!=$Bank_Id && $Checkrokada!=$Cheque_Amount)
			{
				echo '<script>alert("Bank and amount differrent");</script>';
			}
			elseif($Bank_Idjovo!=$Bank_Id && $Checkrokada==$Cheque_Amount)
			{
				echo '<script>alert("Bank different and amount same");</script>';
			}
		}
	   }
   elseif($selpettychecknum==1)
   {
	     echo '<script>alert("1");</script>';
	    $query1 = mysql_query("update other_credit_details set Subject = '$Subject', Description = '$Description', Payment_Type = '$Payment_Type', Bank_Id = '$Bank_Id', Cheque_No = '$Cheque_No', Date = '$Date1',Cheque_Amount = '$Cheque_Amount', Entry_Date = '$Entry_Date', Entry_Id = '$Entry_Id', Status = '$Status' where Petty_Id = '$Petty_Id'") or die(mysql_error());
	  
	    $particular = $Subject.'<br/>'.$Description.'<br/>(Other-Credit ID : '.$Petty_Id.')<br/>By '.$Payment_Type;
		$updaccount = "update accounts set Bank_Id = '$Bank_Id', Date = '$Date1', Particular = '$particular', Cheque_No = '$Cheque_No', Credit = '$Cheque_Amount', Debit = '0.00', Status = '$Status' where Id = '$Petty_Id' and For_S = 'Other Credit'";
		mysql_query($updaccount);
		
		 $selbank = "select Bank_Id,Current_Balance from bank_details where Bank_Name = '$Bank_Id'";
$selbankexe = mysql_query($selbank);
$selbankfetch = mysql_fetch_array($selbankexe);
    
	
	   if($Cheque_Amount==$Checkrokada)
	{
  
	 echo '<script>alert("equallllll");</script>';	
	 if($Bank_Idjovo==$Bank_Id && $Checkrokada==$Cheque_Amount)
			{
				echo '<script>alert("Bank and amount same");</script>';
			}
			elseif($Bank_Idjovo==$Bank_Id && $Checkrokada!=$Cheque_Amount)
			{
	  echo '<script>alert("Bank same and amount different");</script>';
			}
			elseif($Bank_Idjovo!=$Bank_Id && $Checkrokada!=$Cheque_Amount)
			{
				echo '<script>alert("Bank and amount differrent");</script>';
			}
			elseif($Bank_Idjovo!=$Bank_Id && $Checkrokada==$Cheque_Amount)
			{
				echo '<script>alert("Bank different and amount same");</script>';
			}
	}
	elseif($Cheque_Amount>$Checkrokada)
	{
		
		$remamingresult = $Cheque_Amount-$Checkrokada;
		$updatedcurr_balance = $selbankfetch['Current_Balance']+$remamingresult;
		 $updcurrbalance = "update bank_details set Current_Balance = '$updatedcurr_balance' where Bank_Name = '$Bank_Id'";
	      mysql_query($updcurrbalance);
	   echo '<script>alert("greaterrrr");</script>';
	   if($Bank_Idjovo==$Bank_Id && $Checkrokada==$Cheque_Amount)
			{
				echo '<script>alert("Bank and amount same");</script>';
			}
			elseif($Bank_Idjovo==$Bank_Id && $Checkrokada!=$Cheque_Amount)
			{
	  echo '<script>alert("Bank same and amount different");</script>';
			}
			elseif($Bank_Idjovo!=$Bank_Id && $Checkrokada!=$Cheque_Amount)
			{
				echo '<script>alert("Bank and amount differrent");</script>';
			}
			elseif($Bank_Idjovo!=$Bank_Id && $Checkrokada==$Cheque_Amount)
			{
				echo '<script>alert("Bank different and amount same");</script>';
			}
	}
	elseif($Cheque_Amount<$Checkrokada)
	{
		
		$remamingresult = $Checkrokada-$Cheque_Amount;
		$updatedcurr_balance = $selbankfetch['Current_Balance']-$remamingresult;
		 $updcurrbalance = "update bank_details set Current_Balance = '$updatedcurr_balance' where Bank_Name = '$Bank_Id'";
	     mysql_query($updcurrbalance);
	    echo '<script>alert("lowerrrr");</script>';
		if($Bank_Idjovo==$Bank_Id && $Checkrokada==$Cheque_Amount)
			{
				echo '<script>alert("Bank and amount same");</script>';
			}
			elseif($Bank_Idjovo==$Bank_Id && $Checkrokada!=$Cheque_Amount)
			{
	  echo '<script>alert("Bank same and amount different");</script>';
			}
			elseif($Bank_Idjovo!=$Bank_Id && $Checkrokada!=$Cheque_Amount)
			{
				echo '<script>alert("Bank and amount differrent");</script>';
			}
			elseif($Bank_Idjovo!=$Bank_Id && $Checkrokada==$Cheque_Amount)
			{
				echo '<script>alert("Bank different and amount same");</script>';
			}
	}
   }
   ////////////////////////
	  
   /////////////////////////////
	   }
   elseif($Payment_Type=="Cash")
   {
	  
	   $selpettycheck = "select Status from other_credit_details where Petty_Id = '$Petty_Id' and Status = 'Received'";
   $selpettycheckexe = mysql_query($selpettycheck);
   $selpettychecknum = mysql_num_rows($selpettycheckexe);
   if($selpettychecknum==0)
   {   			   
 
		
		if($Status=="Received")
		{
			
	  $selbank = "select Cash_Id,Current_Amount from cash_capital where Cash_Id = '1'";
$selbankexe = mysql_query($selbank);
$selbankfetch = mysql_fetch_array($selbankexe);

if($selbankfetch['Current_Amount']>=$Cheque_Amount)
{	

$query1 = mysql_query("update other_credit_details set Subject = '$Subject', Description = '$Description', Payment_Type = '$Payment_Type', Bank_Id = '$Bank_Id', Cheque_No = '$Cheque_No', Date = '$Date1',Cheque_Amount = '$Cheque_Amount', Entry_Date = '$Entry_Date', Entry_Id = '$Entry_Id', Status = '$Status' where Petty_Id = '$Petty_Id'") or die(mysql_error());
	  
	    $particular = $Subject.'<br/>'.$Description.'<br/>(Other-Credit ID : '.$Petty_Id.')<br/>By '.$Payment_Type;
		$updaccount = "update accounts set Bank_Id = '$Bank_Id', Date = '$Date1', Particular = '$particular', Cheque_No = '$Cheque_No', Credit = '$Cheque_Amount', Debit = '0.00', Status = '$Status' where Id = '$Petty_Id' and For_S = 'Other Credit'";
		mysql_query($updaccount);
		
$updatedcurr_balance = $selbankfetch['Current_Amount']+$Cheque_Amount;
 $updcurrbalance = "update cash_capital set Current_Amount = '$updatedcurr_balance' where Cash_Id = '1'";
	   mysql_query($updcurrbalance);
	   
	    echo '<script>alert("Other-Credit transaction updated successfully....");</script>';
  echo '<script>close();</script>';
  
		}
		else
		{
			echo '<script>alert("You do not have sufficient cash capital, please check cash capital first!")</script>';	
			 echo '<script>close();</script>';
		}
	   
		}
	   }
   elseif($selpettychecknum==1)
   {
	   
		
		 $selbank = "select Cash_Id,Current_Amount from cash_capital where Cash_Id = '1'";
$selbankexe = mysql_query($selbank);
$selbankfetch = mysql_fetch_array($selbankexe);
       
	   
	   if($selbankfetch['Current_Amount']>=$Cheque_Amount)
{
	
	 $query1 = mysql_query("update other_credit_details set Subject = '$Subject', Description = '$Description', Payment_Type = '$Payment_Type', Bank_Id = '$Bank_Id', Cheque_No = '$Cheque_No', Date = '$Date1',Cheque_Amount = '$Cheque_Amount', Entry_Date = '$Entry_Date', Entry_Id = '$Entry_Id', Status = '$Status' where Petty_Id = '$Petty_Id'") or die(mysql_error());
	  
	    $particular = $Subject.'<br/>'.$Description.'<br/>(Other-Credit ID : '.$Petty_Id.')<br/>By '.$Payment_Type;
		$updaccount = "update accounts set Bank_Id = '$Bank_Id', Date = '$Date1', Particular = '$particular', Cheque_No = '$Cheque_No', Credit = '$Cheque_Amount', Debit = '0.00', Status = '$Status' where Id = '$Petty_Id' and For_S = 'Other Credit'";
		mysql_query($updaccount);
		
	   if($Cheque_Amount==$Checkrokada)
	{

	 echo '<script>alert("equallllll");</script>';	
	}
	elseif($Cheque_Amount>$Checkrokada)
	{
		
		$remamingresult = $Cheque_Amount-$Checkrokada;
		$updatedcurr_balance = $selbankfetch['Current_Amount']+$remamingresult;
		 $updcurrbalance = "update cash_capital set Current_Amount = '$updatedcurr_balance' where Cash_Id = '1'";
	      mysql_query($updcurrbalance);
	   echo '<script>alert("greaterrrr");</script>';
	}
	elseif($Cheque_Amount<$Checkrokada)
	{
		
		$remamingresult = $Checkrokada-$Cheque_Amount;
		$updatedcurr_balance = $selbankfetch['Current_Amount']-$remamingresult;
		 $updcurrbalance = "update cash_capital set Current_Amount = '$updatedcurr_balance' where Cash_Id = '1'";
	     mysql_query($updcurrbalance);
	    echo '<script>alert("lowerrrr");</script>';
	}
	
	 echo '<script>alert("Other-Credit transaction updated successfully....");</script>';
  echo '<script>close();</script>';
  
}
else
{
	echo '<script>alert("You do not have sufficient cash capital, please check cash capital first!")</script>';	
	 echo '<script>close();</script>';
}

   }
	  ////////////////////////////////////////////////////////
   }
	//////////////////////////////////////////
	}
	
 
 
	}}

		////////////////////////////////////////////////////////////////////
	}}
if(isset($_REQUEST['submit']))
{
	if(!isset($_SESSION['User']))
	{}
	else
	{
$Petty_Id = getNewPettyID();
$Subject = $_POST['Subject'];
$Description = $_POST['Description'];
$Payment_Type = $_POST['Payment_Type'];
$Bank_Id = $_POST['Bank_Id'];
$Cheque_No = $_POST['Cheque_No'];
$Cheque_Amount = $_POST['Cheque_Amount'];
$Date1 = $_POST['Date1'];
$Status = $_POST['Status'];
	$Entry_Date = date('Y-m-d      h:i:s a');
$Entry_Id = $row_result['Registration_Id'];



      $query1 = mysql_query("INSERT INTO `other_credit_details` (`Petty_Id`, `Subject`, `Description`,`Payment_Type`, `Bank_Id`, `Cheque_No`,`Date`,`Cheque_Amount`,`Entry_Date`, `Entry_Id`,`Status`) VALUES ($Petty_Id, '$Subject', '$Description','$Payment_Type', '$Bank_Id', '$Cheque_No','$Date1','$Cheque_Amount','$Entry_Date','$Entry_Id','$Status')") or die(mysql_error());
	   $insertGoTo = "othercreditlistpage";
	   
	   
	   $particular = $Subject.'<br/>'.$Description.'<br/>(Other-Credit ID : '.$Petty_Id.')<br/>By '.$Payment_Type;
	   $insaccount = "insert into accounts(Account_Id,Id,Date,Bank_Id,Particular,Cheque_No,Debit,Credit,For_S,Status) values(NULL,'$Petty_Id','$Date1','$Bank_Id','$particular','$Cheque_No','0.00','$Cheque_Amount','Other Credit','$Status')";
	   mysql_query($insaccount);
	   
	   if($Payment_Type!="Cash")
	   {
		   if($Status=="Cleared" || $Status=="Received" || $Status=="Deposited" || $Status=="Transferred")
		   {
	   $selbank = "select Bank_Id,Current_Balance from bank_details where Bank_Name = '$Bank_Id'";
$selbankexe = mysql_query($selbank);
$selbankfetch = mysql_fetch_array($selbankexe);

$updatedcurr_balance = $selbankfetch['Current_Balance']+$Cheque_Amount;
       
	   $updcurrbalance = "update bank_details set Current_Balance = '$updatedcurr_balance' where Bank_Name = '$Bank_Id'";
	   mysql_query($updcurrbalance);
		   }
	   }
	   elseif($Payment_Type=='Cash')
	   {
		    if($Status=="Received")
		   {
			   if($selbankfetch['Current_Amount']>=$Cheque_Amount)
{	
	   $selbank = "select Cash_Id,Current_Amount from cash_capital where Cash_Id = '1'";
$selbankexe = mysql_query($selbank);
$selbankfetch = mysql_fetch_array($selbankexe);

 
$updatedcurr_balance = $selbankfetch['Current_Amount']+$Cheque_Amount;
       
	   $updcurrbalance = "update cash_capital set Current_Amount = '$updatedcurr_balance' where Cash_Id = '1'";
	   mysql_query($updcurrbalance);
	   
	    echo '<script>alert("Other-Credit transaction made successfully....");</script>';
  header("refresh:3;othercreditdetail?action=insert");
}
else
{
echo '<script>alert("You do not have sufficient cash capital, please check cash capital first!")</script>';	
 echo '<script>close();</script>';
}
		   }
	   }
 
  
	}}
?>
<!DOCTYPE html>
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<head>
      <meta charset="UTF-8" />
    <title>Shingori Textile</title>
     <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
    <noscript>
    <style> html {display:none; }</style>
     <META HTTP-EQUIV="Refresh" CONTENT="0; URL=javascripterror.php">
    </noscript>
    <link rel="shortcut icon" href="Icons/st85.png">
 <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="assets/css/main.css" />
</head>
<body>
<?php include("sidemenu.php"); ?>
                <div class="inner">
                    <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" align="center">OTHER - CREDIT ENTRY</h1>
                </div>
            </div>
<div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <div id="div-1" class="accordion-body collapse in body">
            <form class="form-horizontal" method="post" name="form1" <?php if($action =='insert') { ?>onsubmit="if(submitting){alert('The record is being submitted, please wait a moment...');submit.disabled = true;return false;}if(Pettyins(this)){submit.value = 'Submitting...';submitting = true;return true;}return false;" <?php } elseif($action=='update') { ?> onsubmit="if(submitting){alert('The record is being updated, please wait a moment...');update.disabled = true;return false;}if(Pettyins(this)){update.value = 'Updating...';submitting = true;return true;}return false;"<?php } ?>>
            <input type="text" name="Petty_Id" id="Petty_Id" value="<?php echo $Petty_Id;?>"/>
                 <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Subject :</label>
                    <div class="col-lg-8">
                      <input type="text" id="Subject" placeholder="" class="form-control"  name="Subject" value="<?php echo $Subject;?>" />
                      <span id="error1" style="color:#F00";></span>
                    </div>
                </div><input type="text" name="Checkrokada" value="<?php echo $row['Cheque_Amount']; ?>"/><input type="text" name="Payment_Typejovo" value="<?php echo $row['Payment_Type']; ?>"/><input type="text" name="Bank_Idjovo" value="<?php echo $row['Bank_Id']; ?>"/>
                 <div class="form-group">
                    <label for="autosize" class="control-label col-lg-4">Description :</label>
                    <div class="col-lg-8">
                      <textarea name="Description" class="form-control" id="autosize"><?php echo $Description; ?></textarea>
                      <span id="auto" style="color:#F00";></span>
                    </div>
</div>
<div class="form-group">
    <label class="control-label col-lg-4">Payment Type :</label>
    <div class="col-lg-8">
      <select name="Payment_Type" class="form-control" id="Payment_Typepetty">
      <option value="" >--Select--</option>
       <?php if($action=='update') 
	{
		?>
     <option value="Cheque" <?php if($Payment_Typeshow == 'Cheque') { echo "selected"; } ?>>Cheque</option>
    <option value="Cash" <?php if($Payment_Typeshow == 'Cash') { echo "selected"; } ?>>Cash</option>
    <option value="Bank_Interest" <?php if($Payment_Typeshow == 'Bank_Interest') { echo "selected"; } ?>>Bank Interest</option>
    <option value="Other_Interest" <?php if($Payment_Typeshow == 'Other_Interest') { echo "selected"; } ?>>Other Interest</option>
     <option value="RTGS" <?php if($Payment_Typeshow == 'RTGS') { echo "selected"; } ?>>RTGS</option>
       <option value="Online" <?php if($Payment_Typeshow == 'Online') { echo "selected"; } ?>>Online</option>
                    <?php }
					elseif($action=='insert')
					{
						?>
                       <option value="Cheque">Cheque</option>
    <option value="Cash">Cash</option>
    <option value="Bank_Interest">Bank Interest</option>
    <option value="Other_Interest">Other Interest</option>
    <option value="RTGS">RTGS</option>
    <option value="Online">Online</option> 
                        <?php }
					?>
      </select>
      <div id="Invoice_Chq_Date">
</div> 
      </div>
</div>
<?php if($action=='update')
{
	?>
<div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Entry Date :</label>
                    <div class="col-lg-8">
                      <input type="text" id="Entry_Date" placeholder="" class="form-control"  name="Entry_Date" value="<?php echo $Entry_Date;?>" readonly/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="text2" class="control-label col-lg-4">Entry #Id :</label>
                    <div class="col-lg-8">
                      <input type="text" id="Entry_Id" placeholder="" class="form-control"  name="Entry_Id" value="<?php echo $Entry_Id;?>" readonly/>
                    </div><span id="balance1"></span>
                </div>
                <?php } ?>
                                        <div style="text-align:center" class="form-actions no-margin-bottom">
                                            <a href="pettylistpage"><input type="button" value="Back" class="btn btn-inverse btn-lg " /></a><?php if($action=='insert')
{
                                            if($days_remaining<=0)
{
	echo "<strong style='color:#F00;'>* Please renew your website</strong>";
}
                                            if($days_remaining<=0)
{}
elseif($days_remaining>0)
{
?>	
	                                    <input type="submit" value="Submit" name="submit" class="btn btn-primary btn-lg " /><?php } } elseif($action=='update')
{
	?><input type="submit" value="Update" name="update" class="btn btn-primary btn-lg " /> <?php } ?>
                                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
                    </div>
   <?php include("footer.php"); ?>
     <script src="assets/js/shortcut.js"></script>
<script src="assets/js/googleapi.js"></script>
<script>
         $(document).ready(function () {
    $("#Payment_Typepetty").change(function(){
		t1=$("#Payment_Typepetty").val();
		var q="?Payment_Typepetty="+t1+"&Bank_Id=<?php echo $bank_replace; ?>&Cheque_No=<?php echo $Cheque_No; ?>&Cheque_Amount=<?php echo $Cheque_Amountshow; ?>&Date1=<?php echo $Date1; ?>&Petty_Id=<?php echo $Petty_Id;?>";
		
		$("#Invoice_Chq_Date").load("othercreditpayment_type.php"+q);
	});
	$("#Payment_Typepetty").val("<?php echo $Payment_Typeshow; ?>");
		t5="<?php echo $Payment_Typeshow; ?>";
		var q="?Payment_Typepetty="+t5+"&Bank_Id=<?php echo $bank_replace; ?>&Cheque_No=<?php echo $Cheque_No; ?>&Cheque_Amount=<?php echo $Cheque_Amountshow; ?>&Date1=<?php echo $Date1; ?>&Petty_Id=<?php echo $Petty_Id;?>";
		
		$("#Invoice_Chq_Date").load("othercreditpayment_type.php"+q);

});

<?php include("shortcutkeys.php");?>
</script>
<script src="assets/js/othercreditdetail.js"></script>
<script src="assets/plugins/jasny/js/bootstrap-inputmask.js"></script>
</body>
</html>
<?php
function getNewPettyID()
{
	include("databaseconnect.php");
	$sql = "select max(Petty_Id)+1 from other_credit_details";
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
	if($row != null && $row[0] > 0)
		{
			$new_id =  $row[0];
		}
		else
		{
			$new_id = '1';
		}
		return $new_id;
	}
ob_flush(); ?>