<?php error_reporting(0);include("databaseconnect.php");
if(isset($_REQUEST['SearchToStock']))
{
	$Stock = $_REQUEST['Stock']; 
	if($Stock=='Beam')
	{
$sql = "SELECT beam_dcorg.Beam_No, beam_dcorg.Taar,beam_dcorg.Beam_Meter,beam_dcorg.Weight,quality_details.Quality_Name,beam_d_c_1.Beam_D_C_Date,beam_dcorg.R_Id FROM beam_dcorg LEFT JOIN beam_machine ON beam_dcorg.Be_D_C_Id = beam_machine.Be_D_C_Id JOIN quality_details ON quality_details.Quality_Id = beam_dcorg.Quality_Id JOIN beam_d_c_1 on beam_d_c_1.Beam_D_C_Id = beam_dcorg.Beam_D_C_Id WHERE beam_machine.Status IS NULL AND beam_dcorg.Status ='NotReturn' order by quality_details.Quality_Name";
$result = mysql_query($sql);
$row_result = mysql_fetch_array($result); 
$total_result = mysql_num_rows($result);
	}
	else if($Stock=='Bobbin')
	{
		$Status = $_REQUEST['Status'];
	$sql = "SELECT sum(boobin_dcorg.Total_Cartoon) as total_cart, sum(boobin_dcorg.Total_Weight) as total_wght,quality_details.Quality_Name,boobin_dcorg.R_Id FROM boobin_dcorg JOIN quality_details ON quality_details.Quality_Id = boobin_dcorg.Quality_Id JOIN bobbin_d_c on bobbin_d_c.Bo_D_C_Id = boobin_dcorg.Bo_D_C_Id WHERE boobin_dcorg.Status ='$Status' group by quality_details.Quality_Name,R_Id order by quality_details.Quality_Name";
$result = mysql_query($sql);
$row_result = mysql_fetch_array($result); 
$total_result = mysql_num_rows($result);
	}
	else if($Stock=='Saree')
	{
	   $sql = "SELECT saree_detailsorg.Saree_Lot_Id,saree_detailsorg.Date,saree_detailsorg.Saree_Lot_Meter,saree_detailsorg.Saree_Pieces,saree_detailsorg.Saree_Weight,quality_details.Quality_Name,design_details.Design,saree_detailsorg.Status,saree_detailsorg.Description,saree_detailsorg.R_Id from saree_detailsorg LEFT JOIN saree_dcorg ON saree_detailsorg.Saree_Lot_Id = saree_dcorg.Saree_Lot_Id JOIN design_details on  design_details.Design_Id = saree_detailsorg.Design_Id JOIN quality_details on design_details.Quality_Id = quality_details.Quality_Id WHERE (saree_dcorg.Status is Null) or (saree_dcorg.Status ='Return') order by saree_detailsorg.Saree_Lot_Id asc";
$result = mysql_query($sql);
$row_result = mysql_fetch_array($result); 
$total_result = mysql_num_rows($result);
	}
	else if($Stock=='Taka')
	{
	 $sql = "SELECT taka_detailsorg.Taka_Id,taka_detailsorg.T_Date,taka_detailsorg.Taka_Meter,taka_detailsorg.Taka_Weight ,quality_details.Quality_Name,taka_detailsorg.Status,taka_detailsorg.Description,taka_detailsorg.R_Id from taka_detailsorg LEFT JOIN taka_dcorg ON taka_detailsorg.Taka_Id = taka_dcorg.Taka_Id JOIN quality_details on taka_detailsorg.Quality_Id = quality_details.Quality_Id WHERE (taka_dcorg.Status is Null) or (taka_dcorg.Status ='Return') order by taka_detailsorg.Taka_Id asc";
	 $result = mysql_query($sql);
$row_result = mysql_fetch_array($result);
$total_result = mysql_num_rows($result); 
	}
	}
if($Stock=="")
	{
		echo '<script>alert("Please select option first....");</script>';
	}
