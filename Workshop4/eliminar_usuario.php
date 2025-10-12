<?php
session_start();
include 'usuarioBll.php';
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? '';

    if (eliminarUsuario($conexion, $id)) {
        $_SESSION['mensaje'] = "Usuario eliminado correctamente.";
    } else {
        $_SESSION['mensaje'] = "Error al eliminar usuario.";
    }
}

header("Location: listado_usuarios.php");
exit;
