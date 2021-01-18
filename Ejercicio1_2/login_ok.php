<?php
require_once __DIR__ . '/db_config.php';

session_start();

$logueado = 0;

header("Content-Type: text/html;charset=utf-8");
$nick = $_POST["nick"];
$password = $_POST["password"];
$instruccion = "select count(*) as cuantos from usuarios where nick = '$nick'";
$resultado = mysqli_query($con, $instruccion);
while ($fila = $resultado->fetch_assoc()) {
	$numero = $fila["cuantos"];
}
if ($numero == 0) {
	header("Location: login.html?alert=El usuario no existe");
} else {
	$instruccion = "select password as cuantos , id from usuarios where nick = '$nick'";
	$resultado = mysqli_query($con, $instruccion);

	while ($fila = $resultado->fetch_assoc()) {
		$password2 = $fila["cuantos"];
		$id = $fila["id"];
	}

	if (!password_verify($password, $password2)) {
		header("Location: login.html?alert=Contraseña incorrecta");
	} else {
		echo "Login OK";
		$_SESSION["nick_logueado"] = $nick;
		$_SESSION["id"] = $id;

		if ($nick == "admin"){
			header("Location: administrador.php"); 
		}

		else{
			header("Location: tienda.php");
		}

		
	}
}
?>