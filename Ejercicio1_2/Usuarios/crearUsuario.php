<?php
include '../db_config.php';
	
if (isset($_POST["nick"]))
{
	$nick = $_POST["nick"];
	$email = $_POST["email"];
	$password = $_POST["password"];
	if($_POST["password"] !== $_POST["password2"]){
		header("Location: FormularioCrearUsuario.php?alert=Las contraseñas deben coincidir");
		die();
	}
	$passwordc = password_hash($password,PASSWORD_DEFAULT);
	//////////////////////////////////////
	
	//Inserción de datos
	
	//Primero compruebo si el nick existe
	$instruccion = "select count(*) as cuantos from usuarios where nick = '$nick'";
	$res = mysqli_query($con, $instruccion);
	$datos = mysqli_fetch_assoc($res);
	
	if ($datos['cuantos'] == 0)
	{
		$instruccion = "insert into usuarios (nick,email,password) values ('$nick','$email','$passwordc')";
		$res = mysqli_query($con, $instruccion);
		if (!$res) 
		{
			header("Location: FormularioCrearUsuario.php?alert=No se ha podido crear el usuario");
			die("No se ha pordido crear el usuario");
		}
		else
		{
		$instruccion = "CREATE TABLE IF NOT EXISTS `compras_".$con->insert_id."` (
		  `producto_id` int(10) UNSIGNED NOT NULL,
		  `cantidad` int(11) NOT NULL,
		  `total` decimal(10,2) NOT NULL,
		  `fecha` timestamp NULL DEFAULT NULL,
		  KEY `fk_compra_producto` (`producto_id`)
		);";
		$instruccion .=" ALTER TABLE `compras_".$con->insert_id."`
		  ADD CONSTRAINT `fk_compra_producto` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE;";
			mysqli_multi_query($con, $instruccion);
			header("Location: ../administrarUsuarios.php?alert=Usuario creado correctamente");
		}
	}
	else
	{
		header("Location: FormularioCrearUsuario.php?alert=El nick $nick no está disponible");
	}

}
else 
{
	header("Location: FormularioCrearUsuario.php?alert=ERROR: No se puede introducir un nick en blanco");
}
?>