<?php
session_start();
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
                <a href="tienda.php" class="navbar-brand d-flex align-items-center">
                    <strong>Tienda</strong>
                </a>
                <!-- Botones de la barra -->
                <div>
                    <a href="showCart.php" class="btn btn-primary"><i class="bi bi-cart"></i></a>
                    <a href="showProfile.php" class="btn btn-primary">Perfil</a>
                    <a href="/logout.php" class="btn btn-danger">Cerrar sesion</a>
                </div>
            </div>
        </div>
    </header>

    <main role="main">

<!-- Mostramos los campos que se pueden modificar del perfil -->
        <section class="jumbotron text-center">
            <div class="container">
                <?php
                         $instruccion = "select * from usuarios where id = ".$_SESSION["id"];
                         $resultado = mysqli_query($con, $instruccion);
                         $fila = $resultado->fetch_assoc();
                ?>
                <h1 class="jumbotron-heading">Perfil</h1>
                <form action="updateProfile.php" method = "post">
	                <div class="form-group">
	                	<label>Nick:</label>
	                	<input type="text"  class="form-control"  name="nick" required value="<?php echo ($fila['nick']); ?>"/>
                    </div>
                    <div  class="form-group">
	                	<label>Email: </label>
	                	<input type="email" class="form-control"  name="email" required value="<?php echo ($fila['email']); ?>"/>
                    </div>
                    <div class="form-group">
	                	<label>Contraseña:</label>
	                	<input type="password" class="form-control"  name="password" value=""/>
                    </div>
 	                <button type="submit" value="Crear cuenta">Guardar</button>
	            </form>             
            </div>
        </section>
    </main>
</body>
</html>