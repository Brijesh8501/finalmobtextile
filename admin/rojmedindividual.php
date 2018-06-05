<?php include("logcode.php");  error_reporting(0);
include("databaseconnect.php");
//////////////////// January ///////////////////////////////////////////
if(isset($_REQUEST['January'])){
$bobbinjan = "select Trans_Amt,Trans_Invoice_No,Trans_Date,Entry_Date from transactions_bobbin where Trans_Date between '2016-01-01' and '2016-01-31'";
$bobbinjanexe = mysql_query($bobbinjan);
$beamjan = "select Trans_Amt,Trans_Invoice_No,Trans_Date,Entry_Date from transactions_beam1 where Trans_Date between '2016-01-01' and '2016-01-31'";
$beamjanexe = mysql_query($beamjan);
$takajan = "select Trans_Amt,Trans_Invoice_No,Trans_Date,Entry_Date from transactions_taka where Trans_Date between '2016-01-01' and '2016-01-31'";
$takajanexe = mysql_query($takajan);
$sareejan = "select Trans_Amt,Trans_Invoice_No,Trans_Date,Entry_Date from transactions_saree where Trans_Date between '2016-01-01' and '2016-01-31'";
$sareejanexe = mysql_query($sareejan);
}
//////////////////// February ///////////////////////////////////////////
if(isset($_REQUEST['February'])){
$bobbinfeb = "select Trans_Amt,Trans_Invoice_No,Trans_Date,Entry_Date from transactions_bobbin where Trans_Date between '2016-02-01' and '2016-02-29'";
$bobbinfebexe = mysql_query($bobbinfeb);
$beamfeb = "select Trans_Amt,Trans_Invoice_No,Trans_Date,Entry_Date from transactions_beam1 where Trans_Date between '2016-02-01' and '2016-02-29'";
$beamfebexe = mysql_query($beamfeb);
$takafeb = "select Trans_Amt,Trans_Invoice_No,Trans_Date,Entry_Date from transactions_taka where Trans_Date between '2016-02-01' and '2016-02-29'";
$takafebexe = mysql_query($takafeb);
$sareefeb = "select Trans_Amt,Trans_Invoice_No,Trans_Date,Entry_Date from transactions_saree where Trans_Date between '2016-02-01' and '2016-02-29'";
$sareefebexe = mysql_query($sareefeb);
}
//////////////////// March ///////////////////////////////////////////
if(isset($_REQUEST['March'])){
$bobbinMarch = "select Trans_Amt,Trans_Invoice_No,Trans_Date,Entry_Date from transactions_bobbin where Trans_Date between '2016-03-01' and '2016-03-31'";
$bobbinMarchexe = mysql_query($bobbinMarch);
$beamMarch = "select Trans_Amt,Trans_Invoice_No,Trans_Date,Entry_Date from transactions_beam1 where Trans_Date between '2016-03-01' and '2016-03-31'";
$beamMarchexe = mysql_query($beamMarch);
$takaMarch = "select Trans_Amt,Trans_Invoice_No,Trans_Date,Entry_Date from transactions_taka where Trans_Date between '2016-03-01' and '2016-03-31'";
$takaMarchexe = mysql_query($takaMarch);
$sareeMarch = "select Trans_Amt,Trans_Invoice_No,Trans_Date,Entry_Date from transactions_saree where Trans_Date between '2016-03-01' and '2016-03-31'";
$sareeMarchexe = mysql_query($sareeMarch);
}
//////////////////// April ///////////////////////////////////////////
if(isset($_REQUEST['April'])){
$bobbinApril = "select Trans_Amt,Trans_Invoice_No,Trans_Date,Entry_Date from transactions_bobbin where Trans_Date between '2016-04-01' and '2016-04-30'";
$bobbinAprilexe = mysql_query($bobbinApril);
$beamApril = "select Trans_Amt,Trans_Invoice_No,Trans_Date,Entry_Date from transactions_beam1 where Trans_Date between '2016-04-01' and '2016-04-30'";
$beamAprilexe = mysql_query($beamApril);
$takaApril = "select Trans_Amt,Trans_Invoice_No,Trans_Date,Entry_Date from transactions_taka where Trans_Date between '2016-04-01' and '2016-04-30'";
$takaAprilexe = mysql_query($takaApril);
$sareeApril = "select Trans_Amt,Trans_Invoice_No,Trans_Date,Entry_Date from transactions_saree where Trans_Date between '2016-04-01' and '2016-04-30'";
$sareeAprilexe = mysql_query($sareeApril);
}
//////////////////// May ///////////////////////////////////////////
if(isset($_REQUEST['May'])){
$bobbinMay = "select Trans_Amt,Trans_Invoice_No,Trans_Date,Entry_Date from transactions_bobbin where Trans_Date between '2016-05-01' and '2016-05-31'";
$bobbinMayexe = mysql_query($bobbinMay);
$beamMay = "select Trans_Amt,Trans_Invoice_No,Trans_Date,Entry_Date from transactions_beam1 where Trans_Date between '2016-05-01' and '2016-05-31'";
$beamMayexe = mysql_query($beamMay);
$takaMay = "select Trans_Amt,Trans_Invoice_No,Trans_Date,Entry_Date from transactions_taka where Trans_Date between '2016-05-01' and '2016-05-31'";
$takaMayexe = mysql_query($takaMay);
$sareeMay = "select Trans_Amt,Trans_Invoice_No,Trans_Date,Entry_Date from transactions_saree where Trans_Date between '2016-05-01' and '2016-05-31'";
$sareeMayexe = mysql_query($sareeMay);
}
//////////////////// June ///////////////////////////////////////////
if(isset($_REQUEST['June'])){
$bobbinJune = "select Trans_Amt,Trans_Invoice_No,Trans_Date,Entry_Date from transactions_bobbin where Trans_Date between '2016-06-01' and '2016-06-30'";
$bobbinJuneexe = mysql_query($bobbinJune);
$beamJune = "select Trans_Amt,Trans_Invoice_No,Trans_Date,Entry_Date from transactions_beam1 where Trans_Date between '2016-06-01' and '2016-06-30'";
$beamJuneexe = mysql_query($beamJune);
$takaJune = "select Trans_Amt,Trans_Invoice_No,Trans_Date,Entry_Date from transactions_taka where Trans_Date between '2016-06-01' and '2016-06-30'";
$takaJuneexe = mysql_query($takaJune);
$sareeJune = "select Trans_Amt,Trans_Invoice_No,Trans_Date,Entry_Date from transactions_saree where Trans_Date between '2016-06-01' and '2016-06-30'";
$sareeJuneexe = mysql_query($sareeJune);
}
//////////////////// July ///////////////////////////////////////////
if(isset($_REQUEST['July'])){
$bobbinJuly = "select Trans_Amt,Trans_Invoice_No,Trans_Date,Entry_Date from transactions_bobbin where Trans_Date between '2016-07-01' and '2016-07-31'";
$bobbinJulyexe = mysql_query($bobbinJuly);
$beamJuly = "select Trans_Amt,Trans_Invoice_No,Trans_Date,Entry_Date from transactions_beam1 where Trans_Date between '2016-07-01' and '2016-07-31'";
$beamJulyexe = mysql_query($beamJuly);
$takaJuly = "select Trans_Amt,Trans_Invoice_No,Trans_Date,Entry_Date from transactions_taka where Trans_Date between '2016-07-01' and '2016-07-31'";
$takaJulyexe = mysql_query($takaJuly);
$sareeJuly = "select Trans_Amt,Trans_Invoice_No,Trans_Date,Entry_Date from transactions_saree where Trans_Date between '2016-07-01' and '2016-07-31'";
$sareeJulyexe = mysql_query($sareeJuly);
}
//////////////////// August ///////////////////////////////////////////
if(isset($_REQUEST['August'])){
$bobbinAugust = "select Trans_Amt,Trans_Invoice_No,Trans_Date,Entry_Date from transactions_bobbin where Trans_Date between '2016-08-01' and '2016-08-31'";
$bobbinAugustexe = mysql_query($bobbinAugust);
$beamAugust = "select Trans_Amt,Trans_Invoice_No,Trans_Date,Entry_Date from transactions_beam1 where Trans_Date between '2016-08-01' and '2016-08-31'";
$beamAugustexe = mysql_query($beamAugust);
$takaAugust = "select Trans_Amt,Trans_Invoice_No,Trans_Date,Entry_Date from transactions_taka where Trans_Date between '2016-08-01' and '2016-08-31'";
$takaAugustexe = mysql_query($takaAugust);
$sareeAugust = "select Trans_Amt,Trans_Invoice_No,Trans_Date,Entry_Date from transactions_saree where Trans_Date between '2016-08-01' and '2016-08-31'";
$sareeAugustexe = mysql_query($sareeAugust);
}
//////////////////// Sept ///////////////////////////////////////////
if(isset($_REQUEST['September'])){
$bobbinSept = "select Trans_Amt,Trans_Invoice_No,Trans_Date,Entry_Date from transactions_bobbin where Trans_Date between '2016-09-01' and '2016-09-30'";
$bobbinSeptexe = mysql_query($bobbinSept);
$beamSept = "select Trans_Amt,Trans_Invoice_No,Trans_Date,Entry_Date from transactions_beam1 where Trans_Date between '2016-09-01' and '2016-09-30'";
$beamSeptexe = mysql_query($beamSept);
$takaSept = "select Trans_Amt,Trans_Invoice_No,Trans_Date,Entry_Date from transactions_taka where Trans_Date between '2016-09-01' and '2016-09-30'";
$takaSeptexe = mysql_query($takaSept);
$sareeSept = "select Trans_Amt,Trans_Invoice_No,Trans_Date,Entry_Date from transactions_saree where Trans_Date between '2016-09-01' and '2016-09-30'";
$sareeSeptexe = mysql_query($sareeSept);
}
//////////////////// Oct ///////////////////////////////////////////
if(isset($_REQUEST['October'])){
$bobbinOct = "select Trans_Amt,Trans_Invoice_No,Trans_Date,Entry_Date from transactions_bobbin where Trans_Date between '2016-10-01' and '2016-10-31'";
$bobbinOctexe = mysql_query($bobbinOct);
$beamOct = "select Trans_Amt,Trans_Invoice_No,Trans_Date,Entry_Date from transactions_beam1 where Trans_Date between '2016-10-01' and '2016-10-31'";
$beamOctexe = mysql_query($beamOct);
$takaOct = "select Trans_Amt,Trans_Invoice_No,Trans_Date,Entry_Date from transactions_taka where Trans_Date between '2016-10-01' and '2016-10-31'";
$takaOctexe = mysql_query($takaOct);
$sareeOct = "select Trans_Amt,Trans_Invoice_No,Trans_Date,Entry_Date from transactions_saree where Trans_Date between '2016-10-01' and '2016-10-31'";
$sareeOctexe = mysql_query($sareeOct);
}
//////////////////// Nov ///////////////////////////////////////////
if(isset($_REQUEST['November'])){
$bobbinNov = "select Trans_Amt,Trans_Invoice_No,Trans_Date,Entry_Date from transactions_bobbin where Trans_Date between '2016-11-01' and '2016-11-30'";
$bobbinNovexe = mysql_query($bobbinNov);
$beamNov = "select Trans_Amt,Trans_Invoice_No,Trans_Date,Entry_Date from transactions_beam1 where Trans_Date between '2016-11-01' and '2016-11-30'";
$beamNovexe = mysql_query($beamNov);
$takaNov = "select Trans_Amt,Trans_Invoice_No,Trans_Date,Entry_Date from transactions_taka where Trans_Date between '2016-11-01' and '2016-11-30'";
$takaNovexe = mysql_query($takaNov);
$sareeNov = "select Trans_Amt,Trans_Invoice_No,Trans_Date,Entry_Date from transactions_saree where Trans_Date between '2016-11-01' and '2016-11-30'";
$sareeNovexe = mysql_query($sareeNov);
}
//////////////////// Dec ///////////////////////////////////////////
if(isset($_REQUEST['December'])){
$bobbinDec = "select Trans_Amt,Trans_Invoice_No,Trans_Date,Entry_Date from transactions_bobbin where Trans_Date between '2016-12-01' and '2016-12-31'";
$bobbinDecexe = mysql_query($bobbinDec);
$beamDec = "select Trans_Amt,Trans_Invoice_No,Trans_Date,Entry_Date from transactions_beam1 where Trans_Date between '2016-12-01' and '2016-12-31'";
$beamDecexe = mysql_query($beamDec);
$takaDec = "select Trans_Amt,Trans_Invoice_No,Trans_Date,Entry_Date from transactions_taka where Trans_Date between '2016-12-01' and '2016-12-31'";
$takaDecexe = mysql_query($takaDec);
$sareeDec = "select Trans_Amt,Trans_Invoice_No,Trans_Date,Entry_Date from transactions_saree where Trans_Date between '2016-12-01' and '2016-12-31'";
$sareeDecexe = mysql_query($sareeDec);
}
//////////////////// Jan2017 ///////////////////////////////////////////
if(isset($_REQUEST['January2017'])){
$bobbinJan2017 = "select Trans_Amt,Trans_Invoice_No,Trans_Date,Entry_Date from transactions_bobbin where Trans_Date between '2017-01-01' and '2017-01-31'";
$bobbinJan2017exe = mysql_query($bobbinJan2017);
$beamJan2017 = "select Trans_Amt,Trans_Invoice_No,Trans_Date,Entry_Date from transactions_beam1 where Trans_Date between '2017-01-01' and '2017-01-31'";
$beamJan2017exe = mysql_query($beamJan2017);
$takaJan2017 = "select Trans_Amt,Trans_Invoice_No,Trans_Date,Entry_Date from transactions_taka where Trans_Date between '2017-01-01' and '2017-01-31'";
$takaJan2017exe = mysql_query($takaJan2017);
$sareeJan2017 = "select Trans_Amt,Trans_Invoice_No,Trans_Date,Entry_Date from transactions_saree where Trans_Date between '2017-01-01' and '2017-01-31'";
$sareeJan2017exe = mysql_query($sareeJan2017);
}
//////////////////// Feb2017 ///////////////////////////////////////////
if(isset($_REQUEST['February2017'])){
$bobbinFeb2017 = "select Trans_Amt,Trans_Invoice_No,Trans_Date,Entry_Date from transactions_bobbin where Trans_Date between '2017-02-01' and '2017-02-28'";
$bobbinFeb2017exe = mysql_query($bobbinFeb2017);
$beamFeb2017 = "select Trans_Amt,Trans_Invoice_No,Trans_Date,Entry_Date from transactions_beam1 where Trans_Date between '2017-02-01' and '2017-02-28'";
$beamFeb2017exe = mysql_query($beamFeb2017);
$takaFeb2017 = "select Trans_Amt,Trans_Invoice_No,Trans_Date,Entry_Date from transactions_taka where Trans_Date between '2017-02-01' and '2017-02-28'";
$takaFeb2017exe = mysql_query($takaFeb2017);
$sareeFeb2017 = "select Trans_Amt,Trans_Invoice_No,Trans_Date,Entry_Date from transactions_saree where Trans_Date between '2017-02-01' and '2017-02-28'";
$sareeFeb2017exe = mysql_query($sareeFeb2017);
}
//////////////////// March2017 ///////////////////////////////////////////
if(isset($_REQUEST['March2017'])){
$bobbinMarch2017 = "select Trans_Amt,Trans_Invoice_No,Trans_Date,Entry_Date from transactions_bobbin where Trans_Date between '2017-03-01' and '2017-03-31'";
$bobbinMarch2017exe = mysql_query($bobbinMarch2017);
$beamMarch2017 = "select Trans_Amt,Trans_Invoice_No,Trans_Date,Entry_Date from transactions_beam1 where Trans_Date between '2017-03-01' and '2017-03-31'";
$beamMarch2017exe = mysql_query($beamMarch2017);
$takaMarch2017 = "select Trans_Amt,Trans_Invoice_No,Trans_Date,Entry_Date from transactions_taka where Trans_Date between '2017-03-01' and '2016-03-31'";
$takaMarch2017exe = mysql_query($takaMarch2017);
$sareeMarch2017 = "select Trans_Amt,Trans_Invoice_No,Trans_Date,Entry_Date from transactions_saree where Trans_Date between '2017-03-01' and '2017-03-31'";
$sareeMarch2017exe = mysql_query($sareeMarch2017);
}
//////////////////// Petty ////////////////////////////////////
//////////////////// January ///////////////////////////////////////////
if(isset($_REQUEST['January'])){
$pettyjan = "select Subject,Description,Cheque_Amount,Date,Entry_Date from petty_details where Date between '2016-01-01' and '2016-01-31'";
$pettyjanexe = mysql_query($pettyjan);
$pettyjanfetch = mysql_fetch_array($pettyjanexe);
//////////////////// February ///////////////////////////////////////////
$pettyfeb = "select Subject,Description,Cheque_Amount,Date,Entry_Date from petty_details where Date between '2016-02-01' and '2016-02-29'";
$pettyfebexe = mysql_query($pettyfeb);
}
//////////////////// March ///////////////////////////////////////////
if(isset($_REQUEST['March'])){
$pettyMarch = "select Subject,Description,Cheque_Amount,Date,Entry_Date from petty_details where Date between '2016-03-01' and '2016-03-31'";
$pettyMarchexe = mysql_query($pettyMarch);
}
//////////////////// April ///////////////////////////////////////////
if(isset($_REQUEST['April'])){
$pettyApril = "select Subject,Description,Cheque_Amount,Date,Entry_Date from petty_details where Date between '2016-04-01' and '2016-04-30'";
$pettyAprilexe = mysql_query($pettyApril);
}
//////////////////// May ///////////////////////////////////////////
if(isset($_REQUEST['May'])){
$pettyMay = "select Subject,Description,Cheque_Amount,Date,Entry_Date from petty_details where Date between '2016-05-01' and '2016-05-31'";
$pettyMayexe = mysql_query($pettyMay);
}
//////////////////// June ///////////////////////////////////////////
if(isset($_REQUEST['June'])){
$pettyJune = "select Subject,Description,Cheque_Amount,Date,Entry_Date from petty_details where Date between '2016-06-01' and '2016-06-30'";
$pettyJuneexe = mysql_query($pettyJune);
}
//////////////////// July ///////////////////////////////////////////
if(isset($_REQUEST['July'])){
$pettyJuly = "select Subject,Description,Cheque_Amount,Date,Entry_Date from petty_details where Date between '2016-07-01' and '2016-07-31'";
$pettyJulyexe = mysql_query($pettyJuly);
}
//////////////////// August ///////////////////////////////////////////
if(isset($_REQUEST['August'])){
$pettyAugust = "select Subject,Description,Cheque_Amount,Date,Entry_Date from petty_details where Date between '2016-08-01' and '2016-08-31'";
$pettyAugustexe = mysql_query($pettyAugust);
}
//////////////////// Sept ///////////////////////////////////////////
if(isset($_REQUEST['September'])){
$pettySept = "select Subject,Description,Cheque_Amount,Date,Entry_Date from petty_details where Date between '2016-09-01' and '2016-09-30'";
$pettySeptexe = mysql_query($pettySept);
}
//////////////////// Oct ///////////////////////////////////////////
if(isset($_REQUEST['October'])){
$pettyOct = "select Subject,Description,Cheque_Amount,Date,Entry_Date from petty_details where Date between '2016-10-01' and '2016-10-31'";
$pettyOctexe = mysql_query($pettyOct);
}
//////////////////// Nov ///////////////////////////////////////////
if(isset($_REQUEST['November'])){
$pettyNov = "select Subject,Description,Cheque_Amount,Date,Entry_Date from petty_details where Date between '2016-11-01' and '2016-11-30'";
$pettyNovexe = mysql_query($pettyNov);
}
//////////////////// Dec ///////////////////////////////////////////
if(isset($_REQUEST['December'])){
$pettyDec = "select Subject,Description,Cheque_Amount,Date,Entry_Date from petty_details where Date between '2016-12-01' and '2016-12-31'";
$pettyDecexe = mysql_query($pettyDec);
}
//////////////////// Jan2017 ///////////////////////////////////////////
if(isset($_REQUEST['January2017'])){
$pettyJan2017 = "select Subject,Description,Cheque_Amount,Date,Entry_Date from petty_details where Date between '2017-01-01' and '2017-01-31'";
$pettyJan2017exe = mysql_query($pettyJan2017);
}
//////////////////// Feb2017 ///////////////////////////////////////////
if(isset($_REQUEST['February2017'])){
$pettyFeb2017 = "select Subject,Description,Cheque_Amount,Date,Entry_Date from petty_details where Date between '2017-02-01' and '2017-02-28'";
$pettyFeb2017exe = mysql_query($pettyFeb2017);
}
///////////////////// March2017 /////////////////////////////////////////////////
if(isset($_REQUEST['Macth2017'])){
$pettyMarch2017 = "select Subject,Description,Cheque_Amount,Date,Entry_Date from petty_details where Date between '2017-03-01' and '2017-03-31'";
$pettyMarch2017exe = mysql_query($pettyMarch2017);
}
if(isset($_REQUEST['action']))
{
	$action = strtoupper($_REQUEST['action']);
}
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
    <style> 
