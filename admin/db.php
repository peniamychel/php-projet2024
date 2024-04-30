<?php
// $servidor ="localhost";
// $basedatos = "website";
// $usuario = "root";
// $contrasenia = "";

$servidor ="bmmgi9g9t8xkbjnwaifm-mysql.services.clever-cloud.com";
$basedatos = "bmmgi9g9t8xkbjnwaifm";
$usuario = "uq3od9bg3tpktkqt";
$contrasenia = "lTUml9YowyvMiFlQi4Mj";

try {
    $conexion = new PDO("mysql:host=$servidor;dbname=$basedatos", $usuario, $contrasenia);
    echo "conectado";
} catch (Exception $error) {
    echo $error ->getMessage();
}
?>