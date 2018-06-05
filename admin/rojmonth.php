<?php include("logcode.php"); 
include("databaseconnect.php");
//////////////////// January ///////////////////////////////////////////
$bobbinjan = "select sum(Trans_Amt) as total_amt from transactions_bobbin where Trans_Date between '2016-01-01' and '2016-01-31'";
$bobbinjanexe = mysql_query($bobbinjan);
$bobbinjanfetch = mysql_fetch_array($bobbinjanexe);
$beamjan = "select sum(Trans_Amt) as total_amt from transactions_beam1 where Trans_Date between '2016-01-01' and '2016-01-31'";
$beamjanexe = mysql_query($beamjan);
$beamjanfetch = mysql_fetch_array($beamjanexe);
$takajan = "select sum(Trans_Amt) as total_amt from transactions_taka where Trans_Date between '2016-01-01' and '2016-01-31'";
$takajanexe = mysql_query($takajan);
$takajanfetch = mysql_fetch_array($takajanexe);
$sareejan = "select sum(Trans_Amt) as total_amt from transactions_saree where Trans_Date between '2016-01-01' and '2016-01-31'";
$sareejanexe = mysql_query($sareejan);
$sareejanfetch = mysql_fetch_array($sareejanexe);

$total_amtjanpur = $bobbinjanfetch['total_amt'] + $beamjanfetch['total_amt'];
$total_amtjansell = $takajanfetch['total_amt'] + $sareejanfetch['total_amt'];
//////////////////// February ///////////////////////////////////////////
$bobbinfeb = "select sum(Trans_Amt) as total_amt from transactions_bobbin where Trans_Date between '2016-02-01' and '2016-02-29'";
$bobbinfebexe = mysql_query($bobbinfeb);
$bobbinfebfetch = mysql_fetch_array($bobbinfebexe);
$beamfeb = "select sum(Trans_Amt) as total_amt from transactions_beam1 where Trans_Date between '2016-02-01' and '2016-02-29'";
$beamfebexe = mysql_query($beamfeb);
$beamfebfetch = mysql_fetch_array($beamfebexe);
$takafeb = "select sum(Trans_Amt) as total_amt from transactions_taka where Trans_Date between '2016-02-01' and '2016-02-29'";
$takafebexe = mysql_query($takafeb);
$takafebfetch = mysql_fetch_array($takafebexe);
$sareefeb = "select sum(Trans_Amt) as total_amt from transactions_saree where Trans_Date between '2016-02-01' and '2016-02-29'";
$sareefebexe = mysql_query($sareefeb);
$sareefebfetch = mysql_fetch_array($sareefebexe);

$total_amtfebpur = $bobbinfebfetch['total_amt'] + $beamfebfetch['total_amt'];
$total_amtfebsell = $takafebfetch['total_amt'] + $sareefebfetch['total_amt'];
//////////////////// March ///////////////////////////////////////////
$bobbinMarch = "select sum(Trans_Amt) as total_amt from transactions_bobbin where Trans_Date between '2016-03-01' and '2016-03-31'";
$bobbinMarchexe = mysql_query($bobbinMarch);
$bobbinMarchfetch = mysql_fetch_array($bobbinMarchexe);
$beamMarch = "select sum(Trans_Amt) as total_amt from transactions_beam1 where Trans_Date between '2016-03-01' and '2016-03-31'";
$beamMarchexe = mysql_query($beamMarch);
$beamMarchfetch = mysql_fetch_array($beamMarchexe);
$takaMarch = "select sum(Trans_Amt) as total_amt from transactions_taka where Trans_Date between '2016-03-01' and '2016-03-31'";
$takaMarchexe = mysql_query($takaMarch);
$takaMarchfetch = mysql_fetch_array($takaMarchexe);
$sareeMarch = "select sum(Trans_Amt) as total_amt from transactions_saree where Trans_Date between '2016-03-01' and '2016-03-31'";
$sareeMarchexe = mysql_query($sareeMarch);
$sareeMarchfetch = mysql_fetch_array($sareeMarchexe);

