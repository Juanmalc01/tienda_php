<?php
	
header("Content-Type: text/html;charset=utf-8");
if (isset($_POST["nick"]))
{

	//Parámetros de conexión
	$servidor = "localhost";
	$usuario = "root";
	$contraseña = "usbw";
	$bd = "practica_1";

	$nick = $_POST["nick"];
	$mail = $_POST["mail"];
	$pass = $_POST["pass"];
	$confirmpass = $_POST["confirmpass"];
	

	$con = mysqli_connect($servidor, $usuario, $contraseña, $bd);
	
	if (!$con)
	{
		die("No se ha podido realizar la corrección ERROR:" . mysqli_connect_error() . "<br>");
	}
	
	else
	{
		mysqli_set_charset ($con, "utf8");
		echo "Se ha conectado a la base de datos"."<br>";
	}
	//////////////////////////////////////
	
	//Inserción de datos

	//Primero compruebo si el nick existe
	$instruccion = "select count(*) as cuantos from usuarios where nick = '$nick'";
	$res = mysqli_query($con, $instruccion);
	$datos = mysqli_fetch_assoc($res);
	
	if ($_POST["pass"] !== $_POST["confirmpass"]) { 
		echo "La contraseña no coincide con confirmar contraseña <br>";
	  } 

	else if ($datos['cuantos'] == 0)
	{
		$instruccion = "insert into usuarios values ('$nick','$mail','$pass','$confirmpass')";
		$res = mysqli_query($con, $instruccion);
		if (!$res) 
		{
			die("No se ha pordido crear el usuario");
		}
		else
		{
			echo "Usuario creado";
			//me lleva al login para que pruebe mi contraseña
			echo "<script>alert('Usuario creado correctamente');</script>";
			include_once("../log-register/login.html");
		}
	}
	else
	{
		echo "El nick $nick ya esta en uso, prueba con otro nick <br>";
	}

}
else 
{
	echo ("ERROR: No se puede introducir un nick en blanco");
}

?>