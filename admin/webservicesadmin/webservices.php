<?php
include("webserconn.php");
///////////////// other used ////////////////////////////////////////////////////////
$otherusedmain = "select Other_Used_Id,Other_Used_Date,machine_parts.Mach_Part_Id,machine_parts.Mach_Pname,Quantity_Used,Quantity_Re,other_used1.Entry_Date,other_used1.Entry_Id,labour_details.Name from machine_parts,other_used1,labour_details where machine_parts.Mach_Part_Id = other_used1.Mach_Part_Id AND labour_details.Labour_Id = other_used1.Labour_Id";
$otherusedmain1 = $conn->query($otherusedmain);
while($otherusedmain2 = $otherusedmain1->fetch_object())
{
	$rwotherusedmain[] = $otherusedmain2;
}
 echo $res = json_encode($rwotherusedmain);
 echo '<hr/>';
///////////////// other challan cum invoice main & sub ////////////////////////////////////////////////////////
$otchcuinvmain = "select * from other_d_c";
$otchcuinvmain1 = $conn->query($otchcuinvmain);
while($otchcuinvmain2 = $otchcuinvmain1->fetch_object())
{
	$rwotchcuinvmain[] = $otchcuinvmain2;
}
echo json_encode($rwotchcuinvmain);
echo '<hr/>';
echo '<br/>';
$otchcuinvsub = "select Ot_D_C_Id,Other_D_C_Id,machine_parts.Mach_Part_Id,machine_parts.Mach_Pname,Quantity,Rate,Amount,R_Id from other_sub_orgdc,machine_parts where machine_parts.Mach_Part_Id = other_sub_orgdc.Mach_Part_Id";
$otchcuinvsub1 = $conn->query($otchcuinvsub);
while($otchcuinvsub2 = $otchcuinvsub1->fetch_object())
{
	$rwotchcuinvsub[] = $otchcuinvsub2;
}
echo json_encode($rwotchcuinvsub);
echo '<hr/>';
echo '<br/>';
///////////////// taka order main & sub ////////////////////////////////////////////////////////
$takaordermain = "SELECT taka_order_master.T_Order_Id, taka_order_master.Om_Date, customer_details.Cu_En_Name, broker_details1.B_Name, taka_order_master.Total_Amt, taka_order_master.Discount, taka_order_master.Grandtotal, taka_order_master.Advance_Amt, taka_order_master.Delivery_Date, taka_order_master.Remark, taka_order_master.Status, taka_order_master.Re_Amt,taka_order_master.Entry_Id FROM taka_order_master, customer_details, broker_details1 WHERE customer_details.Customer_Id = taka_order_master.Customer_Id AND broker_details1.Broker_Id = taka_order_master.Broker_Id";
$takaordermain1 = $conn->query($takaordermain);
while($takaordermain2 = $takaordermain1->fetch_object())
{
	$rwtakaordermain[] = $takaordermain2;
}
echo json_encode($rwtakaordermain);
echo '<br/>';
$takaordersub = "SELECT taka_order_detailsorg.T_Od_Id, taka_order_detailsorg.T_Order_Id, quality_details.Quality_Name, taka_order_detailsorg.Quantity, taka_order_detailsorg.Rate, taka_order_detailsorg.Amount, taka_order_detailsorg.R_Id FROM taka_order_detailsorg, quality_details WHERE quality_details.Quality_Id = taka_order_detailsorg.Quality_Id";
$takaordersub1 = $conn->query($takaordersub);
while($takaordersub2 = $takaordersub1->fetch_object())
{
	$rwtakaordersub[] = $takaordersub2;
}
echo json_encode($rwtakaordersub);
echo '<hr/>';
echo '<br/>';
///////////////// saree order main & sub ////////////////////////////////////////////////////////
$sareeordermain = "SELECT order_master.Order_Id, order_master.Om_Date, customer_details.Cu_En_Name, broker_details1.B_Name, order_master.Total_Amt, order_master.Discount, order_master.Grandtotal, order_master.Advance_Amt, order_master.Delivery_Date, order_master.Remark, order_master.Status, order_master.Re_Amt, order_master.Entry_Id FROM order_master, customer_details, broker_details1 WHERE customer_details.Customer_Id = order_master.Customer_Id AND broker_details1.Broker_Id = order_master.Broker_Id";
$sareeordermain1 = $conn->query($sareeordermain);
while($sareeordermain2 = $sareeordermain1->fetch_object())
{
	$rwsareeordermain[] = $sareeordermain2;
}
echo json_encode($rwsareeordermain);
echo '<hr/>';
echo '<br/>';
$sareeordersub = "SELECT order_detailsorg.Od_Id, order_detailsorg.Order_Id, quality_details.Quality_Name, design_details.Design, order_detailsorg.Quantity, order_detailsorg.Rate, order_detailsorg.Amount, order_detailsorg.R_Id FROM order_detailsorg, quality_details, design_details WHERE quality_details.Quality_Id = design_details.Quality_Id AND design_details.Design_Id = order_detailsorg.Design_Id";
$sareeordersub1 = $conn->query($sareeordersub);
while($sareeordersub2 = $sareeordersub1->fetch_object())
{
	$rwsareeordersub[] = $sareeordersub2;
}
echo json_encode($rwsareeordersub);
echo '<hr/>';
echo '<br/>';
///////////////// beam delivery challan main & sub ////////////////////////////////////////////////////////
$beamdcchallanmain = "SELECT beam_d_c_1.Beam_D_C_Id, beam_d_c_1.Beam_D_C_Date, beam_d_c_1.Beam_D_C_No, company_deetaails.C_Name, broker_details1.B_Name, beam_d_c_1.Total_Beam, beam_d_c_1.Entry_Date, beam_d_c_1.Entry_Id FROM beam_d_c_1, company_deetaails, broker_details1 WHERE company_deetaails.Company_Id = beam_d_c_1.Company_Id AND beam_d_c_1.Broker_Id = broker_details1.Broker_Id";
$beamdcchallanmain1 = $conn->query($beamdcchallanmain);
while($beamdcchallanmain2 = $beamdcchallanmain1->fetch_object())
{
	$rwbeamdcchallanmain[] = $beamdcchallanmain2;
}
echo json_encode($rwbeamdcchallanmain);
echo '<hr/>';
echo '<br/>';
$beamdcchallansub = "SELECT beam_dcorg.Be_D_C_Id, beam_dcorg.Beam_D_C_Id, beam_dcorg.Beam_No, beam_dcorg.Taar, beam_dcorg.Beam_Meter, beam_dcorg.Weight, quality_details.Quality_Name, beam_dcorg.Status, beam_dcorg.R_Id FROM beam_dcorg, quality_details WHERE quality_details.Quality_Id = beam_dcorg.Quality_Id";
$beamdcchallansub1 = $conn->query($beamdcchallansub);
while($beamdcchallansub2 = $beamdcchallansub1->fetch_object())
{
	$rwbeamdcchallansub[] = $beamdcchallansub2;
}
echo json_encode($rwbeamdcchallansub);
echo '<hr/>';
echo '<br/>';
////////////////////////////// beam delivery challan for migration main & sub ////////////////////////////////
$beammigratemain = "select * from beam_d_c_1migrate";
$beammigratemain1 = $conn->query($beammigratemain);
$beammigratenum1 = $beammigratemain1->num_rows;
while($beammigratemain2 = $beammigratemain1->fetch_object())
{
	$rwbeammigratemain[] = $beammigratemain2;
}
echo json_encode($rwbeammigratemain);
echo '<hr/>';
echo '<br/>';

