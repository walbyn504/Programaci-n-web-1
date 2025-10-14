<?php
session_start();
include 'usuarioBll.php';
include 'conexion.php';

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}

$usuario = $_SESSION['usuario'];
if ($usuario['rol'] === 'Usuario') {
    echo "<p style='color:red' >No tienes permiso para eliminar un usuario, solo los administradores pueden hacerlo.</p>";
    exit;
}

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
