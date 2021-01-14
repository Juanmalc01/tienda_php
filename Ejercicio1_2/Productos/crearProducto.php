<?php
include '../db_config.php';
	
	$nombre = $_POST["nombre"];
	$categoria = $_POST["categoria"];
    $descripcion = $_POST["descripcion"];
    $precio = $_POST["precio"];

    $instruccion = "insert into productos (id,nombre,categoria,descripcion,precio) values (null,'$nombre','$categoria','$descripcion','$precio')";
    $res = mysqli_query($con, $instruccion);
    
    header("Location: ../administrador.php?alert=Producto creado correctamente");