<?php
session_start();
include 'usuarioBll.php';
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? '';

    if (desactivarUsuario($conexion, $id)) {
        $_SESSION['mensaje'] = "Usuario deshabilitado correctamente.";
    } else {
        $_SESSION['mensaje'] = "Error al deshabilitar usuario.";
    }
}

header("Location: listado_usuarios.php");
exit;
