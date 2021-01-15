<?php
session_start();
include '../db_config.php';
$instruccion = "DELETE FROM usuarios WHERE id = ".$_GET['id'];
$res = mysqli_query($con, $instruccion);
header('Location: ' . $_SERVER['HTTP_REFERER']);