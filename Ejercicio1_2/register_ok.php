<?php
    require_once __DIR__ . '/db_config.php';
	
header("Content-Type: text/html;charset=utf-8");
if (isset($_POST["nick"]))
{
	$nick = $_POST["nick"];
	$email = $_POST["email"];
	$password = $_POST["password"];
	if($_POST["password"] !== $_POST["password2"]){
		header("Location: register.html?alert=Las contraseñas deben coincidir");
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
			header("Location: register.html?alert=No se ha podido crear el usuario");
			die("No se ha pordido crear el usuario");
		}
		else
		{
			echo "Usuario creado";
			header("Location: login.html?alert=Usuario creado correctamente");
		}
	}
	else
	{
		header("Location: register.html?alert=El nick $nick no está disponible");
	}

}
else 
{
	header("Location: register.html?alert=ERROR: No se puede introducir un nick en blanco");
}
?>