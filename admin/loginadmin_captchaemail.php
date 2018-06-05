<?php
session_start();
$captchanumberemail = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz!@#$%^&*()+?/><";
$captchanumberemail = substr(str_shuffle($captchanumberemail), 0, 6);
$_SESSION["codeemail"] = $captchanumberemail;
$image = imagecreatefromjpeg("assets/img/bj.jpg");
$foreground = imagecolorallocate($image, 0xFF, 0xFF, 0xFF); //font color
imagestring($image, 5, 45, 8, $captchanumberemail, $foreground);
header('Content-type: image/png');
imagepng($image);
?>