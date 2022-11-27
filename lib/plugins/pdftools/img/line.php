<?php
# Erzeugt eine Linie als PNG längs oder quer

header("Content-type: image/png");
if (isset($_GET['h'])) {$h = intval($_GET['h']);} else $h=1;

if ($h>10) $h=10;

# Quer oder längs?
if (!isset($_GET["q"])) {$im = imagecreate(1,$h*20);} else {$im = imagecreate($h*40,1);}

$bg = imagecolorallocate($im, 255, 255, 255);

imagepng($im);
imagedestroy($im);
?>
