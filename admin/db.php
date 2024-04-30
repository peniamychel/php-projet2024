<?php
$servidor ="localhost";
$basedatos = "website";
$usuario = "root";
$contrasenia = "";

try {
    $conexion = new PDO("mysql:host=$servidor;dbname=$basedatos", $usuario, $contrasenia);
    echo "conectado";
} catch (Exception $error) {
    echo $error ->getMessage();
}
?>