$beammigratesub = "select Be_D_C_Id,Beam_D_C_Id,Chbe_D_c_Id,Beam_No,Taar,Beam_Meter,Weight,quality_details.Quality_Name,R_Id from beam_dcorgmigrate,quality_details where quality_details.Quality_Id = beam_dcorgmigrate.Quality_Id";
$beammigratesub1 = $conn->query($beammigratesub);
while($beammigratesub2 = $beammigratesub1->fetch_object())
{
	$rwbeammigratesub[] = $beammigratesub2;
}
echo json_encode($rwbeammigratesub);
echo '<hr/>';
echo '<br/>';
////////////////////////////// beam invoice main & sub ////////////////////////////////
$beaminvoicemain = "select beam_invoice.Beam_Invoice_Id, beam_invoice.Beam_D_C_Id, beam_invoice.Beam_Invoice_Date, beam_invoice.Invoice_No, beam_invoice.Total_Amt, beam_invoice.Addtnl_Amt,company_deetaails.C_Name, broker_details1.B_Name, beam_invoice.Total_B, beam_invoice.Grand_Amt, beam_invoice.Entry_Date, beam_invoice.Entry_Id from  beam_invoice,company_deetaails,broker_details1 where company_deetaails.Company_Id = beam_invoice.Company_Id AND broker_details1.Broker_Id = beam_invoice.Broker_Id";
$beaminvoicemain1 = $conn->query($beaminvoicemain);
while($beaminvoicemain2 = $beaminvoicemain1->fetch_object())
{
	$rwbeaminvoicemain[] = $beaminvoicemain2;
}
echo json_encode($rwbeaminvoicemain);
echo '<hr/>';
echo '<br/>';
$beaminvoicesub = "SELECT beam_invoiceorg.Be_Invoice_Id, beam_invoiceorg.Beam_Invoice_Id, beam_invoiceorg.Total_Beam, beam_invoiceorg.Ends, beam_invoiceorg.Quantity, quality_details.Quality_Name, beam_invoiceorg.Rate, beam_invoiceorg.Amount, beam_invoiceorg.R_Id FROM beam_invoiceorg, quality_details WHERE beam_invoiceorg.Quality_Id = quality_details.Quality_Id";
$beaminvoicesub1 = $conn->query($beaminvoicesub);
while($beaminvoicesub2 = $beaminvoicesub1->fetch_object())
{
	$rwbeaminvoicesub[] = $beaminvoicesub2;
}
echo json_encode($rwbeaminvoicesub);
echo '<hr/>';
echo '<br/>';
///////////////// bobbin delivery challan main & sub ////////////////////////////////////////////////////////
$bobbindcchallanmain = "SELECT  bobbin_d_c.Bo_D_C_Id,  bobbin_d_c.Bo_D_C_Date,  bobbin_d_c.Bo_D_C_No, company_deetaails.C_Name, broker_details1.B_Name,  bobbin_d_c.Total_Cart,  bobbin_d_c.Entry_Date,  bobbin_d_c.Entry_Id FROM  bobbin_d_c, company_deetaails, broker_details1 WHERE company_deetaails.Company_Id =  bobbin_d_c.Company_Id AND  bobbin_d_c.Broker_Id = broker_details1.Broker_Id";
$bobbindcchallanmain1 = $conn->query($bobbindcchallanmain);
while($bobbindcchallanmain2 = $bobbindcchallanmain1->fetch_object())
{
	$rwbobbindcchallanmain[] = $bobbindcchallanmain2;
}
echo json_encode($rwbobbindcchallanmain);
echo '<hr/>';
echo '<br/>';
$bobbindcchallansub = "SELECT boobin_dcorg.Bobbin_D_C_Id,boobin_dcorg.Bo_D_C_Id,boobin_dcorg.Total_Cartoon, boobin_dcorg.Total_Weight, quality_details.Quality_Name,boobin_dcorg.Status,boobin_dcorg.R_Id FROM boobin_dcorg, quality_details WHERE boobin_dcorg.Quality_Id = quality_details.Quality_Id";
$bobbindcchallansub1 = $conn->query($bobbindcchallansub);
while($bobbindcchallansub2 = $bobbindcchallansub1->fetch_object())
{
	$rwbobbindcchallansub[] = $bobbindcchallansub2;
}
echo json_encode($rwbobbindcchallansub);
echo '<hr/>';
echo '<br/>';
////////////////////////////// bobbin delivery challan for migration main & sub ////////////////////////////////
$bobbinmigratemain = "select * from bobbin_d_cmigrate";
$bobbinmigratemain1 = $conn->query($bobbinmigratemain);
while($bobbinmigratemain2 = $bobbinmigratemain1->fetch_object())
{
	$rwbobbinmigratemain[] = $bobbinmigratemain2;
}
echo json_encode($rwbobbinmigratemain);
echo '<hr/>';
echo '<br/>';

$bobbinmigratesub = "select Bobbin_D_C_Id,Bo_D_C_Id,Chbo_D_C_Id,Total_Cartoon,quality_details.Quality_Name,R_Id from boobin_dcorgmigrate,quality_details where quality_details.Quality_Id = boobin_dcorgmigrate.Quality_Id";
$bobbinmigratesub1 = $conn->query($bobbinmigratesub);
while($bobbinmigratesub2 = $bobbinmigratesub1->fetch_object())
{
	$rwbobbinmigratesub[] = $bobbinmigratesub2;
}
echo json_encode($rwbobbinmigratesub);
echo '<hr/>';
echo '<br/>';

////////////////////////////// bobbin invoice main & sub ////////////////////////////////
$bobbininvoicemain = "SELECT bobbin_invoice.Bobbin_Invoice_Id, bobbin_invoice.Bobbin_Invoice_Date, bobbin_invoice.Invoice_No, bobbin_invoice.Bo_D_C_Id, company_deetaails.Company_Id, company_deetaails.C_Name, broker_details1.Broker_Id, broker_details1.B_Name, bobbin_invoice.Total_Amt, bobbin_invoice.Addtnl_Amt, bobbin_invoice.Grand_Amt, bobbin_invoice.Total_Cart, bobbin_invoice.Entry_Date, bobbin_invoice.Entry_Id FROM bobbin_invoice, company_deetaails, broker_details1 WHERE company_deetaails.Company_Id = bobbin_invoice.Company_Id AND broker_details1.Broker_Id = bobbin_invoice.Broker_Id";
$bobbininvoicemain1 = $conn->query($bobbininvoicemain);
while($bobbininvoicemain2 = $bobbininvoicemain1->fetch_object())
{
	$rwbobbininvoicemain[] = $bobbininvoicemain2;
}
echo json_encode($rwbobbininvoicemain);
echo '<hr/>';
echo '<br/>';

