<?php
require_once __DIR__ . '/db_config.php';
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

<!-- Barra de la pagina -->
        <div class="navbar navbar-dark bg-dark box-shadow">
            <div class="container d-flex justify-content-between">
                <a class="navbar-brand d-flex align-items-center">
                    <strong>Tienda</strong>
                </a>
                <!-- Botones de la barra -->
                <div>
                    <a href="administrador.php" class="btn btn-warning">Gestionar productos</a>
                    <a href="/logout.php" class="btn btn-danger">Cerrar sesion</a>
                </div>
            </div>
        </div>
    </header>

    <main role="main">

    <!-- Boton para crear un usuario -->
        <section class="jumbotron text-center">
            <div class="container">
                <h1 class="jumbotron-heading">Administrar usuarios</h1>
                <a href="Usuarios/FormularioCrearUsuario.php" class="btn btn-success">Crear usuario</a>
                                  
            </div>
        </section>

        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row">

                <!-- Mostramos los usuarios -->
                <?php
                    $order = isset($_GET['desc']) ? 'desc' : 'asc';
                    $instruccion = "select * from usuarios order by nick ".$order;
                    $resultado = mysqli_query($con, $instruccion);
                    while ($fila = $resultado->fetch_assoc()) {

                    ?>

                        <div class="col-md-4 producto <?php echo ($fila['email']); ?>">
                            <div class="card mb-4 box-shadow">
                                <div class="card-body">
                                    <h1><?php echo ($fila['nick']); ?></h1>
                                    <span class="badge badge-info"><?php echo ($fila['email']); ?></span>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <div class="input-group mb-3">
                                                    <div class="input-group-append">
                                                        <!-- Botones para eliminar o modificar usuario -->
                                                        <a href="Usuarios/eliminarUsuario.php?id=<?php echo ($fila['id']);?>" class="btn btn-danger">Eliminar</a>
                                                        <a href="Usuarios/FormularioModificarUsuario.php?id=<?php echo ($fila['id']);?>" class="btn btn-sm btn-outline-secondary">Modificar</a>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>

                </div>
            </div>
        </div>

    </main>
    <script src="alert.js"></script>
    <script>
        $( ".custom-select" ).change(function(e) {
            var sel = e.target.value;
            if(sel === '*'){
                $(".producto").show()
            }else{
                $(".producto").hide()
                $(".producto."+sel).show()
            }
        });
        
    </script>
</body>

</html>