<?php
if(isset($_REQUEST['Trans_Type']))
{
	$Trans_Type = $_REQUEST['Trans_Type'];
	if($Trans_Type=='Beam')
	{
		?>

<a href="transcationinsert?action=Beam" target="_blank"><button class="btn btn-primary"><i class="icon-plus-sign icon-white"></i> Add Entry</button></a>
<?php
	}
	else if($Trans_Type=='Bobbin')
	{
		?> <a href="transcationinsert?action=Bobbin" target="_blank"><button class="btn btn-primary"><i class="icon-plus-sign icon-white"></i> Add Entry</button></a>
        <?php
	}
	else if($Trans_Type=='Taka')
	{
		?> <a href="transcationinsert?action=Taka" target="_blank"><button class="btn btn-primary"><i class="icon-plus-sign icon-white"></i> Add Entry</button></a>
        <?php
	}
	else if($Trans_Type=='Saree')
	{
		?> <a href="transcationinsert?action=Saree" target="_blank"><button class="btn btn-primary"><i class="icon-plus-sign icon-white"></i> Add Entry</button></a>
     <?php    }}
        ?>