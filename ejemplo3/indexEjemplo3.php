<?php
include 'ProcesarImagenes.php'
?>

<!-- 
    !eliminar las imagenes luego de cada demostracion 
 -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Marcas de agua con imagecopymerge</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"> <img src="https://www.ecured.cu/images/d/d0/UNIVERSIDAD_DON_BOSCO.png" alt="" class="img-thumbnail" width="50" height="50"> Universidad Don Bosco</a>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <!-- lado para ingresar imagen y imagen de marca de agua -->
            <div class="col-md">
                <form action="indexEjemplo3.php" method="post" enctype="multipart/form-data">
                    <h1 class="display-4">Marca de agua a una imagen</h1>
                    <p class="lead">Solo se admiten imagenes jpg o jpeg</p>
                    <hr>
                    <label for="" class="form-label">Seleccione una imagen para agregar la marca de agua</label>
                    <input type="file" name="imagen" id="imagen" class="form-control" required>
                    <label for="" class="form-label mt-3">Seleccione la imagen que sera su marca de agua</label>
                    <input type="file" name="estampa" id="estampa" class="form-control" required>
                    <input type="submit" value="Procesar" class="btn btn-primary mt-3">
                </form>

                <?php
                $estado = 1;

                if (isset($_FILES['imagen']['name'])) {

                    $procesar = new ProcesarImagenes();

                    $estado = $procesar->subirImagenes($_FILES['imagen']['name'], $_FILES['imagen']['tmp_name']);

                    if ($estado == 0) {
                        echo "ocurrio un problema";
                    } else {
                        $etado = $procesar->subirImagenes($_FILES['estampa']['name'], $_FILES['estampa']['tmp_name']);
                        if ($estado == 0) {
                            echo "ocurrio un problema";
                        } else {
                            $procesar->agregarMarcaAgua();
                        }
                    }
                }

                ?>
            </div>
            <!-- lado para mostrar la imagen ya procesada -->
            <div class="col-md">
                <h1 class="display-4">Una vez procesada su imagen, se mostrara aca</h1>
                <?php
                if (file_exists('img_uploads/foto_estampa.png')) {
                ?>
                    <p class="lead">El resulto de su imagen procesada es el siguiente</p>
                    <img src="img_uploads/foto_estampa.png" alt="" class="img-fluid">
                    <hr>
                    <a href="img_uploads/foto_estampa.png" download class="btn btn-success">Descargar imagen  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                            <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                            <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                        </svg></a>
                <?php
                }
                ?>

            </div>
        </div>
    </div>
</body>

</html>