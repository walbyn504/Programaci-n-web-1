<?php
include'usuarioDal.php';

function loginUsuario($conexion, $username, $contrasena) {
    $resultado = validarLogin($conexion, $username, $contrasena);
    return mysqli_fetch_assoc($resultado);
}

function listarUsuarios($conexion) {
    return obtenerUsuarios($conexion);
}

function obtenerUsuario($conexion, $id){
    return obtenerUsuarioPorId($conexion, $id);
}

function crearUsuario($conexion, $nombre, $apellido, $correo, $telefono, $rol, $estado, $username, $contrasena) {
    return insertarUsuario($conexion, $nombre, $apellido, $correo, $telefono, $estado, $rol, $username, $contrasena);
}

function editarUsuario($conexion, $id, $nombre, $apellido, $correo, $telefono, $rol, $estado) {
    return actualizarUsuario($conexion, $id, $nombre, $apellido, $correo, $telefono, $rol, $estado);
}

function borrarUsuario($conexion, $id) {
    return eliminarUsuario($conexion, $id);
}

function desactivarUsuario($conexion, $id) {
    return deshabilitarUsuario($conexion, $id);
}
?>