$bobbininvoicesub = "SELECT bobbin_invoiceorg.Bo_Invoice_Id, bobbin_invoiceorg.Bobbin_Invoice_Id, bobbin_invoiceorg.Total_Cartoon, bobbin_invoiceorg.Total_Weight, quality_details.Quality_Name, bobbin_invoiceorg.Rate, bobbin_invoiceorg.Amt, bobbin_invoiceorg.R_Id FROM bobbin_invoiceorg, quality_details WHERE quality_details.Quality_Id = bobbin_invoiceorg.Quality_Id";
$bobbininvoicesub1 = $conn->query($bobbininvoicesub);
while($bobbininvoicesub2 = $bobbininvoicesub1->fetch_object())
{
	$rwbobbininvoicesub[] = $bobbininvoicesub2;
}
echo json_encode($rwbobbininvoicesub);
echo '<hr/>';
echo '<br/>';

///////////////// taka delivery challan main & sub ////////////////////////////////////////////////////////
$takadcchallanmain = "SELECT taka_d_c_1.Taka_D_C_Id, taka_d_c_1.Taka_D_C_Date, customer_details.Cu_En_Name, broker_details1.B_Name, taka_d_c_1.T_Order_Id, taka_d_c_1.Total_Taka, taka_d_c_1.Entry_Id FROM taka_d_c_1, customer_details, broker_details1 WHERE customer_details.Customer_Id = taka_d_c_1.Customer_Id AND broker_details1.Broker_Id = taka_d_c_1.Broker_Id";
$takadcchallanmain1 = $conn->query($takadcchallanmain);
while($takadcchallanmain2 = $takadcchallanmain1->fetch_object())
{
	$rwtakadcchallanmain[] = $takadcchallanmain2;
}
echo json_encode($rwtakadcchallanmain);
echo '<hr/>';
echo '<br/>';
$takadcchallansub = "SELECT taka_dcorg.Ta_D_C_Id, taka_dcorg.Taka_D_C_Id, taka_dcorg.Taka_Id, taka_dcorg.Taka_Meter, taka_dcorg.Taka_Weight, quality_details.Quality_Name, taka_dcorg.Status, taka_dcorg.R_Id FROM taka_dcorg,quality_details WHERE quality_details.Quality_Id = taka_dcorg.Quality_Id";
$takadcchallansub1 = $conn->query($takadcchallansub);
while($takadcchallansub2 = $takadcchallansub1->fetch_object())
{
	$rwtakadcchallansub[] = $takadcchallansub2;
}
echo json_encode($rwtakadcchallansub);
echo '<hr/>';
echo '<br/>';

////////////////////////////// taka delivery challan for migration main & sub ////////////////////////////////
$takamigratemain = "select * from taka_d_c_migrate";
$takamigratemain1 = $conn->query($takamigratemain);
while($takamigratemain2 = $takamigratemain1->fetch_object())
{
	$rwtakamigratemain[] = $takamigratemain2;
}
echo json_encode($rwtakamigratemain);
echo '<hr/>';
echo '<br/>';

$takamigratesub = "SELECT taka_dcorgmigrate.Ta_D_C_Id, taka_dcorgmigrate.Taka_D_C_Id, taka_dcorgmigrate.Taka_Id, taka_dcorgmigrate.Taka_Meter, taka_dcorgmigrate.Taka_Weight, taka_dcorgmigrate.R_Id, quality_details.Quality_Name FROM taka_dcorgmigrate, quality_details WHERE quality_details.Quality_Id = taka_dcorgmigrate.Quality_Id";
$takamigratesub1 = $conn->query($takamigratesub);
while($takamigratesub2 = $takamigratesub1->fetch_object())
{
	$rwtakamigratesub[] = $takamigratesub2;
}
echo json_encode($rwtakamigratesub);
echo '<hr/>';
echo '<br/>';

////////////////////////////// taka delivery challan for mill main & sub ////////////////////////////////
$takamillmain = "select * from taka_d_c_mill";
$takamillmain1 = $conn->query($takamillmain);
while($takamillmain2 = $takamillmain1->fetch_object())
{
	$rwtakamillmain[] = $takamillmain2;
}
echo json_encode($rwtakamillmain);
echo '<hr/>';
echo '<br/>';

$takamillsub = "SELECT taka_dcorgmill.Ta_D_C_Id, taka_dcorgmill.Taka_D_C_Id, taka_dcorgmill.Taka_Id, taka_dcorgmill.Taka_Meter, taka_dcorgmill.Taka_Weight, taka_dcorgmill.R_Id, quality_details.Quality_Name FROM taka_dcorgmill, quality_details WHERE quality_details.Quality_Id = taka_dcorgmill.Quality_Id";
$takamillsub1 = $conn->query($takamillsub);
while($takamillsub2 = $takamillsub1->fetch_object())
{
	$rwtakamillsub[] = $takamillsub2;
}
echo json_encode($rwtakamillsub);
echo '<hr/>';
echo '<br/>';

////////////////////////////// taka production main & sub ////////////////////////////////
$takapromain = "SELECT taka_production.Ta_Pro_Id,beam_machine.Be_M_Id,beam_d_c_2.Beam_No,machine_details.Machine_No,taka_production.Started_Date,taka_production.Total_Taka,taka_production.Total_Meter,taka_production.Beam_Meter,taka_production.Shortage,taka_production.Shortageper,taka_production.Entry_Id FROM taka_production, beam_d_c_2,beam_machine,machine_details WHERE beam_d_c_2.Be_D_C_Id = beam_machine.Be_D_C_Id AND beam_machine.Be_M_Id = taka_production.Be_M_Id AND machine_details.Machine_Id = beam_machine.Machine_Id";
$takapromain1 = $conn->query($takapromain);
while($takapromain2 = $takapromain1->fetch_object())
{
	$rwtakapromain[] = $takapromain2;
}
echo json_encode($rwtakapromain);
echo '<hr/>';
echo '<br/>';

$takaprosub = "SELECT taka_detailsorg.Ta_Pro_Id, taka_detailsorg.T_Date, taka_detailsorg.Taka_Meter, taka_detailsorg.Taka_Weight, quality_details.Quality_Name, taka_detailsorg.Status, taka_detailsorg.`Description`, taka_detailsorg.Taka_Id, taka_detailsorg.R_Id FROM taka_detailsorg, quality_details WHERE quality_details.Quality_Id = taka_detailsorg.Quality_Id order by taka_detailsorg.Taka_Id asc";
$takaprosub1 = $conn->query($takaprosub);
while($takaprosub2 = $takaprosub1->fetch_object())
{
	$rwtakaprosub[] = $takaprosub2;
}
echo json_encode($rwtakaprosub);
echo '<hr/>';
echo '<br/>';

