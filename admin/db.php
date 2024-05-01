<?php
// $servidor ="localhost";
// $basedatos = "website";
// $usuario = "root";
// $contrasenia = "";

$servidor ="bosclmn3unxlm1q9trfm-mysql.services.clever-cloud.com";
$basedatos = "bosclmn3unxlm1q9trfm";
$usuario = "uokbduagfuzrawxi";
$contrasenia = "3jn4NI5hnWZuRcHhk9sH";

try {
    $conexion = new PDO("mysql:host=$servidor;dbname=$basedatos", $usuario, $contrasenia);
    echo "conectado";
} catch (Exception $error) {
    echo $error ->getMessage();
}
?>