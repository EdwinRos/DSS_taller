<?php

class ProcesarImagenes
{

    public function subirImagenes($imagen, $tmp_name){
        $carpetaSubida = 'img_uploads/';
        $targetfile = $carpetaSubida. basename($imagen);
        $uploadOK =1;
         
        //*extension de la imagen
        $imageFileType = strtolower(pathinfo($targetfile,PATHINFO_EXTENSION));
         

        //*checkear si la imagen es una imagen real o no

        $check = getimagesize($tmp_name);
        if( $check !== false){
            $uploadOK = 1;
        }else{
            $uploadOK = 0;
            echo "<div class='alert alert-secondary mt-3'>";
            echo "El archivo no es una imagen";
            echo "</div>";
        }
        //*chechekear el formato de imagen

        if($imageFileType != "jpg" && $imageFileType != "jpeg"){
            $uploadOK =0;
            echo "<div class='alert alert-secondary mt-3'>";
            echo "Solo se adminiten imagenes jpg o jpeg";
            echo "</div>";
        }
        //*chekear el estado de $uploadOK

        if($uploadOK == 0){
            echo "<div class='alert alert-secondary mt-3'>";
            echo "No se subio su archivo";
            echo "</div>";
        }else{
            if(move_uploaded_file($tmp_name,$targetfile)){
              return 1;
            }else{
              return 0;  
            }
        }
    }

    public function agregarMarcaAgua()
    {
        //*imagen a colocar estampa
        $im = imagecreatefromjpeg('img_uploads/'.$_FILES['imagen']['name']);

        //* imagen que sera la estampa (marca de agua)
        $estampa = imagecreatefromjpeg('img_uploads/'.$_FILES['estampa']['name']);

        $im = imagecreatefromjpeg('img_uploads/'.$_FILES['imagen']['name']);


        // Establecer los márgenes para la estampa y obtener el alto/ancho de la imagen de la estampa
        $margen_dcho = 10;
        $margen_inf = 10;
        $sx = imagesx($estampa);
        $sy = imagesy($estampa);

        // Fusionar la estampa con nuestra foto con una opacidad del 50%
        imagecopymerge(
            $im, //imagen a la que se le pondra la estampa
            $estampa,  // estampa que se le pondra a la imagen
            imagesx($im) - $sx - $margen_dcho, //coordenadas de destino x 
            imagesy($im) - $sy - $margen_inf, // coordenadas de destino y
            0, // coordenadas de la fuente x
            0, // coordenadas de la fuente Y
            imagesx($estampa)  , //achura
            imagesy($estampa)   , //altura
            50 //opacidad del 50%
        );

        // Guardar la imagen en un archivo y liberar memoria
        imagepng($im, 'img_uploads/foto_estampa.png');
        imagedestroy($im);

        //*destruir imagenes de referencia 

        unlink('img_uploads/'.$_FILES['imagen']['name']);
        unlink('img_uploads/'.$_FILES['estampa']['name']);
    }

}