////////////////////////////// taka production-labour main & sub ////////////////////////////////
$takaprolabmain = "select taka_labsal.Ta_Labour_Id,taka_production.Total_Meter,taka_labsal.Ta_Pro_Id,taka_labsal.Total_L_Amount,machine_details.Machine_No,beam_d_c_2.Beam_No,taka_labsal.Total_MeterLab,taka_labsal.Entry_Date,taka_labsal.Entry_Id from taka_production,beam_d_c_2,taka_labsal,beam_machine,machine_details where taka_production.Ta_Pro_Id = taka_labsal.Ta_Pro_Id AND beam_machine.Be_M_Id = taka_production.Be_M_Id AND machine_details.Machine_Id = beam_machine.Machine_Id AND beam_machine.Be_D_C_Id = beam_d_c_2.Be_D_C_Id";
$takaprolabmain1 = $conn->query($takaprolabmain);
while($takaprolabmain2 = $takaprolabmain1->fetch_object())
{
	$rwtakaprolabmain[] = $takaprolabmain2;
}
echo json_encode($rwtakaprolabmain);
echo '<hr/>';
echo '<br/>';

$takaprolabsub = "select Taka_Labour_Id,Ta_Labour_Id,T_Date,Taka_Meter,L_Rate,L_Amount,labour_details.Name,taka_labsalsuborg.Description,R_Id,quality_details.Quality_Name from taka_labsalsuborg,labour_details,quality_details where labour_details.Labour_Id = taka_labsalsuborg.Labour_Id and quality_details.Quality_Id = taka_labsalsuborg.Quality_Id order by taka_labsalsuborg.Taka_Labour_Id asc";
$takaprolabsub1 = $conn->query($takaprolabsub);
while($takaprolabsub2 = $takaprolabsub1->fetch_object())
{
	$rwtakaprolabsub[] = $takaprolabsub2;
}
echo json_encode($rwtakaprolabsub);
echo '<hr/>';
echo '<br/>';

////////////////////////////// taka invoice main & sub ////////////////////////////////
$takainvoicemain = "SELECT taka_invoice.Taka_Invoice_Id, taka_invoice.Taka_Invoice_Date, taka_invoice.Taka_D_C_Id, taka_invoice.Taka_D_C_Date, customer_details.Cu_En_Name, broker_details1.B_Name, taka_invoice.Total_Amt, taka_invoice.Discount, taka_invoice.Grandtotal FROM taka_invoice, customer_details, broker_details1 WHERE customer_details.Customer_Id = taka_invoice.Customer_Id AND broker_details1.Broker_Id = taka_invoice.Broker_Id";
$takainvoicemain1 = $conn->query($takainvoicemain);
while($takainvoicemain2 = $takainvoicemain1->fetch_object())
{
	$rwtakainvoicemain[] = $takainvoicemain2;
}
echo json_encode($rwtakainvoicemain);
echo '<hr/>';
echo '<br/>';

$takainvoicesub = "SELECT taka_invoiceorg.Ta_Invoice_Id, taka_invoiceorg.Taka_Invoice_Id, quality_details.Quality_Name, taka_invoiceorg.Total_Taka, taka_invoiceorg.Total_Meter, taka_invoiceorg.Rate, taka_invoiceorg.Amt FROM taka_invoiceorg, quality_details WHERE quality_details.Quality_Id = taka_invoiceorg.Quality_Id";
$takainvoicesub1 = $conn->query($takainvoicesub);
while($takainvoicesub2 = $takainvoicesub1->fetch_object())
{
	$rwtakainvoicesub[] = $takainvoicesub2;
}
echo json_encode($rwtakainvoicesub);
echo '<hr/>';
echo '<br/>';

///////////////// saree delivery challan main & sub ////////////////////////////////////////////////////////
$sareedcchallanmain = "SELECT saree_d_c.Saree_D_C_Id, saree_d_c.Saree_D_C_Date, customer_details.Cu_En_Name,customer_details.Customer_Id, broker_details1.B_Name, broker_details1.Broker_Id, saree_d_c.Order_Id, saree_d_c.Total_Lot, saree_d_c.Entry_Id FROM saree_d_c, customer_details, broker_details1 WHERE customer_details.Customer_Id = saree_d_c.Customer_Id AND broker_details1.Broker_Id = saree_d_c.Broker_Id";
$sareedcchallanmain1 = $conn->query($sareedcchallanmain);
while($sareedcchallanmain2 = $sareedcchallanmain1->fetch_object())
{
	$rwsareedcchallanmain[] = $sareedcchallanmain2;
}
echo json_encode($rwsareedcchallanmain);
echo '<hr/>';
echo '<br/>';
$sareedcchallansub = "SELECT saree_dcorg.Sa_D_C_Id, saree_dcorg.Saree_D_C_Id, saree_dcorg.Saree_Lot_Id, saree_dcorg.Saree_Lot_Meter, saree_dcorg.Saree_Pieces, saree_dcorg.Saree_Weight, quality_details.Quality_Name, design_details.Design, saree_dcorg.Status, saree_dcorg.R_Id FROM saree_dcorg, quality_details, design_details WHERE quality_details.Quality_Id = design_details.Quality_Id AND design_details.Design_Id = saree_dcorg.Design_Id";
$sareedcchallansub1 = $conn->query($sareedcchallansub);
while($sareedcchallansub2 = $sareedcchallansub1->fetch_object())
{
	$rwsareedcchallansub[] = $sareedcchallansub2;
}
echo json_encode($rwsareedcchallansub);
echo '<hr/>';
echo '<br/>';

////////////////////////////// saree delivery challan for migration main & sub ////////////////////////////////
$sareemigratemain = "select * from saree_d_migrate";
$sareemigratemain1 = $conn->query($sareemigratemain);
while($sareemigratemain2 = $sareemigratemain1->fetch_object())
{
	$rwsareemigratemain[] = $sareemigratemain2;
}
json_encode($rwsareemigratemain);
$sareemigratesub = "SELECT saree_dcorgmigrate.Sa_D_C_Id, saree_dcorgmigrate.Saree_D_C_Id, saree_dcorgmigrate.Saree_Lot_Id, saree_dcorgmigrate.Saree_Lot_Meter, saree_dcorgmigrate.Saree_Pieces, saree_dcorgmigrate.Saree_Weight, quality_details.Quality_Name, design_details.Design, saree_dcorgmigrate.R_Id FROM saree_dcorgmigrate, quality_details, design_details WHERE quality_details.Quality_Id = design_details.Quality_Id AND design_details.Design_Id = saree_dcorgmigrate.Design_Id";
$sareemigratesub1 = $conn->query($sareemigratesub);
while($sareemigratesub2 = $sareemigratesub1->fetch_object())
{
	$rwsareemigratesub[] = $sareemigratesub2;
}
echo json_encode($rwsareemigratesub);
echo '<hr/>';
echo '<br/>';

////////////////////////////// saree delivery challan for mill main & sub ////////////////////////////////
$sareemillmain = "select * from saree_d_mill";
$sareemillmain1 = $conn->query($sareemillmain);
while($sareemillmain2 = $sareemillmain1->fetch_object())
{
	$rwsareemillmain[] = $sareemillmain2;
}
echo json_encode($rwsareemillmain);
echo '<hr/>';
echo '<br/>';

