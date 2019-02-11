<?php

    class Conexion {

        public $conex;
        private $host;
        private $user;
        private $pwd;
        private $dbname;

        public function __construct() {
            $db = require_once('dbConfig.php');
            extract($db);

            $this->host = $host;
            $this->user = $user;
            $this->pwd = $pwd;
            $this->dbname = $dbname;
        }

        public function Conectar() {
            try {
                $cnn = "mysql:host={$this->host};dbname={$this->dbname}";
                $this->conex = new \PDO($cnn, $this->user, $this->pwd);
            } catch (PDOException $e) {
                $msg = "Error: " . $e->getMessage() . " Archivo: " . $e->getFile() . " Línea: " . $e->getLine();
		        error_log($msg, 0);
            }
        }
    }

?>