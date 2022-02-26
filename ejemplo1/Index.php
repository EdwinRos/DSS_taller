<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <title>Creacion de Imagen PNG con PHP</title>

</head>

<body>
    <div class="col-12 mt-5 mb-3">
        <h3 class="text-center">Ejemplo de Creacion de Imagen con PHP</h3>
    </div>
    <div class="d-flex justify-content-center align-items-center" style="margin-top: 2%;">
        <form class="w-50 shadow-lg p-3 mb-5 bg-white rounded p-5" method="POST" action="CreateImage.php">
            <span>Elige el Color y tamaño de imagen.</span>
            <div class="col-6 mt-3">
                <span>Color de Fondo</span>
                <select class="form-select" aria-label="Default select example" id="color" name="color">
                    <option selected>Elige el color</option>
                    <option value="Azul">Azul</option>
                    <option value="Rojo">Rojo</option>
                    <option value="Verde">Verde</option>
                    <option value="Amarrillo">Amarrillo</option>
                    <option value="Negro">Negro</option>
                </select>
              
            </div>

            <div class="col-6 mt-3">
                <span>Ingrese el ancho</span>
                <input type="number" class="form-control" id="ancho" name="ancho" required style="margin-bottom: 10%;">
            </div>
            <div class="col-6 mt-3">
                <span>Ingrese el alto</span>
                <input type="number" class="form-control" id="alto" name="alto" required style="margin-bottom: 10%;">
            </div>


            <img src="./CreateImage.php?text=Desarrollo de Aplic. Web con Soft. Interpretado en el Servidor&width=500&height=300" alt="" style="margin-left: 12%;">

            <div class="col-10 m-3">
                <div class="text-center">
                    <input class="btn btn-success mt-2" type="submit" value="Guardar" />

                </div>
            </div>

        </form>
    </div>

</body>

</html>

<?php


?>