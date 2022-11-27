<?php
header("Content-type: image/png");
$string = $_GET['text'];
$im     = imagecreate(350,30);

$bg = imagecolorallocate($im, 84, 163, 247);
$textcolor = imagecolorallocate($im, 255, 255, 255);

imagestring($im, 5, 9, 6, "PDF mit Vorlage '".ucfirst($string)."' erzeugen", $textcolor);

imagepng($im);
imagedestroy($im);
?>