$sareemillsub = "SELECT saree_dcorgmill.Sa_D_C_Id, saree_dcorgmill.Saree_D_C_Id, saree_dcorgmill.Saree_Lot_Id, saree_dcorgmill.Saree_Lot_Meter, saree_dcorgmill.Saree_Pieces, saree_dcorgmill.Saree_Weight, quality_details.Quality_Name, design_details.Design, saree_dcorgmill.R_Id FROM saree_dcorgmill, quality_details, design_details WHERE quality_details.Quality_Id = design_details.Quality_Id AND design_details.Design_Id = saree_dcorgmill.Design_Id";
$sareemillsub1 = $conn->query($sareemillsub);
while($sareemillsub2 = $sareemillsub1->fetch_object())
{
	$rwsareemillsub[] = $sareemillsub2;
}
echo json_encode($rwsareemillsub);
echo '<hr/>';
echo '<br/>';

////////////////////////////// saree invoice main & sub ////////////////////////////////
$sareeinvoicemain = "SELECT saree_invoice.Saree_Invoice_Id, saree_invoice.Saree_Invoice_Date, saree_invoice.Saree_D_C_Id, saree_invoice.Saree_D_C_Date, customer_details.Cu_En_Name, customer_details.Customer_Id, broker_details1.B_Name, broker_details1.Broker_Id, saree_invoice.Total_Amt, saree_invoice.Discount, saree_invoice.Grandtotal, saree_invoice.Entry_Id FROM saree_invoice, customer_details, broker_details1 WHERE customer_details.Customer_Id = saree_invoice.Customer_Id AND broker_details1.Broker_Id = saree_invoice.Broker_Id";
$sareeinvoicemain1 = $conn->query($sareeinvoicemain);
while($sareeinvoicemain2 = $sareeinvoicemain1->fetch_object())
{
	$rwsareeinvoicemain[] = $sareeinvoicemain2;
}
echo json_encode($rwsareeinvoicemain);
echo '<hr/>';
echo '<br/>';

$sareeinvoicesub = "SELECT saree_invoiceorg.Sa_Invoice_Id, saree_invoiceorg.Saree_Invoice_Id, quality_details.Quality_Name, design_details.Design, saree_invoiceorg.Total_Meter,saree_invoiceorg.Total_Weight, saree_invoiceorg.Total_Pieces, saree_invoiceorg.Rate, saree_invoiceorg.Amt, saree_invoiceorg.R_Id FROM saree_invoiceorg, quality_details, design_details WHERE quality_details.Quality_Id = design_details.Quality_Id AND design_details.Design_Id = saree_invoiceorg.Design_Id";
$sareeinvoicesub1 = $conn->query($sareeinvoicesub);
while($sareeinvoicesub2 = $sareeinvoicesub1->fetch_object())
{
	$rwsareeinvoicesub[] = $sareeinvoicesub2;
}
echo json_encode($rwsareeinvoicesub);
echo '<hr/>';
echo '<br/>';


////////////////////////////// saree production main & sub ////////////////////////////////
$sareepromain = "SELECT saree_production.Sa_Pro_Id,beam_machine.Be_M_Id,beam_d_c_2.Beam_No,machine_details.Machine_No,saree_production.Started_Date,saree_production.Total_Piecess,saree_production.Total_Meter,saree_production.Beam_Meter,saree_production.Shortage,saree_production.Shortageper,saree_production.Entry_Id FROM saree_production, beam_d_c_2,beam_machine,machine_details WHERE beam_d_c_2.Be_D_C_Id = beam_machine.Be_D_C_Id AND beam_machine.Be_M_Id = saree_production.Be_M_Id AND machine_details.Machine_Id = beam_machine.Machine_Id";
$sareepromain1 = $conn->query($sareepromain);
while($sareepromain2 = $sareepromain1->fetch_object())
{
	$rwsareepromain[] = $sareepromain2;
}
echo json_encode($rwsareepromain);
echo '<hr/>';
echo '<br/>';


$sareeprosub = "SELECT saree_detailsorg.Saree_Lot_Id, saree_detailsorg.Sa_Pro_Id, saree_detailsorg.`Date`, saree_detailsorg.Saree_Lot_Meter, saree_detailsorg.Saree_Pieces,saree_detailsorg.Saree_Weight, quality_details.Quality_Name, design_details.Design, saree_detailsorg.Status, saree_detailsorg.`Description`, saree_detailsorg.`R_Id` FROM saree_detailsorg, quality_details, design_details WHERE quality_details.Quality_Id = design_details.Quality_Id AND design_details.Design_Id = saree_detailsorg.Design_Id";
$sareeprosub1 = $conn->query($sareeprosub);
while($sareeprosub2 = $sareeprosub1->fetch_object())
{
	$rwsareeprosub[] = $sareeprosub2;
}
echo json_encode($rwsareeprosub);
echo '<hr/>';
echo '<br/>';

////////////////////////////// saree production-labour main & sub ////////////////////////////////
$sareeprolabmain = "select saree_labsal.Sa_Labour_Id,saree_labsal.Total_S_Amount,saree_production.Total_Meter,saree_labsal.Sa_Pro_Id,machine_details.Machine_No,beam_d_c_2.Beam_No,saree_labsal.Total_MeterLab,saree_labsal.Entry_Date,saree_labsal.Entry_Id from saree_production,beam_d_c_2,saree_labsal,beam_machine,machine_details where saree_production.Sa_Pro_Id = saree_labsal.Sa_Pro_Id AND beam_machine.Be_M_Id = saree_production.Be_M_Id AND machine_details.Machine_Id = beam_machine.Machine_Id AND beam_machine.Be_D_C_Id = beam_d_c_2.Be_D_C_Id";
$sareeprolabmain1 = $conn->query($sareeprolabmain);
while($sareeprolabmain2 = $sareeprolabmain1->fetch_object())
{
	$rwsareeprolabmain[] = $sareeprolabmain2;
}
echo json_encode($rwsareeprolabmain);
echo '<hr/>';
echo '<br/>';

$sareeprolabsub = "select Saree_Labour_Id,Sa_Labour_Id,S_Date,Saree_Meter,S_Rate,S_Amount,labour_details.Name,saree_labsalsuborg1.Description,R_Id,quality_details.Quality_Name,design_details.Design from saree_labsalsuborg1,labour_details,quality_details,design_details where labour_details.Labour_Id = saree_labsalsuborg1.Labour_Id and design_details.Design_Id = saree_labsalsuborg1.Design_Id AND quality_details.Quality_Id = design_details.Quality_Id order by saree_labsalsuborg1.saree_Labour_Id asc";
$sareeprolabsub1 = $conn->query($sareeprolabsub);
while($sareeprolabsub2 = $sareeprolabsub1->fetch_object())
{
	$rwsareeprolabsub[] = $sareeprolabsub2;
}
echo json_encode($rwsareeprolabsub);
echo '<hr/>';
echo '<br/>';

