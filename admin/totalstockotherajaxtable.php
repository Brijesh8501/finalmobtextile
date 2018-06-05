<?php 
include("databaseconnect.php");
if(isset($_REQUEST['SearchStockOther']))
{
	$Mach_Part_Id = $_REQUEST['Mach_Part_Id'];
	if($Mach_Part_Id==""){
		echo "Please select option first";
	}
	else{
 $sql = "select Other_Used_Date,machine_parts.Mach_Part_Id,machine_parts.Mach_Pname,Quantity_Used,Quantity_Re,labour_details.Name,other_used1.Entry_Date,other_used1.Entry_Id from other_used1,machine_parts,labour_details where machine_parts.Mach_Part_Id = other_used1.Mach_Part_Id AND machine_parts.Mach_Part_Id = '$Mach_Part_Id' AND labour_details.Labour_Id = other_used1.Labour_Id order by Other_Used_Id desc";
$result = mysql_query($sql);
$row_result = mysql_fetch_array($result); 
$total_result = mysql_num_rows($result);
if($total_result==0)
{
	$sql_chl = "select Ot_D_C_Id,Mach_Pname,sum(Quantity) as sum_quantity from other_sub_orgdc,machine_parts where machine_parts.Mach_Part_Id = other_sub_orgdc.Mach_Part_Id and machine_parts.Mach_Part_Id = '$Mach_Part_Id'";
	$result_chl = mysql_query($sql_chl);
$row_result_chl = mysql_fetch_array($result_chl); 
$total_result_chl = mysql_num_rows($result_chl);
if($total_result_chl==0)
{
	echo "Currently there is no stock";
}
else
{ if($row_result_chl['Ot_D_C_Id']>=0) {?>
<table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                         <tr> 
                                            <th>Sr No.</th>
                                            <th>Machine-Parts</th>
                                            <th>Quantity</th>
                                           </tr>
                                       </thead>
                                    <tbody>
    <?php
	$i = 1;
									do { ?>                                         
  <tr class="odd gradeX"> 
    <td width="7%"><?php echo $i++;?></td>
    <td width="20%"><?php echo $row_result_chl['Mach_Pname']; ?></td>
    <td width="10%"><?php echo $row_result_chl['sum_quantity']; ?></td>
    </tr>
   <?php 
   } while($row_result_chl=mysql_fetch_array($result_chl)); ?>
                                    </tbody>
                                </table>
                                </div>
<?php } else { echo "Currently there is no stock"; } }
}
else
{	?>
 <div align="right">
    <a href="totalstockotherprint?print&Mach_Part_Id=<?php echo $Mach_Part_Id; ?>" target="_blank"><i class="icon-print"></i></a>
  </div>
<table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                         <tr> 
                                            <th>Sr No.</th>
                                            <th>Date</th>
                                            <th>Machine-Parts</th>
                                            <th>Quantity-Used</th>
                                            <th>Quantity-Remaining</th>
                                            <th>Master</th>
                                            <th>Entry Date</th>
                                            <th>Entry #ID</th>
                                        </tr>
                                       </thead>
                                    <tbody>
    <?php
	$i = 1;
									do { ?>                                         
  <tr class="odd gradeX"> 
    <td width="7%"><?php echo $i++;?></td>
     <td width="10%"><?php echo $row_result['Other_Used_Date']; ?></td>
    <td width="20%"><?php echo $row_result['Mach_Pname']; ?></td>
    <td width="10%"><?php echo $row_result['Quantity_Used']; ?></td>
    <td width="10%"><?php echo $row_result['Quantity_Re']; ?></td>
    <td width="10%"><?php echo $row_result['Name']; ?></td>
    <td width="10%"><?php echo $row_result['Entry_Date']; ?></td>
    <td width="10%"><?php echo $row_result['Entry_Id']; ?></td>
    </tr>
   <?php 
   } while($row_result=mysql_fetch_array($result)); ?>
                                    </tbody>
                                </table>
                               
    <?php 
}}}
?>

