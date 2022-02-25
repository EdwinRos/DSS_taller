<?php
$original = imagecreatefromjpeg( 'foto8.png');
$marca = imagecreatefrompng('marca4.png');

imagecopymerge(
    $original,
    $marca,
    0,0,
    0,0,
    imagesx($marca), imagesy($marca),
    90
);

header( "Content-type: image/jpeg");
imagejpeg($original);

?>