$total_amtMarchpur = $bobbinMarchfetch['total_amt'] + $beamMarchfetch['total_amt'];
$total_amtMarchsell = $takaMarchfetch['total_amt'] + $sareeMarchfetch['total_amt'];
//////////////////// April ///////////////////////////////////////////
$bobbinApril = "select sum(Trans_Amt) as total_amt from transactions_bobbin where Trans_Date between '2016-04-01' and '2016-04-30'";
$bobbinAprilexe = mysql_query($bobbinApril);
$bobbinAprilfetch = mysql_fetch_array($bobbinAprilexe);
$beamApril = "select sum(Trans_Amt) as total_amt from transactions_beam1 where Trans_Date between '2016-04-01' and '2016-04-30'";
$beamAprilexe = mysql_query($beamApril);
$beamAprilfetch = mysql_fetch_array($beamAprilexe);
$takaApril = "select sum(Trans_Amt) as total_amt from transactions_taka where Trans_Date between '2016-04-01' and '2016-04-30'";
$takaAprilexe = mysql_query($takaApril);
$takaAprilfetch = mysql_fetch_array($takaAprilexe);
$sareeApril = "select sum(Trans_Amt) as total_amt from transactions_saree where Trans_Date between '2016-04-01' and '2016-04-30'";
$sareeAprilexe = mysql_query($sareeApril);
$sareeAprilfetch = mysql_fetch_array($sareeAprilexe);

$total_amtAprilpur = $bobbinAprilfetch['total_amt'] + $beamAprilfetch['total_amt'];
$total_amtAprilsell = $takaAprilfetch['total_amt'] + $sareeAprilfetch['total_amt'];
//////////////////// May ///////////////////////////////////////////
$bobbinMay = "select sum(Trans_Amt) as total_amt from transactions_bobbin where Trans_Date between '2016-05-01' and '2016-05-31'";
$bobbinMayexe = mysql_query($bobbinMay);
$bobbinMayfetch = mysql_fetch_array($bobbinMayexe);
$beamMay = "select sum(Trans_Amt) as total_amt from transactions_beam1 where Trans_Date between '2016-05-01' and '2016-05-31'";
$beamMayexe = mysql_query($beamMay);
$beamMayfetch = mysql_fetch_array($beamMayexe);
$takaMay = "select sum(Trans_Amt) as total_amt from transactions_taka where Trans_Date between '2016-05-01' and '2016-05-31'";
$takaMayexe = mysql_query($takaMay);
$takaMayfetch = mysql_fetch_array($takaMayexe);
$sareeMay = "select sum(Trans_Amt) as total_amt from transactions_saree where Trans_Date between '2016-05-01' and '2016-05-31'";
$sareeMayexe = mysql_query($sareeMay);
$sareeMayfetch = mysql_fetch_array($sareeMayexe);

$total_amtMaypur = $bobbinMayfetch['total_amt'] + $beamMayfetch['total_amt'];
$total_amtMaysell = $takaMayfetch['total_amt'] + $sareeMayfetch['total_amt'];
//////////////////// June ///////////////////////////////////////////
$bobbinJune = "select sum(Trans_Amt) as total_amt from transactions_bobbin where Trans_Date between '2016-06-01' and '2016-06-30'";
$bobbinJuneexe = mysql_query($bobbinJune);
$bobbinJunefetch = mysql_fetch_array($bobbinJuneexe);
$beamJune = "select sum(Trans_Amt) as total_amt from transactions_beam1 where Trans_Date between '2016-06-01' and '2016-06-30'";
$beamJuneexe = mysql_query($beamJune);
$beamJunefetch = mysql_fetch_array($beamJuneexe);
$takaJune = "select sum(Trans_Amt) as total_amt from transactions_taka where Trans_Date between '2016-06-01' and '2016-06-30'";
$takaJuneexe = mysql_query($takaJune);
$takaJunefetch = mysql_fetch_array($takaJuneexe);
$sareeJune = "select sum(Trans_Amt) as total_amt from transactions_saree where Trans_Date between '2016-06-01' and '2016-06-30'";
$sareeJuneexe = mysql_query($sareeJune);
$sareeJunefetch = mysql_fetch_array($sareeJuneexe);

$total_amtJunepur = $bobbinJunefetch['total_amt'] + $beamJunefetch['total_amt'];
$total_amtJunesell = $takaJunefetch['total_amt'] + $sareeJunefetch['total_amt'];
//////////////////// July ///////////////////////////////////////////
$bobbinJuly = "select sum(Trans_Amt) as total_amt from transactions_bobbin where Trans_Date between '2016-07-01' and '2016-07-31'";
$bobbinJulyexe = mysql_query($bobbinJuly);
$bobbinJulyfetch = mysql_fetch_array($bobbinJulyexe);
$beamJuly = "select sum(Trans_Amt) as total_amt from transactions_beam1 where Trans_Date between '2016-07-01' and '2016-07-31'";
$beamJulyexe = mysql_query($beamJuly);
$beamJulyfetch = mysql_fetch_array($beamJulyexe);
$takaJuly = "select sum(Trans_Amt) as total_amt from transactions_taka where Trans_Date between '2016-07-01' and '2016-07-31'";
$takaJulyexe = mysql_query($takaJuly);
$takaJulyfetch = mysql_fetch_array($takaJulyexe);
$sareeJuly = "select sum(Trans_Amt) as total_amt from transactions_saree where Trans_Date between '2016-07-01' and '2016-07-31'";
$sareeJulyexe = mysql_query($sareeJuly);
$sareeJulyfetch = mysql_fetch_array($sareeJulyexe);

