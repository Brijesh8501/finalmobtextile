<?php
include("databaseconnect.php");
if(isset($_REQUEST['search']))
{
	$image_name1 = $_REQUEST['image_name'];
	$image_name2 = str_replace(","," ",$image_name1);
	$image_name = str_replace('\' ', '\'', ucwords(str_replace('\'', '\' ', strtolower($image_name2))));
	if($image_name=="")
	{
		echo '<script>document.getElementById("checkno").innerHTML = "* Required";</script>';
		echo '<script>document.getElementById("checkno").style.color = "#F00";</script>';
		echo '<script>document.getElementById("error1").style.display = "none";</script>';
	}
	elseif($image_name!=""){
	$select = "select image_name from gallery where image_name = '$image_name'";
	$sel_exe = mysql_query($select);
	$sel_num = mysql_num_rows($sel_exe);
	if($sel_num==0)
	{
echo '<script>document.getElementById("checkno").innerHTML = "image name valid to submit";</script>';	
echo '<script>document.getElementById("checkno").style.color = "#3C0";</script>';	
echo '<script>document.getElementById("error1").style.display = "none";</script>';	
 } else {
		     echo '<script>document.getElementById("checkno").innerHTML = "image name allready exists";</script>';
			 echo '<script>document.getElementById("checkno").style.color = "#F00";</script>';
			 echo '<script>document.getElementById("error1").style.display = "none";</script>';
			  }}}?>
			  