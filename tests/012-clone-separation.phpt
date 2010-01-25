--TEST--
Testing that cloned object does not affect the original
--SKIPIF--
<?php require_once(dirname(__FILE__) . '/skipif.inc'); ?>
--FILE--
<?php
$im = new Imagick();
$im->newImage(100, 100, new ImagickPixel("white"));

$new = clone $im;
$new->thumbnailImage(200, null);
var_dump($im->width, $new->width);

$new2 = $im->clone();
$new2->thumbnailImage(200, null);
var_dump($im->width, $new2->width);

?>
--EXPECTF--
int(100)
int(200)
int(100)
int(200)