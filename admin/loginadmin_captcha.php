<?php
session_start();
$captchanumber = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyzs!@#$%^&*()+?/><";
$captchanumber = substr(str_shuffle($captchanumber), 0, 6);
$_SESSION["code"] = $captchanumber;
$image = imagecreatefromjpeg("assets/img/bj.jpg");
$foreground = imagecolorallocate($image, 0xFF, 0xFF, 0xFF); //font color
imagestring($image, 5, 45, 8, $captchanumber, $foreground);
header('Content-type: image/png');
imagepng($image);
?>