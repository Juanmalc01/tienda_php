<?php	
session_start();
if (isset($_POST["nick"]) && isset($_POST["email"]))
{
    require_once __DIR__ . '/db_config.php';
    if(isset($_POST["password"]) && strlen($_POST["password"]) > 0){
        $passwordc = password_hash($_POST["password"],PASSWORD_DEFAULT);
        $instruccion = "UPDATE usuarios SET nick =  '".$_POST["nick"]."', email = '".$_POST["email"]."', password = '".$passwordc."' 
        where id = ".$_SESSION['id'].";";

    }else{
        $instruccion = "UPDATE usuarios SET nick =  '".$_POST["nick"]."', email = '".$_POST["email"]."' where id = ".$_SESSION['id'].";";
    }
    $res = mysqli_query($con, $instruccion);
    $_SESSION["nick_logueado"] = $_POST["nick"];
    if(!$res){
        header('Location: FormularioModificarUsuario.php?alert=No pudo actualizar el perfil' );
    }else{
        header('Location: FormularioModificarUsuario.php?alert=Perfil actualizado correctamente' );
    }
    exit();
}
header('Location: FormularioModificarUsuario.php?alert=Se debe especificar email y nick' );