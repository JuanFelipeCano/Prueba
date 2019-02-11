<?php

    require_once('Config/Conexion.php');

    class ModeloUsuarios {

        private $db;
        private $idUsuario;
        private $nombreUsuario;
        private $correo;
        private $telefono;

        public function __construct() {
            $this->db = new Conexion();
            $this->db->Conectar();
        }

        public function __get($atributo) {
            if (property_exists($this, $atributo)) {
                return $this->$atributo;
            }
        }

        public function __set($atributo, $valor) {
            if (property_exists($this, $atributo)) {
                $this->$atributo = $valor;
            }
        }

        public function GuardarUsuario() {
            $query = "
            INSERT INTO usuarios(
                nombreUsuario
                , correo
                , telefono
            ) VALUES (
                :nombreUsuario
                , :correo
                , :telefono
            );";

            $stmt = $this->db->conex->prepare($query);
            $stmt->execute(array(
                ':nombreUsuario' => $this->nombreUsuario,
                ':correo' => $this->correo,
                ':telefono' => $this->telefono
            ));
        }

        public function ConsultarUsuarios() {
            $query = "SELECT * FROM usuarios;";
            $stmt = $this->db->conex->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function ModificarUsuario() {
            $query = "SELECT * FROM usuarios WHERE idUsuario = :idUsuario;";
            $stmt = $this->db->conex->prepare($query);
            $stmt->execute(array(':idUsuario' => $this->idUsuario));
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function ActualizarUsuario() {
            $query = "
            UPDATE usuarios
                SET nombreUsuario = :nombreUsuario
                , correo = :correo 
                , telefono = :telefono
            WHERE idUsuario = :idUsuario;";

            $stmt = $this->db->conex->prepare($query);
            $stmt->execute(array(
                ':idUsuario' => $this->idUsuario,
                ':nombreUsuario' => $this->nombreUsuario,
                ':correo' => $this->correo,
                ':telefono' => $this->telefono
            ));
        }

        public function EliminarUsuario() {
            $query = "DELETE FROM usuarios WHERE idUsuario = :idUsuario;";
            $stmt = $this->db->conex->prepare($query);
            $stmt->execute(array(':idUsuario' => $this->idUsuario));
        }

    }

?>