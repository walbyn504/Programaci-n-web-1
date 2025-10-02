<?php
$host = "localhost";
$usuario = "walbyn";              // <--- usuario nuevo
$password = "504620579";      // <--- la contraseña que le pusiste
$base_de_datos = "programacion_web1";

try {
    $conexion = new mysqli($host, $usuario, $password, $base_de_datos);
    if ($conexion->connect_error) {
        throw new Exception("Error de conexión: " . $conexion->connect_error);
    }
} catch (Exception $e) {
    die("Error fatal: " . $e->getMessage());
}

?>