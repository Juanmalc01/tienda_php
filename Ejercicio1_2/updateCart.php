<?php
session_start();
if (isset($_GET["id"]) && isset($_GET["cantidad"])){
    require_once __DIR__ . '/db_config.php';
    $instruccion = "select * from productos where id = '".$_GET['id']."'";
	$res = mysqli_query($con, $instruccion);
    $datos = mysqli_fetch_assoc($res);
    $instruccion = "UPDATE compras SET cantidad = ".$_GET["cantidad"]." , total = ".(intval($_GET["cantidad"]) * $datos['precio']) ." WHERE usuario_id = "
    .$_SESSION['id']." and fecha is null and producto_id =".$_GET['id'] .";";
    $res = mysqli_query($con, $instruccion);
}
header('Location: ' . $_SERVER['HTTP_REFERER']);