<?php
include 'UsuarioDal.php';

//Maneja la lógica del negocio de usuarios, asegurando que los 
//datos sean correctos antes de interactuar con la base de datos.

class UsuarioBll {
    private $usuarioDal;

    public function __construct($conexion) { 
        $this->usuarioDal = new UsuarioDal($conexion);
    }
    public function registrarUsuario($nombre, $apellidos, $provincia_id) {

        if(empty($nombre) || empty($apellidos) || empty($provincia_id)) {
            return false;
        }
        return $this->usuarioDal->insertarUsuario($nombre, $apellidos, $provincia_id);
    }


    public function listaProvincias() {
        return $this->usuarioDal->obtenerProvincias();
    }
}

?>