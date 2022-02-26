<?php


//Recibimos parametros del formulario y los guardamos en variables
$alto = $_POST['alto'];
$ancho = $_POST['ancho'];
$color = $_POST['color'];

header ("Content-type: image/png");

//CREACION DE INAMGEN EN LENGUAJE PHP//
$imagen = imagecreate ($alto, $ancho);

//Evalua el color y asigna los valores RGB
   if($color == "Azul"){
        $color_fondo = imagecolorallocate ($imagen, 0, 43, 255);
        imagepng ($imagen);
   }else if ($color == "Rojo"){
        $color_fondo = imagecolorallocate ($imagen, 255, 0, 0);
        imagepng ($imagen);
    }else if ($color == "Verde"){
        $color_fondo = imagecolorallocate ($imagen, 0, 255, 50);
        imagepng ($imagen);
    }else if ($color == "Amarillo"){
        $color_fondo = imagecolorallocate ($imagen, 251, 255, 0);
        imagepng ($imagen);
    }else if ($color == "Negro"){
        $color_fondo = imagecolorallocate ($imagen, 0, 0, 0);
        imagepng ($imagen);
        }
?>