$total_amtJulypur = $bobbinJulyfetch['total_amt'] + $beamJulyfetch['total_amt'];
$total_amtJulysell = $takaJulyfetch['total_amt'] + $sareeJulyfetch['total_amt'];
//////////////////// August ///////////////////////////////////////////
$bobbinAugust = "select sum(Trans_Amt) as total_amt from transactions_bobbin where Trans_Date between '2016-08-01' and '2016-08-31'";
$bobbinAugustexe = mysql_query($bobbinAugust);
$bobbinAugustfetch = mysql_fetch_array($bobbinAugustexe);
$beamAugust = "select sum(Trans_Amt) as total_amt from transactions_beam1 where Trans_Date between '2016-08-01' and '2016-08-31'";
$beamAugustexe = mysql_query($beamAugust);
$beamAugustfetch = mysql_fetch_array($beamAugustexe);
$takaAugust = "select sum(Trans_Amt) as total_amt from transactions_taka where Trans_Date between '2016-08-01' and '2016-08-31'";
$takaAugustexe = mysql_query($takaAugust);
$takaAugustfetch = mysql_fetch_array($takaAugustexe);
$sareeAugust = "select sum(Trans_Amt) as total_amt from transactions_saree where Trans_Date between '2016-08-01' and '2016-08-31'";
$sareeAugustexe = mysql_query($sareeAugust);
$sareeAugustfetch = mysql_fetch_array($sareeAugustexe);

$total_amtAugustpur = $bobbinAugustfetch['total_amt'] + $beamAugustfetch['total_amt'];
$total_amtAugustsell = $takaAugustfetch['total_amt'] + $sareeAugustfetch['total_amt'];
//////////////////// Sept ///////////////////////////////////////////
$bobbinSept = "select sum(Trans_Amt) as total_amt from transactions_bobbin where Trans_Date between '2016-09-01' and '2016-09-30'";
$bobbinSeptexe = mysql_query($bobbinSept);
$bobbinSeptfetch = mysql_fetch_array($bobbinSeptexe);
$beamSept = "select sum(Trans_Amt) as total_amt from transactions_beam1 where Trans_Date between '2016-09-01' and '2016-09-30'";
$beamSeptexe = mysql_query($beamSept);
$beamSeptfetch = mysql_fetch_array($beamSeptexe);
$takaSept = "select sum(Trans_Amt) as total_amt from transactions_taka where Trans_Date between '2016-09-01' and '2016-09-30'";
$takaSeptexe = mysql_query($takaSept);
$takaSeptfetch = mysql_fetch_array($takaSeptexe);
$sareeSept = "select sum(Trans_Amt) as total_amt from transactions_saree where Trans_Date between '2016-09-01' and '2016-09-30'";
$sareeSeptexe = mysql_query($sareeSept);
$sareeSeptfetch = mysql_fetch_array($sareeSeptexe);

$total_amtSeptpur = $bobbinSeptfetch['total_amt'] + $beamSeptfetch['total_amt'];
$total_amtSeptsell = $takaSeptfetch['total_amt'] + $sareeSeptfetch['total_amt'];
//////////////////// Oct ///////////////////////////////////////////
$bobbinOct = "select sum(Trans_Amt) as total_amt from transactions_bobbin where Trans_Date between '2016-10-01' and '2016-10-31'";
$bobbinOctexe = mysql_query($bobbinOct);
$bobbinOctfetch = mysql_fetch_array($bobbinOctexe);
$beamOct = "select sum(Trans_Amt) as total_amt from transactions_beam1 where Trans_Date between '2016-10-01' and '2016-10-31'";
$beamOctexe = mysql_query($beamOct);
$beamOctfetch = mysql_fetch_array($beamOctexe);
$takaOct = "select sum(Trans_Amt) as total_amt from transactions_taka where Trans_Date between '2016-10-01' and '2016-10-31'";
$takaOctexe = mysql_query($takaOct);
$takaOctfetch = mysql_fetch_array($takaOctexe);
$sareeOct = "select sum(Trans_Amt) as total_amt from transactions_saree where Trans_Date between '2016-10-01' and '2016-10-31'";
$sareeOctexe = mysql_query($sareeOct);
$sareeOctfetch = mysql_fetch_array($sareeOctexe);

