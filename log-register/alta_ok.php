<?php

session_start();

$logueado = 0;

//Parámetros de conexión
$servidor = "localhost";
$usuario = "root";
$contraseña = "usbw";
$bd = "practica_1";

$nick = $_POST["nick"];
$pass = $_POST["pass"];

$con = mysqli_connect($servidor, $usuario, $contraseña, $bd);
if (!$con) {
	die("Con se ha podido realizar la conexión: " . mysqli_connect_error() . "<br>");
} else {
	mysqli_set_charset($con, "utf8");
	echo "Se ha conectado a la base de datos" . "<br>";
}

$instruccion = "select count(*) as cuantos from usuarios where nick = '$nick'";
$resultado = mysqli_query($con, $instruccion);
while ($fila = $resultado->fetch_assoc()) {
	$numero = $fila["cuantos"];
}
if ($numero == 0) {
	echo "El usuario no existe";
} else {
	$instruccion = "select pass as cuantos from usuarios where pass = '$pass'";
	$resultado = mysqli_query($con, $instruccion);

	while ($fila = $resultado->fetch_assoc()) {
		$password = $fila["cuantos"];
	}

	/////////////////

	if ((strcmp($password, $pass) !== 0) || $pass == "") {
		echo "Contrasena incorrecta";
	} else {
		$_SESSION["nick_logueado"] = $nick;
?>

		<a href="https://www.google.es">Acceder al menu</a>

<?php


		$logueado = 1;
	}
}
?>