////////////////////////////// saree extra beam main & sub ////////////////////////////////
$sareeextramain = "select Sa_Exbeam_Id,machine_details.Machine_No,machine_details.Machine_Id,Mul_Beam_No,Sa_Beam_Total,Entry_Date,saree_exbe_master.Entry_Id from saree_exbe_master,machine_details where machine_details.Machine_Id = saree_exbe_master.Machine_Id";
$sareeextramain1 = $conn->query($sareeextramain);
while($sareeextramain2 = $sareeextramain1->fetch_object())
{
	$rwsareeextramain[] = $sareeextramain2;
}
echo json_encode($rwsareeextramain);
echo '<hr/>';
echo '<br/>';


$sareeextrasub = "select Sa_Ex_Id,Sa_Exbeam_Id,Sa_Beam_No,Be_Ref_No,Fitted_Date,Be_Meter,Be_Taar,Be_Weight,quality_details.Quality_Name,Org_Be_Mg_Meter,Shortage,Shortageper,Remove_Date,R_Id from saree_exbeam_detailorg,quality_details where quality_details.Quality_Id = saree_exbeam_detailorg.Quality_Id";
$sareeextrasub1 = $conn->query($sareeextrasub);
while($sareeextrasub2 = $sareeextrasub1->fetch_object())
{
	$rwsareeextrasub[] = $sareeextrasub2;
}
echo json_encode($rwsareeextrasub);
echo '<hr/>';
echo '<br/>';


////////////////////////////// courier ////////////////////////////////
$couriermain = "select Courier_Id,courier_company.Cou_Comp,C_No,C_Pro,C_Date,Destination,Top,Amt,courier_details.Entry_Id from courier_company,courier_details where courier_company.Cou_Com_Id = courier_details.Cou_Com_Id";
$couriermain1 = $conn->query($couriermain);
while($couriermain2 = $couriermain1->fetch_object())
{
	$rwcouriermain[] = $couriermain2;
}
echo json_encode($rwcouriermain);
echo '<hr/>';
echo '<br/>';


////////////////////////////// bilty ////////////////////////////////
$biltymain = "select * from bilty_details";
$biltymain1 = $conn->query($biltymain);
while($biltymain2 = $biltymain1->fetch_object())
{
	$rwbiltymain[] = $biltymain2;
}
echo json_encode($rwbiltymain);
echo '<hr/>';
echo '<br/>';


////////////////////////////// bilty return ////////////////////////////////
$biltyreturnmain = "select * from bilty_return";
$biltyreturnmain1 = $conn->query($biltyreturnmain);
while($biltyreturnmain2 = $biltyreturnmain1->fetch_object())
{
	$rwbiltyreturnmain[] = $biltyreturnmain2;
}
echo json_encode($rwbiltyreturnmain);
echo '<hr/>';
echo '<br/>';

////////////////////////////// beam on machine ////////////////////////////////
$beammachinemain = "SELECT beam_machine.Be_M_Id, beam_d_c_2.Beam_No,beam_d_c_2.Beam_Meter, machine_details.Machine_No, beam_machine.Started_Date, beam_machine.Status, beam_machine.Entry_Id FROM beam_machine, beam_d_c_2, machine_details WHERE beam_machine.Be_D_C_Id = beam_d_c_2.Be_D_C_Id AND beam_machine.Machine_Id = machine_details.Machine_Id";
$beammachinemain1 = $conn->query($beammachinemain);
while($beammachinemain2 = $beammachinemain1->fetch_object())
{
	$rwbeammachinemain[] = $beammachinemain2;
}
echo json_encode($rwbeammachinemain);
echo '<hr/>';
echo '<br/>';

////////////////////////////// broker ////////////////////////////////
$brokermain = "SELECT broker_details1.Broker_Id, broker_details1.B_Name, broker_details1.Address, city1.ct_name, `state1`.st_name,`country1`.cnt_name, broker_details1.Mobile_No, broker_details1.Email_Id, broker_details1.Status, broker_details1.Entry_Id FROM broker_details1, city1, country1, `state1` WHERE city1.ct_id = broker_details1.ct_id AND `state1`.st_id = broker_details1.st_id AND `country1`.cnt_id = broker_details1.cnt_id";
$brokermain1 = $conn->query($brokermain);
while($brokermain2 = $brokermain1->fetch_object())
{
	$rwbrokermain[] = $brokermain2;
}
echo json_encode($rwbrokermain);
echo '<hr/>';
echo '<br/>';

////////////////////////////// broker-company ////////////////////////////////
$brokercompanymain = "SELECT bro_com_detaailss.Bro_Com_Id, broker_details1.B_Name,broker_details1.Broker_Id, company_deetaails.C_Name,company_deetaails.Company_Id,bro_com_detaailss.Entry_Id FROM bro_com_detaailss, broker_details1, company_deetaails WHERE broker_details1.Broker_Id = bro_com_detaailss.Broker_Id AND company_deetaails.Company_Id = bro_com_detaailss.Company_Id";
$brokercompanymain1 = $conn->query($brokercompanymain);
while($brokercompanymain2 = $brokercompanymain1->fetch_object())
{
	$rwbrokercompanymain[] = $brokercompanymain2;
}
echo json_encode($rwbrokercompanymain);
echo '<hr/>';
echo '<br/>';

////////////////////////////// broker-customer ////////////////////////////////
$brokercustomermain = "SELECT bro_com_detaailss.Bro_Com_Id, broker_details1.B_Name,broker_details1.Broker_Id, company_deetaails.C_Name,company_deetaails.Company_Id,bro_com_detaailss.Entry_Id FROM bro_com_detaailss, broker_details1, company_deetaails WHERE broker_details1.Broker_Id = bro_com_detaailss.Broker_Id AND company_deetaails.Company_Id = bro_com_detaailss.Company_Id";
$brokercustomermain1 = $conn->query($brokercustomermain);
while($brokercustomermain2 = $brokercustomermain1->fetch_object())
{
	$rwbrokercustomermain[] = $brokercustomermain2;
}
echo json_encode($rwbrokercustomermain);
echo '<hr/>';
echo '<br/>';

////////////////////////////// company ////////////////////////////////
$companymain = "SELECT company_deetaails.Company_Id, company_deetaails.C_Name, company_deetaails.Address, city1.ct_name, `state1`.st_name,`country1`.cnt_name, company_deetaails.Phone_No, company_deetaails.Mobile_No, company_deetaails.Email_Id, company_deetaails.Status, company_deetaails.Entry_Id FROM company_deetaails, city1, `state1`, `country1` WHERE city1.ct_id = company_deetaails.ct_id AND `state1`.st_id = company_deetaails.st_id AND `country1`.cnt_id = company_deetaails.cnt_id";
$companymain1 = $conn->query($companymain);
while($companymain2 = $companymain1->fetch_object())
{
	$rwcompanymain[] = $companymain2;
}
echo json_encode($rwcompanymain);
echo '<hr/>';
echo '<br/>';

