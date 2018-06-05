<?php session_start();
for($i=7;$i>0;$i--)
{
	$str = $str.chr(rand(97,122));
}
echo $_SESSION['pinno'] = $str;
?>