#div-1{
    width: 1300px;
    height: 450px;
    overflow-x: scroll;
    overflow-y: scroll;
}
</style>
</head>
<body>   
<?php include("sidemenu.php"); ?>
                <div class="inner">
                    <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" align="center"><?php echo $action;?></h1>
                </div>
            </div>
<div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <div id="div-1" class="table-responsive">
        <?php if(isset($_REQUEST['January'])){?>
            <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                    <tr>
                                    <th>Beam</th>
                                    </tr>
                                    </thead>
                                      <tbody>
                                      <?php $i = 0;
									  $i++; while($beamjanfetch = mysql_fetch_array($beamjanexe)){?>
                                        <tr>
                                        <td><?php echo $i++;?></td>
                                         <td><?php echo "#Invoice No - ".$beamjanfetch['Trans_Invoice_No'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Amount - '.$beamjanfetch['Trans_Amt'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Date - '.$beamjanfetch['Trans_Date'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Entry Date - '.$beamjanfetch['Entry_Date'];?></td>
                                         </tr><?php $tot_beamt = $tot_beamt + $beamjanfetch['Trans_Amt'];} ?>
                                        <tr>
                                        <td>Total Amount :</td>
										<td><?php if($tot_beamt!=""){echo moneyFormatIndia($tot_beamt);} else { echo "0.00";}?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                 <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                    <tr>
                                    <th>Bobbin</th>
                                    </tr>
                                    </thead>
                                      <tbody>
                                      <?php $i = 0;
									  $i++; while($bobbinjanfetch = mysql_fetch_array($bobbinjanexe)){?>
                                        <tr>
                                        <td><?php echo $i++;?></td>
                                         <td><?php echo "#Invoice No - ".$bobbinjanfetch['Trans_Invoice_No'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Amount - '.$bobbinjanfetch['Trans_Amt'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Date - '.$bobbinjanfetch['Trans_Date'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Entry Date - '.$bobbinjanfetch['Entry_Date'];?></td>
                                        </tr><?php $tot_boamt = $tot_boamt + $bobbinjanfetch['Trans_Amt'];} ?>
                                        <tr>
                                        <td>Total Amount :</td>
										<td><?php if($tot_boamt!=""){echo moneyFormatIndia($tot_boamt);} else { echo "0.00";}?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                 <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                    <tr>
                                    <th>Taka</th>
                                    </tr>
                                    </thead>
                                      <tbody>
                                      <?php $i = 0;
									  $i++; while($takajanfetch = mysql_fetch_array($takajanexe)){?>
                                        <tr>
                                        <td><?php echo $i++;?></td>
                                         <td><?php echo "#Invoice No - ".$takajanfetch['Trans_Invoice_No'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Amount - '.$takajanfetch['Trans_Amt'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Date - '.$takajanfetch['Trans_Date'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Entry Date - '.$takajanfetch['Entry_Date'];?></td>
                                        </tr><?php $tot_taamt = $tot_taamt + $takajanfetch['Trans_Amt'];} ?>
                                        <tr>
                                        <td>Total Amount :</td>
										<td><?php if($tot_taamt!=""){echo moneyFormatIndia($tot_taamt);} else { echo "0.00";}?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                    <tr>
                                    <th>Saree</th>
                                    </tr>
                                    </thead>
                                      <tbody>
                                      <?php $i = 0;
									  $i++; while($sareejanfetch = mysql_fetch_array($sareejanexe)){?>
                                        <tr>
                                        <td><?php echo $i++;?></td>
                                         <td><?php echo "#Invoice No - ".$sareejanfetch['Trans_Invoice_No'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Amount - '.$sareejanfetch['Trans_Amt'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Date - '.$sareejanfetch['Trans_Date'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Entry Date - '.$sareejanfetch['Entry_Date'];?></td>
                                       </tr><?php $tot_saamt = $tot_saamt + $sareejanfetch['Trans_Amt'];} ?>
                                        <tr>
                                        <td>Total Amount :</td>
										<td><?php if($tot_saamt!=""){echo moneyFormatIndia($tot_saamt);} else { echo "0.00";}?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                 <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                    <tr>
                                    <th>Expenses</th>
                                    </tr>
                                    </thead>
                                      <tbody>
                                      <?php $i = 0;
									  $i++; while($pettyjanfetch = mysql_fetch_array($pettyjanexe)){?>
                                        <tr>
                                        <td><?php echo $i++;?></td>
                                        <td><?php echo "#Subject - ".$pettyjanfetch['Subject'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Description - '.$pettyjanfetch['Description'].
'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Amount - '.$pettyjanfetch['Cheque_Amount'].
'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Date - '.$pettyjanfetch['Date'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Entry Date - '.$pettyjanfetch['Entry_Date'];?></td>
                                         </tr><?php $tot_peamt = $tot_peamt + $pettyjanfetch['Cheque_Amount'];} ?>
                                        <tr>
                                        <td>Total Amount :</td>
										<td><?php if($tot_peamt!=""){echo moneyFormatIndia($tot_peamt);} else { echo "0.00";}?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <?php }elseif(isset($_REQUEST['February'])){?>
                                 <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                    <tr>
                                    <th>Beam</th>
                                    </tr>
                                    </thead>
                                      <tbody>
                                      <?php $i = 0;
									  $i++; while($beamfebfetch = mysql_fetch_array($beamfebexe)){?>
                                        <tr>
                                        <td><?php echo $i++;?></td>
                                        <td><?php echo "#Invoice No - ".$beamfebfetch['Trans_Invoice_No'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Amount - '.$beamfebfetch['Trans_Amt'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Date - '.$beamfebfetch['Trans_Date'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Entry Date - '.$beamfebfetch['Entry_Date'];?></td>
                                        </tr><?php $tot_beamt = $tot_beamt + $beamfebfetch['Trans_Amt'];} ?>
                                        <tr>
                                        <td>Total Amount :</td>
										<td><?php if($tot_beamt!=""){echo moneyFormatIndia($tot_beamt);} else { echo "0.00";}?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                 <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                    <tr>
                                    <th>Bobbin</th>
                                    </tr>
                                    </thead>
                                      <tbody>
                                      <?php $i = 0;
									  $i++; while($bobbinfebfetch = mysql_fetch_array($bobbinfebexe)){?>
                                        <tr>
                                        <td><?php echo $i++;?></td>
                                        <td><?php echo "#Invoice No - ".$bobbinfebfetch['Trans_Invoice_No'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Amount - '.$bobbinfebfetch['Trans_Amt'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Date - '.$bobbinfebfetch['Trans_Date'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Entry Date - '.$bobbinfebfetch['Entry_Date'];?></td>
                                       </tr><?php $tot_boamt = $tot_boamt + $bobbinfebfetch['Trans_Amt'];} ?>
                                        <tr>
                                        <td>Total Amount :</td>
										<td><?php if($tot_boamt!=""){echo moneyFormatIndia($tot_boamt);} else { echo "0.00";}?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                 <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                    <tr>
                                    <th>Taka</th>
                                    </tr>
                                    </thead>
                                      <tbody>
                                      <?php $i = 0;
									  $i++; while($takafebfetch = mysql_fetch_array($takafebexe)){?>
                                        <tr>
                                        <td><?php echo $i++;?></td>
                                        <td><?php echo "#Invoice No - ".$takafebfetch['Trans_Invoice_No'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Amount - '.$takafebfetch['Trans_Amt'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Date - '.$takafebfetch['Trans_Date'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Entry Date - '.$takafebfetch['Entry_Date'];?></td>
                                       </tr><?php $tot_taamt = $tot_taamt + $takafebfetch['Trans_Amt'];} ?>
                                        <tr>
                                        <td>Total Amount :</td>
										<td><?php if($tot_taamt!=""){echo moneyFormatIndia($tot_taamt);} else { echo "0.00";}?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                 <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                    <tr>
                                    <th>Saree</th>
                                    </tr>
                                    </thead>
                                      <tbody>
                                      <?php $i = 0;
									  $i++; while($sareefebfetch = mysql_fetch_array($sareefebexe)){?>
                                        <tr>
                                        <td><?php echo $i++;?></td>
                                        <td><?php echo "#Invoice No - ".$sareefebfetch['Trans_Invoice_No'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Amount - '.$sareefebfetch['Trans_Amt'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Date - '.$sareefebfetch['Trans_Date'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Entry Date - '.$sareefebfetch['Entry_Date'];?></td>
                                        </tr><?php $tot_saamt = $tot_saamt + $sareefebfetch['Trans_Amt'];} ?>
                                        <tr>
                                        <td>Total Amount :</td>
										<td><?php if($tot_saamt!=""){echo moneyFormatIndia($tot_saamt);} else { echo "0.00";}?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                 <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                    <tr>
                                    <th>Expenses</th>
                                    </tr>
                                    </thead>
                                      <tbody>
                                      <?php $i = 0;
									  $i++; while($pettyfebfetch = mysql_fetch_array($pettyfebexe)){?>
                                        <tr>
                                        <td><?php echo $i++;?></td>
                                        <td><?php echo "#Subject - ".$pettyfebfetch['Subject'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Description - '.$pettyfebfetch['Description'].
'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Amount - '.$pettyfebfetch['Cheque_Amount'].
'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Date - '.$pettyfebfetch['Date'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Entry Date - '.$pettyfebfetch['Entry_Date'];?></td>
                                        </tr><?php $tot_peamt = $tot_peamt + $pettyfebfetch['Cheque_Amount'];} ?>
                                        <tr>
                                        <td>Total Amount :</td>
										<td><?php if($tot_peamt!=""){echo moneyFormatIndia($tot_peamt);} else { echo "0.00";}?></td>
                                        </tr>
                                    </tbody>
                                </table>
								<?php } elseif(isset($_REQUEST['March'])){?>
                                 <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                    <tr>
                                    <th>Beam</th>
                                    </tr>
                                    </thead>
                                      <tbody>
                                      <?php $i = 0;
									  $i++; while($beamMarchfetch = mysql_fetch_array($beamMarchexe)){?>
                                        <tr>
                                        <td><?php echo $i++;?></td>
                                        <td><?php echo "#Invoice No - ".$beamMarchfetch['Trans_Invoice_No'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Amount - '.$beamMarchfetch['Trans_Amt'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Date - '.$beamMarchfetch['Trans_Date'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Entry Date - '.$beamMarchfetch['Entry_Date'];?></td>
                                        </tr><?php $tot_beamt = $tot_beamt + $beamMarchfetch['Trans_Amt'];} ?>
                                        <tr>
                                        <td>Total Amount :</td>
										<td><?php if($tot_beamt!=""){echo moneyFormatIndia($tot_beamt);} else { echo "0.00";}?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                 <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                    <tr>
                                    <th>Bobbin</th>
                                    </tr>
                                    </thead>
                                      <tbody>
                                      <?php $i = 0;
									  $i++; while($bobbinMarchfetch = mysql_fetch_array($bobbinMarchexe)){?>
                                        <tr>
                                        <td><?php echo $i++;?></td>
                                        <td><?php echo "#Invoice No - ".$bobbinMarchfetch['Trans_Invoice_No'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Amount - '.$bobbinMarchfetch['Trans_Amt'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Date - '.$bobbinMarchfetch['Trans_Date'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Entry Date - '.$bobbinMarchfetch['Entry_Date'];?></td>
                                      </tr><?php $tot_boamt = $tot_boamt + $boMarchfetch['Trans_Amt'];} ?>
                                        <tr>
                                        <td>Total Amount :</td>
										<td><?php if($tot_boamt!=""){echo moneyFormatIndia($tot_boamt);} else { echo "0.00";}?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                 <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                    <tr>
                                    <th>Taka</th>
                                    </tr>
                                    </thead>
                                      <tbody>
                                      <?php $i = 0;
									  $i++; while($takaMarchfetch = mysql_fetch_array($takaMarchexe)){?>
                                        <tr>
                                        <td><?php echo $i++;?></td>
                                        <td><?php echo "#Invoice No - ".$takaMarchfetch['Trans_Invoice_No'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Amount - '.$takaMarchfetch['Trans_Amt'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Date - '.$takaMarchfetch['Trans_Date'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Entry Date - '.$takaMarchfetch['Entry_Date'];?></td>
                                       </tr><?php $tot_taamt = $tot_taamt + $takaMarchfetch['Trans_Amt'];} ?>
                                        <tr>
                                        <td>Total Amount :</td>
										<td><?php if($tot_taamt!=""){echo moneyFormatIndia($tot_taamt);} else { echo "0.00";}?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                 <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                    <tr>
                                    <th>Saree</th>
                                    </tr>
                                    </thead>
                                      <tbody>
                                      <?php $i = 0;
									  $i++; while($sareeMarchfetch = mysql_fetch_array($sareeMarchexe)){?>
                                        <tr>
                                        <td><?php echo $i++;?></td>
                                        <td><?php echo "#Invoice No - ".$sareeMarchfetch['Trans_Invoice_No'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Amount - '.$sareeMarchfetch['Trans_Amt'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Date - '.$sareeMarchfetch['Trans_Date'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Entry Date - '.$sareeMarchfetch['Entry_Date'];?></td>
                                       </tr><?php $tot_saamt = $tot_saamt + $sareeMarchfetch['Trans_Amt'];} ?>
                                        <tr>
                                        <td>Total Amount :</td>
										<td><?php if($tot_saamt!=""){echo moneyFormatIndia($tot_saamt);} else { echo "0.00";}?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                 <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                    <tr>
                                    <th>Expenses</th>
                                    </tr>
                                    </thead>
                                      <tbody>
                                      <?php $i = 0;
									  $i++; while($pettyMarchfetch = mysql_fetch_array($pettyMarchexe)){?>
                                        <tr>
                                        <td><?php echo $i++;?></td>
                                        <td><?php echo "#Subject - ".$pettyMarchfetch['Subject'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Description - '.$pettyMarchfetch['Description'].
'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Amount - '.$pettyMarchfetch['Cheque_Amount'].
'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Date - '.$pettyMarchfetch['Date'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Entry Date - '.$pettyMarchfetch['Entry_Date'];?></td>
                                       </tr><?php $tot_peamt = $tot_peamt + $pettyMarchfetch['Cheque_Amount'];} ?>
                                        <tr>
                                        <td>Total Amount :</td>
										<td><?php if($tot_peamt!=""){echo moneyFormatIndia($tot_peamt);} else { echo "0.00";}?></td>
                                        </tr>
                                    </tbody>
                                </table>
								<?php } elseif(isset($_REQUEST['April'])){?>
                                 <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                    <tr>
                                    <th>Beam</th>
                                    </tr>
                                    </thead>
                                      <tbody>
                                      <?php $i = 0;
									  $i++; while($beamAprilfetch = mysql_fetch_array($beamAprilexe)){?>
                                        <tr>
                                        <td><?php echo $i++;?></td>
                                        <td><?php echo "#Invoice No - ".$beamAprilfetch['Trans_Invoice_No'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Amount - '.$beamAprilfetch['Trans_Amt'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Date - '.$beamAprilfetch['Trans_Date'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Entry Date - '.$beamAprilfetch['Entry_Date'];?></td>
                                       </tr><?php $tot_beamt = $tot_beamt + $beamAprilfetch['Trans_Amt'];} ?>
                                        <tr>
                                        <td>Total Amount :</td>
										<td><?php if($tot_beamt!=""){echo moneyFormatIndia($tot_beamt);} else { echo "0.00";}?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                 <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                    <tr>
                                    <th>Bobbin</th>
                                    </tr>
                                    </thead>
                                      <tbody>
                                      <?php $i = 0;
									  $i++; while($bobbinAprilfetch = mysql_fetch_array($bobbinAprilexe)){?>
                                        <tr>
                                        <td><?php echo $i++;?></td>
                                        <td><?php echo "#Invoice No - ".$bobbinAprilfetch['Trans_Invoice_No'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Amount - '.$bobbinAprilfetch['Trans_Amt'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Date - '.$bobbinAprilfetch['Trans_Date'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Entry Date - '.$bobbinAprilfetch['Entry_Date'];?></td>
                                        </tr><?php $tot_boamt = $tot_boamt + $bobbinAprilfetch['Trans_Amt'];} ?>
                                        <tr>
                                        <td>Total Amount :</td>
										<td><?php if($tot_boamt!=""){echo moneyFormatIndia($tot_boamt);} else { echo "0.00";}?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                 <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                    <tr>
                                    <th>Taka</th>
                                    </tr>
                                    </thead>
                                      <tbody>
                                      <?php $i = 0;
									  $i++; while($takaAprilfetch = mysql_fetch_array($takaAprilexe)){?>
                                        <tr>
                                        <td><?php echo $i++;?></td>
                                        <td><?php echo "#Invoice No - ".$takaAprilfetch['Trans_Invoice_No'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Amount - '.$takaAprilfetch['Trans_Amt'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Date - '.$takaAprilfetch['Trans_Date'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Entry Date - '.$takaAprilfetch['Entry_Date'];?></td>
                                      </tr><?php $tot_taamt = $tot_taamt + $takaAprilfetch['Trans_Amt'];} ?>
                                        <tr>
                                        <td>Total Amount :</td>
										<td><?php if($tot_taamt!=""){echo moneyFormatIndia($tot_taamt);} else { echo "0.00";}?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                 <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                    <tr>
                                    <th>Saree</th>
                                    </tr>
                                    </thead>
                                      <tbody>
                                      <?php $i = 0;
									  $i++; while($sareeAprilfetch = mysql_fetch_array($sareeAprilexe)){?>
                                        <tr>
                                        <td><?php echo $i++;?></td>
                                        <td><?php echo "#Invoice No - ".$sareeAprilfetch['Trans_Invoice_No'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Amount - '.$sareeAprilfetch['Trans_Amt'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Date - '.$sareeAprilfetch['Trans_Date'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Entry Date - '.$sareeAprilfetch['Entry_Date'];?></td>
                                       </tr><?php $tot_saamt = $tot_saamt + $sareeAprilfetch['Trans_Amt'];} ?>
                                        <tr>
                                        <td>Total Amount :</td>
										<td><?php if($tot_saamt!=""){echo moneyFormatIndia($tot_saamt);} else { echo "0.00";}?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                 <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                    <tr>
                                    <th>Expenses</th>
                                    </tr>
                                    </thead>
                                      <tbody>
                                      <?php $i = 0;
									  $i++; while($pettyAprilfetch = mysql_fetch_array($pettyAprilexe)){?>
                                        <tr>
                                        <td><?php echo $i++;?></td>
                                        <td><?php echo "#Subject - ".$pettyAprilfetch['Subject'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Description - '.$pettyAprilfetch['Description'].
'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Amount - '.$pettyAprilfetch['Cheque_Amount'].
'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Date - '.$pettyAprilfetch['Date'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Entry Date - '.$pettyAprilfetch['Entry_Date'];?></td>
                                       </tr><?php $tot_peamt = $tot_peamt + $pettyAprilfetch['Cheque_Amount'];} ?>
                                        <tr>
                                        <td>Total Amount :</td>
										<td><?php if($tot_peamt!=""){echo moneyFormatIndia($tot_peamt);} else { echo "0.00";}?></td>
                                        </tr>
                                    </tbody>
                                </table>
								<?php }
								elseif(isset($_REQUEST['May'])){?>
                                 <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                    <tr>
                                    <th>Beam</th>
                                    </tr>
                                    </thead>
                                      <tbody>
                                      <?php $i = 0;
									  $i++; while($beamMayfetch = mysql_fetch_array($beamMayexe)){?>
                                        <tr>
                                        <td><?php echo $i++;?></td>
                                        <td><?php echo "#Invoice No - ".$beamMayfetch['Trans_Invoice_No'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Amount - '.$beamMayfetch['Trans_Amt'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Date - '.$beamMayfetch['Trans_Date'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Entry Date - '.$beamMayfetch['Entry_Date'];?></td>
                                        </tr><?php $tot_beamt = $tot_beamt + $beamMayfetch['Trans_Amt'];} ?>
                                        <tr>
                                        <td>Total Amount :</td>
										<td><?php if($tot_beamt!=""){echo moneyFormatIndia($tot_beamt);} else { echo "0.00";}?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                 <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                    <tr>
                                    <th>Bobbin</th>
                                    </tr>
                                    </thead>
                                      <tbody>
                                      <?php $i = 0;
									  $i++; while($bobbinMayfetch = mysql_fetch_array($bobbinMayexe)){?>
                                        <tr>
                                        <td><?php echo $i++;?></td>
                                        <td><?php echo "#Invoice No - ".$bobbinMayfetch['Trans_Invoice_No'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Amount - '.$bobbinMayfetch['Trans_Amt'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Date - '.$bobbinMayfetch['Trans_Date'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Entry Date - '.$bobbinMayfetch['Entry_Date'];?></td>
                                       </tr><?php $tot_boamt = $tot_boamt + $bobbinMayfetch['Trans_Amt'];} ?>
                                        <tr>
                                        <td>Total Amount :</td>
										<td><?php if($tot_boamt!=""){echo moneyFormatIndia($tot_boamt);} else { echo "0.00";}?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                 <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                    <tr>
                                    <th>Taka</th>
                                    </tr>
                                    </thead>
                                      <tbody>
                                      <?php $i = 0;
									  $i++; while($takaMayfetch = mysql_fetch_array($takaMayexe)){?>
                                        <tr>
                                        <td><?php echo $i++;?></td>
                                        <td><?php echo "#Invoice No - ".$takaMayfetch['Trans_Invoice_No'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Amount - '.$takaMayfetch['Trans_Amt'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Date - '.$takaMayfetch['Trans_Date'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Entry Date - '.$takaMayfetch['Entry_Date'];?></td>
                                       </tr><?php $tot_taamt = $tot_taamt + $takaMayfetch['Trans_Amt'];} ?>
                                        <tr>
                                        <td>Total Amount :</td>
										<td><?php if($tot_taamt!=""){echo moneyFormatIndia($tot_taamt);} else { echo "0.00";}?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                 <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                    <tr>
                                    <th>Saree</th>
                                    </tr>
                                    </thead>
                                      <tbody>
                                      <?php $i = 0;
									  $i++; while($sareeMayfetch = mysql_fetch_array($sareeMayexe)){?>
                                        <tr>
                                        <td><?php echo $i++;?></td>
                                        <td><?php echo "#Invoice No - ".$sareeMayfetch['Trans_Invoice_No'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Amount - '.$sareeMayfetch['Trans_Amt'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Date - '.$sareeMayfetch['Trans_Date'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Entry Date - '.$sareeMayfetch['Entry_Date'];?></td>
                                        </tr><?php $tot_saamt = $tot_saamt + $sareeMayfetch['Trans_Amt'];} ?>
                                        <tr>
                                        <td>Total Amount :</td>
										<td><?php if($tot_saamt!=""){echo moneyFormatIndia($tot_saamt);} else { echo "0.00";}?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                 <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                    <tr>
                                    <th>Expenses</th>
                                    </tr>
                                    </thead>
                                      <tbody>
                                      <?php $i = 0;
									  $i++; while($pettyMayfetch = mysql_fetch_array($pettyMayexe)){?>
                                        <tr>
                                        <td><?php echo $i++;?></td>
                                        <td><?php echo "#Subject - ".$pettyMayfetch['Subject'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Description - '.$pettyMayfetch['Description'].
'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Amount - '.$pettyMayfetch['Cheque_Amount'].
'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Date - '.$pettyMayfetch['Date'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Entry Date - '.$pettyMayfetch['Entry_Date'];?></td>
                                      </tr><?php $tot_peamt = $tot_peamt + $pettyMayfetch['Cheque_Amount'];} ?>
                                        <tr>
                                        <td>Total Amount :</td>
										<td><?php if($tot_peamt!=""){echo moneyFormatIndia($tot_peamt);} else { echo "0.00";}?></td>
                                        </tr>
                                    </tbody>
                                </table>
                               <?php } elseif(isset($_REQUEST['June'])){?>
                                 <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                    <tr>
                                    <th>Beam</th>
                                    </tr>
                                    </thead>
                                      <tbody>
                                      <?php $i = 0;
									  $i++; while($beamJunefetch = mysql_fetch_array($beamJuneexe)){?>
                                        <tr>
                                        <td><?php echo $i++;?></td>
                                        <td><?php echo "#Invoice No - ".$beamjunefetch['Trans_Invoice_No'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Amount - '.$beamJunefetch['Trans_Amt'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Date - '.$beamJunefetch['Trans_Date'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Entry Date - '.$beamJunefetch['Entry_Date'];?></td>
                                       </tr><?php $tot_beamt = $tot_beamt + $beamJunefetch['Trans_Amt'];} ?>
                                        <tr>
                                        <td>Total Amount :</td>
										<td><?php if($tot_beamt!=""){echo moneyFormatIndia($tot_beamt);} else { echo "0.00";}?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                 <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                    <tr>
                                    <th>Bobbin</th>
                                    </tr>
                                    </thead>
                                      <tbody>
                                      <?php $i = 0;
									  $i++; while($bobbinJunefetch = mysql_fetch_array($bobbinJuneexe)){?>
                                        <tr>
                                        <td><?php echo $i++;?></td>
                                        <td><?php echo "#Invoice No - ".$bobbinJunefetch['Trans_Invoice_No'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Amount - '.$bobbinJunefetch['Trans_Amt'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Date - '.$bobbinJunefetch['Trans_Date'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Entry Date - '.$bobbinJunefetch['Entry_Date'];?></td>
                                        </tr><?php $tot_boamt = $tot_boamt + $bobbinJunefetch['Trans_Amt'];} ?>
                                        <tr>
                                        <td>Total Amount :</td>
										<td><?php if($tot_boamt!=""){echo moneyFormatIndia($tot_boamt);} else { echo "0.00";}?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                 <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                    <tr>
                                    <th>Taka</th>
                                    </tr>
                                    </thead>
                                      <tbody>
                                      <?php $i = 0;
									  $i++; while($takaJunefetch = mysql_fetch_array($takaJuneexe)){?>
                                        <tr>
                                        <td><?php echo $i++;?></td>
                                        <td><?php echo "#Invoice No - ".$takaJunefetch['Trans_Invoice_No'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Amount - '.$takaJunefetch['Trans_Amt'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Date - '.$takaJunefetch['Trans_Date'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Entry Date - '.$takaJunefetch['Entry_Date'];?></td>
                                        </tr><?php $tot_taamt = $tot_taamt + $takaJunefetch['Trans_Amt'];} ?>
                                        <tr>
                                        <td>Total Amount :</td>
										<td><?php if($tot_taamt!=""){echo moneyFormatIndia($tot_taamt);} else { echo "0.00";}?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                 <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                    <tr>
                                    <th>Saree</th>
                                    </tr>
                                    </thead>
                                      <tbody>
                                      <?php $i = 0;
									  $i++; while($sareeJunefetch = mysql_fetch_array($sareeJuneexe)){?>
                                        <tr>
                                        <td><?php echo $i++;?></td>
                                        <td><?php echo "#Invoice No - ".$sareeJunefetch['Trans_Invoice_No'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Amount - '.$sareeJunefetch['Trans_Amt'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Date - '.$sareeJunefetch['Trans_Date'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Entry Date - '.$sareeJunefetch['Entry_Date'];?></td>
                                        </tr><?php $tot_saamt = $tot_saamt + $sareeJunefetch['Trans_Amt'];} ?>
                                        <tr>
                                        <td>Total Amount :</td>
										<td><?php if($tot_saamt!=""){echo moneyFormatIndia($tot_saamt);} else { echo "0.00";}?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                 <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                    <tr>
                                    <th>Expenses</th>
                                    </tr>
                                    </thead>
                                      <tbody>
                                      <?php $i = 0;
									  $i++; while($pettyJunefetch = mysql_fetch_array($pettyJuneexe)){?>
                                        <tr>
                                        <td><?php echo $i++;?></td>
                                        <td><?php echo "#Subject - ".$pettyJunefetch['Subject'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Description - '.$pettyJunefetch['Description'].
'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Amount - '.$pettyJunefetch['Cheque_Amount'].
'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Date - '.$pettyJunefetch['Date'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Entry Date - '.$pettyJunefetch['Entry_Date'];?></td>
                                        </tr><?php $tot_peamt = $tot_peamt + $pettyJunefetch['Cheque_Amount'];} ?>
                                        <tr>
                                        <td>Total Amount :</td>
										<td><?php if($tot_peamt!=""){echo moneyFormatIndia($tot_peamt);} else { echo "0.00";}?></td>
                                        </tr>
                                    </tbody>
                                </table>
								<?php }elseif(isset($_REQUEST['July'])){?>
                                 <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                    <tr>
                                    <th>Beam</th>
                                    </tr>
                                    </thead>
                                      <tbody>
                                      <?php $i = 0;
									  $i++; while($beamJulyfetch = mysql_fetch_array($beamJulyexe)){?>
                                        <tr>
                                        <td><?php echo $i++;?></td>
                                        <td><?php echo "#Invoice No - ".$beamJulyfetch['Trans_Invoice_No'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Amount - '.$beamJulyfetch['Trans_Amt'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Date - '.$beamJulyfetch['Trans_Date'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Entry Date - '.$beamJulyfetch['Entry_Date'];?></td>
                                        </tr><?php $tot_beamt = $tot_beamt + $beamJulyfetch['Trans_Amt'];} ?>
                                        <tr>
                                        <td>Total Amount :</td>
										<td><?php if($tot_beamt!=""){echo moneyFormatIndia($tot_beamt);} else { echo "0.00";}?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                 <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                    <tr>
                                    <th>Bobbin</th>
                                    </tr>
                                    </thead>
                                      <tbody>
                                      <?php $i = 0;
									  $i++; while($bobbinJulyfetch = mysql_fetch_array($bobbinJulyexe)){?>
                                        <tr>
                                        <td><?php echo $i++;?></td>
                                        <td><?php echo "#Invoice No - ".$bobbinJulyfetch['Trans_Invoice_No'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Amount - '.$bobbinJulyfetch['Trans_Amt'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Date - '.$bobbinJulyfetch['Trans_Date'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Entry Date - '.$bobbinJulyfetch['Entry_Date'];?></td>
                                         </tr><?php $tot_boamt = $tot_boamt + $bobbinJulyfetch['Trans_Amt'];} ?>
                                        <tr>
                                        <td>Total Amount :</td>
										<td><?php if($tot_boamt!=""){echo moneyFormatIndia($tot_boamt);} else { echo "0.00";}?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                 <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                    <tr>
                                    <th>Taka</th>
                                    </tr>
                                    </thead>
                                      <tbody>
                                      <?php $i = 0;
									  $i++; while($takaJulyfetch = mysql_fetch_array($takaJulyexe)){?>
                                        <tr>
                                        <td><?php echo $i++;?></td>
                                        <td><?php echo "#Invoice No - ".$takaJulyfetch['Trans_Invoice_No'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Amount - '.$takaJulyfetch['Trans_Amt'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Date - '.$takaJulyfetch['Trans_Date'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Entry Date - '.$takaJulyfetch['Entry_Date'];?></td>
                                         </tr><?php $tot_taamt = $tot_taamt + $taJulyfetch['Trans_Amt'];} ?>
                                        <tr>
                                        <td>Total Amount :</td>
										<td><?php if($tot_taamt!=""){echo moneyFormatIndia($tot_taamt);} else { echo "0.00";}?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                    <tr>
                                    <th>Saree</th>
                                    </tr>
                                    </thead>
                                      <tbody>
                                      <?php $i = 0;
									  $i++; while($sareeJulyfetch = mysql_fetch_array($sareeJulyexe)){?>
                                        <tr>
                                        <td><?php echo $i++;?></td>
                                        <td><?php echo "#Invoice No - ".$sareeJulyfetch['Trans_Invoice_No'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Amount - '.$sareeJulyfetch['Trans_Amt'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Date - '.$sareeJulyfetch['Trans_Date'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Entry Date - '.$sareeJulyfetch['Entry_Date'];?></td>
                                        </tr><?php $tot_saamt = $tot_saamt + $sareeJulyfetch['Trans_Amt'];} ?>
                                        <tr>
                                        <td>Total Amount :</td>
										<td><?php if($tot_saamt!=""){echo moneyFormatIndia($tot_saamt);} else { echo "0.00";}?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                 <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                    <tr>
                                    <th>Expenses</th>
                                    </tr>
                                    </thead>
                                      <tbody>
                                      <?php $i = 0;
									  $i++; while($pettyJulyfetch = mysql_fetch_array($pettyJulyexe)){?>
                                        <tr>
                                        <td><?php echo $i++;?></td>
                                        <td><?php echo "#Subject - ".$pettyJulyfetch['Subject'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Description - '.$pettyJulyfetch['Description'].
'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Amount - '.$pettyJulyfetch['Cheque_Amount'].
'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Date - '.$pettyJulyfetch['Date'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Entry Date - '.$pettyJulyfetch['Entry_Date'];?></td>
                                        </tr><?php $tot_peamt = $tot_peamt + $pettyJulyfetch['Cheque_Amount'];} ?>
                                        <tr>
                                        <td>Total Amount :</td>
										<td><?php if($tot_peamt!=""){echo moneyFormatIndia($tot_peamt);} else { echo "0.00";}?></td>
                                        </tr>
                                    </tbody>
                                </table>
								<?php }elseif(isset($_REQUEST['August'])){?>
                                 <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                    <tr>
                                    <th>Beam</th>
                                    </tr>
                                    </thead>
                                      <tbody>
                                      <?php $i = 0;
									  $i++; while($beamAugustfetch = mysql_fetch_array($beamAugustexe)){?>
                                        <tr>
                                        <td><?php echo $i++;?></td>
                                        <td><?php echo "#Invoice No - ".$beamAugustfetch['Trans_Invoice_No'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Amount - '.$beamAugustfetch['Trans_Amt'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Date - '.$beamAugustfetch['Trans_Date'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Entry Date - '.$beamAugustfetch['Entry_Date'];?></td>
                                        </tr><?php $tot_beamt = $tot_beamt + $beamAugustfetch['Trans_Amt'];} ?>
                                        <tr>
                                        <td>Total Amount :</td>
										<td><?php if($tot_beamt!=""){echo moneyFormatIndia($tot_beamt);} else { echo "0.00";}?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                 <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                    <tr>
                                    <th>Bobbin</th>
                                    </tr>
                                    </thead>
                                      <tbody>
                                      <?php $i = 0;
									  $i++; while($bobbinAugustfetch = mysql_fetch_array($bobbinAugustexe)){?>
                                        <tr>
                                        <td><?php echo $i++;?></td>
                                        <td><?php echo "#Invoice No - ".$bobbinAugustfetch['Trans_Invoice_No'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Amount - '.$bobbinAugustfetch['Trans_Amt'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Date - '.$bobbinAugustfetch['Trans_Date'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Entry Date - '.$bobbinAugustfetch['Entry_Date'];?></td>
                                        </tr><?php $tot_boamt = $tot_boamt + $bobbinAugustfetch['Trans_Amt'];} ?>
                                        <tr>
                                        <td>Total Amount :</td>
										<td><?php if($tot_boamt!=""){echo moneyFormatIndia($tot_boamt);} else { echo "0.00";}?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                 <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                    <tr>
                                    <th>Taka</th>
                                    </tr>
                                    </thead>
                                      <tbody>
                                      <?php $i = 0;
									  $i++; while($takaAugustfetch = mysql_fetch_array($takaAugustexe)){?>
                                        <tr>
                                        <td><?php echo $i++;?></td>
                                        <td><?php echo "#Invoice No - ".$takaAugustfetch['Trans_Invoice_No'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Amount - '.$takaAugustfetch['Trans_Amt'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Date - '.$takaAugustfetch['Trans_Date'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Entry Date - '.$takaAugustfetch['Entry_Date'];?></td>
                                      </tr><?php $tot_taamt = $tot_taamt + $takaAugustfetch['Trans_Amt'];} ?>
                                        <tr>
                                        <td>Total Amount :</td>
										<td><?php if($tot_taamt!=""){echo moneyFormatIndia($tot_taamt);} else { echo "0.00";}?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                 <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                    <tr>
                                    <th>Saree</th>
                                    </tr>
                                    </thead>
                                      <tbody>
                                      <?php $i = 0;
									  $i++; while($sareeAugustfetch = mysql_fetch_array($sareeAugustexe)){?>
                                        <tr>
                                        <td><?php echo $i++;?></td>
                                        <td><?php echo "#Invoice No - ".$sareeAugustfetch['Trans_Invoice_No'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Amount - '.$sareeAugustfetch['Trans_Amt'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Date - '.$sareeAugustfetch['Trans_Date'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Entry Date - '.$sareeAugustfetch['Entry_Date'];?></td>
                                         </tr><?php $tot_saamt = $tot_saamt + $sareeAugustfetch['Trans_Amt'];} ?>
                                        <tr>
                                        <td>Total Amount :</td>
										<td><?php if($tot_saamt!=""){echo moneyFormatIndia($tot_saamt);} else { echo "0.00";}?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                 <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                    <tr>
                                    <th>Expenses</th>
                                    </tr>
                                    </thead>
                                      <tbody>
                                      <?php $i = 0;
									  $i++; while($pettyAugustfetch = mysql_fetch_array($pettyAugustexe)){?>
                                        <tr>
                                        <td><?php echo $i++;?></td>
                                        <td><?php echo "#Subject - ".$pettyAugustfetch['Subject'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Description - '.$pettyAugustfetch['Description'].
'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Amount - '.$pettyAugustfetch['Cheque_Amount'].
'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Date - '.$pettyAugustfetch['Date'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Entry Date - '.$pettyAugustfetch['Entry_Date'];?></td>
                                       </tr><?php $tot_peamt = $tot_peamt + $pettyAugustfetch['Cheque_Amount'];} ?>
                                        <tr>
                                        <td>Total Amount :</td>
										<td><?php if($tot_peamt!=""){echo moneyFormatIndia($tot_peamt);} else { echo "0.00";}?></td>
                                        </tr>
                                    </tbody>
                                </table>
								<?php }elseif(isset($_REQUEST['September'])){?>
                                 <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                    <tr>
                                    <th>Beam</th>
                                    </tr>
                                    </thead>
                                      <tbody>
                                      <?php $i = 0;
									  $i++; while($beamSeptfetch = mysql_fetch_array($beamSeptexe)){?>
                                        <tr>
                                        <td><?php echo $i++;?></td>
                                        <td><?php echo "#Invoice No - ".$beamSeptfetch['Trans_Invoice_No'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Amount - '.$beamSeptfetch['Trans_Amt'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Date - '.$beamSeptfetch['Trans_Date'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Entry Date - '.$beamSeptfetch['Entry_Date'];?></td>
                                        </tr><?php $tot_beamt = $tot_beamt + $beamSeptfetch['Trans_Amt'];} ?>
                                        <tr>
                                        <td>Total Amount :</td>
										<td><?php if($tot_beamt!=""){echo moneyFormatIndia($tot_beamt);} else { echo "0.00";}?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                 <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                    <tr>
                                    <th>Bobbin</th>
                                    </tr>
                                    </thead>
                                      <tbody>
                                      <?php $i = 0;
									  $i++; while($bobbinSeptfetch = mysql_fetch_array($bobbinSeptexe)){?>
                                        <tr>
                                        <td><?php echo $i++;?></td>
                                        <td><?php echo "#Invoice No - ".$bobbinSeptfetch['Trans_Invoice_No'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Amount - '.$bobbinSeptfetch['Trans_Amt'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Date - '.$bobbinSeptfetch['Trans_Date'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Entry Date - '.$bobbinSeptfetch['Entry_Date'];?></td>
                                         </tr><?php $tot_boamt = $tot_boamt + $bobbinSeptfetch['Trans_Amt'];} ?>
                                        <tr>
                                        <td>Total Amount :</td>
										<td><?php if($tot_boamt!=""){echo moneyFormatIndia($tot_boamt);} else { echo "0.00";}?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                 <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                    <tr>
                                    <th>Taka</th>
                                    </tr>
                                    </thead>
                                      <tbody>
                                      <?php $i = 0;
									  $i++; while($takaSeptfetch = mysql_fetch_array($takaSeptexe)){?>
                                        <tr>
                                        <td><?php echo $i++;?></td>
                                        <td><?php echo "#Invoice No - ".$takaSeptfetch['Trans_Invoice_No'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Amount - '.$takaSeptfetch['Trans_Amt'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Date - '.$takaSeptfetch['Trans_Date'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Entry Date - '.$takaSeptfetch['Entry_Date'];?></td>
                                        </tr><?php $tot_taamt = $tot_taamt + $takaSeptfetch['Trans_Amt'];} ?>
                                        <tr>
                                        <td>Total Amount :</td>
										<td><?php if($tot_taamt!=""){echo moneyFormatIndia($tot_taamt);} else { echo "0.00";}?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                    <tr>
                                    <th>Saree</th>
                                    </tr>
                                    </thead>
                                      <tbody>
                                      <?php $i = 0;
									  $i++; while($sareeSeptfetch = mysql_fetch_array($sareeSeptexe)){?>
                                        <tr>
                                        <td><?php echo $i++;?></td>
                                        <td><?php echo "#Invoice No - ".$sareeSeptfetch['Trans_Invoice_No'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Amount - '.$sareeSeptfetch['Trans_Amt'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Date - '.$sareeSeptfetch['Trans_Date'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Entry Date - '.$sareeSeptfetch['Entry_Date'];?></td>
                                         </tr><?php $tot_saamt = $tot_saamt + $sareeSeptfetch['Trans_Amt'];} ?>
                                        <tr>
                                        <td>Total Amount :</td>
										<td><?php if($tot_saamt!=""){echo moneyFormatIndia($tot_saamt);} else { echo "0.00";}?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                 <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                    <tr>
                                    <th>Expenses</th>
                                    </tr>
                                    </thead>
                                      <tbody>
                                      <?php $i = 0;
									  $i++; while($pettySeptfetch = mysql_fetch_array($pettySeptexe)){?>
                                        <tr>
                                        <td><?php echo $i++;?></td>
                                        <td><?php echo "#Subject - ".$pettySeptfetch['Subject'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Description - '.$pettySeptfetch['Description'].
'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Amount - '.$pettySeptfetch['Cheque_Amount'].
'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Date - '.$pettySeptfetch['Date'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Entry Date - '.$pettySeptfetch['Entry_Date'];?></td>
                                       </tr><?php $tot_peamt = $tot_peamt + $pettySeptfetch['Cheque_Amount'];} ?>
                                        <tr>
                                        <td>Total Amount :</td>
										<td><?php if($tot_peamt!=""){echo moneyFormatIndia($tot_peamt);} else { echo "0.00";}?></td>
                                        </tr>
                                    </tbody>
                                </table>
								<?php }elseif(isset($_REQUEST['October'])){?>
                                 <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                    <tr>
                                    <th>Beam</th>
                                    </tr>
                                    </thead>
                                      <tbody>
                                      <?php $i = 0;
									  $i++; while($beamOctfetch = mysql_fetch_array($beamOctexe)){?>
                                        <tr>
                                        <td><?php echo $i++;?></td>
                                        <td><?php echo "#Invoice No - ".$beamOctfetch['Trans_Invoice_No'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Amount - '.$beamOctfetch['Trans_Amt'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Date - '.$beamOctfetch['Trans_Date'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Entry Date - '.$beamOctfetch['Entry_Date'];?></td>
                                        </tr><?php $tot_beamt = $tot_beamt + $beamOctfetch['Trans_Amt'];} ?>
                                        <tr>
                                        <td>Total Amount :</td>
										<td><?php if($tot_beamt!=""){echo moneyFormatIndia($tot_beamt);} else { echo "0.00";}?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                 <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                    <tr>
                                    <th>Bobbin</th>
                                    </tr>
                                    </thead>
                                      <tbody>
                                      <?php $i = 0;
									  $i++; while($bobbinOctfetch = mysql_fetch_array($bobbinOctexe)){?>
                                        <tr>
                                        <td><?php echo $i++;?></td>
                                        <td><?php echo "#Invoice No - ".$bobbinOctfetch['Trans_Invoice_No'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Amount - '.$bobbinOctfetch['Trans_Amt'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Date - '.$bobbinOctfetch['Trans_Date'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Entry Date - '.$bobbinOctfetch['Entry_Date'];?></td>
                                        </tr><?php $tot_boamt = $tot_boamt + $bobbinOctfetch['Trans_Amt'];} ?>
                                        <tr>
                                        <td>Total Amount :</td>
										<td><?php if($tot_boamt!=""){echo moneyFormatIndia($tot_beamt);} else { echo "0.00";}?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                 <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                    <tr>
                                    <th>Taka</th>
                                    </tr>
                                    </thead>
                                      <tbody>
                                      <?php $i = 0;
									  $i++; while($takaOctfetch = mysql_fetch_array($takaOctexe)){?>
                                        <tr>
                                        <td><?php echo $i++;?></td>
                                        <td><?php echo "#Invoice No - ".$takaOctfetch['Trans_Invoice_No'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Amount - '.$takaOctfetch['Trans_Amt'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Date - '.$takaOctfetch['Trans_Date'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Entry Date - '.$takaOctfetch['Entry_Date'];?></td>
                                       </tr><?php $tot_taamt = $tot_taamt + $takaOctfetch['Trans_Amt'];} ?>
                                        <tr>
                                        <td>Total Amount :</td>
										<td><?php if($tot_taamt!=""){echo moneyFormatIndia($tot_taamt);} else { echo "0.00";}?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                 <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                    <tr>
                                    <th>Saree</th>
                                    </tr>
                                    </thead>
                                      <tbody>
                                      <?php $i = 0;
									  $i++; while($sareeOctfetch = mysql_fetch_array($sareeOctexe)){?>
                                        <tr>
                                        <td><?php echo $i++;?></td>
                                        <td><?php echo "#Invoice No - ".$sareeOctfetch['Trans_Invoice_No'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Amount - '.$sareeOctfetch['Trans_Amt'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Date - '.$sareeOctfetch['Trans_Date'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Entry Date - '.$sareeOctfetch['Entry_Date'];?></td>
                                       </tr><?php $tot_saamt = $tot_saamt + $sareeOctfetch['Trans_Amt'];} ?>
                                        <tr>
                                        <td>Total Amount :</td>
										<td><?php if($tot_saamt!=""){echo moneyFormatIndia($tot_saamt);} else { echo "0.00";}?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                 <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                    <tr>
                                    <th>Expenses</th>
                                    </tr>
                                    </thead>
                                      <tbody>
                                      <?php $i = 0;
									  $i++; while($pettyOctfetch = mysql_fetch_array($pettyOctexe)){?>
                                        <tr>
                                        <td><?php echo $i++;?></td>
                                        <td><?php echo "#Subject - ".$pettyOctfetch['Subject'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Description - '.$pettyOctfetch['Description'].
'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Amount - '.$pettyOctfetch['Cheque_Amount'].
'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Date - '.$pettyOctfetch['Date'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Entry Date - '.$pettyOctfetch['Entry_Date'];?></td>
                                       </tr><?php $tot_peamt = $tot_peamt + $pettyOctfetch['Cheque_Amount'];} ?>
                                        <tr>
                                        <td>Total Amount :</td>
										<td><?php if($tot_peamt!=""){echo moneyFormatIndia($tot_peamt);} else { echo "0.00";}?></td>
                                        </tr>
                                    </tbody>
                                </table>
								<?php }elseif(isset($_REQUEST['November'])){?>
                                 <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                    <tr>
                                    <th>Beam</th>
                                    </tr>
                                    </thead>
                                      <tbody>
                                      <?php $i = 0;
									  $i++; while($beamNovfetch = mysql_fetch_array($beamNovexe)){?>
                                        <tr>
                                        <td><?php echo $i++;?></td>
                                        <td><?php echo "#Invoice No - ".$beamNovfetch['Trans_Invoice_No'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Amount - '.$beamNovfetch['Trans_Amt'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Date - '.$beamNovfetch['Trans_Date'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Entry Date - '.$beamNovfetch['Entry_Date'];?></td>
                                       </tr><?php $tot_beamt = $tot_beamt + $beamNovfetch['Trans_Amt'];} ?>
                                        <tr>
                                        <td>Total Amount :</td>
										<td><?php if($tot_beamt!=""){echo moneyFormatIndia($tot_beamt);} else { echo "0.00";}?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                    <tr>
                                    <th>Bobbin</th>
                                    </tr>
                                    </thead>
                                      <tbody>
                                      <?php $i = 0;
									  $i++; while($bobbinNovfetch = mysql_fetch_array($bobbinNovexe)){?>
                                        <tr>
                                        <td><?php echo $i++;?></td>
                                        <td><?php echo "#Invoice No - ".$bobbinNovfetch['Trans_Invoice_No'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Amount - '.$bobbinNovfetch['Trans_Amt'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Date - '.$bobbinNovfetch['Trans_Date'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Entry Date - '.$bobbinNovfetch['Entry_Date'];?></td>
                                        </tr><?php $tot_boamt = $tot_boamt + $bobbinNovfetch['Trans_Amt'];} ?>
                                        <tr>
                                        <td>Total Amount :</td>
										<td><?php if($tot_boamt!=""){echo moneyFormatIndia($tot_boamt);} else { echo "0.00";}?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                 <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                    <tr>
                                    <th>Taka</th>
                                    </tr>
                                    </thead>
                                      <tbody>
                                      <?php $i = 0;
									  $i++; while($takaNovfetch = mysql_fetch_array($takaNovexe)){?>
                                        <tr>
                                        <td><?php echo $i++;?></td>
                                        <td><?php echo "#Invoice No - ".$takaNovfetch['Trans_Invoice_No'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Amount - '.$takaNovfetch['Trans_Amt'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Date - '.$takaNovfetch['Trans_Date'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Entry Date - '.$takaNovfetch['Entry_Date'];?></td>
                                        </tr><?php $tot_taamt = $tot_taamt + $takaNovfetch['Trans_Amt'];} ?>
                                        <tr>
                                        <td>Total Amount :</td>
										<td><?php if($tot_taamt!=""){echo moneyFormatIndia($tot_taamt);} else { echo "0.00";}?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                  <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                    <tr>
                                    <th>Saree</th>
                                    </tr>
                                    </thead>
                                      <tbody>
                                      <?php $i = 0;
									  $i++; while($sareeNovfetch = mysql_fetch_array($sareeNovexe)){?>
                                        <tr>
                                        <td><?php echo $i++;?></td>
                                        <td><?php echo "#Invoice No - ".$sareeNovfetch['Trans_Invoice_No'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Amount - '.$sareeNovfetch['Trans_Amt'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Date - '.$sareeNovfetch['Trans_Date'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Entry Date - '.$sareeNovfetch['Entry_Date'];?></td>
                                        </tr><?php $tot_saamt = $tot_saamt + $sareeNovfetch['Trans_Amt'];} ?>
                                        <tr>
                                        <td>Total Amount :</td>
										<td><?php if($tot_saamt!=""){echo moneyFormatIndia($tot_saamt);} else { echo "0.00";}?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                 <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                    <tr>
                                    <th>Expenses</th>
                                    </tr>
                                    </thead>
                                      <tbody>
                                      <?php $i = 0;
									  $i++; while($pettyNovfetch = mysql_fetch_array($pettyNovexe)){?>
                                        <tr>
                                        <td><?php echo $i++;?></td>
                                        <td><?php echo "#Subject - ".$pettyNovfetch['Subject'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Description - '.$pettyNovfetch['Description'].
'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Amount - '.$pettyNovfetch['Cheque_Amount'].
'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Date - '.$pettyNovfetch['Date'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Entry Date - '.$pettyNovfetch['Entry_Date'];?></td>
                                        </tr><?php $tot_peamt = $tot_peamt + $pettyNovfetch['Cheque_Amount'];} ?>
                                        <tr>
                                        <td>Total Amount :</td>
										<td><?php if($tot_peamt!=""){echo moneyFormatIndia($tot_peamt);} else { echo "0.00";}?></td>
                                        </tr>
                                    </tbody>
                                </table>
								<?php }
								elseif(isset($_REQUEST['December'])){?>
                                 <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                    <tr>
                                    <th>Beam</th>
                                    </tr>
                                    </thead>
                                      <tbody>
                                      <?php $i = 0;
									  $i++; while($beamDecfetch = mysql_fetch_array($beamDecexe)){?>
                                        <tr>
                                        <td><?php echo $i++;?></td>
                                        <td><?php echo "#Invoice No - ".$beamDecfetch['Trans_Invoice_No'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Amount - '.$beamDecfetch['Trans_Amt'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Date - '.$beamDecfetch['Trans_Date'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Entry Date - '.$beamDecfetch['Entry_Date'];?></td>
                                        </tr><?php $tot_beamt = $tot_beamt + $beamDecfetch['Trans_Amt'];} ?>
                                        <tr>
                                        <td>Total Amount :</td>
										<td><?php if($tot_beamt!=""){echo moneyFormatIndia($tot_beamt);} else { echo "0.00";}?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                 <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                    <tr>
                                    <th>Bobbin</th>
                                    </tr>
                                    </thead>
                                      <tbody>
                                      <?php $i = 0;
									  $i++; while($bobbinDecfetch = mysql_fetch_array($bobbinDecexe)){?>
                                        <tr>
                                        <td><?php echo $i++;?></td>
                                        <td><?php echo "#Invoice No - ".$bobbinDecfetch['Trans_Invoice_No'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Amount - '.$bobbinDecfetch['Trans_Amt'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Date - '.$bobbinDecfetch['Trans_Date'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Entry Date - '.$bobbinDecfetch['Entry_Date'];?></td>
                                         </tr><?php $tot_boamt = $tot_boamt + $bobbinDecfetch['Trans_Amt'];} ?>
                                        <tr>
                                        <td>Total Amount :</td>
										<td><?php if($tot_boamt!=""){echo moneyFormatIndia($tot_boamt);} else { echo "0.00";}?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                 <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                    <tr>
                                    <th>Taka</th>
                                    </tr>
                                    </thead>
                                      <tbody>
                                      <?php $i = 0;
									  $i++; while($takaDecfetch = mysql_fetch_array($takaDecexe)){?>
                                        <tr>
                                        <td><?php echo $i++;?></td>
                                        <td><?php echo "#Invoice No - ".$takaDecfetch['Trans_Invoice_No'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Amount - '.$takaDecfetch['Trans_Amt'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Date - '.$takaDecfetch['Trans_Date'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Entry Date - '.$takaDecfetch['Entry_Date'];?></td>
                                        </tr><?php $tot_taamt = $tot_taamt + $takaDecfetch['Trans_Amt'];} ?>
                                        <tr>
                                        <td>Total Amount :</td>
										<td><?php if($tot_taamt!=""){echo moneyFormatIndia($tot_taamt);} else { echo "0.00";}?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                 <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                    <tr>
                                    <th>Saree</th>
                                    </tr>
                                    </thead>
                                      <tbody>
                                      <?php $i = 0;
									  $i++; while($sareeDecfetch = mysql_fetch_array($sareeDecexe)){?>
                                        <tr>
                                        <td><?php echo $i++;?></td>
                                        <td><?php echo "#Invoice No - ".$sareeDecfetch['Trans_Invoice_No'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Amount - '.$sareeDecfetch['Trans_Amt'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Date - '.$sareeDecfetch['Trans_Date'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Entry Date - '.$sareeDecfetch['Entry_Date'];?></td>
                                         </tr><?php $tot_saamt = $tot_saamt + $sareeDecfetch['Trans_Amt'];} ?>
                                        <tr>
                                        <td>Total Amount :</td>
										<td><?php if($tot_saamt!=""){echo moneyFormatIndia($tot_saamt);} else { echo "0.00";}?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                 <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                    <tr>
                                    <th>Expenses</th>
                                    </tr>
                                    </thead>
                                      <tbody>
                                      <?php $i = 0;
									  $i++; while($pettyDecfetch = mysql_fetch_array($pettyDecexe)){?>
                                        <tr>
                                        <td><?php echo $i++;?></td>
                                        <td><?php echo "#Subject - ".$pettyDecfetch['Subject'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Description - '.$pettyDecfetch['Description'].
'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Amount - '.$pettyDecfetch['Cheque_Amount'].
'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Date - '.$pettyDecfetch['Date'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Entry Date - '.$pettyDecfetch['Entry_Date'];?></td>
                                        </tr><?php $tot_peamt = $tot_peamt + $pettyDecfetch['Cheque_Amount'];} ?>
                                        <tr>
                                        <td>Total Amount :</td>
										<td><?php if($tot_peamt!=""){echo moneyFormatIndia($tot_peamt);} else { echo "0.00";}?></td>
                                        </tr>
                                    </tbody>
                                </table>
								<?php }
								elseif(isset($_REQUEST['January2017'])){?>
                                 <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                    <tr>
                                    <th>Beam</th>
                                    </tr>
                                    </thead>
                                      <tbody>
                                      <?php $i = 0;
									  $i++; while($beamJan2017fetch = mysql_fetch_array($beamJan2017exe)){?>
                                        <tr>
                                        <td><?php echo $i++;?></td>
                                        <td><?php echo "#Invoice No - ".$beamJan2017fetch['Trans_Invoice_No'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Amount - '.$beamJan2017fetch['Trans_Amt'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Date - '.$beamJan2017fetch['Trans_Date'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Entry Date - '.$beamJan2017fetch['Entry_Date'];?></td>
                                        </tr><?php $tot_beamt = $tot_beamt + $beamJan2017fetch['Trans_Amt'];} ?>
                                        <tr>
                                        <td>Total Amount :</td>
										<td><?php if($tot_beamt!=""){ echomoneyFormatIndia($tot_beamt);} else { echo "0.00";}?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                 <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                    <tr>
                                    <th>Bobbin</th>
                                    </tr>
                                    </thead>
                                      <tbody>
                                      <?php $i = 0;
									  $i++; while($bobbinJan2017fetch = mysql_fetch_array($bobbinJan2017exe)){?>
                                        <tr>
                                        <td><?php echo $i++;?></td>
                                        <td><?php echo "#Invoice No - ".$bobbinJan2017fetch['Trans_Invoice_No'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Amount - '.$bobbinJan2017fetch['Trans_Amt'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Date - '.$bobbinJan2017fetch['Trans_Date'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Entry Date - '.$bobbinJan2017fetch['Entry_Date'];?></td>
                                          </tr><?php $tot_boamt = $tot_boamt + $bobbinJan2017fetch['Trans_Amt'];} ?>
                                        <tr>
                                        <td>Total Amount :</td>
										<td><?php if($tot_boamt!=""){echo moneyFormatIndia($tot_boamt);} else { echo "0.00";}?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                  <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                    <tr>
                                    <th>Taka</th>
                                    </tr>
                                    </thead>
                                      <tbody>
                                      <?php $i = 0;
									  $i++; while($takaJan2017fetch = mysql_fetch_array($takaJan2017exe)){?>
                                        <tr>
                                        <td><?php echo $i++;?></td>
                                        <td><?php echo "#Invoice No - ".$takaJan2017fetch['Trans_Invoice_No'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Amount - '.$takaJan2017fetch['Trans_Amt'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Date - '.$takaJan2017fetch['Trans_Date'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Entry Date - '.$takaJan2017fetch['Entry_Date'];?></td>
                                         </tr><?php $tot_taamt = $tot_taamt + $takaJan2017fetch['Trans_Amt'];} ?>
                                        <tr>
                                        <td>Total Amount :</td>
										<td><?php if($tot_taamt!=""){echo moneyFormatIndia($tot_taamt);} else { echo "0.00";}?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                 <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                    <tr>
                                    <th>Saree</th>
                                    </tr>
                                    </thead>
                                      <tbody>
                                      <?php $i = 0;
									  $i++; while($sareeJan2017fetch = mysql_fetch_array($sareeJan2017exe)){?>
                                        <tr>
                                        <td><?php echo $i++;?></td>
                                        <td><?php echo "#Invoice No - ".$sareeJan2017fetch['Trans_Invoice_No'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Amount - '.$sareeJan2017fetch['Trans_Amt'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Date - '.$sareeJan2017fetch['Trans_Date'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Entry Date - '.$sareeJan2017fetch['Entry_Date'];?></td>
                                         </tr><?php $tot_saamt = $tot_saamt + $sareeJan2017fetch['Trans_Amt'];} ?>
                                        <tr>
                                        <td>Total Amount :</td>
										<td><?php if($tot_saamt!=""){echo moneyFormatIndia($tot_saamt);} else { echo "0.00";}?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                 <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                    <tr>
                                    <th>Expenses</th>
                                    </tr>
                                    </thead>
                                      <tbody>
                                      <?php $i = 0;
									  $i++; while($pettyJan2017fetch = mysql_fetch_array($pettyJan2017exe)){?>
                                        <tr>
                                        <td><?php echo $i++;?></td>
                                        <td><?php echo "#Subject - ".$pettyJan2017fetch['Subject'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Description - '.$pettyJan2017fetch['Description'].
'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Amount - '.$pettyJan2017fetch['Cheque_Amount'].
'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Date - '.$pettyJan2017fetch['Date'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Entry Date - '.$pettyJan2017fetch['Entry_Date'];?></td>
                                        </tr><?php $tot_peamt = $tot_peamt + $pettyJan2017fetch['Cheque_Amount'];} ?>
                                        <tr>
                                        <td>Total Amount :</td>
										<td><?php if($tot_peamt!=""){echo moneyFormatIndia($tot_peamt);} else { echo "0.00";}?></td>
                                        </tr>
                                    </tbody>
                                </table>
								<?php }elseif(isset($_REQUEST['February2017'])){?>
                                 <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                    <tr>
                                    <th>Beam</th>
                                    </tr>
                                    </thead>
                                      <tbody>
                                      <?php $i = 0;
									  $i++; while($beamFeb2017fetch = mysql_fetch_array($beamFeb2017exe)){?>
                                        <tr>
                                        <td><?php echo $i++;?></td>
                                        <td><?php echo "#Invoice No - ".$beamFeb2017fetch['Trans_Invoice_No'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Amount - '.$beamFeb2017fetch['Trans_Amt'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Date - '.$beamFeb2017fetch['Trans_Date'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Entry Date - '.$beamFeb2017fetch['Entry_Date'];?></td>
                                         </tr><?php $tot_beamt = $tot_beamt + $beamFeb2017fetch['Trans_Amt'];} ?>
                                        <tr>
                                        <td>Total Amount :</td>
										<td><?php if($tot_beamt!=""){echo moneyFormatIndia($tot_beamt);} else { echo "0.00";}?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                 <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                    <tr>
                                    <th>Bobbin</th>
                                    </tr>
                                    </thead>
                                      <tbody>
                                      <?php $i = 0;
									  $i++; while($bobbinFeb2017fetch = mysql_fetch_array($bobbinFeb2017exe)){?>
                                        <tr>
                                        <td><?php echo $i++;?></td>
                                        <td><?php echo "#Invoice No - ".$bobbinFeb2017fetch['Trans_Invoice_No'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Amount - '.$bobbinFeb2017fetch['Trans_Amt'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Date - '.$bobbinFeb2017fetch['Trans_Date'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Entry Date - '.$bobbinFeb2017fetch['Entry_Date'];?></td>
                                        </tr><?php $tot_boamt = $tot_boamt + $bobbinFeb2017fetch['Trans_Amt'];} ?>
                                        <tr>
                                        <td>Total Amount :</td>
										<td><?php if($tot_boamt!=""){echo moneyFormatIndia($tot_boamt);} else { echo "0.00";}?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                 <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                    <tr>
                                    <th>Taka</th>
                                    </tr>
                                    </thead>
                                      <tbody>
                                      <?php $i = 0;
									  $i++; while($takaFeb2017fetch = mysql_fetch_array($takaFeb2017exe)){?>
                                        <tr>
                                        <td><?php echo $i++;?></td>
                                        <td><?php echo "#Invoice No - ".$takaFeb2017fetch['Trans_Invoice_No'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Amount - '.$takaFeb2017fetch['Trans_Amt'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Date - '.$takaFeb2017fetch['Trans_Date'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Entry Date - '.$takaFeb2017fetch['Entry_Date'];?></td>
                                       </tr><?php $tot_taamt = $tot_taamt + $takaFeb2017fetch['Trans_Amt'];} ?>
                                        <tr>
                                        <td>Total Amount :</td>
										<td><?php if($tot_taamt!=""){echo moneyFormatIndia($tot_taamt);} else { echo "0.00";}?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                 <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                    <tr>
                                    <th>Saree</th>
                                    </tr>
                                    </thead>
                                      <tbody>
                                      <?php $i = 0;
									  $i++; while($sareeFeb2017fetch = mysql_fetch_array($sareeFeb2017exe)){?>
                                        <tr>
                                        <td><?php echo $i++;?></td>
                                        <td><?php echo "#Invoice No - ".$sareeFeb2017fetch['Trans_Invoice_No'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Amount - '.$sareeFeb2017fetch['Trans_Amt'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Date - '.$sareeFeb2017fetch['Trans_Date'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Entry Date - '.$sareeFeb2017fetch['Entry_Date'];?></td>
                                       </tr><?php $tot_saamt = $tot_saamt + $sareeFeb2017fetch['Trans_Amt'];} ?>
                                        <tr>
                                        <td>Total Amount :</td>
										<td><?php if($tot_saamt!=""){echo moneyFormatIndia($tot_saamt);} else { echo "0.00";}?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                 <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                    <tr>
                                    <th>Expenses</th>
                                    </tr>
                                    </thead>
                                      <tbody>
                                      <?php $i = 0;
									  $i++; while($pettyFeb2017fetch = mysql_fetch_array($pettyFeb2017exe)){?>
                                        <tr>
                                        <td><?php echo $i++;?></td>
                                        <td><?php echo "#Subject - ".$pettyFeb2017fetch['Subject'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Description - '.$pettyFeb2017fetch['Description'].
'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Amount - '.$pettyFeb2017fetch['Cheque_Amount'].
'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Date - '.$pettyFeb2017fetch['Date'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Entry Date - '.$pettyFeb2017fetch['Entry_Date'];?></td>
                                       </tr><?php $tot_peamt = $tot_peamt + $pettyFeb2017fetch['Cheque_Amount'];} ?>
                                        <tr>
                                        <td>Total Amount :</td>
										<td><?php if($tot_peamt!=""){echo moneyFormatIndia($tot_peamt);} else { echo "0.00";}?></td>
                                        </tr>
                                    </tbody>
                                </table>
								<?php }elseif(isset($_REQUEST['March2017'])){?>
                                 <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                    <tr>
                                    <th>Beam</th>
                                    </tr>
                                    </thead>
                                      <tbody>
                                      <?php $i = 0;
									  $i++; while($beamMarch2017fetch = mysql_fetch_array($beamMarch2017exe)){?>
                                        <tr>
                                        <td><?php echo $i++;?></td>
                                        <td><?php echo "#Invoice No - ".$beamMarch2017fetch['Trans_Invoice_No'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Amount - '.$beamMarch2017fetch['Trans_Amt'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Date - '.$beamMarch2017fetch['Trans_Date'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Entry Date - '.$beamMarch2017fetch['Entry_Date'];?></td>
                                       </tr><?php $tot_beamt = $tot_beamt + $beamMarch2017fetch['Trans_Amt'];} ?>
                                        <tr>
                                        <td>Total Amount :</td>
										<td><?php if($tot_beamt!=""){echo moneyFormatIndia($tot_beamt);} else { echo "0.00";}?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                 <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                    <tr>
                                    <th>Bobbin</th>
                                    </tr>
                                    </thead>
                                      <tbody>
                                      <?php $i = 0;
									  $i++; while($bobbinMarch2017fetch = mysql_fetch_array($bobbinMarch2017exe)){?>
                                        <tr>
                                        <td><?php echo $i++;?></td>
                                        <td><?php echo "#Invoice No - ".$bobbinMarch2017fetch['Trans_Invoice_No'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Amount - '.$bobbinMarch2017fetch['Trans_Amt'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Date - '.$bobbinMarch2017fetch['Trans_Date'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Entry Date - '.$bobbinMarch2017fetch['Entry_Date'];?></td>
                                        </tr><?php $tot_boamt = $tot_boamt + $bobbinMarch2017fetch['Trans_Amt'];} ?>
                                        <tr>
                                        <td>Total Amount :</td>
										<td><?php if($tot_boamt!=""){echo moneyFormatIndia($tot_boamt);} else { echo "0.00";}?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                 <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                    <tr>
                                    <th>Taka</th>
                                    </tr>
                                    </thead>
                                      <tbody>
                                      <?php $i = 0;
									  $i++; while($takaMarch2017fetch = mysql_fetch_array($takaMarch2017exe)){?>
                                        <tr>
                                        <td><?php echo $i++;?></td>
                                        <td><?php echo "#Invoice No - ".$takaMarch2017fetch['Trans_Invoice_No'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Amount - '.$takaMarch2017fetch['Trans_Amt'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Date - '.$takaMarch2017fetch['Trans_Date'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Entry Date - '.$takaMarch2017fetch['Entry_Date'];?></td>
                                        </tr><?php $tot_taamt = $tot_taamt + $takaMarch2017fetch['Trans_Amt'];} ?>
                                        <tr>
                                        <td>Total Amount :</td>
										<td><?php if($tot_taamt!=""){echo moneyFormatIndia($tot_taamt);} else { echo "0.00";}?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                 <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                    <tr>
                                    <th>Saree</th>
                                    </tr>
                                    </thead>
                                      <tbody>
                                      <?php $i = 0;
									  $i++; while($sareeMarch2017fetch = mysql_fetch_array($sareeMarch2017exe)){?>
                                        <tr>
                                        <td><?php echo $i++;?></td>
                                        <td><?php echo "#Invoice No - ".$sareeMarch2017fetch['Trans_Invoice_No'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Amount - '.$sareeMarch2017fetch['Trans_Amt'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Date - '.$sareeMarch2017fetch['Trans_Date'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Entry Date - '.$sareeMarch2017fetch['Entry_Date'];?></td>
                                         </tr><?php $tot_saamt = $tot_saamt + $sareeMarch2017fetch['Trans_Amt'];} ?>
                                        <tr>
                                        <td>Total Amount :</td>
										<td><?php if($tot_saamt!=""){echo moneyFormatIndia($tot_saamt);} else { echo "0.00";}?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                 <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                    <tr>
                                    <th>Expenses</th>
                                    </tr>
                                    </thead>
                                      <tbody>
                                      <?php $i = 0;
									  $i++; while($pettyMarch2017fetch = mysql_fetch_array($pettyMarch2017exe)){?>
                                        <tr>
                                        <td><?php echo $i++;?></td>
                                        <td><?php echo "#Subject - ".$pettyMarch2017fetch['Subject'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Description - '.$pettyMarch2017fetch['Description'].
'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Amount - '.$pettyMarch2017fetch['Cheque_Amount'].
'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Date - '.$pettyMarch2017fetch['Date'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Entry Date - '.$pettyMarch2017fetch['Entry_Date'];?></td>
                                         </tr><?php $tot_peamt = $tot_peamt + $pettyMarch2017fetch['Cheque_Amount'];} ?>
                                        <tr>
                                        <td>Total Amount :</td>
										<td><?php if($tot_peamt!=""){echo moneyFormatIndia($tot_peamt);} else { echo "0.00";}?></td>
                                        </tr>
                                    </tbody>
                                </table>
								<?php }?>
                               
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
	<?php include("shortcutkeys.php");?>
	</script>
</body>
</html>
<?php
 ob_flush(); ?>