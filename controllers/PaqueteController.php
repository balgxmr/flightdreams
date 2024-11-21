<?php
    require_once '../models/Paquete.php';

    class PaqueteController {

        public function listar() {
            $paqueteModel = new Paquete();
            $paquetes = $paqueteModel->obtenerTodos();

            // Incluye la vista para mostrar los paquetes
            require_once '../views/paquete/paquetes.php';
        }
    }
?>
