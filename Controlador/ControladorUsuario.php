<?php

    require_once('Modelo/ModeloUsuarios.php');

    class ControladorUsuario {

        private $ModeloUsuarios;

        public function __construct() {
            $this->ModeloUsuarios = new ModeloUsuarios();
        }

        public function index($func) {
            switch ($func) {
                case 'GuardarUsuario':
                    $this->GuardarUsuario();
                    break;
                
                case 'ConsultarUsuarios':
                    $this->ConsultarUsuarios();
                    break;

                case 'ModificarUsuario':
                    $this->ModificarUsuario();
                    break;

                case 'ActualizarUsuario':
                    $this->ActualizarUsuario();
                    break;

                case 'EliminarUsuario':
                    $this->EliminarUsuario();
                    break;
                default:
                    # code...
                    break;
            }
        }

        private function GuardarUsuario() {
            extract($_POST);

            $this->ModeloUsuarios->__set('nombreUsuario', $nombreUsuario);
            $this->ModeloUsuarios->__set('correo', $correo);
            $this->ModeloUsuarios->__set('telefono', $telefono);

            $this->ModeloUsuarios->GuardarUsuario();

            echo json_encode('Completo');
        }

        private function ConsultarUsuarios() {
            $usuarios = $this->ModeloUsuarios->ConsultarUsuarios();
            echo json_encode($usuarios);
        }

        private function ModificarUsuario() {
            extract($_GET);

            $this->ModeloUsuarios->__set('idUsuario', $idUsuario);
            $usuario = $this->ModeloUsuarios->ModificarUsuario();
            echo json_encode($usuario);
        }

        private function ActualizarUsuario() {
            extract($_POST);

            $this->ModeloUsuarios->__set('idUsuario', $idUsuario);
            $this->ModeloUsuarios->__set('nombreUsuario', $nombreUsuario);
            $this->ModeloUsuarios->__set('correo', $correo);
            $this->ModeloUsuarios->__set('telefono', $telefono);
            $this->ModeloUsuarios->ActualizarUsuario();
            
            echo json_encode('Completo');
        }

        private function EliminarUsuario() {
            extract($_POST);

            $this->ModeloUsuarios->__set('idUsuario', $idUsuario);
            $this->ModeloUsuarios->EliminarUsuario();
            echo json_encode('Completo');
        }
    }

?>