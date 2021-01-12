<?php

$DB_SERVER="localhost";
$DB_USER="root";
$DB_PASSWORD="usbw";
$DB_DATABASE="tienda";


$con = mysqli_connect($DB_SERVER, $DB_USER, $DB_PASSWORD, $DB_DATABASE) or die(mysqli_connect_error());
	
if (!$con)
{
    die("No se ha podido realizar la corrección ERROR:" . mysqli_connect_error() . "<br>");
}

else
{
    mysqli_set_charset ($con, "utf8");
}