$total_amtOctpur = $bobbinOctfetch['total_amt'] + $beamOctfetch['total_amt'];
$total_amtOctsell = $takaOctfetch['total_amt'] + $sareeOctfetch['total_amt'];
//////////////////// Nov ///////////////////////////////////////////
$bobbinNov = "select sum(Trans_Amt) as total_amt from transactions_bobbin where Trans_Date between '2016-11-01' and '2016-11-30'";
$bobbinNovexe = mysql_query($bobbinNov);
$bobbinNovfetch = mysql_fetch_array($bobbinNovexe);
$beamNov = "select sum(Trans_Amt) as total_amt from transactions_beam1 where Trans_Date between '2016-11-01' and '2016-11-30'";
$beamNovexe = mysql_query($beamNov);
$beamNovfetch = mysql_fetch_array($beamNovexe);
$takaNov = "select sum(Trans_Amt) as total_amt from transactions_taka where Trans_Date between '2016-11-01' and '2016-11-30'";
$takaNovexe = mysql_query($takaNov);
$takaNovfetch = mysql_fetch_array($takaNovexe);
$sareeNov = "select sum(Trans_Amt) as total_amt from transactions_saree where Trans_Date between '2016-11-01' and '2016-11-30'";
$sareeNovexe = mysql_query($sareeNov);
$sareeNovfetch = mysql_fetch_array($sareeNovexe);

$total_amtNovpur = $bobbinNovfetch['total_amt'] + $beamNovfetch['total_amt'];
$total_amtNovsell = $takaNovfetch['total_amt'] + $sareeNovfetch['total_amt'];
//////////////////// Dec ///////////////////////////////////////////
$bobbinDec = "select sum(Trans_Amt) as total_amt from transactions_bobbin where Trans_Date between '2016-12-01' and '2016-12-31'";
$bobbinDecexe = mysql_query($bobbinDec);
$bobbinDecfetch = mysql_fetch_array($bobbinDecexe);
$beamDec = "select sum(Trans_Amt) as total_amt from transactions_beam1 where Trans_Date between '2016-12-01' and '2016-12-31'";
$beamDecexe = mysql_query($beamDec);
$beamDecfetch = mysql_fetch_array($beamDecexe);
$takaDec = "select sum(Trans_Amt) as total_amt from transactions_taka where Trans_Date between '2016-12-01' and '2016-12-31'";
$takaDecexe = mysql_query($takaDec);
$takaDecfetch = mysql_fetch_array($takaDecexe);
$sareeDec = "select sum(Trans_Amt) as total_amt from transactions_saree where Trans_Date between '2016-12-01' and '2016-12-31'";
$sareeDecexe = mysql_query($sareeDec);
$sareeDecfetch = mysql_fetch_array($sareeDecexe);

$total_amtDecpur = $bobbinDecfetch['total_amt'] + $beamDecfetch['total_amt'];
$total_amtDecsell = $takaDecfetch['total_amt'] + $sareeDecfetch['total_amt'];
//////////////////// Jan2017 ///////////////////////////////////////////
$bobbinJan2017 = "select sum(Trans_Amt) as total_amt from transactions_bobbin where Trans_Date between '2017-01-01' and '2017-01-31'";
$bobbinJan2017exe = mysql_query($bobbinJan2017);
$bobbinJan2017fetch = mysql_fetch_array($bobbinJan2017exe);
$beamJan2017 = "select sum(Trans_Amt) as total_amt from transactions_beam1 where Trans_Date between '2017-01-01' and '2017-01-31'";
$beamJan2017exe = mysql_query($beamJan2017);
$beamJan2017fetch = mysql_fetch_array($beamJan2017exe);
$takaJan2017 = "select sum(Trans_Amt) as total_amt from transactions_taka where Trans_Date between '2017-01-01' and '2017-01-31'";
$takaJan2017exe = mysql_query($takaJan2017);
$takaJan2017fetch = mysql_fetch_array($takaJan2017exe);
$sareeJan2017 = "select sum(Trans_Amt) as total_amt from transactions_saree where Trans_Date between '2017-01-01' and '2017-01-31'";
$sareeJan2017exe = mysql_query($sareeJan2017);
$sareeJan2017fetch = mysql_fetch_array($sareeJan2017exe);

