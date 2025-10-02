<?php
include 'UsuarioDal.php';

class UsuarioBll {
    private $usuarioDal;

    public function __construct($conexion) {   // <-- esta línea debe estar bien
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