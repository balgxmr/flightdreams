<?php
require_once '../models/Admin.php';
require_once '../models/Paquete.php';
require_once '../config/config.php';

class AdminController {

    public function verReservasAdmin() {
        session_start();
        if (isset($_SESSION['admin'])) {

            $estado = isset($_GET['estado']) ? $_GET['estado'] : '';
            $adminModel = new Admin();

            $reservas = $adminModel->verReservasAdmin($estado);
            // Incluye la vista y pasa las reservas como parámetro
            require_once "../views/admin/reservas-admin.php";
        } else {
            // Redirigir al login si no está logueado
            header("Location: " . BASE_URL . "views/usuarios/login-admin.php");
            exit;
        }
    }   

    public function insertarPaquete() {
        session_start();
        if (isset($_SESSION['admin'])) {

            // Incluye la vista y pasa las reservas como parámetro
            require_once "../views/admin/insertar-paquete.php";
        } else {
            // Redirigir al login si no está logueado
            header("Location: " . BASE_URL . "views/usuarios/login-admin.php");
            exit;
        }
    }   


    public function actualizarEstado() {

        if (isset($_POST['id_viajes'])) {
            $idViajes = $_POST['id_viajes'];
            $estado = $_POST['estado'];

            $adminModel = new Admin();
            $resultado = $adminModel->actualizarEstado($idViajes, $estado);

            if ($resultado) {
                // Redirige a la lista de viajes con un mensaje de éxito
                header('Location: ../config/routes.php?controller=admin&action=verReservasAdmin');
                
            } else {
                // Redirige con un mensaje de error
                echo "ERROR";
            }
        }
    }

    public function listarAdmin() {
        $paqueteModel = new Paquete();
        $paquetes = $paqueteModel->obtenerTodos();

        // Incluye la vista para mostrar los paquetes
        require_once '../views/admin/paquetes-admin.php';
    }

    public function listarPorServicioAdmin($servicio) {
        $paqueteModel = new Paquete();
        $paquetes = $paqueteModel->obtenerPorServicio($servicio);

        require_once '../views/admin/paquetes-admin.php';
    }

}

?>
