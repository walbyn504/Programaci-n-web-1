<?php
include 'conexion.php';

function obtenerUsuarios($conexion) {
    return mysqli_query($conexion, "SELECT * FROM usuarios");
}

function obtenerUsuarioPorId($conexion, $id) {
    $res = mysqli_query($conexion, "SELECT * FROM usuarios WHERE id=$id");
    return mysqli_fetch_assoc($res);
}


function insertarUsuario($conexion, $nombre, $apellido, $correo, $telefono, $estado, $rol, $username, $contrasena) {
    $sql = "INSERT INTO usuarios (nombre, apellido, correo, telefono, estado, rol, username, contrasena)
            VALUES ('$nombre', '$apellido', '$correo', '$telefono', '$estado', '$rol', '$username', MD5('$contrasena'))";
    return mysqli_query($conexion, $sql);
}


function actualizarUsuario($conexion, $id, $nombre, $apellido, $correo, $telefono, $rol, $estado) {
    $sql = "UPDATE usuarios 
            SET nombre='$nombre', apellido='$apellido', correo='$correo', telefono='$telefono', rol='$rol', estado='$estado'
            WHERE id=$id";
    return mysqli_query($conexion, $sql);
}

function eliminarUsuario($conexion, $id) {
    return mysqli_query($conexion, "DELETE FROM usuarios WHERE id=$id");
}

function deshabilitarUsuario($conexion, $id) {
    return mysqli_query($conexion, "UPDATE usuarios SET estado='inactivo' WHERE id=$id");
}

function validarLogin($conexion, $username, $contrasena) {
    $sql = "SELECT * FROM usuarios WHERE username='$username' AND contrasena=MD5('$contrasena')";
    return mysqli_query($conexion, $sql);
}
?>
