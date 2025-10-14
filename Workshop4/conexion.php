<?php
$host = "localhost";
$usuario = "walbyn";             
$password = "504620579";      
$base_de_datos = "usuarios";

try {
    $conexion = new mysqli($host, $usuario, $password, $base_de_datos);
    if ($conexion->connect_error) {
        throw new Exception("Error de conexión: " . $conexion->connect_error);
    }
} catch (Exception $e) {
    die("Error fatal: " . $e->getMessage());
}

?>