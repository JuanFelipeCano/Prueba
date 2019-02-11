<?php

    $ctr = $_GET['ctr'];
    $func = $_GET['func'];

    switch ($ctr) {
        case 'ControladorUsuario':
            require_once('Controlador/ControladorUsuario.php');
            $controlador = new ControladorUsuario();
            $controlador->index($func);
            break;
        
        default:
            # code...
            break;
    }

?>