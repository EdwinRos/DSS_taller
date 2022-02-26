<?php


class marcadeagua
{
    public function subirImagenes()
    {
        $target_dir = "img/"; //directorio para guardar las imagenes
        $target_file = $target_dir . basename($_FILES["imagen"]["name"]); // combinacion de directorio a guardar imagenes mas la imagen

        if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file)) { // se guarda el archivo
        } else {
            echo "Sorry, there was an error uploading your file."; // si fayo se muestra error
        }
    }

    public function aplicarMarcaAgua()
    {
        $estampa = imagecreatefrompng('img/marca4.png'); //imagen estampa
        $im = imagecreatefromjpeg('img/' . $_FILES["imagen"]["name"]); //imagen que se subio y que sera procesada con la estampa

        $margen_dcho = 10; //margen derecho
        $margen_inf = 10; // marge inferior
        $sx = imagesx($estampa); // coordenadas x posicion
        $sy = imagesy($estampa); // coordenadas y posicion

        //* Copiar la imagen de la estampa sobre nuestra foto usando los índices de márgen y el  
        //* ancho de la foto para calcular la posición de la estampa. 


        imagecopy($im, $estampa, imagesx($im) - $sx - $margen_dcho, imagesy($im) - $sy - $margen_inf, 0, 0, imagesx($estampa), imagesy($estampa)); //funcion que junta ambas imagenes colocanco la marca de agua
        
       // header('Content-type: image/png');
        imagepng($im, 'img/result.png'); // guardamos la imagen procesada
        imagedestroy($im);

        echo "realizado";
    }
}
