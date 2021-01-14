<?php
session_start();
require_once __DIR__ . '/db_config.php';
$instruccion = "DELETE FROM compras_".$_SESSION['id']." WHERE producto_id = ".$_GET['id']." and fecha is null;";
$res = mysqli_query($con, $instruccion);
header('Location: ' . $_SERVER['HTTP_REFERER']);