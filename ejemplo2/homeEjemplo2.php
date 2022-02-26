<?php

include "marcadeagua.php";

?>
<!DOCTYPE html>
<html lang="en">
<!-- 
    !!!! Borrar las imagenes (menos la marca4.png) luego de cada prueba
 -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Marca de agua</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="display-4">añadir marca de agua a una imagen usando canales alfa</h1>
                <p class="lead">Las imagenes que se suban se les agregara una marca de agua con el logo de gd</p>
                <!-- formulario para poder subir la imagen que se le agregara la marca de agua de gd -->
                <form action="homeEjemplo2.php" method="POST" enctype="multipart/form-data">
                    <label for="" class="form-label">Ingrese imagen a procesar</label>
                    <input type="file" name="imagen" id="" class="form-control">
                    <input type="submit" value="Marcar" class="btn btn-success mt-3">
                </form>
                <?php
                // If para validar el momento en que se envien los datos en este caso la imagen
                if (isset($_FILES["imagen"]["name"])) {
                    $marca = new marcadeagua(); //instancia de clase donde se procesa la logica
                    $marca->subirImagenes(); //se sube la imagen que sera tratada
                    $marca->aplicarMarcaAgua(); // se le agrega su marca de agua
                }

                if (file_exists('img/result.png')) { //se verifica si la imagen ya con marca de agua existe y que por ende fue procesada con exito
                ?>
                <!-- se muestra -->
                    <img src="img/result.png" alt="" class="img-fluid" alt="Responsive image"> 
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>