$total_amtJan2017pur = $bobbinJan2017fetch['total_amt'] + $beamJan2017fetch['total_amt'];
$total_amtJan2017sell = $takaJan2017fetch['total_amt'] + $sareeJan2017fetch['total_amt'];
//////////////////// Feb2017 ///////////////////////////////////////////
$bobbinFeb2017 = "select sum(Trans_Amt) as total_amt from transactions_bobbin where Trans_Date between '2017-02-01' and '2017-02-28'";
$bobbinFeb2017exe = mysql_query($bobbinFeb2017);
$bobbinFeb2017fetch = mysql_fetch_array($bobbinFeb2017exe);
$beamFeb2017 = "select sum(Trans_Amt) as total_amt from transactions_beam1 where Trans_Date between '2017-02-01' and '2017-02-28'";
$beamFeb2017exe = mysql_query($beamFeb2017);
$beamFeb2017fetch = mysql_fetch_array($beamFeb2017exe);
$takaFeb2017 = "select sum(Trans_Amt) as total_amt from transactions_taka where Trans_Date between '2017-02-01' and '2017-02-28'";
$takaFeb2017exe = mysql_query($takaFeb2017);
$takaFeb2017fetch = mysql_fetch_array($takaFeb2017exe);
$sareeFeb2017 = "select sum(Trans_Amt) as total_amt from transactions_saree where Trans_Date between '2017-02-01' and '2017-02-28'";
$sareeFeb2017exe = mysql_query($sareeFeb2017);
$sareeFeb2017fetch = mysql_fetch_array($sareeFeb2017exe);

$total_amtFeb2017pur = $bobbinFeb2017fetch['total_amt'] + $beamFeb2017fetch['total_amt'];
$total_amtFeb2017sell = $takaFeb2017fetch['total_amt'] + $sareeFeb2017fetch['total_amt'];
//////////////////// March2017 ///////////////////////////////////////////
$bobbinMarch2017 = "select sum(Trans_Amt) as total_amt from transactions_bobbin where Trans_Date between '2017-03-01' and '2017-03-31'";
$bobbinMarch2017exe = mysql_query($bobbinMarch2017);
$bobbinMarch2017fetch = mysql_fetch_array($bobbinMarch2017exe);
$beamMarch2017 = "select sum(Trans_Amt) as total_amt from transactions_beam1 where Trans_Date between '2017-03-01' and '2017-03-31'";
$beamMarch2017exe = mysql_query($beamMarch2017);
$beamMarch2017fetch = mysql_fetch_array($beamMarch2017exe);
$takaMarch2017 = "select sum(Trans_Amt) as total_amt from transactions_taka where Trans_Date between '2017-03-01' and '2016-03-31'";
$takaMarch2017exe = mysql_query($takaMarch2017);
$takaMarch2017fetch = mysql_fetch_array($takaMarch2017exe);
$sareeMarch2017 = "select sum(Trans_Amt) as total_amt from transactions_saree where Trans_Date between '2017-03-01' and '2017-03-31'";
$sareeMarch2017exe = mysql_query($sareeMarch2017);
$sareeMarch2017fetch = mysql_fetch_array($sareeMarch2017exe);

$total_amtMarch2017pur = $bobbinMarch2017fetch['total_amt'] + $beamMarch2017fetch['total_amt'];
$total_amtMarch2017sell = $takaMarch2017fetch['total_amt'] + $sareeMarch2017fetch['total_amt'];
///////////////// total year ///////////////////////////////////////////
$total_yearpur = $total_amtjanpur + $total_amtfebpur + $total_amtMarchpur + $total_amtAprilpur + $total_amtMaypur + $total_amtJunepur + $total_amtJulypur + $total_amtAugustpur + $total_amtSeptpur + $total_amtOctpur + $total_amtNovpur + $total_amtDecpur + $total_amtJan2017pur + $total_amtFeb2017pur + $total_amtMarch2017pur; 

