<?php


class marcadeagua
{
    public function subirImagenes(){
        $target_dir = "/";
        $target_file = $target_dir . basename($_FILES["imagen"]["name"]);

        if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["imagen"]["name"])). " has been uploaded.";
          } else {
            echo "Sorry, there was an error uploading your file.";
        }


    }

    public function aplicarMarcaAgua(){
        $estampa = imagecreatefrompng('marca4.png');
        $im = imagecreatefromjpeg('/'.$_FILES["imagen"]["name"]);

        $margen_dcho = 10;
        $margen_inf = 10;
        $sx = imagesx($estampa);
        $sy = imagesy($estampa);

        //* Copiar la imagen de la estampa sobre nuestra foto usando los índices de márgen y el  
        //* ancho de la foto para calcular la posición de la estampa. 


        imagecopy($im, $estampa, imagesx($im) - $sx - $margen_dcho, imagesy($im) - $sy - $margen_inf, 0, 0, imagesx($estampa), imagesy($estampa));

        // Imprimir y liberar memoria
       header('Content-type: image/png');
       imagepng($im);
       imagedestroy($im);
        
    }
}


?>