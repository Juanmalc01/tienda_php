<?php
session_start();
require_once __DIR__ . '/db_config.php';
$instruccion = "UPDATE compras_".$_SESSION['id']." SET fecha =  CURRENT_TIMESTAMP() where fecha is null;";
$res = mysqli_query($con, $instruccion);
header('Location: tienda.php?alert=Compra realizada corrrectamente' );