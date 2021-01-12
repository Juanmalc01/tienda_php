<?php
session_start();
if(isset($_SESSION["id"])){
    header("Location: tienda.php");
}else{
    header("Location: login.html");
}