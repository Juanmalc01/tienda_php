<?php
include '../db_config.php';
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
                    <a href="../administrador.php" class="btn btn-warning">Gestionar productos</a>
                    <a href="../logout.php" class="btn btn-danger">Cerrar sesion</a>
                </div>
            </div>
        </div>
    </header>

    <main role="main">

    <?php

    $id=$_GET['id'];

    $modificar=modificarUsuario($_GET['id']);
    function modificarUsuario($id){

    $instruccion = "SELECT * FROM usuarios WHERE id = '".$id."'";
    $resultado = $con -> query($instruccion) or die("Error".mysqli_error($con));
    $fila = $resultado->fetch_assoc(); 
    return [
        $fila ['nick'],
        $fila ['email'],
        $fila ['password']
    ]
    }
    ?>

<!-- Formulario para modificar usuario -->
	<form action="modificarUsuario.php" method = "post">
	<table  class="table table-hover">
	<tr>
		<td>Nick: </td>
		<td><input type="text" name="nick" value=<?php echo ($modificar[1]);?>/></td>
		<td></td>
    </tr>
    <tr>
		<td>Email: </td>
		<td><input type="email" name="email" maxlength="20" minlength="3" value=<?php echo ($modificar[2]);?>/></td>
		<td></td>
	</tr>
	<tr>
		<td>Contraseña: </td>
		<td><input type="password" name="password" value=<?php echo ($modificar[3]);?>/></td>
		<td></td>
 	</tr>	
		<td></td>
 		<td><input type="submit" value="Guardar"/></td>
	</table>
	</form>
			</div>
		<div class="col-3"></div>
	</div>
</div>

<script src="alert.js"></script>
</body>
</html>