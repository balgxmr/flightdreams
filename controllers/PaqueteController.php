<?php
    require_once '../models/Paquete.php';
    require_once '../config/config.php';

    class PaqueteController {

        public function listar() {
            $paqueteModel = new Paquete();
            $paquetes = $paqueteModel->obtenerTodos();

            // Incluye la vista para mostrar los paquetes
            require_once '../views/paquete/paquetes.php';
        }

        public function listarPorServicio($servicio) {
            $paqueteModel = new Paquete();
            $paquetes = $paqueteModel->obtenerPorServicio($servicio);

            require_once '../views/servicios/autobuses.php';
        }
    }
?>
