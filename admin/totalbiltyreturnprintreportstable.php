<?php error_reporting(0); 
include("databaseconnect.php");
if(isset($_REQUEST['Searchref']))
    {   
   $Ref_No = $_REQUEST['Ref_No']; 
	$query1 = "select * from bilty_return where Ref_No = '$Ref_No'";
 $rsMain = mysql_query($query1);
	$rowMain = mysql_fetch_array($rsMain);
	$totalRowsRsMain = mysql_num_rows($rsMain);
	}
if($Ref_No=="")
	{
		echo '<script>alert("Please select reference no....");</script>';
	}
else if($totalRowsRsMain==0)
{
	echo "<center>There is no record</center>";
}
else
{
	?>
<div align="right">
<a href="totalbiltyprintreturn?print&Ref_No=<?php echo $Ref_No; ?>" target="_blank"><i class="icon-print"></i></a>
</div>
 <table class="table table-striped table-bordered table-hover" valign="center">
                                    <thead>
                                        <tr> 
                                        <th width="5%">Sr No.</th>
                                        <th width="10%">Bilty ID</th>
                                            <th width="10%">Date</th>
                                            <th width="12%">Reference No.</th>
                                            <th>Image</th>
                                            <th width="7%">#ID</th>
                                        </tr>
                                       </thead>
                                    <tbody>
    <?php
	          $i = 0;
	              $i++;
									do { ?>                                    
  <tr class="odd gradeX"> 
  <td><?php echo $i++; ?></td>
     <td><?php echo $rowMain['Bilty_Id']; ?></td>
     <td><?php echo $rowMain['B_Date']; ?></td>
     <td><?php echo $rowMain['Ref_No']; ?></td>
      <td><img width="100%" height="20%" src="<?php echo $rowMain['B_Image']; ?>"></td>
     <td><?php echo $rowMain['Entry_Id']; ?></td>
   </tr>
    <?php } while($rowMain=mysql_fetch_assoc($rsMain)); ?>
                                    </tbody>
                                </table>
<?php
 } ?>