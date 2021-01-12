<?php
session_start();
require_once __DIR__ . '/db_config.php';
$instruccion = "UPDATE compras SET fecha =  CURRENT_TIMESTAMP() where fecha is null and usuario_id = ".$_SESSION['id'].";";
$res = mysqli_query($con, $instruccion);
header('Location: tienda.php?alert=Compra realizada corrrectamente' );