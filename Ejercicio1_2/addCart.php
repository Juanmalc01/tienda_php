<?php
session_start();
if (isset($_POST["id"]) && isset($_POST["cantidad"])){
    require_once __DIR__ . '/db_config.php';
    $instruccion = "select * from productos where id = '".$_POST['id']."'";
	$res = mysqli_query($con, $instruccion);
    $datos = mysqli_fetch_assoc($res);

    $instruccion = "select * from compras where producto_id = '".$_POST['id']."' and fecha is null and usuario_id = ".$_SESSION['id'].";";
	$res = mysqli_query($con, $instruccion);
    $compras = mysqli_fetch_assoc($res);
    if($res->num_rows > 0){
        $cantidad = intval($compras['cantidad'])+ intval($_POST["cantidad"]);
        $instruccion = "UPDATE compras SET cantidad = ".$cantidad.", total = ".($datos['precio'] * $cantidad)
        ." WHERE fecha is null and usuario_id = ".$_SESSION['id']." and producto_id = ".$_POST["id"].";";
    }else{
        $instruccion = "insert into compras (usuario_id,producto_id,cantidad,total) values ('".$_SESSION['id']."','".$_POST['id']."','".$_POST["cantidad"].
        "','".($datos['precio'] * intval($_POST["cantidad"]))."')";
    }

    $res = mysqli_query($con, $instruccion);
    if (!$res) 
    {
        header("Location: tienda.php");
    }
    else
    {
        header("Location: showCart.php");
    }

}else{
    header("Location: tienda.php");
}