////////////////////////////// customer ////////////////////////////////
$customermain = "SELECT customer_details.Customer_Id, customer_details.Cu_En_Name, customer_details.Address, city1.ct_name, `state1`.st_name,`country1`.cnt_name, customer_details.Phone_No, customer_details.Mobile_No, customer_details.Email_Id, customer_details.Status, customer_details.Entry_Id FROM customer_details, city1, `state1`, `country1` WHERE city1.ct_id = customer_details.ct_id AND `state1`.st_id = customer_details.st_id AND `country1`.cnt_id = customer_details.cnt_id";
$customermain1 = $conn->query($customermain);
while($customermain2 = $customermain1->fetch_object())
{
	$rwcustomermain[] = $customermain2;
}
echo json_encode($rwcustomermain);
echo '<hr/>';
echo '<br/>';

////////////////////////////// registration ////////////////////////////////
$registrationmain = "SELECT registration_details.Registration_Id, registration_details.Role, registration_details.Name, registration_details.Photo, registration_details.Address, country1.cnt_name, `state1`.st_name, city1.ct_name, registration_details.Mob_No, registration_details.Mobile_No, registration_details.Email_Id, registration_details.Status, registration_details.Username, registration_details.Password, registration_details.Entry_Id FROM registration_details, country1, `state1`, city1 WHERE country1.cnt_id = registration_details.cnt_id AND `state1`.st_id = registration_details.st_id AND city1.ct_id = registration_details.ct_id";
$registrationmain1 = $conn->query($registrationmain);
while($registrationmain2 = $registrationmain1->fetch_object())
{
	$rwregistrationmain[] = $registrationmain2;
}
echo json_encode($rwregistrationmain);
echo '<hr/>';
echo '<br/>';

////////////////////////////// quality ////////////////////////////////
$qualitymain = "SELECT * FROM quality_details";
$qualitymain1 = $conn->query($qualitymain);
while($qualitymain2 = $qualitymain1->fetch_object())
{
	$rwqualitymain[] = $qualitymain2;
}
echo json_encode($rwqualitymain);
echo '<hr/>';
echo '<br/>';

////////////////////////////// design ////////////////////////////////
$designmain = "SELECT design_details.Design_Id, design_details.Design, quality_details.Quality_Name,quality_details.Quality_Id, design_details.Photo, design_details.Entry_Id FROM design_details, quality_details WHERE design_details.Quality_Id = quality_details.Quality_Id ORDER BY design_details.Design asc";
$designmain1 = $conn->query($designmain);
while($designmain2 = $designmain1->fetch_object())
{
	$rwdesignmain[] = $designmain2;
}
echo json_encode($rwdesignmain);
echo '<hr/>';
echo '<br/>';

////////////////////////////// labour ////////////////////////////////
$labourmain = "SELECT labour_details.Labour_Id, labour_details.Name, labour_details.Photo, labour_details.Address,`country1`.cnt_name, `state1`.st_name, city1.ct_name, labour_details.Mobb_No, labour_details.Mobile_No, work_type.W_Type_Name, labour_details.Status, labour_details.Entry_Id FROM labour_details, `state1`, city1, country1, work_type WHERE `country1`.cnt_id = labour_details.cnt_id AND `state1`.st_id = labour_details.st_id AND city1.ct_id = labour_details.ct_id AND work_type.W_Type_Id = labour_details.W_Type_Id";
$labourmain1 = $conn->query($labourmain);
while($labourmain2 = $labourmain1->fetch_object())
{
	$rwlabourmain[] = $labourmain2;
}
echo json_encode($rwlabourmain);
echo '<hr/>';
echo '<br/>';

////////////////////////////// gallery ////////////////////////////////
$gallerymain = "SELECT * FROM gallery";
$gallerymain1 = $conn->query($gallerymain);
while($gallerymain2 = $gallerymain1->fetch_object())
{
	$rwgallerymain[] = $gallerymain2;
}
echo json_encode($rwgallerymain);
echo '<hr/>';
echo '<br/>';

////////////////////////////// transactions beam ////////////////////////////////
$transbeammain = "SELECT Trans_Id,Trans_Invoice_No,Trans_Date,Trans_Amt,Payment_Type,Bank_Id,Chq_No,Chq_Date,Description,Status,Entry_Date,Entry_Id FROM `transactions_beam1`";
$transbeammain1 = $conn->query($transbeammain);
while($transbeammain2 = $transbeammain1->fetch_object())
{
	$rwtransbeammain[] = $transbeammain2;
}
echo json_encode($rwtransbeammain);
echo '<hr/>';
echo '<br/>';

////////////////////////////// transactions bobbin ////////////////////////////////
$transbobbinmain = "SELECT Trans_Id,Trans_Invoice_No,Trans_Date,Trans_Amt,Payment_Type,Bank_Id,Chq_No,Chq_Date,Description,Status,Entry_Date,Entry_Id FROM `transactions_bobbin`";
$transbobbinmain1 = $conn->query($transbobbinmain);
while($transbobbinmain2 = $transbobbinmain1->fetch_object())
{
	$rwtransbobbinmain[] = $transbobbinmain2;
}
echo json_encode($rwtransbobbinmain);
echo '<hr/>';
echo '<br/>';

////////////////////////////// transactions taka ////////////////////////////////
$transtakamain = "SELECT Trans_Id,Trans_Invoice_No,Trans_Date,Trans_Amt,Payment_Type,Bank_Id,Chq_No,Chq_Date,Description,Status,Entry_Date,Entry_Id FROM `transactions_taka`";
$transtakamain1 = $conn->query($transtakamain);
while($transtakamain2 = $transtakamain1->fetch_object())
{
	$rwtranstakamain[] = $transtakamain2;
}
echo json_encode($rwtranstakamain);
echo '<hr/>';
echo '<br/>';

////////////////////////////// transactions saree ////////////////////////////////
$transsareemain = "SELECT Trans_Id,Trans_Invoice_No,Trans_Date,Trans_Amt,Payment_Type,Bank_Id,Chq_No,Chq_Date,Description,Status,Entry_Date,Entry_Id FROM `transactions_saree`";
$transsareemain1 = $conn->query($transsareemain);
while($transsareemain2 = $transsareemain1->fetch_object())
{
	$rwtranssareemain[] = $transsareemain2;
}
echo json_encode($rwtranssareemain);
echo '<hr/>';
echo '<br/>';

////////////////////////////// petty ////////////////////////////////
$pettymain = "select * from petty_details";
$pettymain1 = $conn->query($pettymain);
while($pettymain2 = $pettymain1->fetch_object())
{
	$rwpettymain[] = $pettymain2;
}
echo json_encode($rwpettymain);
echo '<hr/>';
echo '<br/>';

////////////////////////////// stock-beam ////////////////////////////////
$stbemain = "SELECT beam_dcorg.Beam_No, beam_dcorg.Taar,beam_dcorg.Beam_Meter,beam_dcorg.Weight,quality_details.Quality_Name,beam_d_c_1.Beam_D_C_Date,beam_dcorg.R_Id FROM beam_dcorg LEFT JOIN beam_machine ON beam_dcorg.Be_D_C_Id = beam_machine.Be_D_C_Id JOIN quality_details ON quality_details.Quality_Id = beam_dcorg.Quality_Id JOIN beam_d_c_1 on beam_d_c_1.Beam_D_C_Id = beam_dcorg.Beam_D_C_Id WHERE beam_machine.Status IS NULL AND beam_dcorg.Status ='NotReturn' order by quality_details.Quality_Name";
$stbemain1 = $conn->query($stbemain);
while($stbemain2 = $stbemain1->fetch_object())
{
	$rwstbemain[] = $stbemain2;
}
echo json_encode($rwstbemain);
echo '<hr/>';
echo '<br/>';