$total_yearsell = $total_amtjansell + $total_amtfebsell + $total_amtMarchsell + $total_amtAprilsell + $total_amtMaysell + $total_amtJunesell + $total_amtJulysell + $total_amtAugustsell + $total_amtSeptsell + $total_amtOctsell + $total_amtNovsell + $total_amtDecsell + $total_amtJan2017sell + $total_amtFeb2017sell + $total_amtMarch2017sell; 
//////////////////// Petty ////////////////////////////////////
//////////////////// January ///////////////////////////////////////////
$pettyjan = "select sum(Cheque_Amount) as sum_amt from petty_details where Date between '2016-01-01' and '2016-01-31'";
$pettyjanexe = mysql_query($pettyjan);
$pettyjanfetch = mysql_fetch_array($pettyjanexe);
//////////////////// February ///////////////////////////////////////////
$pettyfeb = "select sum(Cheque_Amount) as sum_amt from petty_details where Date between '2016-02-01' and '2016-02-29'";
$pettyfebexe = mysql_query($pettyfeb);
$pettyfebfetch = mysql_fetch_array($pettyfebexe);
//////////////////// March ///////////////////////////////////////////
$pettyMarch = "select sum(Cheque_Amount) as sum_amt from petty_details where Date between '2016-03-01' and '2016-03-31'";
$pettyMarchexe = mysql_query($pettyMarch);
$pettyMarchfetch = mysql_fetch_array($pettyMarchexe);
//////////////////// April ///////////////////////////////////////////
$pettyApril = "select sum(Cheque_Amount) as sum_amt from petty_details where Date between '2016-04-01' and '2016-04-30'";
$pettyAprilexe = mysql_query($pettyApril);
$pettyAprilfetch = mysql_fetch_array($pettyAprilexe);
//////////////////// May ///////////////////////////////////////////
$pettyMay = "select sum(Cheque_Amount) as sum_amt from petty_details where Date between '2016-05-01' and '2016-05-31'";
$pettyMayexe = mysql_query($pettyMay);
$pettyMayfetch = mysql_fetch_array($pettyMayexe);
//////////////////// June ///////////////////////////////////////////
$pettyJune = "select sum(Cheque_Amount) as sum_amt from petty_details where Date between '2016-06-01' and '2016-06-30'";
$pettyJuneexe = mysql_query($pettyJune);
$pettyJunefetch = mysql_fetch_array($pettyJuneexe);
//////////////////// July ///////////////////////////////////////////
$pettyJuly = "select sum(Cheque_Amount) as sum_amt from petty_details where Date between '2016-07-01' and '2016-07-31'";
$pettyJulyexe = mysql_query($pettyJuly);
$pettyJulyfetch = mysql_fetch_array($pettyJulyexe);
//////////////////// August ///////////////////////////////////////////
$pettyAugust = "select sum(Cheque_Amount) as sum_amt from petty_details where Date between '2016-08-01' and '2016-08-31'";
$pettyAugustexe = mysql_query($pettyAugust);
$pettyAugustfetch = mysql_fetch_array($pettyAugustexe);
//////////////////// Sept ///////////////////////////////////////////
$pettySept = "select sum(Cheque_Amount) as sum_amt from petty_details where Date between '2016-09-01' and '2016-09-30'";
$pettySeptexe = mysql_query($pettySept);
$pettySeptfetch = mysql_fetch_array($pettySeptexe);
//////////////////// Oct ///////////////////////////////////////////
$pettyOct = "select sum(Cheque_Amount) as sum_amt from petty_details where Date between '2016-10-01' and '2016-10-31'";
$pettyOctexe = mysql_query($pettyOct);
$pettyOctfetch = mysql_fetch_array($pettyOctexe);
//////////////////// Nov ///////////////////////////////////////////
$pettyNov = "select sum(Cheque_Amount) as sum_amt from petty_details where Date between '2016-11-01' and '2016-11-30'";
$pettyNovexe = mysql_query($pettyNov);
$pettyNovfetch = mysql_fetch_array($pettyNovexe);
//////////////////// Dec ///////////////////////////////////////////
$pettyDec = "select sum(Cheque_Amount) as sum_amt from petty_details where Date between '2016-12-01' and '2016-12-31'";
$pettyDecexe = mysql_query($pettyDec);
$pettyDecfetch = mysql_fetch_array($pettyDecexe);
//////////////////// Jan2017 ///////////////////////////////////////////
$pettyJan2017 = "select sum(Cheque_Amount) as sum_amt from petty_details where Date between '2017-01-01' and '2017-01-31'";
$pettyJan2017exe = mysql_query($pettyJan2017);
$pettyJan2017fetch = mysql_fetch_array($pettyJan2017exe);
//////////////////// Feb2017 ///////////////////////////////////////////
$pettyFeb2017 = "select sum(Cheque_Amount) as sum_amt from petty_details where Date between '2017-02-01' and '2017-02-28'";
$pettyFeb2017exe = mysql_query($pettyFeb2017);
$pettyFeb2017fetch = mysql_fetch_array($pettyFeb2017exe);
///////////////////// March2017 /////////////////////////////////////////////////
$pettyMarch2017 = "select sum(Cheque_Amount) as sum_amt from petty_details where Date between '2017-03-01' and '2017-03-31'";
$pettyMarch2017exe = mysql_query($pettyMarch2017);
$pettyMarch2017fetch = mysql_fetch_array($pettyMarch2017exe);
///////////////// total petty year //////////////////////
$total_pettyyear = $pettyjanfetch['sum_amt'] + $pettyfebfetch['sum_amt'] + $pettyMarchfetch['sum_amt'] + $pettyAprilfetch['sum_amt'] + $pettyMayfetch['sum_amt'] + $pettyJunefetch['sum_amt'] + $pettyJulyfetch['sum_amt'] + $pettyAugustfetch['sum_amt'] + $pettySeptfetch['sum_amt'] + $pettyOctfetch['sum_amt'] + $pettyNovfetch['sum_amt'] + $pettyDecfetch['sum_amt'] + $pettyJan2017fetch['sum_amt'] + $pettyFeb2017fetch['sum_amt'] + $pettyMarch2017fetch['sum_amt'];

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
</head>
<body>   
<?php include("sidemenu.php"); ?>
                <div class="inner">
                    <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" align="center">YEAR 2016 - 2017</h1>
                </div>
            </div>
