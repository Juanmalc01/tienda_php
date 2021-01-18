<?php
include '/db_config.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <!-- /Bootstrap -->
</head>

<body>
    <header>

        <div class="navbar navbar-dark bg-dark box-shadow">
            <div class="container d-flex justify-content-between">
                <a class="navbar-brand d-flex align-items-center">
                    <strong>Tienda</strong>
                </a>
                <div>
                    <a href="../administrarUsuarios.php" class="btn btn-warning">Gestionar usuarios</a>
                    <a href="../logout.php" class="btn btn-danger">Cerrar sesion</a>
                </div>
            </div>
        </div>
    </header>

    <div class="container">
        <br>
            <form action="crearProducto.php" method = "post">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nombre</label>
                    <input type="text" class="form-control" name="nombre" aria-describedby="emailHelp" placeholder="Nombre">
                </div>
                <div class="form-group">
                <label for="inputState">Categoria</label>
                <select name="categoria" class="form-control">
                    <option selected disabled>Selecciona una</option>
                    <option>Viento</option>
                    <option>Cuerda</option>
                    <option>Percusion</option>
                </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Descripcion</label>
                    <input type="text" class="form-control" name="descripcion" aria-describedby="emailHelp" placeholder="Descripcion">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Precio</label>
                    <input type="number" class="form-control" name="precio" aria-describedby="emailHelp" placeholder="Precio">
                </div>
                <button type="submit" class="btn btn-primary">Crear producto</button>
        </form>
    </div>

</body>

</html>