////////////////////////////// stock-bobbin , status : NotReturn-unused ////////////////////////////////
$stbonrunmain = "SELECT sum(boobin_dcorg.Total_Cartoon) as total_cart, sum(boobin_dcorg.Total_Weight) as total_wght,quality_details.Quality_Name,boobin_dcorg.R_Id FROM boobin_dcorg JOIN quality_details ON quality_details.Quality_Id = boobin_dcorg.Quality_Id JOIN bobbin_d_c on bobbin_d_c.Bo_D_C_Id = boobin_dcorg.Bo_D_C_Id WHERE boobin_dcorg.Status ='NotReturn-unused' group by quality_details.Quality_Name,R_Id order by quality_details.Quality_Name";
$stbonrunmain1 = $conn->query($stbonrunmain);
while($stbonrunmain2 = $stbonrunmain1->fetch_object())
{
	$rwstbonrunmain[] = $stbonrunmain2;
}
echo json_encode($rwstbonrunmain);
echo '<hr/>';
echo '<br/>';

////////////////////////////// stock-bobbin , status : NotReturn-used ////////////////////////////////
$stbonrumain = "SELECT sum(boobin_dcorg.Total_Cartoon) as total_cart, sum(boobin_dcorg.Total_Weight) as total_wght,quality_details.Quality_Name,boobin_dcorg.R_Id FROM boobin_dcorg JOIN quality_details ON quality_details.Quality_Id = boobin_dcorg.Quality_Id JOIN bobbin_d_c on bobbin_d_c.Bo_D_C_Id = boobin_dcorg.Bo_D_C_Id WHERE boobin_dcorg.Status ='NotReturn-used' group by quality_details.Quality_Name,R_Id order by quality_details.Quality_Name";
$stbonrumain1 = $conn->query($stbonrumain);
while($stbonrumain2 = $stbonrumain1->fetch_object())
{
	$rwstbonrumain[] = $stbonrumain2;
}
echo json_encode($rwstbonrumain);
echo '<hr/>';
echo '<br/>';

////////////////////////////// stock-bobbin , status : In-Using ////////////////////////////////
$stboinusmain = "SELECT sum(boobin_dcorg.Total_Cartoon) as total_cart, sum(boobin_dcorg.Total_Weight) as total_wght,quality_details.Quality_Name,boobin_dcorg.R_Id FROM boobin_dcorg JOIN quality_details ON quality_details.Quality_Id = boobin_dcorg.Quality_Id JOIN bobbin_d_c on bobbin_d_c.Bo_D_C_Id = boobin_dcorg.Bo_D_C_Id WHERE boobin_dcorg.Status ='In-Using' group by quality_details.Quality_Name,R_Id order by quality_details.Quality_Name";
$stboinusmain1 = $conn->query($stboinusmain);
while($stboinusmain2 = $stboinusmain1->fetch_object())
{
	$rwstboinusmain[] = $stboinusmain2;
}
echo json_encode($rwstboinusmain);
echo '<hr/>';
echo '<br/>';

////////////////////////////// stock-taka ////////////////////////////////
$sttamain = "SELECT taka_detailsorg.Taka_Id,taka_detailsorg.T_Date,taka_detailsorg.Taka_Meter,taka_detailsorg.Taka_Weight ,quality_details.Quality_Name,taka_detailsorg.Status,taka_detailsorg.Description,taka_detailsorg.R_Id from taka_detailsorg LEFT JOIN taka_dcorg ON taka_detailsorg.Taka_Id = taka_dcorg.Taka_Id JOIN quality_details on taka_detailsorg.Quality_Id = quality_details.Quality_Id WHERE (taka_dcorg.Status is Null) or (taka_dcorg.Status ='Return') order by taka_detailsorg.Taka_Id asc";
$sttamain1 = $conn->query($sttamain);
while($sttamain2 = $sttamain1->fetch_object())
{
	$rwsttamain[] = $sttamain2;
}
echo json_encode($rwsttamain);
echo '<hr/>';
echo '<br/>';

////////////////////////////// stock-saree ////////////////////////////////
$stsamain = "SELECT saree_detailsorg.Saree_Lot_Id,saree_detailsorg.Date,saree_detailsorg.Saree_Lot_Meter,saree_detailsorg.Saree_Pieces,saree_detailsorg.Saree_Weight,quality_details.Quality_Name,design_details.Design,saree_detailsorg.Status,saree_detailsorg.Description,saree_detailsorg.R_Id from saree_detailsorg LEFT JOIN saree_dcorg ON saree_detailsorg.Saree_Lot_Id = saree_dcorg.Saree_Lot_Id JOIN design_details on  design_details.Design_Id = saree_detailsorg.Design_Id JOIN quality_details on design_details.Quality_Id = quality_details.Quality_Id WHERE (saree_dcorg.Status is Null) or (saree_dcorg.Status ='Return') order by saree_detailsorg.Saree_Lot_Id asc";
$stsamain1 = $conn->query($stsamain);
while($stsamain2 = $stsamain1->fetch_object())
{
	$rwstsamain[] = $stsamain2;
}
echo json_encode($rwstsamain);
echo '<hr/>';
echo '<br/>';

////////////////////////////// salary-fixed ////////////////////////////////
$salfixmain = "select Sal_Fixed_Id,Date_Range,labour_details.Labour_Id,labour_details.Name,No_Of,Rate,Amount,Upad_Amount,Grand_Total,Re_Amount,salary_fixed_master.Status,Entry_Date,salary_fixed_master.Entry_Id from salary_fixed_master,labour_details where labour_details.Labour_Id = salary_fixed_master.Labour_Id";
$salfixmain1 = $conn->query($salfixmain);
while($salfixmain2 = $salfixmain1->fetch_object())
{
	$rwsalfixmain[] = $salfixmain2;
}
echo json_encode($rwsalfixmain);
echo '<hr/>';
echo '<br/>';

////////////////////////////// salary-meter ////////////////////////////////
$salmetermain = "select Sal_Mast_Id,Date_Range,labour_details.Name,Total_Amt,Total_Meter,Upad_Amt,Re_Amt,Grand_Total,Re_Upad_Amt,salary_master.Status,salary_master.Entry_Date,salary_master.Entry_Id from salary_master,labour_details where labour_details.Labour_Id = salary_master.Labour_Id";
$salmetermain1 = $conn->query($salmetermain);
while($salmetermain2 = $salmetermain1->fetch_object())
{
	$rwsalmetermain[] = $salmetermain2;
}
echo json_encode($rwsalmetermain);
echo '<hr/>';
echo '<br/>';

?>