<div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <div id="div-1" class="table-responsive">
        <div style="float:right"><a href="rojmonthprint" target="_blank">Print</a></div>
            <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                       <tr>
                                       <th>MONTHS</th>
                                       <th>PURCHASE</th>
                                       <th>SELLING</th>
                                       <th>EXPENSES</th>
                                       </tr>
                                       </thead>
                                      <tbody>
                                        <tr> 
                                        <th><a href="rojmedindividual?January&action=january" target="_blank">JANUARY</a></th>
                                        <td><?php echo moneyFormatIndia($total_amtjanpur);?></td>
                                        <td><?php echo moneyFormatIndia($total_amtjansell);?></td>
                                        <td><?php if($pettyjanfetch['sum_amt']!=""){ echo moneyFormatIndia($pettyjanfetch['sum_amt']);} else { echo "0.00";}?></td>
                                        </tr>
                                        <tr>
                                        <th><a href="rojmedindividual?February&action=february" target="_blank">FEBRUARY</a></th>
                                        <td><?php echo moneyFormatIndia($total_amtfebpur);?></td>
                                        <td><?php echo moneyFormatIndia($total_amtfebsell);?></td>
                                        <td><?php if($pettyfebfetch['sum_amt']!=""){echo moneyFormatIndia($pettyfebfetch['sum_amt']);} else { echo "0.00";}?></td>
                                        </tr>
                                        <tr>
                                        <th><a href="rojmedindividual?March&action=march" target="_blank">MARCH</a></th>
                                        <td><?php echo moneyFormatIndia($total_amtMarchpur);?></td>
                                        <td><?php echo moneyFormatIndia($total_amtMarchsell);?></td>
                                       <td><?php if($pettyMarchfetch['sum_amt']!=""){echo moneyFormatIndia($pettyMarchfetch['sum_amt']);} else { echo "0.00";}?></td>
                                        </tr>
                                        <tr>
                                        <th><a href="rojmedindividual?April&action=april" target="_blank">APRIL</a></th>
                                        <td><?php echo moneyFormatIndia($total_amtAprilpur);?></td>
                                        <td><?php echo moneyFormatIndia($total_amtAprilsell);?></td>
                                        <td><?php if($pettyAprilfetch['sum_amt']!=""){echo moneyFormatIndia($pettyAprilfetch['sum_amt']);} else { echo "0.00";}?></td>
                                        </tr>
                                        <tr>
                                        <th><a href="rojmedindividual?May&action=may" target="_blank">MAY</a></th>
                                        <td><?php echo moneyFormatIndia($total_amtMaypur);?></td>
                                        <td><?php echo moneyFormatIndia($total_amtMaysell);?></td>
                                        <td><?php if($pettyMayfetch['sum_amt']!=""){echo moneyFormatIndia($pettyMayfetch['sum_amt']);} else { echo "0.00";}?></td>
                                        </tr>
                                        <tr>
                                        <th><a href="rojmedindividual?June&action=june" target="_blank">JUNE</a></th>
                                        <td><?php echo moneyFormatIndia($total_amtJunepur);?></td>
                                        <td><?php echo moneyFormatIndia($total_amtJunesell);?></td>
                                       <td><?php if($pettyJunefetch['sum_amt']!=""){echo moneyFormatIndia($pettyJunefetch['sum_amt']);} else { echo "0.00";}?></td>
                                        </tr>
                                        <tr>
                                        <th><a href="rojmedindividual?July&action=july" target="_blank">JULY</a></th>
                                        <td><?php echo moneyFormatIndia($total_amtJulypur);?></td>
                                        <td><?php echo moneyFormatIndia($total_amtJulysell);?></td>
                                       <td><?php if($pettyJulyfetch['sum_amt']!=""){echo moneyFormatIndia($pettyJulyfetch['sum_amt']);} else { echo "0.00";}?></td>
                                        </tr>
                                        <tr>
                                        <th><a href="rojmedindividual?August&action=august" target="_blank">AUGUST</a></th>
                                        <td><?php echo moneyFormatIndia($total_amtAugustpur);?></td>
                                        <td><?php echo moneyFormatIndia($total_amtAugustsell);?></td>
                                       <td><?php if($pettyAugustfetch['sum_amt']!=""){echo moneyFormatIndia($pettyAugustfetch['sum_amt']);} else { echo "0.00";}?></td>
                                        </tr>
                                        <tr>
                                        <th><a href="rojmedindividual?September&action=september" target="_blank">SEPTEMBER</a></th>
                                        <td><?php echo moneyFormatIndia($total_amtSeptpur);?></td>
                                        <td><?php echo moneyFormatIndia($total_amtSeptsell);?></td>
                                       <td><?php if($pettySeptfetch['sum_amt']!=""){echo moneyFormatIndia($pettySeptfetch['sum_amt']);} else { echo "0.00";}?></td>
                                        </tr>
                                        <tr>
                                        <th><a href="rojmedindividual?October&action=october" target="_blank">OCTOBER</a></th>
                                        <td><?php echo moneyFormatIndia($total_amtOctpur);?></td>
                                        <td><?php echo moneyFormatIndia($total_amtOctsell);?></td>
                                        <td><?php if($pettyOctfetch['sum_amt']!=""){echo moneyFormatIndia($pettyOctfetch['sum_amt']);} else { echo "0.00";}?></td>
                                        </tr>
                                        <tr>
                                        <th><a href="rojmedindividual?November&action=november" target="_blank">NOVEMBER</a></th>
                                        <td><?php echo moneyFormatIndia($total_amtNovpur);?></td>
                                        <td><?php echo moneyFormatIndia($total_amtNovsell);?></td>
                                       <td><?php if($pettyNovfetch['sum_amt']!=""){echo moneyFormatIndia($pettyNovfetch['sum_amt']);} else { echo "0.00";}?></td>
                                        </tr>
                                        <tr>
                                        <th><a href="rojmedindividual?December&action=december" target="_blank">DECEMBER</a></th>
                                        <td><?php echo moneyFormatIndia($total_amtDecpur);?></td>
                                        <td><?php echo moneyFormatIndia($total_amtDecsell);?></td>
                                      <td><?php if($pettyDecfetch['sum_amt']!=""){echo moneyFormatIndia($pettyDecfetch['sum_amt']);} else { echo "0.00";}?></td>
                                        </tr>
                                        <tr>
                                        <th><a href="rojmedindividual?January2017&action=january2017" target="_blank">JANUARY 2017</a></th>
                                        <td><?php echo moneyFormatIndia($total_amtJan2017pur);?></td>
                                        <td><?php echo moneyFormatIndia($total_amtJan2017sell);?></td>
                                       <td><?php if($pettyJan2017fetch['sum_amt']!=""){echo moneyFormatIndia($pettyJan2017fetch['sum_amt']);} else { echo "0.00";}?></td>
                                        </tr>
                                        <tr>
                                        <th><a href="rojmedindividual?February2017&action=february2017" target="_blank">FEBRUARY 2017</a></th>
                                        <td><?php echo moneyFormatIndia($total_amtFeb2017pur);?></td>
                                        <td><?php echo moneyFormatIndia($total_amtFeb2017sell);?></td>
                                        <td><?php if($pettyFeb2017fetch['sum_amt']!=""){ echo moneyFormatIndia($pettyFeb2017fetch['sum_amt']);} else { echo "0.00";}?></td>
                                        </tr>
                                        <tr>
                                        <th><a href="rojmedindividual?March2017&action=march2017" target="_blank">MARCH 2017</a></th>
                                        <td><?php echo moneyFormatIndia($total_amtMarch2017pur);?></td>
                                        <td><?php echo moneyFormatIndia($total_amtMarch2017sell);?></td>
                                        <td><?php if($pettyMarch2017fetch['sum_amt']!=""){echo moneyFormatIndia($pettyMarch2017fetch['sum_amt']);} else { echo "0.00";}?></td>
                                        </tr>
                                     <tr>
                                     <th><span style="float:right">Total Amount of year :</span></th>
                                     <th><?php echo moneyFormatIndia($total_yearpur);?></th>
                                     <th><?php echo moneyFormatIndia($total_yearsell);?></th>
                                     <th><?php echo moneyFormatIndia($total_pettyyear);?></th>
                                     </tr>
                                    </tbody>
                                </table>
                               
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