else if($Stock=='Beam')
	{
if($total_result==0)
{
	echo "Currently there is no stock";
}
else
{
	?>
 <div align="right">
    <a href="tostockcurrentreportprint?print&Stock=<?php echo $Stock; ?>" target="_blank"><i class="icon-print"></i></a>
  </div>
<table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                        <tr> 
                                            <th>Sr No.</th> 
                                            <th>Beam No</th>
                                            <th>Taar</th>
                                            <th>Meter</th>
                                            <th>Weight</th>
                                            <th>Quality</th>
                                            <th>Challan Date</th>
                                            <th>Entry #ID</th>
                                        </tr>
                                       </thead>
                                    <tbody>
    <?php
	$i = 1;
									do { ?>                                         
  <tr class="odd gradeX"> 
    <td width="7%"><?php echo $i++;?></td>
    <td width="15%"><?php echo $row_result['Beam_No']; ?></td>
    <td width="10%"><?php echo $row_result['Taar']; ?></td>
    <td width="10%"><?php echo $row_result['Beam_Meter']; ?></td>
    <td width="10%"><?php echo $row_result['Weight']; ?></td>
    <td width="30%"><?php echo $row_result['Quality_Name']; ?></td>
    <td width="10%"><?php echo $row_result['Beam_D_C_Date']; ?></td>
     <td width="10%"><?php echo $row_result['R_Id']; ?></td>
  </tr>
   <?php 
   $Tot_Meter = $Tot_Meter + $row_result['Beam_Meter'];
   $Tot_Weight = $Tot_Weight + $row_result['Weight']; } while($row_result=mysql_fetch_array($result)); ?>
    <tr align="right">
                                     <td colspan="8">
                                     <b>Total Meter : <?php echo $Tot_Meter;?>&nbsp;&nbsp;Total Weight : <?php echo $Tot_Weight;?></b>
                                     </td>
                                     </tr>
                                    </tbody>
                                </table>
                                </div>
    <?php 
}
	}
else if($Stock=='Bobbin')
	{
if($total_result==0)
{
	echo "Currently there is no stock";
}
else
{
	?>
<div align="right">
    <a href="tostockcurrentreportprint?print&Stock=<?php echo $Stock; ?>&Status=<?php echo $Status; ?>" target="_blank"><i class="icon-print"></i></a>
  </div>
<table class="table table-striped table-bordered table-hover" valign="center">
                                   <thead>
                                        <tr> 
                                            <th>Sr No.</th>
                                            <th>Cartoon / Bags / Cases</th>
                                            <th>Weight (Kgs)</th>
                                            <th>Quality</th>
                                            <th>Entry #ID</th>
                                           </tr>
                                      </thead>
                                    <tbody>
                                     <?php
									 $i = 1;
									do { ?>                    
  <tr class="odd gradeX"> 
     <td width="7%"><?php echo $i++; ?></td>
    <td width="15%"><?php echo $row_result['total_cart']; ?></td>
    <td width="15%"><?php echo $row_result['total_wght']; ?></td>
    <td width="30%"><?php echo $row_result['Quality_Name']; ?></td>
   <td width="10%"><?php echo $row_result['R_Id']; ?></td>
  </tr>
                                     <?php $Tot_Weight = $Tot_Weight + $row_result['total_wght'];  } while($row_result=mysql_fetch_array($result)); ?>
                                     <tr align="right">
                                     <td colspan="5">
                                     <b>Total Weight : <?php echo $Tot_Weight;?></b>
                                     </td>
                                     </tr>
                                     </tbody>
                                </table>
                                </div>
    <?php 
}
}
else if($Stock=='Saree')
	{
if($total_result==0)
{
	echo "Currently there is no stock";
}
else
{
	?>
<div align="right">
    <a href="tostockcurrentreportprint?print&Stock=<?php echo $Stock; ?>" target="_blank"><i class="icon-print"></i></a>
  </div>
<table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                        <tr> 
                                             <th>Sr No.</th>
                                            <th>Lot ID</th>
                                            <th>Date</th>
                                            <th>Lot Meter</th>
                                            <th>Weight</th>
                                            <th>Piecess</th>
                                            <th>Quality</th>
                                            <th>Design</th>
                                            <th>Status</th>
                                            <th>Description</th>
                                            <th>Entry #ID</th>
                                        </tr>
                                       </thead>
                                    <tbody>
                                     <?php 
									 $i = 1;
  do {
    ?>                               
  <tr class="odd gradeX"> 
    <td><?php echo $i++;?></td>
    <td><?php echo $row_result['Saree_Lot_Id']; ?></td>
    <td><?php echo $row_result['Date']; ?></td>
    <td><?php echo $row_result['Saree_Lot_Meter']; ?></td>
    <td><?php echo $row_result['Saree_Weight']; ?></td>
    <td><?php echo $row_result['Saree_Pieces']; ?></td>
    <td><?php echo $row_result['Quality_Name']; ?></td>
    <td><?php echo $row_result['Design']; ?></td>
    <td><?php echo $row_result['Status']; ?></td>
   <td width="25%"><?php echo $row_result['Description']; ?></td>
   <td width="10%"><?php echo $row_result['R_Id']; ?></td>
  </tr>
   <?php $Tot_Meter = $Tot_Meter + $row_result['Saree_Lot_Meter'];
   $Tot_Weight = $Tot_Weight + $row_result['Saree_Weight'];
   $Tot_Pieces = $Tot_Pieces + $row_result['Saree_Pieces']; } while($row_result = mysql_fetch_array($result)) ?>
                                     <tr align="right">
                                     <td colspan="11">
                                     <b>Total Meter : <?php echo $Tot_Meter;?>&nbsp;&nbsp;Total Weight : <?php echo $Tot_Weight;?>&nbsp;Total Piecess : <?php echo $Tot_Pieces;?></b>
                                     </td>
                                     </tr>
                                    </tbody>
                                </table>
                                </div>
    <?php 
}
	}	
