<?php

include "marcadeagua.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="display-4">añadir marca de agua a una imagen usando canales alfa</h1>
                <p class="lead">Las imagenes que se suban se les agregara una marca de agua con el logo de gd</p>
                <form action="marcadeagua.php" method="post" enctype="multipart/form-data">
                    <label for="" class="form-label">Ingrese imagen a procesar</label>
                    <input type="file" name="imagen" id="" class="form-control">
                    <input type="submit" value="Marcar" class="btn btn-success">
                </form>
                <?php
                    if(isset($_FILES["imagen "]["name"])){
                        $marca =  new marcadeagua();
                        $marca->subirImagenes();
                        $marca->agregarMarcaAgua();
                    }
                ?>
            </div>
        </div>
        
    </div>
</body>
</html>