else if($Stock=='Taka')
	{
if($total_result==0)
{
	echo "Currently there is no stock";
}
else
{
	?>
<div align="right">
    <a href="tostockcurrentreportprint?print&Stock=<?php echo $Stock; ?>" target="_blank"><i class="icon-print"></i></a>
  </div>
<table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                        <tr> 
                                            <th>Sr No.</th> 
                                            <th>Taka ID</th>
                                            <th>Date</th>
                                            <th>Lot Meter</th>
                                            <th>Piecess</th>
                                            <th>Quality</th>
                                            <th>Status</th>
                                            <th>Description</th>
                                            <th>Entry #ID</th>
                                        </tr>
                                       </thead>
                                    <tbody>
                                    <?php 
									$i = 1;
  do {
    ?>                                    
  <tr class="odd gradeX"> 
    <td><?php echo $i++;?></td>
    <td><?php echo $row_result['Taka_Id']; ?></td>
    <td><?php echo $row_result['T_Date']; ?></td>
    <td><?php echo $row_result['Taka_Meter']; ?></td>
    <td><?php echo $row_result['Taka_Weight']; ?></td>
    <td><?php echo $row_result['Quality_Name']; ?></td>
    <td><?php echo $row_result['Status']; ?></td>
     <td width="25%"><?php echo $row_result['Description']; ?></td>
     <td width="10%"><?php echo $row_result['R_Id']; ?></td>
  </tr>
  <?php $Tot_Meter = $Tot_Meter + $row_result['Taka_Meter'];
   $Tot_Weight = $Tot_Weight + $row_result['Taka_Weight'];
   } while($row_result = mysql_fetch_array($result)) ?>
  <tr align="right">
                                     <td colspan="9">
                                     <b>Total Meter : <?php echo $Tot_Meter;?>&nbsp;&nbsp;Total Weight : <?php echo $Tot_Weight;?></b>
                                     </td>
                                     </tr>
                                    </tbody>
                                </table>
                                </div>
    <?php 
}
	}	
	?>							